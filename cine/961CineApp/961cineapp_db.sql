-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 11:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `961cineapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `beverages`
--

CREATE TABLE IF NOT EXISTS `beverages` (
  `beverageID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`beverageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `beverages`
--

INSERT INTO `beverages` (`beverageID`, `name`, `category`, `price`, `picture`) VALUES
(1, 'Chocolate Popcorn', 'Popcorns', 5, 'chocolate-popcorn.jpg'),
(10, 'Coffee Milkshake', 'Drinks', 12, 'coffee-milkshake-square.jpg'),
(11, 'Caramel Popcorn', 'Popcorns', 5, 'Caramel_Popcorn.jpg'),
(12, 'Popcorn', 'Popcorns', 5, 'Movie-Popcorn-Tubs.jpg'),
(13, 'Orange Juice', 'Drinks', 3, 'Orange-Juice-1-of-1.jpeg'),
(14, 'Strawberry Juice', 'Drinks', 3, 'strawberry-juice-recipe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bookingID` varchar(100) NOT NULL,
  `showID` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `movieID` int(11) NOT NULL,
  `numberOfTickets` int(11) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `cardExpDate` date NOT NULL,
  `discountedPrice` double NOT NULL,
  `createdDate` date NOT NULL,
  PRIMARY KEY (`bookingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `showID`, `userID`, `movieID`, `numberOfTickets`, `payment`, `cardNumber`, `cardExpDate`, `discountedPrice`, `createdDate`) VALUES
('1645aadef24e42', 1, '7642c95aac67cd', 12642, 4, 'Credit Card', 0, '0000-00-00', 7, '2023-05-09'),
('8645ba04825037', 1, '7642c95aac67cd', 12642, 3, 'Credit Card', 2147483647, '2024-03-01', 5.25, '2023-05-10'),
('8645f67e367a2c', 2, '7642c95aac67cd', 12660, 5, 'Cash', 0, '0000-00-00', 22.5, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(4, 'Crime'),
(5, 'Horror'),
(6, 'Comedy'),
(7, 'History'),
(8, 'Romance'),
(9, 'Cartoon'),
(10, 'Sci-Fi'),
(11, 'Drama'),
(12, 'Musical');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
  `discountID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolName` varchar(100) NOT NULL,
  `percentage` int(11) NOT NULL,
  `couponCode` varchar(100) NOT NULL,
  PRIMARY KEY (`discountID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discountID`, `schoolName`, `percentage`, `couponCode`) VALUES
(1, 'Lebanese International University - Tripoli Campus', 25, 'liuT25'),
(2, 'Lebanese International University - Beirut Campus', 20, 'liuB20');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movieID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `releaseDate` date NOT NULL,
  `language` varchar(100) NOT NULL,
  `poster` varchar(1000) NOT NULL,
  `trailer` varchar(1000) NOT NULL,
  `rate` int(11) NOT NULL,
  PRIMARY KEY (`movieID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12662 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieID`, `title`, `category`, `duration`, `releaseDate`, `language`, `poster`, `trailer`, `rate`) VALUES
(12642, 'The Swimmers', 'Drama', '2h 15mins', '2022-04-04', 'English', 'the swimmers.jpg', 'The Swimmers _ Official Teaser _ Netflix_144p.mp4', 4),
(12649, 'The Gray Man', 'Action', '2h 2mins', '2022-05-09', 'English', 'the gray man.jpg', 'THE GRAY MAN _ Official Trailer _ Netflix_144p.mp4', 0),
(12650, 'Murder Mystery 2', 'Comedy', '1h 29mins', '2023-03-24', 'English', 'Murder Mystery 2.jpg', 'Murder Mystery 2 _ Official Trailer _ Netflix.mp4', 2),
(12651, 'Ant-Man and the Wasp: Quantumania', 'Action', '1h 5mins', '2023-02-17', 'English', 'ant man and the wasp quantumania.jpeg', 'Marvel Studios’ Ant-Man and The Wasp_ Quantumania _ Official Trailer.mp4', 0),
(12652, 'Creed III', 'Drama', '1h 57mins', '2023-03-03', 'English', 'Creed III.jpg', 'CREED III _ Official Trailer.mp4', 0),
(12653, 'Scream VI', 'Horror', '2h 2mins', '2023-03-10', 'English', 'Scream 4.jpg', 'Scream VI _ Official Trailer (2023 Movie).mp4', 0),
(12654, 'The Super Mario Bros. Movie', 'Adventure', '1h 32mins', '2023-04-05', 'English', 'The Super Mario Bros. Movie.jpg', 'The Super Mario Bros. Movie _ Official Trailer.mp4', 0),
(12655, 'Fast X', 'Action', '2h 2mins', '2023-05-19', 'English', 'Fast X.jpg', 'FAST X _ Official Trailer 2.mp4', 0),
(12656, 'Indiana Jones and the Dial of Destiny', 'Adventure', '2h 22mins', '2023-06-30', 'English', 'Indiana Jones and the Dial of Destiny.jpg', 'Indiana Jones and the Dial of Destiny _ Official Trailer.mp4', 0),
(12657, 'Mission: Impossible - Dead Reckoning Part One', 'Action', '2h 2mins', '2023-07-14', 'English', 'Mission-_Impossible.jpg', 'Mission_ Impossible – Dead Reckoning Part One _ Official Teaser Trailer (2023 Movie) - Tom Cruise.mp4', 0),
(12658, 'Gran Turismo', 'Drama', '', '2023-08-11', 'English', 'Gran Turismo.jpg', 'GRAN TURISMO – Exclusive Sneak Peek.mp4', 0),
(12659, 'Plane', 'Action', '1h 47mins', '2023-01-13', 'English', 'Plane.jpg', 'Plane (2023) Official Trailer – Gerard Butler, Mike Colter, Yoson An.mp4', 0),
(12660, 'Saw X', 'Horror', '', '2023-10-27', 'English', 'Saw X.jpg', 'Saw Unrated (4K) - Official Trailer (2021).mp4', 3),
(12661, 'transformers rise of the beasts', 'Sci-Fi', '', '2023-06-09', 'English', 'transformers rise of the beasts.jpg', 'Transformers_ Rise of the Beasts _ Official Teaser Trailer (2023 Movie).mp4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `showID` int(11) NOT NULL AUTO_INCREMENT,
  `movieID` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `hall` varchar(100) NOT NULL,
  `ticketPrice` int(11) NOT NULL,
  PRIMARY KEY (`showID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`showID`, `movieID`, `date`, `startTime`, `hall`, `ticketPrice`) VALUES
(1, 12642, '2023-04-28', '18:00:00', 'B', 7),
(2, 12660, '2023-06-10', '19:30:00', 'D', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fullName`, `email`, `phone`, `password`) VALUES
('7642c95aac67cd', 'Brian', 'brian@gmail.com', '70123456', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
