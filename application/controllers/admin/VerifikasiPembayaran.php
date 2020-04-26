<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifikasiPembayaran extends CI_Controller {

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
		$data['title']	=	'Data Verifikasi Pembayaran';
		$data['page']	=	'/admin/verifikasi-pembayaran/verifikasi-pembayaran';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['pesanan']	=	$this->db->like('status', 'Menunggu Verifikasi')->get('pesanan');
		$this->load->view($this->template,$data);
	}

	public function read($pesanan_id)
	{
		$this->session->set_userdata(['pesanan_id'=>$pesanan_id]);
		$data['title']	=	'Pembayaran '.$pesanan_id ;
		$data['page']	=	'/admin/verifikasi-pembayaran/read-verifikasi';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['konfirmasi_pembayaran']	=	$this->db->get_where('konfirmasi_pembayaran', ['pesanan_id'=>$pesanan_id])->row_array();
		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($pesanan_id)->result_array();

		/*echo var_dump($data['invoice']);*/
		$this->load->view($this->template,$data);
	}

	public function edit($pesanan_id)
	{
		$this->session->set_userdata(['pesanan_id'=>$pesanan_id]);
		$data['title']	=	'Edit Pesanan '.$pesanan_id ;
		$data['page']	=	'/admin/verifikasi-pembayaran/edit-pesanan';
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


	public function delete($id)
	{
		$this->Crud->delete('detail_pesanan', 'pesanan_id', $id);
		$this->Crud->delete('pesanan', 'pesanan_id', $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil menghapus data!
		</div>');
		redirect('manage/verifikasi-pembayaran');
	}
	


	public function verifikasi($pesanan_id)
	{
		$this->session->set_userdata(['pesanan_id'=>$pesanan_id]);
		$data['title']	=	'Pembayaran '.$pesanan_id ;
		$data['page']	=	'/admin/verifikasi-pembayaran/verifikasi';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['konfirmasi_pembayaran']	=	$this->db->get_where('konfirmasi_pembayaran', ['pesanan_id'=>$pesanan_id])->row_array();

		$this->load->view($this->template,$data);
	}

	public function prosesVerifikasi($pesanan_id)
	{
		$data = [
			'status' =>	$this->input->post('status')
		];


		$this->Crud->update('pesanan', 'pesanan_id', $pesanan_id, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil Verifikasi Pesanan
		</div>');
		redirect('manage/verifikasi-pembayaran', 'refresh');
	}
}
