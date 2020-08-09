-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Jul 2020 pada 03.10
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
  `jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Direktur'),
(2, 'Wakil Direktur Bidang Akademik '),
(3, 'Wakil Direktur Bidang Umum dan Keuangan'),
(4, 'Wakil Direktur Bidang Kemahasiswaan'),
(5, 'Ketua Jurusan Teknik Informatika'),
(6, 'Ketua Jurusan Teknik Mesin'),
(7, 'Ketua Jurusan Teknik Sipil'),
(8, 'Sekretaris Jurusan Teknik Informatika'),
(9, 'Sekretaris Jurusan Teknik Mesin'),
(10, 'Sekretaris Jurusan Teknik Sipil'),
(11, 'Kepala Bagian Adm Akademik dan Kemahasiswaan'),
(12, 'Kasubbag Umum dan Kepegawaian (plt)'),
(13, 'Kasubbag Keuangan'),
(14, 'Ketua Pusat Penelitian dan Pengabdian Kepada Masyarakat'),
(15, 'Ketua Pusat Penjaminan Mutu'),
(16, 'Ketua Pusat Perencanaan dan Sistem Informasi'),
(17, 'Ketua Unit Perpustakaan'),
(18, 'Ketua UPT Teknologi Informasi dan Komunikasi'),
(19, 'Ketua Unit Layanan Pengadaan'),
(20, 'Ketua Unit Pelayanan Kelas'),
(21, 'Ketua Unit Kewirausahaan dan Kerjasama'),
(22, 'Ketua Unit Job Placement Center'),
(23, 'Ketua Unit Poliklinik'),
(24, 'Ketua Unit Hotel'),
(25, 'Kalab Bahasa'),
(26, 'Kalab T.Informatika'),
(27, 'Kalab T. Sipil'),
(28, 'Kalab T. Mesin'),
(29, 'Kalab TPHT'),
(30, 'Kalab MBP'),
(31, 'Kalab Agribisnis'),
(32, 'Kalab TMK'),
(33, 'Kord Prodi Teknik Informatika'),
(34, 'Kord Prodi Teknik Mesin'),
(35, 'Kord Prodi  Teknik Sipil'),
(36, 'Kord Prodi  Manaj Bisnis Pariwisata'),
(37, 'Kord Prodi Tek. Pengolahan Hasil Ternak'),
(38, 'Kord Prodi Agribisnis'),
(39, 'Kord Prodi Manufaktur Kapal'),
(40, 'Kord Hubungan Masyarakat'),
(41, 'Kord Unit MKDU'),
(42, 'Kord Urusan Internasional'),
(43, 'Kord Pemeliharaan, Perbaikan Sarana, Prasarana, Kebersihan dan Keindahan'),
(44, 'Kepala Satuan Pengamanan'),
(45, 'Wakil Kepala Satuan Pengamanan'),
(46, 'Ketua Tim SPI'),
(47, 'Ketua Tim LSP'),
(48, 'Ketua Tim PEDP'),
(49, 'Dosen'),
(50, 'Administrasi'),
(51, 'Teknisi'),
(52, 'Kepala Bagian'),
(53, 'plt. Kasub. Bagian Kepegawaian'),
(54, 'Staf Kepegawaian'),
(55, 'Administrasi, Kord. Sarpras, Kebersihan'),
(56, 'Sekretaris Pimpinan'),
(57, 'Operator'),
(58, 'Staf Humas'),
(59, 'Bendahara Penerimaan'),
(60, 'Bendahara Pengeluaran'),
(61, 'Staf Keuangan'),
(62, 'Staf PPK'),
(63, 'Admin Jaringan'),
(64, 'Pengelola Situs/Web'),
(65, 'Teknisi Lab Bahasa'),
(66, 'Ka. UPK'),
(67, 'Tenaga Kesehatan'),
(68, 'Satpam'),
(69, 'Sopir'),
(70, 'Tenaga Kebersihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jam_kerja`
--

