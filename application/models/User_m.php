<?php defined('BASEPATH') || exit('No direct script allowed');

class User_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'user';
		$this->data['primary_key'] = 'id_user';
	}

	public function login($data)
	{
		$user = $this->get_row(['username' => $data['username'], 'password' => $data['password'] , 'confirmed' => 'confirmed']);
		
		if ($user)
		{
			$this->session->set_userdata([
				'id_user'	=> $user->id_user,
				'username'		=> $user->username,
				'id_role'	=> $user->id_role
			]);
		}

		return $user;
	}

	public function konfirmasi($username)
	{
		$user = $this->get(['confirmed' => 'waiting']);
		foreach ($user as $u) {
			if (md5($u->username) == $username) {
				$this->update($u->id_user , ['confirmed' => 'confirmed']);
				return true;
			}
		}
		return false;
	}
}

