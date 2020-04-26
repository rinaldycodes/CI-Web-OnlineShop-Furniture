<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfirmasiPembayaran extends CI_Controller {

	private $template	=	'/template/backend';

	public function __construct(){
		parent::__construct();
		if ( $this->session->userdata('role') == 'user' ) {
		} else {
			redirect('/home');
		}
	}


	public function cek_invoice()
	{
		$data['title']	=	'Konfirmasi Pembayaran';
		$data['page']	=	'/user/konfirmasi_pembayaran/cek-invoice';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['pesanan']	=	$this->db->get_where('pesanan', ['user_id'=>$data['isLogin']['user_id']])->result_array();
		$data['noInvoice']	=	NULL;
		$this->load->view($this->template,$data);
	}


	public function konfirmasi_pembayaran()
	{
		$pesanan_id = $this->input->post('pesanan_id');
		$data['title']	=	'Pesanan';
		$data['page']	=	'/user/konfirmasi_pembayaran/konfirmasi_pembayaran';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();


		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($pesanan_id)->result_array();
		$data['noInvoice']  =	$this->db->get_where('pesanan', ['pesanan_id'=>$pesanan_id])->row_array();

		if ($data['noInvoice'] == TRUE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				No. Invoice di temukan!
			</div>');

			/* FORM VALIDASI UNTUK FORM KONFIMASI PEMBAYARAN*/
			$this->form_validation->set_rules('no_rek', 'No. Rekening', 'required|trim');
			$this->form_validation->set_rules('nama_account', 'Nama Account', 'required|trim');
			$this->form_validation->set_rules('tgl_transfer', 'Tanggal Transfer', 'required|trim');
			$this->form_validation->set_rules('nominal_pembayaran', 'Nominal Pembayaran', 'required|trim');

			if ($this->form_validation->run()== false) {
				$this->load->view($this->template,$data);
			} else {
				$config['upload_path'] = './assets/images';
				$config['allowed_types'] = 'gif|png|jpg|pdf|jpeg';
				$config['max_size'] = 0;
				$new_name = time().'_'.$_FILES['foto']['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if (! $this->upload->do_upload('foto')) {
						
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					Gagal mengupload foto silahkan cek file upload!
				</div>');

				redirect('konfirmasi-pembayaran/proses');

				}	else {
					
					$upload	=	$this->upload->data('');

					$data = [
						'pesanan_id'	=>	$this->input->post('pesanan_id', true),
						'no_rek'	=>	$this->input->post('no_rek', true),
						'nama_account'	=>	$this->input->post('nama_account', true),
						'tgl_transfer'	=>	$this->input->post('tgl_transfer', true),
						'nominal_pembayaran'	=>	$this->input->post('nominal_pembayaran', true),
						'foto_struk'	=>	$new_name
					];

					$dataUpdatePesanan = [
						'status'	=> 'Menunggu Verifikasi Admin'
					];

					$this->Crud->create('konfirmasi_pembayaran', $data);
					$this->Crud->update('pesanan','pesanan_id', $pesanan_id, $dataUpdatePesanan);

					$this->session->set_flashdata('pesan', '<div class="alert alert-success">
						Berhasil melakukan konfirmasi
					</div>');

					redirect('pesanan', 'refresh');
				}	
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				No. Invoice tidak ditemukan!
			</div>');
			redirect('konfirmasi-pembayaran', 'refresh');
		}
	}


	public function prosesKonfirmasi(){
		$config['upload_path'] = './assets/images';
		$config['allowed_types'] = 'gif|png|jpg|pdf|jpeg';
		$config['max_size'] = 0;
		$new_name = time().'_'.$_FILES['foto']['name'];
		$config['file_name'] = $new_name;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);


		if (!$this->upload->do_upload('foto')) {
				
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			Gagal mengupload foto silahkan cek file upload!
		</div>');

		redirect('konfirmasi-pembayaran');

		}	else {
			
			$upload	=	$this->upload->data('');

			$data = [
				'pesanan_id'	=>	$this->input->post('pesanan_id', true),
				'no_rek'	=>	$this->input->post('no_rek', true),
				'nama_account'	=>	$this->input->post('nama_account', true),
				'tgl_transfer'	=>	$this->input->post('tgl_transfer', true),
				'nominal_pembayaran'	=>	$this->input->post('nominal_pembayaran', true),
				'foto_struk'	=>	$new_name
			];

			$dataUpdatePesanan = [
				'status'	=> 'Menunggu Verifikasi Admin'
			];

			$this->Crud->create('konfirmasi_pembayaran', $data);
			$this->Crud->update('pesanan','pesanan_id', $this->input->post('pesanan_id'), $dataUpdatePesanan);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil melakukan konfirmasi
			</div>');

			redirect('pesanan');
		}	
	}

	
}
