-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 12, 2024 at 01:05 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `5225CMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `museum_id` int(3) NOT NULL,
  `comment` text NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `museum_id`, `comment`, `dateAdded`) VALUES
(166, 4, 63, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(167, 5, 63, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(168, 6, 63, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(169, 7, 64, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(170, 2, 64, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(171, 4, 64, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(172, 4, 65, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(173, 5, 65, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(174, 6, 65, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(175, 7, 66, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(176, 2, 66, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(177, 4, 66, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(178, 7, 68, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(179, 2, 68, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(180, 4, 68, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(181, 7, 70, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(182, 2, 70, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(183, 4, 70, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(184, 4, 71, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(185, 5, 71, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(186, 6, 71, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(187, 7, 72, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(188, 2, 72, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(189, 4, 72, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(190, 4, 73, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(191, 5, 73, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(192, 6, 73, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(193, 7, 74, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(194, 2, 74, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(195, 4, 74, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(196, 4, 75, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(197, 5, 75, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(198, 6, 75, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(199, 7, 76, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(200, 2, 76, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(201, 4, 76, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(202, 7, 78, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(203, 2, 78, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(204, 4, 78, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(205, 4, 79, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(206, 5, 79, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(207, 6, 79, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(208, 7, 80, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(209, 2, 80, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(210, 4, 80, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(211, 7, 81, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(212, 2, 81, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(213, 4, 81, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(214, 4, 82, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(215, 5, 82, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(216, 6, 82, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(217, 7, 83, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(218, 2, 83, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(219, 4, 83, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(220, 7, 84, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(221, 2, 84, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(222, 4, 84, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(223, 4, 85, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(224, 5, 85, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(225, 6, 85, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(226, 7, 86, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(227, 2, 86, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(228, 4, 86, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(229, 7, 87, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(230, 2, 87, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(231, 4, 87, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(232, 4, 88, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(233, 5, 88, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(234, 6, 88, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(235, 7, 89, 'This museum is fantastic! I really enjoyed my visit.', '2024-03-11 16:02:16'),
(236, 2, 89, 'This museum is sucked! I hated my visit.', '2024-03-11 16:02:16'),
(237, 4, 89, 'This museum is okay! I kinda enjoyed my visit.', '2024-03-11 16:02:16'),
(238, 10, 63, 'Test Comment From Form', '2024-03-11 20:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `museums`
--

CREATE TABLE `museums` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'https://placehold.co/600x400',
  `address` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `url` varchar(125) NOT NULL,
  `postalcode` varchar(7) NOT NULL,
  `ward` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `museums`
--

INSERT INTO `museums` (`id`, `name`, `image`, `address`, `type`, `summary`, `phone`, `url`, `postalcode`, `ward`) VALUES
(63, 'Aga Khan Museum', 'https://upload.wikimedia.org/wikipedia/commons/6/6c/Aga_Khan_Museum_2022.jpg', '77 Wynford Dr', 'Museum', 'Dedicated to sharing the artistic, intellectual, and scientific contributions that Islamic civilizations and cultures have made to world heritage.', '416-646-4677', 'https://www.agakhanmuseum.org/', 'M3C 1K1', 'Don Valley East'),
(64, 'Black Creek Pioneer Village', 'https://blackcreek.ca/app/uploads/2017/03/BCPV_SADDLERY_HARNESS_SHOP_HERO.jpg', '1000 Murray Ross Pkwy', 'Museum', 'Become immersed in the lifestyles, customs, and surroundings of early residents who built the foundations for modern Toronto and Ontario at this 30-acre site.', '416-736-1733', 'https://blackcreek.ca/', 'M3J 2P3', 'Humber River-Black Creek'),
(65, 'Campbell House', 'https://www.campbellhousemuseum.ca/wp-content/uploads/2022/03/20220210_103944-scaled.jpg', '160 Queen St W', 'Museum', 'The Campbell house dates back to 1822 and was once home to Judge William Campbell.  It is the last example of Palladian architecture in  Toronto.', '416-597-0227', 'http://www.campbellhousemuseum.ca/', 'M5H 3H3', 'Spadina-Fort York'),
(66, 'Canadian Museum of Cultural Heritage of Indo-Canadian', 'https://www.baps.org//Data/Sites/1/Media/LocationImages/75toronto-mandir.jpg', '61 Claireville Dr', 'Museum', 'The Canadian Museum of Cultural Heritage of Indo-Canadians is a museum committed to the understanding of India\'s rich cultural heritage. See BAPS Shri Swaminarayan Mandir.', '416-798-2277', 'https://www.baps.org/cultureandheritage/ExperienceIndia/Exhibitions/CanadianMuseumofCulturalHeritageofIndo-Canadians.aspx', 'M9W 5Z7', 'Etobicoke North'),
(68, 'Colborne Lodge', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Colborne_Lodge_Toronto_2009.jpg/1920px-Colborne_Lodge_Toronto_2009.jpg', '11 Colborne Lodge Dr', 'Museum', 'This quaint cottage located within High Park was home to John and Jemma Howard. In 1873 the couple deeded the part to lodge to the City of Toronto. The house is a great example of a regency style building.', '416-392-6916', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/colborne-lodge/', '', 'Parkdale-High Park'),
(70, 'Fort York National Historic Site', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/17/Fort_York_2008.jpg/550px-Fort_York_2008.jpg', '250 Fort York Blvd', 'Museum', 'Birthplace of Toronto in 1793 and scene of the Battle of York in 1813, Fort York has Canada\'s largest collection of original War of 1812 buildings. Open year round for tours, exhibits, and demonstrations.', '416-392-6907', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/fort-york-national-historic-site/', 'M5V 3K9', 'Spadina-Fort York'),
(71, 'Gardiner Museum of Ceramic Art', 'https://www.gardinermuseum.on.ca/wp-content/uploads/Main-Page-Image-2.jpg', '111 Queen\'s Park', 'Museum', 'A museum dedicated to one of the oldest forms of art. The Gardiner Museum of Ceramic Art is home to over 3,000 historical and contemporary ceramic pieces.', '416-586-8080', 'https://www.gardinermuseum.on.ca/', 'M5S 2C7', 'University-Rosedale'),
(72, 'Gibson House Museum', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/60/Front_of_Gibson_House.jpg/500px-Front_of_Gibson_House.jpg', '5172 Yonge St', 'Museum', 'Operated  by the City of Toronto, the Gibson House is a museum where visitors experience an exquisite farmhouse and learn more about the rural development of the area.', '416-395-7432', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/gibson-house-museum/', 'M2N 5P6', 'Willowdale'),
(73, 'Historic Zion Schoolhouse', 'https://nyhs.ca/wp-content/uploads/2019/01/Zion-Schoolhouse.jpg', '1091 Finch Ave E', 'Museum', 'Built in 1869, the Historic Zion Schoolhouse has been restored to emulate schooling as it once was in the farming  district of L\'Amaroux', '416-395-7435', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/zion-schoolhouse/', 'M2J 2X3', 'Don Valley North'),
(74, 'Japan Foundation', 'https://tr.jpf.go.jp/wp-content/uploads/Bloor-Yonge.jpg', '2 Bloor St E', 'Museum', 'A cultural establishment aiming towards effective development of its international cultural exchange programs in Japanese arts and cultural exchange.', '416-966-1600', 'https://jftor.org/', 'M4W 1A8', 'University-Rosedale'),
(75, 'Mackenzie House', 'https://upload.wikimedia.org/wikipedia/commons/8/86/Mackenzie_House.JPG', '82 Bond St', 'Museum', 'Mackenzie House is the restored home of William Lyon Mackenzie, Toronto\'s first Mayor. It is one of 10 museums operated by the City of Toronto.', '416-392-6915', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/mackenzie-house/', 'M5B 1X2', 'Toronto Centre'),
(76, 'Montgomery\'s Inn', 'http://www.etobicokehistorical.com/uploads/6/9/2/7/6927795/4029133_orig.jpeg', '4709 Dundas St W', 'Museum', 'A museum that was once a historic home, visitors can delve into the lifestyle of a 19th century Irish farm family with access to the bedrooms, kitchen wing and much more.', '416-394-8113', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/montgomerys-inn/', 'M9A 1A8', 'Etobicoke Centre'),
(78, 'Royal Ontario Museum', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Royal_Ontario_Museum_in_Fall_2021.jpg/500px-Royal_Ontario_Museum_in_Fall_2021.jpg', '100 Queen\'s Park', 'Museum', 'Canada\'s largest museum of natural history and world cultures, presents engaging galleries of art, archaeology, and natural science from around the world.', '416-586-8000', 'https://www.rom.on.ca/en', 'M5S 2C6', 'University-Rosedale'),
(79, 'Toronto Holocaust Museum', 'https://torontoholocaustmuseum.org/wp-content/uploads/2023/05/HolocaustMuseum001-Edit-aspect-ratio-1-1.jpg', '4600 Bathurst St', 'Museum', 'Provides all its visitors a complete understanding of the Holocaust.', '416-631-5689', 'https://www.holocaustcentre.com/', 'M2R 3V2', 'York Centre'),
(80, 'Scarborough Museum', 'https://www.toronto.ca/wp-content/uploads/2021/08/948b-Scarborough-Museum-east-side-entranceA.jpg', '1007 Brimley Rd', 'Museum', 'The Scarborough Museum and its gardens are located within Thomson Memorial Park.It is one of 10 museums operated by the City of Toronto.The Museum looks back on the story of Scarborough\'s roots and history.', '416-338-8807', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/scarborough-museum/', 'M1P 3E8', 'Scarborough Centre'),
(81, 'Spadina Museum', 'https://www.toronto.ca/wp-content/uploads/2020/09/8fbf-Child-page_banner_SP.jpg', '285 Spadina Rd', 'Museum', 'Operated by the City of Toronto, the Spadina Museum is a historic manor house that allows visitors to learn about the history and architecture of  late 19th century to early 20th century Toronto.', '416-392-6910', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/spadina-museum/', 'M5R 2V5', 'Toronto-St. Paul\'s'),
(82, 'Taras H. Shevchenko Museum', 'https://www.shevchenko.ca/images/about/0_Exterior_2020.jpg', '1604 Bloor St W', 'Museum', 'The Taras H. Shevchenko Museum is the home to  exhibitions dedicated to the contribution of Ukrainians in Canada and the life of famed writer Taras Shevchenko.', '416-534-8662', 'http://www.infoukes.com/shevchenkomuseum/', 'M6P 1A7', 'Parkdale-High Park'),
(83, 'Textile Museum of Canada', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/TextileMuseumOfCanada2.jpg/500px-TextileMuseumOfCanada2.jpg', '55 Centre Ave', 'Museum', 'With more than 13,000 objects from more than 200 countries and regions, the Textile Museum of Canada celebrates cultural diversity through traditional fabrics, garments, carpets and related artifacts such as beadwork and basketry.', '416-599-5321', 'https://textilemuseum.ca/', 'M5G 2H5', 'Spadina-Fort York'),
(84, 'The 48th Highlanders Museum', 'https://museum.48thhighlanders.ca/wp-content/uploads/2021/Website_admin/Museum7-768x512.jpg', '73 Simcoe St', 'Museum', 'This museum is dedicated to one of Canada\'s famous military regiments. The museum holds historical artifacts dating from Victorian Toronto in 1891, when the 48th Highlanders was formed, to the present day.', '416-635-4440', 'http://www.48highlanders.com/04_03.html', 'M5J 1W9', 'Spadina-Fort York'),
(85, 'The Bata Shoe Museum', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Bata_Shoe_Museum_2.jpg/1920px-Bata_Shoe_Museum_2.jpg', '327 Bloor St W', 'Museum', 'Home to hundreds of shoes (from a collection numbering over 13,000). The museum celebrates the style and function of footwear in impressive galleries from ancient Egypt to modern fashion.', '416-979-7799', 'https://batashoemuseum.ca/', 'M5S 1W7', 'University-Rosedale'),
(86, 'Toronto Police Museum & Discovery Centre', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0f/65/0a/a6/photo4jpg.jpg', '40 College St', 'Museum', 'The Toronto Police Museum & Discovery Centre occupies 3,000 square feet within the Police Headquarters building on College Street. The museum solely relies on private donations and is a not for profit registered charity.', '416-808-7020', 'http://www.torontopolice.on.ca/museum/', 'M5G 2J3', 'Toronto Centre'),
(87, 'Toronto Railway Museum', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0f/92/88/9d/roundhouse-turntable.jpg', '255 Bremner Blvd', 'Museum', 'The Toronto Railway Museum encompasses the Canadian Pacific Railway John Street Roundhouse at Roundhouse Park and features a restored turntable, a number of trains and the 1896 Canadian Pacific Don Station.', '416- 214-9229', 'https://torontorailwaymuseum.com/', 'M5V 3M9', 'Spadina-Fort York'),
(88, 'Toronto\'s First Post Office', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/First_Toronto_Post_Office_2022.jpg/500px-First_Toronto_Post_Office_2022.jpg', '260 Adelaide St E', 'Museum', 'Toronto\'s First Post Office acts as a museum but also continues to operate as a full service Canada Post office. Admission to the museum is by donation.', '416-865-1833', 'http://www.townofyork.com/', 'M5A 1N1', 'Toronto Centre'),
(89, 'Ukrainian Museum of Canada', 'https://images.squarespace-cdn.com/content/v1/59d7dbfef14aa1e8dad7655f/1708479885057-MPLMU7OG9DHL7M1OIDOC/DSC03567.jpg?format=750w', '620 Spadina Ave', 'Museum', 'The Ukrainian Museum of Canada features over 4,000 artifacts. These artifacts include prints, coins, maps jewellery, textiles and historic costumes.', '416-923-9861', 'http://umcontario.com/', 'M5S 2H4', 'University-Rosedale');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first` varchar(25) DEFAULT NULL,
  `last` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `permission` tinyint(1) NOT NULL DEFAULT '0',
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `email`, `password`, `active`, `permission`, `dateAdded`) VALUES
(2, 'Test', 'User', 'test@test.com', '8b1a9953c4611296a827abf8c47804d7', 'Yes', 1, '2024-03-11 15:46:45'),
(3, 'Kyle', 'Scott', 'kyle@test.com', 'e8b579fe36f15209c6f167396a46b04e', 'Yes', 0, '2024-03-11 17:00:56'),
(4, 'Basic', 'User', 'basic@user.com', NULL, 'Yes', 0, '2024-03-11 17:01:00'),
(5, 'Sample', 'User', 'sample@user.com', NULL, 'Yes', 0, '2024-03-11 17:01:04'),
(6, 'Museum', 'Patron', 'museum@patron.com', NULL, 'Yes', 0, '2024-03-11 17:01:07'),
(7, 'Comment', 'Leaver', 'comment@leaver.com', NULL, 'Yes', 0, '2024-03-11 17:01:10'),
(9, 'Sample', 'Admin', 'sampleadmin@test.com', 'c3d0701a0282cda456d316090b5f9233', 'Yes', 1, '2024-03-11 17:19:06'),
(10, 'Sample', 'User', 'sampleuser@test.com', 'ca1d6d3aaa46ab9efdbe804d55db49c6', 'Yes', 0, '2024-03-11 17:41:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_museum_id` (`museum_id`);

--
-- Indexes for table `museums`
--
ALTER TABLE `museums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `museums`
--
ALTER TABLE `museums`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_museum_id` FOREIGN KEY (`museum_id`) REFERENCES `museums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
