-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 08:37 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hera_florist`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customer_id` int(10) DEFAULT NULL,
  `Product_id` varchar(7) DEFAULT NULL,
  `Delivery_address` varchar(50) NOT NULL,
  `Price` int(100) NOT NULL,
  `Order_id` int(10) NOT NULL,
  `Delivery_date` date NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Invoice_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customer_id`, `Product_id`, `Delivery_address`, `Price`, `Order_id`, `Delivery_date`, `Quantity`, `Invoice_status`) VALUES
(1048, 'HF00010', 'Hogwarts', 150, 37, '2019-11-29', 2, 1),
(1048, 'HF00001', 'UTM', 250, 38, '2019-11-28', 2, 1),
(1048, 'HF00003', 'UTM', 300, 39, '2019-11-27', 2, 1),
(1000, 'HF00001', 'hogwarts', 250, 40, '2019-11-28', 2, 1),
(1000, 'HF00001', 'Hogwarts', 250, 41, '2019-12-17', 2, 1),
(1000, 'HF00006', 'Hogwarts', 250, 42, '2019-12-27', 1, 1),
(1057, 'HF00018', 'Hogwarts', 150, 43, '2019-12-18', 1, 1),
(1057, 'HF00010', 'Hogwarts', 150, 44, '2019-12-20', 2, 1),
(1057, 'HF00012', 'Hogwarts', 100, 45, '2019-12-17', 1, 1),
(1057, 'HF00003', 'District 13', 100, 48, '2019-10-09', 2, 1),
(1057, 'HF00026', '', 120, 49, '2019-10-17', 1, 1),
(1053, 'HF00006', 'Hogwarts', 100, 50, '2019-09-18', 2, 1),
(1000, 'HF00021', '', 200, 51, '2019-09-22', 3, 1),
(1048, 'HF00034', 'Hogwarts', 100, 52, '2019-08-15', 1, 1),
(1057, 'HF00020', 'District 13', 100, 53, '2019-08-20', 1, 1),
(1048, 'HF00016', 'Hogwarts', 200, 54, '2019-07-17', 3, 1),
(1057, 'HF00013', '', 100, 55, '2019-07-08', 3, 1),
(1000, 'HF00025', 'Hogwarts', 100, 56, '2019-06-26', 3, 1),
(1048, 'HF00007', 'Hogwarts', 100, 57, '2019-06-12', 2, 1),
(1053, 'HF00010', 'Hogwarts', 100, 58, '2019-05-13', 2, 1),
(1057, 'HF00004', 'District 13', 250, 59, '2019-04-10', 2, 1),
(1053, 'HF00007', 'Utem', 150, 60, '2019-12-26', 2, 1),
(1000, 'HF00003', 'Utem', 300, 61, '2019-12-26', 2, 1),
(1053, 'HF00002', 'Utem', 150, 62, '2019-12-27', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` char(50) NOT NULL,
  `customer_password` varchar(7) NOT NULL,
  `customer_phone_no` varchar(15) NOT NULL,
  `Billing_address` varchar(50) NOT NULL,
  `Email_address` varchar(40) NOT NULL,
  `Verification` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_password`, `customer_phone_no`, `Billing_address`, `Email_address`, `Verification`) VALUES
(1000, 'Hermione Granger', '0000', '0167371316', 'hogwarts', 'vishwareeta@gmail.com', 1),
(1048, 'Ronald Weasley', '0103', '0167371317', 'LORONG DAMAI 6, TAMAN PERMATA', 'ronaldreeta1926@gmail.com', 1),
(1053, 'Harry Potter', '0731', '012323232', 'Hogwarts', 'reeta1926@gmail.com', 1),
(1057, 'Katniss Everdeen', '1402', '0132451402', 'District 4', 'shatevo14@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_no` int(10) NOT NULL,
  `Invoice_date` varchar(11) DEFAULT NULL,
  `Invoice_amount` decimal(6,0) DEFAULT NULL,
  `Customer_id` int(10) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_no`, `Invoice_date`, `Invoice_amount`, `Customer_id`, `order_status`, `status`) VALUES
(111, '2019/11/15', '1300', 1000, 'Product id: HF00011 in your cart is delivered', 1),
(120, '2019/11/15', '1300', 1000, 'No payment is made yet', 1),
(121, '2019/11/15', '1300', 1000, 'Product id: HF00019 in your cart is delivered', 1),
(122, '2019/11/15', '800', 1000, 'No payment is made yet', 1),
(123, '2019/11/15', '800', 1000, 'Product id: HF00001 in your cart is delivered', 1),
(124, '2019/11/15', '800', 1000, 'No payment is made yet', 1),
(125, '2019/11/16', '800', 1000, 'Product id: HF00011 in your cart is delivered', 1),
(128, '2019/11/21', '700', 1048, 'No payment is made yet', 1),
(129, '2019/11/22', '500', 1000, 'Product id: HF00011 in your cart is delivered', 1),
(130, '2019/12/02', '750', 1000, 'Product id: HF00011 in your cart is delivered Product id: HF00020 in your cart is delivered', 1),
(131, '2019/12/12', '550', 1057, 'No payment is made yet', 1),
(132, '2019/12/13', '300', 1053, 'Product id: HF00011 in your cart is delivered', 1),
(133, '2019/12/18', '600', 1000, 'No payment is made yet', 1),
(134, '2019/12/19', '300', 1053, 'Delivered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Owner_name` varchar(20) DEFAULT NULL,
  `Owner_id` varchar(20) NOT NULL,
  `Owner_password` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Owner_name`, `Owner_id`, `Owner_password`) VALUES
('TheOwner', 'O01', '0101');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(10) NOT NULL,
  `Invoice_no` int(10) DEFAULT NULL,
  `Payment_date` varchar(10) DEFAULT NULL,
  `Payment_amount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `Invoice_no`, `Payment_date`, `Payment_amount`) VALUES
