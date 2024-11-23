-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2024 at 06:41 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20901996_webmovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_img` varchar(10000) NOT NULL,
  `m_price` int(11) NOT NULL,
  `m_trailer` varchar(250) NOT NULL,
  `m_desc` varchar(1000) NOT NULL,
  `m_theatre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `m_name`, `m_img`, `m_price`, `m_trailer`, `m_desc`, `m_theatre`) VALUES
(1, 'Warrior of Future (2022)', 'img/W.jpg', 150, 'https://www.youtube.com/embed/yVHo6OmSpFs', 'เป็นเรื่องราวที่โลกของในอนาคตอันไม่ไกลเมื่อปี 2055 ในปีนั้นได้เกิดสงครามทำให้โลกเกิดความเสียหายครั้งใหญ่จากนั้นผลกระทบที่ตามมาก็คือภาวะโลกร้อนและภัยพิบัติได้ทำลายบรรยากาศโดยสิ้นเชิง เด็กที่เกิดมาแต่ละคนล้วนเต็มไปด้วยความเสี่ยงบางก็พิการมาตั้งแต่กำเนิดและบางคนก็ตายอย่างรวดเร็วจากนั้นมนุษย์โลกจึงได้สร้างตาข่ายลอยฟ้า เพื่อที่จะปกป้องและช่วยเหลือส่วนที่เหลือให้ได้มากที่สุด', 1),
(2, 'Troll (2022)', 'img/Tr.jpg', 200, 'https://www.youtube.com/embed/AiohkY_XQYQ', 'หนังแอคชั่น ผจญภัย เรื่องราวเหนือธรรมชาติ ของผู้กำกับชาวนอร์เวย์ รอร์ อาทัก TROLL หนังเล่าเรื่องราวของทีมนักวิทยาศาสตร์และทหารที่ร่วมมือกันสืบสวน หลังจากพบเบาะแสว่ายักษ์โทรลในตำนานอาจมีอยู่จริง และมันได้ตื่นขึ้นมาจากการหลับไหลและติดอยู่ในภูเขามานับศตวรรษ ปัญหาที่ใหญ่กว่านั้นก็คือ เจ้ายักษ์ตนนี้พร้อมทำลายทุกอย่างที่ขวางหน้า และกำลังมุ่งตรงไปยังเมืองหลวงของนอร์เวย์ แต่เราจะหยุดยั้งสิ่งที่มีอยู่ในตำนานได้ยังไง', 2),
(3, 'The Guardians of the Galaxy Holiday Special (2022) ', 'img/TG.jpg', 150, 'https://www.youtube.com/embed/T7_rLD3S6mY', 'ในภารกิจที่จะทำให้วันคริสต์มาสของควิลล์เป็นที่น่าจดจำ เหล่าผู้พิทักษ์จักรวาลมุ่งหน้าสู่โลกเพื่อตามหาของขวัญที่เหมาะที่สุด', 3),
(4, 'Black Adam (2022)', 'img/B.jpg', 150, 'https://www.youtube.com/embed/mkomfZHG5q4', 'เรื่องราวของ Black Adam ชายผู้แข็งแกร่งที่สุด แต่ถูกประวัติศาสตร์บันทึกว่าเป็นวายร้ายที่ก่อเหตุสังหารฟาโรห์ด้วยแผนการสะเทือนบัลลังก์ หลังจากถูกจับคุมขังนานถึง 5,000 ปี เขาก็ฟื้นกลับมาอีกครั้งท่ามกลางความวุ่นวายของโลกยุคใหม่ แล้วพบว่าเมืองแห่งนี้ประชาชนยังคงโดนกดขี่ด้วยอาวุธ ความรุนแรง และความแร้นแค้น โดยที่โลกยุคนี้มี เดอะจัสติส โซไซตี้ แหล่งรวมตัวของเหล่าแชมเปี้ยนทำหน้าที่สอดส่องรักษาพิทักษ์โลก แน่นอนว่าเมื่อ Black Adam กลับมา พวกเขาจึงต้องรวมตัวกันต่อสู้ เพราะมองว่า Black Adam ที่มีพละกำลังแข็งแกร่งคือตัวอันตรายที่ไม่มีใครเอาชนะได้ หวาดกลัวว่าสักวันจะสร้างความเดือดร้อนให้คนทั้งโลก', 4),
(5, 'Jujutsu Kaisen 0: The Movie (2021) ', 'img/J.jpg', 170, 'https://www.youtube.com/embed/UC6EXdxc1Io', 'เมื่อสมัยยังเป็นเพียงเด็กชายตัวน้อย “อคคทสึ ยูตะ” สูญเสียโอริโมโตะ ริกะซึ่งเป็นเพื่อนวัยเด็กของตัวเองไปต่อหน้าต่อตาจากอุบัติเหตุทางรถยนต์“สัญญานะ ว่าถ้าเป็นผู้ใหญ่เมื่อไรยูตะจะแต่งงานกับริกะ” ความทุกข์ทรมานจากการถูกริกะซึ่งกลายเป็นวิญญาณแค้นตามหลอกหลอน ทำให้ยูตะคิดอยากตายเสียให้รู้แล้วรู้รอดทว่าจู่ ๆ เขากลับถูกผู้ใช้คุณไสยสุดแกร่งโกะโจ ซาโตรุพาตัวมายังโรงเรียนไสยเวท การได้พบกับเซนอิง มาคิ, อินุมาคิ โทเงะและแพนด้าซึ่งเป็นเพื่อนร่วมชั้นเรียนเดียวกันทำให้อ คคทสึตั้งปณิธานหนึ่งกับตัวเอง“ผมอยากได้ความมั่นใจ ว่าผมสมควรมีชีวิตอยู่ต่อ” ”ผมจะแก้คำสาปของริกะจังให้ได้ ที่โรงเรียนไสยเวทนี่แหละครับ”\r\nแต่แล้ว “เกะโท สุงุรุ” นักสาปแช่งจอมชั่วร้ายซึ่งถูกอัปเปหิออกจากโรงเรียนไสยเวทเนื่องจากเคยก่อเหตุสังหารหมู่บุคคลทั่วไปอย่างโหดเหี้ยมกลับมาปรากฏตัวต่อหน้าอคคทสึ “วันที่ 24 ธันวาคมที่กำลังจะมาถึง พวกเราจะจัดขบวนแห่ราตรีร้อยอสูร” เกะโทผู้หมายมาดจะสร้างสรวงสวรรค์ที่มีแค่เพียงผู้ใช้คุณไสย ได้ปล่อยคำสาปนับพันตนสู่ชินจูกุและเกียวโตประหนึ่งต้องการกำจัดผู้ไร้วิชาให้สิ้นซากในท้ายที่สุดแล้วอคคทสึจะหยุดเกะโทได้หรื', 5),
(6, 'Spider-Man: No Way Home (2021)', 'img/MV5BNDMyYTc5ZjYtZTUyNC00MDgxLWE1YTctNGUzOTkxNGE4NjAzXkEyXkFqcGdeQXVyODc0OTEyNDU@._V1_.jpg', 150, 'https://www.youtube.com/embed/JfVOs4VSpmA', 'หลังจากถูกเปิดเผยตัวตนที่แท้จริง ความรับผิดชอบอันยิ่งใหญ่ของการเป็นซูเปอร์ฮีโร่ ขัดแย้งกับการดำเนินชีวิตแบบธรรมดาของเขาและทำให้คนที่เขารักตกอยู่ในอันตราย เขาจึงได้ไปขอความช่วยเหลือจากด็อกเตอร์สเตรนจ์เพื่อใช้เวทมนต์ทำให้ทุกคนลืมตัวตนจริงของ สไปเดอร์-แมนแต่แล้วได้เกิดเหตุการณ์ระหว่างร่ายมนต์ทำให้ส่งผลกระทบกับมัลติยูนิเวิรส์ปลดปล่อยอสรุกายร้ายที่เคยต่อกรกับ สไปเดอร์-แมนในพหุภพต่าง ๆ ออกมาปีเตอร์ พารค์เกอร์ (ทอม ฮอลแลนด์) จะต้องลุกขึ้นสู้กับอุปสรรคอันใหญ่หลวงครั้งนี้ที่จะ เปลี่ยนแปลงไม่ใช่แค่ชีวิตเขาแต่รวมถึงอนาคตของพหุภพต่าง ๆ อีกด้วย!!!', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `total_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `total_cost`) VALUES
(68, 'K3FeCN6', 600),
(69, 'K3FeCN6', 150),
(70, 'EgqZx2', 150),
(71, 'NaNO3', 150),
(72, 'EgqZx2', 200),
(73, 'EgqZx2', 150),
(74, 'admin', 170),
(75, 'EgqZx2', 200),
(76, 'EgqZx2', 150),
(77, 'EgqZx2', 150),
(78, 'EgqZx2', 150),
(79, 'EgqZx2', 150),
(80, 'EgqZx2', 200),
(81, 'admin', 150),
(82, 'Tinnapob', 150);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_time` enum('day','night') NOT NULL,
  `item_date` date DEFAULT NULL,
  `item_theatre` int(11) NOT NULL,
  `seat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `item_id`, `item_name`, `item_price`, `item_quantity`, `item_time`, `item_date`, `item_theatre`, `seat`) VALUES
(68, 1, 'โปรโมชั่นเหมาโรงพาเพื่อนมาดู 4 จ่าย 3(Troll 2022)', 600, 1, 'day', '2023-06-20', 2, ''),
(69, 6, 'Spider-Man: No Way Home (2021)', 150, 1, 'night', '2023-06-20', 6, 'B01'),
(70, 1, 'Warrior of Future (2022)', 150, 1, 'day', '2023-06-26', 1, 'A01'),
(71, 3, 'The Guardians of the Galaxy Holiday Special (2022) ', 150, 1, 'day', '2023-06-28', 3, 'B01'),
(72, 2, 'Troll (2022)', 200, 1, 'day', '2023-06-28', 2, 'A01'),
(73, 3, 'The Guardians of the Galaxy Holiday Special (2022) ', 150, 1, 'day', '2023-07-03', 3, 'A01'),
(74, 5, 'Jujutsu Kaisen 0: The Movie (2021) ', 170, 1, 'day', '2023-07-12', 5, 'A01'),
(75, 2, 'Troll (2022)', 200, 1, 'day', '2023-07-29', 2, 'A01'),
(76, 6, 'Spider-Man: No Way Home (2021)', 150, 1, 'night', '2023-07-29', 6, 'A01'),
(77, 1, 'Warrior of Future (2022)', 150, 1, 'night', '2023-07-29', 1, 'A01'),
(78, 4, 'Black Adam (2022)', 150, 1, 'day', '2023-07-29', 4, 'A01'),
(79, 3, 'The Guardians of the Galaxy Holiday Special (2022) ', 150, 1, 'day', '2023-11-07', 3, 'A01'),
(80, 2, 'Troll (2022)', 200, 1, 'day', '2023-11-10', 2, 'A01'),
(81, 1, 'Warrior of Future (2022)', 150, 1, 'day', '2023-12-01', 1, 'A01'),
(82, 6, 'Spider-Man: No Way Home (2021)', 150, 1, 'day', '2024-05-01', 6, 'A01');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(250) NOT NULL,
  `pro_desc` varchar(1000) NOT NULL,
  `pro_img` varchar(250) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_theatre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price`, `pro_quantity`, `pro_theatre`) VALUES
