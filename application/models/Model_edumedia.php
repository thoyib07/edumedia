<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_edumedia extends CI_Model {



    public function __construct() {



        $this->db_edumedia = $this->load->database('default', TRUE);

    }

    function input_data($namaTable, $insert_to){

        $insert = $this->db_edumedia->insert($namaTable, $insert_to);

        return $insert; 
    }



    public function get_all_kategori_aktif(){

    	$sql = "SELECT * FROM m_kategori where id_parent is null  and status = '1'";

        $query = $this->db_edumedia->query($sql);

        $row = $query->result_array();

        return $row;

 

    }

    public function get_all_sub_kategori_aktif($id_parent){

    	$sql = "SELECT * FROM m_kategori where id_parent = '$id_parent'  and status = '1'";

        $query = $this->db_edumedia->query($sql);

        $row = $query->result_array();

        return $row;

 

    }

    public function get_all_materi_aktif($id_kategori){

        $sql = "SELECT * FROM `m_materi` 
                JOIN m_kategori 
                ON m_kategori.id_kategori = m_materi.id_kategori 
                JOIN m_mentor 
                on m_mentor.id_mentor = m_materi.id_mentor 
                where m_materi.status = '1' and m_materi.id_kategori = '$id_kategori'";

        $query = $this->db_edumedia->query($sql);

        $row = $query->result_array();

        return $row;

 

    }

    



    

}