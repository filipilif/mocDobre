-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `mocdobre` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `mocdobre`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `car` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `users` (`id`, `name`, `password`, `car`, `description`, `created`, `deleted`) VALUES
(15,	'admin',	'$2y$10$pmkwkpN3pk2SLAXmFBZ22O.Fv.B/sJto1sM9JCUKNyyJA3M6BObR2',	'Spaceship',	'Šéf.',	'2017-04-28 15:05:47',	NULL),
(16,	'Cecílie',	'$2y$10$Ol2qlFTlkAQ4RJUfdLoaleBJMXz8kK7gaatkDN6ZUSoxpy0W8.O6u',	'Moje auto',	'Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.',	'2017-04-28 15:18:41',	NULL),
(17,	'Lubomír',	'$2y$10$lmT2gkwVbOPx5k1OlVV8ZO/yUdRoOkjtbtuloPgBkkAOOTWVVZfmG',	'Škoda Fabia',	'Vysoký a široký.',	'2017-04-28 15:19:50',	NULL),
(18,	'admin2',	'$2y$10$I82MRMHNZPMD1ZZQF/mX7eEAKlZZcEwpyF9ymXOeiTadWmS0M8yxi',	'Vlak',	'Heslo je \"heslo2\".',	'2017-04-28 15:44:42',	NULL),
(19,	'Smazanec',	'$2y$10$awVbCoIwMGDVwbC5DzN9/Oua6191IVokajGq66osucdYddDvE.Qzu',	'Octavia',	'Will be deleted.',	'2017-04-28 15:46:47',	'2017-04-28 15:47:01'),
(20,	'Další mazák',	'$2y$10$3nEt/Ae7GNcYVGWPbd2cb.z5w8VJY4TCg8M9FpvFGefIFY74VE0ZW',	'Vlakoun',	'Yes.',	'2017-04-28 16:14:57',	'2017-04-28 16:15:03'),
(21,	'Kamil',	'$2y$10$YFyez5SnT4W/at0Cez/ntejgKB6kJWpgfsqjq2q1pyQEJFUyMcmCe',	'Suzuki',	'Dobrý hodně dobrý. Jo.',	'2017-04-28 16:16:22',	NULL),
(22,	'iop',	'$2y$10$iHg5W/VO7libqDgetDcxEeGA6TnD.YUyWXG.UZ6rwveMmIE/BQSYi',	'iop',	'iop a heslo je iop\n',	'2017-04-28 16:17:20',	NULL),
(23,	'jj',	'$2y$10$hiN3x3MNHLpcqDS7t.xSDOXF87fwAnvZH76KL4tGczhIIqGPLu5VC',	'jj',	'jj',	'2017-04-28 16:19:22',	'2017-04-28 16:22:57');

-- 2017-04-28 16:29:08
