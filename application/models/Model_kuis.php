<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_kuis extends CI_Model {   

 

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

 

    public function get_by_id_materi($id_sub_materi)

    {

        $this->db->from('m_soal');

        $this->db->where('id_sub_materi',$id_sub_materi);

        $this->db->where('status', '1');

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;  

        return $query;

    }

 

    public function get_jawaban_by_id_soal($id_soal)

    {

        $this->db->from('m_jawaban');

        $this->db->where('id_soal',$id_soal);

        $query = $this->db->get();

 

        return $query->result();

    }

 

    public function get_by_id_soal($id_soal)

    {

        $this->db->from('m_soal');

        $this->db->where('id_soal',$id_soal);

        $query = $this->db->get();

 

        return $query->row();

    }

 

    public function get_materi_by_id_sub_materi_id_user($id_sub_materi, $id_student)

    {

        $this->db->from('t_pelajaran');

        $this->db->join('m_sub_materi', 'm_sub_materi.id_sub_materi = t_pelajaran.id_sub_materi');

        $this->db->where('m_sub_materi.id_sub_materi',$id_sub_materi);

        $this->db->where('t_pelajaran.id_student',$id_student);

        $query = $this->db->get()->row();

        // var_dump($this->db->last_query());

        // exit; 

        return $query;

    }

 

}