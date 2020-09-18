<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_edumedia extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
        $this->load->model('Model_edumedia');   
		setLastPage();
        // $this->db_grafik_live = $this->load->database('db_grafik_live', TRUE);

    }

	public function tes(){
		echo "testing koneksi";
	}

	public function get_all_kategori_aktif(){
		$base_image = "http://admin.edumedia.id/";
		$result = $this->Model_edumedia->get_all_kategori_aktif();

		foreach ($result as $kategori) {
			$kategori['icon'] = $base_image.$kategori['icon'];
			$hasil[] = $kategori;
			$hasil_akhir['kategori'] = $hasil;
		}

        header('Content-Type: application/json');
		echo json_encode($hasil_akhir);
	}

	

	public function get_all_sub_kategori_aktif(){
		$id_parent = $this->input->post('id_parent');

		$base_image = "http://admin.edumedia.id/";
		$result = $this->Model_edumedia->get_all_sub_kategori_aktif($id_parent);

		if(!empty($result)){
			foreach ($result as $kategori) {
			$kategori['icon'] = $base_image.$kategori['icon'];
			$hasil[] = $kategori;
			$hasil_akhir['sub_kategori'] = $hasil;
			}
		} else {
			$hasil_akhir['sub_kategori'] = $result;
		}

        header('Content-Type: application/json');
		echo json_encode($hasil_akhir);
	}

	public function get_all_materi_aktif(){
		$id_kategori = $this->input->post('id_kategori');

		$result = $this->Model_edumedia->get_all_materi_aktif($id_kategori);

        header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function get_all_materi_aktif_by_kategori(){
		$id_kategori = $this->input->post('id_kategori');

		$base_image = "http://edumedia.id/";
		$result = $this->Model_edumedia->get_all_materi_aktif($id_kategori);

		if(!empty($result)){
			foreach ($result as $kategori) {
			$kategori['background'] = $base_image.$kategori['background'];
			$hasil[] = $kategori;
			$hasil_akhir['materi'] = $hasil;
			}
		} else {
			$hasil_akhir['materi'] = $result;
		}

        header('Content-Type: application/json');
		echo json_encode($hasil_akhir);
	}



}