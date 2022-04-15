<?php 

namespace app\controllers;

class Dashboard{
	
	function admDashBoard(){

		    return [
    		'view' => 'dashboard',
    		'data' => ['title' => 'Dashboard - Oficial Mundo Alcalino']
    	];
	}

		function produtos(){

	        read('produtos', '*');
	        //where('id', $caregorias);
	        order( 'nome_linha_pro');
	        $produtos = execute();

		    return [
    		'view' => 'products',
    		'data' => ['title' => 'Produtos - Oficial Mundo Alcalino', 'produto' => $produtos]
    	];
	}

}