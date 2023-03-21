-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 21 mars 2023 à 21:59
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sign_up_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `applies`
--

CREATE TABLE `applies` (
  `id_apply` int(11) NOT NULL,
  `id_candidat` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
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
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id_candidat`, `id_user`, `fname`, `lname`, `phone`, `email`, `city`, `zip_code`, `birth_date`, `birth_city`, `origin`, `gender`, `score`, `resume`, `photo`, `adress`) VALUES
(27, 33, 'Quas nemo dolorem of', 'Ut illum dolorem in', '+1 (256) 989-1314', 'fbelkhyate@gmail.com', 'Harum explicabo Lab', 94, '1997-09-14', 'Aliquip dolorem alia', 'Nesciunt et est lab', 'Femme', 50, 0x2f4170706c69636174696f6e732f58414d50502f78616d707066696c65732f6874646f63732f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f6376202831292e706466, 0x2f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f3333696d6732332d30332d32312e6a706567, 'Lorem quam sunt vol'),
(28, 33, 'Quas nemo dolorem of', 'Ut illum dolorem in', '', 'fbelkhyate@gmail.com', 'Harum explicabo Lab', 94, '1997-09-14', 'Aliquip dolorem alia', 'Nesciunt et est lab', 'Femme', 50, 0x2f4170706c69636174696f6e732f58414d50502f78616d707066696c65732f6874646f63732f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f6376202831292e706466, 0x2f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f3333696d6732332d30332d32312e6a706567, 'Lorem quam sunt vol'),
(29, 33, 'Quas nemo dolorem of', 'Ut illum dolorem in', '', 'fbelkhyate@gmail.com', 'Harum explicabo Lab', 94, '1997-09-14', 'Aliquip dolorem alia', 'Nesciunt et est lab', 'Femme', 50, 0x2f4170706c69636174696f6e732f58414d50502f78616d707066696c65732f6874646f63732f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f6376202831292e706466, 0x2f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f3333696d6732332d30332d32312e6a706567, 'Lorem quam sunt vol'),
(30, 35, 'Est voluptatem quis', 'Fugiat quis dolorib', '+1 (889) 894-3433', 'fbelkhayate@hotmail.com', 'Accusamus est laboru', 79, '2009-11-26', 'Ab cupiditate tempor', 'Irure ullam eum qui ', 'Autre', 31, 0x2f4170706c69636174696f6e732f58414d50502f78616d707066696c65732f6874646f63732f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f6376322e706466, 0x2f526563727569744d652f636f6e74726f6c6c6572732f75706c6f6164732f3335696d6732332d30332d32312e6a706567, 'Veniam harum offici');

-- --------------------------------------------------------

--
-- Structure de la table `education`
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
-- Déchargement des données de la table `education`
--

INSERT INTO `education` (`id_education`, `diplomat`, `establishment`, `city`, `b_date`, `f_date`, `description`, `id_candidat`) VALUES
(39, 'bac5', 'Fuga Ut est qui et ', 'Aperiam fugit optio', '1992-12-26', '1989-06-01', 'Enim illo molestiae ', 27),
(40, 'bac2', 'Assumenda alias dolo', 'Ea non rerum sit dis', '2013-06-05', '2010-10-20', 'Incidunt velit exe', 27),
(41, 'bac5', 'Fuga Ut est qui et ', 'Aperiam fugit optio', '1992-12-26', '1989-06-01', 'Enim illo molestiae ', 27),
(42, 'bac2', 'Assumenda alias dolo', 'Ea non rerum sit dis', '2013-06-05', '2010-10-20', 'Incidunt velit exe', 27),
(43, 'bac5', 'Fuga Ut est qui et ', 'Aperiam fugit optio', '1992-12-26', '1989-06-01', 'Enim illo molestiae ', 27),
(44, 'bac2', 'Assumenda alias dolo', 'Ea non rerum sit dis', '2013-06-05', '2010-10-20', 'Incidunt velit exe', 27),
(45, 'bac5', 'Sint soluta quasi ve', 'Rerum maxime ullamco', '1975-02-25', '1988-06-17', 'Architecto pariatur', 30);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
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
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_exp`, `role`, `city`, `entreprise`, `b_date`, `f_date`, `description`, `id_candidat`) VALUES
(30, 'Voluptatem Blanditi', 'Et eos incidunt ea', 'Nostrud id ut eligen', '2018-09-09', '1975-08-14', 'Lorem libero dolore ', 27),
(31, 'Ducimus ipsum accus', 'Aspernatur quis dign', 'Voluptatem est elig', '2006-04-26', '1999-07-22', 'Deserunt corporis se', 27),
(32, 'Voluptatem Blanditi', 'Et eos incidunt ea', 'Nostrud id ut eligen', '2018-09-09', '1975-08-14', 'Lorem libero dolore ', 27),
(33, 'Ducimus ipsum accus', 'Aspernatur quis dign', 'Voluptatem est elig', '2006-04-26', '1999-07-22', 'Deserunt corporis se', 27),
(34, 'Voluptatem Blanditi', 'Et eos incidunt ea', 'Nostrud id ut eligen', '2018-09-09', '1975-08-14', 'Lorem libero dolore ', 27),
(35, 'Ducimus ipsum accus', 'Aspernatur quis dign', 'Voluptatem est elig', '2006-04-26', '1999-07-22', 'Deserunt corporis se', 27),
(36, 'Est sunt molestiae c', 'A ad aliquip est id ', 'Minim sit asperiores', '1995-10-03', '2009-03-19', 'Pariatur Eos sed ni', 30);

-- --------------------------------------------------------

--
-- Structure de la table `job_list`
--

