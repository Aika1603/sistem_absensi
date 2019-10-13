-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 12:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alikhlas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `user_akses`, `password`, `avatar`, `alamat`, `no_hp`, `email`) VALUES
(0, 'admin2', 'admin', 'c84258e9c39059a89ab77d846ddab909', 'avatar.png', '-', '-', 'admin2@absensi.com'),
(1, 'Asep Saepul P', 'user', 'user', 'avatar.png', '-', '0', 'user@gmail.com'),
(6, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '6.jpg', '--', '089648338115', 'admin@absensi.com');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(51) NOT NULL,
  `user_akses` varchar(5) NOT NULL,
  `password` varchar(51) NOT NULL,
  `avatar` varchar(25) NOT NULL,
  `alamat` varchar(233) NOT NULL,
  `no_hp` varchar(22) NOT NULL,
  `email` varchar(45) NOT NULL,
  `NIP` varchar(100) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `id_jk` varchar(20) NOT NULL,
  `id_mengajar` varchar(22) NOT NULL,
  `kelas` varchar(22) NOT NULL,
  `status` varchar(22) NOT NULL,
  `jabatan` varchar(122) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`user_id`, `user_name`, `user_akses`, `password`, `avatar`, `alamat`, `no_hp`, `email`, `NIP`, `nama`, `id_jk`, `id_mengajar`, `kelas`, `status`, `jabatan`, `tgl_lahir`, `tempat_lahir`) VALUES
