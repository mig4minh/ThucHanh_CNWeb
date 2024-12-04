<?php
$filename = "KTPM1.csv"; 
$sinhvien = [];

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

// Kiểm tra tệp có tồn tại không
if (!file_exists($filename)) {
    die("Không tìm thấy tệp CSV!");
}

// Mở file CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc dòng đầu tiên (tiêu đề)
    $line = fgets($handle);

    // Xóa BOM nếu tồn tại
    $bom = pack('CCC', 0xEF, 0xBB, 0xBF);
    if (strncmp($line, $bom, 3) === 0) {
        $line = substr($line, 3);
    }

    // Lấy tiêu đề
    $headers = str_getcsv($line, ",");

    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if (count($data) === count($headers)) {
            $sinhvien[] = array_combine($headers, $data);
        }
    }

    fclose($handle);
}

// Chèn dữ liệu vào CSDL
$stmt = $conn->prepare("INSERT INTO SinhVien (username, password, lastname, firstname, city, email, course1) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("-----", $username, $password, $lastname, $firstname, $city, $email, $course1);

foreach ($sinhvien as $sv) {
    $username = $sv['username'];
    $password = $sv['password'];
    $lastname = $sv['lastname'];
    $firstname = $sv['firstname'];
    $city = $sv['city'];
    $email = $sv['email'];
    $course1 = $sv['course1'];

    // Thực thi câu lệnh chèn
    if ($stmt->execute()) {
        echo "Thêm dữ liệu thành công: {$sv['username']}<br>";
    } else {
        echo "Lỗi: " . $stmt->error . "<br>";
    }
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>
 