<?php
if (isset($_POST) && sizeof($_POST) > 0) {
	
	//$to = $_POST['to']['val']; // <=== Set static email here.
	$to = "services@toutpaie.com";   // Alain Serge
	if (isset($_POST['formtype'])) {
		unset($_POST['formtype']);
	}
	if (isset($_POST['to'])) {
		unset($_POST['to']);
	}
	
	$email_address = $_POST['email']['val'];
	$email_subject = "Formulaire soumis par: ".$_POST['name']['val'];
	$email_body    = "Vous avez reçu un nouveau message. <br/>".
				  	 "Voici les détails: <br/><br/>";
				  	 foreach ($_POST as $key => $value) {
				  	 	$email_body .= "<strong>" . $value['label'] . ": </strong> " . $value['val'] . "<br/><br/>";
				  	 }

	$headers = "From:<$email_address>\n";
	$headers.= "Content-Type:text/html; charset=UTF-8";
	if($email_address != "") {
		mail($to,$email_subject,$email_body,$headers);
		return true;
	}
}
?>