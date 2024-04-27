<?php

class Emailer extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
		// Call the Model constructor
        parent::__construct();
		
	}
	
	var $domain 			= "myasiwajustory.com" ;
	var $from_default 		= "noreply@myasiwajustory.com" ;
	var $contact_email		= "info@myasiwajustory.com" ;
	var $from_default_name 	= "myasiwajustory.com" ;
	var $mail_header_title 	= "myasiwajustory.com" ;
	
	// EMAIL TEMPLATE
	public function send_custom_email($email, $subject, $message, $bcc = array(), $attachments = array()) {
		$this->load->library('email');
		
		$this->email->from($this->from_default, $this->from_default_name);
		$this->email->to($email);
		
		if(count($bcc) > 0){
			$this->email->bcc($bcc);
		}
		
		if(count($attachments) > 0){
			for($i = 0; $i < count($attachments); $i++){
				$this->email->attach($attachments[$i]);
			}
		}
		
		$this->email->subject($subject);
		
		$data = array(
			"message" => $message,
		);
		$msg = $this->load->view("email_templates/email_custom1", $data, true);
		
		$this->email->message($msg);
		
		if($this->email->send()){ return true; }
		
		return false;
	}

	public function send_email_notification($email, $subject, $name, $guest_email, $message, $timestamp, $template_name = "", $cc = array(), $attachments = array()) {
		$this->load->library('email');
		
		$this->email->from($this->from_default, $this->from_default_name);
		$this->email->to($email);
		
		if(count($cc) > 0){
			$this->email->bcc($cc);
		}
		
		if(count($attachments) > 0){
			for($i = 0; $i < count($attachments); $i++){
				$this->email->attach($attachments[$i]);
			}
		}
		
		$this->email->subject($subject);
		
		$msg = $this->email_template($name, $guest_email, $message, $timestamp, $template_name);
		
		$this->email->message($msg);
		
		if($this->email->send()){ return true; }
		
		return false;
	}

	public function send_email_signup_verify($name, $email, $subject, $link, $cc = array(), $attachments = array()) {
		$this->load->library('email');
		
		$this->email->from($this->from_default, $this->from_default_name);
		$this->email->to($email);
		
		if(count($cc) > 0){
			$this->email->bcc($cc);
		}
		
		if(count($attachments) > 0){
			for($i = 0; $i < count($attachments); $i++){
				$this->email->attach($attachments[$i]);
			}
		}
		
		$this->email->subject($subject);
		
		$msg = $this->email_template_signup_verify($name, $email, $subject, $link);
		
		$this->email->message($msg);
		
		if($this->email->send()){ return true; }
		
		return false;
	}
	
	public function send_email_forgot_password($email, $subject, $link, $cc = array(), $attachments = array()) {
		$this->load->library('email');
		
		$this->email->from($this->from_default, $this->from_default_name);
		$this->email->to($email);
		
		if(count($cc) > 0){
			$this->email->bcc($cc);
		}
		
		if(count($attachments) > 0){
			for($i = 0; $i < count($attachments); $i++){
				$this->email->attach($attachments[$i]);
			}
		}
		
		$this->email->subject($subject);
		
		$msg = $this->email_template_forgot_password($email, $subject, $link);
		
		$this->email->message($msg);
		
		if($this->email->send()){ return true; }
		
		return false;
	}
	
	public function email_template($name, $guest_email, $message, $timestamp, $template_name = "email1"){
		$data = array(
			"name" => $name,
			"guest_email" => $guest_email,
			"message" => $message,
			"timestamp" => $timestamp,
		);
		return $this->load->view($template_name, $data, true);
	}
	public function email_template_signup_verify($name, $recipient, $subject, $link){
		$data = array(
			"name" => $name,
			"subject" => $subject,
			"recipient" => $recipient,
			"link" => $link,
		);
		return $this->load->view("email2", $data, true);
	}
	public function email_template_forgot_password($recipient, $subject, $link){
		$data = array(
			"subject" => $subject,
			"recipient" => $recipient,
			"link" => $link,
		);
		return $this->load->view("email_template_forgot_password", $data, true);
	}
	
	
	
}

?>