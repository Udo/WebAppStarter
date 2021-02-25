<?php 
	
	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('display_errors', 'on');
	date_default_timezone_set('Europe/Berlin');
	
	session_start();
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	
	define('DATE_FORMAT', 'd.m.Y');
	define('DATETIME_FORMAT', 'd.m.Y H:i');
	define('DATE_FORMAT_ZULU', 'Ymd\THis\Z');
	define('ONE_MINUTE', 60);
	define('ONE_HOUR', 60*60);
	define('ONE_DAY', 60*60*24);
	define('ONE_MONTH', 60*60*24*30);
	define('ONE_YEAR', 60*60*24*30*365);
	
	$GLOBALS['config'] = array(
	
		'url' => array(
			'pretty' => true,
			'root' => '/',
			'content-type' => 'html',
		),
		'theme' => array(
			'path' => 'themes/default/',	
		),
		'site' => array(
			'name' => 'Web App Starter',
			'default_page_title' => 'Home',
		),
		'users' => array(
			'enable_signup' => true,	
		),
		'menu' => array(
			'' => array('title' => 'Home', 'hidden' => true),	
			'page1' => array('title' => 'Page 1',),
			'page2' => array('title' => 'Page 2',),
		),
	
	);
	
	if(!$GLOBALS['config']['url']['pretty'] && !$GLOBALS['config']['url']['root'])
	{
		$sroot = first($_SERVER['PHP_SELF'], $_SERVER['DOCUMENT_URI']);
		if(str_ends_width($sroot, 'index.php'))
			$GLOBALS['config']['url']['root'] = substr($sroot, 0, -strlen('index.php'));
	}
