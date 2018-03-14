-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: Mar 02, 2018 at 05:17 AM
=======
-- Generation Time: Mar 10, 2018 at 02:57 AM
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'kasir', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `items_sementara`
--

CREATE TABLE `items_sementara` (
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
<<<<<<< HEAD
=======
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `status`) VALUES
(1, 'Pulsa', 1),
(2, 'Perdana', 1),
(3, 'Minuman', 1),
(4, 'Sp/ Voucher', 1),
(5, 'Eceran', 1),
(6, 'Konter', 1);

-- --------------------------------------------------------

--
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
=======
--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'admi', 1520552805);

>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(8) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `perdana_items`
--

CREATE TABLE `perdana_items` (
  `id_transaksi` int(11) NOT NULL,
  `nama_operator` varchar(20) NOT NULL,
  `jenis` varchar(6) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

<<<<<<< HEAD
=======
--
-- Dumping data for table `perdana_items`
--

INSERT INTO `perdana_items` (`id_transaksi`, `nama_operator`, `jenis`, `harga`, `qty`) VALUES
(10, 'INDOSAT', 'Eceran', 4000, 2),
(11, 'INDOSAT', 'Eceran', 4000, 2),
(11, 'XL', 'Grosir', 3000, 20),
(12, 'INDOSAT', 'Eceran', 4000, 2),
(12, 'XL', 'Grosir', 3000, 20),
(13, 'INDOSAT', 'Eceran', 4000, 2),
(13, 'XL', 'Grosir', 3000, 20),
(14, 'AXIS', 'Eceran', 4000, 2),
(14, 'INDOSAT', 'Grosir', 3000, 25),
(15, 'AXIS', 'Grosir', 3000, 50),
(15, 'XL', 'Eceran', 5000, 1),
(16, 'TELKOMSEL', 'Eceran', 7000, 3),
(17, '3', 'Grosir', 3000, 150),
(18, 'SMARTFREN', 'Eceran', 10000, 1),
(19, 'BOLT', 'Eceran', 15000, 2),
(20, 'INDOSAT', 'Eceran', 5000, 1);

>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- --------------------------------------------------------

--
-- Table structure for table `perdana_sementara`
--

CREATE TABLE `perdana_sementara` (
  `id_user` int(11) NOT NULL,
  `nama_operator` varchar(20) NOT NULL,
  `jenis` varchar(6) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
<<<<<<< HEAD
=======
  `id_kategori` int(11) NOT NULL,
  `id_sub_kategori` int(11) NOT NULL,
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
  `nama` varchar(64) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty` int(8) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

<<<<<<< HEAD
=======
--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_kategori`, `id_sub_kategori`, `nama`, `harga_beli`, `harga_jual`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Lampu Philips 20 Watt', 30000, 35000, 7, 1, '2018-02-07 19:21:33', '2018-02-21 20:29:47'),
(2, 0, 0, 'Lampu Philips 10 Watt', 22000, 26000, 10, 1, '2018-02-08 06:05:38', '2018-03-01 06:31:10'),
(3, 0, 0, 'Sev 5', 5600, 6000, 18, 1, '2018-03-01 15:58:50', '2018-03-01 09:01:27'),
(4, 0, 0, 'Sp Axis', 2000, 6000, 10, 1, '2018-03-01 16:00:09', '2018-03-01 09:00:09'),
(5, 0, 0, 'A/g Tempred', 7500, 20000, 10, 1, '2018-03-01 16:00:37', '2018-03-01 09:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `diskon` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

<<<<<<< HEAD
=======
--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `diskon`, `created_at`) VALUES
(1, 1, 0, '2018-03-01 07:28:02'),
(5, 1, 0, '2018-03-01 07:41:07'),
(6, 1, 10, '2018-03-01 09:20:50'),
(7, 1, 0, '2018-02-21 21:06:34'),
(8, 1, 0, '2018-03-01 16:02:21');

>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- --------------------------------------------------------

--
-- Table structure for table `transaksi_items`
--

CREATE TABLE `transaksi_items` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(8) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

<<<<<<< HEAD
=======
--
-- Dumping data for table `transaksi_items`
--

INSERT INTO `transaksi_items` (`id_transaksi`, `id_produk`, `harga`, `qty`) VALUES
(1, 1, 28000, 3),
(1, 2, 26000, 1),
(5, 1, 35000, 1),
(6, 2, 26000, 1),
(7, 1, 28000, 3),
(8, 3, 6500, 2);

>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- --------------------------------------------------------

--
-- Table structure for table `transaksi_perdana`
--

CREATE TABLE `transaksi_perdana` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

<<<<<<< HEAD
=======
--
-- Dumping data for table `transaksi_perdana`
--

INSERT INTO `transaksi_perdana` (`id`, `id_user`, `created_at`) VALUES
(6, 2, '2018-02-28 17:37:54'),
(7, 2, '2018-02-28 17:38:01'),
(8, 2, '2018-02-28 17:38:21'),
(9, 2, '2018-02-28 17:38:24'),
(10, 2, '2018-02-28 17:38:51'),
(11, 2, '2018-02-28 17:39:26'),
(12, 2, '2018-02-28 17:40:10'),
(13, 2, '2018-02-11 17:40:51'),
(14, 2, '2018-02-11 17:51:11'),
(15, 1, '2018-02-18 10:41:42'),
(16, 1, '2018-02-18 10:44:57'),
(17, 1, '2018-02-28 10:47:30'),
(18, 1, '2018-02-28 10:48:51'),
(19, 1, '2018-02-28 10:49:53'),
(20, 2, '2018-03-01 13:50:15');

>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pulsa`
--

CREATE TABLE `transaksi_pulsa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_operator` varchar(20) NOT NULL,
  `pulsa` int(8) NOT NULL,
  `harga` int(8) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

<<<<<<< HEAD
=======
--
-- Dumping data for table `transaksi_pulsa`
--

INSERT INTO `transaksi_pulsa` (`id`, `id_user`, `nama_operator`, `pulsa`, `harga`, `no_hp`, `created_at`) VALUES
(1, 1, 'TELKOMSEL', 5000, 7000, '089665341630', '2018-02-26 11:40:05'),
(2, 1, 'INDOSAT', 10000, 12000, '0897887878', '2018-02-28 10:37:48'),
(3, 1, 'XL', 15000, 17000, '0898989898', '2018-02-28 09:38:53'),
(4, 2, 'AXIS', 10000, 12000, '0897999898989', '2018-02-10 08:48:07'),
(5, 1, 'AXIS', 25000, 27000, '08199898989', '2018-02-28 18:13:14'),
(6, 1, 'TELKOMSEL', 20000, 22000, '08223374939', '2018-02-28 19:15:13'),
(7, 1, '3', 10000, 12000, '089665341630', '2018-02-28 20:15:43'),
(8, 2, 'TELKOMSEL', 10000, 12000, '08524343434', '2018-03-01 13:48:25'),
(9, 2, 'INDOSAT', 10000, 12000, '08574234340', '2018-03-01 15:51:40');

>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
<<<<<<< HEAD
(1, '127.0.0.1', 'admin', '$2y$08$ZLOlk5yI4inYgKmN/yuTL.OD2mhP5GBIkU66Br5KO5OpCUQLHVfBu', '', 'admin@admin.com', '', NULL, NULL, 'A4BDZqexvm4nBh67nHY8cO', 1268889823, 1519949401, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'kasir', '$2y$08$g/LQujnnWCXR/1.SjY5E2.F8yccbbLnA6X68y0bNSlQtKOLXChyam', NULL, 'user@mail.com', NULL, NULL, NULL, 'hXS3sFOnGijrLXLy.QA1tO', 1268889823, 1519894501, 1, 'Kasir', NULL, 'UJ cell', '0');
=======
(1, '127.0.0.1', 'admin', '$2y$08$ZLOlk5yI4inYgKmN/yuTL.OD2mhP5GBIkU66Br5KO5OpCUQLHVfBu', '', 'admin@admin.com', '', NULL, NULL, 'w9q4ou.yi/BHUidTF0pxse', 1268889823, 1520634705, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'kasir', '$2y$08$g/LQujnnWCXR/1.SjY5E2.F8yccbbLnA6X68y0bNSlQtKOLXChyam', NULL, 'user@mail.com', NULL, NULL, NULL, 'mhC8XTmmTqlDQ6HVw9rHku', 1268889823, 1520552709, 1, 'Kasir', NULL, 'UJ cell', '0');
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 1, 2),
(2, 2, 2);

<<<<<<< HEAD
=======
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`id` int(11)
,`id_user` int(11)
,`diskon` int(2)
,`username` varchar(100)
,`name` varchar(50)
,`id_produk` int(11)
,`nama_produk` varchar(64)
,`harga_beli` int(11)
,`harga` int(11)
,`qty` int(8)
,`total` bigint(21)
,`created_at` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_perdana`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi_perdana` (
`id` int(11)
,`id_user` int(11)
,`username` varchar(100)
,`name` varchar(50)
,`nama_operator` varchar(20)
,`jenis` varchar(6)
,`harga` int(11)
,`qty` int(8)
,`total` bigint(21)
,`created_at` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_pulsa`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi_pulsa` (
`id` int(11)
,`id_user` int(11)
,`nama_operator` varchar(20)
,`pulsa` int(8)
,`harga` int(8)
,`no_hp` varchar(15)
,`created_at` datetime
,`username` varchar(100)
,`first_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS  select `transaksi`.`id` AS `id`,`transaksi`.`id_user` AS `id_user`,`transaksi`.`diskon` AS `diskon`,`users`.`username` AS `username`,`users`.`first_name` AS `name`,`transaksi_items`.`id_produk` AS `id_produk`,`produk`.`nama` AS `nama_produk`,`produk`.`harga_beli` AS `harga_beli`,`transaksi_items`.`harga` AS `harga`,`transaksi_items`.`qty` AS `qty`,(`transaksi_items`.`harga` * `transaksi_items`.`qty`) AS `total`,`transaksi`.`created_at` AS `created_at` from (((`transaksi` left join `users` on((`users`.`id` = `transaksi`.`id_user`))) join `transaksi_items` on((`transaksi_items`.`id_transaksi` = `transaksi`.`id`))) join `produk` on((`produk`.`id` = `transaksi_items`.`id_produk`))) order by `transaksi`.`created_at` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_perdana`
--
DROP TABLE IF EXISTS `view_transaksi_perdana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_perdana`  AS  select `transaksi_perdana`.`id` AS `id`,`transaksi_perdana`.`id_user` AS `id_user`,`users`.`username` AS `username`,`users`.`first_name` AS `name`,`perdana_items`.`nama_operator` AS `nama_operator`,`perdana_items`.`jenis` AS `jenis`,`perdana_items`.`harga` AS `harga`,`perdana_items`.`qty` AS `qty`,(`perdana_items`.`harga` * `perdana_items`.`qty`) AS `total`,`transaksi_perdana`.`created_at` AS `created_at` from ((`transaksi_perdana` left join `users` on((`users`.`id` = `transaksi_perdana`.`id_user`))) join `perdana_items` on((`perdana_items`.`id_transaksi` = `transaksi_perdana`.`id`))) order by `transaksi_perdana`.`created_at` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_pulsa`
--
DROP TABLE IF EXISTS `view_transaksi_pulsa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_pulsa`  AS  select `transaksi_pulsa`.`id` AS `id`,`transaksi_pulsa`.`id_user` AS `id_user`,`transaksi_pulsa`.`nama_operator` AS `nama_operator`,`transaksi_pulsa`.`pulsa` AS `pulsa`,`transaksi_pulsa`.`harga` AS `harga`,`transaksi_pulsa`.`no_hp` AS `no_hp`,`transaksi_pulsa`.`created_at` AS `created_at`,`users`.`username` AS `username`,`users`.`first_name` AS `first_name` from (`transaksi_pulsa` join `users` on((`transaksi_pulsa`.`id_user` = `users`.`id`))) order by `transaksi_pulsa`.`created_at` desc ;

>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_sementara`
--
ALTER TABLE `items_sementara`
  ADD PRIMARY KEY (`id_user`,`id_produk`);

--
<<<<<<< HEAD
=======
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perdana_items`
--
ALTER TABLE `perdana_items`
  ADD PRIMARY KEY (`id_transaksi`,`nama_operator`,`jenis`);

--
-- Indexes for table `perdana_sementara`
--
ALTER TABLE `perdana_sementara`
  ADD PRIMARY KEY (`id_user`,`nama_operator`,`jenis`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
<<<<<<< HEAD
  ADD PRIMARY KEY (`id`);
=======
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`,`id_sub_kategori`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD PRIMARY KEY (`id_transaksi`,`id_produk`);

--
-- Indexes for table `transaksi_perdana`
--
ALTER TABLE `transaksi_perdana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi_pulsa`
--
ALTER TABLE `transaksi_pulsa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
<<<<<<< HEAD
=======
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_perdana`
--
ALTER TABLE `transaksi_perdana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi_pulsa`
--
ALTER TABLE `transaksi_pulsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
