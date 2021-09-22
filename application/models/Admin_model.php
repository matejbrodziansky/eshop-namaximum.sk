<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function getCategories()
    {
        return $this->db->select('*')
        ->from('category')
        ->get()
        ->result_array();
    }


    public function insertCategoryOrProduct($table, $data)
    {       
        unset($data['category']);

        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

}
