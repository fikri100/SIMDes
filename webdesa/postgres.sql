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

CREATE TABLE tbl_berita (
  id_berita SERIAL PRIMARY KEY,
  judul varchar(50) NOT NULL,
  isi text NOT NULL,
  tgl_berita timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  rubrik varchar(10) NOT NULL,
  cover_file varchar(60) NOT NULL,
  status int DEFAULT '0',
  nik varchar(16) NOT NULL
);

CREATE TABLE tbl_biodata (
  id SERIAL PRIMARY KEY,
  id_biodata varchar(20) NOT NULL,
  nama_kepala varchar(60) NOT NULL,
  alamat varchar(100) NOT NULL,
  anggota text NOT NULL,
  tgl_buat timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(100) NOT NULL,
  akta_lahir_file varchar(100) NOT NULL,
  ijazah_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  akta_kawin_file varchar(100) NOT NULL,
  status int DEFAULT '0',
  nik varchar(16) NOT NULL
) ;

CREATE TABLE tbl_bumdes (
  id_bumdes SERIAL PRIMARY KEY,
  nama varchar(50) NOT NULL,
  bidang varchar(20) NOT NULL,
  ketua varchar(50) NOT NULL,
  tgl_berdiri date NOT NULL,
  no_telp varchar(15) NOT NULL,
  deskripsi text NOT NULL,
  logo_file varchar(100) NOT NULL,
  status int DEFAULT '0'
) ;

CREATE TABLE tbl_dana (
  kode varchar(4) NOT NULL,
  nama varchar(50) NOT NULL,
  jumlah int NOT NULL,
  tahun varchar(9) NOT NULL,
  status int DEFAULT '1'
) ;

INSERT INTO tbl_dana (kode, nama, jumlah, tahun, status) VALUES
('1238', 'Pajak Bagi Hasil', 300000000, '2020', 1),
('1278', 'A', 10000, '2020', -1),
('1291', 'BK Kabupaten', 4500000, '2020', 1),
('3172', 'Pendapatan Asli Desa', 90000000, '2020', 1),
('6311', 'Anggaran Dana Desa (ADD)', 450000000, '2020', 1),
('6312', 'Penyaluran Dana Desa (DDS)', 900000000, '2020', 1),
('8721', 'B', 25000, '2020', -1);

CREATE TABLE tbl_domisili (
  id SERIAL PRIMARY KEY,
  id_domisili varchar(20) NOT NULL,
  jenis varchar(10) NOT NULL,
  nama_usaha varchar(60) NOT NULL,
  alamat varchar(100) NOT NULL,
  tgl_buat timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  akta_usaha_file varchar(100) NOT NULL,
  pernyataan_file varchar(100) NOT NULL,
  perjanjian_file varchar(100) NOT NULL,
  kepemilikan_file varchar(100) NOT NULL,
  status int DEFAULT '0',
  nik varchar(16) NOT NULL
) ;

CREATE TABLE tbl_item_fisik (
  kode SERIAL PRIMARY KEY,
  uraian varchar(50) NOT NULL,
  volume varchar(10) NOT NULL,
  satuan varchar(10) NOT NULL,
  nilai int NOT NULL,
  ket varchar(50) NOT NULL,
  id_kegiatan int NOT NULL
) ;

CREATE TABLE tbl_item_keuangan (
  kode varchar(4) NOT NULL,
  uraian varchar(50) NOT NULL,
  volume varchar(10) NOT NULL,
  satuan varchar(20) NOT NULL,
  harga_satuan int NOT NULL,
  jumlah int NOT NULL,
  realisasi int NOT NULL,
  prosentase varchar(5) DEFAULT '0',
  id_kegiatan int NOT NULL
) ;

