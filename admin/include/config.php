<?php
	require_once('../include/conn.php');

	$appfolder = '/cebiys';
	$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
	$site = '"' . $protocol . $_SERVER['SERVER_NAME'] . $appfolder . '"';

	$dirlogofavbrand = '../assets/logofavbrand/';
	$prefixlogo = 'logo-';
	$prefixfavicon = 'favicon-';
?>