-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2022 pada 15.12
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menulist`
--

CREATE TABLE `menulist` (
  `id_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menulist`
--

INSERT INTO `menulist` (`id_menu`, `nama_menu`, `harga`, `image`, `description`) VALUES
('makan001', 'popcorn', 20000, 'Popcorn.jpg', 'Enak banget pokoknya harus beli'),
('minum001', 'cola', 15000, '', ''),
('minum0013', 'Popcorn', 15000, 'popcorn.jpg', 'djhasgdjsagdawgd faghsvxbsavcaccvvvvvvvhssss ssssssssssstgxjahdgkDKJWND');

-- --------------------------------------------------------

--
-- Struktur dari tabel `movielist`
--

CREATE TABLE `movielist` (
  `movieId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Genre` varchar(25) DEFAULT NULL,
  `Director` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imdb` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `movielist`
--

INSERT INTO `movielist` (`movieId`, `Name`, `Genre`, `Director`, `Description`, `image`, `imdb`, `harga`) VALUES
(1, 'Batman Begins', 'Action', 'Christopher Nolan', 'A young Bruce Wayne (Christian Bale) travels to the Far East, where he\'s trained in the martial arts by Henri Ducard (Liam Neeson), a member of the mysterious League of Shadows. ', 'batman.jpg', '9.5', 50000),
(2, 'Spider-Man: Homecoming (2017)', 'Adventure', 'Jon Watts', 'Thrilled by his experience with the Avengers, young Peter Parker returns home to live with his Aunt May. Under the watchful eye of mentor Tony Stark, Parker starts to embrace his newfound identity as Spider-Man.', 'spiderman.jpg', '8.5', 45000),
(3, 'Fight Club', 'Action', 'David Fincher', 'A depressed man (Edward Norton) suffering from insomnia meets a strange soap salesman named Tyler Durden (Brad Pitt) and soon finds himself living in his squalid house after his perfect apartment is destroyed. The two bored men form an underground club wi', 'fightClub.jpg', '8.8', 50000),
(4, 'Gladiator', 'Action', 'Ridley Scott', 'Commodus (Joaquin Phoenix) takes power and strips rank from Maximus (Russell Crowe), one of the favored generals of his predecessor and father, Emperor Marcus Aurelius, the great stoical philosopher. Maximus is then relegated to fighting to the death in t', 'gladiator.jpg', '8.5', 0),
(5, 'Star Wars', 'Adventure', 'George Lucas', 'Star Wars is an American epic space opera franchise, centered on a film series created by George Lucas. It depicts the adventures of various characters \"a long time ago in a galaxy far, far away\"', 'starwars.png', '9', 0),
(6, 'Despicable Me 3', 'Comedy', 'Pierre Coffin, Kyle Balda', 'The mischievous Minions hope that Gru will return to a life of crime after the new boss of the Anti-Villain League fires him. Instead, Gru decides to remain retired and travel to Freedonia to meet his long-lost twin brother for the first time. The reunite', 'despicableme.jpg', '6.4', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `showorder`
--

CREATE TABLE `showorder` (
  `showOrderId` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timeslot` varchar(255) NOT NULL,
  `theater` varchar(255) NOT NULL,
  `movieName` varchar(255) NOT NULL,
  `seat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `showorder`
--

INSERT INTO `showorder` (`showOrderId`, `date`, `timeslot`, `theater`, `movieName`, `seat`) VALUES
(1, '2017-07-30', '11.00', 'Basundhara Cineplex', 'Batman Begins', '49'),
(2, '2017-07-31', '5.00', 'BlockBluster', 'Gladiator', '49'),
(3, '2017-08-01', '2.00', 'Balaka Cineplex', 'Spider-Man: Homecoming (2017)', '48'),
(4, '2017-08-16', '8.00', 'Balaka Cineplex', 'Batman Begins', '49'),
(5, '2017-08-23', '11.00', 'Basundhara Cineplex', 'Batman Begins', '50'),
(6, '2017-08-17', '2.00', 'Basundhara Cineplex', 'Batman Begins', '48'),
(7, '2017-11-16', '11.00', 'Shamoly Cineplex', 'Batman Begins', '50'),
(8, '2022-10-07', '11.00', 'Basundhara Cineplex', 'Fight Club', '50'),
(9, '', '11.00', 'Basundhara Cineplex', 'Gladiator', '49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `theater`
--

CREATE TABLE `theater` (
  `theaterId` int(11) NOT NULL,
  `theaterName` varchar(255) DEFAULT NULL,
  `seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `theater`
--

INSERT INTO `theater` (`theaterId`, `theaterName`, `seat`) VALUES
(1, 'Basundhara Cineplex', 50),
(2, 'BlockBluster', 45),
(3, 'Balaka Cineplex', 60),
(4, 'Shamoly Cineplex', 70),
(5, 'Cineplex', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `timeslot`
--

CREATE TABLE `timeslot` (
  `timeslotId` int(11) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `timeslot`
--

INSERT INTO `timeslot` (`timeslotId`, `time`) VALUES
(1, '11.00'),
(2, '2.00'),
(3, '5.00'),
(4, '8.00'),
(5, '9.00'),
(6, '11.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `status`) VALUES
(1, 'admin', 'admin', 101),
(3, 'user', 'user', 202),
(6, 'Melani', 'melani', 202);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menulist`
--
ALTER TABLE `menulist`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `movielist`
--
ALTER TABLE `movielist`
  ADD PRIMARY KEY (`movieId`);

--
-- Indeks untuk tabel `showorder`
--
ALTER TABLE `showorder`
  ADD PRIMARY KEY (`showOrderId`);

--
-- Indeks untuk tabel `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`theaterId`);

--
-- Indeks untuk tabel `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`timeslotId`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `movielist`
--
ALTER TABLE `movielist`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `showorder`
--
ALTER TABLE `showorder`
  MODIFY `showOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `theater`
--
ALTER TABLE `theater`
  MODIFY `theaterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `timeslotId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
