-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 10:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `user_id` int(11) NOT NULL,
  `document_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`user_id`, `document_name`) VALUES
(33, 'photo_2018-11-14_06-40-59.jpg'),
(33, 'photo_2018-11-14_06-41-25.jpg'),
(33, 'photo_2018-11-14_06-42-00.jpg'),
(33, 'photo_2018-11-14_06-43-54.jpg'),
(33, 'photo_2018-11-14_06-54-40.jpg'),
(33, 'photo_2018-09-19_06-34-41.jpg'),
(33, 'photo_2019-04-20_23-47-29.jpg'),
(34, 'wallpaper.jpg'),
(34, 'photo_2019-06-01_17-16-36.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(10) NOT NULL,
  `first_name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `father_name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `grand_father_name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_persian_ci NOT NULL DEFAULT 'male',
  `reason` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `event_type` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `place` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `date` date NOT NULL,
  `wakil` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `p_province` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `p_district` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `p_village` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `t_province` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `t_nahiya` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `t_gozar` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `related_employee_name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `related_employee_number` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `result` varchar(256) COLLATE utf8mb4_persian_ci NOT NULL,
  `person_image_name` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `ssn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `first_name`, `father_name`, `grand_father_name`, `gender`, `reason`, `event_type`, `place`, `date`, `wakil`, `p_province`, `p_district`, `p_village`, `t_province`, `t_nahiya`, `t_gozar`, `related_employee_name`, `related_employee_number`, `result`, `person_image_name`, `ssn`) VALUES
(12, 'Ahmad', 'a', 'Ali', 'male', 'The first Rule', 'Trafic Accedint', 'Herat', '1398-08-06', 'Asif', 'Qandahar', 'Ghoriyan', 'Gozara', 'Herat', 'Awal', 'Gholam Ha', 'Abbas', '23423423422', 'Nothing', '1572715535.PNG', 23432424),
(13, 'جلیل', 'ضیایی', 'محمدعلی', 'male', 'ماده دوم قانون اساسی', 'حادثه ترافیکی', 'دولتخانه', '1398-08-13', 'علی', 'هرات', 'غوریان', 'جوی انجیل', 'قندهار', 'اول', 'حضرت ها', 'اشرف', '۰۷۷۸۸۳۳۱۹۴', 'کشته شدن سه نفر', '1572715831.jpg', 1213213123),
(16, 'امید', 'ضیایی', 'ضیایی', 'male', 'به اساس قانون اساسی', 'حمله تروریستی', 'ارگ', '1398-08-13', 'بسم الله', 'غزنی', 'جاغوری', 'تبرغنک', 'هرات', 'اول', 'دولتخانه', 'هادی', '۰۲۳۲۳۴۳۲۴۲', 'کشته شدن گلبدین حکمتیار', '1572790681.JPG', 12312321),
(17, 'Ahmad', 'Ahmadi', 'Ali', 'male', 'ماده دوم قانون اساسی', 'Trafic Accedint', 'دولتخانه', '1398-08-02', 'Asif', 'fsdfad', 'Ghoriyan', 'Gozara', 'Herat', 'Awal', 'fasdf', 'Abbas', '23423423422', 'کشته شدن سه نفر', '1572861527.jpg', 123123),
(18, 'اشرف', 'Ahmadi', 'Ali', 'male', 'The first Rule', 'حمله تروریستی', 'دولتخانه', '1398-08-08', 'fdsf', 'هرات', 'غوریان', 'Gozara', 'adfsaf', 'Awal', 'Gholam Ha', 'fdsaf', '23423423422', 'fasdfa', '1572873258.jpg', 23423434),
(19, 'اشرف', 'Ahmadi', 'Ali', 'male', 'The first Rule', 'حمله تروریستی', 'دولتخانه', '1398-08-08', 'fdsf', 'هرات', 'غوریان', 'Gozara', 'adfsaf', 'Awal', 'Gholam Ha', 'fdsaf', '23423423422', 'fasdfa', '1572873259.jpg', 23423434),
(27, 'احسان', 'محمد شاه', 'هاشم', 'male', 'به اساس قانون اساسی', 'حمله تروریستی', 'دولتخانه', '1398-08-02', 'بسم الله', 'غزنی', 'مالستان', 'تبرغنک', 'هرات', 'اول', 'دولتخانه', 'جاوید', '۰۲۳۲۳۴۳۲۴۲', 'زخمی شدن یک نفر', '1572887116.jpg', 23423434),
(29, 'Ahmad', 'محمد شاه', 'هاشم', 'male', 'ماده دوم قانون اساسی', 'حمله تروریستی', 'دولتخانه', '1398-08-05', 'رحمت', 'غزنی', 'مالستان', 'تبرغنک', 'هرات', 'Awal', 'مردم', 'هادی', '23423423422', 'کشته شدن گلبدین حکمتیار', '1572938997.jpg', 23423434),
(30, 'احسان', 'محمد شاه', 'هاشم', 'male', 'ماده دوم قانون اساسی', 'حمله تروریستی', 'خیرو', '1398-08-14', 'رحمت', 'غزنی', 'جاغوری', 'جوی انجیل', 'قندهار', 'اول', 'مردم', 'Abbas', '23423423422', 'زخمی شدن یک نفر', '1572973510.jpg', 23423434),
(33, 'Ahmad', 'Mahmood', 'Mohammad', 'male', 'The first Rule', 'lkfjaf', 'afsdasf', '1398-08-01', 'fdsafsa', 'fsdfad', 'Ghoriyan', 'Gozara', 'Herat', 'Awal', 'Gholam Ha', 'Abbas', '23424323423', 'Nothing', '1573222292.jpg', 2234324),
(34, 'omid', 'ضیایی', 'Ali', 'male', 'ماده دوم قانون اساسی', 'حادثه ترافیکی', 'ارگ', '1398-08-02', 'علی', 'غزنی', 'مالستان', 'جوی انجیل', 'هرات', 'اول', 'مردم', 'هادی', '23424323423', 'زخمی شدن یک نفر', '1573449993.png', 23423434);

