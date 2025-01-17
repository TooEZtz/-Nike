-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 08:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nike`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE `credit_cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiration_date` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `billing_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credit_cards`
--

INSERT INTO `credit_cards` (`id`, `user_id`, `card_name`, `card_number`, `expiration_date`, `cvv`, `billing_address`, `created_at`) VALUES
(1, 6, 'adad', '12200336655', '010101', '111', '', '2024-12-12 19:09:40'),
(2, 6, 'aa', 'a', 'a', 'a', '', '2024-12-12 19:09:58'),
(3, 6, 'aa', 'a', 'a', 'a', '', '2024-12-12 19:14:17'),
(4, 6, 'aa', 'a', 'a', 'a', '', '2024-12-12 19:20:33'),
(5, 6, 'shalin', '123456', '11222', '223', '', '2024-12-12 19:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `delivery_fee` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `tax`, `delivery_fee`, `total`, `created_at`) VALUES
(3, 3, 2140.00, 256.80, 15.00, 2411.80, '2024-12-12 05:02:32'),
(4, 3, 2140.00, 256.80, 15.00, 2411.80, '2024-12-12 05:06:21'),
(5, 4, 130.00, 15.60, 15.00, 160.60, '2024-12-12 05:29:38'),
(6, 3, 465.00, 55.80, 15.00, 535.80, '2024-12-12 05:36:35'),
(7, 3, 740.00, 88.80, 15.00, 843.80, '2024-12-12 05:41:14'),
(8, 3, 130.00, 15.60, 15.00, 160.60, '2024-12-12 05:44:05'),
(9, 3, 350.00, 42.00, 15.00, 407.00, '2024-12-12 05:46:36'),
(10, 3, 830.00, 99.60, 15.00, 944.60, '2024-12-12 06:55:38'),
(11, 3, 130.00, 15.60, 15.00, 160.60, '2024-12-12 17:41:23'),
(12, 6, 2340.00, 280.80, 15.00, 2635.80, '2024-12-12 19:14:17'),
(13, 6, 2340.00, 280.80, 15.00, 2635.80, '2024-12-12 19:20:33'),
(14, 6, 2340.00, 280.80, 15.00, 2635.80, '2024-12-12 19:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_in_inventory` tinyint(1) DEFAULT NULL,
  `items_left` int(11) DEFAULT NULL,
  `imageURL` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `gender`, `category`, `price`, `is_in_inventory`, `items_left`, `imageURL`, `slug`) VALUES
