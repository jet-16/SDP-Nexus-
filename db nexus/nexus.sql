-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 10:04 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myadddressbook`
--
CREATE DATABASE IF NOT EXISTS `myadddressbook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myadddressbook`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_address` text NOT NULL,
  `contact_gender` varchar(10) NOT NULL,
  `contact_relationship` varchar(10) NOT NULL,
  `contact_dob` date NOT NULL,
  `photo_path` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_phone`, `contact_email`, `contact_address`, `contact_gender`, `contact_relationship`, `contact_dob`, `photo_path`) VALUES
(8, 'qwe', 'qwe', 'qwe@qwe', 'qwe', 'Male', 'Family', '2020-02-19', ''),
(6, 'asd', 'asd', 'asd@asd', '  das ', 'Female', 'Other', '2020-02-26', ''),
(7, '123', '123', '123@123', '123', 'Male', 'Colleague', '2020-02-22', ''),
(13, '123', '123', 'asd@asd', 'asdf', 'Male', 'Other', '2020-02-03', 'uploads/1.png'),
(12, '123', '123', '123@123', '123', 'Female', 'Family', '2020-02-18', 'uploads/10.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_role`) VALUES
(1, 'admin', 'admin', 0),
(2, 'TP053060', 'TP053060', 1),
(3, '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `nexus`
--
CREATE DATABASE IF NOT EXISTS `nexus` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nexus`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_ID`, `game_id`, `comment`) VALUES
(4, 18, 75, 'This game is phenomonon.'),
(5, 39, 73, 'AVENGERS ASSEMBLE!');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_ID` int(11) NOT NULL,
  `game_seller` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_description` text NOT NULL,
  `game_downloadpath` text NOT NULL,
  `game_price` decimal(8,2) NOT NULL,
  `game_photopath` text NOT NULL,
  `game_videopath` text NOT NULL,
  `game_logopath` text NOT NULL,
  `game_backgroundimagepath` text NOT NULL,
  `game_status` int(11) NOT NULL,
  `game_category` varchar(255) NOT NULL,
  `game_releasedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_ID`, `game_seller`, `game_name`, `game_description`, `game_downloadpath`, `game_price`, `game_photopath`, `game_videopath`, `game_logopath`, `game_backgroundimagepath`, `game_status`, `game_category`, `game_releasedate`) VALUES
