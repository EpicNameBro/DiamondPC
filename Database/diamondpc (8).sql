-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2015 at 12:57 AM
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
  `User_Id` int(10) DEFAULT NULL,
  `Anon_Id` varchar(30) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_Id`, `User_Id`, `Anon_Id`, `Product_Id`, `Quantity`) VALUES
(12, NULL, '5655e45851b9e', 39, 1),
(13, NULL, '5655e45851b9e', 38, 1),
(14, NULL, '5655e45851b9e', 37, 1),
(15, 3, '', 55, 1),
(16, 3, '', 53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `Category_id` int(4) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Name`) VALUES
(4, 'Computers'),
(9, 'Game Consoles'),
(7, 'Graphics Cards'),
(6, 'Laptops'),
(10, 'Monitors'),
(8, 'Processors'),
(11, 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE IF NOT EXISTS `contact_message` (
  `contact_message_id` int(7) NOT NULL,
  `contact_name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `viewed` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`contact_message_id`, `contact_name`, `email`, `subject`, `message`, `time_posted`, `viewed`) VALUES
(1, 'Test', 'test@hotmail.com', '', ' This is a test.', '2015-11-19 01:49:05', 0),
(2, 'Test2', 'test2@hotmail.com', '', 'This is the second test with date. ', '2015-11-19 02:37:52', 0),
(3, 'Test3', 'test3@hotmail.com', '', 'This is the third test. ', '2015-11-19 02:52:15', 0),
(4, 'Whatever', 'whatever@hotmail.com', '', ' This is whatever.', '2015-11-19 15:43:57', 0),
(5, 'Test4', 'test4@hotmail.com', 'Test subject', ' This is a test with subject.', '2015-11-19 16:49:32', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_Id`, `Product_Id`, `Quantity`) VALUES
(1, 18, 5),
(2, 20, 20),
(5, 34, 7),
(6, 35, 4),
(8, 37, 12),
(9, 38, 4),
(10, 39, 14),
(16, 45, 4),
(17, 46, 5),
(18, 47, 3),
(19, 48, 7),
(20, 49, 2),
(21, 50, 9),
(22, 51, 11),
(23, 52, 10),
(24, 53, 4),
(25, 54, 9),
(26, 55, 7),
(27, 56, 8),
(28, 57, 11),
(29, 58, 15),
(30, 59, 3),
(31, 60, 9),
(32, 61, 6),
(33, 62, 4),
(34, 63, 6),
(35, 64, 10);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `Order_Detail_Id` int(10) NOT NULL,
  `Sale_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Quantity` int(5) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Order_Detail_Id`, `Sale_Id`, `Product_Id`, `Order_Date`, `Quantity`, `Price`) VALUES
(9, 7, 37, '2015-11-18 12:05:54', 1, '974'),
(10, 7, 45, '2015-11-18 12:05:54', 1, '1491'),
(11, 8, 39, '2015-11-18 12:06:32', 1, '577'),
(12, 9, 34, '2015-11-19 15:24:24', 1, '430');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `Payment_Method_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Card_Type` varchar(50) NOT NULL,
  `Card_Number` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`Payment_Method_Id`, `User_Id`, `Card_Type`, `Card_Number`) VALUES
(8, 3, 'visa', '5435435'),
(9, 3, 'mastercard', '41432234'),
(10, 3, 'mastercard', '67475674575');

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Name`, `Description`, `Details`, `Date_Added`, `Featured`, `Category_Id`, `Price`) VALUES
(18, 'Intel 4590 4th Gen Processor', '														Compatible with Z87 and Z97 motherboards. Z87 motherboard users may need to apply a BIOS update for compatibility. Not compatible with Intel Motherboards.<br />\r\nLGA 1150<br />\r\nIntel Rapid Storage Technology<br />\r\nQuick Sync Video enabling faster video conversion<br />\r\nIntel Device Protection with Boot Guard<br />\r\nIntel IPT with PKI<br />\r\nIntel Turbo boost technology												', '														Summary:<br />\r\nProcessor	3.3 GHz Intel Core i5<br />\r\nOther Technical Details:<br />\r\nBrand Name	Intel<br />\r\nItem model number	BX80646I54590<br />\r\nItem Weight	13.3 ounces<br />\r\nItem Dimensions L x W x H	4.60 x 3.40 x 4.60 inches<br />\r\nProcessor Brand	Intel<br />\r\nProcessor Count	4<br />\r\nComputer Memory Type	DDR3 SDRAM												', '2015-11-06 12:22:31', 0, 8, '198.99'),
(20, 'Asus ROG Laptop', '							Intel Core i7-4720HQ 2.6 GHz Processor<br />\r\n16 GB DDR3 RAM; NVIDIA GeForce GTX 960M<br />\r\n1TB HDD Storage; DL DVDÂ±RW/CD-RW<br />\r\n15.6 inches 1920*1080 pixels LED-lit Screen<br />\r\nWindows 8.1 Operating System; Red/Black Chassis						', '							DETAILS<br />\r\nScreen Size	15.6 inches<br />\r\nMax Screen Resolution	1920*1080 pixels<br />\r\nProcessor	2.6 GHz Core i7-4720HQ<br />\r\nRAM	16 GB DDR3<br />\r\nHard Drive	1024 GB<br />\r\nGraphics Coprocessor	NVIDIA GTX960M 2G GDDR5<br />\r\nWireless Type	802.11 a/g/n<br />\r\nNumber of USB 3.0 Ports	3<br />\r\nExpand<br />\r\nOther Technical Details<br />\r\nBrand Name	Asus<br />\r\nSeries	Asus GL551JW<br />\r\nItem model number	GL551JW-DS71<br />\r\nOperating System	Windows 8.1<br />\r\nItem Weight	6 pounds<br />\r\nItem Dimensions L x W x H	17.40 x 3.80 x 12.80 inches<br />\r\nProcessor Brand	Intel<br />\r\nProcessor Count	4<br />\r\nHard Drive Rotational Speed	7200 RPM<br />\r\nOptical Drive Type	DL DVDÂ±RW/CD-RW<br />\r\nBatteries:	1 Lithium ion batteries required. (included)						', '2015-11-06 12:33:15', 1, 6, '1499.99'),
(34, 'Intel Core i7-4790K Processor ', '														Supports LGA 1150 socket<br />\r\nIntel Rapid Storage Technology<br />\r\nCompatible with z97 boards only<br />\r\nProcessor with Unlocked Clock Multiplier<br />\r\nQuick Sync Video enabling faster video conversion												', '														4-Core, 4GHz PerformanceNew Unlocked 4th Gen Intel Core Processors deliver 4 cores of up to 4 GHz base frequency, providing blazing-fast computing performance for the most demanding usersBuilt for EnthusiastsMulti-tasking compute performance with 4 cores and up to 8 threads to rock the latest games and rip through multimedia creationRobust Overclocking CapabilitiesFully unlocked processor cores with independent base clock tuning improves ability to achieve high core, graphics and memory frequencies without impacting other system components												', '2015-11-07 04:48:58', 1, 8, '429.99'),
(35, 'Microtel ComputerÂ® AM8075 PC Gaming Computer', 'Intel Core i7-4790K Haswell Quad-Core 4.0GHz LGA 1150 Desktop Processor<br />\r\n16GB 1600Mhz DDR3 RAM<br />\r\n2TB Hard Drive 7200RPM<br />\r\nNVIDIA Geforce 980 GTX 4GB GDDR5 Graphic<br />\r\nWindows 8.1 64-Bit', 'Intel Core i7-4790K Haswell Quad-Core 4.0GHz LGA 1150 Desktop Processor<br />\r\n<br />\r\nWindows 8.1 Full Version CD â€“ 64 bit<br />\r\n<br />\r\n16 GB 1600Mhz DDR3 Memory<br />\r\n<br />\r\n2TB Hard Drive 7200RPM<br />\r\n<br />\r\n24X DVDRW<br />\r\n<br />\r\nNvidia Geforce 980 GTX 4GB GDDR5 Video<br />\r\n<br />\r\n10/100/1000 Network LAN<br />\r\n<br />\r\n6-channel 3D Premium Surround Sound<br />\r\n<br />\r\nLogitech USB Keyboard<br />\r\n<br />\r\nLogitech USB Optical Mouse w/wheel<br />\r\n<br />\r\nAudio Port (Line-in, Line-out, Mic-in)<br />\r\n<br />\r\nAdditional software includes OpenOffice Suite for word processing, spreadsheet calculations, creating presentations, drawing and image processing. OpenOffice Suite is compatible with most Microsoft Word, Excel & PowerPoint documents<br />\r\n<br />\r\nCustomer Service Toll Free 888-508-8898', '2015-11-08 07:34:01', 0, 4, '2999.99'),
(37, 'EVGA GeForce GTX 980 Ti ACX 2.0+ Graphics Card (06G-P4-4991-KR)', '																																																																																																		NVIDIA GTX 980 Ti, 2816 CUDA Cores<br />\r\n1000 MHz Base Clock, 1076 MHz Boost Clock, 176GT/s Texture Fill Rate<br />\r\n6144 MB Memory, 384 bit GDDR5 , 7010 MHz (effective), 336.5 GB/s Memory Bandwidth<br />\r\nPCI-E 3.0 16x - DVI-I, DisplayPort, DisplayPort, DisplayPort, HDMI<br />\r\nEVGA &/ OneDealoutet Warranty																																																																																				', '																																																																																																		introducing The Evga Geforce Gtx 980 Ti. Accelerated By The Groundbreaking Nvidia Maxwell Architecture, Gtx 980 Ti Delivers An Unbeatable 4k And Virtual Reality Experience. With 2816 Nvidia Cuda Cores And 6gb Of Gddr5 Memory, It Has The Horsepower To Drive Whatever Comes Next. In Fact, The Evga Geforce Gtx 980 Ti Provides 3x The Performance And 3x The Memory Of Previous-generation Cards. You Can Now Take On Even The Most Challenging Games At High Settings For A Smooth, Ultra High-definition, 4k Experience.this Card Also Features Evga Acx 2.0+ Cooling Technology. Evga Acx 2.0+ Brings New Features To The Award Winning Evga Acx 2.0 Cooling Technology. A Memory Mosfet Cooling Plate (mmcp) Reduces Mosfet Temperatures Up To 13%, And Optimized Straight Heat Pipes (shp) Reduce Gpu Temperature By An Additional 5c. Acx 2.0+ Coolers Also Feature Optimized Swept Fan Blades, Double Ball Bearings And An Extreme Low Power Motor, Delivering More Air Flow With Less Power, Unlocking Additional Power For The Gpu.																																																																																				', '2015-11-08 07:40:58', 1, 7, '974.06'),
(38, 'AMD FD6300WMHKBOX FX-6300 6-Core Processor Black Edition', ' ', 'Processor / Product Type:Processor<br />\r\nProcessor / Socket Type:Socket AM3+<br />\r\nProcessor / Number:FX-6300<br />\r\nProcessor / Multi-Core Technology:6-Core<br />\r\nCache Memory Type:L3 cache', '2015-11-09 06:37:26', 0, 8, '249.99'),
(39, 'PS4 500GB HW Bundle Uncharted: The Nathan Drake Collection', '														Play Online With Your Friends, get free games, and exclusive discounts with PlayStationÂ®Plus (sold separately).<br />\r\nStream Music, Movies, Sports, and Shows on Netflix, Amazon, and more. Subscription fees may apply.<br />\r\nEnhance Your Games with PlayStationÂ® Headsets (sold separately) featuring a custom Audio Modes for select titles												', '														Play through three acclaimed adventures with the UNCHARTED: The Nathan Drake Collection PS4 Bundle. Experience Drakeâ€™s epic story in the single player campaigns for UNCHARTED: Drakeâ€™s Fortune, UNCHARTED 2: Among Thieves, and UNCHARTED 3: Drakeâ€™s Deception.												', '2015-11-14 01:21:09', 0, 9, '576.99'),
(45, 'EVGA GeForce GTX TITAN X Graphic Card', '																												Evga Geforce Gtx Titan X Graphic Card - 1.13 Ghz Core - 1.22 Ghz Boost Clock - 12 Gb Gddr5 Sdram - Pci Express 3.0 X16 - Dual Slot Space Required - 7010 Mhz Memory Clock - 4096 X 2160 - Sli - G-sync - Fan Cooler - Directx 12, Opengl 4.4, Opencl - Hdmi - Displayport - Dvi - 3 X Displayport Outputs - 1 X Hdmi Outputs - 1 X Dvi Outputs - 4 X Monitors Supported - Yes																								', '																												the Evga Geforce Gtx Titan X Combines The Technologies And Performance Of The New Nvidia Maxwell Architecture In The Fastest And Most Advanced Graphics Card On The Planet.this Incredible Gpu Delivers Unrivaled Graphics, Acoustic, Thermal And Power-efficient Performance. The Most Demanding Enthusiast Can Now Experience Extreme Resolutions Up To 4k-and Beyond.enjoy Hyper-realistic, Real-time Lighting With Advanced Nvidia Vxgi, As Well As Nvidia G-sync Display Technology For Smooth, Tear-free Gaming. Plus, You Get Dsr Technology That Delivers A Brilliant 4k Experience, Even On A 1080p Display.																								', '2015-11-17 07:35:22', 0, 7, '1491.12'),
(46, 'BenQ 24-inch LED 1ms Gaming Console Monitor w/ 2x HDMI (RL2455HM)', '								Product Dimensions: 18.8 x 57.9 x 43.4 cm ; 4.1 Kg<br />\r\nShipping Weight: 6 Kg<br />\r\nItem model number: RL2455HM<br />\r\nASIN: B007HSKSMI				', '								Unlock the Power, Unleash the Battle<br />\r\n<br />\r\nThe RL2455HM is a gaming monitor suited for console game play. This 24-inch LED monitor is packed with the latest features: the Black eQualizer, RTS Mode, Display Mode, Smart Scaling, 1ms GTG, HDMI, and 12M:1 dynamic contrast ratio.<br />\r\n<br />\r\nBenQ RL2455HM Official MLG Monitor 24-Inch Screen LED-lit Monitor<br />\r\nBlack eQualizer technology offers unprecedented levels of control and visibility. View larger<br />\r\n<br />\r\nBenQ RL2455HM Official MLG Monitor 24-Inch Screen LED-lit Monitor<br />\r\nFast-moving action will be rendered smoothly without smearing or ghosting. View larger<br />\r\nThe Black eQualizer Gives You Total Visibility<br />\r\n<br />\r\nPoor visibility in dark scenes can cost even the most skillful gamers their game. The Black eQualizer color engine technology is designed to offer an unprecedented level of control and visibility. Dark scenes are brightened without over-exposing the bright areas to preserve vital details, enabling gamers to spot their enemies easily in critical combat and react quickly in any situation.<br />\r\n<br />\r\nBenQ RL2455HM Official MLG Monitor 24-Inch Screen LED-lit Monitor<br />\r\nChange your monitor view to simulate any in-game experience. View larger<br />\r\nCustomize Your Individual Viewing Preference<br />\r\n<br />\r\nThe Display Mode and Smart Scaling features allow you to change the monitor view to suit your liking and to simulate any in-game experience. Interchange instantly between four different screen sizes from 17", 19" and 19"W, 21.5"W, 22"W to 23"W using the Display Mode. Or take advantage of the Smart Scaling feature and enjoy the flexibility to freely scale the screen content to any custom size. You can even use the two features together to get the best possible view for any application or game.<br />\r\n<br />\r\nFast 1ms GTG Response Time<br />\r\n<br />\r\nA fast response time of 1ms GTG means speed without the smear for an enhanced gaming experience. Fast-moving action and dramatic transitions will be rendered smoothly without the annoying effects of smearing or ghosting. Control your gaming destiny and don''t leave it in the hands of slow display.<br />\r\n<br />\r\nWindows 8 Compatible for Versatility<br />\r\n<br />\r\nThe RL2455HM has passed Windows 8 certification and are fully compatible with Windows 8 color systems. Plug in the RL2455HM to your computer, and Windows 8 will recognize it instantly, making setup and connection effortless.<br />\r\n<br />\r\nBenQ RL2455HM Official MLG Monitor 24-Inch Screen LED-lit Monitor <br />\r\nYour Ultimate Weapon<br />\r\n<br />\r\nBenQ professional gaming monitors are the unrivaled victor of world renowned design awards. In addition, BenQ professional gaming monitors are used by prominent gamers to perfect their gameplay. The BenQ RL Series is proud to be the official gaming monitor in the Intel Extreme Masters season 2011/2012 and Major League Gaming 2012 Season.				', '2015-11-26 01:14:23', 0, 10, '220.99'),
(47, 'AOC i2367Fh 23-Inch IPS Frameless LED-Lit Monitor, Full HD 1080p, 5ms, 50M:1 DCR, VGA/ HDMI, Speakers, Multi Purpose Stand', 'Product Dimensions: 53.1 x 11.9 x 39.4 cm ; 3.8 Kg<br />\r\nShipping Weight: 5 Kg<br />\r\nItem model number: i2367Fh<br />\r\nASIN: B009V8F700', '23" Ultra-Narrow Bezel LED Monitor With IPS Panel Offers Better Picture Quality, Color Accuracy and Extended Viewing Angles<br />\r\n<br />\r\nThe i2367Fh monitor is an ultra slim 23" monitor at only 12mm thick and the display''s ultra-narrow bezel measures just 2mm, for a borderless appearance that is ideally suited for use in dual monitor or multiple monitor setups. This sleek display features an IPS (In-Plane Switching) panel, a superior type of screen that offers consistent image appearance, higher definition, better color accuracy and greater light transmission from all viewing positions.<br />\r\n<br />\r\n<br />\r\n<br />\r\nAOC i2367Fh 23-Inch Class UltraSlim Widescreen IPS LED Monitor<br />\r\nKey Features<br />\r\n<br />\r\n2mm ultra-narrow bezel for a virtually borderless appearance<br />\r\nUltra-thin IPS Panel for consistent image appearance from all viewing position<br />\r\nNon-reflective matte anti-glare coating that won''t leave smudges or fingerprints on the screen<br />\r\nFull HD display with 1920 x 1080 maximum resolution<br />\r\n5ms response time for smooth motion playback<br />\r\nMultimedia connectors with VGA and 2 HDMI inputs<br />\r\nDetachable multi-purpose stand for standard or photo frame applications<br />\r\n<br />\r\n<br />\r\nAOC i2367Fh 23-Inch Class UltraSlim Widescreen IPS LED Monitor<br />\r\nSide view of the ultra-slim and lightweight design of the e2251Fwu.<br />\r\nAttractive Ultra-Slim Design<br />\r\n<br />\r\nAOC''s i2367Fh has an sleek, ultra-slim design with an appearance of no top and side bezels. The screen itself has a matte anti-glare coating that won''t leave fingerprints or smudges. The ultra-thin IPS Panel allows you to view your spreadsheets or weekend movies from virtually any angle without compromising color uniformity. The buttons are located on the lower-right of the back panel and easily accessible.<br />\r\n<br />\r\nDesigned to Meet Your Needs<br />\r\n<br />\r\nThe i2367Fh features a 23" viewable screen and a 1920 x 1080 widescreen full HD, boasting 50,000,000:1 dynamic contrast ratio and response time of 5ms. You can play games or watch movies without seeing any drag. With the detachable stand removed, the monitor can be used for photo frame applications as well.<br />\r\n<br />\r\nStay Connected<br />\r\n<br />\r\nThe i2367Fh comes with a VGA and two HDMI inputs for you to connect to your devices. HDMI connects high-definition audio and video in one single cord to other devices, such as video game consoles, external monitors, and compatible TVs.<br />\r\n<br />\r\nUser-Friendly, All in One<br />\r\n<br />\r\nThe i2367Fh is both Energy-Star and EPEAT Silver Certified for its green packaging and production. The display''s LED backlight panel requires 50% less energy for low power consumption and is completely free of toxic Mercury. The display is also equipped with AOC''s e-Saver software that lets the user preset power conservation modes for the display when the PC is not in use. The monitor also has user friendly OSD menu, Power Saving Mode, and Off Timer.<br />\r\n<br />\r\nAdditionally, the monitor includes the iMenu option, which allows the user to change settings using only the keyboard and mouse; and Screen+ software that divides the screen into four self-contained work areas for improved productivity.<br />\r\n<br />\r\nTech Specifications<br />\r\n<br />\r\nPanel: LED Backlit - LED AH-IPS Panel<br />\r\nViewable Image Size: 23"<br />\r\nAspect Ratio: 16:9<br />\r\nBrightness: 250 cd/m2<br />\r\nContrast Ratio: 50,000,000:1<br />\r\nResponse Time: 5ms<br />\r\nViewable Angle: 178 degrees horizontal, 178 degrees vertical<br />\r\nOptimum Resolution: 1920 x 1080 @60Hz<br />\r\nColors Supported: 16.7 Million<br />\r\nConnectors: VGA, HDMI with HDCP (2x)<br />\r\nWindows 8 Compatible: Yes', '2015-11-26 01:23:34', 0, 10, '230.99'),
(48, 'Hewlett Packard HP Pavilion 22xw 22-Inch IPS Led Backlit Monitor-J7Y67AA#ABA', 'Product Dimensions: 49.9 x 15.1 x 38.4 cm ; 3.8 Kg<br />\r\nShipping Weight: 5 Kg<br />\r\nItem model number: J7Y67AA#ABA<br />\r\nASIN: B00TJQX9D6', 'Hp pavilion 22xw 21.5-in IPS led backlit monitor.', '2015-11-26 01:26:11', 0, 10, '199.99'),
(49, 'LG 34UM95-P 34-Inch Screen LED-Lit LCD Monitors', '							Product Dimensions: 83.1 x 17.3 x 47 cm ; 8 Kg<br />\r\nShipping Weight: 11 Kg<br />\r\nItem model number: 34UM95<br />\r\nASIN: B00JR6GCZA						', '							The 21:9 aspect ratio combined with the 4 Screen Split feature lets you view 4 different documents at the same time minimizing the need to flip back and forth between multiple documents. Color representation is also very accurate with sRGB 99% making this the ideal monitor for professionals like photographers and graphic designers. But, the UM95 isn''t all work and no play. Because this model has Ultra Wide Quad Definition (UQHD) the picture quality combined with the 21:9 wide screen makes watching movies or playing video games an immersive experience. Thunderboltaâ€ž supports high resolution displays and high performance data devices through a single port allowing you to take advantage of transfer speeds up to 20Gps and expand computing capabilities. The UltraWide 21:9 aspect ratio makes movies and games more immersive than ever. Need to get some work done, too? All of that UltraWide real estate makes it easy to view multiple documents at the same time, so you don''t need to flip back and forth between them. Graphic designers will surely appreciate the many features of LG''s Mac-compatible UltraWide monitor. The 21:9 widescreen and 4-Screen Split will simplify working with multiple graphics windows.						', '2015-11-26 01:28:14', 0, 10, '1000.50'),
(50, 'Seagate Expansion 5TB Desktop External Hard Drive USB 3.0 (STEB5000100)', 'Technical Details<br />\r\nExpand<br />\r\nSummary<br />\r\nHard Drive	5 TB Desktop<br />\r\n<br />\r\nOther Technical Details<br />\r\nBrand Name	Seagate<br />\r\nItem model number	STEB5000100<br />\r\nItem Weight	2.1 pounds<br />\r\nItem Dimensions L x W x H	7.07 x 4.65 x 1.48 inches<br />\r\nColor	Black', 'The Seagate Expansion desktop drive provides extra storage for your ever-growing collection of files. Instantly add space for more files, consolidate all of your files to a single location, or free up space on your computer''s internal drive to help improve performance. Setup is straightforward; simply plug in the included power supply and USB cable, and you are ready to go. It is automatically recognized by the Windows operating system, so there is no software to install and nothing to configure. Saving files is easy too-just drag-and-drop. Take advantage of the fast data transfer speeds with the USB 3.0 interface by connecting to a SuperSpeed USB 3.0 port. USB 3.0 is backwards compatible with USB 2.0 for additional system compatibility. System Requirements Windows 7, Windows Vista, SuperSpeed USB 3.0 port (required for USB 3.0 transfer speeds or backwards compatible with USB 2.0 ports at USB 2.0 transfer speeds, compatibility may vary depending on the user''s hardware configuration and operating system). Box Contents: Seagate Expansion Drive, 4-foot (120cm) USB 3.0 Cable, Power adapter and Quick Start Guide.', '2015-11-26 01:41:24', 0, 11, '150.45'),
(51, 'Seagate Backup Plus Slim 2TB Portable External Hard Drive with 200GB of Cloud Storage & Mobile Device Backup USB 3.0 (STDR200010', 'Seagate Backup Plus Portable STDR2000100 2 TB External Hard Drive STDR2000100 Hard Drives - External', 'Technical Details<br />\r\nExpand<br />\r\nSummary<br />\r\nRAM	1 TB<br />\r\nHard Drive	2 TB Portable<br />\r\n<br />\r\nOther Technical Details<br />\r\nBrand Name	Seagate<br />\r\nItem model number	STDR2000100<br />\r\nHardware Platform	PC<br />\r\nOperating System	N/A<br />\r\nItem Weight	4.8 ounces<br />\r\nItem Dimensions L x W x H	4.47 x 2.99 x 0.48 inches<br />\r\nColor	Black<br />\r\nHard Drive Interface	USB 2.0', '2015-11-26 01:44:16', 0, 11, '90.00'),
(52, 'Seagate Backup Plus 8TB Desktop External Hard Drive with 200GB of Cloud Storage & Mobile Device Backup USB 3.0 (STDT8000100)', 'Technical Details<br />\r\nExpand<br />\r\nSummary<br />\r\nHard Drive	8 TB External<br />\r\n<br />\r\nOther Technical Details<br />\r\nBrand Name	Seagate<br />\r\nItem model number	STDT8000100<br />\r\nItem Weight	1.9 pounds<br />\r\nItem Dimensions L x W x H	7.06 x 4.65 x 1.63 inches<br />\r\nColor	Black', 'A big digital life needs big backup. Seagate Backup Plus desktop drive has the massive capacity you need-and more. Protect a lifetime of memories with easy, flexible, built-in backup options, even for your iOS and Android devices. Automatically save photos from your social networks. Share files easily between Windows and Mac computers. It''s the simple, one-click way to protect and share your entire digital life on your computers and mobile devices-without getting in the way of the rest of your life.', '2015-11-26 01:46:25', 0, 11, '250.60'),
(53, 'Seagate Game Drive for Xbox 2TB Green (STEA2000403)', '							Technical Details<br />\r\nExpand<br />\r\nSummary<br />\r\nHard Drive	2 TB Portable<br />\r\n<br />\r\nOther Technical Details<br />\r\nBrand Name	Seagate<br />\r\nItem model number	STEA2000403<br />\r\nHardware Platform	Microsoft Xbox One<br />\r\nItem Dimensions L x W x H	4.61 x 3.15 x 0.58 inches<br />\r\nColor	Green						', '							Nothing says "Game Over" for the Xbox One experience like an overloaded hard drive. Boost your console''s storage capacity with the Seagate Game Drive for Xbox, the only external drive designed exclusively for Xbox One and Xbox 360. In a slim size that fits in your pocket, you can store your substantial game collection with tons of space left over for videos and music. With 2TB of additional storage for your Xbox One, you can save the world-or even the galaxy-and all the games that are worth keeping. Free up space on your console''s internal drive while consolidating up to 50 Xbox One games1 into a single location. Plug-and-play functionality gives you instant power up. Xbox automatically detects your drive and walks you through a hassle-free setup process that will have your drive game-ready in minutes. Unplug the Seagate Game Drive and take your entire game library to a friend''s house.2 It''s small enough to slip into your backpack and doesn''t need a separate power cord, so you can play your games but eat their snacks. Game Drive for Xbox is compatible with both Xbox One and Xbox 360, and plugs directly into any USB port in your console.						', '2015-11-26 01:48:29', 0, 11, '100.20'),
(54, 'ASUS G20AJ-US006S Desktop', 'Windows 8^NVIDIA GeForce GTX 745; 8GB DDR3^1 TB 7200 rpm Hard Drive^Intel Core i3-4150 Processor 3.5 GHz(cache)', 'G20AJ-US006S,1 Year Warranty,i3-4150,H97,8GB DDR3 1600MHz,1TB 3.5IN 7200RPM,NV GTX 745 4GB DDR3,Slim Tray DVD-RW,10/100/1000 Mbps, 802.11AC+BT 4.0,Windows 8.1,Keyboard and mouse included,Front: USB 3.0 x 2, Mic Port x 1, Earphone port x 1', '2015-11-26 01:57:36', 1, 4, '939.75'),
(55, 'NZXT Phantom 820 Full Tower Chassis with RGB Color Changing Lights and Fan Control CA-PH820-W1, White', 'From the creators of the original Phantom, NZXT is releasing the next generation and flagship Phantom 820 - a remarkable engineering feat in every aspect. For those hungry for more control of their system, one of the most notable features is a fully integrated state-of-art 4-channel digital fan controller with 15 watts per channel. NZXT is also pioneering integrated Hue lighting, an illumination system for the exterior and interior of your enclosure. You can customize to your heart''s content with an infinite possibility of colors with using integrated adjustments controls. The Phantom 820 is engineered to chill even the most demanding systems, equipped with triple 200mm and a 140mm fans. Maximize the cooling potential by mounting up to nine fans to achieve unrivalled airflow in your chassis. Push the envelope and utilize liquid cooling systems that feature a push-pull configuration with top 280/360mm and bottom 240/280mm radiators up to 60mm thickness for unmatched performance. In addition, a rugged base design lifts the enclosure above ground for display and increased airflow. The Phantom is reinvented again by following its legacy of remarkable asymmetrical and award winning design.', 'Fully equipped with one 140mm and three 200mm fans for the high airflow and low nose<br />\r\nIntegrated HUE lighting for illuminating the exterior/interior of your enclosure with option to turn on/off and allow you to customize the colors at your heart''s content<br />\r\nHigh-end water cooling solutions up to three fans for push-pull configuration: 90mm of internal top space with top 280/360mm and bottom 340/280mm radiator support for unmatched liquid cooling.<br />\r\nState-of-the-art integrated 4 channel digital fan controller with 15 watts per channel and LED indicators that progressively gets brighter on high speeds and dimmer for low settings.<br />\r\nEasily removable filters located in the top, front, side, and bottom to prevent dust from entering your rig and simple maintenance.', '2015-11-26 02:02:18', 0, 4, '279.00'),
(56, 'CybertronPC Patriot GM1293D Desktop (Black/Red)', 'System: AMD A4-5300 3.40GHz Dual-Core | AMD A55 Chipset | 8GB DDR3 | 1TB HDD | Genuine Windows 8.1 64-bit<br />\r\nGraphics: Radeon HD 7480D GPU | 24X DVDÂ±RW Dual-Layer Drive | Audio: 8 Channel | Gigabit LAN | Keyboard and Mouse with Scroll Wheel<br />\r\nExpansion Bays/ Slots Total(Free): 4(3) Ext. 5.25-Inch | 6(5) Int. 3.5-Inch / 2.5-Inch | 1(0) PCI | 1(1) PCI-E x1 | 1(1) PCI-E x16 | 2(1) DIMM 240P<br />\r\nConnectivity: 1ea. PS/ 2 Mouse/ Keyboard | 6x USB 2.0 | 1x RJ-45 Network Ethernet 10/ 100/ 1000 | 802.11b/ g/ n Wireless | Audio | 1x VGA | 1x HDMI<br />\r\nChassis: Aerocool Strike-X One Gaming Mid-Tower with 400 Watt Power Supply | 1 Year Parts and Labor Warranty | Free Lifetime Tech Support', 'The CybertronPC Patriot TGM1293D Gaming system helps you defend, conquer and rule all of your virtual worlds! Powered by an AMD A4-5300 3.40 GHz Dual-Core Processor, 8GB of DDR3 Memory and AMD Radeon HD 7480D Graphics, the CybertronPC Patriot delivers a solid gaming experience. The 1 TB Hard Drive can not only house tons of your games, it also provides storage space all the bits of your digital life, from music to movies and more. The CybertronPC Patriot Desktop PC is equipped with a DVDRW optical drive for software installation and data backups. And ultra-fast and stable network connections are something you can rely on, with the wired and wireless networking capabilities of the CybertronPC Patriot.<br />\r\n<br />\r\n3.4 GHz AMD A4-5300 Dual Core Processor<br />\r\n<br />\r\nDo more in less time with energy-efficient 2nd generation AMD A4 processor. The AMD A4-5300 Advanced Processing Unit combines a dual-core CPU and discrete-level graphics (AMD Radeon HD 7480D) on a single power-efficient chip enabling responsive performance for games, and your everyday apps. With this system, you will get excellent computer performance, smooth and crisp graphics, and content that will be no match for this AMD processor.<br />\r\n<br />\r\nWiFi<br />\r\n<br />\r\nWith the 802.11b/g/n wireless (WiFi) network adapter, you can finally get rid of those pesky cables! Delivers fast Wi-Fi speeds which means more capacity for users, broad coverage, and an excellent user experience.<br />\r\n<br />\r\n<br />\r\n<br />\r\nCybertronPC Patriot At a Glance:<br />\r\n<br />\r\n3.40 GHz AMD A4-5300 Dual-Core Processor<br />\r\n8 GB Installed Memory<br />\r\n1 TB Serial ATA Hard Drive (7200 RPM, 6 GB/s)<br />\r\nAMD Radeon HD 7480D<br />\r\nDual-layer DVDÂ±RW drive<br />\r\n8 Channel HD Audio<br />\r\n450 Watt Power Supply<br />\r\nWireless 802.11bgn Adapter<br />\r\nKeyboard and optical wheel mouse included<br />\r\nWindows 8.1 64-bit Pre-Installed, w/Disc<br />\r\nAssembled and Tested in the USA<br />\r\n1 Year Parts and Labor Warranty<br />\r\nFree Lifetime Technical Support<br />\r\nBeautiful Black and Red Chassis<br />\r\nAbout CybertronPC :<br />\r\n<br />\r\nAt CybertronPC, we know that a great gaming rig has to be built right. To create a system that will hold up under pressure, CybertronPC starts with a solid foundation of only the highest quality components. We then expertly assemble and thoroughly test your system before it ships to you. All this combines to create a fantastic machine you will be proud to show off to your friends.', '2015-11-26 03:23:37', 0, 4, '692.01'),
(57, 'CybertronPC Trooper-X6 GMTRPX634BK Desktop', 'CybertronPC is pleased to introduce Trooper-X6 Gaming PC. Equipped with an AMD A4-6300 3.70GHz Dual-Core processor, 8GB of DDR3 memory, and a 1TB hard drive, this machine is ready to take you into the heat of any battle! And with the Radeon HD 7480D Graphics, you''ll see the field of battle in crisp detail. Run your favorite games without blasting holes in your pocketbook - draft the Trooper-X6 into your gaming army today!', 'System: amd a4-6300 3.70ghz dual-core | amd a58 chipset | 8gb ddr3 | 1tb hdd | genuine windows 8.1 64-bit<br />\r\nGraphics: amd radeon hd 8370d video | 24x dvdÂ±rw dual-layer drive | audio: 8 channel | gigabit lan | keyboard & mouse<br />\r\nExpansion bays/slots total(free): 2(1) ext. 5.25" | 1(1) ext. 3.5" | 3(2) int. 3.5" | 1(1) pci | 1(1) pci-e x1 | 1(1) pci-e x16 | 2(1) dimm 240p<br />\r\nConnectivity: 6x usb 2.0 | 1x rj-45 network ethernet 10/100/1000 | audio | 1x vga | 1x hdmi<br />\r\nChassis: apevia x-trooper junior gaming mid-tower w/350 watt power supply | 1 year parts & labor warranty | free lifetime tech support', '2015-11-26 03:26:52', 0, 4, '759.06'),
(58, 'Nintendo Mario Kart 8 Wii U Deluxe Bundle w/ DLCs Included - Mario Kart 8 Edition', '							Includes Deluxe Wii U Black Console, Wii U Game Pad, AC Adapter, GamePad AC Adapter, HDMI Cable, Sensor Bar, GamePad Cradle, GamePad Stand, Console Stand, Pre-Installed Mario Kart 8 Game, Mario Kart 8 DLCs						', '							Console works with most games from the original Wii console, as well as the Wii Remote, Wii Remote Plus, Nunchuk controllers, Balance Board and many other Wii accessories, so you can continue to enjoy your favorite Wii features<br />\r\nPlay using a Wii Remote controller, the Wii U GamePad controller or a Wii U Pro Controller.<br />\r\nLimited quantities available						', '2015-11-26 06:27:00', 0, 9, '329.95'),
(59, 'Xbox One 1TB Console - Fallout 4 Bundle - Bundle Edition', '							Own the Xbox One Fallout 4 Bundle, featuring a 1TB hard drive, Fallout 4, and a full-game download of Fallout 3. Experience the next generation of open-world gaming from Bethesda Game Studios, the award-winning creators of The Elder Scrolls V: Skyrim. Play and store more games than ever, including Fallout 3 and other Xbox 360 games, with the 1TB hard drive.						', '							Includes: 1TB hard drive Xbox One Console, Fallout 4 game disc, Fallout 3 full-game digital download, newly updated Xbox One black wireless controller with a 3.5mm headset jack so you can plug in any compatible headset, AC Power Cable, and an HDMI Cable.<br />\r\nExperience the next generation of open-world gaming in Fallout 4.<br />\r\nGet a full-game download of Fallout 3, the award-winning Xbox 360 title now playable on Xbox One.<br />\r\nQuickly switch between your games, live TV, and apps like Amazon Instant Video, Netflix, and HBO GO.<br />\r\nExperience the most advanced multiplayer on Xbox Live.						', '2015-11-26 06:31:04', 0, 9, '399.96'),
(60, 'New Nintendo 3DS XL â€“ Black', '							Nintendo 3ds Xl System - 4.9 Active Matrix Tft Color Lcd - Black - Dual Screen - 800 X 240 - 128 Mb Memory Digital Media Professionals Pica200 - Wireless Lan - Battery Rechargeable						', '							Meet the New Nintendo 3DS XL!<br />\r\n<br />\r\nPlay even more games!! You can still play all Nintendo 3DS games and nearly all games from previous systems such as Nintendo DS and DSi. And, some future titles will be exclusively playable on the New Nintendo 3DS XL.<br />\r\n<br />\r\n<br />\r\nNew face-tracking 3D!<br />\r\n<br />\r\nBuilt in amiibo support<br />\r\n<br />\r\nNew controls for more enhanced play! The C stick brings new control possibilities<br />\r\n<br />\r\nDownload and play games with the new faster processor!<br />\r\n<br />\r\nThe new-and-improved Internet browser lets you watch videos and surf the Web with ease<br />\r\n<br />\r\nEnjoy better results when you take photos in low-light situations<br />\r\nGames leap to life with super-stable 3D. The face-tracking feature uses the systemâ€™s inner cameras to adjust images based on your viewing angle, so you can enjoy total immersion in your games. Tap an amiibo figure to the near-field communication (NFC) reader on the lower screen to enjoy amiibo features in compatible games. Improved CPU performance means faster loading times, so you spend more time playing. Many games will look and play better than everâ€”and several upcoming games will be built from the ground up to take advantage of this power boost. Get bonus items and content, customize your character, and more when you use amiibo figures (like Mario!) with amiibo-compatible games. You can transfer your photos, music, and other files between a PC and your systemâ€™s microSDHC*** card via a wireless network. No need to remove the microSDHC card!<br />\r\n<br />\r\n<br />\r\nFeatures:<br />\r\n<br />\r\nGreatly improved 3D viewing angle and stability makes game worlds more immersive<br />\r\nNew C Stick enables dual analog controls<br />\r\nUpgraded processor speeds up system performance<br />\r\nPlays all Nintendo 3DS games<br />\r\nCompatible with amiibo						', '2015-11-26 06:33:59', 1, 9, '229.96'),
(61, 'Sony Computer Entertainment PS VITA Hardware WiFi - PlayStation 4', 'Over 1000 Games: Many PlayStation Vita games, such as Final Fantasy X, God of War Collection, and Minecraft, classic games from PS OneÂ® and PSPÂ® systems and more.<br />\r\nRemote Play: Stream a wide range of your PS4 games on your PS Vita system over a local wi-fi network when away from your PS4 system or TV.<br />\r\nEntertainment and Apps: Search funny videos, check your friend''s status, watch your favorite TV shows and movies, stream music, and much much more on the PS Vita system.<br />\r\nDesigned for Superior Gameplay: The slim, sleek, and light design of the PS Vita makes it comfortable to hold and the dual analog controls provide a deeply immersive gameplay experience.', 'Take the greatness of PlayStationÂ® on the go with the Ultimate Gamerâ€™s Companion. On the PlayStation Vita system, gamers can play over 1,000 PlayStation games, stream PS4â„¢ games via Remote Play, and stream PS3â„¢ games via PS Now. This slim and sleek device also features high-precision dual analog controls for a more immersive gaming experience away from your console and TV.', '2015-11-26 06:37:59', 0, 9, '199.99'),
(62, 'EVGA GeForce GTX 960 2GB SSC GAMING ACX 2.0+, Whisper Silent Cooling Graphics Card 02G-P4-2966-KR', 'Plus 164MHz faster boost clock<br />\r\nEvga ACX 2.0 Plus cooling<br />\r\n33-Percent more GPU power for OC<br />\r\nFull size Memory/MOSFET cooling plate<br />\r\nDouble ball bearing fans, 400-percent longer lifespan', 'The EVGA GeForce GTX 960 delivers incredible performance, power efficiency, and gaming technologies that only NVIDIA Maxwell technology can offer. This is the perfect upgrade, offering 60-percent faster performance and twice the power efficiency of previous generation cards. Plus, it features VXGI for realistic lighting, support for smooth, tear freeNVIDIA GSYNC technology, and dynamic super resolution for 4K quality gaming on 1080p displays.The New EVGA ACX 2.0 Plus cooler brings new features to the award winning EVGA ACX 2.0 Cooling technology. A memory MOSFET cooling plate (MMCP) reduces MOSFET temperatures by 11 DegreeC, and optimized straight HeatPipes (SHP) reduce GPU temperature by an additional 5 degree c. ACX 2.0 Plus coolers also feature optimized swept fanblades, double ball bearings and an extreme low power motor, delivering more air flow with less power, unlocking additional power for the GPU.Compared To GTX 660.', '2015-11-26 06:41:28', 0, 7, '272.99'),
(63, 'SAPPHIRE NITRO Radeon R9 390 DirectX 12 100382NTOC-2L 8GB 512-Bit GDDR5 PCI Express 3.0 x16 HDCP Ready Tri-X OC Version w/ backp', '							8GB 512-Bit GDDR5<br />\r\nCore Clock 1040 MHz<br />\r\n1 x DVI-D 1 x HDMI 3 x DisplayPort<br />\r\n2560 Stream Processors<br />\r\nPCI Express 3.0 x16						', '							The new SAPPHIRE NITRO series is an evolution of our market-leading, award-winning, high-end graphics card technology. Designed from the ground up, weâ€™ve crammed in everything you need (and left out everything you don''t) to maximize the gaming experience for your budget.<br />\r\n<br />\r\n<br />\r\nFeatures<br />\r\n<br />\r\nAn evolution of our market-leading expertise, SAPPHIRE NITRO makes high-end graphics card technology accessible to the PC gamer.<br />\r\nMaximizing performance, quality, reliability, and stability for your budget.<br />\r\nSleek, elegant, black and gunmetal styling â€“ to suit any build.<br />\r\nSAPPHIREâ€™s renowned high-end quality components, including our awardâ€“winning cooling solutions, long-life capacitors, Black Diamond Chokes and shroud enhancements to strengthen the PCB.<br />\r\nStiffer board design achieves greater rigidity, contributing to longer life expectancy.<br />\r\nPerformance tuned for the majority PC gamers with the latest graphics architecture from AMD â€“ for fast, reliable gaming.<br />\r\n<br />\r\nCasio<br />\r\nSAPPHIRE & AMD Radeonâ„¢ R9 Graphics: A New Era of PC Gaming<br />\r\nAMDâ€™s latest graphics technology ushers in a whole new dimension of gaming, for a whole new reality. Get all the power you need for the most immersive 4K gaming experience and beyond, for now and tomorrow. Together with SAPPHIREâ€™s unparalleled board design quality and innovative technologies, such as Tri-X cooling, you can experience unbridled performance like never before.<br />\r\n<br />\r\nSAPPHIRE Double Side Black Diamond Chokes<br />\r\nSAPPHIRE patented chokes run 10% cooler and give 25% more power efficiency than normal chokes. The result is longer product life, improved reliability, increased energy savings and better overclocking capability.<br />\r\n<br />\r\nCasio<br />\r\nCasio<br />\r\n<br />\r\nDual Ball Bearings<br />\r\nDual ball bearings on the fan spindles ensure smooth running and long life and are designed to keep out dust. A quiet cooling solution, two ball-bearing fan features a high-efficiency blade design, resulting in up to 80% longer life than standard ball bearings.*<br />\r\n<br />\r\nCasio<br />\r\n<br />\r\n10mm heat pipe<br />\r\nThe SAPPHIRE R9 390 OC 8GB features a 10mm diameter copper heat pipe which has 53% better efficiency at dissipating heat than 8mm heat-pipe. With 1x 10mm, 2 x 8mm and 2x 6mm heat pipe, the card is designed to handle a 300W draw.<br />\r\n<br />\r\nIntelligent Fan Control II<br />\r\nIntelligent fan control allows one or more fans to be stopped for lower noise when the card is under light load and is automatically restarted when the card temperature rises â€“ resulting in a smoother, quieter operation.<br />\r\n<br />\r\nAMD LiquidVR LiquidVRâ„¢ is an AMD initiative dedicated to making VR as comfortable and realistic as possible by creating and maintaining whatâ€™s known as â€œpresenceâ€ â€” a state of immersive awareness where situations, objects, or characters within the virtual world seem â€œreal.â€ LiquidVRâ„¢ uses AMDâ€™s GPU software and hardware sub-systems to tackle the common issues and pitfalls of achieving presence, such as reducing motion-to-photon latency to less than 10 milliseconds. This is a crucial step in addressing the common discomforts, such as motion sickness, that may occur when you turn your head in a virtual world and it takes even a few milliseconds too long for a new perspective to be shown.<br />\r\n<br />\r\nCasio<br />\r\nCasio<br />\r\nAMD FreeSync technology<br />\r\nNo stuttering. No tearing. Just gaming. AMD FreeSyncâ„¢ technology puts an end to choppy gameplay and broken frames with fluid, artifact-free performance at virtually any framerate. Behold the next breakthrough in PC gaming performance. The FreeSyncâ„¢ technology in select AMD APUs and GPUs resolves the communication issues between processor and monitor, eliminating image tears and choppiness for effortlessly smooth gameplay.<br />\r\n<br />\r\nAMD Eyefinity<br />\r\nAMD Eyefinity technology expands the traditional limits of desktop computing by multiplying your screen area. With multiple monitors, games become more immersive, workstations become more useful and you become more productive . Take your PC games to the next level of reality and immersion. Most modern games look great on three screens, and only AMD Radeonâ„¢ graphics offer you the ability to play across five screens for an eye-popping gaming experience.<br />\r\n<br />\r\nCasio<br />\r\nCasio<br />\r\n<br />\r\nAMD Crossfireâ„¢<br />\r\nAMD CrossFireâ„¢ technology is the ultimate multi-GPU performance gaming platform. With the flexibility to combine two, three or four GPUs, AMD CrossFireâ„¢ technology is the perfect solution for those who demand extreme performance.<br />\r\n<br />\r\nDirectXÂ® 12<br />\r\nDirectXÂ® 12 is a new, â€œconsole-likeâ€ graphics API from MicrosoftÂ® that empowers game developers with more direct and obvious control of PC hardware. To put it simply: much more efficient hardware through smarter software! At the discretion of a game developer, this superior efficiency can be spent on higher framerates, lower latency (VR), lower power consumption, better image quality, or some calculated balance of all four. In any scenario, gamers stand to benefit greatly from choosing AMD hardware to run their favorite DirectXÂ® 12 game.<br />\r\n<br />\r\nCasio<br />\r\n<br />\r\nCasio<br />\r\nSAPPHIRE TRIXX Overclocking Utility<br />\r\n<br />\r\nPerformance Tune Memory and GPU Clock Speeds<br />\r\nOver and Under Voltage adjustment<br />\r\nSave configurations<br />\r\nGraphical hardware Monitor<br />\r\nHardware log file<br />\r\nFeedback option						', '2015-11-26 06:44:20', 0, 7, '439.99'),
(64, 'MSI Radeon R9 380 DirectX 12 R9 380 GAMING 4G 4GB 256-Bit GDDR5 PCI Express 3.0 HDCP Ready CrossFireX Support ATX Video Card', '4GB 256-Bit GDDR5<br />\r\nCore Clock 1000 MHz<br />\r\n1 x DL-DVI-I 1 x DL-DVI-D 1 x HDMI 1 x DisplayPort<br />\r\n1792 Stream Processors<br />\r\nPCI Express 3.0', 'TWIN FROZR V - COOLER,QUIETER, BETTER GAMING<br />\r\nWith every new generation of GPUs comes more performance. With every new generation of MSI Twin Frozr we give you less noise and heat!. Weâ€™ve listened to all your requests and the new Twin Frozr V is smaller, features stronger fans, generates less noise, keeps your graphics card and its components cooler and matches perfectly with your MSI GAMING motherboard including some funky LED lightning. Weâ€™ve spent 18 months on the development of the Twin Frozr V, including field testing in gaming cafÃ©s to ensure the cards have the quality and stability to give you the FPS you need.<br />\r\n<br />\r\nMSI<br />\r\nTORX FAN<br />\r\nTraditional Fan Blade<br />\r\nMaximizes downwards airflow and air dispersion to the massive heat sink below them.<br />\r\n<br />\r\nDispersion Fan Blade<br />\r\nIntake more airflow to maximizes air dissipation to hear sink.<br />\r\n<br />\r\nMSI<br />\r\nAIRFLOW DIAGRAM<br />\r\nAdvanced Dispersion Blade design generates 19% more airflow without increasing drag for supreme silent performance.<br />\r\n<br />\r\nMSI<br />\r\nAIRFLOW CONTROL<br />\r\nEnhanced dissipation efficiency<br />\r\nMSI has fitted Twin Frozr coolers with the all new Airflow Control technology which guides more airflow directly onto the heat pipes by using special deflectors on the heat sink. In addition, this exclusive heat sink design increases heat sink surface area, greatly enhancing the dissipation efficiency.<br />\r\n<br />\r\nMSI<br />\r\nSuperSU PIPE<br />\r\nEnhanced dissipation efficiency<br />\r\nSuperSu Architecture is the best cooling solution for graphics cards. The GPU is cooled by a massive nickel-plasted copper base plate connected to Super Pipes (8mm heat pipes) on the MSI GAMING series graphics card. Additionally, the new heat pipe layout increases efficiency by reducing the length of unused heat pipe and a special SU-form design.<br />\r\n<br />\r\nMSI<br />\r\nZERO FROZR<br />\r\nSmart cooling, stay quiet. <br />\r\nMSIâ€™s Twin Frozr V Thermal Designs are equipped with ZeroFrozr technology which was first introduced by MSI back in 2008. ZeroFrozr technology eliminates fan noise in low-load situations by stopping the fans when they are not needed. Compared to other graphics cards, there is no continuous hum of airflow to tell you thereâ€™s a powerful graphics card in your gaming rig. This means you can focus on gaming without the distraction of other sounds coming from your PC.<br />\r\n<br />\r\nMSI<br />\r\nCATCHING THE VIBE WITH COOL LED EFFECTS<br />\r\nFeaturing a premium LED illuminated MSI GAMING Dragon to lighten the mood. This brand new function allows you to choose from 5 unique modes to set the right ambience for your gaming moments with just one click.<br />\r\n<br />\r\nMSI<br />\r\nGAMING APP<br />\r\nThe latest version of the MSI Gaming App is expanded with MSI Scenamax technology (under the EyeRest tab) to provide you easy access to image quality improving technology in the easy comfort of the MSI Gaming App.<br />\r\n<br />\r\nOC Mode<br />\r\nMaximum Performance through higher clock speeds and increased fan performance<br />\r\n<br />\r\nGaming Mode (Default)<br />\r\nThe best balance between in-game performance and thermal<br />\r\n<br />\r\nSilent Mode<br />\r\nThe best enviroment for minimal fan noise<br />\r\n<br />\r\nMSI<br />\r\nMORE PERFORMANCE<br />\r\nMSI GAMING Graphics Cards give you more performance out of the box. Whether you use the card pre-overclocked or use the Gaming App to use its full potential, you can just get right into the game and enjoy sublime performance. Overclocking through the MSI Gaming App is covered by warranty to take away your worries. Get in there and start winning!<br />\r\n<br />\r\nMSI<br />\r\nAFTER BURNER<br />\r\nMSI Afterburner is worldâ€™s favorite cross-vendor GPU overclocking tool. The easy interface gives access to the most detailed information about your graphics card and allows for tinkering with pretty much anything available on your graphics card.<br />\r\n<br />\r\nCompatible with 64-bit Apps, available in many languages, including, Russian, Spanish, Chinese and Korean and completely customizable with many user-generated skins, everyone feels at home.<br />\r\n<br />\r\nYou can also run Afterburner on your iOS or Android smartphone and the built-in benchmarking utility Kombustor gives you insight in your Graphics Cardsâ€™ true performance.<br />\r\n<br />\r\nMSI<br />\r\nPREDATOR<br />\r\nA built-in screen and video capturing tool named Predator which captures your screen as still images or videos with the push of a button and allows you to capture and record your coolest, goofiest and most awesome gaming moments on your PC!<br />\r\n<br />\r\nMSI<br />\r\nWANT TO SHOW OFF YOUR SKILLS OR JUST MAKE A FUN GAMING VIDEO FOR YOUR FRIENDS?<br />\r\nXSplit Gamecaster & Broadcaster V2 lets you easily record your gaming moments and broadcast your live gameplay sessions to Twitch, YouTube, UStream and more.<br />\r\n<br />\r\nIt''s simple, easy to use and ideal for sharing your gameplay with friends, family or the world - Or for capturing those perfect gaming moments, just for the heck of it.<br />\r\n<br />\r\nSo what are you waiting for? Join the revolution and start streaming and recording with XSplit Gamecaster today.<br />\r\n<br />\r\nMSI<br />\r\nMILITARY CLASS COMPONENTS<br />\r\nOne of the deciding factors in performance is the quality of the components used. That is why MSI only uses MIL-STD-810G certified components for its Gaming cards because only these components have proven to be able to withstand the torturous circumstances of extreme gaming and overclocking.<br />\r\n<br />\r\nMSI<br />\r\nHI-C CAP<br />\r\nMSIâ€™s Hi-c CAPs are tiny, and super-efficient capacitors. Their small footprint allows the installation of heat sinks and their high efficiency (93%) actually reduces the total thermal footprint of the card.<br />\r\n<br />\r\nMSI<br />\r\nSUPER FERRITE CHOKES<br />\r\nSuper Ferrite Chokes use a Ferrite core that is Super-Permeable. This allows the Super Ferrite Chokes to run at a 35 degree Celsius lower temperature, have a 30% higher current capacity, a 20% improvement in power efficiency and better overclocking power stability.<br />\r\n<br />\r\nMSI<br />\r\nSOLID CAP<br />\r\nWith their aluminum core design, Solid CAP''s have been a staple in high-end design mainboard designs and provides lower Equivalent Series Resistance (ESR) as well as its over-10-year lifespan.', '2015-11-26 06:55:58', 0, 7, '309.99');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `Product_Image_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Image_Url` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`Product_Image_Id`, `Product_Id`, `Image_Url`) VALUES
(9, 18, 'product_images/6da4548d2c8856243dc7c557bf193030f75a5c40.jpg'),
(12, 20, 'product_images/206b6ca2e5a20d0fb205548e9cccb35d0a70d8a6.jpg'),
(13, 20, 'product_images/f69df7f5c162fcb077d5071da3bfd0a74f449c84.jpg'),
(15, 34, 'product_images/6ba396e493ff0469272aeab74416ee3b6034a368.jpg'),
(16, 35, 'product_images/ac5f12b510a4f08a22c18bb9601cf14c5ab12a94.jpg'),
(17, 37, 'product_images/29ae857517ee64de5266e4c83e13e2f575b7420c.jpg'),
(21, 38, 'product_images/cb8f3c3ff546ee04c106dabe7f90d46f7bfefcc2.jpg'),
(22, 39, 'product_images/a35f5925f17613025e5592ba4f546a5d9c1b461f.jpg'),
(23, 39, 'product_images/9a3a4c8d166a8ee1c6d59d1194ac067256502639.jpg'),
(26, 37, 'product_images/d0175f429aa830321599933e8c767dc0dfd8a7e6.jpg'),
(27, 37, 'product_images/7c392ec9a7afc1147ee4571c4531f87a9f0cecf1.jpg'),
(33, 45, 'product_images/04a26bae59ca6e736fe487426e775ea5aa8eb89f.jpg'),
(37, 45, 'product_images/9f9acfcee0c96a21deecf0700c90eca67bd5b60c.jpg'),
(38, 45, 'product_images/64599c56605033904d4a49845328f5bff3f23d92.jpg'),
(39, 45, 'product_images/7c392ec9a7afc1147ee4571c4531f87a9f0cecf1.jpg'),
(40, 46, 'product_images/936d454bf3e4f4e2664b147d7f741db442c3a28e.jpg'),
(41, 46, 'product_images/325855b42d4ef4e2b3253bc89121d6b8f74d518a.jpg'),
(42, 46, 'product_images/53523af43f774196bda2421a1d64e1e12682818c.jpg'),
(43, 47, 'product_images/dfc7f0e58751317d7618adfb2a067206a52fe377.jpg'),
(44, 47, 'product_images/e69df5e5f9ebfde8c0538511da8a7b669afdcd52.jpg'),
(45, 47, 'product_images/d35cf82daebbc2531d8da471963243d983aae7ad.jpg'),
(46, 48, 'product_images/b9313ebf7bcad172dee77f48d96ae4cf82297796.jpg'),
(47, 48, 'product_images/ac17badc692ea98c71ffbf44493665c82cc22276.jpg'),
(48, 48, 'product_images/9505eebfb422e5c2c323023fc6e9cb97573ace2c.jpg'),
(49, 49, 'product_images/97a5b69f51d13101ea1bfe746c74197b7765690a.jpg'),
(50, 49, 'product_images/33f8e7fa2c9acbd7294047d1bafdb72f13e78460.jpg'),
(51, 49, 'product_images/4769c1cd2bc2c0a41c35da1a6598b5d9dcc28cb9.jpg'),
(52, 49, 'product_images/e6002ef7a6dc1a9d311857340d40e32d398d8aed.jpg'),
(53, 50, 'product_images/b1b987670a17d04d84eb47d6276fdad4093a6598.jpg'),
(54, 50, 'product_images/72cb7c7e17dc7546b95fc5fd629b695e4e9786bf.jpg'),
(55, 50, 'product_images/e55c1717eadcecc00b6affe4a2f79688685e1e7c.jpg'),
(56, 51, 'product_images/8890fa1d87f07fdbecb6cdabbacd22ed84f46653.jpg'),
(57, 51, 'product_images/ad35ae58d29f12ac5fda363d5ded099a4289396e.jpg'),
(58, 51, 'product_images/1947af76bada1571a4b0296ef33ed93c7f584ce2.jpg'),
(59, 51, 'product_images/e22c374c3615230e7137842d65a0395f70dd737b.jpg'),
(60, 52, 'product_images/4b683c5c23f278b48eb41559c5e547608b6f0923.jpg'),
(61, 52, 'product_images/a81298413f633394f1c6bc03b88826888cfaf8c1.jpg'),
(62, 52, 'product_images/94a7563a6a3d79b29b895e013b140d7022564a3a.jpg'),
(63, 53, 'product_images/541c4836eab57c28531f9a70ac85643cc9d4adda.jpg'),
(64, 53, 'product_images/cb45d2ea6a84d026bd9e2f1a09792013db5d0524.jpg'),
(65, 53, 'product_images/0de67cb0e514347a82b9bf2bf2b59c78a0ffa73d.jpg'),
(66, 53, 'product_images/c75dc1efaf017fcb4e96d16cf16d927f2630cfb5.jpg'),
(67, 54, 'product_images/42d12486976f88aa66e0cd234acbd1a71d3bf6d8.jpg'),
(68, 54, 'product_images/694a9feb713c65024bb3c971d89ef6015e9b3382.jpg'),
(69, 54, 'product_images/da1a8f394940b5d691baf06f87b15b4bd53e3cc5.jpg'),
(70, 55, 'product_images/2030a40231076102ba1da72b0685bb6143c4cf4e.jpg'),
(71, 55, 'product_images/b092d08914f5f282330783797e67937efb99c351.jpg'),
(72, 55, 'product_images/9b7949d016918ab39092e77e187d4893607c1a73.jpg'),
(73, 56, 'product_images/594687fe404198d17ae4a83aceb81dc5c0cecb55.jpg'),
(74, 57, 'product_images/e15cb08f680abf5ec689b49eac8414c02d7c2351.jpg'),
(75, 57, 'product_images/9212ea1dba1af6855cd639a59b3041527345b577.jpg'),
(76, 58, 'product_images/3af4e02472527229ad72793ff6ae842bee57f896.jpg'),
(77, 58, 'product_images/7d4715a9741ded8b68b76f1acadafc8ded4e8e22.jpg'),
(78, 59, 'product_images/a6615e25757ea0017d14f3515e62650afe3582f8.jpg'),
(79, 59, 'product_images/cff5625cfd7b93ec819b6c748617c83719ab710f.jpg'),
(80, 59, 'product_images/3312edbaac6abd591e1c587ae3f4fac4791a8984.jpg'),
(81, 60, 'product_images/80fa0ee7763b76c6ffc11d5663ef1537edc1de34.jpg'),
(82, 60, 'product_images/8b8793618cf90d263e8efcc8025280eb1382ab43.jpg'),
(83, 60, 'product_images/a6d4815840f826b1c3c6b6a505eaee85e5fddb8c.jpg'),
(84, 61, 'product_images/01d4b01cdcb202890153ac57dfe87ed32c5df4e2.jpg'),
(85, 61, 'product_images/9030bee0eb25ee0820c3c3479d2b344ab23fee97.jpg'),
(86, 62, 'product_images/2afcca1bf9befb302610c7f643d0a3715bb59b8f.jpg'),
(87, 62, 'product_images/47679861319a336ae5486babd67e548084ac14ed.jpg'),
(88, 62, 'product_images/1fa2cba6191ee3b28726b257f6edd09d722703ba.jpg'),
(89, 63, 'product_images/fc09ed7d33b1cafefbb29832690d569d8214914b.jpg'),
(90, 63, 'product_images/d4ca509c4411b873d00509cd676c32a6460a0827.jpg'),
(91, 64, 'product_images/249606c70e4ede8fdf12f71e3cd52748510d39f2.jpg'),
(92, 64, 'product_images/e6c833c971b1679b1e509521e5335a3e9588c8f0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE IF NOT EXISTS `product_review` (
  `Product_Review_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Rating` tinyint(1) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `Review` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`Product_Review_Id`, `User_Id`, `Product_Id`, `Rating`, `Title`, `Review`) VALUES
