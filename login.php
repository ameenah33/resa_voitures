<?php
session_start();
$db = mysqli_connect('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_de_la_base_de_donnees');

if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result) == 1) {
		$_SESSION['username'] = $username;
		header('location: accueil.php');
	} else {
		echo "Nom d'utilisateur ou mot de passe incorrect.";
	}
}
?>
