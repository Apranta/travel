<?php

	$this->load->view('includes/header', array('title' => $title));
	$this->load->view($content, $contentData);
	$this->load->view('includes/footer');

?>