(1, 'โปรโมชั่นเหมาโรงพาเพื่อนมาดู 4 จ่าย 3(Troll 2022)', 'โปรโมชั่นเหมาโรงพาเพื่อนมาดูมา 4 จ่าย 3 เรื่อง(Troll (2022))\r\n\r\nสำหรับนักเรียน,นักศึกษาเท่านั้น (แสดงบัตรนักเรียนก่อนเข้าโรง)', 'img/p1.png', 600, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `seat_name` varchar(50) NOT NULL,
  `theatre` int(11) NOT NULL,
  `seat_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_name`, `theatre`, `seat_status`) VALUES
(1, 'A01', 1, 1),
(2, 'A02', 1, 0),
(3, 'B01', 1, 0),
(4, 'B02', 1, 0),
(9, 'A01', 2, 1),
(10, 'A02', 2, 0),
(11, 'B01', 2, 0),
(12, 'B02', 2, 0),
(13, 'A01', 3, 1),
(14, 'A02', 3, 0),
(15, 'B01', 3, 0),
(16, 'B02', 3, 0),
(17, 'A01', 4, 0),
(18, 'A02', 4, 0),
(19, 'B01', 4, 0),
(20, 'B02', 4, 0),
(21, 'A01', 5, 0),
(22, 'A02', 5, 0),
(23, 'B01', 5, 0),
(24, 'B02', 5, 0),
(25, 'A01', 6, 1),
(26, 'A02', 6, 0),
(27, 'B01', 6, 0),
(28, 'B02', 6, 0),
(29, 'A01', 7, 0),
(30, 'A02', 7, 0),
(31, 'B01', 7, 0),
(32, 'B02', 7, 0),
(33, 'A01', 8, 0),
(34, 'A02', 8, 0),
(35, 'B01', 8, 0),
(36, 'B02', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` enum('user','admin') NOT NULL DEFAULT 'user',
  `name` varchar(250) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `username`, `password`, `email`) VALUES
(1, 'admin', 'Atiwit Thongngoen', 'EgqZx2', 'Egq123za', 'atiwit.egq@gmail.com'),
(2, 'user', 'seaseaseas', 'easease', 'easesaease', 'asease@gmail.com'),
(3, 'user', 'pure suttida', 'pure', '1234', 'pure@gmail.com'),
(4, 'user', 'gut nahee', 'gutzaa', '1', 'gut@gmail.com'),
(6, 'user', 'seaseas', 'easeaseasea', 'seaseasease', 'aseaseasease@g.c'),
(7, 'user', 'Ksjsn', 'Kejsnen', 'dkdjsjsj', 'dhsksk@g.c'),
(8, 'user', 'Testtickiet', 'Testtickiet', 'Testtickiet', 'Testtickiet@g.c'),
(9, 'user', 'Nattanan', 'K3FeCN6', '1235', '66920@pibul.ac.th'),
(10, 'user', 'NaNO3', 'NaNO3', 'NaNO3', '1234@gmail.com'),
(11, 'admin', 'admin', 'admin', 'admin', 'admin@ac'),
(12, 'user', 'Test01', 'Test01', 'Test01', 'Test01@gmail.com'),
(13, 'user', 'TIFZzRbOYsWiN', 'zjXpgwUGcWSI', 'OuFACMUoaYmN!', 'HisakoFogle114@yahoo.com'),
(14, 'user', 'qGeFTiKuaIcOLdxo', 'iEgouJIlG', 'wLNHiD8s1GcO!', 'dimabt5roz@outlook.com'),
(15, 'user', 'P', 'Tinnapob', 'tinnapob2549', 'tinnapob2549@gmail.com'),
(16, 'user', 'hJkyVqCpOuPM', 'HtsvXEkBSeG', 'HYzpcGfWqZ72!', 'rochellevr_correla6w@outlook.com'),
(17, 'user', 'cToriXtPyfxkqFbV', 'OqrnWsvp', 'h40PBIdsQvUy!', 'william_cohensjyy@outlook.com'),
(18, 'user', 'ftwFRkuZjEpN', 'GZoEauVDTflI', '70FjZeTBG9Q2!', 'harrischristy4282@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_id` (`order_id`) USING BTREE;

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`id20901996_root`@`%` EVENT `autocleanseat` ON SCHEDULE EVERY 1 DAY STARTS '2023-06-18 00:00:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'ทำการเคลียร์ที่หนังหลังจากผ่านไป1วัน' DO UPDATE `seat` SET `seat_status` = '0'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
