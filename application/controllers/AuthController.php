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

	public function lupa_password()
	{
		$data['title']		=		'Lupa Password';
		$data['page']		=		'/pages/lupa-password';

		$this->form_validation->set_rules('lupa_password', 'Lupa Password', 'required|trim',[
			'required'		=>		'Lupa Password tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template, $data);
		} else {
			$metode = $this->input->post('metode');
			$lupa_password = $this->input->post('lupa_password');
			if ($metode == 'email') {
				$data = ['metode'=>$metode];
				$this->session->set_userdata($data);
				$this->resetPW_email($metode, $lupa_password);
			} elseif($metode == 'no_telp') {
				$data = ['metode'=>$metode];
				$this->session->set_userdata($data);
				$this->resetPW_notelp($metode, $lupa_password);
			} else {
				echo "ups anda salah method!!";;
			}
		}
	}

	public function resetPW_email($metode, $lupa_password)
	{
		$data['user'] = $this->db->get_where('user', ['email'=>$lupa_password])->row_array();
		if ($data['user']) {
			$data['title']		=		'Reset Password';
			$data['page']		=		'/pages/reset-password';

			$this->load->view($this->template, $data);
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				Akun dengan email tersebut tidak ditemukan!
				</div>');
			redirect('lupa-password');
		}
	}

	public function resetPW_notelp($metode, $lupa_password)
	{
		$data['user'] = $this->db->get_where('user', ['notelp'=>$lupa_password])->row_array();
		if ($data['user']) {
			$data['title']		=		'Reset Password';
			$data['page']		=		'/pages/reset-password2';


			$this->load->view($this->template, $data);
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				Akun dengan nomor telpon tersebut tidak ditemukan!
				</div>');
			redirect('lupa-password');
		}
	}


	public function prosesResetPassword()
	{
		$lupa_password = $this->input->post('lupa_password');
		$password = $this->input->post('password');
		$konfirmasi_password = $this->input->post('konfirmasi_password');

		$email = $this->db->get_where('user', ['email'=>$lupa_password])->row_array();
		$notelp = $this->db->get_where('user', ['notelp'=>$lupa_password])->row_array();

		if ($email) {
			if ($password == $konfirmasi_password) {
				$data = [
					'password' => password_hash($password, PASSWORD_DEFAULT)
				];

				$this->db->where('user_id', $email['user_id']);
				$this->db->update('user', $data);

				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil mengubah password !
				</div>');
				redirect('login');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				Email sudah benar, tetapi Password dan Konfirmasi tidak sama
				</div>');
				redirect('lupa-password');
			}
				
		} elseif($notelp) {
			if ($password == $konfirmasi_password) {
				$data = [
					'password' => password_hash($password, PASSWORD_DEFAULT)
				];

				$this->db->where('user_id', $notelp['user_id']);
				$this->db->update('user', $data);

				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil mengubah password !
				</div>');
				redirect('login');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				No Telpon sudah benar, tetapi Password dan Konfirmasi tidak sama
				</div>');
				redirect('lupa-password');
			}

		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
			Data tersebut tidak ditemukan !
			</div>');
			redirect('lupa-password');
		}
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
