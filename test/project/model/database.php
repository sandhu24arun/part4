<?php
    $dsn = 'mysql:host=sql1.njit.edu;dbname=ass99';
    //$dsn = 'mysql:host=localhost;dbname=ass99';
    $username = 'ass99';
    $password = 'KOBEbryant24!';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>