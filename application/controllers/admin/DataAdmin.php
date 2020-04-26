<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAdmin extends CI_Controller {

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
		$data['title']	=	'Data Admin';
		$data['page']	=	'/admin/data-admin/data-admin';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();
		/* DATA */
		$data['admins']	=	$this->db->get('admin');
		/* /DATA */
		$this->form_validation->set_rules('email_admin','Email', 'required|trim|valid_email|is_unique[admin.email_admin]',[
			'required'	=>	'Email tidak boleh kosong! ', 'is_unique' => 'Email sudah terdaftar'
		]);
		$this->form_validation->set_rules('nama_admin','Nama', 'required|trim',[
			'required'	=>	'Nama tidak boleh kosong! '
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template,$data);
		} else {
			$this->create();
		}
	}
	
	public function create()
	{
		/*$email = $this->db->get_where('admin', ['email_admin'=>$this->input->post('email_admin')])->row_array();
		if (!empty($email)) {
			echo "string";
		} else {*/
			$data = [
				'nama_admin'	=>	$this->input->post('nama_admin'),
				'alamat_admin'	=>	$this->input->post('alamat_admin'),
				'notelp_admin'	=>	$this->input->post('notelp_admin'),
				'email_admin'	=>	$this->input->post('email_admin'),
				'password'	=>	password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];
			$this->Crud->create('admin', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil menambah data!
			</div>');
			redirect('manage/data-admin');
		/*}*/
	}

	public function read($id)
	{
		$data['title']	=	'Read Admin';
		$data['page']	=	'/admin/data-admin/read-admin';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();
		/* DATA PRIMER*/
		$data['admin'] = $this->Crud->read('admin', 'admin_id', $id);
		/* /DATA */
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email_admin]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template,$data);
		}
	}

	public function edit($id)
	{
		$data['title']	=	'Edit Admin';
		$data['page']	=	'/admin/data-admin/edit-admin';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();
		/* DATA PRIMER*/
		$data['admin'] = $this->Crud->read('admin', 'admin_id', $id);
		/* /DATA */
		$this->form_validation->set_rules('email_admin', 'Email', 'required|trim|valid_email');
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
		$admin = $this->Crud->read('admin', 'admin_id', $id);
		if ( password_verify($password,$admin['password']) ) {
			$data = [
				'nama_admin'	=>	$this->input->post('nama_admin'),
				'alamat_admin'	=>	$this->input->post('alamat_admin'),
				'notelp_admin'	=>	$this->input->post('notelp_admin'),
				'email_admin'	=>	$this->input->post('email_admin'),
				'password'	=>	password_hash($this->input->post('password2'), PASSWORD_DEFAULT)
			];
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Gagal mengubah! Password admin yang diubah salah!
			</div>');
			redirect('manage/data-admin');
		}
		$this->Crud->update('admin', 'admin_id', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil mengubah data!
		</div>');
		redirect('manage/data-admin');
	}

	public function delete($id)
	{
		$this->Crud->delete('admin', 'admin_id', $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil menghapus data!
		</div>');
		redirect('manage/data-admin');
	}
}
