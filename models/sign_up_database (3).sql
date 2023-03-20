-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2023 at 01:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sign_up_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidats`
--

CREATE TABLE `candidats` (
  `id_candidat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_city` varchar(45) NOT NULL,
  `origin` varchar(45) NOT NULL,
  `gender` enum('Homme','Femme','Autre') NOT NULL,
  `score` int(11) DEFAULT NULL,
  `resume` longblob DEFAULT NULL,
  `photo` longblob DEFAULT NULL,
  `adress` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidats`
--

INSERT INTO `candidats` (`id_candidat`, `id_user`, `fname`, `lname`, `phone`, `email`, `city`, `zip_code`, `birth_date`, `birth_city`, `origin`, `gender`, `score`, `resume`, `photo`, `adress`) VALUES
(30, 37, 'Velit enim debitis o', 'Ducimus et est non', '+1 (885) 726-4421', 'fbelkhyate@gmail.com', 'Explicabo Recusanda', 63, '2003-09-04', 'Omnis qui aliquam in', 'Sed a aut quo ut rec', 'Femme', NULL, 0x2f4170706c69636174696f6e732f58414d50502f78616d707066696c65732f6874646f63732f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f6376202831292e706466, '', 'Quaerat qui id quid');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id_education` int(11) NOT NULL,
  `diplomat` enum('bac','bac2','bac3','bac5','ing','doctorat') NOT NULL,
  `establishment` varchar(20) NOT NULL,
  `city` varchar(25) NOT NULL,
  `b_date` date NOT NULL,
  `f_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id_education`, `diplomat`, `establishment`, `city`, `b_date`, `f_date`, `description`, `id_candidat`) VALUES
(44, 'bac2', 'Possimus ipsum dist', 'Nostrum quod sed con', '2006-10-23', '2003-10-18', 'Quibusdam odio sapie', 30),
(45, 'bac2', 'Cupiditate voluptas ', 'Maxime ut dolore ame', '2003-08-04', '1995-01-14', 'Eaque maxime nostrud', 30);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id_exp` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `entreprise` varchar(20) NOT NULL,
  `b_date` date NOT NULL,
  `f_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id_exp`, `role`, `city`, `entreprise`, `b_date`, `f_date`, `description`, `id_candidat`) VALUES
(35, 'Rerum ea enim dolore', 'Elit et ullam in no', 'Ullamco fugit est m', '1994-09-07', '1993-05-15', 'Mollitia harum non e', 30),
(36, 'Illo sed natus moles', 'Et corrupti velit c', 'Aperiam porro expedi', '1972-12-21', '1995-06-12', 'Placeat molestiae d', 30);

-- --------------------------------------------------------

--
-- Table structure for table `recruters`
--

CREATE TABLE `recruters` (
  `id_recruter` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id_skill` int(11) NOT NULL,
  `skill_name` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id_skill`, `skill_name`, `level`, `id_candidat`) VALUES
(110, 'Et debitis excepteur', '20', 30),
(111, 'Dolorem quia repelle', '40', 30),
(112, 'Vero ipsum sit eius', '20', 30),
(113, 'Est officia consequa', '80', 30),
(114, 'Dolore exercitation ', '20', 30),
(115, 'Eum sunt alias et do', '40', 30),
(116, 'Aut culpa architect', '20', 30),
(117, 'Ab nulla labore comm', '60', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('candidat','recruteur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(37, 'farouk', 'fbelkhyate@gmail.com', '$2y$10$/bTKN9QjIEH0ZagDb/RvNelOUsNWxwSQ5e2hpG5qcroxrQyyYb8ra', 'candidat'),
(38, 'fbelkhyate', 'fbelkhayate@hotmail.com', '$2y$10$ck6xmqYf.MSOaGG5e9B6Jubc4qpzV0o3cbuL8D5UaK7dc2w7A8AAC', 'recruteur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id_candidat`),
  ADD KEY `fk_usercand_id` (`id_user`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_education`),
  ADD KEY `fk_edu_candidat` (`id_candidat`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `id_candidat` (`id_candidat`);

--
-- Indexes for table `recruters`
--
ALTER TABLE `recruters`
  ADD PRIMARY KEY (`id_recruter`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skill`),
  ADD KEY `id_candidat` (`id_candidat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id_candidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `recruters`
--
ALTER TABLE `recruters`
  MODIFY `id_recruter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `fk_candidat_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usercand_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `fk_edu_candidat` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recruters`
--
ALTER TABLE `recruters`
  ADD CONSTRAINT `recruters_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
