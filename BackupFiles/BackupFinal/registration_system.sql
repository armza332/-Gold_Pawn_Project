-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 07:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `doc` date NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`id`, `header`, `doc`, `content`, `picture`) VALUES
(7, 'ครบรอบ50ปี ห้างทองแสงสุวรรณ', '2022-04-05', '<p>เนื่องจากตอนนี้ห้างทองแสงสุวรรณได้ครบรอบ 50 ปี&nbsp;ของทางร้าน จะมีการแจกโปรโมชั่นดีๆ ให้กับผู้จำนำทุกคน</p>\r\n', '/ProjectPsu/Employee/AnnouncePictures/fa9431e6336448cb9b14a0dec61a9377.png'),
(8, 'ข่าวประชาสัมพันธ์', '2022-05-03', '<p>ปี้ปิดร้าน</p>\r\n', '/ProjectPsu/Employee/AnnouncePictures/8c4b6799c7847ef81acb968c42b05bcc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `continueint`
--

CREATE TABLE `continueint` (
  `id` varchar(255) NOT NULL,
  `idcard` varchar(255) NOT NULL,
  `pf_type` varchar(255) NOT NULL,
  `pf_price` varchar(255) NOT NULL,
  `con_interestpaid` varchar(255) NOT NULL,
  `old_expdate` date NOT NULL,
  `new_expdate` date NOT NULL,
  `comment` varchar(255) NOT NULL,
  `con_createat` date NOT NULL DEFAULT current_timestamp(),
  `con_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `continueint`
--

INSERT INTO `continueint` (`id`, `idcard`, `pf_type`, `pf_price`, `con_interestpaid`, `old_expdate`, `new_expdate`, `comment`, `con_createat`, `con_id`) VALUES
('31', '1909802413461', 'ล็อกเก็ต', '8000', '60', '2022-05-05', '2022-05-05', '', '2022-04-05', 5);

-- --------------------------------------------------------

--
-- Table structure for table `incprincipal`
--

CREATE TABLE `incprincipal` (
  `id` varchar(255) NOT NULL,
  `idcard` varchar(255) NOT NULL,
  `pf_type` varchar(255) NOT NULL,
  `inc_interestpaid` varchar(255) NOT NULL,
  `newinc` varchar(255) NOT NULL,
  `inc_expdate` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `inc_createat` date NOT NULL DEFAULT current_timestamp(),
  `oldpf_creatat` varchar(255) NOT NULL,
  `Inc_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pawnform`
--

CREATE TABLE `pawnform` (
  `pf_type` varchar(255) NOT NULL,
  `pf_weight` varchar(255) NOT NULL,
  `pf_price` varchar(100) NOT NULL,
  `idcard` varchar(20) NOT NULL,
  `pf_create_at` date NOT NULL DEFAULT current_timestamp(),
  `pf_expdate` date NOT NULL,
  `pf_status` varchar(255) NOT NULL,
  `pf_des` varchar(255) NOT NULL,
  `currenttime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pf_netprice` varchar(255) NOT NULL,
  `pf_interestpaid` varchar(255) NOT NULL,
  `current_interestpaid` varchar(255) NOT NULL,
  `id` int(20) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pawnform`
--

INSERT INTO `pawnform` (`pf_type`, `pf_weight`, `pf_price`, `idcard`, `pf_create_at`, `pf_expdate`, `pf_status`, `pf_des`, `currenttime`, `pf_netprice`, `pf_interestpaid`, `current_interestpaid`, `id`, `picture`) VALUES
('ตุ้มหู', '5', '3000', '1909802413451', '2022-04-04', '2022-06-04', 'จำนำ', 'ตำหนิหนึ่งจุด', '2022-04-04 16:33:51', '0', '0', '0', 26, '/ProjectPsu/Employee/PawnformPicture/8f25a727ded74966b8e9a6e8b363ee70.jpg'),
('ตุ้มหู', '5', '3000', '1909802413451', '2022-04-04', '2022-06-04', 'จำนำ', 'ตำหนิหนึ่งจุด', '2022-04-04 16:34:28', '0', '0', '0', 27, '/ProjectPsu/Employee/PawnformPicture/2f00ae2647c3245d97b3720e109025f5.jpg'),
('สร้อยคอ', '15', '5000', '1909802413461', '2022-04-04', '2022-07-04', 'จำนำ', '', '2022-04-04 16:50:15', '0', '0', '0', 28, '/ProjectPsu/Employee/PawnformPicture/93768edd212c3fa435dc79f4334fcb48.jpg'),
('แหวน', '2', '2500', '1909802413461', '2022-04-04', '2022-06-04', 'ไถ่ถอนแล้ว', 'ตำหนิหนึ่งจุด', '2022-04-04 16:58:14', '2500', '0', '0', 29, '/ProjectPsu/Employee/PawnformPicture/e140f7f329c035508ec0f37603aeff6d.jpg'),
('สร้อยข้อมือ', '8', '4000', '1909802413461', '2022-04-04', '2022-07-04', 'จำนำ', 'ตำหนิสองจุด', '2022-04-04 16:51:31', '0', '0', '0', 30, '/ProjectPsu/Employee/PawnformPicture/6c9451370da28411d84459ada133605e.jpg'),
('ล็อกเก็ต', '40', '8000', '1909802413461', '2021-12-02', '2022-05-05', 'จำนำ', 'มีตำหนิตรงฝา', '2022-04-04 17:03:08', '0', '60', '60', 31, '/ProjectPsu/Employee/PawnformPicture/8cdf64215a4c3e23f130cfa3d2b369db.jpg'),
('ล็อกเก็ต', '18', '8500', '1909802413461', '2022-01-05', '2022-04-03', 'จำนำ', 'มีตำหนิตรงฝา', '2022-04-04 16:59:30', '0', '0', '0', 32, '/ProjectPsu/Employee/PawnformPicture/cec2943aa759b9e57bb8ea95de8d029e.jpg'),
('แหวน', '6', '5000', '1909802413461', '2022-04-04', '2022-08-04', 'จำนำ', 'มีตำหนิ', '2022-04-04 16:54:12', '0', '0', '0', 33, '/ProjectPsu/Employee/PawnformPicture/369b500641f4df3f564eddb86e3de4d9.jpg'),
('ตุ้มหู', '2', '4200', '1909802413461', '2022-02-03', '2022-06-09', 'จำนำ', 'ตำหนิหนึ่งจุด', '2022-04-04 17:02:19', '0', '0', '0', 34, '/ProjectPsu/Employee/PawnformPicture/0df19bf344cd29d16e100e527dc47d6b.jpg'),
('แหวน', '3', '1500', '1909802413461', '2021-12-10', '2022-02-10', 'จำนำ', 'มีตำหนิ', '2022-04-04 17:00:03', '0', '0', '0', 35, '/ProjectPsu/Employee/PawnformPicture/2c89475879127699eed2094da5edee4c.jpg'),
('แหวน', '3', '5000', '1909802413461', '2022-04-04', '2022-07-04', 'จำนำ', 'มีตำหนิ', '2022-04-04 16:56:05', '0', '0', '0', 36, '/ProjectPsu/Employee/PawnformPicture/47d5dd490eab66d6073b4d7caf2e5b6f.jpg'),
('ล็อกเก็ต', '12', '10000', '1909802413461', '2022-04-04', '2022-07-04', 'จำนำ', 'มีตำหนิตรงฝา', '2022-04-04 16:57:16', '0', '0', '0', 37, '/ProjectPsu/Employee/PawnformPicture/9920bb8665f681a2798eec4f8ebfde8d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `principalpay`
--

CREATE TABLE `principalpay` (
  `id` varchar(255) NOT NULL,
  `idcard` varchar(255) NOT NULL,
  `pf_type` varchar(255) NOT NULL,
  `ppay_interestpaid` varchar(255) NOT NULL,
  `ppayprice` varchar(255) NOT NULL,
  `ppay_expdate` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `ppay_createat` date NOT NULL DEFAULT current_timestamp(),
  `oldpf_creatat` varchar(255) NOT NULL,
  `ppay_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `doc` date NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `header`, `doc`, `content`, `picture`) VALUES
(5, 'Promotion 11.11', '2022-03-26', '<p>.</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/106665d0a000f6d0259499d7041a1e4d.png'),
(6, 'โปรโมชั่นลูกค้าใหม่', '2022-03-26', '<p>.</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/bdc53c73940941f9cef87baf1f3b8cc5.png'),
(7, 'โปรโมชั่นปีเสือ!!!!', '2022-03-26', '<p>.</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/85b9da181a1d447c9a46cd7c692c4dd9.png'),
(8, 'Back to school!!!!', '2022-04-04', '<p>ตอนรับเปิดเทอม ด้วยโปรโมชั่นเพิ่มเงินต้นในครั้งแรกที่มาจำนำสูงสุดถึง10%</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/7a7922865bf736faaa1a4cf4fa8c68f0.png'),
(9, 'ครบรอบ50ปี ห้างทองแสงสุวรรณ', '2022-04-03', '<p>โปรโมชั่นลดอัตตราดอกเบี้ย ครั้งแรกเมื่อมาทำการต่อดอกเบี้ย</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/9b1e46e1cf7d2f96f3d7119e26cbd2a7.png'),
(11, 'Black Friday', '2022-04-03', '<p>ลดราคาทอง สูงสุด80%</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/df29e59613f5b4431c30f1d71e44a31c.png');

-- --------------------------------------------------------

--
-- Table structure for table `returnpawn`
--

CREATE TABLE `returnpawn` (
  `idcard` varchar(255) NOT NULL,
  `pf_type` varchar(255) NOT NULL,
  `pf_price` varchar(255) NOT NULL,
  `pf_netprice` varchar(255) NOT NULL,
  `rt_date` date NOT NULL DEFAULT current_timestamp(),
  `id` varchar(10) NOT NULL,
  `rt_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returnpawn`
--

INSERT INTO `returnpawn` (`idcard`, `pf_type`, `pf_price`, `pf_netprice`, `rt_date`, `id`, `rt_id`) VALUES
('1909802413461', 'แหวน', '2500', '2500', '2022-04-04', '29', 7);

-- --------------------------------------------------------

--
-- Table structure for table `usergoldpawn`
--

CREATE TABLE `usergoldpawn` (
  `Cus_ID` int(13) NOT NULL,
  `Cus_Title` varchar(5) NOT NULL,
  `Cus_Fname` varchar(50) NOT NULL,
  `Cus_Lname` varchar(50) NOT NULL,
  `Cus_Email` varchar(50) NOT NULL,
  `Cus_Username` varchar(20) NOT NULL,
  `Cus_Password` varchar(50) NOT NULL,
  `Cus_Pnumber` int(20) NOT NULL,
  `Cus_add` text NOT NULL,
  `Cus_IDCard` varchar(20) NOT NULL,
  `Cus_Bday` varchar(20) NOT NULL,
  `Cus_urole` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usergoldpawn`
--

INSERT INTO `usergoldpawn` (`Cus_ID`, `Cus_Title`, `Cus_Fname`, `Cus_Lname`, `Cus_Email`, `Cus_Username`, `Cus_Password`, `Cus_Pnumber`, `Cus_add`, `Cus_IDCard`, `Cus_Bday`, `Cus_urole`) VALUES
(5, 'MR', 'sahasawad', 'chaiyajit', 'admin@gmail.com', '1909802413461', '$2y$10$bLhk/T5tJY7SqNJdM0jtUuPUbElgzNgnuGfJf0m0c1A', 914616894, '536', '1909802413461', '28121999', 'user'),
(7, 'MR', 'sahasawad', 'chaiyajit', 'arm2@gmail.com', '1909802413461', '$2y$10$atHB2ZyqqUUFHsbyFU2IduJ/iKP8bGBzis37PPN1TSQ', 914616894, '536', '1909802413461', '28121999', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `urole`, `created_at`) VALUES
(1, 'สหัสวรรษ', 'ชัยยะจิตร', 'admin@gmail.com', '$2y$10$a4qwip6lc1gaMYZ8WEfgueASOkg5whskeGQjmOlgYcrU32Gf8J3pW', 'admin', '2022-01-06 15:33:01'),
(2, 'ศิวกร', 'วงศ์ชัยศรี', 'admin', '$2y$10$a4qwip6lc1gaMYZ8WEfgueASOkg5whskeGQjmOlgYcrU32Gf8J3pW', 'superadmin', '2022-01-06 15:33:01'),
(3, 'Tanawich', 'Srisuriya', 'user@gmail.com', '$2y$10$usMZ.fK6/ODhRvgkQNA49.2XPhnNXJ/KO2OYf2oJL6mDacW2TUg2S', 'admin', '2022-01-27 10:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `usersgp`
--

CREATE TABLE `usersgp` (
  `id` int(10) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `idcard` varchar(25) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `gp` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersgp`
--

INSERT INTO `usersgp` (`id`, `title`, `firstname`, `lastname`, `email`, `phonenumber`, `address`, `idcard`, `birthday`, `password`, `urole`, `created_at`, `gp`, `picture`) VALUES
(2, 'นาย', 'สหัสวรรษ', 'ชัยยะจิตร', 'user@gmail.com', '0914616894', '536                                                                                                                                                ', '1909802413461', '2022-01-26', '$2y$10$dO1wfSoDQDYi.A72gTbsZunJMwhJt9dtbVGcGv.xBQoxAWqwMTfCm', 'user', '2022-01-29', '123456', ''),
(7, 'นาย', 'ศิวกร', 'วงศ์ชัยครี', 'pekhun@gmail.com', '0914616555', '100', '1909802413465', '2022-02-09', '$2y$10$8PVj7GCgE8csRlmOgH/PO.esVPuT70LUK21yd9LDqdRCAHE19f5FK', 'user', '2022-02-01', '123456', ''),
(9, 'นาย', 'ภูมี', 'อินทะ', 'champ@gmail.com', '0918469963', '230', '1909802413466', '1999-06-30', '$2y$10$AnaVmBxHSKC/KSyKBZ.W2ei//WzbcmXYT5YfFd19Hff4IRRNjjGS6', 'user', '2022-02-02', '123456', ''),
(10, 'นาย', 'ภูมี', 'อินทะ', 'pchamp@gmail.com', '0918469523', '521', '1909802413466', '1999-10-21', '$2y$10$dYQAnM7u09sPvyt4ASqC0u./RvTB2fvp4K0dQpSSnXrWwZ/klU84a', 'user', '2022-02-02', '123456', ''),
(14, 'นาง', 'อิอิ', 'อุอุ', 'eiei@gmail.com', '1234567890', '123', '1234567891234', '2022-03-02', '$2y$10$nJxnLZ334RYh7Q8ztnCXSOMAvBtOJAeF.Nb5p0pHo/M8tfXHbw1mq', 'user', '2022-03-09', '27319860', ''),
(17, 'นาย', 'สมพงศ์', 'อินทะ', 'som@gmail.com', '1234567899', '321', '4321987654321', '2022-03-09', '$2y$10$qqQT/OA051EvAJ4MZseM8OkA04pq9oo9XuOl8GMZ9uxP6.YIHXKN.', 'user', '2022-03-09', '46392708', ''),
(18, 'นาย', 'สหัสวรรษ', 'ชัยยะจิตร', 'userarm@gmail.com', '0918469329', '536                                                                                                                                                                                                                                                            ', '1909802413460', '2022-03-11', '$2y$10$M/mQdGkMbABKKKUhU8Z95eg4VpgDcvmpe35nZQPFiHgI5RKFplK6W', 'user', '2022-03-10', '123456', '/ProjectPsu/GoldPawnProject/customer/img/'),
(19, 'นาย', 'รังสิมันตุ์', 'คลั่งรักษ์', 'klangrak@gmail.com', '06969696969', 'หอ 11                                                                                                            ', '1909802413469   ', '1999-12-15', '$2y$10$mSuNgoKHIzJLqGQCkFAfj.KrLBK37QeOgX/9at1GZpHuI6s3t9PK6', 'user', '2022-04-03', '123456', ''),
(20, '', 'อาร์ม', 'ซ่าคุง', 'armzakung@gmail.com', '0912345678', '536 หมู่10 ถ.มึงชื่ออะไร ต.ตีมังกรตาย อ.ยิงไอแชมป์ จ.ปี้กระตุก', '1909874563210', '1999-07-30', '', '', '2022-04-04', '', ''),
(21, 'นาย', 'ธนวิชญ์', 'ศรีสุริยะ', 'kao@gmail.com', '0918463214', '638 หมู่ 9 ตำบล คอหงส์                                     ', '1909802413451 ', '1999-12-15', '$2y$10$TYEKdOlw7JH0PON29WZVkOI4R3VXJ2wzzydmvahXfM39XBlR7Sf2a', 'user', '2022-04-04', '123456', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `continueint`
--
ALTER TABLE `continueint`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `incprincipal`
--
ALTER TABLE `incprincipal`
  ADD PRIMARY KEY (`Inc_id`);

--
-- Indexes for table `pawnform`
--
ALTER TABLE `pawnform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principalpay`
--
ALTER TABLE `principalpay`
  ADD PRIMARY KEY (`ppay_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returnpawn`
--
ALTER TABLE `returnpawn`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indexes for table `usergoldpawn`
--
ALTER TABLE `usergoldpawn`
  ADD PRIMARY KEY (`Cus_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersgp`
--
ALTER TABLE `usersgp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `continueint`
--
ALTER TABLE `continueint`
  MODIFY `con_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `incprincipal`
--
ALTER TABLE `incprincipal`
  MODIFY `Inc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pawnform`
--
ALTER TABLE `pawnform`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `principalpay`
--
ALTER TABLE `principalpay`
  MODIFY `ppay_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `returnpawn`
--
ALTER TABLE `returnpawn`
  MODIFY `rt_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usergoldpawn`
--
ALTER TABLE `usergoldpawn`
  MODIFY `Cus_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usersgp`
--
ALTER TABLE `usersgp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
