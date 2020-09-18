<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_login extends CI_Model {   

    var $column_order = array();   

    var $column_search = array();     

    var $order = array(); 

 

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

    }



    public function cek_login($email, $password)

    {

        $this->db->from('m_user');
        
        $this->db->join('m_student', 'm_user.id_user = m_student.id_user');

        $this->db->where('email',$email);

        $this->db->where('password',$password);

        $this->db->where('m_user.status','1');

        $query = $this->db->get()->row();

        // var_dump($this->db->last_query());

        // exit;

        return $query;   

    }



    public function get_by_id_murid($id_murid)

    {

        $this->db->from('m_student');
        
        $this->db->join('m_user', 'm_user.id_user = m_student.id_user');

        $this->db->where('id_student',$id_murid);

        // $this->db->where('status','1');

        $query = $this->db->get()->row();

        // var_dump($this->db->last_query());

        // exit;

        return $query;   

    }

}