CREATE TABLE `job_list` (
  `id` int(6) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titre_emploi` varchar(255) NOT NULL,
  `type_emploi` varchar(255) NOT NULL,
  `competence` varchar(255) NOT NULL,
  `salaire` varchar(255) NOT NULL,
  `annee` int(6) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `job_list`
--

INSERT INTO `job_list` (`id`, `categorie`, `titre_emploi`, `type_emploi`, `competence`, `salaire`, `annee`, `adresse`, `description`, `expiration`) VALUES
(11, 'développement Web', 'Non blanditiis volup', 'temps-plein', 'Nisi veniam corpori', 'Anim ad repudiandae ', 99, 'Obcaecati quia maior', 'Eum quo sunt sint di', '1973-12-19'),
(12, 'Finance', 'Tempora consequatur', 'temps-partiel', 'Et eius ipsa expedi', 'Commodo rerum volupt', 70, 'Incididunt incididun', 'Occaecat reprehender', '2022-12-30'),
(13, 'IT', 'Adipisicing harum pe', 'temps-partiel', 'In ea eveniet volup', 'Culpa in eos velit n', 79, 'Voluptates inventore', 'Ipsam voluptatem Su', '2004-03-07'),
(14, 'IT', 'Ut excepturi in nihi', 'temps-plein', 'Ducimus repudiandae', 'Non in labore unde s', 38, 'Quia perspiciatis c', 'Ex qui labore pariat', '1981-11-29'),
(15, 'IT', 'Voluptas rerum dolor', 'temps-partiel', 'Molestiae vel duis r', 'Est sint et ut cons', 67, 'Enim modi elit omni', 'Velit non aut aliqu', '1984-05-16');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id_lang` int(11) NOT NULL,
  `lang` varchar(25) NOT NULL,
  `level` varchar(4) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id_lang`, `lang`, `level`, `id_candidat`) VALUES
(1, 'Culpa officia eum i', 'A1', 27),
(2, 'In sit nesciunt mol', 'B1', 27),
(3, 'Quia quasi quia omni', 'C2', 27),
(4, 'Similique nesciunt ', 'B1', 30),
(5, 'Et non et distinctio', 'C1', 30),
(6, 'Fugit aperiam offic', 'C1', 30);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id_skill` int(11) NOT NULL,
  `skill_name` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id_skill`, `skill_name`, `level`, `id_candidat`) VALUES
(93, 'Lorem ea cupidatat o', '100', 27),
(94, 'Ipsa dolor et praes', '40', 27),
(95, 'Sunt aut voluptas co', '40', 27),
(96, 'Anim quasi accusamus', '40', 27),
(97, 'Eu incididunt asperi', '60', 27),
(98, 'Ut tenetur Nam dolor', '40', 27),
(99, 'Sint sunt quo et et ', '20', 27),
(100, 'Aut placeat tempori', '100', 27),
(101, 'Lorem ea cupidatat o', '100', 27),
(102, 'Ipsa dolor et praes', '40', 27),
(103, 'Sunt aut voluptas co', '40', 27),
(104, 'Anim quasi accusamus', '40', 27),
(105, 'Eu incididunt asperi', '60', 27),
(106, 'Ut tenetur Nam dolor', '40', 27),
(107, 'Sint sunt quo et et ', '20', 27),
(108, 'Aut placeat tempori', '100', 27),
(109, 'Lorem ea cupidatat o', '100', 27),
(110, 'Ipsa dolor et praes', '40', 27),
(111, 'Sunt aut voluptas co', '40', 27),
(112, 'Anim quasi accusamus', '40', 27),
(113, 'Eu incididunt asperi', '60', 27),
(114, 'Ut tenetur Nam dolor', '40', 27),
(115, 'Sint sunt quo et et ', '20', 27),
(116, 'Aut placeat tempori', '100', 27),
(117, 'Tempora vitae ut und', '60', 30),
(118, 'Et non expedita dict', '100', 30),
(119, 'Repellendus Suscipi', '20', 30),
(120, 'Incidunt asperiores', '60', 30);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('candidat','recruteur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(33, 'farouk', 'fbelkhyate@gmail.com', '$2y$10$.MzyYso4J5IeZlSRWfRoJ.M6tcd2zOyRxNSn1M/XepLJm/wTVZfoS', 'candidat'),
(34, 'adnane', 'ahmimouadnane102@gmail.com', '$2y$10$mVaUeQ2fjelPhR7WVMyWuecaNKJZrwjdY0yFchsejTquRfARWrtPm', 'recruteur'),
(35, 'FaroukBel', 'fbelkhayate@hotmail.com', '$2y$10$B9g3C19Nt9rIgpAJdgzshuKzuYEETIR5y740V0awylKxgCgsXWeNK', 'candidat'),
(36, 'oussama', 'oussama11chaouki@gmail.com', '$2y$10$5HTzUNQ417875HLRxkRub.UdGukW2ZDsHEVYrMdyyMvw..hwBghMi', 'recruteur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`id_apply`),
  ADD KEY `id_job` (`id_job`),
  ADD KEY `id_candidat` (`id_candidat`);

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id_candidat`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_education`),
  ADD KEY `fk_edu_candidat` (`id_candidat`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `id_candidat` (`id_candidat`);

--
-- Index pour la table `job_list`
--
ALTER TABLE `job_list`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id_lang`),
  ADD KEY `id_candidat` (`id_candidat`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skill`),
  ADD KEY `id_candidat` (`id_candidat`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `applies`
--
ALTER TABLE `applies`
  MODIFY `id_apply` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id_candidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `job_list`
--
ALTER TABLE `job_list`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id_lang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `applies`
--
ALTER TABLE `applies`
  ADD CONSTRAINT `applies_ibfk_1` FOREIGN KEY (`id_job`) REFERENCES `job_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applies_ibfk_2` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `candidats_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
