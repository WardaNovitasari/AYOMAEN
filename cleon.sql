-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 09:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleon`
--

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tipe_file` varchar(10) NOT NULL,
  `ukuran_file` int(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `id_form`, `tgl_upload`, `nama_file`, `tipe_file`, `ukuran_file`, `file`, `id_tipe`) VALUES
(1, 1, '2019-12-26', 'Upload-2019-12-26-1', 'kmz', 40222, '../file/menara/KMS/Upload-2019-12-26-1.kmz', 1),
(2, 1, '2019-12-26', 'Upload-2019-12-26-1', 'xls', 24064, '../file/menara/excel/Upload-2019-12-26-1.xls', 2),
(3, 2, '2019-12-26', 'Upload-2019-12-26-2', 'kmz', 40222, '../file/menara/KMS/Upload-2019-12-26-2.kmz', 1),
(4, 2, '2019-12-26', 'Upload-2019-12-26-2', 'xls', 20992, '../file/menara/excel/Upload-2019-12-26-2.xls', 2),
(5, 3, '2019-12-26', 'Upload-2019-12-26-3', 'kmz', 40222, '../file/menara/KMS/Upload-2019-12-26-3.kmz', 1),
(6, 3, '2019-12-26', 'Upload-2019-12-26-3', 'xls', 20992, '../file/menara/excel/Upload-2019-12-26-3.xls', 2),
(7, 4, '2019-12-29', 'Upload-2019-12-26-3-2019-12-29-4', 'kmz', 40222, '../file/menara/KMS/Upload-2019-12-26-3-2019-12-29-4.kmz', 1),
(8, 4, '2019-12-29', 'Upload-2019-12-26-3-2019-12-29-4', 'xls', 20992, '../file/menara/excel/Upload-2019-12-26-3-2019-12-29-4.xls', 2),
(9, 5, '2019-12-29', 'Upload-2019-12-26-3-2019-12-29-5', 'kmz', 40222, '../file/menara/KMS/Upload-2019-12-26-3-2019-12-29-5.kmz', 1),
(10, 5, '2019-12-29', 'Upload-2019-12-26-3-2019-12-29-5', 'xls', 20992, '../file/menara/excel/Upload-2019-12-26-3-2019-12-29-5.xls', 2),
(11, 6, '2020-03-06', 'Statistika-2020-03-06-6', 'kmz', 0, '../file/menara/KMS/Statistika-2020-03-06-6.kmz', 1),
(12, 6, '2020-03-06', 'Statistika-2020-03-06-6', 'xlsx', 12185, '../file/menara/excel/Statistika-2020-03-06-6.xlsx', 2),
(13, 7, '2020-03-06', 'Upload-2020-03-06-7', 'kmz', 24064, '../file/menara/KMS/Upload-2020-03-06-7.kmz', 1),
(14, 7, '2020-03-06', 'Upload-2020-03-06-7', 'xls', 24064, '../file/menara/excel/Upload-2020-03-06-7.xls', 2),
(15, 8, '2020-03-16', 'Upload-2020-03-16-8', 'kmz', 24064, '../file/menara/KMS/Upload-2020-03-16-8.kmz', 1),
(16, 8, '2020-03-16', 'Upload-2020-03-16-8', 'xls', 24064, '../file/menara/excel/Upload-2020-03-16-8.xls', 2),
(17, 9, '2020-03-16', 'Upload (1)-2020-03-16-9', 'kmz', 24064, '../file/menara/KMS/Upload (1)-2020-03-16-9.kmz', 1),
(18, 9, '2020-03-16', 'Upload (1)-2020-03-16-9', 'xls', 24064, '../file/menara/excel/Upload (1)-2020-03-16-9.xls', 2),
(19, 10, '2020-03-16', 'Upload-2020-03-16-10', 'kmz', 24064, '../file/menara/KMS/Upload-2020-03-16-10.kmz', 1),
(20, 10, '2020-03-16', 'Upload-2020-03-16-10', 'xls', 24576, '../file/menara/excel/Upload-2020-03-16-10.xls', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status_akun` enum('pengajuan','belum_verifikasi','terverifikasi','ditolak') NOT NULL DEFAULT 'pengajuan',
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  `hint` varchar(32) NOT NULL,
  `tipe_akun` enum('perusahaan','mitra') NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `no_hp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `username`, `email`, `password`, `status_akun`, `level`, `hint`, `tipe_akun`, `nm_user`, `no_hp`) VALUES
