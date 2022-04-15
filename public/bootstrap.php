<?php

session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', true);

require '../vendor/autoload.php';

if (!empty($_SERVER['HTTPS'])): 
	else: 
	return redirect("https://www.oficialmundoalcalino.tk"); 
endif;

function dataHora(){
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
       //strftime('%A, %d de %B de %Y', strtotime('today'));
	return strftime('%d de %B de %Y', strtotime('today'));
}

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();
