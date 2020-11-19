-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 06:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spensatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nis` varchar(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenkel` varchar(11) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_login` varchar(11) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nis`, `gambar`, `nama`, `jenkel`, `kelas`, `alamat`, `id_login`, `tempat_lahir`, `tgl_lahir`) VALUES
('15001', 'download.png', 'I Gede Miarta Yasa', 'L', 'VII A', 'ekasari', 'ID0002', 'Ekasari', '1998-07-15'),
('15002', 'user4-128x128.jpg', 'Ni Made Intan Sri Utami', 'P', 'VII A', 'Buleleng, Bali', 'ID0003', 'Buleleng', '1998-02-04'),
('15003', 'Backgroundghh.jpg', 'Assabil Nur alfiansyah', 'L', 'VII B', 'Madiun, Jawa Timur', 'ID0004', 'Madiun', '1998-05-06'),
('15004', 'user.png', 'Niketut Sawitri', 'P', 'VII A', 'Seputih Mataram, Lampung Tengah', 'ID0005', '', '0000-00-00'),
('15005', 'user.png', 'Sugeng Pranoto', NULL, NULL, NULL, 'ID0009', NULL, NULL),
('15006', 'user.png', 'andi suratno', NULL, NULL, NULL, 'ID0010', NULL, NULL),
('15007', 'user.png', 'El Afiandi', NULL, NULL, NULL, 'ID0011', NULL, NULL),
('15008', 'user.png', 'Nyoman Artadana', NULL, NULL, NULL, 'ID0012', NULL, NULL),
('15009', 'user.png', 'Ni Ketut Resti Manis', NULL, NULL, NULL, 'ID0013', NULL, NULL),
('15010', 'user.png', 'I Putu Ela Adi Saputra', NULL, NULL, NULL, 'ID0014', NULL, NULL),
('15011', 'user.png', 'Ida Bagus Gede Arta Wibawa', NULL, NULL, NULL, 'ID0015', NULL, NULL),
('15012', 'user.png', 'I Putu Riska Mahendra', NULL, NULL, NULL, 'ID0016', NULL, NULL),
('15013', 'user.png', 'I Nyoman Sumada Yasa', NULL, NULL, NULL, 'ID0017', NULL, NULL),
('15014', 'user.png', 'Ni Kadek Dwi Maharani', NULL, NULL, NULL, 'ID0018', NULL, NULL),
('15015', 'user.png', 'Ni Luh Gede Yuni Mahaputri', NULL, NULL, NULL, 'ID0019', NULL, NULL),
('15016', 'user.png', 'Ni Putu Widiastuti', NULL, NULL, NULL, 'ID0020', NULL, NULL),
('15017', 'user.png', 'Ni Made Pita Yanti', NULL, NULL, NULL, 'ID0021', NULL, NULL),
('15018', 'user.png', 'I Made Sandi Widyaguna', NULL, NULL, NULL, 'ID0022', NULL, NULL),
('15019', 'user.png', 'Ni Luh Erma Wati', NULL, NULL, NULL, 'ID0023', NULL, NULL),
('15020', 'user.png', 'Diana Prastika', 'L', 'VII A', 'Br. Sadnyasari, Ds. Ekasari. Kec. Melaya, Jembrana', 'ID0007', 'Ekasari', '2000-01-20'),
('15021', 'user.png', 'Ni Putu Rita Ratna Dewi', NULL, NULL, NULL, 'ID0024', NULL, NULL),
('15022', 'user.png', 'Ni Made Putri Adnyani', NULL, NULL, NULL, 'ID0025', NULL, NULL),
('15023', 'user.png', 'I Made Restu', NULL, NULL, NULL, 'ID0026', NULL, NULL),
('15024', 'user.png', 'Devi Maharani', NULL, NULL, NULL, 'ID0027', NULL, NULL),
('15025', 'user.png', 'Ni Putu Indah Permata Sari', NULL, NULL, NULL, 'ID0028', NULL, NULL),
('15026', 'user.png', 'I Putu Suwidnyana Putra', NULL, NULL, NULL, 'ID0029', NULL, NULL),
('15027', 'user.png', 'Illham Abiburahman', NULL, NULL, NULL, 'ID0030', NULL, NULL),
('15028', 'user.png', 'I Putu Yuda Antara', NULL, NULL, NULL, 'ID0031', NULL, NULL),
('15029', 'user.png', 'I Putu Yudik A.', NULL, NULL, NULL, 'ID0032', NULL, NULL),
('15030', 'user.png', 'Sony Rianto', NULL, NULL, NULL, 'ID0033', NULL, NULL),
('15031', 'user.png', 'Dewa Agung Wahyu Pratama Muncan', NULL, NULL, NULL, 'ID0035', NULL, NULL),
('15032', 'user.png', 'Febrianto Budisantoso', NULL, NULL, NULL, 'ID0036', NULL, NULL),
('15033', 'user.png', 'I Gusti Ngurah Nadi Putra', NULL, NULL, NULL, 'ID0037', NULL, NULL),
('15034', 'user.png', 'Ni Putu Sri Nadi', NULL, NULL, NULL, 'ID0038', NULL, NULL),
('15035', 'user.png', 'I Putu Bagas Putra', NULL, NULL, NULL, 'ID0039', NULL, NULL),
('15036', 'user.png', 'Raditya Punarbawa', NULL, NULL, NULL, 'ID0040', NULL, NULL),
('15037', 'user.png', 'Ni Luh Cindy Maharani', NULL, NULL, NULL, 'ID0034', NULL, NULL),
('15038', 'user.png', 'I Ketut Adi Adnyana', NULL, NULL, NULL, 'ID0041', NULL, NULL),
('15039', 'user.png', 'Wayan Adi Puja Mahendra', NULL, NULL, NULL, 'ID0042', NULL, NULL),
('16001', 'user.png', 'Nyoman Dwika', NULL, NULL, NULL, 'ID0044', NULL, NULL),
('16041', 'user.png', 'I Gede Miarta Yasa', NULL, NULL, NULL, 'ID0046', NULL, NULL),
('51084', 'user.png', 'Radifan Tirta Yasa', NULL, NULL, NULL, 'ID0045', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `status_buku` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `gambar`, `judul`, `penulis`, `tahun`, `penerbit`, `status_buku`) VALUES
('BK0001', 'OS.jpg', 'Pengantar Sistem Operasi Komputer', 'Andi Offset', 2018, 'Gramedia', 1),
('BK0002', '5b555d42136e12.98993809l.jpg', 'Ilmu Budaya Dasar: Pengantar kearah ilmu sosial budaya dasar (ISBD)', 'Dr. M. Muhhamad Sulaeman', 2012, 'Gramedia', 1),
('BK0003', 'bi9.png', 'Buku Paket Siswa | Bahasa Indonesia Kelas 9', 'BSi Nas', 2004, 'Gava Media', 1),
('BK0005', 'gusdur.jpg', 'Biografi Gus Dur ; The Authorized Biography of KH. Abdurrahman Wahid ', 'Tanmalaka', 2013, 'Gramedia', 1),
('BK0006', 'habibie.jpg', 'Biografi Habibie : B.J HABIBIE', 'Prof. Dr. Anwar Arifin', 2004, 'PT. Sumber Karya Abadi', 1),
('BK0007', 'ID_MIZ2016MTH03DDADT_B.jpg', 'Dilan 1990', 'Pidi Baiq', 2004, 'Graha ilmu – Yogyakarta', 1),
('BK0008', '220px-Steve_Jobs_by_Walter_Isaacson.jpg', 'Stive Jobs by Walter Isaacson', 'Walter Isaacson', 2006, '-', 1),
('BK0009', '375ce17b5a84a9a646227d258c6636f3.jpg', 'Indonesia Bhineka Yang Satu', 'jasmerah_id', 2006, 'LKiS', 1),
('BK0010', '31762_f.jpg', 'Ensiklopedia Bergambar Ilmu pengetahuan dan Teknologi', 'Andi Offset', 2004, 'Bukukita.com', 1),
('BK0011', '101584_f.jpg', 'Rembulan Tenggelam Diwajahmu', 'Tere-liye', 2006, 'Gramedia', 1),
('BK0012', 'andy-noya-kisah-hidupku.jpg', 'Sebuah Biografi ANDI NOYA kisah hidupku', 'andi noya', 2013, 'Gava Media', 1),
('BK0013', 'ayah.jpg', 'Ayah by Andrea Hinata', 'Andrea Hinata', 2010, 'Gava Media', 1),
('BK0014', 'bob-sadino-kisah-perjuangan-dan-inspirasi.jpg', 'Kisah Perjuangan dan Inspirasi BOB SADINO', 'punto ali fahmi', 2016, 'PT. Remaja Rosda Karya – Bandung', 1),
('BK0015', 'buku-6-cover-buku-pintar-nusantara.jpg', 'Buku Pintar Nusantara', 'A. Hamdi & A. Fadil', 2017, 'LKiS', 1),
('BK0016', 'buku-013-agus-sunyoto-rahuvana-tattwa.jpg', 'RAHUVANA TATTWA', 'Agus Sunyoto', 2008, 'LKiS', 1),
('BK0017', 'download.jpg', 'Biografi Mohhamad Natsir', 'Lukman Hakiem', 2007, 'LKiS', 1),
('BK0018', 'ID_EMK2014MTH01CRNU_B.jpg', 'Cerita Rakyat Nusantara', 'Faza', 2011, 'Gava Media', 1),
('BK0019', 'ID_EMK2018_MTH02_JMA.jpg', 'Sebuah Biograi Tentang Bisnis dan Kehidupan JACK MA & ALIBABA', 'Yan Qicheng', 2012, 'Gramedia', 1),
('BK0020', 'ID_KIPTSSE2019MTH04.jpg', 'Kebebasan Ilmu Pengetahuan & Teknologi', 'Mikhael Dua', 2016, 'LKIS', 1),
('BK0021', 'isi-kepala-elon-musk.jpg', 'Isi Kelapa  ELON MUSK', 'Rudie Hakim. dkk', 2013, 'LKiS', 1),
('BK0022', 'pulau-bali.jpg', 'Pulau Bali Temuan Yang Menakjubkan', 'Miguel .c', 2017, 'Gava Media', 1),
('BK0023', '9786024861643_Smp-Mts-Kelas-VIII-Wacika-Sari-Bali-Palajahan-Siswa-Jilid-2-Kurikulum-2013.jpg', 'Smp/Mts Kelas VIII Wacika Sari Bali Palajahan Siswa Jilid 2 Kurikulum 2013', 'I Nyoman Suwija', 2015, 'Erlangga', 1),
('BK0024', '9786023201679_Jual-Buku-SMP.jpg', 'Berlogika Dengan Matematika Jilid 2 Kurikulum 13 Revisi Terbaru', 'Umi Salamah', 2014, 'Platinum', 1),
('BK0025', '9786023745470C_9786023745470.jpg', 'Buku Teks Pendamping Ilmu Pengetahuan Sosial untuk Siswa SMP-MTs Kelas VIII ', 'Jaka Firman P, Lia Malyani, Taufan Harimurti', 2016, 'Yrama Widya', 1),
('BK0026', '9786024344610-edit.jpg', 'MP/MTS Kelas VII Buku Siswa English-Penilaian Jilid 1 Kurikulum 2013 Revisi', 'Nur Zaida', 2015, 'Erlangga', 1),
('BK0027', '9786023823864_Smp-Mts-Kelas-VII-Buku-Guru-Headline-English-Jilid-1-Kurikulum-2013.jpg', 'Smp/Mts Kelas VII Buku Guru Headline English Jilid 1 Kurikulum 2013', 'M. Badrus Sholeh / Noor Ahsin', 2015, 'Erlangga', 1),
('BK0028', '9786023747979_Smp-Mts-Kelas-VII-Buku-Guru-Bahasa-Indonesia-Jilid-1-Kurikulum-2013.jpg', 'Smp/Mts Kelas VII Buku Guru Bahasa Indonesia Jilid 1 Kurikulum 2013', 'Yadi Mulyadi , Ani Andriyani', 2017, 'Yrama Widya', 1),
('BK0029', '9786024345730_Smp-Mts-Kelas-VII-Buku-Siswa-IPA-Terpadu-Kurikulum-2013.jpg', ' Bagikan:  Smp/Mts Kelas VII Buku Siswa IPA Terpadu Kurikulum 2013', 'Eka Purjiyanta Agus Triyono Dkk', 2016, 'Erlangga', 1),
('BK0030', '9786024862077_Smp-Mts-Kelas-VIII-Panduan-Praktikum-IPA-Jilid-2-Kurikulum-2013.jpg', 'Smp/Mts Kelas VIII Panduan Praktikum IPA Jilid 2 Kurikulum 2013', 'Eka P.-Herni B', 2016, 'Erlangga', 1),
('BK0031', '9786022999850_IPS_TERPADU_KL3A.jpg', 'SMP Kelas IX PBT IPS Terpadu Jilid 3A Semester 1 Kurikulum 2013 Revisi', 'Sudrajat Sumiyati', 2015, 'Yudhi Tirta', 1),
('BK0032', '9786022999881_IPS_TERPADU_KL3B.jpg', 'SMP Kelas IX PBT IPS Terpadu Jilid 3B Semester 2 Kurikulum 2013 Revisi 2016', 'Sudrajat dan Sumiyati', 2016, 'Yudhi Tirta', 1),
('BK0033', '9786024349356_Smp-Mts-Kelas-IX-Buku-Penilaian-Bupena-IPS-Jilid-3-Kurikulum-2013.jpg', 'Smp/Mts Kelas IX Buku Penilaian (Bupena) IPS Jilid 3 Kurikulum 2013', 'T.D Haryo-N.Suparno', 2016, 'Erlangga', 1),
('BK0034', '9786024861179_Smp-Kelas-VIII-Mandiri-Pendidikan-Agama-Islam-dan-Budi-Perkerti-Jilid-2-Kurikulum-2013.jpg', 'Smp Kelas VIII Mandiri Pendidikan Agama Islam dan Budi Perkerti Jilid 2 Kurikulum 2013', 'Choeroni-Muh. Syafrudin-Nurokhim', 2016, 'Erlangga', 1),
('BK0035', '9786024443368_SMP-MTS-KL.VI.jpg', 'SMP/Mts Kelas VIII Seni Budaya Kurikulum Revisi 2013', 'EKO PURNOMO & TATANG SUBAGYO', 2016, 'BumiAksara', 1),
('BK0036', '9786023201433_SMP-KL.VIII-P.jpg', 'SMP Kelas VIII Passport To The World Jilid 2 K/13 Revisi', 'Djatmika / Agus Dwi Priyanto', 2016, 'Platinum', 1),
('BK0037', '9786022995357_PPKN-2-SMP-KE.jpg', 'SMP Kelas VIII PPKN Jilid 2 K13 Revisi 2016', 'Agus Dwiyono Dkk', 2016, 'Yudhi Tirta', 1),
('BK0038', '9786022997184_SMP-MTS-KL.VI.jpg', 'SMP MTS Kelas VIII Bahasa Indonesia Kurikulum 13 Revisi', 'E.B Devitta Ekawati dan Siti Isnatun M', 2016, 'Yudhi Tirta', 1),
('BK0039', '9786025081002_Buku_Cerdas_Ulangan_Harian_Bahasa_Indonesia_Smp_Mts_KL_VII.jpg', 'Buku Cerdas Ulangan Harian Bahasa Indonesia SMP/MTS Kelas VII', 'Nur Endah A', 2016, 'Erlangga', 1),
('BK0040', '9786024342166_English-On-Sky-SMP-MTs-Kelas-VIII-Jilid-2.jpg', 'English On Sky SMP/MTs Kelas VIII Jilid 2', 'Mukarto, Widya Kiswara, Sujatmiko', 2016, 'Erlangga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_buku`
--

CREATE TABLE `detail_buku` (
  `id_detail` varchar(15) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `ket` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_buku`
--

INSERT INTO `detail_buku` (`id_detail`, `id_buku`, `tgl_masuk`, `ket`, `status`) VALUES
('BK0001.DT1', 'BK0001', '2019-06-02', 'Sumbangan Mentri Pendidikan Indonesia', 2),
('BK0001.DT2', 'BK0001', '2020-07-02', 'buku baru', 2),
('BK0001.DT3', 'BK0001', '2020-07-14', 'Sumbangan Yayasan Membaca', 1),
('BK0001.DT4', 'BK0001', '2020-11-20', 'buku baru', 1),
('BK0002.DT1', 'BK0002', '2020-07-01', 'Sumbangan Yayasan Membaca', 2),
('BK0002.DT2', 'BK0002', '2020-07-24', 'Sumbangan 2020', 3),
('BK0003.DT1', 'BK0003', '2020-07-01', 'sumbangan', 1),
('BK0003.DT2', 'BK0003', '2020-07-14', 'Sumbangan', 1),
('BK0005.DT1', 'BK0005', '2020-07-01', 'Sumbangan Yayasan Membaca', 1),
('BK0006.DT1', 'BK0006', '2020-07-15', 'Sumbangan Yayasan Membaca', 1),
('BK0006.DT2', 'BK0006', '2020-07-16', 'Buku Sumbangan', 1),
('BK0007.DT1', 'BK0007', '2020-07-01', 'Pengadaan July 2020', 1),
('BK0007.DT2', 'BK0007', '2020-07-18', 'Pengadaan July 2020', 1),
('BK0008.DT1', 'BK0008', '2020-07-17', 'Pengadaan Buku 2020', 2),
('BK0009.DT1', 'BK0009', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0010.DT1', 'BK0010', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0011.DT1', 'BK0011', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0012.DT1', 'BK0012', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0013.DT1', 'BK0013', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0014.DT1', 'BK0014', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0015.DT1', 'BK0015', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0016.DT1', 'BK0016', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0017.DT1', 'BK0017', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0018.DT1', 'BK0018', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0019.DT1', 'BK0019', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0020.DT1', 'BK0020', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0021.DT1', 'BK0021', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0022.DT1', 'BK0022', '2020-07-17', 'Pengadaan Buku 2020', 1),
('BK0023.DT1', 'BK0023', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0024.DT1', 'BK0024', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0025.DT1', 'BK0025', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0026.DT1', 'BK0026', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0027.DT1', 'BK0027', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0028.DT1', 'BK0028', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0029.DT1', 'BK0029', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0030.DT1', 'BK0030', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0031.DT1', 'BK0031', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0032.DT1', 'BK0032', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0033.DT1', 'BK0033', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0034.DT1', 'BK0034', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0035.DT1', 'BK0035', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0036.DT1', 'BK0036', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0037.DT1', 'BK0037', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0038.DT1', 'BK0038', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0039.DT1', 'BK0039', '2020-07-20', 'Pengadaan Buku July 2020', 1),
('BK0040.DT1', 'BK0040', '2020-07-20', 'Pengadaan Buku July 2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `nama_pemesan` varchar(11) NOT NULL,
  `buku` varchar(10) NOT NULL,
  `batas_pesan` date DEFAULT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `waktu_pesan`, `nama_pemesan`, `buku`, `batas_pesan`, `status`) VALUES
(46, '2020-07-28 18:32:43', '15001', 'BK0009', '2020-07-24', '4'),
(47, '2020-07-28 18:34:30', '15001', 'BK0005', '2020-07-30', '5'),
(50, '2020-07-28 22:09:33', '15001', 'BK0011', '2020-07-30', '4'),
(52, '2020-07-28 22:14:52', '15003', 'BK0017', '2020-07-30', '4'),
(53, '2020-07-28 22:15:36', '15004', 'BK0017', '2020-08-13', '4'),
(54, '2020-07-30 06:04:33', '15001', 'BK0011', '2020-08-01', '5'),
(56, '2020-08-01 05:15:44', '15001', 'BK0009', '2020-08-09', '4'),
(57, '2020-08-07 16:42:07', '15004', 'BK0002', '2020-08-09', '5'),
(58, '2020-08-08 04:51:04', '51084', 'BK0001', '2020-08-10', '4'),
(59, '2020-11-07 08:43:26', '15002', 'BK0005', '2020-11-09', '5');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `peminjaman_buku` varchar(15) NOT NULL,
  `peminjaman_anggota` varchar(11) NOT NULL,
  `peminjaman_tanggal_mulai` date NOT NULL,
  `peminjaman_tanggal_sampai` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `peminjaman_status` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `peminjaman_buku`, `peminjaman_anggota`, `peminjaman_tanggal_mulai`, `peminjaman_tanggal_sampai`, `tanggal_kembali`, `peminjaman_status`, `ket`) VALUES
(11, 'BK0002.DT2', '15001', '2020-07-01', '2020-07-08', '2020-07-17', 1, NULL),
(12, 'BK0002.DT1', '15002', '2020-07-14', '2020-07-21', '2020-07-19', 1, NULL),
(13, 'BK0003.DT1', '15002', '2020-07-14', '2020-07-21', '2020-07-19', 1, NULL),
(14, 'BK0007.DT2', '15004', '2020-07-16', '2020-07-23', '2020-07-17', 1, NULL),
(15, 'BK0006.DT1', '15004', '2020-07-16', '2020-07-23', '2020-07-17', 1, NULL),
(16, 'BK0001.DT1', '15020', '2020-07-19', '2020-07-26', '2020-07-20', 1, NULL),
(17, 'BK0001.DT2', '15020', '2020-07-19', '2020-07-26', '2020-07-20', 1, NULL),
(18, 'BK0001.DT3', '15020', '2020-07-19', '2020-07-26', '2020-07-22', 1, NULL),
(19, 'BK0001.DT1', '15001', '2020-07-20', '2020-07-27', '2020-07-22', 1, NULL),
(20, 'BK0005.DT1', '15003', '2020-07-20', '2020-07-27', '2020-07-22', 1, NULL),
(21, 'BK0008.DT1', '15005', '2020-07-20', '2020-07-27', '2020-07-20', 1, NULL),
(22, 'BK0008.DT1', '15001', '2020-07-20', '2020-07-27', '2020-07-22', 1, NULL),
(24, 'BK0006.DT1', '15009', '2020-07-21', '2020-07-28', '2020-07-28', 1, NULL),
(25, 'BK0005.DT1', '15005', '2020-07-22', '2020-07-29', '2020-07-28', 1, NULL),
(26, 'BK0008.DT1', '15006', '2020-07-22', '2020-07-29', '2020-07-28', 1, NULL),
(27, 'BK0011.DT1', '15004', '2020-07-23', '2020-07-30', '2020-07-28', 1, NULL),
(28, 'BK0007.DT1', '15007', '2020-07-23', '2020-07-30', '2020-07-25', 1, NULL),
(29, 'BK0007.DT2', '15008', '2020-07-23', '2020-07-30', '2020-07-28', 1, NULL),
(30, 'BK0006.DT2', '15003', '2020-07-25', '2020-08-01', '2020-07-28', 1, NULL),
(31, 'BK0001.DT1', '15004', '2020-07-25', '2020-08-01', '2020-07-25', 1, NULL),
(32, 'BK0001.DT2', '15005', '2020-07-25', '2020-08-01', '2020-07-28', 1, NULL),
(33, 'BK0001.DT3', '15006', '2020-07-25', '2020-08-01', '2020-07-28', 1, NULL),
(34, 'BK0001.DT1', '15008', '2020-07-25', '2020-08-01', '2020-07-26', 1, NULL),
(35, 'BK0001.DT1', '15010', '2020-07-26', '2020-08-02', '2020-07-26', 1, NULL),
(36, 'BK0007.DT1', '15009', '2020-07-26', '2020-08-02', '2020-07-28', 1, NULL),
(37, 'BK0011.DT1', '15001', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(38, 'BK0008.DT1', '15010', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(39, 'BK0001.DT1', '15006', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(40, 'BK0022.DT1', '15008', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(41, 'BK0008.DT1', '15010', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(42, 'BK0005.DT1', '15005', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(43, 'BK0002.DT2', '15006', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(44, 'BK0008.DT1', '15005', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(45, 'BK0008.DT1', '15006', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(46, 'BK0009.DT1', '15029', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(47, 'BK0009.DT1', '15008', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(48, 'BK0005.DT1', '15002', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(49, 'BK0009.DT1', '15001', '2020-07-28', '2020-08-04', '2020-08-07', 1, NULL),
(50, 'BK0007.DT1', '15009', '2020-07-28', '2020-08-04', '2020-08-25', 1, NULL),
(51, 'BK0011.DT1', '15009', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(52, 'BK0001.DT1', '15007', '2020-07-28', '2020-08-04', '2020-08-25', 1, NULL),
(53, 'BK0002.DT1', '15007', '2020-07-28', '2020-08-04', '2020-08-25', 1, NULL),
(54, 'BK0011.DT1', '15008', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(55, 'BK0017.DT1', '15026', '2020-07-28', '2020-08-04', '2020-07-28', 1, NULL),
(56, 'BK0017.DT1', '15003', '2020-07-28', '2020-08-04', '2020-08-11', 1, NULL),
(57, 'BK0011.DT1', '15001', '2020-07-29', '2020-08-05', '2020-07-30', 1, NULL),
(58, 'BK0007.DT2', '15007', '2020-08-07', '2020-08-14', '2020-08-25', 1, NULL),
(60, 'BK0001.DT2', '15001', '2020-08-07', '2020-08-14', '2020-08-08', 1, NULL),
(62, 'BK0001.DT3', '15004', '2020-08-07', '2020-08-14', '2020-08-25', 1, NULL),
(63, 'BK0010.DT1', '15004', '2020-08-07', '2020-08-14', '2020-08-25', 1, NULL),
(64, 'BK0012.DT1', '15004', '2020-08-07', '2020-08-14', '2020-08-11', 1, NULL),
(65, 'BK0002.DT2', '15003', '2020-08-07', '2020-08-14', '2020-08-07', 1, NULL),
(66, 'BK0003.DT2', '15003', '2020-08-07', '2020-08-14', '2020-08-25', 1, NULL),
(67, 'BK0006.DT1', '15001', '2020-08-07', '2020-08-14', '2020-08-25', 1, NULL),
(68, 'BK0009.DT1', '15001', '2020-08-07', '2020-08-14', '2020-08-25', 1, NULL),
(69, 'BK0001.DT2', '51084', '2020-08-08', '2020-08-15', '2020-08-25', 1, NULL),
(70, 'BK0017.DT1', '15004', '2020-08-11', '2020-08-18', '2020-08-25', 1, NULL),
(71, 'BK0001.DT3', '15010', '2020-08-25', '2020-08-25', '2020-08-27', 1, 'terlambat 2 hari'),
(73, 'BK0001.DT2', '15005', '2020-08-27', '2020-09-03', '2020-08-27', 1, 'dikembalikan tepat waktu'),
(74, 'BK0001.DT2', '15001', '2020-08-19', '2020-08-26', '2020-09-01', 1, 'terlambat 6 hari, membayar dana keterlambatan Rp. 6000,00'),
(75, 'BK0007.DT1', '15001', '2020-08-19', '2020-08-26', '2020-09-01', 1, 'terlambat 6 hari, membayar dana keterlambatan Rp. 6000,00'),
(76, 'BK0008.DT1', '15001', '2020-08-25', '2020-08-26', '2020-09-01', 1, 'terlambat 6 hari'),
(77, 'BK0001.DT2', '15007', '2020-08-19', '2020-08-26', '2020-09-01', 1, 'terlambat 6 hari, membayar dana keterlambatan Rp. 6000,00'),
(78, 'BK0001.DT3', '15005', '2020-08-19', '2020-08-27', '2020-09-01', 1, 'terlambat 5 hari, membayar dana keterlambatan Rp. 5000,00'),
(79, 'BK0001.DT2', '15001', '2020-09-01', '2020-08-24', '2020-09-01', 1, 'terlambat 8 hari, membayar dana keterlambatan Rp. 8000,00'),
(80, 'BK0007.DT1', '15009', '2020-09-01', '2020-08-23', '2020-09-01', 1, 'terlambat 9 hari, membayar dana keterlambatan Rp. 9000,00'),
(81, 'BK0003.DT2', '15006', '2020-09-01', '2020-09-08', '2020-09-01', 1, 'dikembalikan tepat waktu'),
(82, 'BK0007.DT1', '15010', '2020-09-01', '2020-09-08', '2020-09-01', 1, 'dikembalikan tepat waktu'),
(83, 'BK0007.DT1', '15008', '2020-09-01', '2020-08-24', '2020-09-01', 1, 'terlambat 8 hari, membayar dana keterlambatan Rp. 8000,00'),
(84, 'BK0006.DT2', '15002', '2020-09-01', '2020-08-30', '2020-09-01', 1, 'terlambat 2 hari, membayar dana keterlambatan Rp. 2000,00'),
(85, 'BK0006.DT1', '15003', '2020-08-21', '2020-08-28', '2020-09-04', 1, 'terlambat 7 hari, membayar dana keterlambatan Rp. 7000,00'),
(86, 'BK0007.DT1', '15009', '2020-08-21', '2020-08-30', '2020-10-14', 1, 'terlambat 45 hari, membayar dana keterlambatan Rp. 45000,00'),
(87, 'BK0040.DT1', '15004', '2020-08-21', '2020-08-30', '2020-09-04', 1, 'terlambat 5 hari, membayar dana keterlambatan Rp. 5000,00'),
(88, 'BK0001.DT2', '15002', '2020-11-07', '2020-11-14', NULL, 2, NULL),
(90, 'BK0005.DT1', '15002', '2020-11-07', '2020-11-14', '2020-11-07', 1, 'dikembalikan tepat waktu'),
(91, 'BK0001.DT1', '15007', '2020-11-19', '2020-11-26', NULL, 2, NULL),
(92, 'BK0002.DT1', '15007', '2020-11-19', '2020-11-26', NULL, 2, NULL),
(93, 'BK0003.DT1', '15007', '2020-11-19', '2020-11-26', '2020-11-19', 1, 'dikembalikan tepat waktu');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenkel` varchar(11) NOT NULL,
  `no_hp` varchar(11) NOT NULL,
  `id_login` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `gambar`, `nama`, `jenkel`, `no_hp`, `id_login`) VALUES
(198801111, 'default.png', 'Dewa Putu Rinta, S. Pd', 'L', '0815299636', 'ID0001'),
(1900114454, 'default.png', 'Made Sarka Wijaya, S. Pd', 'L', '0811900219', 'ID0006');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_login` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` varchar(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_login`, `email`, `password`, `role`, `is_active`, `date_created`) VALUES
('1', 'admin@smpn1seltim.sch.id', '$2y$10$ihsCWSPGw39nGNUpRAa/IOfjoMt4FRTIpkKBJrHg3o6L/2pO/yMCa', 1, 'Y', 1594306487),
('2', 'kepsek@smpn1seltim.sch.id', '$2y$10$7S96STt8I/iuMQHJieD0V.AoBPjEKcpOYfC2q/ANpe4z4/0pQf1ba', 3, 'Y', 1594306487),
('ID0001', 'dewaputu@gmail.com', '$2y$10$45/ItHXQkhMj5y/GoK8xnO50UdpvGpFY/h8sfmkqi2VbHfDtFhc2K', 2, 'Y', 1594306487),
('ID0002', 'miartayasa@gmail.com', '$2y$10$HEOn2hPD8QiKQOwts2Bf7uOXu.SVeMRcOZvw2ZHfPVQiWrq0GcYr2', 4, 'Y', 1594732245),
('ID0003', 'madeintan18@gmail.com', '$2y$10$c5XYUVBwUupAAW4fGGt2puKJ.Nz6gF7HUquWx9vOGFw2nqdTN7e92', 4, 'Y', 1594734125),
('ID0004', 'Assabilnur@gmail.com', '$2y$10$bmF5ksu5wrUBqPisWdE3IezZsftrb2j1zB78p6O8wLjGgutUSIyYm', 4, 'Y', 1594739669),
('ID0005', 'nketuts@gmail.com', '$2y$10$N3IOcpj7ucbih45sA0IfG.jq699tUOFfX1J26sIo2RyOFcfsQX/j.', 4, 'Y', 1594739758),
('ID0006', 'sarkawijaya@gmail.com', '$2y$10$uAkE0zqM9X/392RQqRe4UugbTd1ekbU3VV1ZEwZzbjXJ8wS.c93TO', 2, 'Y', 1594926612),
('ID0007', 'dianap@gmail.com', '$2y$10$i67shN6IOwqhgfqbR2iaJO4UFd/saehpYzUq5GR42eEX4PjCkuvba', 4, 'Y', 1594978697),
('ID0008', 'aa@gmail.com', '$2y$10$30KdzPoLWgbK69kvWnPigewxTPF3qu.WYz76OBp.EaZg3eV5BrJNu', 4, 'Y', 1595042090),
('ID0009', 'sugeng@gmail.com', '$2y$10$s8LrOlCInjsr7AlAtv2M5eTygNmDTBl4M5R/35S9oxjFdJXqWyVOy', 4, 'Y', 1595225750),
('ID0010', 'jemek@gmail.com', '$2y$10$p84tNz5RP6c1F39uK.pROOKzaI/KBEvUYJQMW0ArfbVlOTZjEeRqS', 4, 'Y', 1595225788),
('ID0011', 'elaf@gmail.com', '$2y$10$Cgr0nz4KkQRjjR0aQUpXNuSWfYUVf5/zbPs3JdZDZxU/3sjIpW6MS', 4, 'Y', 1595225851),
('ID0012', 'artadana@gmail.com', '$2y$10$VndyPVhoszPOxZbUn1TonekHj847inGak5TxhnpvSlYTeA12D.1Tu', 4, 'N', 1595225938),
('ID0013', 'resti101@gmail.com', '$2y$10$edM6BhbzAA6TSdh2181//umw7.6r4DX00UpElunWQMZy7dRZ0DhaG', 4, 'Y', 1595226000),
('ID0014', 'elaadisaputra@gmail.com', '$2y$10$FDfUfdfThx7yqE/iR7MBhOY4o8pPRoeouRxnPEq.0KUCdIujj.Rvq', 4, 'N', 1595226049),
('ID0015', 'idabagus@gmail.com', '$2y$10$hfPXfoR.gbXJspqLOrLzq.8ndDbHteDoN6wfsTewthOX8vf7eZjuC', 4, 'N', 1595226077),
('ID0016', 'riska111@gmail.com', '$2y$10$2eCK2w2s/OhUA7Un30yrtu/bY4XhaKXLFF.bEg7MnVuJuQRmcD4xe', 4, 'N', 1595226105),
('ID0017', 'sumada@gmail.com', '$2y$10$PM.n6QCJcTItmltiXh1Rx.oG26UBMrL0t7k7AcdjV0xhRZXsBg7Q2', 4, 'N', 1595226129),
('ID0018', 'kadekdwi@gmail.com', '$2y$10$atfpGdLzdWHJ.K7fFtzayepuIa6LwbuZ/OUWMQwS/VU/B61/5beGq', 4, 'N', 1595226159),
('ID0019', 'yuniimhp@gmail.com', '$2y$10$MLYkmXFXBSHbVrCzUTh2RO9VVKylzITYAI.9/yqFM/UaHjOlvkqzy', 4, 'N', 1595226202),
('ID0020', 'widiastuti@gmail.com', '$2y$10$n7iXtPX6wgjF2X.5Yynx2e1dReXNdUwvQL3WgIpH.KfhzHhgEgksS', 4, 'N', 1595226235),
('ID0021', 'pitayanti@gmail.com', '$2y$10$VQD5C/t2jl/VDB5fVIUAzuDW00I/XJ55wbGcrTAsqGCt7vnvDkXnW', 4, 'N', 1595226270),
('ID0022', 'sandiwid@gmail.com', '$2y$10$VmvutCqs12lHpLoDcvx98.buYIJxQt2kUgdhBUq1bNtrFZBIIDAsi', 4, 'N', 1595226314),
('ID0023', 'erma111@gmail.com', '$2y$10$aPreU9vhS87L.psOno4zVebICa1FQIMvMhzv6vchpIuvNIZKxRc92', 4, 'N', 1595226343),
('ID0024', 'ritaratna@gmail.com', '$2y$10$T/RSx2EpdyJ1kVvh9sWAtOwNy6ksyQNKDeMQZOHIAQQdZEYvi5iKS', 4, 'N', 1595226379),
('ID0025', 'putriad@gmail.com', '$2y$10$DxsFbljMMpmBfgs0U2wNMesqcx.sHOTwBioysG5Kl1TFoP73.Fnp2', 4, 'N', 1595226418),
('ID0026', 'restuimade@gmail.com', '$2y$10$PWgodQuiz.AJoITnc8fPWe67PZKX4mmx1Xk1W5YDXdVAI2VMPinwa', 4, 'N', 1595226457),
('ID0027', 'devi001@gmail.com', '$2y$10$EWVcVTCCbOF0Ut2YJzsPNO.N/u2owxdtvEpLTluK3FWRm5.MIV9zm', 4, 'N', 1595226590),
('ID0028', 'indahsari@gmail.com', '$2y$10$Ww0/Fxn1gubb5s82hPv17unr3XL40jQF23LZYhR/0Ie8paPDXO842', 4, 'N', 1595226650),
('ID0029', 'suwidnyanaput@gmail.com', '$2y$10$HZD5hY6u9YpAdxfJCZb.Yu0vyX35Y.3YHwG5lZCzbWM4J7apCrhrK', 4, 'N', 1595226682),
('ID0030', 'oded001@gmail.com', '$2y$10$JDbMD0CewFa1yjUbaZK5wO5Wcz1s/8VA3YWunzcBKY1HKa5TsgTju', 4, 'N', 1595226725),
('ID0031', 'yudha@gmail.com', '$2y$10$e.QpctAMlkXeiADzagnRIOFsH4uNzdWIwAngBgmDqRF5kE6qyLqpa', 4, 'N', 1595226784),
('ID0032', 'yudika@gmail.com', '$2y$10$nbLttYlXQgl2FFjhZl89Qud8OyUa6JjgRc8mQBWU5mO019WJplewu', 4, 'N', 1595226828),
('ID0033', 'sony111@gmail.com', '$2y$10$guxE80X.FxbckV/yaK.RIO9h.rkqeHp6h.PjmBFkrQDjx54eL06GS', 4, 'N', 1595226869),
('ID0034', 'cindimaharani@gmail.com', '$2y$10$7Xkv/aGWk5cgbNc.fGgKE.V2FOdD/L56GX3148hYekT9vhuoz5CgK', 4, 'N', 1595226919),
('ID0035', 'muncanwahyu@gmail.com', '$2y$10$ZMageqrFgptRaLGdatzokuddrtx178H37p8bmn0mBGURDAv3jlNOK', 4, 'N', 1595226958),
('ID0036', 'febryanto@gmail.com', '$2y$10$mL10zR6wHXr8iT0L6/qmweBDXCaWGOYWAt0L0jf9nxUtWXLaFO5Cq', 4, 'N', 1595227002),
('ID0037', 'nadiput@gmail.com', '$2y$10$CYQ5CoMPVzzG0StzRbQkOOvE8igRuQeOLCLHB5cJlD6Ef56.jA2pm', 4, 'N', 1595227040),
('ID0038', 'putusrinadi@gmail.com', '$2y$10$3d//sq0zk7.OONqjSNgc4OMrZdQfQxNjkzKnWD3oPCCNSxEDWghFW', 4, 'N', 1595227078),
('ID0039', 'bagasputra@gmail.com', '$2y$10$XYcYKaQxXQOTv7YaIS44l.IidQ7QkF6OHFMUTaO.awX846.othBfO', 4, 'N', 1595227116),
('ID0040', 'radityapun@gmail.com', '$2y$10$ZW7NrKTh3Se5/nNmmIiRBOS.2ubVJuDkg1Enra1wDbjLNAy3BvBQ2', 4, 'N', 1595227182),
('ID0041', 'tutadi@gmail.com', '$2y$10$q/T1oy8Ee7K/zGayha1fzu.ejTXsIj.XBb37R1Xgy6MDLm7ce3jvu', 4, 'N', 1595227344),
('ID0042', 'yanadi@gmail.com', '$2y$10$/m.coKpbIf.f1Dtl7z7I8eVEGXa2DC6D5pgsosJCRJDDGc6a2/9gq', 4, 'N', 1595227372),
('ID0044', 'dwikaaa@gmail.com', '$2y$10$1n2MTpI768bAWuvTao9NMeIa8sGybjBcCJjwn0/UZd0Xz5Ef/c52O', 4, 'Y', 1596050232),
('ID0045', 'radifannn@gmail.com', '$2y$10$FHqquBryQFQj/uzHgZzRAun9q4LS09WTrJP.ngBE2r8jKGt81yLMi', 4, 'Y', 1596854980),
('ID0046', 'miartayasa10@gmail.com', '$2y$10$SRM8UVR9crsmSJJjZhLaEOny2nJpCTBsKw5nA1rIVn5xY9RLmGhSi', 4, 'Y', 1598491709);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_buku_ibfk_1` (`id_buku`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `nama_pemesan` (`nama_pemesan`),
  ADD KEY `buku` (`buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD KEY `peminjaman_anggota` (`peminjaman_anggota`),
  ADD KEY `peminjaman_buku` (`peminjaman_buku`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `user` (`id_login`);

--
-- Constraints for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD CONSTRAINT `detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`nama_pemesan`) REFERENCES `anggota` (`nis`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`peminjaman_anggota`) REFERENCES `anggota` (`nis`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`peminjaman_buku`) REFERENCES `detail_buku` (`id_detail`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `user` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
