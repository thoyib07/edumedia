<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('chat_model');
		$this->load->library('ci_pusher');
		date_default_timezone_set('Asia/Jakarta');
		// var_dump($_SESSION);
	}
	
	public function index(){
		if (!isset($_SESSION['email'])) { 
			$this->load->view('chat/login_chat'); 
		} else {	
			$data['active_members'] = $this->chat_model->get_all_online('idle');
			$data['myprofile'] = $this->chat_model->get_by_id($this->session->userdata('id'));
			$this->load->view('chat/chat',$data);
		}
	}	

	public function register(){
		$username = $this->input->post('username');
		$email 	  = $this->input->post('email');
		$password = $this->input->post('password');
		$data = array(
			'username' => $username,
			'email'    => $email,
			'password' => password_hash($password, PASSWORD_DEFAULT), 
			'status'   => 'idle',
		);

		$this->chat_model->add_user($data);
		redirect(base_url().'chat');
	}

	public function login_submit(){

	 	$logged = $this->chat_model->login();

        if( $logged == 1 ){
	    	$data = array('status' => "idle");
			$this->chat_model->update($this->session->userdata('id'),$data);
            $this->append_onnline();
            redirect('chat');
        }else{
            redirect('chat');
        }
	}

	public function append_onnline(){
		//pusher
		$pusher = $this->ci_pusher->get_pusher();	
		$data['id_user'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('user_name');
		// $event = $pusher->trigger('chatglobal', 'appendponline', $data);
		$event = $pusher->trigger('my-channel', 'appendponline', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		$data = array('status' => "");
		$this->chat_model->update($this->session->userdata('id'),$data);
		redirect('chat');
	}

	public function chatsend(){
		$pusher = $this->ci_pusher->get_pusher();
		$data['channel'] = 'my-channel';
		$data['event'] = 'my-event';
		$data['message'] = $_POST['message'];
		$data['date'] = date('d M Y H:i A');
		$data['id_user'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('user_name');
		
		// $event = $pusher->trigger('chatglobal', 'my_event', $data);		
		$event = $pusher->trigger($data['channel'], $data['event'], $data);
		// var_dump($event);die;
		if ($event) {
			unset($data['username']);
			$data['date'] = date('Y-m-d H:i:s');
			$this->chat_model->add_chat($data);
		}
	}

	public function chatsend2(){
		$pusher = $this->ci_pusher->get_pusher();
		$data['channel'] = $_POST['channel'];
		$data['event'] = $_POST['event'];
		$data['message'] = $_POST['message'];
		$data['date'] = date('d M Y H:i A');
		$data['id_user'] = $this->session->userdata('id_user');
		// $data['id_user'] = $this->session->userdata('id_murid');
		$data['username'] = $this->session->userdata('nama_murid');
		
		// $event = $pusher->trigger('chatglobal', 'my_event', $data);		
		$event = $pusher->trigger($data['channel'], $data['event'], $data);
		// var_dump($event);die;
		if ($event) {
			unset($data['username']);
			$data['date'] = date('Y-m-d H:i:s');
			$this->chat_model->add_chat($data);
		}
	}

	public function update_user(){
		$username = $_POST['username'];
		$email    = $_POST['email'];
		$password = $_POST['password'];
		if($password == ""){
			$data = array(
				'username' => $username,
				'email'    => $email,
			);
		}else{
			$data = array(
				'username' => $username,
				'email'    => $email,
				'password' => $password,
			);
		}
		$this->chat_model->update($this->session->userdata('id'),$data);
	}

	public function getChat(){
		// var_dump($_GET);
		// die;
		$result = $this->chat_model->get_all_chat2();
		// var_dump(json_encode($result));
		echo json_encode($result);
	}
}
