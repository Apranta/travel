<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';

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
	}

	public function index()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_menu()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'menu';
		$this->template($this->data, $this->module);
	}

	public function data_paket()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function tambah_paket()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function detail_paket()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_gallery()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_testimonial()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_pemesanan()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function pemesanan_detail()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function history_pembayaran()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function ganti_password()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}
}