(7, 'Asep Saepul ', 'guru', '77e69c137812518e359196bb2f5e9bb9', 'avatar.png', '--', '089648338115', 'asep.saepul205@gmail.com', '211098700010011', 'Asep Saepul Pahmit, S.Kom', 'Laki-laki', 'MTK01', 'X IPA 1', 'PNS', 'Wali Kelas', '2017-06-15', 'Karawang'),
(10, 'asep', 'guru', 'guru', 'avatar.png', '', '--', 'guru@absensi.com', '21347657467283001', 'Asep Saepul Pahmit,S.kom', 'Laki-laki', 'MTK01', '', 'PNS', 'Wali Kelas', '2017-06-20', 'Karawang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `no` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_absenpelajaran`
--

CREATE TABLE `tb_absenpelajaran` (
  `no` int(11) NOT NULL,
  `id_pelajaran` varchar(25) NOT NULL,
  `id_mengajar` varchar(25) NOT NULL,
  `NIS` varchar(35) NOT NULL,
  `nama` varchar(52) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `pertemuan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(22) NOT NULL,
  `keterangan` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(51) NOT NULL,
  `user_akses` varchar(5) NOT NULL,
  `password` varchar(51) NOT NULL,
  `avatar` varchar(25) NOT NULL,
  `alamat` varchar(233) NOT NULL,
  `no_hp` varchar(22) NOT NULL,
  `email` varchar(45) NOT NULL,
  `NIP` varchar(100) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `id_jk` varchar(20) NOT NULL,
  `id_mengajar` varchar(22) NOT NULL,
  `kelas` varchar(22) NOT NULL,
  `status` varchar(22) NOT NULL,
  `jabatan` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`user_id`, `user_name`, `user_akses`, `password`, `avatar`, `alamat`, `no_hp`, `email`, `NIP`, `nama`, `id_jk`, `id_mengajar`, `kelas`, `status`, `jabatan`) VALUES
(1, 'Asep Saepul Pahmit', 'guru', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', '--', '089648338115', 'asep.saepul205@gmail.com', '21347657467283002', 'Asep Saepul Pahmit, S.Kom.', 'Laki-laki', 'MTK01', '', 'Honorer', 'Pembina'),
(2, 'Asep Saepul Pahmit', 'guru', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', '--', '089648338115', 'guru@absensi.com', '21347657467283001', 'Asep Saepul Pahmit, S.Kom.', 'Laki-laki', 'MTK02', '', 'Honorer', 'Pembina');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hari`
--

CREATE TABLE `tb_hari` (
  `id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hari`
--

INSERT INTO `tb_hari` (`id`, `hari`) VALUES
(7, 'AHAD'),
(5, 'JUMAT'),
(4, 'KAMIS'),
(3, 'RABU'),
(6, 'SABTU'),
(2, 'SELASA'),
(1, 'SENIN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwalpelajaran`
--

CREATE TABLE `tb_jadwalpelajaran` (
  `id` int(11) NOT NULL,
  `id_pelajaran` varchar(100) NOT NULL,
  `id_mengajar` varchar(50) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_belajar` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `materi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwalpelajaran`
--

INSERT INTO `tb_jadwalpelajaran` (`id`, `id_pelajaran`, `id_mengajar`, `hari`, `jam_belajar`, `kelas`, `materi`) VALUES
(47, 'MTK01XIPA1', 'MTK01', 'SENIN', '1', 'X IPA 1', 'Matematika'),
(48, 'MTK01XIPA1', 'MTK01', 'SENIN', '2', 'X IPA 1', 'Matematika'),
(49, 'MTK01XIPA2', 'MTK01', 'SENIN', '3', 'X IPA 2', 'Matematika'),
(50, 'MTK01XIPA2', 'MTK01', 'SENIN', '4', 'X IPA 2', 'Matematika'),
(51, 'MTK01XIPA3', 'MTK01', 'SENIN', '5', 'X IPA 3', 'Matematika'),
(60, 'MTK01XIPA3', 'MTK01', 'SENIN', '6', 'X IPA 3', 'Matematika'),
(61, 'MTK01XIPA1', 'MTK01', 'SENIN', '7', 'X IPA 3', 'Matematika'),
(62, 'MTK01XIIPA1', 'MTK01', 'SELASA', '1', 'XI IPA 1', 'Matematika'),
(63, 'MTK01XIIPA1', 'MTK01', 'SELASA', '2', 'XI IPA 1', 'Matematika'),
(64, 'MTK01XIIPA2', 'MTK01', 'SELASA', '3', 'XI IPA 2', 'Matematika'),
(65, 'MTK01XIIPA2', 'MTK01', 'SELASA', '4', 'XI IPA 2', 'Matematika'),
(66, 'MTK01XIIPA3', 'MTK01', 'SELASA', '5', 'XI IPA 3', 'Matematika'),
(67, 'MTK03XIPA1', 'MTK03', 'KAMIS', '4', 'X IPA 1', 'Matematika Minat'),
(68, 'MTK01XIPA1', 'MTK01', 'RABU', '7', 'X IPA 1', 'Matematika Minat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jambelajar`
--

CREATE TABLE `tb_jambelajar` (
  `jam_belajar` varchar(100) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jambelajar`
--

INSERT INTO `tb_jambelajar` (`jam_belajar`, `mulai`, `selesai`) VALUES
('1', '07:00:00', '08:00:00'),
('2', '08:00:00', '09:30:00'),
('3', '10:00:00', '11:00:00'),
('4', '11:00:00', '12:00:00'),
('5', '12:30:00', '13:00:00'),
('6', '13:00:00', '14:00:00'),
('7', '14:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jk`
--

CREATE TABLE `tb_jk` (
  `id_jk` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jk`
--

INSERT INTO `tb_jk` (`id_jk`, `jk`) VALUES
('Laki-laki', ''),
('Perempuan', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `wali_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `kelas`, `wali_kelas`) VALUES
(1, 'X IPA 1', 'Asep Saepul Pahmit, S.Kom'),
(2, 'X IPA 2', '-'),
(3, 'X IPA 3', 'Asep Saepul Pahmit,S.kom'),
(4, 'X IPA 4', '-'),
(5, 'X IPA 5', '-'),
(6, 'X IPS 1', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `NIS` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jk` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NISN` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`NIS`, `nama`, `id_jk`, `kelas`, `tgl_lahir`, `tempat_lahir`, `email`, `no_hp`, `foto`, `alamat`, `NISN`) VALUES
(1, 'Budi', 'Laki-laki', 'X IPA 2', '1998-02-11', 'Karawang', '-', '-', '1.png', '-', 123),
(131410134, 'Asep Saepul Pahmit\'', 'Laki-laki', 'X IPA 1', '2017-08-11', 'Karawang', 'asep.saepul205@gmail.com', '089648338115', '131410134.jpg', 'klari, jawa barat', 80817081),
(131410165, 'Asep Saepul Pahmit', 'Laki-laki', 'X IPA 3', '2017-08-11', 'Karawang', 'asep.saepul205@gmail.com', '089648338115', '131410134.jpg', 'klari, jawa barat', 80817081),
(131410166, 'Riski Putra ZA', 'Laki-laki', 'X IPA 3', '2017-06-14', 'Merauke Barat', 'Rian205@gmail.com', '0862136812412', 'avatar.png', 'sukamakmur, madura utara', 11081998),
(131410167, 'Guan Hadi', 'Laki-laki', 'X IPA 3', '2017-06-11', 'Surabaya', 'guan@absensi.com', '089648338115', '131410164.jpg', 'malayasia', 1314912482);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status` varchar(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status`, `jabatan`) VALUES
('Honorer', ''),
('PNS', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanggal`
--

CREATE TABLE `tb_tanggal` (
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tanggal`
--

INSERT INTO `tb_tanggal` (`tanggal`) VALUES
('2017-04-01'),
('2017-04-09'),
('2017-04-11'),
('2017-04-12'),
('2017-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_uji`
--

CREATE TABLE `tb_uji` (
  `NO` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_uji`
--

INSERT INTO `tb_uji` (`NO`, `NIS`, `nama`, `kelas`, `tanggal`, `status`, `keterangan`) VALUES
(81, 13141005, 'Riski Ap', 'DTA 1', '2017-04-11', 'S', 'Tidak Hadir'),
(82, 13141011, 'Rian Dmasiv', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(83, 13141061, 'Riski Putra ZA', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(84, 13141063, 'Rian Jukastik', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(85, 133141011, 'April R.P', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(86, 133141012, 'Rian Dmasiv', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(87, 133141015, 'Riski Putra ZA', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(88, 133141016, 'Rian Jukastik', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(89, 133141020, 'April R.P', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(90, 133141021, 'Rian Dmasiv', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(91, 133141024, 'Riski Putra ZA', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(92, 133141025, 'Rian Jukastik', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(93, 133141029, 'April R.P', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(94, 133141030, 'Rian Dmasiv', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(95, 133141033, 'Riski Putra ZA', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(96, 133141034, 'Rian Jukastik', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(97, 133141038, 'Riski Ap', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(98, 133141039, 'Rian Dmasiv', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(99, 133141040, 'Riski Putra ZA', 'DTA 1', '2017-04-11', 'M', 'Hadir'),
(100, 133141041, 'Rian Jukastik', 'DTA 1', '2017-04-11', 'I', 'Tidak Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `wali_kelas` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_akses`, `kelas`, `wali_kelas`, `password`, `avatar`, `alamat`, `no_hp`, `email`) VALUES
(6, 'Sekretaris X IPA 1', 'user', 'X IPA 1', 'Asep Saepul Pahmit, S.Kom', '8ba2b9d3e1a053b8f7c1e6baac4becdf', 'avatar.png', '--', '089648338115', 'xipa1@absensi.com'),
(8, 'Sekretaris X IPA 2', 'user', 'X IPA 2', 'tidak ada', 'acf5a5eaca496fe90bd6473d95264f3c', 'avatar.png', '--', '089648338115', 'xipa2@absensi.com'),
(9, 'Sekretaris X IPA 3', 'user', 'X IPA 3', '', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', '--', '089648338115', 'xipa3@absensi.com'),
(10, 'Sekretaris X IPA 4', 'user', 'X IPA 4', '', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', '--', '089648338115', 'xipa4@absensi.com'),
(11, 'Sekretaris X IPA 5', 'user', 'X IPA 5', '', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', '--', '089648338115', 'xipa5@absensi.com'),
(12, 'Sekretaris X IPS 1', 'user', 'X IPS 1', '', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', '--', '089648338115', 'xips1@absensi.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `id_mengajar` (`id_mengajar`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_absenpelajaran`
--
ALTER TABLE `tb_absenpelajaran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `id_mengajar` (`id_mengajar`);

--
-- Indexes for table `tb_hari`
--
ALTER TABLE `tb_hari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hari` (`hari`);

--
-- Indexes for table `tb_jadwalpelajaran`
--
ALTER TABLE `tb_jadwalpelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jambelajar`
--
ALTER TABLE `tb_jambelajar`
  ADD PRIMARY KEY (`jam_belajar`);

--
-- Indexes for table `tb_jk`
--
ALTER TABLE `tb_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wali_kelas` (`wali_kelas`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `id_jk` (`id_jk`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `tb_tanggal`
--
ALTER TABLE `tb_tanggal`
  ADD PRIMARY KEY (`tanggal`);

--
-- Indexes for table `tb_uji`
--
ALTER TABLE `tb_uji`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;
--
-- AUTO_INCREMENT for table `tb_absenpelajaran`
--
ALTER TABLE `tb_absenpelajaran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_hari`
--
ALTER TABLE `tb_hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_jadwalpelajaran`
--
ALTER TABLE `tb_jadwalpelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `NIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131410168;
--
-- AUTO_INCREMENT for table `tb_uji`
--
ALTER TABLE `tb_uji`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
