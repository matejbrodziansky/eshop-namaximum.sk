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
    
        public function getProducts()
        {
            return $this->db->select('*')
            ->from('products')
            ->get()
            ->result_array();
        }

    public function getProductsBySlug($slug)
    {

        return $this->db->select('*')
            ->from('products')
            ->where('slug',$slug)
            ->get()
            ->result_array();
    }
}