CREATE TABLE tbl_kegiatan (
  id_kegiatan SERIAL PRIMARY KEY,
  bidang varchar(20) NOT NULL,
  nama varchar(50) NOT NULL,
  tgl_mulai date DEFAULT NULL,
  tgl_selesai date DEFAULT NULL,
  output varchar(50) NOT NULL,
  kendala varchar(255) NOT NULL,
  saran varchar(255) NOT NULL,
  ketua_pelaksana varchar(50) NOT NULL,
  catatan varchar(100) DEFAULT '-',
  status int DEFAULT '0',
  lampiran_file varchar(100) NOT NULL,
  id_pengaduan int NOT NULL,
  kode varchar(4) NOT NULL
) ;

CREATE TABLE tbl_kelahiran (
  id SERIAL PRIMARY KEY,
  id_kelahiran varchar(20) NOT NULL,
  hubungan varchar(15) NOT NULL,
  tgl_lahir date NOT NULL,
  tempat_lahir varchar(20) NOT NULL,
  jk varchar(1) NOT NULL,
  status int DEFAULT '0',
  anak varchar(60) NOT NULL,
  ayah varchar(60) NOT NULL,
  ibu varchar(60) NOT NULL,
  alamat varchar(100) NOT NULL,
  rt int NOT NULL,
  rw int NOT NULL,
  tgl_buat timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(100) NOT NULL,
  ket_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  buku_file varchar(100) NOT NULL,
  nik varchar(16) NOT NULL
) ;

CREATE TABLE tbl_kematian (
  id SERIAL PRIMARY KEY,
  id_kematian varchar(20) NOT NULL,
  hubungan varchar(15) NOT NULL,
  nik_alm varchar(16) NOT NULL,
  nama varchar(60) NOT NULL,
  tgl_lahir date NOT NULL,
  jk varchar(1) NOT NULL,
  agama varchar(20) NOT NULL,
  status_kawin varchar(20) NOT NULL,
  pekerjaan varchar(20) NOT NULL,
  kwn varchar(3) DEFAULT 'wni',
  tgl_meninggal date NOT NULL,
  tempat_meninggal varchar(20) NOT NULL,
  penyebab varchar(20) NOT NULL,
  penentu varchar(20) NOT NULL,
  kota_meninggal varchar(20) NOT NULL,
  alamat varchar(100) NOT NULL,
  tgl_buat timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  pernyataan_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  ktp_alm_file varchar(100) NOT NULL,
  kk_alm_file varchar(100) NOT NULL,
  status int DEFAULT '0',
  nik varchar(16) NOT NULL
) ;


CREATE TABLE tbl_pengaduan (
  id_pengaduan SERIAL PRIMARY KEY,
  judul varchar(100) NOT NULL,
  bidang varchar(20) NOT NULL,
  kategori varchar(20) NOT NULL,
  uraian text NOT NULL,
  lokasi varchar(25) NOT NULL,
  tgl_pengaduan timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  status int DEFAULT '0',
  lampiran_file varchar(60) NOT NULL,
  nik varchar(16) NOT NULL
) ;
CREATE TABLE tbl_potensi (
  id_potensi SERIAL PRIMARY KEY,
  bidang varchar(20) NOT NULL,
  omzet int NOT NULL,
  waktu_awal int NOT NULL,
  waktu_akhir int NOT NULL,
  tahun varchar(4) NOT NULL,
  orang int NOT NULL
) ;

CREATE TABLE tbl_tdk_mampu (
  id SERIAL PRIMARY KEY,
  id_tdk_mampu varchar(15) NOT NULL,
  jenis varchar(20) NOT NULL,
  nama_terkait varchar(60) NOT NULL,
  pekerjaan varchar(20) NOT NULL,
  status int DEFAULT '0',
  alamat varchar(100) NOT NULL,
  tgl_buat timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(100) NOT NULL,
  pernyataan_file varchar(100) NOT NULL,
  ktp_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  tujuan varchar(100) NOT NULL,
  nik varchar(16) NOT NULL
) ;

CREATE TABLE tbl_umkm (
  id_umkm SERIAL PRIMARY KEY,
  nama varchar(50) NOT NULL,
  bidang varchar(20) NOT NULL,
  nik_pemilik varchar(20) NOT NULL,
  no_telp varchar(15) NOT NULL,
  alamat varchar(100) NOT NULL,
  tgl_berdiri date NOT NULL,
  deskripsi text NOT NULL,
  logo_file varchar(100) NOT NULL,
  status int DEFAULT '0'
) ;

