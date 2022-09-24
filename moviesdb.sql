-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for webxem_phim
CREATE DATABASE IF NOT EXISTS `webxem_phim` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `webxem_phim`;

-- Dumping structure for table webxem_phim.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table webxem_phim.categories: ~3 rows (approximately)
REPLACE INTO `categories` (`id`, `title`, `description`, `status`) VALUES
	(1, 'Phim đề cử', 'Phim được đề cử', 1),
	(2, 'Phim mới cập nhật', 'Phim mới cập nhật', 1),
	(3, 'Phim phổ biến', 'Phim phổ biến', 1);

-- Dumping structure for table webxem_phim.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table webxem_phim.countries: ~2 rows (approximately)
REPLACE INTO `countries` (`id`, `title`, `description`, `status`) VALUES
	(1, 'Nhật Bản', 'Phim Nhật Bản', 1),
	(2, 'Trung Quốc', 'Phim Trung Quốc', 1);

-- Dumping structure for table webxem_phim.episodes
CREATE TABLE IF NOT EXISTS `episodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linkphim` longtext DEFAULT NULL,
  `episode` int(11) DEFAULT NULL,
  `moive_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `moive_id` (`moive_id`),
  CONSTRAINT `FK_episodes_moives` FOREIGN KEY (`moive_id`) REFERENCES `movies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table webxem_phim.episodes: ~33 rows (approximately)
REPLACE INTO `episodes` (`id`, `linkphim`, `episode`, `moive_id`) VALUES
	(42, 'DLDL-Tap1.mp4', 1, 33),
	(43, 'DLDL-Tap2.mp4', 2, 33),
	(44, '20220910043714_trailerDLDL.mp4', 3, 33),
	(45, '20220910043730_trailerDLDL.mp4', 4, 33),
	(47, '20220909180528_trailerDLDL.mp4', 5, 33),
	(48, '20220909180538_trailerDLDL.mp4', 6, 33),
	(49, '20220909180547_trailerDLDL.mp4', 7, 33),
	(50, '20220909180556_trailerDLDL.mp4', 8, 33),
	(51, '20220909180604_trailerDLDL.mp4', 9, 33),
	(53, '20220909180613_trailerDLDL.mp4', 10, 33),
	(54, '20220909180620_trailerDLDL.mp4', 11, 33),
	(55, '20220909180627_trailerDLDL.mp4', 12, 33),
	(57, '20220909180634_trailerDLDL.mp4', 13, 33),
	(58, '20220909180641_trailerDLDL.mp4', 14, 33),
	(59, '20220909180649_trailerDLDL.mp4', 15, 33),
	(60, '20220909180656_trailerDLDL.mp4', 16, 33),
	(61, '20220909180704_trailerDLDL.mp4', 17, 33),
	(62, '20220909180711_trailerDLDL.mp4', 18, 33),
	(63, '20220909180720_trailerDLDL.mp4', 19, 33),
	(64, '20220909180728_trailerDLDL.mp4', 20, 33),
	(65, '20220910043655_trailerDPTK.mp4', 1, 34),
	(66, '20220909180844_trailerDPTK.mp4', 2, 34),
	(67, '20220909180855_trailerDPTK.mp4', 3, 34),
	(68, '20220909180902_trailerDPTK.mp4', 4, 34),
	(69, '20220909180909_trailerDPTK.mp4', 5, 34),
	(70, '20220910043605_Character Demo - Zhongli_ The Listener _ Genshin Impact.mp4', 1, 48),
	(71, '20220910043611_New Character Demo - Kaedehara Kazuha_ Wandering Winds _ Genshin Impact.mp4', 2, 48),
	(72, '20220910043620_Character Demo - Zhongli_ The Listener _ Genshin Impact.mp4', 3, 48),
	(73, '20220910043626_New Character Demo - Kaedehara Kazuha_ Wandering Winds _ Genshin Impact.mp4', 4, 48),
	(74, '20220910043632_Character Demo - Zhongli_ The Listener _ Genshin Impact.mp4', 5, 48),
	(75, '20220910043639_New Character Demo - Kaedehara Kazuha_ Wandering Winds _ Genshin Impact.mp4', 6, 48);

