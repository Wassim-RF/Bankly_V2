<?php
    require 'config.php';

    $DB_Connection = new mysqli($DB_HOST , $DB_USER , $DB_PASS , $DB_NAME , $DB_PORT);

    if ($DB_Connection->connect_errno) {
        die("Errore : " . $DB_Connection->connect_error);
    }