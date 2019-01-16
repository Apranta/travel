<?php defined('BASEPATH') || exit('No direct script allowed');

class Paket_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'paket';
		$this->data['primary_key'] = 'id_paket';
	}
}

