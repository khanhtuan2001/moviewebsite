-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2018 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `hovaten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `hovaten`) VALUES
(1, 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `taikhoan` int(11) NOT NULL,
  `phim` int(11) NOT NULL,
  `binhluan` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gopy`
--

CREATE TABLE `gopy` (
  `id` int(11) NOT NULL,
  `hoten` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `gopy`
--

INSERT INTO `gopy` (`id`, `hoten`, `email`, `noidung`) VALUES
(1, 'bbfb', 'gdfg@gmail.com', 'xxcbxc'),
(2, 'c', 'gaucho5687@gmail.com', 'fgdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id` int(11) NOT NULL,
  `tenphim` text NOT NULL,
  `anhminhhoa` text NOT NULL,
  `dienvien` text NOT NULL,
  `thongtinphim` text NOT NULL,
  `theloai` text NOT NULL,
  `daodien` text NOT NULL,
  `thoiluongphim` text NOT NULL,
  `namsanxuat` date NOT NULL,
  `noisanxuat` text NOT NULL,
  `tags` text NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `trailer` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id`, `tenphim`, `anhminhhoa`, `dienvien`, `thongtinphim`, `theloai`, `daodien`, `thoiluongphim`, `namsanxuat`, `noisanxuat`, `tags`, `soluotxem`, `trailer`) VALUES
(1, 'Ngôi Nhà Có Chiếc Đồng Hồ Ma Thuật', 'Ngôi nhà có chiếc đồng hồ trên tường.jpg', 'Jack Black, Cate Blanchett, Owen Vaccaro, Renée Elise Goldsberry, Sunny Suljic, Kyle MacLachlan', 'Cậu bé 10 tuổi Lewis Barnavelt chuyển đến New Zebedee, Michigan sống với ông bác phù thủy Jonathantrong một căn nhà cổ xưa kỳ quái, nơi ẩn giấu một chiếc đồng hồ ma thuật đe dọa đến sự tồn vong của Trái Đất. Với sự giúp đỡ của ông bác Jonathan và pháp sư “hàng xóm” Zimmerman, Lewis nhát gan phải giành tất cả sự dũng cảm của mình để ngăn chặn các thế lực tà ác và phá hủy chiếc đồng hồ mang đến ngày tận thế cho toàn thế giới.\r\n<img src=\"/phimhay/images/Ngôi nhà với đồng hồ trên tường.jpg\" width=\"100%\" class=\"images\" />\r\n<img src=\"/phimhay/images/Ngôi nhà có chiếc đồng hồ trên tường.jpg\" width=\"100%\" class=\"images\" />', '4', 'Eli Roth ', '105 Phút', '0000-00-00', 'Mỹ', 'Chàng Trai Năm Ấy, Phim Tràng Chai Năm Ấy, Phim Chiếu Rạp', 346, 'https://www.youtube.com/embed/3Y_UPnh7Z0Q'),
(2, 'Quái Vật VENOM', 'Quái vật venom.jpg', 'Tom Hardy, Michelle Williams, Riz Ahmed, Scott Haze, Reid Scott', 'Quái Vật Venom là một kẻ thù nguy hiểm và nặng ký của Người nhện trong loạt series của Marvel. Chàng phóng viên Eddie Brock (do Tom Hardy thủ vai) bí mật theo dõi âm mưu xấu xa của một tổ chức và đã không may mắn khi nhiễm phải loại cộng sinh trùng ngoài hành tinh (Symbiote) và từ đó đã không còn làm chủ bản thân về thể chất lẫn tinh thần. Điều này đã dần biến anh thành quái vật đen tối và nguy hiểm nhất chống lại người Nhện - Venom.', '2', ':  Ruben Fleischer', '112 phút', '0000-00-00', 'Mỹ', 'dragon bladetian jiang xiong shikiếm rồngthiên tướng hùng sư, kiếm rồng', 16, 'https://www.youtube.com/watch?v=Mi1a8GLiW8I'),
(3, 'Hoàng Tử Hào Hoa', 'Hoàng tử hào hoa.jpg', ' 	Demi Lovato, Wilmer Valderrama, Sia, Ashley Tisdale, John Cleese, Dee Bradley Baker', 'LCharming - Hoàng Tử Hào Hoa mang đến cho khán giả một câu chuyện mới, một góc nhìn cực kỳ thú vị, sáng tạo và chưa bao giờ được kể của ba cô gái xinh đẹp trong xứ sở thần tiên nổi tiếng: Bạch Tuyết, Lọ Lem và Công Chúa Ngủ Trong Rừng. Một ngày nọ cả ba khám phá ra rằng những vị hôn phu mà các cô đính hôn thật ra đều là cùng một người đó là Hoàng Tử Charming. Bên cạnh đó còn có hàng triệu cô gái trong vương quốc thầm thương trộm nhớ muốn trở thành vợ của Hoàng Tử.\r\nSự cố này xảy ra do hoàng tử bị một lời nguyền có bản tính đào hoa từ khi lọt lòng, nếu không phá được lời nguyền tất cả đàn ông trong vương quốc bị cướp vợ và người yêu sẽ nổi loạn và đó cung sẽ là ngày tàn của vương quốc. Trước tình hình đó, đức vua King Charming đã đưa cho Hoàng Tử một tối hậu thư: tìm được tình yêu đích thực của mình trước ngày sinh nhật thứ 21 của minh để phá giải lời nguyền hoặc mất hết thân phận cũng như không được trờ thành người kế vị.\r\n', '5', 'Ross Venokur', '90 Phút', '0000-00-00', 'Mỹ', 'Lọ Lem, Lọ Lem Full Hd, Lọ Lem Vietsub, Lọ Lem Mỹ Cinderella, Phim Chiếu Rạp Tháng 3', 26, 'https://www.youtube.com/watch?v=GrQUWsIe4rY'),
(48, 'Đại Sư Huynh', 'Đại sư hynh.jpg', 'Chung Tử Đơn, Jai Day, Trần Kiều Ân, Billy Lau, Kang Yu, Brahim Achabbakhe', 'Một giáo viên trung học mỗi ngày đều đặn tới trường gõ đầu trẻ cho đến một hôm…cậu học sinh do anh chủ nhiệm dính vào rắc rối với một băng đảng xã hội đen và bị bắt cóc. Đó cũng là lúc bí mật của“anh” thầy trước giờ luôn hiền lành, hết mực yêu thương học sinh và có tâm với nghề bị bộc lộ. Có vẻ như quá khứ máu lửa không buông tha “anh” thầy mà buộc anh phải trở lại con người xưa nhưng có khác là lần này không phải chiến đấu cho bản thân anh, mà cho những đứa trẻ mà anh luôn xem chúng như những đứa em trai.', '1', 'Kan Ka Wai', '101 Phút', '0000-00-00', 'Trung Quốc', '', 0, ''),
(6, 'Khách Sạn Tội Phạm', 'Khách sạn tội phạm.jpg', 'Jodie Foster, Sterling K. Brown, Sofia Boutella, Jeff Goldblum ,Brian Tyree Henry, Jenny Slate', 'Hotel Artemis là một bộ phim hành động tội phạm, lấy bối cảnh gỉa tưởng Los Angeles trong tương lai gần, kể về những sự kiện kinh hoàng và đẫm máu xảy ra tại bệnh viện dành riêng cho tội phạm dưới vỏ bọc của khách sạn cũ kĩ có tên Artemis.', '2', 'Drew Pearce', '94 Phút', '0000-00-00', 'Mỹ', '', 12, 'https://www.youtube.com/watch?v=JqfuKsoEEms'),
(8, 'Gia Đình Siêu Nhân 2', 'Gia Đình Siêu Nhân 2.jpg', 'Craig T. Nelson, Holly Hunter,Sarah Vowell, Huck Milner, Catherine Keener, Eli Fucile', 'Gia Đình Siêu Nhân 2 đánh dấu những chuyến phiêu lưu anh hùng đầy hấp dẫn với sự đổi vai đầy táo bạo. Lần này, mẹ dẻo Helen (Elastigirl) sẽ đi thực chiến giải cứu thế giới trong khi bố khỏe Bob (Mr. Incredible) lùi về hậu phương trông nom những đứa con siêu nhân láu lỉnh gồm: con gái Violet ( siêu năng lực tàng hình và tạo ra từ trường làm chắn bảo vệ), con trai Dash (chạy siêu nhanh) và cậu út Jack-Jack với sức mạnh chưa được khám phá. Một ác nhân bí ẩn xuất hiện với một âm mưu đáng sợ khiến cho gia đình siêu nhân phải “tái xuất giang hồ”. Liệu gia đình siêu nhân sẽ vượt qua khó khăn này như thế nào?', '5', 'Brad Bird', '118 Phút', '0000-00-00', 'Hàn Quốc', 'tình yêu trong sáng, falling for innocence, falling in love with soon jung', 3, 'https://www.youtube.com/watch?v=owZ9Nb9noUs'),
(9, 'Ngày Không Còn Mẹ', 'Ngày không còn mẹ.jpg', 'Ko Du-Shim, Kim Sung-Kyu, Yoo-Sun, Park Chul-Min, Kim Hee-Jung, Shin Se-Kyung', 'In-gyu là một đứa trẻ lên 7 “mắc kẹt” trong hình hài một người đàn ông xấp xỉ 30. Mẹ của anh ấy – Ae-soon, dành trọn 30 năm cuộc đời để chăm sóc cho con trai mình, việc đó đã khiến cho Ae-soon trở thành một bà mẹ già luôn cằn nhằn và cực kì khó tính.Một ngày kia, bà Ae-soon nhận ra rằng thời gian bên cạnh đứa con trai khù khờ của mình đang dần kết thúc. Ý nghĩ phải rời bỏ In-gyu khiến cho bà chất chồng những lo lắng. Để chuẩn bị cho một tương lai hoàn toàn mới cho con trai mình, bà Ae-soon bắt đầu lên danh sách các việc cần làm – những điều vô cùng bình thường song lại hoàn toàn lạ lẫm và khó khăn đối với một người chậm phát triển như In-gyu. Hành trình trưởng thành muộn của In-gyu cùng sự hướng dẫn tận tâm của người mẹ già sẽ mang tới không ít tiếng cười và cả những giọt nước mắt dành cho khán giả trong những ngày cuối năm 2017.', '3', 'Cho Young-Jun', '114 Phút', '0000-00-00', 'Hàn Quốc', ' got to believe, hãy tin em thêm lần nữa', 5, 'https://www.youtube.com/watch?v=yN_TgbKs58w'),
(49, 'Bố Tớ Là Chân To ', 'Bố Tớ Là Chân To.jpg', 'Cinda Adams, Joey Camen, Pappy Faulkner, Christopher L. Parson, Bob Barlen, Cal Brunker', ' Câu chuyện bắt đầu khi cậu bé Adam quyết tâm tìm kiếm người cha mất tích đã lâu của mình, để rồi phát hiện ra ông ấy là một Bigfoot - người rừng Chân To trong huyền thoai. Ông đã ẩn náu trong rừng trong nhiều năm để bảo vệ chính mình và gia đình khỏi sự săn lùng của Tập đoàn Tóc Tai. – những kẻ tham lam đang âm mưu bắt Bigfoot về để làm thí nghiệm.Cuộc hội ngộ của hai cha con đã giải đáp rất nhiều bí ẩn, nhất là khi Adam khám phá ra cậu cũng được thừa hưởng những năng lực siêu nhiên từ cha mình. Nhưng ngày vui chẳng được bao lâu, Adam không ngờ Tập đoàn Tóc Tai đã lần theo dấu vết của mình để tìm ra cha cậu. Liệu hai cha con sẽ làm gì để thoát khỏi vòng vây của bọn chúng?\n', '5', 'Ben Stassen, Jeremy Degruson', '92 Phút', '0000-00-00', 'Mỹ', '', 0, ''),
(10, 'Công Viên Khủng Long 2', 'Công Viên Khủng Long.jpg', 'Chris Pratt, Bryce Dallas Howard, Rafe Spall, Justice Smith, Daniella Pineda, James Cromwell', ' 4 năm sau thảm họa Công Viên kỷ Jura bị phá hủy bởi những con khủng long. Một vài con khủng long vẫn còn sống sót trong rừng trong khi Isla Nublar bị con người bỏ hoang. Owen (Chris Pratt) và Claire (Bryce Dallas Howard) đã tiến hành chiến dịch giải cứu những con khủng long còn sống sót khỏi sự tuyệt chủng khi ngọn núi lửa tại khu vực này bắt đầu hoạt động trở lại. Họ vô tình khám phá ra một âm mưu có thể khiến toàn bộ hành tinh đối mặt với một hiểm họa to lớn chưa từng thấy kể từ thời tiền sử.', '12', 'J.a. Bayona', '128 Phút', '0000-00-00', 'Hàn Quốc', 'dont be swayed, xin đừng xa anh', 4, 'https://www.youtube.com/watch?v=7xwY4TpTV1M'),
(29, 'Tây Du Ký 3 : Nữ Nhi Quốc', 'Nữ Nhi Quốc.jpg', 'Triệu Lệ Dĩnh, Phùng Thiệu Phong, Quách Phú Thành, Gigi Leung, Lâm Chí Linh, Lưu Đào', 'Bốn thầy trò Tam Tạng (Phùng Thiệu Phong), Tôn Ngộ Không (Quách Phú Thành), Trư Bát Giới (Tiểu Thẩm Dương) và Sa Tăng (La Trọng Khiêm) du ngoạn cảnh sắc đồng thời vượt ải mỹ nhân tại Nữ Nhi Quốc của Nữ Vương (Triệu Lệ Dĩnh). Với kinh phí sản xuất lên tới hơn 1,500 tỷ VNĐ, phim hứa hẹn sẽ đem tới cho khán giả một bữa tiệc giải trí đầu xuân mãn nhãn và đầy ý nghĩa.', '4', 'Trịnh Bảo Thụy', '114 phút', '0000-00-00', 'Trung Quốc', 'tony jaa, vo thuat', 11, 'https://www.youtube.com/watch?v=-dRwM2SECIg'),
(51, 'Người Nhện Xa Nhà ', 'Người nhện xa nhà.jpg', 'Zendaya, Tom Holland, Marisa Tomei, Jake Gyllenhaal, Michael Keaton, Jacob Batalon', ' Nhóc nhện Tom Holland vừa hé lộ tên phần tiếp theo của loạt phim Người Nhện sẽ là \"Spider-Man: Far From Home\", tạm hiểu là \"Người Nhện: Xa Nhà\". Trước đó thì giám đốc Marvel Studios Kevin Feige đã tiết lộ rằng một trong những điểm đến của người nhện chính là thủ đô Luân Đôn của đảo quốc sương mù.', '4', 'Jon Watts', '120 Phút', '0000-00-00', 'Mỹ', '', 0, ''),
(43, 'Biệt Đội Siêu Anh Hùng', 'Biệt Đội Siêu Anh Hùng.jpg', 'Robert Downey Jr., Chris Hemsworth, Mark Ruffalo, Chris Evans, Scarlett Johansson, Don Cheadle', ' Sau chuyến hành trình độc nhất vô nhị không ngừng mở rộng và phát triển vụ trũ điện ảnh Marvel, bộ phim Avengers: Cuộc Chiến Vô Cực sẽ mang đến màn ảnh trận chiến cuối cùng khốc liệt nhất mọi thời đại. Biệt đội Avengers và các đồng minh siêu anh hùng của họ phải chấp nhận hy sinh tất cả để có thể chống lại kẻ thù hùng mạnh Thanos trước tham vọng hủy diệt toàn bộ vũ trụ của hắn.', '4', 'Anthony Russo, Joe Russo', '150 Phút', '2015-05-01', 'Mỹ - Châu Âu', 'băng cướp tốc độ, Fast, Fast & Furious, Furious, Jason Statham, Paul Walker, Quá nhanh quá nguy hiểm, Tốc độ và sự liều lĩnh, Vin Diesel', 24, ' https://www.youtube.com/watch?v=O4XbKp6kN2k'),
(50, 'Dị Nhân LEGION 2', 'Dị Nhân 2.jpg', 'Dan Stevens, Rachel Keller, Amber Midthunder, Aubrey Plaza, Bill Irwin, Jeremie Harris', 'Legion tên thật là David Haller, con trai của giáo sư X - Charles Xavier. David bị đa nhân cách nặng và cứ mỗi nhân cách lại có một sức mạnh khác nhau. Bom tấn truyền hình của Marvel này có sự tham gia của tài tử Dan Stevens và nằm dưới sự chỉ đạo của Noah Hawley - người đã đoạt giải Emmy với siêu phẩm Fargo.', '4', 'Noah Hawley ', '132 Phút', '0000-00-00', 'Mỹ', '', 0, ''),
(42, 'Tam Sinh Tam Thế : Thập Lý Đào Hoa', 'Tam Sinh tam thế.jpg', 'Lưu Diệc Phi, Dương Dương', 'Tam Sinh Tam Thế: Thập Lý Đào Hoa kể về chuyện tình cảm động giữa Thượng thần Bạch Thiển (Lưu Diệc Phi) và Thái tử Cửu Trùng Thiên Dạ Hoa (Dương Dương). Là con gái duy nhất của Bạch Đế Hồ Quân, Bạch Thiển từ nhỏ đã cải nam trang bái sư học nghệ, trải qua vô vàn kiếp nạn mới có thể trở thành Thượng thần. Trong suốt ba kiếp người đầy rẫy sóng gió, khó khăn ấy luôn tồn tại hình bóng của Dạ Hoa, người sẵn sàng trở thành đôi mắt, là tất cả của Bạch Thiển. Thế nhưng giữa muôn trùng gian kế, trắc trở, liệu vị hôn phu kém mình chín vạn tuổi của Bạch Thiển có thể cùng nàng giữ vẹn nguyên lời thề nguyện bên nhau ba đời ba kiếp.', '3', '  Trịnh Tiểu Đinh, Anthony Lamolinara', '106 Phút', '0000-00-00', 'Trung Quốc', 'đại gia chân đất 2015, hài đại gia chân đất 2015', 32, 'https://www.youtube.com/watch?v=3VRzXD4XIdw'),
(46, 'Khách Sạn Huyền Bí ', 'Khách Sạn Huyền Bí.jpg', 'Adam Sandler, Andy Samberg, Selena Gomez, Kevin James, Fran Drescher, Steve Buscemi', 'Đã quá ngán với cường độ làm việc chăm chỉ 365 ngày không nghỉ, bá tước Dracula quyết định “đình công”. Để khai sáng cho người cha trăm tuổi chưa bao giờ bước ra khỏi “lũy tre làng”, vợ chồng nhà Jonathan – Mavis lập ra kế hoạch xả hơi táo bạo: Thuê đứt một em du thuyền hạng sang để đưa tất cả bộ xậu quái vật già trẻ lớn bé làm một chuyến ra khơi nhớ đời. Đồ ăn sang chảnh, bãi biển tuyệt đẹp, giải trí đỉnh cao và cả tam giác quỷ Bermuda?', '5', 'Genndy Tartakovsky', '97 Phút', '0000-00-00', 'Mỹ ', '', 0, 'https://www.youtube.com/watch?v=FVszaHw2H9I'),
(47, 'abc', '0MbcwC_simg_b5529c_250x250_maxb.jpg', 'abc', 'abc', '2', 'abc', '190 Phút', '0000-00-00', 'anh', '', 7, 'https://www.youtube.com/embed/ZBQF006ClTo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `phim` int(11) NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `phim`, `anh`) VALUES
(12, 1, 'Đồng hồ ma thuật.jpg'),
(13, 2, 'quai-vat-venom.jpg'),
(14, 8, 'Gia Đình siêu nhân.jpg'),
(15, 48, 'Đại sư huynh.jpg'),
(16, 3, 'charming-hoang-tu-hao-hoa.jpg'),
(17, 6, 'Khách sạn tội phạm.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tapphim`
--

CREATE TABLE `tapphim` (
  `id` int(11) NOT NULL,
  `tentap` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phim` int(11) NOT NULL,
  `linkphim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tapphim`
--

INSERT INTO `tapphim` (`id`, `tentap`, `phim`, `linkphim`) VALUES
(3, 'Full', 3, 'http://www.w3schools.com/tags/movie.mp4'),
(4, 'Full', 4, 'http://www.w3schools.com/tags/movie.mp4'),
(5, 'Tập 1', 1, 'files-phim/kiem-rong.mp4'),
(6, 'Tập 2', 1, 'files-phim/Charlie Puth & Selena Gomez - We Don\'t Talk Anymore [Official Live Performance].mp4'),
(7, 'tap 3', 47, 'files-phim/Charlie Puth & Selena Gomez - We Don\'t Talk Anymore [Official Live Performance].mp4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `theloai` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `theloai`) VALUES
(1, 'Phim Tâm Lý '),
(2, 'Phim Hành Động'),
(3, 'Phim Tình Cảm'),
(4, 'Phim Viễn Tưởng '),
(5, 'Phim Hoạt Hình'),
(12, 'Phim Kinh Dị ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `hoten` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan` text NOT NULL,
  `matkhau` text NOT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text NOT NULL,
  `sdt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `hoten`, `taikhoan`, `matkhau`, `diachi`, `email`, `sdt`) VALUES
(6, 'dfsf', 'admin1', 'admin', 'fdgde', 'kgjtrt@gmail.com', '536456'),
(7, 'Ha thi tram', 'trambeng', '123456', 'Dai hoc ky thuat hau can cand', 'haduylong1996@gmail.com', '01652924519');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useraccess`
--

CREATE TABLE `useraccess` (
  `total_access` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `useraccess`
--

INSERT INTO `useraccess` (`total_access`) VALUES
(192);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useronline`
--

CREATE TABLE `useronline` (
  `tgtmp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL,
  `local` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `useronline`
--

INSERT INTO `useronline` (`tgtmp`, `ip`, `local`) VALUES
(1540801624, '::1', 'index.php');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tapphim`
--
ALTER TABLE `tapphim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `useronline`
--
ALTER TABLE `useronline`
  ADD PRIMARY KEY (`ip`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gopy`
--
ALTER TABLE `gopy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tapphim`
--
ALTER TABLE `tapphim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
