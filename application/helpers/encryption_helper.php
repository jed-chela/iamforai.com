<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		function passEncrypt($pass){
			return hash('snefru',"$pass");
		}
		
		function encode_num_string($string){
			$test_num=val_num_string($string) ;
			if($test_num == 0){
				//not a numeric string
				return 0 ;
			}else if($test_num == 1){ 
				$string = num_encode($string) ;
				return $string ;
			}
		}
		function decode_num_string($string){
			$string = num_decode($string) ;
			$string2 = encode_num_string($string) ;
			 if($string2 != "0"){
				 $string = num_decode($string2) ;
			return $string ;
			 }else return 0 ;
		}
		function val_num_string($string){
			for($i = 0; $i <= (strlen($string) - 1) ; $i++ )
				if (ereg('[0-9]', $string[$i])) {
				//tested character is a number 
				}else{
				//tested character is NOT a number		
				return 0 ;
				}
			return 1 ;
		}
		function num_encode($string){
		$string = iv_r('2','ev',$string) ;$string = iv_r('1','xk',$string) ;$string = iv_r('3','uw',$string) ;
		$string = iv_r('5','-bn',$string) ;$string = iv_r('7','h',$string) ;$string = iv_r('0','q',$string) ;
		$string = iv_r('9','d',$string) ;
		return $string ;
		}
		function num_decode($string){
		$string = iv_r('ev','2',$string) ;$string = iv_r('xk','1',$string) ;$string = iv_r('uw','3',$string) ;
		$string = iv_r('-bn','5',$string) ;$string = iv_r('h','7',$string) ;$string = iv_r('q','0',$string) ;
		$string = iv_r('d','9',$string) ;
		return $string ;
		}
		function iv_r($a,$b,$c){
			return str_replace($a,$b,$c) ;
		}
		
		function split_img_by_dot_ids($image_filename){
			$str = explode(".",$image_filename) ;
			return $str[0] ;
		}
		function split_img_by_dot_ext($image_filename){
			$ext = explode(".",$image_filename) ;
			$ext = $ext[1];
			$ext = str_replace("jpg","micro_j",$ext) ;
			$ext = str_replace("JPG","macro_j",$ext) ;
			$ext = str_replace("JPEG","max_j",$ext) ;
			return $ext ;
		}
		
/* End of file encryption_helper.php */
/* Location: ./application/helpers/encryption_helper.php */