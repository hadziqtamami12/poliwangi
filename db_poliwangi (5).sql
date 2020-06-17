-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Jun 2020 pada 06.42
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poliwangi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `jabatan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Dosen'),
(2, 'Satpam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jam_kerja`
--

CREATE TABLE `tb_jam_kerja` (
  `id_jam_kerja` int(5) NOT NULL,
  `jam_masuk_kerja` time DEFAULT NULL,
  `jam_pulang_kerja` time DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `keterangan_hari` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_jam_kerja`
--

INSERT INTO `tb_jam_kerja` (`id_jam_kerja`, `jam_masuk_kerja`, `jam_pulang_kerja`, `id_jabatan`, `keterangan_hari`) VALUES
(1, '07:00:00', '16:00:00', 1, 'Senin - Kamis'),
(2, '07:00:00', '15:00:00', 1, 'Jum\'at');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_golongan`
--

CREATE TABLE `tb_level_golongan` (
  `id_level_golongan` int(5) NOT NULL,
  `level_golongan` varchar(45) DEFAULT NULL,
  `uang_makan` int(11) NOT NULL,
  `pajak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_level_golongan`
--

INSERT INTO `tb_level_golongan` (`id_level_golongan`, `level_golongan`, `uang_makan`, `pajak`) VALUES
(1, 'PNS/CPNS I/II', 35000, 0),
(2, 'Honorer/Kontrak I/II', 20000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_user`
--

CREATE TABLE `tb_level_user` (
  `id_level_user` int(5) NOT NULL,
  `level_user` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_level_user`
--

INSERT INTO `tb_level_user` (`id_level_user`, `level_user`) VALUES
(1, 'Admin'),
(2, 'Kepegawaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(45) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `id_jabatan` int(5) DEFAULT NULL,
  `id_level_golongan` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `no_hp`, `id_jabatan`, `id_level_golongan`) VALUES
(1, 'Hadziq', '0812345678', 1, 1),
(2, 'Tamami', '089876543', 2, 2),
(3, 'Siapa', '089876888', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `id_jam_kerja` int(5) NOT NULL,
  `keterangan_telat` varchar(45) DEFAULT 'tidak ada',
  `keterangan_psw` varchar(45) DEFAULT 'tidak ada',
  `tanggal_sekarang` date NOT NULL DEFAULT current_timestamp(),
  `id_status_hari` int(5) DEFAULT NULL,
  `ijin` varchar(45) DEFAULT 'tidak ada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `id_pegawai`, `jam_masuk`, `jam_pulang`, `id_jam_kerja`, `keterangan_telat`, `keterangan_psw`, `tanggal_sekarang`, `id_status_hari`, `ijin`) VALUES
(1, 1, '06:20:00', '17:30:00', 1, 'tidak ada', 'tidak ada', '2020-06-17', NULL, 'tidak ada'),
(2, 2, '07:30:00', '15:30:00', 1, 'tidak ada', 'tidak ada', '2020-06-17', NULL, 'tidak ada'),
(3, 1, NULL, NULL, 1, 'tidak ada', 'tidak ada', '2020-06-16', 1, 'tidak ada'),
(4, 3, NULL, NULL, 1, 'tidak ada', 'tidak ada', '2020-06-17', NULL, 'tidak ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekap`
--

CREATE TABLE `tb_rekap` (
  `id_rekap` int(11) NOT NULL,
  `id_pegawai` int(5) DEFAULT NULL,
  `id_jabatan` int(5) DEFAULT NULL,
  `id_level_golongan` int(5) DEFAULT NULL,
  `id_presensi` int(11) DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_rekap`
--

INSERT INTO `tb_rekap` (`id_rekap`, `id_pegawai`, `id_jabatan`, `id_level_golongan`, `id_presensi`, `id_user`) VALUES
(1, 1, 1, 1, 1, 2),
(2, 2, 2, 2, 2, 1),
(3, 1, 1, 1, 3, 2),
(4, 3, 1, 2, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_shift_security`
--

CREATE TABLE `tb_shift_security` (
  `id_shift_security` int(5) NOT NULL,
  `shift_status` varchar(45) DEFAULT NULL,
  `shift_masuk` time DEFAULT NULL,
  `shift_pulang` time DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_shift_security`
--

INSERT INTO `tb_shift_security` (`id_shift_security`, `shift_status`, `shift_masuk`, `shift_pulang`, `id_pegawai`) VALUES
(1, 'Pagi', '07:00:00', '16:00:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_hari`
--

CREATE TABLE `tb_status_hari` (
  `id_status_hari` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` varchar(50) NOT NULL,
  `color` varchar(7) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status_hari`
--

INSERT INTO `tb_status_hari` (`id_status_hari`, `title`, `start_date`, `end_date`, `description`, `color`, `create_at`) VALUES
(1, 'l', '2020-06-09 00:00:00', '2020-06-10 00:00:00', 'l', '#40E0D0', '2020-06-10 11:06:20'),
(3, 'pppp', '2020-06-11 00:00:00', '2020-06-12 00:00:00', 'llll', '', '2020-06-10 11:06:36'),
(4, 'Eapsp', '2020-06-02 00:00:00', '2020-06-03 00:00:00', 'aspp?', '#1149D7', '2020-06-10 11:15:31'),
(5, 'stat', '2020-06-03 00:00:00', '2020-06-04 00:00:00', 'as', '#C68C8C', '2020-06-12 08:33:03'),
(7, 'cobacoba', '2020-06-01 00:00:00', '2020-06-02 00:00:00', 'sasa', '#22EB48', '2020-06-12 08:33:21'),
(8, 'cobacoba dul', '2020-06-04 00:00:00', '2020-06-05 00:00:00', 'dul', '#B84D4D', '2020-06-12 08:35:05'),
(9, 'cobacoba ajah', '2020-06-04 00:00:00', '2020-06-05 00:00:00', 'ajah', '#5677BA', '2020-06-12 08:35:05'),
(10, 'cobacoba', '2020-06-04 00:00:00', '2020-06-05 00:00:00', 'l', '#C4B738', '2020-06-12 08:35:05'),
(11, 'cobacoba', '2020-06-04 00:00:00', '2020-06-05 00:00:00', 'l', '#C4B738', '2020-06-12 08:35:05'),
(12, 'l', '2020-06-05 00:00:00', '2020-06-06 00:00:00', 'l', '#38C460', '2020-06-12 08:35:20'),
(14, 'l', '2020-06-05 00:00:00', '2020-06-06 00:00:00', 'l', '#38C460', '2020-06-12 08:35:20'),
(15, 'l', '2020-06-05 00:00:00', '2020-06-06 00:00:00', 'l', '#38C460', '2020-06-12 08:35:20'),
(16, 'l', '2020-06-05 00:00:00', '2020-06-06 00:00:00', 'l', '#38C460', '2020-06-12 08:35:20'),
(18, 'as', '2020-06-08 00:00:00', '2020-06-09 00:00:00', 'as', '#BAEB1C', '2020-06-12 08:41:09'),
(21, 'sssss', '2020-06-15 00:00:00', '2020-06-16 00:00:00', 'aasss', '#D52727', '2020-06-14 15:53:58'),
(22, 'tes', '2020-06-16 00:00:00', '2020-06-17 00:00:00', 'tes', '#963939', '2020-06-14 15:55:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_hari_old`
--

CREATE TABLE `tb_status_hari_old` (
  `id_status_hari` int(5) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status_hari` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_status_hari_old`
--

INSERT INTO `tb_status_hari_old` (`id_status_hari`, `tanggal`, `status_hari`) VALUES
(1, '2020-06-01', 'Hari Lahir Pancasila');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `id_level_user`) VALUES
(1, 'Muhammad Hadziq Tamami', 'admin', 'admin', 1),
(2, 'Paijo', 'poliwangi', 'poliwangi', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_jam_kerja`
--
ALTER TABLE `tb_jam_kerja`
  ADD PRIMARY KEY (`id_jam_kerja`),
  ADD KEY `id_level_golongan_idx` (`id_jabatan`);

--
-- Indeks untuk tabel `tb_level_golongan`
--
ALTER TABLE `tb_level_golongan`
  ADD PRIMARY KEY (`id_level_golongan`);

--
-- Indeks untuk tabel `tb_level_user`
--
ALTER TABLE `tb_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan_idx` (`id_jabatan`),
  ADD KEY `id_level_golongan_idx` (`id_level_golongan`);

--
-- Indeks untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_pegawai_idx` (`id_pegawai`),
  ADD KEY `id_status_hari_idx` (`id_status_hari`),
  ADD KEY `id_jam_kerja` (`id_jam_kerja`);

--
-- Indeks untuk tabel `tb_rekap`
--
ALTER TABLE `tb_rekap`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_pegawai_idx` (`id_pegawai`),
  ADD KEY `id_jabatan_idx` (`id_jabatan`),
  ADD KEY `id_level_golongan_idx` (`id_level_golongan`),
  ADD KEY `id_presensi_idx` (`id_presensi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_shift_security`
--
ALTER TABLE `tb_shift_security`
  ADD PRIMARY KEY (`id_shift_security`),
  ADD KEY `id_pegawai_idx` (`id_pegawai`);

--
-- Indeks untuk tabel `tb_status_hari`
--
ALTER TABLE `tb_status_hari`
  ADD PRIMARY KEY (`id_status_hari`);

--
-- Indeks untuk tabel `tb_status_hari_old`
--
ALTER TABLE `tb_status_hari_old`
  ADD PRIMARY KEY (`id_status_hari`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level_user_idx` (`id_level_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_level_golongan`
--
ALTER TABLE `tb_level_golongan`
  MODIFY `id_level_golongan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rekap`
--
ALTER TABLE `tb_rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_shift_security`
--
ALTER TABLE `tb_shift_security`
  MODIFY `id_shift_security` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_status_hari`
--
ALTER TABLE `tb_status_hari`
  MODIFY `id_status_hari` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jam_kerja`
--
ALTER TABLE `tb_jam_kerja`
  ADD CONSTRAINT `id_level_golongan` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `id_jabatan3` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_level_golongan4` FOREIGN KEY (`id_level_golongan`) REFERENCES `tb_level_golongan` (`id_level_golongan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD CONSTRAINT `id_pegawai6` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_status_hari7` FOREIGN KEY (`id_status_hari`) REFERENCES `tb_status_hari` (`id_status_hari`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_presensi_ibfk_1` FOREIGN KEY (`id_jam_kerja`) REFERENCES `tb_jam_kerja` (`id_jam_kerja`);

--
-- Ketidakleluasaan untuk tabel `tb_rekap`
--
ALTER TABLE `tb_rekap`
  ADD CONSTRAINT `id_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_presensi` FOREIGN KEY (`id_presensi`) REFERENCES `tb_presensi` (`id_presensi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_shift_security`
--
ALTER TABLE `tb_shift_security`
  ADD CONSTRAINT `id_pegawai5` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `id_level_user` FOREIGN KEY (`id_level_user`) REFERENCES `tb_level_user` (`id_level_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
