-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2019 г., 10:45
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
SET time_zone = "+00:00";

CREATE DATABASE Testing;

CREATE TABLE `users` ( 
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  `login` varchar(100) DEFAULT NULL, 
  `password` varchar(500) DEFAULT NULL, 
  `isAdmin` bit(1) DEFAULT NULL );

CREATE TABLE `Operation` ( 
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  `Period` date NOT NULL, 
  `Comment` varchar(500) DEFAULT NULL, 
  `Score` int(11), 
  `Team` int(11) );

CREATE TABLE `Teams` ( 
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  `name` varchar(100) DEFAULT NULL, 
  `user_id` int(11) );

INSERT INTO `Teams`(`name`, `user_id`)
VALUES('Команда 1', 1),('Команда 2', 2),
('Команда 3', 3),('Команда 4', 4),('Команда 5', 5)

INSERT INTO `Operation`
(`Period`, `Comment`, `Score`, `Team`) VALUES 
('2023-05-17','Да',50,1), ('2023-05-17','Да',50,1), 
('2023-05-17','Да',50,1), ('2023-05-17','Да',50,2), ('2023-05-17','Да',50,2), ('2023-05-17','Да',50,2), ('2023-05-17','Да',50,3), ('2023-05-17','Да',50,3), ('2023-05-17','Да',50,3), ('2023-05-17','Да',50,4), ('2023-05-17','Да',50,4), ('2023-05-17','Да',50,4), ('2023-05-17','Да',50,5), ('2023-05-17','Да',50,5), ('2023-05-17','Да',50,5);

INSERT INTO `users`(`login`, `password`, `isAdmin`) VALUES ('1 team',123,0), ('2 team',123,0), ('3 team',123,0), ('4 team',123,0), ('5 team',123,0), ('admin',123,1);
