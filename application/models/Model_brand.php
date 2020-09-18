<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_brand extends CI_Model {   
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function model_get_all_brand()
    {
        $this->db->from('m_barand');
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }
 
}