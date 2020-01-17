-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 03:32 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasalancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kontak` int(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `j_kelamin` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `id_user`, `kontak`, `alamat`, `j_kelamin`, `tgl_lahir`, `foto`) VALUES
(1, 10, 896393432, 'adadjakdjakdkajdkajdkajkdjakdjad', 'laki', '2019-10-10', 'sdsdsdsd.png'),
(2, 16, 8962323, 'sdsdsdsdasfaf dadaadasdsadxasdsa', 'perempuan', '2019-10-09', 'k.png');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_jasa` varchar(200) NOT NULL,
  `harga` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id`, `id_user`, `id_skill`, `id_kota`, `email`, `judul`, `deskripsi`, `foto_jasa`, `harga`) VALUES
(4, 30, 1, 2, 'wahid@gmail.com', 'Aku dapat membuat modern logo spesial', 'Modern logo spesial yang dibuat dengan sentuhan alami dibalut dengan antusias yang tinggi', '9291378efd863bb789f5d9cd1b5898e4.jpg', 50000),
(5, 30, 2, 2, 'wahid@gmail.com', 'aku dapat membuat produk mockupmu agar lebih berarti', 'aku membuat desain mockup professional dari awal tanpa memakai template', '6d28de55417a44e9bf2a446c99b62ad9_(1).jpg', 300000),
(6, 30, 3, 2, 'wahid@gmail.com', 'Membuat desain sosial media menjadi lebih antik', 'Membuat desain sosial media professional dari awal tanpa memakai template', '393fb5e0c6c280dbd51d35b60a17d5c0.jpg', 50000),
(7, 30, 4, 2, 'wahid@gmail.com', 'Aku dapat membuat banner makanan ', 'Membuat desain banner makanan professional dari awal tanpa memakai template', '429d34c71fa7ec0841f67eeb3445e405_(1)1.jpg', 200000),
(8, 33, 5, 4, 'wahidalwahdi@gmail.com', 'Aku dapat membuat website professional menggunakan wordpress', 'Membuat website professional tanpa kedip', 'b000a7e84df023b1736c457fdbb32290_(1).jpg', 5000000),
(9, 33, 6, 4, 'wahidalwahdi@gmail.com', 'Membuat alikasi mobile restoran dengan react native', 'Aku dapat membuat alikasi mobile restoran dengan react native tanpa ketik pakai keyboard', '5756a3c6c4eabce8889123951d17cd6daaaaaa.jpg', 20000000),
(10, 33, 7, 4, 'wahidalwahdi@gmail.com', 'Aku dapat tracing photoshop menjadi HTML', 'Tracing photoshop menjadi HTML adalah keahlianku, selain tracing, aku dapat cutting, sprading, serta bargaining', '3bf4214653d43487fafeeffbcfd07ccf_(1).jpg', 1999999),
(11, 33, 1, 4, 'wahidalwahdi@gmail.com', 'aku dapat membuat landing page super professional', 'aku dapat membuat landing page super professional dengan metode C&V yaitu memanfaatkan AI pada google untuk Copy dan Vaste', 'efb7e5c8420d959c1d92cd8a6e3257ae_(1).jpg', 3000000),
(13, 33, 2, 4, 'wahidalwahdi@gmail.com', 'Jasa Back-end menggunakan Laravel', 'Aku dapat menyelesaikan projek ini sebrlum anda haisa membaca deskripsi ini :*', '8e20d9080f5f18541d932bc881ae0aca_(1).jpg', 2000000),
(17, 30, 1, 2, 'wahid@gmail.com', 'Aku membuat logo untuk perusahaan makanan', 'Membuat desain logo makanan professional dari awal tanpa memakai templates serta uji kasus untuk brand guide', 'p18fdmlcc91mseii8q0g1rjs1cne5-details.jpg', 100000),
(20, 0, 0, 0, '', 'sfsfsfsf', 'sfsfsfsf', '', 23232);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `n_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `n_kategori`) VALUES
(1, 'Website Dan Pengembangan'),
(2, 'Penjualan Dan Pemasaran Online'),
(3, 'Penulisan'),
(4, 'Musik Dan Audio'),
(5, 'Desain Dan Multimedia'),
(6, 'Pengembangan Aplikasi Mobile'),
(7, 'Administrasi Dan Support'),
(8, 'Gaya Hidup Dan Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(5) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`) VALUES
(1, 'CILEGON'),
(2, 'LEBAK'),
(3, 'PANDEGLANG'),
(4, 'SERANG'),
(5, 'TANGERANG'),
(6, 'TANGERANG SELATAN'),
(7, 'JAKARTA BARAT'),
(8, 'JAKARTA PUSAT'),
(9, 'JAKARTA SELATAN'),
(10, 'JAKARTA TIMUR'),
(11, 'JAKARTA UTARA'),
(12, 'KEPULAUAN SERIBU'),
(13, 'BANDUNG'),
(14, 'BANDUNG BARAT'),
(15, 'BANJAR'),
(16, 'BEKASI'),
(17, 'BOGOR'),
(18, 'CIAMIS'),
(19, 'CIANJUR'),
(20, 'CIMAHI'),
(21, 'CIREBON'),
(22, 'DEPOK'),
(23, 'GARUT'),
(24, 'INDRAMAYU'),
(25, 'KARAWANG'),
(26, 'KUNINGAN'),
(27, 'MAJALENGKA'),
(28, 'PANGANDARAN'),
(29, 'PURWAKARTA'),
(30, 'SUBANG'),
(31, 'SUKABUMI'),
(32, 'SUMEDANG'),
(33, 'TASIKMALAYA'),
(34, 'BANJARNEGARA'),
(35, 'BANYUMAS'),
(36, 'BATANG'),
(37, 'BLORA'),
(38, 'BOYOLALI'),
(39, 'BREBES'),
(40, 'CILACAP'),
(41, 'DEMAK'),
(42, 'GROBOGAN'),
(43, 'JEPARA'),
(44, 'KARANGANYAR'),
(45, 'KEBUMEN'),
(46, 'KENDAL'),
(47, 'KLATEN'),
(48, 'KUDUS'),
(49, 'MAGELANG'),
(50, 'PATI'),
(51, 'PEKALONGAN'),
(52, 'PEMALANG'),
(53, 'PURBALINGGA'),
(54, 'PURWOREJO'),
(55, 'REMBANG'),
(56, 'SALATIGA'),
(57, 'SEMARANG'),
(58, 'SRAGEN'),
(59, 'SUKOHARJO'),
(60, 'SURAKARTA (SOLO)'),
(61, 'TEGAL'),
(62, 'TEMANGGUNG'),
(63, 'WONOGIRI'),
(64, 'WONOSOBO'),
(65, 'BANTUL'),
(66, 'GUNUNG KIDUL'),
(67, 'KULON PROGO'),
(68, 'SLEMAN'),
(69, 'YOGYAKARTA'),
(70, 'BANGKALAN'),
(71, 'BANYUWANGI'),
(72, 'BATU'),
(73, 'BLITAR'),
(74, 'BOJONEGORO'),
(75, 'BONDOWOSO'),
(76, 'GRESIK'),
(77, 'JEMBER'),
(78, 'JOMBANG'),
(79, 'KEDIRI'),
(80, 'LAMONGAN'),
(81, 'LUMAJANG'),
(82, 'MADIUN'),
(83, 'MAGETAN'),
(84, 'MALANG'),
(85, 'MOJOKERTO'),
(86, 'NGANJUK'),
(87, 'NGAWI'),
(88, 'PACITAN'),
(89, 'PAMEKASAN'),
(90, 'PASURUAN'),
(91, 'PONOROGO'),
(92, 'PROBOLINGGO'),
(93, 'SAMPANG'),
(94, 'SIDOARJO'),
(95, 'SITUBONDO'),
(96, 'SUMENEP'),
(97, 'SURABAYA'),
(98, 'TRENGGALEK'),
(99, 'TUBAN'),
(100, 'TULUNGAGUNG'),
(101, 'BADUNG'),
(102, 'BANGLI'),
(103, 'BULELENG'),
(104, 'DENPASAR'),
(105, 'GIANYAR'),
(106, 'JEMBRANA'),
(107, 'KARANGASEM'),
(108, 'KLUNGKUNG'),
(109, 'TABANAN'),
(110, 'ACEH BARAT'),
(111, 'ACEH BARAT DAYA'),
(112, 'ACEH BESAR'),
(113, 'ACEH JAYA'),
(114, 'ACEH SELATAN'),
(115, 'ACEH SINGKIL'),
(116, 'ACEH TAMIANG'),
(117, 'ACEH TENGAH'),
(118, 'ACEH TENGGARA'),
(119, 'ACEH TIMUR'),
(120, 'ACEH UTARA'),
(121, 'BANDA ACEH'),
(122, 'BENER MERIAH'),
(123, 'BIREUEN'),
(124, 'GAYO LUES'),
(125, 'LANGSA'),
(126, 'LHOKSEUMAWE'),
(127, 'NAGAN RAYA'),
(128, 'PIDIE'),
(129, 'PIDIE JAYA'),
(130, 'SABANG'),
(131, 'SIMEULUE'),
(132, 'SUBULUSSALAM'),
(133, 'ASAHAN'),
(134, 'BATU BARA'),
(135, 'BINJAI'),
(136, 'DAIRI'),
(137, 'DELI SERDANG'),
(138, 'GUNUNGSITOLI'),
(139, 'HUMBANG HASUNDUTAN'),
(140, 'KARO'),
(141, 'LABUHAN BATU'),
(142, 'LABUHAN BATU SELATAN'),
(143, 'LABUHAN BATU UTARA'),
(144, 'LANGKAT'),
(145, 'MANDAILING NATAL'),
(146, 'MEDAN'),
(147, 'NIAS'),
(148, 'NIAS BARAT'),
(149, 'NIAS SELATAN'),
(150, 'NIAS UTARA'),
(151, 'PADANG LAWAS'),
(152, 'PADANG LAWAS UTARA'),
(153, 'PADANG SIDEMPUAN'),
(154, 'PAKPAK BHARAT'),
(155, 'PEMATANG SIANTAR'),
(156, 'SAMOSIR'),
(157, 'SERDANG BEDAGAI'),
(158, 'SIBOLGA'),
(159, 'SIMALUNGUN'),
(160, 'TANJUNG BALAI'),
(161, 'TAPANULI SELATAN'),
(162, 'TAPANULI TENGAH'),
(163, 'TAPANULI UTARA'),
(164, 'TEBING TINGGI'),
(165, 'TOBA SAMOSIR'),
(166, 'AGAM'),
(167, 'BUKITTINGGI'),
(168, 'DHARMASRAYA'),
(169, 'KEPULAUAN MENTAWAI'),
(170, 'LIMA PULUH KOTO/KOTA'),
(171, 'PADANG'),
(172, 'PADANG PANJANG'),
(173, 'PADANG PARIAMAN'),
(174, 'PARIAMAN'),
(175, 'PASAMAN'),
(176, 'PASAMAN BARAT'),
(177, 'PAYAKUMBUH'),
(178, 'PESISIR SELATAN'),
(179, 'SAWAH LUNTO'),
(180, 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)'),
(181, 'SOLOK'),
(182, 'SOLOK SELATAN'),
(183, 'TANAH DATAR'),
(184, 'BENGKALIS'),
(185, 'DUMAI'),
(186, 'INDRAGIRI HILIR'),
(187, 'INDRAGIRI HULU'),
(188, 'KAMPAR'),
(189, 'KEPULAUAN MERANTI'),
(190, 'KUANTAN SINGINGI'),
(191, 'PEKANBARU'),
(192, 'PELALAWAN'),
(193, 'ROKAN HILIR'),
(194, 'ROKAN HULU'),
(195, 'SIAK'),
(196, 'BATAM'),
(197, 'BINTAN'),
(198, 'KARIMUN'),
(199, 'KEPULAUAN ANAMBAS'),
(200, 'LINGGA'),
(201, 'NATUNA'),
(202, 'TANJUNG PINANG'),
(203, 'BATANG HARI'),
(204, 'BUNGO'),
(205, 'JAMBI'),
(206, 'KERINCI'),
(207, 'MERANGIN'),
(208, 'MUARO JAMBI'),
(209, 'SAROLANGUN'),
(210, 'SUNGAIPENUH'),
(211, 'TANJUNG JABUNG BARAT'),
(212, 'TANJUNG JABUNG TIMUR'),
(213, 'TEBO'),
(214, 'BENGKULU'),
(215, 'BENGKULU SELATAN'),
(216, 'BENGKULU TENGAH'),
(217, 'BENGKULU UTARA'),
(218, 'KAUR'),
(219, 'KEPAHIANG'),
(220, 'LEBONG'),
(221, 'MUKO MUKO'),
(222, 'REJANG LEBONG'),
(223, 'SELUMA'),
(224, 'BANYUASIN'),
(225, 'EMPAT LAWANG'),
(226, 'LAHAT'),
(227, 'LUBUK LINGGAU'),
(228, 'MUARA ENIM'),
(229, 'MUSI BANYUASIN'),
(230, 'MUSI RAWAS'),
(231, 'OGAN ILIR'),
(232, 'OGAN KOMERING ILIR'),
(233, 'OGAN KOMERING ULU'),
(234, 'OGAN KOMERING ULU SELATAN'),
(235, 'OGAN KOMERING ULU TIMUR'),
(236, 'PAGAR ALAM'),
(237, 'PALEMBANG'),
(238, 'PRABUMULIH'),
(239, 'BANGKA'),
(240, 'BANGKA BARAT'),
(241, 'BANGKA SELATAN'),
(242, 'BANGKA TENGAH'),
(243, 'BELITUNG'),
(244, 'BELITUNG TIMUR'),
(245, 'PANGKAL PINANG'),
(246, 'BANDAR LAMPUNG'),
(247, 'LAMPUNG BARAT'),
(248, 'LAMPUNG SELATAN'),
(249, 'LAMPUNG TENGAH'),
(250, 'LAMPUNG TIMUR'),
(251, 'LAMPUNG UTARA'),
(252, 'MESUJI'),
(253, 'METRO'),
(254, 'PESAWARAN'),
(255, 'PESISIR BARAT'),
(256, 'PRINGSEWU'),
(257, 'TANGGAMUS'),
(258, 'TULANG BAWANG'),
(259, 'TULANG BAWANG BARAT'),
(260, 'WAY KANAN'),
(261, 'BENGKAYANG'),
(262, 'KAPUAS HULU'),
(263, 'KAYONG UTARA'),
(264, 'KETAPANG'),
(265, 'KUBU RAYA'),
(266, 'LANDAK'),
(267, 'MELAWI'),
(268, 'PONTIANAK'),
(269, 'SAMBAS'),
(270, 'SANGGAU'),
(271, 'SEKADAU'),
(272, 'SINGKAWANG'),
(273, 'SINTANG'),
(274, 'BARITO SELATAN'),
(275, 'BARITO TIMUR'),
(276, 'BARITO UTARA'),
(277, 'GUNUNG MAS'),
(278, 'KAPUAS'),
(279, 'KATINGAN'),
(280, 'KOTAWARINGIN BARAT'),
(281, 'KOTAWARINGIN TIMUR'),
(282, 'LAMANDAU'),
(283, 'MURUNG RAYA'),
(284, 'PALANGKA RAYA'),
(285, 'PULANG PISAU'),
(286, 'SERUYAN'),
(287, 'SUKAMARA'),
(288, 'BALANGAN'),
(289, 'BANJAR'),
(290, 'BANJARBARU'),
(291, 'BANJARMASIN'),
(292, 'BARITO KUALA'),
(293, 'HULU SUNGAI SELATAN'),
(294, 'HULU SUNGAI TENGAH'),
(295, 'HULU SUNGAI UTARA'),
(296, 'KOTABARU'),
(297, 'TABALONG'),
(298, 'TANAH BUMBU'),
(299, 'TANAH LAUT'),
(300, 'TAPIN'),
(301, 'BALIKPAPAN'),
(302, 'BERAU'),
(303, 'BONTANG'),
(304, 'KUTAI BARAT'),
(305, 'KUTAI KARTANEGARA'),
(306, 'KUTAI TIMUR'),
(307, 'PASER'),
(308, 'PENAJAM PASER UTARA'),
(309, 'SAMARINDA'),
(310, 'BULUNGAN (BULONGAN)'),
(311, 'MALINAU'),
(312, 'NUNUKAN'),
(313, 'TANA TIDUNG'),
(314, 'TARAKAN'),
(315, 'MAJENE'),
(316, 'MAMASA'),
(317, 'MAMUJU'),
(318, 'MAMUJU UTARA'),
(319, 'POLEWALI MANDAR'),
(320, 'BANTAENG'),
(321, 'BARRU'),
(322, 'BONE'),
(323, 'BULUKUMBA'),
(324, 'ENREKANG'),
(325, 'GOWA'),
(326, 'JENEPONTO'),
(327, 'LUWU'),
(328, 'LUWU TIMUR'),
(329, 'LUWU UTARA'),
(330, 'MAKASSAR'),
(331, 'MAROS'),
(332, 'PALOPO'),
(333, 'PANGKAJENE KEPULAUAN'),
(334, 'PAREPARE'),
(335, 'PINRANG'),
(336, 'SELAYAR (KEPULAUAN SELAYAR)'),
(337, 'SIDENRENG RAPPANG/RAPANG'),
(338, 'SINJAI'),
(339, 'SOPPENG'),
(340, 'TAKALAR'),
(341, 'TANA TORAJA'),
(342, 'TORAJA UTARA'),
(343, 'WAJO'),
(344, 'BAU-BAU'),
(345, 'BOMBANA'),
(346, 'BUTON'),
(347, 'BUTON UTARA'),
(348, 'KENDARI'),
(349, 'KOLAKA'),
(350, 'KOLAKA UTARA'),
(351, 'KONAWE'),
(352, 'KONAWE SELATAN'),
(353, 'KONAWE UTARA'),
(354, 'MUNA'),
(355, 'WAKATOBI'),
(356, 'BANGGAI'),
(357, 'BANGGAI KEPULAUAN'),
(358, 'BUOL'),
(359, 'DONGGALA'),
(360, 'MOROWALI'),
(361, 'PALU'),
(362, 'PARIGI MOUTONG'),
(363, 'POSO'),
(364, 'SIGI'),
(365, 'TOJO UNA-UNA'),
(366, 'TOLI-TOLI'),
(367, 'BOALEMO'),
(368, 'BONE BOLANGO'),
(369, 'GORONTALO'),
(370, 'GORONTALO UTARA'),
(371, 'POHUWATO'),
(372, 'BITUNG'),
(373, 'BOLAANG MONGONDOW (BOLMONG)'),
(374, 'BOLAANG MONGONDOW SELATAN'),
(375, 'BOLAANG MONGONDOW TIMUR'),
(376, 'BOLAANG MONGONDOW UTARA'),
(377, 'KEPULAUAN SANGIHE'),
(378, 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)'),
(379, 'KEPULAUAN TALAUD'),
(380, 'KOTAMOBAGU'),
(381, 'MANADO'),
(382, 'MINAHASA'),
(383, 'MINAHASA SELATAN'),
(384, 'MINAHASA TENGGARA'),
(385, 'MINAHASA UTARA'),
(386, 'TOMOHON'),
(387, 'AMBON'),
(388, 'BURU'),
(389, 'BURU SELATAN'),
(390, 'KEPULAUAN ARU'),
(391, 'MALUKU BARAT DAYA'),
(392, 'MALUKU TENGAH'),
(393, 'MALUKU TENGGARA'),
(394, 'MALUKU TENGGARA BARAT'),
(395, 'SERAM BAGIAN BARAT'),
(396, 'SERAM BAGIAN TIMUR'),
(397, 'TUAL'),
(398, 'HALMAHERA BARAT'),
(399, 'HALMAHERA SELATAN'),
(400, 'HALMAHERA TENGAH'),
(401, 'HALMAHERA TIMUR'),
(402, 'HALMAHERA UTARA'),
(403, 'KEPULAUAN SULA'),
(404, 'PULAU MOROTAI'),
(405, 'TERNATE'),
(406, 'TIDORE KEPULAUAN'),
(407, 'BIMA'),
(408, 'DOMPU'),
(409, 'LOMBOK BARAT'),
(410, 'LOMBOK TENGAH'),
(411, 'LOMBOK TIMUR'),
(412, 'LOMBOK UTARA'),
(413, 'MATARAM'),
(414, 'SUMBAWA'),
(415, 'SUMBAWA BARAT'),
(416, 'ALOR'),
(417, 'BELU'),
(418, 'ENDE'),
(419, 'FLORES TIMUR'),
(420, 'KUPANG'),
(421, 'LEMBATA'),
(422, 'MANGGARAI'),
(423, 'MANGGARAI BARAT'),
(424, 'MANGGARAI TIMUR'),
(425, 'NAGEKEO'),
(426, 'NGADA'),
(427, 'ROTE NDAO'),
(428, 'SABU RAIJUA'),
(429, 'SIKKA'),
(430, 'SUMBA BARAT'),
(431, 'SUMBA BARAT DAYA'),
(432, 'SUMBA TENGAH'),
(433, 'SUMBA TIMUR'),
(434, 'TIMOR TENGAH SELATAN'),
(435, 'TIMOR TENGAH UTARA'),
(436, 'FAKFAK'),
(437, 'KAIMANA'),
(438, 'MANOKWARI'),
(439, 'MANOKWARI SELATAN'),
(440, 'MAYBRAT'),
(441, 'PEGUNUNGAN ARFAK'),
(442, 'RAJA AMPAT'),
(443, 'SORONG'),
(444, 'SORONG SELATAN'),
(445, 'TAMBRAUW'),
(446, 'TELUK BINTUNI'),
(447, 'TELUK WONDAMA'),
(448, 'ASMAT'),
(449, 'BIAK NUMFOR'),
(450, 'BOVEN DIGOEL'),
(451, 'DEIYAI (DELIYAI)'),
(452, 'DOGIYAI'),
(453, 'INTAN JAYA'),
(454, 'JAYAPURA'),
(455, 'JAYAWIJAYA'),
(456, 'KEEROM'),
(457, 'KEPULAUAN YAPEN (YAPEN WAROPEN)'),
(458, 'LANNY JAYA'),
(459, 'MAMBERAMO RAYA'),
(460, 'MAMBERAMO TENGAH'),
(461, 'MAPPI'),
(462, 'MERAUKE'),
(463, 'MIMIKA'),
(464, 'NABIRE'),
(465, 'NDUGA'),
(466, 'PANIAI'),
(467, 'PEGUNUNGAN BINTANG'),
(468, 'PUNCAK'),
(469, 'PUNCAK JAYA'),
(470, 'SARMI'),
(471, 'SUPIORI'),
(472, 'TOLIKARA'),
(473, 'WAROPEN'),
(474, 'YAHUKIMO'),
(475, 'YALIMO');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_pekerjaan` varchar(200) NOT NULL,
  `harga` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `id_user`, `id_skill`, `id_kota`, `id_kategori`, `email`, `judul`, `deskripsi`, `foto_pekerjaan`, `harga`) VALUES
(4, 34, 2, 1, 5, 'hito.graphic@gmail.com', 'Tolong Buatkan saya desain banner untuk acara', 'deskripsi Tolong Buatkan saya desain banner untuk acara', '052d3e1dc40a1120641ede75e7b75754.jpg', 100000),
(15, 34, 3, 1, 5, 'hito.graphic@gmail.com', 'Tolong Buatkan saya baju untuk keluarga', 'deskripsi Tolong Buatkan saya baju untuk keluarga', 'eddd3357a47902af93c28e03c6c8c6cc.jpg', 2000003),
(16, 34, 2, 1, 5, 'hito.graphic@gmail.com', 'Tolong Buatkan saya desain menu ', 'deskripsi Tolong Buatkan saya baju untuk keluarga', 'ca4ba7e09f7e6e632e91a73bccd2ee6b.jpg', 100000),
(17, 34, 3, 1, 5, 'hito.graphic@gmail.com', 'Desain kartu bisnis restoran', 'deskripsi Tolong Buatkan saya baju untuk keluarga', '11e527ad115d696f6b3015bdd8ddcc76.jpg', 2000003),
(18, 34, 2, 1, 5, 'hito.graphic@gmail.com', 'Desain Logo restoran', 'deskripsi Tolong Buatkan saya baju untuk keluarga', '648af4a752a813e22f1440337b8625c6.jpg', 100000),
(19, 34, 3, 1, 5, 'hito.graphic@gmail.com', 'Desain Logo acara kemanusiaan', 'deskripsi Tolong Buatkan saya baju untuk keluarga', '1c2afd5df5bc136bfbae9ce51386cd5f.jpg', 2000003),
(22, 0, 3, 1, 5, '', 'Desain kartu bisnis restoran', '<p>\n	deskripsi Tolong Buatkan saya baju untuk keluarga</p>\n', '11e527ad115d696f6b3015bdd8ddcc76.jpg', 2000003),
(23, 0, 3, 1, 5, '', 'Desain kartu bisnis restoran', '<p>\n	deskripsi Tolong Buatkan saya baju untuk keluarga</p>\n', '11e527ad115d696f6b3015bdd8ddcc76.jpg', 2000003),
(24, 0, 3, 1, 5, '', 'Desain kartu bisnis restoran', '<p>\n	deskripsi Tolong Buatkan saya baju untuk keluarga</p>\n', '11e527ad115d696f6b3015bdd8ddcc76.jpg', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_ram` char(5) NOT NULL,
  `product_storage` varchar(50) NOT NULL,
  `product_camera` varchar(20) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_price`, `product_ram`, `product_storage`, `product_camera`, `product_image`, `product_quantity`, `product_status`) VALUES
(1, 'Honor 9 Lite (Sapphire Blue, 64 GB)  (4 GB RAM)', 'Honor', '14499.00', '4', '64', '13', 'image-1.jpeg', 10, '1'),
(2, '\r\nInfinix Hot S3 (Sandstone Black, 32 GB)  (3 GB RAM)', 'Infinix', '8999.00', '3', '32', '13', 'image-2.jpeg', 10, '1'),
(3, 'VIVO V9 Youth (Gold, 32 GB)  (4 GB RAM)', 'VIVO', '16990.00', '4', '32', '16', 'image-3.jpeg', 10, '1'),
(4, 'Moto E4 Plus (Fine Gold, 32 GB)  (3 GB RAM)', 'Moto', '11499.00', '3', '32', '8', 'image-4.jpeg', 10, '1'),
(5, 'Lenovo K8 Plus (Venom Black, 32 GB)  (3 GB RAM)', 'Lenevo', '9999.00', '3', '32', '13', 'image-5.jpg', 10, '1'),
(6, 'Samsung Galaxy On Nxt (Gold, 16 GB)  (3 GB RAM)', 'Samsung', '10990.00', '3', '16', '13', 'image-6.jpeg', 10, '1'),
(7, 'Moto C Plus (Pearl White, 16 GB)  (2 GB RAM)', 'Moto', '7799.00', '2', '16', '8', 'image-7.jpeg', 10, '1'),
(8, 'Panasonic P77 (White, 16 GB)  (1 GB RAM)', 'Panasonic', '5999.00', '1', '16', '8', 'image-8.jpeg', 10, '1'),
(9, 'OPPO F5 (Black, 64 GB)  (6 GB RAM)', 'OPPO', '19990.00', '6', '64', '16', 'image-9.jpeg', 10, '1'),
(10, 'Honor 7A (Gold, 32 GB)  (3 GB RAM)', 'Honor', '8999.00', '3', '32', '13', 'image-10.jpeg', 10, '1'),
(11, 'Asus ZenFone 5Z (Midnight Blue, 64 GB)  (6 GB RAM)', 'Asus', '29999.00', '6', '128', '12', 'image-12.jpeg', 10, '1'),
(12, 'Redmi 5A (Gold, 32 GB)  (3 GB RAM)', 'MI', '5999.00', '3', '32', '13', 'image-12.jpeg', 10, '1'),
(13, 'Intex Indie 5 (Black, 16 GB)  (2 GB RAM)', 'Intex', '4999.00', '2', '16', '8', 'image-13.jpeg', 10, '1'),
(14, 'Google Pixel 2 XL (18:9 Display, 64 GB) White', 'Google', '61990.00', '4', '64', '12', 'image-14.jpeg', 10, '1'),
(15, 'Samsung Galaxy A9', 'Samsung', '36000.00', '8', '128', '24', 'image-15.jpeg', 10, '1'),
(16, 'Lenovo A5', 'Lenovo', '5999.00', '2', '16', '13', 'image-16.jpeg', 10, '1'),
(17, 'Asus Zenfone Lite L1', 'Asus', '5999.00', '2', '16', '13', 'image-17.jpeg', 10, '1'),
(18, 'Lenovo K9', 'Lenovo', '8999.00', '3', '32', '13', 'image-18.jpeg', 10, '1'),
(19, 'Infinix Hot S3x', 'Infinix', '9999.00', '3', '32', '13', 'image-19.jpeg', 10, '1'),
(20, 'Realme 2', 'Realme', '8990.00', '4', '64', '13', 'image-20.jpeg', 10, '1'),
(21, 'Redmi Note 6 Pro', 'Redmi', '13999.00', '4', '64', '20', 'image-21.jpeg', 10, '1'),
(22, 'Realme C1', 'Realme', '7999.00', '2', '16', '15', 'image-22.jpeg', 10, '1'),
(23, 'Vivo V11', 'Vivo', '22900.00', '6', '64', '21', 'image-23.jpeg', 10, '1'),
(24, 'Oppo F9 Pro', 'Oppo', '23990.00', '6', '64', '18', 'image-24.jpg', 10, '1'),
(25, 'Honor 9N', 'Honor', '11999.00', '4', '64', '15', 'image-25.jpg', 10, '1'),
(26, 'Redmi 6A', 'Redmi', '6599.00', '2', '16', '13', 'image-26.jpeg', 10, '1'),
(27, 'InFocus Vision 3', 'InFocus', '7399.00', '2', '16', '13', 'image-27.jpeg', 10, '1'),
(28, 'Vivo Y69', 'Vivo', '11390.00', '3', '32', '16', 'image-28.jpeg', 10, '1'),
(29, 'Honor 7x', 'Honor', '12721.00', '4', '32', '18', 'image-29.jpeg', 10, '1'),
(30, 'Nokia 2.1', 'Nokia', '6580.00', '2', '1', '8', 'image-30.jpeg', 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tipe_freelancer` varchar(200) NOT NULL,
  `prof_skill` varchar(200) NOT NULL,
  `prof_sum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `id_user`, `id_skill`, `id_kota`, `email`, `kontak`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `tipe_freelancer`, `prof_skill`, `prof_sum`) VALUES
(1, 30, 1, 2, 'wahid@gmail.com', '089639339639', 'Jl. Mie instan pun tidak diproses secara instan', 'Laki-laki', '0000-00-00', 'Freelancer independen', 'Professional sistem analis', 'Menjadi sistem analis adalah hobiku, aku dapat menganalisa baik wujud maupun yang tak berwujud, dalam lautan luka dalam, dan aku pun tersesat dan tak tau arah jalan pulang, aku tanpa sistem analis ~ butiran debu'),
(3, 0, 2, 1, '	 kudus@gmail.com', '089639339639', 'sawangansss', 'laki', '2019-10-01', 'perorangan', 'Fotographer Keren', 'Fotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer KerenFotographer Keren'),
(9, 33, 2, 12, 'wahidalwahdi@gmail.com', '089639339649', 'Jl.H. Maksum RT/02 RW/04 Sawangan Baru', 'Laki-laki', '0000-00-00', 'Freelancer independen', 'Professional Desainer Grafis', 'Menjadi desainer grafis adalah hal menyenangkan bagiku, karena ini adlah passion terindah sampai saat ini, Menjadi desainer grafis adalah hal menyenangkan bagiku, karena ini adlah passion terindah sampai saat ini, Menjadi desainer grafis adalah hal menyenangkan bagiku, karena ini adlah passion terindah sampai saat ini, Menjadi desainer grafis adalah hal menyenangkan bagiku, karena ini adlah passion terindah sampai saat ini'),
(10, 34, 3, 5, 'hito.graphic@gmail.com', '0898989898', 'Jl. H. Edan Maexuki Salim', 'Laki-laki', '0000-00-00', '', '', 'fsfsfsfsfsfsfsfsf'),
(13, 35, 4, 15, 'satu@gmail.com', '089939339666', 'Jl. Pitara Sehat Selalu Muncul', 'Laki-laki', '0000-00-00', 'Freelancer independen', 'UI/UX Designer', 'Mengatur layout website maupun moibile app untuk menarik minat pelanggan adalah keahlianku :*'),
(14, 36, 5, 58, 'dua@gmail.com', '089939339667', 'Jl. Mencari Jati Diri yang Hilang', 'Laki-laki', '0000-00-00', 'Freelancer independen', 'Fullstack Mobile App Developer', 'Seorang fullstack professional di bidang mobile app developer, memiliki pengalaman lebih dari umur saya sendiri, pekerja keras dan pantang bercerai, karena bercerai itu akan runtuh. Salam kaki lima!'),
(15, 38, 6, 22, 'tiga@gmail.com', '089939339699', 'Jl. Tempura Crispy Crush', 'Perempuan', '0000-00-00', 'Agensi freelancer', '3D Designer', 'Aku dapat merubah wujud 2D menjadi 3D, bagi kalian yang beranggapan bahwa waifu 2D itu lebih mempesona, maka kalian semua itu salah!'),
(16, 39, 2, 1, 'empat@gmail.com', '08993933876', 'Jl. Bon Bon Chacha RT02/04 Bonkibon', 'Laki-laki', '0000-00-00', 'Freelancer independen', 'Front-end Developer', 'Aku dapat membuat tampilan depan dengan seksama dalam tempo yang sesingkat singkatnya - Bon 2019');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(20) NOT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `skill`) VALUES
(1, 'Java'),
(2, 'PHP'),
(3, 'Javascript'),
(4, 'HTML'),
(5, 'CSS'),
(6, 'SQL'),
(7, 'Bootstrap');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_freelancer`
--

CREATE TABLE `tipe_freelancer` (
  `id` int(11) NOT NULL,
  `tipe` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_freelancer`
--

INSERT INTO `tipe_freelancer` (`id`, `tipe`) VALUES
(1, 'Freelancer independen'),
(2, 'Agensi freelancer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'Abdul Wahid Al Wahdi', 'wahdial@gmail.com', 'Picture1.jpg', '$2y$10$I0.jaYNG3b09tBoR3/HA8e2B/f6xOjhfLkKpBIoa8eXn2xzYe5H5u', 1, 1, 1572453010),
(28, 'Abdul Kudus', 'kudus@gmail.com', 'default.jpg', '$2y$10$WpT0kL52PGImXBrkj1QgAOjQUfToYC6ZWXYLhOfsyhS71252ycBwK', 2, 1, 1572459401),
(30, 'Paraben oh Paraben', 'wahid@gmail.com', 'RESUME_51.png', '$2y$10$WpT0kL52PGImXBrkj1QgAOjQUfToYC6ZWXYLhOfsyhS71252ycBwK', 2, 1, 1577118207),
(33, 'wahid al wahdi', 'wahidalwahdi@gmail.com', 'download_(2)1.png', '$2y$10$lwPz8Bn1KpiyQhEMNywrK.Webvt5a1YHcZHf.QrARupXf6d1iYTY2', 2, 1, 1577289566),
(34, 'hito graphic', 'hito.graphic@gmail.com', '11.png', '$2y$10$7ATSr4hCJdm3H0SESu1ug.Mw9HLhUNOvbA6k9aWOW9pFCrEavKHHO', 3, 1, 1577595876),
(35, 'Urek Mazino', 'satu@gmail.com', 'RESUME36.png', '$2y$10$WpT0kL52PGImXBrkj1QgAOjQUfToYC6ZWXYLhOfsyhS71252ycBwK', 2, 1, 1577118207),
(36, 'Stephen Hillenburg', 'dua@gmail.com', 'RESUME37.png', '$2y$10$lwPz8Bn1KpiyQhEMNywrK.Webvt5a1YHcZHf.QrARupXf6d1iYTY2', 2, 1, 1577289566),
(38, 'Hikaru Usada', 'tiga@gmail.com', 'RESUME48.png', '$2y$10$lwPz8Bn1KpiyQhEMNywrK.Webvt5a1YHcZHf.QrARupXf6d1iYTY2', 2, 1, 1577289566),
(39, 'Bon Levi', 'empat@gmail.com', 'RESUME33.png', '$2y$10$7ATSr4hCJdm3H0SESu1ug.Mw9HLhUNOvbA6k9aWOW9pFCrEavKHHO', 2, 1, 1577595876);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(8, 1, 6),
(9, 1, 7),
(11, 3, 7),
(12, 1, 9),
(13, 1, 8),
(14, 2, 8),
(16, 3, 9),
(17, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'Jasa'),
(7, 'Pekerjaan'),
(8, 'Freelancer'),
(9, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'freelancer'),
(3, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Pengaturan Menu', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Pengaturan Sub Menu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Ganti Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 1, 'Kelola User', 'Kelola_user', 'fas fa-fw fa-users', 1),
(10, 4, 'aadadad', 'adad', 'adad', 1),
(20, 6, 'Tambah Jasa Baru', 'jasa/index/add', 'fas fa-fw fa-plus-square', 1),
(21, 6, 'Kelola Jasa', 'jasa', 'fas fa-fw fa-pencil-ruler', 1),
(22, 7, 'Tambah Pekerjaan', 'pekerjaan/index/add', 'fas fa-fw fa-plus-square', 1),
(23, 7, 'Kelola Pekerjaan', 'pekerjaan', 'fas fa-fw fa-briefcase', 1),
(24, 9, 'Profil', 'client', 'fas fa-fw fa-user', 1),
(26, 9, 'Edit Profil', 'client/edit', 'fas fa-fw fa-user-edit', 1),
(27, 9, 'Ganti Password', 'client/changePassword', 'fas fa-fw fa-key', 1),
(28, 8, 'Profil', 'freelancer', 'fas fa-fw fa-user', 1),
(29, 8, 'Edit Profil', 'freelancer/edit', 'fas fa-fw fa-user-edit', 1),
(30, 8, 'Ganti Password', 'freelancer/changePassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(6, 'tanakakun@gmail.com', 'K8QvjAGD1q9Ru3hQfiX5WFUygEzMTdUaaiaNNBiIv8s=', 1572541893),
(7, 'wahdial@gmail.com', 'MymUDRMh7MaWOisa+TOkzPjUW7TxXmx2OCHrHWWwA3Y=', 1576601503);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_freelancer`
--
ALTER TABLE `tipe_freelancer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tipe_freelancer`
--
ALTER TABLE `tipe_freelancer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
