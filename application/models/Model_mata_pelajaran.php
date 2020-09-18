<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_mata_pelajaran extends CI_Model {  

    public function __construct()
    
    {
    
        parent::__construct();
    
        $this->load->database();
    
    }

    public function get_all($id_tingkat, $id_jurusan, $kelas)
    
    {

        $this->db->select('
                
                m_mata_pelajaran.id_mata_pelajaran,
                
                m_guru.id_guru,
                
                m_tingkat.id_tingkat,
                
                m_jurusan.id_jurusan,
                
                m_mata_pelajaran.nama_mata_pelajaran,
                
                m_guru.nama_guru,
                
                m_tingkat.nama_tingkat,
                
                m_jurusan.nama_jurusan,
                
                m_jurusan.singkatan,
                
                m_mata_pelajaran.kelas,
                
                m_mata_pelajaran.path_card,
                
                m_mata_pelajaran.hari,

                m_mata_pelajaran.waktu_mulai,

                m_mata_pelajaran.waktu_selesai

            ');

        $this->db->from('m_mata_pelajaran');

        $this->db->join('m_guru', 'm_guru.id_guru = m_mata_pelajaran.id_guru', 'left');

        $this->db->join('m_tingkat', 'm_tingkat.id_tingkat = m_mata_pelajaran.id_tingkat', 'left');

        $this->db->join('m_jurusan', 'm_jurusan.id_jurusan = m_mata_pelajaran.id_jurusan', 'left');

        $query = $this->db->get()->result();
    
        // var_dump($this->db->last_query());
    
        // exit;
    
        return $query;
    }

    public function get_by_id($id_mata_pelajaran)
    
    {

        $this->db->select('
                
                m_mata_pelajaran.id_mata_pelajaran,
                
                m_guru.id_guru,
                
                m_tingkat.id_tingkat,
                
                m_jurusan.id_jurusan,
                
                m_mata_pelajaran.nama_mata_pelajaran,
                
                m_guru.nama_guru,
                
                m_tingkat.nama_tingkat,
                
                m_jurusan.nama_jurusan,
                
                m_jurusan.singkatan,
                
                m_mata_pelajaran.kelas,
                
                m_mata_pelajaran.path_card,
                
                m_mata_pelajaran.hari,

                m_mata_pelajaran.waktu_mulai,

                m_mata_pelajaran.waktu_selesai

            ');

        $this->db->from('m_mata_pelajaran');

        $this->db->join('m_guru', 'm_guru.id_guru = m_mata_pelajaran.id_guru', 'left');

        $this->db->join('m_tingkat', 'm_tingkat.id_tingkat = m_mata_pelajaran.id_tingkat', 'left');

        $this->db->join('m_jurusan', 'm_jurusan.id_jurusan = m_mata_pelajaran.id_jurusan', 'left');

        $this->db->where('m_mata_pelajaran.`id_mata_pelajaran`', $id_mata_pelajaran);

        $query = $this->db->get()->row();
    
        // var_dump($this->db->last_query());
    
        // exit;
    
        return $query;
    }

    public function get_by_id_selisih($id_mata_pelajaran, $time_now)
    
    {

        $this->db->select('

                m_mata_pelajaran.waktu_mulai,

                (SELECT timediff("'.''.$time_now.''.'", m_mata_pelajaran.waktu_mulai)) AS selisih_waktu_mulai,

                m_mata_pelajaran.waktu_selesai,

                (SELECT timediff("'.''.$time_now.''.'", m_mata_pelajaran.waktu_selesai)) AS selisih_waktu_selesai,
                
                m_mata_pelajaran.id_mata_pelajaran,
                
                m_guru.id_guru,
                
                m_tingkat.id_tingkat,
                
                m_jurusan.id_jurusan,
                
                m_mata_pelajaran.nama_mata_pelajaran,
                
                m_guru.nama_guru,
                
                m_tingkat.nama_tingkat,
                
                m_jurusan.nama_jurusan,
                
                m_jurusan.singkatan,
                
                m_mata_pelajaran.kelas,
                
                m_mata_pelajaran.path_card,
                
                m_mata_pelajaran.hari

            ');

        $this->db->from('m_mata_pelajaran');

        $this->db->join('m_guru', 'm_guru.id_guru = m_mata_pelajaran.id_guru', 'left');

        $this->db->join('m_tingkat', 'm_tingkat.id_tingkat = m_mata_pelajaran.id_tingkat', 'left');

        $this->db->join('m_jurusan', 'm_jurusan.id_jurusan = m_mata_pelajaran.id_jurusan', 'left');

        $this->db->where('m_mata_pelajaran.`id_mata_pelajaran`', $id_mata_pelajaran);

        $query = $this->db->get()->row();
    
        // var_dump($this->db->last_query());
    
        // exit;
    
        return $query;
    }

    public function get_all_aktif()
    
    {

        $this->db->select('
                
                m_mata_pelajaran.id_mata_pelajaran,
                
                m_guru.id_guru,
                
                m_tingkat.id_tingkat,
                
                m_jurusan.id_jurusan,
                
                m_mata_pelajaran.nama_mata_pelajaran,
                
                m_guru.nama_guru,
                
                m_tingkat.nama_tingkat,
                
                m_jurusan.nama_jurusan,
                
                m_jurusan.singkatan,
                
                m_mata_pelajaran.kelas,
                
                m_mata_pelajaran.path_card,
                
                m_mata_pelajaran.hari,

                m_mata_pelajaran.waktu_mulai,

                m_mata_pelajaran.waktu_selesai

            ');

        $this->db->from('m_mata_pelajaran');

        $this->db->join('m_guru', 'm_guru.id_guru = m_mata_pelajaran.id_guru', 'left');

        $this->db->join('m_tingkat', 'm_tingkat.id_tingkat = m_mata_pelajaran.id_tingkat', 'left');

        $this->db->join('m_jurusan', 'm_jurusan.id_jurusan = m_mata_pelajaran.id_jurusan', 'left');

        $this->db->where('m_mata_pelajaran.`status`', '1');

        $query = $this->db->get()->result();
    
        // var_dump($this->db->last_query());
    
        // exit;
    
        return $query;
    }

    public function get_by_id_murid($id_murid)
    
    {

        $this->db->select('
                
                m_mata_pelajaran.id_mata_pelajaran,
                
                m_guru.id_guru,
                
                m_tingkat.id_tingkat,
                
                m_jurusan.id_jurusan,
                
                m_mata_pelajaran.nama_mata_pelajaran,
                
                m_guru.nama_guru,
                
                m_tingkat.nama_tingkat,
                
                m_jurusan.nama_jurusan,
                
                m_jurusan.singkatan,
                
                m_mata_pelajaran.kelas,
                
                m_mata_pelajaran.path_card,
                
                m_mata_pelajaran.hari,

                m_mata_pelajaran.waktu_mulai,

                m_mata_pelajaran.waktu_selesai

            ');

        $this->db->from('m_mata_pelajaran');

        $this->db->join('m_guru', 'm_guru.id_guru = m_mata_pelajaran.id_guru', 'left');

        $this->db->join('m_tingkat', 'm_tingkat.id_tingkat = m_mata_pelajaran.id_tingkat', 'left');

        $this->db->join('m_jurusan', 'm_jurusan.id_jurusan = m_mata_pelajaran.id_jurusan', 'left');

        $this->db->where('m_mata_pelajaran.`status`', '1');

        $query = $this->db->get()->result();
    
        // var_dump($this->db->last_query());
    
        // exit;
    
        return $query;
    }

    public function get_by_id_tingkat_id_jurusan_kelas($kelas, $id_tingkat, $id_jurusan)
    
    {

        $this->db->select('
                
                m_mata_pelajaran.id_mata_pelajaran,
                
                m_guru.id_guru,
                
                m_tingkat.id_tingkat,
                
                m_jurusan.id_jurusan,
                
                m_mata_pelajaran.nama_mata_pelajaran,
                
                m_guru.nama_guru,
                
                m_tingkat.nama_tingkat,
                
                m_jurusan.nama_jurusan,
                
                m_jurusan.singkatan,
                
                m_mata_pelajaran.kelas,
                
                m_mata_pelajaran.path_card,
                
                m_mata_pelajaran.hari,

                m_mata_pelajaran.waktu_mulai,

                m_mata_pelajaran.waktu_selesai

            ');

        $this->db->from('m_mata_pelajaran');

        $this->db->join('m_guru', 'm_guru.id_guru = m_mata_pelajaran.id_guru', 'left');

        $this->db->join('m_tingkat', 'm_tingkat.id_tingkat = m_mata_pelajaran.id_tingkat', 'left');

        $this->db->join('m_jurusan', 'm_jurusan.id_jurusan = m_mata_pelajaran.id_jurusan', 'left');

        $this->db->where('m_mata_pelajaran.`kelas`', $kelas);

        if ($id_tingkat == '2') {

            $this->db->where('m_mata_pelajaran.id_tingkat', $id_tingkat);
            
        }else{

            $this->db->where('m_mata_pelajaran.id_tingkat', $id_tingkat);

            $this->db->where('m_mata_pelajaran.id_jurusan', $id_jurusan);

            $this->db->where('m_mata_pelajaran.kelas', $kelas);

        }

        $this->db->where('m_mata_pelajaran.`status`', '1');

        $query = $this->db->get()->result();
    
        // var_dump($this->db->last_query());
    
        // exit;
    
        return $query;
    }   

    public function get_kehadiran_by_id_murid_id_mater($id_murid, $id_materi, $date_now)
    
    {

        $this->db->from('t_kehadiran');

        $this->db->where('id_murid', $id_murid);

        $this->db->where('id_materi', $id_materi);

        $this->db->where('waktu_masuk >=', $date_now.' 00:00:00');

        $this->db->where('waktu_masuk <=', $date_now.' 23:59:59');

        $query = $this->db->get()->row();
    
        // var_dump($this->db->last_query());
    
        // exit;
    
        return $query;
    } 

}