<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Kuis extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_kuis');  

        $this->load->model('model_materi');   

        $this->load->model('model_pelajaran');   
		
    }



	public function index()

	{
		setLastPage();
		// $data['header_menu'] = $this->load->view('header_menu','',true);

		// $data['footer'] = $this->load->view('footer','',true);

		// $data['content'] = $this->load->view('page/login',true);

		$this->load->view('page/kuis');

	}



	public function get_kuis($id_sub_materi = null, $id_materi = null)

	{
		setLastPage();
		$get_soal_by_id_materi = $this->model_kuis->get_by_id_materi($id_sub_materi);



		$data_result_soal =array();

		foreach ($get_soal_by_id_materi as $row) {

			$row_soal['id_soal'] = $row->id_soal;

			$row_soal['id_sub_materi'] = $row->id_sub_materi;

			$row_soal['id_jawaban'] = $row->id_jawaban;

			$row_soal['soal'] = $row->soal;

			$row_soal['jenis'] = $row->jenis;

			$row_soal['skor'] = $row->skor;



			$get_jawaban_by_id_soal = $this->model_kuis->get_jawaban_by_id_soal($row->id_soal);

			$row_soal['jawaban_show'] = $get_jawaban_by_id_soal;



			$data_result_soal[] = $row_soal; 

		}

		$data_soal['id_sub_materi'] = $id_sub_materi;

		$data_soal['id_materi'] = $id_materi;

		$data_soal['data_soal'] = $data_result_soal;	

		$this->load->view('page/kuis', $data_soal, false);

	}



	public function get_kuis_by_id_materi($id_materi = null){

		$get_soal_by_id_materi = $this->model_kuis->get_by_id_materi($id_materi);



		$data_result_soal =array();

		foreach ($get_soal_by_id_materi as $row) {

			$row_soal['id_soal'] = $row->id_soal;

			$row_soal['id_materi'] = $row->id_materi;

			$row_soal['id_jawaban'] = $row->id_jawaban;

			$row_soal['soal'] = $row->soal;

			$row_soal['jenis'] = $row->jenis;

			$row_soal['skor'] = $row->skor;



			$get_jawaban_by_id_soal = $this->model_kuis->get_jawaban_by_id_soal($row->id_soal);

			$row_soal['jawaban_show'] = $get_jawaban_by_id_soal;



			$data_result_soal[] = $row_soal; 

		}



		echo json_encode($data_result_soal);

	}



	public function cek_kuis(){

		$data_result_kuis = array();

		$data1['id_soal'] = $_POST['1']['soal'];

		$data1['id_jawaban'] = $_POST['1']['jawaban'];

		$data_result_kuis[] = $data1;



		$data2['id_soal'] = $_POST['2']['soal'];

		$data2['id_jawaban'] = $_POST['2']['jawaban'];

		$data_result_kuis[] = $data2;



		$data3['id_soal'] = $_POST['3']['soal'];

		$data3['id_jawaban'] = $_POST['3']['jawaban'];

		$data_result_kuis[] = $data3;



		$data4['id_soal'] = $_POST['4']['soal'];

		$data4['id_jawaban'] = $_POST['4']['jawaban'];

		$data_result_kuis[] = $data4;



		$data5['id_soal'] = $_POST['5']['soal'];

		$data5['id_jawaban'] = $_POST['5']['jawaban'];

		$data_result_kuis[] = $data5;





		$id_sub_materi = $_POST['id_sub_materi'];

		$id_materi = $_POST['id_materi'];

		$id_murid = $this->session->userdata('id_murid');



		$jml_poin = 0;

		$poin_resoult = array();

		foreach ($data_result_kuis as $row) {

			$get_jawaban_kuis = $this->model_kuis->get_by_id_soal($row['id_soal']);	

			

			if ($get_jawaban_kuis->id_jawaban == $row['id_jawaban']) {

				$jml_poin = $jml_poin+20;

				$data_koreksi_soal['soal_'.$row['id_soal']] = true;

			}else{

				$data_koreksi_soal['soal_'.$row['id_soal']] = false;

			}



		}



		$data_kuis = array(

            'poin' => $jml_poin,

            'status' => '2',

        );          

		$id_student = $this->session->userdata('id_murid');

        $update_data_kuis = $this->model_kuis->update('t_pelajaran', array('id_sub_materi' => $id_sub_materi, 'id_student' => $id_student), $data_kuis);



        $get_materi_by_id_sub_materi_id_user_data = $this->model_kuis->get_materi_by_id_sub_materi_id_user($id_sub_materi, $id_murid);



        $id_pelajaran = $get_materi_by_id_sub_materi_id_user_data->id_pelajaran;

        $id_pelajaran = $id_pelajaran+1;



        // $get_sub_materi_by_id_materi = $this->model_materi->get_sub_materi_by_id_materi_no_null($id_materi);

        // $get_sub_materi_by_id_materi_finis = $this->model_materi->get_sub_materi_by_id_materi_no_null_final($id_materi);

        $get_all_kategori_by_id_user_id_materi_data = $this->model_materi->get_all_kategori_by_id_user_id_materi($id_murid, $id_materi);

        $get_all_kategori_by_id_user_id_materi_data_final = $this->model_materi->get_all_kategori_by_id_user_id_materi_final($id_murid, $id_materi);

        // echo json_encode(count($get_all_kategori_by_id_user_id_materi_data_final));
        // die();

        if (count($get_all_kategori_by_id_user_id_materi_data_final) > count($get_all_kategori_by_id_user_id_materi_data)) {

        	$data_show['jml_poin'] = $jml_poin;

	        $data_show['data_koreksi'] = $data_koreksi_soal; 



            $data['status'] = true;

            $data['pesan'] = 'Sukses Daftar';

            $data['data'] = $data_show;



            // echo json_encode($data);



            redirect('index.php/Kuis/report_kuis/'.$id_materi.'/'.$id_sub_materi);

        }else{

        	$data_pelajaran = array(

	            'status' => '1',

	        );   

        	// echo json_encode($id_pelajaran);
        	// die();

	        $update_matapelajaran = $this->model_kuis->update('t_pelajaran', array('id_pelajaran' => $id_pelajaran), $data_pelajaran);



	        $data_show['jml_poin'] = $jml_poin;

	        $data_show['data_koreksi'] = $data_koreksi_soal; 



            $data['status'] = true;

            $data['pesan'] = 'Sukses Daftar';

            $data['data'] = $data_show;



            // echo json_encode($data);



            redirect('index.php/Kuis/report_kuis/'.$id_materi.'/'.$id_sub_materi);

        }

	}



	public function report_kuis($id_materi, $id_sub_materi){
		setLastPage();
		$get_soal_by_id_materi = $this->model_kuis->get_by_id_materi($id_sub_materi);



		$data_result_soal =array();

		foreach ($get_soal_by_id_materi as $row) {

			$row_soal['id_soal'] = $row->id_soal;

			$row_soal['id_sub_materi'] = $row->id_sub_materi;

			$row_soal['id_jawaban'] = $row->id_jawaban;

			$row_soal['soal'] = $row->soal;

			$row_soal['jenis'] = $row->jenis;

			$row_soal['skor'] = $row->skor;



			$get_jawaban_by_id_soal = $this->model_kuis->get_jawaban_by_id_soal($row->id_soal);

			$row_soal['jawaban_show'] = $get_jawaban_by_id_soal;



			$data_result_soal[] = $row_soal; 

		}



		$id_murid = $this->session->userdata('id_murid');

		$get_data_pelajaran_by_id_sub_materi_id_murid = $this->model_pelajaran->get_by_id_sub_materi_id_murid($id_sub_materi, $id_murid);



		$data_soal['id_sub_materi'] = $id_sub_materi;

		$data_soal['data_soal'] = $data_result_soal;	

		$data_soal['poin'] = $get_data_pelajaran_by_id_sub_materi_id_murid->poin;

		$data_soal['id_materi'] = $id_materi;

		$this->load->view('page/report_kuis', $data_soal, false);

	}

}

