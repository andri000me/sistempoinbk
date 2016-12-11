-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Des 2016 pada 05.33
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksi`
--

CREATE TABLE IF NOT EXISTS `aksi` (
`no_aksi` int(3) NOT NULL,
  `no_induk` int(3) NOT NULL,
  `no_hukuman` int(3) NOT NULL,
  `aksi` varchar(5) NOT NULL DEFAULT 'belum',
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aksi`
--

INSERT INTO `aksi` (`no_aksi`, `no_induk`, `no_hukuman`, `aksi`, `date`) VALUES
(1, 56121690, 4, 'belum', '2016-12-05 00:00:00'),
(2, 91719667, 1, 'sudah', '2016-12-06 19:27:25'),
(3, 91719667, 2, 'belum', '2016-12-06 03:05:08'),
(4, 92186366, 4, 'belum', '2016-12-07 11:06:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hukuman`
--

CREATE TABLE IF NOT EXISTS `hukuman` (
`no_hukuman` int(3) NOT NULL,
  `point_hukuman` int(3) NOT NULL,
  `hukuman` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hukuman`
--

INSERT INTO `hukuman` (`no_hukuman`, `point_hukuman`, `hukuman`) VALUES
(1, 20, 'Pemanggilan orang tua yang ke-1 oleh Wali kelas untuk melakukan pembinaan bersama.'),
(2, 25, 'Pemanggilan orang tua yang ke-2 oleh Wali kelas dan Guru BK untuk melakukan pembinaan bersama.|Membuat surat pernyataan ke-1 untuk peserta didik dan ditandatanganinya tanpa materai dan diketahui orang tua.|Surat pernyataan berisi janji tidak akan melakukan pelanggaran lagi dan akan menerima sanksi berupa skorsing ke-1 apabila ingkar janji.'),
(3, 35, 'Pemanggilan orang tua yang ke-3 oleh Wali kelas, Guru BK, dan Staf kesiswaan bidang tata tertib untuk melakukan pembinaan bersama.|Memberikan surat skorsing ke-1 selama 3 hari.|Membuat surat pernyataan ke-2 untuk peserta didik dan ditandatanganinya di atas materai 6000 dan diketahui orang tua.|Surat pernyataan berisi janji tidak akan melakukan pelanggaran lagi dan akan menerima sanksi berupa skorsing ke-2 apabila ingkar janji.'),
(4, 45, 'Pemanggilan orang tua yang ke-4 oleh Wali kelas, Guru BK, Staf kesiswaan bidang tata tertib dan Wakil Kesiswaan untuk melakukan pembinaan bersama.|Melakukan konferensi kasus.|Memberikan surat skorsing ke-2 selama 3 hari.|Membuat surat pernyataan ke-3 untuk peserta didik dan ditandatanganinya di atas materai 6000 dan diketahui orang tua.|Surat pernyataan berisi janji tidak akan melakukan pelanggaran lagi dan akan menerima sanksi berupa skorsing ke-3 apabila ingkar janji.'),
(5, 55, 'Pemanggilan orang tua yang ke-5 oleh Wali kelas, Guru BK, Staf kesiswaan bidang tata tertib, Wakil Kesiswaan dan Kepala sekolah untuk melakukan pembinaan bersama.|Melakukan konferensi kasus.|Memberikan surat skorsing ke-3 selama 3 hari.|Membuat surat pernyataan ke-4 untuk peserta didik dan ditandatanganinya di atas materai 6000 dan diketahui orang tua.|Surat pernyataan berisi janji tidak akan melakukan pelanggaran lagi dan akan menerima sanksi berupa pengembalian ke orang tua apabila ingkar janji.'),
(6, 65, 'Pemanggilan orang tua yang ke-6 oleh Wali kelas, Guru BK, Staf kesiswaan bidang tata tertib, Wakil Kesiswaan dan Kepala sekolah untuk melakukan pembinaan bersama.|Melakukan konferensi kasus.|Memberikan surat keterangan dikembalikan kepada orang tua karena pelanggaran yang dilakukan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `point`
--

CREATE TABLE IF NOT EXISTS `point` (
`no_point` int(3) NOT NULL,
  `no_induk` int(3) NOT NULL,
  `no_tb` int(3) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `point`
--

INSERT INTO `point` (`no_point`, `no_induk`, `no_tb`, `date`) VALUES
(1, 87924118, 21, '2016-12-05 11:40:00'),
(2, 87924118, 30, '2016-12-05 11:40:00'),
(3, 56121690, 60, '2016-12-05 18:24:49'),
(4, 83271545, 84, '2016-12-05 18:41:53'),
(5, 91719667, 34, '2016-12-05 19:27:25'),
(6, 91719667, 30, '2016-12-05 19:27:25'),
(7, 91719667, 43, '2016-12-06 03:05:08'),
(8, 99483394, 21, '2016-12-06 10:30:37'),
(9, 87924118, 21, '2016-12-12 00:00:00'),
(10, 87924118, 21, '2016-12-02 00:00:00'),
(11, 92186366, 21, '2016-12-07 11:06:11'),
(12, 92186366, 60, '2016-12-07 11:06:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tatatertib`
--

CREATE TABLE IF NOT EXISTS `tatatertib` (
`no_tb` int(3) NOT NULL,
  `nama` text NOT NULL,
  `point` int(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tatatertib`
--

INSERT INTO `tatatertib` (`no_tb`, `nama`, `point`, `keterangan`) VALUES
(1, 'Seragam tidak sesuai dengan ketentuan sekolah ', 10, 'Kerapihan'),
(2, 'Seragam tidak lengkap misalnya bedge (symbol Osis)/nama dada', 5, 'Kerapihan'),
(3, 'Tidak memasukkan baju seragam ', 5, 'Kerapihan'),
(4, 'Memakai kaos dalam bukan singlet warna putih', 10, 'Kerapihan'),
(5, 'Berpakaian Transparan (untuk peserta didik Putri)', 15, 'Kerapihan'),
(6, 'Tidak memakai sepatu hitam ', 10, 'Kerapihan'),
(7, 'Memakai sandal (bukan karena alasan sakit pada kaki)', 10, 'Kerapihan'),
(8, 'Menggunakan baju, celana/rok ketat, ', 10, 'Kerapihan'),
(9, 'Seragam sobek atau ada coretan yang disengaja  ', 10, 'Kerapihan'),
(10, 'Memakai/membawa jaket, rompi, Syal, sweater, handuk, topi selain topi osis, kaca mata hitam(kecuali sakit) dilingkungan sekolah ', 10, 'Kerapihan'),
(11, 'Celana/rok tidak dijahit bagian bawah/samping ', 10, 'Kerapihan'),
(12, 'Tidak memakai kaos kaki/memakai kaos kaki tidak sesuai ketentuan ', 10, 'Kerapihan'),
(13, 'Peserta didik Putri berhias, dan memakai perhiasan berlebihan ', 10, 'Kerapihan'),
(14, 'Peserta didik Putra memakai perhiasan (asesoris) ', 10, 'Kerapihan'),
(15, 'Peserta didik Putra berambut panjang sampai menyentuh alis mata/telinga/kerah baju ', 10, 'Kerapihan'),
(16, 'Rambut di cat, berdiri, jabrik, memakai jelly, memakai wig, memelihara buntut dan memodifikasi rambut ', 10, 'Kerapihan'),
(17, 'Bertato', 10, 'Kerapihan'),
(18, 'Berkuku panjang/Mencat kuku', 5, 'Kerapihan'),
(19, 'Tidak memakai ikat pinggang warna hitam/memakai ikat pinggang lebih dari 5 cm', 5, 'Kerapihan'),
(20, 'Tidak masuk sekolah tanpa keterangan (Alpa).  ', 5, 'Kerajinan'),
(21, 'Terlambat masuk sekolah atau terlambat mengikuti pelajaran tertentu', 5, 'Kerajinan'),
(22, 'Meninggalkan pelajaran tanpa keterangan ', 10, 'Kerajinan'),
(23, 'Tidak membawa buku dan perlengkapan pelajaran/tidak mengerjakan tugas yang diberikan guru/meninggalkan buku di kelas/loker', 10, 'Kerajinan'),
(24, 'Tidak melaksanakan tugas piket kebersihan kelas ', 10, 'Kerajinan'),
(25, 'Tidak mengikuti kegiatan pramuka', 10, 'Kerajinan'),
(26, 'Tidak mengikuti ekskul bagi siswa kelas X, XI minimal satu kegiatan ', 5, 'Kerajinan'),
(27, 'Tidak mengikuti upacara bendera setiap hari Senin/upacara bendera hari-hari besar Nasional', 10, 'Kerajinan'),
(28, 'Tidak mengikuti kegiatan hari-hari besar keagamaan sesuai dengan agama yang dianutnya ', 10, 'Kerajinan'),
(29, 'Tidak mengikuti Tadarus/Kebaktian/ Literacy', 10, 'Kerajinan'),
(30, 'Terlambat mengikuti Tadarus/ Kebaktian/Literacy/ Upacara bendera hari senin/Upacara bendera hari-hari besar Nasional', 10, 'Kerajinan'),
(31, 'Tidak mengikuti sholat jumat disekolah bagi peserta didik putra muslim', 10, 'Kerajinan'),
(32, 'Berkata tidak jujur/Berbohong/Memfitnah ', 10, 'Kelakuan'),
(33, 'Mengganggu ketenangan Proses Belajar Mengajar', 5, 'Kelakuan'),
(34, 'Bekerjasama/mencontek/memberi contekan saat ulangan atau ujian', 15, 'Kelakuan'),
(35, 'Mengaktifkan hand phone, computer/laptop pada saat KBM dan Ulangan/Ujian kecuali diizinkan oleh guru', 5, 'Kelakuan'),
(36, 'Makan/Minum didalam Kelas', 5, 'Kelakuan'),
(37, 'Berada di Kantin bukan saat Istirahat (Kecuali Jam Olah Raga)', 5, 'Kelakuan'),
(38, 'Bermain Kartu Remi/Gaple/sejenisnya dilingkungan Sekolah', 10, 'Kelakuan'),
(39, 'Mengamen dilingkungan Sekolah', 5, 'Kelakuan'),
(40, 'Berjualan dilingkungan Sekolah', 5, 'Kelakuan'),
(41, 'Tidak tertib pada saat Upacara Bendera', 5, 'Kelakuan'),
(42, 'Bercanda berlebihan/Jahil dan berteriak-teriak dilingkungan sekolah', 5, 'Kelakuan'),
(43, 'Masih berada disekolah dan disekitar lingkungan sekolah pada pukul 17.30 keatas tanpa guru pendamping', 10, 'Kelakuan'),
(44, 'Membuang sampah, meludah, dan sejenisnya sembarangan ', 10, 'Kelakuan'),
(45, 'Menyimpan Sampah dikolong Meja/Laci', 5, 'Kelakuan'),
(46, 'Tidak mengembalikan alat Makan Kekantin', 5, 'Kelakuan'),
(47, 'Merusak tanaman hias dan pohon ', 10, 'Kelakuan'),
(48, 'Merusak atau mencoret-coret sarana dan prasarana sekolah ', 10, 'Kelakuan'),
(49, 'Merusak atau menghilangkan harta benda milik sekolah, guru, karyawan atau teman ', 10, 'Kelakuan'),
(50, 'Melompat pagar/Jendela sekolah ', 10, 'Kelakuan'),
(51, 'Melakukan Pemalakan/Meminta uang atau barang milik orang lain dengan paksa', 15, 'Kelakuan'),
(52, 'Memalsukan tanda tangan Orang tua, Guru, teman dll', 20, 'Kelakuan'),
(53, 'Merokok/membawa rokok di lingkungan sekolah ', 20, 'Kelakuan'),
(54, 'Mengeluarkan kata-kata kotor dan tidak sopan disekolah  dan di sekitar lingkungan sekolah', 5, 'Kelakuan'),
(55, 'Melakukan perbuatan tidak menyenangkan terhadap teman, guru, karyawan dan warga sekolah lainnya dalam bentuk apapun', 5, 'Kelakuan'),
(56, 'Tidak hormat/tidak sopan/tidak patuh terhadap guru dan karyawan ', 5, 'Kelakuan'),
(57, 'Pacaran melebihi batas norma atau etika ', 20, 'Kelakuan'),
(58, 'Membawa/mengedarkan (buku, majalah, gambar, film, media) porno milik sendiri atau orang lain ', 50, 'Kelakuan'),
(59, 'Mencuri/Mencoba Mencuri barang bukan miliknya ', 75, 'Kelakuan'),
(60, 'Melawan guru/karyawan dengan ucapan atau tulisan dengan kata-kata kasar/disertai ancaman secara langsung atau melalui media sosial ', 50, 'Kelakuan'),
(61, 'Terlibat dalam perkelahian antar pelajar/sekolah', 75, 'Kelakuan'),
(62, 'Membawa dan atau menggunakan narkoba, minuman keras dan zat adiktif ', 100, 'Kelakuan'),
(63, 'Membawa dan atau menggunakan senjata tajam/senjata api ', 100, 'Kelakuan'),
(64, 'Melakukan tindakan Amoral/Asusila di Sekolah ', 100, 'Kelakuan'),
(65, 'Melakukan Pencemaran nama baik sekolah melalui media cetak atau elektronik dan Media social lainnya', 75, 'Kelakuan'),
(66, 'Peringkat Kelas Paralel ke 1', -20, 'Prestasi Akademik'),
(67, 'Peringkat Kelas Paralel ke 2', -15, 'Prestasi Akademik'),
(68, 'Peringkat Kelas Paralel ke 3', -10, 'Prestasi Akademik'),
(69, 'Peringkat Kelas ke 1', -15, 'Prestasi Akademik'),
(70, 'Peringkat Kelas ke 2', -10, 'Prestasi Akademik'),
(71, 'Peringkat Kelas ke 3', -5, 'Prestasi Akademik'),
(72, 'Juara I Olimpiade tingkat Internasional', -50, 'Prestasi Akademik'),
(73, 'Juara II Olimpiade tingkat Internasional', -45, 'Prestasi Akademik'),
(74, 'Juara III Olimpiade tingkat Internasional', -40, 'Prestasi Akademik'),
(75, 'Juara I Olimpiade tingkat Nasional', -35, 'Prestasi Akademik'),
(76, 'Juara II Olimpiade tingkat Nasional', -30, 'Prestasi Akademik'),
(77, 'Juara III Olimpiade tingkat Nasional', -25, 'Prestasi Akademik'),
(78, 'Juara I Olimpiade tingkat Provinsi', -25, 'Prestasi Akademik'),
(79, 'Juara II Olimpiade tingkat Provinsi', -20, 'Prestasi Akademik'),
(80, 'Juara III Olimpiade tingkat Provinsi', -15, 'Prestasi Akademik'),
(81, 'Juara I Olimpiade tingkat Wilayah', -20, 'Prestasi Akademik'),
(82, 'Juara II Olimpiade tingkat Wilayah', -15, 'Prestasi Akademik'),
(83, 'Juara III Olimpiade tingkat Wilayah', -10, 'Prestasi Akademik'),
(84, 'Juara I Lomba Mata Pelajaran tingkat Provinsi', -20, 'Prestasi Akademik'),
(85, 'Juara II Lomba Mata Pelajaran tingkat Provinsi', -15, 'Prestasi Akademik'),
(86, 'Juara III Lomba Mata Pelajaran tingkat Provinsi', -10, 'Prestasi Akademik'),
(87, 'Juara I Lomba Mata Pelajaran tingkat Wilayah', -20, 'Prestasi Akademik'),
(88, 'Juara II Lomba Mata Pelajaran tingkat Wilayah', -15, 'Prestasi Akademik'),
(89, 'Juara III Lomba Mata Pelajaran tingkat Wilayah', -10, 'Prestasi Akademik'),
(90, 'Ketua OSIS/MPK', -20, 'Prestasi Non-Akademik'),
(91, 'BPH OSIS/MPK ', -15, 'Prestasi Non-Akademik'),
(92, 'Pengurus OSIS/MPK/Ekskul', -10, 'Prestasi Non-Akademik'),
(93, 'Ketua Panitia suatu Kegiatan di Sekolah', -10, 'Prestasi Non-Akademik'),
(94, 'Juara I Olah Raga/Seni/Loketa/Ketrampilan tingkat Internasional', -50, 'Prestasi Non-Akademik'),
(95, 'Juara II Olah Raga/Seni/Loketa/Ketrampilan tingkat Internasional', -45, 'Prestasi Non-Akademik'),
(96, 'Juara III Olah Raga/Seni/Loketa/Ketrampilan tingkat Internasional', -40, 'Prestasi Non-Akademik'),
(97, 'Juara I Olah Raga/Seni/Loketa/Ketrampilan tingkat Nasional', -35, 'Prestasi Non-Akademik'),
(98, 'Juara II Olah Raga/Seni/Loketa/Ketrampilan tingkat Nasional', -30, 'Prestasi Non-Akademik'),
(99, 'Juara III Olah Raga/Seni/Loketa/Ketrampilan tingkat Nasional', -25, 'Prestasi Non-Akademik'),
(100, 'Juara I Olah Raga/Seni/Loketa/Ketrampilan tingkat Provinsi', -25, 'Prestasi Non-Akademik'),
(101, 'Juara II Olah Raga/Seni/Loketa/Ketrampilan tingkat Provinsi', -20, 'Prestasi Non-Akademik'),
(102, 'Juara III Olah Raga/Seni/Loketa/Ketrampilan tingkat Provinsi', -15, 'Prestasi Non-Akademik'),
(103, 'Juara I Olah Raga/Seni/Loketa/Ketrampilan tingkat Wilayah', -20, 'Prestasi Non-Akademik'),
(104, 'Juara II Olah Raga/Seni/Loketa/Ketrampilan tingkat Wilayah', -15, 'Prestasi Non-Akademik'),
(105, 'Juara III Olah Raga/Seni/Loketa/Ketrampilan tingkat Wilayah', -10, 'Prestasi Non-Akademik'),
(106, 'Juara I Olah Raga/Seni/Loketa/Ketrampilan tingkat Sekolah', -10, 'Prestasi Non-Akademik'),
(107, 'Juara II Olah Raga/Seni/Loketa/Ketrampilan tingkat Sekolah', -7, 'Prestasi Non-Akademik'),
(108, 'Juara III Olah Raga/Seni/Loketa/Ketrampilan tingkat Sekolah ', -5, 'Prestasi Non-Akademik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `no_induk` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` varchar(5) NOT NULL,
  `kelas` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`no_induk`, `nama`, `pass`, `role`, `kelas`) VALUES
(10610943, 'Diane Chavez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(42170440, 'Kathy Jenkins', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(44935367, 'Christopher Gilbert', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA3'),
(48495186, 'John Lawson', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA4'),
(52311612, 'Paul Nichols', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS1'),
(54356379, 'Laura Martinez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(54413625, 'Jepi Usuluddin', '21232f297a57a5a743894a0e4a801fc3', 'bk', NULL),
(55632218, 'Ronald Reid', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS4'),
(56121690, 'Alan Hunt', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS2'),
(59141399, 'Kimberly Harris', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA1'),
(61220518, 'Keith Watkins', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS3'),
(62268316, 'Gerald Washington', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS3'),
(65698052, 'Robert Kelley', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA3'),
(68484863, 'Judy Burton', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(68513247, 'Matthew Mitchell', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS1'),
(68659735, 'Christina Hernandez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS4'),
(69809175, 'Russell Hansen', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA4'),
(71625815, 'Diana Dixon', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA2'),
(72614469, 'Barbara Cruz', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(73241939, 'Kimberly Wallace', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA3'),
(73528138, 'Jesse Vasquez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA3'),
(74465585, 'Betty Powell', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS4'),
(79565594, 'Jimmy Reid', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(80085402, 'Jimmy Thompson', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA1'),
(80559189, 'Cheryl Murphy', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA1'),
(81014526, 'Justin Henderson', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA1'),
(81368933, 'Pamela Grant', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA3'),
(81714975, 'Brandon Matthews', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS4'),
(82099944, 'Anne Nichols', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(82727524, 'Lillian Garrett', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA4'),
(83010070, 'Jose Myers', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS2'),
(83142738, 'Kathy Burke', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(83271545, 'Arthur Bennett', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA4'),
(84037967, 'Walter George', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA4'),
(84317525, 'Doris Diaz', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(84586944, 'Carlos Graham', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(85206405, 'Lori Rice', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA3'),
(85212698, 'Brenda Owens', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(85996954, 'Stephanie Lynch', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(86183237, 'Nicole Armstrong', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(86301378, 'Denise Gardner', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS3'),
(86333248, 'Melissa Fowler', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS1'),
(87251659, 'Martha Morrison', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS3'),
(87924118, 'Jerry Lewis', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA1'),
(88218012, 'Philip Berry', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS1'),
(88514772, 'Doris West', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA1'),
(88516640, 'Ashley King', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA2'),
(88538835, 'Jonathan Grant', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS2'),
(88746168, 'Jennifer George', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS2'),
(88954630, 'Craig Moreno', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS3'),
(89635446, 'Andrew Flores', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA2'),
(90236755, 'Stephen Fox', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA2'),
(90281148, 'Andrea Ferguson', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS1'),
(90636094, 'Juan Ryan', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS1'),
(90804197, 'Joshua Lane', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS4'),
(90943290, 'Thomas Martinez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS4'),
(91114557, 'Carl Grant', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS2'),
(91225730, 'Martha Moore', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS4'),
(91560616, 'Samuel Chavez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(91659629, 'Doris Oliver', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS2'),
(91719667, 'Alice Hernandez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(92186366, 'Andrew Brooks', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA1'),
(92254288, 'Andrea Collins', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA3'),
(92408249, 'Ruby Mendoza', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS1'),
(92672904, 'Tammy Lawrence', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(92701882, 'Jennifer Chavez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA4'),
(93069708, 'Ann Williamson', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA1'),
(93361669, 'Carolyn Perez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS2'),
(93895952, 'Samuel Hansen', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA1'),
(93896676, 'Todd George', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA3'),
(93956458, 'Heather Henry', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS4'),
(94011289, 'Edward Medina', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS3'),
(94846861, 'Victor Hawkins', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA3'),
(95043695, 'John Butler', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA1'),
(95450166, 'Alan Wells', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA1'),
(95537823, 'Christina Anderson', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA2'),
(95636509, 'Steve Bennett', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(95976478, 'Lawrence Ray', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA2'),
(96139496, 'Kevin Larson', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(96750473, 'Stephanie Cruz', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS2'),
(96770483, 'Alan Mccoy', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA2'),
(96865979, 'Louise Brooks', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA1'),
(96929724, 'Laura Lee', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS4'),
(96968960, 'Andrew Ramirez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS4'),
(97040572, 'Kenneth Adams', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA4'),
(97140125, 'Cynthia Martin', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA3'),
(97503538, 'Eugene Richards', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS3'),
(97739451, 'Beverly Vasquez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS4'),
(97757785, 'Antonio Wells', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA3'),
(97825960, 'Howard Butler', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPA2'),
(97891594, 'Willie Wood', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS3'),
(97904496, 'Evelyn Black', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA4'),
(98017035, 'Scott Burns', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPS4'),
(98441496, 'Doris Brown', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS3'),
(98539199, 'Ruby Turner', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '10IPS4'),
(98928787, 'Ruth Bailey', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA2'),
(99159573, 'Tina Dean', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA3'),
(99240522, 'Christina Fernandez', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS4'),
(99434487, 'John Cruz', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPA4'),
(99483394, 'Roy Mills', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '11IPS1'),
(99928991, 'Johnny Jacobs', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '12IPA2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksi`
--
ALTER TABLE `aksi`
 ADD PRIMARY KEY (`no_aksi`);

--
-- Indexes for table `hukuman`
--
ALTER TABLE `hukuman`
 ADD PRIMARY KEY (`no_hukuman`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
 ADD PRIMARY KEY (`no_point`);

--
-- Indexes for table `tatatertib`
--
ALTER TABLE `tatatertib`
 ADD PRIMARY KEY (`no_tb`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`no_induk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aksi`
--
ALTER TABLE `aksi`
MODIFY `no_aksi` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hukuman`
--
ALTER TABLE `hukuman`
MODIFY `no_hukuman` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
MODIFY `no_point` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tatatertib`
--
ALTER TABLE `tatatertib`
MODIFY `no_tb` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
