<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKategori extends CI_Controller {

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
		$data['title']	=	'Data Kategori';
		$data['page']	=	'/admin/data-kategori/data-kategori';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['kategori']	=	$this->db->get('kategori');

		$this->load->view($this->template,$data);
	}
	
	public function create()
	{
		$data['title']	=	'Tambah';
		$data['page']	=	'/admin/data-kategori/tambah-kategori';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['kategori']	=	$this->db->get('kategori');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[kategori.kategori]',[
			'required'=>'Kategori tidak boleh kosong',
			'is_unique'=>'Kategori sudah tersedia'
		]);
		if ($this->form_validation->run()==FALSE) {
			$this->load->view($this->template,$data);
		} else {
			$kategori 	=	$this->input->post('kategori');
			$insertdata =	['kategori'=>$kategori];

			$this->db->insert('kategori', $insertdata);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil menambah data
			</div>');
			return redirect('manage/data-kategori', 'refresh');
		}
	}

	public function read($id)
	{
		$data['title']	=	'Read User';
		$data['page']	=	'/admin/data-kategori/read-user';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->Crud->read('kategori', 'kategori_id', $id);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template,$data);
		}
	}

	public function edit($id)
	{
		$data['title']	=	'Edit User';
		$data['page']	=	'/admin/data-kategori/edit-user';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();
		/* DATA PRIMER*/
		$data['kategori'] = $this->Crud->read('kategori', 'kategori_id', $id);
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
		$user = $this->Crud->read('kategori', 'kategori_id', $id);
			$data = [
				'nama'	=>	$this->input->post('nama'),
				'alamat'	=>	$this->input->post('alamat'),
				'notelp'	=>	$this->input->post('notelp'),
				'email'	=>	$this->input->post('email'),
				'password'	=>	password_hash($this->input->post('password2'), PASSWORD_DEFAULT)
			];
		$this->Crud->update('kategori', 'kategori_id', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil mengubah data!
		</div>');
		redirect('manage/data-kategori');
	}

	public function update_kategori($id)
	{
		$data = ['kategori'=>$this->input->post('kategori')];
		$this->Crud->update('kategori', 'kategori_id', $id, $data);
		redirect('manage/data-kategori', 'refresh');
	}

	public function delete($id)
	{
		$this->Crud->delete('kategori', 'kategori_id', $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil menghapus data!
		</div>');
		redirect('manage/data-kategori');
	}


}
