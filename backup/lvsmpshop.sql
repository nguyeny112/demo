-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2017 at 10:09 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lvsmpshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `ads_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `ads_link`, `ads_title`, `ads_image`, `ads_desc`, `created_at`, `updated_at`) VALUES
(1, 'http://google.com', 'Google.com', 'advert/ad1.gif', 'This is Google', '2017-04-06 18:55:48', '2017-04-06 18:55:48'),
(2, 'http://facebook.com', 'Facebook.com', 'advert/ad2.gif', 'This is Facebook', '2017-04-06 18:55:48', '2017-04-06 18:55:48'),
(3, 'http://twitter.com', 'Twitter.com', 'advert/ad3.gif', 'This is Twitter', '2017-04-06 18:55:48', '2017-04-06 18:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_desc`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'Apple Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(2, 'Samsung', 'Samsung Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(3, 'LG', 'LG Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(4, 'Nokia', 'Nokia Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(5, 'Asus', 'Asus Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(6, 'Xiaomi', 'Xiaomi Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(7, 'Others', 'Others Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_desc`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', 'Smartphone Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(2, 'Tablet', 'Tablet Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(3, 'Smart Watch', 'Smart Watch Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(4, 'Other Smart Devices', 'Other Smart Devices Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(5, 'Accesories', 'Accesories Description', '2017-04-06 18:55:46', '2017-04-06 18:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_email`, `contact_phone`, `contact_title`, `contact_detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Doe John', 'levienthuong@gmail.com', '123123', 'Invite To The party', 'Something Here', 1, '2017-04-06 18:55:48', '2017-04-06 19:04:02'),
(2, 'Linh Le', 'aeqweqwe@gmail.com', '123123', 'May I Ask you Something?', 'Others......', 0, '2017-04-06 18:55:48', '2017-04-06 18:55:48'),
(3, 'Van Nguyen', '123123@gmail.com', '123123', 'Just a little question', 'Well.....', 0, '2017-04-06 18:55:48', '2017-04-06 18:55:48'),
(4, 'Luong Tran', 'tranluong@gmail.com', '123123', 'Dear Sir, Can you do me a favour', 'Just make it easier', 0, '2017-04-06 18:55:48', '2017-04-06 18:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `featured_sliders`
--

CREATE TABLE `featured_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buttontext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'More',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_sliders`
--

INSERT INTO `featured_sliders` (`id`, `image_path`, `title`, `desc`, `link`, `buttontext`, `created_at`, `updated_at`) VALUES
(1, 'slide/slide1.jpg', 'Xiaomi Lastest Smartphone Model', 'Finally Released! Check it out now!', 'http://link1', 'More', '2017-04-06 18:55:49', '2017-04-06 18:55:49'),
(2, 'slide/slide2.jpg', 'Iphone 7 Best Price', 'Only available in SMP Shop, shocking price', 'http://link2', 'More', '2017-04-06 18:55:49', '2017-04-06 18:55:49'),
(3, 'slide/slide3.jpg', 'Ipad 3 - Grab One for you now', 'Brandnew, the must have devices for any family', 'http://link3', 'More', '2017-04-06 18:55:49', '2017-04-06 18:55:49'),
(4, 'slide/slide4.jpg', 'Motorola 360', 'A beautiful smartwatch, modern but still classic', 'http://link4', 'More', '2017-04-06 18:55:49', '2017-04-06 18:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `image_lists`
--

CREATE TABLE `image_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(731, '2014_10_12_000000_create_users_table', 1),
(732, '2014_10_12_100000_create_password_resets_table', 1),
(733, '2017_03_21_120227_create_categories_table', 1),
(734, '2017_03_21_121651_create_brands_table', 1),
(735, '2017_03_21_124019_create_products_table', 1),
(736, '2017_03_21_202741_create_payments_table', 1),
(737, '2017_03_21_212004_create_orders_table', 1),
(738, '2017_03_21_215506_create_order_details_table', 1),
(739, '2017_03_21_221435_create_contacts_table', 1),
(740, '2017_03_21_221448_create_advertisements_table', 1),
(741, '2017_03_25_154110_create_theme_options_table', 1),
(742, '2017_03_25_205004_create_image_lists_table', 1),
(743, '2017_03_27_145938_create_featured_sliders_table', 1),
(744, '2017_03_30_101117_create_social_users_table', 1),
(745, '2017_04_03_183512_create_shoppingcart_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useraddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useremail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anything@gmail.com',
  `moreinfo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `useraddress`, `userphone`, `fullname`, `useremail`, `moreinfo`, `payment_id`, `status`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'admin', '446 Nguyen Luong Bang TP Da Nang', '0935579194', 'Le Vien Thuong', 'upton.camren@sawayn.biz', 'Fast Please', 2, 2, 27000000, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(2, 'Guest', '759 Toy Greens Apt. 793\nAddisonbury, AR 88673', '217.952.1516 x83982', 'Prof. Vickie Altenwerth DDS', 'favian46@stroman.org', 'Caterpillar called after her. ''I''ve something important to say!'' This sounded promising,.', 2, 2, 8900000, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(3, 'Guest', '51180 Fisher Squares\nSouth Clydeshire, TX 80999-7882', '(761) 388-6497', 'Branson Bashirian', 'stanford.watsica@kessler.com', 'I''ve often seen a good opportunity for making her escape; so she felt that this could not think of.', 2, 0, 14600000, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(4, 'Guest', '315 Torp Mall\nMurraymouth, PA 36141-6099', '503-880-8869 x9503', 'Allan Kohler', 'swaniawski.felicity@yahoo.com', 'Alice. ''Only a thimble,'' said Alice a little way forwards each time and a long sleep you''ve had!''.', 2, 2, 16100000, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(5, 'admin', '6324 Considine Viaduct Apt. 319\nNew Jaeden, IL 39922-4975', '(454) 252-3146', 'Rowan Nicolas', 'jaleel.beer@schneider.net', 'Mouse, turning to Alice a good deal frightened at the White Rabbit as he found it so quickly that.', 3, 2, 10900000, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(6, 'mod', '579 Orville Way\nWest Yeseniaburgh, SC 80492', '+1-758-605-4763', 'Trent Lehner', 'thea.lindgren@thiel.net', 'Rabbit began. Alice thought she might as well as she could. ''No,'' said the March Hare. ''Exactly.', 3, 0, 2100000, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(7, 'Guest', '238 Tran Van Linh TP Ha Tinh', '0123332123', 'Tran Van Hoang', 'tiffany25@parker.com', 'Nothing', 1, 1, 14000000, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(8, 'Guest', '954 Ninh Ton TP Ha Long', '092512321', 'John Doe', 'drenner@bogan.com', '.....', 2, 0, 13400000, '2017-04-06 18:55:47', '2017-04-06 18:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(2, 3, 1, 5, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(3, 3, 2, 2, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(4, 2, 3, 5, '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(5, 1, 2, 2, '2017-04-06 18:55:47', '2017-04-06 18:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_name`, `payment_info`, `created_at`, `updated_at`) VALUES
(1, 'Bảo Kim', '', '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(2, 'COD', '', '2017-04-06 18:55:47', '2017-04-06 18:55:47'),
(3, 'ATM', '', '2017-04-06 18:55:47', '2017-04-06 18:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `pname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `spec` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(4) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `available` int(11) NOT NULL DEFAULT '1',
  `qty` int(11) NOT NULL DEFAULT '100',
  `cat_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `tags` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `preview`, `detail`, `spec`, `image`, `rating`, `view`, `price`, `available`, `qty`, `cat_id`, `brand_id`, `discount`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 5s', 'Iphone 5s Preview', 'Iphone 5s Detail', 'Iphone 5s Spec', 'product/smartphone/iphone5s.jpg', 4, 618, 5000000, 1, 100, 1, 1, 0, 'apple,iphone,smartphone,iphone5s', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(2, 'Iphone 6 Plus', 'Iphone 6 Plus Preview', 'Iphone 6 Plus Detail', 'Iphone 6 Plus Spec', 'product/smartphone/iphone6plus.jpg', 4, 323, 15000000, 1, 100, 1, 1, 0, 'apple,iphone,smartphone,iphone6plus', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(3, 'LG G4', 'LG G4 Preview', 'LG G4 Detail', 'LG G4 Spec', 'product/smartphone/lgg4.jpg', 4, 406, 12000000, 1, 100, 1, 3, 30, 'lg,g4,smartphone', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(4, 'Samsung Galaxy S6', 'Samsung Galaxy S6 Preview', 'Samsung Galaxy S6 Detail', 'Samsung Galaxy S6 Spec', 'product/smartphone/galaxys6.jpg', 4, 30, 16000000, 1, 100, 1, 2, 10, 'samsung,galaxy,smartphone,galaxys6', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(5, 'Xiaomi Redmi Note 4', 'Xiaomi Redmi Note 4 Preview', 'Xiaomi Redmi Note 4 Detail', 'Xiaomi Redmi Note 4 Spec', 'product/smartphone/xiaoredminote4.jpg', 3, 834, 5600000, 1, 100, 1, 6, 40, 'xiaomi,redminote4,smartphone,china', '2017-04-06 18:55:46', '2017-04-07 16:34:49'),
(6, 'Nokia Lumia 720', 'Nokia Lumia 720 Preview', 'Nokia Lumia 720 Detail', 'Nokia Lumia 720 Spec', 'product/smartphone/lumnia720.jpg', 5, 443, 9500000, 1, 100, 1, 4, 30, 'nokia,lumia,smartphone,lumia720', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(7, 'Motorola Droid Turbo', 'Motorola Droid Turbo Preview', 'Motorola Droid Turbo Detail', 'Motorola Droid Turbo Spec', 'product/smartphone/droidturbo.jpg', 4, 233, 10250000, 1, 100, 1, 7, 30, 'motorola,droid,smartphone,droidturbo,other', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(8, 'Asus Zenphone 5', 'Asus Zenphone 5 Preview', 'Asus Zenphone 5 Detail', 'Asus Zenphone 5 Spec', 'product/smartphone/zenphone5.jpg', 4, 353, 6500000, 1, 100, 1, 5, 10, 'asus,zenphone,smartphone,zenphone5', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(9, 'LG Prada 3.0', 'LG Prada 3.0 Preview', 'LG Prada 3.0 Detail', 'LG Prada 3.0 Spec', 'product/smartphone/prada3.jpg', 4, 462, 6000000, 1, 100, 1, 3, 0, 'lg,prada,smartphone,prada3', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(10, 'OPPO R7 Plus', 'OPPO R7 Plus Preview', 'OPPO R7 Plus Detail', 'OPPO R7 Plus Spec', 'product/smartphone/oppor7plus.jpg', 4, 568, 12000000, 1, 100, 1, 7, 30, 'oppo,china,smartphone,r7plus', '2017-04-06 18:55:46', '2017-04-07 16:40:13'),
(11, 'Ipad Mini 3', 'Ipad Mini 3 Preview', 'Ipad Mini 3 Detail', 'Ipad Mini 3 Spec', 'product/tablet/ipadmini3.jpg', 4, 579, 10000000, 1, 100, 2, 1, 0, 'apple,ipad,tablet,ipadmini3', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(12, 'iPad Pro 12.9', 'Ipad Pro Preview', 'Ipad pro Detail', 'Ipad Pro Spec', 'product/tablet/ipadpro129.jpg', 4, 888, 18000000, 1, 100, 2, 1, 30, 'apple,ipad,tablet,ipadpro', '2017-04-06 18:55:46', '2017-04-07 18:04:36'),
(13, 'Lenovo Tab 3', 'Lenovo Tab 3 Preview', 'Lenovo Tab 3 Detail', 'Lenovo Tab 3 Spec', 'product/tablet/lenovotab3.jpg', 4, 186, 2700000, 1, 100, 2, 7, 0, 'lenovo,tablet,china,lenovotab3', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(14, 'Samsung Tab A', 'Samsung Tab A Preview', 'Samsung Tab A Detail', 'Samsung Tab A Spec', 'product/tablet/samsungtaba.jpg', 4, 5, 7490000, 1, 100, 2, 2, 10, 'samsung,tablet,samsungtaba', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(15, 'Mi Pad 2', 'Mi Pad 2 Preview', 'Mi Pad 2 Detail', 'Mi Pad 2 Spec', 'product/tablet/mipad2.jpg', 5, 315, 5500000, 1, 100, 2, 6, 30, 'xiaomi,mipad,tablet,mipad2,china', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(16, 'Google Nexus 10', 'Google Nexus 10 Preview', 'Google Nexus 10 Detail', 'Google Nexus 10 Spec', 'product/tablet/googlenexus10.jpg', 5, 468, 9500000, 1, 100, 2, 7, 40, 'google,nexus,tablet,nexus10', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(17, 'Apple Watch Series 2', 'Apple Watch Series 2 Preview', 'Apple Watch Series 2 Detail', 'Apple Watch Series 2 Spec', 'product/smart-watch/applewatchseries2.jpg', 5, 314, 11990000, 1, 100, 3, 1, 20, 'apple,watch,smartwatch,applesmartwatch2', '2017-04-06 18:55:46', '2017-04-07 12:43:04'),
(18, 'Apple Watch Series 1', 'Apple Watch Series 1 Preview', 'Apple Watch Series 1 Detail', 'Apple Watch Series 1 Spec', 'product/smart-watch/applewatchseries1.jpg', 5, 774, 7990000, 1, 100, 3, 1, 30, 'apple,watch,smartwatch,applesmartwatch1', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(19, 'Motorola Moto 360', 'Moto 360 Preview', 'Moto 360 Detail', 'Moto 360 Spec', 'product/smart-watch/moto360.jpg', 5, 486, 6990000, 1, 100, 3, 7, 40, 'motorola,watch,smartwatch,moto360', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(20, 'Xiaomi Mi Band 2', 'Xiaomi Mi Band 2 Preview', 'Xiaomi Mi Band 2 Detail', 'Xiaomi Mi Band 2 Spec', 'product/smart-watch/miband2.jpg', 5, 502, 990000, 1, 100, 3, 6, 40, 'xiaomi,watch,smartwatch,miband2,china', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(21, 'Samsung Gear S3', 'Samsung Gear S3 Preview', 'Samsung Gear S3 Detail', 'Samsung Gear S3 Spec', 'product/smart-watch/gears3.jpg', 5, 34, 1290000, 1, 100, 3, 2, 40, 'samsung,watch,smartwatch,gears3,samsunggear', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(22, 'Samsung Gear S2', 'Samsung Gear S2 Preview', 'Samsung Gear S2 Detail', 'Samsung Gear S2 Spec', 'product/smart-watch/gears2.jpg', 5, 38, 890000, 1, 100, 3, 2, 30, 'samsung,watch,smartwatch,gears2,samsunggear', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(23, 'Xiaomi Pistons', 'Xiaomi Pistons Preview', 'Xiaomi Pistons Detail', 'Xiaomi Pistons Spec', 'product/accessories/xiaomipistons.jpg', 5, 459, 80000, 1, 100, 5, 6, 0, 'xiaomi,earphone,pistons,china', '2017-04-06 18:55:46', '2017-04-07 12:46:49'),
(24, 'Sennheiser HD 4.30i', 'Sennheiser HD 4.30i Preview', 'Sennheiser HD 4.30i Detail', 'Sennheiser HD 4.30i Spec', 'product/accessories/senheiserhd4.jpg', 5, 803, 2790000, 1, 100, 5, 7, 10, 'senheiser,headphone,hd4,china', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(25, 'Sony Bluetooth MDR-1RBTMK2', 'Sony Bluetooth MDR-1RBTMK2 Preview', 'Sony Bluetooth MDR-1RBTMK2 Detail', 'Sony Bluetooth MDR-1RBTMK2 Spec', 'product/accessories/sonymdr1RBTMK2.jpg', 5, 808, 7990000, 1, 100, 5, 7, 20, 'sony,headphone,mdr,bluetooth,china', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(26, 'Bluetooth Plantronics Marque 2 M165', 'Bluetooth Plantronics Marque 2 M165 Preview', 'Bluetooth Plantronics Marque 2 M165 Detail', 'Bluetooth Plantronics Marque 2 M165 Spec', 'product/accessories/plantronicmarque2.jpg', 5, 381, 7990000, 1, 100, 5, 7, 40, 'headphone,plantronics,bluetooth,plantronicmarque2', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(27, 'Romoss SENSE 6 20.000 mAh', 'Romoss SENSE 6 Preview', 'Romoss SENSE 6 Detail', 'Romoss SENSE 6 M165 Spec', 'product/accessories/romosssense6.jpg', 5, 759, 289000, 1, 100, 5, 7, 20, 'romosssense6,battery,portable,plantronics,romoss', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(28, 'Xiaomi QC 3.0 20.000mAh', 'Xiaomi QC 3.0 Preview', 'Xiaomi QC 3.0 Detail', 'Xiaomi QC 3.0 M165 Spec', 'product/accessories/xiaomiqc3.jpg', 5, 432, 929000, 1, 100, 5, 6, 30, 'xiaomi,china,battery,portable,xiaomiqc3', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(29, 'Xiaomi NDY-02-AN 10.000mAh', 'Xiaomi NDY-02-AN Preview', 'Xiaomi NDY-02-AN Detail', 'Xiaomi NDY-02-AN M165 Spec', 'product/accessories/xiaomindy02an.jpg', 5, 234, 399000, 1, 100, 5, 6, 10, 'xiaomi,china,battery,portable,xiaomindy02an', '2017-04-06 18:55:46', '2017-04-07 17:55:51'),
(30, 'Galaxy S6 Edge Plus Spigen Phone Case', 'Galaxy S6 Edge Plus Spigen Preview', 'Galaxy S6 Edge Plus Spigen Detail', 'Galaxy S6 Edge Plus Spigen Spec', 'product/accessories/samsungs6edgespigen.jpg', 5, 329, 229000, 1, 100, 5, 7, 20, 'phonecase,silicon,samsungs6edge', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(31, 'iPhone 7 Plus Case RANVOO 3 in 1', 'iPhone 7 Plus Case RANVOO 3 in 1 Preview', 'iPhone 7 Plus Case RANVOO 3 in 1 Detail', 'iPhone 7 Plus Case RANVOO 3 in 1 Spec', 'product/accessories/iphone7pluscaseranvoo.jpg', 5, 745, 329000, 1, 100, 5, 7, 0, 'phonecase,silicon,iphone7,ranvoo,apple', '2017-04-06 18:55:46', '2017-04-06 18:55:46'),
(32, 'Xiaomi Redmi Note 3 Phone Case', 'Xiaomi Redmi Note 3 Phone Case Preview', 'Xiaomi Redmi Note 3 Phone Case Detail', 'Xiaomi Redmi Note 3 Phone Case Spec', 'product/accessories/xiaomiredminote3case.jpg', 5, 570, 129000, 1, 100, 5, 7, 40, 'phonecase,silicon,xiaomi', '2017-04-06 18:55:46', '2017-04-06 18:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_users`
--

CREATE TABLE `social_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_options`
--

CREATE TABLE `theme_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `pagename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageTitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_options`
--

INSERT INTO `theme_options` (`id`, `pagename`, `address`, `phoneNumber`, `pageTitle`, `email`, `faq`, `created_at`, `updated_at`) VALUES
(1, 'SMPShop', '54 Ninh Ton - TP Da Nang, Viet Nam', '0935579194', 'SMP Shop - Buying Online was never so easy', 'levienthuong@gmail.com', NULL, '2017-04-06 18:55:48', '2017-04-06 18:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `level` tinyint(4) NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `address`, `phone`, `avatar`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Le Vien Thuong', 'admin', 'levienthuong@gmail.com', '$2y$10$1AYYDZglyS.wFrrYER8fyujq6ROc9V1ddv6iZO7ccaFlyACe5IH0W', '446 Nguyen Luong Bang - TP Da Nang', '0935579194', 'default.jpg', 1, NULL, '2017-04-06 18:55:45', '2017-04-06 18:55:45'),
(2, 'Nguyen Tu Quang', 'mod', 'quangnguyen@gmail.com', '$2y$10$xRb8up7Ed.5SNbfV2gSbDu1jIfX.v1tJlAGCUAARMFRb1g2zF76Xi', '123 Hoang Hoa Tham - TP Nha Trang', '0977123123', 'default.jpg', 2, NULL, '2017-04-06 18:55:45', '2017-04-06 18:55:45'),
(3, 'Nope', 'member', 'nope@gmail.com', '$2y$10$o/AiEhtxV4c2RVY3UblkC.WWGaMbzlAE/kGFeyaoVNdgLbuNJ5lDG', '239 Phan Chau Trinh - TP Ha Noi', '01212432423', 'default.jpg', 3, NULL, '2017-04-06 18:55:45', '2017-04-06 18:55:45'),
(4, 'Le Mem Bo', 'othermember', 'member@gmail.com', '$2y$10$5fSdEixVVWYi./cVUwlWtOHfSRiQWY7cCkSyRXWQyGQ4jAyuTPaOq', '854 Phan Boi Chau - TP Ho Chi Minh', '0979123435', 'default.jpg', 3, NULL, '2017-04-06 18:55:45', '2017-04-06 18:55:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_sliders`
--
ALTER TABLE `featured_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_lists`
--
ALTER TABLE `image_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_lists_product_id_index` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_payment_id_index` (`payment_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_index` (`product_id`),
  ADD KEY `order_details_order_id_index` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_index` (`cat_id`),
  ADD KEY `products_brand_id_index` (`brand_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `social_users`
--
ALTER TABLE `social_users`
  ADD KEY `social_users_user_id_index` (`user_id`);

--
-- Indexes for table `theme_options`
--
ALTER TABLE `theme_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `featured_sliders`
--
ALTER TABLE `featured_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `image_lists`
--
ALTER TABLE `image_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=746;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `theme_options`
--
ALTER TABLE `theme_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_lists`
--
ALTER TABLE `image_lists`
  ADD CONSTRAINT `image_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_users`
--
ALTER TABLE `social_users`
  ADD CONSTRAINT `social_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
