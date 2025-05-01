<?php
include 'config.php';

$client_nom = $_POST['client'];
$date_facture = $_POST['date_facture'];
$designations = $_POST['designation'];
$quantites = $_POST['quantite'];
$prix_unitaires = $_POST['prix_unitaire'];
$montants = $_POST['montant'];
$total = $_POST['total'];
$fodec = $_POST['fodec'];
$tva = $_POST['tva'];
$timbre = $_POST['timbre'];
$total_ttc = $_POST['total_ttc'];

// Vérifier si le client existe déjà
$stmt = $pdo->prepare("SELECT id FROM clients WHERE nom = ?");
$stmt->execute([$client_nom]);
$client = $stmt->fetch();

if ($client) {
    $client_id = $client['id'];
} else {
    $stmt = $pdo->prepare("INSERT INTO clients (nom) VALUES (?)");
    $stmt->execute([$client_nom]);
    $client_id = $pdo->lastInsertId();
}

// Générer un numéro de facture unique
$numero = 'FAC-' . time();

// Insérer la facture
$stmt = $pdo->prepare("INSERT INTO factures (numero, client_id, date_facture, total, fodec, tva, timbre, total_ttc) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$numero, $client_id, $date_facture, $total, $fodec, $tva, $timbre, $total_ttc]);
$facture_id = $pdo->lastInsertId();

// Insérer les lignes de la facture
for ($i = 0; $i < count($designations); $i++) {
    $stmt = $pdo->prepare("INSERT INTO lignes_facture (facture_id, designation, quantite, prix_unitaire, montant) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$facture_id, $designations[$i], $quantites[$i], $prix_unitaires[$i], $montants[$i]]);
}

header("Location: liste_factures.php");
exit;
?>
