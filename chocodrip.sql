-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 08:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chocodrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `id_chocolate` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name_cart` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name_cart` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_chocolate`, `id_user`, `quantity`, `ordered_at`, `user_address`, `first_name_cart`, `last_name_cart`) VALUES
(1, 1, 2, 2, '2022-12-11 17:16:52', '1002 S Pantano Rd', 'Naomi', 'Bowen'),
(2, 4, 2, 1, '2022-12-11 17:37:51', '1002 S Pantano Rd', 'Naomi', 'Bowen'),
(4, 1, 3, 1, '2022-12-11 18:46:27', '776 Joy Ridge Court Ithaca, NY 14850', 'Shannon', 'Weeks'),
(6, 7, 2, 5, '2022-12-11 19:32:07', '776 Joy Ridge Court Ithaca, NY 14850', 'Shannon', 'Weeks');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `category_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Milk'),
(2, 'Dark'),
(3, 'White'),
(4, 'Vegan'),
(5, 'Kosher'),
(6, 'Truffle'),
(7, 'Contains Alcohol'),
(8, 'Mix');

-- --------------------------------------------------------

--
-- Table structure for table `chocolates`
--

CREATE TABLE `chocolates` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8_unicode_ci NOT NULL,
  `nutrition_values` text COLLATE utf8_unicode_ci NOT NULL,
  `src_picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `previous_price` decimal(10,2) DEFAULT NULL,
  `current_price` decimal(10,2) NOT NULL,
  `category_id` int(30) NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chocolates`
--