CREATE TABLE tbl_umum (
  id SERIAL PRIMARY KEY,
  id_umum varchar(20) NOT NULL,
  tujuan varchar(100) NOT NULL,
  tgl_buat timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  pengantar_file varchar(40) NOT NULL,
  ktp_file varchar(40) NOT NULL,
  kk_file varchar(40) NOT NULL,
  status int DEFAULT '0',
  nik varchar(16) NOT NULL
) ;

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
  status int DEFAULT '0',
  role int DEFAULT '0',
  ktp_file varchar(100) NOT NULL,
  kk_file varchar(100) NOT NULL,
  foto_file varchar(100) NOT NULL
) ;

INSERT INTO tbl_warga (nik, nama, email, pass, tempat_lahir, tgl_lahir, no_telp, alamat, rt, rw, jk, goldar, agama, pendidikan, pekerjaan, status, role, ktp_file, kk_file, foto_file) VALUES
('123456', 'Khafido', 'ilz@gmail.com', '$2y$10$41B81e5tXWar7GnNSQUo5eLex3z.SOPuesbddFRPBU.Zr2XSWBBC2', 'Sidoarjo', '1998-08-29', '085646433651', '', 4, 2, 'l', 'b', 'islam', 's1', 'pelajar', 0, 1, '1591623610-ktp.png', '1591623610-kk.png', '123456-1591693485-foto.png'),
('165150201111134', 'Muchamad Khafido Ilzam', 'khaf@gmail.com', '$2y$10$41B81e5tXWar7GnNSQUo5eLex3z.SOPuesbddFRPBU.Zr2XSWBBC2', 'Malang', '2007-02-12', '08593753289', '', 4, 3, 'l', 'o', 'kristen', 's1', 'wiraswasta', 0, 0, './assets/img/warga/ktp/165150201111134-1592312875-ktp_file.jpg', './assets/img/warga/kk/165150201111134-1592312875-kk_file.png', './assets/img/warga/foto/165150201111134-1592312875-foto_file.png'),
('215123551464646', 'Ilzam', 'khaf@gmail.com', '$2y$10$xsEjU/NXze9ekJwgBoluGeNKZw2adPiYULq4bPE3Z5zXhsjE3E/I6', 'Tokyo', '2008-03-11', '0856672483', '', 5, 1, 'l', 'o', 'kristen', 's2', 'pns', 0, 0, '', '', ''),
('29481284021', 'Citara', 'citara@gmail.com', '$2y$10$D1kmRrXAE7lj8ym9dSa7B.GjqfZBaFMO0gEuMUBd2X20oQpjxFQfa', 'Jakarta', '1996-08-03', '087647385687', '', 3, 2, 'p', 'ab', 'hindu', 'd3', 'swasta', 0, 0, '', '', '');

DROP TABLE IF EXISTS detail_berita;

CREATE   VIEW detail_berita  AS  select b.id_berita AS id_berita,b.judul AS judul,b.isi AS isi,b.tgl_berita AS tgl_berita,b.rubrik AS rubrik,b.cover_file AS cover_file,b.status AS status,b.nik AS nik,w.nama AS nama from (tbl_berita b join tbl_warga w on((b.nik = w.nik))) ;

DROP TABLE IF EXISTS detail_kegiatan;

CREATE   VIEW detail_kegiatan  AS  select k.id_kegiatan AS id_kegiatan,k.bidang AS bidang,k.nama AS nama,k.tgl_mulai AS tgl_mulai,k.tgl_selesai AS tgl_selesai,k.output AS output,k.kendala AS kendala,k.saran AS saran,k.ketua_pelaksana AS ketua_pelaksana,k.catatan AS catatan,k.status AS status,k.lampiran_file AS lampiran_file,k.id_pengaduan AS id_pengaduan,k.kode AS kode,d.nama AS dana,p.nama AS pelapor from ((tbl_kegiatan k join tbl_dana d on((k.kode = d.kode))) join detail_pengaduan p on((k.id_pengaduan = p.id_pengaduan))) ;

