<?php


defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{

	private $navigation_categories;
	private $all_categories;
	private $categories;
	private $cart_products;
	private $item_array_id;
	private $item_array;
	private	$sub_categories;

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



	public function showProducts($slug, $slug2 = null)
	{

		//if item is added to cart
		if ($post = $this->input->post()) {

			$this->addToCart($post);
		}

		$all_categories = $this->getAndSeparateCategories();

		//if slug 2 show products by subcategory, else show all 
		if (isset($slug2) && !empty($slug2)) {
			$data['products'] = $this->main_model->getProductsBySubcategory($slug2);
		} else {
			$data['products'] =	$this->main_model->getProducts($slug);
		}

		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('products/products', $data);
	}

	private function addToCart($post)
	{

		if (isset($_SESSION['cart'])) {

			$item_array_id = array_column($_SESSION['cart'], "product_id");

			if (in_array($post['product_id'], $item_array_id)) {
				echo "<script>alert('Produkt už je v košíku..!')</script>";
				echo "<script>window.location = 'index.php'</script>";
			} else {

				$count = count($_SESSION['cart']);

				$item_array = array(
					'product_id' => $post['product_id']
				);

				$_SESSION['cart'][] = $item_array;
			}
		} else {

			$item_array = [
				'product_id' => $post['product_id']
			];


			// Create new session variable
			$_SESSION['cart'][0] = $item_array;
		}
	}

	public function cart()
	{


		if ($post = $this->input->post()) {
			if (isset($post['remove'])) {
				$this->deteleFromCart($post['product_id']);
			}
		}

		$all_categories = $this->getAndSeparateCategories();

		$cart_products = [];
		if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

			foreach ($_SESSION['cart'] as $product_id) {

				$cart_products[] = $this->main_model->getCartProducts($product_id['product_id']);
			}
		}

		$data['cart_products'] = $cart_products;
		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('products/cart', $data);
	}

	private function deteleFromCart($post_id)
	{

		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['product_id'] == $post_id) {
				unset($_SESSION['cart'][$key]);
				echo "<script>alert('Produkt bol odobratý z košíku..!')</script>";
				echo "<script>widnow.location='index.php'</script>";
			}
		}
	}



	public function showProduct($slug)
	{

		$all_categories = $this->getAndSeparateCategories();

		if (isset($slug) && !empty($slug)) {
			$data['product'] = $this->main_model->getProduct($slug);
		} else {
			$data['product'] =	[];
		}



		$data['nav_categories'] = $all_categories['nav_categories'];
		$data['categories'] = $all_categories['categories'];

		$this->load->view('_partials/header', $data);
		$this->load->view('products/product', $data);
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
}
