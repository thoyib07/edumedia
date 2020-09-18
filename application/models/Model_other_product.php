<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_other_product extends CI_Model {   
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function model_get_all_other_product_data()
    {
        $this->db->from('m_barang');
        $this->db->join('m_foto_barang', 'm_barang.id_barang = m_foto_barang.id_barang');
        $this->db->group_by('m_foto_barang.id_barang');
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function model_get_detail_list_product_by_id_product_data($id_product)
    {
        $this->db->from('m_barang');
        $this->db->join('m_foto_barang', 'm_barang.id_barang = m_foto_barang.id_barang');
        $this->db->where('m_barang.id_barang',$id_product);
        $query = $this->db->get()->row();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }
 
}