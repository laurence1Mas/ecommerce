<?php
session_start();
// useradmin/post.php
require_once 'functionsUser.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['nom']; // Correspond au nom de l'utilisateur
    $adresse = $_POST['adresse']; // Correspond à l'email de l'utilisateur
    $email = $_POST['email']; // Correspond au rôle de l'utilisateur
    $password = $_POST['PASSWORDS']; // Correspond au mot de passe de l'utilisateur
    $telephone = $_POST['telephone']; // Correspond au mot de passe de l'utilisateur
    // Insertion de l'utilisateur dans la base de données
    if (insererUsers($name, $adresse, $email, $password, $telephone)) {
        header('Location: ./../login/login.php');
        exit;
    } else {
        echo "Erreur lors de l'insertion de l'utilisateur.";
    }
}
?>
