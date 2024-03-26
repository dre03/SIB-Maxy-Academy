-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2024 at 08:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_homespot`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `password`) VALUES
(7, 'andre', 'andre', 'andre@email.com', '$argon2id$v=19$m=65536,t=4,p=1$M3B1MG8wVGh6TE9RckRIWg$vK9M/87oC11/64r3RG5AaBD6ISHxmzfpLmHSMDrREG0'),
(8, 'apri', 'apri', 'apri@email.com', '$argon2id$v=19$m=65536,t=4,p=1$ZHE0eUFyM0psWlpYcVA1eQ$pHGAe+19IlExYBtuDLNn+fp13HDVAAf084M4eD2Qoh8'),
(10, 'sari', 'Sariwangi', 'sari@email.com', '$argon2id$v=19$m=65536,t=4,p=1$MzZVRXRVMXo1T2VQbVJBRg$dxZdiWGdsqCFO34Y5MMgtJwjw5xrbwp9Jbzd4UpwYBg'),
(11, 'bayu', 'bayu', 'bayu@email.com', '$argon2id$v=19$m=65536,t=4,p=1$QWxacVN5c2hITmFGamxxTw$PMimG+F2zl/A7+8K1sEoV1sMTmYRkcM+vGLBYUyM9PY'),
(12, 'budi', 'Budi', 'budi@email.com', '$argon2id$v=19$m=65536,t=4,p=1$NnJ3bWdoTEwuNk41OHl3MA$XV7wM36gatj1ZHSUphFCNzjr1dcdifIrzlbqFf2ssd0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
