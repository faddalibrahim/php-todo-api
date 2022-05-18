DROP DATABASE IF EXISTS `todo`;
CREATE DATABASE `todo`;
USE `todo`;

-- TABLES
CREATE TABLE todo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(255) NOT NULL,
    status ENUM('done','pending') NOT NULL DEFAULT 'pending',
    created_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- SAMPLE DATA
INSERT INTO 
    todo (action,status) 
VALUES ('fix cookie bug on backend','pending'),
       ('submit contract letter','done'),
       ('meet with team manager','pending'),
       ('prepare presentation slides','pending'),
       ('shop at west hills','pending'),
       ('purchase 4k monitor','done'),
       ('stream morbius online','pending'),
       ('order a cutlery set','done');

-- QUERIES