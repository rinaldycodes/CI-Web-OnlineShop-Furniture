<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_MODEL {

	public function find($id)
	{
		$this->db->where('produk_id', $id);
		return $this->db->get('produk')->row_array();
	}

	public function detail_pesanan($pesanan) {
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('detail_pesanan', 'detail_pesanan.pesanan_id = pesanan.pesanan_id');
		$this->db->join('produk', 'produk.produk_id = detail_pesanan.produk_id');
		$this->db->join('payment', 'payment.payment_id = pesanan.payment_id');
		$this->db->join('kota', 'kota.kota_id = pesanan.kota_id');
		$this->db->join('jasa_pengiriman', 'jasa_pengiriman.jp_id = pesanan.jp_id');
		$this->db->where('pesanan.pesanan_id', $pesanan);
		$query = $this->db->get();
		return $query;
	}

	public function laporan_pesanan() {
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('detail_pesanan', 'detail_pesanan.pesanan_id = pesanan.pesanan_id');
		$this->db->join('payment', 'payment.payment_id = pesanan.payment_id');
		$this->db->join('kota', 'kota.kota_id = pesanan.kota_id');
		$this->db->join('jasa_pengiriman', 'jasa_pengiriman.jp_id = pesanan.jp_id');
		$query = $this->db->get();
		return $query;
	}

	function total_harga(){
        $this->db->select_sum('harga_total');
        $this->db->where('pesanan_id',$this->session->userdata('pesanan_id'));
        $query = $this->db->get('detail_pesanan');
        if ($query->num_rows()>0) {
            return $query->row()->harga_total;
        } else {
            return 0;
        }
    }


    function cetakTotalHarga(){
        $this->db->select_sum('harga_total');
        $query = $this->db->get('detail_pesanan');
        if ($query->num_rows()>0) {
            return $query->row()->harga_total;
        } else {
            return 0;
        }
    }

}