CREATE TABLE `tb_jam_kerja` (
  `id_jam_kerja` int(5) NOT NULL,
  `jam_masuk_kerja` time DEFAULT NULL,
  `jam_pulang_kerja` time DEFAULT NULL,
  `keterangan_hari` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_jam_kerja`
--

INSERT INTO `tb_jam_kerja` (`id_jam_kerja`, `jam_masuk_kerja`, `jam_pulang_kerja`, `keterangan_hari`) VALUES
(1, '07:00:00', '16:00:00', 'Senin - Kamis'),
(2, '07:00:00', '15:00:00', 'Jum\'at'),
(3, '07:00:00', '16:00:00', 'Shift Pagi'),
(4, '16:00:00', '00:00:00', 'Shift Malam'),
(5, '00:00:00', '07:00:00', 'Shift Dini Hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(5) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'AGRIBISNIS'),
(2, 'BAGIAN AKADEMIK, KEMAHASISWAAN, PERENCANAAN DAN SISTEM INFORMASI'),
(3, 'MANAJEMEN BISNIS PARIWISATA'),
(4, 'SUBBAGIAN AKADEMIK DAN KEMAHASISWAAN'),
(5, 'SUBBAGIAN KEUANGAN'),
(6, 'SUBBAGIAN PERENCANAAN DAN SISTEM INFORMASI'),
(7, 'SUBBAGIAN UMUM DAN KEPEGAWAIAN'),
(8, 'TEKNIK INFORMATIKA'),
(9, 'TEKNIK MANUFAKTUR KAPAL'),
(10, 'TEKNIK MESIN'),
(11, 'TEKNIK SIPIL'),
(12, 'TEKNOLOGI PENGOLAHAN HASIL TERNAK'),
(13, 'TENAGA KEPENDIDIKAN PENDUKUNG'),
(14, 'UNIT KEBERSIHAN, PERTAMANAN DAN TANAMAN KOLEKSI'),
(15, 'UNIT LAYANAN PENGADAAN'),
(16, 'UNIT PELAYANAN KELAS'),
(17, 'UNIT POLIKLINIK'),
(18, 'UPT BAHASA'),
(19, 'UPT PERPUSTAKAAN'),
(20, 'UPT TEKNOLOGI INFORMASI DAN KOMUNIKASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_golongan`
--

CREATE TABLE `tb_level_golongan` (
  `id_level_golongan` int(5) NOT NULL,
  `level_golongan` varchar(100) DEFAULT NULL,
  `uang_makan` int(11) NOT NULL,
  `pajak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_level_golongan`
--

INSERT INTO `tb_level_golongan` (`id_level_golongan`, `level_golongan`, `uang_makan`, `pajak`) VALUES
(1, 'PNS/CPNS I/II', 35000, 0),
(2, 'Honorer/Kontrak I/II', 20000, 0),
(3, '-', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_user`
--

CREATE TABLE `tb_level_user` (
  `id_level_user` int(5) NOT NULL,
  `level_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_level_user`
--

INSERT INTO `tb_level_user` (`id_level_user`, `level_user`) VALUES
(1, 'Admin'),
(2, 'Kasubbag Umum dan Kepegawaian'),
(3, 'Kasubbag Keuangan'),
(4, 'DIrektur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(100) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `id_jabatan` int(5) DEFAULT NULL,
  `id_level_golongan` int(5) DEFAULT NULL,
  `id_jurusan` int(5) NOT NULL,
  `id_jam_kerja` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `id_jabatan`, `id_level_golongan`, `id_jurusan`, `id_jam_kerja`) VALUES
('196201151988031000', 'Son Kuswadi, Dr. Eng.', 1, 3, 8, 1),
('196407141990021000', 'Muhammad Toyib, S.E., M.M', 11, 3, 2, 1),
('197003161989012000', 'Imbarsari Rusnaeni', 20, 3, 16, 1),
('197405142001122000', 'Uri Anjarwati, S.E., M.M.', 50, 3, 19, 1),
('197806132014041000', 'Muh. Fuad Al Haris, S.T., M.T', 3, 3, 8, 1),
('198010222015041000', 'I Wayan Suardinata, S.Kom., M.T', 26, 3, 8, 1),
('198103152015041000', 'Sofyan Hadi, S.E', 50, 3, 5, 1),
('198103232014041000', 'Arya Pramudita, S.E', 50, 3, 7, 1),
('198210142014041000', 'Dadang Dwi Pranowo, S.T., M.Eng', 49, 3, 11, 1),
('198307132010122000', 'Wahyu Yulianingsih, S.Si.', 13, 3, 5, 1),
('198310202014042000', 'Eka Mistiko Rini, S.Kom., M.Kom', 5, 3, 8, 1),
('198311052015041000', 'Devit Suwardiyanto, S.Si., M.T.', 19, 3, 8, 1),
('198312092019032000', 'Sari Wiji Utami, SP., M.M', 49, 3, 1, 1),
('198401142019032000', 'Erna Suryani, S.T., M.Eng', 27, 3, 11, 1),
('198403112019031000', 'Endi Sailul Haq, S.T., M.Kom.', 48, 3, 8, 1),
('198403312019031000', 'Mirza Ghulam Rifqi, S.T., M.ST.', 35, 3, 11, 1),
('198404032019032000', 'Vivien Arief Wardhany, S.T., M.T', 49, 3, 8, 1),
('198406142014041000', 'Eko Slamet Riyadi, A.Md', 51, 3, 10, 1),
('198409092019031000', 'Halil, S.Pd., M.ST', 49, 3, 1, 1),
('198504262014041000', 'IGN Bagus Catrawedarma, S.T., M.Eng', 49, 3, 10, 1),
('198505172015041000', 'Zulis Erwanto, S.T., M.T', 14, 3, 11, 1),
('198602192019031000', 'Sefri Ton, S.ST., M.M', 49, 3, 12, 1),
('198603292019031000', 'Prabuditya Bhisma Wisnu Wardhana, S.T., M.Eng.', 49, 3, 10, 1),
('198603312019031000', 'Asmar Finali, S.T., M.T.', 49, 3, 10, 1),
('198605182014042000', 'Imarotul Husna, S.E', 60, 3, 5, 1),
('198605212015041000', 'M. Shofi\'ul Amin, S.T., M.T', 4, 3, 11, 1),
('198605242019032000', 'Nurhalimah, S.Pd., M.Pd.', 49, 3, 3, 1),
('198606302019031000', 'Dani Agung Wicaksono, S.E., M.M.', 49, 3, 12, 1),
('198608142019031000', 'Kanom, S.Pd., M.Par.', 49, 3, 3, 1),
('198611022014041000', 'Prio Widhia Fajar, S.E', 12, 3, 7, 1),
('198612312019032000', 'Wahyu Naris wari, S.T., M.T', 40, 3, 11, 1),
('198704272014041000', 'Ubnu Fajar Karimmulloh, A.Md', 51, 3, 11, 1),
('198705032014041000', 'Hida Jaya Habibi, A.Md', 51, 3, 8, 1),
('198706232019032000', 'Ika Yuniwati, S.Pd., M.Si', 41, 3, 10, 1),
('198707212019031000', 'Putu Ngurah Rusmawan, S.Pd., M.Pd.', 49, 3, 3, 1),
('198707272019031000', 'Galang Sandy Prayogo, S.T., M.T', 9, 3, 10, 1),
('198708292018031000', 'Jemi Cahya Adi Wijaya S.E., M.M', 49, 3, 3, 1),
('198712312014041000', 'Eka Puput Warsa, A.Md', 50, 3, 3, 1),
('198804042018031000', 'Kurniawan Muhammad Nur, S.ST., M.M', 49, 3, 1, 1),
('198804062018032000', 'Asmaul Khusna, S.Pt., M.M', 49, 3, 12, 1),
('198805042019032000', 'Anggra Fiveriati, S.T., M.T', 49, 3, 10, 1),
('198805222019032000', 'Petty Winda Meirina, S.E.', 50, 3, 4, 1),
('198806072019032000', 'Sandryas Alief Kurniasanti, S.ST., M.M', 49, 3, 1, 1),
('198806102019031000', 'IGN Agung Satria Prasetya D Y, S.T., M.T.', 49, 3, 9, 1),
('198807102019031000', 'Yeddid Yonatan Eka Darma, S.T., M.Sc.', 32, 3, 9, 1),
('198808292014041000', 'Arif Agus Fajar Riyanto, A.Md.', 64, 3, 20, 1),
('198810032019031000', 'Agung Fauzi Hanafi, S.T., M.T.', 49, 3, 10, 1),
('198810152014041000', 'Fendi Hermawanto, A.Md', 51, 3, 8, 1),
('198901162018031000', 'Ardito Atmaka Aji, S.ST., M.M', 46, 3, 1, 1),
('198901312015042000', 'Deni Yannuarista, A.Md', 51, 3, 12, 1),
('198902172015042000', 'Nuraini Lusi, S.Pd., M.T', 49, 3, 10, 1),
('198904022019032000', 'Anis Usfah Prastujati, S.Pt., M.Si.', 37, 3, 12, 1),
('198904072019031000', 'Muh. Habbib Khirzin, S.Pi., M.Si.', 29, 3, 12, 1),
('198904092019031000', 'Masetya Mukti, S.ST., M.M.', 21, 3, 3, 1),
('198905222019031000', 'Akhmad Afandi, S.Si., M.Si.', 47, 3, 10, 1),
('198906282015042000', 'Anggria Dwi Silvana H, S.E', 50, 3, 6, 1),
('198909092019031000', 'Abdul Holik, S.TP., M.Sc', 49, 3, 1, 1),
('198910252019031000', 'Randhi Nanang Darmawan, S.Si., M.Si.', 49, 3, 3, 1),
('198912262018031000', 'Adetiya Prananda Putra, S.ST., M.M', 49, 3, 3, 1),
('199002242019031000', 'Agung Nursabilillah, S.E.', 50, 3, 6, 1),
('199004192018031000', 'Junaedi Adi Prasetyo, S.ST., M.Sc.', 22, 3, 8, 1),
('199008202014042000', 'Yani Agistia, S.E', 61, 3, 5, 1),
('199008302019031000', 'Moch. Shandy Sasmito, S.ST', 51, 3, 1, 1),
('199009052019031000', 'Sepyan Purnama Kristanto, S.Kom., M.Kom.', 49, 3, 8, 1),
('199010052014041000', 'Alfin Hidayat, S.T., M.T', 15, 3, 8, 1),
('199011112019032000', 'Firda Rachma Amalia, S.E., M.M.', 30, 3, 3, 1),
('199011212019032000', 'Dora Melati Nurita Sandi, S.T., M.T.', 49, 3, 11, 1),
('199104142019031000', 'Dwi Ahmad Priyadi, S.Pt., M.Sc.', 49, 3, 12, 1),
('199104202018031000', 'Alif Akbar Fitrawan, S.Pd., M.Kom', 49, 3, 8, 1),
('199106082019032000', 'Riza Rahimi Bachtiar, S.P., M.P., MBA.', 42, 3, 1, 1),
('199108052019031000', 'I Putu Sudhyana Mecha, S.Kom., M.Par.', 49, 3, 3, 1),
('199201052015042000', 'Sandris Rintania, A.Md', 51, 3, 3, 1),
('199202022019031000', 'I Ketut Hendra Wiryasuta, S.T., M.T.', 49, 3, 11, 1),
('199203102019031000', 'Rochmad Eko Prasetyaning Utomo, S.T., M.Eng.', 49, 3, 9, 1),
('199203302019031000', 'Lutfi Hakim, S.Pd., M.T.', 49, 3, 8, 1),
('199205082019031000', 'Brian Ahmad Nur Hasan, S.E.', 50, 3, 5, 1),
('199302072019032000', 'Qurrotus Shofiyah, S.T., M.T.', 49, 3, 11, 1),
('199310132019032000', 'Nanti Viaini Nur Siti Fatimah, S.Psi.', 50, 3, 7, 1),
('199311252019031000', 'Nova Victor Geral Dino, S.E.', 50, 3, 5, 1),
('199408312019032000', 'Auda Nuril Zazilah, S.Si., M.Sc.', 49, 3, 3, 1),
('199503042019031000', 'Nugroho Dwi Prasojo, S.ST.', 51, 3, 1, 1),
('199612052019032000', 'Jamilah, S.T.', 51, 3, 1, 1),
('199708062019031000', 'Moh. Fadil, A.Md.', 51, 3, 7, 1),
('2008.36.004', 'Moh. Dimyati Ayatullah, S.T., M.Kom.', 33, 3, 8, 1),
('2008.36.005', 'Dianni Yusuf, S.Kom., M.Kom', 49, 3, 8, 1),
('2008.36.012', 'Enes Ariyanto Sandi, S.T., M.M.', 7, 3, 11, 1),
('2008.36.013', 'Yuni Ulfiyati, S.T., M.M.', 10, 3, 11, 1),
('2008.36.014', 'Abdul Rohman, S.T., M.T.', 39, 3, 9, 1),
('2008.36.015', 'Dian Ridlo Pamuji, S.T., M.T', 49, 3, 10, 1),
('2008.36.017', 'M. Abdul Wahid, S.T., M.T', 34, 3, 10, 1),
('2008.36.018', 'Chairul Anam, S.T., M.T', 28, 3, 10, 1),
('2008.36.019', 'Khairul Muzaka, S.T., M.Eng-Res', 6, 3, 9, 1),
('2008.36.021', 'Ariadne Ika Maharani, S.E', 56, 3, 7, 1),
('2008.36.022', 'Driyanto Wahyu Wicaksono, S.E., M.ST', 23, 3, 1, 1),
('2008.36.029', 'Muhlas', 68, 3, 13, 3),
('2008.36.031', 'Ahmad Jayadi', 70, 3, 14, 1),
('2009.36.034', 'Dian Mujiani, S.E', 50, 3, 8, 1),
('2009.36.035', 'Devi Mahdalena, S.E.', 54, 3, 7, 1),
('2009.36.036', 'Panca Riza Sunandar', 50, 3, 5, 1),
('2009.36.037', 'Tri Prasetyo, S.Ab', 50, 3, 15, 1),
('2009.36.039', 'Qurrota A\'yun', 50, 3, 15, 1),
('2009.36.040', 'Nirmala Ayuningtyas, S.E', 61, 3, 5, 1),
('2009.36.041', 'Deny Sigit Priyono', 50, 3, 12, 1),
('2009.36.042', 'Siswo Handoko, S.T', 50, 3, 15, 1),
('2009.36.043', 'Enny Purwati, S.Sos', 50, 3, 7, 1),
('2009.36.044', 'Ninik Sri Rahayu Wilujeng, S.H., M.H', 49, 3, 12, 1),
('2009.36.045', 'Hairul Salam', 43, 3, 7, 1),
('2010.36.048', 'Agus Priyo Utomo, S.ST.', 63, 3, 20, 1),
('2010.36.049', 'Farnas Ady Pramono', 50, 3, 4, 1),
('2010.36.055', 'Moh. Nur Shodiq, S.T., M.T.', 8, 3, 8, 1),
('2010.36.059', 'Ginanjar Eka Sasmita, A.Md', 51, 3, 11, 1),
('2010.36.062', 'Mochamad Arofi, A.Md', 51, 3, 10, 1),
('2010.36.064', 'Dwi Wahyuni', 50, 3, 4, 1),
('2010.36.065', 'Novinari Budi Ekawati', 61, 3, 5, 1),
('2010.36.069', 'Jaeni', 70, 3, 14, 1),
('2011.36.071', 'Sholehudin', 44, 3, 13, 3),
('2011.36.073', 'Herman Yuliandoko, S.T., M.T', 18, 3, 8, 1),
('2011.36.079', 'Dedy Hidayat Kusuma, S.T., M.Cs.', 2, 3, 8, 1),
('2011.36.080', 'Subono, S.T., M.T.', 17, 3, 8, 1),
('2011.36.082', 'Ely Trianasari, S.Pd., M.Pd', 25, 3, 10, 1),
('2013.36.101', 'Shinta Andayani', 50, 3, 3, 1),
('2013.36.102', 'Tri Prasetia', 50, 3, 4, 1),
('2013.36.104', 'Anang Suprihartono', 68, 3, 13, 3),
('2013.36.105', 'Muhammad Nur Hariri, A.Md', 51, 3, 8, 1),
('2013.36.106', 'Farizqi Panduardi, S.ST., M.T', 49, 3, 8, 1),
('2013.36.107', 'Eva Anisa, A.Md', 50, 3, 1, 1),
('2013.36.108', 'Nur Cholik Hasyim, A.Md', 51, 3, 20, 1),
('2013.36.109', 'Ali Murtado', 68, 3, 13, 3),
('2013.36.111', 'Danang Sudarso WPJW, S.P., M.M', 38, 3, 1, 1),
('2013.36.115', 'Shinta Setiadevi, S.TP., M.M', 31, 3, 1, 1),
('2014.36.129', 'Aldino Dwi Satria Putra', 45, 3, 13, 3),
('2014.36.132', 'Ahmad Hisyam', 50, 3, 16, 1),
('2014.36.134', 'Tedy Supriyatno', 68, 3, 13, 3),
('2014.36.135', 'Margareta Retciana', 50, 3, 19, 1),
('2014.36.136', 'Mahrus Ali', 50, 3, 5, 1),
('2015.36.143', 'Kasturi', 70, 3, 14, 1),
('2015.36.144', 'Achmad Rifa\'i', 70, 3, 14, 1),
('2015.36.145', 'Khoirul Anam', 70, 3, 14, 1),
('2015.36.150', 'Zainal Abidin', 70, 3, 14, 1),
('2015.36.151', 'Ainul Yakin', 70, 3, 14, 1),
('2015.36.154', 'Rismanto', 50, 3, 9, 1),
('2015.36.155', 'Imam Gazali', 57, 3, 7, 1),
('2015.36.156', 'Edy Sancoko', 50, 3, 10, 1),
('2015.36.159', 'Mohammad Shoim', 68, 3, 13, 3),
('2016.36.160', 'Mustofa Hilmi, S.Pt., M.Si', 49, 3, 12, 1),
('2016.36.167', 'Aditya Wiralatief Sanjaya, S.ST', 24, 3, 3, 1),
('2016.36.169', 'Rudi Tri Handoko, S.ST.Par., M.Tr.Par', 36, 3, 3, 1),
('2016.36.173', 'Evrielia Enggar Cahyani, A.Md.', 51, 3, 3, 1),
('2016.36.174', 'Ahmad Alfian Syahri, S.ST.', 67, 3, 17, 1),
('2016.36.175', 'Arinta Eka Widyastuti, S.Kep.', 67, 3, 17, 1),
('2016.36.177', 'Munfaridah, S.KM.', 67, 3, 17, 1),
('2016.36.178', 'Muzaqqi', 68, 3, 13, 3),
('2016.36.180', 'Eka Afrida Ermawati, S.Pd., M.Pd', 49, 3, 3, 1),
('2016.36.181', 'Aprilia Divi Yustita, S.Si., M.Si', 49, 3, 3, 1),
('2016.36.182', 'Puput Endah Purnamasari, A.Md', 65, 3, 18, 1),
('2016.36.184', 'Rahmawan Darsyah, S.E', 50, 3, 5, 1),
('2016.36.187', 'Siska Aprilia Hardiyanti, S.Pd., M.Si', 49, 3, 11, 1),
('2016.36.189', 'Yudi Irawan', 70, 3, 14, 1),
('2016.36.191', 'Hamim Tohari', 70, 3, 14, 1),
('2017.36.192', 'Muhamad Abdurrohim', 68, 3, 13, 3),
('2017.36.193', 'Budi Handoko', 69, 3, 13, 1),
('2017.36.194', 'Slamet Heri Soepriyadi', 68, 3, 13, 3),
('2017.36.196', 'Dendhik Hariyanto', 70, 3, 14, 1),
('2017.36.201', 'Ayu Wanda Febrian, S.Par., MBA.', 49, 3, 3, 1),
('2017.36.204', 'Maulana Syahrul Ulum, A.Md.', 51, 3, 12, 1),
('2017.36.205', 'Rizki Novan Wijaya, A.Md.', 51, 3, 9, 1),
('2017.36.206', 'Afika Milda Rizki, S.TP.', 51, 3, 1, 1),
('2017.36.207', 'Rosikin', 68, 3, 13, 3),
('2017.36.209', 'Dana Kumala, A.Md.', 50, 3, 11, 1),
('2018.36.213', 'Aldi Rizal, A.Md.', 58, 3, 7, 1),
('2018.36.214', 'Galih Hendra Wibowo, S.Tr.Kom., M.T.', 49, 3, 8, 1),
('2018.36.215', 'Hery Inprasetyobudi, S.T., M.T.', 49, 3, 9, 1),
('2018.36.218', 'Ari Istanti, S.P., M.P.', 49, 3, 1, 1),
('2018.36.219', 'Mohamad Ilham Hilal, S.ST., M.ST.', 49, 3, 1, 1),
('2018.36.222', 'Ayu Purwaningtyas, S.Hut., M.M.', 49, 3, 3, 1),
('2018.36.223', 'Christine Yulia Iswani, S.ST.', 51, 3, 1, 1),
('2018.36.227', 'Dyah Triasih, S.Pt., M.Sc.', 49, 3, 12, 1),
('2018.36.228', 'Muhendra Ainur Rofiq, A.Md.', 51, 3, 11, 1),
('2018.36.229', 'Johan Nirwana, A.Md.', 62, 3, 5, 1),
('2018.36.230', 'Deqi Pajar Pratama, A.Md.', 51, 3, 9, 1),
('2018.36.231', 'Dimas Ferian Julianto, A.Md.', 50, 3, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL,
  `jam_masuk` datetime DEFAULT '0000-00-00 00:00:00',
  `jam_pulang` datetime DEFAULT '0000-00-00 00:00:00',
  `id_jam_kerja` int(5) NOT NULL,
  `tanggal_sekarang` date NOT NULL,
  `id_status_hari` int(5) DEFAULT NULL,
  `ijin` varchar(100) DEFAULT 'tidak ada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `id_pegawai`, `jam_masuk`, `jam_pulang`, `id_jam_kerja`, `tanggal_sekarang`, `id_status_hari`, `ijin`) VALUES
(1, '1', '2020-07-20 06:20:00', '2020-07-20 17:30:00', 1, '2020-07-20', NULL, 'tidak ada'),
(2, '2', '2020-07-20 07:30:00', '2020-07-20 15:30:00', 3, '2020-07-20', NULL, 'tidak ada'),
(3, '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, '2020-07-20', NULL, 'tidak ada'),
(4, '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2020-07-20', NULL, 'ada'),
(5, '4', '2020-07-20 15:20:00', '2020-07-21 00:30:00', 4, '2020-07-20', NULL, 'tidak ada'),
(6, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2020-07-23', NULL, 'ada'),
(7, '3', '2020-07-23 06:20:00', '2020-07-23 17:30:00', 1, '2020-07-23', NULL, 'tidak ada'),
(8, '5', '2020-07-23 00:05:00', '2020-07-23 07:30:00', 5, '2020-07-23', NULL, 'tidak ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_hari`
--

CREATE TABLE `tb_status_hari` (
  `id_status_hari` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status_hari`
--

INSERT INTO `tb_status_hari` (`id_status_hari`, `title`, `start_date`, `end_date`, `description`, `color`, `create_at`) VALUES
(1, 'Hari Tahun Baru', '2019-01-01 00:00:00', '2019-01-01 00:00:00', 'Hari Tahun Baru', '#DB4040', '2020-06-21 20:29:23'),
(2, 'Tahun Baru Imlek', '2019-02-05 00:00:00', '2019-02-05 00:00:00', 'Tahun Baru Imlek', '#DB4040', '2020-06-21 20:29:23'),
(3, 'Hari Raya Nyepi (Tahun Baru Saka)', '2019-03-07 00:00:00', '2019-03-07 00:00:00', 'Hari Raya Nyepi (Tahun Baru Saka)', '#DB4040', '2020-06-21 20:29:23'),
(4, 'Isra Miraj Nabi Muhammad', '2019-04-03 00:00:00', '2019-04-03 00:00:00', 'Isra Miraj Nabi Muhammad', '#DB4040', '2020-06-21 20:29:23'),
(5, 'Election Day', '2019-04-17 00:00:00', '2019-04-17 00:00:00', 'Election Day', '#DB4040', '2020-06-21 20:29:23'),
(6, 'Wafat Isa Almasih', '2019-04-19 00:00:00', '2019-04-19 00:00:00', 'Wafat Isa Almasih', '#DB4040', '2020-06-21 20:29:23'),
(7, 'Hari Paskah', '2019-04-21 00:00:00', '2019-04-21 00:00:00', 'Hari Paskah', '#DB4040', '2020-06-21 20:29:23'),
(8, 'Hari Buruh Internasional/Pekerja', '2019-05-01 00:00:00', '2019-05-01 00:00:00', 'Hari Buruh Internasional/Pekerja', '#DB4040', '2020-06-21 20:29:23'),
(9, 'Hari Raya Waisak', '2019-05-19 00:00:00', '2019-05-19 00:00:00', 'Hari Raya Waisak', '#DB4040', '2020-06-21 20:29:23'),
(10, 'Kenaikan Yesus Kristus', '2019-05-30 00:00:00', '2019-05-30 00:00:00', 'Kenaikan Yesus Kristus', '#DB4040', '2020-06-21 20:29:23'),
(11, 'Hari Lahir Pancasila', '2019-06-01 00:00:00', '2019-06-01 00:00:00', 'Hari Lahir Pancasila', '#DB4040', '2020-06-21 20:29:23'),
(12, 'Cuti Bersama', '2019-06-03 00:00:00', '2019-06-03 00:00:00', 'Cuti Bersama', '#DB4040', '2020-06-21 20:29:23'),
(13, 'Cuti Bersama', '2019-06-04 00:00:00', '2019-06-04 00:00:00', 'Cuti Bersama', '#DB4040', '2020-06-21 20:29:23'),
(14, 'Idul Fitri (Lebaran Mudik)', '2019-06-05 00:00:00', '2019-06-05 00:00:00', 'Idul Fitri (Lebaran Mudik)', '#DB4040', '2020-06-21 20:29:23'),
(15, 'Idul Fitri (Lebaran Mudik)', '2019-06-06 00:00:00', '2019-06-06 00:00:00', 'Idul Fitri (Lebaran Mudik)', '#DB4040', '2020-06-21 20:29:23'),
(16, 'Cuti Bersama', '2019-06-07 00:00:00', '2019-06-07 00:00:00', 'Cuti Bersama', '#DB4040', '2020-06-21 20:29:23'),
(17, 'Idul Adha (Lebaran Haji)', '2019-08-11 00:00:00', '2019-08-11 00:00:00', 'Idul Adha (Lebaran Haji)', '#DB4040', '2020-06-21 20:29:23'),
(18, 'Hari Proklamasi Kemerdekaan R.I.', '2019-08-17 00:00:00', '2019-08-17 00:00:00', 'Hari Proklamasi Kemerdekaan R.I.', '#DB4040', '2020-06-21 20:29:23'),
(19, 'Satu Muharam/Tahun Baru Hijriyah', '2019-09-01 00:00:00', '2019-09-01 00:00:00', 'Satu Muharam/Tahun Baru Hijriyah', '#DB4040', '2020-06-21 20:29:23'),
(20, 'Diwali/Deepavali', '2019-10-27 00:00:00', '2019-10-27 00:00:00', 'Diwali/Deepavali', '#DB4040', '2020-06-21 20:29:23'),
(21, 'Maulid Nabi Muhammad', '2019-11-09 00:00:00', '2019-11-09 00:00:00', 'Maulid Nabi Muhammad', '#DB4040', '2020-06-21 20:29:23'),
(22, 'Cuti Bersama (Malam Natal)', '2019-12-24 00:00:00', '2019-12-24 00:00:00', 'Cuti Bersama (Malam Natal)', '#DB4040', '2020-06-21 20:29:23'),
(23, 'Hari Natal', '2019-12-25 00:00:00', '2019-12-25 00:00:00', 'Hari Natal', '#DB4040', '2020-06-21 20:29:23'),
(24, 'Malam Tahun Baru', '2019-12-31 00:00:00', '2019-12-31 00:00:00', 'Malam Tahun Baru', '#DB4040', '2020-06-21 20:29:23'),
(25, 'Hari Tahun Baru', '2020-01-01 00:00:00', '2020-01-01 00:00:00', 'Hari Tahun Baru', '#DB4040', '2020-06-21 20:29:23'),
(26, 'Tahun Baru Imlek', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 'Tahun Baru Imlek', '#DB4040', '2020-06-21 20:29:23'),
(27, 'Isra Miraj Nabi Muhammad', '2020-03-22 00:00:00', '2020-03-22 00:00:00', 'Isra Miraj Nabi Muhammad', '#DB4040', '2020-06-21 20:29:23'),
(28, 'Hari Raya Nyepi (Tahun Baru Saka)', '2020-03-25 00:00:00', '2020-03-25 00:00:00', 'Hari Raya Nyepi (Tahun Baru Saka)', '#DB4040', '2020-06-21 20:29:23'),
(29, 'Wafat Isa Almasih', '2020-04-10 00:00:00', '2020-04-10 00:00:00', 'Wafat Isa Almasih', '#DB4040', '2020-06-21 20:29:23'),
(30, 'Hari Paskah', '2020-04-12 00:00:00', '2020-04-12 00:00:00', 'Hari Paskah', '#DB4040', '2020-06-21 20:29:23'),
(31, 'Hari Buruh Internasional/Pekerja', '2020-05-01 00:00:00', '2020-05-01 00:00:00', 'Hari Buruh Internasional/Pekerja', '#DB4040', '2020-06-21 20:29:23'),
(32, 'Hari Raya Waisak', '2020-05-07 00:00:00', '2020-05-07 00:00:00', 'Hari Raya Waisak', '#DB4040', '2020-06-21 20:29:23'),
(33, 'Kenaikan Yesus Kristus', '2020-05-21 00:00:00', '2020-05-21 00:00:00', 'Kenaikan Yesus Kristus', '#DB4040', '2020-06-21 20:29:23'),
(34, 'Idul Fitri (Lebaran Mudik)', '2020-05-24 00:00:00', '2020-05-24 00:00:00', 'Idul Fitri (Lebaran Mudik)', '#DB4040', '2020-06-21 20:29:23'),
(35, 'Idul Fitri (Lebaran Mudik)', '2020-05-25 00:00:00', '2020-05-25 00:00:00', 'Idul Fitri (Lebaran Mudik)', '#DB4040', '2020-06-21 20:29:23'),
(36, 'Hari Lahir Pancasila', '2020-06-01 00:00:00', '2020-06-01 00:00:00', 'Hari Lahir Pancasila', '#DB4040', '2020-06-21 20:29:23'),
(37, 'Idul Adha (Lebaran Haji)', '2020-07-31 00:00:00', '2020-07-31 00:00:00', 'Idul Adha (Lebaran Haji)', '#DB4040', '2020-06-21 20:29:23'),
(38, 'Hari Proklamasi Kemerdekaan R.I.', '2020-08-17 00:00:00', '2020-08-17 00:00:00', 'Hari Proklamasi Kemerdekaan R.I.', '#DB4040', '2020-06-21 20:29:23'),
(39, 'Satu Muharam/Tahun Baru Hijriyah', '2020-08-20 00:00:00', '2020-08-20 00:00:00', 'Satu Muharam/Tahun Baru Hijriyah', '#DB4040', '2020-06-21 20:29:23'),
(40, 'Muharram / Islamic New Year Holiday', '2020-08-21 00:00:00', '2020-08-21 00:00:00', 'Muharram / Islamic New Year Holiday', '#DB4040', '2020-06-21 20:29:23'),
(41, 'Cuti Bersama', '2020-10-28 00:00:00', '2020-10-28 00:00:00', 'Cuti Bersama', '#DB4040', '2020-06-21 20:29:23'),
(42, 'Maulid Nabi Muhammad', '2020-10-29 00:00:00', '2020-10-29 00:00:00', 'Maulid Nabi Muhammad', '#DB4040', '2020-06-21 20:29:23'),
(43, 'The Prophet Muhammads Birthday Holiday', '2020-10-30 00:00:00', '2020-10-30 00:00:00', 'The Prophet Muhammads Birthday Holiday', '#DB4040', '2020-06-21 20:29:23'),
(44, 'Diwali/Deepavali', '2020-11-14 00:00:00', '2020-11-14 00:00:00', 'Diwali/Deepavali', '#DB4040', '2020-06-21 20:29:23'),
(45, 'Cuti Bersama (Malam Natal)', '2020-12-24 00:00:00', '2020-12-24 00:00:00', 'Cuti Bersama (Malam Natal)', '#DB4040', '2020-06-21 20:29:23'),
(46, 'Hari Natal', '2020-12-25 00:00:00', '2020-12-25 00:00:00', 'Hari Natal', '#DB4040', '2020-06-21 20:29:23'),
(47, 'Cuti Bersama', '2020-12-28 00:00:00', '2020-12-28 00:00:00', 'Cuti Bersama', '#DB4040', '2020-06-21 20:29:23'),
(48, 'Cuti Bersama', '2020-12-29 00:00:00', '2020-12-29 00:00:00', 'Cuti Bersama', '#DB4040', '2020-06-21 20:29:23'),
(49, 'Cuti Bersama', '2020-12-30 00:00:00', '2020-12-30 00:00:00', 'Cuti Bersama', '#DB4040', '2020-06-21 20:29:23'),
(50, 'Malam Tahun Baru', '2020-12-31 00:00:00', '2020-12-31 00:00:00', 'Malam Tahun Baru', '#DB4040', '2020-06-21 20:29:23'),
(51, 'Hari Tahun Baru', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 'Hari Tahun Baru', '#DB4040', '2020-06-21 20:29:23'),
(52, 'Tahun Baru Imlek', '2021-02-12 00:00:00', '2021-02-12 00:00:00', 'Tahun Baru Imlek', '#DB4040', '2020-06-21 20:29:23'),
(53, 'Isra Miraj Nabi Muhammad', '2021-03-11 00:00:00', '2021-03-11 00:00:00', 'Isra Miraj Nabi Muhammad', '#DB4040', '2020-06-21 20:29:23'),
(54, 'Hari Raya Nyepi (Tahun Baru Saka)', '2021-03-14 00:00:00', '2021-03-14 00:00:00', 'Hari Raya Nyepi (Tahun Baru Saka)', '#DB4040', '2020-06-21 20:29:23'),
(55, 'Wafat Isa Almasih', '2021-04-02 00:00:00', '2021-04-02 00:00:00', 'Wafat Isa Almasih', '#DB4040', '2020-06-21 20:29:23'),
(56, 'Hari Paskah', '2021-04-04 00:00:00', '2021-04-04 00:00:00', 'Hari Paskah', '#DB4040', '2020-06-21 20:29:23'),
(57, 'Hari Buruh Internasional/Pekerja', '2021-05-01 00:00:00', '2021-05-01 00:00:00', 'Hari Buruh Internasional/Pekerja', '#DB4040', '2020-06-21 20:29:23'),
(58, 'Kenaikan Yesus Kristus', '2021-05-13 00:00:00', '2021-05-13 00:00:00', 'Kenaikan Yesus Kristus', '#DB4040', '2020-06-21 20:29:23'),
(59, 'Idul Fitri (Lebaran Mudik)', '2021-05-14 00:00:00', '2021-05-14 00:00:00', 'Idul Fitri (Lebaran Mudik)', '#DB4040', '2020-06-21 20:29:23'),
(60, 'Hari Raya Waisak', '2021-05-26 00:00:00', '2021-05-26 00:00:00', 'Hari Raya Waisak', '#DB4040', '2020-06-21 20:29:23'),
(61, 'Hari Lahir Pancasila', '2021-06-01 00:00:00', '2021-06-01 00:00:00', 'Hari Lahir Pancasila', '#DB4040', '2020-06-21 20:29:23'),
(62, 'Idul Adha (Lebaran Haji)', '2021-07-20 00:00:00', '2021-07-20 00:00:00', 'Idul Adha (Lebaran Haji)', '#DB4040', '2020-06-21 20:29:23'),
(63, 'Satu Muharam/Tahun Baru Hijriyah', '2021-08-10 00:00:00', '2021-08-10 00:00:00', 'Satu Muharam/Tahun Baru Hijriyah', '#DB4040', '2020-06-21 20:29:23'),
(64, 'Hari Proklamasi Kemerdekaan R.I.', '2021-08-17 00:00:00', '2021-08-17 00:00:00', 'Hari Proklamasi Kemerdekaan R.I.', '#DB4040', '2020-06-21 20:29:23'),
(65, 'Maulid Nabi Muhammad', '2021-10-19 00:00:00', '2021-10-19 00:00:00', 'Maulid Nabi Muhammad', '#DB4040', '2020-06-21 20:29:23'),
(66, 'Diwali/Deepavali', '2021-11-04 00:00:00', '2021-11-04 00:00:00', 'Diwali/Deepavali', '#DB4040', '2020-06-21 20:29:23'),
(67, 'Malam Natal', '2021-12-24 00:00:00', '2021-12-24 00:00:00', 'Malam Natal', '#DB4040', '2020-06-21 20:29:23'),
(68, 'Hari Natal', '2021-12-25 00:00:00', '2021-12-25 00:00:00', 'Hari Natal', '#DB4040', '2020-06-21 20:29:23'),
(69, 'Malam Tahun Baru', '2021-12-31 00:00:00', '2021-12-31 00:00:00', 'Malam Tahun Baru', '#DB4040', '2020-06-21 20:29:23'),
(70, '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2', '#DB4040', '2020-06-21 20:29:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `id_level_user`) VALUES
(1, 'Muhammad Hadziq Tamami', 'admin', 'admin', 1),
(2, 'Prio Widhia Fajar, S.E', 'poliwangi', 'poliwangi', 2),
(3, 'Wahyu Yulianingsih, S.Si.', 'keuangan', 'keuangan', 3),
(4, 'Son Kuswadi, Dr. Eng.', 'direktur', 'direktur', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_validasi_rekap`
--

CREATE TABLE `tb_validasi_rekap` (
  `id_validasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(100) DEFAULT 'belum tervalidasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id_jam_kerja`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

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
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_jam_kerja` (`id_jam_kerja`),
  ADD KEY `id_status_hari` (`id_status_hari`);

--
-- Indeks untuk tabel `tb_status_hari`
--
ALTER TABLE `tb_status_hari`
  ADD PRIMARY KEY (`id_status_hari`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level_user` (`id_level_user`);

--
-- Indeks untuk tabel `tb_validasi_rekap`
--
ALTER TABLE `tb_validasi_rekap`
  ADD PRIMARY KEY (`id_validasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_level_golongan`
--
ALTER TABLE `tb_level_golongan`
  MODIFY `id_level_golongan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_level_user`
--
ALTER TABLE `tb_level_user`
  MODIFY `id_level_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_status_hari`
--
ALTER TABLE `tb_status_hari`
  MODIFY `id_status_hari` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_validasi_rekap`
--
ALTER TABLE `tb_validasi_rekap`
  MODIFY `id_validasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD CONSTRAINT `tb_presensi_ibfk_1` FOREIGN KEY (`id_jam_kerja`) REFERENCES `tb_jam_kerja` (`id_jam_kerja`),
  ADD CONSTRAINT `tb_presensi_ibfk_2` FOREIGN KEY (`id_status_hari`) REFERENCES `tb_status_hari` (`id_status_hari`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_level_user`) REFERENCES `tb_level_user` (`id_level_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
