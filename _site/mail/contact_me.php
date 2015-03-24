<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Tous les champs ne sont pas remplis!";
	return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
if (isset($_POST['phone'])) {
	$phone = $_POST['phone'];
}
else {
	$phone = "Pas de numéro";
}
$message = $_POST['message'];

// Create the email and send the message
$to = 'contact@maxime-besson.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contact site par :  $name";
$email_body = "Message reçu depuis le site.\n\n"."Détails du message:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@maxime-besson.fr\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>