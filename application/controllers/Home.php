<?php 

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'home';
		$this->load->model('Testimonial_m');
		$this->load->model('Produk_m');
		$this->load->model(['Gallery_m' , 'Paket_m' , 'Order_m' , 'User_m' , 'Norek_m']);
		// $this->session->unset_userdata('id_order');
	}

	public function index()
	{
		$this->data['data']	= $this->Produk_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function domestik()
	{
		$this->data['data']	= $this->Produk_m->get(['jenis' => "domestic"]);
		$this->data['title']	= 'Domestik';
		$this->data['content']	= 'domestik';
		$this->template($this->data, $this->module);
	}

public function internasional()
	{
		$this->data['data']	= $this->Produk_m->get(['jenis' => "internasional"]);
		$this->data['title']	= 'Domestik';
		$this->data['content']	= 'internasional';
		$this->template($this->data, $this->module);
	}
	public function gallery()
	{
		$this->data['data']	= $this->Gallery_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'gallery';
		$this->template($this->data, $this->module);
	}

	public function detail_gallery()
	{
		$this->data['id']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id']));
		$this->data['data']	= $this->Gallery_m->get_row(['id_gallery' => $this->data['id']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_gallery';
		$this->template($this->data, $this->module);
	}

	public function testimoni()
	{
		// echo json_encode($this->Order_m->getDataJoinRow(['paket'] , ['id_paket']));
		// exit;
		$this->data['data']	= $this->Testimonial_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'testimoni';
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
		$this->data['data'] = $this->Paket_m->getDataJoinRow(['produk'] , ['id_produk' , 'id_produk'] , ['paket.id_paket' => $this->data['id_paket'] ]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'pemesanan';
		// $this->dump($this->data);exit;
		$this->template($this->data, $this->module);
	}

	public function pesan()
	{
		$this->load->model('Order_m');
		if ($this->POST('submit')) {
			$role = $this->session->userdata('id_role');
			$this->check_allowance($role != 2 , ['Kamu Login Bukan Sebagai User , silahkan login sebagai user', 'danger']);
			$username = $this->session->userdata('username');
			// echo $username;
			// exit;
			$this->check_allowance(!isset($username));
			
			$this->session->unset_userdata('id_order');
			$dat = [
				'order_id'		=> $this->__generate_random_id(),
				'customer_id'	=> $this->session->userdata('id_user'),
				'order_date'	=> date("Y-m-d"),
				'id_paket'		=> $this->POST('id_paket'),
				'qty'			=> $this->POST('jumlah'),
				'total'			=> $this->POST('total')
			];
			$this->Order_m->insert($dat);
			$email = $this->User_m->get_row(['id_user' => $this->session->userdata('id_user')])->email;
			$this->data['data'] = $this->Paket_m->getDataJoinRow(['produk'] , ['id_produk' , 'id_produk'] , ['paket.id_paket' => $dat['id_paket'] ]);
			$this->sendMail($email, 'Rincian Pemesanan Paket Perjalanan Titan Tour Travel', 'Pemesanan Perjalanan Anda adalah sebagai berikut : <br><b> Id Order : ' . $dat['order_id'] . '<br> Paket Perjalanan : ' . $this->data['data']->nama_produk .'<br> </b> segera lakukan pembayaran untuk melanjutkan pemesanan');
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

	public function about()
	{
		$this->load->model('About_m');
		$this->data['data']	= $this->About_m->get_last_row();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'about';
		$this->template($this->data, $this->module);
	}

	private function sendMail($address, $subject, $body)
    {
        $this->load->library('CI_PHPMailer/ci_phpmailer');
        try 
        {
            $this->ci_phpmailer->setServer('smtp.gmail.com');
            $this->ci_phpmailer->setAuth('testdevsmail@gmail.com', '4kuGanteng');
            $this->ci_phpmailer->setAlias('no-reply@titantourtravel.com', 'No Reply');
            $this->ci_phpmailer->sendMessage($address, $subject, $body);    
        } 
        catch (Exception $e)
        {
            $this->ci_phpmailer->displayError();
        }
    }
}