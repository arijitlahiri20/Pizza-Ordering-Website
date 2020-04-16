-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2019 at 08:22 PM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WTL`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `comment`) VALUES
(1, 'a', 'a@a', 'asdas'),
(2, 'Arijit', 'arijit.lahiri20@gmail.com', 'Hello'),
(3, 'a', 'a@a', 'asdas'),
(4, 'Arijit', 'a@a.com', 'Hi'),
(5, 'a', 'a@a.com', 'hello'),
(6, 'a', 'a@a.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `name`, `price`, `quantity`, `total`, `category`) VALUES
(25, 'abc', 'Chicken Fiesta', 435, 2, 870, 'non-veg'),
(43, 'abc', 'Barbeque Chicken', 450, 3, 1350, 'Non-Veg'),
(44, 'abc', 'Cheese N Corn', 230, 2, 460, 'Veg'),
(46, 'abc', 'Onion and Capsicum', 250, 2, 500, 'Veg'),
(47, 'User2', 'Cheese N Corn', 230, 1, 230, 'Veg'),
(48, 'User2', 'Chicken Fiesta', 435, 1, 435, 'Non-Veg'),
(62, 'pict pict', 'Barbeque Chicken', 450, 1, 450, 'Non-Veg'),
(63, 'pict pict', 'Cheese N Corn', 230, 1, 230, 'Veg'),
(64, 'pict pict', 'Chicken Fiesta', 435, 1, 435, 'Non-Veg'),
(68, 'admin', 'Barbeque Chicken', 450, 0, 0, 'Non-Veg'),
(69, 'admin', 'Cheese N Corn', 230, 2, 460, 'Veg'),
(70, 'admin', 'Chicken Fiesta', 435, 1, 435, 'Non-Veg');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `src` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `price`, `quantity`, `category`, `description`, `src`) VALUES
(1, 'Barbeque Chicken', 450, 20, 'Non-Veg', 'Pepper barbecue chicken for that extra zing and lots of extra cheese', 'PepperBarbecueChicken.jpg'),
(7, 'Cheese N Corn', 230, 20, 'Veg', 'Sweet I Juicy Golden corn and 100% real mozzarella cheese in a delectable combination', 'Corn_cheese.png'),
(8, 'Chicken Fiesta', 435, 20, 'Non-Veg', 'Grilled chicken rashers I peri-peri chicken I onion I capsicum I a complete fiesta', 'chickenFiesta.png'),
(2, 'Chicken Sausage', 420, 15, 'Non-Veg', 'American classic! Spicy I herbed chicken sausage on pizza', 'Chicken_Sausage.png'),
(9, 'Farmhouse', 350, 20, 'Veg', 'Delightful combination of onion I capsicum I tomato I grilled mushroom', 'farmhouse.png'),
(3, 'Margherita', 200, 20, 'Veg', 'A classic delight with 100% Real mozzarella cheese and cheddar cheese', 'margherita.png'),
(4, 'Onion and Capsicum', 250, 20, 'Veg', 'Delectable combination of onion I capsicum I a veggie lovers pick', 'onion_and_capsicum.png'),
(5, 'Paneer Tikka', 300, 15, 'Veg', 'Flavorful trio of juicy paneer I crisp capsicum with spicy red paprika', 'PaneerTikka.jpg'),
(6, 'Pepperoni', 400, 25, 'Non-Veg', 'A classic American taste! Relish the delectable flavor of Chicken Pepperoni', 'pepperoni.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `orders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FirstName`, `LastName`, `username`, `password`, `email`, `orders`) VALUES
('Arijit', 'Lahiri', 'abc', '123', 'arijit.lahiri20@gmail.com', 0),
('Admin', 'User', 'admin', 'admin', 'admin@admin.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
