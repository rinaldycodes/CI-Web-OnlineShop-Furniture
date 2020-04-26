<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_MODEL {

	public function find($id)
	{
		$this->db->where('produk_id', $id);
		return $this->db->get('produk')->row_array();
	}

	public function kategori($get) {
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id');
		$this->db->where('stok >',0);
		$this->db->where('kategori', $get);
		$query = $this->db->get();
		return $query;
	}
}