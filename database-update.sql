-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Bulan Mei 2022 pada 21.40
-- Versi server: 10.3.34-MariaDB-log-cll-lve
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacific4_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `tipe` enum('INFORMASI','PERINGATAN','PENTING','UPDATE','DEPOSIT') COLLATE utf8_swedish_ci NOT NULL,
  `subjek` text COLLATE utf8_swedish_ci NOT NULL,
  `konten` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposit`
--

CREATE TABLE `deposit` (
  `id` int(10) NOT NULL,
  `kode_deposit` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `nomor_pengirim` varchar(250) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `jumlah_transfer` int(255) NOT NULL,
  `get_saldo` varchar(250) NOT NULL,
  `status` enum('Success','Pending','Error') NOT NULL,
  `place_from` varchar(50) NOT NULL DEFAULT 'WEB',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id` int(2) NOT NULL,
  `konten` text NOT NULL,
  `update_terakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id`, `konten`, `update_terakhir`) VALUES
(1, '                                <table class=\"table table-bordered dt-responsive nowrap\" style=\"border-collapse: collapse; border-spacing: 0; width: 100%;\">\r\n                                    <tbody>\r\n\r\n                                    <tr>\r\n                                        <td align=\"center\">\r\n                                            <a href=\"https://www.facebook.com/\" class=\"btn btn-primary btn-bordred btn-rounded waves-effect waves-light\" target=\"BLANK\"><i class=\"mdi mdi-facebook\"></i> Facebook</a>\r\n                                        </td>\r\n                                        <td align=\"center\">\r\n                                            <a href=\"https://api.whatsapp.com/send?phone=628&text=Hallo%20Admin\" class=\"btn btn-primary btn-bordred btn-rounded waves-effect waves-light\" target=\"BLANK\"><i class=\"mdi mdi-whatsapp\"></i> Whatsapp</a>\r\n                                        </td>\r\n<table class=\"table table-bordered dt-responsive nowrap\" style=\"border-collapse: collapse; border-spacing: 0; width: 100%;\">\r\n                                    <tbody>\r\n<td align=\"center\">\r\n                                            <a href=\"https://Instagram.com/\" class=\"btn btn-primary btn-bordred btn-rounded waves-effect waves-light\" target=\"BLANK\"><i class=\"mdi mdi-instagram\"></i> Instagram</a>\r\n</td>\r\n                                    </tr>   \r\n                                    </tbody>\r\n                                </table>\r\n                                \r\n', '2019-01-21 00:00:00'),
(2, '<p>Layanan yang disediakan oleh Kincai Seluler telah ditetapkan kesepakatan-kesepakatan berikut.</p><br />\r\n										<p><b>1. Umum</b><br />\r\n										<br />Dengan mendaftar dan menggunakan layanan DEMO AGMEDIA, Anda secara otomatis menyetujui semua ketentuan layanan kami. Kami berhak mengubah ketentuan layanan ini tanpa pemberitahuan terlebih dahulu. Anda diharapkan membaca semua ketentuan layanan kami sebelum membuat pesanan.<br />\r\n										<br />Penolakan: DEMO AGMEDIA tidak akan bertanggung jawab jika Anda mengalami kerugian dalam bisnis Anda.<br />\r\n										<br />Kewajiban: DEMO AGMEDIA tidak bertanggung jawab jika Anda mengalami suspensi akun atau penghapusan kiriman yang dilakukan oleh Instagram, Twitter, Facebook, Youtube, dan lain-lain.<br />\r\n										<br /><b>2. Layanan</b><br />\r\n										<br />Kewajiban: DEMO AGMEDIA hanya digunakan untuk media promosi sosial media dan membantu meningkatkan penampilan akun Anda saja.<br />\r\n										<br />Kewajiban: DEMO AGMEDIA tidak menjamin pengikut baru Anda berinteraksi dengan Anda, kami hanya menjamin bahwa Anda mendapat pengikut yang Anda beli.<br />\r\n										<br />Kewajiban: DEMO AGMEDIA tidak menerima permintaan pembatalan/pengembalian dana setelah pesanan masuk ke sistem kami. Kami memberikan pengembalian dana yang sesuai jika pesanan tida dapat diselesaikan.</p>', '2019-01-21 00:00:00'),
(3, '<h4>Apa Itu DEMO AGMEDIA ?</h4>DEMO AGMEDIA adalah sebuah platform bisnis yang menyediakan berbagai layanan social media marketing yang bergerak terutama di Indonesia.<br />\r\nDengan bergabung bersama kami, Anda dapat menjadi penyedia jasa social media atau reseller social media seperti jasa penambah Followers, Likes, dll.<br />\r\nSaat ini tersedia berbagai layanan untuk social media terpopuler seperti Instagram, Facebook, Twitter, Youtube, dll.<br />\r\n<br />\r\n<h4>Bagaimana cara mendaftar di DEMO AGMEDIA?</h4> Anda dapat menghubungi Admin <a href=\"/halaman/kontak-kami\">Kontak</a><br />\r\n<br />\r\n<h4>Bagaimana cara membuat Pesanan ?</h4>Untuk membuat pesanan sangatlah mudah, Anda hanya perlu masuk terlebih dahulu ke akun Anda dan menuju halaman <b>Pemesanan</b> dengan mengklik menu yang sudah tersedia. Selain itu Anda juga dapat melakukan pemesanan melalui request API.<br />\r\n<br />\r\n<h4>Bagaimana cara melakukan Pengisian Saldo ?</h4>Untuk melakukan pengisian saldo, Anda hanya perlu masuk terlebih dahulu ke akun Anda dan menuju halaman deposit dengan mengklik menu yang sudah tersedia. Kami menyediakan deposit melalui bank dan pulsa.									', '2019-01-21 00:00:00'),
(4, '<center><h4><b> PENJELASAN STATUS DI<br>DEMO AGMEDIA </b></h4>\r\n										<p>\r\n<br>										<br>\r\n<span class=\"badge badge-warning\">PENDING</span> :<br> Pesanan/deposit sedang dalam antian di server										\r\n<br>\r\n</br>\r\n<span class=\"badge badge-info\">PROCESSING</span> :<br> Pesanan sedang dalam proses										\r\n<br>\r\n</br>\r\n<span class=\"badge badge-success\">SUCCESS</span> :<br> Pesanan telah berhasil										\r\n<br>\r\n</br>\r\n<span class=\"badge badge-danger\">PARTIAL</span> :<br> Pesanan hanya masuk sebagian. Dan anda hanya akan membayar layanan yang masuk saja										\r\n<br>\r\n</br>\r\n<span class=\"badge badge-danger\">ERROR</span> :<br> Pesanan di batalkan/Terjadi Kesalahan Sistem, dan saldo akan otomatis kembali ke akun.										<br>										<br>\r\n</br>\r\n</center>\r\n<span class=\"badge badge-kece\">Refill/Guaranteed</span> : Refill adalah isi ulang. Jika anda membeli layanan refill dan ternyata dalam beberapa hari followers berkurang, maka akan otomatis di refill/di isi ulang. <b>Tapi harap di ketahui, Server hanya akan mengisi ulang jika followers yang berkurang adalah followers yang di beli dengan layanan refill.</b></p>                                ', '2019-01-21 00:00:00'),
(5, '<b>Ingin memiliki website seperti DEMO AGMEDIA ?</b>\r\n<br><br>\r\n<b>Penjelasan</b><br>\r\nDEMO AGMEDIA adalah portal di mana member dapat melakukan pembelian layanan.\r\nDengan memiliki website seperti DEMO AGMEDIA, bukan berarti anda bisa melakukan pemesanan semau anda dan sepuasnya.<br>\r\nKarena setiap pemesanan yang di lakukan oleh anda atau member anda, akan memotong saldo pusat di DEMO AGMEDIA\r\n<br><br>\r\n<b>Pertanyaan</b><br>\r\nA. Apakah saya bisa memiliki website smm? Sedangkan saya tidak bisa coding.<br>\r\nB. Sangat bisa, semua Urusan coding dan eror di website kami yang mengurus.\r\n<br><br>\r\nA. Berapa harga pembuatan website smm?<br>\r\nB. Harga akan kami cantumkan di bagian terahir halaman ini.\r\n<br><br>\r\nA. Apakah penghasilan akan langsung masuk ke rekening saya?<br>\r\nB. tentu saja, Semua deposit akan langsung masuk ke rekening anda.\r\n<br><br>\r\nA. Berapa lama proses pembuatan website yang saya pesan?<br>\r\nB. Untuk pemrosesan layanan web SMM kami membutuhkan waktu 1-4 Hari, setelah pembayaran terkonfirmasi.\r\n<br><br>\r\nA. Apa bisa nanti nama website dan domain saya yang menentukan?<br>\r\nB. Tentu saja, Nama website dan domain anda yang menentukan sendiri\r\n<br><br>\r\nA. Apakah saya bisa mengatur harga layanan sesuai keinginan saya?<br>\r\nB. Bisa, anda bisa mengatur semua harga layanan di website anda untuk menyesuaikan keuntungan\r\n<br><br>\r\nA. Apakah saya bisa mendapatkan akses cpanel?<br>\r\nB. Tentu Bisa, dan anda juga bisa akses penuh admin panel\r\n<br><br>\r\n<b>Harga</b>\r\n<br><br>\r\n<b>12 bulan</b>\r\n<br>\r\n<b>Rp.700.000</b>\r\n<br><br>\r\n<b>6 bulan</b>\r\n<br>\r\n<b>Rp.300.000</b>\r\n<br><br>\r\n\r\n<br><br><br>\r\nAda pertanyaan lain? Atau Anda Butuh Jasa Oper Panel / UP Fitur Silahkan hubungi admin di  <a href=\"https://api.whatsapp.com/send?phone=628\">WHATSAPP</a></p>\r\n		</div>\r\n	</div>\r\n</div>			</div>', '2019-01-21 00:45:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_pendaftaran`
--

CREATE TABLE `harga_pendaftaran` (
  `id` int(2) NOT NULL,
  `level` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `bonus` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_saldo`
--

CREATE TABLE `history_saldo` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `aksi` enum('Penambahan Saldo','Pengurangan Saldo') NOT NULL,
  `nominal` double NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_layanan`
--

CREATE TABLE `kategori_layanan` (
  `id` int(30) NOT NULL,
  `nama` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `kode` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_kami`
--

CREATE TABLE `kontak_kami` (
  `id` int(1) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `whatsapp` text NOT NULL,
  `telegram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak_kami`
--

INSERT INTO `kontak_kami` (`id`, `nama`, `alamat`, `facebook`, `instagram`, `whatsapp`, `telegram`) VALUES
(1, 'NAMA-KAMU', 'Indonesia', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_sosmed`
--

CREATE TABLE `layanan_sosmed` (
  `id` int(10) NOT NULL,
  `service_id` int(10) NOT NULL,
  `kategori` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `layanan` text COLLATE utf8_swedish_ci NOT NULL,
  `catatan` text COLLATE utf8_swedish_ci NOT NULL,
  `min` int(10) NOT NULL,
  `max` int(10) NOT NULL,
  `harga` double NOT NULL,
  `harga_api` double NOT NULL,
  `profit` double NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8_swedish_ci NOT NULL,
  `provider_id` int(10) NOT NULL,
  `provider` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(4) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `aksi` enum('Login','Logout') NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_depo`
--

CREATE TABLE `metode_depo` (
  `id` int(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `tipe` enum('Bank','Pulsa Transfer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metode_depo`
--

INSERT INTO `metode_depo` (`id`, `provider`, `nama`, `rate`, `tujuan`, `tipe`) VALUES
(1, 'OVO', '#1 OVO Transfer', '1', '088xxxxxx A/n AAA', 'Bank'),
(2, 'DANA', '#1 DANA Transfer', '1', '088xxxxxx A/n AAA', 'Bank'),
(3, 'GOPAY', '#1 GOPAY Transfer', '1', '088xxxxxx A/n AAA', 'Bank'),
(4, 'BNI', '#1 Bank BNI Transfer', '1', '088xxxxxx A/n AAA', 'Bank');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_sosmed`
--

CREATE TABLE `pembelian_sosmed` (
  `id` int(10) NOT NULL,
  `oid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `provider_oid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `layanan` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `target` text COLLATE utf8_swedish_ci NOT NULL,
  `jumlah` int(10) NOT NULL,
  `remains` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `start_count` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `harga` double NOT NULL,
  `profit` double NOT NULL,
  `status` enum('Pending','Processing','Error','Partial','Success') COLLATE utf8_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `provider` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `place_from` enum('Website','API') COLLATE utf8_swedish_ci NOT NULL,
  `refund` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_tiket`
--

CREATE TABLE `pesan_tiket` (
  `id` int(10) NOT NULL,
  `id_tiket` int(10) NOT NULL,
  `pengirim` enum('Member','team-support') COLLATE utf8_swedish_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `pesan` text COLLATE utf8_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `update_terakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_tsel`
--

CREATE TABLE `pesan_tsel` (
  `id` int(11) NOT NULL,
  `isi` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('UNREAD','READ') NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provider`
--

CREATE TABLE `provider` (
  `id` int(10) NOT NULL,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `api_key` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `api_id` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `provider`
--

INSERT INTO `provider` (`id`, `code`, `link`, `api_key`, `api_id`) VALUES
(4, 'MANUAL', 'MANUAL', 'MANUAL', 'MANUAL'),
(5, 'PACIFIC-S1', 'https://api.pacific-pedia.id/s1', 'PP244CkXhQ51tcz455', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_transfer`
--

CREATE TABLE `riwayat_transfer` (
  `id` int(10) NOT NULL,
  `pengirim` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `penerima` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `jumlah` double NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_web`
--

CREATE TABLE `setting_web` (
  `id` int(11) NOT NULL,
  `short_title` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `deskripsi_web` text NOT NULL,
  `kontak_utama` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting_web`
--

INSERT INTO `setting_web` (`id`, `short_title`, `title`, `deskripsi_web`, `kontak_utama`, `date`, `time`) VALUES
(1, 'Free SMM', 'Free SMM', 'Free SMM Adalah Sebuah platform bisnis yang menyediakan berbagai layanan multy media marketing yang bergerak terutama di Indonesia. Dengan bergabung bersama kami, Anda dapat menjadi penyedia jasa social media atau reseller social media seperti jasa penambah Followers, Likes, dll. Saat ini tersedia berbagai layanan untuk social media terpopuler seperti Instagram, Facebook, Twitter, Youtube, dll.', '', '2019-01-03', '16:06:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subjek` varchar(250) NOT NULL,
  `pesan` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `update_terakhir` datetime NOT NULL,
  `status` enum('Pending','Responded','Waiting','Closed') NOT NULL,
  `this_user` int(1) NOT NULL,
  `this_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `nama` text COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `nomer` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `pin` varchar(6) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `saldo` int(10) NOT NULL,
  `pemakaian_saldo` double NOT NULL,
  `level` enum('Member','Agen','Admin','Developers','Reseller') COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8_swedish_ci NOT NULL,
  `api_key` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `uplink` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `update_nama` int(1) NOT NULL,
  `random_kode` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher_deposit`
--

CREATE TABLE `voucher_deposit` (
  `id` int(10) NOT NULL,
  `voucher` varchar(50) NOT NULL,
  `saldo` varchar(250) NOT NULL,
  `status` enum('active','sudah di redeem') NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `harga_pendaftaran`
--
ALTER TABLE `harga_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_saldo`
--
ALTER TABLE `history_saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak_kami`
--
ALTER TABLE `kontak_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan_sosmed`
--
ALTER TABLE `layanan_sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metode_depo`
--
ALTER TABLE `metode_depo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian_sosmed`
--
ALTER TABLE `pembelian_sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan_tsel`
--
ALTER TABLE `pesan_tsel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_transfer`
--
ALTER TABLE `riwayat_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_web`
--
ALTER TABLE `setting_web`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voucher_deposit`
--
ALTER TABLE `voucher_deposit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `harga_pendaftaran`
--
ALTER TABLE `harga_pendaftaran`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_saldo`
--
ALTER TABLE `history_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontak_kami`
--
ALTER TABLE `kontak_kami`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `layanan_sosmed`
--
ALTER TABLE `layanan_sosmed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `metode_depo`
--
ALTER TABLE `metode_depo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian_sosmed`
--
ALTER TABLE `pembelian_sosmed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan_tsel`
--
ALTER TABLE `pesan_tsel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `riwayat_transfer`
--
ALTER TABLE `riwayat_transfer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `voucher_deposit`
--
ALTER TABLE `voucher_deposit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
