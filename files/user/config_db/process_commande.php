<?php
include('./../db_connect.php');
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die('Utilisateur non connecté.');
}

$user_id = $_SESSION['user_id'];

// Commencez une transaction pour assurer que les données sont correctement insérées
$conn->beginTransaction();

try {
    // Insérez la commande dans la table 'commande'
    $sql = "INSERT INTO commande (user_id, datecom, etatcom) VALUES (?, NOW(), 'en cours')";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);

    // Récupérez l'ID de la commande nouvellement insérée
    $commande_id = $conn->lastInsertId();

    // Récupérez les produits du panier pour cet utilisateur
    $sql = "SELECT p.id AS produit_id, c.quantite, p.prix FROM produit p
            INNER JOIN panier c ON p.id = c.produit_id
            WHERE c.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Insérez chaque produit du panier dans la table 'detailcommande'
    foreach ($produits as $prod) {
        $sql = "INSERT INTO detailcommande (refcommande, refproduit, Qte, prixU) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$commande_id, $prod['produit_id'], $prod['quantite'], $prod['prix']]);
    }

    // Videz le panier de l'utilisateur après la commande
    $sql = "DELETE FROM panier WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);

    // Confirmez la transaction
    $conn->commit();

    // Redirigez vers une page de confirmation ou autre page souhaitée
    header("Location: ./../pannier.php");
    exit();

} catch (Exception $e) {
    // En cas d'erreur, annulez la transaction
    $conn->rollBack();
    echo "Erreur lors du traitement de la commande : " . $e->getMessage();
}
?>
