<?php



return [

	'POST' => [

		'/login' => 'Login@store',
		'/recoverPostAdim' => 'Login@recovered',
		'/recoverUpdateAdmin' => 'Login@sucessUpdate',
		'/produtoPrecoUpdate' => 'Produtos@produtoValor'

],





	'GET' => [

		'/' => 'Home@index',
		'/user/create' => 'User@create',
		'/user/[0-9]+' => 'User@show',
		'/api/categorias' => 'Categorias@index',
		'/api/subcategorias' => 'Subcategorias@index',
		'/question' => 'Question@index',
		'/superAdminNewRecovered/[0-9a-zA-Z@.=]+' => 'Login@newPassword',
		'/logout/admin' => 'Login@destroy',
		'/recover/emailto' => 'Login@email',
		'superadmin/not/bra/[0-9a-zA-Z@.=]+' => 'Login@deleteRequerid',
		'/superadmin/recover' => 'Login@recover',
		'/superadmin/login' => 'Login@index',
		'/dashboard/administration'=>'Dashboard@admDashBoard',
		'dashboard/produto/[0-9]+' => 'Produtos@produtoEditPage',
		'/dashboard/produtos' => 'Dashboard@produtos',
		'/produtos/[0-9a-zA-Z=]+' => 'verProduto@produto',
		'/addtocart/[0-9=]+' => 'Carrinho@addToCart',
		'/remove/[0-9]+' => 'Carrinho@removeToCart',
		'/removeAll' => 'Carrinho@removeAllCart',
		'/update' => 'Carrinho@update',
		'/carrinho' => 'Carrinho@carrinho',
		'/pay' => 'Pagamento@pay'

	]



];



?>



