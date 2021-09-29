<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Main_model extends CI_Model
{

    public function getCategories()
    {
        return $this->db->select('*')
            ->from('category')
            ->get()
            ->result_array();
    }

    public function getSubCategories()
    {
        return $this->db->select('*')
            ->from('subcategory')
            ->get()
            ->result_array();
    }

    public function getProductsBySubcategory($slug)
    {
        return $this->db->select('*')
            ->from('product')
            ->where('subcategory', $slug)
            ->get()
            ->result_array();
    }


    public function getProducts($slug)
    {

        return $this->db->select('*')
            ->from('product')
            ->where('slug', $slug)
            ->get()
            ->result_array();
    }

    public function getProduct($id)
    {

        return $this->db->select('*')
            ->from('products')
            ->where('id', $id)
            ->get()
            ->result_array();
    }

    public function getCartProducts($id)
    {

        return $this->db->select('*')
            ->from('product')
            ->where('id', $id)
            ->get()
            ->result_array();
    }
}
