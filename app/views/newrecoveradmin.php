<?php $this->layout('master', ['title' => $title]) ?>

<?php 

$pdo = connect();
if(!logger()) : 

?>

	<script> 

		function validarSenha(){

			senha = document.formulario.senha.value
			confirma_senha = document.formulario.confirma_senha.value

			if (senha == confirma_senha){
				return true
			}

			else{ 
				alert("SENHAS DIFERENTES")
				return false
			}
		}
	</script>

	<?php 

	$code = $_SERVER['REQUEST_URI'];
	$explode = explode('@', $code);
	$meuCode = $explode[0];
	$meuCodeTho = $explode[1];
	$barrinha = explode('/', $meuCode);
	$email = base64_decode($meuCodeTho);

	read('email_recover', 'id, email, code');
	where('email', $email);
	$stmt = execute();
	$total = count($stmt);




	if ($total >= 1): else:	return redirect('/superadmin/login'); endif;

	foreach ($stmt as $value) {
		if($value->code == $barrinha[2]): else:	return redirect('/superadmin/login'); endif;	
	}

	$controller = findBy('email_recover', 'email', $email);
	$dataAtual = date('Y-m-d h:i:s');

	if(strtotime($controller->date) < strtotime($dataAtual)){

		$deletar = $pdo->prepare("delete from email_recover where id = :id");
		$deletar->bindValue(":id", $controller->id);
		$deletar->execute();

     return setMessageAndRedirect('message', 'Link Expirado!', '/superadmin/recover');

		die();

	}


	?>



<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/superadmin/recover" class="h1"><b>Oficial</b><br>Mundo Alcalino</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Recupere Sua Senha</p>
	<form action="/recoverUpdateAdmin" method="post" name="formulario" onsubmit="return validarSenha()">
					<?php echo getCsrf(); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="senha" name="senha_franq" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="confirma_senha" name="senha_franq" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
          	<input type="hidden" name="email" value="<?php echo $meuCodeTho; ?>">
            <button type="submit" class="btn btn-primary btn-block">Atualizar Senha</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="/superadmin/login">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->








	<?php else: redirect('/'); ?>

	<?php endif; ?>