(1, 'admin', 'uwutest22@gmail.com', '202cb962ac59075b964b07152d234b70', 'terverifikasi', 'admin', '', 'perusahaan', '', ''),
(11, 'irvanjunaidi9@gmail.com', 'irvanjunaidi9@gmail.com', '202cb962ac59075b964b07152d234b70', 'terverifikasi', 'user', 'e0c641195b27425bb056ac56f8953d24', 'mitra', 'irvan', ''),
(12, 'irvanjunaidi2@gmail.com', 'irvanjunaidi2@gmail.com', '202cb962ac59075b964b07152d234b70', 'belum_verifikasi', 'user', '860320be12a1c050cd7731794e231bd3', 'perusahaan', 'irvan', '+6288805949569'),
(14, 'overs.academy@gmail.com', 'overs.academy@gmail.com', '202cb962ac59075b964b07152d234b70', 'terverifikasi', 'user', '42a0e188f5033bc65bf8d78622277c4e', 'perusahaan', 'Sans', '08912345678'),
(15, 'khofhsbkh@gmail.com', 'khofhsbkh@gmail.com', '202cb962ac59075b964b07152d234b70', 'terverifikasi', 'user', '069059b7ef840f0c74a814ec9237b6ec', 'mitra', 'Khof', '088228382283'),
(17, 'syarifahaini0912@gmail.com', 'syarifahaini0912@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'terverifikasi', 'user', '1700002963a49da13542e0726b7bb758', 'perusahaan', 'syarifah', '62895421862699'),
(18, 'eksanw@gmail.com', 'eksanw@gmail.com', '202cb962ac59075b964b07152d234b70', 'terverifikasi', 'user', '2291d2ec3b3048d1a6f86c2c4591b7e0', 'mitra', 'irvan', '6281229494943'),
(19, 'moarvin1234@gmail.com', 'moarvin1234@gmail.com', '698d51a19d8a121ce581499d7b701668', 'terverifikasi', 'user', 'e57c6b956a6521b28495f2886ca0977a', 'mitra', 'Sanss', '6282331393097'),
(23, 'bambang@bambang.bamabang', 'bambang@bambang.bamabang', 'a9711cbb2e3c2d5fc97a63e45bbe5076', 'pengajuan', 'user', '', 'mitra', 'Bambang', '6217054130560'),
(24, 'arifkhoiruman2@gmail.com', 'arifkhoiruman2@gmail.com', '202cb962ac59075b964b07152d234b70', 'belum_verifikasi', 'user', '7f1de29e6da19d22b51c68001e7e0e54', 'mitra', 'Arif', '62082255172926');

-- --------------------------------------------------------

--
-- Table structure for table `tb_apisms`
--

CREATE TABLE `tb_apisms` (
  `id_api` int(11) NOT NULL,
  `username_api` varchar(50) NOT NULL,
  `password_api` varchar(50) NOT NULL,
  `url_api` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_apisms`
--

INSERT INTO `tb_apisms` (`id_api`, `username_api`, `password_api`, `url_api`) VALUES
(1, 'irvan1999_api', 'Asj081a', 'http://api.nusasms.com/api/v3/sendsms/plain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_atasan`
--

CREATE TABLE `tb_atasan` (
  `id_atasan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nip` bigint(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_atasan`
--

INSERT INTO `tb_atasan` (`id_atasan`, `nama`, `nip`, `jabatan`) VALUES
(1, 'Tri Haryanto, ST, MT', 197307311999031005, 'Ka. Bidang Persandian dan Telekomunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita_acara`
--

CREATE TABLE `tb_berita_acara` (
  `id_berita` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tgl_survey` date NOT NULL,
  `tgl_berita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita_acara`
--

INSERT INTO `tb_berita_acara` (`id_berita`, `id_form`, `tahun`, `tgl_survey`, `tgl_berita`) VALUES
(1, 2, 2019, '2019-12-20', '2019-12-26'),
(2, 3, 2019, '2019-12-27', '2019-12-26'),
(3, 5, 2019, '2019-12-29', '2019-12-29'),
(4, 10, 2020, '2020-03-23', '2020-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dinas`
--

CREATE TABLE `tb_dinas` (
  `id_dinas` int(11) NOT NULL,
  `nama_dinas` varchar(100) NOT NULL,
  `pimpinan` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `keterangan_penugasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dinas`
--

INSERT INTO `tb_dinas` (`id_dinas`, `nama_dinas`, `pimpinan`, `phone`, `email`, `keterangan_penugasan`) VALUES
(1, 'Dinas Pendidikan', 'Ir. Drs. Budi Santosa Asrori, MM', '0857575675757', 'pendidikan@jogjakota.go.id', ''),
(2, 'Dinas Kesehatan', 'dr. Fita Yulia Kisworini, M.Kes', '', 'kesehatan@jogjakota.go.id', ''),
(3, 'Dinas Pekerjaan Umum, Perumahan, dan Kawasan Permu', 'Agus Tri Haryono, ST, MT', '', 'puperkim@jogjakota.go.id', ''),
(4, 'undefined', 'undefined', 'undefined', 'undefined', 'undefined'),
(5, 'Dinas Perhubungan', 'Agus Arif Nugroho, S.STP, M.Si', '', 'perhubungan@jogjakota.go.id', ''),
(6, 'Satuan Polisi Pamong Praja', 'Drs. Agus Winarto', '', 'polpp@jogjakota.go.id', ''),
(7, 'Dinas Penanaman Modal dan Perizinan', 'Drs. Nurwidihartana', '', 'pmperizinan@jogjakota.go.id', ''),
(8, 'Dinas Sosial', 'Agus Sudrajat, SKM. M.Kes', '', 'sosia@jogjakota.go.id', ''),
(9, 'Dinas Perindustrian dan Perdagangan', 'Drs. Yunianto Dwisutono', '', 'perindag@jogjakota.go.id', ''),
(10, 'Dinas Kependudukan dan Pencatatan Sipil', 'H. Sisruwadi, SH. M.Kn', '', 'dukcapil@jogjakota.go.id', ''),
(11, 'Dinas Pertanahan dan Tata Ruang', 'Ir. Hari Setyowacono, MT', '', 'pertanahantataruang@jogjakota.go.id', ''),
(12, 'Dinas Koperasi, Usaha Kecil dan Menengah, Tenaga K', 'Dra. Christina Lucy Irawati', '', 'kopnakertrans@jogjakota.go.id', ''),
(13, 'Dinas Pemuda dan Olahraga', 'Drs. Edy Heri Suasana, M.Pd', '', 'pemudaolahraga@jogjakota.go.id', ''),
(14, 'Dinas Kebakaran', 'Drs. Nur Hidayat, M.Si', '', 'kebakaran@jogjakota.go.id', ''),
(15, 'Dinas Pemberdayaan Masyarakat , Perempuan, dan Perlindungan Anak', 'Ir. Edy Muhammad', '', 'pmp2a@jogjakota.go.id', ''),
(16, 'Dinas Pengendalian Penduduk dan Keluarga Berencana', 'drg. Emma Rahmi Aryani, MM', '', 'daldukkb@jogjakota.go.id', ''),
(17, 'Dinas Pertanian dan Pangan', 'Drs. Sugeng Darmanto', '', 'ertanianpangan@jogjakota.go.id', ''),
(18, 'Dinas Lingkungan Hidup', 'Ir. Suyana', '', 'lingkunganhidup@jogjakota.go.id', ''),
(19, 'Dinas Komunikasi Informatika dan Persandian', 'Ig. Trihastono, S.Sos, MM', '', 'kominfosandi@jogjakota.go.id', ''),
(20, 'Dinas Perpustakaan dan Kearsipan', 'Wahyu Hendratmoko, SE, MM', '', 'perpusarsip@jogjakota.go.id', ''),
(21, 'Dinas Pariwisata', 'Drs. Maryustion Tonang, MM', '', 'pariwisata@jogjakota.go.id', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_file`
--

CREATE TABLE `tb_file` (
  `id_tipe` int(11) NOT NULL,
  `tipe_file` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_file`
--

INSERT INTO `tb_file` (`id_tipe`, `tipe_file`) VALUES
(1, 'KMZ'),
(2, 'excel');

-- --------------------------------------------------------

--
-- Table structure for table `tb_file_fiber`
--

CREATE TABLE `tb_file_fiber` (
  `id` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tipe_file` varchar(10) NOT NULL,
  `ukuran_file` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_form_fiber`
--

CREATE TABLE `tb_form_fiber` (
  `id_form` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `soal_1` enum('Ada','Tidak') NOT NULL,
  `soal_2` enum('Ada','Tidak') NOT NULL,
  `soal_3` enum('Ada','Tidak') NOT NULL,
  `soal_4` enum('Ada','Tidak') NOT NULL,
  `soal_5` enum('Ada','Tidak') NOT NULL,
  `soal_6` enum('Ada','Tidak') NOT NULL,
  `soal_7` enum('Ada','Tidak') NOT NULL,
  `soal_8` enum('Ada','Tidak') NOT NULL,
  `soal_9` enum('Ada','Tidak') NOT NULL,
  `soal_10` enum('Ada','Tidak') NOT NULL,
  `tgl_pengajuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_form_menara`
--

CREATE TABLE `tb_form_menara` (
  `id_form` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `soal_1` enum('Ada','Tidak') NOT NULL,
  `soal_2` enum('Ada','Tidak') NOT NULL,
  `soal_3` enum('Ada','Tidak') NOT NULL,
  `soal_4` enum('Ada','Tidak') NOT NULL,
  `soal_5` enum('Ada','Tidak') NOT NULL,
  `soal_6` enum('Ada','Tidak') NOT NULL,
  `soal_7` enum('Ada','Tidak') NOT NULL,
  `soal_8` enum('Ada','Tidak') NOT NULL,
  `soal_9` enum('Ada','Tidak') NOT NULL,
  `soal_10` enum('Ada','Tidak') NOT NULL,
  `soal_11` enum('Ada','Tidak') NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status_form` enum('pemeriksaan','lengkap','tidak_lengkap') NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_form_menara`
--

INSERT INTO `tb_form_menara` (`id_form`, `id_perusahaan`, `soal_1`, `soal_2`, `soal_3`, `soal_4`, `soal_5`, `soal_6`, `soal_7`, `soal_8`, `soal_9`, `soal_10`, `soal_11`, `tgl_pengajuan`, `status_form`, `no_surat`, `tgl_surat`) VALUES
(2, 5, 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', '2019-12-26', 'lengkap', '12345', '2019-12-25'),
(3, 5, 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', '2019-12-26', 'lengkap', '15579', '2019-12-26'),
(4, 8, 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', '2019-12-29', 'lengkap', '9', '2019-12-29'),
(5, 8, 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', '2019-12-29', 'lengkap', '9', '2019-12-29'),
(10, 2, 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', '2020-03-16', 'lengkap', '111', '2020-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `digit_awal` varchar(11) NOT NULL,
  `kecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`digit_awal`, `kecamatan`) VALUES
('01', 'DANUREJAN'),
('02', 'GEDONGTENGEN'),
('03', 'GONDOKUSUMAN'),
('04', 'GONDOMANAN'),
('05', 'JETIS'),
('06', 'KOTAGEDE'),
('07', 'KRATON'),
('08', 'MANTRIJERON'),
('09', 'MERGANGSAN'),
('10', 'NGAMPILAN'),
('11', 'PAKUALAMAN'),
('12', 'TEGALREJO'),
('13', 'UMBULHARJO'),
('14', 'WIROBRAJAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `digit_awal` varchar(11) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `digit_akhir` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`id_kelurahan`, `digit_awal`, `kelurahan`, `digit_akhir`) VALUES
(1, '01', 'BAUSASRAN', '01'),
(2, '01', 'SURYATMAJAN', '02'),
(3, '01', 'TEGALPANGGUNG', '03'),
(4, '02', 'PRINGGOKUSUMAN', '01'),
(5, '02', 'SOSROMENDURAN', '02'),
(6, '03', 'BACIRO', '01'),
(7, '03', 'DEMANGAN', '02'),
(8, '03', 'KLITREN', '03'),
(9, '03', 'KOTABARU', '04'),
(10, '03', 'TERBAN', '05'),
(11, '04', 'NGUPASAN', '01'),
(12, '04', 'PRAWIRODIRJAN', '02'),
(13, '05', 'BUMIJO', '01'),
(14, '05', 'COKRODININGRATAN ', '02'),
(15, '05', 'GOWONGAN', '03'),
(16, '06', 'PRENGGAN', '01'),
(17, '06', 'PURBAYAN', '02'),
(18, '06', 'REJOWINANGUN', '03'),
(19, '07', 'KADIPATEN ', '01'),
(20, '07', 'PANEMBAHAN', '02'),
(21, '07', 'PATEHAN', '03'),
(22, '08', 'GEDONGKIWO ', '01'),
(23, '08', 'MANTRIJERON', '02'),
(24, '08', 'SURYODININGRATAN', '03'),
(25, '09', 'BRONTOKUSUMAN', '01'),
(26, '09', 'KEPARAKAN', '02'),
(27, '09', 'WIROGUNAN', '03'),
(28, '10', 'NGAMPILAN', '01'),
(29, '10', 'NOTOPRAJAN', '02'),
(30, '11', 'GUNUNGKETUR', '01'),
(31, '11', 'PURWOKINANTI', '02'),
(32, '12', 'BENER', '01'),
(33, '12', 'KARANGWARU', '02'),
(34, '12', 'KRICAK', '03'),
(35, '12', 'TEGALREJO', '04'),
(36, '13', 'GIWANGAN', '01'),
(37, '13', 'MUJAMUJU', '02'),
(38, '13', 'PANDEYAN', '03'),
(39, '13', 'SEMAKI', '04'),
(40, '13', 'SOROSUTAN ', '05'),
(41, '13', 'TAHUNAN', '06'),
(42, '13', 'WARUNGBOTO', '07'),
(43, '14', 'PAKUNCEN', '01'),
(44, '14', 'PATANGPULUHAN', '02'),
(45, '14', 'WIROBRAJAN', '03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nip` bigint(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `posisi` enum('kepala','pengawas','KA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama`, `nip`, `jabatan`, `posisi`) VALUES
(1, 'Ananto Susetyawan, A. Md', 197904291998121001, 'Dinas Komunikasi Informatika & Persandian', 'pengawas'),
(2, 'Laras Prilawati, A.Md', 198104042006042015, 'Dinas Penanaman Modal & Perizinan', 'pengawas'),
(3, 'Ir. Ariatmawan Prihandono', 196401221990031006, 'DInas Pertanahan & Tata Ruang', 'pengawas'),
(4, 'Edy Suwantara', 196912061993031007, 'Dinas Pekerjaan Umum Perumahan & Kawasan Pemukiman', 'pengawas'),
(5, 'Nanang Supriyanta', 197804262009011005, 'Satuan Polisi Pamong Praja', 'pengawas'),
(6, 'Turasno', 198410282010011003, 'Dinas Komunikasi Informatika & Persandian', 'pengawas'),
(7, 'IGNAITIUS TRIHASTONO, S.Sos, M', 196907231996031005, 'KEPALA', 'kepala'),
(8, 'TRI HARYANTO, ST, MT', 197307311999031005, 'Ka. Bidang Persandian dan Telekomunikasi', 'KA'),
(9, '3', 3, '3', 'pengawas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nm_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(50) NOT NULL,
  `status_aktif` enum('terkirim','ditolak','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `id_akun`, `nm_perusahaan`, `alamat_perusahaan`, `status_aktif`) VALUES
(2, 11, 'PT ABC', 'Jl.Abc', 'diterima'),
(3, 12, 'PT ABC3', 'JL.ABC3', 'diterima'),
(5, 14, 'Smooth', 'jl demak', 'diterima'),
(6, 15, 'Katering Siti', 'Kec Mlati', 'terkirim'),
(7, 16, 'PT. AJG RHN', 'Jember Jawa Timur Indonesia', 'terkirim'),
(8, 17, 'Kya', 'Jln Kya', 'diterima'),
(9, 18, 'Pt cleon', 'jl. kesahatan no 209', 'diterima'),
(10, 19, 'Santuy', 'jl rumah', 'diterima'),
(11, 19, 'UWU', 'kyoto', 'diterima'),
(12, 11, 'Satu', 'Jl Satu', 'diterima'),
(13, 11, 'Dua', 'Jl Dua', 'diterima'),
(14, 23, 'PT Bambang', 'Jl Bambang', 'terkirim'),
(15, 24, 'PT Arif', 'Jl Kaliurang', 'terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekomendasi`
--

CREATE TABLE `tb_rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `tgl_rekomendasi` date NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `keterangan_rekomendasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekomendasi`
--

INSERT INTO `tb_rekomendasi` (`id_rekomendasi`, `id_tempat`, `tgl_rekomendasi`, `id_dinas`, `keterangan_rekomendasi`) VALUES
(5, 1, '2019-12-28', 8, 'existing perda'),
(6, 5, '2020-03-23', 0, ''),
(8, 12, '2020-04-22', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `kategori` enum('menara','fiber optik') NOT NULL,
  `id_tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id`, `soal`, `kategori`, `id_tipe`) VALUES
(1, 'Surat permohonan rekomendasi kepada Kepala Dinas Komunikasi Informatika dan Persandian (ttd Pimpinan Perusahaan)\r\ncatatan : memuat no surat, tanggal surat, data perusahaan dan lampiran data titik lokasi menara/fo', 'menara', '2'),
(2, 'FC bukti pembayaran PBB tahun berjalan, sertifikat dan surat perjanjian/pernyataan persetujuan penggunaan tanah\r\ncatatan : untuk persil warga/masyarakat & dijadikan satu per lokasi menara', 'menara', ''),
(3, 'Surat pernyataan yang menyatakan bahwa Menara Telekomunikasi akan beroperasional paling lambat 18 (delapan belas) bulan sejak Rekomendasi diterbitkan (ttd Pimpinan Perusahaan)\r\ncatatan : lampiran data titik lokasi menara sesuai pengajuan', 'menara', ''),
(4, 'Rekomendasi titik lokasi Menara Telekomunikasi, melampirkan srat pernyataan kesanggupan untuk menjadi Menara bersama (ttd Pimpinan Perusahaan)\r\ncatatan : lampiran data titik lokasi menara sesuai pengajuan', 'menara', ''),
(5, 'Peta lokasi titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik dan titik tiang Fiber Optik\r\ncatatan : persebaran menara/fo dalam 1 peta kota Yogyakarta sesuai pengajuan', 'menara', ''),
(6, 'FC Dokumen legalitas perusahaan\r\ncatatan : fc akta pendirian, fc ktp pimpinan, fc npwp perusahaan, fc tanda daftar perusahaan & fc perizinan lain yang dimiliki', 'menara', ''),
(7, 'Surat pernyataan yang berisi bahwa fotocopy dokumen yang dilampirkan sesuai dengan aslinya (ttd Pimpinan Perusahaan)', 'menara', ''),
(8, 'Surat kuasa atau surat penunjukan untuk mengurus Rekomendasi titik lokasi Menara Telekomunikasi atau jaringan Fiber Optik\r\ncatatan : apabila dikuasakan pihak lain bukan dari perusahaan & bermatrai Rp 6.000,-', 'menara', ''),
(9, 'Data/file softcopy titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik\r\ncatatan : data menara/fo selengkap mungkin sesuai pengajuan', 'menara', '1'),
(10, 'Surat keterangan kelaikan konstruksi bangunan untuk pendirian Menara Telekomunikasi dari penyedia jasa pengawasan yang memiliki sertifikat keahlian atau lembaga yang berkompeten di bidang bangunan gedung\r\ncatatan : sejumlah bangunan yang ada menara ketinggian s/d 6 meter (bukan sejumlah menara)', 'menara', ''),
(11, 'Surat pernyataan kesanggupan pemohon untuk bertanggung jawab dan menanggungjawab segala resiko/kerusakan/kerugian pihak lain termasuk pembiayaannya akibat bangunan Menara Telekomunikasi roboh (ttd Pimpinan Perusahaan)\r\ncatatan : lampiran data menara/fo sesuai pengajuan', 'menara', ''),
(12, 'Surat permohonan rekomendasi kepada Kepala Dinas Komunikasi Informatika dan Persandian (ttd Pimpinan Perusahaan)\r\ncatatan : memuat no surat, tanggal surat, data perusahaan dan lampiran data titik lokasi menara/fo', 'fiber optik', '2'),
(13, 'Rekomendasi jaringan Fiber Optik harus melampirkan FC izin penyelenggaraan jaringan tetap tertutup atau FC izin prinsip penyelenggaraan jaringan tetap tertutup dari Kementerian Komunikasi dan Informatika yang dilegalisir', 'fiber optik', ''),
(14, 'Surat pernyataan kesanggupan sewa aset Pemerintah Daerah', 'fiber optik', ''),
(15, 'Kesanggupan berpartisipasi untuk peningkatan sarana prasarana pelayanan publik kepada Pemerintah Daerah (ttd Pimpinan Perusahaan)\r\ncatatan : apabila menggunakan aset pemkot & lampiran data titik lokasi menara/fo sesuai pengajuan', 'fiber optik', ''),
(16, 'Rekomendasi jaringan Fiber Optik, melampirkan surat pernyataan kesanggupan untuk menjadi tiang Fiber Optik bersama (ttd Pimpinan Perusahaan)\r\ncatatan : lampiran data titik tiang fo sesuai pengajuan', 'fiber optik', ''),
(17, 'Peta lokasi titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik dan titik tiang Fiber Optik\r\ncatatan : persebaran menara/fo dalam 1 peta kota Yogyakarta sesuai pengajuan', 'fiber optik', ''),
(18, 'FC Dokumen legalitas perusahaan\r\ncatatan : fc akta pendirian, fc ktp pimpinan, fc npwp perusahaan, fc tanda daftar perusahaan & fc perizinan lain yang dimiliki', 'fiber optik', ''),
(19, 'Surat pernyataan yang berisi bahwa fotocopy dokumen yang dilampirkan sesuai dengan aslinya (ttd Pimpinan Perusahaan)', 'fiber optik', ''),
(20, 'Surat kuasa atau surat penunjukan untuk mengurus Rekomendasi titik lokasi Menara Telekomunikasi atau jaringan Fiber Optik\r\ncatatan : apabila dikuasakan pihak lain bukan dari perusahaan & bermatrai Rp 6.000,-', 'fiber optik', ''),
(21, 'Data/file softcopy titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik catatan : data menara/fo selengkap mungkin sesuai pengajuan', 'fiber optik', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat_fiber`
--

CREATE TABLE `tb_tempat_fiber` (
  `id_tempat` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `tipe_menara` varchar(50) NOT NULL,
  `tinggi` double NOT NULL,
  `status_tempat` enum('pengajuan','ditolak','hasil_survey','proses_rekom','cetak_rekom','belum_dikirim','pemeriksaan_berkas') NOT NULL,
  `alasan` text NOT NULL,
  `tgl_disetujui` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat_menara`
--

CREATE TABLE `tb_tempat_menara` (
  `id_tempat` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `lat_hasil` double NOT NULL,
  `lng_hasil` double NOT NULL,
  `tipe_menara` varchar(50) NOT NULL,
  `tipe_site` enum('1','3','4') NOT NULL,
  `tinggi` double NOT NULL,
  `status_tempat` enum('pengajuan','revisi','proses_survey','proses_rekom','cetak_rekom','belum_dikirim','rekom_expired','pengajuan_ulang') NOT NULL,
  `alasan` text NOT NULL,
  `tgl_disetujui` date NOT NULL,
  `aset_lokasi` enum('persil warga','Aset Pemkot Yogyakarta','') NOT NULL,
  `site_id_hasil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tempat_menara`
--

INSERT INTO `tb_tempat_menara` (`id_tempat`, `id_form`, `nomor`, `site_id`, `alamat`, `kelurahan`, `kecamatan`, `lat`, `lng`, `lat_hasil`, `lng_hasil`, `tipe_menara`, `tipe_site`, `tinggi`, `status_tempat`, `alasan`, `tgl_disetujui`, `aset_lokasi`, `site_id_hasil`) VALUES
(1, 2, 1, 123456, 'Yogyakarta', 'PRAWIRODIRJAN', 'GONDOMANAN', -7.81668, 110.37929, 0, 0, 'Macrocell-RT', '1', 10, 'cetak_rekom', '- exist aktif\n- tinggi 10 meter', '0000-00-00', 'Aset Pemkot Yogyakarta', ''),
(2, 3, 1, 123456, 'Yogyakarta', 'PURWOKINANTI', 'PAKUALAMAN', -7.81668, 110.37929, -7.8167, 110.3793, 'Macrocell-RT', '', 10, 'proses_survey', '', '0000-00-00', 'Aset Pemkot Yogyakarta', ''),
(4, 5, 1, 123456, 'Yogyakarta', 'SOSROMENDURAN', 'GEDONGTENGEN', -7.81668, 110.37929, -7.81668, 110.37929, 'Macrocell-RT', '', 10, 'pengajuan', 'undefined', '0000-00-00', '', ''),
(5, 10, 120, 10, 'jember', 'tegalgede', 'sumbersari', 100, 122, 0, 0, '2', '', 100, 'rekom_expired', '', '0000-00-00', 'persil warga', '100'),
(12, 10, 120, 10, 'jember', 'tegalgede', 'sumbersari', 100, 122, 0, 0, '2', '', 100, 'rekom_expired', '', '0000-00-00', 'persil warga', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_apisms`
--
ALTER TABLE `tb_apisms`
  ADD PRIMARY KEY (`id_api`);

--
-- Indexes for table `tb_atasan`
--
ALTER TABLE `tb_atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `tb_berita_acara`
--
ALTER TABLE `tb_berita_acara`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_form` (`id_form`);

--
-- Indexes for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `tb_file`
--
ALTER TABLE `tb_file`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `tb_file_fiber`
--
ALTER TABLE `tb_file_fiber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_form_fiber`
--
ALTER TABLE `tb_form_fiber`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `tb_form_menara`
--
ALTER TABLE `tb_form_menara`
  ADD PRIMARY KEY (`id_form`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`digit_awal`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `digit_awal` (`digit_awal`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD UNIQUE KEY `nm_perusahaan` (`nm_perusahaan`);

--
-- Indexes for table `tb_rekomendasi`
--
ALTER TABLE `tb_rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`),
  ADD KEY `id_tempat` (`id_tempat`),
  ADD KEY `id_dinas` (`id_dinas`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tempat_fiber`
--
ALTER TABLE `tb_tempat_fiber`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `tb_tempat_menara`
--
ALTER TABLE `tb_tempat_menara`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_apisms`
--
ALTER TABLE `tb_apisms`
  MODIFY `id_api` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_atasan`
--
ALTER TABLE `tb_atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_berita_acara`
--
ALTER TABLE `tb_berita_acara`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_file`
--
ALTER TABLE `tb_file`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_file_fiber`
--
ALTER TABLE `tb_file_fiber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_form_fiber`
--
ALTER TABLE `tb_form_fiber`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_form_menara`
--
ALTER TABLE `tb_form_menara`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_rekomendasi`
--
ALTER TABLE `tb_rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_tempat_fiber`
--
ALTER TABLE `tb_tempat_fiber`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tempat_menara`
--
ALTER TABLE `tb_tempat_menara`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita_acara`
--
ALTER TABLE `tb_berita_acara`
  ADD CONSTRAINT `tb_berita_acara_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `tb_form_menara` (`id_form`);

--
-- Constraints for table `tb_form_fiber`
--
ALTER TABLE `tb_form_fiber`
  ADD CONSTRAINT `tb_form_fiber_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `tb_perusahaan` (`id_perusahaan`);

--
-- Constraints for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD CONSTRAINT `tb_kelurahan_ibfk_1` FOREIGN KEY (`digit_awal`) REFERENCES `tb_kecamatan` (`digit_awal`);

--
-- Constraints for table `tb_rekomendasi`
--
ALTER TABLE `tb_rekomendasi`
  ADD CONSTRAINT `tb_rekomendasi_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tb_tempat_menara` (`id_tempat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
