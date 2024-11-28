<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            font-size: 20px;
            margin: 0;
            margin-right: 20px;
            font-weight: bold;
        }
        nav {
            display: flex;
            gap: 15px;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 16px;
        }
        nav a:hover {
            color: #007bff;
        }
        main {
            padding: 20px;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        .btn-edit {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
            background-color: #007bff;
        }
        .icon-delete {
            cursor: pointer;
            color: #007bff;
            font-size: 20px;
            border: none;
            background: none;
        }
        .icon-delete:hover {
            color: #0056b3;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            background-color: #fff;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
        .hidden {
            display: none;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Administration</h1>
        <nav>
            <a href="#">Trang chủ</a>
            <a href="#">Trang ngoài</a>
            <a href="#">Thể loại</a>
            <a href="#">Tác giả</a>
            <a href="#">Bài viết</a>
        </nav>
    </header>
    <main>
        <button class="btn-add" onclick="showAddForm()">Thêm mới</button>

        <!-- Form Thêm/Sửa sản phẩm -->
        <div id="formContainer" class="hidden form-container">
            <h2 id="formTitle">Thêm sản phẩm</h2>
            <form id="productForm">
                <label for="productName">Tên sản phẩm:</label><br>
                <input type="text" id="productName" name="productName" required><br><br>

                <label for="productPrice">Giá thành:</label><br>
                <input type="number" id="productPrice" name="productPrice" required><br><br>

                <button type="button" class="btn-add" onclick="addProduct()">Lưu</button>
                <button type="button" class="btn-add" onclick="cancelForm()">Hủy</button>
            </form>
        </div>

        <table id="productTable">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <!-- Các sản phẩm sẽ được thêm vào đây -->
            </tbody>
        </table>
    </main>
    <footer>
        TLU'S MUSIC GARDEN
    </footer>

    <script>
        let editingProductIndex = -1;
        let products = [
            { name: 'Sản phẩm 1', price: 1000 },
            { name: 'Sản phẩm 2', price: 2000 },
            { name: 'Sản phẩm 3', price: 3000 }
        ]; // Các sản phẩm sẵn có

        // Hiển thị form Thêm mới sản phẩm
        function showAddForm() {
            document.getElementById('formContainer').classList.remove('hidden');
            document.getElementById('productForm').reset();
            document.getElementById('formTitle').textContent = 'Thêm sản phẩm';
            editingProductIndex = -1;  // Reset trạng thái
        }

        // Hủy form Thêm/Sửa
        function cancelForm() {
            document.getElementById('formContainer').classList.add('hidden');
        }

        // Thêm hoặc cập nhật sản phẩm
        function addProduct() {
            const name = document.getElementById('productName').value;
            const price = document.getElementById('productPrice').value;

            if (editingProductIndex === -1) {
                // Thêm sản phẩm mới
                products.push({ name, price });
            } else {
                // Cập nhật sản phẩm
                products[editingProductIndex] = { name, price };
            }

            renderProducts();
            cancelForm();
        }

        // Hiển thị danh sách sản phẩm
        function renderProducts() {
            const tbody = document.getElementById('productTable').getElementsByTagName('tbody')[0];
            tbody.innerHTML = '';  // Xóa tất cả sản phẩm hiện tại

            products.forEach((product, index) => {
                const row = tbody.insertRow();
                row.innerHTML = `
                    <td>${product.name}</td>
                    <td>${product.price} VND</td>
                    <td><button class="btn-edit" onclick="editProduct(${index})">Sửa</button></td>
                    <td><button class="icon-delete" onclick="deleteProduct(${index})">&#128465;</button></td>
                `;
            });
        }

        // Sửa sản phẩm
        function editProduct(index) {
            editingProductIndex = index;
            document.getElementById('productName').value = products[index].name;
            document.getElementById('productPrice').value = products[index].price;
            document.getElementById('formTitle').textContent = 'Sửa sản phẩm';
            document.getElementById('formContainer').classList.remove('hidden');
        }

        // Xóa sản phẩm
        function deleteProduct(index) {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                products.splice(index, 1);
                renderProducts();
            }
        }

        // Gọi hàm renderProducts khi trang tải để hiển thị các sản phẩm sẵn có
        renderProducts();
    </script>
</body>
</html>
