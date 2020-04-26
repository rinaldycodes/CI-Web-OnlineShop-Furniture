<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardUser extends CI_Controller {

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
		$data['title']	=	'Dashboard';
		$data['page']	=	'/user/dashboard/dashboard';
		$data['isLogin']	=	$this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
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
