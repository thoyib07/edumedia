<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Mentor extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_mentor');  
		

    }



	public function index()

	{
		setLastPage();
		$list_kursus_saya_data = $this->model_kursus->get_by_id_murid($this->session->userdata('id_murid'));



		$kursus_saya_result = array();

		foreach ($list_kursus_saya_data as $row) {

			$data_kursus_row['id_murid'] = $row->id_murid;

			$data_kursus_row['id_kursus'] = $row->id_kursus;

			$data_kursus_row['id_matapelajaran'] = $row->id_matapelajaran;

			$data_kursus_row['id_guru'] = $row->id_guru;

			$data_kursus_row['id_kategori'] = $row->id_kategori;



			$nama_matapelajaran = $row->matapelajaran;

			$matapelajaran = substr($nama_matapelajaran,0,20); // ambil sebanyak 30 karakter

			$matapelajaran = substr($nama_matapelajaran,0,strrpos($matapelajaran," ")); // potong per spasi kalimat

			$data_kursus_row['matapelajaran'] = $matapelajaran.'...';



			$data_kursus_row['harga'] = $row->harga;

			$data_kursus_row['nama_lengkap'] = $row->nama_lengkap;

			$data_kursus_row['nama_kategori'] = $row->nama_kategori;



			$kursus_saya_result[] = $data_kursus_row;

		}



		$data_header['list_kursus_saya'] = $kursus_saya_result;

		$data_header['kategori_list'] = $this->model_Kategori->get_all_aktif();

		$data['header_menu'] = $this->load->view('header_menu',$data_header,true);

		$data['content'] = $this->load->view('page/home','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);

	}

	public function get_mentor_aktif(){

		$get_mentor_aktif_data = $this->model_mentor->model_get_mentor_aktif();

        header('Content-Type: application/json');

		echo json_encode($get_mentor_aktif_data);

	}

}