(3, 124, '2019-11-21', '60'),
(4, 124, '2019-11-21', '20'),
(5, 124, '2019-11-20', '40'),
(6, 125, '2019-11-13', '100');

-- --------------------------------------------------------

--
-- Table structure for table `proudct`
--

CREATE TABLE `proudct` (
  `Product_Id` varchar(7) NOT NULL,
  `Product_image` mediumblob DEFAULT NULL,
  `Product_price` int(5) DEFAULT NULL,
  `Product_description` varchar(100) DEFAULT NULL,
  `Occasions` varchar(20) DEFAULT NULL,
  `Flowers` varchar(20) DEFAULT NULL,
  `Item` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `proudct`
--

INSERT INTO `proudct` (`Product_Id`, `Product_image`, `Product_price`, `Product_description`, `Occasions`, `Flowers`, `Item`) VALUES
('HF00001', NULL, 250, 'A truly luxurious arrangement of wonderful flowers.', 'Congratulations', 'Mixed', 'Flowers'),
('HF00002', NULL, 150, 'A truly luxurious arrangement of wonderful flowers.', 'Congratulations', 'Mixed', 'Basket'),
('HF00003', NULL, 300, 'A truly luxurious arrangement of wonderful roses.', 'Congratulations', 'Rose', 'Basket'),
('HF00004', NULL, 300, 'A truly luxurious arrangement of wonderful red roses.', 'Congratulations', 'Red Roses', 'Flowers'),
('HF00005', NULL, 100, 'A truly luxurious arrangement of wonderful flowers.', 'Congratulations', 'Mixed', '-'),
('HF00006', NULL, 250, 'A truly luxurious arrangement of wonderful flowers.', 'Birthday', 'Mixed', 'Flowers'),
('HF00007', NULL, 150, 'A truly luxurious arrangement of wonderful flowers.', 'Birthday', 'Mixed', 'Balloon'),
('HF00008', NULL, 120, 'A truly luxurious arrangement of wonderful flowers.', 'Birthday', 'Mixed', 'Balloon'),
('HF00009', NULL, 50, 'A truly luxurious arrangement of wonderful roses.', 'Birthday', 'Rose', 'Balloon'),
('HF00010', NULL, 150, 'A truly luxurious arrangement of wonderful roses.', 'Birthday', 'Rose', 'Balloon'),
('HF00011', NULL, 120, 'A truly luxurious arrangement of wonderful flowers.', 'Graduation', 'Mixed', 'Flowers'),
('HF00012', NULL, 100, 'A truly luxurious arrangement of wonderful flowers.', 'Graduation', 'Mixed', 'Flowers'),
('HF00013', NULL, 150, 'A truly luxurious arrangement of wonderful red roses.', 'Graduation', 'Red Roses', 'Flowers'),
('HF00014', NULL, 100, 'A truly luxurious arrangement of wonderful flowers.', 'Graduation', 'Mixed', 'Flowers'),
('HF00015', NULL, 100, 'A truly luxurious arrangement of wonderful flowers.', 'Graduation', 'Mixed', 'Flowers'),
('HF00016', NULL, 120, 'A truly luxurious arrangement of wonderful flowers.', 'Gws', 'Mixed', 'Balloon'),
('HF00017', NULL, 50, 'A truly luxurious arrangement of wonderful flowers.', 'Gws', 'Mixed', 'Flowers'),
('HF00018', NULL, 150, 'A truly luxurious arrangement of wonderful roses.', 'Gws', 'Rose', ''),
('HF00019', NULL, 130, 'A truly luxurious arrangement of wonderful flowers.', 'Gws', 'Mixed', 'Balloon'),
('HF00020', NULL, 100, 'A truly luxurious arrangement of wonderful flowers.', '-', '-', 'Chocolate'),
('HF00021', NULL, 80, 'A truly luxurious arrangement of wonderful flowers.', 'Condolences', '-', '-'),
('HF00022', NULL, 80, 'A truly luxurious arrangement of wonderful flowers.', 'condolences', 'Mixed', 'Flowers'),
('HF00023', NULL, 100, 'A truly luxurious arrangement of wonderful flowers.', 'condolences', 'Mixed', 'Flowers'),
('HF00024', NULL, 150, 'A truly luxurious arrangement of wonderful flowers.', 'condolences', '-', '-'),
('HF00025', NULL, 50, 'A truly luxurious arrangement of wonderful flowers.', 'condolences', 'Mixed', 'Flowers'),
('HF00026', NULL, 200, 'A truly luxurious arrangement of wonderful red roses.', '-', 'Red Roses', '-'),
('HF00027', NULL, 350, 'A truly luxurious arrangement of wonderful red roses.', '-', 'Red Roses', '-'),
('HF00028', NULL, 80, 'A truly luxurious arrangement of wonderful red roses.', '-', 'Red Roses', '-'),
('HF00029', NULL, 150, 'A truly luxurious arrangement of wonderful roses.', '-', 'Rose', '-'),
('HF00030', NULL, 80, 'A truly luxurious arrangement of wonderful roses.', '-', 'Rose', 'Flowers'),
('HF00031', NULL, 250, 'A truly luxurious arrangement of wonderful flowers.', 'Congratulations', '-', 'Chocolate'),
('HF00032', NULL, 250, 'A truly luxurious arrangement of wonderful flowers.', 'Congratulations', '-', 'Chocolate'),
('HF00033', NULL, 250, 'A truly luxurious arrangement of wonderful flowers.', '-', '-', 'Chocolate'),
('HF00034', NULL, 100, 'A truly luxurious arrangement of wonderful flowers.', '-', '-', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_no`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Owner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `Invoice_no` (`Invoice_no`);

--
-- Indexes for table `proudct`
--
ALTER TABLE `proudct`
  ADD PRIMARY KEY (`Product_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1058;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `proudct` (`Product_Id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Invoice_no`) REFERENCES `invoice` (`Invoice_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
