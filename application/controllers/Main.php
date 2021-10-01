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
		$this->load->view('_partials/footer');
	}



	public function showProducts($slug, $slug2 = null)
	{


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
		$this->load->view('_partials/footer');
	}

	public function addToCart($id)
	{

		if (isset($_SESSION['cart'])) {


			$item_array_id = array_column($_SESSION['cart'], "product_id");

			if (in_array($id, $item_array_id)) {
				$response['status'] = '1';
			} else {

				$response['status'] = '2';
				$count = count($_SESSION['cart']);

				$item_array = array(
					'product_id' => $id
				);

				$_SESSION['cart'][] = $item_array;
			}
		} else {
			$response['status'] = '3';

			$item_array = [
				'product_id' => $id
			];

			// Create new session variable
			$_SESSION['cart'][0] = $item_array;
		}



		echo json_encode($response);
	}

	public function cart()
	{

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
		$this->load->view('_partials/footer');
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

	public function removeFromCart($product_id)
	{

		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['product_id'] == $product_id) {
				unset($_SESSION['cart'][$key]);
				$response['status'] = 1;
			}
		}

		echo json_encode($response);
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
		$this->load->view('_partials/footer');
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
