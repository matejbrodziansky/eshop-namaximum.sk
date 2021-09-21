<?php

// include_once APPPATH . '/libraries/pdf.php';

defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'typography', 'global', 'file']);

		$this->load->model('Main_model');

	}


	public function index()
	{

		$data['products'] = $this->model->getProducts();

		$this->load->view('_partials/header', $data);
		$this->load->view('home');
	}

	

	public function productsCategory($slug)
	{
		$data = array(
			'products' => $slug
		);

		$this->load->view('_partials/header');
		$this->load->view('products/category', $data);

	}
}
