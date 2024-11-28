<?php
require_once "../views/database.php";
global $conn;
$name = $description = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if ($_FILES['image']['name']) {
        $img = '../views/images/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $img);
    }
    $sql = "INSERT INTO flowers (name, description, img) VALUES (:name, :description, :img)";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':img', $img);
    $statement->execute();
    header('Location: admin.php');
}

$flower = ['img' => ''];


include_once "../views/partials/header.php";
?>
<body>
<div class="container">
    <h2>Them Hoa</h2>
    <?php
    include "../views/partials/from.php";
    ?>
    <a href="index.php">Back to home page</a>
</div>
</body>
</html>
