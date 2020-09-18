<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_home extends CI_Model {   
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function model_get_all_hot_list_data()
    {
        $this->db->from('m_barang');
        $this->db->join('m_foto_barang', 'm_barang.id_barang = m_foto_barang.id_barang');
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }
 
}