-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Apr 2017 pada 18.39
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_beatbox`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `gambar`, `username`, `password`) VALUES
(1, 'joko', 'default.png', 'admin', 'admin'),
(3, 'arfan nexus', 'Armand-Maulana.jpg', 'arfan', '1234'),
(8, 'ariel tatum', 'Ariel_Tatum.png', 'ariel', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_balasan`
--

CREATE TABLE `tb_balasan` (
  `id` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `balasan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_balasan`
--

INSERT INTO `tb_balasan` (`id`, `id_komentar`, `id_admin`, `id_member`, `balasan`, `tanggal`, `level`) VALUES
(9, 7, 0, 16, 'Wah \r\nMas arman pengen belajar beatbox juga ya', '2017-04-10 11:56:22', 0),
(10, 7, 3, 0, 'ini balasan admin', '2017-04-11 02:34:50', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_event`
--

CREATE TABLE `tb_event` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_event`
--

INSERT INTO `tb_event` (`id`, `gambar`, `judul`, `tanggal`, `artikel`) VALUES
(5, 'Great-North.png', 'BEATBOX SHOOTOUT (2017)', '2017-04-04 05:16:27', '<h1><strong>Vocal Art Elevateddd!</strong></h1>\r\n\r\n<p>Austria&rsquo;s Vokal.Total is holding their Shootout Battle again and there may be some vocal cannons going off! As of early February, the list of competitors have been announced and we could not be more excited (See below for competitors).</p>\r\n\r\n<p>Vokal.Total is Austria&rsquo;s leading vocal performance organizers, holding a cappella competitions among other vocal arts including a beatbox battle. This July will be a week-long vocal competition, culminating with a showcase of the winners of the various competitions, including A Cappella Pop, Comedy and Jazz, Classical Vocal Ensemble, and the Shootout battle.</p>\r\n\r\n<p>The Beatbox Shootout was formerly known as Emperor of the Mic, famous for being one of the premier beatbox battles in Europe and is, in part, organized by Austrian Beatbox Champ, NeXor. NeXor will also be judging along side Spanish Champ, Lytos, and World Champ, Zede, in this year&rsquo;s competition.</p>\r\n\r\n<p>Doors are open to all those that can make it to Austria on the week of July 17th through the 21st. But for those who cannot make the trip, you&rsquo;ll be able to find the livestream on Vokal.Total&rsquo;s YouTube Channel.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_forum`
--

CREATE TABLE `tb_forum` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `topic` text NOT NULL,
  `tanggal` date NOT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_forum`
--

INSERT INTO `tb_forum` (`id`, `id_member`, `judul`, `topic`, `tanggal`, `dilihat`) VALUES
(5, 1, 'tutorial beatbox yang mudah', 'KARENA ANE JUGA BEATBOXER DI KOTA ANE JADI ANE BUAT THREAD NI\r\n\r\nTutorial Dasar dalam Beatbox\r\nCara mudah belajar beatbox :\r\n\r\nSebelum kalian mau belajar Beatbox ada beberapa hal yang harus temen-temen hindarin, yaitu :\r\n- Jangan malu membunyikan beat kalian di manapun.\r\n- Jangan pernah behenti berlatih di saat kalian mulai kehabisan cara untuk belajar sound baru.\r\n- Jangan pernah memanfaatkan Beatbox sebagai hal-hal negativ seperti menjadi sombong dan ajang cari jodoh.\r\n- Jangan pernah merasa emosi saat kalian belajar dan teman-teman kalian ngeledekin/ngejelekin\r\n\r\n\r\nNah,...itu beberapa hal yang harus di hindarin kalo mau serius belajar beatbox, sekarang langsung aja gue jelasin cara-cara nya....\r\n\r\nDi beatbox itu cuma punya 3 suara dasar atau 3 beat dasar yaitu B T K,\r\nB itu Kick Drum/Bass Drum\r\nT itu Hi Hat\r\nK itu Snare\r\n\r\ndari 3 suara dasar tersebut kalian udah bisa bikin banyak banget beat-beat keren dan unik, cara melakukan\'nya adalah :\r\n\r\n1. Untuk suara kick Drum itu kata dasar/huruf vocal\'nya adalah B, saat lo bilang huruf vocal B tersebut itu lo teken bibir lo rapet-rapet dan lo bilang BE atau BU pokoknya lo cari feel yang enak sampe kedengaran suara Bass dari B lo, lo coba ulang-ulang berkali-kali dan lo latih terus menerus, soalnya kalo masih awal suaranya itu masih belom jadi atau masih belom kedengeran bass\'nya, jadi harus di coba terus,...\r\n\r\n2. Trus Hi Hat, cara\'nya tuh gampang banget lo cuma bilang huruf T tapi pas lo bunyi\'innya tuh kayak mau ngomong bahasa inggris jadi\'nya Tci-Tci-Tci,.... nah kalo lo bisa dengan lancar ngomong kata-kata itu berarti lo juga udah lancar buat bunyi\'in Hi Hat tersebut, tinggal lo lancarin juga sampe bunyinya tuh enak banget buat di gabungin sama beat-beat lain\r\n\r\n3. Snare, jujur sih sound ini emang agak susah buat di pelajarin tapi gua yakin lo semua pasti bakal bisa buat bunyi\'in semua sound-sound di beatbox, nah caranya tuh kayak ngomong K terserah lo mau di tarik apa di keluarin dua-dua\'nya bisa kok, tapi lo harus biasa\'in di tarik soalnya Snare K yang bagus itu di tarik.\r\ntrus kalo cara di atas udah lumayan lancar atau bisa cara selanjutnya lo tarik K\'nya kayak orang sakit gigi, tarik dari kedua sela-sela gigi bagian kanan dan kiri lo trus saat lo tarik itu lo kagetin tarikan\'nya supaya suara hentakan dari Snare K lo bagus dan enak buat di denger, pokoknya lo harus rutin-rutin coba dan pelajarin, lo jangan ngeluh saat lo belajar entah susah\'lah atau ribet\'lah lo nikmatin aja proses belajar dan latihannya, semua beatboxer-beatboxer jago awal mereka belajar juga ngalamin hal itu, tapi karna mereka punya tekad yang kuat buat belajar beatbox dan mereka usaha\'in terus sampe bisa nguasa\'in sound-sound di beatbox....\r\n\r\n4. Nah lo udah punya 3 sound-sound dasar di beatbox dan lo udah bisa bikin pattern dari 3 beat dasar tersebut Contoh:\r\nB T K T B T K T 2X dengan tempo yang santai atau slow\r\n', '2017-04-07', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(11) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gallery`
--

INSERT INTO `tb_gallery` (`id`, `gambar`) VALUES
(5, 'Great-North.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `id_forum`, `id_member`, `komentar`, `tanggal`, `id_admin`, `level`) VALUES
(7, 5, 15, 'Keren banget tutorialnya, patut di coba nih, hehehe', '2017-04-10 11:43:12', 0, 0),
(8, 5, 0, 'ini komentar admin', '2017-04-11 02:15:14', 3, 1),
(9, 5, 0, 'cowo beatbox idaman gue banget ', '2017-04-11 04:06:10', 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komunitas`
--

CREATE TABLE `tb_komunitas` (
  `id` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lat` varchar(200) NOT NULL,
  `lang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komunitas`
--

INSERT INTO `tb_komunitas` (`id`, `alamat`, `telp`, `email`, `lat`, `lang`) VALUES
(1, 'jl. Cipto Mangunkusomo RT.16 No.1', '0812509599082', 'baetboxsamarinda@gmail.com', '-0.5511436838627862', '117.08789501586921');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `username`, `password`, `telp`, `alamat`, `gambar`, `tgl_daftar`, `status`) VALUES
(1, 'Upik TJJTK', 'upik', '1234', '081250959908', 'jl. antasari', 'MASKOT KPU.png', '2017-04-01', 1),
(15, 'arman maulana', 'arman', '1234', '081250959909', 'jl.Bandung Gg.Aman', 'Armand-Maulana.jpg', '2017-04-10', 1),
(16, 'Dodi Kangen', 'dodi', '1234', '081250959900', 'jl.Bandung Gg.Band', 'dodikangen.jpeg', '2017-04-10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `gambar`, `keterangan`) VALUES
(4, 'bg4.jpg', ''),
(5, 'bg2.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_balasan`
--
ALTER TABLE `tb_balasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_balasan`
--
ALTER TABLE `tb_balasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_forum`
--
ALTER TABLE `tb_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
