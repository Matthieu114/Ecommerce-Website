-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 05 avr. 2021 à 20:56
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `loginSystem`
--

-- --------------------------------------------------------

--
-- Structure de la table `auctions`
--

CREATE TABLE `auctions` (
  `auctionId` int(11) NOT NULL,
  `aName` varchar(255) DEFAULT NULL,
  `aImage` varchar(500) DEFAULT NULL,
  `aPrice` varchar(500) DEFAULT NULL,
  `aBuyNow` varchar(500) DEFAULT NULL,
  `currentBid` varchar(128) DEFAULT NULL,
  `highestBidder` varchar(128) DEFAULT NULL,
  `aAbout` varchar(1500) DEFAULT NULL,
  `aEnd_date` datetime DEFAULT NULL,
  `aCategory` varchar(255) DEFAULT NULL,
  `aStatus` tinyint(4) DEFAULT NULL,
  `aUser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `auctions`
--

INSERT INTO `auctions` (`auctionId`, `aName`, `aImage`, `aPrice`, `aBuyNow`, `currentBid`, `highestBidder`, `aAbout`, `aEnd_date`, `aCategory`, `aStatus`, `aUser`) VALUES
(16, 'Huawei P30 128go', 'huaweip30.jpg', '899', '', '2000', 'thomasxd123', 'Top tier phone. Has not Been used yet 128go ram and 10tTo pixel camera', '2021-04-12 00:00:00', 'phone', 0, 'Sellerguy'),
(25, 'Asus V222GAK-WA164T ', 'asus.png', '500', '0', '1700', 'thomasxd123', 'Les points clés\r\n\r\n    21,5\" (54,6 cm)\r\n    Intel Pentium J5005\r\n    Mémoire vive 8 Go\r\n    SSD 256 Go\r\n\r\n    Le + : Ecran bord à bord ; Ecran Anti-reflet et angle de vision large de 178°\r\n\r\n', '2021-04-20 00:00:00', 'pc', 0, 'Admin'),
(26, 'iMac', 'imac.png', '1500', '0', NULL, NULL, 'Taille de l\'écran 	21,5 \"\r\nProcesseur 	Intel Core i3\r\nRAM installée 	8 Go\r\nCapacité de stockage 	1 To ', '2021-04-30 00:00:00', 'pc', 0, 'Admin'),
(27, 'MacBook Pro', 'shopping4.png', '1125', '0', NULL, NULL, '15\" Retina (2012) - Core i7 2,3 GHz - SSD 256 Go - 8 Go AZERTY - Français ', '2021-04-15 00:00:00', 'laptop', 0, 'Admin'),
(28, 'MacBook Air- Gris sidéral', 'macbookair.png', '1100', '0', '1400', 'thomasxd123', '\r\n\r\n    Puce Apple M1 avec CPU 8 cœurs, GPU 7 cœurs et Neural Engine 16 cœurs\r\n    8 Go de mémoire unifiée\r\n    SSD de 256 Go\r\n    Écran Retina avec affichage True Tone\r\n    Magic Keyboard rétroéclairé - Français\r\n    Touch ID\r\n    Trackpad Force Touch\r\n    Deux ports Thunderbolt/USB 4\r\n\r\n', '2021-04-15 00:00:00', 'laptop', 0, 'Admin'),
(29, 'Ordinateur portable XPS 17', 'shopping2.png', '1600', '0', NULL, NULL, 'i9 processeur', '2021-04-21 00:00:00', 'laptop', 0, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `carousel`
--

CREATE TABLE `carousel` (
  `cId` int(11) NOT NULL,
  `cImage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carousel`
--

INSERT INTO `carousel` (`cId`, `cImage`) VALUES
(1, 'webdesign_1.jpg'),
(2, 'ordi1.webp'),
(3, 'iphone1.webp'),
(4, 'Imac1.webp'),
(5, 'carousel6.webp'),
(8, 'carousel4.webp'),
(11, 'carousel5.webp');

-- --------------------------------------------------------

--
-- Structure de la table `myAdmin`
--

CREATE TABLE `myAdmin` (
  `adminId` int(11) NOT NULL,
  `adminUid` varchar(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `myAdmin`
--

INSERT INTO `myAdmin` (`adminId`, `adminUid`, `adminName`, `adminEmail`, `adminPwd`) VALUES
(1, 'Admin', 'Admin', 'Admin@gmail.com', '$2y$10$jVIJMM6kosY9av7UwI1NweqCxwxXSSVS.Mb0noh9eeUFnlXykk.Xu');

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `fName` varchar(128) NOT NULL,
  `billingAdress` varchar(128) NOT NULL,
  `billingCity` varchar(128) NOT NULL,
  `billingZip` int(11) NOT NULL,
  `cType` varchar(128) NOT NULL,
  `Cname` varchar(128) NOT NULL,
  `Cnumb` varchar(128) NOT NULL,
  `expMonth` varchar(128) NOT NULL,
  `expYear` varchar(128) NOT NULL,
  `CVV` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`paymentId`, `fName`, `billingAdress`, `billingCity`, `billingZip`, `cType`, `Cname`, `Cnumb`, `expMonth`, `expYear`, `CVV`) VALUES
(1, 'Thomas YV', 'Browning Street', 'Paris', 75015, 'visa', 'Matthieu Denis', '1111 2222 3333 4444', 'Mars', '2021', '345');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `auctionId` int(11) NOT NULL,
  `aName` varchar(255) NOT NULL,
  `aImage` varchar(500) NOT NULL,
  `aQuantity` varchar(128) NOT NULL,
  `aPrice` varchar(500) DEFAULT NULL,
  `aBuyNow` varchar(500) NOT NULL,
  `aAbout` varchar(1500) NOT NULL,
  `aEnd_date` datetime DEFAULT NULL,
  `aCategory` varchar(255) DEFAULT NULL,
  `aUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`auctionId`, `aName`, `aImage`, `aQuantity`, `aPrice`, `aBuyNow`, `aAbout`, `aEnd_date`, `aCategory`, `aUser`) VALUES
