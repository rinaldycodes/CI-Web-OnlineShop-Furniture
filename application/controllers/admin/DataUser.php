<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUser extends CI_Controller {

	private $template	=	'/template/backend';

	public function __construct(){
		parent::__construct();
		if ( $this->session->userdata('role') == 'admin' ) {
		} else {
			redirect('/home');
		}
	}

	public function index()
	{
		$data['title']	=	'Data User';
		$data['page']	=	'/admin/data-user/data-user';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['users']	=	$this->db->get('user');

		$this->load->view($this->template,$data);
	}
	
	public function create()
	{
		$data['title']	=	'Tambah';
		$data['page']	=	'/admin/data-user/tambah-user';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['users']	=	$this->db->get('user');
		$this->AuthModel->rulesRegister();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view($this->template,$data);
		} else {
			$kode = $this->AuthModel->kode();
			$nama 	=	$this->input->post('nama');
			$alamat 	=	$this->input->post('alamat');
			$notelp 	=	$this->input->post('notelp');
			$email 	=	$this->input->post('email');
			$password 	=	password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$insertdata =	['user_id'=>$kode,'nama'=>$nama, 'alamat'=>$alamat, 'notelp'=>$notelp, 'email'=>$email, 'password'=>$password];

			return $this->db->insert('user', $insertdata);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil menambah data
			</div>');
			redirect('manage/data-user');
		}
	}

	public function read($id)
	{
		$data['title']	=	'Read User';
		$data['page']	=	'/admin/data-user/read-user';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['user'] = $this->Crud->read('user', 'user_id', $id);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template,$data);
		}
	}

	public function edit($id)
	{
		$data['title']	=	'Edit User';
		$data['page']	=	'/admin/data-user/edit-user';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();
		/* DATA PRIMER*/
		$data['user'] = $this->Crud->read('user', 'user_id', $id);
		/* /DATA */
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password2', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template,$data);
		} else {
			$this->update($id);
		}
	}

	public function update($id)
	{
		$password = $this->input->post('password');
		$user = $this->Crud->read('user', 'user_id', $id);
			$data = [
				'nama'	=>	$this->input->post('nama'),
				'alamat'	=>	$this->input->post('alamat'),
				'notelp'	=>	$this->input->post('notelp'),
				'email'	=>	$this->input->post('email'),
				'password'	=>	password_hash($this->input->post('password2'), PASSWORD_DEFAULT)
			];
		$this->Crud->update('user', 'user_id', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil mengubah data!
		</div>');
		redirect('manage/data-user');
	}

	public function delete($id)
	{
		$this->Crud->delete('user', 'user_id', $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil menghapus data!
		</div>');
		redirect('manage/data-user');
	}


}
