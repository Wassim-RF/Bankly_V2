<?php
    require '../../../backend/config.php';
    include '../../../backend/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = $_POST['id'] ?? null;
        if (!$id) exit('ID manquant');

        $dca = $pdo->prepare("DELETE FROM comptes WHERE client_id = ?");
        $dca->execute([$id]);

        $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
        $stmt->execute([$id]);

        header('Location: /clients.php');
        exit();
    }