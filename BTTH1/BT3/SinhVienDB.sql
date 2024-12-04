CREATE DATABASE SinhVienDB;

USE SinhVienDB;

CREATE TABLE SinhVien (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    lastname VARCHAR(100),
    firstname VARCHAR(100),
    city VARCHAR(100),
    email VARCHAR(100),
    course1 VARCHAR(50)
);
