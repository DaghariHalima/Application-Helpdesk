-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struct of table: `Client`
--

CREATE TABLE `Client` (
  `id` int(11) NOT NULL,
  `dbfield1` text NOT NULL,
  `dbfield2` text NOT NULL,
  `dbfield3` text NOT NULL,
  `dbfield4` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index of table: `tClient`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT of table `Client`
--
ALTER TABLE `Client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;


