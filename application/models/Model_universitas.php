<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_universitas extends CI_Model {   

 

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

    }



    public function get_all_aktif()

    {

        $this->db->from('m_universitas');

        $this->db->where('status','1');

        $this->db->where('id_parent', null);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    public function get_by_id_kategori($id_kategori)

    {

        $this->db->from('m_kategori');

        $this->db->where('status','1');

        $this->db->where('id_parent', $id_kategori);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }

 

}