CREATE DATABASE flowers_db;

USE flowers_db;

CREATE TABLE flowers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(255) NOT NULL,
    description NVARCHAR(255) NOT NULL,
    image NVARCHAR(255) NOT NULL
);

);
INSERT INTO flowers (name, description, image) VALUES
('Hoa Đỗ Quyên', '', 'images/doquyen.jpg'),
('Hoa Hải Đường', '', 'images/haiduong.jpg'),
('Hoa Mai', '', 'images/mai.jpg'),
('Hoa Tường Vy', '', 'images/tuongvy.jpg');

delete from flowers



SELECT * FROM flowers