<?php
// config/function.php
require_once 'connect.php';

// Fonction d'insertion dans la table users
function insererUsers($name, $adresse, $email, $password, $telephone) {
    $pdo = getConnection();
    // Hachage du mot de passe avant de l'insérer dans la base de données
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO utilisateur (nom, adresse, email, PASSWORDS, telephone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$name, $adresse, $email, $hashedPassword, $telephone]);
}

