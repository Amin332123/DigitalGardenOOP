<?php
try {
    $pdo = new PDO("mysql:host=172.16.10.160;dbname=library_db;charset=utf8mb4", "Mohamed", "mohamed");
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}