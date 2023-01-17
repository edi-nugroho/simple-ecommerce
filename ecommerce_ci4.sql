-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 05:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'staff', 'Staff'),
(3, 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 7),
(2, 6),
(3, 8),
(3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'edinugroho514@gmail.com', 1, '2023-01-16 09:25:18', 1),
(2, '::1', 'user@gmail.com', 2, '2023-01-16 21:45:08', 1),
(3, '::1', 'edinugroho514@gmail.com', 1, '2023-01-16 21:51:08', 1),
(4, '::1', 'staff@gmail.com', NULL, '2023-01-16 22:08:33', 0),
(5, '::1', 'staff', NULL, '2023-01-16 22:08:45', 0),
(6, '::1', 'edinugroho514@gmail.com', 1, '2023-01-16 22:09:15', 1),
(7, '::1', 'staff@gmail.com', 6, '2023-01-16 22:10:00', 1),
(8, '::1', 'admin@gmail.com', 7, '2023-01-16 22:19:51', 1),
(9, '::1', 'user@gmail.com', 8, '2023-01-16 22:23:59', 1),
(10, '::1', 'lymonzx098@gmail.com', 9, '2023-01-16 22:25:51', 1),
(11, '::1', 'lymonzx098@gmail.com', NULL, '2023-01-16 22:29:32', 0),
(12, '::1', 'lymonzx098@gmail.com', 9, '2023-01-16 22:29:42', 1),
(13, '::1', 'lymonzx098@gmail.com', 9, '2023-01-16 22:31:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-profile', 'Manage profile'),
(2, 'manage-users', 'Manage All Users');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'lymonzx098@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20100101 Firefox/108.0', 'cb1cb80428cff873b839ed0c2fc4e09e', '2023-01-16 22:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Tshirt'),
(2, 'Pants'),
(3, 'Jacket');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `option_id`, `stock`) VALUES
(1, 2, 1, 0),
(2, 2, 2, 25),
(3, 2, 3, 5),
(4, 6, 2, 20),
(5, 3, 5, 5),
(6, 4, 6, 10),
(7, 3, 6, 10),
(8, 3, 7, 5),
(9, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(20, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1673882455, 1),
(21, '2022-09-22-041032', 'App\\Database\\Migrations\\Product', 'default', 'App', 1673882455, 1),
(22, '2022-09-22-043710', 'App\\Database\\Migrations\\Category', 'default', 'App', 1673882455, 1),
(23, '2022-11-15-034742', 'App\\Database\\Migrations\\Cart', 'default', 'App', 1673882455, 1),
(24, '2022-11-22-014736', 'App\\Database\\Migrations\\Order', 'default', 'App', 1673882455, 1),
(25, '2022-12-19-032311', 'App\\Database\\Migrations\\OrderDetail', 'default', 'App', 1673882455, 1),
(26, '2023-01-05-083302', 'App\\Database\\Migrations\\Inventory', 'default', 'App', 1673882455, 1),
(27, '2023-01-05-091015', 'App\\Database\\Migrations\\Options', 'default', 'App', 1673882455, 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `option` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option`) VALUES
(1, 'XL'),
(2, 'L'),
(3, 'M'),
(4, 'S'),
(5, '28'),
(6, '29'),
(7, '30');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'On Process',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `discount`, `image`, `created_at`, `updated_at`) VALUES
(2, 3, 'Dolphins Jacket', 'dolphins-jacket', '<div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam unde eius dolorem obcaecati et quisquam natus impedit dolorum omnis, a blanditiis provident facilis quia aliquid accusamus saepe placeat sit vel est!.</div><div><br></div><div>Id reiciendis eaque architecto voluptate accusantium ipsam alias voluptatibus tempore quo excepturi voluptates, earum sequi rem numquam atque labore in aliquid quas itaque expedita iste fugiat minus maiores. Voluptas!</div>', 360000, 40, 'jacket-1.jpg', '2023-01-17 10:08:34', '2023-01-17 10:10:07'),
(3, 2, 'Dickies - 874', 'dickies-874', '<div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam unde eius dolorem obcaecati et quisquam natus impedit dolorum omnis, a blanditiis provident facilis quia aliquid accusamus saepe placeat sit vel est!.</div><div><br></div><div>Id reiciendis eaque architecto voluptate accusantium ipsam alias voluptatibus tempore quo excepturi voluptates, earum sequi rem numquam atque labore in aliquid quas itaque expedita iste fugiat minus maiores. Voluptas!<br><br>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam unde eius dolorem obcaecati et quisquam natus impedit dolorum omnis, a blanditiis provident facilis quia aliquid accusamus saepe placeat sit vel est!.</div>', 450000, 25, 'pants-1.jpg', '2023-01-17 10:11:02', '2023-01-17 10:11:02'),
(4, 2, 'Cargo Pants', 'cargo-pants', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente maiores est nesciunt, aliquam quaerat vitae laboriosam aspernatur!.</div><div><br></div><div>Ipsum in eaque sunt obcaecati repellat animi mollitia nobis illo. Quo modi, natus possimus obcaecati, harum est cumque omnis esse mollitia quod expedita?.</div><div><br></div><div>Inventore sequi at magnam culpa maxime nulla sit ea amet, repellendus, adipisci quam voluptates! Dolorum veniam placeat facere reiciendis deserunt recusandae velit quis inventore magnam? Eum, recusandae! Vero dolores incidunt, ipsam quasi dignissimos a? Ducimus libero blanditiis error fugit eum?</div>', 500000, 0, 'pants-2.jpg', '2023-01-17 10:12:05', '2023-01-17 10:12:05'),
(5, 1, 'Tyler Tshirt', 'tyler-tshirt', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta, quaerat totam delectus ea praesentium excepturi alias veritatis perferendis placeat cumque ad. Itaque eius vero cumque, praesentium, non assumenda pariatur.</div><div><br></div><div>totam dignissimos expedita vitae nisi amet nam soluta omnis aspernatur laboriosam magnam cupiditate nostrum ad, laborum perspiciatis! Ipsa, autem nam.&nbsp;</div><div><br></div><div>Exercitationem voluptate beatae at tenetur repudiandae et est? Nisi pariatur possimus, in alias laborum voluptatibus mollitia deserunt voluptatem? Dignissimos placeat id nobis non incidunt vitae consectetur velit, quaerat fuga odit, earum, ullam sint inventore quibusdam consequatur modi? Iure, magnam dolor.</div>', 450000, 10, 'tshirt-1.jpg', '2023-01-17 10:13:15', '2023-01-17 10:13:15'),
(6, 1, 'Nascar Brickyard', 'nascar-brickyard', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem nihil dolorem et atque, harum laborum vitae cupiditate est soluta ipsa.</div><div><br></div><div>Architecto ipsum eum maiores quaerat quisquam fugit necessitatibus, ab corrupti aperiam doloremque delectus omnis accusamus cum! Ipsam qui deleniti earum eius ab accusamus illum.<br><br>Exercitationem suscipit, consequuntur saepe aut labore quisquam repellat rerum ad ipsum molestias ea veniam quod quidem!</div>', 240000, 20, 'tshirt-3.jpg', '2023-01-17 10:14:42', '2023-01-17 10:14:42'),
(7, 3, 'Hoodie NFL', 'hoodie-nfl', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non nam odio iste enim.&nbsp;</div><div><br></div><div>Omnis, est quas quasi placeat nihil molestias numquam, perferendis voluptatem, quae optio temporibus veniam magni reiciendis iste doloribus illo dolorem quibusdam quos sed consequuntur vel.&nbsp;</div><div><br></div><div>Mollitia, unde blanditiis? Corporis ea omnis commodi tenetur nesciunt excepturi odio nemo.</div>', 150000, 25, 'jacket-3.jpg', '2023-01-17 10:27:37', '2023-01-17 10:27:37'),
(8, 3, 'Perugia Jacket', 'perugia-jacket', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sint tempore eos! Iure aliquid quasi molestias minima corrupti quo, harum alias excepturi illo ipsa explicabo tempore beatae inventore voluptatem.<br><br>labore sint id dolor necessitatibus aliquam. Aliquam nesciunt saepe maiores assumenda explicabo qui facilis sed quo iste est blanditiis, non laudantium quasi tenetur totam. Blanditiis nemo saepe ex, corporis praesentium enim.</div>', 300000, 0, 'jacket-2.jpg', '2023-01-17 10:58:34', '2023-01-17 10:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.png',
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `username`, `user_image`, `phone_number`, `address`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'staff@gmail.com', 'Staff Admin', 'staff', 'default.png', '0812345678910', NULL, '$2y$10$PSD4UVQr.Y3HfppK0ye.meaNuVMTaNRbKXIA9oZ7pd2sRRKegeuXm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-16 22:09:47', '2023-01-16 22:09:47', NULL),
(7, 'admin@gmail.com', 'Administrator', 'admin', 'default.png', '0812345678910', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum quae exercitationem similique facilis a veniam harum ipsum blanditiis fugit non!', '$2y$10$nQ/nKC0sfQq9xZdCknuYyOlbQUel8SR0iYl1eYo2gjZFRgNaiFtY.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-16 22:19:21', '2023-01-16 22:19:21', NULL),
(8, 'user@gmail.com', 'User', 'user', 'default.png', '0812345678910', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque asperiores autem ducimus eius! Vel ducimus similique incidunt laboriosam. Cumque, possimus doloribus.', '$2y$10$xGoqvjZzWgAU8lSkfP.bAOjA0fz0coyeuHcY2M8vydia69QhMIqpi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-16 22:23:35', '2023-01-16 22:23:35', NULL),
(9, 'lymonzx098@gmail.com', 'Lymonzx', 'lymonzx098', 'pengurangan(b).png', '081285363788', 'BANg', '$2y$10$DHAfD1x1oE/toZYRslpyne5pO1XDWHjxZFO8HRUM87xYC2VyGONwq', NULL, '2023-01-16 22:31:02', NULL, NULL, NULL, NULL, 1, 0, '2023-01-16 22:25:41', '2023-01-16 22:31:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_product_id_foreign` (`product_id`),
  ADD KEY `cart_option_id_foreign` (`option_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_product_id_foreign` (`product_id`),
  ADD KEY `inventory_option_id_foreign` (`option_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetail_order_id_foreign` (`order_id`),
  ADD KEY `orderdetail_product_id_foreign` (`product_id`),
  ADD KEY `orderdetail_option_id_foreign` (`option_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`),
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`),
  ADD CONSTRAINT `inventory_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`),
  ADD CONSTRAINT `orderdetail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `orderdetail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
