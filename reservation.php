<?php
session_start();
include("config.php");

if (!isset($_SESSION['username'])) {
	header('location: index.php');
	exit();
}

if (isset($_POST['submit'])) {
	$type = $_POST['type'];
	$marque = $_POST['marque'];
	$modele = $_POST['modele'];
	$date_debut = $_POST['date_debut'];
	$date_fin = $_POST['date_fin'];
	$username = $_SESSION['username'];

	$query = "INSERT INTO reservations (type, marque, modele, date_debut, date_fin, username) VALUES ('$type', '$marque', '$modele', '$date_debut', '$date_fin', '$username')";

	if (mysqli_query($db, $query)) {
		echo "<script>alert('Réservation effectuée avec succès.')</script>";
	} else {
		echo "<script>alert('Erreur lors de la réservation.')</script>";
	}
}
?>
