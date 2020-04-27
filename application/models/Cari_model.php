<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari_model extends CI_MODEL {

	public function temukan($var)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('detail_pesanan', 'detail_pesanan.pesanan_id = pesanan.pesanan_id');
		$this->db->join('produk', 'produk.produk_id = detail_pesanan.produk_id');
		$this->db->join('payment', 'payment.payment_id = pesanan.payment_id');
		$this->db->join('kota', 'kota.kota_id = pesanan.kota_id');
		$this->db->join('jasa_pengiriman', 'jasa_pengiriman.jp_id = pesanan.jp_id');
		$this->db->like('produk.nama_produk', $var);
		$query = $this->db->get();
		return $query;
	}


}
