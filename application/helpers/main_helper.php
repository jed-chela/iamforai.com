<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');	

	/* Input Cleansing/Sterilization */
	function protect($string){
		$string = (htmlentities(trim($string ))) ;
		return $string;
	}
	function protectNoUTF8($string){
		$string = htmlentities(trim($string ), ENT_QUOTES) ;
		return $string;
	}
	function protectNoTrim($string){
		$string = htmlentities($string , ENT_QUOTES, 'UTF-8') ;
		return $string;
	}
	function noProtect($string){
		return trim($string ) ;
	}
    function protectExactText($str){
		$str = protectNoTrim($str);
		return keepStringForm($str) ;
	}
	function decodeURLEncodedString($string){
		return rawurldecode($string) ;
	}
	function ajaxTxtPostProtect($str){
		$str = $str ;
		
		$len = strlen($str) ;
		
		if($str[0] == "#"){
			if($str[$len - 1] == "?"){
				$str = substr($str,1,($len - 2)) ;
				$cryp = new nebula_cryptic() ;
				$str = $cryp->decrypt($str) ;
				$str = protect($str);
				return keepStringForm($str) ;
			}else{ 
				//log error
				return 0; 
			}
		}else{ 
			//log error
			return 0; 
		}
	}
	function keepStringForm($content){
		if($content != ""){
			$content = str_replace("\n","<br>",$content) ;
			$content = str_replace("  "," "."&nbsp;",$content) ;
		}
		return $content ;
	}
	function getStringTextForm($content){
		if($content != ""){
			$content = str_replace("<br>","\n",$content) ;
			$content = str_replace(" "."&nbsp;", "  ", $content) ;
			$content = str_replace("&quot;", '"', $content) ;
		}
		return $content ;
	}

	/* Confirm If user is Logged in */
	function confirmLoginStat(){
		if((isset($_SESSION['ordering_app_fxgv89v2_LOGXVCDcrypt'])) && ($_SESSION['ordering_app_fxgv89v2_LOGXVCDcrypt_logged_in'] == 1) ) {
			return 1 ;
			}
		else return 0 ;
	}
	/* Get Logged in user_id */
	function get_logged_in_user_id(){
		if(confirmLoginStat() == 1){
			return $_SESSION['ordering_app_fxgv89v2_LOGXVCDcrypt'] ;
		}else{
			return "" ;
		}
	}
	/* User Registration */
	function store_reg_details($user_id,$matric_no,$pass,$oname,$lname,$privilege){
		$status = 1 ;
		$query = "INSERT INTO users(user_id,matric_no,pass,oname,lname,status,privilege,time) 
					VALUES('$user_id','$matric_no','$pass','$oname','$lname','$status','$privilege',CURRENT_TIMESTAMP) " ;
		$result = mysql_query($query) or die("sto_reg_dets ".mysql_error() ) ;
		return 1;
	}
	function load_error_and_quit($err,$location){
		$_SESSION['post_grad_csc_ui_b007_reg_error'] = $err ;
		header("Location:$location") ;
	}
	function get_reg_error(){
		if(isset( $_SESSION['post_grad_csc_ui_b007_reg_error']) ){
			return $_SESSION['post_grad_csc_ui_b007_reg_error'] ;
		}else return 0 ;
	}
	function clear_reg_error(){
		if(isset( $_SESSION['post_grad_csc_ui_b007_reg_error']) ){
			unset($_SESSION['post_grad_csc_ui_b007_reg_error']) ;
		}else return 0 ;
	}
	function load_error_quit($err,$location){
		$_SESSION['post_grad_csc_ui_b007_error'] = $err ;
		header("Location:$location") ;
	}
	function get_error(){
		if(isset( $_SESSION['post_grad_csc_ui_b007_error']) ){
			return $_SESSION['post_grad_csc_ui_b007_error'] ;
		}else return 0 ;
	}
	function clear_error(){
		if(isset( $_SESSION['post_grad_csc_ui_b007_error']) ){
			unset($_SESSION['post_grad_csc_ui_b007_error']) ;
		}else return 0 ;
	}
	/* Validate Login matric_no */
	function check_matric($matric_no){
			$query = "SELECT matric_no FROM users WHERE matric_no = '$matric_no'" ;
			$result = mysql_query($query) or die("chk_ma ".mysql_error() ) ;
			if(mysql_num_rows($result) > 0){ return 1 ;
			}else{ return 0 ;  }
	}
	function login_matric($matric_no){
		if(confirmLoginStat() != 1){
			$query = "SELECT user_id,matric_no,oname,lname FROM users WHERE matric_no = '$matric_no'" ;
			$result = mysql_query($query) or die("lgn_ma ".mysql_error() ) ;
			if(mysql_num_rows($result) > 0){ return 1 ;
			}else{ return 0 ;  }
		}else{ return 0; }
	}
	function login_password($matric_no, $pass, $skip = ''){
		if(confirmLoginStat() != 1){
			if($skip == ''){
				$cryptic = new Encrytion() ;
				$pass = $cryptic->passEncrypt($pass) ;
			}
			$query = "SELECT user_id,matric_no,oname,lname FROM users WHERE matric_no = '$matric_no' AND pass = '$pass'" ;
			$result = mysql_query($query) or die("lgn_ma ".mysql_error() ) ;
			if(mysql_num_rows($result) > 0){
				list($user_id, $matric_no, $oname, $lname) = mysql_fetch_row($result);
				return log_me_in($user_id, $matric_no, $oname, $lname);
			}else{
				return 0 ;
			}
		}else{ return 0 ; }
	}
	function log_me_in($user_id, $matric_no, $oname, $lname){
		if(confirmLoginStat() != 1){
			$_SESSION['ordering_app_fxgv89v2_LOGXVCDcrypt'] = $user_id ;
			$_SESSION['ordering_app_fxgv89v2_LOGXVCDcrypt_logged_in'] = 1 ;
			$_SESSION['post_grad_csc_ui_b007_matric_no'] = $matric_no;
			$_SESSION['post_grad_csc_ui_b007_oname'] = $oname;
			$fname = explode(" ",$oname) ;
			$_SESSION['post_grad_csc_ui_b007_fname'] = $fname[0];
			$_SESSION['post_grad_csc_ui_b007_lname'] = $lname;
			return 1 ;
		}else{ return 0 ; }
	}
	function log_me_out(){
		if(confirmLoginStat() == 1){
			$_SESSION['ordering_app_fxgv89v2_LOGXVCDcrypt'] = "" ;
			$_SESSION['ordering_app_fxgv89v2_LOGXVCDcrypt_logged_in'] = 0 ;
			$_SESSION['post_grad_csc_ui_b007_matric_no'] = "";
			$_SESSION['post_grad_csc_ui_b007_oname'] = "";
			$_SESSION['post_grad_csc_ui_b007_fname'] = "";
			$_SESSION['post_grad_csc_ui_b007_lname'] = "";
			unset($_SESSION['ordering_app_fxgv89v2_LOGXVCDcrypt']);
			unset($_SESSION['post_grad_csc_ui_b007_matric_no']) ;
			unset($_SESSION['post_grad_csc_ui_b007_oname']) ;
			unset($_SESSION['post_grad_csc_ui_b007_fname']) ;
			unset($_SESSION['post_grad_csc_ui_b007_lname']) ;
			return 1 ;
		}else{ return 0 ; }
	}
	function get_curr_user_matric_no(){
		if(confirmLoginStat() == 1){
		return $_SESSION['post_grad_csc_ui_b007_matric_no']; }
		else{ return 0; }
	}
	function get_curr_user_oname(){
		if(confirmLoginStat() == 1){
		return $_SESSION['post_grad_csc_ui_b007_oname']; }
		else{ return 0; }
	}
	function get_curr_user_fname(){
		if(confirmLoginStat() == 1){
		return $_SESSION['post_grad_csc_ui_b007_fname']; }
		else{ return 0; }
	}
	function get_curr_user_lname(){
		if(confirmLoginStat() == 1){
		return $_SESSION['post_grad_csc_ui_b007_lname']; }
		else{ return 0; }
	}
	
	/* ID Generators */
	function checkAnId($id,$id_tablename,$id_fieldname){
		$ci = get_codeigniter_this() ;
		$query = "SELECT $id_fieldname FROM $id_tablename WHERE $id_fieldname = '$id' " ;
		$query = $ci->db->query($query) ;
		if ($query->num_rows() > 0)
		{
			return true ;
		}
		return false ;
	}
	function createAnId($id_tablename,$id_fieldname){
		$id = ( mt_rand(10, 999) * 5 ) + mt_rand(1020025005, 1920025005) ; //10 digits max	
		$chkem = checkAnId($id,$id_tablename,$id_fieldname) ;
		while($chkem != false){ 
			$id = ( mt_rand(2, 1000) * 5 ) + mt_rand(100, 9990000999) ;	 //10 digits max
			$chkem = checkAnId($id,$id_tablename,$id_fieldname) ;
			}
		return $id ;
	}
	function createAnIdSmall($id_tablename,$id_fieldname){
		$id = ( mt_rand(10, 999) * 3 ) + mt_rand(100, 99999) ; //10 digits max	
		$chkem = checkAnId($id,$id_tablename,$id_fieldname) ;
		while($chkem != false){ 
			$id = ( mt_rand(2, 1000) * 5 ) + mt_rand(100, 9990000999) ;	 //10 digits max
			$chkem = checkAnId($id,$id_tablename,$id_fieldname) ;
			}
		return $id ;
	}

	/* Get Codeigniter $this Object */
	function get_codeigniter_this(){
		$ci =& get_instance() ;
		return $ci ;
	}

	/* Regular Session handlers */
	function setLastUrl(){
		$url = $_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'] ;
		setcookie("last_url","$url");
	}
	function getLastUrl($val = 0){
		if(isset($_COOKIE['last_url'])){
			return protect($_COOKIE['last_url'] ) ;
		}else{ 
			if($val == 1){ return "search_projects.php" ;
			}else return 0 ; 
		}
	}
	
	/* Misc */
	function getSelect($name,$lower,$upper,$inc,$class=""){
		$o = "<select name='$name' class='$class'>" ;
			$o .= "<option value=\" \">-- SELECT --</option>" ;
			for($i = $lower; $i <= $upper; $i += $inc){
				$o .= "<option value='$i'>$i</option>" ;
			}
		$o .= "</select>" ;
		return $o ;
	}
	function getSelectOpts($num,$opts,$texts,$name='',$class=''){
		$o  = "<select name='$name' class='$class'>" ;
			for($i = 0; $i < $num; $i++){
				$o .= "<option value='".$opts[$i]."'>".$texts[$i]."</option>" ;
			}
		$o .= "</select>" ;
		return $o ;
	}
	function returnProjectType($int){
			switch($int){
				case 1: return "Postgraduate" ; break ;
				case 2: return "Undergraduate" ; break ;
				default: return 0; break ;
			}
		}
	function returnPageHref($val){
		switch($val){
			case "upl": return "upload_project.php" ; break ;
			case "uplres": return "upload_project.php" ; break ;
			case "srch": return "search_projects.php" ; break ;
			default: return "index.php" ;break ;
		}
	}
	function firstLetterToCaps($str){
		if($str != ""){
			$str[0] = strtoupper($str[0]) ;
		}
		return $str ;
	}
	function spaceAfterComma($str){
		$str = str_replace(",  ",",",$str);
		$str = str_replace(", ",",",$str);
		$str = str_replace(",",", ",$str);
		return $str ;
	}
/* End of file main_helper.php */
/* Location: ./application/helpers/main_helper.php */