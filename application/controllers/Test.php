<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Test extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        // $this->load->model('model_Kategori');

        // $this->load->model('model_kursus');

        $this->load->library('email');  

    }



	public function index()

	{

		echo "Masuk Cont Testing";

	}

  

    public function sendEmail(){

        $config['protocol']='smtp'; 

        $config['smtp_host']='ssl://smtp.Gmail.com';  

        $config['smtp_port']='465';  

        $config['smtp_timeout']='30';  

        $config['smtp_user'] = "spero.mailtesting@gmail.com"; //fill your email

        $config['smtp_pass'] = "qwerty!@#$%^&*()1234567890"; // fill your password

        $config['charset']='utf-8';  

        $config['mailtype']='html';

        $config['starttls']=true;

        $config['wordwrap']=true;

        $config['newline']="\r\n"; 

        $config['charset']='iso-8859-1'; 



        $this->email->initialize($config);



        $this->email->from('spero.mailtesting@gmail.com', 'mailing spero');

        $this->email->reply_to('spero.mailtesting@gmail.com', 'no reply');

        $this->email->to('thoyibh07@gmail.com');

    

        $this->email->subject('Test email dari edumedia.id');

        $this->email->message('Nyoba ngirim email dari edumedia.id');

    

        if ($this->email->send(FALSE)) {

            echo TRUE;

        } else {

            echo $this->email->print_debugger(array('header'));

            echo FALSE;

        }

    }

  

  	public function test_send_email(){

      			$emailto=(isset($_GET['emailto'])) ?$_GET['emailto']:"thoyibh07@gmail.com";

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



                $this->email->to($emailto);



                $this->email->from('edumedia.id@gmail.com','Edumedia.id');

              

              	$this->email->reply_to('no-reply@edumedia.id','Edumedia.id');



                $this->email->subject('Hore, sedikit lagi kamu jadi bagian edumedia.id');







                $data['id_user'] = 1;



                $data['id_murid'] = 1;



                $html_format = $this->load->view('page/test_email', $data, true);



                $this->email->message($html_format);

                

                // Tampilkan pesan sukses atau error

                $this->email->send();

    }

  

  	public function verifikasi($token=""){

      var_dump("Token : <hr>",$token);

      die;

    }

}

