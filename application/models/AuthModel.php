<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_MODEL {

	
	public function rulesRegister()
	{
		$this->form_validation->set_rules('nama','Nama', 'required|trim',[
			'required'	=>	'Nama tidak boleh kosong! '
		]);
		$this->form_validation->set_rules('alamat','alamat', 'required|trim',[
			'required'	=>	'Alamat tidak boleh kosong! '
		]);
		$this->form_validation->set_rules('notelp','No Telepon', 'required|trim',[
			'required'	=>	'No Telepon / WA tidak boleh kosong! '
		]);
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]',[
			'required'	=>	'Email tidak boleh kosong! ',
		]);
		$this->form_validation->set_rules('password','Password', 'required|trim|matches[password2]',[
			'required'	=>	'Password tidak boleh kosong! ',
			'matches'	=>	'Password tidak cocok dengan Konfirmasi password'

		]);
		$this->form_validation->set_rules('password2','Konfirmasi Password', 'required|trim|matches[password]',[
			'required'	=>	'Konfirmasi Password tidak boleh kosong! ',
		]);
	}


	public function rulesLogin()
	{
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]',[
			'required'	=>	'Email tidak boleh kosong! ',
		]);
		$this->form_validation->set_rules('password','Password', 'required|trim',[
			'required'	=>	'Password tidak boleh kosong! '
		]);
	}

	public function kode(){
	  $this->db->select('RIGHT(user.user_id,2) as a', FALSE);
	  $this->db->order_by('user_id','DESC');    
	  $this->db->limit(1);    
	  $query = $this->db->get('user');  //cek dulu apakah ada sudah ada kode di tabel.    
	  if($query->num_rows() <> 0){      
		   //cek kode jika telah tersedia    
		   $data = $query->row();      
		   $kode = intval($data->a) + 1; 
	  }
	  else{      
		   $kode = 1;  //cek jika kode belum terdapat pada table
	  }
		  /*$tgl=date('my'); */
		  $urut = str_pad($kode, 4, "0", STR_PAD_LEFT);    /*4 ADALAH JUMLAH ANGKA NOL DIBELAKANG*/
		  $kodetampil = "IDP".$urut;  //format kode
		  return $kodetampil;  
	}

	public function create() {
		$kode = $this->kode();
		$nama 	=	$this->input->post('nama');
		$alamat 	=	$this->input->post('alamat');
		$notelp 	=	$this->input->post('notelp');
		$email 	=	$this->input->post('email');
		$password 	=	password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data =	['user_id'=>$kode,'nama'=>$nama, 'alamat'=>$alamat, 'notelp'=>$notelp, 'email'=>$email, 'password'=>$password];

		return $this->db->insert('user', $data);
	}

	public function read($id) {
		return $this->db->where('user_id', $id)->get();
	}

	public function cekLogin() {
		$email 	=	$this->input->post('email');
		$password 	=	$this->input->post('password');
		$user = $this->db->get_where('user', ['email'=>$email])->row_array();
		$admin = $this->db->get_where('admin', ['email_admin'=>$email])->row_array();

		/* CEK USER ADA ATAU TIDAK*/
		if ($user) {
			/* SELANJUTNYA CEK PASSWORD*/
			if ( password_verify($password,$user['password']) ) {
				$data 	=	[
					'email' 	=>	$user['email'],
					'role' 	=>	'user',
					'level' 	=>	'1',
					'nama' 	=>	$user['nama']
				];
				/* MEMBUAT SESSION */
				$this->session->set_userdata($data);
				/*  JIKA SEMUA BEHASIL MAKA REDIRECT KE HALAMAN UTAMA */
				redirect('/home');
			} else {
				/* JIKA PASSWORD TIDAK SAMA DENGAN DI DATABASE*/
				/* MAKA REDIRECT KE LOGIN LAGI*/
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">
					Anda salah memasukan password !
				</div>');
				redirect('/login');
			}
		} elseif ($admin) {
			/* SELANJUTNYA CEK PASSWORD*/
			if ( password_verify($password,$admin['password']) ) {
				$data 	=	[
					'email' 	=>	$admin['email_admin'],
					'role' 	=>	'admin',
					'level' 	=>	'2',
					'nama' 	=>	$admin['nama_admin']
				];
				/* MEMBUAT SESSION */
				$this->session->set_userdata($data);
				/*  JIKA SEMUA BEHASIL MAKA REDIRECT KE HALAMAN UTAMA */
				redirect('/home');
			} else {
				/* JIKA PASSWORD TIDAK SAMA DENGAN DI DATABASE*/
				/* MAKA REDIRECT KE LOGIN LAGI*/
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">
					Min lu salah memasukan password !
				</div>');
				redirect('/login');
			}
		} else {
			/* JIKA USER / ADMIN TIDAK ADA MAKA REDIRECT KE LOGIN LAGI*/
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">
					Email / User tidak terdaftar !
				</div>');
			redirect('/login');
		}
	}

}
