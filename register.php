<?php
session_start();
include('db_connect.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // Vérification de la correspondance des mots de passe
    if ($password_1 != $password_2) {
        echo "Les deux mots de passe ne correspondent pas";
        exit();
    }

    // Vérification de l'existence du nom d'utilisateur ou de l'adresse e-mail dans la base de données
    $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Le nom d'utilisateur ou l'adresse e-mail existe déjà";
        exit();
    }

    // Hachage du mot de passe
    $password = md5($password_1);

    // Insertion des données d'utilisateur dans la base de données
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($db, $query);

    $_SESSION['username'] = $username;
    header('location: accueil.php');
}
?>
