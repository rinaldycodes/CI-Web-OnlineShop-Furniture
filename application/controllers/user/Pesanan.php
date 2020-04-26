<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	private $template	=	'/template/backend';

	public function __construct(){
		parent::__construct();
		if ( $this->session->userdata('role') == 'user' ) {
		} else {
			redirect('/home');
		}
	}


	public function index()
	{
		$data['title']	=	'Pesanan';
		$data['page']	=	'/user/pesanan/pesanan';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['pesanan']	=	$this->db->get_where('pesanan', ['user_id'=>$data['isLogin']['user_id']])->result_array();
		$this->load->view($this->template,$data);
	}


	public function read($pesanan_id)
	{
		$this->session->set_userdata(['pesanan_id'=>$pesanan_id]);
		$data['title']	=	'Pesanan'.$pesanan_id ;
		$data['page']	=	'/user/pesanan/detail_pesanan';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

		$data['pesanan']	=	$this->db->get_where('pesanan', ['pesanan_id'=>$pesanan_id])->row_array();
		$data['invoice']	=	$this->Pesanan_model->detail_pesanan($pesanan_id)->result_array();

		/*echo var_dump($data['invoice']);*/
		$this->load->view($this->template,$data);
	}
	
	public function create()
	{
		$data['title']	=	'Kontak';
		$data['page']	=	'/pages/kontak';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view($this->template,$data);
	}
}
