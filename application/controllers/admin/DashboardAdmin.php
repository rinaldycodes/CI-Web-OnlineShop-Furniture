<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {

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
		$data['title']	=	'Manage';
		$data['page']	=	'/admin/manage/manage';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$this->load->view($this->template,$data);
	}
	
	public function create()
	{
		$data['title']	=	'Kontak';
		$data['page']	=	'/pages/kontak';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$this->load->view($this->template,$data);
	}


	public function edit($id)
	{
		$data['title']	=	'Edit Profil';
		$data['page']	=	'/admin/manage/edit-profil';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();
		$data['admin']		=	$this->Crud->read('admin', 'admin_id', $id);

		$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required|trim',[
			'required'		=>		'Nama tidak boleh kosong'
		]);
		$this->form_validation->set_rules('notelp_admin', 'No Telp Admin', 'required|trim',[
			'required'		=>		'No Telp tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template,$data);
		} else {
			$data = [
				'nama_admin' => $this->input->post('nama_admin'),
				'alamat_admin' => $this->input->post('alamat_admin'),
				'notelp_admin' => $this->input->post('notelp_admin'),
			];

			$this->Crud->update('admin', 'admin_id', $id, $data);

			$this->session->set_flashdata('pesan', 'Berhasil mengubah profil anda');

			redirect('manage');
		}
	}
}
