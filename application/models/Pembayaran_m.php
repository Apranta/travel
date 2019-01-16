<?php defined('BASEPATH') || exit('No direct script allowed');

class Pembayaran_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'pembayaran';
		$this->data['primary_key'] = 'id_pembayaran';
	}
}