(100, 'Nike React Infinity Run Flyknit', 'NIKE', 'MEN', 'RUNNING', 160.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-665455a5-45de-40fb-945f-c1852b82400d/react-infinity-run-flyknit-mens-running-shoe-zX42Nc.jpg', 'nike-react-infinity-run-flyknit'),
(101, 'Nike React Miler', 'NIKE', 'MEN', 'RUNNING', 130.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-5cc7de3b-2afc-49c2-a1e4-0508997d09e6/react-miler-mens-running-shoe-DgF6nr.jpg', 'nike-react-miler'),
(102, 'Nike Air Zoom Pegasus 37', 'NIKE', 'WOMEN', 'RUNNING', 120.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-33b0a0a5-c171-46cc-ad20-04a768703e47/air-zoom-pegasus-37-womens-running-shoe-Jl0bDf.jpg', 'nike-air-zoom-pegasus-37'),
(103, 'Nike Joyride Run Flyknit', 'NIKE', 'WOMEN', 'RUNNING', 180.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/99a7d3cb-e40c-4474-91c2-0f2e6d231fd2/joyride-run-flyknit-womens-running-shoe-HcfnJd.jpg', 'nike-joyride-run-flyknit'),
(104, 'Nike Mercurial Vapor 13 Elite FG', 'NIKE', 'WOMEN', 'FOOTBALL', 250.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/9dda6202-e2ff-4711-9a09-0fcb7d90c164/mercurial-vapor-13-elite-fg-firm-ground-soccer-cleat-14MsF2.jpg', 'nike-mercurial-vapor-13-elite-fg'),
(105, 'Nike Phantom Vision Elite Dynamic Fit FG', 'NIKE', 'WOMEN', 'FOOTBALL', 150.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/s1amp7uosrn0nqpsxeue/phantom-vision-elite-dynamic-fit-fg-firm-ground-soccer-cleat-19Kv1V.jpg', 'nike-phantom-vision-elite-dynamic-fit-fg'),
(106, 'Nike Phantom Venom Academy FG', 'NIKE', 'WOMEN', 'FOOTBALL', 80.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/whegph8z9ornhxklc8rp/phantom-venom-academy-fg-firm-ground-soccer-cleat-6JVNll.jpg', 'nike-phantom-venom-academy-fg'),
(107, 'Nike Mercurial Vapor 13 Elite Tech Craft FG', 'NIKE', 'MEN', 'FOOTBALL', 145.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/vhbwnkor8sxt8qtecgia/mercurial-vapor-13-elite-tech-craft-fg-firm-ground-soccer-cleat-l38JPj.jpg', 'nike-mercurial-vapor-13-elite-tech-craft-fg'),
(108, 'Nike Mercurial Superfly 7 Pro MDS FG', 'NIKE', 'MEN', 'FOOTBALL', 137.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-a52a8aec-22dc-4982-961b-75c5f4c72805/mercurial-superfly-7-pro-mds-fg-firm-ground-soccer-cleat-mhcpdN.jpg', 'nike-mercurial-superfly-7-pro-mds-fg'),
(109, 'Nike Air Force 1', 'NIKE', 'KIDS', 'CASUAL', 90.00, 1, 3, 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/178b2a46-3ee4-492b-882e-f71efdd53a36/air-force-1-big-kids-shoe-2zqp8D.jpg', 'nike-air-force-1'),
(110, 'Nike Air Max 90', 'NIKE', 'KIDS', 'CASUAL', 100.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/8439f823-86cf-4086-81d2-4f9ff9a66866/air-max-90-big-kids-shoe-1wzwJM.jpg', 'nike-air-max-90'),
(111, 'Nike Air Max 90 LTR', 'NIKE', 'KIDS', 'CASUAL', 110.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-620aeb37-1b28-44b0-9b14-5572f8cbc948/air-max-90-ltr-big-kids-shoe-hdNLQ5.jpg', 'nike-air-max-90-ltr'),
(112, 'Nike Joyride Dual Run', 'NIKE', 'KIDS', 'RUNNING', 110.00, 0, 3, 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/33888130-0320-41a1-ba53-a026decd8aa2/joyride-dual-run-big-kids-running-shoe-1HDJF8.jpg', 'nike-joyride-dual-run'),
(113, 'Nike Renew Run', 'NIKE', 'KIDS', 'RUNNING', 80.00, 1, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-73e54c0b-11a6-478b-9f90-bd97fcde872d/renew-run-big-kids-running-shoe-5Bpz93.jpg', 'nike-renew-run'),
(114, 'Bridgport Advice', 'HUSHPUPPIES', 'MEN', 'FORMAL', 30.00, 1, 4, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/BRIDGPORT_ADVICE-BLACK_1_800x800.jpg?v=1576567903', 'bridgport-advice'),
(115, 'Beck', 'HUSHPUPPIES', 'MEN', 'FORMAL', 80.00, 1, 5, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/Beck-Black_800x800.jpg', 'beck'),
(116, 'Fester', 'HUSHPUPPIES', 'MEN', 'FORMAL', 70.00, 1, 6, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/fester-Tan_800x800.jpg?v=1575537531', 'fester'),
(117, 'Pixel', 'HUSHPUPPIES', 'MEN', 'FORMAL', 75.00, 1, 7, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/PIXEL-TAN_800x800.jpg?v=1577420506', 'pixel'),
(118, 'Austin', 'HUSHPUPPIES', 'MEN', 'FORMAL', 75.00, 1, 2, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/Austin-Coffee_800x800.jpg?v=1574772988', 'austin'),
(119, 'SS-HL-0135', 'HUSHPUPPIES', 'WOMEN', 'FORMAL', 30.00, 1, 6, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/009240000-11-SS-HL-0135-Black_800x800.jpg?v=1572264270', 'ss-hl-0135'),
(120, 'SS-HL-0136', 'HUSHPUPPIES', 'WOMEN', 'FORMAL', 50.00, 1, 4, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/009250000-779-SS-HL-0136-Coffee_800x800.jpg?v=1571900372', 'ss-hl-0136'),
(121, 'SS-HL-0128', 'HUSHPUPPIES', 'WOMEN', 'FORMAL', 35.00, 1, 3, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/000300242-484-SS-HL-0128-Blue_800x800.jpg?v=1583235174', 'ss-hl-0128'),
(122, 'SS-MS-0075', 'HUSHPUPPIES', 'WOMEN', 'CASUAL', 25.00, 1, 7, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/009170000-479-SS-MS-0075-Red_800x800.jpg?v=1570688687', 'ss-ms-0075'),
(123, 'SS-MS-0075', 'HUSHPUPPIES', 'WOMEN', 'CASUAL', 35.00, 1, 4, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/009170000-615-SS-MS-0075-TAN_800x800.jpg?v=1570688687', 'ss-ms-0075'),
(124, 'SS-PM-0093', 'HUSHPUPPIES', 'WOMEN', 'CASUAL', 30.00, 1, 3, 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/SS-PM-0093_1_800x800.jpg?v=1570601253', 'ss-pm-0093'),
(125, 'Nizza X Disney', 'ADIDAS', 'KIDS', 'CASUAL', 55.00, 1, 6, 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/ef901c7aeac042578eceab9d0159196c_9366/Nizza_x_Disney_Sport_Goofy_Shoes_White_FW0651_01_standard.jpg', 'nizza-x-disney'),
(126, 'X_PLR', 'ADIDAS', 'KIDS', 'CASUAL', 65.00, 1, 5, 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/a36518227134495da766ab9d01772fa2_9366/X_PLR_Shoes_Red_FY9063_01_standard.jpg', 'x_plr'),
(127, 'Stan Smith', 'ADIDAS', 'KIDS', 'CASUAL', 55.00, 1, 3, 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/d0720712d81e42b1b30fa80800826447_9366/Stan_Smith_Shoes_White_M20607_M20607_01_standard.jpg', 'stan-smith'),
(128, 'NMD_R1', 'ADIDAS', 'KIDS', 'RUNNING', 120.00, 1, 3, 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/99ca762cb9054caf82fbabc500fd146e_9366/NMD_R1_Shoes_Blue_FY9392_01_standard.jpg', 'nmd_r1'),
(129, 'NMD_R1 Flash Red', 'ADIDAS', 'WOMEN', 'CASUAL', 140.00, 1, 5, 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/90f85768e3894aeaab67aba0014a3379_9366/NMD_R1_Shoes_Red_FY9389_01_standard.jpg', 'nmd_r1-flash-red'),
(130, 'Superstar', 'ADIDAS', 'WOMEN', 'CASUAL', 90.00, 1, 3, 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/12365dbc7c424288b7cdab4900dc7099_9366/Superstar_Shoes_White_FW3553_FW3553_01_standard.jpg', 'superstar'),
(131, 'Club C Revenge Mens', 'Reebok', 'MEN', 'CASUAL', 70.00, 1, 3, 'https://assets.reebok.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/7599294868804d78a1b1ab6f01718a5e_9366/Club_C_Revenge_Men\'s_Shoes_White_FV9877_01_standard.jpg', 'club-c-revenge-mens'),
(132, 'SK80-Low', 'Vans', 'MEN', 'CASUAL', 60.00, 1, 3, 'https://images.vans.com/is/image/Vans/UUK24I-HERO?$583x583$', 'sk80-low'),
(133, 'Michael Feburary SK8-Hi', 'Vans', 'MEN', 'CASUAL', 72.00, 1, 3, 'https://images.vans.com/is/image/Vans/MV122M-HERO?$583x583$', 'michael-feburary-sk8-hi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Phone_number` int(10) NOT NULL,
  `Member_Since` date NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `First_Name`, `Last_Name`, `email`, `Phone_number`, `Member_Since`, `password`) VALUES
(1, 'Shalin', 'Bhattarai', 'admin@gmail.com', 1234567890, '2024-12-11', '$2y$10$OAYi7AO3/VKg8Fxw8EVlouieyTY5X80um0saFwLl0lSWhZxWaCb4G'),
(2, 'Rhicha', 'Rupakheti', 'aaaa@gmail.com', 1111111111, '2024-12-11', '$2y$10$sSPc1Cg1DfYcj1PM/UDaoONnmhXVGPeYRrsdLuPKWSDGuRIDGhviy'),
(3, 'ankit', 'regmi', 'aaaaa@gmail.com', 1234569870, '2024-12-11', '$2y$10$dpgZP7etOxtIaz6eFEh0Huf5qJLGaAFbbIOh6txxzu33s7864ZEAe'),
(4, 'reaid', 'adada', 'ababa@gmail.com', 1234567891, '2024-12-11', '$2y$10$R9mCzdiCeY20Z5r8EpKKae9FrWnn/0wJ1gWCgaBgnsP/GF6I2OGMu'),
(5, 'Whatsupp', 'nothing', 'funny@gmail.com', 2147483647, '2024-12-12', 'funny123'),
(6, 'Shalin', 'Bhattarai', 'bhattaraishalin10@gmail.com', 1234567890, '2024-12-12', 'shalinshalin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD CONSTRAINT `credit_cards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
