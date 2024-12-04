<?php
// views/edit.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-container h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            background-color: #ffc107;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Sửa sản phẩm</h1>
        <form action="index.php?action=edit&id=<?= htmlspecialchars($id) ?>" method="post">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Giá thành</label>
                <input type="text" name="price" id="price" value="<?= htmlspecialchars(str_replace(' VND', '', $product['price'])) ?>" required>
            </div>
            <button type="submit">Lưu thay đổi</button>
        </form>
    </div>
</body>
</html>
