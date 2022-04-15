<?php 


namespace app\controllers;
use app\classes\Cart;

class Carrinho{
	
	function carrinho(){

		return [
			'view' => 'carrinho',
			'data' => ['title' => 'Carrinho - Oficial Mundo Alcalino']
		];
	}

	function addToCart($params){
		$id = $params['addtocart'];

		$cart = new Cart;
		$cart->add($id);
		header('Location: /carrinho');


	}

	function update(){

		$quantity = $_GET['qtd'];
		$id = $_GET['id'];

		$cart = new Cart;
		$cart->quantity($id, $quantity);



		header('Location: /carrinho');


	}

	function removeToCart($params){
		$id = $params['remove'];

		$cart = new Cart;
		$cart->remove($id);
		header('Location: /carrinho');


	}	

	function removeAllCart(){

		(new Cart)->clear();
		header('Location: /carrinho');

	}

}