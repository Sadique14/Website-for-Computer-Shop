-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 02:02 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `level`) VALUES
(1, 'admin@yahoo.com', '95192c98732387165bf8e396c0f2dad2', 0),
(3, 'khulna@gmail.com', '95192c98732387165bf8e396c0f2dad2', 1),
(9, 'idb@gmail.com', '95192c98732387165bf8e396c0f2dad2', 1),
(10, 'multiplan@gmail.com', '95192c98732387165bf8e396c0f2dad2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` varchar(11) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `image`, `admin_id`) VALUES
('1', 'resources/sliders/f9b898bb9e.jpg', 1),
('2', 'resources/sliders/28185991d3.jpg', 3),
('3', 'resources/sliders/3cb7ca20e9.jpg', 1),
('4', 'resources/sliders/44c618a1c7.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `title` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`title`, `address`, `phone1`, `phone2`, `admin_id`) VALUES
('IDB Branch', 'Shop # 312/2 (Level-4),\r\nBCS Computer City,IDB Bhaban ,\r\nAgargaon, Dhaka-1207.', '+8801730354899', '+8801777734244', 9),
('Khulna Branch', '4/7, 8, 9, 10-10.5 Jalil Tower,\r\nKhan-A-Sabur Road , Khulna-9100.', '+8801730317799', '041 â€“ 811858', 3),
('Multiplan Center Branch', 'Shop # 1006 â€“ 1007,\r\nLevel â€“ 10, Multiplan Center,\r\nNew Elephant Road ,Dhaka-1205.', '+8801730317785', '+8801730317786', 10),
('Rajshahi Branch', 'Rajshahi', '000000', '123456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Notebook'),
(2, 'Desktop'),
(4, 'Components'),
(5, 'Monitor'),
(7, 'Software'),
(15, 'Printer'),
(16, 'Server'),
(17, 'Scanner'),
(18, 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(50) DEFAULT NULL,
  `press` varchar(255) DEFAULT NULL,
  `app` varchar(255) DEFAULT NULL,
  `copyrightInfo` varchar(100) DEFAULT NULL,
  `aboutUs` varchar(1000) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `support` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `press`, `app`, `copyrightInfo`, `aboutUs`, `email`, `telephone`, `logo`, `support`) VALUES
(1, 'X Computer', 'http://bangla.bdnews24.com', 'http://www.google.com', 'Copyright Â© 2016 by X COMPUTER', 'X Computers Limited is one of the largest retail chain stores for computer product in Bangladesh. Notebook, Desktops, Tablets, PC Components, Camera, Software, Office Equipment are the main products. Besides, X provides product related services. \r\n\r\nWe have branches in Dhaka IDB Bhaban, Dhaka Banani, Dhaka Uttara, Dhaka Multiplan Centre, Dhaka Eastern Plus, Chittagong, Bogra, Rangpur, Mymensingh, Barisal and Rajshahi.', 'Xcomputerbd@outlook.com', '+88-015-21-453348', 'resources/sliders/ebcc54884a.png', 'resources/sliders/7bea3a897d.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `short_des` tinytext,
  `long_des` text,
  `warranty` varchar(50) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `subcategory_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `image`, `price`, `brand`, `short_des`, `long_des`, `warranty`, `type`, `subcategory_id`) VALUES
('031fd16efb', 'Sapphire HD5450', 'resources/uploads/9d231416d2.png', 2800, 'Sapphire', 'Sapphire HD5450 DDR3 1GB PCI-Express Card', 'Chipset - ATI Radeon HD 5450, Model - Sapphire HD5450, Interface - PCI Express 2.1, GPU Clock (MHz) - 650 MHz, Memory (MB) - 1GB, Memory Type - DDR3, Memory Bus (bit) - 64 bit, Memory Clock (MHz) - 1334 MHz, Resolution Max. (Pixel) - 2560 x 1600, DirectX Supoort - 11, Open GL Support - 3.2, DVI Port - 1, HDMI Port - 1, Power Supply Req. (Watt) - 400 Watt, Warranty (Year) - 2 Year', '2 Years', 'Non-Featured', 7),
('04739d2c67', 'Corsair 450W Gaming VS450', 'resources/uploads/87ae9b86ee.jpg', 3400, 'Corsair', 'Corsair 450W Gaming VS450 Power Supply', 'Model - Corsair VS450, Maximum Power (WT) - 450, Input Voltage (V) - 240, Warranty - 3 year', '3 Years', 'Non-Featured', 10),
('121f44eff5', 'Sapphire NITRO Radeon RX 460 4GB DDR5 DP OC Graphics Card', 'resources/uploads/f64f97defa.gif', 14300, 'Sapphire', 'Sapphire NITRO Radeon RX 460 4GB DDR5 DP OC Graphics Card', 'Chipset - 896 stream Processors, Model - Sapphire NITRO Radeon RX 460, Interface - PCI-Express 3.0, GPU Clock (MHz) - 1250MHz, Memory Type - DDR5, Memory - 4GB, Memory Bus (bit) - 128bit, Memory Clock (MHz) - 1750MHz, DirectX Supoort - 12, Open GL Support - 4.5, DVI Port - 1x DL-DVI-D, HDMI Port - 1x HDMI 2.0b, Power Supply Req. (Watt) - 450Watt, Warranty - 2 year', '2 Years', 'Non-Featured', 7),
('187b52bfbc', 'Asus TP300UA Core i5 6th Gen. 6200U, Silver Black', 'resources/uploads/0a873eeb21.jpg', 66700, 'Asus', 'Asus TP300UA Core i5 6th Gen. 6200U (2.30GHz,8GB,1TB) Win-10 13.3 Inch Silver Black Notebook', 'Model - Asus TP300UA, Processor - 6th Gen. Intel Core i5 6200U, Processor Clock Speed - 2.30GHz, CPU Cache - 4MB, Display Size - 13.3&quot;, Display Type - Touch LED Display, RAM - 8GB, Display Resolution - 1920x1080, RAM Type - DDR3L, HDD - 1TB HDD, Graphics Chipset - Intel HD 530, Graphics Memory - Shared, Optical Device - No, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 X USB2.0, Battery - Li-Polymer, Backup Time - Up to 7 Hrs., Operating System - Windows 10, Weight - 1.75Kg, Color - Silver Black, Specialty - Touch Screen FHD LED and Flip, Warranty - 2 year', '2 Years', 'Featured', 5),
('2a2b99b6b0', 'ZOTAC GeForce GTX 1070 8GB DDR5 Founder Edition Graphics Card', 'resources/uploads/682ecec469.gif', 46000, 'Zotac', 'ZOTAC GeForce GTX 1070 8GB DDR5 Founder Edition Graphics Card', 'Chipset - GeForce GTX 1070, Model - ZOTAC GeForce GTX 1070, Interface - PCI Express 3.0, GPU Clock (MHz) - Base: 1506MHz, Boost:1683MHz, Memory - 8GB, Memory Type - DDR5, Memory Bus (bit) - 256-bit, Memory Clock (MHz) - 8 GHz, DirectX Supoort - 12, Open GL Support - 4.5, DVI Port - 1 x Duel link DVI, HDMI Port - 1, Power Supply Req. (Watt) - 500Watt, Others - 3 x DisplayPort 1.4, Warranty - 2 year', '2 Years', 'Featured', 7),
('4dcb3e0ba1', 'Sapphire NITRO+ Radeon RX 470 4GB DDR5 Dual DP OC Graphices card', 'resources/uploads/4bfed7400a.gif', 21700, 'Sapphire', 'Sapphire NITRO+ Radeon RX 470 4GB DDR5 Dual DP OC Graphices card', 'Chipset - 2048 Stream Processors, Model - Sapphire NITRO+ Radeon RX 470, Interface - PCI Express 3.0 x16, GPU Clock (MHz) - 1260MHz, Memory - 4GB, Memory Type - DDR5, Memory Bus (bit) - 256-Bit, Memory Clock (MHz) - 7000MHz, Resolution Max. (Pixel) - 3840 x 2160, DirectX Supoort - 12, Open GL Support - 4.5, DVI Port - 1 x Dual-Link DVI-D, HDMI Port - 2 x HDMI 2.0, Power Supply Req. (Watt) - 500watt, Others - 2 x DisplayPort 1.4, Dual DP OC Graphices card, Warranty - 2 year', '2 Years', 'Non-Featured', 7),
('5088c43802', 'Samsung C27F591FDW', 'resources/uploads/a9ca4c03a0.gif', 37000, 'Samsung', 'Samsung C27F591FDW 27 Inch Curved Full HD LED Borderless Monitor', 'Model - Samsung C27F591FDW, Display Size (Inch) - 27&quot;, Shape - Curved, Display Type - FHD LED Borderless Display, Display Resolution - 1920 x 1080, Brightness (cd/m2) - 250cd/m?, Contrast Ratio (TCR/DCR) - 3,000:1, Response Time (ms) - 4 (GTG), Refresh Rate (Hz) - 60 Hz, VGA Port - 1 X D-Sub, HDMI Port - 1, Warranty - 3 year', '3 Years', 'Featured', 20),
('564277958e', 'Sapphire NITRO R7 370 2GB DDR5 DP OC', 'resources/uploads/121f44eff5.jpg', 13200, 'Sapphire', 'Sapphire NITRO R7 370 2GB DDR5 DP OC PCI Express Graphics Card', 'Chipset - 1024 Stream Processors, Model - Sapphire NITRO R7 370, Interface - PCI-Express 3.0, GPU Clock (MHz) - 985MHz, Memory - 2GB, Memory Type - DDR5, Memory Bus (bit) - 256 bit, Memory Clock (MHz) - 5600MHz, Resolution Max. (Pixel) - 4096 x 2160, DirectX Supoort - 12, Open GL Support - 4.5, DVI Port - 1 x DVI-I, 1 x DVI-D, HDMI Port - 1, Power Supply Req. (Watt) - 500Watt, Others - 1 x DisplayPort, Warranty - 2 year', '2 Years', 'Non-Featured', 7),
('64062e64d2', 'AMD Sempron 2650', 'resources/uploads/43952e7a47.jpg', 3100, 'AMD', 'AMD Sempron 2650 1.45 GHz Processor', 'Model - AMD Sempron 2650, Clock Speed (GHz) - 1.45GHz, Core - Dual-core (2 Core), Thread - 2, L2 Cache (MB) - 1MB, Sockets Supported - Socket AM1, Memory Type - DDR3-1333, Memory Max. (GB) - 16GB, Memory Chanel - 2, Lithography (nm) - 28nm, Integ. Graphics - AMD Radeon HD 8240, Warranty - 3 year', '3 Years', 'Non-Featured', 6),
('81fec208e3', 'G.Skill Ripjaws V 8GB DDR4 2400 BUS', 'resources/uploads/62b00560d2.gif', 3500, 'G.Skill', 'G.Skill Ripjaws V 8GB DDR4 2400 BUS Desktop RAM', 'Model - G.Skill Ripjaws V 8GB, Capacity(MB) - 8GB, Type - DDR4, Bus Speed(MHz) - 2400MHz, Number of Pin - 288-Pin, CAS Latency - 10-12-12-31-2N, Voltage - 1.50V, Warranty - Product lifetime', 'Lifetime', 'Featured', 2),
('936da4d581', 'Canon LBP6030', 'resources/uploads/6db3681e03.jpg', 7400, 'Canon', 'Canon LBP 6030 Laser Printer', 'Model - Canon LBP6030, Functions - Print Only, Printer Type - Laser Printer, Speed PPM (Black) - 18 PPM Black, Print Resolution (Pixel) - 600 x 600dpi, Paper Size - A4/B5/A5/LGL/LTR/EXE/16K/Custom size, Plain paper, Heavy Paper, Transparency, Standard,, Interface - USB 2.0 Hi-Speed, Memory (MB) - 32MB, OS Compatibility - Win 8.1(32/64bit)/Win 8(32/64bit)/Win 7(32/64bit)/Win Vista(32/64bit)/XP(32/64bit)/Server 2012(32/64bit)/Server 2012 R2(64bit)/XP(32/64bit)/Server 2012(32/64bit)/Server 2012 R2(64bit)/Server 2008(32/64bit) / Server 2008 R2(64bit)/ 2003 Server(32/64bit)/Mac OS X 10.6ï½ž /Linux?/Citrixï¼ˆFR2ï¼‰, Dimensions (WxHxD) - 364 mm x 249 mm x 199 mm, Weight (Kg) - 5Kg, Consumable - 325, 725, Part No - LBP-6030, Warranty - 1 year', '1 Year', 'Non-Featured', 24),
('9aeeb5deae', 'Sapphire R7 250 1GB DDR5', 'resources/uploads/6723c18ec9.png', 6800, 'Sapphire', 'Sapphire R7 250 1GB DDR5 PCI Express Card', 'pset - AMD Radeon R7, Model - Sapphire R7 250, Interface - PCI Express 3.0, GPU Clock (MHz) - 1000MHz, Memory (MB) - 1GB, Memory Type - DDR5, Memory Bus (bit) - 128 bit, Memory Clock (MHz) - 4600 MHz, Resolution Max. (Pixel) - 4096X2160, DirectX Supoort - 11.2, Open GL Support - 4.3, VGA Port - 1, DVI Port - 1, HDMI Port - 1 With 3D, Power Supply Req. (Watt) - 400 Watt, Warranty (Year) - 2 Year', '2 Years', 'Non-Featured', 7),
('9d231416d2', 'Sapphire R7 240 DDR5 1GB', 'resources/uploads/dc777713b3.png', 5300, 'Sapphire', 'Sapphire R7 240 DDR5 1GB PCI Express Card', 'Chipset - ATI Radeon R7 240, Model - Sapphire R7 240, Interface - PCI Express 3.0, GPU Clock (MHz) - 780 MHz, Memory Type - DDR5, Memory (MB) - 1GB, Memory Bus (bit) - 128 -bit, Memory Clock (MHz) - 4600 MHz, DirectX Supoort - 11.2, VGA Port - 1 x D-Sub(VGA), DVI Port - 1 x Single-Link DVI-D, HDMI Port - 1 x HDMI (with 3D), Warranty (Year) - 2 Year', '2 Years', 'Non-Featured', 7),
('a785d42f81', 'Dell S2216H 21.5 Inch Full HD LED Borderless Monitor', 'resources/uploads/b5b328a922.jpg', 10700, 'Dell', 'Dell S2216H 21.5 Inch Full HD LED Borderless Monitor with Built-in Speaker', 'Model - Dell S2216H, Display Size (Inch) - 21.5&quot;, Shape - Wide Screen, Display Type - FHD LED Display, Display Resolution - 1920 x 1080, Brightness (cd/m2) - 250 cd/m2 (typical), Contrast Ratio (TCR/DCR) - 8m:1, Response Time (ms) - 6ms, Refresh Rate (Hz) - 60Hz, TV Card (Built-in) - No, DVI Port - No, VGA Port - Yes, HDMI Port - Yes, Remote - No, Speaker (Built-in) - 2 x 3W Speaker, Others - Viewing Angle: 178 vertical / 178 horizontal, Specialty - Aspect Ratio: Widescreen - 16:9, Warranty - 3 year', '6 Months', 'Non-Featured', 3),
('af8bd5b27b', 'Intel Skylake Core i5 6500', 'resources/uploads/5088c43802.jpg', 16500, 'Intel', 'Intel Skylake Core i5 6500 3.20GHz 6 MB Cache LGA1151 6th Gen. Processor', 'Model - Intel Skylake Core i5 6500, Clock Speed (GHz) - 3.20GHz, Core - 4, Thread - 4, Smart Cache (MB) - 6MB, Sockets Supported - LGA1151, Lithography (nm) - 14nm, Integ. Graphics - Intel HD 530, Others - DDR4-1866/2133, DDR3L-1333/1600 1.35V, Specialty - Skylake, Warranty - 3 year', '3 Years', 'Non-Featured', 6),
('b6574518be', 'Acer Aspire ES1-131 Intel Celeron Quad Core N3150, Red', 'resources/uploads/f821f18894.jpg', 23600, 'Acer', 'Acer Aspire ES1-131 Intel Celeron Quad Core N3150, Red', 'Model - Acer Aspire ES1-131, Processor - Intel Celeron Quad Core N3150, Processor Clock Speed - 1.60-2.08GHz, CPU Cache - 2MB, Display Size - 11.6&quot;, Display Type - LED Display, RAM - 4GB, RAM Type - DDR3L, HDD - 500GB HDD, Graphics Chipset - Intel HD, Graphics Memory - Shared, Optical Device - No, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.0, 1 x USB2.0, Battery - 3 cell Lithium Ion, Operating System - Free Dos, Weight - 1.25Kg, Color - Red, Warranty - 1 year', '1 Year', 'Non-Featured', 28),
('b91f427b78', 'Sapphire R7 360 2GB DDR5 OC', 'resources/uploads/564277958e.jpg', 10200, 'Sapphire', 'Sapphire R7 360 2GB DDR5 OC PCI Express Graphics Card', 'Chipset - 768 Stream, Model - Sapphire R7 360, Interface - PCI-Express 3.0, GPU Clock (MHz) - 1060 MHz, Memory (MB) - 2048MB, Memory Type - GDDR5, Memory Bus (bit) - 128 bit, Resolution Max. (Pixel) - 4096x2160Pixel, DirectX Supoort - 12, Open GL Support - 4.5, DVI Port - 1, HDMI Port - 1, Power Supply Req. (Watt) - 500Watt, Others - 1 x DisplayPort, Warranty - 2 year', '2 Years', 'Non-Featured', 7),
('bd6d308a54', 'Sapphire R9 Fury X 4GB DDR5 PCI Express', 'resources/uploads/570b3a6a54.jpg', 53000, 'Sapphire', 'Sapphire R9 Fury X 4GB DDR5 PCI Express Graphics Card', 'Chipset - 4096 Stream Processors, Model - Sapphire R9 Fury X, Interface - PCI-Express 3.0, GPU Clock (MHz) - 1050MHz, Memory Type - DDR5, Memory - 4GB, Memory Bus (bit) - 4096 bit Memory Bus, Memory Clock (MHz) - 1000MHz, Resolution Max. (Pixel) - 4096 x 2160, DirectX Supoort - 12, Open GL Support - 4.5, HDMI Port - 1, Others - Cooling: Water cooling, Warranty - 2 year', '2 Years', 'Non-Featured', 7),
('bfd19b1cf8', 'Asus ROG STRIX X99 Gaming DDR4 Next Gen.', 'resources/uploads/e61a0f85e4.gif', 30500, 'Asus', 'Asus ROG STRIX X99 Gaming DDR4 Next Gen.LGA2011-V3 Socket Mainborad', 'Model - Asus ROG STRIX X99, Form Factor - ATX Form Factor, Sockets - LGA2011-V3, Supported CPU - Up to Intel Core i7 X-Series Processors, Chipset - Intel X99, RAM Type - DDR4, RAM Bus (MHz) - 3333(O.C.)/3300(O.C.)/3000(O.C.)/2800(O.C.)/2666(O.C.)/2400(O.C.)/2133 MHz Non-ECC, RAM Max. (GB) - 128GB, RAM Slot - 8, PCI Express x16 Slot - 3 x PCIe 3.0/2.0 x16 ( x16, x16/x16, x8/x16/x8 mode with 40-LANE CPU; x16, x16/x8, x8/x8/x8 mode with 28-LANE CPU) , 1 x PCIe 2.0 x16 (x4 mode), SATA Port - 8 x SATA 6Gb/s, Audio Chipset - ROG SupremeFX, Audio Channel - 8-Channel, LAN Chipset - Intel I218V, 1 x Gigabit LAN, USB Interface - USB3.1 / USB3.0 / USB2.0, USB Port - 2 x USB3.1, 8 x USB3.0, 8 x USB2.0, Others - Wi-Fi, Warranty - 3 year', '3 Years', 'Featured', 9),
('c368180f5c', 'Corsair Force LE 240GB SSD', 'resources/uploads/a9e11a2ab5.jpg', 7200, 'Corsair', 'Corsair Force LE 240GB SSD', 'Model - Corsair Force LE, Storage (GB) - 240GB, Type - SSD, From Factor (Inch) - 2.5 inch, Interface - SATA 3 6Gb/s, Transfer Rate (MB/s) - 560MB/s, Warranty - 3 year', '3 Years', 'Featured', 13),
('d41a81ba6e', 'Microsoft Windows 10', 'resources/uploads/a5c8f8f664.jpg', 11000, 'Microsoft', 'Microsoft Windows 10 Professional', 'Model - Windows 10, Software Type - Microsoft Windows 10 Professional, System Req (Processor) - 1GHz, System Req (RAM) - 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit, System Req (Disk Space) - 16 GB for 32-bit OS 20 GB for 64-bit OS, Display - 800 x 600, Others - Graphics card: DirectX 9 or later with WDDM 1.0 driver', 'No', 'Featured', 11),
('d5e660a39a', 'Sapphire R9 390X 8GB DDR5 TRI-X OC PCI Express Graphics Card', 'resources/uploads/bd6d308a54.jpg', 32500, 'Sapphire', 'Sapphire R9 390X 8GB DDR5 TRI-X OC PCI Express Graphics Card', 'Chipset - 2816 Stream, Model - Sapphire R9 390X TRI-X OC, Interface - PCI-Express 3.0, GPU Clock (MHz) - 1055MHz, Memory (MB) - 8GB, Memory Type - DDR5, Memory Bus (bit) - 512 bit, Memory Clock (MHz) - 6000MHz, Resolution Max. (Pixel) - 4096X2160 Pixel, DirectX Supoort - 12, Open GL Support - 4.5, DVI Port - 1, HDMI Port - 1, Power Supply Req. (Watt) - 750Watt, Others - 3 x DisplayPort, Warranty - 2 year', '2 Years', 'Non-Featured', 7),
('dc9df13fbb', 'Momentum Server BX1200 (Standard) Tower Server', 'resources/uploads/ac095ad8be.gif', 80000, 'Intel Based Server', 'Momentum Server BX1200 (Standard) Tower Server with 1xQuad Core Intel Xeon E3 1230v5 (3.4GHz, 8MB Cache, 4Core, 4Thread, LGA-1151 Socket, 14nm, 80w TDP)', 'Model - Momentum Server BX1200 (Standard), Processor - 1 x Quad Core Intel Xeon E3 1230v5 (4 Core), Clock Speed - 3.40GHz, Chipset - Intel C236, RAM (GB) - 1 x 8GB, RAM Type - DDR4 2133MHz ECC, Max. RAM - 64GB Support, HDD (GB) - 2 x 1TB = 2TB, HDD Type - SATA on RAID, RAID Controller - RAID Support-0,1,5,10 with IN-WIN PE689 Pedestal Server Chassis, Graphics - Integrated Graphics, Networking - 2 x Gigabit LAN, Power Supply - 400watt Real Rated Powerman PSU, OS - Free Dos, Others - 80w TDP E3C236D4U Server Board, 8MB Cache, 4 Thread, LGA-1151 Socket, 14nm, Tower Server, Warranty - 3 Years (Limited) Warranty', '3 Years', 'Non-Featured', 27),
('f64f97defa', 'Sapphire NITRO R9 380 4GB DDR5 DP DUAL-X OC PCI Express', 'resources/uploads/4dcb3e0ba1.jpg', 19000, 'sa', 'Sapphire NITRO R9 380 4GB DDR5 DP DUAL-X OC PCI Express Graphics Card', 'Chipset - 1792 Stream, Model - NITRO R9 380 DUAL-X OC, Interface - PCI-Express 3.0, GPU Clock (MHz) - 985MHz, Memory (MB) - 4096MB, Memory Type - GDDR5, Memory Bus (bit) - 256bit, Resolution Max. (Pixel) - 4096X2160Pixel, DirectX Supoort - 12, Open GL Support - 4.5, DVI Port - 1 x DVI-I / 1 x DVI-D, HDMI Port - 1, Power Supply Req. (Watt) - 500Watt, Others - 1 x DisplayPort, Warranty - 2 year', '2 Years', 'Non-Featured', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subcategory_id` int(5) NOT NULL,
  `subcategory_name` varchar(30) NOT NULL,
  `category_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(2, 'Desktop RAM', 4),
(3, 'Wide', 5),
(5, 'Notebook with Windows', 1),
(6, 'Processor', 4),
(7, 'Graphics Card', 4),
(8, 'Notebook Cooler', 1),
(9, 'Motherboard', 4),
(10, 'Power Supply', 4),
(11, 'Windows', 7),
(12, 'MS Office', 7),
(13, 'SSD', 18),
(14, 'Brand Desktop', 2),
(15, 'External HDD', 18),
(16, 'Internal HDD', 18),
(17, 'Pen Drive', 18),
(18, 'Memory Card', 18),
(19, 'Square', 5),
(20, 'Curved', 5),
(21, 'Anti Virus', 7),
(22, 'Flatbed Scanner', 17),
(23, 'Barcode Scanner', 17),
(24, 'Laser Printer', 15),
(25, 'Photo Printer', 15),
(26, 'Brand Server', 16),
(27, 'Intel Based Server', 16),
(28, 'Notebook with Free DOS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `under`
--

CREATE TABLE `under` (
  `br_title` varchar(50) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `quantity` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `under`
--

INSERT INTO `under` (`br_title`, `product_id`, `quantity`) VALUES
('IDB Branch', '031fd16efb', 0),
('IDB Branch', '04739d2c67', 0),
('IDB Branch', '121f44eff5', 0),
('IDB Branch', '187b52bfbc', 1),
('IDB Branch', '2a2b99b6b0', 0),
('IDB Branch', '4dcb3e0ba1', 1),
('IDB Branch', '5088c43802', 2),
('IDB Branch', '564277958e', 0),
('IDB Branch', '64062e64d2', 1),
('IDB Branch', '81fec208e3', 0),
('IDB Branch', '936da4d581', 1),
('IDB Branch', '9aeeb5deae', 0),
('IDB Branch', '9d231416d2', 0),
('IDB Branch', 'a785d42f81', 0),
('IDB Branch', 'af8bd5b27b', 0),
('IDB Branch', 'b6574518be', 0),
('IDB Branch', 'b91f427b78', 1),
('IDB Branch', 'bd6d308a54', 1),
('IDB Branch', 'bfd19b1cf8', 1),
('IDB Branch', 'c368180f5c', 0),
('IDB Branch', 'd41a81ba6e', 1),
('IDB Branch', 'd5e660a39a', 1),
('IDB Branch', 'dc9df13fbb', 0),
('IDB Branch', 'f64f97defa', 0),
('Khulna Branch', '031fd16efb', 0),
('Khulna Branch', '04739d2c67', 0),
('Khulna Branch', '121f44eff5', 2),
('Khulna Branch', '187b52bfbc', 2),
('Khulna Branch', '2a2b99b6b0', 1),
('Khulna Branch', '4dcb3e0ba1', 2),
('Khulna Branch', '5088c43802', 0),
('Khulna Branch', '564277958e', 0),
('Khulna Branch', '64062e64d2', 0),
('Khulna Branch', '81fec208e3', 2),
('Khulna Branch', '936da4d581', 0),
('Khulna Branch', '9aeeb5deae', 1),
('Khulna Branch', '9d231416d2', 1),
('Khulna Branch', 'a785d42f81', 2),
('Khulna Branch', 'af8bd5b27b', 0),
('Khulna Branch', 'b6574518be', 1),
('Khulna Branch', 'b91f427b78', 1),
('Khulna Branch', 'bd6d308a54', 0),
('Khulna Branch', 'bfd19b1cf8', 0),
('Khulna Branch', 'c368180f5c', 0),
('Khulna Branch', 'd41a81ba6e', 0),
('Khulna Branch', 'd5e660a39a', 0),
('Khulna Branch', 'dc9df13fbb', 0),
('Khulna Branch', 'f64f97defa', 1),
('Multiplan Center Branch', '031fd16efb', 0),
('Multiplan Center Branch', '04739d2c67', 2),
('Multiplan Center Branch', '121f44eff5', 1),
('Multiplan Center Branch', '187b52bfbc', 0),
('Multiplan Center Branch', '2a2b99b6b0', 1),
('Multiplan Center Branch', '4dcb3e0ba1', 0),
('Multiplan Center Branch', '5088c43802', 3),
('Multiplan Center Branch', '564277958e', 1),
('Multiplan Center Branch', '64062e64d2', 0),
('Multiplan Center Branch', '81fec208e3', 1),
('Multiplan Center Branch', '936da4d581', 0),
('Multiplan Center Branch', '9aeeb5deae', 0),
('Multiplan Center Branch', '9d231416d2', 0),
('Multiplan Center Branch', 'a785d42f81', 3),
('Multiplan Center Branch', 'af8bd5b27b', 0),
('Multiplan Center Branch', 'b6574518be', 0),
('Multiplan Center Branch', 'b91f427b78', 0),
('Multiplan Center Branch', 'bd6d308a54', 0),
('Multiplan Center Branch', 'bfd19b1cf8', 0),
('Multiplan Center Branch', 'c368180f5c', 3),
('Multiplan Center Branch', 'd41a81ba6e', 0),
('Multiplan Center Branch', 'd5e660a39a', 0),
('Multiplan Center Branch', 'dc9df13fbb', 0),
('Multiplan Center Branch', 'f64f97defa', 1),
('Rajshahi Branch', '031fd16efb', 0),
('Rajshahi Branch', '04739d2c67', 0),
('Rajshahi Branch', '121f44eff5', 0),
('Rajshahi Branch', '187b52bfbc', 0),
('Rajshahi Branch', '2a2b99b6b0', 0),
('Rajshahi Branch', '4dcb3e0ba1', 0),
('Rajshahi Branch', '5088c43802', 0),
('Rajshahi Branch', '564277958e', 0),
('Rajshahi Branch', '64062e64d2', 0),
('Rajshahi Branch', '81fec208e3', 0),
('Rajshahi Branch', '936da4d581', 0),
('Rajshahi Branch', '9aeeb5deae', 0),
('Rajshahi Branch', '9d231416d2', 0),
('Rajshahi Branch', 'a785d42f81', 0),
('Rajshahi Branch', 'af8bd5b27b', 0),
('Rajshahi Branch', 'b6574518be', 0),
('Rajshahi Branch', 'b91f427b78', 0),
('Rajshahi Branch', 'bd6d308a54', 0),
('Rajshahi Branch', 'bfd19b1cf8', 0),
('Rajshahi Branch', 'c368180f5c', 0),
('Rajshahi Branch', 'd41a81ba6e', 0),
('Rajshahi Branch', 'd5e660a39a', 0),
('Rajshahi Branch', 'dc9df13fbb', 0),
('Rajshahi Branch', 'f64f97defa', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`title`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `under`
--
ALTER TABLE `under`
  ADD PRIMARY KEY (`br_title`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subcategory_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_category` (`subcategory_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `under`
--
ALTER TABLE `under`
  ADD CONSTRAINT `under_ibfk_1` FOREIGN KEY (`br_title`) REFERENCES `branches` (`title`),
  ADD CONSTRAINT `under_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
