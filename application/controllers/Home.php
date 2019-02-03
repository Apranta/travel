<?php 

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'home';

		// $this->data['id_pengguna'] 	= $this->session->userdata('id_pengguna');
		// $this->data['username'] 	= $this->session->userdata('username');
	 //    $this->data['id_role']		= $this->session->userdata('id_role');
		// if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		// {
		// 	$this->session->sess_destroy();
		// 	$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
		// 	redirect('login');
		// }

		// if ($this->data['id_role'] != 2)
		// {
		// 	$this->session->sess_destroy();
		// 	$this->flashmsg('Anda harus login sebagai admin untuk mengakses halaman tersebut', 'danger');
		// 	redirect('login');
		// }
		$this->load->model('Testimonial_m');
		$this->load->model('Produk_m');
		$this->load->model(['Gallery_m' , 'Paket_m']);
	}

	public function index()
	{
		$this->data['data']	= $this->Produk_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function detail()
	{
		$this->data['id'] = $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));
		$this->data['data']	= $this->Produk_m->get_row(['id_produk' => $this->data['id']]);
		$this->data['paket'] = $this->Paket_m->get(['id_produk' => $this->data['id']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail';
		$this->template($this->data, $this->module);
	}

	public function detail_paket()
	{
		$this->data['id'] = $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));
		$this->data['data']	= $this->Paket_m->get_row(['id_paket' => $this->data['id']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_paket';
		$this->template($this->data, $this->module);
	}

}