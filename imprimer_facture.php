<?php
include 'config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID de facture invalide.";
    exit;
}

$stmt = $pdo->prepare("SELECT f.*, c.nom FROM factures f JOIN clients c ON f.client_id = c.id WHERE f.id = ?");
$stmt->execute([$id]);
$facture = $stmt->fetch();

if (!$facture) {
    echo "Facture introuvable.";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM lignes_facture WHERE facture_id = ?");
$stmt->execute([$id]);
$lignes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Facture <?= htmlspecialchars($facture['numero']) ?></title>
  <link rel="stylesheet" href="style1.css"> <!-- Ton CSS personnalisé -->
  <style>
    @media print {
      .no-print { display: none; }
    }
  </style>
</head>
<body>
  <div class="facture">
    <header class="en-tete">
      <div class="logo">
        <img src="tabou.png" alt="Logo" id="logo" height="80">
      </div>
      <div class="infos-contact">
        <p><strong>Tél :</strong> +216 24 225 338</p>
        <p><strong>Email :</strong> exemple@email.com</p>
        <p><strong>Adresse :</strong> Doukhana Bouargoub 8040</p>
      </div>
    </header>

    <div class="date-client">
      <div class="client">
        <p><strong>Facture n° :</strong> <?= htmlspecialchars($facture['numero']) ?></p>
        <p><strong>Client :</strong> M. <?= htmlspecialchars($facture['nom']) ?></p>
      </div>
      <div class="date">
        <p><strong>Date :</strong> <?= htmlspecialchars($facture['date_facture']) ?></p>
      </div>
    </div>

    <table class="articles">
      <thead>
        <tr>
          <th>N°</th>
          <th>Désignation</th>
          <th>Quantité</th>
          <th>Prix Unitaire</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($lignes as $ligne): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($ligne['designation']) ?></td>
          <td><?= $ligne['quantite'] ?></td>
          <td><?= number_format($ligne['prix_unitaire'], 2) ?> DT</td>
          <td><?= number_format($ligne['montant'], 2) ?> DT</td>
        </tr>
        <?php endforeach; ?>
        <!-- Lignes vides pour format -->
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
      </tbody>
    </table>

    <section class="totaux">
      <table>
        <tr>
          <td>Total HT</td>
          <td><?= number_format($facture['total_ht'], 2) ?> DT</td>
        </tr>
        <tr>
          <td>TVA (18%)</td>
          <td><?= number_format($facture['total_ttc'] - $facture['total_ht'], 2) ?> DT</td>
        </tr>
        <tr>
          <td><strong>Total TTC</strong></td>
          <td><strong><?= number_format($facture['total_ttc'], 2) ?> DT</strong></td>
        </tr>
      </table>
    </section>

    <footer class="pied">
      <p>Signature : ...........................................</p>
    </footer>

    <div class="text-center no-print" style="margin-top: 20px;">
      <button onclick="window.print()">Imprimer</button>
      <a href="liste_factures.php">Retour</a>
    </div>
  </div>
</body>
</html>
