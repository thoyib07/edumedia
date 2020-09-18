<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_mentor extends CI_Model {   

 

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

    }


    public function model_get_mentor_aktif()

    {

        $this->db->from('m_mentor');

        $this->db->join('m_user', 'm_user.id_user = m_mentor.id_user');

        $this->db->where('m_mentor.`status`','1');

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }


    public function get_by_id($id_mentor)

    {

        $this->db->from('m_mentor');

        $this->db->join('m_user', 'm_user.id_user = m_mentor.id_user');

        $this->db->where('m_mentor.`status`','1');

        $this->db->where('m_mentor.id_mentor', $id_mentor);

        $query = $this->db->get()->row();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }

 

}