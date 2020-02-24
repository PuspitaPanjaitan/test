-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2020 pada 00.55
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksi_awal`
--

CREATE TABLE `aksi_awal` (
  `id` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_stok` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `modified_by` varchar(64) NOT NULL,
  `modified_on` date NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aksi_awal`
--

INSERT INTO `aksi_awal` (`id`, `id_obat`, `id_stok`, `jumlah`, `modified_by`, `modified_on`, `total`) VALUES
(1, 1, 5, 10, 'Puspita', '2020-02-23', 1000),
(2, 1, 5, 10, 'Puspita', '2020-02-23', 1000),
(3, 1, 12, 4, 'Puspita', '2020-02-23', 400),
(4, 0, 13, 10, 'Puspita', '2020-02-23', 1000),
(5, 0, 9, 10, 'Puspita', '2020-02-23', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksi_inbox`
--

CREATE TABLE `aksi_inbox` (
  `id` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_inbox` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `modified_by` varchar(64) NOT NULL,
  `modified_on` date NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aksi_inbox`
--

INSERT INTO `aksi_inbox` (`id`, `id_obat`, `id_inbox`, `jumlah`, `modified_by`, `modified_on`, `total`) VALUES
(1, 0, 11, 10, 'Puspita', '2020-02-23', 46780),
(2, 0, 9, 1000, 'Puspita', '2020-02-23', 100000),
(3, 0, 10, 100, 'Puspita', '2020-02-23', 10000),
(4, 0, 11, 100, 'Puspita', '2020-02-23', 467800),
(5, 0, 9, 100, 'Puspita', '2020-02-23', 10000),
(6, 0, 11, 10, 'Puspita', '2020-02-23', 46780);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksi_outbox`
--

CREATE TABLE `aksi_outbox` (
  `id` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_outbox` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `modified_by` varchar(66) NOT NULL,
  `modified_on` date NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `awal`
--

CREATE TABLE `awal` (
  `id` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `anggaran` varchar(64) NOT NULL,
  `modified_by` varchar(64) NOT NULL,
  `modified_on` date NOT NULL,
  `harga` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `awal`
--

INSERT INTO `awal` (`id`, `id_obat`, `id_supplier`, `anggaran`, `modified_by`, `modified_on`, `harga`, `tanggal`) VALUES
(5, 1, 10, 'JKN 20', 'Puspita', '2020-02-23', 1000, '2020-01-31'),
(7, 1, 6, 'JKN 20', 'Puspita', '2020-02-23', 100, '2020-02-08'),
(9, 5, 6, 'JKN 20', 'Puspita', '2020-02-23', 100, '2020-02-08'),
(10, 1, 6, 'JKN 20', 'Puspita', '2020-02-23', 1000, '2020-02-15'),
(12, 1, 6, 'JKN 20', 'Puspita', '2020-02-23', 1000, '2020-02-08'),
(13, 1, 6, 'JKN 20', 'Puspita', '2020-02-23', 5000, '2020-02-06'),
(15, 1, 6, 'JKN 19', 'Puspita', '2020-02-23', 5000, '2020-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `kepada` int(3) NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `modified_by` varchar(64) NOT NULL,
  `modified_on` date NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_obat`, `id_supplier`, `kepada`, `keterangan`, `modified_by`, `modified_on`, `tanggal`) VALUES
(4, 1, 6, 2, 'seperti apa yang slalu', 'Puspita', '2020-02-23', '2020-02-01'),
(5, 1, 8, 1, 'Bisa', 'Puspita', '2020-02-23', '2020-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `tahun_pembuatan` int(10) NOT NULL,
  `anggaran` varchar(64) NOT NULL,
  `modified_by` varchar(64) NOT NULL,
  `modified_on` date NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id` int(2) NOT NULL,
  `nama_bulan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'Nopember'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_obat`
--

CREATE TABLE `detail_obat` (
  `id` int(10) NOT NULL,
  `kode_obat` varchar(64) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `modified_by` varchar(64) NOT NULL,
  `modified_on` date NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `id_satuan` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `status` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_obat`
--

INSERT INTO `detail_obat` (`id`, `kode_obat`, `nama_obat`, `modified_by`, `modified_on`, `id_supplier`, `harga`, `id_satuan`, `tanggal`, `status`) VALUES
(1, '21i212', 'paracetamol', 'Puspita', '2020-02-22', 6, 100, 1, '2020-02-08', 1),
(2, 'asd123', 'amoksilin', 'Puspita', '2020-02-22', 6, 1000, 3, '2020-02-15', 1),
(3, '135cde', 'Sangobion', 'Puspita', '2020-02-22', 6, 1000, 2, '2020-02-22', 1),
(4, '1234abc', 'Imboost', 'Puspita', '2020-02-22', 6, 4678, 2, '2020-02-04', 1),
(5, '21i215', 'Hemaviton', 'Puspita', '2020-02-22', 6, 5000, 2, '2020-02-08', 1),
(6, '222hsdlnz6', 'Haloperidol', 'Puspita', '2020-02-22', 6, 1000, 1, '2020-02-07', 1),
(7, '222hsk', 'OBH', 'Puspita', '2020-02-22', 6, 4000, 3, '2020-02-06', 1),
(8, '2223y2sj', 'Penicilin', 'Puspita', '2020-02-23', 6, 500, 1, '2020-02-01', 1),
(9, 'yxls1820', 'Paramex', 'Puspita', '2020-02-22', 6, 1000, 1, '2020-02-15', 1),
(12, 'sgdkx2793', 'Enervon C', 'Puspita', '2020-02-22', 6, 5000, 1, '2020-02-15', 1),
(13, '135cde', 'Oskadon', 'Puspita', '2020-02-22', 6, 5000, 1, '2020-02-05', 1),
(14, 'xhbsk290', 'Curcumaplus', 'Puspita', '2020-02-22', 6, 4678, 3, '2020-02-01', 1),
(15, 'sgdk23038', 'Accu Chek Performa Test Strip', 'Puspita', '2020-02-22', 6, 5000, 1, '2020-02-11', 1),
(16, 'ahskd3040', 'Kaptopril', 'Puspita', '2020-02-23', 6, 467, 1, '2020-02-15', 1),
(17, 'ajal3i2oms', 'Xiladex', 'Puspita', '2020-02-23', 6, 1000, 1, '2020-02-01', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id` int(10) NOT NULL,
  `nama_gudang` varchar(64) NOT NULL,
  `user` varchar(64) NOT NULL,
  `status` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepada`
--

CREATE TABLE `kepada` (
  `id` int(3) NOT NULL,
  `kepada` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kepada`
--

INSERT INTO `kepada` (`id`, `kepada`) VALUES
(1, 'Pasien'),
(2, 'PUSTU'),
(3, 'IGD'),
(4, 'Poli Umum'),
(5, 'Poli Gigi'),
(6, 'Laboratorium'),
(7, 'KIA'),
(8, 'TBC'),
(9, 'KIA'),
(10, 'TBC'),
(11, 'Gizi'),
(12, 'Lansia'),
(13, 'UKS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(10) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `status` smallint(3) NOT NULL,
  `modified_by` varchar(64) NOT NULL,
  `modified_on` date NOT NULL,
  `kode_obat` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `satuan`, `status`, `modified_by`, `modified_on`, `kode_obat`) VALUES
(3, 'paracetamol', 'papan1', 2, 'Puspita', '2020-02-10', '21ihsqka12'),
(4, 'ampicilin', 'papan', 1, 'puspita', '2020-02-09', '2567dhjjc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(6) NOT NULL,
  `satuan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(1, 'Tablet'),
(2, 'Papan'),
(3, 'Botol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` smallint(3) NOT NULL,
  `status_keterangan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status_keterangan`) VALUES
(1, 'Aktif'),
(2, 'Non aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_gudang`
--

CREATE TABLE `stok_gudang` (
  `id` int(10) NOT NULL,
  `id_gudang` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `modified_by` date NOT NULL,
  `modified_on` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) NOT NULL,
  `nama_supplier` varchar(64) NOT NULL,
  `modified_by` varchar(64) NOT NULL,
  `modified_on` date NOT NULL,
  `no_kontrak` varchar(64) NOT NULL,
  `tgl_kontrak` varchar(32) NOT NULL,
  `no_bas` varchar(64) NOT NULL,
  `tgl_bas` date NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `status` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `modified_by`, `modified_on`, `no_kontrak`, `tgl_kontrak`, `no_bas`, `tgl_bas`, `keterangan`, `status`) VALUES
(6, 'PT. ABHIMATA MANUNGGAL', 'Puspita', '2020-02-22', '-', '2020-02-22', '2924/AMA/X/19', '2020-02-22', 'cobalagi', 1),
(7, 'PT CITRA UTAMA', 'Puspita', '2020-02-23', '-', '2020-02-01', '2924/AMA/X/20', '2020-01-30', 'cobaaja', 1),
(8, 'PT Permata', 'Puspita', '2020-02-23', '-', '2020-02-08', '2924/AMA/X/21', '2020-02-14', 'cobaaja', 1),
(9, 'PT MULIA UTAMA', 'Puspita', '2020-02-23', '-', '2020-02-15', '2925/AMA/X/22', '2020-01-30', 'Aku', 1),
(10, 'PT A', 'Puspita', '2020-02-23', '-', '2020-02-01', '2925/AMA/X/23', '2020-01-30', 'try', 1),
(11, 'PT B', 'Puspita', '2020-02-23', '-', '2020-02-15', '2925/AMA/X/24', '2020-02-01', 'jslaklals', 1),
(12, 'PT B', 'Puspita', '2020-02-23', '-', '2020-02-22', '2925/AMA/X/25', '2020-02-13', 'Aku', 1),
(13, 'PT C', 'Puspita', '2020-02-23', '-', '2020-02-15', '2925/AMA/X/26', '2020-02-06', 'try', 1),
(14, 'PT D', 'Puspita', '2020-02-23', '-', '2020-02-29', '2925/AMA/X/27', '2020-02-29', 'jslaklals', 1),
(15, 'PT E', 'Puspita', '2020-02-23', '-', '2020-02-08', '2925/AMA/X/26', '2020-02-21', 'Aku', 1),
(16, 'PT D', 'Puspita', '2020-02-23', '-', '2020-02-01', '2925/AMA/X/27', '2020-01-31', 'Aku', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Puspita', 'utamipuspita@gmail.com', 'default.jpg', '$2y$10$lriiIfmON4gOJxuA9EZgPOKf7oLklOkVZgomZKKSjo.SYyW2bOHi.', 1, 1, 1580580770),
(4, 'Rina', 'Rina@yahoo.com', 'default.jpg', '$2y$10$pgY8AhkNEEDLKnccSeoLw.9MqcBowx83i9td2q2h.tukGuyZgC4e6', 2, 1, 1580620967),
(5, 'aku', 'aku@yahoo.com', 'default.jpg', '$2y$10$kVFF83DADA4NvtGhamo7b.2cSTUQwBW5nJcs8C1M5TXiKE4rwleFi', 3, 1, 1582096439);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 3),
(5, 1, 4),
(6, 1, 6),
(7, 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Persediaan'),
(5, 'Test'),
(6, 'Aksi'),
(7, 'Laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dasboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(7, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(11, 3, 'Submenu Management', 'menu/submenu', 'far fa-fw fa-folder-open', 1),
(13, 1, 'Rekanan', 'rekan', 'fas fa-fw fa-user-tie', 1),
(14, 4, 'Data Obat', 'dataObat', 'fas fa-fw fa-dolly-flatbed', 1),
(15, 6, 'Barang Masuk', 'inbox', 'fas fa-fw fa-file-import', 1),
(16, 6, 'Barang Keluar', 'outbox', 'fas fa-fw fa-file-export', 1),
(18, 7, 'Report', 'report', 'fas fa-fw fa-file', 1),
(19, 6, 'Stok Awal', 'awal', 'fa fa-fw fa-book', 1),
(20, 7, 'Laporan', 'laporan', 'fa fa-file', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aksi_awal`
--
ALTER TABLE `aksi_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aksi_inbox`
--
ALTER TABLE `aksi_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aksi_outbox`
--
ALTER TABLE `aksi_outbox`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `awal`
--
ALTER TABLE `awal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kepada`
--
ALTER TABLE `kepada`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok_gudang`
--
ALTER TABLE `stok_gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aksi_awal`
--
ALTER TABLE `aksi_awal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `aksi_inbox`
--
ALTER TABLE `aksi_inbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `aksi_outbox`
--
ALTER TABLE `aksi_outbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `awal`
--
ALTER TABLE `awal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kepada`
--
ALTER TABLE `kepada`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stok_gudang`
--
ALTER TABLE `stok_gudang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