-- --------------------------------------------------------

--
-- Table structure for table `privilage`
--

CREATE TABLE `privilage` (
  `user_id` int(10) NOT NULL,
  `read_person` tinyint(1) NOT NULL DEFAULT 1,
  `write_person` tinyint(1) NOT NULL DEFAULT 0,
  `delete_person` tinyint(1) NOT NULL DEFAULT 0,
  `add_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privilage`
--

INSERT INTO `privilage` (`user_id`, `read_person`, `write_person`, `delete_person`, `add_admin`) VALUES
(17, 1, 1, 1, 1),
(18, 1, 1, 1, 1),
(35, 1, 1, 1, 1),
(36, 1, 1, 1, 1),
(39, 1, 1, 1, 1),
(40, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recover`
--

CREATE TABLE `recover` (
  `user_id` int(11) NOT NULL,
  `pin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `name` varchar(256) NOT NULL,
  `value` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_persian_ci NOT NULL,
  `level` tinyint(1) NOT NULL,
  `image_name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `level`, `image_name`) VALUES
(17, 'رحمت', 'یوسفی', 'rahmat', '88360dfa8826c449351cc7ef079aca1d', 1, '1545466015'),
(18, 'Admin', 'Super', 'admin', '163e803ac8f4898a1940658dce544d52', 1, '1546758164'),
(35, 'sayed ashraf', 'Arefi', 'sayed ashraf', '$2y$10$yVseWuliYgnt5KIsQprqCOzxXiPhms3/sQWSnXzewKtDz18CpLCPS', 1, '1573750653.jpg'),
(36, 'omid', 'ziaee', 'omid', '$2y$10$6STr32bvNIXzMaSjA30njeizOWdYMC.dkOTgzP0kUEk.dKsm0qjYm', 1, '1573119020.jpg'),
(39, 'Ali', '<script>alert(\'Arefi\')</script>', 'ali', '$2y$10$bljm3J.7aKgdO6sgfYfuC.7uNmRfbGuDouaCn5MMEhEWZNr9d8RIq', 1, '1573875587.jpg'),
(40, 'Sayed Ashraf', 'Arefi', 'ashraf', '$2y$10$AaQMxRyCRypMQFvqxJQ/GOGxzSwEjuF6vJ9K7LIdJKuNsDu/O.Agq', 1, '1573997135.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilage`
--
ALTER TABLE `privilage`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recover`
--
ALTER TABLE `recover`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privilage`
--
ALTER TABLE `privilage`
  ADD CONSTRAINT `privilage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recover`
--
ALTER TABLE `recover`
  ADD CONSTRAINT `recover_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
