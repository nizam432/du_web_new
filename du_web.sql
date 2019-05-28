-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 02:58 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `du_department`
--

CREATE TABLE `du_department` (
  `department_id` int(11) NOT NULL,
  `department_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `du_department`
--

INSERT INTO `du_department` (`department_id`, `department_title`, `faculty`, `entry_by`, `entry_date_time`, `update_by`, `update_date_time`, `status`) VALUES
(1, 'Law', 1, 1, '2017-08-16 20:05:29', 1, 2017, 1),
(2, 'English', 2, 1, '2017-08-16 20:05:36', 1, 2017, 1),
(3, 'Business Administration', 2, 1, '2017-08-16 20:05:55', 1, 2017, 1),
(4, 'Environmental Science ', 1, 1, '2017-08-16 20:06:15', 1, 2017, 1),
(5, 'Public Health', 5, 1, '2017-08-16 20:06:26', 1, 2017, 1),
(6, 'Civil Engineering', 6, 1, '2017-08-16 20:06:56', 1, 2017, 1),
(7, 'Social Work', 5, 1, '2017-08-18 11:35:16', 1, 2017, 1),
(8, 'Physics', 1, 1, '2019-05-17 09:59:34', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `du_faculty`
--

CREATE TABLE `du_faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `du_faculty`
--

INSERT INTO `du_faculty` (`faculty_id`, `faculty_title`, `entry_by`, `entry_date_time`, `update_by`, `update_date_time`, `status`) VALUES
(1, 'Science', 1, '2017-08-15 16:15:55', 1, '2017-08-15 18:20:56', 1),
(2, 'Business studies', 1, '2017-08-15 16:17:53', 1, '2017-08-15 18:20:34', 1),
(5, 'Humanities & Social Science', 1, '2017-08-18 11:34:46', 0, '0000-00-00 00:00:00', 1),
(6, 'Engineering & Technology', 1, '2017-08-18 11:46:39', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `du_faculty_member`
--

CREATE TABLE `du_faculty_member` (
  `faculty_member_id` int(11) NOT NULL,
  `faculty_member_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `blood_group` int(11) NOT NULL,
  `email_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `present_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `join_date` date NOT NULL,
  `faculty_member_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `entry_date_time` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `du_faculty_member`
--

INSERT INTO `du_faculty_member` (`faculty_member_id`, `faculty_member_name`, `faculty`, `sex`, `blood_group`, `email_id`, `contact_no`, `designation`, `qualification`, `dob`, `present_address`, `permanent_address`, `join_date`, `faculty_member_photo`, `entry_by`, `entry_date`, `entry_date_time`, `update_by`, `update_date_time`, `status`) VALUES
(7, 'Kamal Hossain', 2, 1, 5, 'kamal334@gmail.com', '01822482233', 'Professor ', 'M.S.C Enginner', '1900-12-13', 'Sharitpur', 'Dhaka', '2017-06-01', 'uplaod_file/faculty_member_photo/adult-silhouette-love4.jpg', 1, '0000-00-00 00:00:00', 2017, 1, '2017-08-24 13:27:14', 1),
(8, 'salma akhter', 6, 2, 6, 'salma235@gamil.com', '01822472233', 'Asst. Professor', 'M.S.C Enginner', '1990-01-03', 'Dhaka,Bangladesh', 'Dhaka,Bangladesh', '2017-06-01', 'uplaod_file/faculty_member_photo/love-560783_960_720.jpg', 1, '0000-00-00 00:00:00', 2017, 1, '2017-08-24 13:31:57', 1),
(9, 'Hamid', 2, 1, 5, 'shamimara@theapparelnews.com', '01822482233', '2', 'fdgfdg', '2017-08-29', 'ghfgh', 'gfhfghgf', '2017-08-29', 'uplaod_file/faculty_member_photo/adult-silhouette-love9.jpg', 1, '0000-00-00 00:00:00', 2017, 1, '2017-09-13 09:50:35', 1),
(10, 'Akhter Hossain', 1, 1, 3, 'akhter@gmail.com', '018223456', 'Assistant Professor ', 'PHD in Physics', '1995-01-02', 'xyz', 'pqr', '2018-06-01', 'uplaod_file/faculty_member_photo/CAPE_Icon31.jpg', 1, '0000-00-00 00:00:00', 2019, 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `du_menu`
--

CREATE TABLE `du_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_link` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `root_menu` int(11) NOT NULL,
  `sub_root_menu` int(11) DEFAULT '0',
  `menu_order` int(11) NOT NULL,
  `menu_icon` varchar(255) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `du_menu`
--

INSERT INTO `du_menu` (`menu_id`, `menu_name`, `menu_link`, `root_menu`, `sub_root_menu`, `menu_order`, `menu_icon`, `entry_by`, `entry_date_time`, `update_by`, `update_date_time`, `status`) VALUES
(11, 'Dash Board', 'backend_dashboard', 0, 0, 1, 'fa fa-tachometer', 2, '2017-12-27 23:33:28', 0, '0000-00-00 00:00:00', 1),
(12, 'User Manager', '', 0, 0, 2, 'fa fa-users', 2, '2017-12-27 23:36:04', 0, '0000-00-00 00:00:00', 1),
(13, 'Menu List', 'backend_menu', 12, 0, 1, 'fa fa-bars', 2, '2017-12-11 21:02:42', 0, '0000-00-00 00:00:00', 1),
(14, 'User Group List', 'backend_user_group', 12, 0, 2, 'fa fa-users', 2, '2017-12-11 21:00:07', 0, '0000-00-00 00:00:00', 1),
(15, 'User List', 'backend_user', 12, 0, 3, 'fa fa-user', 2, '2017-12-11 20:59:44', 0, '0000-00-00 00:00:00', 1),
(16, 'Role Privilege', 'backend_role_privilege', 12, 0, 4, 'fa fa-lock', 2, '2017-12-11 20:58:13', 0, '0000-00-00 00:00:00', 1),
(17, 'Honours Student', 'backend_student_honours', 0, 0, 3, 'fa fa-graduation-cap', 2, '2017-11-30 16:51:58', 0, '0000-00-00 00:00:00', 1),
(18, 'Degree Student', 'backend_student_degree', 0, 0, 4, 'fa fa-graduation-cap', 2, '2017-12-07 15:52:08', 0, '0000-00-00 00:00:00', 1),
(19, 'Individual Course Assing', 'backend_individual_course_assing', 0, 0, 5, 'fa fa-book', 2, '2017-12-09 10:05:08', 0, '0000-00-00 00:00:00', 1),
(20, 'Group Course Asssing', 'backend_group_course_assing', 0, 0, 6, 'fa fa-book', 2, '2017-12-11 21:16:38', 0, '0000-00-00 00:00:00', 1),
(21, 'Honours Student List', 'backend_student_honours', 17, 0, 1, 'fa fa-link', 2, '2017-12-27 23:23:55', 0, '0000-00-00 00:00:00', 1),
(22, 'Honours Student Reg Card', 'backend_student_honours/reg_card', 17, 0, 1, 'fa fa-link', 2, '2017-12-27 23:26:20', 0, '0000-00-00 00:00:00', 1),
(23, 'Product Group', 'backend_group', 0, 0, 3, 'fa fa-link', 2, '2018-01-07 11:54:49', 0, '0000-00-00 00:00:00', 1),
(24, 'Product Category', 'backend_category', 0, 0, 4, 'fa fa-tree', 2, '2018-02-09 17:48:59', 0, '0000-00-00 00:00:00', 1),
(25, 'Product', 'backend_product', 0, 0, 5, 'fa fa-gift', 2, '2018-02-09 17:45:26', 0, '0000-00-00 00:00:00', 1),
(26, 'Stock', 'backend_stock', 0, 0, 6, 'fa fa-link', 2, '2018-01-14 00:06:53', 0, '0000-00-00 00:00:00', 1),
(27, 'Database', 'backend_database', 0, 0, 7, 'fa fa-link', 2, '2018-01-14 00:07:46', 0, '0000-00-00 00:00:00', 1),
(28, 'Price', 'backend_price', 0, 0, 6, 'fa fa-money', 2, '2018-02-09 17:45:09', 0, '0000-00-00 00:00:00', 1),
(29, 'Slider Image', 'backend_slider', 0, 0, 8, 'fa fa-image', 2, '2018-02-09 17:26:47', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `du_role_privilege`
--

CREATE TABLE `du_role_privilege` (
  `privilege_id` bigint(11) NOT NULL,
  `user_group` int(11) NOT NULL,
  `menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `du_role_privilege`
--

INSERT INTO `du_role_privilege` (`privilege_id`, `user_group`, `menu`) VALUES
(242, 8, 11),
(243, 8, 18),
(332, 1, 11),
(333, 1, 12),
(334, 1, 13),
(335, 1, 14),
(336, 1, 15),
(337, 1, 16),
(338, 1, 23),
(339, 1, 24),
(340, 1, 25),
(341, 1, 28),
(342, 1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `du_slider`
--

CREATE TABLE `du_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `isactive` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `du_slider`
--

INSERT INTO `du_slider` (`slider_id`, `slider_caption`, `short_description`, `link`, `slider_image`, `entry_by`, `entry_date_time`, `update_by`, `update_date_time`, `isactive`) VALUES
(1, 'Slide1', '', '', 'uploads/slider_image/18167230_l21.jpg', 1, '2018-03-06 22:27:57', 1, '2018-03-21 00:36:44', 1),
(2, 'Slide2', '', '', 'uploads/slider_image/slide2.jpg', 1, '2018-03-06 22:29:33', 0, '0000-00-00 00:00:00', 1),
(3, 'Slide3', '', '', 'uploads/slider_image/18167230_l2.jpg', 1, '2018-03-07 16:10:29', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `du_users`
--

CREATE TABLE `du_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_group` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `du_users`
--

INSERT INTO `du_users` (`id`, `name`, `email_id`, `phone`, `user_name`, `password`, `user_group`, `status`) VALUES
(1, 'MAHBUB', 'mahbub@gmail.com', '202cb962ac59075b964b07152d234b70', 'mahbub', 'caf1a3dfb505ffed0d024130f58c5cfa', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `du_user_group`
--

CREATE TABLE `du_user_group` (
  `user_group_id` int(11) NOT NULL,
  `user_group_title` varchar(60) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `du_user_group`
--

INSERT INTO `du_user_group` (`user_group_id`, `user_group_title`, `description`, `entry_by`, `entry_date_time`, `update_by`, `update_date_time`, `status`) VALUES
(1, 'Administrator', 'Has full control over every aspect of the site.', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(8, 'College', 'College wise user', 2, '2017-12-12 10:03:14', 0, '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `du_department`
--
ALTER TABLE `du_department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `faculty` (`faculty`),
  ADD KEY `entry_by` (`entry_by`);

--
-- Indexes for table `du_faculty`
--
ALTER TABLE `du_faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `su_faculty_ibfk_1` (`entry_by`);

--
-- Indexes for table `du_faculty_member`
--
ALTER TABLE `du_faculty_member`
  ADD PRIMARY KEY (`faculty_member_id`),
  ADD KEY `su_faculty_member_ibfk_1` (`faculty`),
  ADD KEY `su_faculty_member_ibfk_2` (`entry_by`);

--
-- Indexes for table `du_menu`
--
ALTER TABLE `du_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `du_role_privilege`
--
ALTER TABLE `du_role_privilege`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `du_slider`
--
ALTER TABLE `du_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `du_users`
--
ALTER TABLE `du_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `du_user_group`
--
ALTER TABLE `du_user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `du_department`
--
ALTER TABLE `du_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `du_faculty`
--
ALTER TABLE `du_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `du_faculty_member`
--
ALTER TABLE `du_faculty_member`
  MODIFY `faculty_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `du_menu`
--
ALTER TABLE `du_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `du_role_privilege`
--
ALTER TABLE `du_role_privilege`
  MODIFY `privilege_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `du_slider`
--
ALTER TABLE `du_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `du_users`
--
ALTER TABLE `du_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `du_user_group`
--
ALTER TABLE `du_user_group`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
