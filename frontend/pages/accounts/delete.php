<?php 
    require '../../../backend/config.php';
    include '../../../backend/database.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        if (!$id) exit("Le compte n'existe pas");

        $stmt = $pdo->prepare("DELETE FROM comptes WHERE id = ?");
        $stmt->execute([$id]);

        header('Location: /accounts.php');
        exit();
    }