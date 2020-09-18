<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Materi extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_Kategori');

        $this->load->model('model_materi');

        $this->load->model('model_kursus');

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

	public function get_materi($id_sub_kategori = null){
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

		$data['content'] = $this->load->view('page/materi','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);

		// echo json_encode($list_kursus_saya_data);

	}

	public function get_materi_by_prodi($id_prodi = null){
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

		$data['content'] = $this->load->view('page/materi_by_prodi','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);

		// echo json_encode($list_kursus_saya_data);

	}

	public function get_materi_by_id_sub_kategori($id_sub_kategori = null){
		
		$get_materi_by_sub_kategori_data = $this->model_materi->materi_by_id_sub_kategori($id_sub_kategori);

		$materi_result = array();

		foreach ($get_materi_by_sub_kategori_data as $row_data) {

            $ringkasan = $row_data->ringkasan; 

            $ringkasan = substr($ringkasan,0,100); // ambil sebanyak 30 karakter

            $ringkasan = substr($ringkasan,0,strrpos($ringkasan," ")); // potong per spasi kalimat    


			$data_materi['id_materi'] = $row_data->id_materi;
			
			$data_materi['id_mentor'] = $row_data->id_mentor;
			
			$data_materi['id_kategori'] = $row_data->id_kategori;
			
			$data_materi['materi'] = $row_data->materi;
			
			$data_materi['ringkasan'] = $ringkasan.'...';
			
			$data_materi['background'] = $row_data->background;
			
			$data_materi['path'] = $row_data->path;
			
			$data_materi['durasi'] = $row_data->durasi;
			
			$data_materi['like'] = $row_data->like;
			
			$data_materi['harga'] = $row_data->harga;
			
			$data_materi['id_user'] = $row_data->id_user;
			
			$data_materi['perusahaan'] = $row_data->perusahaan;
			
			$data_materi['deskripsi'] = $row_data->deskripsi;
			
			$data_materi['nama'] = $row_data->nama;
			
			$data_materi['email'] = $row_data->email;
			
			$data_materi['no_hp'] = $row_data->no_hp;
			
			$data_materi['password'] = $row_data->password;
			
			$data_materi['status'] = $row_data->status;

			$cek_kurusu_by_id_murid_id_matapelajaran_data = $this->model_kursus->cek_by_id_murid_id_matapelajaran($row_data->id_materi, $this->session->userdata('id_murid'));

			if (empty($cek_kurusu_by_id_murid_id_matapelajaran_data)) {

				$data_materi['status_kursus'] = '0';

			}else{

				$data_materi['status_kursus'] = '1';

			}

			$materi_result[] = $data_materi;
		}

		$data['id_user'] = $this->session->userdata('id_user');

		$data['data_materi'] = $materi_result;

        header('Content-Type: application/json');

		echo json_encode($data);

	}

	public function get_materi_by_id_prodi($id_prodi = null){

		$get_materi_by_prodi = $this->model_materi->materi_by_id_prodi($id_prodi);

		$materi_result = array();

		foreach ($get_materi_by_prodi as $row_data) {

            $ringkasan = $row_data->ringkasan; 

            $ringkasan = substr($ringkasan,0,100); // ambil sebanyak 30 karakter

            $ringkasan = substr($ringkasan,0,strrpos($ringkasan," ")); // potong per spasi kalimat    


			$data_materi['id_materi'] = $row_data->id_materi;
			
			$data_materi['id_mentor'] = $row_data->id_mentor;
			
			$data_materi['id_kategori'] = $row_data->id_kategori;
			
			$data_materi['materi'] = $row_data->materi;
			
			$data_materi['ringkasan'] = $ringkasan.'...';
			
			$data_materi['background'] = $row_data->background;
			
			$data_materi['path'] = $row_data->path;
			
			$data_materi['durasi'] = $row_data->durasi;
			
			$data_materi['like'] = $row_data->like;
			
			$data_materi['harga'] = $row_data->harga;
			
			$data_materi['id_user'] = $row_data->id_user;
			
			$data_materi['perusahaan'] = $row_data->perusahaan;
			
			$data_materi['deskripsi'] = $row_data->deskripsi;
			
			$data_materi['nama'] = $row_data->nama;
			
			$data_materi['email'] = $row_data->email;
			
			$data_materi['no_hp'] = $row_data->no_hp;
			
			$data_materi['password'] = $row_data->password;
			
			$data_materi['status'] = $row_data->status;

			$cek_kurusu_by_id_murid_id_matapelajaran_data = $this->model_kursus->cek_by_id_murid_id_matapelajaran($row_data->id_materi, $this->session->userdata('id_murid'));

			if (empty($cek_kurusu_by_id_murid_id_matapelajaran_data)) {

				$data_materi['status_kursus'] = '0';

			}else{

				$data_materi['status_kursus'] = '1';

			}

			$materi_result[] = $data_materi;
		}

		$data['id_user'] = $this->session->userdata('id_user');

		$data['data_materi'] = $materi_result;

        header('Content-Type: application/json');

		echo json_encode($data);

	}

}

