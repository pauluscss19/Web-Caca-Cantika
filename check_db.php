<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=lelang_cantika', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $pdo->exec("ALTER TABLE aset ADD COLUMN gambar VARCHAR(255) NULL");
    echo "Column 'gambar' added successfully to aset table.\n";
} catch (\PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
