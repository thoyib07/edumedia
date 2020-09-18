<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Kategori extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_Kategori');

        $this->load->model('model_kursus');

        $this->load->model('model_mentor');
		
		// setLastPage();
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

	public function get_all_kategori_aktif(){

		$get_all_ketagori_aktif_data = $this->model_Kategori->get_all_aktif();



        header('Content-Type: application/json');

		echo json_encode($get_all_ketagori_aktif_data);

	}
	
	public function get_parent_kategori(){

		$get_parent_kategori_data = $this->model_Kategori->get_parent();

		$resoult_sub_kategori = array();

		foreach ($get_parent_kategori_data as $row_kategori) {

			$data_row['id_kategori'] = $row_kategori->id_kategori;
			
			$data_row['id_parent'] = $row_kategori->id_parent;
			
			$data_row['nama_kategori'] = ucwords(strtolower($row_kategori->nama_kategori));
			
			$data_row['icon'] = $row_kategori->icon;
			
			$data_row['icon_web'] = $row_kategori->icon_web;
			
			$data_row['background'] = $row_kategori->background;
			
			$data_row['create_by'] = $row_kategori->create_by;
			
			$data_row['create_date'] = $row_kategori->create_date;
			
			$data_row['update_by'] = $row_kategori->update_by;
			
			$data_row['update_date'] = $row_kategori->update_date;
			
			$data_row['status'] = $row_kategori->status;
			
			$get_sub_kategori_by_id_kategori_resoult = $this->model_Kategori->get_by_id_kategori($row_kategori->id_kategori);

			if ($get_sub_kategori_by_id_kategori_resoult) {
				$data_row['sub_kategori'] = $get_sub_kategori_by_id_kategori_resoult;	
			}else{
				$data_row['sub_kategori'] = '0';
			}

			$resoult_sub_kategori[] = $data_row;


		}

        header('Content-Type: application/json');

		echo json_encode($resoult_sub_kategori);

	}
	
	public function get_sub_kategori_by_id_kategori($id_kategori = null){

		$get_sub_kategori_by_id_kategori_data = $this->model_Kategori->get_by_id_kategori($id_kategori);

        header('Content-Type: application/json');

		echo json_encode($get_sub_kategori_by_id_kategori_data);

	}
	
	public function get_sub_kategori($id_kategori = null){
		setLastPage();
		$list_kursus_saya_data = $this->model_kursus->get_by_id_murid($this->session->userdata('id_murid'));



		$kursus_saya_result = array();

		foreach ($list_kursus_saya_data as $row) {

			$data_kursus_row['id_student'] = $row->id_student;

			$data_kursus_row['id_kursus'] = $row->id_kursus;

			$data_kursus_row['id_materi'] = $row->id_materi;

			$data_kursus_row['id_mentor'] = $row->id_mentor;

			$data_kursus_row['id_kategori'] = $row->id_kategori;



			$nama_matapelajaran = $row->materi;

			$matapelajaran = substr($nama_matapelajaran,0,30); // ambil sebanyak 30 karakter

			$matapelajaran = substr($nama_matapelajaran,0,strrpos($matapelajaran," ")); // potong per spasi kalimat

			$data_kursus_row['matapelajaran'] = $matapelajaran.'...';



			$data_kursus_row['harga'] = $row->harga;

			$nana_mentor = $this->model_mentor->get_by_id($row->id_mentor);

			$data_kursus_row['nama_lengkap'] = $nana_mentor->nama;

			$data_kursus_row['nama_kategori'] = $row->nama_kategori;

			$data_kursus_row['background'] = $row->background;



			$kursus_saya_result[] = $data_kursus_row;

		}

		$get_parent_kategori = $this->model_Kategori->get_parent();

		$kategori_result = array();

		foreach ($get_parent_kategori as $row_kategori) {
			
			$data_kategori['id_kategori'] = $row_kategori->id_kategori;
			
			$data_kategori['id_parent'] = $row_kategori->id_parent;
			
			$data_kategori['nama_kategori'] = $row_kategori->nama_kategori;
			
			$data_kategori['icon'] = $row_kategori->icon;
			
			$data_kategori['background'] = $row_kategori->background;
			
			$data_kategori['create_by'] = $row_kategori->create_by;
			
			$data_kategori['create_date'] = $row_kategori->create_date;
			
			$data_kategori['update_by'] = $row_kategori->update_by;
			
			$data_kategori['update_date'] = $row_kategori->update_date;
			
			$data_kategori['status'] = $row_kategori->status;

			$get_kategori_by_id_parent = $this->model_Kategori->get_by_id_kategori($row_kategori->id_kategori);

			$data_kategori['child'] = $get_kategori_by_id_parent;

			$kategori_result [] = $data_kategori;

		}

		$data_header['list_kursus_saya'] = $kursus_saya_result;

		$data_header['kategori_list'] = $kategori_result;

		$data['header_menu'] = $this->load->view('header_menu',$data_header,true);

		$data['content'] = $this->load->view('page/kategori','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);

	}

}

