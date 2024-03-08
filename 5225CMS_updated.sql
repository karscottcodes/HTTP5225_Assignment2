-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 08, 2024 at 04:59 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `museums`
--

CREATE TABLE `museums` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` longblob,
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
(63, 'Aga Khan Museum', NULL, '77 Wynford Dr', 'Museum', 'Dedicated to sharing the artistic, intellectual, and scientific contributions that Islamic civilizations and cultures have made to world heritage.', '416-646-4677', 'https://www.agakhanmuseum.org/', 'M3C 1K1', 'Don Valley East'),
(64, 'Black Creek Pioneer Village', NULL, '1000 Murray Ross Pkwy', 'Museum', 'Become immersed in the lifestyles, customs, and surroundings of early residents who built the foundations for modern Toronto and Ontario at this 30-acre site.', '416-736-1733', 'https://blackcreek.ca/', 'M3J 2P3', 'Humber River-Black Creek'),
(65, 'Campbell House', NULL, '160 Queen St W', 'Museum', 'The Campbell house dates back to 1822 and was once home to Judge William Campbell.  It is the last example of Palladian architecture in  Toronto.', '416-597-0227', 'http://www.campbellhousemuseum.ca/', 'M5H 3H3', 'Spadina-Fort York'),
(66, 'Canadian Museum of Cultural Heritage of Indo-Canadian', NULL, '61 Claireville Dr', 'Museum', 'The Canadian Museum of Cultural Heritage of Indo-Canadians is a museum committed to the understanding of India\'s rich cultural heritage. See BAPS Shri Swaminarayan Mandir.', '416-798-2277', 'https://www.baps.org/cultureandheritage/ExperienceIndia/Exhibitions/CanadianMuseumofCulturalHeritageofIndo-Canadians.aspx', 'M9W 5Z7', 'Etobicoke North'),
(67, 'CBC Museum', NULL, '250 Front St W', 'Museum', 'The CBC Museum features various CBC archival materials that date back to 1936. The museum also features the Graham Spry Theatre and a number of interactive exhibits.', '416-205-5574', 'https://www.cbc.ca/museum/', 'M5V 3G5', 'Spadina-Fort York'),
(68, 'Colborne Lodge', NULL, '11 Colborne Lodge Dr', 'Museum', 'This quaint cottage located within High Park was home to John and Jemma Howard. In 1873 the couple deeded the part to lodge to the City of Toronto. The house is a great example of a regency style building.', '416-392-6916', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/colborne-lodge/', '', 'Parkdale-High Park'),
(69, 'Design Exchange', NULL, '234 Bay St', 'Museum', 'Canada\'s only museum dedicated to the preservation of design which includes the design heritage from an array of mediums.', '416-363-6121', 'https://dx.org/', '', 'Spadina-Fort York'),
(70, 'Fort York National Historic Site', NULL, '250 Fort York Blvd', 'Museum', 'Birthplace of Toronto in 1793 and scene of the Battle of York in 1813, Fort York has Canada\'s largest collection of original War of 1812 buildings. Open year round for tours, exhibits, and demonstrations.', '416-392-6907', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/fort-york-national-historic-site/', 'M5V 3K9', 'Spadina-Fort York'),
(71, 'Gardiner Museum of Ceramic Art', NULL, '111 Queen\'s Park', 'Museum', 'A museum dedicated to one of the oldest forms of art. The Gardiner Museum of Ceramic Art is home to over 3,000 historical and contemporary ceramic pieces.', '416-586-8080', 'https://www.gardinermuseum.on.ca/', 'M5S 2C7', 'University-Rosedale'),
(72, 'Gibson House Museum', NULL, '5172 Yonge St', 'Museum', 'Operated  by the City of Toronto, the Gibson House is a museum where visitors experience an exquisite farmhouse and learn more about the rural development of the area.', '416-395-7432', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/gibson-house-museum/', 'M2N 5P6', 'Willowdale'),
(73, 'Historic Zion Schoolhouse', NULL, '1091 Finch Ave E', 'Museum', 'Built in 1869, the Historic Zion Schoolhouse has been restored to emulate schooling as it once was in the farming  district of L\'Amaroux', '416-395-7435', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/zion-schoolhouse/', 'M2J 2X3', 'Don Valley North'),
(74, 'Japan Foundation', NULL, '2 Bloor St E', 'Museum', 'A cultural establishment aiming towards effective development of its international cultural exchange programs in Japanese arts and cultural exchange.', '416-966-1600', 'https://jftor.org/', 'M4W 1A8', 'University-Rosedale'),
(75, 'Mackenzie House', NULL, '82 Bond St', 'Museum', 'Mackenzie House is the restored home of William Lyon Mackenzie, Toronto\'s first Mayor. It is one of 10 museums operated by the City of Toronto.', '416-392-6915', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/mackenzie-house/', 'M5B 1X2', 'Toronto Centre'),
(76, 'Montgomery\'s Inn', NULL, '4709 Dundas St W', 'Museum', 'A museum that was once a historic home, visitors can delve into the lifestyle of a 19th century Irish farm family with access to the bedrooms, kitchen wing and much more.', '416-394-8113', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/montgomerys-inn/', 'M9A 1A8', 'Etobicoke Centre'),
(77, 'Redpath Sugar Museum', NULL, '95 Queens Quay E', 'Museum', 'Located inside the Redpath Refinery, the Redpath Sugar Museum is for those interested in the history of sugar, the development and the role of the Redpath family in Canada\'s industry sector, and much more.', '416-366-3561', 'https://www.redpathsugar.com/', 'M5E 1A3', 'Spadina-Fort York'),
(78, 'Royal Ontario Museum', NULL, '100 Queen\'s Park', 'Museum', 'Canada\'s largest museum of natural history and world cultures, presents engaging galleries of art, archaeology, and natural science from around the world.', '416-586-8000', 'https://www.rom.on.ca/en', 'M5S 2C6', 'University-Rosedale'),
(79, 'Sarah and Chaim Neuberger Holocaust Education Centre', NULL, '4600 Bathurst St', 'Museum', 'The Sarah and Chaim Neuberger Holocaust Education Centre provides all its visitors a complete understanding of the Holocaust.30, 000 students pass through its doors during educational trips.', '416-631-5689', 'https://www.holocaustcentre.com/', 'M2R 3V2', 'York Centre'),
(80, 'Scarborough Museum', NULL, '1007 Brimley Rd', 'Museum', 'The Scarborough Museum and its gardens are located within Thomson Memorial Park.It is one of 10 museums operated by the City of Toronto.The Museum looks back on the story of Scarborough\'s roots and history.', '416-338-8807', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/scarborough-museum/', 'M1P 3E8', 'Scarborough Centre'),
(81, 'Spadina Museum', NULL, '285 Spadina Rd', 'Museum', 'Operated by the City of Toronto, the Spadina Museum is a historic manor house that allows visitors to learn about the history and architecture of  late 19th century to early 20th century Toronto.', '416-392-6910', 'https://www.toronto.ca/explore-enjoy/history-art-culture/museums/spadina-museum/', 'M5R 2V5', 'Toronto-St. Paul\'s'),
(82, 'Taras H. Shevchenko Museum', NULL, '1604 Bloor St W', 'Museum', 'The Taras H. Shevchenko Museum is the home to  exhibitions dedicated to the contribution of Ukrainians in Canada and the life of famed writer Taras Shevchenko.', '416-534-8662', 'http://www.infoukes.com/shevchenkomuseum/', 'M6P 1A7', 'Parkdale-High Park'),
(83, 'Textile Museum of Canada', NULL, '55 Centre Ave', 'Museum', 'With more than 13,000 objects from more than 200 countries and regions, the Textile Museum of Canada celebrates cultural diversity through traditional fabrics, garments, carpets and related artifacts such as beadwork and basketry.', '416-599-5321', 'https://textilemuseum.ca/', 'M5G 2H5', 'Spadina-Fort York'),
(84, 'The 48th Highlanders Museum', NULL, '73 Simcoe St', 'Museum', 'This museum is dedicated to one of Canada\'s famous military regiments. The museum holds historical artifacts dating from Victorian Toronto in 1891, when the 48th Highlanders was formed, to the present day.', '416-635-4440', 'http://www.48highlanders.com/04_03.html', 'M5J 1W9', 'Spadina-Fort York'),
(85, 'The Bata Shoe Museum', NULL, '327 Bloor St W', 'Museum', 'Home to hundreds of shoes (from a collection numbering over 13,000). The museum celebrates the style and function of footwear in impressive galleries from ancient Egypt to modern fashion.', '416-979-7799', 'https://batashoemuseum.ca/', 'M5S 1W7', 'University-Rosedale'),
(86, 'Toronto Police Museum & Discovery Centre', NULL, '40 College St', 'Museum', 'The Toronto Police Museum & Discovery Centre occupies 3,000 square feet within the Police Headquarters building on College Street. The museum solely relies on private donations and is a not for profit registered charity.', '416-808-7020', 'http://www.torontopolice.on.ca/museum/', 'M5G 2J3', 'Toronto Centre'),
(87, 'Toronto Railway Museum', NULL, '255 Bremner Blvd', 'Museum', 'The Toronto Railway Museum encompasses the Canadian Pacific Railway John Street Roundhouse at Roundhouse Park and features a restored turntable, a number of trains and the 1896 Canadian Pacific Don Station.', '416- 214-9229', 'https://torontorailwaymuseum.com/', 'M5V 3M9', 'Spadina-Fort York'),
(88, 'Toronto\'s First Post Office', NULL, '260 Adelaide St E', 'Museum', 'Toronto\'s First Post Office acts as a museum but also continues to operate as a full service Canada Post office. Admission to the museum is by donation.', '416-865-1833', 'http://www.townofyork.com/', 'M5A 1N1', 'Toronto Centre'),
(89, 'Ukrainian Museum of Canada', NULL, '620 Spadina Ave', 'Museum', 'The Ukrainian Museum of Canada features over 4,000 artifacts. These artifacts include prints, coins, maps jewellery, textiles and historic costumes.', '416-923-9861', 'http://umcontario.com/', 'M5S 2H4', 'University-Rosedale');

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
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `email`, `password`, `active`, `dateAdded`) VALUES
(2, 'Test', 'User', 'test@test.com', '8b1a9953c4611296a827abf8c47804d7', 'Yes', '2024-03-06 19:00:18'),
(3, 'Kyle', 'Scott', 'kyle@test.com', 'e8b579fe36f15209c6f167396a46b04e', 'Yes', '2024-03-06 22:11:52');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `museums`
--
ALTER TABLE `museums`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
