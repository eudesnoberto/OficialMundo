<?php

function user(){
	if(isset($_SESSION[LOGGED])){
		return $_SESSION[LOGGED];
	}
}

function logger(){
	return isset($_SESSION[LOGGED]);
}

function admin(){
	if(isset($_SESSION['super_admin'])){
		return $_SESSION['super_admin'];
	}
}

function logado(){
	return isset($_SESSION['super_admin']);
}
//OMA
function adminOma(){
	if(isset($_SESSION['superAdmin'])){
		return $_SESSION['superAdmin'];
	}
}

function logadoOma(){
	return isset($_SESSION['superAdmin']);
}