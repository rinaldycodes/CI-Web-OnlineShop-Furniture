<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	private $template	=	'/template/overview';


	public function login()
	{
		if (!$this->session->userdata('role') == 'user' || $this->session->userdata('role') == 'admin') {
		} else {
			redirect('home');
		}

		$data['title']	=	'Login';
		$data['page']	=	'/pages/login';
		/* PANGGIL FUNCTION RULES DARI AUTH MODEL*/
		$this->AuthModel->rulesLogin();
		/* JIKA FORM BERNILAI FALSE MAKA TAMPILKAN VIEW KEMBALI*/
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template,$data);
		} else {
		/* JIKA FORM BERNILAI SEBALIKNYA MAKA LANJUTKAN */
		/* PANGGIL FUNCTION CEKLOGIN DARI AUTH MODEL UNTUK VALIDASI LOGIN*/
			$this->cekLogin();
		}
	}

	public function cekLogin() {
		$this->AuthModel->cekLogin();
	}

	public function register()
	{
		if (!$this->session->userdata('role') == 'user' || $this->session->userdata('role') == 'admin') {
		} else {
			redirect('home');
		}
		
		$data['title']	=	'Register';
		$data['page']	=	'/pages/register';
		/* PANGGIL FUNCTION RULES DARI AUTH MODEL*/
		$this->AuthModel->rulesRegister();
		/* JIKA FORM BERNILAI FALSE MAKA TAMPILKAN VIEW KEMBALI*/
		if ($this->form_validation->run() == FALSE) {
			/*$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				Gagal register periksa form register kamu !
			</div>');*/
			$this->load->view($this->template,$data);
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil melakukan register !
			</div>');
			$this->AuthModel->create();
			redirect ('login');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('login');
	}


}
