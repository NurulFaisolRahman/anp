<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index(){
		$this->load->view('SignIn');
	}

	public function SignIn(){
		$username = $_POST['Username'];
	  	$password = $_POST['Password'];
		$this->load->database();
	    $User = $this->db->get_where('User', array('Username' => $username,'Password' => $password));
		if($User->num_rows() == 0){
	  		echo "Username / Password Salah";
	  	}
	  	else{
		    if ($User->row_array()["Username"] == "admin") {
		      	echo "Admin";
		    } else {
	        	echo "Siswa";
	        }	
		// 	$DataSession = array('Status' => "Login", 'User' => $Akun["Username"]);
		// 	$this->session->set_userdata($DataSession);
	  	}
	}

}
