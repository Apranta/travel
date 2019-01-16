<?php defined('BASEPATH') || exit('No direct script allowed');

class Order_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'order';
		$this->data['primary_key'] = 'order_id';
	}
}

