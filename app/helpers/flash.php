<?php

function setFlash($index, $message){
	if(!isset($_SESSION['flash'][$index])){
		$_SESSION['flash'][$index] = $message;
	}
}

function getFlash($index, $style = "color:red"){
	if(isset($_SESSION['flash'][$index])){
		$flash = $_SESSION['flash'][$index];
		unset($_SESSION['flash'][$index]);
		return "<span style='$style'>$flash</span>";
	}
}

function setFlashProduto($index, $message){
	if(!isset($_SESSION['flashProduto'][$index])){
		$_SESSION['flashProduto'][$index] = $message;
	}
}

function getFlashProduto($index, $style = "color:#FFFFFF"){
	if(isset($_SESSION['flashProduto'][$index])){
		$flashProduto = $_SESSION['flashProduto'][$index];
		unset($_SESSION['flashProduto'][$index]);
		return "<span style='$style'>$flashProduto</span>";
	}
}

