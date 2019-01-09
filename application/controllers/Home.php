<?php 

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['string']);
	}

	public function index()
	{
		$pageData = array(
			'title' => 'Halaman Utama',
			'content' => 'HomePage',
			'contentData' => array()
		);

		$this->load->view('Page', $pageData);
	}

	public function menu()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function testimonial()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function gallery()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function paket()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function daftar()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}
}