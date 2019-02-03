<?php 

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'home';
		$this->load->model('Testimonial_m');
		$this->load->model('Produk_m');
		$this->load->model(['Gallery_m' , 'Paket_m']);
		$this->session->unset_userdata('id_order');
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

	public function pemesanan()
	{
		$this->data['id_produk'] = $this->GET('id_produk');
		$this->data['id_paket'] = $this->GET('id_paket');
		$this->check_allowance(!isset($this->data['id_produk'],$this->data['id_paket']));
		$this->data['data'] = $this->Paket_m->getDataJoinRow(['produk'] , ['id_produk' , 'id_produk']);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'pemesanan';
		$this->template($this->data, $this->module);
	}

	public function pesan()
	{
		$this->load->model('Order_m');
		if ($this->POST('submit')) {
			$username = $this->session->userdata('username');
			if(!isset($username)){
				redirect('login','refresh');
				$this->flashmsg('Anda Harus Login Terlebih Dahulu untuk melakukan pemesanan');
				exit;
			}
			$dat = [
				'order_id'		=> $this->__generate_random_id(),
				'customer_id'	=> $this->session->userdata('id_user'),
				'order_date'	=> date("Y-m-d"),
				'id_paket'		=> $this->POST('id_paket'),
				'qty'			=> $this->POST('jumlah'),
				'total'			=> $this->POST('total')
			];
			$this->Order_m->insert($dat);
			$this->session->set_userdata( ['id_order' => $dat['order_id']] );
			redirect('home/pesan','refresh');
			exit;
		}
		$this->data['id_order'] = $this->session->userdata('id_order');
		$this->check_allowance(!isset($this->data['id_order']));
		$this->data['data']		= $this->Order_m->get_row(['order_id' => $this->data['id_order']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'pemesanan_berhasil';
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