INSERT INTO `chocolates` (`id`, `name`, `description`, `ingredients`, `nutrition_values`, `src_picture`, `previous_price`, `current_price`, `category_id`, `available`) VALUES
(1, 'TABLET MILK 35% 100G', 'A Tablet Milk 35% (100G) with the purity of 35% origin cocoa beans from West-Africa, and its silky smooth milk chocolate texture.\r\nAll our chocolates are made in Belgium with sustainably sourced cocoa. Every ingredient we use is of natural origin, non-GMO and without palm oil.', 'milk chocolate (sugar, whole milk powder, cocoa mass, cocoa butter, emulsifier: soy lecithin, flavour).', 'Nutrition facts - 100g Energy: 2267.00 kJ, Energy: 542.00 kcal, total fat: 33.70 g, of which saturated: 20.30 g, of which mono-unsaturated: 10.70 g, of which poly-unsaturated: 1.10 g, of which trans fat: 0.50 g, cholesterol: 24.70 mg, carbohydrate: 48.00 g, dietary fiber: 4.00 g, of which sugar: 46.40 g, protein: 9.00 g, sodium: 91.00 mg, vitamin A: 12.50 µG, calcium: 239.00 mg, vitamin C: 0.48 mg, iron: 6.49 mg, salt: 0.23 g, vitamin D: 1.19 µG, potassium: 565.50 mg, of which added sugars: 46.40 g', 'tablet-milk.jpg', NULL, '5.00', 1, 1),
(2, 'TABLET DARK UGANDA 80% ', 'This Tablet Dark Uganda 80% (100G) reveals a full expression of robust and earthy tasting notes. The origin dark chocolate from Uganda typically shows a full-bodied yet balanced cocoa intensity, accompanied by bitterness and acidity. This rich and luscious tablet is lactose-free & vegan.\r\nAll our chocolates are made in Belgium with sustainably sourced cocoa. Every ingredient we use is of natural origin, non-GMO and without palm oil.', 'dark chocolate (cocoa mass, sugar, cocoa butter, flavour).', 'Nutrition facts - 100g Energy: 2335.00 kJ, Energy: 565.00 kcal, total fat: 47.80 g, of which saturated: 28.90 g, of which mono-unsaturated: 17.00 g, of which poly-unsaturated: 1.90 g, of which trans fat: 0.50 g, cholesterol: 0.30 mg, carbohydrate: 25.10 g, dietary fiber: 12.20 g, of which sugar: 19.40 g, protein: 8.60 g, sodium: 4.00 mg, vitamin A: 20.00 µG, calcium: 58.00 mg, iron: 13.00 mg, salt: 0.01 g, vitamin D: 1.07 µG, potassium: 725.00 mg, of which added sugars: 19.40 g', 'tablet-dark.jpg', NULL, '5.00', 2, 1),
(3, 'TABLET WHITE VANILLA 100G', 'A Tablet White Vanilla (100G) with a sweet and smooth white chocolate and hints of fresh vanilla from Madagascar.\r\nAll our chocolates are made in Belgium with sustainably sourced cocoa. Every ingredient we use is of natural origin, non-GMO and without palm oil.', 'white chocolate (sugar, whole milk powder, cocoa butter, emulsifier: soy lecithins, flavours), vanilla.', 'Nutrition facts - 100g Energy: 2358.00 kJ, Energy: 568.00 kcal, total fat: 33.11 g, of which saturated: 22.63 g, of which mono-unsaturated: 12.66 g, of which poly-unsaturated: 1.40 g, of which trans fat: 0.30 g, cholesterol: 32.70 mg, carbohydrate: 51.54 g, of which sugar: 51.54 g, protein: 7.88 g, sodium: 114.00 mg, vitamin A: 79.76 µG, calcium: 317.00 mg, iron: 0.26 mg, salt: 0.29 g, vitamin D: 0.28 µG, potassium: 369.00 mg, of which added sugars: 37.59 g', 'tablet-white.jpg', '5.00', '6.50', 3, 0),
(4, 'CARRÉ ORIGIN', 'Carré Origin Box (200G) contains 40 individually wrapped bite-size dark Neuhaus chocolate Carrés. Dark chocolate squares that offer a rich palette of flavours from the most exclusive cocoas in the world and that represents our dark collection in its purest elegance.\r\nAll our chocolates are made in Belgium with sustainably sourced cocoa. Every ingredient we use is of natural origin, non-GMO and without palm oil.', 'dark chocolate (cocoa mass, sugar, cocoa butter, flavour), dark chocolate (cocoa mass, sugar, cocoa butter, emulsifier:soy lecithines, flavour).', 'Nutrition facts - 100g Energy: 2396.75 kJ, Energy: 575.75 kcal, total fat: 45.00 g, of which saturated: 24.30 g, of which mono-unsaturated: 18.40 g, of which poly-unsaturated: 1.53 g, of which trans fat: 0.13 g, cholesterol: 2.85 mg, carbohydrate: 29.40 g, dietary fiber: 11.60 g, of which sugar: 25.15 g, protein: 8.03 g, sodium: 5.67 mg, vitamin A: 13.75 µG, calcium: 34.88 mg, iron: 12.30 mg, salt: 0.01 g, vitamin D: 1.26 µG, potassium: 680.40 mg, of which added sugars: 25.13 g', 'vegan-chocolate.jpg', '19.00', '17.80', 4, 1),
(5, 'DISCOVERY DARK DELIGHT', 'The Discovery Dark Delight Box (69G) contains 6 iconic Neuhaus dark chocolates. A small elegant box with our richest dark chocolate pralines filled with praliné, ganache, gianduja and caramel: Trillion 64%, Suzanne 71%, Criollo 80%, Cornet Fondant, Galerie and Neuhaus Fondant.\r\nAll our chocolates are made in Belgium with sustainably sourced cocoa. Every ingredient we use is of natural origin, non-GMO and without palm oil.', 'dark chocolate (cocoa mass, sugar, butter oil (milk), cocoa butter, emulsifier: soy lecithins, flavour), sugar, hazelnuts, cocoa mass, cocoa butter, milk chocolate (sugar, whole milk powder, cocoa mass, cocoa butter, emulsifier: soy lecithins, flavour), glucose syrup, stabiliser: sorbitol;cream (milk), candy sugar syrup, invert sugar syrup, whole milk powder, humectant: glycerol;cocoa powder, shea butter, coconut fat, raspberry, skimmed milk, apple puree, dextrose, flavours, butter (milk), coffee, sugar syrup, emulsifier: soy lecithin;butter oil (milk), salt (Guérande).', 'Nutrition facts - 100g Energy: 2142.66 kJ, Energy: 512.48 kcal, total fat: 33.59 g, of which saturated: 17.95 g, of which mono-unsaturated: 12.62 g, of which poly-unsaturated: 1.25 g, of which trans fat: 0.18 g, cholesterol: 11.41 mg, carbohydrate: 43.69 g, dietary fiber: 7.64 g, of which sugar: 36.21 g, protein: 5.97 g, sodium: 15.19 mg, vitamin A: 24.57 µG, calcium: 60.17 mg, vitamin C: 0.68 mg, iron: 10.36 mg, salt: 0.04 g, vitamin D: 0.94 µG, potassium: 488.28 mg, of which added sugars: 33.08 g', 'discovery-dark-delight.jpg', NULL, '30.00', 5, 1),
(6, 'LES TRÉSORS DE NEUHAUS', 'The Les Trésors de Neuhaus Box (300G) contains 30 gastronomic chocolates. Five original chocolate truffles created by selected Belgian Star chefs together with our Neuhaus Maîtres Chocolatiers.\r\nThis elegant dark blue box is the ideal gift for those special moments when you are invited to dinner by friends, for a special occasion, or simply for those moments when you feel like pampering yourself.', 'dark chocolate (cocoa mass, sugar, butter oil (milk), cocoa butter, emulsifier: soy lecithins, flavour), sugar, cocoa butter, milk chocolate (sugar, whole milk powder, cocoa mass, cocoa butter, emulsifier: soy lecithins, flavour), cocoa mass, hazelnuts, coconut fat, butter (milk), cream (milk), feuilletine (wheat flour, sugar, butter oil ( milk), lactose, milk proteins, salt, malted barley flour, raising agent:sodium carbonates) , whole milk powder, pecannuts, stabiliser: sorbitol;skimmed milk, humectant: glycerol;cocoa nibs, glucose syrup, shea butter, hazelnutoil, whey powder (milk), fat reduced cocoa powder, ginger, dextrose, raspberry, skimmed milk powder, olive oil, sugar candy, passion fruit, cocoa powder, salt (Guérande), whey (milk), vinegar, flavours, emulsifier: soy lecithin, rapeseed lecithins;whipped cream (Isigny) (milk), water, acid: citric acid;salted butter (Isigny) (milk), caramelised sugar, vanilla.', 'Nutrition facts - 100g Energy: 2320.17 kJ, Energy: 556.26 kcal, total fat: 39.59 g, of which saturated: 22.50 g, of which mono-unsaturated: 9.10 g, of which poly-unsaturated: 0.96 g, of which trans fat: 0.20 g, cholesterol: 17.48 mg, carbohydrate: 40.64 g, dietary fiber: 6.84 g, of which sugar: 35.73 g, protein: 5.98 g, sodium: 69.45 mg, vitamin A: 27.49 µG, calcium: 60.45 mg, vitamin C: 0.25 mg, iron: 8.44 mg, salt: 0.17 g, vitamin D: 6.77 µG, potassium: 759.32 mg, of which added sugars: 26.70 g', 'les-tresors.jpg', NULL, '41.00', 6, 1),
(7, 'NEUHAUS COLLECTION ', 'The Neuhaus Collection Truffle Box (184G) contains a selection of 16 timeless Neuhaus truffles. A contemporary, colourful and elegant gift box with Belgian chocolate truffles filled with butter cream, enrobed with a thin layer of dark chocolate and finished with a refined coating in 6 popular flavours: classic butter truffle, extra dark, cappuccino, cognac, Marc de Champagne and speculoos-cheesecake. This assortment contains alcohol.\r\nWe carefully select every ingredient, ensuring that every Neuhaus praline is of the highest quality and of 100% natural origin. All our products are made without GMOs and without palm oil.', 'dark chocolate (cocoa mass, sugar, butter oil (milk), cocoa butter, emulsifier: soy lecithins, flavour), milk chocolate (sugar, whole milk powder, cocoa mass, cocoa butter, emulsifier: soy lecithins, flavour), butter (milk), sugar, cocoa mass, humectant: glycerol;speculoos (wheat flour, sugar, rapeseed oil, candy syrup, butter oil (milk), raising agent: sodium carbonates, salt, cinnamon), cocoa powder, almonds, glucose syrup, mango, feuilletine (wheat flour, sugar, butter oil ( milk), lactose, milk proteins, salt, malted barley flour, raising agent: sodium carbonates) , water, fat reduced cocoa powder, shea butter, cocoa butter, coconut fat, cognac, flavours, cream (milk), dextrose, coffee, cheesepowder (milk), whey powder (milk), marc de Champagne, sunflower oil, sugar syrup, skimmed yoghurt powder (milk), skimmed milk, spices, acid: citric acid;wheat starch, cardamom, emulsifier: soy lecithin.', 'Nutrition facts - 100g Energy: 2195.02 kJ, Energy: 525.77 kcal, total fat: 35.68 g, of which saturated: 22.29 g, of which mono-unsaturated: 10.17 g, of which poly-unsaturated: 1.03 g, of which trans fat: 0.45 g, cholesterol: 40.00 mg, carbohydrate: 41.82 g, dietary fiber: 6.76 g, of which sugar: 35.17 g, protein: 5.92 g, sodium: 30.84 mg, vitamin A: 19.56 µG, calcium: 59.64 mg, vitamin C: 0.15 mg, iron: 9.51 mg, salt: 0.08 g, vitamin D: 0.81 µG, potassium: 455.78 mg, of which added sugars: 32.33 g', 'neuhas-collection.jpg', '30.00', '28.50', 7, 1),
(8, 'CHRISTMAS WINTER CUBE', 'The Christmas Winter Cube (50G) is a festive red box filled with 5 individually wrapped chocolate Amusettes.\r\nThis ornament makes an ideal Christmas tree or table decoration and is a perfect small gift during the holiday period.\r\n', 'milk chocolate (sugar, whole milk powder, cocoa mass, cocoa butter, emulsifier: soy lecithins, flavour), sugar, cocoa butter, dark chocolate (cocoa mass, sugar, butter oil (milk), cocoa butter, emulsifier: soy lecithins, flavour), whole milk powder, butter (milk), hazelnuts, wheat flour, shea butter, coconut fat, almonds, honey, cream (milk), glucose syrup, invert sugar syrup, coffee, water, egg, flavours, emulsifier: soy lecithin, rapeseed lecithins;skimmed milk, skimmed milk powder, whipped cream (Isigny) (milk), salt (Guérande), colour: beta-carotene, curcumin;salted butter (Isigny) (milk), sunflower oil, wheat starch, whey (milk), salt, raising agent: ammonium carbonates, sodium carbonates;vanilla, egg white, potato starch.', 'Nutrition facts - 100g Energy: 2336.12 kJ, Energy: 561.42 kcal, total fat: 37.38 g, of which saturated: 22.34 g, of which mono-unsaturated: 11.11 g, of which poly-unsaturated: 1.12 g, of which trans fat: 0.41 g, cholesterol: 22.19 mg, carbohydrate: 47.75 g, dietary fiber: 3.05 g, of which sugar: 44.74 g, protein: 6.54 g, sodium: 70.86 mg, vitamin A: 15.70 µG, calcium: 157.87 mg, vitamin C: 0.33 mg, iron: 4.26 mg, salt: 0.18 g, vitamin D: 1.22 µG, potassium: 385.23 mg, of which added sugars: 36.14 g', 'winter-cube.jpg', '8.50', '7.00', 8, 1),
(9, 'TABLET MILK SALTED CARAMEL', 'This Tablet Milk Salted Caramel (100G) balances the smooth textures of milk chocolate with intriguing salty tasting notes of salted butter from Isigny and touches of salt from Guérande.\r\nAll our chocolates are made in Belgium with sustainably sourced cocoa. Every ingredient we use is of natural origin, non-GMO and without palm oil.', 'milk chocolate (sugar, whole milk powder, cocoa mass, cocoa butter, emulsifier: soy lecithin, flavour), caramel bits (sugar, glucose syrup, whole milk powder, fresh cream (Isigny) (milk), salted butter (Isigny) (milk), salt (Guérande), emulsifier: rapeseed lecithins), flavours, salt (Guérande).', 'Nutrition facts - 100g Energy: 2215.00 kJ, Energy: 529.00 kcal, total fat: 31.02 g, of which saturated: 18.71 g, of which mono-unsaturated: 9.80 g, of which poly-unsaturated: 1.02 g, of which trans fat: 0.47 g, cholesterol: 24.77 mg, carbohydrate: 51.66 g, dietary fiber: 3.72 g, of which sugar: 48.09 g, protein: 8.26 g, sodium: 150.00 mg, vitamin A: 20.75 µG, calcium: 219.41 mg, iron: 5.94 mg, salt: 0.38 g, vitamin D: 1.07 µG, potassium: 523.00 mg, of which added sugars: 48.09 g', '1670539013._chocolate.jpg', '10.00', '8.00', 1, 1),
(11, 'TABLET DARK ORANGE 100G', 'This Tablet Dark Orange (100G) makes the perfect unity of dark chocolate (55% cocoa) with recognisable citrus flavours of orange pieces from Italy.\r\nAll our chocolates are made in Belgium with sustainably sourced cocoa. Every ingredient we use is of natural origin, non-GMO and without palm oil.', 'dark chocolate (cocoa mass, sugar, butter oil (milk), cocoa butter, emulsifier: soy lecithins, flavour), candied orange (orange peel, sugar, glucose syrup, acidity regulator: citric acid), flavours.', 'Nutrition facts - 100g Energy: 2175.00 kJ, Energy: 520.00 kcal, total fat: 31.89 g, of which saturated: 19.14 g, of which mono-unsaturated: 10.22 g, of which poly-unsaturated: 1.03 g, of which trans fat: 0.19 g, cholesterol: 10.41 mg, carbohydrate: 46.68 g, dietary fiber: 9.68 g, of which sugar: 43.57 g, protein: 5.91 g, sodium: 12.00 mg, vitamin A: 30.00 µG, calcium: 33.02 mg, iron: 15.00 mg, salt: 0.03 g, vitamin D: 1.29 µG, potassium: 526.00 mg, of which added sugars: 40.90 g', '1670784984._chocolate.jpg', NULL, '5.00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `first_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message_content` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `first_name`, `last_name`, `email`, `message_content`, `sent_at`) VALUES
(1, 'Vivian', 'Brooks', 'vivian.brooks@gmail.com', 'We were fortunate to taste samples this weekend – absolutely delicious! And so much fun in the cube shape and foil wrapping – perfect for gift giving!', '2022-12-08 00:00:19'),
(2, 'Camilla', 'Wilson', 'camila.w@gmail.com', 'The presentation of his chocolate is absolutely beautiful. And they are like little pieces of heaven! The creamy Cubze are covered with either smooth milk chocolate or dark chocolate. Each one contains a sweet little statement about happiness. While eating this chocolate I dare you to not smile. It’s impossible!', '2022-12-11 10:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(30) NOT NULL,
  `link_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `link_name`, `route`) VALUES
(1, 'Home', 'home'),
(2, 'About', 'about-us'),
(3, 'Shop', 'shop'),
(4, 'Contact us', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `role_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `id_role`) VALUES
(1, 'Jovana', 'Paunovic', 'admin@gmail.com', '2637a5c30af69a7bad877fdb65fbd78b', 1),
(2, 'Naomi', 'Bowen', 'naomi.b@yahoo.com', '8ccb29db1ea08e210d6d54002ada3c23', 2),
(3, 'Shannon', 'Weeks', 'shannon.w@gmail.com', '8ccb29db1ea08e210d6d54002ada3c23', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_chocolate`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chocolates`
--
ALTER TABLE `chocolates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chocolates`
--
ALTER TABLE `chocolates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_chocolate`) REFERENCES `chocolates` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `chocolates`
--
ALTER TABLE `chocolates`
  ADD CONSTRAINT `chocolates_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
