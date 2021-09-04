<!-- 
   CREATE DATABASE IF NOT EXISTS quanlysinhvien
CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE TABLE students(
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    age INT(11),
    avatar VARCHAR(255),
    description TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
    )
  -->