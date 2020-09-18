<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_registrasi_guru extends CI_Model {   
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function update($where, $data)
    {
        $this->db->update('m_guru', $data, $where);
        return $this->db->affected_rows();
    }
 
    public function save($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
 
}