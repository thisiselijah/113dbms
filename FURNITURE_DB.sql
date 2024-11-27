-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 11 月 27 日 07:31
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `FURNITURE_DB`
--

-- --------------------------------------------------------

--
-- 資料表結構 `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `merchandise_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `merchandise_id`, `quantity`, `created_at`) VALUES
(1, 1, 1, 2, '2024-11-10 16:00:00'),
(2, 1, 3, 1, '2024-11-11 16:00:00'),
(3, 1, 2, 1, '2024-11-12 16:00:00'),
(4, 2, 4, 1, '2024-11-13 16:00:00'),
(5, 3, 5, 1, '2024-11-14 16:00:00'),
(6, 3, 2, 1, '2024-11-15 16:00:00'),
(7, 3, 5, 1, '2024-11-16 16:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'chair'),
(2, 'table'),
(3, 'decoration'),
(4, 'bedding'),
(5, 'lamps');

-- --------------------------------------------------------

--
-- 資料表結構 `merchandises`
--

CREATE TABLE `merchandises` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `merchandises`
--

INSERT INTO `merchandises` (`id`, `category_id`, `name`, `description`, `price`, `stock_quantity`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 2, '高腳桌', '這款高腳桌結合現代設計與實用功能，是家中或商業空間的理想選擇。以堅固耐用的材質製成，桌面光滑易清潔，並搭配穩固的金屬或木質桌腳，提供穩定的支撐結構。其簡約大方的外觀可輕鬆融入多種裝潢風格，無論是餐廳、咖啡廳，還是居家用餐區或工作角落，都能展現出時尚品味。', 800.00, 3, 'assets/img/product/table/高腳桌.png', '2024-11-10 16:00:00', '2024-11-10 16:00:00'),
(2, 2, '典雅矮木桌', '這款典雅矮木桌以細膩工藝與高品質木材打造，完美結合實用性與美觀性，是居家生活中不可或缺的家具。採用天然木紋設計，每一張桌子都展現獨特的自然風格，為空間注入溫暖與質感。無論用於喝茶、閱讀、休息，或作為家中的點綴家具，這款矮木桌都能輕鬆提升空間的格調與功能性。立即擁有，為您的家增添自然與典雅的氣息！', 650.00, 2, 'assets/img/product/table/典雅矮木桌.png', '2024-08-12 16:00:00', '2024-08-14 16:00:00'),
(3, 3, '陶瓷花盆', '這款陶瓷花盆以精緻工藝打造，結合實用性與藝術美感，是綠植愛好者的不二之選。採用高品質陶瓷燒製，表面光滑細膩，手感舒適，展現出經典與現代兼容的設計風格。放置在客廳、陽台還是辦公空間，這款陶瓷花盆都能提升環境的自然氣息與美感。', 600.00, 4, 'assets/img/product/decoration/陶瓷花盆.png', '2024-07-20 16:00:00', '2024-08-20 16:00:00'),
(4, 1, '歐式白絨椅', '這款歐式白絨椅將奢華與舒適完美融合，是居家或商業空間的典雅之選。椅身採用優質柔軟的白色絨面材質，觸感細膩，帶來絕佳的舒適體驗；搭配流線型設計與精緻雕花細節，彰顯歐式經典之美。不僅是功能性座椅，更是提升空間品味的藝術品。', 279.00, 5, 'assets/img/product/chair/歐式白絨椅.png', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(5, 1, '斑馬條紋椅', '這款斑馬條紋椅以時尚大膽的設計為特色，為您的空間帶來一抹俐落且具野性魅力的風采。椅面採用高品質布料印製黑白斑馬條紋，耐用且不易褪色，搭配堅固穩定的椅腳結構，兼具舒適與美觀。無論單獨擺放還是成組搭配，皆能成為空間的視覺亮點。', 299.00, 2, 'assets/img/product/chair/斑馬條紋椅.png', '2024-06-14 16:00:00', '2024-07-16 16:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `merchandise_reviews`
--

CREATE TABLE `merchandise_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `merchandise_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `commit` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `merchandise_reviews`
--

INSERT INTO `merchandise_reviews` (`id`, `user_id`, `merchandise_id`, `rank`, `commit`, `created_at`) VALUES
(1, 1, 1, 4, '實用又時尚的設計！這款高腳桌非常適合我的小公寓，節省空間且看起來很有設計感。搭配高腳椅後，用來用餐或工作都很舒適，材質耐用又容易清潔，完全值得入手！', '2024-11-29 16:00:00'),
(2, 3, 2, 5, '木紋質感很好，矮桌高度剛好，無論用來喝茶還是放書都很合適。', '2024-11-30 16:00:00'),
(3, 2, 3, 5, '放在陽台或客廳都很漂亮，提升空間質感！', '2024-12-01 16:00:00'),
(4, 2, 4, 1, '爛東西狗都不買', '2024-12-02 16:00:00'),
(5, 1, 5, 2, '我特別喜歡它的簡約風格，讓家裡的吧台區域看起來更加時尚。材質的質感也超乎我的預期，非常推薦給喜歡現代感家居的人！', '2024-12-03 16:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','completed','canceled') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'pending', 3550.00, '2024-11-19 16:00:00', '2024-11-19 16:00:00'),
(2, 2, 'completed', 1099.00, '2024-11-20 16:00:00', '2024-11-20 16:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `merchandise_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `merchandise_id`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 3),
(3, 2, 3, 1),
(4, 2, 5, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `identity` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `email`, `phone_number`, `identity`, `created_at`, `updated_at`) VALUES
(1, 'abcd123', 'password', 'Andy', 'abcd123@gmail.com', '0955779150', 'user', '2024-01-14 16:00:00', '2024-05-27 16:00:00'),
(2, 'rojack2486', '0x12345678', 'Jack', 'rojack2486@gmail.com', '0961730255', 'admin', '2024-03-20 16:00:00', '2024-07-18 16:00:00'),
(3, 'youaresobig321', 'idol45510', 'Beck', 'youaresobig321@gmail.com', '0963443721', 'user', '2024-06-29 16:00:00', '2024-08-16 16:00:00');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_ibfk_1` (`user_id`),
  ADD KEY `carts_ibfk_2` (`merchandise_id`);

--
-- 資料表索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `merchandises`
--
ALTER TABLE `merchandises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchandises_ibfk_1` (`category_id`);

--
-- 資料表索引 `merchandise_reviews`
--
ALTER TABLE `merchandise_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchandise_reviews_ibfk_1` (`user_id`),
  ADD KEY `merchandise_reviews_ibfk_2` (`merchandise_id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- 資料表索引 `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_ibfk_1` (`order_id`),
  ADD KEY `order_items_ibfk_2` (`merchandise_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`merchandise_id`) REFERENCES `merchandises` (`id`);

--
-- 資料表的限制式 `merchandises`
--
ALTER TABLE `merchandises`
  ADD CONSTRAINT `merchandises_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- 資料表的限制式 `merchandise_reviews`
--
ALTER TABLE `merchandise_reviews`
  ADD CONSTRAINT `merchandise_reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `merchandise_reviews_ibfk_2` FOREIGN KEY (`merchandise_id`) REFERENCES `merchandises` (`id`);

--
-- 資料表的限制式 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- 資料表的限制式 `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`merchandise_id`) REFERENCES `merchandises` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
