<?php
    if (session_status() === PHP_SESSION_ACTIVE) {
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }