<?php
$conn = new PDO('mysql:host=localhost;port=3306;dbname=flowers_db', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>