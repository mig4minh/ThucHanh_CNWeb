<?php
//xoa hoa by id
require_once "../views/database.php";
global $conn;

$id = $_GET['id'];
$sql = "DELETE FROM flowers WHERE id = :id";
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();
header('Location: admin.php');
?>
