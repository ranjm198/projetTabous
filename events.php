<?php
require 'config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Enregistrement d’un nouvel événement
    $title = $_POST['title'];
    $start = $_POST['start'];

    $stmt = $pdo->prepare("INSERT INTO events (title, start) VALUES (?, ?)");
    if ($stmt->execute([$title, $start])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    exit;
}

// Sinon : Récupération des événements
$stmt = $pdo->query("SELECT id, title, start FROM events");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($events);
