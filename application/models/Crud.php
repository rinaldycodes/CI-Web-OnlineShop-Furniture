<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_MODEL {

	public function create($table, $data) {
		return $this->db->insert($table, $data);
	}
	public function read($table, $field,$id) {
		return $this->db->get_where($table, [$field=>$id])->row_array();
	}
	public function update($table, $field, $id, $data ) {
		$this->db->where($field,$id);
		return $this->db->update($table, $data);
	}
	public function delete($table,  $field, $id) {
		$this->db->where($field,$id);
		return $this->db->delete($table);
	}

	public function kode($format){
	  return strtoupper(substr($format, 0, 4)).'-'.substr(rand(), 0, 5);
	}

	public function numb_rows($table, $field, $value) {
		$this->db->like($field, $value);
		$this->db->from($table);
		return $this->db->count_all_results();
	}


}
