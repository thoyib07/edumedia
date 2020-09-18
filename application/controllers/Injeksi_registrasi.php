<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Injeksi_registrasi extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_injeksi');   

        $this->load->model('model_matapelajaran');

        $this->load->model('model_materi');

        $this->load->model('model_Kategori');

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

        $data['content'] = $this->load->view('page/injeksi_registrasi','',true);

        $data['footer'] = $this->load->view('footer','',true);

        $this->load->view('base_view', $data);

	}



	public function ajax_save()

	{

        // echo json_encode($_POST);

        // die();

        date_default_timezone_set('Asia/Jakarta');

        $date_now = date('Y-m-d H-i-s');  

        $nama =  $this->input->post('nama');

        $jabatan =  $this->input->post('jabatan');

        $email =  $this->input->post('email');

        $no_telpon_sekolah =  $this->input->post('no_telpon_sekolah');

        $jenjang_pendidikan =  $this->input->post('jenjang_pendidikan');

        $nama_sekolah =  $this->input->post('nama_sekolah');

        $alamat_sekolah =  $this->input->post('alamat_sekolah');

        $domain =  $this->input->post('domain');

        $tim_content =  $this->input->post('tim_content');

        $data_injeksi = array(

            'nama' => $nama,

            'jabatan' => $jabatan,

            'email' => $email,

            'no_telpon' => $no_telpon_sekolah,

            'jenjang_sekolah' => $jenjang_pendidikan,

            'nama_sekolah' => $nama_sekolah,

            'alamat_sekolah' => $alamat_sekolah,

            'domain' => $domain,

            'tim_content' => $tim_content,

        );        

        $simpan_data_injeksi = $this->model_injeksi->save('m_injeksi', $data_injeksi);

        if ($simpan_data_injeksi) {

            $data['status'] = true;

            $data['pesan'] = 'Sukses Daftar';

            echo json_encode($data);

        }else{            

            $data['status'] = false;

            $data['pesan'] = 'Gagal Daftar';

            echo json_encode($data);

        }

	}



    public  function verifikasi($id_user = null, $id_murid = null){

        $data_murid = array(

            'status' => '1',

        );



        $simpan_data_murid = $this->model_registrasi_murid->update('m_student', array('id_student' => $id_murid), $data_murid);

        

        $data_user = array(

            'status' => '1',

        );



        $simpan_data_user = $this->model_registrasi_murid->update('m_user', array('id_user' => $id_user), $data_user);



        $get_data_user_by_id = $this->model_registrasi_murid->get_by_id($id_user);

        

        $data['id_user'] = $get_data_user_by_id->id_user;

        $data['email'] = $get_data_user_by_id->email;

        $data['level'] = $get_data_user_by_id->level;

        $this->session->set_userdata($data);

        redirect('index.php/Home');

    }



    private function _validate()

    {

        $data = array();

        $data['error_string'] = array();

        // $data['error_class'] = array();

        $data['status'] = TRUE;

        

        if($this->input->post('nama_lengkap') == ''){

            $data['error_string']['nama_lengkap'] = 'nama lengkap harus di isi';

            $data['status'] = FALSE;

        }

        

        if($this->input->post('email') == ''){

            $data['error_string']['email'] = 'email harus di isi';

            $data['status'] = FALSE;

        }

        

        if($this->input->post('handphone') == ''){

            $data['error_string']['handphone'] = 'nomor handphone lahir harus di isi';

            $data['status'] = FALSE;

        }

        

        if($this->input->post('kata_sandi') == ''){

            $data['error_string']['kata_sandi'] = 'kata sandi harus di isi';

            $data['status'] = FALSE;

        }

        

        if($this->input->post('konfirmasi_kata_sandi') == '0'){

            $data['error_string']['konfirmasi_kata_sandi'] = 'konfirmasi sandi harus di isi';

            $data['status'] = FALSE;

        }

        

        if($data['status'] === FALSE){

            echo json_encode($data);

            exit();

        }

    }

}

