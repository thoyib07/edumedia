<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Kursus extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_kursus');

        $this->load->model('model_kursus');

        $this->load->model('model_materi');

        $this->load->model('model_pelajaran');  
		

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



	public function get_all_kursus_by_id_murid()

	{

		$id_murid = $this->session->userdata('id_murid');



		$get_all_kurusus_by_id_murid_data = $this->model_kursus->get_by_id_murid($id_murid);



        $kursus_saya_result = array();

        foreach ($get_all_kurusus_by_id_murid_data as $row) {

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



        header('Content-Type: application/json');

		echo json_encode($kursus_saya_result);

	}



	public function save_mendaftar()

	{

        $id_materi =  $this->input->post('id_materi');

        $id_murid = $this->session->userdata('id_murid');



        $data_mendaftar = array(

            'id_student' => $id_murid,

            'id_materi' => $id_materi,

        );



        $simpan_data_user = $this->model_kursus->save('t_kursus', $data_mendaftar);  



        if ($simpan_data_user) {

            

            $get_sub_materi_by_id_materi_data = $this->model_materi->get_sub_materi_by_id_materi_all($id_materi);



            $indext_cont = 0;

            foreach ($get_sub_materi_by_id_materi_data as $row) {

                if ($indext_cont == 0) {

                    

                    $data_pelajaran = array(

                        'id_student' => $id_murid,

                        'id_sub_materi' => $row->id_sub_materi,

                        'status' => '1',

                    );



                    $simpan_data_user = $this->model_pelajaran->save('t_pelajaran', $data_pelajaran);

                }else{



                    $data_pelajaran = array(

                        'id_student' => $id_murid,

                        'id_sub_materi' => $row->id_sub_materi,

                    );



                    $simpan_data_user = $this->model_pelajaran->save('t_pelajaran', $data_pelajaran);

                }  



                $indext_cont++;

                

            }



            if ($simpan_data_user) {

                $data['status'] = true;

                $data['pesan'] = 'Sukses Daftar';



                echo json_encode($data);

            }else{

                $data['status'] = false;

                $data['pesan'] = 'Gagal daftar';



                echo json_encode($data);

            }

        }else{

            $data['status'] = false;

            $data['pesan'] = 'Gagal daftar';



            echo json_encode($data);

        }

	}



    public function save_mendaftar_edit($id_materi)

    {

        // $id_materi =  $this->input->post('id_materi');

        $id_murid = $this->session->userdata('id_murid');



        $data_mendaftar = array(

            'id_student' => $id_murid,

            'id_materi' => $id_materi,

        );



        $simpan_data_user = $this->model_kursus->save('t_kursus', $data_mendaftar);  



        if ($simpan_data_user) {

            

            $get_sub_materi_by_id_materi_data = $this->model_materi->get_sub_materi_by_id_materi_all($id_materi);



            $indext_cont = 0;

            foreach ($get_sub_materi_by_id_materi_data as $row) {

                if ($indext_cont == 0) {

                    

                    $data_pelajaran = array(

                        'id_student' => $id_murid,

                        'id_sub_materi' => $row->id_sub_materi,

                        'status' => '1',

                    );



                    $simpan_data_user = $this->model_pelajaran->save('t_pelajaran', $data_pelajaran);

                }else{



                    $data_pelajaran = array(

                        'id_student' => $id_murid,

                        'id_sub_materi' => $row->id_sub_materi,

                    );



                    $simpan_data_user = $this->model_pelajaran->save('t_pelajaran', $data_pelajaran);

                }  



                $indext_cont++;

                

            }



            if ($simpan_data_user) {

                $data['status'] = true;

                $data['pesan'] = 'Sukses Daftar';



                echo json_encode($data);

            }else{

                $data['status'] = false;

                $data['pesan'] = 'Gagal daftar';



                echo json_encode($data);

            }

        }else{

            $data['status'] = false;

            $data['pesan'] = 'Gagal daftar';



            echo json_encode($data);

        }

    }

}

