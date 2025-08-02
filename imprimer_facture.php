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
  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: #fff;
    }

    .facture {
      width: 95%;
      margin: 0 auto;
      padding: 40px 20px;
      position: relative;
      overflow: hidden;
    }

    .top-section {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
      align-items: flex-start;
    }

    .logo img {
      width: 120px;
    }

    .societe-info {
      font-size: 14px;
      line-height: 1.6;
      padding-right: 20px;
    }

    .client-box {
      border: 1px solid #000;
      border-radius: 10px;
      padding: 8px 12px;
      width: 260px;
      font-size: 13px;
      background-color: #f9f9f9;
    }

    h2 {
      text-align: center;
      text-decoration: underline;
      margin: 20px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #0597b6;
      color: white;
    }

    .totals {
      margin-top: 20px;
    }

    .totals td {
      padding: 6px;
    }

    .right {
      text-align: right;
    }

    .words {
      margin-top: 25px;
      font-weight: bold;
    }

    .observation {
      margin-top: 10px;
      font-size: 13px;
    }

    .bg-shape {
      position: absolute;
      top: 0;
      right: 0;
      height: 100%;
      width: 180px;
      background: linear-gradient(to bottom right, #a6d7cc, #7ac4c9);
      clip-path: polygon(40% 0, 100% 0, 100% 100%, 0 100%);
      z-index: -1;
    }

    .no-print {
      text-align: center;
      margin-top: 15px;
    }

    @media print {
      @page {
        margin: 10mm;
      }

      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="facture">
    <div class="bg-shape"></div>

    <div class="top-section">
      <div class="societe-info">
        <div class="logo">
          <img src="assets/img/tabou.png" alt="Logo">
        </div>
        <strong>TABOUS CONFECTION</strong><br>
        TEL : +21690347147<br>
        EMAIL : Tabous@gmail.com<br>
        ADRESSE : TUNISIA, Cité beb el khadhra ;<br>
        Av. Ibn Becha, 1073
      </div>

      <div class="client-box">
        <strong>CLIENT :</strong> <?= htmlspecialchars($facture['nom']) ?><br>
        TEL : ...................<br>
        ADRESSE : ...............<br>
        <strong>Le :</strong> <?= date('d/m/Y', strtotime($facture['date_facture'])) ?>
      </div>
    </div>

    <h2>Facture N° : <?= htmlspecialchars($facture['numero']) ?></h2>

    <table>
      <thead>
        <tr>
          <th>DESIGNATION</th>
          <th>TVA</th>
          <th>Qté</th>
          <th>PU HT</th>
          <th>MONTANT HT</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lignes as $ligne): ?>
        <tr>
          <td><?= htmlspecialchars($ligne['designation']) ?></td>
          <td><?= htmlspecialchars($ligne['tva'] ?? '19') ?></td>
          <td><?= $ligne['quantite'] ?></td>
          <td><?= number_format($ligne['prix_unitaire'], 3, ',', ' ') ?></td>
          <td><?= number_format($ligne['montant'], 3, ',', ' ') ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <table class="totals">
      <tr>
        <td class="right" colspan="5"><strong>Total HT</strong></td>
        <td><?= number_format($facture['total'], 3, ',', ' ') ?></td>
      </tr>
      <tr>
        <td class="right" colspan="5"><strong>TVA</strong></td>
        <td><?= number_format($facture['tva'], 3, ',', ' ') ?></td>
      </tr>
      <tr>
        <td class="right" colspan="5"><strong>FODEC</strong></td>
        <td><?= number_format($facture['fodec'], 3, ',', ' ') ?></td>
      </tr>
      <tr>
        <td class="right" colspan="5"><strong>Timbre</strong></td>
        <td><?= number_format($facture['timbre'], 3, ',', ' ') ?></td>
      </tr>
      <tr>
        <td class="right" colspan="5"><strong>Total TTC</strong></td>
        <td><strong><?= number_format($facture['total_ttc'], 3, ',', ' ') ?></strong></td>
      </tr>
    </table>

    <div class="words">
      SIGNATURE :<br>
      ............................
    </div>

    <div class="no-print">
      <button onclick="window.print()">Imprimer</button>
      <a href="liste_factures.php">Retour</a>
    </div>
  </div>
</body>
</html>
