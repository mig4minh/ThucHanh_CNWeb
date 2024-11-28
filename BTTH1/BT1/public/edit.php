<?php
require_once "../views/database.php";
global $conn;

$sql = "SELECT * FROM flowers WHERE id = :id";
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $_GET['id']);
$statement->execute();
$flower = $statement->fetch(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $img = '';
    if ($_FILES['image']['name']) {
        $img = 'views/images' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $img);
    }
    $sql = "UPDATE flowers SET name = :name, description = :description, img = :img WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':img', $img);
    $statement->bindParam(':id', $_GET['id']);
    $statement->execute();
    header('Location: admin.php');
}

include_once "../views/partials/header.php";
?>
<body>
<div class="container">
    <h2>Sửa Hoa</h2>
    <?php
    include_once "../views/partials/from.php";
    ?>
    <a href="admin.php">Back to admin page</a>
</div>
</body>
</html>


