<?php 



function getCsrf(){
	$_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(8));
	return '<input type="hidden" name="csrf" value="'.$_SESSION["csrf"].'">';
}

function checkCsrf(){
	$csrf = filter_input(INPUT_POST, 'csrf', FILTER_SANITIZE_STRING);
	if (!$csrf) {
		throw new Exception('Token Invalido!');
	}

	if (!isset($_SESSION['csrf'])) {
		throw new Exception('Token Invalido!');
	}

	if ($csrf != $_SESSION['csrf']) {
		throw new Exception('Token Invalido!');
	}

unset($_SESSION['csrf']);


}