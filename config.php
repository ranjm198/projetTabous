<?php
$host = 'dpg-d24lngali9vc73ee97ug-a';      // ex: dpg-xxxxxxx.render.com
$db   = 'tabousdb';           // ex: facturedb
$user = 'tabousdb_user';             // ex: admin
$pass = 'PMEm3uCJrpnOBpHsoou1mN6F7kX4k3Hf';     // 🔒
$port = '5432';
$charset = 'utf8mb4';

$dsn = "pgsql:host=$host;port=$port;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $sql = "
        CREATE TABLE IF NOT EXISTS clients (
            id SERIAL PRIMARY KEY,
            nom VARCHAR(255)
        );

        CREATE TABLE IF NOT EXISTS factures (
            id SERIAL PRIMARY KEY,
            numero VARCHAR(100),
            client_id INTEGER REFERENCES clients(id),
            date_facture DATE,
            total NUMERIC,
            fodec NUMERIC,
            tva NUMERIC,
            timbre NUMERIC,
            total_ttc NUMERIC
        );

        CREATE TABLE IF NOT EXISTS lignes_facture (
            id SERIAL PRIMARY KEY,
            facture_id INTEGER REFERENCES factures(id),
            designation VARCHAR(255),
            quantite INTEGER,
            prix_unitaire NUMERIC,
            montant NUMERIC
        );
    ";

    $pdo->exec($sql);
    echo "✅ Tables créées avec succès !";
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage();
}
?>
