<?php
    require '../../../backend/config.php';
    include '../../../backend/database.php';

    $id = $_GET['id'] ?? null;

    if (!$id) exit();

    try {
        $stmt = $pdo->prepare("SELECT co.*, c.full_name AS client_fullName FROM comptes co JOIN clients c ON co.client_id = c.id WHERE co.id = ?");
        $stmt->execute([$id]);

        $compte = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($compte);

    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
