<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
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
		
		$data["title"] = "~ Home";
		$data["active_menu"] = "";
		$this->load->view('home', $data);
	}
	
	public function request_email($params = "")
	{
		$error_message = "";
		$email = protect($this->input->post("email"));
		if(isset($email) ){
			// Send Email Notification
			$message1 = "<h3>Hello!</h3>
                <p>Thank you, someone will reach out to you soon.</p>";
            $subject1 = "Tell your story";
            $bcc1 = array("jed@brifit.co");
			$this->Emailer->send_custom_email($email, $subject1, $message1, $bcc1);

			$message2 = "<h3>Hi Team,</h3>
                <p>".$email." has requested to tell their Asiwaju story.</p>
				<p>Kindly reach out to them.</p>
				<p>Thank you</p>";
            $subject2 = "New Story Request Received";
            $bcc2 = array("jed@brifit.co");
			$this->Emailer->send_custom_email("myasiwajustory@gmail.com", $subject2, $message2, $bcc2);
		}
		
	//	$this->load->view('video', $data);
	}

	public function testemailview(){
//		echo $this->Emailer->email_template("Jed", "Lorem ipsum dolor sit amet", "2022-01-14 15:12:46");
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
