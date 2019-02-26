<?php defined('BASEPATH') || exit('No direct script allowed');

class Norek_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'norek';
		$this->data['primary_key'] = 'id_norek';
	}
}

