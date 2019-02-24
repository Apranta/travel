<?php defined('BASEPATH') || exit('No direct script allowed');

class About_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'about';
		$this->data['primary_key'] = 'id_about';
	}
}

