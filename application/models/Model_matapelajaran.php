<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_matapelajaran extends CI_Model {   

 

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

    }



    public function get_all_aktif()

    {

        $this->db->select('

                `m_materi`.`id_materi`, 

                `m_mentor`.`id_mentor`, 

                `m_materi`.`materi`, 

                `m_materi`.`ringkasan`, 

                `m_materi`.`harga`, 

                `m_materi`.`durasi`, 

                `m_materi`.`like`, 

                `m_user`.`nama`

            ');

        $this->db->from('m_materi');

        $this->db->join('m_mentor', 'm_mentor.id_mentor = m_materi.id_mentor');

        $this->db->join('m_user', 'm_user.id_user = m_mentor.id_user ');

        $this->db->where('m_materi.status','1');

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    public function get_by_id_mata_pelajaran($id_matapelajaran)

    {

        $this->db->select('

                `m_materi`.`id_materi`,

                `m_mentor`.`id_mentor`, 

                `m_materi`.`materi`, 

                `m_materi`.`ringkasan`, 

                `m_materi`.`harga`, 

                `m_materi`.`durasi`, 

                `m_materi`.`like`, 
                
                `m_user`.`nama`,

                `m_materi`.`path` 

            ');

        $this->db->from('m_materi');

        $this->db->join('m_mentor', '`m_mentor`.`id_mentor` = `m_materi`.`id_mentor`');

        $this->db->join('m_user', 'm_user.id_user = m_mentor.id_user');

        $this->db->where('`m_materi`.`status`','1');

        $this->db->where('`m_materi`.`id_materi`',$id_matapelajaran);

        $query = $this->db->get()->row();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }



    public function get_mata_pelajaran_like($like_matapelajaran)

    {

        $this->db->select('

                m_matapelajaran.id_matapelajaran,

                m_guru.id_guru,

                m_matapelajaran.matapelajaran,

                m_matapelajaran.ringkasan,

                m_matapelajaran.harga,

                m_matapelajaran.durasi,

                m_matapelajaran.like,

                m_guru.nama_lengkap

            ');

        $this->db->from('m_matapelajaran');

        $this->db->join('m_guru', 'm_guru.id_guru = m_matapelajaran.id_guru');

        $this->db->where('m_matapelajaran.`status`','1');

        $this->db->like('m_matapelajaran.matapelajaran', $like_matapelajaran);

        $query = $this->db->get()->result();

        // var_dump($this->db->last_query());

        // exit;

        return $query;

    }

 

}