-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2015 at 07:45 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diamondpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Anon_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `Category_id` int(4) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `Faq_Id` int(5) NOT NULL,
  `Faq_Question` text NOT NULL,
  `Faq_Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `Inventory_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `Order_Detail_Id` int(10) NOT NULL,
  `Sale_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Order_Date` date NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `Payment_Method_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Card_Type` varchar(50) NOT NULL,
  `Card_Number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_Id` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Description` text NOT NULL,
  `Details` text NOT NULL,
  `Date_Added` date NOT NULL,
  `Featured` tinyint(1) NOT NULL,
  `Category_Id` int(10) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `Product_Image_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Image_Url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE IF NOT EXISTS `product_review` (
  `Product_Review_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Price_Rating` tinyint(1) NOT NULL,
  `Value_Rating` tinyint(1) NOT NULL,
  `Quality_Rating` tinyint(1) NOT NULL,
  `Review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `Sale_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Payement_Method_Id` int(10) NOT NULL,
  `Confirmation` tinyint(1) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_Id` int(10) NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Password` varchar(72) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `User_Type` varchar(20) NOT NULL DEFAULT 'Customer',
  `Grant_Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `User_Info_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Birthdate` date NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State_Province` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Postal_Code_Zip` varchar(20) NOT NULL,
  `Phone_Number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `Wish_List_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`Faq_Id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Inventory_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Order_Detail_Id`),
  ADD KEY `Sale_Id` (`Sale_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`Payment_Method_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `Category_Id_Index` (`Category_Id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`Product_Image_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`Product_Review_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`Sale_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Payement_Method_Id` (`Payement_Method_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_Info_Id`),
  ADD KEY `User_Id_Index` (`User_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `User_Id_2` (`User_Id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`Wish_List_Id`),
  ADD KEY `User_Id_Index` (`User_Id`),
  ADD KEY `Product_Id_Index` (`Product_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Product_Id` (`Product_Id`),
  ADD KEY `User_Id_2` (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `Faq_Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inventory_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Order_Detail_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `Payment_Method_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `Product_Image_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `Product_Review_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `Sale_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_Info_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `Wish_List_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Cart_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`),
  ADD CONSTRAINT `Cart_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `Inventory_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`);

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `Payment_Method_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Product_Category_Id_Fk` FOREIGN KEY (`Category_Id`) REFERENCES `category` (`Category_id`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `Product_Review_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`),
  ADD CONSTRAINT `Product_Review_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `Sale_Payement_Method_Id_Fk` FOREIGN KEY (`Payement_Method_Id`) REFERENCES `payment_method` (`Payment_Method_Id`),
  ADD CONSTRAINT `Sale_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `Wish_List_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`),
  ADD CONSTRAINT `Wish_List_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
