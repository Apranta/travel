<?php defined('BASEPATH') || exit('No direct script allowed');

class Order_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'order';
		$this->data['primary_key'] = 'order_id';
	}

	public function getMonth($bulan)
	{
		$this->db->query("SELECT * FROM '" . $this->data['table_name'] ."'  WHERE MONTH('0000-0". $bulan."-00')");
		return $query->result();
	}
}

