<?php
// config/function.php
require_once 'connexion.php';

// Fonction d'insertion dans la table users
function insererUsers($name, $email, $role, $password) {
    $pdo = getConnection();
    // Hachage du mot de passe avant de l'insérer dans la base de données
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, role, password) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$name, $email, $role, $hashedPassword]);
}

// Fonction de modification d'un user
function modifierUsers($id, $name, $email, $role, $password) {
    $pdo = getConnection();
    // Hachage du mot de passe avant de le mettre à jour dans la base de données
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET name = ?, email = ?, role = ?, password = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$name, $email, $role, $hashedPassword, $id]);
}

// Fonction de suppression d'un user
function supprimerUsers($id) {
    $pdo = getConnection();
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}

// Fonction d'affichage de tous les utilisateurs
function afficherTousLesUsers() {
    $pdo = getConnection();
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction d'affichage d'un utilisateur spécifique
function afficherUnUsers($id) {
    $pdo = getConnection();
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
