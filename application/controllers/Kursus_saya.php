<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Kursus_saya extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_matapelajaran');

        $this->load->model('model_pelajaran');

        $this->load->model('model_Kategori');

        $this->load->model('model_kursus');  
		

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

		$data['content'] = $this->load->view('page/kursus_detail','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);

	}



	public function view_kursus_saya($id_matapelajaran = null)

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

		$data['content'] = $this->load->view('page/kursus_saya', '',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);	

	}



	public function by_id_matapelajaran($id_matapelajaran = null)

	{

		$mata_pelajaran_data_get_by_id = $this->model_matapelajaran->get_by_id_mata_pelajaran($id_matapelajaran);



		$cek_kurusu_by_id_murid_id_matapelajaran_data = $this->model_kursus->cek_by_id_murid_id_matapelajaran($id_matapelajaran, $this->session->userdata('id_murid'));

		if (empty($cek_kurusu_by_id_murid_id_matapelajaran_data)) {

			$data_row['status_kursus'] = '0';

		}else{

			$data_row['status_kursus'] = '1';

		}



		$data_row['id_matapelajaran'] = $mata_pelajaran_data_get_by_id->id_matapelajaran;

		$data_row['id_guru'] = $mata_pelajaran_data_get_by_id->id_guru;	 	

		$data_row['durasi'] = $mata_pelajaran_data_get_by_id->durasi; 	

		$data_row['tinjauan'] = $mata_pelajaran_data_get_by_id->tinjauan; 	

		$data_row['like'] = $mata_pelajaran_data_get_by_id->like; 	

		$data_row['nama_lengkap'] = $mata_pelajaran_data_get_by_id->nama_lengkap;

		if ($mata_pelajaran_data_get_by_id->harga == '0') {

			$data_row['ringkasan'] = '<b>Free </b>'.$mata_pelajaran_data_get_by_id->ringkasan; 

			$data_row['matapelajaran'] = $mata_pelajaran_data_get_by_id->matapelajaran.' (Free)';

		 	$data_row['harga'] = $mata_pelajaran_data_get_by_id->harga;

		}else{

			$data_row['ringkasan'] = $mata_pelajaran_data_get_by_id->ringkasan; 

			$data_row['matapelajaran'] = $mata_pelajaran_data_get_by_id->id_matapelajaran;

			$data_row['harga'] = $mata_pelajaran_data_get_by_id->harga;

		}



		$pelajaran_get_by_id_matapelajaran = $this->model_pelajaran->get_by_id_matapelajaran($mata_pelajaran_data_get_by_id->id_matapelajaran);



		$data_result_pelajaran = array();

		foreach ($pelajaran_get_by_id_matapelajaran as $row) {

			$data_row_pelajaran['id_pelajaran'] = $row->id_pelajaran;

			$data_row_pelajaran['id_matapelajaran'] = $row->id_matapelajaran;

			$data_row_pelajaran['id_parent'] = $row->id_parent;

			$data_row_pelajaran['nama_pelajaran'] = $row->nama_pelajaran;

			$data_row_pelajaran['waktu'] = $row->waktu;

			$data_row_pelajaran['create_by'] = $row->create_by;

			$data_row_pelajaran['create_date'] = $row->create_date;

			$data_row_pelajaran['update_by'] = $row->update_by;

			$data_row_pelajaran['update_date'] = $row->update_date;

			$data_row_pelajaran['status'] = $row->status;



			$pelajaran_get_by_id_parent = $this->model_pelajaran->get_by_id_parent($row->id_pelajaran);



			$data_row_pelajaran['detail_pelajaran'] = $pelajaran_get_by_id_parent;



			$data_result_pelajaran[] = $data_row_pelajaran;

		}



		$data_row['pelajaran'] = $data_result_pelajaran;



        header('Content-Type: application/json');

		echo json_encode($data_row);

	}

}

