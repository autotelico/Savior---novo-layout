<?php
	if(isSet($_GET['lang']))
		$lang = $_GET['lang'];
	else if(isSet($_SESSION['lang']))
		$lang = $_SESSION['lang'];
	else if(isSet($_COOKIE['lang']))
		$lang = $_COOKIE['lang'];
	else if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	else
		$lang = 'pt';
	
	switch ($lang) {
		case 'pt':
		$language_code = "pt";
		break;
	 
		default:
		$language_code = "pt";
	}
	
	$_SESSION['lang'] = $language_code;
	setcookie('lang', $language_code, time() + (3600 * 24 * 30));
	
	include 'include/languages/'.$language_code.'.php';
	
	
	$language_codes = array(
			'pt' => 'Português');
?>