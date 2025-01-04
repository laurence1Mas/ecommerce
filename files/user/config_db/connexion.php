<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=oders_management;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connexion échouée : " . $e->getMessage();
    exit();
}
?>
