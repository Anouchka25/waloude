<?php
	$to = "bourryt@gmail.com";   // Bouryt

	// 2- On vérifie si la variable existe et sinon elle vaut NULL
	$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
	$email = isset($_POST['email']) ? $_POST['email'] : NULL;
	$tel = isset($_POST['telephone']) ? $_POST['telephone'] : NULL;

	//$email_address = $_POST['email'];
	$email_subject = "[Waloude]Formulaire soumis sur le site waloude.org";
	$email_body .= "Vous avez reçu un nouveau prospect. <br/>
	Prénom: " . $prenom . " <br/>
	Email: " . $email . " <br/>
	Téléphone: " . $tel . " <br/>
	Vous pouvez maintenant appeler ce prospect intéressé(e) par vos services.";

	$headers = "From:<$email>\n";
	$headers.= "Content-Type:text/html; charset=UTF-8";
	if($email != "") {
		mail($to,$email_subject,$email_body,$headers);
		//return true;
		header('Location: http://waloude.org/pages/etrerappele');
        exit();
	}
	else echo "Votre email n'est pas correct"

?>