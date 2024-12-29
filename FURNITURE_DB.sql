-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-12-28 17:52:09
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `furniture_db`
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
(5, 3, 5, 1, '2024-11-14 16:00:00'),
(6, 3, 2, 1, '2024-11-15 16:00:00'),
(7, 3, 5, 1, '2024-11-16 16:00:00'),
(14, 2, 18, 1, '2024-12-19 12:08:11'),
(16, 1, 6, 1, '2024-12-27 09:34:43'),
(17, 1, 7, 1, '2024-12-27 09:34:55'),
(18, 1, 1, 1, '2024-12-28 15:02:33');

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
(1, 2, '高腳桌', '這款高腳桌結合現代設計與實用功能，是家中或商業空間的理想選擇。以堅固耐用的材質製成，桌面光滑易清潔，並搭配穩固的金屬或木質桌腳，提供穩定的支撐結構。其簡約大方的外觀可輕鬆融入多種裝潢風格，無論是餐廳、咖啡廳，還是居家用餐區或工作角落，都能展現出時尚品味。', 800.00, 3, 'assets/img/product/table/高腳桌.png', '2024-11-10 16:00:00', '2024-12-26 16:10:12'),
(2, 2, '典雅矮木桌', '這款典雅矮木桌以細膩工藝與高品質木材打造，完美結合實用性與美觀性，是居家生活中不可或缺的家具。採用天然木紋設計，每一張桌子都展現獨特的自然風格，為空間注入溫暖與質感。無論用於喝茶、閱讀、休息，或作為家中的點綴家具，這款矮木桌都能輕鬆提升空間的格調與功能性。立即擁有，為您的家增添自然與典雅的氣息！', 65.00, 2, 'assets/img/product/table/典雅矮木桌.png', '2024-08-12 16:00:00', '2024-12-26 16:11:53'),
(3, 3, '陶瓷花盆', '這款陶瓷花盆以精緻工藝打造，結合實用性與藝術美感，是綠植愛好者的不二之選。採用高品質陶瓷燒製，表面光滑細膩，手感舒適，展現出經典與現代兼容的設計風格。放置在客廳、陽台還是辦公空間，這款陶瓷花盆都能提升環境的自然氣息與美感。', 600.00, 4, 'assets/img/product/decoration/陶瓷花盆.png', '2024-07-20 16:00:00', '2024-08-20 16:00:00'),
(4, 1, '歐式白絨椅', '這款歐式白絨椅將奢華與舒適完美融合，是居家或商業空間的典雅之選。椅身採用優質柔軟的白色絨面材質，觸感細膩，帶來絕佳的舒適體驗；搭配流線型設計與精緻雕花細節，彰顯歐式經典之美。不僅是功能性座椅，更是提升空間品味的藝術品。', 279.00, 5, 'assets/img/product/chair/歐式白絨椅.png', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(5, 1, '斑馬條紋椅', '這款斑馬條紋椅以時尚大膽的設計為特色，為您的空間帶來一抹俐落且具野性魅力的風采。椅面採用高品質布料印製黑白斑馬條紋，耐用且不易褪色，搭配堅固穩定的椅腳結構，兼具舒適與美觀。無論單獨擺放還是成組搭配，皆能成為空間的視覺亮點。', 299.00, 2, 'assets/img/product/chair/斑馬條紋椅.png', '2024-06-14 16:00:00', '2024-07-16 16:00:00'),
(6, 1, '木製簡約沙發', '採用天然實木框架與舒適坐墊設計，展現質樸與溫暖氣息。簡約線條適合多種家居風格，兼具耐用性與美觀，是打造舒適生活空間的理想選擇。', 599.00, 9, 'assets/img/product/chair/木製簡約沙發.jpg', '2024-07-12 16:00:00', '2024-07-16 16:00:00'),
(7, 1, '亞麻布單椅-深灰', '簡約設計搭配高質感亞麻布料，透氣舒適且耐用。沉穩深灰色調百搭各類空間，穩固結構提供優越支撐，是實用與美觀兼具的理想座椅選擇。', 399.00, 2, 'assets/img/product/chair/亞麻布單椅-深灰.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(8, 1, '相思木圓椅', '採用優質相思木打造，展現天然木紋與溫潤質感。圓潤造型兼具舒適與美感，穩固耐用，適合用於餐廳或客廳，為居家增添自然典雅的氛圍。', 299.00, 10, 'assets/img/product/chair/相思木圓椅.jpg', '2024-06-14 16:00:00', '2024-07-16 16:00:00'),
(9, 1, '原木腳燈心絨腳蹬-紅', '結合溫潤原木腳架與柔軟燈心絨坐墊，帶來舒適與穩定性。鮮紅色系增添空間活力，是實用與美觀兼備的家居良品。', 399.00, 8, 'assets/img/product/chair/原木腳燈心絨腳蹬-紅.jpg', '2024-09-22 16:00:00', '2024-12-26 16:21:46'),
(10, 1, '高椅背和室沙發', '低座設計結合高椅背支撐，提供絕佳舒適感。簡約造型與多色選擇，完美融入和室、客廳等空間，是實用與時尚兼具的理想家具。', 799.00, 6, 'assets/img/product/chair/高椅背和室沙發.jpg', '2024-08-14 16:00:00', '2024-08-15 16:00:00'),
(11, 1, '矮凳(深灰)', '小巧實用，採用穩固結構與柔軟布料設計，兼具舒適與耐用。深灰色系百搭各種空間風格，是居家休憩、換鞋或臨時座位的理想選擇。', 199.00, 5, 'assets/img/product/chair/矮凳(深灰).jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(12, 1, '懶骨頭', '懶骨頭沙發，柔軟填充材質與符合人體工學的設計，提供全方位包覆與舒適感。輕巧可移動，適合客廳、臥室等空間，讓您輕鬆享受隨性放鬆的居家時光。', 229.00, 2, 'assets/img/product/chair/懶骨頭.jpg', '2024-07-12 16:00:00', '2024-07-16 16:00:00'),
(13, 2, '工業風三抽書桌', '結合金屬框架與質感木紋桌面，展現穩固與時尚美感。三個抽屜提供實用收納空間，適合工作、學習使用，為您的空間增添現代工業風魅力。', 599.00, 3, 'assets/img/product/table/工業風三抽書桌.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(14, 2, '工業風圓茶几-黑色', '採用金屬框架與耐用桌面設計，簡約中帶有粗獷質感。圓形設計節省空間且易於搭配，完美融入工業風或現代風格的客廳與休憩區域。', 299.00, 7, 'assets/img/product/table/工業風圓茶几-黑色.jpg', '2024-06-14 16:00:00', '2024-07-16 16:00:00'),
(15, 2, '方形木質餐桌', '採用高品質木材打造，紋理自然溫潤，結構穩固耐用。簡約方正設計適合各種用餐空間，提供寬敞桌面，實現家人聚餐與日常生活的完美平衡。', 799.00, 4, 'assets/img/product/table/方形木質餐桌.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(16, 2, '希臘風石桌', '結合石材質感與簡約設計，展現天然美與藝術氣息。堅固耐用，適合室內外擺放，為空間增添優雅與獨特風格，是實用與美學兼具的傢俱選擇。', 749.00, 9, 'assets/img/product/table/希臘風石桌.png', '2024-08-14 16:00:00', '2024-08-15 16:00:00'),
(17, 2, '典雅矮木桌', '這款典雅矮木桌以細膩工藝與高品質木材打造，完美結合實用性與美觀性，是居家生活中不可或缺的家具。採用天然木紋設計，每一張桌子都展現獨特的自然風格，為空間注入溫暖與質感。無論用於喝茶、閱讀、休息，或作為家中的點綴家具，這款矮木桌都能輕鬆提升空間的格調與功能性。立即擁有，為您的家增添自然與典雅的氣息！', 839.00, 2, 'assets/img/product/table/典雅矮木桌.png', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(18, 2, '俄羅斯疊層桌', '靈感源自俄羅斯套娃，層層堆疊設計靈活實用，可自由組合為茶几、收納桌等。木質紋理自然典雅，兼具創意與功能，是居家空間的理想選擇。', 719.00, 10, 'assets/img/product/table/俄羅斯疊層桌.png', '2024-07-12 16:00:00', '2024-07-16 16:00:00'),
(19, 2, '高腳桌', '這款高腳桌結合現代設計與實用功能，是家中或商業空間的理想選擇。以堅固耐用的材質製成，桌面光滑易清潔，並搭配穩固的金屬或木質桌腳，提供穩定的支撐結構。其簡約大方的外觀可輕鬆融入多種裝潢風格，無論是餐廳、咖啡廳，還是居家用餐區或工作角落，都能展現出時尚品味', 599.00, 8, 'assets/img/product/table/高腳桌.png', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(20, 2, '現代簡約玻璃餐桌 會議桌', '採用高透光強化玻璃與金屬框架設計，穩固耐用且具時尚感。寬敞桌面適用於用餐或會議，百搭現代空間，提升功能性與空間質感。', 699.00, 6, 'assets/img/product/table/現代簡約玻璃餐桌 會議桌.jpg', '2024-06-14 16:00:00', '2024-07-16 16:00:00'),
(21, 2, '歐式圓桌', '宛如宮廷藝術的極致呈現！精雕細琢的桌腳與華麗桌面設計，散發貴族般的奢華氣息。無論是品味下午茶還是舉辦盛宴，皆能彰顯您無與倫比的高雅品味與生活格調！', 699.00, 5, 'assets/img/product/table/歐式圓桌.png', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(22, 2, '橡木矮圓桌', '以天然橡木精工打造，紋理如藝術品般迷人！圓潤設計展現高雅與溫潤氣息，穩固結構堅如磐石。無論是點綴空間還是實用擺設，這款矮圓桌皆是品質與美感的極致化身！', 499.00, 2, 'assets/img/product/table/橡木矮圓桌.png', '2024-08-14 16:00:00', '2024-08-15 16:00:00'),
(23, 3, 'LED 永生花束裝飾玻璃盅', '精緻花朵與柔和燈光交織，營造浪漫夢幻氛圍。玻璃盅內的永生花朵無需維護，長久保持美麗，無論擺放在客廳或書桌，都能為空間增添一抹恆久的自然與光彩。', 399.00, 3, 'assets/img/product/decoration/LED 永生花束裝飾玻璃盅.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(24, 3, '人造多肉陶瓷盆栽', '細緻的多肉植物模擬真實，生動自然，陶瓷盆栽簡約時尚，適合各種居家風格。無需澆水與陽光照射，長期保持綠意與活力，為您的空間增添一份清新和生氣。', 399.00, 7, 'assets/img/product/decoration/人造多肉陶瓷盆栽.jpg', '2024-07-12 16:00:00', '2024-07-16 16:00:00'),
(25, 3, '心型實木盒', '精緻工藝雕刻，每一寸木紋都散發著自然的魅力與溫暖。宛如愛情的象徵，這款盒子不僅是儲物的佳選，更是一件藝術品，將您的珍貴回憶永遠珍藏，完美詮釋愛與品味的融合。', 279.00, 4, 'assets/img/product/decoration/心型實木盒.png', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(26, 3, '木製桌上鏡', '精雕細琢的天然木框與鏡面交織成完美藝術品，宛如一件瑰麗的家居珠寶。每一個細節都散發著奢華與品味，無論是化妝、梳理還是裝飾，都能提升您空間的華麗氣息！', 189.00, 9, 'assets/img/product/decoration/木製桌上鏡.jpg', '2024-06-14 16:00:00', '2024-07-16 16:00:00'),
(27, 3, '白鑽相框', '精緻無瑕的設計，鑲嵌閃耀的白鑽，猶如捕捉每一個美好瞬間的藝術品。無論擺放於何處，皆散發著奢華與優雅，將每一張照片都變成永恆的珍寶，彰顯非凡品味與格調。', 259.00, 2, 'assets/img/product/decoration/白鑽相框.png', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(28, 3, '米蘭草裝飾樹球', '彷彿來自夢幻花園的瑰寶，精緻草葉編織成完美圓球，綠意盎然，生機勃勃。這款樹球如同藝術品般高雅，為空間注入無限活力與奢華，瞬間提升品味與格調，完美裝點每一角落！', 249.00, 10, 'assets/img/product/decoration/米蘭草裝飾樹球.jpg', '2024-08-14 16:00:00', '2024-08-15 16:00:00'),
(29, 3, '迷你人造盆栽-仙人掌', '極致仿真設計，完美呈現自然界的堅韌與獨特！小巧盆栽精緻優雅，無需照顧卻永遠綠意盎然。它是您空間中的小型奇蹟，為每一個角落注入無限生機與個性魅力！', 319.00, 8, 'assets/img/product/decoration/迷你人造盆栽-仙人掌.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(30, 3, '陶瓷花盆', '這款陶瓷花盆以精緻工藝打造，結合實用性與藝術美感，是綠植愛好者的不二之選。採用高品質陶瓷燒製，表面光滑細膩，手感舒適，展現出經典與現代兼容的設計風格。放置在客廳、陽台還是辦公空間，這款陶瓷花盆都能提升環境的自然氣息與美感。', 379.00, 6, 'assets/img/product/decoration/陶瓷花盆.png', '2024-07-12 16:00:00', '2024-07-16 16:00:00'),
(31, 3, '愛心掛牆裝飾-DREAM', '融合溫馨愛心造型與精緻設計，散發浪漫與夢幻氣息。這款藝術掛飾不僅是牆面點綴，更象徵愛與希望，為您的居家空間增添一抹溫暖與情感的光彩。', 799.00, 5, 'assets/img/product/decoration/愛心掛牆裝飾-DREAM.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(32, 3, '鋁製石英掛牆時鐘', '現代簡約設計，精緻鋁框與清晰石英指針相結合，精准走時。無聲運行，適合各種室內環境，無論是客廳、書房或辦公室，都能為空間增添時尚與實用性。', 629.00, 2, 'assets/img/product/decoration/鋁製石英掛牆時鐘.jpg', '2024-06-14 16:00:00', '2024-07-16 16:00:00'),
(33, 3, '聖誕吊燈', '融合璀璨燈光與節日氛圍，創造溫馨浪漫的聖誕裝飾效果。精美設計，散發著柔和光暈，無論掛於天花板或聖誕樹上，都能為您的家居增添節日的魔力與歡樂氣息。', 649.00, 3, 'assets/img/product/decoration/聖誕吊燈.png', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(34, 3, '橡木組合收納櫃', '採用優質橡木打造，堅固耐用，細緻木紋展現自然美感。多層設計提供充足收納空間，靈活組合滿足不同需求，無論客廳、臥室或書房，都能有效整理，提升空間整潔感與質感。', 579.00, 7, 'assets/img/product/decoration/橡木組合收納櫃.jpg', '2024-08-14 16:00:00', '2024-08-15 16:00:00'),
(35, 3, '鐵藝花束裝置', '巧妙融合現代工藝與藝術美感，精緻鐵藝結構展現獨特風格。獨特的花束造型為空間增添動感與時尚感，是極具視覺衝擊的家居或辦公空間裝飾，帶來無限藝術氛圍。', 499.00, 4, 'assets/img/product/decoration/鐵藝花束裝置.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(36, 3, '鐵藝掛牆裝飾', '融合精緻工藝與現代設計，打造獨特的視覺效果。每一條細緻的線條與優雅的造型，為牆面增添藝術氣息，輕鬆提升空間的時尚感與品味，是家居裝飾的完美選擇。', 499.00, 9, 'assets/img/product/decoration/鐵藝掛牆裝飾.jpg', '2024-07-12 16:00:00', '2024-07-16 16:00:00'),
(37, 4, 'DAVI 靠墊-白', '採用高品質布料與柔軟填充物，提供舒適的背部支撐。簡約現代設計，色彩多樣，輕鬆搭配各種家居風格，為沙發或床鋪增添一份溫馨與舒適感。', 149.00, 2, 'assets/img/product/bedding/DAVI 靠墊-白.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(38, 4, 'DAVI 靠墊-棕', '採用高品質布料與柔軟填充物，提供舒適的背部支撐。簡約現代設計，色彩多樣，輕鬆搭配各種家居風格，為沙發或床鋪增添一份溫馨與舒適感。', 149.00, 10, 'assets/img/product/bedding/DAVI 靠墊-棕.jpg', '2024-06-14 16:00:00', '2024-07-16 16:00:00'),
(39, 4, '日式雙人床', '簡約而不失優雅，低調的木質框架與精緻設計展現極致舒適。寬敞的床面提供良好睡眠空間，無論是傳統和風或現代風格的臥室，都能輕鬆搭配，營造寧靜放鬆的居家氛圍。', 2999.00, 8, 'assets/img/product/bedding/日式雙人床.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(40, 4, '日系質感床', '簡約線條與溫暖木質框架設計，營造舒適放鬆的睡眠空間。細膩工藝與優雅色調，完美融合實用性與美學，讓每個夜晚都充滿安寧與恬靜，是現代居家的理想選擇。', 1999.00, 6, 'assets/img/product/bedding/日系質感床.jpg', '2024-08-14 16:00:00', '2024-08-15 16:00:00'),
(41, 4, '古典協奏雙人床', '融合華麗雕刻與精緻工藝，展現奢華古典風格。堅固木質框架與舒適床墊，為您提供極致的睡眠體驗。典雅設計讓臥室充滿貴族氣息，是追求優雅生活的完美選擇。', 4999.00, 5, 'assets/img/product/bedding/古典協奏雙人床.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(42, 4, '艾蒂安內崁式雙人床', '精緻的現代設計與優質材質結合，提供穩固支撐與極致舒適。內崁式床架節省空間，簡約又不失優雅，完美適配現代臥室，讓您的睡眠空間既時尚又實用。', 4999.00, 2, 'assets/img/product/bedding/艾蒂安內崁式雙人床.jpg', '2024-07-12 16:00:00', '2024-07-16 16:00:00'),
(43, 4, '沉穩爵士雙人床', '融合現代設計與經典優雅，木質床架穩固耐用，柔軟床墊帶來極致舒適。低調沉穩的色調與精緻細節，為您的臥室營造奢華與寧靜的氛圍，提升睡眠品質與空間品味。', 3999.00, 3, 'assets/img/product/bedding/沉穩爵士雙人床.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(44, 4, '菲比放克雙人床', '融合現代與復古風格，穩固框架搭配柔軟床墊，提供極致舒適的睡眠體驗。簡約設計與細緻工藝，完美融入各式臥室裝潢，讓您享受每一夜的美好休息。', 3999.00, 7, 'assets/img/product/bedding/菲比放克雙人床.jpg', '2024-06-14 16:00:00', '2024-07-16 16:00:00'),
(45, 5, '造型LED 露營燈', '宛如夜空中最亮的星，輕巧便捷，照亮每一個冒險瞬間。獨特設計結合現代科技，無論是戶外露營還是居家裝飾，都是點燃氛圍的完美之選。讓每次夜晚都充滿光明與奇蹟！', 359.00, 4, 'assets/img/product/lamp/造型LED 露營燈.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(46, 5, '造型立燈(黑)', '如同夜空中的流星劃過，簡約的黑色外觀與獨特設計，為空間注入藝術氣息。柔和光線映照下，無論是角落還是中央，都是點亮每個時刻的完美選擇，為生活增添一抹神秘光彩。', 289.00, 9, 'assets/img/product/lamp/造型立燈(黑).jpg', '2024-08-14 16:00:00', '2024-08-15 16:00:00'),
(47, 5, '復古露營燈', '重現懷舊露營時光，散發柔和光芒，仿佛引領您回到星空下的篝火旁。精緻金屬外殼與復古設計，無論是戶外探險還是室內擺設，都能增添一份經典與溫馨的氛圍。', 179.00, 2, 'assets/img/product/lamp/復古露營燈.jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(48, 5, '落地燈 (黑)', '極致簡約與現代工藝的完美結合！金屬外框散發著獨特的冷冽氣質，燈光如絲般柔和，輕易點亮任何空間。它不僅是照明，更是一件藝術品，為每一個角落增添無可比擬的奢華氛圍。', 229.00, 10, 'assets/img/product/lamp/落地燈 (黑).jpg', '2024-07-12 16:00:00', '2024-07-16 16:00:00'),
(49, 5, '落地燈(白)', '極致簡約與現代工藝的完美結合！金屬外框散發著獨特的冷冽氣質，燈光如絲般柔和，輕易點亮任何空間。它不僅是照明，更是一件藝術品，為每一個角落增添無可比擬的奢華氛圍。', 229.00, 8, 'assets/img/product/lamp/落地燈(白).jpg', '2024-09-22 16:00:00', '2024-10-23 16:00:00'),
(50, 5, '裝飾造型LED PLUM TREE燈', '猶如璀璨星空中的盛開梅花，燈光柔和而迷人，營造出夢幻般的浪漫氛圍。每一盞燈枝閃爍如珠，點亮您的空間，將精緻與奢華完美結合，成為居家裝飾的璀璨焦點！', 529.00, 6, 'assets/img/product/lamp/裝飾造型LED PLUM TREE燈.jpg', '2024-06-14 16:00:00', '2024-07-16 16:00:00');

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
(2, 1, 2, 5, '木紋質感很好，矮桌高度剛好，無論用來喝茶還是放書都很合適。', '2024-11-30 16:00:00'),
(3, 1, 3, 5, '放在陽台或客廳都很漂亮，提升空間質感！', '2024-12-01 16:00:00'),
(4, 1, 4, 1, '爛東西狗都不買', '2024-12-02 16:00:00'),
(5, 1, 5, 2, '我特別喜歡它的簡約風格，讓家裡的吧台區域看起來更加時尚。材質的質感也超乎我的預期，非常推薦給喜歡現代感家居的人！', '2024-12-03 16:00:00'),
(6, 1, 6, 3, '這張沙發坐起來很普通', '2024-12-26 16:00:00'),
(7, 1, 7, 5, '椅子的做工有到', '2024-12-26 16:00:00'),
(8, 1, 8, 1, '不是啊，品質那麼差。', '2024-12-26 16:00:00'),
(9, 1, 9, 2, '材質普通', '2024-12-26 16:00:00'),
(10, 1, 1, 3, '椅子具有良好的支撐性，尤其是對脊椎的支撐非常到位。可以調整的部分很多，能夠根據個人的需求進行調整，找到最舒適的坐姿。', '2024-12-26 16:00:00'),
(11, 1, 2, 5, '做工品質良好', '2024-12-26 16:00:00'),
(12, 1, 3, 2, '這什麼爛貨', '2024-12-26 16:00:00'),
(13, 1, 1, 3, '普普通通', '2024-12-26 16:00:00'),
(14, 1, 1, 5, '十分推薦', '2024-12-26 16:00:00'),
(15, 1, 1, 5, '品質相當良好', '2024-12-26 16:00:00'),
(16, 3, 7, 4, 'CP值高', '2024-12-26 16:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','completed','canceled','confirmed','processing') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `payment` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_price`, `address`, `payment`, `created_at`, `updated_at`) VALUES
(1, 1, 'pending', 3550.00, '台北市中正區仁愛路三段123號', 'cash_on_delivery', '2024-11-19 16:00:00', '2024-12-19 01:43:02'),
(2, 2, 'completed', 1099.00, '新北市板橋區中山路一段99號', 'cash_on_delivery', '2024-11-20 16:00:00', '2024-12-19 01:42:51'),
(3, 1, 'completed', 2850.00, '彰化縣二林鎮', 'cash_on_delivery', '2024-12-18 06:21:25', '2024-12-19 04:36:22'),
(4, 2, 'canceled', 279.00, '彰化縣鹿港鎮', 'cash_on_delivery', '2024-12-18 14:43:30', '2024-12-27 11:18:05'),
(5, 1, 'confirmed', 798.00, '台南市東區', 'cash_on_delivery', '2024-12-19 09:32:19', '2024-12-19 09:32:19'),
(6, 1, 'confirmed', 399.00, '台南市東區', 'cash_on_delivery', '2024-12-19 09:33:32', '2024-12-19 09:33:32'),
(7, 1, 'confirmed', 229.00, '台南市東區', 'cash_on_delivery', '2024-12-19 09:35:14', '2024-12-19 09:35:14'),
(8, 1, 'confirmed', 229.00, '台南市東區榮譽街', 'cash_on_delivery', '2024-12-19 09:42:32', '2024-12-19 09:42:32'),
(9, 2, 'confirmed', 719.00, '台南市東區榮譽街', 'cash_on_delivery', '2024-12-19 12:08:28', '2024-12-19 12:08:28'),
(10, 1, 'canceled', 998.00, '台北信義區', 'cash_on_delivery', '2024-12-27 09:35:19', '2024-12-27 11:09:36');

-- --------------------------------------------------------

--
-- 資料表結構 `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `merchandise_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `review_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `merchandise_id`, `quantity`, `review_status`) VALUES
(1, 1, 1, 2, 0),
(2, 1, 2, 3, 0),
(3, 2, 3, 1, 1),
(4, 2, 5, 1, 1),
(5, 3, 1, 2, 1),
(6, 3, 2, 1, 1),
(7, 3, 3, 1, 1),
(8, 4, 4, 1, 0),
(9, 5, 10, 2, 0),
(10, 6, 12, 1, 0),
(11, 7, 13, 1, 0),
(12, 8, 12, 1, 0),
(13, 9, 18, 1, 0),
(14, 10, 6, 1, 0),
(15, 10, 7, 1, 0);

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
  `status` varchar(32) NOT NULL DEFAULT 'normal',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `email`, `phone_number`, `identity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abcd123', 'password', 'Andy', 'abcd123@gmail.com', '0955779150', 'user', 'normal', '2024-01-14 16:00:00', '2024-05-27 16:00:00'),
(2, 'rojack2486', '0x12345678', 'Jack', 'rojack2486@gmail.com', '0961730255', 'admin', 'normal', '2024-03-20 16:00:00', '2024-07-18 16:00:00'),
(3, 'youaresobig321', 'idol45510', 'Beck', 'youaresobig321@gmail.com', '0963443721', 'user', 'normal', '2024-06-29 16:00:00', '2024-08-16 16:00:00'),
(4, 'admin', 'admin', 'admin', 'admin@example.com', '0911111111', 'admin', 'normal', '2024-12-26 16:00:00', '2024-12-26 16:00:00'),
(5, 'user', 'user', 'user', 'user@example.com', '0922222222', 'user', 'normal', '2024-12-26 16:00:00', '2024-12-26 16:00:00');

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
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `merchandises`
--
ALTER TABLE `merchandises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `merchandise_reviews`
--
ALTER TABLE `merchandise_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
