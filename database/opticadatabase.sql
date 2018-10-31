-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2018 at 09:04 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opticadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `acces_user`
--

CREATE TABLE `acces_user` (
  `users_idusers` int(10) UNSIGNED NOT NULL,
  `password_user` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_formula`
--

CREATE TABLE `assigned_formula` (
  `idformula` int(10) UNSIGNED NOT NULL,
  `diagnostic_reason_consultation_quotes_idquotes` int(10) UNSIGNED NOT NULL,
  `diagnostic_iddiagnostic` int(10) UNSIGNED NOT NULL,
  `date_assigned` datetime NOT NULL,
  `medicine` varchar(500) NOT NULL COMMENT 'medicina',
  `treatment` text NOT NULL COMMENT 'tratamiento',
  `observations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clinical_histories`
--

CREATE TABLE `clinical_histories` (
  `idclinical_histories` int(10) UNSIGNED NOT NULL,
  `users_idusers` int(10) UNSIGNED NOT NULL,
  `current_illness` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic`
--

CREATE TABLE `diagnostic` (
  `iddiagnostic` int(10) UNSIGNED NOT NULL,
  `reason_consultation_quotes_idquotes` int(10) UNSIGNED NOT NULL,
  `clinical_histories_users_idusers` int(10) UNSIGNED NOT NULL,
  `clinical_histories_idclinical_histories` int(10) UNSIGNED NOT NULL,
  `datetime_diagnostic` datetime NOT NULL,
  `diagnostic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `evolutions_sheet`
--

CREATE TABLE `evolutions_sheet` (
  `idevolutions_sheet` int(10) UNSIGNED NOT NULL,
  `clinical_histories_idclinical_histories` int(10) UNSIGNED NOT NULL,
  `clinical_histories_users_idusers` int(10) UNSIGNED NOT NULL,
  `observations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `idexams` int(10) UNSIGNED NOT NULL,
  `reason_consultation_quotes_idquotes` int(10) UNSIGNED NOT NULL,
  `datetime_exams` datetime NOT NULL,
  `type_exam` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `informed_consent`
--

CREATE TABLE `informed_consent` (
  `idinformed_consent` int(10) UNSIGNED NOT NULL,
  `idusers_user` int(10) UNSIGNED NOT NULL,
  `histories_id` int(10) UNSIGNED NOT NULL,
  `observation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `idinventory` int(10) UNSIGNED NOT NULL,
  `quantity_products` int(10) UNSIGNED NOT NULL,
  `cost_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idproducts` int(10) UNSIGNED NOT NULL,
  `inventory_idinventory` int(10) UNSIGNED NOT NULL,
  `purchase_idpurchase` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `quantity_available` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_has_assigned_formula`
--

CREATE TABLE `products_has_assigned_formula` (
  `products_inventory_idinventory` int(10) UNSIGNED NOT NULL,
  `products_idproducts` int(10) UNSIGNED NOT NULL,
  `assigned_formula_idformula` int(10) UNSIGNED NOT NULL,
  `assigned_formula_diagnostic_iddiagnostic` int(10) UNSIGNED NOT NULL,
  `assigned_formula_diagnostic_reason_consultation_quotes_idquotes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `idprovider` int(10) UNSIGNED NOT NULL,
  `wallet_idservice` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provider_has_products`
--

CREATE TABLE `provider_has_products` (
  `provider_idprovider` int(10) UNSIGNED NOT NULL,
  `products_inventory_idinventory` int(10) UNSIGNED NOT NULL,
  `products_idproducts` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `idpurchase` int(10) UNSIGNED NOT NULL,
  `users_idusers` int(10) UNSIGNED NOT NULL,
  `datetime_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `idquotes` int(10) UNSIGNED NOT NULL,
  `users_idusers` int(10) UNSIGNED NOT NULL,
  `date_quotes` date NOT NULL,
  `time_quotes` time NOT NULL,
  `available` int(10) UNSIGNED NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reason_consultation`
--

CREATE TABLE `reason_consultation` (
  `quotes_idquotes` int(10) UNSIGNED NOT NULL,
  `reason` varchar(5000) NOT NULL COMMENT 'fecha de cita',
  `date` datetime NOT NULL,
  `symptom` text NOT NULL COMMENT 'sintomas',
  `type_consult` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request_laboratory`
--

CREATE TABLE `request_laboratory` (
  `idrequest_laboratory` int(10) UNSIGNED NOT NULL,
  `wallet_idservice` int(10) UNSIGNED NOT NULL,
  `date_claim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE `roster` (
  `idroster` int(10) UNSIGNED NOT NULL,
  `acces_user_users_idusers` int(10) UNSIGNED NOT NULL,
  `date_pay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `contact_phone` varchar(12) NOT NULL,
  `type_user` int(10) UNSIGNED NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `status_user` int(10) UNSIGNED NOT NULL,
  `eps` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `users_trigger` AFTER INSERT ON `users` FOR EACH ROW BEGIN
	INSERT INTO `acces_user`(`users_idusers`, `password_user`) VALUES (NEW.idusers, CONCAT(SUBSTRING(NEW.name, 1, 4), NEW.idusers));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `idservice` int(10) UNSIGNED NOT NULL,
  `users_idusers` int(10) UNSIGNED NOT NULL,
  `claim_date` datetime NOT NULL,
  `type_service` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acces_user`
--
ALTER TABLE `acces_user`
  ADD PRIMARY KEY (`users_idusers`),
  ADD KEY `acces_user_FKIndex1` (`users_idusers`);

--
-- Indexes for table `assigned_formula`
--
ALTER TABLE `assigned_formula`
  ADD PRIMARY KEY (`idformula`,`diagnostic_reason_consultation_quotes_idquotes`,`diagnostic_iddiagnostic`),
  ADD KEY `assigned_formula_FKIndex1` (`diagnostic_iddiagnostic`,`diagnostic_reason_consultation_quotes_idquotes`);

--
-- Indexes for table `clinical_histories`
--
ALTER TABLE `clinical_histories`
  ADD PRIMARY KEY (`idclinical_histories`,`users_idusers`),
  ADD KEY `clinical_histories_FKIndex1` (`users_idusers`);

--
-- Indexes for table `diagnostic`
--
ALTER TABLE `diagnostic`
  ADD PRIMARY KEY (`iddiagnostic`,`reason_consultation_quotes_idquotes`),
  ADD KEY `diagnostic_FKIndex1` (`reason_consultation_quotes_idquotes`),
  ADD KEY `diagnostic_FKIndex2` (`clinical_histories_idclinical_histories`,`clinical_histories_users_idusers`);

--
-- Indexes for table `evolutions_sheet`
--
ALTER TABLE `evolutions_sheet`
  ADD PRIMARY KEY (`idevolutions_sheet`,`clinical_histories_idclinical_histories`,`clinical_histories_users_idusers`),
  ADD KEY `evolutions_sheet_FKIndex1` (`clinical_histories_idclinical_histories`,`clinical_histories_users_idusers`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`idexams`),
  ADD KEY `exams_FKIndex1` (`reason_consultation_quotes_idquotes`);

--
-- Indexes for table `informed_consent`
--
ALTER TABLE `informed_consent`
  ADD PRIMARY KEY (`idinformed_consent`,`idusers_user`,`histories_id`),
  ADD KEY `informed_consent_FKIndex1` (`histories_id`,`idusers_user`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`idinventory`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idproducts`,`inventory_idinventory`),
  ADD KEY `products_FKIndex1` (`inventory_idinventory`),
  ADD KEY `products_FKIndex2` (`purchase_idpurchase`);

--
-- Indexes for table `products_has_assigned_formula`
--
ALTER TABLE `products_has_assigned_formula`
  ADD PRIMARY KEY (`products_inventory_idinventory`,`products_idproducts`,`assigned_formula_idformula`,`assigned_formula_diagnostic_iddiagnostic`,`assigned_formula_diagnostic_reason_consultation_quotes_idquotes`),
  ADD KEY `products_has_assigned_formula_FKIndex1` (`products_idproducts`,`products_inventory_idinventory`),
  ADD KEY `products_has_assigned_formula_FKIndex2` (`assigned_formula_idformula`,`assigned_formula_diagnostic_reason_consultation_quotes_idquotes`,`assigned_formula_diagnostic_iddiagnostic`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`idprovider`),
  ADD KEY `provider_FKIndex1` (`wallet_idservice`);

--
-- Indexes for table `provider_has_products`
--
ALTER TABLE `provider_has_products`
  ADD PRIMARY KEY (`provider_idprovider`,`products_inventory_idinventory`,`products_idproducts`),
  ADD KEY `provider_has_products_FKIndex1` (`provider_idprovider`),
  ADD KEY `provider_has_products_FKIndex2` (`products_idproducts`,`products_inventory_idinventory`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`idpurchase`),
  ADD KEY `purchase_FKIndex1` (`users_idusers`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`idquotes`),
  ADD KEY `quotes_FKIndex1` (`users_idusers`);

--
-- Indexes for table `reason_consultation`
--
ALTER TABLE `reason_consultation`
  ADD PRIMARY KEY (`quotes_idquotes`),
  ADD KEY `reason_consultation_FKIndex1` (`quotes_idquotes`);

--
-- Indexes for table `request_laboratory`
--
ALTER TABLE `request_laboratory`
  ADD PRIMARY KEY (`idrequest_laboratory`),
  ADD KEY `request_laboratory_FKIndex1` (`wallet_idservice`);

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`idroster`),
  ADD KEY `roster_FKIndex1` (`acces_user_users_idusers`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`idservice`),
  ADD KEY `wallet_FKIndex1` (`users_idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_formula`
--
ALTER TABLE `assigned_formula`
  MODIFY `idformula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clinical_histories`
--
ALTER TABLE `clinical_histories`
  MODIFY `idclinical_histories` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diagnostic`
--
ALTER TABLE `diagnostic`
  MODIFY `iddiagnostic` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evolutions_sheet`
--
ALTER TABLE `evolutions_sheet`
  MODIFY `idevolutions_sheet` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `informed_consent`
--
ALTER TABLE `informed_consent`
  MODIFY `idinformed_consent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `idpurchase` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `idquotes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `request_laboratory`
--
ALTER TABLE `request_laboratory`
  MODIFY `idrequest_laboratory` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `idroster` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `idservice` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acces_user`
--
ALTER TABLE `acces_user`
  ADD CONSTRAINT `acces_user_ibfk_1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON UPDATE CASCADE;

--
-- Constraints for table `assigned_formula`
--
ALTER TABLE `assigned_formula`
  ADD CONSTRAINT `assigned_formula_ibfk_1` FOREIGN KEY (`diagnostic_iddiagnostic`,`diagnostic_reason_consultation_quotes_idquotes`) REFERENCES `diagnostic` (`iddiagnostic`, `reason_consultation_quotes_idquotes`) ON UPDATE CASCADE;

--
-- Constraints for table `clinical_histories`
--
ALTER TABLE `clinical_histories`
  ADD CONSTRAINT `clinical_histories_ibfk_1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON UPDATE CASCADE;

--
-- Constraints for table `diagnostic`
--
ALTER TABLE `diagnostic`
  ADD CONSTRAINT `diagnostic_ibfk_1` FOREIGN KEY (`reason_consultation_quotes_idquotes`) REFERENCES `reason_consultation` (`quotes_idquotes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnostic_ibfk_2` FOREIGN KEY (`clinical_histories_idclinical_histories`,`clinical_histories_users_idusers`) REFERENCES `clinical_histories` (`idclinical_histories`, `users_idusers`) ON UPDATE CASCADE;

--
-- Constraints for table `evolutions_sheet`
--
ALTER TABLE `evolutions_sheet`
  ADD CONSTRAINT `evolutions_sheet_ibfk_1` FOREIGN KEY (`clinical_histories_idclinical_histories`,`clinical_histories_users_idusers`) REFERENCES `clinical_histories` (`idclinical_histories`, `users_idusers`) ON UPDATE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`reason_consultation_quotes_idquotes`) REFERENCES `reason_consultation` (`quotes_idquotes`) ON UPDATE CASCADE;

--
-- Constraints for table `informed_consent`
--
ALTER TABLE `informed_consent`
  ADD CONSTRAINT `informed_consent_ibfk_1` FOREIGN KEY (`histories_id`,`idusers_user`) REFERENCES `clinical_histories` (`idclinical_histories`, `users_idusers`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`inventory_idinventory`) REFERENCES `inventory` (`idinventory`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`purchase_idpurchase`) REFERENCES `purchase` (`idpurchase`) ON UPDATE CASCADE;

--
-- Constraints for table `products_has_assigned_formula`
--
ALTER TABLE `products_has_assigned_formula`
  ADD CONSTRAINT `products_has_assigned_formula_ibfk_1` FOREIGN KEY (`products_idproducts`,`products_inventory_idinventory`) REFERENCES `products` (`idproducts`, `inventory_idinventory`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_has_assigned_formula_ibfk_2` FOREIGN KEY (`assigned_formula_idformula`,`assigned_formula_diagnostic_reason_consultation_quotes_idquotes`,`assigned_formula_diagnostic_iddiagnostic`) REFERENCES `assigned_formula` (`idformula`, `diagnostic_reason_consultation_quotes_idquotes`, `diagnostic_iddiagnostic`) ON UPDATE CASCADE;

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`wallet_idservice`) REFERENCES `wallet` (`idservice`) ON UPDATE CASCADE;

--
-- Constraints for table `provider_has_products`
--
ALTER TABLE `provider_has_products`
  ADD CONSTRAINT `provider_has_products_ibfk_1` FOREIGN KEY (`provider_idprovider`) REFERENCES `provider` (`idprovider`) ON UPDATE CASCADE,
  ADD CONSTRAINT `provider_has_products_ibfk_2` FOREIGN KEY (`products_idproducts`,`products_inventory_idinventory`) REFERENCES `products` (`idproducts`, `inventory_idinventory`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON UPDATE CASCADE;

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON UPDATE CASCADE;

--
-- Constraints for table `reason_consultation`
--
ALTER TABLE `reason_consultation`
  ADD CONSTRAINT `reason_consultation_ibfk_1` FOREIGN KEY (`quotes_idquotes`) REFERENCES `quotes` (`idquotes`) ON UPDATE CASCADE;

--
-- Constraints for table `request_laboratory`
--
ALTER TABLE `request_laboratory`
  ADD CONSTRAINT `request_laboratory_ibfk_1` FOREIGN KEY (`wallet_idservice`) REFERENCES `wallet` (`idservice`) ON UPDATE CASCADE;

--
-- Constraints for table `roster`
--
ALTER TABLE `roster`
  ADD CONSTRAINT `roster_ibfk_1` FOREIGN KEY (`acces_user_users_idusers`) REFERENCES `acces_user` (`users_idusers`) ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
