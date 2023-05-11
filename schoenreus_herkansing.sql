-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 09:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoenreus herkansing`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `naam_en_achternaam` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoonnummer` bigint(20) NOT NULL,
  `bericht` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `retour`
--

CREATE TABLE `retour` (
  `id` int(11) NOT NULL,
  `naam_achternaam` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telefoonnummer` bigint(20) NOT NULL,
  `order_nummer` bigint(30) NOT NULL,
  `reden_voor_retour` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schoenen`
--

CREATE TABLE `schoenen` (
  `id` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(13,2) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schoenen`
--

INSERT INTO `schoenen` (`id`, `merk`, `naam`, `beschrijving`, `prijs`, `foto`) VALUES
(1, 'Nike ', 'Nike Sock Dart Premium', 'De Nike Sock Dart Premium is een trendy en populaire sneaker die bekend staat om zijn minimalistische en gestroomlijnde ontwerp.', '89.99', 'img/nikesockdartprem.webp'),
(2, 'Nike', 'Nike Air Max Alpha', 'De Nike Air Max Alpha demping biedt comfortabele stabiliteit voor het tillen, of het nu een lichte of zware dag is.', '69.99', 'img/nikeairmaxalpha.webp'),
(3, 'Nike', 'Nike Air Max System', 'Je favoriete Max Air demping komt met serieuze jaren 80 flair in het Nike Air Max System.', '79.99', 'img/nikeairmaxsystm.webp'),
(4, 'Reebok', 'Reebok NFX', 'Reebok NFX-schoenen zijn ontworpen om je mee te nemen op een actieve dag.', '49.99', 'img/reeboknfx.webp'),
(5, 'Nike', 'Nike Air Max Alpha Trainer 5', 'Beëindig je laatste rep met kracht en rek het uit met een brul die de vloer van de sportschool verbluft in de Nike Air Max Alpha Trainer 5.', '59.99', 'img/nikeairmaxalphatrainer.webp'),
(6, 'Puma', 'Puma X-ray Speed', 'De X-Ray Speed is licht en wendbaar, waardoor je snel op de been blijft.', '74.99', 'img/pumaxrayspeed.webp'),
(7, 'O\'Neill', 'O\'Neill Alta Men High Snowboots', 'Ga de deur uit voor een wandeling in de sneeuw met deze Alta Men High snowboots van O\'Neill', '49.99', 'img/oneilaltahighboots.webp'),
(8, 'Adidas', 'Adidas Pure Boost', 'De Adidas Pure Boost is een voorbeeld voor hoe een energieteruggevende en comfortabele schoen moet zijn.', '99.99', 'img/adidaspureboost.webp'),
(9, 'Nike', 'Nike Air Max LTD 3', 'De Nike Air LTD 3 voor heren heeft de Max Air-unit in de hak voor comfort en een leren bovenwerk voor duurzaamheid.', '109.99', 'img/nikeairmaxltd.webp'),
(10, 'Adidas', 'Adidas Hoops 3.0', 'De iconische 3-Stripes op de synthetische leren bovenkant, plus een rubbere cupzool eronder is wat het een comfortabele schoen maakt.', '39.99', 'img/adidashoops.webp'),
(11, 'Asics', 'Asics Gel-Cumulus 24', 'Asics Gel-Cumulus 24 is een alledaagse schoen die is ontworpen om hardlopers een gedempte en comfortabele ervaring te bieden.', '119.99', 'img/asicsgelcum.webp'),
(12, 'Adidas', 'Adidas East Trail 2.0 Rain.RDY', 'Deze hikingschoenen met adidas RAIN.RDY zijn ontwikkeld voor natte dagen in de natuur.', '99.99', 'img/adidaseasttrail.webp'),
(13, 'Adidas', 'Adidas Ultraboost 23', 'Ervaar epische energie met de nieuwe Ultraboost 23, onze lichtste Ultraboost ooit.', '149.99', 'img/adidasultraboost23.webp'),
(14, 'Adidas', 'Adidas Adipower', 'Deze adidas gewichthefschoenen houden je ook bij de hoogste belasting stabiel met een verhoogde hiel en compacte middenzool.', '139.99', 'img/adidasadipower.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(11, 'berky100', '$2y$10$R3XgZjT/veqEsHFVr2gfZO4DflRc65OSoj9ny6/VCt.qi2OeVunFe', '2023-05-08 10:25:44'),
(12, 'berky01058', '$2y$10$tQMEwG6cXSinydHP8hihOeQKRcCAPYUjQaz0U/8X/.qH1I5MKmf2y', '2023-05-08 11:00:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retour`
--
ALTER TABLE `retour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoenen`
--
ALTER TABLE `schoenen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retour`
--
ALTER TABLE `retour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schoenen`
--
ALTER TABLE `schoenen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
