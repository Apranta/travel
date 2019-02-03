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
			if (!isset($result)) 
			{
				$this->flashmsg('Username atau password salah','danger');
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
			$this->flashmsg('Pendaftaran berhasil. Silahkan login');
			redirect('login');
		}
	}
}
