<?php 

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'user';
		$this->load->model(['Paket_m','Testimonial_m','User_m',"Order_m",'Produk_m']);
		$this->data['id_user'] 	= $this->session->userdata('id_user');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
		if (!isset($this->data['id_user'], $this->data['username'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 2)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai admin untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}
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
		$this->data['data']		= $this->Order_m->get(['customer_id' => $this->data['id_user']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'history';
		$this->template($this->data, $this->module);
	}

	public function testimoni()
	{
		if ($this->POST('simpan')) {

			$this->Testimonial_m->insert([
				'testimonial'		=> $this->POST('testimoni'),
				'id_order'			=> $this->POST('id_order'),
				'id_customer'		=> $this->data['id_user']
			]);
			redirect('user/testimoni','refresh');
			exit;
		}
		$this->data['testimoni']	= $this->Order_m->get(['customer_id' => $this->session->userdata('id_user') , 'status_perjalanan' => 'selesai']);
		$this->data['data']		= $this->Testimonial_m->get(['id_customer' => $this->data['id_user']]);
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
			redirect('user/profil','refresh');
			exit;
		}
		$this->data['data'] = $this->User_m->get_row(['id_user' => $this->data['id_user']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'profil';
		$this->template($this->data, $this->module);
	}

	public function ganti_password()
	{
		if ($this->POST('simpan')) {
			if ($this->POST('password') != $this->POST('repassword')) {
				redirect('user/profil','refresh');
				exit;
			}
			$this->User_m->update($this->data['id_user'],[
				'password'		=> md5($this->POST('password')),
			]);
			redirect('user/profil','refresh');
			exit;
		}
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function bukti()
	{
		$this->load->model('Pembayaran_m');
		if ($this->POST('submit')) {
			$this->Pembayaran_m->insert([
				'id_order'	=> $this->POST('order_id')
			]);
			if ($this->upload($this->POST('order_id') ,'assets/bukti' , 'foto')){
				$this->flashmsg('bukti pembayaran berhasil di upload , silahkan menunggu konfirmasi admin','success');
			}
			else {
				$this->flashmsg('bukti pembayaran gagal di upload','danger');
			}
			redirect('home/bukti','refresh');
			exit;
		}
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'upload_bukti';
		$this->template($this->data, $this->module);
	}
}