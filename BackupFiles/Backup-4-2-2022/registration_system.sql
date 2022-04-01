-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 11:15 PM
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
(6, 'กฟหดฟหกดฟหด', '2022-03-15', '<p>ฟหกดฟกหดกฟหดฟหก</p>\r\n', '/ProjectPsu/Employee/AnnouncePictures/74cf34b7d3c7151c5e57c93e76cb8158.png');

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
('2', '1909802413461', 'สร้อยคอ', '5000', '300', '2022-03-01', '2022-06-01', '', '2022-04-02', 1);

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
('สร้อยคอ', '100', '5000', '1909802413461', '2022-04-01', '2022-07-01', 'จำนำ', '', '2022-04-01 16:24:56', '', '0', '0', 1, ''),
('สร้อยคอ', '1000', '5000', '1909802413461', '2022-02-22', '2022-03-01', 'จำนำ', '', '2022-04-01 20:50:29', '0', '300', '300', 2, '/ProjectPsu/Employee/PawnformPicture/e43fb1921f3822207cc4c2945e3ed9bb.jpg'),
('สร้อยคอ', '200', '15000', '1909802413461', '2022-04-02', '2022-07-02', 'จำนำ', 'สร้อยคอนี้ มีตำหนิตรงจุดจุดจุดจุดจุดจุดจุดจุด', '2022-04-01 21:07:58', '0', '0', '0', 3, '/ProjectPsu/Employee/PawnformPicture/428e1edb42ecb18e86fcd7990c55be5e.jpg'),
('แหวน', '10', '3000', '1909802413461', '2022-04-02', '2022-07-02', 'จำนำ', '', '2022-04-01 17:10:10', '0', '0', '0', 4, '/ProjectPsu/Employee/PawnformPicture/fdc1074dfa5d1ec06d30a0accb6d73fc.jpg'),
('แหวน', '18', '5000', '1909802413461', '2022-04-02', '2022-09-02', 'จำนำ', '', '2022-04-01 17:13:04', '0', '0', '0', 5, '/ProjectPsu/Employee/PawnformPicture/07f9d66d68798fc434c044d43f303baa.jpg'),
('สร้อยคอ', '18', '5000', '1909802413461', '2022-04-02', '2022-08-02', 'จำนำ', '', '2022-04-01 17:13:50', '0', '0', '0', 6, '/ProjectPsu/Employee/PawnformPicture/60db3f6537012c0c2ca5fe75c44bff64.jpg'),
('แหวน', '18', '2000', '1909802413461', '2022-04-02', '2022-07-02', 'จำนำ', '', '2022-04-01 17:16:17', '0', '0', '0', 7, '/ProjectPsu/Employee/PawnformPicture/e76848262f19c9c64f59dacbdb000f9a.jpg'),
('สร้อยข้อมือ', '10', '10000', '1909802413461', '2022-04-02', '2022-08-02', 'จำนำ', '', '2022-04-01 17:20:14', '0', '0', '0', 8, '/ProjectPsu/Employee/PawnformPicture/9b4c53803db66d5b2b790f107909f691.jpg'),
('สร้อยข้อมือ', '18', '5000', '1909802413461', '2022-04-02', '2022-07-02', 'ไถ่ถอนแล้ว', '', '2022-04-01 18:18:45', '5000', '0', '0', 9, '/ProjectPsu/Employee/PawnformPicture/5faeca758efc7356ca81551d37693412.jpg'),
('สร้อยข้อมือ', '18', '5000', '1909802413461', '2022-04-02', '2022-07-02', 'จำนำ', '', '2022-04-01 17:25:58', '0', '0', '0', 11, '/ProjectPsu/Employee/PawnformPicture/79e77fabba9b9b2ce4a95050674a7f4b.jpg'),
('สร้อยคอ', '9', '4000', '1909802413461', '2022-04-02', '2022-08-02', 'จำนำ', '', '2022-04-01 17:27:16', '0', '0', '0', 13, '/ProjectPsu/Employee/PawnformPicture/0652f049b8dbbd43ffd9cde4f459c6d6.jpg'),
('สร้อยคอ', '6', '3000', '1909802413461', '2022-04-02', '2022-06-02', 'จำนำ', '', '2022-04-01 17:28:13', '0', '0', '0', 15, '/ProjectPsu/Employee/PawnformPicture/c7c8647308cc1a07ff304449e1383b9c.jpg'),
('สร้อยคอ', '10', '5000', '1909802413461', '2022-04-02', '2022-07-02', 'จำนำ', '', '2022-04-01 17:40:40', '0', '0', '0', 17, '/ProjectPsu/Employee/PawnformPicture/a2557444a3ee40c4ad6088fa4c685406.jpg'),
('สร้อยข้อมือ', '7', '15000', '1909802413461', '2022-04-02', '2022-07-02', 'จำนำ', '', '2022-04-01 17:41:31', '0', '0', '0', 18, '/ProjectPsu/Employee/PawnformPicture/46090e6988701f2a2b2dd0b39d820f94.jpg');

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
(2, 'Black Friday', '2022-03-26', '<p>โปรโมชั่นลดราคา Black Friday!!!!</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/92aa118da5e720bc981f9e8d2fe638d8.png'),
(3, 'โปรโมชั่นตอนรับเปิดเทอม', '2022-03-26', '<p>นำทองมาจำนำในช่วงเวลาโปรโมชั่นนี้ เพิ่มเงินศุงสุด10%!!!!</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/b87109e857d3ce31115ef6f54746079c.png'),
(4, 'ฉลองครบ50ปีห้างทองแสงสุวรรณ', '2022-03-26', '<p>.</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/fa8869ca7783433f3d4cab9f9a6ccae5.png'),
(5, 'Promotion 11.11', '2022-03-26', '<p>.</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/106665d0a000f6d0259499d7041a1e4d.png'),
(6, 'โปรโมชั่นลูกค้าใหม่', '2022-03-26', '<p>.</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/bdc53c73940941f9cef87baf1f3b8cc5.png'),
(7, 'โปรโมชั่นปีเสือ!!!!', '2022-03-26', '<p>.</p>\r\n', '/ProjectPsu/Employee/PromotionPictures/85b9da181a1d447c9a46cd7c692c4dd9.png');

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
  `rt_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returnpawn`
