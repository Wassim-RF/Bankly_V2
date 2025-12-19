<?php
    session_start();    
    require '../config.php';
    include '../database.php';

    if (isset($_SESSION)) {
        $stmt = $pdo->prepare("SELECT account_type, COUNT(*) AS total_par_type, ROUND( (COUNT(*) * 100.0) / (SELECT COUNT(*) FROM comptes), 2  ) AS pourcentage FROM comptes GROUP BY account_type");
        $stmt->execute();
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC) ?? 0);
    }