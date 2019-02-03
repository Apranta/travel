<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	private $data = [];

  	public function __construct()
	{
	    parent::__construct();	
	    $username 	= $this->session->userdata('username');
	    $id_role	= $this->session->userdata('id_role');
	    // var_dump($username);exit;
		if (isset($username, $id_role))
		{
			switch ($id_role) 
			{
				case 1:
					redirect('admin');
					break;

				case 2:
					redirect('home');
					break;

				default:
					redirect('home');
					break;
			}

		}
  	}


  	public function index()
  	{
  		if ($this->POST('login-submit'))
		{
			$this->load->model('User_m');
			if (!$this->User_m->required_input(['username','password'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('login');
				exit;
			}
			
			$this->data = [
    			'username'	=> $this->POST('username'),
    			'password'	=> md5($this->POST('password'))
			];

			$result = $this->User_m->login($this->data);
			// var_dump($result);exit;
			if (!isset($result)) 
			{
				$this->flashmsg('Username atau password salah atau anda belum mengkonfirmasi email pendaftaran','danger');
			}
			redirect('login');
			exit;
		}
		$this->data['title'] 		= 'Login';
		$this->data['global_title'] = $this->title;
		$this->load->view('login',$this->data);
	}

	public function register()
	{
		if ($this->POST('register-submit'))
		{
			$this->load->model('User_m');
			$password = $this->POST('password');
			$rpassword = $this->POST('rpassword');
			if ($password !== $rpassword)
			{
				$this->flashmsg('Pendaftaran gagal.', 'danger');
				redirect('login');
			}

			$this->data['pengguna'] = [
				'username'	=> $this->POST('username'),
				'password'	=> md5($password),
				'nama'		=> $this->POST('nama'),
				'email'		=> $this->POST('email'),
				'kontak'	=> $this->POST('kontak'),
				'id_role'	=> 2,
				'alamat'	=> $this->POST('alamat')
			];

			$this->User_m->insert($this->data['pengguna']);
			$this->sendMail($this->POST('email'), 'Account Konfirmasi Titan Tour Travel', 'Pendaftaran akun pada Website Titan Tour Travel telah berhasil. Silahkan Konfirmasi Akun anda <a href="'. base_url('login/konfirmasi/').'/'.md5($this->POST('username')).'"> Disini </a></b>.');
			$this->flashmsg('Pendaftaran berhasil. Silahkan Konfirmasi untuk mengaktifkan akun anda');
			redirect('login');
		}
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

    public function konfirmasi()
    {
		$this->load->model('User_m');
    	$this->data['username'] = $this->uri->segment(3);
    	$this->check_allowance(!isset($this->data['username']));
    	if ($this->User_m->konfirmasi($this->data['username']) == true) {
    		$this->flashmsg('Konfirmasi berhasil. Silahkan Login akun anda');
			redirect('login');
			exit;
    	}
    	$this->flashmsg('Konfirmasi gagal. akun anda tidak ditemukan');
		redirect('login');
		exit;
    }
}
