-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql311.byetcluster.com
-- Généré le :  lun. 03 jan. 2022 à 10:09
-- Version du serveur :  5.7.35-38
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epiz_28883698_bookshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id_Book` int(11) NOT NULL,
  `name_Book` varchar(100) DEFAULT NULL,
  `desc_book` text,
  `img_path` text,
  `file_path` text,
  `price` float DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id_Book`, `name_Book`, `desc_book`, `img_path`, `file_path`, `price`, `id_cat`) VALUES
(34, 'javascript ', 'JavaScript is a scripting programming language primarily used in interactive web pages', 'javascript.jpg', 'JavaScript Cheat Sheet for 2020 (.PDF Version Included) _ WebsiteSetup.pdf', 120, 1),
(35, 'mysql ', 'mysql is a database management system', 'mysql.jpg', 'MySQLNotesForProfessionals.pdf', 70, 1),
(36, 'php', 'PHP is a popular general-purpose scripting language that is especially suited to web development. Fast, flexible and pragmatic', 'php.jpg', 'PHPNotesForProfessionals.pdf', 80, 1),
(37, 'jquery', 'jQuery is a free, cross-platform JavaScript library created to facilitate client-side scripting in the HTML code of web pages.', 'jquery.jpg', 'jQueryNotesForProfessionals.pdf', 50, 1),
(39, 'css ', 'CSS is the language we use to style an HTML document. CSS describes how HTML elements should be displayed', 'Css.jpg', 'CSSNotesForProfessionals.pdf', 30, 1),
(40, 'Html', 'HyperText Markup Language, commonly abbreviated HTML or in its latest version HTML5, is the markup language designed to represent web pages.', 'html.jpg', 'HTML5NotesForProfessionals.pdf', 20, 1),
(41, 'Angular ', 'Angular (commonly known as \"Angular 2+\" or \"Angular v2 and above\") 2.3 is a client-side, open source, TypeScript-based framework, and co-directed by the \"Angular\" project team at Google and by a community of individuals and companies. Angular is a complete rewrite of AngularJS, a framework built by the same team.', 'angular.jpg', 'AngularJSNotesForProfessionals.pdf', 150, 1),
(42, 'Bootstrap ', 'Bootstrap is a collection of tools useful for creating the design (graphics, animation and interactions with the page in the browser, etc.) of websites and web applications.', 'Bootstrap.jpg', 'Bootstrap-Programming-Cookbook.pdf', 70, 1),
(43, '300 Chicken', 'The chicken (Gallus gallus domesticus), a subspecies of the red junglefowl, is a type of ... of the spread of chickens in these areas; better description and genetic analysis of local breeds ...', '300Chicken.jpg', '300_Chicken_Recipes.pdf', 100, 3),
(44, 'Healthy Living ', 'Healthy Lifestyle Diets Find healthy, delicious recipes for healthy lifestyles, vegetarian, clean-eating, paleo and low-carb recipes from the food and nutrition experts at EatingWell.', 'RecipesforHealthyLiving.jpg', 'Recipes_for_Healthy_Living.pdf', 70, 3),
(47, 'ComeFollowMe', 'Larry Deason has been proclaiming the Good News of Jesus Christ for 40 years. He has served the Body of Christ as deacon..', 'ComeFollowMe.jpg', 'ComeFollowMe.pdf', 70, 2),
(48, 'The Way Up Is Down ', 'Larry Deason has been proclaiming the Good News of Jesus Christ for 40 years. He has served the Body of Christ as deacon, elder, preacher, missionary, counselor, teacher and writer.', 'TheWayUpIsDown.jpg', 'TheWayUpIsDown.pdf', 70, 2),
(49, 'Not By Sight', 'We live by faith, not by sight,  another translation reads, We walk by faith, not by sight.Both expressions mean the same thing, for our lives should be a walk by faith, not by sight.', 'NotBySight.jpg', 'LCL-NotBySight.pdf', 120, 2);

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

CREATE TABLE `card` (
  `creditCard` varchar(14) NOT NULL,
  `year` varchar(5) DEFAULT NULL,
  `Month` varchar(2) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `card`
--

INSERT INTO `card` (`creditCard`, `year`, `Month`, `cvv`) VALUES
('12345678912345', '2028', '12', '123'),
('14725836936925', '2018', '05', '152'),
('98765432198765', '2032', '03', '759');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `name_cat`) VALUES
(1, 'programming'),
(2, 'Religious'),
(3, 'Cookbooks');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `Name_Client` varchar(50) DEFAULT NULL,
  `lastName_Client` varchar(50) DEFAULT NULL,
  `email_Client` varchar(50) NOT NULL,
  `password_Client` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `Name_Client`, `lastName_Client`, `email_Client`, `password_Client`) VALUES
(1, 'yahya', 'azrout', 'yahya@123', '123'),
(24, 'Manal', 'LAHMIYM', 'mlahmiym@gmail.com', '123456789'),
(19, 'anouar', 'oumansour', 'anouar.ouma@gmail.com', '123'),
(25, 'hhh', 'hfgcvgf', 'tebi@gmail.com', 'tebi12345665'),
(22, 'basma', 'bacha', 'basma@bacha.com', '123'),
(26, 'red', 'ref', 'fescrayze@gmail.com', 'fescrayze2017'),
(27, 'abderahman', 'zahmidi', 'abderahmanzahmidi@gmail.com', 'zahmisi123'),
(28, 'yassin@123yassin@123', 'yassin@123', 'yassin@123', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_Book` int(11) DEFAULT NULL,
  `date_commande` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `email` varchar(50) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `email_Client` varchar(50) DEFAULT NULL,
  `id_Book` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`email_Client`, `id_Book`) VALUES
('anouar.ouma@gmail.com', 40),
('anouar.ouma@gmail.com', 36),
('anouar.ouma@gmail.com', 35),
('basma@bacha.com', 47),
('basma@bacha.com', 44),
('yassin@123', 34),
('yassin@123', 49),
('yassin@123', 48),
('yassin@123', 47);

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`login`, `pass`) VALUES
('admin@admin.com', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_Book`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`creditCard`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`,`name_cat`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`,`email_Client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_Book` (`id_Book`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD KEY `email_Client` (`email_Client`),
  ADD KEY `id_Book` (`id_Book`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id_Book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
