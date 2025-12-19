<?php
    session_start();    
    require '../config.php';
    include '../database.php';

    if (isset($_SESSION)) {
        $stmt = $pdo->prepare("SELECT account_type, COUNT(*) AS total FROM comptes GROUP BY account_type");
        $stmt->execute();
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC) ?? 0);
    }