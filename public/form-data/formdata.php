<?php
	$to = "minkoueobamea@yahoo.fr";   // Bouryt

	// 2- On vérifie si la variable existe et sinon elle vaut NULL
    $email_address = isset($_POST['email']) ? $_POST['email'] : NULL;

	//$email_address = $_POST['email'];
	$email_subject = "[Waloude]Formulaire soumis sur le site waloude.org";
	$email_body    = "Vous avez reçu un nouveau message(email). <br/>
	<strong>" . $email_address . " </strong>";

	$headers = "From:<$email_address>\n";
	$headers.= "Content-Type:text/html; charset=UTF-8";
	if($email_address != "") {
		mail($to,$email_subject,$email_body,$headers);
		return true;
	}
	else echo "Votre email n'est pas correct"

?>