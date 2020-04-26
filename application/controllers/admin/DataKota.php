<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKota extends CI_Controller {

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
		$data['title']	=	'Data Kota';
		$data['page']	=	'/admin/data-kota/data-kota';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['kota']	=	$this->db->get_where('kota');
		$this->load->view($this->template,$data);
	}


	public function create()
	{
		$data['title']	=	'Tambah';
		$data['page']	=	'/admin/data-kota/tambah-kota';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['kota']	=	$this->db->get('kota');
		$this->form_validation->set_rules('kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('tarif', 'Tarif', 'required|trim');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view($this->template,$data);
		} else {
			$insertdata = [
				'kota' =>	$this->input->post('kota'),
				'tarif' =>	$this->input->post('tarif')
			];

			$this->db->insert('kota', $insertdata);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil menambah data
			</div>');
			return redirect('manage/data-kota', 'refresh');
		}
	}

	public function read($kota_id)
	{
		$this->session->set_userdata(['kota_id'=>$kota_id]);
		$data['title']	=	'Pesanan '.$kota_id ;
		$data['page']	=	'/user/pesanan/detail_pesanan';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['kota']	=	$this->db->get_where('kota', ['kota_id'=>$kota_id])->row_array();
		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($kota_id)->result_array();

		/*echo var_dump($data['invoice']);*/
		$this->load->view($this->template,$data);
	}

	public function edit($kota_id)
	{
		$this->session->set_userdata(['kota_id'=>$kota_id]);
		$data['title']	=	'Edit Pesanan '.$kota_id ;
		$data['page']	=	'/admin/data-kota/edit-kota';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['kota']	=	$this->db->get_where('kota', ['kota_id'=>$kota_id])->row_array();
		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($kota_id)->result_array();

		$this->form_validation->set_rules('kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('tarif', 'Tarif', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view($this->template,$data);
		} else {
			$this->update($kota_id);
		}
	}


	public function update($kota_id)
	{
		$data = [
			'kota' =>	$this->input->post('kota'),
			'tarif' =>	$this->input->post('tarif')
		];

		$this->Crud->update('kota', 'kota_id', $kota_id, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil mengubah data
		</div>');
		redirect('manage/data-kota', 'refresh');
	}

	public function delete($id)
	{
		$this->Crud->delete('kota', 'kota_id', $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil menghapus data!
		</div>');
		redirect('manage/data-kota');
	}

}
