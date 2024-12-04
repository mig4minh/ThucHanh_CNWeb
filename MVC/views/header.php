<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Quản lý sản phẩm"; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            display: flex;
            align-items: center;
            background-color: white;
            border-bottom: 2px solid black;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .header-left h1 {
            font-size: 28px;
            margin: 0;
            color: black;
            font-weight: bold;
        }
        .header-left nav {
            display: flex;
            gap: 15px;
        }
        .header-left nav a {
            text-decoration: none;
            color: #555;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s;
        }
        nav a strong {
            font-weight: bold;
        }
        .header-left nav a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <h1><?php echo "Administration"; ?></h1>
            <nav>
                <?php
                $menuItems = [
                    ["name" => "Trang chủ", "link" => "#"],
                    ["name" => "Trang ngoài", "link" => "#"],
                    ["name" => "Thể loại", "link" => "#", "strong" => true],
                    ["name" => "Tác giả", "link" => "#"],
                    ["name" => "Bài viết", "link" => "#"],
                ];

                foreach ($menuItems as $item) {
                    if (isset($item['strong']) && $item['strong']) {
                        echo "<a href='{$item['link']}'><strong>{$item['name']}</strong></a>";
                    } else {
                        echo "<a href='{$item['link']}'>{$item['name']}</a>";
                    }
                }
                ?>
            </nav>
        </div>
    </header>
