<?php
include 'config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID de facture invalide.";
    exit;
}

// Récupérer la facture
$stmt = $pdo->prepare("SELECT f.*, c.nom FROM factures f JOIN clients c ON f.client_id = c.id WHERE f.id = ?");
$stmt->execute([$id]);
$facture = $stmt->fetch();

if (!$facture) {
    echo "Facture introuvable.";
    exit;
}

// Récupérer les lignes de la facture
$stmt = $pdo->prepare("SELECT * FROM lignes_facture WHERE facture_id = ?");
$stmt->execute([$id]);
$lignes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Facture <?= htmlspecialchars($facture['numero']) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">FACTURE N°:  <?= htmlspecialchars($facture['numero']) ?> </h2>
    <br>
    <p><strong>Date:</strong> <?= htmlspecialchars($facture['date_facture']) ?></p>
    <p><strong>Client:</strong> M. <?= htmlspecialchars($facture['nom']) ?></p>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Désignation</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lignes as $ligne): ?>
            <tr>
                <td><?= htmlspecialchars($ligne['designation']) ?></td>
                <td><?= $ligne['quantite'] ?></td>
                <td><?= number_format($ligne['prix_unitaire'], 2) ?> DT</td>
                <td><?= number_format($ligne['montant'], 2) ?> DT</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h4 class="text-end">Total: <?= number_format($facture['total_ttc'], 2) ?> DT</h4>
    <div class="text-center no-print mt-4">
        <button class="btn btn-primary" onclick="window.print()">Imprimer</button>
        <a href="liste_factures.php" class="btn btn-secondary">Retour</a>
    </div>
</div>
</body>
</html>
