<?php defined('BASEPATH') || exit('No direct script allowed');

class Gallery_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'gallery';
		$this->data['primary_key'] = 'id_gallery';
	}
}

