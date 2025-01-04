<?php
session_start();
// useradmin/post.php
require_once 'functionsUser.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name']; // Correspond au nom de l'utilisateur
    $email = $_POST['email']; // Correspond à l'email de l'utilisateur
    $role = $_POST['role']; // Correspond au rôle de l'utilisateur
    $password = $_POST['password'];
    // Insertion de l'utilisateur dans la base de données
    if (insererUsers($name, $email, $role, $password)) {
        header('Location: ./../user.php');
        exit;
    } else {
        echo "Erreur lors de l'insertion de l'utilisateur.";
    }
}
?>
