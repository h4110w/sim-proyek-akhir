-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2018 at 05:13 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tppa`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `idagenda` int(11) NOT NULL,
  `nama_agenda` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_agenda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`idagenda`, `nama_agenda`, `keterangan`, `tgl_agenda`) VALUES
(1, 'Pengumpulan Berkas PA', '<p></p><p></p><ol><li>Scan Form Bimbingan<br></li><li>Softcopy Buku PA<br></li><li>Scan Persetujuan Maju<br></li></ol><p></p><p></p>', '2018-08-08'),
(3, 'Sidang PA', '<ol><li>Bawa Project&nbsp;</li><li>Pakai pakain rapi hitam putih</li><li>Bawa hardcopy Buku PA</li></ol>', '2018-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `idb` int(12) NOT NULL,
  `idjudul` varchar(50) NOT NULL,
  `nrp` int(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `bimbingan` varchar(100) DEFAULT NULL,
  `nip` varchar(12) NOT NULL,
  `acc` varchar(12) NOT NULL,
  `tgl_bimbingan` date DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`idb`, `idjudul`, `nrp`, `status`, `bimbingan`, `nip`, `acc`, `tgl_bimbingan`, `keterangan`) VALUES
(14, '23', 2102137002, 'Proposal', 'file_1534907210.JPG', '002', 'Belum', '2018-08-22', 'hitohira no hanabira ga'),
(15, '23', 2102137002, 'TA', 'file_1534907288.JPG', '002', 'Belum', '2018-08-22', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `deadline`
--

CREATE TABLE `deadline` (
  `iddeadline` int(3) NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`iddeadline`, `dari`, `sampai`) VALUES
(1, '2018-08-05', '2018-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `namadosen` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nomerhp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `namadosen`, `prodi`, `alamat`, `nomerhp`) VALUES
('001', 'Arda Gusema', 'Teknik Informatika', 'Perumahan Sumekar - Sumenep', '085931195599'),
('002', 'Lusiana Agustien', 'Teknik Informatika', 'Bangselok - Sumenep', '081230001128'),
('003', 'Tedy Wahyudi', 'Teknik Informatika', 'Bluto - Sumenep', '085203949534'),
('004', 'Fardiansyah', 'Teknik Informatika', 'Perumahan Sumekar - Sumenep', '087850403034'),
('005', 'Rully Widiastutik', 'Teknik Informatika', 'Karangduak - Sumenep', '082330549483');

-- --------------------------------------------------------

--
-- Table structure for table `judul`
--

CREATE TABLE `judul` (
  `idjudul` int(11) NOT NULL,
  `judul` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `dokumen` text,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_acc` date DEFAULT NULL,
  `tahun` varchar(20) NOT NULL,
  `pembimbing1` varchar(50) NOT NULL,
  `pembimbing2` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul`
--

INSERT INTO `judul` (`idjudul`, `judul`, `username`, `deskripsi`, `dokumen`, `tanggal_pengajuan`, `tanggal_acc`, `tahun`, `pembimbing1`, `pembimbing2`, `status`, `komentar`) VALUES
(21, 'Sistem Informasi Agus 1', '2102137001', '<p>ini deskripsi agus</p>', 'file_1533144083.pdf', '2018-08-01', '2018-08-06', '2018', '002', '003', 'Diambil', ''),
(22, 'Sistem Informasi Agus 2', '2102137001', '<p>ini deskripsi agus 2</p>', 'file_1533144122.pdf', '2018-08-01', '2018-08-01', '2018', '005', '004', 'Disetujui', ''),
(23, 'Sistem Informasi Jazuli 1', '2102137002', '<p>ini deskripsi jazuli</p>', 'file_1533144163.pdf', '2018-08-01', '2018-08-22', '2018', '002', '003', 'Diambil', ''),
(24, 'Sistem Informasi Jazuli 2', '2102137002', '<p>ini deskripsi jazuli 2</p>', 'file_1533144214.pdf', '2018-08-01', '2018-08-01', '2018', '004', '003', 'Ditolak', 'deskripsi kurang'),
(25, 'Sistem Informasi Andika 1', '2102137003', '<p>ini deskripsi andika 1</p>', 'file_1533144855.pdf', '2018-08-01', '2018-08-01', '2018', '004', '003', 'Ditolak', 'deskripsi kurang'),
(26, 'Sistem Informasi Andika 2', '2102137003', '<p>ini deskripsi andika 2</p>', 'file_1533144903.pdf', '2018-08-01', '2018-08-01', '2018', '004', '002', 'Disetujui', ''),
(27, 'Sistem Informasi Bilal 1', '2102137020', '<p>ini deskripsi</p>', 'file_1534126285.pdf', '2018-08-13', NULL, '2018', '001', '003', 'Belum Disetujui', ''),
(31, 'Kimi no Shiranai Monogatari', '2102137020', '<p>itsumodri no ano hi no koto<br />kimi wo totsuzen yagari ita</p>', NULL, '2018-08-14', NULL, '2018', '001', '004', 'Belum Disetujui', ''),
(33, 'Sistem Informasi Srikandi', '', '', NULL, '2018-08-14', NULL, '2018', '', '', 'Saran', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama_mahasiswa`, `jurusan`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`) VALUES
('2102137001', 'Agus Sairi', 'Teknik Informatika', 'Laki-Laki', 'Sumenep', '1995-06-28', 'Ganding - Sumenep\r\n', '087750148703'),
('2102137002', 'Ahmad Jazuli', 'Teknik Informatika', 'Laki-Laki', 'Sumenep', '1994-06-30', 'Ambunten - Sumenep', '085232400533'),
('2102137003', 'Fauzan Andika', 'Teknik Informatika', 'Laki-Laki', 'Sumenep', '1995-07-05', 'Kertasada - Kalianget', '087752074959'),
('2102137004', 'Mohammad Kafi', 'Teknik Informatika', 'Laki-Laki', 'Sumenep', '1994-02-10', 'Manding - Sumenep', '085257083914'),
('2102137020', 'Mohammad Bilal', 'Teknik Informatika', 'Laki-Laki', 'Sumenep', '1996-10-05', 'Kepanjin - Sumenep							\r\n										      ', '082302072211'),
('2103137003', 'Imam Arifin', 'Multimedia', 'Laki-Laki', 'Sumenep', '1994-07-10', 'Kolor - Sumenep', '');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `idset` int(3) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`idset`, `keterangan`, `status`) VALUES
(1, 'rekomendasi', 'tampil');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `level`) VALUES
(2, 'admin', 'admin', 'Admin'),
(4, '2102137002', '2102137002', 'Mahasiswa'),
(5, '2102137001', '2102137001', 'Mahasiswa'),
(13, '2103137003', '2103137003', 'Mahasiswa'),
(14, '001', '001', 'Dosen'),
(17, '002', '002', 'Dosen'),
(18, '003', '003', 'Dosen'),
(19, '004', '004', 'Dosen'),
(20, '005', '005', 'Dosen'),
(21, '2102137003', '2102137003', 'Mahasiswa'),
(22, '2102137020', '2102137020', 'Mahasiswa'),
(23, '2102137004', '2102137004', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vjudul`
-- (See below for the actual view)
--
CREATE TABLE `vjudul` (
`idjudul` int(11)
,`nrp` varchar(50)
,`nama_mahasiswa` varchar(50)
,`judul` text
,`deskripsi` text
,`dokumen` text
,`status` varchar(20)
,`jurusan` varchar(50)
,`tanggal_pengajuan` date
,`tanggal_acc` date
,`p1` varchar(50)
,`pembimbing1` varchar(50)
,`p2` varchar(50)
,`pembimbing2` varchar(50)
,`no_hp` varchar(15)
,`tahun` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vmhsbimbingan`
-- (See below for the actual view)
--
CREATE TABLE `vmhsbimbingan` (
`nama_mahasiswa` varchar(50)
,`nrp` varchar(50)
,`judul` text
,`no_hp` varchar(15)
,`pembimbing1` varchar(50)
,`pembimbing2` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `vjudul`
--
DROP TABLE IF EXISTS `vjudul`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vjudul`  AS  select `j`.`idjudul` AS `idjudul`,`m`.`nrp` AS `nrp`,`m`.`nama_mahasiswa` AS `nama_mahasiswa`,`j`.`judul` AS `judul`,`j`.`deskripsi` AS `deskripsi`,`j`.`dokumen` AS `dokumen`,`j`.`status` AS `status`,`m`.`jurusan` AS `jurusan`,`j`.`tanggal_pengajuan` AS `tanggal_pengajuan`,`j`.`tanggal_acc` AS `tanggal_acc`,`j`.`pembimbing1` AS `p1`,(select `d`.`namadosen` from `dosen` `d` where (`j`.`pembimbing1` = `d`.`nip`)) AS `pembimbing1`,`j`.`pembimbing2` AS `p2`,(select `d`.`namadosen` from `dosen` `d` where (`j`.`pembimbing2` = `d`.`nip`)) AS `pembimbing2`,`m`.`no_hp` AS `no_hp`,`j`.`tahun` AS `tahun` from (`mahasiswa` `m` join `judul` `j`) where (`m`.`nrp` = `j`.`username`) ;

-- --------------------------------------------------------

--
-- Structure for view `vmhsbimbingan`
--
DROP TABLE IF EXISTS `vmhsbimbingan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmhsbimbingan`  AS  select `m`.`nama_mahasiswa` AS `nama_mahasiswa`,`m`.`nrp` AS `nrp`,`j`.`judul` AS `judul`,`m`.`no_hp` AS `no_hp`,`j`.`pembimbing1` AS `pembimbing1`,`j`.`pembimbing2` AS `pembimbing2` from (`mahasiswa` `m` join `judul` `j`) where (`j`.`username` = `m`.`nrp`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD UNIQUE KEY `idagenda` (`idagenda`);

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`idb`);

--
-- Indexes for table `deadline`
--
ALTER TABLE `deadline`
  ADD PRIMARY KEY (`iddeadline`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`idjudul`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`idset`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `idb` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deadline`
--
ALTER TABLE `deadline`
  MODIFY `iddeadline` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `idjudul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `idset` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
