<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagesController extends CI_Controller {

	private $template	=	'/template/overview';


	public function home()
	{
		$data['title']	=	'Home';
		$data['page']	=	'/pages/home';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['produk_terbaru']	=	$this->db->where('stok >',0)->limit(6)->get('produk');
		
		$this->load->view($this->template,$data);
	}

	public function kontak()
	{
		$data['title']	=	'Kontak';
		$data['page']	=	'/pages/kontak';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view($this->template,$data);
	}


	public function cari()
	{
		$data['produk_terbaru']	=	$this->db->where('stok >',0)->limit(6)->get('produk');
		$data['produk']			=	$this->db->where('stok >',0)->get('produk')->result_array();
		$data['kategori']		=	$this->db->get('kategori')->result_array();
		$var = $this->input->post('cari');
		$data['title']	=	'Hasil pencarian dari '.'"'.$var.'"';
		$data['page']	=	'/pages/cari';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$data['hasil_cari']		=		$this->Cari_model->temukan($var)->result_array();

		$this->load->view($this->template,$data, 'refresh');
	}

	public function produk()
	{
		$data['title']			=	'Produk';
		$data['page']			=	'/pages/produk';
		$data['isLogin']		=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['produk_terbaru']	=	$this->db->where('stok >',0)->limit(6)->get('produk');
		$data['produk']			=	$this->db->where('stok >',0)->get('produk')->result_array();
		$data['kategori']		=	$this->db->get('kategori')->result_array();
		$this->load->view($this->template,$data);
	}

	public function produk_kategori($get)
	{
		$data['title']			=	'Produk '.ucfirst($get);
		$data['page']			=	'/pages/produk';
		$data['isLogin']		=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['produk_terbaru']	=	$this->db->where('stok >',0)->limit(6)->get('produk');
		$data['produk']			=	$this->Produk_model->kategori($get)->result_array();
		$data['kategori']		=	$this->db->get('kategori')->result_array();
		$this->load->view($this->template,$data);
	}

	public function show_produk($kategori='', $slug='')
	{
		$data['title']	=	'Show Produk';
		$data['page']	=	'/pages/show_produk';
		$data['isLogin']		=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['produk'] = $this->Crud->read('produk', 'slug_produk', $slug);
		$kategori_id = $data['produk']['kategori_id'];
		$data['kategori']	=	$this->db->get_where('kategori', ['kategori_id'=>$kategori_id])->row_array();
		$data['foto']	=	$this->db->get_where('foto', ['produk_id'=>$data['produk']['produk_id']])->result_array();

		$this->load->view($this->template,$data);
	}

	public function tambah_keranjang($id)
	{
		$produk = $this->Produk_model->find($id);
		$harga_berat = $produk['berat']*10000*1;
		$harga_qty	=	$harga_berat*1+$produk['harga'];

		$data = [
			'id'	=>	$produk['produk_id'],
			'qty'	=>	1,
			'price'	=>	$harga_qty,
			'name'	=>	$produk['nama_produk'],
			'berat'	=>	$produk['berat'],
			'harga_berat'=> $harga_berat,
			'stok'=> $produk['stok']
		];

		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', '<div class="alert-success alert">
			Berhasil menambahkan produk ke keranjang
		</div>');
		redirect('produk', 'refresh'); 
	}

	public function keranjang_belanja(){
		$data['title']	=	'Keranjang Belanja';
		$data['page']	=	'/pages/keranjang';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['produk_terbaru']	=	$this->db->limit(12)->get('produk');
		$data['kategori']	=	$this->db->get('kategori')->result_array();
		$this->load->view($this->template,$data);
	}

	public function update_keranjang($rowid){
		$qty = $this->input->post('quantity');

		$data= [
	        'rowid' => $this->input->post('rowid'),
	        'qty' => $qty
	    ];

		$this->cart->update($data);

		redirect('keranjang-belanja');
	}

	public function hapus_keranjang(){
		$this->cart->destroy();

		redirect('keranjang-belanja');
	}

	public function pembayaran(){
		/* YANG BISA MELANJUTKAN KE PEMBAYARAN 
		HANYA YANG MEMPUNYAI AKUN / SUDAH LOGIN */
		if ($this->session->userdata('role') == 'user' || $this->session->userdata('role') == 'admin') {
			if ($this->cart->contents()) {
				$data['title']	=	'Keranjang Belanja';
				$data['page']	=	'/pages/pembayaran';
				$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

				$data['kota']	=	$this->db->get('kota');
				$data['payment']	=	$this->db->get('payment');
				$data['jasa_pengiriman']	=	$this->db->get('jasa_pengiriman');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view($this->template,$data);
				}
			} else {
				redirect('keranjang-belanja', 'refresh');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				Maaf anda belum melakukan login untuk melanjutkan pembayaran
			</div>');
			redirect('home', 'refresh');
		}


	}

	public function selesai_belanja(){
		/* YANG BISA MELANJUTKAN KE PEMBAYARAN 
		HANYA YANG MEMPUNYAI AKUN / SUDAH LOGIN */
		$kode = $this->Crud->kode('transaksi');
		if (!empty($this->cart->contents())) {
			if ($this->session->userdata('role') == 'user' || $this->session->userdata('role') == 'admin' ) {
				/* KARENA SELESAI PEMBAYARAN MAKA DATA AKAN 
				DISIMPAN KE PESANAN DAN DETAIL PESANAN */
				$data_pesanan = [
					'pesanan_id'	=> 	$kode,
					'nama_penerima'		=>	$this->input->post('nama',true),
					'user_id'		=>	$this->input->post('user_id'),
					'notelp'		=>	$this->input->post('notelp'),
					'alamat'		=>	$this->input->post('alamat'),
					'tgl_pesan'		=>	date('Y-m-d H:i:s'),
					'kota_id'		=>	$this->input->post('kota'),
					'jp_id'		=>	$this->input->post('jasa_pengiriman'),
					'payment_id'		=>	$this->input->post('payment'),
					'status'		=>  'Menunggu Pembayaran'
				];

				$this->Crud->create('pesanan',$data_pesanan);

				foreach ($this->cart->contents() as $c) {
					$data_detail_pesanan = [
						'pesanan_id' => $kode,
						'produk_id' => $c['id'],
						'quantity' => $c['qty'],
						'harga_total' => $c['subtotal'],
					];

					$update_stok = [
						'stok'	=> $c['stok'] - $c['qty']
					];
					

					$this->Crud->create('detail_pesanan',$data_detail_pesanan);
					$this->Crud->update('produk','produk_id', $c['id'], $update_stok);
				}

				$this->session->set_userdata(['pesanan_id'=>$kode]);

				$this->cart->destroy();

				$this->invoice();

			} else {
				redirect('keranjang-belanja','refresh');
			}
		} else {
				redirect('keranjang-belanja','refresh');
		}
	}

	public function invoice(){
		$data['title']	=	'Invoice';
		$data['page']	=	'/pages/invoice';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$pesanan	=	$this->db->get_where('pesanan', ['pesanan_id'=>$this->session->userdata('pesanan_id')])->row_array();

		$data['kota']	=	$this->db->get('kota');
		$data['payment']	=	$this->db->get('payment');
		$data['jasa_pengiriman']	=	$this->db->get('jasa_pengiriman');
		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($pesanan['pesanan_id'])->result_array();
		/*var_dump($data['invoice']);*/
		$this->load->view($this->template,$data);	
	}

	public function cetak_invoice(){
		$data['title']	=	'Cetak Invoice '.$this->session->userdata('pesanan_id');
		$data['page']	=	'/pages/cetak_invoice';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$pesanan	=	$this->db->get_where('pesanan', ['pesanan_id'=>$this->session->userdata('pesanan_id')])->row_array();

		$data['kota']	=	$this->db->get('kota');
		$data['payment']	=	$this->db->get('payment');
		$data['jasa_pengiriman']	=	$this->db->get('jasa_pengiriman');
		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($pesanan['pesanan_id'])->result_array();
		/*var_dump($data['invoice']);*/

		/* Karena untuk mencegah cetak invoice
		yang tidak mempunyai session pesanan_id*/
		if ($pesanan) {
		$this->load->view($data['page'],$data);	
		} else {
			redirect('home');
		}
	}
}
