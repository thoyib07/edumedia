<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Registrasi_murid extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->model('model_registrasi_murid');   

    }



	public function index()

	{

		// $data['header_menu'] = $this->load->view('header_menu','',true);

		// $data['footer'] = $this->load->view('footer','',true);

		// $data['content'] = $this->load->view('page/login',true);

		$this->load->view('page/registrasi_murid');

	}



	public function ajax_save()

	{

        date_default_timezone_set('Asia/Jakarta');

        $date_now = date('Y-m-d H-i-s');  

        $nama_lengkap =  $this->input->post('nama_lengkap');

        $email =  $this->input->post('email');

        $handphone =  $this->input->post('handphone');

        $kelas =  $this->input->post('kelas');

        $kata_sandi =  $this->input->post('kata_sandi');

        $data_user = array(

            'nama' => $nama_lengkap,

            'email' => $email,

            'no_hp' => $handphone,

            'password' => md5($kata_sandi),

            'create_date' => $date_now,

            'status' => '0',

        );        

        $simpan_data_user = $this->model_registrasi_murid->save('m_user', $data_user);

        if ($simpan_data_user) {

            $data_murid = array(

                'id_user' => $simpan_data_user,

                'create_date' => $date_now,

                'status' => '0',

            );
            
            $simpan_data_murid = $this->model_registrasi_murid->save('m_student', $data_murid);

            if ($simpan_data_murid) {

                // $config = array(

                //     'protocol'  => 'smtp',

                //     'smtp_host' => 'mail.edumedia.id',

                //     'smtp_port' => 587,

                //     'smtp_timeout' => 30,

                //     'smtp_user' => 'info@edumedia.id',

                //     'smtp_pass' => 'qwerty!@#$%^&*()',

                //     'mailtype'  => 'html',

                //     'charset'   => 'utf-8'

                // );



                // $config = array(

                //     'protocol'  => 'smtp',

                //     'smtp_host' => 'ssl://smtp.googlemail.com',

                //     'smtp_port' => 465,

                //     'smtp_user' => 'aldio4869@gmail.com',

                //     'smtp_pass' => 'conan1611kid',

                //     'mailtype'  => 'html',

                //     'charset'   => 'utf-8'

                // );

                

                $config = [
                
                    'mailtype'  => 'html',
                
                    'charset'   => 'utf-8',
                
                    'protocol'  => 'smtp',
                
                    //'smtp_host' => 'smtp.gmail.com',
                
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                
                    'smtp_user' => 'edumedia.id@gmail.com',  // Email gmail
                
                    'smtp_pass'   => 'QWERTY!@#$%^&*()',  // Password gmail
                
                    'smtp_crypto' => 'ssl',
                
                    'smtp_port'   => 465,
                
                    'crlf'    => "\r\n",
                
                    'newline' => "\r\n"
                
                ];

                // $this->email->initialize($config);
                $this->load->library('email', $config);

                $this->email->set_mailtype("html");

                $this->email->set_newline("\r\n");

                $this->email->to($email);

                $this->email->from('info@edumedia.id','Edumedia.id');
              
              	$this->email->reply_to('no-reply@edumedia.id','Edumedia.id');

                $this->email->subject('Selamat datang di Edumedia.id');



                $data['id_user'] = $simpan_data_user;

                $data['id_murid'] = $simpan_data_murid;

                $html_format = $this->load->view('page/format_email_pendaftaran_siswa', $data, true);

                $this->email->message($html_format);
                
                // Tampilkan pesan sukses atau error
                if ($this->email->send()) {

                    $data['status'] = true;

                    $data['pesan'] = 'Sukses Daftar';



                    echo json_encode($data);

                }else{

                    $data['status'] = false;

                    $data['pesan'] = 'Gagal kirim email';



                    echo json_encode($data);

                }

            }else{                

                $data['status'] = false;

                $data['pesan'] = 'Gagal Daftar';
            }

        }else{            

            $data['status'] = false;

            $data['pesan'] = 'Gagal Daftar';

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