DROP TABLE IF EXISTS detail_pengaduan;

CREATE   VIEW detail_pengaduan  AS  select p.id_pengaduan AS id_pengaduan,p.judul AS judul,p.bidang AS bidang,p.lokasi AS lokasi,p.kategori AS kategori,p.uraian AS uraian,p.tgl_pengaduan AS tgl_pengaduan,p.status AS status,p.lampiran_file AS lampiran_file,p.nik AS nik,w.nama AS nama from (tbl_pengaduan p join tbl_warga w on((p.nik = w.nik))) ;

DROP TABLE IF EXISTS detail_umkm;

CREATE   VIEW detail_umkm  AS  select u.id_umkm AS id_umkm,u.nama AS nama,u.bidang AS bidang,u.nik_pemilik AS nik_pemilik,u.no_telp AS no_telp,u.alamat AS alamat,u.tgl_berdiri AS tgl_berdiri,u.deskripsi AS deskripsi,u.logo_file AS logo_file,u.status AS status,w.nama AS pemilik from (tbl_umkm u join tbl_warga w on((u.nik_pemilik = w.nik))) ;

ALTER TABLE tbl_berita
  ADD PRIMARY KEY (id_berita),
  ADD KEY nik (nik);

ALTER TABLE tbl_biodata
  ADD PRIMARY KEY (id),
  ADD KEY nik (nik);

ALTER TABLE tbl_bumdes
  ADD PRIMARY KEY (id_bumdes);

ALTER TABLE tbl_dana
  ADD PRIMARY KEY (kode);

ALTER TABLE tbl_domisili
  ADD PRIMARY KEY (id),
  ADD KEY nik (nik);

ALTER TABLE tbl_item_fisik
  ADD PRIMARY KEY (kode),
  ADD KEY id_kegiatan (id_kegiatan);

ALTER TABLE tbl_item_keuangan
  ADD PRIMARY KEY (kode),
  ADD KEY id_kegiatan (id_kegiatan);

--
-- Indexes for table tbl_kegiatan
--
ALTER TABLE tbl_kegiatan
  ADD PRIMARY KEY (id_kegiatan),
  ADD KEY id_pengaduan (id_pengaduan),
  ADD KEY kode (kode);

--
-- Indexes for table tbl_kelahiran
--
ALTER TABLE tbl_kelahiran
  ADD PRIMARY KEY (id),
  ADD KEY nik (nik);

--
-- Indexes for table tbl_kematian
--
ALTER TABLE tbl_kematian
  ADD PRIMARY KEY (id),
  ADD KEY nik (nik);

--
-- Indexes for table tbl_pengaduan
--
ALTER TABLE tbl_pengaduan
  ADD PRIMARY KEY (id_pengaduan),
  ADD KEY nik (nik);

--
-- Indexes for table tbl_potensi
--
ALTER TABLE tbl_potensi
  ADD PRIMARY KEY (id_potensi);

--
-- Indexes for table tbl_tdk_mampu
--
ALTER TABLE tbl_tdk_mampu
  ADD PRIMARY KEY (id),
  ADD KEY nik (nik);

--
-- Indexes for table tbl_umkm
--
ALTER TABLE tbl_umkm
  ADD PRIMARY KEY (id_umkm),
  ADD KEY no_telp (no_telp),
  ADD KEY nik_pemilik (nik_pemilik);

--
-- Indexes for table tbl_umum
--
ALTER TABLE tbl_umum ADD PRIMARY KEY (id), ADD KEY nik (nik);

--
-- Indexes for table tbl_warga
--
ALTER TABLE tbl_warga ADD PRIMARY KEY (nik);

--
-- SERIAL for dumped tables
--

--
-- SERIAL for table tbl_berita
--
ALTER TABLE tbl_berita ADD COLUMN id_berita SERIAL;

