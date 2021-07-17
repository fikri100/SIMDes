-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 10:11 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

/* SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; */
AUTOCOMMIT := 0;
START TRANSACTION;
time_zone := "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_berita`
-- (See below for the actual view)
--
CREATE TABLE detail_berita (
id_berita int
,judul varchar(50)
,isi text
,tgl_berita timestamp(0)
,rubrik varchar(10)
,cover_file varchar(60)
,status int
,nik varchar(16)
,nama varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_kegiatan`
-- (See below for the actual view)
--
CREATE TABLE detail_kegiatan (
id_kegiatan int
,bidang varchar(20)
,nama varchar(50)
,tgl_mulai date
,tgl_selesai date
,output varchar(50)
,kendala varchar(255)
,saran varchar(255)
,ketua_pelaksana varchar(50)
,catatan varchar(100)
,status int
,lampiran_file varchar(100)
,id_pengaduan int
,kode varchar(4)
,dana varchar(50)
,pelapor varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_pengaduan`
-- (See below for the actual view)
--
CREATE TABLE detail_pengaduan (
id_pengaduan int
,judul varchar(100)
,bidang varchar(20)
,lokasi varchar(25)
,kategori varchar(20)
,uraian text
,tgl_pengaduan timestamp(0)
,status int
,lampiran_file varchar(60)
,nik varchar(16)
,nama varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_umkm`
-- (See below for the actual view)
--
CREATE TABLE detail_umkm (
id_umkm int
,nama varchar(50)
,bidang varchar(20)
,nik_pemilik varchar(20)
,no_telp varchar(15)
,alamat varchar(100)
,tgl_berdiri date
,deskripsi text
,logo_file varchar(100)
,status int
,pemilik varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE tbl_berita (
  id_berita int NOT NULL,
  judul varchar(50) NOT NULL,
  isi text NOT NULL,
  tgl_berita timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  rubrik varchar(10) NOT NULL,
  cover_file varchar(60) NOT NULL,
  status int NOT NULL DEFAULT '0',
  nik varchar(16) NOT NULL
) ;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO tbl_berita (id_berita, judul, isi, tgl_berita, rubrik, cover_file, status, nik) VALUES
(3, 'Ruwah Desa Pagerngumbuk', '<p>Ini adalah acara Ulang Tahun Desa&nbsp;Pagerngumbuk</p>rnrn<p><img alt="" src="/webdesa/assets/img/surat/images/banner%20(6).jpg" style="height:780px; width:780px" /></p>rn', '2020-06-14 20:54:29', 'umum', './assets/img/berita/123456-1592142869-cover_file.jpg', 1, '123456'),
(6, 'Jual Ikan', '<p><img alt="" src="/webdesa/assets/img/surat/images/mujair.jpeg" style="height:461px; width:673px" /></p>rn', '2020-06-14 22:17:22', 'umkm', './assets/img/berita/123456-1592147842-cover_file.jpg', 0, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biodata`
--

CREATE TABLE tbl_biodata (
  id int NOT NULL,
  id_biodata varchar(20) NOT NULL,
  nama_kepala varchar(60) NOT NULL,
  alamat varchar(100) NOT NULL,
  anggota text NOT NULL,
  tgl_buat timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(100) NOT NULL,
  akta_lahir_file varchar(100) NOT NULL,
  ijazah_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  akta_kawin_file varchar(100) NOT NULL,
  status int NOT NULL DEFAULT '0',
  nik varchar(16) NOT NULL
) ;

--
-- Dumping data for table `tbl_biodata`
--

INSERT INTO tbl_biodata (id, id_biodata, nama_kepala, alamat, anggota, tgl_buat, pengantar_file, akta_lahir_file, ijazah_file, kk_file, ktp_file, akta_kawin_file, status, nik) VALUES
(1, 'IV/29/08/2020', 'saye', 'kat sana', '[{"nama":"a","nik":"a","jk":"L","tempat":"a","tgl":"2019-11-30","hubungan":"a","pendidikan":"sd","go', '2020-06-14 00:06:51', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', -1, '123456'),
(2, '2/IV/18/6/2020', 'Opah', 'durian runtuh', '[{"nama":"A","nik":"1","jk":"L","tempat":"A","tgl":"2019-11-30","hubungan":"A","pendidikan":"sd","goldar":"a","kawin":"belum","agama":"islam","pekerjaan":"petani","ayah":"A","ibu":"A"},{"nama":"B","nik":"2","jk":"P","tempat":"B","tgl":"2012-07-26","hubungan":"B","pendidikan":"sltp","goldar":"b","kawin":"sudah","agama":"kristen","pekerjaan":"swasta","ayah":"B","ibu":"B"},{"nama":"C","nik":"3","jk":"P","tempat":"C","tgl":"2012-05-25","hubungan":"C","pendidikan":"d1","goldar":"b","kawin":"sudah","agama":"hindu","pekerjaan":"swasta","ayah":"C","ibu":"C"}]', '2020-06-18 19:54:48', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', 1, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bumdes`
--

CREATE TABLE tbl_bumdes (
  id_bumdes int NOT NULL,
  nama varchar(50) NOT NULL,
  bidang varchar(20) NOT NULL,
  ketua varchar(50) NOT NULL,
  tgl_berdiri date NOT NULL,
  no_telp varchar(15) NOT NULL,
  deskripsi text NOT NULL,
  logo_file varchar(100) NOT NULL,
  status int NOT NULL DEFAULT '0'
) ;

--
-- Dumping data for table `tbl_bumdes`
--

INSERT INTO tbl_bumdes (id_bumdes, nama, bidang, ketua, tgl_berdiri, no_telp, deskripsi, logo_file, status) VALUES
(1, 'Makmur Jaya', 'perdagangan', 'Saaye', '2016-11-30', '085832749723', '', 'http://localhost/webdesa/assets/img/bumdes/123456-1593068105-logo_file.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dana`
--

CREATE TABLE tbl_dana (
  kode varchar(4) NOT NULL,
  nama varchar(50) NOT NULL,
  jumlah int NOT NULL,
  tahun varchar(9) NOT NULL,
  status int NOT NULL DEFAULT '1'
) ;

--
-- Dumping data for table `tbl_dana`
--

INSERT INTO tbl_dana (kode, nama, jumlah, tahun, status) VALUES
('1238', 'Pajak Bagi Hasil', 300000000, '2020', 1),
('1278', 'A', 10000, '2020', -1),
('1291', 'BK Kabupaten', 4500000, '2020', 1),
('3172', 'Pendapatan Asli Desa', 90000000, '2020', 1),
('6311', 'Anggaran Dana Desa (ADD)', 450000000, '2020', 1),
('6312', 'Penyaluran Dana Desa (DDS)', 900000000, '2020', 1),
('8721', 'B', 25000, '2020', -1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_domisili`
--

CREATE TABLE tbl_domisili (
  id int NOT NULL,
  id_domisili varchar(20) NOT NULL,
  jenis varchar(10) NOT NULL,
  nama_usaha varchar(60) NOT NULL,
  alamat varchar(100) NOT NULL,
  tgl_buat timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  akta_usaha_file varchar(100) NOT NULL,
  pernyataan_file varchar(100) NOT NULL,
  perjanjian_file varchar(100) NOT NULL,
  kepemilikan_file varchar(100) NOT NULL,
  status int NOT NULL DEFAULT '0',
  nik varchar(16) NOT NULL
) ;

--
-- Dumping data for table `tbl_domisili`
--

INSERT INTO tbl_domisili (id, id_domisili, jenis, nama_usaha, alamat, tgl_buat, pengantar_file, kk_file, ktp_file, akta_usaha_file, pernyataan_file, perjanjian_file, kepemilikan_file, status, nik) VALUES
(1, '1/VI/10/6/2020', 'usaha', 'Makmur', 'kat sane', '2020-06-10 19:26:06', './assets/img/surat/d', './assets/img/surat/domisili/123456-15925', './assets/img/surat/domisili/123456-15925', '123456-1591791966-akta_usaha_file.png', '123456-1591791966-pernyataan_file.png', '123456-1591791966-perjanjian_file.png', '123456-1591791966-kepemilikan_file.jpg', 2, '123456'),
(2, '2VI19/6/2020', 'tinggal', '', '', '2020-06-19 18:50:51', './assets/img/surat/domisili/165150201111134-1592567451-pengantar_file.jpg', '', '', '', '', '', '', 0, '165150201111134');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_fisik`
--

CREATE TABLE tbl_item_fisik (
  kode int NOT NULL,
  uraian varchar(50) NOT NULL,
  volume varchar(10) NOT NULL,
  satuan varchar(10) NOT NULL,
  nilai int NOT NULL,
  ket varchar(50) NOT NULL,
  id_kegiatan int NOT NULL
) ;

--
-- Dumping data for table `tbl_item_fisik`
--

INSERT INTO tbl_item_fisik (kode, uraian, volume, satuan, nilai, ket, id_kegiatan) VALUES
(1, 'Seminar', '4', 'Jam', 25000, 'Lancar', 4),
(2, 'Pos Kamling', '1', 'Unit', 12000, 'Kosong', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_keuangan`
--

CREATE TABLE tbl_item_keuangan (
  kode varchar(4) NOT NULL,
  uraian varchar(50) NOT NULL,
  volume varchar(10) NOT NULL,
  satuan varchar(20) NOT NULL,
  harga_satuan int NOT NULL,
  jumlah int NOT NULL,
  realisasi int NOT NULL,
  prosentase varchar(5) NOT NULL DEFAULT '0',
  id_kegiatan int NOT NULL
) ;

--
-- Dumping data for table `tbl_item_keuangan`
--

INSERT INTO tbl_item_keuangan (kode, uraian, volume, satuan, harga_satuan, jumlah, realisasi, prosentase, id_kegiatan) VALUES
('1', '', '', '', 0, 0, 0, '75', 4),
('1111', 'Kayu Jati', '4', 'Meter', 2000, 8000, 6500, '81.25', 3),
('1112', 'Paku', '2', 'Kg', 100, 200, 155, '77.5', 3),
('1113', 'Semen', '3', 'Karung 5kg', 500, 1500, 1350, '90', 3),
('1114', 'Lem', '2', 'Kaleng 1L', 400, 800, 740, '92.5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE tbl_kegiatan (
  id_kegiatan int NOT NULL,
  bidang varchar(20) NOT NULL,
  nama varchar(50) NOT NULL,
  tgl_mulai date DEFAULT NULL,
  tgl_selesai date DEFAULT NULL,
  output varchar(50) NOT NULL,
  kendala varchar(255) NOT NULL,
  saran varchar(255) NOT NULL,
  ketua_pelaksana varchar(50) NOT NULL,
  catatan varchar(100) NOT NULL DEFAULT '-',
  status int NOT NULL DEFAULT '0',
  lampiran_file varchar(100) NOT NULL,
  id_pengaduan int NOT NULL,
  kode varchar(4) NOT NULL
) ;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO tbl_kegiatan (id_kegiatan, bidang, nama, tgl_mulai, tgl_selesai, output, kendala, saran, ketua_pelaksana, catatan, status, lampiran_file, id_pengaduan, kode) VALUES
(3, 'infrastruktur', 'Bangun Pos', '2020-10-31', '2020-12-31', 'Pos Kamling', 'Musim Hujan', 'Semangat', 'Tok Dalang', 'Harga Satuan Salah', 3, '.\assets\img\kegiatan\jalan.jpg', 3, '3172'),
(4, 'infrastruktur', 'Bangun Jembatan', '2020-12-31', '2020-12-31', 'Jembatan', 'Cuaca', 'Tidak Ada', 'Sunaryo', '-', 3, '', 4, '3172');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelahiran`
--

CREATE TABLE tbl_kelahiran (
  id int NOT NULL,
  id_kelahiran varchar(20) NOT NULL,
  hubungan varchar(15) NOT NULL,
  tgl_lahir date NOT NULL,
  tempat_lahir varchar(20) NOT NULL,
  jk varchar(1) NOT NULL,
  status int NOT NULL DEFAULT '0',
  anak varchar(60) NOT NULL,
  ayah varchar(60) NOT NULL,
  ibu varchar(60) NOT NULL,
  alamat varchar(100) NOT NULL,
  rt int NOT NULL,
  rw int NOT NULL,
  tgl_buat timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(100) NOT NULL,
  ket_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  buku_file varchar(100) NOT NULL,
  nik varchar(16) NOT NULL
) ;

--
-- Dumping data for table `tbl_kelahiran`
--

INSERT INTO tbl_kelahiran (id, id_kelahiran, hubungan, tgl_lahir, tempat_lahir, jk, status, anak, ayah, ibu, alamat, rt, rw, tgl_buat, pengantar_file, ket_file, kk_file, ktp_file, buku_file, nik) VALUES
(2, '2/I/16/6/2020', 'tetangga', '2015-03-12', 'B', 'L', 2, 'A', 'F', 'G', '', 8, 3, '2020-06-17 01:01:20', '', '', '', '', '', '165150201111134');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kematian`
--

CREATE TABLE tbl_kematian (
  id int NOT NULL,
  id_kematian varchar(20) NOT NULL,
  hubungan varchar(15) NOT NULL,
  nik_alm varchar(16) NOT NULL,
  nama varchar(60) NOT NULL,
  tgl_lahir date NOT NULL,
  jk varchar(1) NOT NULL,
  agama varchar(20) NOT NULL,
  status_kawin varchar(20) NOT NULL,
  pekerjaan varchar(20) NOT NULL,
  kwn varchar(3) NOT NULL DEFAULT 'wni',
  tgl_meninggal date NOT NULL,
  tempat_meninggal varchar(20) NOT NULL,
  penyebab varchar(20) NOT NULL,
  penentu varchar(20) NOT NULL,
  kota_meninggal varchar(20) NOT NULL,
  alamat varchar(100) NOT NULL,
  tgl_buat timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  pernyataan_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  ktp_alm_file varchar(100) NOT NULL,
  kk_alm_file varchar(100) NOT NULL,
  status int NOT NULL DEFAULT '0',
  nik varchar(16) NOT NULL
) ;

--
-- Dumping data for table `tbl_kematian`
--

INSERT INTO tbl_kematian (id, id_kematian, hubungan, nik_alm, nama, tgl_lahir, jk, agama, status_kawin, pekerjaan, kwn, tgl_meninggal, tempat_meninggal, penyebab, penentu, kota_meninggal, alamat, tgl_buat, pernyataan_file, ktp_file, kk_file, ktp_alm_file, kk_alm_file, status, nik) VALUES
(1, '2/II/17/6/2020', 'saudara', '9279821749', 'axes', '2015-12-30', 'L', 'islam', 'belum', 'petani', 'wna', '2020-06-01', 'rumah sakit', 'sakit hati', 'dokter', 'durian runtuh', 'aaa', '2020-06-08 23:55:23', './assets/img/surat/kematian/-1592419927-', '123456-1591635323-kt', '123456-1591635323-kk', '123456-1591635323-kt', '123456-1591635323-kk', 0, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE tbl_pengaduan (
  id_pengaduan int NOT NULL,
  judul varchar(100) NOT NULL,
  bidang varchar(20) NOT NULL,
  kategori varchar(20) NOT NULL,
  uraian text NOT NULL,
  lokasi varchar(25) NOT NULL,
  tgl_pengaduan timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status int NOT NULL DEFAULT '0',
  lampiran_file varchar(60) NOT NULL,
  nik varchar(16) NOT NULL
) ;

--
-- Dumping data for table `tbl_pengaduan`
--

INSERT INTO tbl_pengaduan (id_pengaduan, judul, bidang, kategori, uraian, lokasi, tgl_pengaduan, status, lampiran_file, nik) VALUES
(3, 'Bangun Pos', 'infrastruktur', 'anggaran', 'Mohon segera diperbaiki', 'RT6/RW2', '2020-06-15 00:28:55', 2, './assets/img/pengaduan/123456-1592155735-lampiran_file.jpg', '123456'),
(4, 'Mantap', 'pendidikan', 'anggaran', 'jkjahkdjashkfjh', 'jks', '2020-06-18 02:44:11', 2, './assets/img/pengaduan/123456-1592155735-lampiran_file.jpg', '123456'),
(5, 'Lapor', 'kesehatan', 'anggaran', 'kjsak asjkdba', 'skajdh', '2020-06-18 02:46:08', 1, './assets/img/pengaduan/123456-1592155735-lampiran_file.jpg', '123456'),
(6, 'tes', 'administrasi', 'anggaran', 'tes', 'a', '2020-06-18 02:51:48', 0, './assets/img/pengaduan/default.jpg', '123456'),
(7, 'Balap Liar', 'kasus', 'non-anggaran', 'Mohon segera ditertibkan', 'Jalan Raya RT06/RW02', '2020-07-05 02:07:15', 1, './assets/img/pengaduan/default.jpg', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_potensi`
--

CREATE TABLE tbl_potensi (
  id_potensi int NOT NULL,
  bidang varchar(20) NOT NULL,
  omzet int NOT NULL,
  waktu_awal int NOT NULL,
  waktu_akhir int NOT NULL,
  tahun varchar(4) NOT NULL,
  orang int NOT NULL
) ;

--
-- Dumping data for table `tbl_potensi`
--

INSERT INTO tbl_potensi (id_potensi, bidang, omzet, waktu_awal, waktu_akhir, tahun, orang) VALUES
(1, 'agribisnis', 2000000, 2, 3, '2020', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tdk_mampu`
--

CREATE TABLE tbl_tdk_mampu (
  id int NOT NULL,
  id_tdk_mampu varchar(15) NOT NULL,
  jenis varchar(20) NOT NULL,
  nama_terkait varchar(60) NOT NULL,
  pekerjaan varchar(20) NOT NULL,
  status int NOT NULL DEFAULT '0',
  alamat varchar(100) NOT NULL,
  tgl_buat timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(100) NOT NULL,
  pernyataan_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  tujuan varchar(100) NOT NULL,
  nik varchar(16) NOT NULL
) ;

--
-- Dumping data for table `tbl_tdk_mampu`
--

INSERT INTO tbl_tdk_mampu (id, id_tdk_mampu, jenis, nama_terkait, pekerjaan, status, alamat, tgl_buat, pengantar_file, pernyataan_file, ktp_file, kk_file, tujuan, nik) VALUES
(1, '2/III/17/6/2020', 'sekolah', 'Mino', 'pns', 1, 'ada di sana', '2020-06-09 02:43:38', '123456-1591645417-pe', '', '123456-1591645418-kt', '123456-1591645418-kk', 'untuk', '123456'),
(5, '3/III/17/6/2020', 'rumah_sakit', 'x', 'swasta', 0, 'z', '2020-06-18 02:30:53', './assets/img/surat/tidak_mampu/165150201111134-1592422253-pengantar_file.png', '', '', '', 'y', '165150201111134');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_umkm`
--

CREATE TABLE tbl_umkm (
  id_umkm int NOT NULL,
  nama varchar(50) NOT NULL,
  bidang varchar(20) NOT NULL,
  nik_pemilik varchar(20) NOT NULL,
  no_telp varchar(15) NOT NULL,
  alamat varchar(100) NOT NULL,
  tgl_berdiri date NOT NULL,
  deskripsi text NOT NULL,
  logo_file varchar(100) NOT NULL,
  status int NOT NULL DEFAULT '0'
) ;

--
-- Dumping data for table `tbl_umkm`
--

INSERT INTO tbl_umkm (id_umkm, nama, bidang, nik_pemilik, no_telp, alamat, tgl_berdiri, deskripsi, logo_file, status) VALUES
(1, 'Toko Mantap Jiwa', 'kelontong', '165150201111134', '085832749723', 'RT06/RW02', '2014-09-27', '', 'http://localhost/webdesa/assets/img/umkm/123456-1593069339-logo_file.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_umum`
--

CREATE TABLE tbl_umum (
  id int NOT NULL,
  id_umum varchar(20) NOT NULL,
  tujuan varchar(100) NOT NULL,
  tgl_buat timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(40) NOT NULL,
  ktp_file varchar(40) NOT NULL,
  kk_file varchar(40) NOT NULL,
  status int NOT NULL DEFAULT '0',
  nik varchar(16) NOT NULL
) ;

--
-- Dumping data for table `tbl_umum`
--

INSERT INTO tbl_umum (id, id_umum, tujuan, tgl_buat, pengantar_file, ktp_file, kk_file, status, nik) VALUES
(1, '1/V/9/6/2020', 'untuk ini', '2020-06-09 16:18:28', '123456-1591694308-pengantar_file.jpg', '123456-1591694308-ktp_file.png', '123456-1591694308-kk_file.png', 0, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warga`
--

CREATE TABLE tbl_warga (
  nik varchar(16) NOT NULL,
  nama varchar(60) DEFAULT NULL,
  email varchar(40) DEFAULT NULL,
  pass varchar(100) DEFAULT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tgl_lahir date DEFAULT NULL,
  no_telp varchar(15) NOT NULL,
  alamat varchar(100) NOT NULL,
  rt int NOT NULL,
  rw int NOT NULL,
  jk varchar(1) NOT NULL,
  goldar varchar(3) NOT NULL,
  agama varchar(20) NOT NULL,
  pendidikan varchar(20) NOT NULL,
  pekerjaan varchar(20) NOT NULL,
  status int NOT NULL DEFAULT '0',
  role int NOT NULL DEFAULT '0',
  ktp_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  foto_file varchar(100) NOT NULL
) ;

--
-- Dumping data for table `tbl_warga`
--

INSERT INTO tbl_warga (nik, nama, email, pass, tempat_lahir, tgl_lahir, no_telp, alamat, rt, rw, jk, goldar, agama, pendidikan, pekerjaan, status, role, ktp_file, kk_file, foto_file) VALUES
('123456', 'Khafido', 'ilz@gmail.com', '$2y$10$41B81e5tXWar7GnNSQUo5eLex3z.SOPuesbddFRPBU.Zr2XSWBBC2', 'Sidoarjo', '1998-08-29', '085646433651', '', 4, 2, 'l', 'b', 'islam', 's1', 'pelajar', 0, 1, '1591623610-ktp.png', '1591623610-kk.png', '123456-1591693485-foto.png'),
('165150201111134', 'Muchamad Khafido Ilzam', 'khaf@gmail.com', '$2y$10$41B81e5tXWar7GnNSQUo5eLex3z.SOPuesbddFRPBU.Zr2XSWBBC2', 'Malang', '2007-02-12', '08593753289', '', 4, 3, 'l', 'o', 'kristen', 's1', 'wiraswasta', 0, 0, './assets/img/warga/ktp/165150201111134-1592312875-ktp_file.jpg', './assets/img/warga/kk/165150201111134-1592312875-kk_file.png', './assets/img/warga/foto/165150201111134-1592312875-foto_file.png'),
('215123551464646', 'Ilzam', 'khaf@gmail.com', '$2y$10$xsEjU/NXze9ekJwgBoluGeNKZw2adPiYULq4bPE3Z5zXhsjE3E/I6', 'Tokyo', '2008-03-11', '0856672483', '', 5, 1, 'l', 'o', 'kristen', 's2', 'pns', 0, 0, '', '', ''),
('29481284021', 'Citara', 'citara@gmail.com', '$2y$10$D1kmRrXAE7lj8ym9dSa7B.GjqfZBaFMO0gEuMUBd2X20oQpjxFQfa', 'Jakarta', '1996-08-03', '087647385687', '', 3, 2, 'p', 'ab', 'hindu', 'd3', 'swasta', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Structure for view `detail_berita`
--
DROP TABLE IF EXISTS detail_berita;

CREATE   VIEW detail_berita  AS  select b.id_berita AS `id_berita`,b.judul AS `judul`,b.isi AS `isi`,b.tgl_berita AS `tgl_berita`,b.rubrik AS `rubrik`,b.cover_file AS `cover_file`,b.status AS `status`,b.nik AS `nik`,w.nama AS `nama` from (tbl_berita `b` join `tbl_warga` w on((b.nik = w.nik))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_kegiatan`
--
DROP TABLE IF EXISTS detail_kegiatan;

CREATE   VIEW detail_kegiatan  AS  select k.id_kegiatan AS `id_kegiatan`,k.bidang AS `bidang`,k.nama AS `nama`,k.tgl_mulai AS `tgl_mulai`,k.tgl_selesai AS `tgl_selesai`,k.output AS `output`,k.kendala AS `kendala`,k.saran AS `saran`,k.ketua_pelaksana AS `ketua_pelaksana`,k.catatan AS `catatan`,k.status AS `status`,k.lampiran_file AS `lampiran_file`,k.id_pengaduan AS `id_pengaduan`,k.kode AS `kode`,d.nama AS `dana`,p.nama AS `pelapor` from ((tbl_kegiatan `k` join `tbl_dana` d on((k.kode = d.kode))) join `detail_pengaduan` p on((k.id_pengaduan = p.id_pengaduan))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_pengaduan`
--
DROP TABLE IF EXISTS detail_pengaduan;

CREATE   VIEW detail_pengaduan  AS  select p.id_pengaduan AS `id_pengaduan`,p.judul AS `judul`,p.bidang AS `bidang`,p.lokasi AS `lokasi`,p.kategori AS `kategori`,p.uraian AS `uraian`,p.tgl_pengaduan AS `tgl_pengaduan`,p.status AS `status`,p.lampiran_file AS `lampiran_file`,p.nik AS `nik`,w.nama AS `nama` from (tbl_pengaduan `p` join `tbl_warga` w on((p.nik = w.nik))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_umkm`
--
DROP TABLE IF EXISTS detail_umkm;

CREATE   VIEW detail_umkm  AS  select u.id_umkm AS `id_umkm`,u.nama AS `nama`,u.bidang AS `bidang`,u.nik_pemilik AS `nik_pemilik`,u.no_telp AS `no_telp`,u.alamat AS `alamat`,u.tgl_berdiri AS `tgl_berdiri`,u.deskripsi AS `deskripsi`,u.logo_file AS `logo_file`,u.status AS `status`,w.nama AS `pemilik` from (tbl_umkm `u` join `tbl_warga` w on((u.nik_pemilik = w.nik))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE tbl_berita
  ADD PRIMARY KEY (id_berita),
  ADD KEY `nik` (nik);

--
-- Indexes for table `tbl_biodata`
--
ALTER TABLE tbl_biodata
  ADD PRIMARY KEY (id),
  ADD KEY `nik` (nik);

--
-- Indexes for table `tbl_bumdes`
--
ALTER TABLE tbl_bumdes
  ADD PRIMARY KEY (id_bumdes);

--
-- Indexes for table `tbl_dana`
--
ALTER TABLE tbl_dana
  ADD PRIMARY KEY (kode);

--
-- Indexes for table `tbl_domisili`
--
ALTER TABLE tbl_domisili
  ADD PRIMARY KEY (id),
  ADD KEY `nik` (nik);

--
-- Indexes for table `tbl_item_fisik`
--
ALTER TABLE tbl_item_fisik
  ADD PRIMARY KEY (kode),
  ADD KEY `id_kegiatan` (id_kegiatan);

--
-- Indexes for table `tbl_item_keuangan`
--
ALTER TABLE tbl_item_keuangan
  ADD PRIMARY KEY (kode),
  ADD KEY `id_kegiatan` (id_kegiatan);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE tbl_kegiatan
  ADD PRIMARY KEY (id_kegiatan),
  ADD KEY `id_pengaduan` (id_pengaduan),
  ADD KEY `kode` (kode);

--
-- Indexes for table `tbl_kelahiran`
--
ALTER TABLE tbl_kelahiran
  ADD PRIMARY KEY (id),
  ADD KEY `nik` (nik);

--
-- Indexes for table `tbl_kematian`
--
ALTER TABLE tbl_kematian
  ADD PRIMARY KEY (id),
  ADD KEY `nik` (nik);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE tbl_pengaduan
  ADD PRIMARY KEY (id_pengaduan),
  ADD KEY `nik` (nik);

--
-- Indexes for table `tbl_potensi`
--
ALTER TABLE tbl_potensi
  ADD PRIMARY KEY (id_potensi);

--
-- Indexes for table `tbl_tdk_mampu`
--
ALTER TABLE tbl_tdk_mampu
  ADD PRIMARY KEY (id),
  ADD KEY `nik` (nik);

--
-- Indexes for table `tbl_umkm`
--
ALTER TABLE tbl_umkm
  ADD PRIMARY KEY (id_umkm),
  ADD KEY `no_telp` (no_telp),
  ADD KEY `nik_pemilik` (nik_pemilik);

--
-- Indexes for table `tbl_umum`
--
ALTER TABLE tbl_umum
  ADD PRIMARY KEY (id),
  ADD KEY `nik` (nik);

--
-- Indexes for table `tbl_warga`
--
ALTER TABLE tbl_warga
  ADD PRIMARY KEY (nik);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE tbl_berita
  MODIFY id_berita cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_biodata`
--
ALTER TABLE tbl_biodata
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bumdes`
--
ALTER TABLE tbl_bumdes
  MODIFY id_bumdes cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_domisili`
--
ALTER TABLE tbl_domisili
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_item_fisik`
--
ALTER TABLE tbl_item_fisik
  MODIFY kode cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE tbl_kegiatan
  MODIFY id_kegiatan cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kelahiran`
--
ALTER TABLE tbl_kelahiran
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kematian`
--
ALTER TABLE tbl_kematian
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE tbl_pengaduan
  MODIFY id_pengaduan cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_potensi`
--
ALTER TABLE tbl_potensi
  MODIFY id_potensi cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tdk_mampu`
--
ALTER TABLE tbl_tdk_mampu
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_umkm`
--
ALTER TABLE tbl_umkm
  MODIFY id_umkm cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_umum`
--
ALTER TABLE tbl_umum
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_berita`
--
ALTER TABLE tbl_berita
  ADD CONSTRAINT tbl_berita_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_biodata`
--
ALTER TABLE tbl_biodata
  ADD CONSTRAINT tbl_biodata_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_domisili`
--
ALTER TABLE tbl_domisili
  ADD CONSTRAINT tbl_domisili_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_item_fisik`
--
ALTER TABLE tbl_item_fisik
  ADD CONSTRAINT tbl_item_fisik_ibfk_1 FOREIGN KEY (id_kegiatan) REFERENCES tbl_kegiatan (id_kegiatan) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_item_keuangan`
--
ALTER TABLE tbl_item_keuangan
  ADD CONSTRAINT tbl_item_keuangan_ibfk_1 FOREIGN KEY (id_kegiatan) REFERENCES tbl_kegiatan (id_kegiatan) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kegiatan`
--
ALTER TABLE tbl_kegiatan
  ADD CONSTRAINT tbl_kegiatan_ibfk_1 FOREIGN KEY (id_pengaduan) REFERENCES tbl_pengaduan (id_pengaduan) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT tbl_kegiatan_ibfk_2 FOREIGN KEY (kode) REFERENCES `tbl_dana` (kode) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kelahiran`
--
ALTER TABLE tbl_kelahiran
  ADD CONSTRAINT tbl_kelahiran_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kematian`
--
ALTER TABLE tbl_kematian
  ADD CONSTRAINT tbl_kematian_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengaduan`
--
ALTER TABLE tbl_pengaduan
  ADD CONSTRAINT tbl_pengaduan_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tdk_mampu`
--
ALTER TABLE tbl_tdk_mampu
  ADD CONSTRAINT tbl_tdk_mampu_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_umkm`
--
ALTER TABLE tbl_umkm
  ADD CONSTRAINT tbl_umkm_ibfk_1 FOREIGN KEY (nik_pemilik) REFERENCES tbl_warga (nik);

--
-- Constraints for table `tbl_umum`
--
ALTER TABLE tbl_umum
  ADD CONSTRAINT tbl_umum_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
