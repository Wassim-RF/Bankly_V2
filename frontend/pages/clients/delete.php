<?php
    require 'backend/config.php';
    include 'backend/database.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    }