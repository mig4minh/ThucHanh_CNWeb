CREATE DATABASE product_db;
USE product_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);
INSERT INTO products (name, price) VALUES 
('Sản phẩm 1', 1000),
('Sản phẩm 2', 2000),
('Sản phẩm 3', 3000);