<?php 
$errors = '';
if(empty($_POST['email']))
{
    $errors .= "\n Error: Todos os campos são obrigatorios";
}
$username = $_POST['username']; 
$email_address = $_POST['email']; 
$url = $_POST['url']; 
$comments = $_POST['comments']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: E-mail invalido";
}

if( empty($errors))
{
	$to = 'contato@ortovie.com.br';
	$email_subject = "EMAIL ENVIADO UTILIZANDO O SITE: $username";
	$email_body = "Você recebeu uma mensagem nova. ".
	" Aqui estão os detalhes:\n Nome: $username \n Email: $email_address \n Mensagem \n $comments \n URL : \n $url"; 
	
	$headers = "From: $to\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thanks.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>
