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

}
