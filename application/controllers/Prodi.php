<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Prodi extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_Kategori');

        $this->load->model('model_mentor');

        $this->load->model('model_kursus');

        $this->load->model('model_universitas');  
		

    }

	public function index()

	{	
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

		$data['content'] = $this->load->view('page/universitas','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);



		// echo json_encode($list_kursus_saya_data);

	}

	public function get_prodi_by_id_fakultas($id_universitas = null)

	{
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

		$data['content'] = $this->load->view('page/prodi','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);



		// echo json_encode($list_kursus_saya_data);

	}
	
	// public function get_universitas_aktif_all(){

	// 	$get_universitas_data = $this->model_universitas->get_all_aktif();

	// 	$resoult_universitas = array();

	// 	foreach ($get_universitas_data as $row_universitas) {

	// 		$data_row['id_universitas'] = $row_universitas->id_universitas;
			
	// 		$data_row['id_parent'] = $row_universitas->id_parent;
			
	// 		$data_row['nama_universitas'] = ucwords(strtolower($row_universitas->nama_universitas));
			
	// 		$data_row['icon'] = $row_universitas->icon;
			
	// 		$data_row['icon_web'] = $row_universitas->icon_web;
			
	// 		$data_row['background'] = $row_universitas->background;
			
	// 		$data_row['create_by'] = $row_universitas->create_by;
			
	// 		$data_row['create_date'] = $row_universitas->create_date;
			
	// 		$data_row['update_by'] = $row_universitas->update_by;
			
	// 		$data_row['update_date'] = $row_universitas->update_date;
			
	// 		$data_row['status'] = $row_universitas->status;
			
	// 		$get_program_studi_by_id_universitas = $this->model_prgram_studi->get_by_id_universitas($row_universitas->id_universitas);

	// 		if ($get_sub_kategori_by_id_kategori_resoult) {
	// 			$data_row['sub_kategori'] = $get_sub_kategori_by_id_kategori_resoult;	
	// 		}else{
	// 			$data_row['sub_kategori'] = '0';
	// 		}

	// 		$resoult_sub_kategori[] = $data_row;


	// 	}

 //        header('Content-Type: application/json');

	// 	echo json_encode($get_universitas_data);

	// }

}

