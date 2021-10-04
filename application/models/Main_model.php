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

    public function getProduct($slug)
    {

        $data = $this->db->select('*')
            ->from('product')
            ->where('slug_two', $slug)
            ->get()
            ->row_array();

        $data['details'] = $this->db->select('*')
            ->from('datails_of_product')
            ->where('parent_id', $data['id'])
            ->get()
            ->row_array();

        return $data;
    }


    public function getCartProducts($id)
    {

        return $this->db->select('*')
            ->from('product')
            ->where('id', $id)
            ->get()
            ->result_array();
    }

    public function getProductDetails($slug_two)
    {

        return $this->db->select('*')
            ->from('product')
            ->where('slug_two', $slug_two)
            ->get()
            ->row_array();
    }
}
