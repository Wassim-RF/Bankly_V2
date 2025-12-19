<?php
    session_start();    
    require '../config.php';
    include '../database.php';

    if (isset($_SESSION)) {
        $stmt = $pdo->prepare("SELECT DATE(transaction_date) AS date , SUM(amout) AS total FROM transactions WHERE transaction_date >= CURDATE() - INTERVAL 6 DAY GROUP BY DATE(transaction_date) ORDER BY DATE(transaction_date) ASC");
        $stmt->execute();
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC) ?? 0);
    }