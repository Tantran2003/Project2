-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 30, 2024 lúc 05:50 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `travel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `fullname`, `phone`, `address`, `email`, `password`, `role`, `status`, `remember_token`) VALUES
(1, 'Nguyễn Quang Huy', '0374874492', 'Bình Dương', 'nqht123456789@gmail.com', '$2y$12$OS9aqAay4Mgz3umIiAvwDejKuXRAQs2zfWbgRS/eaegnBC6fg9fp.', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Vịnh Hạ Long abc', '1706196585_ttxvn1201halong-4066.jpg.webp', '<p>Kiki is a beautiful blonde who&rsquo;s been empowering women to travel solo for many years. Throughout her journey, this blogger has managed to visit over 70 countries and collect material for high-quality blog posts that focus on tips for female solo travelers.</p>\r\n\r\n<p><strong>Main topics covered:&nbsp;</strong>travel tips, packing guides, photography, lifestyle<br />\r\n<strong>Built with:&nbsp;</strong>WordPress<br />\r\n<strong>The main source of income:&nbsp;</strong>presets, product sales<br />\r\n<strong>The most popular post:</strong>&nbsp;<a href=\"https://www.theblondeabroad.com/travel-bucket-list-for-2021/\" rel=\"noreferrer noopener\" target=\"_blank\">Travel Bucket List for</a><a href=\"https://www.theblondeabroad.com/travel-bucket-list-for-2021/\">2021</a><br />\r\n<strong>Instagram account:</strong>&nbsp;<a href=\"https://www.instagram.com/theblondeabroad/\" rel=\"noreferrer noopener nofollow\" target=\"_blank\">@theblondeabroad</a></p>', NULL, NULL),
(7, 'Đồi Thông Châu Sơn', '1706067372.jpeg', '<p>Du lịch Đ&agrave; Lạt l&agrave; nơi c&oacute; khối cảnh đẹp, v&agrave; một trong những h&igrave;nh ảnh đặc trưng nhất c&oacute; lẽ l&agrave; những đồi th&ocirc;ng hi&ecirc;n ngang giữa đại ng&agrave;n. th&agrave;nh thị sương m&ugrave; n&agrave;y ki&ecirc;u h&atilde;nh sở hữu nhiều khu rừng th&ocirc;ng r&aacute;o trọi, nơi m&agrave; một số đ&atilde; trở th&agrave;nh điểm check-in lừng danh vấn du kh&aacute;ch. Tuy nhi&ecirc;n, vẫn tồn tại những rừng th&ocirc;ng giữ lại vẻ sơ khai, k&igrave; b&iacute;, ẩn m&igrave;nh ở những nơi xa x&ocirc;i &iacute;t người biết đến, v&agrave; đồi th&ocirc;ng Ch&acirc;u Sơn ch&iacute;nh l&agrave; một trong những điểm đ&oacute;. Nếu bạn y&ecirc;u th&iacute;ch vẻ đẹp hoang vu, nhẹ nh&otilde;m v&agrave; mơ mộng của những đồi th&ocirc;ng ở Đ&agrave; Lạt, h&atilde;y dừng ch&acirc;n tại đồi th&ocirc;ng Ch&acirc;u Sơn tr&ecirc;n h&agrave;nh tr&igrave;nh check-in của m&igrave;nh. Nằm b&ecirc;n cạnh thị trấn nhỏ Dran, đ&acirc;y l&agrave; nơi để bạn trải nghiệm sự b&igrave;nh y&ecirc;n, dịu d&agrave;ng v&agrave; m&ecirc; đắm của một trong những khu rừng th&ocirc;ng hoang vu nhất ở Đ&agrave; Lạt. MỘT V&Agrave;I N&Eacute;T VỀ ĐỒI TH&Ocirc;NG CH&Acirc;U SƠN Khi nhắc đến những khu rừng th&ocirc;ng thơ mộng v&agrave; đẹp như trong tranh của Đ&agrave; Lạt, người ta thường hệ trọng đến những điểm nức tiếng như đồi Đa Ph&uacute;, rừng th&ocirc;ng ở ho&agrave;ng tuyền, hay rừng th&ocirc;ng ở Hồ thở than&hellip; Tuy nhi&ecirc;n, &iacute;t người biết rằng ở ngoại &ocirc; Đ&agrave; Lạt, tại thị trấn Dran xinh đẹp, c&ograve;n c&oacute; một đồi th&ocirc;ng tiệt kh&aacute;c, đ&oacute; ch&iacute;nh l&agrave; đồi th&ocirc;ng Ch&acirc;u Sơn. Với những c&acirc;y th&ocirc;ng cứng c&aacute;p, dẻo dai, đặc biệt l&agrave; trong thời tiết mưa gi&oacute;, đ&acirc;y l&agrave; điểm check-in l&yacute; tưởng cho những bạn trẻ m&ecirc; say kh&aacute;m ph&aacute; khi c&oacute; dịp gh&eacute; thăm Dran dịu d&agrave;ng. VẺ ĐẸP CỦA ĐỒI TH&Ocirc;NG CH&Acirc;U SƠN Tọa lạc tại khu vực đ&egrave;o Dran, đồi th&ocirc;ng Ch&acirc;u Sơn hiện l&ecirc;n với một vẻ đẹp độc đ&aacute;o, đặc biệt l&ocirc;i cuốn những người m&ecirc; say kh&aacute;m ph&aacute;. H&igrave;nh ảnh của những c&acirc;y th&ocirc;ng xanh mướt b&ecirc;n h&egrave; đ&egrave;o tạo n&ecirc;n một cảnh tượng rất đặc sắc v&agrave; ghi điểm mạnh trong l&ograve;ng du kh&aacute;ch. Khi đi qua khu vực n&agrave;y, &acirc;m thanh của gi&oacute; thoảng v&agrave; tiếng c&acirc;y th&ocirc;ng reo vi vu như l&agrave; một bản nhạc ri&ecirc;ng, h&ograve;a m&igrave;nh v&agrave;o kh&ocirc;ng kh&iacute; m&ecirc; đắm của v&ugrave;ng đất đại ng&agrave;n. Đồi th&ocirc;ng khoe sắc với cảnh đẹp quyến rũ, với đ&aacute;m cỏ mượt, những c&acirc;y th&ocirc;ng h&ugrave;ng vĩ, ngay m&agrave; cao v&uacute;t, l&agrave;m cho du kh&aacute;ch kh&ocirc;ng khỏi m&ecirc; say. Đồi kh&ocirc;ng qu&aacute; cao, nhưng những c&acirc;y th&ocirc;ng mọc bừa tự nhi&ecirc;n, kh&ocirc;ng theo kiểu đội ngũ ngay. Lối v&agrave;o khu rừng th&ocirc;ng mang lại ấn tượng thơ mộng với con đường nhỏ được l&aacute;t nhựa s&aacute;ng b&oacute;ng, hai b&ecirc;n l&agrave; những h&agrave;ng th&ocirc;ng xanh tốt, tạo n&ecirc;n kh&ocirc;ng gian l&yacute; tưởng để bạn thực hiện những bức h&igrave;nh sống ảo độc đ&aacute;o. Ngo&agrave;i việc thưởng thức sự th&aacute;i ho&agrave; v&agrave; kh&ocirc;ng kh&iacute; trong sạch khi đi dạo v&agrave; ngắm cảnh, trải nghiệm đạp xe đạp giữa đồi th&ocirc;ng Ch&acirc;u Sơn c&ugrave;ng việc lắng nghe &acirc;m thanh của gi&oacute; r&igrave; r&agrave;o l&agrave; một trải nghiệm ham th&iacute;ch. Đ&acirc;y l&agrave; thời cơ để bạn tận hưởng những khoảnh khắc b&igrave;nh y&ecirc;n tr&ecirc;n cao nguy&ecirc;n, huyền hoặc l&ograve;ng của nhiều du kh&aacute;ch. Đồi th&ocirc;ng Ch&acirc;u Sơn vẫn giữ được vẻ hoang vu v&igrave; chưa được ph&aacute;t triển du lịch, v&agrave; v&agrave;o thời khắc ho&agrave;ng h&ocirc;n, kh&ocirc;ng gian trở th&agrave;nh k&igrave; b&iacute; v&agrave; đầy tĩnh mịch. MỘT V&Agrave;I ĐỊA ĐIỂM DU LỊCH GẦN ĐỒI TH&Ocirc;NG CH&Acirc;U SƠN Thị trấn D&rsquo;ran Đ&acirc;y l&agrave; một điểm check-in kh&ocirc;ng thể bỏ qua theo kinh nghiệm du lịch Đơn Dương của những bồ th&iacute;ch kh&aacute;m ph&aacute;. Thị trấn b&igrave;nh y&ecirc;n n&agrave;y nằm giữa hai đ&egrave;o D&#39;ran v&agrave; Ngoạn Mục, thường được biết đến với c&aacute;i t&ecirc;n th&acirc;n y&ecirc;u &quot;thị trấn lưng đ&egrave;o&quot;. Nơi n&agrave;y tọa lạc giữa kh&ocirc;ng gian n&uacute;i cao, mang đến cuộc sống nhẹ nh&agrave;ng, th&aacute;i b&igrave;nh, với những con phố dễ chịu, trang trại rau xanh tươi, v&agrave; những vườn c&acirc;y tr&aacute;i phong ph&uacute;.</p>', NULL, NULL),
(8, 'Ngôi nhà của Công Tử Bạc Liêu', '1706067531.jpg', 'Nếu bạn đã quá quen với hình ảnh sôi động của thành thị và muốn trải nghiệm không khí thái bình, tìm đến với vùng đất Bạc Liêu sẽ là tuyển lựa chẳng thể bỏ qua. Là một tỉnh thuộc khu vực đồng bằng Sông Cửu Long, Bạc Liêu nổi danh với vẻ đẹp văn hóa độc đáo, là nơi tiện lợi cho việc thư giãn với không gian trong sạch và nhiều điểm du lịch độc đáo. Hãy cùng Đất Việt Tour tìm hiểu ngôi nhà dinh thự công tử Bạc Liêu cực hot khi du lịch miền tây. Nơi đây không chỉ ghi điểm với kiến trúc phương Tây tinh tế mà còn là nơi lưu giữ những kỷ vật, đánh dấu bằng thời kì những câu chuyện về văn hóa và cuộc sống của công tử Bạc Liêu, người lừng danh trong khu vực.\r\n\r\nVÀI NÉT VỀ DINH THỰ CÔNG TỬ BẠC LIÊU\r\nNhà công tử Bạc Liêu nằm tại địa chỉ số 13 Điện Biên Phủ, Phường 13, ngay tại trọng điểm tỉnh thành Bạc Liêu. Ngôi nhà này cuốn mọi ánh nhìn với sự bề thế, mang đậm phong cách kiến trúc phương Tây trải qua, vượt qua thời gian. Đây cũng là địa điểm văn hóa, gắn với nhiều giai thoại và những câu chuyện truyền đời về cuộc sống của thiếu gia hàng đầu Lục tỉnh miền Tây trong những năm 1919.\r\nLỊCH SỬ NHÀ CÔNG TỬ BẠC LIÊU\r\nNgôi nhà đặc biệt này đã được xây dựng vào năm 1919, khi \"công tử Bạc Liêu\" Trần Huy Trinh tròn 19 tuổi. Nhà công tử Bạc Liêu được chế tạo và xây dựng bởi các kiến trúc sư người Pháp, dùng các nguyên liệu chất lượng được nhập cảng từ xa xăm giang san Pháp. Với quy mô ấn tượng của nó, cộng đồng trong vùng thường gọi ngôi nhà tiếng tăm này với cái tên \"Nhà Lớn\".\r\nHƯỚNG DẪN ĐẾN NHÀ CÔNG TỬ BẠC LIÊU\r\nNằm khoảng 100km về phía Cần Thơ và 70km về phía Cà Mau, cũng như tọa lạc ngay trung tâm tỉnh thành Bạc Liêu, việc chuyển di đến Nhà công tử Bạc Liêu là rất tiện lợi.\r\n\r\nNếu bạn đến từ miền Bắc, có thể đặt vé phi cơ đến Cần Thơ hoặc Cà Mau, sau đó chuyển sang xe khách để đến Nhà công tử Bạc Liêu. Giá vé tàu bay của hãng Vietnam Airlines chao đảo từ 1.500.000 đồng, tùy thuộc vào thời khắc trong năm và các ngày lễ.\r\n\r\nDu khách từ miền Nam có thể thoải mái chọn lựa việc chuyển di bằng xe khách, cũng như sử dụng dịch vụ xe trung chuyển để đưa đến đích một cách thuận tiện, với mức giá vé phổ thông từ 100.000 đến 300.000 đồng.\r\n\r\nTÌM HIỂU BÊN TRONG NGÔI NHÀ DINH THỰ CÔNG TỬ BẠC LIÊU\r\nLà một điểm du lịch nức tiếng tại Bạc Liêu, cuộn nhiều du khách hàng năm, Nhà công tử Bạc Liêu chứng tỏ sức hấp dẫn đặc biệt của mình. Hãy cùng chúng mình khám phá mọi \"ngóc ngách\" của ngôi nhà độc đáo này, để hiểu rõ tại sao nó luôn là điểm tham quan \"nức tiếng\" trong nhiều năm qua tại vùng đất phong phú này.\r\n\r\nLối kiến trúc đậm chất phương Tây cổ xưa\r\nCho đến nay, Nhà công tử Bạc Liêu đã tồn tại hơn 100 năm nhưng vẫn giữ được những đặc trưng kiến trúc độc đáo và ấn tượng nhờ sự bảo tàng và trùng tu cẩn thận. Tính đến thời khắc hiện tại, giá trị của ngôi nhà được ước lượng lên đến 400 tỷ đồng.\r\n\r\nĐược xây dựng dưới tay của kiến trúc sư người Pháp, Nhà công tử Bạc Liêu mang đậm phong cách phương Tây qua kết hợp với những nét kiến trúc phương Đông đặc trưng, biểu thị qua hai gam màu chủ đạo là vàng và trắng.\r\n\r\nKhi bước vào tham quan ngôi nhà, du khách sẽ ấn tượng bởi không gian rộng lớn, sự bài trí và sắp đặt nội thất tinh tế cùng với nhiều kỷ vật quý báu được bảo quản trong không gian trải qua và lộng lẫy.\r\nMỗi cột trong nhà được trang hoàng tinh tế với các hoa văn độc đáo và chi tiết tường tận. ắt ngôi nhà được thắp sáng bởi ánh đèn vàng ấm áp và tạo nên không khí dễ chịu. Tầng trệt của ngôi nhà có hai phòng ngủ và một đại sảnh rộng lớn, với lối cầu thang rộng và uốn lượn mềm mại dẫn lên tầng trên. Tầng hai bao gồm ba phòng ngủ và hai đại sảnh lớn với đầy đủ tiện nghi. Phía trên còn có một ban công khoáng đãng, từ đó có thể ngắm nhìn sông hoặc chợ, là nơi tiệt để trải nghiệm hoàng hôn và rạng đông tuyệt vời.\r\nNgôi nhà mang trong mình vẻ đẹp trọng thể và quý phái, đồng thời trưng bày nhiều đồ đạc quý hiếm có giá trị mà công tử Bạc Liêu đã sưu tầm. Điểm nhấn đặc biệt của địa điểm này có thể nhắc đến bộ bàn ghế được chế tác từ gỗ xà cừ hay hai chiếc giường âm dương được khắc cẩn từ loại gỗ này với những chi tiết trổ khôn xiết tinh xảo và kĩ càng. Ngoài ra, du khách còn có thể chiêm ngưỡng những hiện vật quý giá, biểu lộ lối sống xa hoa của công tử Bạc Liêu vào thời khắc trước đây: đồng hồ cổ, bình hoa quý hiếm, chum trà trang trí hình rồng, hay chiếc xe ô tô cổ được mua bằng giỏ tiền mặt,… quờ quạng đều là bằng cớ cho cuộc sống phong cách, xa hoa và huyền bí của chủ nhân đã từng vang danh một thời.\r\n\r\nNhững giai thoại gắn với ngôi nhà dinh thự công tử Bạc Liêu\r\nNhà công tử Bạc Liêu là một phần của nhiều câu chuyện huyền thoại về lịch sử và cuộc sống của một người công tử \"khét tiếng\" tại Lục tỉnh miền Tây hơn 10 thập kỷ trước đây.\r\n\r\nTrong số những nhân vật nức danh ở Sài Gòn, ông Trần Trinh Trạch được biết đến với danh hiệu \"Tứ đại Phú hộ\". Ông là người có học thức phối hợp với tinh thần thương gia và sự siêng năng, từ đó, tài sản của ông đã nhanh chóng tăng lên. Ông làm giàu cốt tử từ kinh doanh muối, than củi, và trở nên một đại gia nức tiếng trong thời kỳ đó.\r\n\r\nTrần Trinh Trạch có ba người con trai, trong đó con trai thứ ba được ông yêu và kỳ vọng nhất, đó là công tử Bạc Liêu.\r\n\r\nCông tử Bạc Liêu, hay còn gọi là Trần Trinh Huy, từ khi mới sinh ra đã sống trong nhung lụa. Ông được cha mình gửi đi du học Pháp, biết lái tàu bay, mê say võ thuật và được đánh giá là người rất thức thời. Tuy nhiên, ông cũng nức danh với những câu chuyện về cuộc sống xa xỉ và ăn chơi trác táng tại xứ Nam Kỳ.\r\n\r\nĐặc biệt, ông Ba Huy là người sở hữu chiếc phi cơ trước tiên tại Việt Nam, điều này đã tạo ra một sự kiện \"dội\" lúc bấy giờ và ghi danh ông là người trước nhất sở hữu phi cơ trong lịch sử giang sơn.', NULL, NULL),
(12, 'Test', '1706197277_z2697103385479_b2e742cb6e0b7de3d61cdb9d0c4a87f1.jpg', '<p>Test descriptioncccccccccccccccc</p>', NULL, NULL),
(13, 'Test BLog', '1706112284.webp', '<p>Most people who have a 9-to-5 job usually travel once or twice a year. However, some occasionally end up inspired by one of these trips and decide to embrace traveling as a way of life. Yes, I&rsquo;m referring to travel bloggers who have often given up safe and profitable jobs to pursue their true passion and earn money by traveling the world.</p>\r\n\r\n<p>If you&rsquo;re reading this and feeling butterflies in your stomach, this is the article for you. You can travel around the planet and get paid for it, but&nbsp;<a href=\"https://firstsiteguide.com/start-blog/\">you&rsquo;ll need a solid blog to get started</a>.</p>\r\n\r\n<p>In this article, you&rsquo;ll be presented with a variety of top-rated travel blog examples that provide compelling travel content, attractive photos, and modern design to attract readers. If you&rsquo;re ready for your first lesson on&nbsp;<a href=\"https://firstsiteguide.com/travel-blog/\">how to become a travel blogger</a>, pay attention to the rest of this article.</p>\r\n\r\n<h2>35 best travel blogs</h2>\r\n\r\n<p>When you start looking up travel&nbsp;<a href=\"https://www.hubspot.com/products/cms/ai-blog-writer?utm_source=external&amp;utm_medium=anchor-text&amp;utm_campaign=content-assistant\" rel=\"noreferrer noopener\" target=\"_blank\">blogs on the internet</a>, you&rsquo;ll come across hundreds of different websites. That&rsquo;s why I have attempted to pick 35 of them that are currently active and growing. They are great examples of travel inspiration, guides, tips, and photography.</p>\r\n\r\n<h3>1.&nbsp;<a href=\"https://www.saltinourhair.com/\" rel=\"noreferrer noopener\" target=\"_blank\">Salt in Our Hair</a></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Follow Hannah and Nick, two creative travel bloggers from the Netherlands, who own and run the Salt in our Hair blog. This award-winning travel blog will get your attention with its fantastic travel stories, guides, and tips, accompanied by spectacular Instagram-friendly photos.</p>\r\n\r\n<p><strong>Main topics covered:&nbsp;</strong>travel tips, travel guides, lifestyle<br />\r\n<strong>Built with:&nbsp;</strong>WordPress<br />\r\n<strong>The main source of income:&nbsp;</strong>presets, e-book<br />\r\n<strong>The most popular post:</strong>&nbsp;<a href=\"https://www.saltinourhair.com/bali/bali-route-guide/\" rel=\"noreferrer noopener\" target=\"_blank\">Ultimate 3-Week Route Guide on What to Do in Bali</a><br />\r\n<strong>Instagram account:</strong>&nbsp;<a href=\"https://www.instagram.com/saltinourhair/\" rel=\"noreferrer noopener nofollow\" target=\"_blank\">@saltinourhair</a></p>', NULL, NULL),
(14, 'Test moi', '1706116035_z2697103385479_b2e742cb6e0b7de3d61cdb9d0c4a87f1.jpg', '<p></p>', NULL, NULL),
(15, 'Test thu N', '1706240733_Screenshot_2022-04-23-21-21-07-28_680d03679600f7af0b4c700c6b270fe7.jpg', '<p>ddddddddddddddddddddddddddddddddd</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` int(20) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id_momo` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `departurelocation` varchar(255) NOT NULL,
  `arrivallocation` varchar(255) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `tour_code` varchar(255) NOT NULL,
  `person1` int(20) NOT NULL,
  `person2` int(20) NOT NULL,
  `person3` int(20) NOT NULL,
  `price1` varchar(255) NOT NULL,
  `price2` varchar(255) NOT NULL,
  `price3` varchar(255) NOT NULL,
  `price0` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `order_id`, `user_id`, `order_id_momo`, `schedule_id`, `fullname`, `email`, `phone`, `address`, `departurelocation`, `arrivallocation`, `date_start`, `date_end`, `vehicle`, `keyword`, `tour_code`, `person1`, `person2`, `person3`, `price1`, `price2`, `price3`, `price0`, `total_price`) VALUES
(1, 1, 1, 1706586294, 5, 'Nguyễn Quang Huy', 'nqht123456789@gmail.com', '0374874492', 'Bình Dương', 'TP. Hồ Chí Minh', 'Quảng Bình', '2024-02-29 03:06:00', '2024-03-02 03:06:00', 'Máy bay', '3 Ngày 2 Đêm', 'QB29022024', 1, 3, 1, '1.900.000 VNĐ', '590.000 VNĐ', '190.000 VNĐ', '3.190.000 VNĐ', '7050000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `keyword`, `desc`, `status`) VALUES
(1, 'Hà Nội', '1703654986_topsongho-1412822386.jpg', 'HN', '1', '1'),
(2, 'Hà Giang', '1703675601_rsz_ha-giang-2.jpg', 'HG', '2', '1'),
(3, 'Quảng Bình', '1703682069_quang binh.jpg', 'QB', '1', '1'),
(4, 'Đà Nẵng', '1703682077_cau-rong-da-nang.jpg', 'ĐN', '1', '1'),
(5, 'Đà Lạt', '1703679779_quang-truong-da-lat-1.jpg', 'ĐL', '1', '1'),
(6, 'Nha Trang', '1703681685_nha-trang-o-dau-1.jpg', 'NT', '1', '1'),
(7, 'Phú Quốc', '1703681725_phuquoc.jpg', 'PQ', '1', '1'),
(9, 'Huế', '1706551066_hue.jpg', 'H', 'update', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forget_password`
--

