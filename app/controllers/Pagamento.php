<?php 

namespace app\controllers;

class Pagamento{
	
	function pay(){

		    return [
    		'view' => 'pay',
    		'data' => ['title' => 'Pagamento - Oficial Mundo Alcalino']
    	];
	}
}