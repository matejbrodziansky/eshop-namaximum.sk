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



	public function productsCategory($slug, $slug2 = null)
	{

		$all_categories = $this->getAndSeparateCategories();

		if (isset($slug2) && !empty($slug2)) {
			$data['products'] = $this->main_model->getProductsBySlug($slug2);
		} else {
			$data['products'] =	$this->main_model->getProducts($slug);
		}



		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('products/products', $data);
	}



	private function getAndSeparateCategories()
	{

		$all_categories = $this->main_model->getCategories();
		$sub_categories = $this->main_model->getSubCategories();


		//Separate to navbar category(supplements,clothes) and category after dropwdown (amino acids, proteins)
		foreach ($all_categories as $key => $category) {
			if ($category['navigation_id'] == 0) {
				$navigation_categories[] = $category;
			} else {
				$categories[] = $category;
			}
		}


		// Set to catategory subcategory like Proteins(type of proteins like night, whey)
		foreach ($categories as $key => $category) {
			$categories[$key]['subcategory'] = [];
			foreach ($sub_categories as $key_two => $sub_category) {
				if ($category['id'] == $sub_category['parent_id']) {
					$categories[$key]['subcategory'][] = $sub_category;
				}
			}
		}

		$data['nav_categories'] = $navigation_categories;
		$data['categories'] = $categories;

		return $data;
	}

	public function create()
	{

		if ($post = $this->input->post()) {
		}


		$all_categories = $this->getAndSeparateCategories();

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('admin/add-category');
	}
}
