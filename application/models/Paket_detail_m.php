<?php defined('BASEPATH') || exit('No direct script allowed');

class Paket_detail_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'paket_detail';
		$this->data['primary_key'] = 'id_detail_paket';
	}
}

