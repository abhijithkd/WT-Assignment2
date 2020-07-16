-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 08:49 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuition`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `email` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `age` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email`, `name`, `address`, `phone`, `age`, `gender`, `sem`, `stream`, `password`) VALUES
('abhijithkd123@gmail.com', 'Abhijith K D', 'Kothekeril(H) Udayanapuram P O Vaikom', '9847674866', '21', 'male', 'S6', 'CSE', 'abhijith@17'),
('aju@gmail.com', 'Ajith mv', 'Kerala House', '9988774455', '21', 'male', 'S6', 'CSE', 'aju@1234'),
('amal@gmail.com', 'Amal Manoharan', 'Kaithathu House Vaikom', '9946912556', '21', 'male', 'Sem 5', 'ECE', 'amal@99999'),
('amarthya@gmail.com', 'Amarthya Udayan', 'Haritham House UDayanapuram P O Vaikom', '9847674866', '22', 'female', 'S6', 'ECE', 'amarthya@99'),
('anandhumb@gmail.com', 'Anandhu M B', 'Konathil House Udayanapuram P O Vaikom', '9946765121', '21', 'male', 'S4', 'EEE', 'anandhumb@99'),
('anushitha@gmail.com', 'Anushitha P N', 'Kainathil House Thalassery', '9847674866', '20', 'female', 'S6', 'CSE', 'anushitha@99'),
('jili@gmail.com', 'Jili P S', 'Ranimaria House Vallakom', '7887974556', '20', 'female', 'S6', 'CSE', 'jilips@99'),
('manu@gmail.com', 'Manu Ajayan', 'Manayath House, Amballoor', '9454748652', '21', 'male', 'S4', 'CSE', 'manu@1234'),
('rana@gmail.com', 'Akash Rana', 'Madathil House Udayanapuram P O Vaikom', '9847674866', '20', 'male', 'S4', 'CSE', 'akashrana@99'),
('stebin@gmail.com', 'Stebin C X', 'Xavier villa Fort Kochi', '8749562478', '21', 'male', 'S6', 'CSE', 'stebin@17'),
('varghese@gmail.com', 'Varghese Francis', 'Francis Villa Kaloor', '9878456512', '21', 'male', 'S6', 'CSE', 'varghese@99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
