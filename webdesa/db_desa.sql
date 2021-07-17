-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2021 pada 03.19
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_berita`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_berita` (
`id_berita` int(11)
,`judul` varchar(50)
,`isi` text
,`tgl_berita` datetime
,`rubrik` varchar(10)
,`cover_file` varchar(60)
,`status` int(1)
,`nik` varchar(16)
,`nama` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_kegiatan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_kegiatan` (
`id_kegiatan` int(11)
,`bidang` varchar(50)
,`nama` varchar(50)
,`tgl_mulai` date
,`tgl_selesai` date
,`output` varchar(50)
,`kendala` varchar(255)
,`saran` varchar(255)
,`ketua_pelaksana` varchar(50)
,`catatan` varchar(100)
,`status` int(1)
,`lampiran_file` varchar(100)
,`id_pengaduan` int(11)
,`kode` varchar(4)
,`dana` varchar(50)
,`pelapor` varchar(60)
,`kode_kegiatan` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_pengaduan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_pengaduan` (
`id_pengaduan` int(11)
,`judul` varchar(100)
,`bidang` varchar(20)
,`lokasi` varchar(25)
,`kategori` varchar(20)
,`uraian` text
,`tgl_pengaduan` datetime
,`status` int(1)
,`lampiran_file` varchar(60)
,`nik` varchar(16)
,`nama` varchar(60)
,`no_telp` varchar(15)
,`email` varchar(40)
,`rw` int(1)
,`rt` int(1)
,`ttd_file` varchar(200)
,`qrcode_file` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_tanggapan_berita`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_tanggapan_berita` (
`id_tan` int(11)
,`tanggapan` varchar(255)
,`nik` varchar(16)
,`id_berita` int(11)
,`waktu` timestamp
,`nama` varchar(60)
,`foto_file` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_tanggapan_pengaduan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_tanggapan_pengaduan` (
`id_tanggapan` int(11)
,`tanggapan` varchar(255)
,`nik` varchar(16)
,`id_pengaduan` int(11)
,`waktu` timestamp
,`nama` varchar(60)
,`foto_file` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_umkm`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_umkm` (
`id_umkm` int(11)
,`nama` varchar(50)
,`bidang` varchar(20)
,`nik_pemilik` varchar(20)
,`no_telp` varchar(15)
,`alamat` varchar(100)
,`tgl_berdiri` date
,`deskripsi` text
,`logo_file` varchar(100)
,`status` int(11)
,`pemilik` varchar(60)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tgl_berita` datetime NOT NULL DEFAULT current_timestamp(),
  `rubrik` varchar(10) NOT NULL,
  `cover_file` varchar(60) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul`, `isi`, `tgl_berita`, `rubrik`, `cover_file`, `status`, `nik`) VALUES
(3, 'Ruwah Desa Pagerngumbuk', '<p>Ini adalah acara Ulang Tahun Desa&nbsp;Pagerngumbuk</p>\r\n\r\n<p><img alt=\"\" src=\"/webdesa/assets/img/surat/images/banner%20(6).jpg\" style=\"height:780px; width:780px\" /></p>\r\n', '2020-06-14 20:54:29', 'umum', './assets/img/berita/123456-1592142869-cover_file.jpg', 1, '123456'),
(6, 'Jual Ikan', '<p><img alt=\"\" src=\"/webdesa/assets/img/surat/images/mujair.jpeg\" style=\"height:461px; width:673px\" /></p>\r\n', '2020-06-14 22:17:22', 'umkm', './assets/img/berita/123456-1592147842-cover_file.jpg', 1, '123456'),
(7, 'Ruwah Desa', '<p>Tes</p>\r\n', '2020-07-07 20:19:10', 'umum', './assets/img/berita/123456-1594204004-cover_file.jpg', 1, '123456'),
(8, 'Ruwah Desa', 'Perayaan Ruwah Desa', '2020-07-07 20:26:15', 'umum', '', -1, '123456'),
(9, 'Ruwah Deso', '<h2>Kegiatan Tradisi Ruwah Deso di Desa Pagerngumbuk</h2>\r\n\r\n<p><img alt=\"\" src=\"/assets/img/images/banner%20(3).jpg\" style=\"height:333px; width:333px\" />&nbsp;<img alt=\"\" src=\"/assets/img/images/banner%20(9).jpg\" style=\"height:328px; width:328px\" /></p>\r\n', '2020-11-06 10:10:46', 'umum', './assets/img/berita/16515020-1604632246-cover_file.jpg', -1, '16515020'),
(10, 'Ngumbuk Banjir', '<p>Mohon hati-hati dan waspada</p>\r\n\r\n<p><img alt=\"\" src=\"/assets/img/images/banjir.jpeg\" style=\"height:225px; width:400px\" /></p>\r\n', '2021-02-20 10:43:04', 'umum', './assets/img/berita/222222-1613792584-cover_file.jpeg', 1, '222222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `id` int(11) NOT NULL,
  `id_biodata` varchar(20) NOT NULL,
  `nama_kepala` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `anggota` text NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(255) DEFAULT NULL,
  `pengantar_file` varchar(100) NOT NULL,
  `akta_lahir_file` varchar(100) NOT NULL,
  `ijazah_file` varchar(100) NOT NULL,
  `kk_file` varchar(100) NOT NULL,
  `ktp_file` varchar(100) NOT NULL,
  `akta_kawin_file` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `nik` varchar(16) NOT NULL,
  `ttd_file` varchar(255) NOT NULL,
  `qrcode_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`id`, `id_biodata`, `nama_kepala`, `alamat`, `anggota`, `tgl_buat`, `catatan`, `pengantar_file`, `akta_lahir_file`, `ijazah_file`, `kk_file`, `ktp_file`, `akta_kawin_file`, `status`, `nik`, `ttd_file`, `qrcode_file`) VALUES
(1, 'IV/29/08/2020', 'saye', 'kat sana', '[{\"nama\":\"a\",\"nik\":\"a\",\"jk\":\"L\",\"tempat\":\"a\",\"tgl\":\"2019-11-30\",\"hubungan\":\"a\",\"pendidikan\":\"sd\",\"go', '2020-06-14 00:06:51', NULL, './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', -1, '123456', '', ''),
(2, '2/IV/18/6/2020', 'Opah', 'Kampong Durian Runtuh RT05/RW03', '[{\"nama\":\"Agus\",\"nik\":\"13235\",\"jk\":\"L\",\"tempat\":\"Sidoarjo\",\"tgl\":\"1979-11-30\",\"hubungan\":\"Kepala Keluarga\",\"pendidikan\":\"S1\",\"goldar\":\"a\",\"kawin\":\"Sudah\",\"agama\":\"islam\",\"pekerjaan\":\"petani\",\"ayah\":\"Gatoto\",\"ibu\":\"Jeni\"},{\"nama\":\"Siti\",\"nik\":\"1525346\",\"jk\":\"P\",\"tempat\":\"Malang\",\"tgl\":\"1980-07-26\",\"hubungan\":\"Istri\",\"pendidikan\":\"slta\",\"goldar\":\"o\",\"kawin\":\"sudah\",\"agama\":\"kristen\",\"pekerjaan\":\"swasta\",\"ayah\":\"Baron\",\"ibu\":\"Baikah\"},{\"nama\":\"Broto\",\"nik\":\"1457667\",\"jk\":\"L\",\"tempat\":\"Sidoarjo\",\"tgl\":\"2012-05-25\",\"hubungan\":\"Anak\",\"pendidikan\":\"d1\",\"goldar\":\"b\",\"kawin\":\"belum\",\"agama\":\"hindu\",\"pekerjaan\":\"swasta\",\"ayah\":\"Agus\",\"ibu\":\"Siti\"}]', '2020-06-18 19:54:48', NULL, './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', './assets/img/surat/b', 2, '123456', './assets/img/sign/5fd600461f7b4.png', ''),
(3, '3/IV/20/2/2021', 'Poy', 'Ds. Sumbersari', '[{\"nama\":\"Foy\",\"nik\":10238123,\"jk\":\"L\",\"tempat\":\"SIni\",\"tgl\":\"2018-11-29\",\"hubungan\":\"Anak Kandung\",\"pendidikan\":\"s1\",\"goldar\":\"a\",\"kawin\":\"belum\",\"agama\":\"islam\",\"pekerjaan\":\"petani\",\"ayah\":\"Poy\",\"ibu\":\"Fuy\"}]', '2021-02-20 11:41:01', NULL, './assets/img/surat/biodata/-1613796059-pengantar_file.jpg', './assets/img/surat/biodata/-1613796059-akta_lahir_file.jpg', './assets/img/surat/biodata/-1613796060-ijazah_file.jpg', './assets/img/surat/biodata/-1613796060-kk_file.jpg', './assets/img/surat/biodata/-1613796060-ktp_file.jpg', './assets/img/surat/biodata/-1613796060-akta_kawin_file.jpg', 2, '222222', './assets/img/sign/60309a861c42c.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bumdes`
--

CREATE TABLE `tbl_bumdes` (
  `id_bumdes` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bidang` varchar(20) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `logo_file` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bumdes`
--

INSERT INTO `tbl_bumdes` (`id_bumdes`, `nama`, `bidang`, `ketua`, `tgl_berdiri`, `no_telp`, `deskripsi`, `logo_file`, `status`) VALUES
(1, 'Makmur Jaya', 'perdagangan', 'Saaye', '2016-11-30', '085832749723', '', 'http://localhost/webdesa/assets/img/bumdes/123456-1593068105-logo_file.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dana`
--

CREATE TABLE `tbl_dana` (
  `kode` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun` varchar(9) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dana`
--

INSERT INTO `tbl_dana` (`kode`, `nama`, `jumlah`, `tahun`, `status`) VALUES
('1238', 'Pajak Bagi Hasil', 300000000, '2020', 1),
('1291', 'BK Kabupaten', 4500000, '2020', 1),
('3172', 'Pendapatan Asli Desa', 90000000, '2020', 1),
('6311', 'Anggaran Dana Desa (ADD)', 450000000, '2020', 1),
('6312', 'Penyaluran Dana Desa (DDS)', 900000000, '2020', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_domisili`
--

CREATE TABLE `tbl_domisili` (
  `id` int(11) NOT NULL,
  `id_domisili` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nama_usaha` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(255) DEFAULT NULL,
  `pengantar_file` varchar(100) NOT NULL,
  `kk_file` varchar(100) NOT NULL,
  `ktp_file` varchar(100) NOT NULL,
  `akta_usaha_file` varchar(100) NOT NULL,
  `pernyataan_file` varchar(100) NOT NULL,
  `perjanjian_file` varchar(100) NOT NULL,
  `kepemilikan_file` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `nik` varchar(16) NOT NULL,
  `ttd_file` varchar(255) NOT NULL,
  `qrcode_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_domisili`
--

INSERT INTO `tbl_domisili` (`id`, `id_domisili`, `jenis`, `nama_usaha`, `alamat`, `tgl_buat`, `catatan`, `pengantar_file`, `kk_file`, `ktp_file`, `akta_usaha_file`, `pernyataan_file`, `perjanjian_file`, `kepemilikan_file`, `status`, `nik`, `ttd_file`, `qrcode_file`) VALUES
(1, '1/VI/10/6/2020', 'usahaa', 'Makmur', 'kat sane', '2020-06-10 19:26:06', NULL, './assets/img/surat/d', './assets/img/surat/domisili/123456-15925', './assets/img/surat/domisili/123456-15925', '123456-1591791966-akta_usaha_file.png', '123456-1591791966-pernyataan_file.png', '123456-1591791966-perjanjian_file.png', '123456-1591791966-kepemilikan_file.jpg', 2, '123456', './assets/img/sign/5fd71cf4ec958.png', ''),
(2, '2VI19/6/2020', 'tinggal', '', '', '2020-06-19 18:50:51', NULL, './assets/img/surat/domisili/165150201111134-1592567451-pengantar_file.jpg', '', '', '', '', '', '', 2, '165150201111134', '', ''),
(3, '470/1/438.7.9.14/202', 'tinggal', '', '', '2021-04-18 00:25:41', NULL, '', './assets/img/surat/domisili/123456-1618680340-kk_file.png', './assets/img/surat/domisili/123456-1618680340-ktp_file.png', './assets/img/surat/domisili/123456-1618680340-akta_usaha_file.png', './assets/img/surat/domisili/123456-1618680341-pernyataan_file.png', './assets/img/surat/domisili/123456-1618680341-perjanjian_file.png', './assets/img/surat/domisili/123456-1618680341-kepemilikan_file.png', 2, '123456', '', ''),
(4, '470/2/438.7.9.14/202', 'usaha', 'Jualan tempe', 'Malang', '2021-04-18 00:48:21', NULL, '', './assets/img/surat/domisili/123456-1618681701-kk_file.png', './assets/img/surat/domisili/123456-1618681701-ktp_file.png', './assets/img/surat/domisili/123456-1618681701-akta_usaha_file.png', './assets/img/surat/domisili/123456-1618681701-pernyataan_file.png', './assets/img/surat/domisili/123456-1618681701-perjanjian_file.png', './assets/img/surat/domisili/123456-1618681701-kepemilikan_file.png', 2, '123456', './assets/img/sign/5fd71cf4ec958.png', ''),
(5, '470/3/438.7.9.14/202', 'usaha', 'Waung tempe', 'sasasas', '2021-04-18 13:45:43', NULL, '', '', '', '', '', '', '', 2, '16515020', '', ''),
(6, '470/4/438.7.9.14/202', 'usaha', 'Waung tempe', 'sasas', '2021-04-19 11:22:47', NULL, '', '', '', '', '', '', '', 2, '16515020', '', ''),
(7, '470/5/438.7.9.14/202', 'usaha', 'Waung tempe', '', '2021-04-19 11:33:27', NULL, '', '', '', '', '', '', '', 1, '16515020', '', ''),
(8, '470/6/438.7.9.14/202', 'usaha', 'Waung tempe', '', '2021-04-19 12:01:07', NULL, '', '', '', '', '', '', '', 1, '16515020', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_item`
--

CREATE TABLE `tbl_item` (
  `kode` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `hst` int(11) NOT NULL,
  `tipe` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_item`
--

INSERT INTO `tbl_item` (`kode`, `uraian`, `satuan`, `hst`, `tipe`) VALUES
(1111, 'Semen', 'Karung 5kg', 25000, 1),
(1112, 'Paku', 'Kg', 2000, 1),
(1113, 'Cat Tembok', 'Kaleng 1liter', 20000, 1),
(1114, 'Pasir', 'Truk 1 Ton', 400000, 1),
(1115, 'Mesin Potong Rumput', 'pcs', 60000, 2),
(1116, 'Test Item', 'pcs', 10000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_item_fisik`
--

CREATE TABLE `tbl_item_fisik` (
  `kode` int(11) NOT NULL,
  `uraian` varchar(50) NOT NULL,
  `volume` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_item_fisik`
--

INSERT INTO `tbl_item_fisik` (`kode`, `uraian`, `volume`, `satuan`, `nilai`, `ket`, `id_kegiatan`) VALUES
(2, 'Pos Kamling', '1', 'Unit', 12000, 'Kosong', 99),
(3, 'Jembatan', '1', 'Unit', 200000, '-', 4),
(4, 'Pos Kamling', '1', 'Unit', 185000, '-', 91),
(5, 'Jembatan', '1', 'Unit', 3150000, '-', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_item_keuangan`
--

CREATE TABLE `tbl_item_keuangan` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `uraian` varchar(50) NOT NULL,
  `volume` varchar(10) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `realisasi` int(11) NOT NULL,
  `prosentase` varchar(5) NOT NULL DEFAULT '0',
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_item_keuangan`
--

INSERT INTO `tbl_item_keuangan` (`id`, `kode`, `uraian`, `volume`, `satuan`, `harga_satuan`, `jumlah`, `tipe`, `realisasi`, `prosentase`, `id_kegiatan`) VALUES
(2, '1111', 'Kayu Jati', '4', 'Meter', 2000, 8000, 0, 145000, '96.66', 99),
(3, '1112', 'Paku', '2', 'Kg', 100, 200, 0, 2990000, '99.66', 99),
(4, '1113', 'Semen', '3', 'Karung 5kg', 500, 1500, 0, 1350, '90', 99),
(5, '1114', 'Lem', '2', 'Kaleng 1L', 400, 800, 0, 740, '92.5', 99),
(11, '1111', 'Semen', '3', 'Karung 50kg', 50000, 150000, 0, 145000, '96.66', 4),
(12, '1112', 'Batu', '2', 'Truk', 1500000, 3000000, 0, 2990000, '99.66', 4),
(15, '1111', 'Semen', '2', 'Karung 5kg', 50000, 100000, 0, 145000, '96.66', 91),
(16, '1112', 'Kayu Jati', '4', 'Meter', 25000, 100000, 0, 2990000, '99.66', 91),
(71, '2.2.6.1.1', 'Semen', '5', 'Karung 5kg', 25000, 125000, 1, 0, '0', 11),
(72, '2.2.6.1.2', 'Pasir', '2', 'Truk 1 Ton', 400000, 800000, 1, 0, '0', 11),
(73, '2.2.6.2.1', 'Mesin Potong Rumput', '1', 'pcs', 60000, 60000, 2, 0, '0', 11),
(84, '2.2.3.2.1', 'Mesin Potong Rumput', '1', 'pcs', 60000, 60000, 2, 0, '0', 5),
(85, '2.2.3.1.1', 'Semen', '3', 'Karung 5kg', 25000, 75000, 1, 0, '0', 5),
(86, '2.2.3.1.2', 'Paku', '2', 'Kg', 2000, 4000, 1, 0, '0', 5),
(87, '2.2.3.1.1', 'Pasir', '1', 'Truk 1 Ton', 400000, 400000, 1, 0, '0', 5),
(88, '2.2.1.1.1', 'Semen', '3', 'Karung 5kg', 25000, 75000, 1, 0, '0', 13),
(89, '2.2.1.1.2', 'Cat Tembok', '2', 'Kaleng 1liter', 20000, 40000, 1, 0, '0', 13),
(90, '2.2.1.1.3', 'Paku', '3', 'Kg', 2000, 6000, 1, 0, '0', 13),
(91, '2.2.1.2.1', 'Mesin Potong Rumput', '2', 'pcs', 60000, 120000, 2, 0, '0', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kode_kegiatan` varchar(15) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `output` varchar(50) NOT NULL,
  `kendala` varchar(255) NOT NULL,
  `saran` varchar(255) NOT NULL,
  `ketua_pelaksana` varchar(50) NOT NULL,
  `catatan` varchar(100) NOT NULL DEFAULT '-',
  `status` int(1) NOT NULL DEFAULT 0,
  `lampiran_file` varchar(100) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `kode` varchar(4) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `kode_kegiatan`, `bidang`, `nama`, `tgl_mulai`, `tgl_selesai`, `output`, `kendala`, `saran`, `ketua_pelaksana`, `catatan`, `status`, `lampiran_file`, `id_pengaduan`, `kode`, `cdate`) VALUES
(4, '2.2.2', 'infrastruktur', 'Bangun Jembatan', '2020-12-31', '2020-12-31', 'Jembatan', 'Cuaca', 'Silakan dirawat', 'Sunaryo', '-', 4, '', 10, '3172', '2020-09-02 10:31:04'),
(5, '2.2.3', 'infrastruktur', 'Bangun Pos', '2020-09-29', '2020-10-29', 'Pos Kamling', '', '', 'Sutoyo', '-', 0, '', 1, '3172', '2020-11-02 10:31:04'),
(11, '2.2.6', 'PELAKSANAAN PEMBANGU', 'Kegiatan Perbaikan Irigasi RT06/RW02', '2020-10-10', '2020-11-11', 'Irigasi', '', '', 'Gatot', '-', 1, '', 11, '6311', '2020-12-05 12:20:13'),
(13, '2.2.1', 'PELAKSANAAN PEMBANGUNAN DESA', 'Perbaikan Saluran Air', '2021-01-01', '2021-02-01', 'Saluran Air', '', '', 'Joko', '-', 1, '', 12, '3172', '2021-02-25 10:41:52'),
(91, '224', 'infrastruktur', 'Bangun Pos', '2020-11-06', '2020-11-30', 'Pos Kamling', 'Cuaca', 'Mohon dirawat', 'Supangat', 'Kesalahan penulisan uraian', 4, '', 1, '3172', '2020-10-02 10:31:04'),
(99, '221', 'infrastruktur', 'Bangun Pos', '2020-10-31', '2020-12-31', 'Pos Kamling', 'Musim Hujan', 'Semangat', 'Tok Dalang', 'Harga Satuan Salah', 3, '.\\assets\\img\\kegiatan\\jalan.jpg', 1, '3172', '2020-08-02 10:31:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelahiran`
--

CREATE TABLE `tbl_kelahiran` (
  `id` int(11) NOT NULL,
  `id_kelahiran` varchar(20) NOT NULL,
  `hubungan` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `anak` varchar(60) NOT NULL,
  `ayah` varchar(60) NOT NULL,
  `ibu` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` int(1) NOT NULL,
  `rw` int(1) NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(255) DEFAULT NULL,
  `pengantar_file` varchar(100) NOT NULL,
  `ket_file` varchar(100) NOT NULL,
  `kk_file` varchar(100) NOT NULL,
  `ktp_file` varchar(100) NOT NULL,
  `buku_file` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `ttd_file` varchar(255) NOT NULL,
  `qrcode_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelahiran`
--

INSERT INTO `tbl_kelahiran` (`id`, `id_kelahiran`, `hubungan`, `tgl_lahir`, `tempat_lahir`, `jk`, `status`, `anak`, `ayah`, `ibu`, `alamat`, `rt`, `rw`, `tgl_buat`, `catatan`, `pengantar_file`, `ket_file`, `kk_file`, `ktp_file`, `buku_file`, `nik`, `ttd_file`, `qrcode_file`) VALUES
(2, '2/I/16/6/2020', 'tetangga', '2015-03-12', 'Ijam', 'L', 2, 'Ijam', 'Ajim', 'Jami', '', 8, 2, '2020-06-17 01:01:20', NULL, '', '', '', '', '', '123456', './assets/img/sign/601cb624ce347.png', ''),
(3, '2/I/8/7/2020', 'anak', '2017-10-28', 'Sidoarjo', 'L', 2, 'Bestari', 'Khaf', 'Rayu', '', 6, 3, '2020-07-08 16:23:38', 'foto ktp buram', './assets/img/surat/kelahiran/123456-1594200218-pengantar_file.jpg', './assets/img/surat/kelahiran/123456-1594200218-ket_file.jpg', './assets/img/surat/kelahiran/123456-1594200218-kk_file.jpg', './assets/img/surat/kelahiran/123456-1594200218-ktp_file.jpg', './assets/img/surat/kelahiran/123456-1594200218-buku_file.jpg', '123456', './assets/img/sign/5fbb6d9051c4c.png', ''),
(5, '4/I/6/11/2020', 'tetangga', '2020-11-06', 'Malang', 'L', 2, 'Indra', 'Budi', 'Dewi', '', 6, 2, '2020-11-06 14:20:56', 'Foto kk buram', './assets/img/surat/kelahiran/16515020-1604647256-pengantar_file.jpg', './assets/img/surat/kelahiran/16515020-1604647256-ket_file.jpg', './assets/img/surat/kelahiran/16515020-1604647256-kk_file.jpg', './assets/img/surat/kelahiran/16515020-1604647256-ktp_file.jpg', './assets/img/surat/kelahiran/16515020-1604647256-buku_file.jpg', '16515020', './assets/img/sign/60348671ec322.png', './assets/img/qrcode/1614055026.png'),
(6, '4/I/20/2/2021', 'anak', '2020-10-29', 'Yorkshire', 'P', 2, 'Kinasih', 'Firza', 'Fira', '', 4, 3, '2021-02-20 11:20:45', NULL, './assets/img/surat/kelahiran/222222-1613794844-pengantar_file.jpg', './assets/img/surat/kelahiran/222222-1613794844-ket_file.jpg', './assets/img/surat/kelahiran/222222-1613794845-kk_file.jpg', './assets/img/surat/kelahiran/222222-1613794845-ktp_file.jpg', './assets/img/surat/kelahiran/222222-1613794845-buku_file.jpg', '222222', '', ''),
(8, '8/I/7/3/2021', 'anak', '2020-10-30', 'London', 'L', 2, 'Kenzo', 'Kendo', 'Kendi', '', 4, 2, '2021-03-07 13:36:45', NULL, './assets/img/surat/kelahiran/222222-1615099005-pengantar_file.jpg', './assets/img/surat/kelahiran/222222-1615099005-ket_file.jpg', './assets/img/surat/kelahiran/222222-1615099005-kk_file.jpg', './assets/img/surat/kelahiran/222222-1615099005-ktp_file.jpg', './assets/img/surat/kelahiran/222222-1615099005-buku_file.jpg', '222222', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kematian`
--

CREATE TABLE `tbl_kematian` (
  `id` int(11) NOT NULL,
  `id_kematian` varchar(20) NOT NULL,
  `hubungan` varchar(15) NOT NULL,
  `nik_alm` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `kwn` varchar(3) NOT NULL DEFAULT 'wni',
  `tgl_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(20) NOT NULL,
  `penyebab` varchar(20) NOT NULL,
  `penentu` varchar(20) NOT NULL,
  `kota_meninggal` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(255) DEFAULT NULL,
  `pernyataan_file` varchar(100) NOT NULL,
  `ktp_file` varchar(100) NOT NULL,
  `kk_file` varchar(100) NOT NULL,
  `ktp_alm_file` varchar(100) NOT NULL,
  `kk_alm_file` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `nik` varchar(16) NOT NULL,
  `ttd_file` varchar(255) NOT NULL,
  `qrcode_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kematian`
--

INSERT INTO `tbl_kematian` (`id`, `id_kematian`, `hubungan`, `nik_alm`, `nama`, `tgl_lahir`, `jk`, `agama`, `status_kawin`, `pekerjaan`, `kwn`, `tgl_meninggal`, `tempat_meninggal`, `penyebab`, `penentu`, `kota_meninggal`, `alamat`, `tgl_buat`, `catatan`, `pernyataan_file`, `ktp_file`, `kk_file`, `ktp_alm_file`, `kk_alm_file`, `status`, `nik`, `ttd_file`, `qrcode_file`) VALUES
(1, '2/II/17/6/2020', 'saudara', '9279821749', 'axes', '2015-12-30', 'L', 'islam', 'belum', 'petani', 'wna', '2020-06-01', 'rumah sakit', 'sakit', 'dokter', 'durian runtuh', 'Ds. Candinegoro RT07, RW02, Wonoayu, Sidoarjo', '2020-06-08 23:55:23', NULL, './assets/img/surat/kematian/-1592419927-', '123456-1591635323-kt', '123456-1591635323-kk', '123456-1591635323-kt', '123456-1591635323-kk', 2, '123456', './assets/img/sign/5fd5dd7197ff8.png', ''),
(2, '2/II/20/2/2021', 'tetangga', '893423984932472', 'Kao', '2017-11-30', 'P', 'islam', 'cerai_mati', 'pns', 'wni', '2020-11-30', 'Rumah', 'Diabetes', 'Dokter', '', 'desa warugunung rt 04 rw 03', '2021-02-20 11:28:58', NULL, './assets/img/surat/kematian/222222-1613795337-pernyataan_file.jpg', './assets/img/surat/kematian/222222-1613795337-ktp_file.jpg', './assets/img/surat/kematian/222222-1613795337-kk_file.jpg', './assets/img/surat/kematian/222222-1613795338-ktp_alm_file.jpg', './assets/img/surat/kematian/222222-1613795337-kk_alm_file.jpg', 2, '222222', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `bidang` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `uraian` text NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `tgl_pengaduan` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0,
  `lampiran_file` varchar(60) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `ttd_file` varchar(200) NOT NULL,
  `qrcode_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `judul`, `bidang`, `kategori`, `uraian`, `lokasi`, `tgl_pengaduan`, `status`, `lampiran_file`, `nik`, `ttd_file`, `qrcode_file`) VALUES
(1, 'Bangun Pos', 'infrastruktur', 'anggaran', 'Mohon segera dibangun', 'RT 06 RW 02', '2020-11-06 14:30:14', 2, './assets/img/pengaduan/16515020-1604647813-lampiran_file.jpg', '16515020', './assets/img/pengaduan/5fc78c9dcef91.png', ''),
(7, 'Balap Liar', 'kasus', 'non-anggaran', 'Mohon segera ditertibkan', 'Jalan Raya RT06/RW02', '2020-07-05 02:07:15', 1, './assets/img/pengaduan/default.jpg', '123456', './assets/img/sign/5fb912abeb9e6.png', ''),
(9, 'Bangun Pos', 'infrastruktur', 'anggaran', 'Mohon segera dibangun', 'RT 06 RW 02', '2020-11-06 14:30:14', 2, './assets/img/pengaduan/16515020-1604647813-lampiran_file.jpg', '16515020', './assets/img/pengaduan/5fc78c9dcef91.png', ''),
(10, 'Perbaikan Pinggiran Kali & Jembatan', 'infrastruktur', 'anggaran', 'Mohon seger diperbaiki karena sungai sering meluap jika terjadi hujan lebat', 'RT 01 RW 01', '2020-12-02 19:46:22', 2, './assets/img/pengaduan/123456-1606913181-lampiran_file.jpg', '123456', './assets/img/pengaduan/5fc78c9dcef91.png', ''),
(11, 'Perbaikan Irigasi', 'infrastruktur', 'anggaran', 'Mohon segera diperbaiki, karena sering meluap', 'RT 06 RW 02', '2020-12-02 19:51:31', 3, './assets/img/pengaduan/123456-1606913491-lampiran_file.png', '123456', './assets/img/pengaduan/5fc78dd3c13e5.png', ''),
(12, 'Perbaikan Saluran Air di Depan Rumah', 'infrastruktur', 'anggaran', 'mohon segera diperbaiki', 'RT 06 RW 02', '2021-02-02 10:51:34', 2, './assets/img/pengaduan/123456-1612237894-lampiran_file.png', '123456', './assets/img/pengaduan/6018cc4617868.png', ''),
(13, 'Saluran Air Mampet', 'infrastruktur', 'non-anggaran', 'Saluran air di rt 06 ngumbuk mampet dan menyebabkan genangan banjir', 'RT 06 / RW 02', '2021-02-08 11:12:22', 1, './assets/img/pengaduan/123456-1612757542-lampiran_file.jpg', '123456', './assets/img/pengaduan/6020ba25cecdf.png', './assets/img/qrcode/1612757541.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_potensi`
--

CREATE TABLE `tbl_potensi` (
  `id_potensi` int(11) NOT NULL,
  `bidang` varchar(20) NOT NULL,
  `omzet` int(11) NOT NULL,
  `waktu_awal` int(2) NOT NULL,
  `waktu_akhir` int(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `orang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_potensi`
--

INSERT INTO `tbl_potensi` (`id_potensi`, `bidang`, `omzet`, `waktu_awal`, `waktu_akhir`, `tahun`, `orang`) VALUES
(1, 'agribisnis', 2000000, 2, 3, '2020', 10),
(2, 'kuliner', 1500000, 1, 1, '2020', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sign`
--

CREATE TABLE `tbl_sign` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `qrcode` varchar(200) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `tabel` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sign`
--

INSERT INTO `tbl_sign` (`id`, `nik`, `nama`, `gambar`, `qrcode`, `id_surat`, `tabel`, `cdate`) VALUES
(1, '123456', 'Khafido Ilzam', './assets/img/sign/5fb912abeb9e6.png', '', 3, 'tbl_kelahiran', '2020-11-22 15:54:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tanggapan_berita`
--

CREATE TABLE `tbl_tanggapan_berita` (
  `id_tan` int(11) NOT NULL,
  `tanggapan` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tanggapan_berita`
--

INSERT INTO `tbl_tanggapan_berita` (`id_tan`, `tanggapan`, `nik`, `id_berita`, `waktu`) VALUES
(1, 'Keren', '16515020', 9, '2020-11-06 03:16:06'),
(2, 'kirim 1 kilo', '222222', 6, '2021-02-20 03:26:32'),
(3, 'oke', '222222', 6, '2021-02-20 03:29:16'),
(4, 'halo halo\r\n', '222222', 7, '2021-02-20 10:17:35'),
(5, '@Kepala Desa yekk typo', '222222', 7, '2021-02-20 10:18:13'),
(6, 'Akan segera kami periksa', '222222', 10, '2021-03-07 10:44:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tanggapan_pengaduan`
--

CREATE TABLE `tbl_tanggapan_pengaduan` (
  `id_tanggapan` int(11) NOT NULL,
  `tanggapan` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tanggapan_pengaduan`
--

INSERT INTO `tbl_tanggapan_pengaduan` (`id_tanggapan`, `tanggapan`, `nik`, `id_pengaduan`, `waktu`) VALUES
(1, 'Mantap', '123456', 7, '2020-09-17 08:59:48'),
(2, 'Jos', '123456', 7, '2020-09-17 10:26:34'),
(3, 'dari admin', '123456', 5, '2020-09-17 10:59:24'),
(4, 'tes', '123456', 3, '2020-09-21 06:25:40'),
(5, 'Mantap', '123456', 8, '2020-11-06 02:50:53'),
(6, 'Akan segera kami tindak', '123456', 7, '2020-12-02 03:34:57'),
(7, 'Komentar 1', '123456', 10, '2021-01-27 06:36:14'),
(8, 'Oke', '222222', 7, '2021-02-20 03:25:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tdk_mampu`
--

CREATE TABLE `tbl_tdk_mampu` (
  `id` int(11) NOT NULL,
  `id_tdk_mampu` varchar(15) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nama_terkait` varchar(60) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `alamat` varchar(100) NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(255) DEFAULT NULL,
  `pengantar_file` varchar(100) NOT NULL,
  `pernyataan_file` varchar(100) NOT NULL,
  `ktp_file` varchar(100) NOT NULL,
  `kk_file` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `ttd_file` varchar(255) NOT NULL,
  `qrcode_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tdk_mampu`
--

INSERT INTO `tbl_tdk_mampu` (`id`, `id_tdk_mampu`, `jenis`, `nama_terkait`, `pekerjaan`, `status`, `alamat`, `tgl_buat`, `catatan`, `pengantar_file`, `pernyataan_file`, `ktp_file`, `kk_file`, `tujuan`, `nik`, `ttd_file`, `qrcode_file`) VALUES
(1, '2/III/17/6/2020', 'sekolah', 'Mino', 'pns', 2, 'ada di sana', '2020-06-09 02:43:38', NULL, '123456-1591645417-pe', '', '123456-1591645418-kt', '123456-1591645418-kk', 'Pembayaran SPP-Januari', '123456', './assets/img/sign/5fd5f8b459cb5.png', ''),
(5, '3/III/17/6/2020', 'rumah_sakit', 'x', 'swasta', 2, 'z', '2020-06-18 02:30:53', NULL, './assets/img/surat/tidak_mampu/165150201111134-1592422253-pengantar_file.png', '', '', '', 'y', '165150201111134', '', ''),
(6, '3/III/20/2/2021', 'sekolah', 'Sap', 'petani', 2, 'Ds. Pagerjajar', '2021-02-20 11:34:26', NULL, './assets/img/surat/tidak_mampu/222222-1613795665-pengantar_file.jpg', './assets/img/surat/tidak_mampu/222222-1613795665-pernyataan_file.jpg', './assets/img/surat/tidak_mampu/222222-1613795666-ktp_file.jpg', './assets/img/surat/tidak_mampu/222222-1613795666-kk_file.jpg', 'Bayar SPP', '222222', '', ''),
(7, '401/2/438.7.9.1', 'sekolah', 'qwqwqwq', 'pns', 2, 'wwwq', '2021-07-03 09:32:59', NULL, '', '', '', '', 'wqwqwq', '16515020', './assets/img/sign/60dfcdcad444a.png', ''),
(8, '401/3/438.7.9.1', 'rumah_sakit', 'qwqwqwq', 'lain', 1, 'w', '2021-07-03 10:26:40', NULL, '', '', '', '', 'qe', '16515020', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_umkm`
--

CREATE TABLE `tbl_umkm` (
  `id_umkm` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bidang` varchar(20) NOT NULL,
  `nik_pemilik` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `deskripsi` text NOT NULL,
  `logo_file` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_umkm`
--

INSERT INTO `tbl_umkm` (`id_umkm`, `nama`, `bidang`, `nik_pemilik`, `no_telp`, `alamat`, `tgl_berdiri`, `deskripsi`, `logo_file`, `status`) VALUES
(1, 'Toko Mantap Jiwa', 'kelontong', '165150201111134', '085832749723', 'RT06/RW02', '2014-09-27', '', 'http://localhost/webdesa/assets/img/umkm/123456-1593069339-logo_file.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_umum`
--

CREATE TABLE `tbl_umum` (
  `id` int(11) NOT NULL,
  `id_umum` varchar(20) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(255) DEFAULT NULL,
  `pengantar_file` varchar(100) NOT NULL,
  `ktp_file` varchar(100) NOT NULL,
  `kk_file` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `nik` varchar(16) NOT NULL,
  `ttd_file` varchar(255) NOT NULL,
  `qrcode_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_umum`
--

INSERT INTO `tbl_umum` (`id`, `id_umum`, `tujuan`, `tgl_buat`, `catatan`, `pengantar_file`, `ktp_file`, `kk_file`, `status`, `nik`, `ttd_file`, `qrcode_file`) VALUES
(6, '1/V/20/2/2021', 'kehilangan KTP', '2021-02-20 13:40:06', NULL, './assets/img/surat/umum/222222-1613803205-pengantar_file.jpg', './assets/img/surat/umum/222222-1613803206-ktp_file.jpg', './assets/img/surat/umum/222222-1613803206-kk_file.jpg', 2, '222222', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` int(1) NOT NULL,
  `rw` int(1) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `goldar` varchar(3) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `kawin` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `role` int(2) NOT NULL DEFAULT 0,
  `ktp_file` varchar(100) NOT NULL,
  `kk_file` varchar(100) NOT NULL,
  `foto_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_warga`
--

INSERT INTO `tbl_warga` (`nik`, `nama`, `email`, `pass`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `alamat`, `rt`, `rw`, `jk`, `goldar`, `agama`, `pendidikan`, `pekerjaan`, `kawin`, `status`, `role`, `ktp_file`, `kk_file`, `foto_file`) VALUES
('123456', 'Khafido', 'ilzam@gmail.com', '$2y$10$1E9TplgvnUlnGQqIHl4jMuI/hJP4bmLFr8OGI3KW.Ule8WHfuXucG', 'Sidoarjo', '1998-08-29', '085646433651', '', 4, 2, 'l', 'b', 'islam', 's1', 'pelajar', '', 1, 1, './assets/img/warga/ktp/123456-1613817183-ktp_file.png', '1591623610-kk.png', './assets/img/warga/foto/123456-1613817305-foto_file.png'),
('16515020', 'Khafido Ilzam', 'khafemail@gmail.com', '$2y$10$i/xF1dJ7Fg3vKEhW4DSmYuHhTqWtsrnIWL40AF1QD/kImuSQD4IN.', 'Surabaya', '2015-01-06', '085230839313', '', 4, 2, 'l', 'ab', 'islam', 'slta', 'swasta', 'belum', 0, 3, '', '', './assets/img/warga/foto/16515020-1604642344-foto_file.png'),
('165150201111134', 'Muchamad Khafido Ilzam', 'khaf@gmail.com', '$2y$10$41B81e5tXWar7GnNSQUo5eLex3z.SOPuesbddFRPBU.Zr2XSWBBC2', 'Malang', '2007-02-12', '08593753289', '', 4, 3, 'l', 'o', 'kristen', 's1', 'wiraswasta', 'belum', 0, 0, './assets/img/warga/ktp/165150201111134-1592312875-ktp_file.jpg', './assets/img/warga/kk/165150201111134-1592312875-kk_file.png', './assets/img/warga/foto/165150201111134-1592312875-foto_file.png'),
('215123551464646', 'Ilzam', 'khaf2@gmail.com', '$2y$10$xsEjU/NXze9ekJwgBoluGeNKZw2adPiYULq4bPE3Z5zXhsjE3E/I6', 'Tokyo', '2008-03-11', '0856672483', '', 5, 1, 'l', 'o', 'kristen', 's2', 'pns', 'sudah', 0, 0, '', '', ''),
('222222', 'Kepala Desa', 'kepala@gmail.com', '$2y$10$99ZkSVB4jG3nD1bIbF6J2uF.cM87uoal1lL3.fagPfqy5WbzLPQt6', 'Sorong', '2021-02-20', '08583924', '', 2, 1, 'l', 'a', 'islam', 'sd', 'petani', '', 1, 0, './assets/img/warga/ktp/default.jpg', '', './assets/img/warga/foto/222222-1614051018-foto_file.png'),
('29481284021', 'Citara', 'citara@gmail.com', '$2y$10$D1kmRrXAE7lj8ym9dSa7B.GjqfZBaFMO0gEuMUBd2X20oQpjxFQfa', 'Jakarta', '1996-08-03', '087647385687', '', 3, 2, 'p', 'ab', 'hindu', 'd3', 'swasta', 'belum', 0, 2, '', '', '');

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_berita`
--
DROP TABLE IF EXISTS `detail_berita`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_berita`  AS SELECT `b`.`id_berita` AS `id_berita`, `b`.`judul` AS `judul`, `b`.`isi` AS `isi`, `b`.`tgl_berita` AS `tgl_berita`, `b`.`rubrik` AS `rubrik`, `b`.`cover_file` AS `cover_file`, `b`.`status` AS `status`, `b`.`nik` AS `nik`, `w`.`nama` AS `nama` FROM (`tbl_berita` `b` join `tbl_warga` `w` on(`b`.`nik` = `w`.`nik`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_kegiatan`
--
DROP TABLE IF EXISTS `detail_kegiatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_kegiatan`  AS SELECT `k`.`id_kegiatan` AS `id_kegiatan`, `k`.`bidang` AS `bidang`, `k`.`nama` AS `nama`, `k`.`tgl_mulai` AS `tgl_mulai`, `k`.`tgl_selesai` AS `tgl_selesai`, `k`.`output` AS `output`, `k`.`kendala` AS `kendala`, `k`.`saran` AS `saran`, `k`.`ketua_pelaksana` AS `ketua_pelaksana`, `k`.`catatan` AS `catatan`, `k`.`status` AS `status`, `k`.`lampiran_file` AS `lampiran_file`, `k`.`id_pengaduan` AS `id_pengaduan`, `k`.`kode` AS `kode`, `d`.`nama` AS `dana`, `p`.`nama` AS `pelapor`, `k`.`kode_kegiatan` AS `kode_kegiatan` FROM ((`tbl_kegiatan` `k` join `tbl_dana` `d` on(`k`.`kode` = `d`.`kode`)) join `detail_pengaduan` `p` on(`k`.`id_pengaduan` = `p`.`id_pengaduan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_pengaduan`
--
DROP TABLE IF EXISTS `detail_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pengaduan`  AS SELECT `p`.`id_pengaduan` AS `id_pengaduan`, `p`.`judul` AS `judul`, `p`.`bidang` AS `bidang`, `p`.`lokasi` AS `lokasi`, `p`.`kategori` AS `kategori`, `p`.`uraian` AS `uraian`, `p`.`tgl_pengaduan` AS `tgl_pengaduan`, `p`.`status` AS `status`, `p`.`lampiran_file` AS `lampiran_file`, `p`.`nik` AS `nik`, `w`.`nama` AS `nama`, `w`.`no_telp` AS `no_telp`, `w`.`email` AS `email`, `w`.`rw` AS `rw`, `w`.`rt` AS `rt`, `p`.`ttd_file` AS `ttd_file`, `p`.`qrcode_file` AS `qrcode_file` FROM (`tbl_pengaduan` `p` join `tbl_warga` `w` on(`p`.`nik` = `w`.`nik`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_tanggapan_berita`
--
DROP TABLE IF EXISTS `detail_tanggapan_berita`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_tanggapan_berita`  AS SELECT `t`.`id_tan` AS `id_tan`, `t`.`tanggapan` AS `tanggapan`, `t`.`nik` AS `nik`, `t`.`id_berita` AS `id_berita`, `t`.`waktu` AS `waktu`, `w`.`nama` AS `nama`, `w`.`foto_file` AS `foto_file` FROM ((`tbl_berita` `p` join `tbl_tanggapan_berita` `t` on(`p`.`id_berita` = `t`.`id_berita`)) join `tbl_warga` `w` on(`w`.`nik` = `t`.`nik`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_tanggapan_pengaduan`
--
DROP TABLE IF EXISTS `detail_tanggapan_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_tanggapan_pengaduan`  AS SELECT `t`.`id_tanggapan` AS `id_tanggapan`, `t`.`tanggapan` AS `tanggapan`, `t`.`nik` AS `nik`, `t`.`id_pengaduan` AS `id_pengaduan`, `t`.`waktu` AS `waktu`, `w`.`nama` AS `nama`, `w`.`foto_file` AS `foto_file` FROM ((`tbl_pengaduan` `p` join `tbl_tanggapan_pengaduan` `t` on(`p`.`id_pengaduan` = `t`.`id_pengaduan`)) join `tbl_warga` `w` on(`w`.`nik` = `t`.`nik`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_umkm`
--
DROP TABLE IF EXISTS `detail_umkm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_umkm`  AS SELECT `u`.`id_umkm` AS `id_umkm`, `u`.`nama` AS `nama`, `u`.`bidang` AS `bidang`, `u`.`nik_pemilik` AS `nik_pemilik`, `u`.`no_telp` AS `no_telp`, `u`.`alamat` AS `alamat`, `u`.`tgl_berdiri` AS `tgl_berdiri`, `u`.`deskripsi` AS `deskripsi`, `u`.`logo_file` AS `logo_file`, `u`.`status` AS `status`, `w`.`nama` AS `pemilik` FROM (`tbl_umkm` `u` join `tbl_warga` `w` on(`u`.`nik_pemilik` = `w`.`nik`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_bumdes`
--
ALTER TABLE `tbl_bumdes`
  ADD PRIMARY KEY (`id_bumdes`);

--
-- Indeks untuk tabel `tbl_dana`
--
ALTER TABLE `tbl_dana`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tbl_domisili`
--
ALTER TABLE `tbl_domisili`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tbl_item_fisik`
--
ALTER TABLE `tbl_item_fisik`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_item_keuangan`
--
ALTER TABLE `tbl_item_keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_potensi`
--
ALTER TABLE `tbl_potensi`
  ADD PRIMARY KEY (`id_potensi`);

--
-- Indeks untuk tabel `tbl_sign`
--
ALTER TABLE `tbl_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tanggapan_berita`
--
ALTER TABLE `tbl_tanggapan_berita`
  ADD PRIMARY KEY (`id_tan`);

--
-- Indeks untuk tabel `tbl_tanggapan_pengaduan`
--
ALTER TABLE `tbl_tanggapan_pengaduan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- Indeks untuk tabel `tbl_tdk_mampu`
--
ALTER TABLE `tbl_tdk_mampu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `no_telp` (`no_telp`),
  ADD KEY `nik_pemilik` (`nik_pemilik`);

--
-- Indeks untuk tabel `tbl_umum`
--
ALTER TABLE `tbl_umum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_bumdes`
--
ALTER TABLE `tbl_bumdes`
  MODIFY `id_bumdes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_domisili`
--
ALTER TABLE `tbl_domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1117;

--
-- AUTO_INCREMENT untuk tabel `tbl_item_fisik`
--
ALTER TABLE `tbl_item_fisik`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_item_keuangan`
--
ALTER TABLE `tbl_item_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_potensi`
--
ALTER TABLE `tbl_potensi`
  MODIFY `id_potensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_sign`
--
ALTER TABLE `tbl_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_tanggapan_berita`
--
ALTER TABLE `tbl_tanggapan_berita`
  MODIFY `id_tan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_tanggapan_pengaduan`
--
ALTER TABLE `tbl_tanggapan_pengaduan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_tdk_mampu`
--
ALTER TABLE `tbl_tdk_mampu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_umum`
--
ALTER TABLE `tbl_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD CONSTRAINT `tbl_berita_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD CONSTRAINT `tbl_biodata_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_domisili`
--
ALTER TABLE `tbl_domisili`
  ADD CONSTRAINT `tbl_domisili_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_item_fisik`
--
ALTER TABLE `tbl_item_fisik`
  ADD CONSTRAINT `tbl_item_fisik_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_item_keuangan`
--
ALTER TABLE `tbl_item_keuangan`
  ADD CONSTRAINT `tbl_item_keuangan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD CONSTRAINT `tbl_kegiatan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `tbl_pengaduan` (`id_pengaduan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kegiatan_ibfk_2` FOREIGN KEY (`kode`) REFERENCES `tbl_dana` (`kode`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  ADD CONSTRAINT `tbl_kelahiran_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  ADD CONSTRAINT `tbl_kematian_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD CONSTRAINT `tbl_pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_tdk_mampu`
--
ALTER TABLE `tbl_tdk_mampu`
  ADD CONSTRAINT `tbl_tdk_mampu_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  ADD CONSTRAINT `tbl_umkm_ibfk_1` FOREIGN KEY (`nik_pemilik`) REFERENCES `tbl_warga` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tbl_umum`
--
ALTER TABLE `tbl_umum`
  ADD CONSTRAINT `tbl_umum_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
