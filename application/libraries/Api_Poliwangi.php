<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api_Poliwangi
{
	function RestApiInit($server, $username, $password){
		ulang:
		$api_token="";
		//session_start();
		if(isset($_SESSION['api_token'])){
			$data= $this->getData($server,"ping", array(), $_SESSION['api_token']);
			
			if($data==null){
				if(isset($_SESSION['api_token'])){
					session_destroy();
					goto ulang;
				}
			}else{
				$api_token=$data->api_token;
			}
		}else{
			$api_token=$this->getAccessCode($server, $username, $password);
			$_SESSION['api_token']=$api_token;
		}
		return	$api_token;
	}

	function getAccessCode($server, $username, $password) {
		$url="http://".$server."/api/login.php";
		$key = "PoliwangiMantul!@#2013";
		$password = openssl_encrypt($password,"AES-128-ECB",$key);
		$username = openssl_encrypt($username,"AES-128-ECB",$key);
		
		$data = array("username" => "$username", "password" => "$password");
		$data_string = json_encode($data);

		$ch = curl_init();
		curl_setopt ( $ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, 3);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
		);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

		$data = curl_exec($ch);
		if(!$data){
			$err = curl_error($ch);
			echo "--> ".$err;
			return null;
		}
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if( !($httpcode>=200 && $httpcode<300) ){
			return null;
		}
		$data=openssl_decrypt($data,"AES-128-ECB",$key);
		$json = json_decode($data);
		if(isset($json->message) && $json->message=="Granted"){
			sleep(2);; // usleep(1000000); //1 detik
			return $json->api_token;
		}
		return null;
	}


	function getData($server, $service, $data, $api_token) {
		$url="http://".$server."/api/lite/".$service.".php";
		//echo $url."<br>";
		$data_string = json_encode($data);
		$key = "PoliwangiMantul!@#2013";
		//echo $data_string;
		$ch = curl_init();
		curl_setopt ( $ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, 3);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: '. $api_token ,
			'Content-Length: ' . strlen($data_string))
			
		);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

		$data = curl_exec($ch);
		if(!$data){
			$err = curl_error($ch);
			echo "--> ".$err;
			return null;
		}
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if( !($httpcode>=200 && $httpcode<300) ){
			return null;
		}
		
		$data=openssl_decrypt($data,"AES-128-ECB",$key);
		$json = json_decode($data);

		if(isset($json->message) && $json->message=="Granted"){
			$_SESSION['api_token']=$json->api_token;
			return $json;//$json->api_token;
		}
		return null;
	}

}

?>