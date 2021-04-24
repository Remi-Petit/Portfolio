<?php
$erreur = [];

if (!array_key_exists('nom', $_POST) || $_POST['nom'] == '') {
	$erreur['nom'] = "Vous n'avez pas renseigné votre nom";
}
if (!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$erreur['email'] = "Vous n'avez pas renseigné un email valide";
}
if (!array_key_exists('message', $_POST) || $_POST['message'] == '') {
	$erreur['message'] = "Vous n'avez pas renseigné votre message";
}

session_start();

if (!empty($erreur)) {
	
	$_SESSION['erreur'] = $erreur;
	$_SESSION['inputs'] = $_POST;
	header('Location: ../../index.php#contact');
}else{
	$_SESSION['success'] = 1;
	$message = $_POST['message'];
	$headers = 'FROM: ' . $_POST['email'] . '';
	mail('remi.petit93370@gmail.com', 'Portfolio', $message, $headers);
	header('Location: ../../index.php#contact');
}
?>