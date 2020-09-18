<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_kursus extends CI_Model {   

 

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

    }



    public function get_by_id_murid($id_murid)

    {

        $this->db->select('

                `m_student`.`id_student`, 

                `t_kursus`.`id_kursus`, 

                `m_materi`.`id_materi`, 

                `m_mentor`.`id_mentor`, 

                `m_kategori`.`id_kategori`, 

                `m_materi`.`materi`, 

                `m_materi`.`harga`, 

                `m_user`.`nama`, 

                `m_kategori`.`nama_kategori`,

                `m_materi`.`background` 

            ');

        $this->db->from('t_kursus');

        $this->db->join('m_student', 'm_student.id_student = t_kursus.id_student');

        $this->db->join('m_user', 'm_user.id_user = m_student.id_user');

        $this->db->join('m_materi', 'm_materi.id_materi = t_kursus.id_materi');

        $this->db->join('m_mentor', 'm_mentor.id_mentor = m_materi.id_mentor');

        $this->db->join('m_kategori', 'm_kategori.id_kategori = m_materi.id_kategori');

        $this->db->where('t_kursus.status','1');

        $this->db->where('t_kursus.status','1');

        $this->db->where('m_student.id_student',$id_murid);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    public function cek_by_id_murid_id_matapelajaran($id_matapelajaran, $id_murid)

    {

        $this->db->select('

                `m_student`.`id_student`, 

                `t_kursus`.`id_kursus`, 

                `m_materi`.`id_materi`, 

                `m_mentor`.`id_mentor`,

                `m_materi`.`materi`,

                `m_materi`.`harga`, 

                `m_user`.`nama`

            ');

        $this->db->from('t_kursus');

        $this->db->join('m_student', '`m_student`.`id_student` = `t_kursus`.`id_student`');

        $this->db->join('m_user', 'm_user.id_user = m_student.id_user');

        $this->db->join('m_materi', '`m_materi`.`id_materi` = `t_kursus`.`id_materi`' );

        $this->db->join('m_mentor', '`m_mentor`.`id_mentor` = `m_materi`.`id_mentor`');

        // $this->db->join('m_kategori', '`m_kategori`.`id_kategori` = `m_materi`.`id_kategori`');

        $this->db->where('t_kursus.status','1');

        $this->db->where('t_kursus.id_student',$id_murid);

        $this->db->where('t_kursus.id_materi',$id_matapelajaran);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }

 

    public function save($table, $data)

    {

        $this->db->insert($table, $data);

        return $this->db->insert_id();

    }

 

}