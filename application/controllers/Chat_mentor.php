<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Chat_mentor extends CI_Controller {



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

		$data['content'] = $this->load->view('page/chat_mentor','',true);

		$data['footer'] = $this->load->view('footer','',true);

		$this->load->view('base_view', $data);

	}

	public function get_all_mentor_aktif(){

		$get_all_mentor_aktif_data = $this->model_mentor->model_get_mentor_aktif();

		if ($get_all_mentor_aktif_data) {

			$data_mentor_resoult = array();

			foreach ($get_all_mentor_aktif_data as $row_data) {
				
				$data_mentor['id_mentor'] = $row_data->id_mentor;
				
				$data_mentor['id_user'] = $row_data->id_user;
				
				$data_mentor['perusahaan'] = $row_data->perusahaan;
				
				$data_mentor['deskripsi'] = $row_data->deskripsi;
				
				$data_mentor['create_date'] = $row_data->create_date;
				
				$data_mentor['update_date'] = $row_data->update_date;
				
				$data_mentor['status'] = $row_data->status;
				
				$data_mentor['nama'] = $row_data->nama;
				
				$data_mentor['email'] = $row_data->email;
				
				$data_mentor['foto'] = $row_data->foto;
				
				$data_mentor['no_hp'] = substr($row_data->no_hp, '1');
				
				$data_mentor['no_hp_show'] = $row_data->no_hp;

				$data_mentor_resoult[] = $data_mentor;

			}

			
			$data['status'] = true;

            $data['pesan'] = 'Sukses ambil data';

            $data['data'] = $data_mentor_resoult;

            echo json_encode($data);

		}else{
			
			$data['status'] = false;

            $data['pesan'] = 'Gagal ambil data';

            $data['data'] = null;

            echo json_encode($data);

		}

	}

}