(2, 3, 45, 0, 'The Best', 'only the best'),
(3, 5, 54, 0, 'I love this computer', 'DiamondPC is the best');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `Sale_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Payment_Method_Id` int(10) NOT NULL,
  `Confirmation` tinyint(1) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`Sale_Id`, `User_Id`, `Payment_Method_Id`, `Confirmation`, `Status`) VALUES
(7, 3, 8, 0, 'Processing'),
(8, 3, 9, 0, 'Processing'),
(9, 3, 10, 0, 'Processing');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Username`, `Password`, `User_Type`, `Grant_Admin`) VALUES
(3, 'Jonguy', '$2y$11$6dIoC4yHj56oiqWS0CjQouIm1z1W9UgYhwMW2W2mVi0kcYZu3kRIW', 'Admin', 1),
(4, 'Jonguy64', '$2y$11$BMRc3xw6uSZhjencfNBtYuR.rivHatr/G5mXzQbXYvZGL3xAqOPkC', 'Customer', 0),
(5, 'BobTheVillain', '$2y$11$8ztkXQTnNEAPTG1oBvI2yuPOs1fDfmqcSwJWWR4PCIpzTXAOoBU/i', 'Admin', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`User_Info_Id`, `User_Id`, `First_Name`, `Last_Name`, `Email`, `Birthdate`, `Address`, `City`, `State_Province`, `Country`, `Postal_Code_Zip`, `Phone_Number`) VALUES
(2, 3, 'Jonathan', 'Del Corpo', 'nintendo_jon64@hotmail.com', '1996-02-06', '11844 Filion', 'Montreal', 'Quebec', 'Canada', 'H4J1T3', '5145025259'),
(3, 4, 'Marcus', 'Bro', 'jonguy.64@hotmail.com', '1990-01-01', '1234 Whatever', 'Montreal', 'Quebec', 'Canada', 'X0E 0N0', '5145025259'),
(4, 5, 'Bob', 'Marley', 'bobmarley@hotmail.com', '1985-10-16', '4567 rue Bernier', 'Montreal', 'Quebec', 'Canada', 'J8L 6G6', '5147894561');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `Wish_List_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`Wish_List_Id`, `User_Id`, `Product_Id`) VALUES
(1, 3, 34),
(2, 3, 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_Id`),
  ADD UNIQUE KEY `User_Id_2` (`User_Id`,`Product_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`contact_message_id`);

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
  ADD KEY `Payement_Method_Id` (`Payment_Method_Id`);

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
  MODIFY `Cart_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `contact_message_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `Faq_Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inventory_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Order_Detail_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `Payment_Method_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `Product_Image_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `Product_Review_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `Sale_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_Info_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `Wish_List_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Cart_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Cart_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `Inventory_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `Order_Detail_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Order_Detail_Sale_Id_Fk` FOREIGN KEY (`Sale_Id`) REFERENCES `sale` (`Sale_Id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `Product_Review_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Product_Review_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`) ON DELETE CASCADE;

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `Sale_Payement_Method_Id_Fk` FOREIGN KEY (`Payment_Method_Id`) REFERENCES `payment_method` (`Payment_Method_Id`),
  ADD CONSTRAINT `Sale_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`) ON DELETE CASCADE;

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `Wish_List_Product_Id_Fk` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Wish_List_User_Id_Fk` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
