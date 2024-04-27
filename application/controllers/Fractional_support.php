<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fractional_support extends CI_Controller {

	/**
	 * Designed by Jed
	 */

	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("GMT");
        $this->load_auth_libs_etc();
    }

    public function index()
	{
		$error_message = "";
		
		$data["title"] = "~ Fractional Support";
		$data["active_menu"] = "fractional";
		$this->load->view('fractional', $data);
	}
	private function load_auth_libs_etc(){
		// Load Database
	//	$this->load->database();

		// Load Libraries
	//	$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		
		// Load Helpers
		$this->load->helper('url_helper');
		$this->load->helper('main_helper');
		$this->load->helper('time_functions_helper');
	//	$this->load->helper('encryption_helper');
		
		// Load Models

		$this->load->model('Emailer') ;

  	}
}
