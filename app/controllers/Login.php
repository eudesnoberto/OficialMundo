<?php

namespace app\controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Login{

    public function index(){

    	return [
    		'view' => 'login',
    		'data' => ['title' => 'Login']
    	];
    }

    public function recover(){

        return [
            'view' => 'recover',
            'data' => ['title' => 'Recuperar Senha - Oficial Mundo Alcalino']
        ];
    }

    public function recovered(){
        function crypto_rand_secure($min, $max) {
            $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);

        return $min + $rnd;
    }

    function getToken($length=256){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        for($i=0;$i<$length;$i++){
        $token .= $codeAlphabet[crypto_rand_secure(0,strlen($codeAlphabet))];
        }

        return $token;
    }


    $chave = getToken();
    $validate = validate([

    ], persistsImputs:true, checkCsrf:true);

    $email = filter_input(INPUT_POST, 'email_franq', FILTER_SANITIZE_EMAIL);

    if(empty($email)){
     return setMessageAndRedirect('message', 'Email incorreto', '/superadmin/recover');
 }

 $user = findBy('franqueados', 'email_franq', $email);

 $controller = findBy('email_recover', 'email', $email);



 if ($controller) {
     return setMessageAndRedirect('message', 'verifique seu email', '/superadmin/login');
 }

 if(!$user){
     return setMessageAndRedirect('message', 'Email não encontrado', '/superadmin/recover');
 }

 $idController = $user->id;

 $pdo = connect();
 $date =  date('Y-m-d h:i:s', strtotime('+1 day'));

 $stmt = $pdo->prepare("INSERT INTO email_recover (code, email, id_email, date) VALUES (?, ?, ?, ?)");
 $stmt->bindValue(1, $chave);
 $stmt->bindValue(2, $email);
 $stmt->bindValue(3, $idController);
 $stmt->bindValue(4, $date);
 $stmt->execute();


 $linkHand = 'https://www.oficialmundoalcalino.tk/superAdminNewRecovered/';
 $linkNot = 'https://www.oficialmundoalcalino.tk/superadmin/not/bra/';

 $recoerLink = $linkHand.$chave.'@'.base64_encode($email);
 $recoerNot = $linkNot.$chave.'@'.base64_encode($email);

        //Create an instance; passing `true` enables exceptions

 $mail = new PHPMailer(true);
 try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.oficialmundoalcalino.tk';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'recovery@oficialmundoalcalino.tk';                     //SMTP username
                        
    $mail->Password   = 'Stage.7997';                      //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Recipients
    $mail->setFrom('recovery@oficialmundoalcalino.tk', 'Oficial Mundo Alcalino');
    $mail->addAddress($email);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    //Content

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperar Senha Oficial Mundo Alcalino';
    $mail->Body    = 'Recupere sua senha clicando no link  <b><a href="'.$recoerLink.'">Recuperar Senha</a></b>';
    $mail->Body .= '<br> Não solicitou a alteraçao de senha então  <a href="'.$recoerNot.'"><b>click aqui</b></a>';

    $mail->send();
    $quebra = explode('@', $email);
    $link = $quebra[1];
    $_SESSION['link'] = $link;

    return setMessageAndRedirect('message', 'Acesse seu email para recuperar sua senha', '/recover/emailto');

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

public function email(){
    return[
        'view' => 'mail',
        'data' => ['title' => 'Oficial Mundo Alcalino - verifique seu email']
    ];
}



public function deleteRequerid(){
    return[
        'view' => 'notadmin',
        'data' => ['title' => 'Oficial Mundo Alcalino']
    ];
}

public function newPassword(){
    return [
        'view' => 'newrecoveradmin',
        'data' => ['title' => 'Oficial Mundo Alcalino - New Password']
    ];

}

public function sucessUpdate(){
    $validate = validate([
        'senha_franq' => 'required|maxlen:32|minlen:6',
        'email' => 'required'
    ], persistsImputs:true, checkCsrf:true);

    $pdo = connect();
    $email = base64_decode($_POST['email']);
    $user = findBy('franqueados', 'email_franq', $email);

    if(!$user){
     return setMessageAndRedirect('message', 'Critical Error', '/recover');
 }

 echo $validate['senha_franq'] = password_hash($validate['senha_franq'], PASSWORD_DEFAULT);

 $stmt = $pdo->prepare("UPDATE franqueados SET senha_franq = ? WHERE id = $user->id ");
 $stmt->bindValue(1, $validate['senha_franq']);
 $stmt->execute();

 $controller = findBy('email_recover', 'email', $email);

 try {
     $deletar = $pdo->prepare("delete from email_recover where id = :id");
     $deletar->bindValue(":id", $controller->id);
     $deletar->execute();
     unset($_SESSION['link']);
 } catch (Exception $e) {
    echo $e;
}

return setMessageAndRedirect('message', 'Senha atualizada com sucesso!', '/superadmin/login');

}

public function store(){

    $email = filter_input(INPUT_POST, 'email_franq', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha_franq', FILTER_SANITIZE_STRING);

    if(empty($email) || empty($senha)){
     return setMessageAndRedirect('message', 'Usuario ou senha estão incorretos', '/superadmin/login');
 }

 $user = findBy('franqueados', 'email_franq', $email);
 if(!$user){
     return setMessageAndRedirect('message', 'Usuario ou senha estão incorretos', '/superadmin/login');
 }

 if(!password_verify($senha, $user->senha_franq)) {
     return setMessageAndRedirect('message', ' senha Usuario ou senha estão incorretos', '/superadmin/login');
 }


 $_SESSION['superAdmin'] = $user;

     return redirect('/dashboard/administration');

}


public function destroy(){
    unset($_SESSION['superAdmin']);
    return redirect('/superadmin/login');
    }

}