CREATE TABLE `forget_password` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_momo`
--

CREATE TABLE `order_momo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `partner_code` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `order_info` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_momo`
--

INSERT INTO `order_momo` (`id`, `user_id`, `partner_code`, `order_id`, `amount`, `order_info`, `created_at`, `updated_at`) VALUES
(1, 1, 'MOMOBKUN20180529', 1706586294, '7050000', 'Thanh toán qua MoMo', '2024-01-29 20:44:54', '2024-01-29 20:44:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `vehicle` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `price1` varchar(255) NOT NULL,
  `price2` varchar(255) NOT NULL,
  `price3` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `idcat` bigint(20) NOT NULL,
  `departurelocation` varchar(255) DEFAULT NULL,
  `arrivallocation` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `keyword`, `vehicle`, `desc`, `content`, `price`, `price1`, `price2`, `price3`, `image`, `images`, `idcat`, `departurelocation`, `arrivallocation`, `status`) VALUES
(25, 'Tour Khám phá Phong Nha Kẻ Bàng', '3 Ngày 2 Đêm', 'Máy bay', 'Tour Phong Nha Kẻ Bàng 2 ngày 1 đêm phù hợp cho du khách có ít thời gian tại Quảng Bình.Một chương trình Tour khám phá Vườn Quốc gia phong Nha – Kẻ Bàng cho du khách đến tham quan Du lịch Quảng Bình. Trong chương trình Tour khám phá Phong Nha Kẻ Bàng 2 ngày 1 đêm quý khách sẽ được tham quan Động Phong Nha, Động Thiên Đường, được đu dây zipline tắm trên sông Chày và trải nghiệm Tour mạo hiểm thu nhỏ khám phá Hang tối. Quý vị sẽ được ngủ lại ở Vườn Thực Vật hoặc khách sạn tại trung tâm Du lịch Phong Nha. Hành trình thăm quan các địa điểm nối tiếng tại Phong Nha Kẻ Bàng. Đây cũng là những điểm du lịch cơ bản dành cho nhiều đối tượng khách tại Phong Nha.Tour du lịch khám phá Phong Nha Kẻ Bàng sẽ là trãi nghiệm lý thú cho du khách. Các địa danh du lịch hấp dẫn cũng như các dịch vụ đẳng cấp mà chúng tôi mang lại cho du khách. Chắc chắn sẽ làm hài lòng du khách khi đến Quảng Bình trải nghiệm. Mỗi điểm đến là một trải nghiệm khác biệt và không lặp lại. Đây cũng là những điểm du lịch cơ bản dành cho nhiều đối tượng khách tại Phong Nha.Tour du lịch khám phá Phong Nha Kẻ Bàng sẽ là trãi nghiệm lý thú cho du khách. Các địa danh du lịch hấp dẫn cũng như các dịch vụ đẳng cấp mà chúng tôi mang lại cho du khách. Chắc chắn sẽ làm hài lòng du khách khi đến Quảng Bình trải nghiệm. Mỗi điểm đến là một trải nghiệm khác biệt và không lặp lại.Mỗi điểm đến là một trải nghiệm khác biệt và không lặp lại. Đây cũng là những điểm du lịch cơ bản dành cho nhiều đối tượng khách tại Phong Nha.Tour du lịch khám phá Phong Nha Kẻ Bàng sẽ là trãi nghiệm lý thú cho du khách. Các địa danh du lịch hấp dẫn cũng như các dịch vụ đẳng cấp mà chúng tôi mang lại cho du khách. Chắc chắn sẽ làm hài lòng du khách khi đến Quảng Bình trải nghiệm. Mỗi điểm đến là một trải nghiệm khác biệt và không lặp lại.', '<p><span style=\"font-size:16px\"><strong>Ng&agrave;y 01: Đồng Hới - Vườn quốc gia Phong Nha &ndash; Kẻ B&agrave;ng &ndash;&nbsp; Động Thi&ecirc;n Đường &ndash;&nbsp;Kayak S&ocirc;ng Ch&agrave;y &ndash;ZIPLINE tắm s&ocirc;ng &ndash; Kh&aacute;m ph&aacute; Hang Tối&nbsp;</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">8h00: Hướng dẫn vi&ecirc;n Netin Travel dẫn đo&agrave;n xuất ph&aacute;t đi du lịch thăm quan Vườn quốc gia<strong><u>&nbsp;</u>Phong Nha Kẻ B&agrave;ng</strong>&nbsp;- Di sản Thi&ecirc;n nhi&ecirc;n Thế giới. Đ&acirc;y l&agrave; vườn Quốc gia lớn nhất tại Việt Nam. Bắt đầu h&agrave;nh tr&igrave;nh Tour Phong Nha Kẻ B&agrave;ng 2 ng&agrave;y 1 đ&ecirc;m</span></li>\r\n	<li><span style=\"font-size:14px\">10h00: Tham quan&nbsp;<strong>Động Thi&ecirc;n Đường</strong>&nbsp;- Hang động kh&ocirc; d&agrave;i nhất Đ&ocirc;ng Nam &Aacute; với chiều d&agrave;i đ&atilde; được khảo s&aacute;t 31,4km. Với hệ thống thạch nhũ tr&aacute;ng lệ, Du kh&aacute;ch sẽ được chi&ecirc;m ngưỡng một Thi&ecirc;n đường chốn trần gian. Lịch tr&igrave;nh tham quan của du kh&aacute;ch l&agrave; 1km trong hang động. Du kh&aacute;ch sẽ đến đi xe điện sau đ&oacute; đi bộ leo n&uacute;i dưới t&aacute;n rừng Phong Nha Kẻ B&agrave;ng.</span></li>\r\n	<li><span style=\"font-size:14px\">12h30: Đo&agrave;n về ăn trưa tại nh&agrave; h&agrave;ng&nbsp;<strong>Dark Cave</strong></span></li>\r\n	<li><span style=\"font-size:14px\">13h30: Sau bữa s&aacute;ng với những m&oacute;n ăn d&acirc;n d&atilde; của địa phương l&agrave;ng qu&ecirc; Ch&agrave;y Lập, Du kh&aacute;ch sẽ đi v&agrave;o tham quan điểm du lịch v&ocirc; c&ugrave;ng hấp dẫn với nhiều hoạt động như&nbsp;<strong>Đu d&acirc;y Zipline</strong>,&nbsp;<strong>Tắm b&ugrave;n</strong>,&nbsp;<strong>đi bộ, Kayak</strong>, kh&aacute;m ph&aacute; hang động&hellip;tại điểm du lịch&nbsp;<strong>S&ocirc;ng Ch&agrave;y Hang Tối</strong>. Du kh&aacute;ch được đu Zipline để đến tham quan hang Tối.</span></li>\r\n	<li><span style=\"font-size:14px\">Hang Tối được khai th&aacute;c với loại h&igrave;nh du lịch th&aacute;m hiểm. Với đ&egrave;n pin đội đầu, c&aacute;c thiết bị bơi lội du kh&aacute;ch sẽ c&oacute; trải nghiệm v&ocirc; c&ugrave;ng th&uacute; vị khi vừa đi bộ, vừa bơi qua hồ Thủy Ti&ecirc;n m&aacute;t lạnh, thư giản với hoạt động tắm b&ugrave;n.</span></li>\r\n	<li>\r\n	<p><span style=\"font-size:14px\">Nếu du kh&aacute;ch kh&ocirc;ng th&iacute;ch những tr&ograve; mạo hiểm th&igrave; suối nước Moọc sẽ l&agrave; lựa chọn thay thế. Suối Nước moọc nằm ngay cạnh hang tối với những tr&ograve; chơi nhẹ nh&agrave;ng v&agrave; tắm suối.</span></p>\r\n	</li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Ng&agrave;y&nbsp;02: Động Phong Nha &ndash; Đồng Hới</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">8h00: Đo&agrave;n ăn s&aacute;ng tại kh&aacute;ch sạn Phong Nha. Sau bữa s&aacute;ng du kh&aacute;ch tiếp tục h&agrave;nh tr&igrave;nh đi tới khu du lịch tham quan hang&nbsp;<strong>động Phong Nha</strong>&nbsp;- hang động được đ&aacute;nh gi&aacute; đầy đủ với 7 ti&ecirc;u ch&iacute; bởi Hiệp Hội Th&aacute;m Hiểm Hang Động Ho&agrave;ng Gia Anh. Sau h&agrave;nh tr&igrave;nh gần 30 ph&uacute;t tr&ecirc;n thuyền du kh&aacute;ch sẽ đến Động Phong Nha với những thạch nhũ ấn tượng, l&agrave; điểm đến được du kh&aacute;ch đ&aacute;nh gi&aacute; cao.</span></li>\r\n	<li><span style=\"font-size:14px\">Du kh&aacute;ch cũng c&oacute; thể đăng k&yacute; th&ecirc;m trải nghiệm Động Ti&ecirc;n Sơn, đi bộ 600 bậc cầu thang, check in cầu k&iacute;nh ngắm to&agrave;n cảnh Phong Nha Kẻ B&agrave;ng.</span></li>\r\n	<li><span style=\"font-size:14px\">13h00 : Ăn trưa tại nh&agrave; h&agrave;ng</span></li>\r\n	<li><span style=\"font-size:14px\">11h45 : Trở về Đồng Hới. Kết th&uacute;c chương tr&igrave;nh&nbsp;<strong>tour du lịch Phong Nha Kẻ B&agrave;ng</strong>. Hẹn gặp lại Qu&yacute; kh&aacute;ch chuyến Du lịch Quảng B&igrave;nh lần sau.</span></li>\r\n	<li><span style=\"font-size:14px\">Hoạt động trong tour: Đi bộ, bơi lội, tham quan hang động, ch&egrave;o thuyền Kayak tr&ecirc;n s&ocirc;ng, đu Zipline, Du thuyền.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\"><strong>&nbsp; &nbsp;</strong></span></p>', '3.190.000 VNĐ', '1.900.000 VNĐ', '590.000 VNĐ', '190.000 VNĐ', '1705634043_quang binh.jpeg', '[\"1706559096_at_he-thong-hang-dong-phong-nha-ke-bang.jpg\",\"1706559096_at_phong nha ke bang.jpg\",\"1706559096_at_dong-phong-nha-o-quang-binh-2.jpg\",\"1706559096_at_dong-phong-nha-ke-bang-6.jpg\",\"1706559096_at_Dong-Phong-Nha-Ke-Bang-dep-den-choang-ngop.jpg\",\"1706559096_at_du-lich-quang-binh-1-ngay-4_1632669083.jpg\",\"1706559096_at_quang binh.jpeg\"]', 3, 'TP. Hồ Chí Minh', 'Quảng Bình', 1),
(30, 'Hà Nội - Bái Đính - Khu Du Lịch Tràng An - Bái Đính - Hạ Long - Yên Tử', '4 Ngày 3 Đêm', 'Xe khách', 'Xứ Bắc – vùng đất khai cơ của các Vương triều Việt, nơi định đô của hầu hết các triều đại phong kiến Việt Nam chính vì vậy nơi đây được xem như là đất kinh đô ngàn năm văn hiến với một bề dày văn hóa, lịch sử sâu sắc và đa dạng. Tuy nhiên, khi đến đây, Du khách không chỉ được tham quan những công trình văn hóa – lịch sử cổ kính như : Văn Miếu, Hoàng thành Thăng Long, Cố đô Hoa Lư, Chùa Bái Đính, trải nghiệm những nét văn hóa đặc sắc của đất kinh đô như : ngoạn cảnh 36 phố phường, thưởng thức ẩm thực, xem múa rối nước; mà còn có thể thăm thú các thắng cảnh nổi tiếng nơi đây như : Di sản thế giới Danh thắng Tràng An và Vịnh Hạ Long.Nhắc đến xứ Bắc, không thể bỏ lỡ…  –  Văn Miếu Quốc Tử Giám: ngôi trường đại học đầu tiên của Việt Nam, không chỉ là di tích lịch sử nổi tiếng của thủ đô Hà Nội mà còn là nơi chứa đựng những giá trị tinh hoa văn hóa của những giai đoạn lịch sử phong kiến trước kia và lưu giữ những giá trị truyền thống của đất Việt.  – Chùa Bái Đính: một quần thể chùa được coi là đẹp và lớn nhất ở Việt Nam hiện nay, sở hữu nhiều kỷ lục nhất của Việt Nam.  – Danh thắng Tràng An: có giá trị về văn hoá thiên nhiên hùng vĩ chứa đựng nhiều giá trị nổi bật với cảnh quan thiên nhiên đặc sắc, được tạo nên 1 cách hài hoà bởi hình núi, thế sông, các hang động ngập nước quanh năm với thảm thực vật còn hoang sơ nguyên vẹn.  – Vịnh Hạ Long: Theo CNN, là điểm du lịch đẹp nhất tại Việt Nam, đồng thời là một trong những điểm tham quan tự nhiên nổi tiếng của Đông Nam Á. Với 1.969 đảo đá vôi cùng những ngôi làng nổi trên làn nước xanh thẳm, vẻ đẹp của Hạ Long như khiến thời gian lắng đọng.Nhắc đến xứ Bắc, không thể bỏ lỡ…  –  Văn Miếu Quốc Tử Giám: ngôi trường đại học đầu tiên của Việt Nam, không chỉ là di tích lịch sử nổi tiếng của thủ đô Hà Nội mà còn là nơi chứa đựng những giá trị tinh hoa văn hóa của những giai đoạn lịch sử phong kiến trước kia và lưu giữ những giá trị truyền thống của đất Việt.  – Chùa Bái Đính: một quần thể chùa được coi là đẹp và lớn nhất ở Việt Nam hiện nay, sở hữu nhiều kỷ lục nhất của Việt Nam.  – Danh thắng Tràng An: có giá trị về văn hoá thiên nhiên hùng vĩ chứa đựng nhiều giá trị nổi bật với cảnh quan thiên nhiên đặc sắc, được tạo nên 1 cách hài hoà bởi hình núi, thế sông, các hang động ngập nước quanh năm với thảm thực vật còn hoang sơ nguyên vẹn.  – Vịnh Hạ Long: Theo CNN, là điểm du lịch đẹp nhất tại Việt Nam, đồng thời là một trong những điểm tham quan tự nhiên nổi tiếng của Đông Nam Á. Với 1.969 đảo đá vôi cùng những ngôi làng nổi trên làn nước xanh thẳm, vẻ đẹp của Hạ Long như khiến thời gian lắng đọng.', '<p><strong><span style=\"font-size:16px\">Ng&agrave;y&nbsp;1&nbsp;-&nbsp;Đ&agrave; Nẵng - Nội B&agrave;i (H&agrave; Nội) &ndash; Ch&ugrave;a B&aacute;i Đ&iacute;nh &ndash; Tr&agrave;ng An (Ăn trưa, tối)</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch tập trung tại S&acirc;n bay Đ&agrave; Nẵng, ga đi Trong Nước. Hướng dẫn vi&ecirc;n l&agrave;m thủ tục cho Qu&yacute; kh&aacute;ch đ&aacute;p chuyến bay đi H&agrave; Nội . Đến s&acirc;n bay Nội B&agrave;i, Xe đ&oacute;n Qu&yacute; kh&aacute;ch khởi h&agrave;nh đi&nbsp;<strong>Ninh B&igrave;n</strong>h - v&ugrave;ng đất mệnh danh l&agrave; &ldquo;Nơi mơ đến, chốn mong về&rdquo; với nhiều di t&iacute;ch văn h&oacute;a, thi&ecirc;n nhi&ecirc;n v&ocirc; c&ugrave;ng đặc sắc. Đến nơi, Qu&yacute; kh&aacute;ch tham quan:&nbsp;</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><strong>Ch&ugrave;a B&aacute;i Đ&iacute;nh</strong>&nbsp;-&nbsp;một quần thể ch&ugrave;a với nhiều kỷ lục Việt Nam như pho tượng phật Di Lặc bằng đồng nặng 80 tấn, h&agrave;nh lang với 500 tượng vị La H&aacute;n, t&ograve;a Bảo Th&aacute;p cao 99m&hellip;</span></li>\r\n	<li><span style=\"font-size:14px\"><strong>Khu Du lịch Tr&agrave;ng An</strong>&nbsp;- Qu&yacute; kh&aacute;ch l&ecirc;n thuyền truyền thống đi tham quan thắng cảnh hệ thống n&uacute;i đ&aacute; v&ocirc;i h&ugrave;ng vĩ v&agrave; c&aacute;c thung lũng ngập nước, th&ocirc;ng với nhau bởi c&aacute;c d&ograve;ng suối tạo n&ecirc;n c&aacute;c hang động ngập nước quanh năm. Điểm xuyến trong kh&ocirc;ng gian hoang sơ, tĩnh lặng l&agrave; h&igrave;nh ảnh r&ecirc;u phong, cổ k&iacute;nh của c&aacute;c m&aacute;i đ&igrave;nh, đền, phủ nằm n&eacute;p m&igrave;nh dưới ch&acirc;n c&aacute;c d&atilde;y n&uacute;i cao.&nbsp;</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch d&ugrave;ng cơm tối v&agrave; nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi. Buổi tối qu&yacute; kh&aacute;ch tự do kh&aacute;m ph&aacute;&nbsp;<strong>Phố cổ Hoa Lư</strong>, một kh&ocirc;ng gian check-in cổ, đẹp, trầm mặc đẹp trở n&ecirc;n lung linh, huyền ảo hơn với sắc m&agrave;u của những chiếc đ&egrave;n lồng v&agrave; Bảo Th&aacute;p tr&ecirc;n Hồ Kỳ L&acirc;n;&nbsp;<em>trải nghiệm nhiều hoạt động tr&ograve; chơi d&acirc;n gian v&agrave; nhiều loại h&igrave;nh văn h&oacute;a nghệ thuật từ d&acirc;n tộc như m&uacute;a rối nước, nhảy m&uacute;a Tắc X&igrave;nh, h&aacute;t xẩm, ... đến những buổi tr&igrave;nh diễn acoustic sẽ được diễn ra v&agrave;o c&aacute;c buổi tối ng&agrave;y cuối tuần.</em></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Ng&agrave;y&nbsp;2&nbsp;-&nbsp;Ninh B&igrave;nh &ndash; Hạ Long (Ăn ba bữa)</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch ăn s&aacute;ng v&agrave; trả ph&ograve;ng kh&aacute;ch sạn. Xe khởi h&agrave;nh đưa Qu&yacute; kh&aacute;ch đến th&agrave;nh phố biển Hạ Long tham quan:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><strong>Xuống thuyền đi du ngoạn Vịnh Hạ Long</strong>&nbsp;- Thắng cảnh thi&ecirc;n nhi&ecirc;n tuyệt đẹp v&agrave; v&ocirc; c&ugrave;ng sống động, được UNESCO c&ocirc;ng nhận l&agrave; di sản thi&ecirc;n nhi&ecirc;n Thế giới năm 1994.</span></li>\r\n	<li><span style=\"font-size:14px\">Từ tr&ecirc;n t&agrave;u ngắm nh&igrave;n c&aacute;c h&ograve;n đảo lớn nhỏ trong Vịnh Hạ Long:&nbsp;<strong>H&ograve;n G&agrave; Chọi, H&ograve;n Lư Hương.</strong></span></li>\r\n	<li><span style=\"font-size:14px\"><strong>Động Thi&ecirc;n Cung</strong>&nbsp;l&agrave; một trong những động đẹp nhất ở Hạ Long. Vẻ đẹp nguy nga v&agrave; lộng lẫy bởi những lớp thạch nhũ v&agrave; những luồng &aacute;nh s&aacute;ng lung linh.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">Xe đ&oacute;n Qu&yacute; kh&aacute;ch tại bến t&agrave;u v&agrave; khởi h&agrave;nh đi tham quan chụp h&igrave;nh b&ecirc;n ngo&agrave;i&nbsp;<strong>Bảo t&agrave;ng Quảng Ninh, Cung C&aacute; Heo&nbsp;</strong>- Cung Quy Hoạch, Hội Chợ, Triển L&atilde;m V&agrave; Văn H&oacute;a Quảng Ninh, tham quan mua sắm&nbsp;<em>đặc sản tại Hải Sản Hương Đ&agrave; Hạ Long với nhiều mặt h&agrave;ng hải sản tươi, kh&ocirc;, chả mực,..&nbsp;</em></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch d&ugrave;ng cơm chiều v&agrave; nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi. Buổi tối, Qu&yacute; kh&aacute;ch tự do kh&aacute;m ph&aacute; nhiều hoạt động dịch vụ giải tr&iacute; s&ocirc;i nổi tại &ldquo;phố cổ&rdquo; B&atilde;i Ch&aacute;y - nằm cạnh c&ocirc;ng vi&ecirc;n Sun World Hạ Long từ những ẩm thực đường phố đến c&aacute;c qu&aacute;n c&agrave; ph&ecirc; si&ecirc;u dễ thương như H&ograve;n Gai Coffee &amp; Lounge hay thoải m&aacute;i bung x&otilde;a tại The Mini Bar, Brothers Pub,&hellip;</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Ng&agrave;y&nbsp;3&nbsp;-&nbsp;Hạ Long - Y&ecirc;n Tử - H&agrave; Nội (Ăn 3 bữa)</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch ăn s&aacute;ng v&agrave; trả ph&ograve;ng kh&aacute;ch sạn. Xe đưa Qu&yacute; kh&aacute;ch đi H&agrave; Nội, tr&ecirc;n đường dừng tham quan:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><strong>V&ugrave;ng đất thi&ecirc;ng Y&ecirc;n Tử</strong><em>:&nbsp;</em>Qu&yacute; kh&aacute;ch&nbsp;<strong>l&ecirc;n c&aacute;p treo du ngoạn thắng cảnh thi&ecirc;n nhi&ecirc;n Đ&ocirc;ng Y&ecirc;n Tử&nbsp;</strong>(chi ph&iacute; c&aacute;p treo tự t&uacute;c), nơi c&ograve;n lưu giữ nhiều di t&iacute;ch lịch sử mệnh danh &ldquo;Đất tổ Phật gi&aacute;o Việt Nam&rdquo;, chi&ecirc;m b&aacute;i&nbsp;<strong>ch&ugrave;a Một M&aacute;i</strong>,&nbsp;<strong>ch&ugrave;a Hoa Y&ecirc;n&nbsp;</strong>&ndash; nơi tu h&agrave;nh của phật ho&agrave;ng Trần Nh&acirc;n T&ocirc;ng khai sinh ra d&ograve;ng mới Thiền Ph&aacute;i Tr&uacute;c L&acirc;m, nằm tr&ecirc;n lưng chừng n&uacute;i ở độ cao 516m. Theo dấu ch&acirc;n Phật Ho&agrave;ng viếng&nbsp;<strong>Ch&ugrave;a Đồng</strong>&nbsp;<strong>c&oacute; t&ecirc;n Thi&ecirc;n Tr&uacute;c Tự&nbsp;</strong>(ch&ugrave;a C&otilde;i Phật), tọa lạc ở đỉnh cao nhất d&atilde;y Y&ecirc;n Tử (1.068m) &ndash; ng&ocirc;i ch&ugrave;a bằng đồng lớn nhất Việt Nam.</span></li>\r\n	<li><span style=\"font-size:14px\">Dừng tại trạm dừng ch&acirc;n Hải Dương mua đặc sản: b&aacute;nh đậu xanh, b&aacute;nh khảo.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">Đến nơi, xe đưa Qu&yacute; kh&aacute;ch đi một v&ograve;ng&nbsp;<strong>Hồ Ho&agrave;n Kiếm ngắm</strong>&nbsp;b&ecirc;n ngo&agrave;i Th&aacute;p R&ugrave;a, Đền Ngọc Sơn, Cầu Th&ecirc; H&uacute;c. Qu&yacute; kh&aacute;ch d&ugrave;ng cơm chiều v&agrave; nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi. Buổi tối, Qu&yacute; kh&aacute;ch tự do kh&aacute;m ph&aacute; 36 phố phường H&agrave; Nội.&nbsp;</span></p>', '5.190.000 VNĐ', '2.900.000 VNĐ', '790.000 VNĐ', '390.000 VNĐ', '1706585386_van-mieu-quoc-tu-giam-54b86ff23aed0.jpg', '[\"1706585386_at_ho-hoan-kiem867787096576.jpg\",\"1706585386_at_bai-dinh1.jpg\",\"1706585386_at_bai-dinh.jpg\",\"1706585386_at_t\\u1ea3i xu\\u1ed1ng (2).jpg\",\"1706585386_at_t\\u1ea3i xu\\u1ed1ng (1).jpg\",\"1706585386_at_ua_vinh_nghiem_6_1650079203.jpg\",\"1706585386_at_van-mieu-quoc-tu-giam-54b86ff23aed0.jpg\"]', 1, 'Hà Nội', 'Ninh Bình', 1),
(31, 'Đông Bắc: Ba Bể - Cao Bằng - Thác Bản Giốc - Mèo Vạc - Hà Giang - Lũng Cú - Đồng Văn - Mã Pí Lèng', '4 Ngày 3 Đêm', 'Xe khách', 'Thác Bản Giốc - một trong những thác nước đẹp nhất của Việt Nam có đường ranh giới tự nhiên với Trung Quốc. Thác nước đẹp và hùng vỹ với dòng nước cuồn cuộn chảy quanh năm bắt nguồn từ dòng sông Quây Sơn nước xanh ngắt một màu ngọc Bích. Đẹp nhất vào mùa lúa chín (tháng 9) khung cảnh đường vào thác sáng rực một màu vàng óng và dòng nước trắng xóa mềm mại như tóc tiên càng làm khung cảnh thêm nên thơ, hùng vỹ. Chùa Phật Tích Trúc Lâm Bản Giốc: được xây dựng theo lối kiến trúc thuần Việt trên diện tích 3ha, đây là ngôi chùa đầu tiên được xây dựng tại nơi biên cương phía Bắc của tổ quốc. Quý khách dùng cơm trưa và tiếp tục tham quan:  Động Ngườm Ngao - một động lớn được hình thành từ sự phong hoá lâu đời của đá vôi; bước vào động, du khách như bước vào một thế giới kỳ ảo, choáng ngợp trước những dải thạch nhũ muôn màu, những tượng đá quyến rũ với nhiều kiểu dáng khác nhau mang dáng dấp hình người, cây rừng, súc vật..., các nhũ đá thả từ trên xuống hay mọc từ dưới đất lên vô cùng sống động Làng Đá Khuổi Ky: với một ý niệm đá là khởi nguồn của sự sống và trung tâm của vũ trụ mà người Tày ở Trùng Khánh luôn gìn giữ ngôi nhà sàn, nơi sinh hoạt xung quanh mình là đá, điều đó đã tạo nên điểm nhấn cho ngôi làng nhìn từ xa như một bức tranh vững chãi giữa mây trời núi non hùng vỹ. Đến đây vào homestay và thưởng thức tách café giữa khung cảnh núi rừng sẽ cho quý khách cảm giác bình yên đến lạ.Thác Bản Giốc - một trong những thác nước đẹp nhất của Việt Nam có đường ranh giới tự nhiên với Trung Quốc. Thác nước đẹp và hùng vỹ với dòng nước cuồn cuộn chảy quanh năm bắt nguồn từ dòng sông Quây Sơn nước xanh ngắt một màu ngọc Bích. Đẹp nhất vào mùa lúa chín (tháng 9) khung cảnh đường vào thác sáng rực một màu vàng óng và dòng nước trắng xóa mềm mại như tóc tiên càng làm khung cảnh thêm nên thơ, hùng vỹ. Chùa Phật Tích Trúc Lâm Bản Giốc: được xây dựng theo lối kiến trúc thuần Việt trên diện tích 3ha, đây là ngôi chùa đầu tiên được xây dựng tại nơi biên cương phía Bắc của tổ quốc. Quý khách dùng cơm trưa và tiếp tục tham quan:  Động Ngườm Ngao - một động lớn được hình thành từ sự phong hoá lâu đời của đá vôi; bước vào động, du khách như bước vào một thế giới kỳ ảo, choáng ngợp trước những dải thạch nhũ muôn màu, những tượng đá quyến rũ với nhiều kiểu dáng khác nhau mang dáng dấp hình người, cây rừng, súc vật..., các nhũ đá thả từ trên xuống hay mọc từ dưới đất lên vô cùng sống động Làng Đá Khuổi Ky: với một ý niệm đá là khởi nguồn của sự sống và trung tâm của vũ trụ mà người Tày ở Trùng Khánh luôn gìn giữ ngôi nhà sàn, nơi sinh hoạt xung quanh mình là đá, điều đó đã tạo nên điểm nhấn cho ngôi làng nhìn từ xa như một bức tranh vững chãi giữa mây trời núi non hùng vỹ. Đến đây vào homestay và thưởng thức tách café giữa khung cảnh núi rừng sẽ cho quý khách cảm giác bình yên đến lạ.', '<p><span style=\"font-size:16px\"><strong>Ng&agrave;y&nbsp;1&nbsp;-&nbsp;S&Acirc;N BAY NỘI B&Agrave;I &ndash; BẮC KẠN 02 bữa ăn: (Trưa, Chiều)</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch tập trung tại s&acirc;n bay T&acirc;n Sơn Nhất (Ga nội địa), hướng dẫn vi&ecirc;n hỗ trợ kh&aacute;ch l&agrave;m thủ tục đ&aacute;p chuyến bay đi H&agrave; Nội. Đến s&acirc;n bay Nội B&agrave;i, xe v&agrave; HDV Vietravel đ&oacute;n Qu&yacute; kh&aacute;ch đi Bắc Kạn, đến nơi Qu&yacute; kh&aacute;ch xuống thuyền tham quan:&nbsp;</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><strong>Hồ Ba Bể (2 tiếng)</strong>&nbsp;&ndash; Kh&aacute;m ph&aacute; bức tranh sơn thủy hữu t&igrave;nh v&ocirc; c&ugrave;ng sống động, mặt nước hồ trong xanh như gương l&agrave;m quyến rũ biết bao du kh&aacute;ch l&agrave;m quyến rũ biết bao du kh&aacute;ch, thi&ecirc;n nhi&ecirc;n v&agrave; con người như h&ograve;a quyện v&agrave;o nhau, ngắm Ao Ti&ecirc;n, Đền An M&atilde;, h&ograve;n B&agrave; G&oacute;a. Thuyền dừng tr&ecirc;n mặt hồ, Qu&yacute; kh&aacute;ch giao lưu h&aacute;t then v&agrave; đ&agrave;n t&iacute;nh của người T&agrave;y, hoặc tham gia ch&egrave;o thuyền kayak xung quanh đảo B&agrave; G&oacute;a (chi ph&iacute; tự t&uacute;c).</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Ng&agrave;y&nbsp;2&nbsp;-&nbsp;BA BỂ - P&Aacute;C B&Oacute; - CAO BẰNG 03 bữa ăn: (S&aacute;ng, Trưa, Chiều)</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch ăn s&aacute;ng v&agrave; trả ph&ograve;ng kh&aacute;ch sạn. Xe khởi h&agrave;nh đi Cao Bằng, tham quan:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><strong>Khu di t&iacute;ch P&aacute;c P&oacute;&nbsp;</strong>- nơi chủ tịch Hồ Ch&iacute; Minh từng sống v&agrave; l&agrave;m việc với khung cảnh n&ecirc;n thơ, hữu t&igrave;nh. D&ograve;ng suối trong xanh, thơ mộng trước cửa hang được B&aacute;c đặt t&ecirc;n l&agrave; Suối L&ecirc; Nin, ngọn n&uacute;i h&ugrave;ng vĩ cạnh b&ecirc;n l&agrave; N&uacute;i C&aacute;c M&aacute;c</span></li>\r\n	<li><span style=\"font-size:14px\"><strong>Khu di t&iacute;ch Kim Đồng</strong>&nbsp;- Nơi ghi nhớ anh h&ugrave;ng liệt sỹ c&oacute; c&ocirc;ng bảo vệ c&aacute;n bộ c&aacute;ch mạng trong thời kỳ kh&aacute;ng chiến.</span></li>\r\n</ul>\r\n\r\n<p><strong><span style=\"font-size:16px\">Ng&agrave;y&nbsp;3&nbsp;-&nbsp;CAO BẰNG - TH&Aacute;C BẢN GIỐC 03 bữa ăn: (S&aacute;ng, Trưa, Chiều)</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch ăn s&aacute;ng. Xe khởi h&agrave;nh đưa Qu&yacute; kh&aacute;ch đi tham quan:&nbsp;</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">Th&aacute;c Bản Giốc&nbsp;- một trong những th&aacute;c nước đẹp nhất của Việt Nam c&oacute; đường ranh giới tự nhi&ecirc;n với Trung Quốc. Th&aacute;c nước đẹp v&agrave; h&ugrave;ng vỹ với d&ograve;ng nước cuồn cuộn chảy quanh năm bắt nguồn từ d&ograve;ng s&ocirc;ng Qu&acirc;y Sơn nước xanh ngắt một m&agrave;u ngọc B&iacute;ch. Đẹp nhất v&agrave;o m&ugrave;a l&uacute;a ch&iacute;n (th&aacute;ng 9) khung cảnh đường v&agrave;o th&aacute;c s&aacute;ng rực một m&agrave;u v&agrave;ng &oacute;ng v&agrave; d&ograve;ng nước trắng x&oacute;a mềm mại như t&oacute;c ti&ecirc;n c&agrave;ng l&agrave;m khung cảnh th&ecirc;m n&ecirc;n thơ, h&ugrave;ng vỹ.</span></li>\r\n	<li><span style=\"font-size:14px\">Ch&ugrave;a Phật T&iacute;ch Tr&uacute;c L&acirc;m Bản Giốc:&nbsp;được x&acirc;y dựng theo lối kiến tr&uacute;c thuần Việt tr&ecirc;n diện t&iacute;ch 3ha, đ&acirc;y l&agrave; ng&ocirc;i ch&ugrave;a đầu ti&ecirc;n được x&acirc;y dựng tại nơi bi&ecirc;n cương ph&iacute;a Bắc của tổ quốc.</span></li>\r\n	<li><span style=\"font-size:14px\">Qu&yacute; kh&aacute;ch d&ugrave;ng cơm trưa v&agrave; tiếp tục tham quan:&nbsp;</span></li>\r\n	<li><span style=\"font-size:14px\">Động Ngườm Ngao&nbsp;- một động lớn được h&igrave;nh th&agrave;nh từ sự phong ho&aacute; l&acirc;u đời của đ&aacute; v&ocirc;i; bước v&agrave;o động, du kh&aacute;ch như bước v&agrave;o một thế giới kỳ ảo, cho&aacute;ng ngợp trước những dải thạch nhũ mu&ocirc;n m&agrave;u, những tượng đ&aacute; quyến rũ với nhiều kiểu d&aacute;ng kh&aacute;c nhau mang d&aacute;ng dấp h&igrave;nh người, c&acirc;y rừng, s&uacute;c vật..., c&aacute;c nhũ đ&aacute; thả từ tr&ecirc;n xuống hay mọc từ dưới đất l&ecirc;n v&ocirc; c&ugrave;ng sống động</span></li>\r\n	<li><span style=\"font-size:14px\">L&agrave;ng Đ&aacute; Khuổi Ky:&nbsp;với một &yacute; niệm đ&aacute; l&agrave; khởi nguồn của sự sống v&agrave; trung t&acirc;m của vũ trụ m&agrave; người T&agrave;y ở Tr&ugrave;ng Kh&aacute;nh lu&ocirc;n g&igrave;n giữ ng&ocirc;i nh&agrave; s&agrave;n, nơi sinh hoạt xung quanh m&igrave;nh l&agrave; đ&aacute;, điều đ&oacute; đ&atilde; tạo n&ecirc;n điểm nhấn cho ng&ocirc;i l&agrave;ng nh&igrave;n từ xa như một bức tranh vững ch&atilde;i giữa m&acirc;y trời n&uacute;i non h&ugrave;ng vỹ. Đến đ&acirc;y v&agrave;o homestay v&agrave; thưởng thức t&aacute;ch caf&eacute; giữa khung cảnh n&uacute;i rừng sẽ cho qu&yacute; kh&aacute;ch cảm gi&aacute;c b&igrave;nh y&ecirc;n đến lạ.</span></li>\r\n</ul>', '10.590.000 VNĐ', '2.900.000 VNĐ', '990.000 VNĐ', '590.000 VNĐ', '1706587215_tour_ha_giang_sapa_5_ngay_4_dem_ha_giang_1650078994.jpg', '[\"1706587215_at_1520ha-giang.jpg\",\"1706587215_at_du-lich-ha-giang-6.jpg\",\"1706587215_at_doc-tham-ma-2.jpg\",\"1706587215_at_Do\\u0302\\u0301c-Tha\\u0302\\u0309m-Ma\\u0303.jpg\",\"1706587215_at_tour-du-lich-ha-giang-03-ngay-02-dem-khoi-hanh-thu-6-hang-tuan.png\",\"1706587215_at_Tour H\\u00e0 Giang Kh\\u1edfi H\\u00e0nh T\\u1eeb H\\u00e0 N\\u1ed9i V\\u1edbi H\\u01b0\\u1edbng D\\u1eabn Vi\\u00ean.jpg\",\"1706587215_at_tour-ha-giang-2-ngay-3-dem-4.jpg\"]', 2, 'Hà Nội', 'Cao Bằng', 1),
(32, 'TOUR ĐÀ NẴNG', '3 Ngày 2 Đêm', 'Máy bay', 'update', '<p>update</p>', '8.590.000 VNĐ', '1.500.000 VNĐ', '590.000 VNĐ', '190.000 VNĐ', '1706588211_tour-da-nang-3-ngay-2-dem21331.jpg', NULL, 4, 'TP. Hồ Chí Minh', 'Đà Nẵng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` double(3,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `username`, `email`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(2, 25, 1, 'Nguyễn Quang Huy', 'nqht123456789@gmail.com', 'okk', 3.00, 0, '2024-01-29 13:12:51', '2024-01-29 13:12:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `tour_code` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `schedule`
--

INSERT INTO `schedule` (`id`, `tour_id`, `date_start`, `date_end`, `tour_code`, `status`) VALUES
(5, 25, '2024-02-29 03:06:00', '2024-03-02 03:06:00', 'QB29022024', 1),
(6, 30, '2024-02-29 10:00:00', '2024-03-03 10:00:00', 'HN29022024', 1),
(7, 25, '2024-02-15 11:10:00', '2024-02-18 11:10:00', 'QB15022024', 1),
(8, 31, '2024-02-16 11:00:00', '2024-02-20 11:00:00', 'HG16022024', 1),
(10, 32, '2024-03-29 11:44:00', '2024-03-31 11:44:00', 'ĐN01030403', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_momo`
--
ALTER TABLE `order_momo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcat` (`idcat`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_momo`
--
ALTER TABLE `order_momo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`order_id`) REFERENCES `order_momo` (`id`);

--
-- Các ràng buộc cho bảng `order_momo`
--
ALTER TABLE `order_momo`
  ADD CONSTRAINT `order_momo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
