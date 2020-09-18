<?php defined('BASEPATH') OR exit('No direct script access allowed.');



/*

 * @author      IHSAN MAULANA iisandesign@gmail.com

 * @copyright   Copyright (c) 2017, KOTA TANGERANG 

 */



global $rest_u,$rest_p;

$rest_u = 'r35t51kd4';

$rest_p = '5ksnpcua5x6z79yk5xgbtkg89a4zdwc8ym7p2f4z'; 



function get_login_skpd($username, $password)

{

	$CI =& get_instance();	

	$CI->load->library('curl');		 

	$CI->curl->create('http://opendatav2.tangerangkota.go.id/services/auth/login/uid/'.$username.'/pid/'.$password);		 

	$CI->curl->http_login($GLOBALS['rest_u'], $GLOBALS['rest_p']);	

	$result = json_decode($CI->curl->execute(),true);

	

	return $result;

}

function setLastPage() {
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	// var_dump("session_status : ",session_status());
	$CI =& get_instance();	

	if (isset($_SESSION['last_page'])) {
		if ($_SESSION['last_page'] !== "index.php/".uri_string()) {
			$CI->session->set_userdata('last_page', "index.php/".uri_string());
		}
	} else {
		$CI->session->set_userdata('last_page', "index.php/".uri_string());
	}
	// echo $_SESSION['last_page'];
}

?>