(73, 19, 'Avengers', 'Marvel Avengers is an epic, third-person, action-adventure game that combines an original, cinematic story with single-player and co-operative gameplay*. Assemble into a team of up to four players online, master extraordinary abilities, customize a growing roster of Heroes, and defend the Earth from escalating threats.', 'gamefile/Avengers.rar', '299.00', 'gamephoto/avengers.png', 'gamevideo/Avengers .mp4', 'gamelogo/avengerslogo.png', 'gamebackground/avengersbg.png', 1, 'Action', '2020-09-10'),
(74, 19, 'Megaman 11', '<p>Mega Man 11 is an action-platform game developed and published by Capcom. The game is an entry in the original Mega Man series, and was released worldwide for Microsoft Windows, Nintendo Switch, PlayStation 4, and Xbox One in October 2018.</p>', 'gamefile/Megaman.rar', '69.99', 'gamephoto/mega-man_main.jpg', 'gamevideo/Mega_Man_11-Announcement_Trailer.mp4', 'gamelogo/megaman11_logo.jpg', 'gamebackground/megaman_background.jpg', 1, 'Action', '2020-09-10'),
(75, 19, 'Forza Horizon 4', 'Forza Horizon 4 is a 2018 racing video game developed by Playground Games and published by Microsoft Studios. It was released on 2 October 2018 on Xbox One and Microsoft Windows after being announced at Xbox E3 2018 conference. The game is set in a fictionalised representation of areas of Great Britain. It is the fourth Forza Horizon title and eleventh instalment in the Forza series. The game is noted for its introduction of changing seasons to the series.', 'gamefile/ProjectNexus2.0compiled).zip', '140.00', 'gamephoto/forzahorizon4.jpg', 'gamevideo/forzavid.mp4', 'gamelogo/forzalogo.png', 'gamebackground/forzabg.jpg', 1, 'Racing', '2020-09-10'),
(76, 19, 'FIFA 20', 'FIFA 20 is a football simulation video game published by Electronic Arts as part of the FIFA series. It is the 27th installment in the FIFA series, and was released on 27 September 2019 for Microsoft Windows, PlayStation 4, Xbox One, and Nintendo Switch. A Stadia version is due in 2020.', 'gamefile/FIFA20.rar', '89.99', 'gamephoto/fifa-20_main.jpg', 'gamevideo/FIFA 20 - Official Gameplay Trailer.mp4', 'gamelogo/FIFA-20_logojpg.jpg', 'gamebackground/fifa20_background.jpg', 1, 'Sports', '2020-09-10'),
(77, 19, 'Call Of Duty WW2', '<p>Call of Duty: WWII is a 2017 first-person shooter video game developed by Sledgehammer Games and published by Activision. It was released worldwide on November 3, 2017 for Microsoft Windows, PlayStation 4 and Xbox One</p>', 'gamefile/CODWW2.rar', '200.99', 'gamephoto/Call_of_Duty_WWII_main.jpg', 'gamevideo/Official Call of Duty®- WWII Reveal Trailer.mp4', 'gamelogo/ww2Logo.jpg', 'gamebackground/call_of_duty_worldwar2_background.jpg', 1, 'FPS', '2020-09-10'),
(78, 19, 'Flight Simulator 2020', 'Microsoft Flight Simulator is a flight simulator developed by Asobo Studio and published by Xbox Game Studios for Microsoft Windows. It was released on August 18, 2020 for Microsoft Windows. It is the eleventh major entry in the Microsoft Flight Simulator series, preceded by Flight Simulator X.', 'gamefile/FS2020.rar', '289.99', 'gamephoto/FS_main.jpg', 'gamevideo/Microsoft Flight Simulator - Official Trailer.mp4', 'gamelogo/FS_logo.jpg', 'gamebackground/FS_background.jpg', 1, 'Simulation', '2020-09-10'),
(80, 19, 'FFVIIRemake', 'Final Fantasy VII Remake is a 2020 action role-playing game developed and published by Square Enix. It is the first in a planned series of games remaking the 1997 PlayStation game Final Fantasy VII. Set in the dystopian cyberpunk metropolis of Midgar, it puts players in the role of a mercenary named Cloud Strife.', 'gamefile/FFVII.rar', '99.99', 'gamephoto/FFVIIRemake_main.png', 'gamevideo/Final Fantasy VII Remake - Final Trailer - PS4.mp4', 'gamelogo/final-fantasy-vii-remake-logo.png', 'gamebackground/FINAL_FANTASY_VII_REMAKE_background.jpg', 1, 'RPG', '2020-09-10'),
(81, 19, 'Horzion Zero Dawn', '<p>Horizon Zero Dawn is an action role-playing game developed by Guerrilla Games and published by Sony Interactive Entertainment. The plot follows Aloy, a hunter in a world overrun by machines, who sets out to uncover her past. The player uses ranged weapons, a spear, and stealth to combat mechanical creatures and other enemy forces. A skill tree provides the player with new abilities and bonuses. The player can explore the open world to discover locations and take on side quests.</p>', 'gamefile/HorizonZeroDawn.rar', '79.89', 'gamephoto/Horizon_Zero_Dawn_main.jpg', 'gamevideo/Horizon Zero Dawn - E3 2016 Gameplay Video - Only on PS4.mp4', 'gamelogo/Horizon-Zero-Dawn-1_logo.jpg', 'gamebackground/horizon_background.jpg', 1, 'Adventure', '2020-09-10'),
(82, 19, 'League of Legends', 'League of Legends is a team-based strategy game where two teams of five powerful champions face off to destroy the others base. Choose from over 140 champions to make epic plays, secure kills, and take down towers as you battle your way to victory.', 'gamefile/ProjectNexus2.0compiled).zip', '10.00', 'gamephoto/lol.jpg', 'gamevideo/dota2vid.mp4', 'gamelogo/lollogo.png', 'gamebackground/lolbg.jpg', 0, 'MOBA', '2020-09-10'),
(83, 19, 'Warcraft 3 Reforged', '<p>Hi</p>', 'gamefile/W3R.rar', '79.89', 'gamephoto/w3reforged_main.jpg', 'gamevideo/Warcraft III- Reforged Gameplay Trailer.mp4', 'gamelogo/warcraft-iii-reforged_logo.png', 'gamebackground/Warcraft_III_Reforged_background.jpg', 0, 'Strategy', '2020-09-11'),
(84, 19, 'HAHA', '', 'gamefile/CODWW2.rar', '331223.00', 'gamephoto/Avengers_Logo.jpg', 'gamevideo/Final Fantasy VII Remake - Final Trailer - PS4.mp4', 'gamelogo/call_of_duty_worldwar2_background.jpg', 'gamebackground/avengerslogo.png', 0, 'Action', '2020-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_ID` int(11) NOT NULL,
  `purchase_customer` int(11) NOT NULL,
  `purchase_game` int(11) NOT NULL,
  `purchase_price` decimal(8,2) NOT NULL,
  `purchase_receipt` varchar(20) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_ID`, `purchase_customer`, `purchase_game`, `purchase_price`, `purchase_receipt`, `purchase_date`, `purchase_time`) VALUES
(39, 3, 73, '299.00', '373', '2020-09-10', '10:16:58'),
(40, 18, 74, '69.99', '1874', '2020-09-10', '10:31:58'),
(41, 3, 74, '69.99', '374', '2020-09-10', '11:26:07'),
(42, 18, 75, '140.00', '1875', '2020-09-10', '11:28:51'),
(43, 18, 76, '89.99', '1876', '2020-09-10', '11:28:58'),
(44, 39, 73, '299.00', '3973', '2020-09-11', '01:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `game_ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `game_ID`, `user_id`, `ratings`) VALUES
(6, 75, 18, 5),
(7, 73, 39, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `user_photopath` text NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_email`, `user_contact`, `user_gender`, `user_role`, `user_photopath`, `user_status`) VALUES
(3, 'demo', 'demo', 'demo@demo', '', 'female', 'customer', 'profilepic/fifa20.jpg', 0),
(18, 'cust', 'cust', 'customer@gmail', '', 'female', 'customer', 'profilepic/fifa20.jpg', 0),
(19, 'dev', 'dev', 'dev@dev', '0125647789', 'male', 'seller', 'profilepic/banner-batman-animated.jpg', 0),
(20, 'admin', 'admin', 'admin@admin.com', '0125663456', 'female', 'admin', 'profilepic/monster25.png', 0),
(39, 'jet', 'jet', 'jet@jet.com', '', 'female', 'customer', 'profilepic/icust.png', 0),
(42, 'andy', 'andy', 'andy@andy.com', '1234567890', 'male', 'seller', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `game` (`game_id`),
  ADD KEY `user` (`user_ID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_ID`),
  ADD KEY `game_seller` (`game_seller`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_ID`),
  ADD KEY `purchase_game` (`purchase_game`),
  ADD KEY `purchase_customer` (`purchase_customer`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `game_ID` (`game_ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `game` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `game_seller` FOREIGN KEY (`game_seller`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_customer` FOREIGN KEY (`purchase_customer`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_game` FOREIGN KEY (`purchase_game`) REFERENCES `games` (`game_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `game_ID` FOREIGN KEY (`game_ID`) REFERENCES `games` (`game_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"nexus\",\"table\":\"games\"},{\"db\":\"nexus\",\"table\":\"users\"},{\"db\":\"nexus\",\"table\":\"comments\"},{\"db\":\"nexus\",\"table\":\"ratings\"},{\"db\":\"nexus\",\"table\":\"purchase\"},{\"db\":\"resort\",\"table\":\"user\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'nexus', 'games', '{\"sorted_col\":\"`game_description`  DESC\"}', '2020-09-11 06:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2020-09-11 06:24:30', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `resort`
--
CREATE DATABASE IF NOT EXISTS `resort` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `resort`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `Totalprice` int(11) DEFAULT NULL,
  `Checkin` date NOT NULL,
  `Checkout` date NOT NULL,
  `RoomName` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Phoneno` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Needs` varchar(50) NOT NULL,
  `RoomID` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `Totalprice`, `Checkin`, `Checkout`, `RoomName`, `FullName`, `Phoneno`, `Email`, `Needs`, `RoomID`) VALUES
(13, 280, '2020-08-31', '2020-09-01', 'Superior Room', 'Steven Pau', 1125071248, 'steven@gmail.com', '123', '14'),
(14, 0, '0000-00-00', '0000-00-00', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(15) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Capacity` varchar(50) NOT NULL,
  `Bedding` varchar(20) NOT NULL,
  `photo_path` text NOT NULL,
  `room_seson` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `Name`, `Price`, `Size`, `Capacity`, `Bedding`, `photo_path`, `room_seson`) VALUES
(11, 'Beachfront Deluxe ', 329, '74', 'Max 4 Person', 'King + Queen Bed', 'uploads/bf-deluxe-bungalow-01.jpg', 'high season'),
(12, 'Beach Villa', 290, '103', 'Max 7 Person', '2 King + 1 Queen Bed', 'uploads/qq3pzll0ueefjl7zfpqkf0otfz9cxltf.jpg', 'low season'),
(13, 'Garden Pool Villa', 250, '98', 'Max 4 person', ' King + Single Bed', 'uploads/vlezd1lnghqcbjcwrusewduk0fuwdw3m.jpg', 'high season'),
(14, 'Superior Room', 280, '120', 'Max 5 Person', 'King + Queen Bed', 'uploads/gtkw8bcrkgioyx17mfxe4ylibdyxe0t5.jpg', 'low season');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Role`, `email`, `Name`, `Phone`) VALUES
(19, 'asd', '123', 'admin', '123123', 'askdasd', 123123),
(25, 'administrator', '123', 'asd', 'stevenpau99@gmail.com', 'Superior Room', 1125071248),
(24, 'administrator', '123', 'asdasd', 'stevenpau99@gmail.com', 'Superior Room', 1125071248),
(23, 'haha', '123', 'customer', 'stevenpau99@gmail.com', 'CAT', 1111111),
(26, 'administrator', '123', 'ada', 'stevenpau99@gmail.com', 'Superior Room', 1125071248);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
