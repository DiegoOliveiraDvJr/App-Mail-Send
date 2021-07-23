<?php
    require './bibliotecas/PHPMailer/Exception.php'; 
    require './bibliotecas/PHPMailer/OAuth.php'; 
    require './bibliotecas/PHPMailer/PHPMailer.php'; 
    require './bibliotecas/PHPMailer/POP3.php'; 
    require './bibliotecas/PHPMailer/SMTP.php'; 
    require './model/mensagemModel.php'; // importando a classe

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use mensagemModel\Mensagem; // buscando a classe Mensagem do namespace 'mensagemModel'
    
    $mensagem = new Mensagem(); // criando a classe

    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);


    if(!$mensagem->mensagemvalida()){
        echo 'Preencha todos os campos';
        die();
    }
    
    $mail = new PHPMailer(true);
    try {
        $mail = new PHPMailer();

			$mail->IsSMTP();
			$mail->Port       = 465;
			$mail->Host       = "smtp.gmail.com"; //smtp
			$mail->Mailer     = 'smtp';
			$mail->SMTPSecure = 'ssl';
			$mail->SMTPAuth   = true;
			$mail->Username   = "remetente@gmail.com"; //email
			$mail->Password   = "cyberhunter"; //senha

			$mail->From       = 'remetente@gmail.com';  //email
			$mail->FromName   = "Treino Conta Cyber";	//nome
			$mail->AddAddress($mensagem->__get('para')); // destinatario

			$mail->Subject = $mensagem->__get('assunto');

			$mail->AltBody = $mensagem->__get('mensagem');

			$mail->MsgHTML("<p style='color: red;'>".$mensagem->__get('mensagem')."</p>");

			if($mail->Send()){
                echo 'Mensagem enviada';
            }else{
                echo 'Não foi possível enviar este email. Verifique se está correto e tente novamente';
            }
			
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    

?>