-- Dumping structure for table webxem_phim.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_genre` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table webxem_phim.genres: ~43 rows (approximately)
REPLACE INTO `genres` (`id`, `title_genre`, `description`, `status`) VALUES
	(1, 'Anime', 'Phim Anime', 1),
	(2, 'Hành động', 'Phim hành động', 1),
	(3, 'Hài hước', 'Phim hài hước', 1),
	(4, 'Tình cảm', 'Phim tình cảm', 1),
	(5, 'Herem', 'Phim Herem', 1),
	(6, 'Bí ẩn', 'Phim bí ẩn', 1),
	(7, 'Bi kịch', 'Phim bị kịch', 1),
	(8, 'Viễn tưởng', 'Phim viễn tưởng', 1),
	(34, 'CN Animation', 'Phim CN Animation', 1),
	(61, 'Dị giới', 'Phim dị giới', 1),
	(62, '[CNA] Hài hước', '[CNA] Hài hước', 1),
	(63, 'Học đường', 'Học đường', 1),
	(64, 'Võ thuật', 'Võ thuật', 1),
	(65, 'Trò chơi', 'Trò chơi', 1),
	(66, 'Thám tử', 'Thám tử', 1),
	(67, 'Thể thao', 'Thể thao', 1),
	(68, 'Âm nhạc', 'Âm nhạc', 1),
	(69, 'Psychological', 'Psychological', 1),
	(70, 'Tiên hiệp', 'Tiên hiệp', 1),
	(71, 'Kiếm hiệp', 'Kiếm hiệp', 1),
	(72, 'Đam mỹ', 'Đam mỹ', 1),
	(73, 'Võ hiệp', 'Võ hiệp', 1),
	(74, 'Lịch sử', 'Lịch sử', 1),
	(75, 'Siêu năng lực', 'Siêu năng lực', 1),
	(76, 'Shounen', 'Shounen', 1),
	(77, 'Shounen', 'Shounen', 1),
	(78, 'Shounen AI', 'Shounen AI', 1),
	(79, 'Shoujo', 'Shoujo', 1),
	(80, 'Shoujo AI', 'Shoujo AI', 1),
	(81, 'Mecha', 'Mecha', 1),
	(82, 'Quân đội', 'Quân đội', 1),
	(83, 'Xuyên không', 'Xuyên không', 1),
	(84, 'Trùng sinh', 'Trùng sinh', 1),
	(85, 'Ecchi', 'Ecchi', 1),
	(86, 'Demon', 'Demon', 1),
	(87, 'Drama', 'Drama', 1),
	(88, 'Seinen', 'Seinen', 1),
	(89, 'Siêu nhiên', 'Siêu nhiên', 1),
	(90, 'Kinh dị', 'Kinh dị', 1),
	(91, 'Ma cà rồng', 'Ma cà rồng', 1),
	(92, 'Tokusatsu', 'Tokusatsu', 1),
	(93, 'Samurai', 'Samurai', 1),
	(94, 'Huyền ảo', 'Huyền ảo', 1),
	(95, '[CNA] Ngôn tình', '[CNA] Ngôn tình', 1),
	(96, 'Live Action', 'Live Action', 1),
	(97, 'Live Action', 'Live Action', 1),
	(98, 'Khoa huyễn', 'Khoa huyễn', 1);

-- Dumping structure for table webxem_phim.movies
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_movie` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `list_episodes` int(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `genre_id` (`genre_id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `FK_moives_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_moives_countries` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `FK_moives_genres` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table webxem_phim.movies: ~22 rows (approximately)
REPLACE INTO `movies` (`id`, `title_movie`, `description`, `status`, `image`, `year`, `list_episodes`, `category_id`, `genre_id`, `country_id`) VALUES
	(33, 'Đấu La Đại Lục', '<p>       Mở đầu câu chuyện xuất hiện một nam nhân tên Đường Tam bị Đường Môn truy sát, là tông môn nổi tiếng với các loại cơ quan ám khí nhất là "Phật nộ đường liên". Thân là thiên tài ngàn năm có một nhưng vì chỉ có thân phận ngoại môn đồ.</p>\r\n<p>       Vì chứng minh hắn chưa bao giờ quên cội nguồn nên Đường Tam đã tự sát, không ngờ hắn lại xuyên không trọng sinh vào một đứa trẻ cùng tên trên một nơi kỳ lạ gọi là Đấu La đại lục. Người trên Đấu La đại lục, vũ hồn sẽ Giác Tỉnh lúc sáu tuổi, Vũ hồn chia làm hai loại lớn, một loại là khí vũ hồn, một loại là thú vũ hồn.</p>\r\n<p>       Mở đầu câu chuyện xuất hiện một nam nhân tên Đường Tam bị Đường Môn truy sát, là tông môn nổi tiếng với các loại cơ quan ám khí nhất là "Phật nộ đường liên". Thân là thiên tài ngàn năm có một nhưng vì chỉ có thân phận ngoại môn đồ. </p>\r\n<p>       Đấu La Đại Lục là câu chuyện về quá trình trưởng thành của Đường Tam tại Đại Lục Đấu La, cùng tình cảm từ thuở thanh mai trúc mã với "đại tỷ" Tiểu Vũ đầy bí ẩn, giữa tình thân gia đình, tình thầy trò với Đại sư, giữa các đồng đội trong đội ngũ Sử Lai Khắc, cùng học hỏi lẫn nhau cùng sát cách chiến đấu trong những trận chiến sinh tử cận kề.</p>\r\n<p>       Mở đầu câu chuyện xuất hiện một nam nhân tên Đường Tam bị Đường Môn truy sát, là tông môn nổi tiếng với các loại cơ quan ám khí nhất là "Phật nộ đường liên". Thân là thiên tài ngàn năm có một nhưng vì chỉ có thân phận ngoại môn đồ. </p>\r\n<p>       Trong Phong Hào Đấu La chia làm 4 đẳng cấp: Phổ Thông Phong Hào Đấu La (Cấp 91 - Cấp 94) - Đỉnh Phong Đấu La (Cấp 95 - Cấp 98) - {Tuyệt Thế Đấu La - Bán Thần} (Cấp 99 - Cấp 100).</p>\r\n<p>       Phẩm chất Hồn Hoàn: [ Mười năm ] - [ Trăm năm ] - [ Nghìn năm ] - [ Vạn năm ] - [ Mười vạn năm ] - [ Trăm vạn năm ] - Thần cấp (Tùy vào thần vị thần cấp mà màu sắc Hồn Hoàn khác nhau).</p>', 1, '20220909174654_DLDL.jpg', '2018', 250, 1, 34, 2),
	(34, 'Đấu Phá Thương Khung', 'Main: Tiêu Viêm\r\n\r\nVợ: Thải Lân (Mỹ Đỗ Toa), Huân Nhi\r\n\r\nHệ thống tu luyện:\r\n\r\nĐấu khí (mỗi cấp chia làm 9 tinh): Đấu giả, Đấu sư, Đại đấu sư, Đấu linh, Đấu vương, Đấu hoàng, Đấu tông, Đấu tôn, Đấu thánh, Đấu đế\r\n\r\nĐấu kỹ (mỗi giai chia làm sơ, trung, cao cấp): Hoàng giai, Huyền Giai, Địa Giai, Thiên Giai\r\n\r\nTinh thần lực: Thiên cảnh, Đế cảnh\r\n\r\nLuyện dược sư, đan dược: từ nhất phẩm đến cửu phẩm rồi đến Đế Phẩm, Dị Hỏa\r\n\r\nThể chất: Ách Nan Độc Thể, Bích Xà Tam Hoa Đồng\r\n\r\n-Dị hỏa bảng (23 loại)\r\n\r\nViêm Đế, Hư Vô Thôn Viêm, Tịnh Liên Yêu Hỏa, Kim Đế Phần Thiên Viêm, Sinh Linh Chi Diễm, Bát Hoang Phá Diệt Diễm, Cửu U Kim Tổ Hỏa, Nghiệp Hỏa Hồng Liên, Tam Thiên Diễm Viêm Hỏa, Cửu U Phong Viêm, Cốt Linh Lãnh Hỏa, Cửu Long Lôi Cương Hỏa, Quy Linh Địa Hỏa, Vẫn Lạc Tâm Viêm, Hải Tâm Diễm, Hỏa Vân Thủy Viêm, Hỏa Sơn Thạch Diễm, Phong Lôi Phẫn Nộ Diễm*, Thanh Liên Địa Tâm Hỏa, Tu La Huyết Diễm*, Tái Sinh Viêm*, Vạn Thú Linh Hỏa, Huyền Hoàng Viêm\r\nCác lửa khác: Hóa Sinh Hỏa, Lưu Ly Liên Tâm Hỏa, Huyết Yêu Diễm Hỏa, Tử Hỏa', 1, '20220909174929_DPTK.jpg', '2022', 52, 1, 34, 2),
	(36, 'Thế Giới Hoàn Mỹ', 'Main: Hoang Thiên Đế - Thạch Hạo\r\n\r\nVợ: Hỏa Linh Nhi (chính thất), Vân Hi (mẹ của Tiểu Thạch Đầu), Thanh Y \r\n\r\nCảnh giới: \r\n\r\nPhàm Nhân:\r\n1. Bàn Huyết Cảnh\r\n2. Động Thiên Cảnh: 1 Động Thiên – 10 Động Thiên (Cực Cảnh)\r\n3. Hóa Linh Cảnh: Thân Thể Thành Linh – Trọng Tố Chân Ngã – Động Thiên Dưỡng Linh\r\n4. Minh Văn Cảnh (Phong Hầu)\r\n5. Liệt Trận Cảnh (Vương Giả)\r\n6. Tôn Giả Cảnh\r\nThần Đạo:\r\n1. Thần Hỏa Cảnh (Ngụy Thần)\r\n2. Chân Nhất Cảnh (Chân Thần)\r\n3. Thánh Tế Cảnh (Thần Vương)\r\n4. Thiên Thần Cảnh\r\n5. Hư Đạo Cảnh\r\n6. Trảm Ngã Cảnh\r\n7. Độn Nhất Cảnh (Chí Tôn)\r\n8. Chí Tôn Cảnh\r\n9. Chí Tôn Cực Đạo (Nhân Đạo Đỉnh Phong)\r\nTiên Đạo (Trường Sinh Lĩnh Vực): Chân Tiên → Tiên Vương → Chuẩn Tiên Đế → Tiên Đế\r\nHệ Thống Tu Luyện do main tự sáng tạo: Luân Hải Bí Cảnh → Đạo Cung Bí Cảnh → Tứ Cực Bí Cảnh → Hóa Long Bí Cảnh → Tiên Đài Bí Cảnh (thế thứ 10 Độ Kiếp Thành Chân Tiên) → Tiên Vương → Chuẩn Tiên Đế → Tiên Đế', 1, '20220909175121_TGHM.jpg', '2021', 130, 1, 34, 2),
	(38, 'Strike The Blood', 'Strike the bloood', 1, '20220910040212_Strike-the-blood.jpg', '2022', 24, 2, 1, 1),
	(39, 'Naruto', 'Mô tả', 2, '20220909175623_Naruto.jpg', '2012', 500, 3, 1, 1),
	(40, 'Conan', 'Phim Conan', 1, '20220909175724_Conan.jpg', '2010', 1020, 3, 1, 1),
	(41, 'Attack On Titan SS1', 'Phim AOT', 2, '20220909175759_AOT1.jpg', '2016', 24, 3, 1, 1),
	(44, 'Thôn Phệ Tinh Không', 'Main: La Phong \r\n\r\nVợ: Từ Hân\r\n\r\nCác cấp độ:\r\n\r\n - Trường phái: Vũ giả – Tinh Thần Niệm Sư (Bậc Thầy Tinh Thần) Khống Vật – Tinh Thần Niệm Sư (Bậc Thầy Tinh Thần) Huyễn thuật – Tề Dược Sư…\r\n\r\n - Trình độ địa cầu: Chiến sĩ - Chiến tướng - Chiến thần ( Trực thuộc cấp Học đồ )\r\n\r\n - Trình độ toàn vũ trụ: \r\n\r\nHọc đồ - Hành tinh - Hằng tinh - Vũ trụ - Vực chủ - Giới chủ - Bất hủ - Bất hủ quân chủ - Bất hủ phong Hầu - Bất hủ phong Vương - Vũ trụ tôn giả - Vũ trụ bá chủ (Vũ trụ tôn giả vô địch) - Vũ trụ chi chủ (lực chiến 1-6) - Vũ trụ tối cường giả = Chân thần (lực chiến > 6) - Hư không chân thần (lực chiến > 10) - Vĩnh hằng chân thần - Hỗn Độn chúa tể - Thần vương - Hỗn nguyên - Lãnh chúa.\r\n\r\n \r\n\r\nGiới thiệu nội dung:\r\n\r\nMột ngày nọ, thế giới xuất hiện loại virus RR không rõ lai lịch, cuốn thế giới vào thảm hoạ. Động vật bị truyền nhiễm đột biến thành quái thú đáng sợ, xâm lược với số lượng lớn. Trong lúc loài người đối mặt với diệt vong, họ đã xây lên bức tường bao vây, thành lập căn cứ làm pháo đài cuối cùng bảo vệ con người. \r\n\r\nTrong thời gian này, con người nếm trải đủ mọi khó khăn, được gọi là “thời kỳ Đại Niết Bàn”. Trong môi trường sinh tồn cực đoan, bản năng của con người cũng dần phát triển, ngọn gió thượng võ phất lên, tố chất cơ thể con người vượt trội hơn trước. Mà trong những người xuất sắc, được gọi là “chiến binh”. La Phong năm 18 tuổi cũng ước mơ trở thành một trong số họ. Cậu lúc này sắp phải thi đại học, đang đối diện với sự lựa chọn giữa ngã tư đời người. Nhưng lại bị quái thú tấn công ảnh hưởng quỹ đạo cuộc đời của cậu hết lần này đến lần khác. \r\n\r\nDưới uy hiếp của quái thú, cư dân trong thành phố đối diện với nguy hiểm, quân sự lại bó tay. Duy chỉ có chiến binh xông pha, bảo vệ an toàn cho căn cứ. La Phong được những chiến binh truyền cảm hứng, âm thầm hạ quyết tâm trở thành chiến binh bảo vệ người mình yêu thương. Đây chính là khởi đầu của mọi thứ, khởi điểm của  con đường chiến binh La Phong, cũng vén bức màn cuộc đời truyền kì của cậu. La Phong lập chí trở thành chiến binh. Con đường phía không dễ dàng, đầu tiên cậu phải đối diện với môi trường ngoại bộ, vô hình chung càng thêm ảnh hưởng tới cậu. Gia đình La Phong có điều kiện không tốt, cuộc sống túng thiếu, bố mẹ không thể giúp đỡ cậu được nhiều, cậu đành dựa vào nỗ lực của bản thân. \r\n\r\nCuối cùng, dưới sự khổ luyện, La Phong không ngừng khai quật ra tiềm năng của mình, nhận được sự nâng cấp năng lực với sự công nhận giá trị bản thân. Không những vậy, La Phong còn gánh vác gánh nặng nuôi dưỡng  gia đình, cũng vì bảo vệ tổ quốc loài người, vì cuộc sống sinh tồn và phát triển tốt hơn của con người. Cùng với những chiến binh chính nghĩa khác, liên minh đối phó quái thú hung ác. Dưới tình cảnh tận thế, La Phong cùng với những chiến binh khác liệu có thể đẩy lùi quái thú, thành công bảo vệ thế giới loài người?', 1, '20220909175038_TPTK.jpg', '2022', 78, 1, 34, 2),
	(45, 'Dragon Ball SS1', 'Dragon Ball SS1', 2, '20220910040644_DGB1.jpg', '2015', 131, 3, 1, 1),
	(46, 'Dragon Ball SS2', 'Dragon Ball SS2', 2, '20220910040730_DGB2.jpg', '2009', 97, 3, 1, 1),
	(47, 'Dragon Ball Super Movie: Broly', 'Dragon Ball Super Movie: Broly là bộ phim thứ 20 trong series Dragon Ball, và là Movie đầu tiên mang thương hiệu Dragon Ball Super, lấy bối cảnh khi đế chế Frieza đàn áp, đặt ách thống trị, bắt người Saiyan phải phải phục vụ làm việc dưới quyền của chúng. Khi đó 3 đứa trẻ Saiyan đã được sinh ra cùng một lúc, nhưng số phận của chúng lại hoàn toàn khác nhau: Vegeta là hoàng tử của tộc người Saiyan, Kakalot(Goku) là con trai của tướng quân Bardock, và Broly là con của Paragus.\r\n\r\nBroly ngay từ nhỏ đã có một sức mạnh "bí ẩn", King Vegeta đã nhận ra được sức mạnh khó kiểm soát này nên đã ra lệnh đầy ải Broly ra biên giới và Paragus đã cố gắng bảo vệ con trai. Cuối cùng, 2 cha con đều bị trọng thương và bị quăng xác ra bãi rác. May mắn thay cả 2 cha con đều chưa chết, ngày mà Frieza hủy diệt hành tinh Vegeta, Broly sử dụng sức mạnh của mình bảo vệ cả 2 cha con rồi di chuyển đến hành tinh khác.', 2, '20220910040811_DGB3.jpg', '2018', 1, 3, 1, 1),
	(48, 'Genshin Impact', 'Genshin Impact được đặt trong bối cảnh của một thế giới giả tưởng có tên Teyvat. Ở đó tồn tại bảy quốc gia, mỗi quốc gia đều có liên kết tới một nguyên tố nhất định và được cai trị bởi một vị thần. Câu chuyện xoay quanh Nhà lữ hành, người đã đặt chân tới vô vàn thế giới khác nhau với người em sinh đôi của mình trước khi bị chia rẽ ở Teyvat. Sau đó Nhà lữ hành cùng với bạn đồng hành Paimon đã bắt đầu cuộc thám hiểm để tìm lại người thân của mình, hai người bị cuốn vào những vấn đề của các quốc gia trên lục địa Teyvat.', 1, '20220909175425_20220909104153_Genshin_Impact.jpg', '2022', 24, 2, 1, 1),
	(49, 'Nhất Niệm Vĩnh Hằng', 'Main: Bạch Tiểu Thuần\r\n\r\nVợ: Tống Quân Uyển, Chu Tử Mạch, Hầu Tiểu Muội, Công Tôn Uyển Nhi, Đỗ Lăng Phi\r\n\r\nCảnh giới:\r\n\r\nNgưng Khí Cảnh: Từ tầng 1 đến Tầng 10\r\nTrúc Cơ Cảnh: Sơ Kỳ – Trung Kỳ – Hậu kỳ – Đại Viên Mãn\r\nKim Đan Cảnh: Sơ Kỳ – Trung Kỳ – Hậu kỳ – Đại Viên Mãn\r\nNguyên Anh Cảnh: Sơ Kỳ – Trung Kỳ – Hậu kỳ – Đại Viên Mãn – Nửa Bước Thiên Nhân\r\nThiên Nhân Cảnh: Sơ Kỳ – Trung Kỳ – Hậu kỳ – Đại Viên Mãn – Thiên Tùy Nhân Nguyện – Thế Giới Chi Y \r\nBán Thần Cảnh: Sơ Kỳ – Trung Kỳ – Hậu kỳ – Đại Viên Mãn (Đỉnh Phong). Tiến tới Chuẩn Đại Thừa (Chuẩn Thiên Tôn)\r\nĐại Thừa Cảnh (Thiên Tôn): Sơ Kỳ – Trung Kỳ – Hậu Kỳ – Đại Viên Mãn. Tiến tới Nửa Bước Thái Cổ (Chuẩn Thái Cổ)\r\nThái Cổ Cảnh (Hoàng Giả): Sơ Kỳ – Trung Kỳ – Hậu Kỳ – Đại Viên Mãn. Tiến tới Nửa Bước Chúa Tể (Chuẩn Chúa Tể)\r\nTổ Cảnh: Tu Vi Thái Cổ và Nhục Thân Thái Cổ\r\nChúa Tể Cảnh\r\nVĩnh Hằng Cảnh', 1, '20220910042348_NNVH1.jpg', '2020', 108, 1, 34, 2),
	(50, 'Vạn Giới Độc Tôn', 'Main: Lâm Phong\r\n\r\nGái: Lâm Hương Nhi,  Cơ Mạn Yêu,  Mộng Thiên Thu,  Tố Thanh Y,  Từ Tử Yên,  Chu Hiểu Hiểu, chị gái ở Táng Thần chi Địa\r\n\r\nCảnh giới:\r\n\r\n1. Ngưng Huyết Cảnh \r\n2. Chân Võ Cảnh \r\n3. Linh Võ Cảnh\r\n4.Thiên Võ Cảnh\r\n5.Thần Võ Cảnh\r\n6. Niết Bàn Cảnh \r\n7. Siêu Phàm Cảnh \r\n8. Thông Thiên Cảnh  \r\n9. Toái Hư Cảnh \r\n10. Thần Cảnh \r\n \r\n\r\nMàu của vũ hồn: Đỏ - Cam - Vàng - Lục - Xanh - Lam - Tím\r\n\r\nTruyện chữ tên Vạn Giới Độc Tôn hoàn chỉnh chứ không phải pha trộn gì hết. Hiện đã tới chap 95.\r\n\r\nBên Trung đã không ra thêm chap nữa vì bản quyền được nhà làm phim mua mất rồi, nên muốn biết hết cốt truyện thì chờ xem phim đi nha.', 1, '20220910041315_VGDT.jpg', '2021', 162, 1, 34, 2),
	(51, 'Thần Mộ', 'Main: Thần Nam \r\n\r\nHarem: Vũ Hinh (vợ), Sở Ngọc, Mộng Khả Nhi, Long Vũ, Nạp Lan Nhược Thủy, Đàm Đài Tuyền\r\n\r\nPhim được chuyển thể từ tiểu thuyết Thần Mộ, tác giả Thần Đông (cùng tác giả với Thế Giới Hoàn Mỹ)\r\n\r\n \r\n\r\nCấp bậc tu vi: \r\n\r\nNhất Giai\r\nNhị Giai\r\nTam Giai\r\nTứ Giai\r\nNgũ Giai ( Tuyệt Thế Cao Thủ )\r\nLục Giai ( Chân Võ )\r\nThất Giai ( Tiên Võ )\r\nThần Vương\r\nThần Hoàng\r\nThiên Giai\r\nThông Thiên Cấp ( Chiến Hồn )\r\nTiểu Lục Đạo Chủ ( Ma Chủ )\r\nNghịch Thiên Cấp\r\nThiên Đạo', 1, '20220910041403_TM.jpg', '2022', 16, 1, 34, 2),
	(52, 'Hunter X Hunter', 'Thợ Săn là những người đi chu du thế giới, đối mặt với hiểm nguy. Từ bắt giữ tội phạm cho đến nhưng cuộc thám hiểm trên các hòn đảo để tìm kho báu. Câu chuyện bắt đầu khi người cha của một cậu bé tên Gon mất tích đã khá lâu, nên cậu bé quyết định trở thành Thợ Săn với hy vọng tìm được cha mình. Khi được 12 tuổi Gon bắt đầu cuộc hành trình của mình để được tham gia vào "Cuộc thi Thợ Săn Kỳ Tài", ai cũng biết tỉ lệ thành công rất thấp, có khi chết lúc nào không hay.\r\n\r\nTrong cuộc thi cậu đã kết bạn với Kurapica, Leorio và Killua. Với tình bạn, họ đã trải qua biết bao nhiêu là thử thách, hiểm nguy trên cuộc hành trình của một người Thợ Săn... Còn về phần họ trải qua những thử thách gì và như thế nào thì mời các bạn theo dõi...', 2, '20220910041505_HxH.jpg', '2011', 148, 3, 1, 1),
	(53, 'Summertime Render', 'Đã 2 năm kể từ khi lên Tokyo học cấp ba, Shinpei chưa từng một lần về quê thăm gia đình. Lần này về lại quê, cậu cũng chỉ để dự tang lễ của người bạn thân Ushio đã mất trước khi cậu kịp hoàn thành lời hứa với cô. Tuy nhiên, dường như cái chết của Ushio lại không đơn giản mà bộc lộ nhiều nghi vấn. Đồng thời cùng lúc đó, nhiều người lại bắt đầu mất tích đẩy Shinpei vào vòng xoáy bí ẩn.', 1, '20220910041551_SummertimeRender.jpg', '2022', 25, 2, 1, 1),
	(54, 'Vô Thượng Thần Đế', 'Main: Tiên Vương Mục Vân \r\n\r\n9 vợ: Mạnh Tử Mặc, Tần Mộng Dao, Diệp Tuyết Kỳ, Tiêu Doãn Nhi, Vương Tâm Nhã, Cửu Nhi, Diệu Tiên Ngữ, Minh Nguyệt Tâm, Bích Thanh Ngọc \r\n\r\nCảnh giới: Nhục Thân-Linh Khiếu-Thông Thần-Niết Bàn-Tam Chuyển Chi cảnh-Vũ Tiên cảnh - Sinh Tử cảnh\r\nTiên giới : Nhân Tiên - Địa Tiên - Thiên Tiên - Huyền Tiên - Chân Tiên - Kim Tiên - Đại La Kim Tiên - Tiên Vương - Tiên Đế\r\nThần giới: Hư Thần - Chân Thần - Địa Thần - Thiên Thần - Thần Quân - Thần Vương - Thần Hoàng - Thần Chủ - Tổ Thần - Hư Thánh - Bán Thánh - Hóa Thánh.\r\nThương Lan giới: Thánh vị : Thánh Nhân- Đại Thánh-Cổ Thánh - Thánh Vương - Thánh Hoàng - Thánh Đế - Thiên Thánh Đế - Cổ Thánh Đế\r\nQuân vị : Nhân Quân - Địa Quân - Thiên Quân - Quân Vương - Thánh Quân - Đế Quân.\r\nTôn vị : Chí Tôn - Địa Tôn - Thiên Tôn - Thần Tôn.\r\nGiới vị : Giới Vương - Giới Hoàng - Giới Thánh - Giới Tôn - Giới Thần - Giới Chủ.\r\nChúa Tể - Nửa bước Hóa Đế - Chuẩn Đế - xưng hào thần (xưng hào đế) - Thần Đế đại đạo ( Đạo Trụ - Đạo Đài - Đạo Hải ) - Vô Pháp - Vô Thiên - Thần Đế', 1, '20220910041712_VTTD.jpg', '2020', 304, 1, 34, 2),
	(55, 'Yu-Gi-Oh! Duel Monster', 'Yami Yugi ra đời vào lúc Yugi hoàn thành trò chơi ngàn năm. Cậu xuất hiện và giúp chú nhóc Yugi. Từ lúc đối đầu với Bakura, Yugi phát hiện rằng Yami Yugi chính là nhân cách thứ hai của mình. Và trên đảo Pegasus, sau khi hạ gục Pegasus, Yami Yugi đã được Pegasus nói về sự tà ác của các bảo vật ngàn năm. Yami Yugi muốn tìm về quá khứ của mình.\r\n\r\nSau khi hạ gục Yami Marik và có 3 lá bài thần linh, Yami Yugi bắt đầu hành trình đi về quá khứ. Cậu ta mới biết mình là Pharaoh thứ 18 của Ai Cập 3000 năm về trước. Cậu ta đã chiến đấu một cách rất dũng cảm trước The Thief Bakura mà trong trận đó, Shadi là người bị dính đòn của diabound, là bóng ma của Bakura. Trong trận chiến với sức mạnh bóng tối, Akunadin bán linh hồn mình cho bóng tối, trở thành pháp sư bóng tối, Kalim bị thiệt mạng đầu tiên, kế tiếp Shadi đỡ đòn cho Yugi rồi cũng thiệt mạng. Sau đó Yugi và các bạn đến kịp, nói cho Yami Yugi tên của cậu là Atem. Còn Hasan (chính là Shadel) bị Zorc tiêu diệt. Sau đó Atem gọi tên mình. Đó là câu thần chú để cả 3 vị thần trong xấp bài của Yugi xuất hiện trên bầu trời. Ba vị thần dung hợp tạo thành vị thần tạo ra ánh sáng Horakhty và đánh thắng sức mạnh bóng tối của Zorc.\r\n\r\nKhi quay về hoàng cung tìm Seto, Atem đã quyết đấu với Seto (bị Akhunadin điều khiển). Sau khi Kisara (Cô gái mang linh hồn sở hữu thần rồng trắng,và được coi như người yêu kiếp trước của Seto) tiêu diệt Akunadin, Atem đã nhường ngôi lại cho Seto rồi ra khỏi thế giới ký ức.\r\n\r\nTrong tập cuối, cả hai Yugi phải đấu bài trong cuộc chiến nghi thức (Ceremonial Battle). Atem thua cuộc và đi về thế giới bên kia (rõ ràng trận đấu này chỉ mang tính hình thức chứ kết quả thì đã được sắp đặt trước)', 2, '20220910041757_YGO.jpg', '2000', 224, 3, 1, 1),
	(56, 'Linh Kiếm Tôn', 'Main: Sở Hành Vân\r\n\r\nVợ: Dạ Thiên Hàn, Thủy Lưu Hương, Nam Cung Hoa Nhan, Thủy Thiên Nguyệt, Lạc Lan\r\n\r\n \r\n\r\nCảnh giới:\r\n\r\nThối Thể\r\nTụ Linh \r\nĐịa Linh\r\nThiên Linh\r\nÂm Dương\r\nNiết Bàn\r\nVõ Hoàng\r\nĐế Tôn\r\nThiên Đế\r\nThiên Tôn', 1, '20220910041841_LKT.jpg', '2019', 360, 3, 34, 2),
	(57, 'Tomodachi Game', 'Nhóm năm học sinh cao trung thân thiết với nhau tuy rằng có xuất thân, hoàn cảnh và con người khác nhau. Bỗng một ngày nọ, họ phát hiện ra 1 trong 5 người phải chịu khoản nợ đến 20 triệu yên; và chỉ có tham gia vào "Tomodachi Game" thì mới có thể trả hết nợ. Tuy nhiên, vì không biết ai mới là người chịu nợ, bốn người còn lại sẽ phải gánh lấy 1/5 khoản nợ khổng lồ chỉ vì "tình bạn" của nhau. Liệu cả nhóm sẽ hoàn thành trò chơi và trả được hết nợ trước? Hay tình bạn của họ sẽ sụp đổ trước?', 2, '20220910041939_Tomodachi.jpg', '2022', 12, 1, 1, 1),
	(58, 'Overlord', 'Cốt truyện anime sẽ đưa khán giả đến năm 2138 trong tương lai, khi khoa học công nghệ phát triển vượt bậc và ngành game thực tế ảo đang nở rộ hơn bao giờ hết. Yggdrasil, một game online vô cùng phổ biến thời gian đó bỗng dưng bị đóng cửa đột ngột, nhưng nhân vật chính Momonga lại quyết định không thoát ra ngoài và khám phá những điều bí ẩn khi thế giới ảo quanh mình ngày một thay đổi.', 2, '20220910042040_Overlord.jpg', '2015', 13, 3, 1, 1),
	(59, 'Phàm Nhân Tu Tiên', 'Main: Hàn Lập\r\n\r\nVợ: Nam Cung Uyển\r\n\r\nCấp độ tu vi:\r\n\r\nLuyện khí kỳ \r\nTrúc Cơ Kỳ \r\nKết Đan Kỳ\r\nNguyên Anh Kỳ\r\nHoá Thần Kỳ\r\nLuyện Hư Kỳ\r\nHợp Thể Kỳ\r\nĐại Thừa Kỳ \r\nĐộ Kiếp Kỳ\r\nChân Tiên Cảnh: 1 ---> 35 Tiên Khiếu\r\nKim Tiên Cảnh: 36 ---> 107 Tiên Khiếu\r\nThái Ất Ngọc Tiên Cảnh (Thái Ất Cảnh): 108 ---> 360 Tiên Khiếu\r\nĐại La Cảnh: 361 ---> 1800 Tiên Khiếu [Đại La Kính: Trảm Nhất Thi - Trảm Nhị Thi - Trảm Tam Thi (Bán Đạo Tổ)]\r\nĐạo Tổ Cảnh\r\nHỗn Độn Đạo Tổ', 1, '20220910042133_PNTT.jpg', '2020', 86, 1, 34, 2);

-- Dumping structure for table webxem_phim.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `ut_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_users_user_type` (`ut_id`),
  CONSTRAINT `FK_users_user_type` FOREIGN KEY (`ut_id`) REFERENCES `users_type` (`ut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table webxem_phim.users: ~3 rows (approximately)
REPLACE INTO `users` (`id`, `username`, `password`, `email`, `phone`, `ut_id`) VALUES
	(1, 'Admin', '$2y$10$nem5qtQezQ4Qn5p1pPjfte0//YipOOXMKZpaWKhV9MrsTqQXaLf76', 'admin@gmail.com', '0123456789', 1),
	(2, 'thanhle', '$2y$10$.hCKIvepkbOdRmwawOgB9OuaafomPIzmCOzHJpw9OeC4KXaS9AT6y', 'thanhle123@gmail.com', '0123456789', 2),
	(3, 'LeThanh', '$2y$10$BK7l7dvClQtzDyS3l3c4yO/atznjF9iBowrCDtqGugh.0BBeduH3u', 'thanhle123123@gmail.com', '0123456789', 2);

-- Dumping structure for table webxem_phim.users_type
CREATE TABLE IF NOT EXISTS `users_type` (
  `ut_id` int(11) NOT NULL AUTO_INCREMENT,
  `ut_role` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table webxem_phim.users_type: ~2 rows (approximately)
REPLACE INTO `users_type` (`ut_id`, `ut_role`) VALUES
	(1, 'Admin'),
	(2, 'User');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
