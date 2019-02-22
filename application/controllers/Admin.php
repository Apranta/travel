<?php 
 
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';

		$this->data['id_user'] 	= $this->session->userdata('id_user');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
		if (!isset($this->data['id_user'], $this->data['username'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 1)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai admin untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}
		$this->load->model('Testimonial_m');
		$this->load->model('Produk_m');
		$this->load->model(['Gallery_m' , 'Paket_m','Order_m' , 'User_m']);
	    $this->data['user']		= $this->User_m->get(['id_role' => 2]);
	}

	public function index()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_paket()
	{
		if ($this->POST('delete')) {
			$this->Produk_m->delete($this->POST('id'));
			exit;
		}
		$this->data['data']	= $this->Produk_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'data_produk';
		$this->template($this->data, $this->module);
	}

	public function tambah_jenis_paket()
	{
		if ($this->POST('simpan')) {

			$this->Paket_m->insert([
				'nama_paket'	=> $this->POST('nama'),
				'deskripsi'		=> $this->POST('deskripsi'),
				'harga'			=> $this->POST('harga'),
				'id_produk' 		=> $this->POST('id_produk')
			]);

			// $this->upload($this->db->insert_id() ,'/assets/img/' , 'foto');

			$this->flashmsg('Berhasil di tambah');
			redirect('admin/detail_paket/'. $this->POST('id_produk'),'refresh');
			exit;
		}
		$this->data['id_produk'] = $this->uri->segment(3);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tambah_jenis';
		$this->template($this->data, $this->module);
	}

	public function tambah_paket()
	{
		if ($this->POST('simpan')) {

			$this->Produk_m->insert([
				'nama_produk'	=> $this->POST('nama'),
				'deskripsi'		=> $this->POST('deskripsi'),
				// 'stok'			=> $this->POST('stok'),
				'jenis'			=> $this->POST('jenis'),
				'jadwal' 		=> $this->POST('jadwal'),
				'jadwal_berangkat' => $this->POST('tanggal')
			]);

			$this->upload($this->db->insert_id() ,'/assets/img/' , 'foto');

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
		$id_produk = $this->uri->segment(3);
		$this->check_allowance(!isset($id_produk));
		$this->data['data']		= $this->Produk_m->get_row(['id_produk' => $id_produk]);
		$this->data['paket']	= $this->Paket_m->get(['id_produk' => $id_produk]);
		// var_dump($this->data['data']);exit;
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_paket';
		$this->template($this->data, $this->module);
	}

	public function data_gallery()
	{
		$action = $this->GET('action');
		$id = $this->GET('id');
		if ($action == 'hapus') {
			$this->Gallery_m->delete($id);
			redirect('admin/data-gallery','refresh');
			exit;
		}
		if ($this->POST('simpan')) {
			// var_dump($_FILES);
			// exit;
			// 
					for ($i = 0; $i < count($_FILES['foto']['name']); $i++)
					{
						$_FILES['fotoo']['name']= $_FILES['foto']['name'][$i];
			            $_FILES['fotoo']['type']= $_FILES['foto']['type'][$i];
			            $_FILES['fotoo']['tmp_name']= $_FILES['foto']['tmp_name'][$i];
			            $_FILES['fotoo']['error']= $_FILES['foto']['error'][$i];
			            $_FILES['fotoo']['size']= $_FILES['foto']['size'][$i];
			            $f = str_replace(" ","", $_FILES['fotoo']['name']);
			            $fto = explode(".", $f);
						$ft[]= $fto[0];
						$this->upload($fto[0] ,'/assets/gallery/' , 'fotoo');
					}
			$this->Gallery_m->insert([
				'nama'	=> $this->POST('nama'),
				'jenis'	=> $this->POST('jenis'),
				'image'	=> json_encode($ft),
				'deskripsi' => $this->POST('deskripsi')
			]);

					

			$this->flashmsg('Berhasil di tambah');
			redirect('admin/data_gallery','refresh');
			exit;
		}	
		$this->data['gallery'] = $this->Gallery_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'gallery';
		$this->template($this->data, $this->module);
	}

	public function data_testimonial()
	{
		$action = $this->GET('action');
		$id = $this->GET('id');
		if ($action == 'hapus') {
			$this->Testimonial_m->delete($id);
			redirect('admin/data_testimonial','refresh');
			exit;
		}
		$this->data['testimoni'] = $this->Testimonial_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'testimoni';
		$this->template($this->data, $this->module);
	}

	public function data_pemesanan()
	{
		$this->load->model('Order_m');
		$this->load->model('User_m');
		$this->load->model('Produk_m');
		$this->data['data']		= $this->Order_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'data_pemesanan';
		$this->template($this->data, $this->module);
	}

	public function pemesanan_detail()
	{
		$this->load->model('Order_m');
		$this->load->model('User_m');
		$this->load->model('Produk_m');
		$this->load->model('Pembayaran_m');
		if ($this->POST('konfirm')) {
			$this->Order_m->update($this->POST('id') , ['payment_status' => 'paid']);
			$this->Pembayaran_m->update_where(['id_order' => $this->POST('id')] , ['status' => 'konfirm']);
		}
		$this->data['id']		= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));
		$this->data['data']		= $this->Order_m->get_row(['order_id' => $this->data['id']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_pesanan';
		$this->template($this->data, $this->module);
	}

	public function history_pembayaran()
	{
		$this->load->model('Order_m');
		$this->load->model('User_m');
		$this->load->model('Produk_m');
		$this->load->model('Pembayaran_m');
		$this->data['data']		= $this->Pembayaran_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'data_pembayaran';
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
			redirect('admin/profil','refresh');
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
				redirect('admin/profil','refresh');
				exit;
			}
			$this->User_m->update($this->data['id_user'],[
				'password'		=> md5($this->POST('password')),
			]);
			redirect('admin/profil','refresh');
			exit;
		}
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}
}