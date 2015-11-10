-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2015 at 03:29 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Name`) VALUES
(4, 'Computers'),
(7, 'Graphics Cards'),
(6, 'Laptops'),
(8, 'Processors');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_Id`, `Product_Id`, `Quantity`) VALUES
(1, 18, 5),
(2, 20, 20),
(5, 34, 7),
(6, 35, 4),
(8, 37, 12),
(9, 38, 4);

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
  `Date_Added` datetime NOT NULL,
  `Featured` tinyint(1) NOT NULL,
  `Category_Id` int(10) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Name`, `Description`, `Details`, `Date_Added`, `Featured`, `Category_Id`, `Price`) VALUES
(18, 'Intel 4590 4th Gen Processor', 'Compatible with Z87 and Z97 motherboards. Z87 motherboard users may need to apply a BIOS update for compatibility. Not compatible with Intel Motherboards.<br />\r\nLGA 1150<br />\r\nIntel Rapid Storage Technology<br />\r\nQuick Sync Video enabling faster video conversion<br />\r\nIntel Device Protection with Boot Guard<br />\r\nIntel IPT with PKI<br />\r\nIntel Turbo boost technology', 'Summary:<br />\r\nProcessor	3.3 GHz Intel Core i5<br />\r\nOther Technical Details:<br />\r\nBrand Name	Intel<br />\r\nItem model number	BX80646I54590<br />\r\nItem Weight	13.3 ounces<br />\r\nItem Dimensions L x W x H	4.60 x 3.40 x 4.60 inches<br />\r\nProcessor Brand	Intel<br />\r\nProcessor Count	4<br />\r\nComputer Memory Type	DDR3 SDRAM', '2015-11-06 12:22:31', 0, 8, '198.99'),
(20, 'Asus ROG Laptop', 'Intel Core i7-4720HQ 2.6 GHz Processor<br />\r\n16 GB DDR3 RAM; NVIDIA GeForce GTX 960M<br />\r\n1TB HDD Storage; DL DVDÂ±RW/CD-RW<br />\r\n15.6 inches 1920*1080 pixels LED-lit Screen<br />\r\nWindows 8.1 Operating System; Red/Black Chassis', 'DETAILS<br />\r\nScreen Size	15.6 inches<br />\r\nMax Screen Resolution	1920*1080 pixels<br />\r\nProcessor	2.6 GHz Core i7-4720HQ<br />\r\nRAM	16 GB DDR3<br />\r\nHard Drive	1024 GB<br />\r\nGraphics Coprocessor	NVIDIA GTX960M 2G GDDR5<br />\r\nWireless Type	802.11 a/g/n<br />\r\nNumber of USB 3.0 Ports	3<br />\r\nExpand<br />\r\nOther Technical Details<br />\r\nBrand Name	Asus<br />\r\nSeries	Asus GL551JW<br />\r\nItem model number	GL551JW-DS71<br />\r\nOperating System	Windows 8.1<br />\r\nItem Weight	6 pounds<br />\r\nItem Dimensions L x W x H	17.40 x 3.80 x 12.80 inches<br />\r\nProcessor Brand	Intel<br />\r\nProcessor Count	4<br />\r\nHard Drive Rotational Speed	7200 RPM<br />\r\nOptical Drive Type	DL DVDÂ±RW/CD-RW<br />\r\nBatteries:	1 Lithium ion batteries required. (included)', '2015-11-06 12:33:15', 1, 6, '1499.99'),
(34, 'Intel Core i7-4790K Processor ', 'Supports LGA 1150 socket<br />\r\nIntel Rapid Storage Technology<br />\r\nCompatible with z97 boards only<br />\r\nProcessor with Unlocked Clock Multiplier<br />\r\nQuick Sync Video enabling faster video conversion', '4-Core, 4GHz PerformanceNew Unlocked 4th Gen Intel Core Processors deliver 4 cores of up to 4 GHz base frequency, providing blazing-fast computing performance for the most demanding usersBuilt for EnthusiastsMulti-tasking compute performance with 4 cores and up to 8 threads to rock the latest games and rip through multimedia creationRobust Overclocking CapabilitiesFully unlocked processor cores with independent base clock tuning improves ability to achieve high core, graphics and memory frequencies without impacting other system components', '2015-11-07 04:48:58', 0, 8, '429.99'),
(35, 'Microtel ComputerÂ® AM8075 PC Gaming Computer', 'Intel Core i7-4790K Haswell Quad-Core 4.0GHz LGA 1150 Desktop Processor<br />\r\n16GB 1600Mhz DDR3 RAM<br />\r\n2TB Hard Drive 7200RPM<br />\r\nNVIDIA Geforce 980 GTX 4GB GDDR5 Graphic<br />\r\nWindows 8.1 64-Bit', 'Intel Core i7-4790K Haswell Quad-Core 4.0GHz LGA 1150 Desktop Processor<br />\r\n<br />\r\nWindows 8.1 Full Version CD â€“ 64 bit<br />\r\n<br />\r\n16 GB 1600Mhz DDR3 Memory<br />\r\n<br />\r\n2TB Hard Drive 7200RPM<br />\r\n<br />\r\n24X DVDRW<br />\r\n<br />\r\nNvidia Geforce 980 GTX 4GB GDDR5 Video<br />\r\n<br />\r\n10/100/1000 Network LAN<br />\r\n<br />\r\n6-channel 3D Premium Surround Sound<br />\r\n<br />\r\nLogitech USB Keyboard<br />\r\n<br />\r\nLogitech USB Optical Mouse w/wheel<br />\r\n<br />\r\nAudio Port (Line-in, Line-out, Mic-in)<br />\r\n<br />\r\nAdditional software includes OpenOffice Suite for word processing, spreadsheet calculations, creating presentations, drawing and image processing. OpenOffice Suite is compatible with most Microsoft Word, Excel & PowerPoint documents<br />\r\n<br />\r\nCustomer Service Toll Free 888-508-8898', '2015-11-08 07:34:01', 0, 4, '4999.99'),
(37, 'EVGA GeForce GTX 980 Ti ACX 2.0+ Graphics Card (06G-P4-4991-KR)', 'NVIDIA GTX 980 Ti, 2816 CUDA Cores<br />\r\n1000 MHz Base Clock, 1076 MHz Boost Clock, 176GT/s Texture Fill Rate<br />\r\n6144 MB Memory, 384 bit GDDR5 , 7010 MHz (effective), 336.5 GB/s Memory Bandwidth<br />\r\nPCI-E 3.0 16x - DVI-I, DisplayPort, DisplayPort, DisplayPort, HDMI<br />\r\nEVGA &/ OneDealoutet Warranty', 'introducing The Evga Geforce Gtx 980 Ti. Accelerated By The Groundbreaking Nvidia Maxwell Architecture, Gtx 980 Ti Delivers An Unbeatable 4k And Virtual Reality Experience. With 2816 Nvidia Cuda Cores And 6gb Of Gddr5 Memory, It Has The Horsepower To Drive Whatever Comes Next. In Fact, The Evga Geforce Gtx 980 Ti Provides 3x The Performance And 3x The Memory Of Previous-generation Cards. You Can Now Take On Even The Most Challenging Games At High Settings For A Smooth, Ultra High-definition, 4k Experience.this Card Also Features Evga Acx 2.0+ Cooling Technology. Evga Acx 2.0+ Brings New Features To The Award Winning Evga Acx 2.0 Cooling Technology. A Memory Mosfet Cooling Plate (mmcp) Reduces Mosfet Temperatures Up To 13%, And Optimized Straight Heat Pipes (shp) Reduce Gpu Temperature By An Additional 5c. Acx 2.0+ Coolers Also Feature Optimized Swept Fan Blades, Double Ball Bearings And An Extreme Low Power Motor, Delivering More Air Flow With Less Power, Unlocking Additional Power For The Gpu.', '2015-11-08 07:40:58', 1, 7, '974.06'),
(38, 'AMD FD6300WMHKBOX FX-6300 6-Core Processor Black Edition', ' ', 'Processor / Product Type:Processor<br />\r\nProcessor / Socket Type:Socket AM3+<br />\r\nProcessor / Number:FX-6300<br />\r\nProcessor / Multi-Core Technology:6-Core<br />\r\nCache Memory Type:L3 cache', '2015-11-09 06:37:26', 0, 8, '138.12');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `Product_Image_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Image_Url` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`Product_Image_Id`, `Product_Id`, `Image_Url`) VALUES
(9, 18, 'product_images/6da4548d2c8856243dc7c557bf193030f75a5c40.jpg'),
(10, 18, 'product_images/2cab887b9a9c4e76ffd6baa5ee2eead95545c5b6.jpg'),
(11, 18, 'product_images/7ecf351bca700ece09f551f2cd62e48704680a43.jpg'),
(12, 20, 'product_images/206b6ca2e5a20d0fb205548e9cccb35d0a70d8a6.jpg'),
(13, 20, 'product_images/f69df7f5c162fcb077d5071da3bfd0a74f449c84.jpg'),
(14, 20, 'product_images/32d16dde2c7e2d30f7f0959f60f73144c4ae8d8e.jpg'),
(15, 34, 'product_images/6ba396e493ff0469272aeab74416ee3b6034a368.jpg'),
(16, 35, 'product_images/ac5f12b510a4f08a22c18bb9601cf14c5ab12a94.jpg'),
(17, 37, 'product_images/29ae857517ee64de5266e4c83e13e2f575b7420c.jpg'),
(18, 37, 'product_images/96f355aa10f39237a66ee6bee09d97fee8edb423.jpg'),
(19, 37, 'product_images/c2e56d25a87dcbe0cf18508b5e14fbd501555e3a.jpg'),
(20, 37, 'product_images/d0175f429aa830321599933e8c767dc0dfd8a7e6.jpg'),
(21, 38, 'product_images/cb8f3c3ff546ee04c106dabe7f90d46f7bfefcc2.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Username`, `Password`, `User_Type`, `Grant_Admin`) VALUES
(3, 'Jonguy', '$2y$11$6dIoC4yHj56oiqWS0CjQouIm1z1W9UgYhwMW2W2mVi0kcYZu3kRIW', 'Admin', 1),
(4, 'Jonguy64', '$2y$11$BMRc3xw6uSZhjencfNBtYuR.rivHatr/G5mXzQbXYvZGL3xAqOPkC', 'Customer', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`User_Info_Id`, `User_Id`, `First_Name`, `Last_Name`, `Email`, `Birthdate`, `Address`, `City`, `State_Province`, `Country`, `Postal_Code_Zip`, `Phone_Number`) VALUES
(2, 3, 'Jonathan', 'Del Corpo', 'nintendo_jon64@hotmail.com', '1996-02-06', '11844 Filion', 'Montreal', 'Quebec', 'Canada', 'H4J1T3', '5145025259'),
(3, 4, 'Marcus', 'Bro', 'jonguy.64@hotmail.com', '1990-01-01', '1234 Whatever', 'Montreal', 'Quebec', 'Canada', 'X0E 0N0', '5145025259');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `Wish_List_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`Wish_List_Id`, `User_Id`, `Product_Id`) VALUES
(3, 3, 34),
(4, 3, 35),
(5, 3, 35),
(6, 3, 37);

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
  ADD PRIMARY KEY (`Category_id`),
  ADD UNIQUE KEY `Name` (`Name`);

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
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Username` (`Username`);

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
  MODIFY `Category_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `Faq_Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inventory_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `Product_Image_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
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
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_Info_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `Wish_List_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
  ADD CONSTRAINT `Product_Category_Id_Fk` FOREIGN KEY (`Category_Id`) REFERENCES `category` (`Category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
