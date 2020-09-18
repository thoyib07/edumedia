<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_pelajaran extends CI_Model {   

 

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

    }

    

    public function save($table, $data)

    {

        $this->db->insert($table, $data);

        return $this->db->insert_id();

    }

 

    public function get_by_id_sub_materi_id_murid($id_sub_materi, $id_student)

    {

        $this->db->from('t_pelajaran');

        $this->db->where('id_sub_materi',$id_sub_materi);

        $this->db->where('id_student',$id_student);

        $query = $this->db->get();

 

        return $query->row();

    }

 

}