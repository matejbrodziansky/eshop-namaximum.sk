<?php


defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{

	// public $navigation_categories;
	// public $all_categories;
	// public $categories;

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(['url', 'typography', 'global', 'file']);

		$this->load->model('main_model');
	}


	public function index()
	{

		$all_categories = $this->getAndSeparateCategories();

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('home');
	}



	public function productsCategory($slug)
	{

		$all_categories = $this->getAndSeparateCategories();

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];
		$data['products'] = $slug;

		$this->load->view('_partials/header', $data);
		$this->load->view('products/category', $data);
	}



	private function getAndSeparateCategories()
	{

		$all_categories = $this->main_model->getCategories();

		foreach ($all_categories as $category) {
			if ($category['navigation_id'] == 0) {
				$navigation_categories[] = $category;
			} else {
				$categories[] = $category;
			}
		}

		$data['nav_categories'] = $navigation_categories;
		$data['categories'] = $categories;

		return $data;
	}

	public function create()
	{
		// if(isset($_POST)){

		if ($post = $this->input->post()) {

			pre_r($post);
		}


		$all_categories = $this->getAndSeparateCategories();

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('admin/add-category');
	}
}
