<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * Index Page for this controller.
	 * Designed by Jed
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load_auth_libs_etc();
    }

	public function index()
	{
		echo $this->Emailer->email_template("Jed A", "Lorem ipsum dolor sit amet", "2022-01-14 15:12:46");
	}
	public function testemailview(){
		echo $this->Emailer->email_template("Jed", "Lorem ipsum dolor sit amet", "2022-01-14 15:12:46");
	}
	
	private function load_auth_libs_etc(){
		// Load Database
		$this->load->database();

		// Load Libraries
	//	$this->load->library('session');
	//	$this->load->library('database');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		
		// Load Helpers
		$this->load->helper('url_helper');
		$this->load->helper('main_helper');
		$this->load->helper('time_functions_helper');
	//	$this->load->helper('encryption_helper');
		
		// Load Models
		$this->load->model('Message') ;
		$this->load->model('Emailer') ;

  	}
}
