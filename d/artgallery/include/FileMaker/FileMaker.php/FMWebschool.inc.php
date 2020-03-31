<?php

function accountLogin($fmConnection, $loginPage) {
	if(session_id()) session_start();
	if(POST('action') == 'login') {
		$fmConnection->setProperty('username',POST('username'));
		$fmConnection->setProperty('password',POST('password'));
		$layouts = $fmConnection->listLayouts();
		if(FileMaker::isError($layouts)) {
			header('Location: '.$loginPage.'?error='.urlencode('Authentication Failed'));
			exit();		
		}else{
			$_SESSION['account_user'] = POST('username');
			$_SESSION['account_password'] = POST('password');
		}
		
	}
	if(GET('action') == 'logout') {
		unset($_SESSION['account_user']);
		unset($_SESSION['account_password']);
		header('Location: '.$loginPage);
		exit();
	}
	if(!isset($_SESSION['account_user'])) {
		header('Location: '.$loginPage);
		exit();
	}
	$fmConnection->setProperty('username',$_SESSION['account_user']);
	$fmConnection->setProperty('password',$_SESSION['account_password']);
}

?>