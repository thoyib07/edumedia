<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Kursus_detail extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_matapelajaran');

        $this->load->model('model_materi');

        $this->load->model('model_Kategori');

        $this->load->model('model_kursus');

        $this->load->model('model_mentor');  
		

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

			$matapelajaran = substr($nama_matapelajaran,0,20); // ambil sebanyak 30 karakter

			$matapelajaran = substr($nama_matapelajaran,0,strrpos($matapelajaran," ")); // potong per spasi kalimat

			$data_kursus_row['matapelajaran'] = $matapelajaran.'...';



			$data_kursus_row['harga'] = $row->harga;

			$data_kursus_row['nama_lengkap'] = $row->nama;

			$data_kursus_row['nama_kategori'] = $row->nama_kategori;



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

		$data['content'] = $this->load->view('page/kursus_detail','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);

	}



	public function view_detail($id_matapelajaran = null)

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

		$data['content'] = $this->load->view('page/kursus_detail', '',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);	

	}



	public function by_id_materi($id_materi = null)

	{
		$totoal_leason = 0;

		$mata_pelajaran_data_get_by_id = $this->model_matapelajaran->get_by_id_mata_pelajaran($id_materi);

		$cek_kurusu_by_id_murid_id_matapelajaran_data = $this->model_kursus->cek_by_id_murid_id_matapelajaran($id_materi, $this->session->userdata('id_murid'));

		if (empty($cek_kurusu_by_id_murid_id_matapelajaran_data)) {

			$data_row['status_kursus'] = '0';

		}else{

			$data_row['status_kursus'] = '1';

		}

		$data_row['id_matapelajaran'] = $mata_pelajaran_data_get_by_id->id_materi;

		$data_row['id_guru'] = $mata_pelajaran_data_get_by_id->id_mentor;	 	

		$data_row['durasi'] = $mata_pelajaran_data_get_by_id->durasi; 		

		$data_row['like'] = $mata_pelajaran_data_get_by_id->like; 	

		$data_row['nama_lengkap'] = $mata_pelajaran_data_get_by_id->nama;

		$data_row['path'] = $mata_pelajaran_data_get_by_id->path;

		if ($mata_pelajaran_data_get_by_id->harga == '0') {

			$data_row['ringkasan'] = $mata_pelajaran_data_get_by_id->ringkasan; 

			$data_row['matapelajaran'] = $mata_pelajaran_data_get_by_id->materi;

		 	$data_row['harga'] = $mata_pelajaran_data_get_by_id->harga;

		}else{

			$data_row['ringkasan'] = $mata_pelajaran_data_get_by_id->ringkasan; 

			$data_row['matapelajaran'] = $mata_pelajaran_data_get_by_id->id_materi;

			$data_row['harga'] = $mata_pelajaran_data_get_by_id->harga;

		}



		$get_sub_materi_by_id_materi_data = $this->model_materi->get_sub_materi_by_id_materi($id_materi);



		$data_result_pelajaran = array();

		foreach ($get_sub_materi_by_id_materi_data as $row) {

			$data_sub_materi['id_sub_materi'] = $row->id_sub_materi;

			$data_sub_materi['id_materi'] = $row->id_materi;

			$data_sub_materi['sub_materi'] = $row->sub_materi;

			$data_sub_materi['waktu'] = $row->waktu;

			$data_sub_materi['create_by'] = $row->create_by;

			$data_sub_materi['create_date'] = $row->create_date;

			$data_sub_materi['update_by'] = $row->update_by;

			$data_sub_materi['update_date'] = $row->update_date;

			$data_sub_materi['status'] = $row->status;



			$get_sub_materi_by_id_parent_data = $this->model_materi->get_sub_materi_by_id_parent($row->id_sub_materi);

			$count_sub_materi = count($get_sub_materi_by_id_parent_data);

			if ($get_sub_materi_by_id_parent_data) {

				$totoal_leason = $totoal_leason + $count_sub_materi;

				$data_sub_materi['sub_sub_materi'] = $get_sub_materi_by_id_parent_data;

			}else{

				$totoal_leason = $totoal_leason + 1;

				$data_sub_materi['sub_sub_materi'] = '0';

			}

			$data_result_pelajaran[] = $data_sub_materi;

		}



		$data_row['totoal_lessons'] = $totoal_leason;

		$data_row['pelajaran'] = $data_result_pelajaran;

		

		if (empty($this->session->userdata('id_murid'))) {

			$data_row['status_user'] = '0';

		}else{

			$data_row['status_user'] = '1';

		}



        header('Content-Type: application/json');

		echo json_encode($data_row);

	}

	public function get_materi_aktif($id_matapelajaran = null)

	{

		$mata_pelajaran_data_get_by_id = $this->model_matapelajaran->get_by_id_mata_pelajaran($id_matapelajaran);

		$cek_kurusu_by_id_murid_id_matapelajaran_data = $this->model_kursus->cek_by_id_murid_id_matapelajaran($id_matapelajaran, $this->session->userdata('id_murid'));

		if (empty($cek_kurusu_by_id_murid_id_matapelajaran_data)) {

			$data_row['status_kursus'] = '0';

		}else{

			$data_row['status_kursus'] = '1';

		}



		$data_row['id_matapelajaran'] = $mata_pelajaran_data_get_by_id->id_materi;

		$data_row['id_guru'] = $mata_pelajaran_data_get_by_id->id_mentor;	 	

		$data_row['durasi'] = $mata_pelajaran_data_get_by_id->durasi; 		

		$data_row['like'] = $mata_pelajaran_data_get_by_id->like; 	

		$data_row['nama_lengkap'] = $mata_pelajaran_data_get_by_id->nama;

		if ($mata_pelajaran_data_get_by_id->harga == '0') {

			$data_row['ringkasan'] = '<b>Free </b>'.$mata_pelajaran_data_get_by_id->ringkasan; 

			$data_row['matapelajaran'] = $mata_pelajaran_data_get_by_id->materi.' (Free)';

		 	$data_row['harga'] = $mata_pelajaran_data_get_by_id->harga;

		}else{

			$data_row['ringkasan'] = $mata_pelajaran_data_get_by_id->ringkasan; 

			$data_row['matapelajaran'] = $mata_pelajaran_data_get_by_id->id_materi;

			$data_row['harga'] = $mata_pelajaran_data_get_by_id->harga;

		}



		$get_sub_materi_by_id_materi_data = $this->model_materi->get_sub_materi_by_id_materi($id_matapelajaran);



		$data_result_pelajaran = array();

		foreach ($get_sub_materi_by_id_materi_data as $row) {

			$data_sub_materi['id_sub_materi'] = $row->id_sub_materi;

			$data_sub_materi['id_materi'] = $row->id_materi;

			$data_sub_materi['sub_materi'] = $row->sub_materi;

			$data_sub_materi['waktu'] = $row->waktu;

			$data_sub_materi['create_by'] = $row->create_by;

			$data_sub_materi['create_date'] = $row->create_date;

			$data_sub_materi['update_by'] = $row->update_by;

			$data_sub_materi['update_date'] = $row->update_date;

			$data_sub_materi['status'] = $row->status;

			$data_result_pelajaran[] = $data_sub_materi;

		}

		$data_row['pelajaran'] = $data_result_pelajaran;		

		if (empty($this->session->userdata('id_murid'))) {

			$data_row['status_user'] = '0';

		}else{

			$data_row['status_user'] = '1';

		}

        header('Content-Type: application/json');

		echo json_encode($data_row);

	}

}

