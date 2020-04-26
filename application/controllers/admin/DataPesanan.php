<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPesanan extends CI_Controller {

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
		$data['title']	=	'Data Pesanan';
		$data['page']	=	'/admin/data-pesanan/data-pesanan';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['pesanan']	=	$this->db->get_where('pesanan');
		$this->load->view($this->template,$data);
	}

	public function read($pesanan_id)
	{
		$this->session->set_userdata(['pesanan_id'=>$pesanan_id]);
		$data['title']	=	'Pesanan '.$pesanan_id ;
		$data['page']	=	'/user/pesanan/detail_pesanan';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['pesanan']	=	$this->db->get_where('pesanan', ['pesanan_id'=>$pesanan_id])->row_array();
		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($pesanan_id)->result_array();

		/*echo var_dump($data['invoice']);*/
		$this->load->view($this->template,$data);
	}

	public function edit($pesanan_id)
	{
		$this->session->set_userdata(['pesanan_id'=>$pesanan_id]);
		$data['title']	=	'Edit Pesanan '.$pesanan_id ;
		$data['page']	=	'/admin/data-pesanan/edit-pesanan';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['pesanan']	=	$this->db->get_where('pesanan', ['pesanan_id'=>$pesanan_id])->row_array();
		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($pesanan_id)->result_array();

		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required|trim');
		$this->form_validation->set_rules('notelp', 'No Telpon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		/*$this->form_validation->set_rules('tgl_pesan', 'Tanggal Pesanan', 'required|trim');*/
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view($this->template,$data);
		} else {
			$this->update($pesanan_id);
		}
	}


	public function update($pesanan_id)
	{
		$data = [
			'nama_penerima' =>	$this->input->post('nama_penerima'),
			'notelp' =>	$this->input->post('notelp'),
			'alamat' =>	$this->input->post('alamat'),
			/*'tgl_pesan' =>	$this->input->post('tgl_pesan'),*/
			'status' =>	$this->input->post('status')
		];

		$this->Crud->update('pesanan', 'pesanan_id', $pesanan_id, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil mengubah data
		</div>');
		redirect('manage/data-pesanan', 'refresh');
	}

	public function delete($id)
	{
		$this->Crud->delete('detail_pesanan', 'pesanan_id', $id);
		$this->Crud->delete('pesanan', 'pesanan_id', $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil menghapus data!
		</div>');
		redirect('manage/data-pesanan');
	}
	
	public function create()
	{
		$data['title']	=	'Kontak';
		$data['page']	=	'/pages/kontak';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view($this->template,$data);
	}

	public function cetak()
	{
		$data['title']	=	'Laporan Data Pesanan '. tanggal('d m');
		$data['page']	=	'/admin/cetak_laporan';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['cetak']	=	$this->db->get('pesanan');
		$data['total_harga']	=	$this->Pesanan_model->cetakTotalHarga();
		$this->load->view($data['page'],$data);	
	}

}
