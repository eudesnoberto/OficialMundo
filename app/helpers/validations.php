<?php 

function required($field){
	if($_POST[$field] === ''){
		setFlash($field, 'O campo é obrigatório');
		return false;
	}
	return $_POST[$field];
}

function email($field){
	$emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

	if(!$emailIsValid){
			setFlash($field, 'O campo tem que ser um email válido');
			return false;;
	}
	return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
}

function unique($field, $param){
	$data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
	$user = findBy($param, $field, $data);

	if($user){
		setFlash($field, "Email Já cadastrado!");
		return false;
	}
	return $data;
}

function uniquePergunta($field, $param){
	$data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
	$user = findBy($param, $field, $data);

	if($user){
		setFlash($field, "Esta pergunta já foi feita!");
		return false;
	}
	return $data;
}

function uniqueQuestion($field, $param){
	$data = $_POST[$field];
	$user = findBy($param, $field, $data);

	if($user){
		setFlash($field, "Essa Questão Já foi cadastrada!");
		return false;
	}
	return $data;
}

function uniqueCategoria($field, $param){
	$data = $_POST[$field];
	$user = findBy($param, $field, $data);
	if($user){
		setFlash($field, "Essa Questão Já foi cadastrada!");
		return false;
	}

	return $data;

}





function maxlen($field, $param){



	$data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

	

	if(strlen($data) > $param){

			setFlash($field, "Este campo não passa de {$param} caracteres");

			return false;;

	}



	return $data;

}



function minlen($field, $param){



	$data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

	

	if(strlen($data) < $param){

			setFlash($field, "Este campo tem que ter no minimo {$param} caracteres");

			return false;;

	}



	return $data;

}



?>