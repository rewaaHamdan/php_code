-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 يونيو 2023 الساعة 13:01
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_prog`
--

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`, `Created_at`) VALUES
(23, 'lama', '$2y$10$iC0p4XH62e6CaaskyjL3Ke4G4mOjbVabpbMjDF0lVm/', 'lama@m.co', 'user', '2023-05-22 14:51:33'),
(24, 'doaa', '$2y$10$iGHqdbg.99z7mPjLNue.WepyTOTuVBmx7aSqVf/do5c', 'doaa@d.com', 'user', '2023-05-22 15:33:57'),
(25, 'farah', '$2y$10$5aXM4ZIm86wXCcpBo1BjaO5vHSAJXnZH/yiwQjMlE7E', 'farah@f.f', 'user', '2023-05-22 15:41:24'),
(26, 'walaa', '$2y$10$EfnEbP9gOyFK0frbxPysT.KUdF1drT28PX/mvgLz.36', 'walaa@w.w', 'user', '2023-05-22 15:51:11'),
(35, 'asmaa', '25d55ad283aa400af464c76d713c07ad', 'asma@as.com', 'user', '2023-05-27 16:47:26'),
(36, 'fedaa', 'bac76b0feb747e3bde11269cf367c97b', 'fedaa@fe.com', 'user', '2023-05-27 15:20:01'),
(37, 'nihal', '25d55ad283aa400af464c76d713c07ad', 'nihal@ni.com', 'admin', '2023-05-27 16:53:55'),
(39, 'mariam', '25d55ad283aa400af464c76d713c07ad', 'mariam@ma.com', 'user', '2023-05-28 04:06:51'),
(40, 'majed', '25d55ad283aa400af464c76d713c07ad', 'majed@ma.com', 'admin', '2023-05-28 04:05:43'),
(41, 'rewaa', 'f5bb0c8de146c67b44babbf4e6584cc0', 'rewaajamal3@gmail.com', 'admin', '2023-05-28 04:00:45'),
(42, 'rewaa', '25d55ad283aa400af464c76d713c07ad', 'rewaa@r.h', 'user', '2023-05-28 04:51:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
