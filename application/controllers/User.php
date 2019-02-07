<?php 

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'user';
		$this->load->model(['Paket_m','Testimonial_m','User_m']);

		$this->data['id_user'] 	= 1;
		// $this->data['username'] 	= $this->session->userdata('username');
	 //    $this->data['id_role']		= $this->session->userdata('id_role');
		// if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		// {
		// 	$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
		// 	redirect('login');
		// }

		// if ($this->data['id_role'] != 3)
		// {
		// 	$this->session->sess_destroy();
		// 	$this->flashmsg('Anda harus login sebagai pemilik kost untuk mengakses halaman tersebut', 'danger');
		// 	redirect('login');
		// }
	}

	public function index()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'Dashboard';
		$this->template($this->data, $this->module);
	}

	public function history_pemesanan()
	{
		$this->load->model('Order_m');
		$this->load->model('User_m');
		$this->load->model('Produk_m');
		$this->data['data']		= $this->Order_m->get(['customer_id' => '1']);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'history';
		$this->template($this->data, $this->module);
	}

	public function testimoni()
	{
		if ($this->POST('simpan')) {

			$this->Testimonial_m->insert([
				'testimonial'		=> $this->POST('testimoni'),
			]);
			redirect('user/dashboard','refresh');
			exit;
		}
		$this->data['data']		= $this->Testimonial_m->get(['id_customer' => '1']);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'testimoni';
		$this->template($this->data, $this->module);
	}

	public function profil()
	{
		if ($this->POST('simpan')) {
			$this->User_m->update($this->data['id_user'],[
				'nama'		=> $this->POST('nama'),
				'kontak'		=> $this->POST('kontak'),
				'alamat'		=> $this->POST('alamat'),
			]);
			redirect('user/dashboard','refresh');
			exit;
		}
		$this->data['data'] = $this->User_m->get_row(['id_user', '1']);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'profil';
		$this->template($this->data, $this->module);
	}

	public function ganti_password()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}
}