<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataProduk extends CI_Controller {

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
		$data['title']	=	'Data produk';
		$data['page']	=	'/admin/data-produk/data-produk';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['produk']	=	$this->db->get('produk');

		$this->load->view($this->template,$data);
	}
	
	public function create()
	{
		$data['title']	=	'Tambah';
		$data['page']	=	'/admin/data-produk/tambah-produk';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['produk']	=	$this->db->get('produk');
		$data['kategori']	=	$this->db->get('kategori');
		/* rules validate form*/
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
		$this->form_validation->set_rules('keterangan_produk', 'Keterangan Produk', 'required|trim');
		$this->form_validation->set_rules('berat', 'Berat Produk', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		/* rules validate form*/
		if ($this->form_validation->run()==FALSE) {
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

				redirect('manage/data-produk/tambah');

			}	else {
				
				$upload	=	$this->upload->data('');

				$nama_produk 	=	$this->input->post('nama_produk');
				$harga 	=	$this->input->post('harga');
				$kode = $this->Crud->kode($nama_produk);
				$keterangan_produk 	=	$this->input->post('keterangan_produk');
				$berat 	=	$this->input->post('berat');
				$stok 	=	$this->input->post('stok');
				$password 	=	password_hash($this->input->post('password'), PASSWORD_DEFAULT);

				$insertdata =	[
					'produk_id'=>$kode,
					'nama_produk'=>$nama_produk, 
					'harga'=>$harga, 
					'kategori_id'=>$this->input->post('kategori'),
					'slug_produk'=>strtolower(str_replace(' ', '-', $nama_produk)),
					'keterangan_produk'=>$keterangan_produk, 
					'berat'=>$berat, 
					'stok'=>$stok, 
					'status'=> 'ok',
					'foto'=>$new_name
				];
		

				$this->Crud->create('produk', $insertdata);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					Berhasil menambah data
				</div>');
				redirect('manage/data-produk');
			}
		}
	}

	public function read($id)
	{
		$data['title']	=	'Read produk';
		$data['page']	=	'/admin/data-produk/read-produk';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['produk'] = $this->Crud->read('produk', 'slug_produk', $id);
		$kategori_id = $data['produk']['kategori_id'];
		$data['kategori']	=	$this->db->get_where('kategori', ['kategori_id'=>$kategori_id])->row_array();
			$this->load->view($this->template,$data);
	}

	public function edit($slug)
	{
		$data['title']	=	'Edit produk';
		$data['page']	=	'/admin/data-produk/edit-produk';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();
		/* DATA PRIMER*/
		$data['produk'] = $this->Crud->read('produk', 'slug_produk', $slug);
		$data['kategori']	= $this->db->get('kategori');
		/* /DATA */
		/* rules validate form*/
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('keterangan_produk', 'Keterangan Produk', 'required|trim');
		$this->form_validation->set_rules('berat', 'Berat Produk', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required|trim');
		/* rules validate form*/
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->template,$data);
		} else {
			$this->update($slug);
		}
	}

	public function update($slug)
	{
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

			redirect('manage/data-produk/edit/'.$slug);

		}	else {
			
			$upload	=	$this->upload->data('');

			$nama_produk 	=	$this->input->post('nama_produk');
			$harga 	=	$this->input->post('harga');
			$kode = $this->Crud->kode($nama_produk);
			$keterangan_produk 	=	$this->input->post('keterangan_produk');
			$berat 	=	$this->input->post('berat');
			$stok 	=	$this->input->post('stok');
			$file_lama 	=	$this->input->post('file_lama');

			$insertdata =	[
				'produk_id'=>$kode,
				'nama_produk'=>$nama_produk, 
				'harga'=>$harga, 
				'kategori_id'=>$this->input->post('kategori'),
				'slug_produk'=>strtolower(str_replace(' ', '-', $nama_produk)),
				'keterangan_produk'=>$keterangan_produk, 
				'berat'=>$berat, 
				'stok'=>$stok, 
				'status'=> 'ok',
				'foto'=>$new_name
			];
		

			if(unlink(FCPATH . 'assets/images/'.$file_lama)){
			    $this->Crud->update('produk', 'slug_produk', $slug, $insertdata);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					Berhasil mengubah data!
				</div>');
				redirect('manage/data-produk');
			}	
		}
	}

	public function delete($slug)
	{	
		$produk = $this->Crud->read('produk', 'slug_produk', $slug);
		$fotos	=	$this->db->get_where('foto', ['produk_id'=>$produk['produk_id']])->result_array();
		$produk_id = $produk['produk_id'];


		foreach ($fotos as $c) {
			if (unlink(FCPATH . 'assets/images/'.$c['foto'])) {
				$this->Crud->delete('foto', 'produk_id 	=', $produk_id);
			}
		}

		if(unlink(FCPATH . 'assets/images/'.$produk['foto'])){
		    $this->Crud->delete('produk', 'slug_produk', $slug);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil menghapus data!
			</div>');
			redirect('manage/data-produk');
		}	
	}


	public function tambah_foto($slug)
	{
		$data['title']	=	'Tambah';
		$data['page']	=	'/admin/data-produk/tambah-foto-produk';
		$data['isLogin']	=	$this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array();

		$data['produk'] = $this->Crud->read('produk', 'slug_produk', $slug);
		$data['foto'] = $this->db->get_where('foto', ['produk_id'=>$data['produk']['produk_id']]);
		$data['lsKategori']	=	$this->db->get('kategori');
		
		$this->load->view($this->template,$data);
	}

	public function store_foto($slug)
	{
		$data['produk'] = $this->Crud->read('produk', 'slug_produk', $slug);

		$config['upload_path'] = './assets/images';
		$config['allowed_types'] = 'gif|png|jpg|pdf';
		$config['max_size'] = 0;
		$new_name = time().'_'.$_FILES['foto']['name'];
		$config['file_name'] = $new_name;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if (! $this->upload->do_upload('foto')) {
					
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				Gagal mengupload foto silahkan cek file upload!
			</div>');

			redirect('tambah-foto/'.$slug);

		}	else {
			
			$upload	=	$this->upload->data('');

			
			$insertdata =	[
				'foto'=>$new_name,
				'produk_id'=>$this->input->post('produk_id')
			];
			$insertdata2 = ['kategori'=>$this->input->post('kategori')];

			$this->Crud->create('foto', $insertdata);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				Berhasil menambah foto
			</div>');
			redirect('tambah-foto/'.$slug);
		}
	}

	public function hapus_semua($produk_id)
	{
		$produk = $this->Crud->read('produk', 'produk_id', $produk_id);
		$slug  = $produk['slug_produk'];
		$fotos	=	$this->db->get_where('foto', ['produk_id'=>$produk['produk_id']])->result_array();

		foreach ($fotos as $c) {
			if (unlink(FCPATH . 'assets/images/'.$c['foto'])) {
				$this->Crud->delete('foto', 'produk_id 		=', $produk_id);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
						Berhasil menambah foto
					</div>');
				redirect('tambah-foto/'.$slug);
			}
		}
	}


}
