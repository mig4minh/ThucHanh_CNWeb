<?php
// Thông tin kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SinhVienDB";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng SinhVien
$sql = "SELECT * FROM SinhVien";
$result = $conn->query($sql);

// Khởi tạo mảng sinh viên
$sinhvien = [];

// Kiểm tra và lưu kết quả vào mảng sinhvien
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sinhvien[] = $row;
    }
} else {
    echo "Không có dữ liệu";
}
//Kiểm tra kết nối
if ($conn->connect_error) {
    die("Không thể kết nối đến cơ sở dữ liệu: " . $conn->connect_error);
} else {
    echo "Kết nối cơ sở dữ liệu thành công!";
}

// Đóng kết nối
$conn->close();
?>
