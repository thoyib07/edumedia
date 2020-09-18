<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_login');

    }



	public function index()

	{
        // var_dump($_SESSION['last_page']);
        // var_dump($_SESSION);
		// $data['header_menu'] = $this->load->view('header_menu','',true);

		// $data['footer'] = $this->load->view('footer','',true);

		// $data['content'] = $this->load->view('page/login',true);

		$this->load->view('page/login');

	}



	public function cek_login()

	{	

        // echo json_encode($_POST);
        // var_dump($_SESSION['last_page']);
        // die();

        date_default_timezone_set('Asia/Jakarta');

        $date_now = date('Y-m-d H-i-s');

        $email = $this->input->post('email');

        $password = md5($this->input->post('kata_sandi'));



        $cek_data_login = $this->model_login->cek_login($email, $password);

        // echo json_encode($cek_data_login);
        // die();



        if ($cek_data_login) {  



        	// $this->session->sess_destroy();

            $data['id_user'] = $cek_data_login->id_user;

            // echo json_encode($cek_data_login);

            // die();

            // if ($cek_data_login->id_student) {

                $data['id_murid'] = $cek_data_login->id_student;



                $get_murid_by_id_murid = $this->model_login->get_by_id_murid($cek_data_login->id_student);   

                // echo json_encode($get_murid_by_id_murid);
                // die();



                $data['nama'] = $get_murid_by_id_murid->nama;

                $data['email'] = $cek_data_login->email;

                $data['level'] = $cek_data_login->level;

                $this->session->set_userdata($data);

                // redirect('index.php/Home');
                redirect($_SESSION['last_page']);
                // header('Location: '.$_SESSION['last_page']);
                // exit();
                // echo json_encode('sukses data');

                // echo json_encode($this->session->userdata('id_user'));

                // die();

            // }else{

            //     $data['id_murid'] = '-'; 

            //     $data['nama_lengkap'] = '-';

            //     $data['email'] = $cek_data_login->email;

            //     $data['level'] = $cek_data_login->level;

            //     $this->session->set_userdata($data);

            //     redirect('index.php/Home');

            //     // echo json_encode('sukses data');

            //     // echo json_encode($this->session->userdata('id_user'));

            //     // die();

            // }

        }else{

			$this->session->set_flashdata('pesan','Username atau Password Salah');

			// echo json_encode('gagal ata data');

        }

		redirect('index.php/Login');

	}

    public function pergeseran_ekonomi_indonesia_2020_2022(){

        // $data['header_menu'] = $this->load->view('header_menu','',true);

        // $data['footer'] = $this->load->view('footer','',true);

        // $data['content'] = $this->load->view('page/login',true);

        $this->load->view('page/login');
    }

	

	public function logout() {

        $this->session->sess_destroy();

        redirect(base_url().'index.php/Home');

    }

}

