-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 10:41 AM
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
-- Table structure for table `du_link`
--

CREATE TABLE `du_link` (
  `link_id` int(11) NOT NULL,
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_or_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_type` tinyint(3) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `du_link`
--

INSERT INTO `du_link` (`link_id`, `link_title`, `link_or_url`, `link_type`, `entry_by`, `entry_date_time`, `update_by`, `update_date_time`, `status`) VALUES
(1, 'Jobs', 'http://jobs.du.ac.bd/', 1, 2, '2019-05-29 13:39:04', 0, '0000-00-00 00:00:00', 1),
(2, 'DU Alumni', 'https://duaa-bd.org/index.php', 1, 2, '2019-05-29 13:39:31', 0, '0000-00-00 00:00:00', 1),
(3, 'E-Tender', 'http://e-tender.univdhaka.edu', 1, 2, '2019-05-29 13:39:52', 2, '2019-05-29 13:40:09', 1),
(4, 'DU Tender', 'https://www.du.ac.bd/footer_widget/tender', 1, 2, '2019-05-29 13:40:36', 2, '2019-05-29 13:40:47', 1),
(5, 'DU Library', 'http://www.library.du.ac.bd', 1, 2, '2019-05-29 13:41:14', 0, '0000-00-00 00:00:00', 1),
(6, 'DU Institutional Repository', 'http://repository.library.du.ac.bd/', 1, 2, '2019-05-29 13:42:27', 2, '2019-05-29 13:42:54', 1),
(7, 'DU Journal', 'http://journal.library.du.ac.bd/', 1, 2, '2019-05-29 13:43:22', 0, '0000-00-00 00:00:00', 1),
(8, 'News Portal of DU', 'http://barta.du.ac.bd/', 1, 2, '2019-05-29 13:44:28', 0, '0000-00-00 00:00:00', 1),
(9, '7college Website', 'http://7college.du.ac.bd/', 1, 2, '2019-05-29 13:44:46', 0, '0000-00-00 00:00:00', 1),
(10, 'DU Prokashana Sangstha', 'http://www.du.ac.bd/download/DU_Prakashona_Songstha_Book_List.pdf', 1, 2, '2019-05-29 13:45:03', 0, '0000-00-00 00:00:00', 1),
(11, 'DU Barta', 'https://www.du.ac.bd/footer_widget/barta', 2, 2, '2019-05-29 14:01:30', 0, '0000-00-00 00:00:00', 1),
(12, 'Photo Galley', '#', 2, 2, '2019-05-29 14:01:53', 0, '0000-00-00 00:00:00', 1),
(13, 'E-Learning', '#', 2, 2, '2019-05-29 14:02:21', 0, '0000-00-00 00:00:00', 1),
(14, 'DU 100 Years', 'http://100.du.ac.bd/', 2, 2, '2019-05-29 14:02:43', 0, '0000-00-00 00:00:00', 1),
(15, 'NOC Check', 'https://www.du.ac.bd/footer_widget/noclist', 2, 2, '2019-05-29 14:03:06', 0, '0000-00-00 00:00:00', 1),
(16, 'DU Form', 'https://www.du.ac.bd/IctCell/duallform', 2, 2, '2019-05-29 14:03:26', 0, '0000-00-00 00:00:00', 1),
(17, 'ICT Cell Office', 'https://www.du.ac.bd/IctCell', 2, 2, '2019-05-29 14:03:56', 0, '0000-00-00 00:00:00', 1),
(18, 'Constituent  Colleges and Institutes', 'https://www.du.ac.bddownload/others/ListofConstituentCollege1.pdf', 2, 2, '2019-05-29 14:04:18', 0, '0000-00-00 00:00:00', 1);

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
(27, 'Database', 'backend_database', 0, 0, 7, 'fa fa-link', 2, '2018-01-14 00:07:46', 0, '0000-00-00 00:00:00', 1),
(29, 'Slider Image', 'backend_slider', 0, 0, 8, 'fa fa-image', 2, '2018-02-09 17:26:47', 0, '0000-00-00 00:00:00', 1),
(30, 'News', 'backend_news', 0, 0, 9, 'fa  fa-link', 1, '2019-05-28 21:18:06', 0, '0000-00-00 00:00:00', 1),
(31, 'Notice', 'backend_notice', 0, 0, 10, 'fa  fa-link', 2, '2019-05-29 00:20:18', 0, '0000-00-00 00:00:00', 1),
(32, 'Link', 'backend_link', 0, 0, 11, 'fa fa-link', 2, '2019-05-29 08:58:01', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `du_news`
--

CREATE TABLE `du_news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `news_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `du_news`
--

INSERT INTO `du_news` (`news_id`, `title`, `details`, `news_image`, `entry_by`, `entry_date_time`, `update_by`, `update_date_time`, `status`) VALUES
(1, 'ঢাকা বিশ্ববিদ্যালয় বৃহত্তর ফরিদপুর জেলা সমিতির আয়োজনে এক ইফতার ও দোয়া মাহ্ফিল অনুষ্ঠিত', '<p>ঢাকা বিশ্ববিদ্যালয় বিজনেস স্টাডিজ অনুষদের অধ্যাপক ড. হাবিবুল্লাহ সম্মেলন কক্ষে গতকাল ২৭ মে ২০১৯ সোমবার ঢাকা বিশ্ববিদ্যালয় বৃহত্তর ফরিদপুর জেলা সমিতির আয়োজনে এক ইফতার ও দোয়া মাহ্ফিল অনুষ্ঠিত হয়েছে। এতে বিশ্ববিদ্যালয়ের উপাচার্য অধ্যাপক ড. মো. আখতারুজ্জামান প্রধান অতিথি হিসেবে উপস্থিত ছিলেন। ঢাবি বৃহত্তর ফরিদপুর জেলা সমিতির সভাপতি মো. আমিরুল ইসলামের সভাপতিত্বে অনুষ্ঠানে অন্যান্যের মধ্যে উপস্থিত ছিলেন মুক্তিযোদ্ধা জিয়াউর রহমান হলের প্রাধ্যক্ষ অধ্যাপক ড. মো. জিয়া রহমান, বাংলাদেশ কুয়েত মৈত্রী হলের প্রাধ্যক্ষা অধ্যাপক ড. মাহবুবা নাসরীন, ঢাবি সিনেট ও সিন্ডিকেট সদস্য এস এম বাহালুল মজনুন চুন্নু এবং বাংলাদেশ আওয়ামী স্বেচ্ছাসেবক লীগের সভাপতি এ্যাড. মোল্লা মো. আবু কাওছার। অনুষ্ঠান সঞ্চালনা করেন সমিতির সাধারণ সম্পাদক মঞ্জুর হোসেন। (ছবি: ঢাবি জনসংযোগ)</p>\r\n', 'uploads/news_image/news_1.jpg', 2, '0000-00-00 00:00:00', 0, '2019-05-28 22:50:09', 1),
(2, 'কলা অনুষদ আয়োজিত ইফতার মাহফিল ২০১৯ কলাভবনের শিক্ষক লাউঞ্জে অনুষ্ঠিত', '<p>ঢাকা বিশ্ববিদ্যালয় কলা অনুষদ আয়োজিত ইফতার মাহফিল ২০১৯ গতকাল ১৫ মে ২০১৯ বুধবার কলাভবনের শিক্ষক লাউঞ্জে অনুষ্ঠিত হয়েছে। এতে ঢাকা বিশ্ববিদ্যালয়ের উপাচার্য অধ্যাপক ড. মো. আখতারুজ্জামান প্রধান অতিথি হিসেবে উপস্থিত ছিলেন। কলা অনুষদের ডিন অধ্যাপক ড. আবু মো. দেলোয়ার হোসেনের সভাপতিত্বে অনুষ্ঠানে অন্যান্যের মধ্যে উপস্থিত ছিলেন বিশ্ববিদ্যালয়ের প্রো-ভাইস চ্যান্সেলর (প্রশাসন) অধ্যাপক ড. মুহাম্মদ সামাদ, ইফতার আয়োজন কমিটির আহ্বায়ক অধ্যাপক ড. মুহাম্মদ আব্দুর রশীদ, বিভিন্ন অনুষদের ডিন, বিভিন্ন বিভাগের চেয়ারম্যান, শিক্ষকবৃন্দ এবং কর্মকর্তা ও কর্মচারীবৃন্দ। (ছবি: ঢাবি জনসংযোগ) (মাহমুদ আলম) পরিচালক (ভারপ্রাপ্ত) জনসংযোগ দফতর ঢাকা বিশ্ববিদ্যালয়</p>\r\n', 'uploads/news_image/news_2.jpg', 2, '2019-05-28 23:14:29', 0, '0000-00-00 00:00:00', 1),
(3, 'বিশ্ববিদ্যালয়ের ৩য় শ্রেণী কর্মচারীদের আবাসনের জন্য ২০-তলা বিশিষ্ট “শেখ কামাল টাওয়ার”-এর ভিত্তিপ্রস্তর স্থাপন', '<p>ঢাকা বিশ্ববিদ্যালয়ের উপাচার্য অধ্যাপক ড. মো. আখতারুজ্জামান প্রধান অতিথি হিসেবে উপস্থিত থেকে গতকাল ১৪ মে ২০১৯ পলাশী এলাকায় বিশ্ববিদ্যালয়ের ৩য় শ্রেণী কর্মচারীদের আবাসনের জন্য ২০-তলা বিশিষ্ট &ldquo;শেখ কামাল টাওয়ার&rdquo;-এর ভিত্তিপ্রস্তর স্থাপন করেন। (ছবি : ঢাবি জনসংযোগ) (মাহমুদ আলম) পরিচালক (ভারপ্রাপ্ত) জনসংযোগ দফতর ঢাকা বিশ্ববিদ্যালয়</p>\r\n', 'uploads/news_image/news_3.jpg', 2, '2019-05-28 23:58:11', 0, '0000-00-00 00:00:00', 1),
(4, 'শিক্ষা ও গবেষণা ইনস্টিটিউটের ‘ডিজাবিলিটি, অটিজম এন্ড ইনক্লুসিভ এডুকেশন’ শীর্ষক অ্যাডভান্সড কোর্সের তৃতীয় ব্যাচের উদ্বোধন এবং ২য় ব্যাচের সমাপনী অনুষ্ঠান অনুষ্ঠিত', '<p>ঢাকা বিশ্ববিদ্যালয় শিক্ষা ও গবেষণা ইনস্টিটিউটের &lsquo;ডিজাবিলিটি, অটিজম এন্ড ইনক্লুসিভ এডুকেশন&rsquo; শীর্ষক অ্যাডভান্সড কোর্সের তৃতীয় ব্যাচের উদ্বোধন এবং ২য় ব্যাচের সমাপনী অনুষ্ঠান গতকাল ১০ মে ২০১৯ ইনস্টিটিউটের মিলনায়তনে অনুষ্ঠিত হয়। এতে প্রধান অতিথি হিসেবে উপস্থিত ছিলেন বিশ্ববিদ্যালয়ের উপাচার্য অধ্যাপক ড. মো. আখতারুজ্জামান। অনুষ্ঠানে সভাপতিত্ব করেন ইনস্টিটিউটের পরিচালক অধ্যাপক সৈয়দা তাহমিনা আখতার। (ছবি: ঢাবি জনসংযোগ)</p>\r\n', 'uploads/news_image/news_4.jpg', 2, '2019-05-28 23:59:41', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `du_notice`
--

CREATE TABLE `du_notice` (
  `notice_id` int(11) NOT NULL,
  `notice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attached_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `du_notice`
--

INSERT INTO `du_notice` (`notice_id`, `notice`, `attached_file`, `entry_by`, `entry_date_time`, `update_by`, `update_date_time`, `status`) VALUES
(1, 'ইনস্টিটিউট অব ডিজাস্টার ম্যানেজমেন্ট অ্যান্ড ভালনারেবিলিটি স্টাডিজের ডিপ্লোমা ও সার্টিফিকেট ইন ডিজাস্টার ম্যানেজমেন্ট-২০১৯ প্রোগ্রামের ভর্তি বিজ্ঞপ্তি', 'uploads/attached_file/Int-DisMang.pdf', 2, '2019-05-29 00:21:50', 0, '0000-00-00 00:00:00', 1),
(2, 'শিক্ষা ও গবেষণা ইনস্টিটিউটের এমএড (সান্ধ্য) কার্যক্রমের ভর্তি বিজ্ঞপ্তি', 'uploads/attached_file/IER-Notice.pdf', 2, '2019-05-29 00:23:27', 0, '0000-00-00 00:00:00', 1),
(3, 'Admission Announcement for 6th Batch, 2019 Evening Master of Public Administration (EMPA)', 'uploads/attached_file/Dept_-Public-Relation.pdf', 2, '2019-05-29 00:24:44', 0, '0000-00-00 00:00:00', 1),
(4, 'বাজেট কার্যক্রমে সংযোজনের জন্য তথ্য প্রেরণ প্রসঙ্গে', 'uploads/attached_file/DA-notice.pdf', 2, '2019-05-29 00:26:43', 0, '0000-00-00 00:00:00', 1),
(5, 'রেজিস্ট্রারের অফিস এর টেন্ডার নোটিশ (উন্মুক্ত দরপত্র পদ্ধতিতে)', 'uploads/attached_file/Registrar-Tender-Noitce.pdf', 2, '2019-05-29 00:27:29', 0, '0000-00-00 00:00:00', 1),
(6, 'রাষ্ট্রবিজ্ঞান বিভাগের অধীনে ২০১৭-২০১৮ শিক্ষাবর্ষের মাস্টার ইন গভার্নেন্স স্টাডিজ (এমজিএস) ১১তম ব্যাচ ১ম সেমিস্টারে ভর্তি পরীক্ষার লিখিত অংশের ফলাফল', 'uploads/attached_file/MGS-notice.pdf', 2, '2019-05-29 00:28:59', 0, '0000-00-00 00:00:00', 1);

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
(375, 1, 11),
(376, 1, 12),
(377, 1, 13),
(378, 1, 14),
(379, 1, 15),
(380, 1, 16),
(381, 1, 29),
(382, 1, 30),
(383, 1, 31),
(384, 1, 32);

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
(1, 'Slide1', '', '', 'uploads/slider_image/du2.PNG', 1, '2018-03-06 22:27:57', 2, '2019-05-29 01:03:38', 1),
(2, 'Slide2', '', '', 'uploads/slider_image/du3.PNG', 1, '2018-03-06 22:29:33', 2, '2019-05-29 01:05:06', 1),
(3, 'Slide3', '', '', 'uploads/slider_image/du.jpg', 1, '2018-03-07 16:10:29', 2, '2019-05-29 01:01:34', 1);

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
(1, 'MAHBUB', 'mahbub@gmail.com', '202cb962ac59075b964b07152d234b70', 'mahbub', 'caf1a3dfb505ffed0d024130f58c5cfa', 1, 1),
(2, 'nizam uddin', 'nizam.fci@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

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
-- Indexes for table `du_link`
--
ALTER TABLE `du_link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `du_menu`
--
ALTER TABLE `du_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `du_news`
--
ALTER TABLE `du_news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `entry_by` (`entry_by`);

--
-- Indexes for table `du_notice`
--
ALTER TABLE `du_notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `entry_by` (`entry_by`);

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
-- AUTO_INCREMENT for table `du_link`
--
ALTER TABLE `du_link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `du_menu`
--
ALTER TABLE `du_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `du_news`
--
ALTER TABLE `du_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `du_notice`
--
ALTER TABLE `du_notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `du_role_privilege`
--
ALTER TABLE `du_role_privilege`
  MODIFY `privilege_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `du_slider`
--
ALTER TABLE `du_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `du_users`
--
ALTER TABLE `du_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `du_user_group`
--
ALTER TABLE `du_user_group`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `du_news`
--
ALTER TABLE `du_news`
  ADD CONSTRAINT `du_news_ibfk_1` FOREIGN KEY (`entry_by`) REFERENCES `du_users` (`id`);

--
-- Constraints for table `du_notice`
--
ALTER TABLE `du_notice`
  ADD CONSTRAINT `du_notice_ibfk_1` FOREIGN KEY (`entry_by`) REFERENCES `du_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
