<?php $this->layout('master', ['title' => $title]) ?>

<?php 

$code = $_SERVER['REQUEST_URI'];
$explode = explode('@', $code);
$meuCode = $explode[0];
$meuCodeTho = $explode[1];
$barrinha = explode('/', $meuCode);
$email = base64_decode($meuCodeTho);

$controller = findBy('email_recover', 'email', $email);
$pdo = connect();
$deletar = $pdo->prepare("delete from email_recover where id = :id");
$deletar->bindValue(":id", $controller->id);
$deletar->execute();

return setMessageAndRedirect('message', 'Solicitação de alteração de senha excluido!', '/superadmin/login');