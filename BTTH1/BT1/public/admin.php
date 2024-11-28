<?php
try {
    require_once '../views/database.php';
    global $conn;
    $sql = "SELECT * FROM flowers";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $flowers = $statement->fetchAll();
} catch (PDOException $e) {
    die("Connect failed" . $e->getMessage());
}

?>
<?php
include_once "../views/partials/header.php";
?>
<body>
<?php
include_once "../views/partials/nav.php";
?>
<main>
    <div class="container">
        <h2>Admin</h2>
        <div>
            <a href="add.php" class="btn btn-success">Thêm mới</a>
        </div>
        <div class="row">
            <div class="col">
                Hinh anh
            </div>
            <div class="col">
                Sản phẩm
            </div>
            <div class="col">
                Mô tả
            </div>
            <div class="col">
                Sửa
            </div>
            <div class="col">
                Xóa
            </div>
        </div>
        <?php foreach ($flowers as $key => $flower) { ?>
            <div class="row ">
                <div class="col">
                    <img src="<?php echo $flower['img'] ?>" alt="" class="w-75 h-75">
                </div>
                <div class="col">
                    <?php echo $flower['name'] ?>
                </div>
                <div class="col">
                    <?php echo $flower['description'] ?>
                </div>
                <div class="col">
                    <a href="edit.php?id=<?php echo $flower['id'] ?>" class="btn btn-primary">Sửa</a>
                </div>
                <div class="col">
                    <a href="delete.php?id=<?php echo $flower['id'] ?>" class="btn btn-danger">Xóa</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

</body>
</html>
