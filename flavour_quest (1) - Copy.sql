-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 07:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flavour_quest`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-publish, 1-unpublish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `parent_category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Pasta', NULL, 0, '2024-03-03 11:09:02', '2024-04-12 01:04:38'),
(8, NULL, 'Main Dish', '18', 0, '2024-04-11 08:24:45', '2024-04-12 01:04:35'),
(10, NULL, 'Vegetarian', NULL, 0, '2024-04-11 23:45:12', '2024-04-11 23:45:12'),
(11, NULL, 'Chicken', NULL, 0, '2024-04-12 00:04:32', '2024-04-12 00:04:32'),
(12, NULL, 'Dessert', NULL, 0, '2024-04-12 00:11:29', '2024-04-12 00:11:29'),
(13, NULL, 'Baking', NULL, 0, '2024-04-12 00:11:34', '2024-04-12 00:11:34'),
(17, NULL, 'Seafood', 'null', 0, '2024-04-12 00:28:44', '2024-04-12 00:28:44'),
(18, NULL, 'Indian', NULL, 0, '2024-04-12 00:36:48', '2024-04-12 00:36:48'),
(19, NULL, 'Street Food', 'null', 0, '2024-04-12 02:30:55', '2024-04-12 02:30:55'),
(20, NULL, 'Snack', '18', 0, '2024-04-12 02:31:04', '2024-04-12 02:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `recipe_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, '1710450762.png', '2024-03-14 15:42:42', '2024-03-14 15:42:42'),
(2, 2, '1710555187.jpg', '2024-03-15 20:43:07', '2024-03-15 20:43:07'),
(6, 1, '1710558317.png', '2024-03-15 21:35:17', '2024-03-15 21:35:17'),
(8, 1, '1710558318.png', '2024-03-15 21:35:18', '2024-03-15 21:35:18'),
(9, 1, '1710562796.webp', '2024-03-15 22:49:56', '2024-03-15 22:49:56'),
(10, 3, '1710562926.png', '2024-03-15 22:52:06', '2024-03-15 22:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-publish, 1-unpublish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `image`, `name`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Eggs', NULL, 0, '2024-03-03 13:57:56', '2024-04-12 01:04:09'),
(3, NULL, 'Cheese', 'null', 0, '2024-03-03 13:58:11', '2024-04-11 23:26:51'),
(4, NULL, 'Black Pepper', 'null', 0, '2024-03-14 14:30:49', '2024-04-11 23:27:03'),
(5, NULL, 'Olive Oil', 'null', 0, '2024-04-11 23:27:16', '2024-04-11 23:27:16'),
(6, NULL, 'Garlic', 'null', 0, '2024-04-11 23:27:25', '2024-04-11 23:27:25'),
(7, NULL, 'Carrots', 'null', 0, '2024-04-11 23:42:32', '2024-04-11 23:42:32'),
(8, NULL, 'Soy Sauce', 'null', 0, '2024-04-11 23:42:38', '2024-04-11 23:42:38'),
(9, NULL, 'Ginger', 'null', 0, '2024-04-11 23:42:49', '2024-04-11 23:42:49'),
(10, NULL, 'Breadcrumbs', 'null', 0, '2024-04-12 00:04:51', '2024-04-12 00:04:51'),
(11, NULL, 'Mozzarella Cheese', 'null', 0, '2024-04-12 00:04:55', '2024-04-12 00:04:55'),
(12, NULL, 'Flour', 'null', 0, '2024-04-12 00:05:00', '2024-04-12 00:05:00'),
(13, NULL, 'Butter', 'null', 0, '2024-04-12 00:11:47', '2024-04-12 00:11:47'),
(14, NULL, 'Vanilla Extract', 'null', 0, '2024-04-12 00:12:01', '2024-04-12 00:12:01'),
(15, NULL, 'Baking Soda', 'null', 0, '2024-04-12 00:12:07', '2024-04-12 00:12:07'),
(16, NULL, 'Chocolate Chips', 'null', 0, '2024-04-12 00:12:15', '2024-04-12 00:12:15'),
(17, NULL, 'Sugar', 'null', 0, '2024-04-12 00:19:16', '2024-04-12 00:19:16'),
(18, NULL, 'Spinach', 'null', 0, '2024-04-12 00:24:00', '2024-04-12 00:24:00'),
(19, NULL, 'Onion', 'null', 0, '2024-04-12 00:24:09', '2024-04-12 00:24:09'),
(20, NULL, 'Sause', 'null', 0, '2024-04-12 00:24:19', '2024-04-12 00:24:19'),
(21, NULL, 'Lemon', 'null', 0, '2024-04-12 00:28:04', '2024-04-12 00:28:04'),
(22, NULL, 'Salmon Fillets', 'null', 0, '2024-04-12 00:28:24', '2024-04-12 00:28:24'),
(23, NULL, 'Rice', 'null', 0, '2024-04-12 00:32:24', '2024-04-12 00:32:24'),
(24, NULL, 'Yogurt', 'null', 0, '2024-04-12 00:36:59', '2024-04-12 00:36:59'),
(25, NULL, 'Turmeric', 'null', 0, '2024-04-12 00:37:08', '2024-04-12 00:37:08'),
(26, NULL, 'Tandoori Masala', 'null', 0, '2024-04-12 00:37:17', '2024-04-12 01:49:06'),
(27, NULL, 'Cumin', 'null', 0, '2024-04-12 00:37:28', '2024-04-12 00:37:28'),
(28, NULL, 'Tomato Puree', 'null', 0, '2024-04-12 01:05:17', '2024-04-12 01:05:17'),
(29, NULL, 'Chicken', 'null', 0, '2024-04-12 01:09:31', '2024-04-12 01:09:31'),
(30, NULL, 'Potatoes', 'null', 0, '2024-04-12 02:30:16', '2024-04-12 02:30:16'),
(31, NULL, 'Cauliflower', 'null', 0, '2024-04-12 02:30:22', '2024-04-12 02:30:22'),
(32, NULL, 'Pav Bhaji Masala', 'null', 0, '2024-04-12 02:30:30', '2024-04-12 02:30:30'),
(33, NULL, 'Red Chili Powder', 'null', 0, '2024-04-12 02:30:35', '2024-04-12 02:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_21_210851_create_users_table', 2),
(6, '2024_02_23_031853_create_categories_table', 3),
(7, '2024_02_23_042532_create_ingredients_table', 3),
(8, '2024_03_13_071701_create_recipes_table', 4),
(9, '2024_03_14_194753_create_images_table', 4),
(10, '2024_03_14_200720_add_to_recipes_table', 5),
(11, '2024_03_16_021702_add_to_recipes_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contain_egg` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=>true, 1=>false',
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=>veg, 1=>non-veg',
  `level` enum('Easy','Normal','Difficult','Complex') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `serve` int(11) NOT NULL,
  `preparation_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooking_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=>published, 1=>un-published',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `image`, `category_id`, `ingredients_id`, `contain_egg`, `type`, `level`, `name`, `instruction`, `description`, `direction`, `serve`, `preparation_time`, `cooking_time`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1712903611.jpg', '8,10,18', '5,6,19,24,28', 1, 0, 'Normal', 'Paneer Tikka Masala', '<ol><li>Marinate paneer cubes, bell peppers, and onions in yogurt, ginger-garlic paste, turmeric, red chili powder, and salt. Let it marinate for at least 30 minutes.</li><li>Skewer the marinated paneer and vegetables and grill until lightly charred.</li><li>In a separate pan, heat oil and sauté ginger-garlic paste until fragrant. Add tomato puree and cook until the oil separates.</li><li>Stir in cream, kasuri methi, garam masala, cumin powder, coriander powder, and salt. Cook until the gravy thickens.</li><li>Add grilled paneer and vegetables to the gravy and simmer for a few minutes.</li><li>Garnish with fresh coriander leaves before serving.</li></ol>', '<p>Tender paneer cubes cooked in a creamy and flavorful tomato-based gravy, infused with aromatic spices.</p>', '<h3>Step-1</h3><ul><li><strong>Marination:</strong> Mix yogurt, ginger-garlic paste, turmeric, red chili powder, and salt. Marinate paneer, bell peppers, and onions for 30 minutes.</li></ul><h3>Step-2</h3><ul><li><strong>Grilling:</strong> Skewer marinated paneer and vegetables and grill until lightly charred.</li></ul><h3>Step-3</h3><ul><li><strong>Gravy:</strong> Sauté ginger-garlic paste, add tomato puree, cook until oil separates. Add cream, kasuri methi, garam masala, cumin powder, coriander powder, and salt. Cook until thickened.</li></ul><h3>Step-4</h3><ul><li><strong>Combining:</strong> Add grilled paneer and vegetables to the gravy, simmer.</li></ul><h3>Step-5</h3><ul><li><strong>Garnish:</strong> Garnish with fresh coriander leaves.</li></ul>', 4, '40 Minutes', '30 Minutes', 0, NULL, '2024-03-14 20:14:09', '2024-04-12 01:06:19'),
(2, '1712904511.jpg', '8,10', '5,6,19,23,24,25,28,29', 1, 1, 'Difficult', 'Chicken Biryani', '<ul><li>Marinate chicken pieces in yogurt, ginger-garlic paste, turmeric, red chili powder, and salt. Let it marinate for at least 1 hour.</li><li>Parboil basmati rice with whole spices like bay leaves, cinnamon, cloves, and cardamom until 70% cooked.&nbsp;</li><li>Drain and set aside. 3. In a separate pan, heat ghee and sauté sliced onions until golden brown.&nbsp;</li><li>Add ginger-garlic paste, green chilies, mint leaves, and coriander leaves. Cook until fragrant.</li><li>Add chopped tomatoes and cook until softened. Stir in garam masala, turmeric, red chili powder, cumin powder, and coriander powder.</li><li>Layer half of the parboiled rice over the masala, followed by marinated chicken pieces. Top with remaining rice.</li><li>Dissolve saffron in warm milk and drizzle over the rice. Cover and cook on low heat until the chicken is tender and the rice is fully cooked.</li><li>Garnish with fried onions, fresh mint leaves, and coriander leaves before serving.</li></ul>', '<p>Fragrant and flavorful rice dish cooked with marinated chicken, aromatic spices, and fresh herbs.</p>', '<h3>Step 1:&nbsp;</h3><ul><li><strong>Marination:</strong> Marinate chicken in yogurt, ginger-garlic paste, turmeric, red chili powder, and salt. Let it sit for 1 hour.</li></ul><h3>Step 2:&nbsp;</h3><ul><li><strong>Rice:</strong> Parboil basmati rice with whole spices until 70% cooked. Drain.</li></ul><h3>Step 3:&nbsp;</h3><ul><li><strong>Masala:</strong> Sauté onions until golden. Add ginger-garlic paste, green chilies, mint leaves, coriander leaves. Add tomatoes, spices.</li></ul><h3>Step 4:&nbsp;</h3><ul><li><strong>Layering:</strong> Layer rice and masala, top with marinated chicken, remaining rice. Drizzle saffron milk.</li></ul><h3>Step 5:&nbsp;</h3><ul><li><strong>Cooking:</strong> Cover and cook on low heat until chicken is tender and rice is fully cooked.</li></ul><h3>Step 6:&nbsp;</h3><ul><li><strong>Garnish:</strong> Garnish with fried onions, mint leaves, coriander leaves.</li></ul>', 4, '1 Hour 30 Minutes', '1 Hour', 0, NULL, '2024-03-14 15:42:42', '2024-04-12 01:18:31'),
(3, '1712905256.jpg', '8,11', '5,6,12,19,21,24,25', 1, 0, 'Normal', 'Chole Bhature', '<ol><li>Soak chickpeas overnight, then pressure cook with salt until soft.</li><li>Prepare the masala by sautéing onions, tomatoes, ginger, garlic, and green chili with cumin seeds and spices until fragrant.</li><li>Add cooked chickpeas to the masala and simmer until the flavors meld together.</li><li>For bhature, mix all-purpose flour, yogurt, baking soda, baking powder, and salt to form a smooth dough. Let it rest.</li><li>Divide the dough into small balls, roll out into discs, and deep-fry until golden brown and puffed.</li><li>Serve hot chole with bhature, garnished with chopped coriander leaves and accompanied by sliced onions and lemon wedges.</li></ol>', '<p>A classic North Indian dish featuring spicy and tangy chickpea curry (chole) served with deep-fried fluffy bread (bhature), making it a delightful and indulgent meal.</p>', '<h3>Step 1:&nbsp;</h3><ul><li><strong>Chickpeas:</strong> Soak overnight, pressure cook with salt until soft.</li></ul><h3>Step 2:&nbsp;</h3><ul><li><strong>Masala:</strong> Sauté onions, tomatoes, ginger, garlic, green chili, cumin seeds, and spices. Add cooked chickpeas, simmer.</li></ul><h3>Step 3:&nbsp;</h3><ul><li><strong>Bhature Dough:</strong> Mix flour, yogurt, baking soda, baking powder, salt. Rest.</li></ul><h3>Step 4:&nbsp;</h3><ul><li><strong>Frying:</strong> Divide dough, roll out, deep-fry until golden and puffed.</li></ul><h3>Step 5:&nbsp;</h3><ul><li><strong>Serving:</strong> Serve hot chole with bhature, garnished with coriander leaves, onions, and lemon wedges.</li></ul>', 4, '12 Hours', '45 Minutes', 0, NULL, '2024-03-15 22:51:29', '2024-04-12 01:32:03'),
(4, '1712900949.jpg', '12,13', '2,14,15,16,17', 0, 0, 'Easy', 'Classic Chocolate Chip Cookies', '<ul><li>Cream together butter, brown sugar, and white sugar.</li><li>Beat in eggs and vanilla extract.</li><li>Mix in flour, baking soda, and salt until combined.</li><li>Stir in chocolate chips.</li><li>Drop dough by spoonfuls onto a baking sheet and bake at 375°F (190°C) for 8-10 minutes.</li></ul>', '<p>Chewy and delicious chocolate chip cookies, perfect for any occasion.</p>', '<h3>Step 1:&nbsp;</h3><ul><li>Cream butter and sugars.</li></ul><h3>Step 2:&nbsp;</h3><ul><li>Add eggs and vanilla.</li></ul><h3>Step 3:&nbsp;</h3><ul><li>Mix in dry ingredients.</li></ul><h3>Step 4:&nbsp;</h3><ul><li>Stir in chocolate chips.</li></ul><h3>Step 5:&nbsp;</h3><ul><li>Drop dough on baking sheet and bake.</li></ul>', 24, '15 Minutes', '10 Minutes', 0, NULL, '2024-03-14 20:14:09', '2024-04-12 00:19:31'),
(5, '1712901176.jpg', '8,10', '3,5,6,18,19,20', 1, 0, 'Normal', 'Vegetable Lasagna', '<ul><li>Sauté onion, garlic, spinach, and carrots in olive oil.</li><li>Layer marinara sauce, noodles, ricotta cheese, vegetable mixture, and mozzarella cheese in a baking dish.</li><li>Repeat layers and top with Parmesan cheese.</li><li>Cover with foil and bake at 375°F (190°C) for 45 minutes, then uncover and bake for an additional 15 minutes.</li></ul>', '<p>Layers of pasta, marinara sauce, vegetables, and cheese, baked to perfection.</p>', '<h3>Step 1:&nbsp;</h3><ul><li>Sauté vegetables in olive oil.</li></ul><h3>Step 2:&nbsp;</h3><ul><li>Layer ingredients in baking dish.</li></ul><h3>Step 3:&nbsp;</h3><ul><li>Repeat layers and top with cheese.</li></ul><h3>Step 4:&nbsp;</h3><ul><li>Bake covered, then uncovered.</li></ul>', 8, '30 Minutes', '1 Hour', 0, NULL, '2024-03-14 15:42:42', '2024-04-12 00:24:47'),
(6, '1712905782.jpg', '8,17', '5,6,9,13,19,21,24,25,28,29', 1, 1, 'Normal', 'Butter Chicken', '<ol><li>Marinate chicken pieces in yogurt, lemon juice, ginger-garlic paste, red chili powder, turmeric, and salt. Let it marinate for at least an hour.</li><li>Heat butter in a pan, add chopped onions, and sauté until golden brown.</li><li>Add chopped tomatoes and cashew nuts, cook until tomatoes are soft and mushy.</li><li>Blend the onion-tomato mixture into a smooth paste.</li><li>In the same pan, add more butter and cook the marinated chicken until tender.</li><li>Pour in the blended paste, along with garam masala and kasuri methi. Simmer until the gravy thickens.</li><li>Finish with a drizzle of cream and garnish with chopped coriander leaves.</li></ol>', '<p>A rich and creamy chicken curry cooked in a tomato-based sauce with aromatic spices and finished with a touch of butter and cream, making it a popular dish in Indian cuisine.</p>', '<h3>Step 1:&nbsp;</h3><ul><li><strong>Marination:</strong> Marinate chicken in yogurt, lemon juice, spices. Set aside.</li></ul><h3>Step 2:&nbsp;</h3><ul><li><strong>Sauce:</strong> Sauté onions until golden. Add tomatoes, cashews. Cook, blend into a paste.</li></ul><h3>Step 3:&nbsp;</h3><ul><li><strong>Chicken:</strong> Cook marinated chicken in butter until tender.</li></ul><h3>Step 4:&nbsp;</h3><ul><li><strong>Combine:</strong> Add blended paste, garam masala, kasuri methi. Simmer.</li></ul><h3>Step 5:&nbsp;</h3><ul><li><strong>Finishing:</strong> Drizzle with cream, garnish with coriander leaves.</li></ul>', 4, '1 Hour', '30 Minutes', 0, NULL, '2024-03-15 22:51:29', '2024-04-12 01:39:42'),
(7, '1712906575.jpg', '8,10,18', '5,6,9,19,23,25', 1, 0, 'Easy', 'Vegetable Pulao', '<ol><li>Cook basmati rice with whole spices and vegetables.</li><li>Season with ginger-garlic paste, green chili, and spices.</li><li>Garnish with fresh mint and cilantro before serving.</li></ol>', '<p>A fragrant and flavorful one-pot rice dish made with basmati rice and mixed vegetables, seasoned with aromatic spices and herbs.</p>', '<h3>Step 1:&nbsp;</h3><ul><li><strong>Rice Preparation:</strong> Cook basmati rice with whole spices and mixed vegetables.</li></ul><h3>Step 2:&nbsp;</h3><ul><li><strong>Seasoning:</strong> Season with ginger-garlic paste, green chili, and spices.</li></ul><h3>Step 3:&nbsp;</h3><ul><li><strong>Garnishing:</strong> Garnish with fresh mint and cilantro before serving.</li></ul>', 4, '30 Minutes', '20 Minutes', 0, NULL, '2024-03-14 20:14:09', '2024-04-12 01:52:55'),
(8, '1712902147.jpg', '8,18', '1,3,4', 1, 1, 'Normal', 'Tandoori Chicken', '<ul><li>Combine yogurt, lemon juice, minced garlic, grated ginger, tandoori masala, paprika, cumin, coriander, turmeric, cayenne pepper, and salt to make the marinade.</li><li>Marinate chicken thighs in the yogurt mixture for at least 2 hours, preferably overnight.</li><li>Preheat grill to medium-high heat and lightly oil the grate.</li><li>Grill chicken thighs until cooked through and slightly charred, about 6-7 minutes per side.</li></ul>', '<p>Tender chicken marinated in a flavorful blend of yogurt and spices, then grilled to perfection.</p>', '<h3>Step 1:&nbsp;</h3><ul><li>Make marinade with yogurt and spices.</li></ul><h3>Step 2:&nbsp;</h3><ul><li>Marinate chicken thighs.</li></ul><h3>Step 3:&nbsp;</h3><ul><li>Grill until cooked through.</li></ul>', 4, '15 Minutes', '15 Minutes', 0, NULL, '2024-03-14 15:42:42', '2024-04-12 00:39:07'),
(9, '1712907294.jpg', '8,10,18', '5,6,7,9,19,21,24,25,28', 1, 0, 'Normal', 'Matar Paneer', '<ol><li>Sauté onions, tomatoes, and cashew nuts to make a smooth paste.</li><li>Cook paneer and green peas in the tomato-onion paste with spices and yogurt.</li><li>Finish with a sprinkle of garam masala and kasuri methi before serving.</li></ol>', '<p>A classic North Indian dish made with paneer and green peas in a creamy and flavorful tomato-based gravy, enriched with aromatic spices.</p>', '<h3>Step 1:&nbsp;</h3><ul><li><strong>Gravy Preparation:</strong> Sauté onions, tomatoes, and cashew nuts to make a smooth paste.</li></ul><h3>Step 2:&nbsp;</h3><ul><li><strong>Cooking:</strong> Cook paneer and green peas in the tomato-onion paste with spices and yogurt.</li></ul><h3>Step 3:&nbsp;</h3><ul><li><strong>Finishing:</strong> Finish with a sprinkle of garam masala and kasuri methi before serving.</li></ul>', 4, '40 Minutes', '30 Minutes', 0, NULL, '2024-03-15 22:51:29', '2024-04-12 02:04:54'),
(10, '1712909165.jpg', '18,19,20', '6,7,13,19,21,25,28,30,31,32,33', 1, 0, 'Easy', 'Pav Bhaji', '<ul><li>Boiling and Mashing Vegetables:</li><li>Peel and chop potatoes, cauliflower, carrots, and green peas into small, even pieces.<br>Boil the chopped vegetables in water until soft and tender, for about 10-15 minutes.<br>Drain the cooked vegetables and let them cool slightly.<br>Mash the boiled vegetables together using a potato masher or fork until smooth, adjusting the texture to your preference.<br>Preparing Gravy:</li><li>Heat butter in a large pan over medium heat.<br>Add cumin seeds and let them sizzle until fragrant.<br>Stir in ginger-garlic paste and sauté until the raw smell disappears.<br>Add finely chopped onions and cook until golden brown and caramelized.<br>Incorporate chopped tomatoes and cook until they break down and become mushy.<br>Sprinkle pav bhaji masala, red chili powder, and turmeric powder. Mix well.<br>Continue cooking until the oil separates from the sides of the pan, indicating the masala is well-cooked.<br>Mixing Vegetables and Gravy:</li><li>Combine the mashed vegetables with the prepared gravy in the pan.<br>Mix until the vegetables are evenly coated with the spicy tomato-based gravy.<br>Simmer for a few minutes to allow flavors to meld and the bhaji to thicken slightly.</li></ul>', '<p>A popular Indian street food dish consisting of a spicy vegetable mash served with buttered bread rolls, garnished with chopped onions, coriander leaves, and a squeeze of lemon.</p>', '<h3><strong>Step 1: Boiling and Mashing Vegetables:</strong></h3><ul><li>Peel and chop potatoes, cauliflower, carrots, and green peas into small, even pieces.</li><li>Boil the chopped vegetables in water until soft and tender, for about 10-15 minutes.</li><li>Drain the cooked vegetables and let them cool slightly.</li><li>Mash the boiled vegetables together using a potato masher or fork until smooth, adjusting the texture to your preference.</li><li>&nbsp;</li></ul><h3><strong>Step 2: Preparing Gravy:</strong></h3><ul><li>Heat a tablespoon of butter in a large pan over medium heat.</li><li>Add half a teaspoon of cumin seeds and let them sizzle until fragrant.</li><li>Stir in two tablespoons of ginger-garlic paste and sauté until the raw smell disappears.</li><li>Add finely chopped onions and cook until golden brown and caramelized.</li><li>Incorporate chopped tomatoes and cook until they break down and become mushy.</li><li>Sprinkle pav bhaji masala, red chili powder, and turmeric powder. Mix well.</li><li>Continue cooking until the oil separates from the sides of the pan, indicating the masala is well-cooked.</li><li>&nbsp;</li></ul><h3><strong>Step 3: Mixing Vegetables and Gravy:</strong></h3><ul><li>Combine the mashed vegetables with the prepared gravy in the pan.</li><li>Mix until the vegetables are evenly coated with the spicy tomato-based gravy.</li><li>Simmer for a few minutes to allow flavors to meld and the bhaji to thicken slightly.</li><li>&nbsp;</li></ul><h3><strong>Step 4: Serving:</strong></h3><ul><li>Transfer the hot bhaji to a serving dish.</li><li>Serve alongside buttered pav (soft bread rolls) that have been lightly toasted on a griddle or skillet.</li><li>Garnish the bhaji with a generous sprinkle of finely chopped onions and fresh coriander leaves for a burst of flavor and color.</li><li>Serve lemon wedges on the side to add a hint of tanginess to the dish.</li><li>Enjoy your homemade pav bhaji piping hot with your favorite accompaniments!</li></ul>', 4, '15 minute', '30 minute', 0, NULL, '2024-03-14 20:14:09', '2024-04-12 09:21:37'),
(11, '1710555743.jpg', '1,8', '1,3', 0, 1, 'Easy', 'Dasdadasdasdasd', '<p>fsdf</p>', '<p>asdads</p>', '<p>asdads<strong>adasd</strong></p>', 2131, '2131', '312312', 1, NULL, '2024-03-14 15:42:42', '2024-04-12 02:36:40'),
(12, '1710562889.png', '1', '2,3', 0, 1, 'Easy', 'Dasda', '<p>fsdfsd</p>', '<p>fsdfsdf</p>', '<p>fsdfsdf</p>', 489, 'fsdf', 'sdfsdf', 1, NULL, '2024-03-15 22:51:29', '2024-04-12 02:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'flavourquest@admin.com', '$2y$12$TJc6otW/2dUoBwEZmCdNK.2Nk/r56XXFFpuOxj/huQwvgaJmt2jSK', '1', NULL, '2024-02-21 21:09:13', '2024-02-21 21:09:13'),
(3, NULL, 'Admin 2', 'flavourquest@admin.com2', '$2y$12$TJc6otW/2dUoBwEZmCdNK.2Nk/r56XXFFpuOxj/huQwvgaJmt2jSK', '0', NULL, '2024-02-21 21:09:13', '2024-02-21 21:09:13'),
(4, '1709467873.png', 'test', 'xyz@gmail.comasdas', '$2y$12$TJc6otW/2dUoBwEZmCdNK.2Nk/r56XXFFpuOxj/huQwvgaJmt2jSK', '0', NULL, '2024-02-19 21:09:13', '2024-03-03 06:41:13'),
(6, '1712910888.jpg', 'DRJ', 'abc@gmail.com', NULL, '0', NULL, '2024-04-12 03:04:07', '2024-04-12 03:04:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
