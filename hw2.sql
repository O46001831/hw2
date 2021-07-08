-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 08, 2021 alle 19:21
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw2`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `elements`
--

CREATE TABLE `elements` (
  `ID` int(11) NOT NULL,
  `nome_utente` varchar(100) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `titolo` varchar(200) DEFAULT NULL,
  `link_immagine` varchar(200) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `quantita` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `nome_utente` varchar(255) DEFAULT NULL,
  `n_ordine` int(11) DEFAULT NULL,
  `prezzo_tot` float DEFAULT NULL,
  `id_prodotto` int(11) DEFAULT NULL,
  `titolo` varchar(100) DEFAULT NULL,
  `link_immagine` varchar(200) DEFAULT NULL,
  `quantita` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`ID`, `nome_utente`, `n_ordine`, `prezzo_tot`, `id_prodotto`, `titolo`, `link_immagine`, `quantita`, `created_at`, `updated_at`) VALUES
(11, 'admin', 1, 3.38, 2, 'Tagliolini De Cecco', 'img/taglioliniDeCecco.jpg', 2, '2021-07-08 13:38:54', '2021-07-08 13:38:54'),
(12, 'admin', 2, 8.96, 3, 'Hamburger di pollo AIA', 'img/hamburgerDiPolloAIA.jpg', 2, '2021-07-08 13:47:08', '2021-07-08 13:47:08'),
(13, 'admin', 2, 8.96, 4, 'Involtini Glorioso', 'img/involtiniDiPistacchioGlorioso.jpg', 1, '2021-07-08 13:47:08', '2021-07-08 13:47:08'),
(14, 'admin', 2, 8.96, 5, 'Bastoncini Findus 6pz.', 'img/bastonciniFindus.jpg', 1, '2021-07-08 13:47:08', '2021-07-08 13:47:08'),
(15, 'marco01', 1, 8.25, 2, 'Tagliolini De Cecco', 'img/taglioliniDeCecco.jpg', 2, '2021-07-08 14:02:48', '2021-07-08 14:02:48'),
(16, 'marco01', 1, 8.25, 1, 'Penne Barilla 1kg', 'img/barillaPenneRigate1kg.jpg', 2, '2021-07-08 14:02:48', '2021-07-08 14:02:48'),
(17, 'marco01', 1, 8.25, 3, 'Hamburger di pollo AIA', 'img/hamburgerDiPolloAIA.jpg', 1, '2021-07-08 14:02:48', '2021-07-08 14:02:48');

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `titolo` varchar(100) DEFAULT NULL,
  `link_immagine` varchar(200) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `descrizione` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`ID`, `titolo`, `link_immagine`, `prezzo`, `descrizione`, `created_at`, `updated_at`) VALUES
(1, 'Penne Barilla 1kg', 'img/barillaPenneRigate1kg.jpg', 1.29, 'Penne rigate Barilla confezione da 1kg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Tagliolini De Cecco', 'img/taglioliniDeCecco.jpg', 1.69, 'Tagliolini n.206 De Cecco lenta essiccazione 500g', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Hamburger di pollo AIA', 'img/hamburgerDiPolloAIA.jpg', 2.29, 'Hamburger di pollo AIA 300g', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Involtini Glorioso', 'img/involtiniDiPistacchioGlorioso.jpg', 2.89, 'Involtini di carne di manzo con granella di pistacchio 6pz', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Bastoncini Findus 6pz.', 'img/bastonciniFindus.jpg', 1.49, 'Bastoncini Findus 6pz 150g', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Tonno Rio Mare', 'img/tonnoRioMare.jpg', 2.49, 'Tonno Rio Mare in scatola 30g 4pz', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Iceberg Bonduelle', 'img/icebergBonduelle.jpg', 0.99, 'Iceberg Bonduelle 200g', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Tofu Valsoia', 'img/tofuValsoia.jpg', 1.89, 'Tofu Valsoia 100% vegetale 250g', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Coca-Cola 1,5L', 'img/cocacola1,5L.jpg', 3.99, 'Coca-Cola 6 bottiglie 1,5L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Fanta 1,5L', 'img/fanta1,5L.jpg', 3.79, 'Fanta orange 6 bottiglie 1,5L', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `id_prodotto` int(11) DEFAULT NULL,
  `nome_utente` varchar(50) DEFAULT NULL,
  `commento` varchar(1024) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `reviews`
--

INSERT INTO `reviews` (`ID`, `id_prodotto`, `nome_utente`, `commento`, `created_at`, `updated_at`) VALUES
(6, 2, 'admin', 'La pasta piu\' buona del mondo', '2021-07-08 10:41:11', '2021-07-08 10:41:11'),
(7, 1, 'admin', 'Mi piace', '2021-07-08 10:41:22', '2021-07-08 10:41:22'),
(8, 3, 'admin', 'Questi hamburger sono delizioni!', '2021-07-08 12:18:18', '2021-07-08 12:18:18'),
(9, 3, 'marco01', 'I più buoni del mondo.', '2021-07-08 14:02:41', '2021-07-08 14:02:41');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `indirizzo` varchar(60) NOT NULL,
  `cellulare` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`ID`, `nome`, `cognome`, `indirizzo`, `cellulare`, `username`, `password`, `created_at`, `updated_at`) VALUES
(10, 'Cristian', 'Cataldo', 'Via Orlando 30', '3668405202', 'admin', 'admin', '2021-07-07 15:54:21', '2021-07-07 15:54:21'),
(11, 'marco', 'barbagallo', 'Via Litteri 40', '123123123123', 'marco01', 'fozzacatania!', '2021-07-07 13:56:26', '2021-07-07 13:56:26');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`ID`,`nome_utente`,`id_prodotto`),
  ADD KEY `nomeUtente` (`nome_utente`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `elements`
--
ALTER TABLE `elements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
