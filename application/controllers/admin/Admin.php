<?php

// include_once APPPATH . '/libraries/pdf.php';

defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	private $username;
	private $all_categories;

	function __construct()
	{
		parent::__construct();

		$this->load->library('ion_auth');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {

			$this->session->set_flashdata('message', 'You must be a gangsta to view this page');
			redirect('/', 'refresh');
		}

		$this->load->helper(['url', 'typography', 'global', 'file']);

		$this->load->model('admin_model');
	}


	public function index()
	{
		// $username = $this->session->userdata('username');

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

			$id =	$this->admin_model->insertCategoryOrProduct($post['category'], $post);

			// if(isset($post['file']) && !empty($post['file']) ){
			// 	pre_r($post);
			// 	$this->do_upload($post['file']);
			// }
		}


		$all_categories = $this->getAndSeparateCategories();

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('admin/add-category');
	}

	private function do_upload($file)
	{
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload()) {
			$data = array('upload_data' => $this->upload->data());
			// $this->load->view('upload_success', $data);
		} else {
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('custom_view', $error);
		}
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
