<?php

if (!function_exists('total_harga')) {
    function total_harga(){
        $this->db->select_sum('harga');
        $this->db->where('pesanan_id',$this->session->userdata('pesanan_id'));
        $query = $this->db->get('detail_pesanan');
        if ($query->num_rows()>0) {
            return $query->row()->harga;
        } else {
            return 0;
        }
    }

}

