<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer les lignes de la facture
    $stmt = $pdo->prepare("DELETE FROM lignes_facture WHERE facture_id = ?");
    $stmt->execute([$id]);

    // Supprimer la facture
    $stmt = $pdo->prepare("DELETE FROM factures WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: liste_factures.php");
    exit;
}
?>