(44, 'Asus Rog Laptop', 'AsusRog.jpg', '1', NULL, '1500', '    Display 6.00-inch (1080x2160)\r\n    Processor Qualcomm Snapdragon 845.\r\n    Front Camera 8MP.\r\n    Rear Camera 12MP + 8MP.\r\n    RAM 8GB.\r\n    Storage 128GB.\r\n    Battery Capacity 4000mAh.\r\n    OS Android 8.1.', NULL, NULL, 'thomasxd123'),
(45, 'Testitem4', 'samsung.jpg', '1', NULL, '1300', 'this is a test item', NULL, NULL, 'thomasxd123'),
(47, 'Samsung galaxy s8', 'samsung.jpg', '1', NULL, '300', 'Marque: Samsung\r\nSystème d\'exploitation: Android\r\nTaille d\'écran: Écran 5,8 po\r\nFonctions de sécurité: Reconnaissance faciale, Reconnaissance d\'iris, Lecteur d\'empreintes digitales', NULL, NULL, 'thomasxd123');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `usersAddress` varchar(128) NOT NULL,
  `usersAcctype` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `usersAddress`, `usersAcctype`) VALUES
(7, 'Vendeuse', 'vendeuse@gmail.com', 'vendeuse', '$2y$10$ovzXcYHwug4LafdSqOhMs.TdaFDu6v25kvTfBNlF7mO9gR1netP5O', '6 rue de labbe jean glatz', 'seller'),
(8, 'Thomas YV', 'thomas@gmail.com', 'thomasxd123', '$2y$10$69WLgSg71l7h6..w9HQvIeozor6/.uIX./fXmeQ8mI7nv6PwH/19i', '18 rue des Volontaires', 'buyer'),
(13, 'Matthieu Denis', 'seller@gmail.com', 'Sellerguy', '$2y$10$EbfMqErXZcXkgsOfUaGNqeon7aUR4KY5D6.c9/ERA7/ReInZcbI9y', '237 grande rue', 'seller'),
(15, 'Matt denis', 'supplier@gmail.com', 'supplier', '$2y$10$dtr6zl2.Cr8jteI/4UwX9uC/wz.PgMmg97nzgJz5FWQszYNQAeVbq', 'address', 'seller'),
(17, 'John Doe', 'buyer@gmail.com', 'BuyerGuy', '$2y$10$uVrg5mWbYfq0ZUVh1wzIBePdx92LoNykI4unoc5aHdx/b0rY.ZQrq', 'Boston', 'buyer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`auctionId`);

--
-- Index pour la table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`cId`);

--
-- Index pour la table `myAdmin`
--
ALTER TABLE `myAdmin`
  ADD PRIMARY KEY (`adminId`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`auctionId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `auctionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `myAdmin`
--
ALTER TABLE `myAdmin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `auctionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
