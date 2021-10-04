<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Admin
$route['admin'] = 'admin/Admin';
$route['admin/showcategories'] = 'admin/Admin/showCategories/';
$route['admin/create'] = 'admin/Admin/create/';
$route['admin/createcategory'] = 'admin/Admin/createcategory';
$route['admin/delete/(:any)/(:num)'] = 'admin/Admin/delete/$1/$2';

//Public
$route['kategoria/(:any)'] = 'Main/showProducts/$1';
$route['kategoria/product/(:any)'] = 'Main/showProduct/$1';
$route['kategoria/product/(:any)'] = 'Main/showProduct/$1';
$route['kategoria/(:any)/(:any)'] = 'Main/showProducts/$1/$2';
$route['kategoria/(:any)/(:any)'] = 'Main/showProducts/$1/$2';
$route['product/details/(:any)'] = 'Main/detailsOfProduct/$1';

//cart
$route['cart'] = 'Main/cart';
$route['product/addtocart/(:num)'] = 'Main/addToCart/$1';
$route['product/removefromcart/(:num)'] = 'Main/removeFromCart/$1';