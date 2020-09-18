<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_injeksi extends CI_Model {   
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function update($table, $where, $data)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function save($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
 
    public function get_by_id($id)
    {
        $this->db->from('m_injeksi');
        $this->db->where('id_injeksi',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
}