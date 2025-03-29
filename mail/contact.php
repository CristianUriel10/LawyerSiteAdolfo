<?php
if(empty($_POST['name']) || empty($_POST['Asunto']) || empty($_POST['Message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_Asunto = strip_tags(htmlspecialchars($_POST['Asunto']));
$Message = strip_tags(htmlspecialchars($_POST['Message']));

$to = "info@example.com"; // Change this email to your //
$Asunto = "$m_Asunto:  $name";
$body = "You have received a new Message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nAsunto: $m_Asunto\n\nMessage: $Message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $Asunto, $body, $header))
  http_response_code(500);
?>
