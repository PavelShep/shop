-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 10:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happynewyear`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `kategoria` varchar(255) NOT NULL,
  `liczba_sztuk` varchar(255) NOT NULL,
  `kraj` varchar(255) NOT NULL,
  `kod_pocztowy` varchar(255) NOT NULL,
  `stan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `image`, `opis`, `kategoria`, `liczba_sztuk`, `kraj`, `kod_pocztowy`, `stan`) VALUES
(1, 'Czekoladowy Mikołaj', '10', 'static/img/product-2.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(2, 'Drzewko świąteczne', '990', 'static/img/product-3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'dom i ogród', '12', 'Polska', '66-400', 'Nowy'),
(3, 'Butelki', '101', 'static/img/product-10.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(4, 'Drzewko świąteczne', '99', 'static/img/product-3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(5, 'Słodka skrzyneczka', '60', 'static/img/product-4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(6, 'Figurka Świętego Mikołaja', '200', 'static/img/product-5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(7, 'Bal noworoczny', '30', 'static/img/product-6.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(8, 'Piłka choinkowa', '30', 'static/img/product-7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(9, 'Miszura', '12', 'static/img/product-8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(10, 'Girlanda', '12', 'static/img/product-9.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(11, 'Szampan noworoczny', '24', 'static/img/product-10.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(12, 'Pudełko cukierków', '25', 'static/img/product-11.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(13, 'Prezent', '90', 'static/img/product-12.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(14, 'Noworoczna czapka', '60', 'static/img/product-14.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(15, 'Sparklery', '10', 'static/img/product-15.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy'),
(16, 'Petarda', '80', 'static/img/product-16.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.', 'supermarket', '12', 'Polska', '66-400', 'Nowy');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fio`, `phone`, `email`, `comment`, `product_id`) VALUES
(1, 'Pavel', '+375 29 614-24-99', 'pavel@gmail.com', '', 1),
(2, 'Alex', '', 'Pavel.Shapialevich@student.ajp.edu.pl', '', 1),
(3, 'Jan Kowalski', '123456789', 'jan@example.com', 'Chciałbym szybką dostawę', 1),
(4, 'Anna Nowak', '987654321', 'anna@example.com', 'Proszę zapakować na prezent', 2),
(5, 'Piotr Zieliński', '567890123', 'pavel@gmail.com', 'Można dostarczyć do sąsiada', 1),
(6, 'Katarzyna Wisniewska', '654321987', 'katarzyna@example.com', 'Dziękuję za szybką wysyłkę', 3),
(7, 'pavel', '510378193', 'pavel@gmail.com', 'lox', 2),
(8, 'Pavel', '123456789', 'pavel@gmail.com', 'Zamówienie na prezent.', 1),
(9, 'Pavel', '123456789', 'pavel@gmail.com', 'Lubię drzewka świąteczne.', 2),
(10, 'Alex', '987654321', 'alex@gmail.com', 'Idealny produkt na nowy rok.', 3),
(11, 'Alex', '987654321', 'alex@gmail.com', 'Chcę zamówić kilka rzeczy.', 4),
(12, 'Pavel', '123456789', 'pavel@gmail.com', 'Dla mojej rodziny.', 5),
(13, 'Alex', '987654321', 'alex@gmail.com', 'Świetny produkt!', 6),
(14, 'Pavel', '123456789', 'pavel@gmail.com', 'To będzie idealne.', 7),
(15, 'Alex', '987654321', 'alex@gmail.com', 'Polecam!', 8),
(16, 'Pavel', '123456789', 'pavel@gmail.com', 'Potrzebuję jeszcze raz to samo.', 9),
(17, 'Alex', '987654321', 'alex@gmail.com', 'Dla znajomych.', 10),
(18, 'Pavel', '123456789', 'pavel@gmail.com', 'Sprawdzam jakość.', 11),
(19, 'Alex', '987654321', 'alex@gmail.com', 'Kolejne zamówienie.', 12),
(20, 'Pavel', '123456789', 'pavel@gmail.com', 'Świąteczne zamówienie.', 13),
(21, 'Alex', '987654321', 'alex@gmail.com', 'Noworoczny prezent.', 14),
(22, 'Pavel', '123456789', 'pavel@gmail.com', 'Dla moich znajomych.', 15),
(23, 'Alex', '987654321', 'alex@gmail.com', 'Doskonały produkt!', 16),
(24, 'Pavel', '123456789', 'pavel@gmail.com', 'Prezent dla rodziny.', 1),
(25, 'Alex', '987654321', 'alex@gmail.com', 'Świetna jakość.', 2),
(26, 'Pavel', '123456789', 'pavel@gmail.com', 'Dla dzieci.', 3),
(27, 'Alex', '987654321', 'alex@gmail.com', 'Na nowy rok.', 4),
(28, 'Pavel', '123456789', 'pavel@gmail.com', 'Wyjątkowy produkt.', 5),
(29, 'Alex', '987654321', 'alex@gmail.com', 'Lubię takie rzeczy.', 6),
(30, 'Pavel', '123456789', 'pavel@gmail.com', 'Idealne na prezent.', 7),
(31, 'Alex', '987654321', 'alex@gmail.com', 'Dla dzieci.', 8),
(32, 'Pavel', '123456789', 'pavel@gmail.com', 'Do świątecznego stołu.', 9),
(33, 'Alex', '987654321', 'alex@gmail.com', 'Świąteczny nastrój.', 10),
(34, 'Pavel', '123456789', 'pavel@gmail.com', 'Idealne do dekoracji.', 11),
(35, 'Alex', '987654321', 'alex@gmail.com', 'Doskonały wybór.', 12),
(36, 'Pavel', '123456789', 'pavel@gmail.com', 'Dla rodziny.', 13),
(37, 'Alex', '987654321', 'alex@gmail.com', 'Na nowy rok.', 14),
(38, 'Pavel', '123456789', 'pavel@gmail.com', 'Dla znajomych.', 15),
(39, 'Alex', '987654321', 'alex@gmail.com', 'Kolejny produkt.', 16),
(40, 'Pavel', '123456789', 'pavel@gmail.com', 'Dla siebie.', 1),
(41, 'Alex', '987654321', 'alex@gmail.com', 'Prezent na nowy rok.', 2),
(42, 'Pavel', '123456789', 'pavel@gmail.com', 'Doskonała cena.', 3),
(43, 'Alex', '987654321', 'alex@gmail.com', 'Polecam każdemu.', 4),
(44, 'Pavel', '123456789', 'pavel@gmail.com', 'Super produkt.', 5),
(45, 'Alex', '987654321', 'alex@gmail.com', 'Bardzo dobry wybór.', 6),
(46, 'Pavel', '123456789', 'pavel@gmail.com', 'Świetny pomysł.', 7),
(47, 'Alex', '987654321', 'alex@gmail.com', 'Kolejne zakupy.', 8),
(48, 'Pavel', '123456789', 'pavel@gmail.com', 'Bardzo mi się podoba.', 9),
(49, 'Alex', '987654321', 'alex@gmail.com', 'Super jakość.', 10),
(50, 'Pavel', '123456789', 'pavel@gmail.com', 'Polecam każdemu.', 11),
(51, 'Alex', '987654321', 'alex@gmail.com', 'Najlepszy wybór.', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'pavel', 'pavel@gmail.com', 'pavel', 'user'),
(4, 'alex', 'alex@gmail.com', 'alex', 'user'),
(6, 'lox', 'lox@gmail.com', 'lox', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
