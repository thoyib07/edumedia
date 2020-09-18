<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Matapelajaran extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_matapelajaran');

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



			$nama_matapelajaran = $row->materi;

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



	public function all_aktif(){

		$get_all_aktif_data = $this->model_matapelajaran->get_all_aktif();



		$data_resoult = array();

		foreach ($get_all_aktif_data as $row) {

			$data_row['id_matapelajaran'] = $row->id_materi;

			$data_row['id_guru'] = $row->id_mentor;

			if ($row->harga == '0') {

				$data_row['matapelajaran'] = $row->materi.' (Free)';

				$data_row['harga'] = '<b>Free</b>';

				$data_row['ringkasan'] = '<b>Free</b> '.$row->ringkasan;

			}else{



				$data_row['matapelajaran'] = $row->materi;

				$data_row['harga'] = $row->harga;

				$data_row['ringkasan'] = $row->ringkasan;

			}

			$data_row['durasi'] = $row->durasi;

			$data_row['like'] = $row->like;

			$data_row['nama_lengkap'] = $row->nama;



			$cek_kurusu_by_id_murid_id_matapelajaran_data = $this->model_kursus->cek_by_id_murid_id_matapelajaran($row->id_materi, $this->session->userdata('id_murid'));



			if (empty($cek_kurusu_by_id_murid_id_matapelajaran_data)) {

				$data_row['status_kursus'] = '0';

			}else{

				$data_row['status_kursus'] = '1';

			}



			if (empty($this->session->userdata('id_murid'))) {

				$data_row['status_user'] = '0';

			}else{

				$data_row['status_user'] = '1';

			}



			$data_resoult[] = $data_row;

		}

        

        header('Content-Type: application/json');

		echo json_encode($data_resoult);

	}



	public function save_mendaftar()

	{

        $id_matapelajaran =  $this->input->post('id_mata_pelajaran');

        $id_murid = $this->session->userdata('id_murid');



        $data_mendaftar = array(

            'id_murid' => $id_murid,

            'id_matapelajaran' => $id_matapelajaran,

        );



        $simpan_data_user = $this->model_matapelajaran->save('m_user', $data_user);  

	}



	public function by_matapelajaran($like_matapelajaran = null){

		$get_mata_pelajaran_like_data = $this->model_matapelajaran->get_mata_pelajaran_like($like_matapelajaran);



		// echo json_encode($get_mata_pelajaran_like_data);

		// die();

		$data_resoult = array();

		foreach ($get_mata_pelajaran_like_data as $row) {

			$data_row['id_matapelajaran'] = $row->id_matapelajaran;

			$data_row['id_guru'] = $row->id_guru;

			if ($row->harga == '0') {

				$data_row['matapelajaran'] = $row->matapelajaran.' (Free)';

				$data_row['harga'] = '<b>Free</b>';

				$data_row['ringkasan'] = '<b>Free</b> '.$row->ringkasan;

			}else{



				$data_row['matapelajaran'] = $row->matapelajaran;

				$data_row['harga'] = $row->harga;

				$data_row['ringkasan'] = $row->ringkasan;

			}

			$data_row['durasi'] = $row->durasi;

			$data_row['like'] = $row->like;

			$data_row['nama_lengkap'] = $row->nama_lengkap;



			$cek_kurusu_by_id_murid_id_matapelajaran_data = $this->model_kursus->cek_by_id_murid_id_matapelajaran($row->id_matapelajaran, $this->session->userdata('id_murid'));



			if (empty($cek_kurusu_by_id_murid_id_matapelajaran_data)) {

				$data_row['status_kursus'] = '0';

			}else{

				$data_row['status_kursus'] = '1';

			}



			if (empty($this->session->userdata('id_murid'))) {

				$data_row['status_user'] = '0';

			}else{

				$data_row['status_user'] = '1';

			}



			$data_resoult[] = $data_row;

		}

        

        header('Content-Type: application/json');

		echo json_encode($data_resoult);

	}	

}

