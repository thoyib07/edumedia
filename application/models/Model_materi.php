<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_materi extends CI_Model {   

 

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

    }


    public function materi_by_id_sub_kategori($id_sub_kategori)

    {

        $this->db->from('m_materi');

        $this->db->join('m_mentor', 'm_mentor.id_mentor = m_materi.id_mentor');
        
        $this->db->join('m_user', 'm_user.id_user = m_mentor.id_user');

        $this->db->where('m_materi.id_kategori', $id_sub_kategori);

        $this->db->where('m_materi.status','1');

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }


    public function materi_by_id_prodi($id_prodi)

    {

        $this->db->from('m_materi');

        $this->db->join('m_mentor', 'm_mentor.id_mentor = m_materi.id_mentor');
        
        $this->db->join('m_user', 'm_user.id_user = m_mentor.id_user');

        $this->db->where('m_materi.id_program_studi', $id_prodi);

        $this->db->where('m_materi.status','1');

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }


    public function get_sub_materi_by_id_materi($id_materi)

    {

        $this->db->from('m_materi');

        $this->db->join('m_sub_materi', 'm_sub_materi.id_materi = m_materi.id_materi');

        $this->db->where('m_materi.id_materi', $id_materi);

        $this->db->where('m_sub_materi.id_parent', '0');

        $this->db->where('m_sub_materi.status', '1');

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }


    public function get_sub_materi_by_id_materi_all($id_materi)

    {

        $this->db->from('m_sub_materi');

        $this->db->join('m_materi', 'm_materi.id_materi = m_sub_materi.id_materi');

        $this->db->where('m_materi.id_materi', $id_materi);

        $this->db->where('m_sub_materi.id_parent !=', null);

        $this->db->where('m_sub_materi.status', '1');

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }


    public function get_sub_materi_by_id_parent($id_sub_materi)

    {

        $this->db->from('m_materi');

        $this->db->join('m_sub_materi', 'm_sub_materi.id_materi = m_materi.id_materi');

        $this->db->where('m_sub_materi.id_parent', $id_sub_materi);

        $this->db->where('m_sub_materi.status', '1');

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    // public function get_all_child($id_matapelajaran, $id_murid)

    // {

    //     $this->db->select('

    //             m_materi.id_materi,

    //             m_materi.id_matapelajaran,

    //             m_materi.id_parent,

    //             m_murid.id_murid,

    //             t_pelajaran.id_pelajaran, 

    //             m_murid.nama_lengkap,

    //             m_materi.materi,

    //             m_materi.description,

    //             m_materi.poin,

    //             m_materi.poin,

    //             t_pelajaran.`status`

    //         ');

    //     $this->db->from('m_materi');

    //     $this->db->join('t_pelajaran', 'm_materi.id_materi = t_pelajaran.id_materi');

    //     $this->db->join('m_murid', 'm_murid.id_murid = t_pelajaran.id_murid');

    //     $this->db->where('m_materi.status','1');

    //     $this->db->where('m_materi.id_matapelajaran',$id_matapelajaran);

    //     $this->db->where('t_pelajaran.id_murid', $id_murid);

    //     $this->db->where('m_materi.id_parent !=', null);

    //     $query = $this->db->get()->result();

    //     var_dump($this->db->last_query());

    //     exit;

    //     return $query;

    // }


    public function get_all_child($id_materi, $id_student)

    {

        $this->db->select('

                t_pelajaran.id_pelajaran,
                
                m_sub_materi.id_sub_materi,
                
                m_materi.id_materi,
                
                m_sub_materi.sub_materi,
                
                m_sub_materi.description,
                
                m_sub_materi.path,
                
                m_sub_materi.path_ppdf,
                
                m_materi.materi,
                
                t_pelajaran.status

            ');

        $this->db->from('t_pelajaran');

        $this->db->join('m_sub_materi', 'm_sub_materi.id_sub_materi = t_pelajaran.id_sub_materi');

        $this->db->join('m_materi', 'm_materi.id_materi = m_sub_materi.id_materi');

        $this->db->where('t_pelajaran.id_student', $id_student);

        $this->db->where('m_materi.id_materi',$id_materi);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    public function model_sub_materi_by_id_sub_materi($id_sub_materi, $id_student)

    {

        // $this->db->select('

        //         m_materi.id_materi,

        //         m_materi.id_matapelajaran,

        //         m_materi.id_parent,

        //         m_murid.id_murid,

        //         t_pelajaran.id_pelajaran, 

        //         m_murid.nama_lengkap,

        //         m_materi.materi,

        //         m_materi.description,

        //         m_materi.poin,

        //         m_materi.path,

        //         t_pelajaran.`status`

        //     ');

        $this->db->from('t_pelajaran');

        $this->db->join('m_sub_materi', 'm_sub_materi.id_sub_materi = t_pelajaran.id_sub_materi');

        $this->db->join('m_student', 'm_student.id_student = t_pelajaran.id_student');

        $this->db->where('t_pelajaran.id_sub_materi', $id_sub_materi);

        $this->db->where('m_student.id_student', $id_student);

        $query = $this->db->get()->row();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    public function get_sub_materi_by_id_materi_no_null($id_materi)

    {

        $this->db->from('m_sub_materi');

        $this->db->where('m_sub_materi.status','1');

        $this->db->where('m_sub_materi.id_materi',$id_materi);

        $this->db->where('m_sub_materi.id_parent !=', null);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    public function get_all_kategori_by_id_user_id_materi($id_murid, $id_materi)

    {

        $this->db->from('t_pelajaran');

        $this->db->join('m_sub_materi', 'm_sub_materi.id_sub_materi = t_pelajaran.id_sub_materi');

        $this->db->where('m_sub_materi.status','1');

        $this->db->where('m_sub_materi.id_materi',$id_materi);

        $this->db->where('t_pelajaran.id_student',$id_murid);

        $this->db->where('m_sub_materi.id_parent !=', null);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    public function get_all_kategori_by_id_user_id_materi_final($id_murid, $id_materi)

    {

        $this->db->from('t_pelajaran');

        $this->db->join('m_sub_materi', 'm_sub_materi.id_sub_materi = t_pelajaran.id_sub_materi');

        $this->db->where('m_sub_materi.status','1');

        $this->db->where('m_sub_materi.id_materi',$id_materi);

        $this->db->where('t_pelajaran.id_student',$id_murid);

        $this->db->where('t_pelajaran.status !=','0');

        $this->db->where('m_sub_materi.id_parent !=', null);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }

 

}