--
-- SERIAL for table tbl_biodata
--
ALTER TABLE tbl_biodata ADD COLUMN id SERIAL;

--
-- SERIAL for table tbl_bumdes
--
ALTER TABLE tbl_bumdes ADD COLUMN id_bumdes SERIAL;

--
-- SERIAL for table tbl_domisili
--
ALTER TABLE tbl_domisili ADD COLUMN id SERIAL;

--
-- SERIAL for table tbl_item_fisik
--
ALTER TABLE tbl_item_fisik ADD COLUMN kode SERIAL;

--
-- SERIAL for table tbl_kegiatan
--
ALTER TABLE tbl_kegiatan ADD COLUMN id_kegiatan SERIAL;

--
-- SERIAL for table tbl_kelahiran
--
ALTER TABLE tbl_kelahiran ADD COLUMN id SERIAL;

--
-- SERIAL for table tbl_kematian
--
ALTER TABLE tbl_kematian ADD COLUMN id SERIAL;

--
-- SERIAL for table tbl_pengaduan
--
ALTER TABLE tbl_pengaduan ADD COLUMN id_pengaduan SERIAL;

--
-- SERIAL for table tbl_potensi
--
ALTER TABLE tbl_potensi ADD COLUMN id_potensi SERIAL;

--
-- SERIAL for table tbl_tdk_mampu
--
ALTER TABLE tbl_tdk_mampu ADD COLUMN id SERIAL;

--
-- SERIAL for table tbl_umkm
--
ALTER TABLE tbl_umkm ADD COLUMN id_umkm SERIAL;

--
-- SERIAL for table tbl_umum
--
ALTER TABLE tbl_umum ADD COLUMN id SERIAL;

--
-- Constraints for dumped tables
--

--
-- Constraints for table tbl_berita
--
ALTER TABLE tbl_berita
  ADD CONSTRAINT tbl_berita_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_biodata
--
ALTER TABLE tbl_biodata
  ADD CONSTRAINT tbl_biodata_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_domisili
--
ALTER TABLE tbl_domisili
  ADD CONSTRAINT tbl_domisili_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_item_fisik
--
ALTER TABLE tbl_item_fisik
  ADD CONSTRAINT tbl_item_fisik_ibfk_1 FOREIGN KEY (id_kegiatan) REFERENCES tbl_kegiatan (id_kegiatan) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_item_keuangan
--
ALTER TABLE tbl_item_keuangan
  ADD CONSTRAINT tbl_item_keuangan_ibfk_1 FOREIGN KEY (id_kegiatan) REFERENCES tbl_kegiatan (id_kegiatan) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_kegiatan
--
ALTER TABLE tbl_kegiatan
  ADD CONSTRAINT tbl_kegiatan_ibfk_1 FOREIGN KEY (id_pengaduan) REFERENCES tbl_pengaduan (id_pengaduan) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT tbl_kegiatan_ibfk_2 FOREIGN KEY (kode) REFERENCES tbl_dana (kode) ON UPDATE CASCADE;

--
-- Constraints for table tbl_kelahiran
--
ALTER TABLE tbl_kelahiran
  ADD CONSTRAINT tbl_kelahiran_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_kematian
--
ALTER TABLE tbl_kematian
  ADD CONSTRAINT tbl_kematian_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_pengaduan
--
ALTER TABLE tbl_pengaduan
  ADD CONSTRAINT tbl_pengaduan_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_tdk_mampu
--
ALTER TABLE tbl_tdk_mampu
  ADD CONSTRAINT tbl_tdk_mampu_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table tbl_umkm
--
ALTER TABLE tbl_umkm
  ADD CONSTRAINT tbl_umkm_ibfk_1 FOREIGN KEY (nik_pemilik) REFERENCES tbl_warga (nik);

--
-- Constraints for table tbl_umum
--
ALTER TABLE tbl_umum
  ADD CONSTRAINT tbl_umum_ibfk_1 FOREIGN KEY (nik) REFERENCES tbl_warga (nik) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
