<?php
    require 'config.php';
    require 'database.php';

    if (!isset($_SESSION['utilisateur'])) {
        http_response_code(401);
        echo json_encode([]);
        exit;
    }

    $stmt = $pdo->prepare("
        SELECT id, full_name, cin 
        FROM clients 
        WHERE utilisateur_id = ?
        ORDER BY id DESC
    ");
    $stmt->execute([$_SESSION['utilisateur']['id']]);

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));