<?php

// include_once APPPATH . '/libraries/pdf.php';

defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'typography', 'global', 'file']);

		$this->load->model('admin_model');
	}


	public function index()
	{

		$all_categories = $this->getAndSeparateCategories();

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('admin/index');
	}

	public function showCategories()
	{

		$all_categories = $this->getAndSeparateCategories();

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('admin/show-category');
	}

	public function create()
	{


		if ($post = $this->input->post()) {

			$_id =	$this->admin_model->insertCategoryOrProduct($post['category'], $post);
		}


		$all_categories = $this->getAndSeparateCategories();

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('admin/add-category');
	}


	public function delete($slug, $slug2)
	{
		$this->admin_model->deleteCategory($slug, $slug2);

	}

	private function getAndSeparateCategories()
	{

		$all_categories = $this->admin_model->getCategories();

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
}
