<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=lelang_cantika', 'root', '');
$stmt = $pdo->query("SELECT id, name, photo FROM users WHERE id IN (1,2,3,4)");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$row['id']} - Name: {$row['name']} - Photo: " . ($row['photo'] ?? 'NULL') . "\n";
}
