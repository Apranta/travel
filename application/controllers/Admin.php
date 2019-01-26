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
		$this->load->model('Testimonial_m');
		$this->load->model('Produk_m');
	}

	public function index()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_paket()
	{
		$this->data['data']	= $this->Produk_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'data_produk';
		$this->template($this->data, $this->module);
	}

	public function tambah_paket()
	{
		if ($this->POST('simpan')) {

			$this->Produk_m->insert([
				'nama_produk'	=> $this->POST('nama'),
				'deskripsi'		=> $this->POST('deskripsi'),
				'stok'			=> $this->POST('stok'),
				'jenis'			=> $this->POST('jenis'),
				'jadwal' 		=> $this->POST('jadwal')
			]);

			$this->upload($this->db->insert_id() ,'assets/img/' , 'foto');

			$this->flashmsg('Berhasil di tambah');
			redirect('admin/data_paket','refresh');
			exit;
		}
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tambah_paket';
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
		$this->data['gallery'] = $this->Gallery_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'gallery';
		$this->template($this->data, $this->module);
	}

	public function data_testimonial()
	{
		$this->data['testimoni'] = $this->Testimonial_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'testimoni';
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