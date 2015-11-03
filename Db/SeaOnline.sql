-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for seaonline
CREATE DATABASE IF NOT EXISTS `seaonline` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `seaonline`;


-- Dumping structure for table seaonline.rel_bukukategori
CREATE TABLE IF NOT EXISTS `rel_bukukategori` (
  `idbuku` int(5) DEFAULT NULL,
  `idkategori` int(5) DEFAULT NULL,
  KEY `FK_rel_kategoribuku_tbl_buku` (`idbuku`),
  KEY `FK_rel_kategoribuku_tbl_kategori` (`idkategori`),
  CONSTRAINT `FK_rel_kategoribuku_tbl_buku` FOREIGN KEY (`idbuku`) REFERENCES `tbl_buku` (`idbuku`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_rel_kategoribuku_tbl_kategori` FOREIGN KEY (`idkategori`) REFERENCES `tbl_kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.rel_bukukategori: ~6 rows (approximately)
/*!40000 ALTER TABLE `rel_bukukategori` DISABLE KEYS */;
REPLACE INTO `rel_bukukategori` (`idbuku`, `idkategori`) VALUES
	(6, 3),
	(5, 2),
	(4, 2),
	(3, 2),
	(7, 2),
	(7, 3);
/*!40000 ALTER TABLE `rel_bukukategori` ENABLE KEYS */;


-- Dumping structure for table seaonline.rel_bukupenulis
CREATE TABLE IF NOT EXISTS `rel_bukupenulis` (
  `idbuku` int(11) DEFAULT NULL,
  `idpenulis` int(11) DEFAULT NULL,
  UNIQUE KEY `idpenulis_idbuku` (`idpenulis`,`idbuku`),
  KEY `idpenulis` (`idpenulis`),
  KEY `idbuku` (`idbuku`),
  CONSTRAINT `FK__tbl_buku` FOREIGN KEY (`idbuku`) REFERENCES `tbl_buku` (`idbuku`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__tbl_penulis` FOREIGN KEY (`idpenulis`) REFERENCES `tbl_penulis` (`idpenulis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.rel_bukupenulis: ~6 rows (approximately)
/*!40000 ALTER TABLE `rel_bukupenulis` DISABLE KEYS */;
REPLACE INTO `rel_bukupenulis` (`idbuku`, `idpenulis`) VALUES
	(4, 1),
	(7, 1),
	(5, 2),
	(3, 3),
	(6, 3),
	(7, 3);
/*!40000 ALTER TABLE `rel_bukupenulis` ENABLE KEYS */;


-- Dumping structure for table seaonline.rel_peminjamanbuku
CREATE TABLE IF NOT EXISTS `rel_peminjamanbuku` (
  `idpeminjaman` int(11) DEFAULT NULL,
  `idbuku` int(11) DEFAULT NULL,
  KEY `FK_rel_peminjamanbuku_tbl_buku` (`idbuku`),
  KEY `FK_rel_peminjamanbuku_tbl_peminjaman` (`idpeminjaman`),
  CONSTRAINT `FK_rel_peminjamanbuku_tbl_buku` FOREIGN KEY (`idbuku`) REFERENCES `tbl_buku` (`idbuku`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_rel_peminjamanbuku_tbl_peminjaman` FOREIGN KEY (`idpeminjaman`) REFERENCES `tbl_peminjaman` (`idpeminjam`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.rel_peminjamanbuku: ~2 rows (approximately)
/*!40000 ALTER TABLE `rel_peminjamanbuku` DISABLE KEYS */;
REPLACE INTO `rel_peminjamanbuku` (`idpeminjaman`, `idbuku`) VALUES
	(3, 5),
	(4, 3),
	(5, 4);
/*!40000 ALTER TABLE `rel_peminjamanbuku` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_berita
CREATE TABLE IF NOT EXISTS `tbl_berita` (
  `idberita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `berita` text,
  `images` varchar(50) DEFAULT 'noimage.png',
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`idberita`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_berita: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_berita` DISABLE KEYS */;
REPLACE INTO `tbl_berita` (`idberita`, `judul`, `berita`, `images`, `tanggal`) VALUES
	(1, 'SEAMEO-Wide Participation', ' <p>Greetings from the SEAMEO Secretariat and the SEAMEO Regional Centre for Archaeology and Fine Arts (SEAMEO SPAFA). As announced during the SEAMEO Centre Directors\' Meeting 2014 and 2015, SEAMEO SPAFA and SEAMEO Secretariat are jointly organizing "SEAMEO Cultural Week 2015", as part of the Golden SEAMEO 50th Anniversary Celebrations. With the kind support of SEAMOLEC, this programme, adopted as a SEAMEO-wide initiative within the framework of the SEAMEO Strategic Plan, will result in the creation of an online platform of video documentation, knowledge-sharing and comment-exchange on intangible cultural heritage practices from across the Southeast Asian region, to be published on youtube.com. </p><p><br></p><p>The project\'s objectives are to: </p><p>1. Enhance the understanding of Southeast Asia\'s cultural diversity and traditions; </p><p>2. Strengthen collaborations between schools, education ministries, and SEAMEO centres across the region in promoting interactive platforms for the youths of Southeast Asia to appreciate the region\'s cultures;</p><p>3. Create an interactive media platform for the youths of Southeast Asia to exchange knowledge and information on each other\'s respective cultures; and4. Engage schools in the development of video documentation on their respective cultural heritage, which can be utilized as resource materials in the future.</p><p><br></p><p>Through an open call for submissions sent via SEAMEO Centres and the Ministries/Department of Education of SEAMEO member countries, schools across Southeast Asia are invited to submit videos that show local forms of intangible cultural heritage, such as:</p><p><br></p><p>1. a traditional dance performance,</p><p>2. a traditional song performance,</p><p>3. traditional craft-making,</p><p>4. cooking a traditional dish,</p><p>5. story-telling through art, or</p><p>6. playing a traditional game.</p><p><br></p><p>In this regard, SEAMEO Secretariat and SEAMEO SPAFA would like to ask for your Centre\'s kind cooperation in disseminating the information related to the call for video entries across your Centre\'s network.</p><p><br></p><p>In addition, in order to ensure multi-country participation in this project and to promote inter-centre collaboration, the latter having been highlighted during the 2015 HOM and CDM meetings, we would like to hereby invite your Centre to collect videos from at least two local schools within its network.</p><p><br></p><p>Videos submitted will be published on SEAMEO SPAFA\'s Youtube Channel, which already benefits from a strong viewership worldwide. Upon publication, SEAMEO SPAFA and SEAMEO Secretariat will initiate and moderate discussions by posting \'mini-essay\' questions on selected videos through Youtube\'s comments platform in order to engage viewers (Southeast Asian youths) to participate in a dialogue on cultural heritage.</p><p><br></p><p>Through the exchange of video documentation on Southeast Asia\'s diverse and shared forms of cultural heritage and the creation of a platform for discussion, this project aims to promote sustainable development in the region and to enhance mutual respect among communities, groups and individuals. The knowledge of each other\'s intangible cultural heritage is key to embracing shared cultural expressions and cultural diversity, and to developing mutual appreciation and respect.</p><p><br></p><p>Ten (10) awards of $200 each will be disbursed to the schools of the students who post winning answers/comments to the various \'mini-essay\' questions. Each winning school will also obtain a "Winning Certificate". In addition, all participating schools will receive a "Certificate of Participation".</p><p><br></p><p>Kindly confirm your Centre\'s participation by:</p><p><br></p><p>1. Submitting the name of a focal contact assigned to this project within your Centre to spafa@seameo-spafa.org by 20 July 2015.</p><p>2. Completing the attached "Video Entry Form" (minimum 2 entries per Centre), using one form for each school that your Centre plans to assign to this programme, and returning it via e-mail to spafa@seameo-spafa.org by 31 August 2015.</p><p><br></p><p>For further information, kindly refer to the attached documents (Programme Information Note and Project Guidelines) and announcement poster, or please contact Mr. John Paul Itao, Communications Officer, via e-mail at john@seameo-spafa.org.</p> ', 'culturalweekbanner1.jpg', '2015-09-16'),
	(2, '10th Regional Congress-Search', ' <p>10th Regional Congress-Search for SEAMEO Young Scientist (SSYS 2016) will be held from 7 - 11 March 2016 at SEAMEO RECSAM, Penang, Malaysia.</p><p><br></p><p>Please visit the official Congress\'s website at: http://www.recsam.edu.my/ssys/ </p><p><br></p><p>For more information related to this event, please contact the Congress Secretariat at: +604 6522700 / +604 6522707 or e-mail: lcwong@recsam.edu.my</p> ', 'ssys2016_web_banner.jpg', '2015-09-16'),
	(3, '6th International Conference', '<p>We are pleased to invite you to participate in this sixth biennial international conference to be held in SEAMEO RECSAM, Penang, Malaysia. The organising of such a conference brings many benefits such as providing more opportunities for science and mathematics educators in the region to disseminate their research findings. The conference also contributes significantly towards improving the standard of science and mathematics education. The first CoSMEd was initiated in 2005 and four more conferences in the CoSMEd series have been successfully held in 2007, 2009, 2011 and 2013. </p><p><br></p><p>The 21st century educators are confronted with the difficult task of educating young minds to meet the demands of an increasingly globalised world. Many countries face the challenge of preparing citizens who will be able to address and solve local, national and global problems in order to function equally well in these environments. The issues on today\'s environmental problem are not local but on global scale which affect everyone no matter which race, age, gender or religion we are in. Therefore, not only the environmentalists are responsible for sustaining the environment, but to protect the environment for sustainable living is also everyone\'s duty. In this regard, knowledge of science and mathematics is essential as it empowers people to systematically use the knowledge more effectively to solve problems. In addition, there is however a need to educate the young to acquire as well as to apply the knowledge and skills embodied in science and mathematics, at the same time take the advantages of the knowledge of technologies and engineering that would enable them to create innovative and creative ideas. This conference will bring educators and researchers together to discuss and address issues from their research that could be used inform the pedagogy and policy in education for the purpose to enhance Science and Mathematics Education.</p><p><br></p><p>For more details please visit : http://www.recsam.edu.my/cosmed2015/index.html </p><p><br></p><p>For enquiries related to this event, please e-mail the Conference Secretariat at: </p><p>cosmed@recsam.edu.my / cosmedRecsam@gmail.com</p>', 'cosmed.jpg', '2015-09-16');
/*!40000 ALTER TABLE `tbl_berita` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_buku
CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `idbuku` int(10) NOT NULL AUTO_INCREMENT,
  `kodebuku` varchar(9) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `sinopsis` text,
  `cover` varchar(50) DEFAULT 'noimage.png',
  `idpenerbit` int(10) DEFAULT NULL,
  `idrakbuku` int(10) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `jumlahbuku` varchar(50) DEFAULT NULL,
  `bukuhilang` varchar(50) DEFAULT '0',
  `bukurusak` varchar(50) DEFAULT '0',
  `isbn` varchar(50) DEFAULT NULL,
  `hargabuku` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idbuku`),
  KEY `idpenerbit` (`idpenerbit`),
  KEY `FK_tbl_buku_tbl_rakbuku` (`idrakbuku`),
  CONSTRAINT `FK_tbl_buku_tbl_penerbit` FOREIGN KEY (`idpenerbit`) REFERENCES `tbl_penerbit` (`idpenerbit`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_buku_tbl_rakbuku` FOREIGN KEY (`idrakbuku`) REFERENCES `tbl_rakbuku` (`idrak`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_buku: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_buku` DISABLE KEYS */;
REPLACE INTO `tbl_buku` (`idbuku`, `kodebuku`, `judul`, `sinopsis`, `cover`, `idpenerbit`, `idrakbuku`, `tahun_terbit`, `jumlahbuku`, `bukuhilang`, `bukurusak`, `isbn`, `hargabuku`) VALUES
	(3, 'SEA00003', 'Kupas Editing Video dengan Premiere', '<p>buku yang sangat baik untuk editing video dengan adobe premiere pro cs 6&nbsp;project management. and  much more. It?s your perfect. focused guide for becoming quickly  productive with Civil 3D.Understand Civil 3D?s interface. core features.  and key capabilitiesDraw fences. walls. and property lines with the  Lines/Curves menuDynamically label components. maintain geomet&nbsp;</p>', 'premi.jpg', 4, 3, '2014', '12', '0', '0', '123123', 'Rp. 60.000'),
	(4, 'SEA00004', 'Belajar Mudah dan cepat Microsoft Excel', '<p>belajar microsoft excel yang sangat bagus&nbsp;project management. and  much more. It?s your perfect. focused guide for becoming quickly  productive with Civil 3D.Understand Civil 3D?s interface. core features.  and key capabilitiesDraw fences. walls. and property lines with the  Lines/Curves menuDynamically label components. maintain geomet&nbsp;</p>', 'excel.jpg', 2, 3, '2013', '12', '0', '0', '1231231', 'Rp. 60.000'),
	(5, 'SEA00005', 'Cara Cepat Belajar Java SE', '<p>The book begins with an  overview of the Civil 3D interface and all its core tools. styles. and  key concepts. From there. it offers detailed discussions and practical  tutorials on lines and arcs. points. surveying. parcels. surfaces.  alignments. corridors.</p>', 'javase7.jpg', 3, 3, '2014', '4', '0', '0', '1232131', 'Rp. 50.000'),
	(6, 'SEA00006', ' Introducing Autocad Civil 3D', '<p>Dig Into the future of  Civil EngineeringThis hands-on reference and tutorial from two Civil 3D  and engineering experts is your gateway to immediate productivity with  the leading civil engineering software. The authors? in-depth  explanations will have you quickly up to speed on the basics. give you a  thorough grounding in the fundamentals of building. and show you how to  best use the software in professional. real-world environments.The book  begins with an overview of the Civil 3D interface and all its core  tools. styles. and key concepts. From there. it offers detailed  discussions and practical tutorials on lines and arcs. points.  surveying. parcels. surfaces. alignments. corridors. grading. pipes.  project management. and much more. It?s your perfect. focused guide for  becoming quickly productive with Civil 3D.Understand Civil 3D?s  interface. core features. and key capabilitiesDraw fences. walls. and  property lines with the Lines/Curves menuDynamically label components.  maintain geomet&nbsp;</p>', '200074723_xl.jpg', 4, 4, '2009', '5', '0', '0', '012327', 'Rp. 404.000'),
	(7, 'SEA00007', 'Buku Pemrograman Java', '<p>Buuku jawa</p>', 'premi.jpg', 3, 4, '2014', '9', '0', '0', '012832938', 'Rp. 90.000');
/*!40000 ALTER TABLE `tbl_buku` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_kategori
CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `idsubkategori` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_kategori: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
REPLACE INTO `tbl_kategori` (`idkategori`, `idsubkategori`, `nama`) VALUES
	(1, 0, 'Computer'),
	(2, 1, 'Pemrograman'),
	(3, 1, 'Desain');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_peminjaman
CREATE TABLE IF NOT EXISTS `tbl_peminjaman` (
  `idpeminjam` int(5) NOT NULL AUTO_INCREMENT,
  `idusers` int(5) DEFAULT NULL,
  `tglpinjam` date DEFAULT NULL,
  `tglharuskmbl` date DEFAULT NULL,
  `tglkembali` date DEFAULT NULL,
  `denda` varchar(50) DEFAULT '0',
  `status` enum('0','1') DEFAULT '0' COMMENT '0 = masih di pinjam , 1 = sudah dikembalikan',
  PRIMARY KEY (`idpeminjam`),
  KEY `FK_tbl_peminjaman_tbl_users` (`idusers`),
  CONSTRAINT `FK_tbl_peminjaman_tbl_users` FOREIGN KEY (`idusers`) REFERENCES `tbl_users` (`idusers`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_peminjaman: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_peminjaman` DISABLE KEYS */;
REPLACE INTO `tbl_peminjaman` (`idpeminjam`, `idusers`, `tglpinjam`, `tglharuskmbl`, `tglkembali`, `denda`, `status`) VALUES
	(1, 2, '2015-08-10', '2015-08-11', NULL, '0', '1'),
	(2, 2, '2015-08-10', '2015-08-11', NULL, '0', '0'),
	(3, 4, '2015-09-02', '2015-09-13', '2015-09-26', '0', '0'),
	(4, 2, '2015-09-15', '2015-09-23', NULL, '0', '0'),
	(5, 4, '2015-09-14', '2015-09-23', NULL, '0', '1');
/*!40000 ALTER TABLE `tbl_peminjaman` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_penerbit
CREATE TABLE IF NOT EXISTS `tbl_penerbit` (
  `idpenerbit` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpenerbit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_penerbit: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_penerbit` DISABLE KEYS */;
REPLACE INTO `tbl_penerbit` (`idpenerbit`, `nama`) VALUES
	(1, 'Gramedia'),
	(2, 'Balai Pustaka'),
	(3, 'PT Pustaka Rizki'),
	(4, 'PT. Elex Media Komputindo');
/*!40000 ALTER TABLE `tbl_penerbit` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_penulis
CREATE TABLE IF NOT EXISTS `tbl_penulis` (
  `idpenulis` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nama_lain` varchar(50) DEFAULT NULL,
  `biografi` text,
  `images` varchar(50) DEFAULT 'noimage.png',
  PRIMARY KEY (`idpenulis`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_penulis: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_penulis` DISABLE KEYS */;
REPLACE INTO `tbl_penulis` (`idpenulis`, `nama`, `nama_lain`, `biografi`, `images`) VALUES
	(1, 'christiawan eko', 'factor', '<p>christiawan eko saputro tampan</p>', 'IMG_20140729_163740.jpg'),
	(2, 'bagus w', 'bagus', '<p>seorang penulis buku&nbsp;</p>', 'bagus w.jpg'),
	(3, 'Eko Pratomo', 'Eko', '<p>seorang penulis buku profesional</p>', 'Eko_P_Pratomo.jpg'),
	(4, 'Muhammad Noer', 'Noer', '<p>penulis buku secara profesional dan pembicara teknopreneur</p>', 'muhammadnoer.png');
/*!40000 ALTER TABLE `tbl_penulis` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_rakbuku
CREATE TABLE IF NOT EXISTS `tbl_rakbuku` (
  `idrak` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idrak`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_rakbuku: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_rakbuku` DISABLE KEYS */;
REPLACE INTO `tbl_rakbuku` (`idrak`, `nama`) VALUES
	(3, 'Rak Pengetahuan Sosial'),
	(4, 'Rak Sosial');
/*!40000 ALTER TABLE `tbl_rakbuku` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `idusers` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Perempuan') NOT NULL DEFAULT 'Pria',
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `images` varchar(50) DEFAULT 'noimage.png',
  `actived` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = belum aktif , 1 = aktif',
  `status` enum('1','2','3') DEFAULT '1' COMMENT '1 = users , 2 = petugas , 3 = admin',
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
REPLACE INTO `tbl_users` (`idusers`, `username`, `password`, `email`, `nama`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `no_telp`, `images`, `actived`, `status`) VALUES
	(2, 'factorchrist', '39cded47e3af44173371ea90299b7d29', 'factorchrist@yahoo.com', 'factorchrist awan', 'factorchristf actorch ristfactor christfactorchris', 'Pria', '0000-00-00', '123213', 'IMG_20140729_163740.jpg', '1', '1'),
	(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin', 'Pria', '2015-08-13', NULL, 'noimage.png', '1', '3'),
	(4, 'saputro', '7a26d65996e6ad34e42335bbc2396143', 'christiawaneko@gmail.com', 'christiawan eko saputro', 'surakarta', 'Pria', NULL, '0856721322', 'noimage.png', '0', '1');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;


-- Dumping structure for table seaonline.tbl_usulanbuku
CREATE TABLE IF NOT EXISTS `tbl_usulanbuku` (
  `idusulan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `judulbuku` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahunterbit` varchar(50) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `tanggalusulan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusulan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table seaonline.tbl_usulanbuku: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_usulanbuku` DISABLE KEYS */;
REPLACE INTO `tbl_usulanbuku` (`idusulan`, `nama`, `email`, `judulbuku`, `pengarang`, `penerbit`, `tahunterbit`, `harga`, `keterangan`, `tanggalusulan`) VALUES
	(1, 'Amanda Margareta', 'amanda@gmail.com', 'Presentasi Memukau', 'Muhammad Noer', 'PT. Elex Media Komputindo', '2012', '50000', 'buku ini sangat berguna untuk mahasiswa dalam mempresentasikan suatu product', '2015-09-16 17:40:55');
/*!40000 ALTER TABLE `tbl_usulanbuku` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
