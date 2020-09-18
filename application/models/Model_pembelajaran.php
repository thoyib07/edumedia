<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pembelajaran extends CI_Model {   

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_id_materi($id_materi)
    {
        $this->db->select('
                t_pembelajaran.id_pembelajaran,
                m_materi.id_materi,
                m_materi.nama_materi,
                m_materi.semseter,
                m_materi.path_video,
                m_materi.path_pdf,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_mata_pelajaran.path_card,
                m_mata_pelajaran.hari,
                m_mata_pelajaran.waktu_mulai,
                m_mata_pelajaran.waktu_selesai,
                m_murid.id_murid,
                m_murid.nama_murid,
                m_murid.no_induk,
                m_murid.jenis_kelamin,
                t_pembelajaran.`status`
            ');
        $this->db->from('t_pembelajaran');
        $this->db->join('m_materi', 'm_materi.id_materi = t_pembelajaran.id_materi', 'left');
        $this->db->join('m_mata_pelajaran', 'm_materi.id_mata_pelajaran = m_mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('m_murid', 'm_murid.id_murid = t_pembelajaran.id_murid', 'left');
        $this->db->where('t_pembelajaran.id_materi', $id_materi);
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function get_by_id_materi_row($id_materi)
    {
        $this->db->select('
                t_pembelajaran.id_pembelajaran,
                m_materi.id_materi,
                m_materi.nama_materi,
                m_materi.semseter,
                m_materi.path_video,
                m_materi.path_pdf,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_mata_pelajaran.path_card,
                m_mata_pelajaran.hari,
                m_mata_pelajaran.waktu_mulai,
                m_mata_pelajaran.waktu_selesai,
                m_murid.id_murid,
                m_murid.nama_murid,
                m_murid.no_induk,
                m_murid.jenis_kelamin,
                t_pembelajaran.`status`
            ');
        $this->db->from('t_pembelajaran');
        $this->db->join('m_materi', 'm_materi.id_materi = t_pembelajaran.id_materi', 'left');
        $this->db->join('m_mata_pelajaran', 'm_materi.id_mata_pelajaran = m_mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('m_murid', 'm_murid.id_murid = t_pembelajaran.id_murid', 'left');
        $this->db->where('t_pembelajaran.id_materi', $id_materi);
        $query = $this->db->get()->row();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function get_by_id_mata_pelajaran_id_murid($id_mata_pelajaran, $id_murid)
    {
        $this->db->select('
                t_pembelajaran.id_pembelajaran,
                m_materi.id_materi,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_materi.nama_materi,
                m_materi.semseter,
                m_materi.path_video,
                m_materi.path_pdf,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_mata_pelajaran.path_card,
                m_mata_pelajaran.hari,
                m_mata_pelajaran.waktu_mulai,
                m_mata_pelajaran.waktu_selesai,
                m_murid.id_murid,
                m_murid.nama_murid,
                m_murid.no_induk,
                m_murid.jenis_kelamin,
                t_pembelajaran.`status`
            ');
        $this->db->from('t_pembelajaran');
        $this->db->join('m_materi', 'm_materi.id_materi = t_pembelajaran.id_materi', 'left');
        $this->db->join('m_mata_pelajaran', 'm_materi.id_mata_pelajaran = m_mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('m_murid', 'm_murid.id_murid = t_pembelajaran.id_murid', 'left');
        $this->db->where('t_pembelajaran.id_mata_pelajaran', $id_mata_pelajaran);
        $this->db->where('t_pembelajaran.id_murid', $id_murid);
        $this->db->where('m_materi.`status`', '1');
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function get_by_id_mata_pelajaran_id_murid_status($id_mata_pelajaran, $id_murid, $status)
    {
        $this->db->select('
                t_pembelajaran.id_pembelajaran,
                m_materi.id_materi,
                m_mata_pelajaran.id_mata_pelajaran,
                m_tingkat.id_tingkat,
                m_jurusan.id_jurusan,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_tingkat.nama_tingkat,
                m_jurusan.nama_jurusan,
                m_materi.nama_materi,
                m_mata_pelajaran.kelas,
                m_materi.semseter,
                m_materi.path_video,
                m_materi.path_pdf,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_mata_pelajaran.path_card,
                m_mata_pelajaran.hari,
                m_mata_pelajaran.waktu_mulai,
                m_mata_pelajaran.waktu_selesai,
                m_murid.id_murid,
                m_murid.nama_murid,
                m_murid.no_induk,
                m_murid.jenis_kelamin,
                t_pembelajaran.`status`
            ');
        $this->db->from('t_pembelajaran');
        $this->db->join('m_materi', 'm_materi.id_materi = t_pembelajaran.id_materi', 'left');
        $this->db->join('m_mata_pelajaran', 'm_materi.id_mata_pelajaran = m_mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('m_murid', 'm_murid.id_murid = t_pembelajaran.id_murid', 'left');
        $this->db->join('m_tingkat', 'm_tingkat.id_tingkat = m_mata_pelajaran.id_tingkat', 'left');
        $this->db->join('m_jurusan', 'm_jurusan.id_jurusan = m_mata_pelajaran.id_jurusan', 'left');
        $this->db->where('t_pembelajaran.id_mata_pelajaran', $id_mata_pelajaran);
        $this->db->where('t_pembelajaran.id_murid', $id_murid);
        $this->db->where('m_materi.`status`', '1');
        $this->db->where('t_pembelajaran.status', '1');
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function get_by_id_mata_pelajaran_id_materi_id_murid_status($id_mata_pelajaran, $id_materi, $id_murid, $status)
    {
        $this->db->select('
                t_pembelajaran.id_pembelajaran,
                m_materi.id_materi,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_materi.nama_materi,
                m_materi.semseter,
                m_materi.path_video,
                m_materi.path_pdf,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_mata_pelajaran.path_card,
                m_mata_pelajaran.hari,
                m_mata_pelajaran.waktu_mulai,
                m_mata_pelajaran.waktu_selesai,
                m_murid.id_murid,
                m_murid.nama_murid,
                m_murid.no_induk,
                m_murid.jenis_kelamin,
                t_pembelajaran.`status`
            ');
        $this->db->from('t_pembelajaran');
        $this->db->join('m_materi', 'm_materi.id_materi = t_pembelajaran.id_materi', 'left');
        $this->db->join('m_mata_pelajaran', 'm_materi.id_mata_pelajaran = m_mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('m_murid', 'm_murid.id_murid = t_pembelajaran.id_murid', 'left');
        $this->db->where('t_pembelajaran.id_mata_pelajaran', $id_mata_pelajaran);
        $this->db->where('t_pembelajaran.id_materi', $id_materi);
        $this->db->where('t_pembelajaran.id_murid', $id_murid);
        $this->db->where('t_pembelajaran.status', '1');
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function get_by_id_materi_id_murid($id_materi, $id_murid)
    {
        $this->db->select('
                t_pembelajaran.id_pembelajaran,
                m_materi.id_materi,
                m_materi.nama_materi,
                m_materi.semseter,
                m_materi.path_video,
                m_materi.path_pdf,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_mata_pelajaran.path_card,
                m_mata_pelajaran.hari,
                m_mata_pelajaran.waktu_mulai,
                m_mata_pelajaran.waktu_selesai,
                m_murid.id_murid,
                m_murid.nama_murid,
                m_murid.no_induk,
                m_murid.jenis_kelamin,
                t_pembelajaran.`status`
            ');
        $this->db->from('t_pembelajaran');
        $this->db->join('m_materi', 'm_materi.id_materi = t_pembelajaran.id_materi', 'left');
        $this->db->join('m_mata_pelajaran', 'm_materi.id_mata_pelajaran = m_mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('m_murid', 'm_murid.id_murid = t_pembelajaran.id_murid', 'left');
        $this->db->where('t_pembelajaran.id_materi', $id_materi);
        $this->db->where('t_pembelajaran.id_murid', $id_murid);
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function get_by_id_materi_id_murid_row($id_materi, $id_murid)
    {
        $this->db->select('
                t_pembelajaran.id_pembelajaran,
                m_materi.id_materi,
                m_materi.nama_materi,
                m_materi.semseter,
                m_materi.path_video,
                m_materi.path_pdf,
                m_mata_pelajaran.id_mata_pelajaran,
                m_mata_pelajaran.nama_mata_pelajaran,
                m_mata_pelajaran.path_card,
                m_mata_pelajaran.hari,
                m_mata_pelajaran.waktu_mulai,
                m_mata_pelajaran.waktu_selesai,
                m_murid.id_murid,
                m_murid.nama_murid,
                m_murid.no_induk,
                m_murid.jenis_kelamin,
                t_pembelajaran.`status`,
                t_pembelajaran.poin
            ');
        $this->db->from('t_pembelajaran');
        $this->db->join('m_materi', 'm_materi.id_materi = t_pembelajaran.id_materi', 'left');
        $this->db->join('m_mata_pelajaran', 'm_materi.id_mata_pelajaran = m_mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('m_murid', 'm_murid.id_murid = t_pembelajaran.id_murid', 'left');
        $this->db->where('t_pembelajaran.id_materi', $id_materi);
        $this->db->where('t_pembelajaran.id_murid', $id_murid);
        $query = $this->db->get()->row();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function save($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
 
    public function update($table, $where, $data)
    
    {
    
        $this->db->update($table, $data, $where);
    
        return $this->db->affected_rows();
    
    }

    public function get_kehadiran_by_id_materi_id_murid($id_materi, $id_murid)
    {
        $this->db->from('t_kehadiran');
        $this->db->where('t_kehadiran.id_materi', $id_materi);
        $this->db->where('t_kehadiran.id_murid', $id_murid);
        $query = $this->db->get()->row();
        // var_dump($this->db->last_query());
        // exit;
        return $query;
    }

    public function cek_by_id_murid_date_now($id_murid, $date_now, $id_mata_pelajaran)
    
    {

        $this->db->from('t_pembelajaran');

        $this->db->where('id_murid', $id_murid);

        $this->db->where('id_mata_pelajaran', $id_mata_pelajaran);

        $this->db->where('create_date >=', $date_now.' 00:00:00');

        $this->db->where('create_date <=', $date_now.' 23:59:59');

        $query = $this->db->get()->row();
    
        // var_dump($this->db->last_query());
    
        // exit;
    
        return $query;
    }

}