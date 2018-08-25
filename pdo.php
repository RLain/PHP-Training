<?php
//This has the database connection info showing the 'username' and 'password'
$pdo = new PDO('mysql:host=localhost;port=8888;dbname=misc', 'rebecca', 'php123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