--

INSERT INTO `returnpawn` (`idcard`, `pf_type`, `pf_price`, `pf_netprice`, `rt_date`, `id`, `rt_id`) VALUES
('1909802413461', 'สร้อยข้อมือ', '5000', '5000', '2022-04-02', '9', NULL);

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
(1, 'sahasawad', 'chaiyajit', 'admin@gmail.com', '$2y$10$a4qwip6lc1gaMYZ8WEfgueASOkg5whskeGQjmOlgYcrU32Gf8J3pW', 'admin', '2022-01-06 15:33:01'),
(2, 'Admin', 'Pekhun', 'admin', '$2y$10$a4qwip6lc1gaMYZ8WEfgueASOkg5whskeGQjmOlgYcrU32Gf8J3pW', 'superadmin', '2022-01-06 15:33:01'),
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
(6, 'นาย', 'arm', 'zakung', 'armzakung@gmail.com', '0914616894', '536', '1909802413463', '2022-01-19', '$2y$10$g5bIFnfMFDu4kIpytHSocu0Zzojfc0zfh1RtIMc5YhGjuYJmccQJy', 'user', '2022-01-30', '123456', ''),
(7, 'นาย', 'ศิวกร', 'วงศ์ชัยครี', 'pekhun@gmail.com', '0914616555', '100', '1909802413465', '2022-02-09', '$2y$10$8PVj7GCgE8csRlmOgH/PO.esVPuT70LUK21yd9LDqdRCAHE19f5FK', 'user', '2022-02-01', '123456', ''),
(8, 'นาย', 'ธนวิชญ์', 'ศรีสุริยะ', 'kao@gmail.com', '0918469999', '638 คอนโด', '1909802413451', '1999-02-02', '$2y$10$8p8epeCwHS1W6vd3K/bAd.v8mVuwCH23ma5LRZA57OvzuKpQLhMyW', 'user', '2022-02-02', '123456', ''),
(9, 'นาย', 'ภูมี', 'อินทะ', 'champ@gmail.com', '0918469963', '230', '1909802413466', '1999-06-30', '$2y$10$AnaVmBxHSKC/KSyKBZ.W2ei//WzbcmXYT5YfFd19Hff4IRRNjjGS6', 'user', '2022-02-02', '123456', ''),
(10, 'นาย', 'ภูมี', 'อินทะ', 'pchamp@gmail.com', '0918469523', '521', '1909802413466', '1999-10-21', '$2y$10$dYQAnM7u09sPvyt4ASqC0u./RvTB2fvp4K0dQpSSnXrWwZ/klU84a', 'user', '2022-02-02', '123456', ''),
(14, 'นาง', 'อิอิ', 'อุอุ', 'eiei@gmail.com', '1234567890', '123', '1234567891234', '2022-03-02', '$2y$10$nJxnLZ334RYh7Q8ztnCXSOMAvBtOJAeF.Nb5p0pHo/M8tfXHbw1mq', 'user', '2022-03-09', '27319860', ''),
(17, 'นาย', 'สมพงศ์', 'อินทะ', 'som@gmail.com', '1234567899', '321', '4321987654321', '2022-03-09', '$2y$10$qqQT/OA051EvAJ4MZseM8OkA04pq9oo9XuOl8GMZ9uxP6.YIHXKN.', 'user', '2022-03-09', '46392708', ''),
(18, 'นาย', 'สหัสวรรษ', 'ชัยยะจิตร', 'userarm@gmail.com', '0918469329', '536                                                                                                                                                                                                                                                            ', '1909802413469', '2022-03-11', '$2y$10$M/mQdGkMbABKKKUhU8Z95eg4VpgDcvmpe35nZQPFiHgI5RKFplK6W', 'user', '2022-03-10', '123456', '/ProjectPsu/GoldPawnProject/customer/img/');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `continueint`
--
ALTER TABLE `continueint`
  MODIFY `con_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incprincipal`
--
ALTER TABLE `incprincipal`
  MODIFY `Inc_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pawnform`
--
ALTER TABLE `pawnform`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `principalpay`
--
ALTER TABLE `principalpay`
  MODIFY `ppay_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
