<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	private $template	=	'/template/overview';

	public function __construct(){
		parent::__construct();
		if ( $this->session->userdata('role') == 'admin' ) {
		} else {
			redirect('/home');
		}
	}

	public function pembayaran(){
		/* YANG BISA MELANJUTKAN KE PEMBAYARAN 
		HANYA YANG MEMPUNYAI AKUN / SUDAH LOGIN */
		if ($this->session->userdata('role') == 'user' || $this->session->userdata('role') == 'admin') {
			$this->load->view('pembayaran/pembayaran');
		}

		$data['title']	=	'Kontak';
		$data['page']	=	'/pages/kontak';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$this->load->view('pages/pembayaran');
	}
	
	public function create()
	{
		$data['title']	=	'Kontak';
		$data['page']	=	'/pages/kontak';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view($this->template,$data);
	}
}
