-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2017 at 02:55 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `b_date` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8_unicode_ci NOT NULL,
  `salary` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `b_date`, `address`, `gender`, `salary`) VALUES
(1, 'Juan Dela Cruz', '1990-01-30', 'San Fernando', 'M', 10000),
(2, 'Mark Antonio Ibarra', '1987-07-20', 'Mexico', 'M', 12000),
(4, 'Second Test', '2013-06-05', 'Test Address 2', 'M', 1200),
(5, 'Third Test 3', '2017-07-16', 'Tesst', 'F', 4000),
(6, 'Test Sanitize Func', '2017-07-08', 'TEsstt', 'M', 12324),
(7, 'Test Update wqe wqe', '2017-07-07', 'Test Update', 'F', 23123),
(8, 'Tesstt Again', '2002-10-29', 'tetete', 'F', 12321),
(9, 'Heyy Jude', '1997-11-26', 'San Fernando', 'F', 22312),
(11, 'Joe Baldz', '1992-11-25', 'Woohooo', 'F', 11123);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'fTEOt+AfBIRE3A3cThoe7N82lvX6iZzivE0XSiuYKG0WoSdC9I455rVgquuqBhsOukmkixuZzTRqSkH2kWcBqw=='),
(2, 'user1', '3One6EKc/TXEeDdmkSZYlmX48NLvt7Rw8147S/GgpTBPm038K1EQQhePLJiFwQnSo5PY6yycjmmbLBul3SbNxw=='),
(4, 'user2', 'JAaQNmFO4+Dj3JUA/TG9o0pG1eAsZkdPdaJxgfVQH61ApUZ276J9YRwOuta5yyXLN/bOACbIgD0bLDkHaGd54g=='),
(5, 'testUser', 'xdQz0PuR8Rf9E5ZMcozXIy6yFKqhFdF6hrE1RiNVZokdJgZC3FUyvksbHOFCpsNJo8z/N5v09MZnAykDtRs4hA=='),
(11, 'user3', '4+AWklMk71Mjv7uxvRzuh6pJzy680046Ih+ZUipE163bMXjNkpOcI+bd63nSk1ohdoVbmSm6M00WqB3UbIKa9w=='),
(13, 'user5', 'KGtqJpne04oa8T21KP/u1dDvUmXIIC/8128rxmpqulf0m8RCKrifntQvg93AmNI8z1kvANwSW7WmNHZxqggSgw=='),
(17, 'user7', 'j7Ln0hFWWxOUTTTqXI5YGrtECtBa0U9FGGAP7H1P+UPDMK36A+CB7doNQOxLIn9pFYQxX1RbRdiC3U4JP/ipoQ=='),
(18, 'user6', 'Wl/KPRKKIHyCVAi+suJKWMlzlgHqz3yGARlJeY6yK0x4mO94dKmqorWync6oRSwy/3C8hSiWAenPdcWUM+eN2w==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
