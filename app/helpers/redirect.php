<?php

function redirect($to){
	return header('Location:'.$to);
}

function setMessageAndRedirect($index, $message, $redirectTo){
	setFlash($index, $message);
	return redirect($redirectTo) ;
}


function redirectProduto($to){
	return header('Location:'.$to);
}

function setMessageAndRedirectProduto($index, $message, $redirectTo){
	setFlashProduto($index, $message);
	return redirectProduto($redirectTo) ;
}
