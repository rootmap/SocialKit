-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2015 at 08:48 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `formula_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorize_user`
--

CREATE TABLE IF NOT EXISTS `authorize_user` (
  `id` int(20) NOT NULL,
  `pc_name` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorize_user`
--

INSERT INTO `authorize_user` (`id`, `pc_name`, `date`, `status`) VALUES
(1, 'SUL-LABPC-11', '2015-09-15', 1),
(2, '192.168.1.48', NULL, NULL),
(3, 'munira-PC', NULL, NULL),
(4, 'Khairul-PC', NULL, NULL),
(5, 'SUL-Soft-PC', '2015-11-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_table_field`
--

CREATE TABLE IF NOT EXISTS `custom_table_field` (
  `id` int(20) NOT NULL,
  `table_id` int(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_table_field`
--

INSERT INTO `custom_table_field` (`id`, `table_id`, `name`, `date`, `status`) VALUES
(18, 5, 'user_id', '2015-09-17', 1),
(19, 5, 'from_user_id', '2015-09-17', 1),
(20, 5, 'post', '2015-09-17', 1),
(21, 5, 'photo_id', '2015-09-17', 1),
(22, 5, 'post_status', '2015-09-17', 1),
(23, 6, 'user_id', '2015-09-17', 1),
(24, 6, 'post_id', '2015-09-17', 1),
(25, 7, 'user_id', '2015-09-17', 1),
(26, 7, 'post_id', '2015-09-17', 1),
(27, 7, 'comment', '2015-09-17', 1),
(28, 8, 'user_id', '2015-09-17', 1),
(29, 8, 'from_user_id', '2015-09-17', 1),
(30, 8, 'post_id', '2015-09-17', 1),
(31, 9, 'user_id', '2015-09-17', 1),
(32, 9, 'post_id', '2015-09-17', 1),
(33, 9, 'comment_id', '2015-09-17', 1),
(34, 10, 'user_id', '2015-09-17', 1),
(35, 10, 'post_permission', '2015-09-17', 1),
(36, 11, 'user_id', '2015-09-17', 1),
(37, 11, 'post_id', '2015-09-17', 1),
(38, 11, 'permission_id', '2015-09-17', 1),
(39, 12, 'notice_title', '2015-09-19', 1),
(40, 12, 'notice_details', '2015-09-19', 1),
(41, 12, 'notice_image', '2015-09-19', 1),
(42, 12, 'notice_date', '2015-09-19', 1),
(43, 13, 'notice_slider_image', '2015-09-19', 1),
(44, 13, 'notice_slider_date', '2015-09-19', 1),
(45, 14, 'ads_title', '2015-09-19', 1),
(46, 14, 'ads_link', '2015-09-19', 1),
(47, 14, 'ads_image', '2015-09-19', 1),
(48, 15, 'user_id', '2015-09-19', 1),
(49, 15, 'post_id', '2015-09-19', 1),
(50, 15, 'country_id', '2015-09-19', 1),
(51, 16, 'country_name', '2015-09-19', 1),
(52, 16, 'country_code', '2015-09-19', 1),
(53, 17, 'user_id', '2015-09-19', 1),
(54, 17, 'user_name', '2015-09-19', 1),
(55, 17, 'user_type', '2015-09-19', 1),
(56, 17, 'first_name', '2015-09-19', 1),
(57, 17, 'last_name', '2015-09-19', 1),
(58, 17, 'skype_name', '2015-09-19', 1),
(59, 17, 'last_login_ip', '2015-09-19', 1),
(60, 17, 'gender', '2015-09-19', 1),
(61, 17, 'dob', '2015-09-19', 1),
(62, 17, 'email', '2015-09-19', 1),
(63, 17, 'password', '2015-09-19', 1),
(64, 17, 'marital_status', '2015-09-19', 1),
(65, 17, 'blood_group', '2015-09-19', 1),
(66, 17, 'interest', '2015-09-19', 1),
(67, 17, 'passion', '2015-09-19', 1),
(68, 17, 'auth_code', '2015-09-19', 1),
(69, 17, 'phone_number', '2015-09-19', 1),
(70, 17, 'present_address', '2015-09-19', 1),
(71, 17, 'permanent_address', '2015-09-19', 1),
(72, 17, 'country_id', '2015-09-19', 1),
(73, 17, 'city_id', '2015-09-19', 1),
(74, 17, 'state_id', '2015-09-19', 1),
(75, 17, 'zip_code', '2015-09-19', 1),
(76, 17, 'login_ip', '2015-09-19', 1),
(77, 18, 'user_type_name', '2015-09-19', 1),
(78, 19, 'language_name', '2015-09-19', 1),
(79, 20, 'religion_name', '2015-09-19', 1),
(80, 21, 'user_id', '2015-09-29', 1),
(81, 21, 'reset_code', '2015-09-29', 1),
(82, 22, 'name', '2015-10-17', 1),
(83, 23, 'name', '2015-10-17', 1),
(84, 24, 'name', '2015-11-11', 1),
(85, 24, 'class', '2015-11-11', 1),
(86, 25, 'name', '2015-11-11', 1),
(87, 25, 'icon_class', '2015-11-11', 1),
(88, 25, 'detail', '2015-11-11', 1),
(89, 26, 'name', '2015-11-25', 1),
(90, 26, 'upload_image', '2015-11-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_ads`
--

CREATE TABLE IF NOT EXISTS `dostums_ads` (
  `id` int(20) NOT NULL,
  `ads_title` varchar(255) DEFAULT NULL,
  `ads_link` varchar(255) DEFAULT NULL,
  `ads_image` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_ads`
--

INSERT INTO `dostums_ads` (`id`, `ads_title`, `ads_link`, `ads_image`, `date`, `status`) VALUES
(1, 'Samsung Mobile', '#', 'ads_image_upload__1442646701_1442646701.gif', '2015-09-19', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_ads_view`
--
CREATE TABLE IF NOT EXISTS `dostums_ads_view` (
`id` int(20)
,`ads_title` varchar(255)
,`ads_link` varchar(255)
,`ads_image` text
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_comment`
--

CREATE TABLE IF NOT EXISTS `dostums_comment` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `post_id` int(20) DEFAULT NULL,
  `comment` text CHARACTER SET utf8,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_comment`
--

INSERT INTO `dostums_comment` (`id`, `user_id`, `post_id`, `comment`, `post_time`, `date`, `status`) VALUES
(2, 1, 155, 'fdgsdf sdf sdf d fdsf sd fsd fd fdsf', '2015-09-17 07:48:19', '2015-09-17', 1),
(3, 1, 155, 'test', '2015-09-17 10:19:11', '2015-09-17', 1),
(4, 1, 1, 'hi fahad ', '2015-09-30 08:40:20', '2015-09-30', 1),
(5, 1, 1, 'hi fahad hello', '2015-09-30 08:40:46', '2015-09-30', 1),
(6, 1, 1, 'sdfdsfsdf dsf dsfdf ds f', '2015-09-30 09:59:11', '2015-09-30', 1),
(7, 1, 1, 'fdgsdfsdf sdf sdf sdf s', '2015-09-30 10:04:20', '2015-09-30', 1),
(8, 1, 1, 'sdfsdfsdf', '2015-10-01 06:17:29', '2015-10-01', 1),
(9, 1, 1, 'fdgfdgdfgdfg', '2015-10-01 06:48:04', '2015-10-01', 1),
(10, 1, 1, 'dfgfdgdf', '2015-10-01 06:50:09', '2015-10-01', 1),
(15, 1, 2, ' gsdsdfsd fsdfsdfsdfsd', '2015-10-01 07:13:16', '2015-10-01', 1),
(40, 1, 4, 'hi', '2015-10-01 09:54:28', '2015-10-01', 1),
(54, 1, 2, 'asd sadsa dasd', '2015-10-01 11:14:59', '2015-10-01', 1),
(57, 1, 2, 'fgsd fdsf dsfdsf ', '2015-10-01 11:17:00', '2015-10-01', 1),
(59, 1, 2, 'sfds fds fsd fsdfsdf', '2015-10-01 11:31:34', '2015-10-01', 1),
(60, 1, 2, 'sdf dsf dsf f sdf sd fsdf', '2015-10-01 11:31:40', '2015-10-01', 1),
(61, 1, 3, 'dsfsd fds dsf', '2015-10-01 11:35:09', '2015-10-01', 1),
(62, 1, 3, 'sdf sd fdsf sdf sdf ', '2015-10-01 11:35:12', '2015-10-01', 1),
(65, 1, 1, 'asdf asdasdsad asd ', '2015-10-01 11:40:48', '2015-10-01', 1),
(66, 1, 1, 'dfas ddasd asd sad asd ', '2015-10-01 11:41:02', '2015-10-01', 1),
(68, 1, 2, 'dsad asdasd asd', '2015-10-01 11:41:47', '2015-10-01', 1),
(69, 1, 2, 'asdas dsad asdasdad', '2015-10-01 11:42:35', '2015-10-01', 1),
(70, 1, 2, 'a sdas dasdasd sad', '2015-10-01 11:42:38', '2015-10-01', 1),
(71, 1, 2, 'asd asdasd asdas', '2015-10-01 11:42:40', '2015-10-01', 1),
(72, 1, 2, 'hello ', '2015-10-01 11:42:46', '2015-10-01', 1),
(78, 1, 0, NULL, '2015-10-03 06:48:05', '2015-10-03', 1),
(79, 1, 1, 'aasdasd asd sad ', '2015-10-03 07:14:46', '2015-10-03', 1),
(80, 1, 1, 'dfds fdsfdsf', '2015-10-03 07:14:51', '2015-10-03', 1),
(81, 1, 1, 'sdfdsf sdfsdf sd', '2015-10-03 07:16:23', '2015-10-03', 1),
(82, 1, 1, 'asdas das dsa', '2015-10-03 07:17:15', '2015-10-03', 1),
(83, 1, 2, 'dsf dsfdsf', '2015-10-03 07:17:19', '2015-10-03', 1),
(84, 1, 1, 'gfsdfdsf', '2015-10-03 07:21:05', '2015-10-03', 1),
(85, 1, 2, 'sdfdsf sdfsdf', '2015-10-03 07:21:16', '2015-10-03', 1),
(86, 1, 1, 'sdfds fdsf sdf', '2015-10-03 07:25:45', '2015-10-03', 1),
(87, 1, 1, 'sdffds fdsf', '2015-10-03 07:30:33', '2015-10-03', 1),
(88, 1, 1, 'dfgdfgfdg', '2015-10-03 07:30:41', '2015-10-03', 1),
(89, 1, 1, 'sdf sdfdsfdsf', '2015-10-03 07:31:19', '2015-10-03', 1),
(90, 1, 1, 'sadasdasdsadasd', '2015-10-03 07:56:26', '2015-10-03', 1),
(91, 1, 1, 'dsf sdfdsfdsf', '2015-10-03 07:56:52', '2015-10-03', 1),
(97, 1, 2, 'asdsadsad', '2015-10-03 08:01:23', '2015-10-03', 1),
(103, 1, 6, 'fdsfdsfsdf', '2015-10-03 09:57:42', '2015-10-03', 1),
(104, 1, 7, 'sdfdsfdsfdsf', '2015-10-03 09:57:53', '2015-10-03', 1),
(106, 1, 21, 'dsfdsfsdf', '2015-10-05 10:27:39', '2015-10-05', 1),
(107, 1, 22, 'kn ki korce?', '2015-10-08 10:54:29', '2015-10-08', 1),
(108, 1, 22, 'kisu kore nai\n', '2015-10-08 10:54:51', '2015-10-08', 1),
(111, 1, 54, 'sad as dsa dasd asd', '2015-10-10 09:10:06', '2015-10-10', 1),
(112, 1, 118, 'fdg dfgdfgdfgdf', '2015-10-15 07:25:29', '2015-10-15', 1),
(113, 1, 118, 'fd gfdgdfgdfgdfg', '2015-10-15 07:25:31', '2015-10-15', 1),
(114, 1, 118, 'd gdfgdfgdfgdf gdfgdf', '2015-10-15 07:25:35', '2015-10-15', 1),
(115, 1, 118, 'df gdfgdfgd gdf gdfgdf', '2015-10-15 07:25:38', '2015-10-15', 1),
(116, 1, 119, 'hg dfgdfgdfgdfg', '2015-10-15 07:28:01', '2015-10-15', 1),
(117, 1, 119, 'df gdf gdfgdfgdfg', '2015-10-15 07:28:04', '2015-10-15', 1),
(118, 1, 119, 'df gdf gdfgdfgdfg', '2015-10-15 07:28:04', '2015-10-15', 1),
(119, 1, 119, 'df gdfgdfgdfgdfgdfg', '2015-10-15 07:28:07', '2015-10-15', 1),
(120, 9, 124, 'adfadf', '2015-10-15 11:17:57', '2015-10-15', 1),
(121, 9, 119, 'vai acen kmn\n', '2015-10-15 11:21:27', '2015-10-15', 1),
(122, 1, 128, 'sdffkds fkldsflksd fklsdlkf', '2015-10-15 11:23:14', '2015-10-15', 1),
(123, 9, 127, 'asasasa', '2015-10-15 11:23:54', '2015-10-15', 1),
(124, 9, 127, 'sasas', '2015-10-15 11:23:58', '2015-10-15', 1),
(125, 9, 127, 'asasas', '2015-10-15 11:24:01', '2015-10-15', 1),
(127, 9, 125, 'asas', '2015-10-15 11:24:13', '2015-10-15', 1),
(128, 9, 125, 'asasasas', '2015-10-15 11:24:21', '2015-10-15', 1),
(129, 9, 129, 'dsafsadfsdaf', '2015-10-15 11:26:27', '2015-10-15', 1),
(130, 9, 131, 'nice pic', '2015-10-15 12:23:06', '2015-10-15', 1),
(131, 9, 128, 'thanks bro', '2015-10-15 12:23:41', '2015-10-15', 1),
(132, 9, 133, 'qwedqweqw ewq ewqe', '2015-10-15 13:08:37', '2015-10-15', 1),
(133, 9, 133, 'sdfsdfdfdsf', '2015-10-15 13:08:44', '2015-10-15', 1),
(134, 1, 119, 'hi ', '2015-10-15 13:08:46', '2015-10-15', 1),
(135, 1, 119, 'hiiiiiiiii', '2015-10-15 13:09:02', '2015-10-15', 1),
(136, 1, 132, 'dfsdfsd fsdfsdf', '2015-10-17 08:15:51', '2015-10-17', 1),
(137, 1, 118, 'vcvxv xcvcx v', '2015-10-17 08:16:17', '2015-10-17', 1),
(138, 1, 138, 'sdas dasdas', '2015-10-18 06:29:44', '2015-10-18', 1),
(139, 1, 138, 'asd sadasd', '2015-10-18 06:29:49', '2015-10-18', 1),
(140, 1, 121, 'rewr ewrewrewrewrewr', '2015-10-18 07:33:21', '2015-10-18', 1),
(141, 1, 141, 'dsfds fds fsdf', '2015-10-18 11:20:57', '2015-10-18', 1),
(142, 1, 142, 'asasasa', '2015-10-19 08:17:03', '2015-10-19', 1),
(143, 1, 145, 'fdgfdgdfgfdg', '2015-10-26 12:11:35', '2015-10-26', 1),
(144, 1, 145, 'hi\n', '2015-10-29 06:07:21', '2015-10-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_comment_likes`
--

CREATE TABLE IF NOT EXISTS `dostums_comment_likes` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `post_id` int(20) DEFAULT NULL,
  `comment_id` int(20) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_comment_likes`
--

INSERT INTO `dostums_comment_likes` (`id`, `user_id`, `post_id`, `comment_id`, `post_time`, `date`, `status`) VALUES
(1, 1, 155, 14, '2015-09-17 10:37:55', '2015-09-17', 1),
(2, 1, 155, 14, '2015-09-19 05:47:15', '2015-09-19', 1),
(7, 1, 1, 89, '2015-10-03 10:15:13', '2015-10-03', 1),
(8, 1, 2, 83, '2015-10-03 10:15:18', '2015-10-03', 1),
(9, 1, 2, 83, '2015-10-03 10:15:19', '2015-10-03', 1),
(10, 1, 2, 83, '2015-10-03 10:15:19', '2015-10-03', 1),
(11, 1, 2, 83, '2015-10-03 10:15:20', '2015-10-03', 1),
(12, 1, 2, 83, '2015-10-03 10:15:21', '2015-10-03', 1),
(38, 1, 1, 90, '2015-10-03 10:37:36', '2015-10-03', 1),
(39, 1, 1, 91, '2015-10-03 10:37:59', '2015-10-03', 1),
(40, 1, 21, 106, '2015-10-06 12:01:37', '2015-10-06', 1),
(42, 1, 54, 111, '2015-10-10 09:10:28', '2015-10-10', 1),
(43, 1, 116, 112, '2015-10-14 12:25:39', '2015-10-14', 1),
(44, 9, 124, 120, '2015-10-15 11:17:59', '2015-10-15', 1),
(45, 9, 119, 117, '2015-10-15 11:21:19', '2015-10-15', 1),
(48, 9, 119, 121, '2015-10-15 11:22:50', '2015-10-15', 1),
(49, 9, 128, 122, '2015-10-15 11:25:22', '2015-10-15', 1),
(50, 9, 129, 129, '2015-10-15 11:26:31', '2015-10-15', 1),
(51, 9, 131, 130, '2015-10-15 12:23:10', '2015-10-15', 1),
(52, 1, 145, 143, '2015-10-26 12:11:38', '2015-10-26', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_comment_likes_view`
--
CREATE TABLE IF NOT EXISTS `dostums_comment_likes_view` (
`id` int(20)
,`user_id` int(20)
,`post_id` int(20)
,`comment_id` int(20)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_comment_view`
--
CREATE TABLE IF NOT EXISTS `dostums_comment_view` (
`id` int(20)
,`user_id` int(20)
,`post_id` int(20)
,`likes` bigint(21)
,`comment` text
,`post_time` timestamp
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_country`
--

CREATE TABLE IF NOT EXISTS `dostums_country` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_country`
--

INSERT INTO `dostums_country` (`id`, `country_code`, `country_name`, `date`, `status`) VALUES
(1, 'US', 'United States', '0000-00-00', 0),
(2, 'CA', 'Canada', '0000-00-00', 0),
(3, 'AF', 'Afghanistan', '0000-00-00', 0),
(4, 'AL', 'Albania', '0000-00-00', 0),
(5, 'DZ', 'Algeria', '0000-00-00', 0),
(6, 'DS', 'American Samoa', '0000-00-00', 0),
(7, 'AD', 'Andorra', '0000-00-00', 0),
(8, 'AO', 'Angola', '0000-00-00', 0),
(9, 'AI', 'Anguilla', '0000-00-00', 0),
(10, 'AQ', 'Antarctica', '0000-00-00', 0),
(11, 'AG', 'Antigua and/or Barbuda', '0000-00-00', 0),
(12, 'AR', 'Argentina', '0000-00-00', 0),
(13, 'AM', 'Armenia', '0000-00-00', 0),
(14, 'AW', 'Aruba', '0000-00-00', 0),
(15, 'AU', 'Australia', '0000-00-00', 0),
(16, 'AT', 'Austria', '0000-00-00', 0),
(17, 'AZ', 'Azerbaijan', '0000-00-00', 0),
(18, 'BS', 'Bahamas', '0000-00-00', 0),
(19, 'BH', 'Bahrain', '0000-00-00', 0),
(20, 'BD', 'Bangladesh', '0000-00-00', 0),
(21, 'BB', 'Barbados', '0000-00-00', 0),
(22, 'BY', 'Belarus', '0000-00-00', 0),
(23, 'BE', 'Belgium', '0000-00-00', 0),
(24, 'BZ', 'Belize', '0000-00-00', 0),
(25, 'BJ', 'Benin', '0000-00-00', 0),
(26, 'BM', 'Bermuda', '0000-00-00', 0),
(27, 'BT', 'Bhutan', '0000-00-00', 0),
(28, 'BO', 'Bolivia', '0000-00-00', 0),
(29, 'BA', 'Bosnia and Herzegovina', '0000-00-00', 0),
(30, 'BW', 'Botswana', '0000-00-00', 0),
(31, 'BV', 'Bouvet Island', '0000-00-00', 0),
(32, 'BR', 'Brazil', '0000-00-00', 0),
(33, 'IO', 'British Indian Ocean Territory', '0000-00-00', 0),
(34, 'BN', 'Brunei Darussalam', '0000-00-00', 0),
(35, 'BG', 'Bulgaria', '0000-00-00', 0),
(36, 'BF', 'Burkina Faso', '0000-00-00', 0),
(37, 'BI', 'Burundi', '0000-00-00', 0),
(38, 'KH', 'Cambodia', '0000-00-00', 0),
(39, 'CM', 'Cameroon', '0000-00-00', 0),
(40, 'CV', 'Cape Verde', '0000-00-00', 0),
(41, 'KY', 'Cayman Islands', '0000-00-00', 0),
(42, 'CF', 'Central African Republic', '0000-00-00', 0),
(43, 'TD', 'Chad', '0000-00-00', 0),
(44, 'CL', 'Chile', '0000-00-00', 0),
(45, 'CN', 'China', '0000-00-00', 0),
(46, 'CX', 'Christmas Island', '0000-00-00', 0),
(47, 'CC', 'Cocos (Keeling) Islands', '0000-00-00', 0),
(48, 'CO', 'Colombia', '0000-00-00', 0),
(49, 'KM', 'Comoros', '0000-00-00', 0),
(50, 'CG', 'Congo', '0000-00-00', 0),
(51, 'CK', 'Cook Islands', '0000-00-00', 0),
(52, 'CR', 'Costa Rica', '0000-00-00', 0),
(53, 'HR', 'Croatia (Hrvatska)', '0000-00-00', 0),
(54, 'CU', 'Cuba', '0000-00-00', 0),
(55, 'CY', 'Cyprus', '0000-00-00', 0),
(56, 'CZ', 'Czech Republic', '0000-00-00', 0),
(57, 'DK', 'Denmark', '0000-00-00', 0),
(58, 'DJ', 'Djibouti', '0000-00-00', 0),
(59, 'DM', 'Dominica', '0000-00-00', 0),
(60, 'DO', 'Dominican Republic', '0000-00-00', 0),
(61, 'TP', 'East Timor', '0000-00-00', 0),
(62, 'EC', 'Ecuador', '0000-00-00', 0),
(63, 'EG', 'Egypt', '0000-00-00', 0),
(64, 'SV', 'El Salvador', '0000-00-00', 0),
(65, 'GQ', 'Equatorial Guinea', '0000-00-00', 0),
(66, 'ER', 'Eritrea', '0000-00-00', 0),
(67, 'EE', 'Estonia', '0000-00-00', 0),
(68, 'ET', 'Ethiopia', '0000-00-00', 0),
(69, 'FK', 'Falkland Islands (Malvinas)', '0000-00-00', 0),
(70, 'FO', 'Faroe Islands', '0000-00-00', 0),
(71, 'FJ', 'Fiji', '0000-00-00', 0),
(72, 'FI', 'Finland', '0000-00-00', 0),
(73, 'FR', 'France', '0000-00-00', 0),
(74, 'FX', 'France, Metropolitan', '0000-00-00', 0),
(75, 'GF', 'French Guiana', '0000-00-00', 0),
(76, 'PF', 'French Polynesia', '0000-00-00', 0),
(77, 'TF', 'French Southern Territories', '0000-00-00', 0),
(78, 'GA', 'Gabon', '0000-00-00', 0),
(79, 'GM', 'Gambia', '0000-00-00', 0),
(80, 'GE', 'Georgia', '0000-00-00', 0),
(81, 'DE', 'Germany', '0000-00-00', 0),
(82, 'GH', 'Ghana', '0000-00-00', 0),
(83, 'GI', 'Gibraltar', '0000-00-00', 0),
(246, 'GK', 'Guernsey', '0000-00-00', 0),
(84, 'GR', 'Greece', '0000-00-00', 0),
(85, 'GL', 'Greenland', '0000-00-00', 0),
(86, 'GD', 'Grenada', '0000-00-00', 0),
(87, 'GP', 'Guadeloupe', '0000-00-00', 0),
(88, 'GU', 'Guam', '0000-00-00', 0),
(89, 'GT', 'Guatemala', '0000-00-00', 0),
(90, 'GN', 'Guinea', '0000-00-00', 0),
(91, 'GW', 'Guinea-Bissau', '0000-00-00', 0),
(92, 'GY', 'Guyana', '0000-00-00', 0),
(93, 'HT', 'Haiti', '0000-00-00', 0),
(94, 'HM', 'Heard and Mc Donald Islands', '0000-00-00', 0),
(95, 'HN', 'Honduras', '0000-00-00', 0),
(96, 'HK', 'Hong Kong', '0000-00-00', 0),
(97, 'HU', 'Hungary', '0000-00-00', 0),
(98, 'IS', 'Iceland', '0000-00-00', 0),
(99, 'IN', 'India', '0000-00-00', 0),
(244, 'IM', 'Isle of Man', '0000-00-00', 0),
(100, 'ID', 'Indonesia', '0000-00-00', 0),
(101, 'IR', 'Iran (Islamic Republic of)', '0000-00-00', 0),
(102, 'IQ', 'Iraq', '0000-00-00', 0),
(103, 'IE', 'Ireland', '0000-00-00', 0),
(104, 'IL', 'Israel', '0000-00-00', 0),
(105, 'IT', 'Italy', '0000-00-00', 0),
(106, 'CI', 'Ivory Coast', '0000-00-00', 0),
(245, 'JE', 'Jersey', '0000-00-00', 0),
(107, 'JM', 'Jamaica', '0000-00-00', 0),
(108, 'JP', 'Japan', '0000-00-00', 0),
(109, 'JO', 'Jordan', '0000-00-00', 0),
(110, 'KZ', 'Kazakhstan', '0000-00-00', 0),
(111, 'KE', 'Kenya', '0000-00-00', 0),
(112, 'KI', 'Kiribati', '0000-00-00', 0),
(113, 'KP', 'Korea, Democratic People''s Republic of', '0000-00-00', 0),
(114, 'KR', 'Korea, Republic of', '0000-00-00', 0),
(115, 'XK', 'Kosovo', '0000-00-00', 0),
(116, 'KW', 'Kuwait', '0000-00-00', 0),
(117, 'KG', 'Kyrgyzstan', '0000-00-00', 0),
(118, 'LA', 'Lao People''s Democratic Republic', '0000-00-00', 0),
(119, 'LV', 'Latvia', '0000-00-00', 0),
(120, 'LB', 'Lebanon', '0000-00-00', 0),
(121, 'LS', 'Lesotho', '0000-00-00', 0),
(122, 'LR', 'Liberia', '0000-00-00', 0),
(123, 'LY', 'Libyan Arab Jamahiriya', '0000-00-00', 0),
(124, 'LI', 'Liechtenstein', '0000-00-00', 0),
(125, 'LT', 'Lithuania', '0000-00-00', 0),
(126, 'LU', 'Luxembourg', '0000-00-00', 0),
(127, 'MO', 'Macau', '0000-00-00', 0),
(128, 'MK', 'Macedonia', '0000-00-00', 0),
(129, 'MG', 'Madagascar', '0000-00-00', 0),
(130, 'MW', 'Malawi', '0000-00-00', 0),
(131, 'MY', 'Malaysia', '0000-00-00', 0),
(132, 'MV', 'Maldives', '0000-00-00', 0),
(133, 'ML', 'Mali', '0000-00-00', 0),
(134, 'MT', 'Malta', '0000-00-00', 0),
(135, 'MH', 'Marshall Islands', '0000-00-00', 0),
(136, 'MQ', 'Martinique', '0000-00-00', 0),
(137, 'MR', 'Mauritania', '0000-00-00', 0),
(138, 'MU', 'Mauritius', '0000-00-00', 0),
(139, 'TY', 'Mayotte', '0000-00-00', 0),
(140, 'MX', 'Mexico', '0000-00-00', 0),
(141, 'FM', 'Micronesia, Federated States of', '0000-00-00', 0),
(142, 'MD', 'Moldova, Republic of', '0000-00-00', 0),
(143, 'MC', 'Monaco', '0000-00-00', 0),
(144, 'MN', 'Mongolia', '0000-00-00', 0),
(145, 'ME', 'Montenegro', '0000-00-00', 0),
(146, 'MS', 'Montserrat', '0000-00-00', 0),
(147, 'MA', 'Morocco', '0000-00-00', 0),
(148, 'MZ', 'Mozambique', '0000-00-00', 0),
(149, 'MM', 'Myanmar', '0000-00-00', 0),
(150, 'NA', 'Namibia', '0000-00-00', 0),
(151, 'NR', 'Nauru', '0000-00-00', 0),
(152, 'NP', 'Nepal', '0000-00-00', 0),
(153, 'NL', 'Netherlands', '0000-00-00', 0),
(154, 'AN', 'Netherlands Antilles', '0000-00-00', 0),
(155, 'NC', 'New Caledonia', '0000-00-00', 0),
(156, 'NZ', 'New Zealand', '0000-00-00', 0),
(157, 'NI', 'Nicaragua', '0000-00-00', 0),
(158, 'NE', 'Niger', '0000-00-00', 0),
(159, 'NG', 'Nigeria', '0000-00-00', 0),
(160, 'NU', 'Niue', '0000-00-00', 0),
(161, 'NF', 'Norfolk Island', '0000-00-00', 0),
(162, 'MP', 'Northern Mariana Islands', '0000-00-00', 0),
(163, 'NO', 'Norway', '0000-00-00', 0),
(164, 'OM', 'Oman', '0000-00-00', 0),
(165, 'PK', 'Pakistan', '0000-00-00', 0),
(166, 'PW', 'Palau', '0000-00-00', 0),
(243, 'PS', 'Palestine', '0000-00-00', 0),
(167, 'PA', 'Panama', '0000-00-00', 0),
(168, 'PG', 'Papua New Guinea', '0000-00-00', 0),
(169, 'PY', 'Paraguay', '0000-00-00', 0),
(170, 'PE', 'Peru', '0000-00-00', 0),
(171, 'PH', 'Philippines', '0000-00-00', 0),
(172, 'PN', 'Pitcairn', '0000-00-00', 0),
(173, 'PL', 'Poland', '0000-00-00', 0),
(174, 'PT', 'Portugal', '0000-00-00', 0),
(175, 'PR', 'Puerto Rico', '0000-00-00', 0),
(176, 'QA', 'Qatar', '0000-00-00', 0),
(177, 'RE', 'Reunion', '0000-00-00', 0),
(178, 'RO', 'Romania', '0000-00-00', 0),
(179, 'RU', 'Russian Federation', '0000-00-00', 0),
(180, 'RW', 'Rwanda', '0000-00-00', 0),
(181, 'KN', 'Saint Kitts and Nevis', '0000-00-00', 0),
(182, 'LC', 'Saint Lucia', '0000-00-00', 0),
(183, 'VC', 'Saint Vincent and the Grenadines', '0000-00-00', 0),
(184, 'WS', 'Samoa', '0000-00-00', 0),
(185, 'SM', 'San Marino', '0000-00-00', 0),
(186, 'ST', 'Sao Tome and Principe', '0000-00-00', 0),
(187, 'SA', 'Saudi Arabia', '0000-00-00', 0),
(188, 'SN', 'Senegal', '0000-00-00', 0),
(189, 'RS', 'Serbia', '0000-00-00', 0),
(190, 'SC', 'Seychelles', '0000-00-00', 0),
(191, 'SL', 'Sierra Leone', '0000-00-00', 0),
(192, 'SG', 'Singapore', '0000-00-00', 0),
(193, 'SK', 'Slovakia', '0000-00-00', 0),
(194, 'SI', 'Slovenia', '0000-00-00', 0),
(195, 'SB', 'Solomon Islands', '0000-00-00', 0),
(196, 'SO', 'Somalia', '0000-00-00', 0),
(197, 'ZA', 'South Africa', '0000-00-00', 0),
(198, 'GS', 'South Georgia South Sandwich Islands', '0000-00-00', 0),
(199, 'ES', 'Spain', '0000-00-00', 0),
(200, 'LK', 'Sri Lanka', '0000-00-00', 0),
(201, 'SH', 'St. Helena', '0000-00-00', 0),
(202, 'PM', 'St. Pierre and Miquelon', '0000-00-00', 0),
(203, 'SD', 'Sudan', '0000-00-00', 0),
(204, 'SR', 'Suriname', '0000-00-00', 0),
(205, 'SJ', 'Svalbard and Jan Mayen Islands', '0000-00-00', 0),
(206, 'SZ', 'Swaziland', '0000-00-00', 0),
(207, 'SE', 'Sweden', '0000-00-00', 0),
(208, 'CH', 'Switzerland', '0000-00-00', 0),
(209, 'SY', 'Syrian Arab Republic', '0000-00-00', 0),
(210, 'TW', 'Taiwan', '0000-00-00', 0),
(211, 'TJ', 'Tajikistan', '0000-00-00', 0),
(212, 'TZ', 'Tanzania, United Republic of', '0000-00-00', 0),
(213, 'TH', 'Thailand', '0000-00-00', 0),
(214, 'TG', 'Togo', '0000-00-00', 0),
(215, 'TK', 'Tokelau', '0000-00-00', 0),
(216, 'TO', 'Tonga', '0000-00-00', 0),
(217, 'TT', 'Trinidad and Tobago', '0000-00-00', 0),
(218, 'TN', 'Tunisia', '0000-00-00', 0),
(219, 'TR', 'Turkey', '0000-00-00', 0),
(220, 'TM', 'Turkmenistan', '0000-00-00', 0),
(221, 'TC', 'Turks and Caicos Islands', '0000-00-00', 0),
(222, 'TV', 'Tuvalu', '0000-00-00', 0),
(223, 'UG', 'Uganda', '0000-00-00', 0),
(224, 'UA', 'Ukraine', '0000-00-00', 0),
(225, 'AE', 'United Arab Emirates', '0000-00-00', 0),
(226, 'GB', 'United Kingdom', '0000-00-00', 0),
(227, 'UM', 'United States minor outlying islands', '0000-00-00', 0),
(228, 'UY', 'Uruguay', '0000-00-00', 0),
(229, 'UZ', 'Uzbekistan', '0000-00-00', 0),
(230, 'VU', 'Vanuatu', '0000-00-00', 0),
(231, 'VA', 'Vatican City State', '0000-00-00', 0),
(232, 'VE', 'Venezuela', '0000-00-00', 0),
(233, 'VN', 'Vietnam', '0000-00-00', 0),
(234, 'VG', 'Virgin Islands (British)', '0000-00-00', 0),
(235, 'VI', 'Virgin Islands (U.S.)', '0000-00-00', 0),
(236, 'WF', 'Wallis and Futuna Islands', '0000-00-00', 0),
(237, 'EH', 'Western Sahara', '0000-00-00', 0),
(238, 'YE', 'Yemen', '0000-00-00', 0),
(239, 'YU', 'Yugoslavia', '0000-00-00', 0),
(240, 'ZR', 'Zaire', '0000-00-00', 0),
(241, 'ZM', 'Zambia', '0000-00-00', 0),
(242, 'ZW', 'Zimbabwe', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_country_view`
--
CREATE TABLE IF NOT EXISTS `dostums_country_view` (
`id` int(11)
,`country_name` varchar(100)
,`country_code` varchar(2)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_cover_photo`
--

CREATE TABLE IF NOT EXISTS `dostums_cover_photo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_cover_photo`
--

INSERT INTO `dostums_cover_photo` (`id`, `user_id`, `photo_id`, `date`, `status`) VALUES
(0, 1, 1, '2015-10-14', 1),
(0, 2, 4, '2015-10-14', 1),
(0, 1, 10, '2015-10-14', 1),
(0, 3, 13, '2015-10-15', 2),
(0, 9, 14, '2015-10-15', 1),
(0, 9, 16, '2015-10-15', 2),
(0, 2, 19, '2015-10-29', 1),
(0, 2, 21, '2015-10-29', 1),
(0, 2, 22, '2015-10-29', 1),
(0, 2, 23, '2015-10-29', 1),
(0, 2, 25, '2015-10-29', 1),
(0, 2, 26, '2015-10-29', 1),
(0, 1, 28, '2015-11-02', 2),
(0, 2, 32, '2015-11-03', 1),
(0, 2, 34, '2015-11-03', 2),
(0, 13, 36, '2015-11-08', 1),
(0, 13, 37, '2015-11-08', 1),
(0, 13, 38, '2015-11-08', 1),
(0, 13, 39, '2015-11-08', 1),
(0, 13, 40, '2015-11-08', 1),
(0, 13, 41, '2015-11-08', 1),
(0, 13, 42, '2015-11-08', 1),
(0, 13, 43, '2015-11-08', 1),
(0, 13, 44, '2015-11-09', 1),
(0, 13, 47, '2015-11-09', 1),
(0, 13, 49, '2015-11-09', 1),
(0, 13, 62, '2015-11-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_fanpage`
--

CREATE TABLE IF NOT EXISTS `dostums_fanpage` (
  `id` int(20) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL,
  `page_id` int(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `moto` text,
  `email` text,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `color` text,
  `about` longtext,
  `mission` longtext,
  `vission` longtext,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dostums_friend`
--

CREATE TABLE IF NOT EXISTS `dostums_friend` (
  `id` int(11) NOT NULL,
  `uid` int(20) DEFAULT NULL,
  `to_uid` int(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_friend`
--

INSERT INTO `dostums_friend` (`id`, `uid`, `to_uid`, `date`, `status`) VALUES
(1, 3, 1, NULL, 2),
(2, 1, 3, NULL, 2),
(5, 1, 9, NULL, 2),
(6, 9, 1, NULL, 2),
(7, 9, 8, NULL, 0),
(8, 8, 9, NULL, 1),
(9, 2, 1, NULL, 2),
(10, 1, 2, NULL, 2),
(11, 2, 6, NULL, 0),
(12, 6, 2, NULL, 1),
(15, 13, 13, NULL, 2),
(16, 13, 13, NULL, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_friend_view`
--
CREATE TABLE IF NOT EXISTS `dostums_friend_view` (
`id` int(11)
,`uid` int(20)
,`to_uid` int(20)
,`date` date
,`status` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_group`
--

CREATE TABLE IF NOT EXISTS `dostums_group` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `group_id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon_id` int(20) NOT NULL,
  `privacy_id` int(20) NOT NULL,
  `moto` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(100) NOT NULL,
  `color` text NOT NULL,
  `about` longtext NOT NULL,
  `mission` longtext NOT NULL,
  `vission` longtext NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_group`
--

INSERT INTO `dostums_group` (`id`, `user_id`, `group_id`, `name`, `icon_id`, `privacy_id`, `moto`, `email`, `phone`, `address`, `website`, `color`, `about`, `mission`, `vission`, `date`, `status`) VALUES
(1, 13, 1447911704, 'Dostums_SUL_Developers', 19, 1, '', 'contact@dfans.com', '', 'Moghbazar Chowrasta, Razzak Plaza (8th Floor), Dhaka.', 'www.dfans.com', '', 'This is official group by the developers from SYSTECH UNIMAX LIMITED.', '', '', '2015-11-19', 1),
(2, 13, 1447925558, 'Dostums_SUL_Developers-2015', 20, 3, '', 'group@dostums.com', '', 'Dhanmondi, Dhaka-1215', 'dostums.com', '', 'This is a official group', '', '', '2015-11-19', 1),
(3, 13, 1447933216, 'Dostums_SUL_C#_Developers', 0, 1, '', '', '', '', '', '', '', '', '', '2015-11-19', 1),
(4, 13, 1447933231, 'Dostums_SUL_C#_Developers', 0, 1, '', '', '', '', '', '', '', '', '', '2015-11-19', 1),
(5, 13, 1447933317, 'sdfds', 58, 1, '', '', '', '', '', '', '', '', '', '2015-11-19', 1),
(6, 13, 1447934001, 'Dostums_SUL_C#_Developers', 28, 1, '', 'group@dostums.com', '01923391079', 'dfdfdfd', 'www.dostums.com', '', 'fsdfdsfd', '', '', '2015-11-19', 1),
(7, 13, 1447934168, 'Dostums_SUL_Developers-2015', 31, 1, '', '', '', '', '', '', '', '', '', '2015-11-19', 1),
(8, 13, 1447934426, 'SUL_DOSTUMS_GROUP-01', 26, 1, '', '', '', '', '', '', '', '', '', '2015-11-19', 1),
(9, 13, 1448968777, 'dgfdgfg', 2, 1, '', '', 'fgfg', 'fgfgf', 'hfghf', '', 'sgsg', '', '', '2015-12-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_group_cover_photo`
--

CREATE TABLE IF NOT EXISTS `dostums_group_cover_photo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_group_cover_photo`
--

INSERT INTO `dostums_group_cover_photo` (`id`, `user_id`, `group_id`, `photo_id`, `date`, `status`) VALUES
(1, 13, 1, 53, '2015-11-09', 1),
(2, 13, 1, 54, '2015-11-09', 1),
(3, 13, 1447758522, 58, '2015-11-17', 2),
(4, 13, 1447911704, 60, '2015-11-19', 2),
(5, 13, 1, 64, '2015-11-21', 1),
(6, 13, 1, 66, '2015-11-21', 1),
(7, 13, 1, 67, '2015-11-22', 1),
(8, 13, 1, 69, '2015-11-24', 2),
(9, 13, 1448968777, 70, '2015-12-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_group_icon`
--

CREATE TABLE IF NOT EXISTS `dostums_group_icon` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_group_icon`
--

INSERT INTO `dostums_group_icon` (`id`, `name`, `class`, `date`, `status`) VALUES
(1, 'User', 'fa fa-user', '2015-11-11', 1),
(2, 'globe', 'fa fa-globe', '2015-11-11', 1),
(3, 'angellist', 'fa fa-angellist', '2015-11-11', 1),
(4, 'automobile', 'fa fa-automobile', '2015-11-11', 1),
(5, 'beer', 'fa fa-beer', '2015-11-11', 1),
(6, 'bicycle', 'fa fa-bicycle', '2015-11-11', 1),
(7, 'binoculars', 'fa fa-binoculars', '2015-11-11', 1),
(8, 'birthday-cake', 'fa fa-birthday-cake', '2015-11-11', 1),
(9, 'camera', 'fa fa-camera', '2015-11-11', 1),
(10, 'book', 'fa fa-book', '2015-11-11', 1),
(11, 'chain', 'fa fa-chain', '2015-11-11', 1),
(12, 'chain-broken', 'fa fa-chain-broken', '2015-11-11', 1),
(13, 'child', ' fa fa-child', '2015-11-11', 1),
(14, 'coffee ', 'fa fa-coffee ', '2015-11-11', 1),
(15, 'comments', 'fa fa-comments', '2015-11-11', 1),
(16, 'cubes', 'fa fa-cubes', '2015-11-11', 1),
(17, 'cut', 'fa  fa-cut', '2015-11-11', 1),
(18, 'cutlery', 'fa  fa-cutlery', '2015-11-11', 1),
(19, 'dashcube', ' fa fa-dashcube', '2015-11-11', 1),
(20, 'delicious', 'fa fa-delicious', '2015-11-11', 1),
(21, 'diamond', 'fa fa-diamond', '2015-11-11', 1),
(22, 'dribbble', 'fa  fa-dribbble', '2015-11-11', 1),
(24, 'female', 'fa fa-female', '2015-11-11', 1),
(25, 'flask', 'fa  fa-flask', '2015-11-11', 1),
(26, 'frown-o ', 'fa  fa-frown-o ', '2015-11-11', 1),
(27, 'futbol-o', 'fa fa-futbol-o', '2015-11-11', 1),
(28, 'gamepad', 'fa fa-gamepad', '2015-11-11', 1),
(29, 'gift', 'fa  fa-gift', '2015-11-11', 1),
(30, 'graduation-cap', 'fa fa-graduation-cap', '2015-11-11', 1),
(31, 'group', 'fa fa-group', '2015-11-11', 1),
(37, 'heart', 'fa fa-heart', '2015-11-11', 1),
(38, 'heart-o', 'fa fa-heart-o', '2015-11-11', 1),
(39, 'heartbeat', 'fa fa-heartbeat', '2015-11-11', 1),
(40, 'language', 'fa fa-language', '2015-11-11', 1),
(41, 'leaf', 'fa  fa-leaf', '2015-11-11', 1),
(42, 'legal', 'fa fa-legal', '2015-11-11', 1),
(43, 'life-saver', 'fa  fa-life-saver', '2015-11-11', 1),
(44, 'lightbulb-o', 'fa  fa-lightbulb-o', '2015-11-11', 1),
(45, 'lock', 'fa fa-lock', '2015-11-11', 1),
(47, 'pagelines', 'fa  fa-pagelines', '2015-11-11', 1),
(48, 'paint-brush', 'fa  fa-paint-brush', '2015-11-11', 1),
(49, 'paw', 'fa fa-paw', '2015-11-11', 1),
(50, 'pied-piper-alt', 'fa  fa-pied-piper-alt', '2015-11-11', 1),
(51, 'plane', 'fa  fa-plane', '2015-11-11', 1),
(52, 'ship', 'fa  fa-ship', '2015-11-11', 1),
(53, 'shopping-cart', 'fa  fa-shopping-cart', '2015-11-11', 1),
(54, 'star', 'fa  fa-star', '2015-11-11', 1),
(55, 'thumbs-up', 'fa fa-thumbs-up', '2015-11-11', 1),
(56, 'tree', 'fa fa-tree', '2015-11-11', 1),
(57, 'trophy', 'fa  fa-trophy', '2015-11-11', 1),
(58, 'university', 'fa  fa-university', '2015-11-11', 1),
(59, 'user-md', 'fa fa-user-md', '2015-11-11', 1),
(60, 'user-secret', 'fa fa-user-secret', '2015-11-11', 1),
(61, 'user-times', 'fa  fa-user-times', '2015-11-11', 1),
(62, 'video-camera', 'fa  fa-video-camera', '2015-11-11', 1),
(63, 'venus-double', 'fa  fa-venus-double', '2015-11-11', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_group_icon_view`
--
CREATE TABLE IF NOT EXISTS `dostums_group_icon_view` (
`id` int(20)
,`name` varchar(255)
,`class` varchar(255)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_group_members`
--

CREATE TABLE IF NOT EXISTS `dostums_group_members` (
  `id` int(20) NOT NULL,
  `group_id` int(20) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dostums_group_profile_photo`
--

CREATE TABLE IF NOT EXISTS `dostums_group_profile_photo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_group_profile_photo`
--

INSERT INTO `dostums_group_profile_photo` (`id`, `user_id`, `group_id`, `photo_id`, `date`, `status`) VALUES
(1, 13, 1, 51, '2015-11-09', 1),
(2, 13, 1, 52, '2015-11-09', 1),
(3, 13, 1, 55, '2015-11-09', 1),
(4, 13, 1, 56, '2015-11-09', 1),
(5, 13, 1447758522, 57, '2015-11-17', 2),
(6, 13, 1447911704, 61, '2015-11-19', 2),
(7, 13, 1, 63, '2015-11-21', 1),
(8, 13, 1, 65, '2015-11-21', 1),
(9, 13, 1, 68, '2015-11-24', 2),
(10, 13, 1448968777, 71, '2015-12-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_language`
--

CREATE TABLE IF NOT EXISTS `dostums_language` (
  `id` int(20) NOT NULL,
  `language_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_language`
--

INSERT INTO `dostums_language` (`id`, `language_name`, `date`, `status`) VALUES
(1, 'English (US)', '2015-09-19', 1),
(2, 'Bengali', '2015-09-19', 1),
(3, 'Hindi', '2015-09-19', 1),
(5, 'English (UK)', '2015-09-19', 1),
(6, 'Arabic', '2015-09-19', 1),
(7, 'Chinese', '2015-09-19', 1),
(8, 'Danish', '2015-09-19', 1),
(9, 'Dutch', '2015-09-19', 1),
(10, 'Filipino', '2015-09-19', 1),
(11, 'French', '2015-09-19', 1),
(12, 'German', '2015-09-19', 1),
(13, 'Italian', '2015-09-19', 1),
(14, 'Hungarian', '2015-09-19', 1),
(15, 'Korean', '2015-09-19', 1),
(16, 'Latin', '2015-09-19', 1),
(17, 'Tamil', '2015-09-19', 1),
(18, 'Thai', '2015-09-19', 1),
(19, 'Urdu', '2015-09-19', 1),
(20, '1', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_language_view`
--
CREATE TABLE IF NOT EXISTS `dostums_language_view` (
`id` int(20)
,`language_name` varchar(255)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_likes`
--

CREATE TABLE IF NOT EXISTS `dostums_likes` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `post_id` int(20) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_likes`
--

INSERT INTO `dostums_likes` (`id`, `user_id`, `post_id`, `post_time`, `date`, `status`) VALUES
(1, 1, 155, '2015-09-17 07:45:34', '2015-09-17', 1),
(2, 1, 155, '2015-09-17 08:36:44', '2015-09-17', 1),
(3, 1, 155, '2015-09-17 10:19:02', '2015-09-17', 1),
(4, 1, 155, '2015-09-17 10:37:24', '2015-09-17', 1),
(5, 1, 155, '2015-09-19 05:47:37', '2015-09-19', 1),
(6, 1, 16, '2015-09-30 08:32:14', '2015-09-30', 1),
(100, 1, 18, '2015-10-03 07:18:05', '2015-10-03', 1),
(101, 1, 19, '2015-10-03 07:18:26', '2015-10-03', 1),
(116, 1, 2, '2015-10-03 08:01:28', '2015-10-03', 1),
(119, 1, 3, '2015-10-03 08:02:16', '2015-10-03', 1),
(169, 1, 9, '2015-10-03 08:23:42', '2015-10-03', 1),
(170, 1, 1, '2015-10-03 08:26:08', '2015-10-03', 1),
(175, 1, NULL, '2015-10-08 07:30:09', '2015-10-08', 1),
(177, 1, 22, '2015-10-08 10:54:57', '2015-10-08', 1),
(178, 1, NULL, '2015-10-14 06:44:03', '2015-10-14', 1),
(179, 1, 116, '2015-10-14 12:25:27', '2015-10-14', 1),
(180, 1, 118, '2015-10-15 07:25:25', '2015-10-15', 1),
(183, 1, 128, '2015-10-15 11:23:07', '2015-10-15', 1),
(185, 9, 128, '2015-10-15 11:23:34', '2015-10-15', 1),
(186, 9, 127, '2015-10-15 11:23:48', '2015-10-15', 1),
(187, 9, 129, '2015-10-15 11:26:20', '2015-10-15', 1),
(188, 9, NULL, '2015-10-15 12:23:52', '2015-10-15', 1),
(189, 9, 131, '2015-10-15 12:24:02', '2015-10-15', 1),
(190, 9, NULL, '2015-10-15 12:26:37', '2015-10-15', 1),
(193, 1, 119, '2015-10-15 13:09:14', '2015-10-15', 1),
(194, 1, 141, '2015-10-18 11:20:53', '2015-10-18', 1),
(195, 1, 145, '2015-10-26 12:11:29', '2015-10-26', 1),
(196, 2, NULL, '2015-10-29 10:00:45', '2015-10-29', 1),
(197, 13, NULL, '2015-11-11 12:55:31', '2015-11-11', 1),
(198, 13, NULL, '2015-11-11 12:55:33', '2015-11-11', 1),
(199, 13, NULL, '2015-11-17 13:10:39', '2015-11-17', 1),
(200, 13, 194, '2015-11-19 09:29:42', '2015-11-19', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_likes_view`
--
CREATE TABLE IF NOT EXISTS `dostums_likes_view` (
`id` int(20)
,`user_id` int(20)
,`post_id` int(20)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_messages`
--

CREATE TABLE IF NOT EXISTS `dostums_messages` (
  `id` int(11) NOT NULL,
  `to_uid` int(20) DEFAULT NULL,
  `from_uid` int(20) DEFAULT NULL,
  `owner` int(20) NOT NULL,
  `input_by` int(11) NOT NULL,
  `message` text,
  `message_status` int(2) NOT NULL,
  `datetime` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_messages`
--

INSERT INTO `dostums_messages` (`id`, `to_uid`, `from_uid`, `owner`, `input_by`, `message`, `message_status`, `datetime`, `date`, `status`) VALUES
(1, 3, 1, 3, 1, 'hi test 1', 1, '2015-10-28 11:19:30', '2015-10-28', 1),
(2, 1, 3, 1, 1, 'hi test 1', 1, '2015-10-28 11:19:30', '2015-10-28', 2),
(3, 1, 3, 1, 3, 'hi test 2', 0, '2015-10-28 11:19:42', '2015-10-28', 1),
(4, 3, 1, 3, 3, 'hi test 2', 1, '2015-10-28 11:19:42', '2015-10-28', 2),
(5, 3, 1, 3, 1, 'hi test 1hi test 3', 1, '2015-10-28 11:19:55', '2015-10-28', 1),
(6, 1, 3, 1, 1, 'hi test 1hi test 3', 1, '2015-10-28 11:19:55', '2015-10-28', 2),
(7, 1, 3, 1, 3, 'hi test 4', 1, '2015-10-28 11:22:46', '2015-10-28', 1),
(8, 3, 1, 3, 3, 'hi test 4', 1, '2015-10-28 11:22:46', '2015-10-28', 2),
(9, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:43:46', '2015-10-28', 1),
(10, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:43:46', '2015-10-28', 2),
(11, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:44:19', '2015-10-28', 1),
(12, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:44:19', '2015-10-28', 2),
(13, 1, 3, 1, 3, 'hi test 4', 1, '2015-10-28 12:45:18', '2015-10-28', 1),
(14, 3, 1, 3, 3, 'hi test 4', 1, '2015-10-28 12:45:18', '2015-10-28', 2),
(15, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:45:48', '2015-10-28', 1),
(16, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:45:48', '2015-10-28', 2),
(17, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:46:31', '2015-10-28', 1),
(18, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:46:31', '2015-10-28', 2),
(19, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:46:53', '2015-10-28', 1),
(20, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:46:53', '2015-10-28', 2),
(21, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:46:54', '2015-10-28', 1),
(22, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:46:54', '2015-10-28', 2),
(23, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:46:54', '2015-10-28', 1),
(24, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:46:54', '2015-10-28', 2),
(25, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:46:55', '2015-10-28', 1),
(26, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:46:55', '2015-10-28', 2),
(27, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:46:55', '2015-10-28', 1),
(28, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:46:55', '2015-10-28', 2),
(29, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:46:55', '2015-10-28', 1),
(30, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:46:55', '2015-10-28', 2),
(31, 1, 2, 1, 2, 'hey', 1, '2015-10-28 12:46:55', '2015-10-28', 1),
(32, 2, 1, 2, 2, 'hey', 1, '2015-10-28 12:46:55', '2015-10-28', 2),
(33, 1, 2, 1, 2, 'taotou', 1, '2015-10-28 12:47:06', '2015-10-28', 1),
(34, 2, 1, 2, 2, 'taotou', 1, '2015-10-28 12:47:06', '2015-10-28', 2),
(35, 1, 2, 1, 2, 'vjdje8udjhoier8905', 1, '2015-10-28 12:47:21', '2015-10-28', 1),
(36, 2, 1, 2, 2, 'vjdje8udjhoier8905', 1, '2015-10-28 12:47:21', '2015-10-28', 2),
(37, 2, 1, 2, 1, 'ki likho ai gula', 1, '2015-10-28 12:47:34', '2015-10-28', 1),
(38, 1, 2, 1, 1, 'ki likho ai gula', 1, '2015-10-28 12:47:34', '2015-10-28', 2),
(39, 1, 2, 1, 2, 'alzabar', 1, '2015-10-28 12:47:54', '2015-10-28', 1),
(40, 2, 1, 2, 2, 'alzabar', 1, '2015-10-28 12:47:54', '2015-10-28', 2),
(41, 1, 2, 1, 2, 'hlwww', 1, '2015-10-28 12:48:08', '2015-10-28', 1),
(42, 2, 1, 2, 2, 'hlwww', 1, '2015-10-28 12:48:08', '2015-10-28', 2),
(43, 1, 2, 1, 2, 'hlwwwvaia', 1, '2015-10-28 12:48:10', '2015-10-28', 1),
(44, 2, 1, 2, 2, 'hlwwwvaia', 1, '2015-10-28 12:48:10', '2015-10-28', 2),
(45, 1, 2, 1, 2, 'hlwww', 1, '2015-10-28 12:48:21', '2015-10-28', 1),
(46, 2, 1, 2, 2, 'hlwww', 1, '2015-10-28 12:48:21', '2015-10-28', 2),
(47, 1, 2, 1, 2, 'hlwww teusjfgjdsf', 1, '2015-10-28 12:48:27', '2015-10-28', 1),
(48, 2, 1, 2, 2, 'hlwww teusjfgjdsf', 1, '2015-10-28 12:48:27', '2015-10-28', 2),
(49, 1, 2, 1, 2, 'kekoe', 1, '2015-10-28 12:50:36', '2015-10-28', 1),
(50, 2, 1, 2, 2, 'kekoe', 1, '2015-10-28 12:50:36', '2015-10-28', 2),
(51, 1, 2, 1, 2, 'ssssssssssssssssss', 1, '2015-10-28 12:51:40', '2015-10-28', 1),
(52, 2, 1, 2, 2, 'ssssssssssssssssss', 1, '2015-10-28 12:51:40', '2015-10-28', 2),
(53, 1, 2, 1, 2, 'huhuuu', 1, '2015-10-28 12:51:49', '2015-10-28', 1),
(54, 2, 1, 2, 2, 'huhuuu', 1, '2015-10-28 12:51:49', '2015-10-28', 2),
(55, 1, 2, 1, 2, 'huhuuu', 1, '2015-10-28 12:51:49', '2015-10-28', 1),
(56, 2, 1, 2, 2, 'huhuuu', 1, '2015-10-28 12:51:49', '2015-10-28', 2),
(57, 1, 2, 1, 2, 'hello vaia', 1, '2015-10-28 12:52:03', '2015-10-28', 1),
(58, 2, 1, 2, 2, 'hello vaia', 1, '2015-10-28 12:52:03', '2015-10-28', 2),
(59, 1, 2, 1, 2, 'fahad vaia ', 1, '2015-10-28 12:52:16', '2015-10-28', 1),
(60, 2, 1, 2, 2, 'fahad vaia ', 1, '2015-10-28 12:52:16', '2015-10-28', 2),
(61, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:53:59', '2015-10-28', 1),
(62, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:53:59', '2015-10-28', 2),
(63, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:54:03', '2015-10-28', 1),
(64, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:54:03', '2015-10-28', 2),
(65, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:54:06', '2015-10-28', 1),
(66, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:54:06', '2015-10-28', 2),
(67, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:54:07', '2015-10-28', 1),
(68, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:54:07', '2015-10-28', 2),
(69, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:54:07', '2015-10-28', 1),
(70, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:54:07', '2015-10-28', 2),
(71, 2, 1, 2, 1, 'dfsdf', 1, '2015-10-28 12:54:53', '2015-10-28', 1),
(72, 1, 2, 1, 1, 'dfsdf', 1, '2015-10-28 12:54:53', '2015-10-28', 2),
(73, 2, 1, 2, 1, 'dfsdf', 1, '2015-10-28 12:54:55', '2015-10-28', 1),
(74, 1, 2, 1, 1, 'dfsdf', 1, '2015-10-28 12:54:55', '2015-10-28', 2),
(75, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:56:50', '2015-10-28', 1),
(76, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:56:50', '2015-10-28', 2),
(77, 2, 1, 2, 1, 'hi', 1, '2015-10-28 12:57:13', '2015-10-28', 1),
(78, 1, 2, 1, 1, 'hi', 1, '2015-10-28 12:57:13', '2015-10-28', 2),
(79, 1, 2, 1, 2, 'goodddd', 1, '2015-10-28 12:57:33', '2015-10-28', 1),
(80, 2, 1, 2, 2, 'goodddd', 1, '2015-10-28 12:57:33', '2015-10-28', 2),
(81, 1, 2, 1, 2, 'sddf', 1, '2015-10-28 13:07:15', '2015-10-28', 1),
(82, 2, 1, 2, 2, 'sddf', 1, '2015-10-28 13:07:15', '2015-10-28', 2),
(83, 2, 1, 2, 1, 'hi', 1, '2015-10-28 13:07:28', '2015-10-28', 1),
(84, 1, 2, 1, 1, 'hi', 1, '2015-10-28 13:07:28', '2015-10-28', 2),
(85, 2, 1, 2, 1, 'hello', 1, '2015-10-28 13:07:37', '2015-10-28', 1),
(86, 1, 2, 1, 1, 'hello', 1, '2015-10-28 13:07:37', '2015-10-28', 2),
(87, 1, 2, 1, 2, 'tun', 1, '2015-10-28 13:14:23', '2015-10-28', 1),
(88, 2, 1, 2, 2, 'tun', 1, '2015-10-28 13:14:23', '2015-10-28', 2),
(89, 2, 1, 2, 1, 'hi', 1, '2015-10-28 13:19:54', '2015-10-28', 1),
(90, 1, 2, 1, 1, 'hi', 1, '2015-10-28 13:19:54', '2015-10-28', 2),
(91, 2, 1, 2, 1, 'hi', 1, '2015-10-28 13:25:35', '2015-10-28', 1),
(92, 1, 2, 1, 1, 'hi', 1, '2015-10-28 13:25:35', '2015-10-28', 2),
(93, 2, 1, 2, 1, 'hi', 1, '2015-10-28 13:32:56', '2015-10-28', 1),
(94, 1, 2, 1, 1, 'hi', 1, '2015-10-28 13:32:56', '2015-10-28', 2),
(95, 2, 1, 2, 1, 'hi this is time test', 1, '2015-10-28 13:35:39', '2015-10-28', 1),
(96, 1, 2, 1, 1, 'hi this is time test', 1, '2015-10-28 13:35:39', '2015-10-28', 2),
(97, 2, 1, 2, 1, 'hi', 1, '2015-10-28 13:36:25', '2015-10-28', 1),
(98, 1, 2, 1, 1, 'hi', 1, '2015-10-28 13:36:25', '2015-10-28', 2),
(99, 2, 1, 2, 1, 'hi i am fahad', 1, '2015-10-28 13:36:45', '2015-10-28', 1),
(100, 1, 2, 1, 1, 'hi i am fahad', 1, '2015-10-28 13:36:45', '2015-10-28', 2),
(101, 2, 1, 2, 1, 'hi this is data', 1, '2015-10-28 13:38:13', '2015-10-28', 1),
(102, 1, 2, 1, 1, 'hi this is data', 1, '2015-10-28 15:38:13', '2015-10-28', 2),
(103, 2, 1, 2, 1, 'oi', 1, '2015-10-28 13:45:19', '2015-10-28', 1),
(104, 1, 2, 1, 1, 'oi', 1, '2015-10-28 13:45:19', '2015-10-28', 2),
(105, 2, 1, 2, 1, 'kamon aso', 1, '2015-10-28 13:45:27', '2015-10-28', 1),
(106, 1, 2, 1, 1, 'kamon aso', 1, '2015-10-28 13:45:27', '2015-10-28', 2),
(107, 2, 1, 2, 1, 'hi', 1, '2015-10-28 13:46:56', '2015-10-28', 1),
(108, 1, 2, 1, 1, 'hi', 1, '2015-10-28 13:46:56', '2015-10-28', 2),
(109, 2, 1, 2, 1, 'oiye', 1, '2015-10-28 13:47:06', '2015-10-28', 1),
(110, 1, 2, 1, 1, 'oiye', 1, '2015-10-28 13:47:06', '2015-10-28', 2),
(111, 2, 1, 2, 1, 'bye the way i have to fix cookie', 1, '2015-10-28 14:03:27', '2015-10-28', 1),
(112, 1, 2, 1, 1, 'bye the way i have to fix cookie', 1, '2015-10-28 14:03:27', '2015-10-28', 2),
(113, 2, 1, 2, 1, 'hi', 1, '2015-10-29 07:06:13', '2015-10-29', 1),
(114, 1, 2, 1, 1, 'hi', 1, '2015-10-29 07:06:13', '2015-10-29', 2),
(115, 9, 1, 9, 1, 'hi', 1, '2015-10-29 07:32:25', '2015-10-29', 1),
(116, 1, 9, 1, 1, 'hi', 1, '2015-10-29 07:32:25', '2015-10-29', 2),
(117, 2, 1, 2, 1, 'hi', 1, '2015-10-29 07:50:56', '2015-10-29', 1),
(118, 1, 2, 1, 1, 'hi', 1, '2015-10-29 07:50:56', '2015-10-29', 2),
(119, 9, 1, 9, 1, 'hi', 1, '2015-10-29 07:51:50', '2015-10-29', 1),
(120, 1, 9, 1, 1, 'hi', 1, '2015-10-29 07:51:50', '2015-10-29', 2),
(121, 3, 1, 3, 1, 'hi buddy', 1, '2015-10-29 07:53:34', '2015-10-29', 1),
(122, 1, 3, 1, 1, 'hi buddy', 1, '2015-10-29 07:53:34', '2015-10-29', 2),
(123, 3, 1, 3, 1, 'hi', 1, '2015-10-29 07:55:09', '2015-10-29', 1),
(124, 1, 3, 1, 1, 'hi', 1, '2015-10-29 07:55:09', '2015-10-29', 2),
(125, 9, 1, 9, 1, 'babu kamon aso', 1, '2015-10-29 07:55:29', '2015-10-29', 1),
(126, 1, 9, 1, 1, 'babu kamon aso', 1, '2015-10-29 07:55:29', '2015-10-29', 2),
(127, 9, 1, 9, 1, 'oio', 1, '2015-10-29 07:55:44', '2015-10-29', 1),
(128, 1, 9, 1, 1, 'oio', 1, '2015-10-29 07:55:44', '2015-10-29', 2),
(129, 1, 2, 1, 2, 'keu]', 1, '2015-10-29 07:58:02', '2015-10-29', 1),
(130, 2, 1, 2, 2, 'keu]', 1, '2015-10-29 07:58:02', '2015-10-29', 2),
(131, 1, 2, 1, 2, 'vua', 1, '2015-10-29 07:58:15', '2015-10-29', 1),
(132, 2, 1, 2, 2, 'vua', 1, '2015-10-29 07:58:15', '2015-10-29', 2),
(133, 1, 2, 1, 2, ':/', 1, '2015-10-29 07:58:32', '2015-10-29', 1),
(134, 2, 1, 2, 2, ':/', 1, '2015-10-29 07:58:32', '2015-10-29', 2),
(135, 2, 1, 2, 1, 'hi', 1, '2015-10-29 07:58:43', '2015-10-29', 1),
(136, 1, 2, 1, 1, 'hi', 1, '2015-10-29 07:58:43', '2015-10-29', 2),
(137, 1, 2, 1, 2, 'abrajabra', 0, '2015-10-29 08:30:24', '2015-10-29', 1),
(138, 2, 1, 2, 2, 'abrajabra', 0, '2015-10-29 08:30:24', '2015-10-29', 2),
(139, 2, 1, 2, 1, 'hi', 0, '2015-10-29 08:30:30', '2015-10-29', 1),
(140, 1, 2, 1, 1, 'hi', 0, '2015-10-29 08:30:30', '2015-10-29', 2),
(141, 1, 2, 1, 2, 'kawokawo', 0, '2015-10-29 08:30:32', '2015-10-29', 1),
(142, 2, 1, 2, 2, 'kawokawo', 0, '2015-10-29 08:30:32', '2015-10-29', 2),
(143, 1, 2, 1, 2, 'taowtou', 0, '2015-10-29 08:30:38', '2015-10-29', 1),
(144, 2, 1, 2, 2, 'taowtou', 0, '2015-10-29 08:30:38', '2015-10-29', 2),
(145, 1, 2, 1, 2, 'hihihihib', 0, '2015-10-29 08:30:46', '2015-10-29', 1),
(146, 2, 1, 2, 2, 'hihihihib', 0, '2015-10-29 08:30:46', '2015-10-29', 2),
(147, 1, 2, 1, 2, 'habijabi habji', 0, '2015-10-29 08:30:56', '2015-10-29', 1),
(148, 2, 1, 2, 2, 'habijabi habji', 0, '2015-10-29 08:30:56', '2015-10-29', 2),
(149, 1, 2, 1, 2, 'kaijfduierfhfvhbrue', 0, '2015-10-29 09:02:05', '2015-10-29', 1),
(150, 2, 1, 2, 2, 'kaijfduierfhfvhbrue', 1, '2015-10-29 09:02:05', '2015-10-29', 2),
(151, 2, 1, 2, 1, 'hi', 0, '2015-10-29 09:02:08', '2015-10-29', 1),
(152, 1, 2, 1, 1, 'hi', 1, '2015-10-29 09:02:08', '2015-10-29', 2),
(153, 1, 2, 1, 2, 'dhkfjdergibveiu', 0, '2015-10-29 09:02:12', '2015-10-29', 1),
(154, 2, 1, 2, 2, 'dhkfjdergibveiu', 1, '2015-10-29 09:02:12', '2015-10-29', 2),
(155, 2, 1, 2, 1, 'hi', 0, '2015-10-29 09:05:13', '2015-10-29', 1),
(156, 1, 2, 1, 1, 'hi', 1, '2015-10-29 09:05:13', '2015-10-29', 2),
(157, 9, 1, 9, 1, 'oi', 0, '2015-10-29 09:05:47', '2015-10-29', 1),
(158, 1, 9, 1, 1, 'oi', 1, '2015-10-29 09:05:47', '2015-10-29', 2),
(159, 1, 2, 1, 2, '', 0, '2015-10-29 09:22:22', '2015-10-29', 1),
(160, 2, 1, 2, 2, '', 1, '2015-10-29 09:22:22', '2015-10-29', 2),
(161, 1, 2, 1, 2, 'item_name', 0, '2015-10-29 09:22:26', '2015-10-29', 1),
(162, 2, 1, 2, 2, 'item_name', 1, '2015-10-29 09:22:26', '2015-10-29', 2),
(163, 1, 2, 1, 2, 'color', 0, '2015-10-29 09:22:33', '2015-10-29', 1),
(164, 2, 1, 2, 2, 'color', 1, '2015-10-29 09:22:33', '2015-10-29', 2),
(165, 1, 2, 1, 2, 'lipstick', 0, '2015-10-29 09:22:44', '2015-10-29', 1),
(166, 2, 1, 2, 2, 'lipstick', 1, '2015-10-29 09:22:44', '2015-10-29', 2),
(167, 1, 2, 1, 2, 'hi', 0, '2015-10-29 09:24:47', '2015-10-29', 1),
(168, 2, 1, 2, 2, 'hi', 1, '2015-10-29 09:24:47', '2015-10-29', 2),
(169, 1, 2, 1, 2, 'hello', 0, '2015-10-29 09:24:50', '2015-10-29', 1),
(170, 2, 1, 2, 2, 'hello', 1, '2015-10-29 09:24:50', '2015-10-29', 2),
(171, 1, 2, 1, 2, 'good', 0, '2015-10-29 09:24:54', '2015-10-29', 1),
(172, 2, 1, 2, 2, 'good', 1, '2015-10-29 09:24:54', '2015-10-29', 2),
(173, 1, 2, 1, 2, 'very good', 0, '2015-10-29 09:24:58', '2015-10-29', 1),
(174, 2, 1, 2, 2, 'very good', 1, '2015-10-29 09:24:58', '2015-10-29', 2),
(175, 1, 2, 1, 2, 'hi', 0, '2015-10-29 09:25:05', '2015-10-29', 1),
(176, 2, 1, 2, 2, 'hi', 1, '2015-10-29 09:25:05', '2015-10-29', 2),
(177, 1, 2, 1, 2, 'hey', 0, '2015-10-29 09:25:10', '2015-10-29', 1),
(178, 2, 1, 2, 2, 'hey', 1, '2015-10-29 09:25:10', '2015-10-29', 2),
(179, 2, 1, 2, 1, 'hi', 0, '2015-10-29 09:25:15', '2015-10-29', 1),
(180, 1, 2, 1, 1, 'hi', 1, '2015-10-29 09:25:15', '2015-10-29', 2),
(181, 1, 2, 1, 2, 'done', 0, '2015-10-29 09:25:15', '2015-10-29', 1),
(182, 2, 1, 2, 2, 'done', 1, '2015-10-29 09:25:15', '2015-10-29', 2),
(183, 1, 2, 1, 2, 'good ', 0, '2015-10-29 09:25:23', '2015-10-29', 1),
(184, 2, 1, 2, 2, 'good ', 1, '2015-10-29 09:25:23', '2015-10-29', 2),
(185, 1, 2, 1, 2, '', 0, '2015-10-29 09:25:23', '2015-10-29', 1),
(186, 2, 1, 2, 2, '', 1, '2015-10-29 09:25:23', '2015-10-29', 2),
(187, 2, 1, 2, 1, 'done', 0, '2015-10-29 09:25:23', '2015-10-29', 1),
(188, 1, 2, 1, 1, 'done', 1, '2015-10-29 09:25:23', '2015-10-29', 2),
(189, 1, 2, 1, 2, 'hlw', 0, '2015-10-29 10:45:08', '2015-10-29', 1),
(190, 2, 1, 2, 2, 'hlw', 1, '2015-10-29 10:45:08', '2015-10-29', 2),
(191, 1, 2, 1, 2, 'gooooooooddddd', 0, '2015-10-29 10:45:17', '2015-10-29', 1),
(192, 2, 1, 2, 2, 'gooooooooddddd', 1, '2015-10-29 10:45:17', '2015-10-29', 2),
(193, 2, 1, 2, 1, 'jan oo baby', 0, '2015-10-29 10:45:21', '2015-10-29', 1),
(194, 1, 2, 1, 1, 'jan oo baby', 1, '2015-10-29 10:45:21', '2015-10-29', 2),
(195, 1, 2, 1, 2, 'chi', 0, '2015-10-29 10:45:28', '2015-10-29', 1),
(196, 2, 1, 2, 2, 'chi', 1, '2015-10-29 10:45:28', '2015-10-29', 2),
(197, 2, 1, 2, 1, 'jan ooo baby pore lal shari', 0, '2015-10-29 10:45:38', '2015-10-29', 1),
(198, 1, 2, 1, 1, 'jan ooo baby pore lal shari', 1, '2015-10-29 10:45:38', '2015-10-29', 2),
(199, 2, 1, 2, 1, 'jan oo babeeeey', 0, '2015-10-29 10:47:41', '2015-10-29', 1),
(200, 1, 2, 1, 1, 'jan oo babeeeey', 1, '2015-10-29 10:47:41', '2015-10-29', 2),
(201, 1, 2, 1, 2, 'chi', 0, '2015-10-29 10:49:43', '2015-10-29', 1),
(202, 2, 1, 2, 2, 'chi', 1, '2015-10-29 10:49:43', '2015-10-29', 2),
(203, 2, 1, 2, 1, 'ami to tumar fan', 0, '2015-10-29 10:50:11', '2015-10-29', 1),
(204, 1, 2, 1, 1, 'ami to tumar fan', 1, '2015-10-29 10:50:11', '2015-10-29', 2),
(205, 2, 1, 2, 1, 'oi ... fan kano hobo', 0, '2015-10-29 10:51:06', '2015-10-29', 1),
(206, 1, 2, 1, 1, 'oi ... fan kano hobo', 1, '2015-10-29 10:51:06', '2015-10-29', 2),
(207, 2, 1, 2, 1, 'hi', 0, '2015-10-29 10:51:21', '2015-10-29', 1),
(208, 1, 2, 1, 1, 'hi', 1, '2015-10-29 10:51:21', '2015-10-29', 2),
(209, 2, 1, 2, 1, 'hi ', 0, '2015-10-29 10:51:22', '2015-10-29', 1),
(210, 1, 2, 1, 1, 'hi ', 1, '2015-10-29 10:51:22', '2015-10-29', 2),
(211, 2, 1, 2, 1, 'hi 3', 0, '2015-10-29 10:51:24', '2015-10-29', 1),
(212, 1, 2, 1, 1, 'hi 3', 1, '2015-10-29 10:51:24', '2015-10-29', 2),
(213, 2, 1, 2, 1, 'hi 4', 0, '2015-10-29 10:51:27', '2015-10-29', 1),
(214, 1, 2, 1, 1, 'hi 4', 1, '2015-10-29 10:51:27', '2015-10-29', 2),
(215, 1, 2, 1, 2, ':L/', 0, '2015-10-29 10:51:49', '2015-10-29', 1),
(216, 2, 1, 2, 2, ':L/', 1, '2015-10-29 10:51:49', '2015-10-29', 2),
(217, 1, 2, 1, 2, ':/', 0, '2015-10-29 10:51:52', '2015-10-29', 1),
(218, 2, 1, 2, 2, ':/', 1, '2015-10-29 10:51:52', '2015-10-29', 2),
(219, 9, 1, 9, 1, 'ji', 0, '2015-10-29 13:22:46', '2015-10-29', 1),
(220, 1, 9, 1, 1, 'ji', 1, '2015-10-29 13:22:46', '2015-10-29', 2),
(221, 2, 1, 2, 1, 'hi', 0, '2015-11-01 08:17:05', '2015-11-01', 1),
(222, 1, 2, 1, 1, 'hi', 1, '2015-11-01 08:17:05', '2015-11-01', 2),
(223, 3, 1, 3, 1, 'hi', 0, '2015-11-02 13:16:57', '2015-11-02', 1),
(224, 1, 3, 1, 1, 'hi', 1, '2015-11-02 13:16:57', '2015-11-02', 2),
(225, 3, 1, 3, 1, 'i am dvl', 0, '2015-11-02 13:17:14', '2015-11-02', 1),
(226, 1, 3, 1, 1, 'i am dvl', 1, '2015-11-02 13:17:14', '2015-11-02', 2),
(227, 3, 1, 3, 1, 'i am dvl', 0, '2015-11-02 13:17:19', '2015-11-02', 1),
(228, 1, 3, 1, 1, 'i am dvl', 1, '2015-11-02 13:17:19', '2015-11-02', 2),
(229, 3, 1, 3, 1, 'hi', 0, '2015-11-02 13:18:09', '2015-11-02', 1),
(230, 1, 3, 1, 1, 'hi', 1, '2015-11-02 13:18:09', '2015-11-02', 2),
(231, 3, 1, 3, 1, 'hi', 0, '2015-11-02 13:18:15', '2015-11-02', 1),
(232, 1, 3, 1, 1, 'hi', 1, '2015-11-02 13:18:15', '2015-11-02', 2),
(233, 2, 1, 2, 1, 'hi ff', 0, '2015-11-02 13:20:12', '2015-11-02', 1),
(234, 1, 2, 1, 1, 'hi ff', 1, '2015-11-02 13:20:12', '2015-11-02', 2),
(235, 3, 1, 3, 1, 'sdfsd sdf', 0, '2015-11-02 13:20:41', '2015-11-02', 1),
(236, 1, 3, 1, 1, 'sdfsd sdf', 1, '2015-11-02 13:20:41', '2015-11-02', 2),
(237, 3, 1, 3, 1, 'dfg dfgdfgdfg', 0, '2015-11-02 13:21:49', '2015-11-02', 1),
(238, 1, 3, 1, 1, 'dfg dfgdfgdfg', 1, '2015-11-02 13:21:49', '2015-11-02', 2),
(239, 3, 1, 3, 1, 'dfg dfgdf g', 0, '2015-11-02 13:21:52', '2015-11-02', 1),
(240, 1, 3, 1, 1, 'dfg dfgdf g', 1, '2015-11-02 13:21:52', '2015-11-02', 2),
(241, 3, 1, 3, 1, 'bnmjgbvnvbn', 0, '2015-11-02 13:21:55', '2015-11-02', 1),
(242, 1, 3, 1, 1, 'bnmjgbvnvbn', 1, '2015-11-02 13:21:55', '2015-11-02', 2),
(243, 3, 1, 3, 1, 'hi \n', 0, '2015-11-02 13:22:26', '2015-11-02', 1),
(244, 1, 3, 1, 1, 'hi \n', 1, '2015-11-02 13:22:26', '2015-11-02', 2),
(245, 3, 1, 3, 1, 'hui\n', 0, '2015-11-02 13:26:36', '2015-11-02', 1),
(246, 1, 3, 1, 1, 'hui\n', 1, '2015-11-02 13:26:36', '2015-11-02', 2),
(247, 3, 1, 3, 1, 'hi', 0, '2015-11-02 13:26:44', '2015-11-02', 1),
(248, 1, 3, 1, 1, 'hi', 1, '2015-11-02 13:26:44', '2015-11-02', 2),
(249, 3, 1, 3, 1, 'hi\n', 0, '2015-11-02 13:28:11', '2015-11-02', 1),
(250, 1, 3, 1, 1, 'hi\n', 1, '2015-11-02 13:28:11', '2015-11-02', 2),
(251, 3, 1, 3, 1, 'hi\n', 0, '2015-11-02 13:30:48', '2015-11-02', 1),
(252, 1, 3, 1, 1, 'hi\n', 1, '2015-11-02 13:30:48', '2015-11-02', 2),
(253, 3, 1, 3, 1, 'hi buddy', 0, '2015-11-02 13:30:58', '2015-11-02', 1),
(254, 1, 3, 1, 1, 'hi buddy', 1, '2015-11-02 13:30:58', '2015-11-02', 2),
(255, 3, 1, 3, 1, 'hi there?\n', 0, '2015-11-02 13:34:20', '2015-11-02', 1),
(256, 1, 3, 1, 1, 'hi there?\n', 1, '2015-11-02 13:34:20', '2015-11-02', 2),
(257, 2, 1, 2, 1, 'hi there?\n', 0, '2015-11-02 13:34:46', '2015-11-02', 1),
(258, 1, 2, 1, 1, 'hi there?\n', 1, '2015-11-02 13:34:46', '2015-11-02', 2),
(259, 3, 1, 3, 1, 'hi bb', 0, '2015-11-02 13:35:50', '2015-11-02', 1),
(260, 1, 3, 1, 1, 'hi bb', 1, '2015-11-02 13:35:50', '2015-11-02', 2),
(261, 3, 1, 3, 1, 'hi', 0, '2015-11-02 13:42:40', '2015-11-02', 1),
(262, 1, 3, 1, 1, 'hi', 1, '2015-11-02 13:42:40', '2015-11-02', 2),
(263, 3, 1, 3, 1, 'gg', 0, '2015-11-02 13:42:46', '2015-11-02', 1),
(264, 1, 3, 1, 1, 'gg', 1, '2015-11-02 13:42:46', '2015-11-02', 2),
(265, 3, 1, 3, 1, 'hi', 0, '2015-11-02 13:52:20', '2015-11-02', 1),
(266, 1, 3, 1, 1, 'hi', 1, '2015-11-02 13:52:20', '2015-11-02', 2),
(267, 1, 2, 1, 2, 'yes im there\n\n\n', 0, '2015-11-03 07:09:44', '2015-11-03', 1),
(268, 2, 1, 2, 2, 'yes im there\n\n\n', 1, '2015-11-03 07:09:44', '2015-11-03', 2),
(269, 1, 2, 1, 2, 'dostums \n\n\n', 0, '2015-11-03 07:11:02', '2015-11-03', 1),
(270, 2, 1, 2, 2, 'dostums \n\n\n', 1, '2015-11-03 07:11:02', '2015-11-03', 2),
(271, 1, 2, 1, 2, 'rinayt fahad', 0, '2015-11-03 12:21:37', '2015-11-03', 1),
(272, 2, 1, 2, 2, 'rinayt fahad', 1, '2015-11-03 12:21:37', '2015-11-03', 2),
(273, 1, 2, 1, 2, 'rinat fahad', 0, '2015-11-03 12:21:53', '2015-11-03', 1),
(274, 2, 1, 2, 2, 'rinat fahad', 1, '2015-11-03 12:21:53', '2015-11-03', 2),
(275, 1, 2, 1, 2, ':D', 0, '2015-11-03 12:21:59', '2015-11-03', 1),
(276, 2, 1, 2, 2, ':D', 1, '2015-11-03 12:21:59', '2015-11-03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_notice`
--

CREATE TABLE IF NOT EXISTS `dostums_notice` (
  `id` int(20) NOT NULL,
  `notice_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `notice_details` text CHARACTER SET utf8,
  `notice_image` text,
  `notice_date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_notice`
--

INSERT INTO `dostums_notice` (`id`, `notice_title`, `notice_details`, `notice_image`, `notice_date`, `date`, `status`) VALUES
(4, 'বাংলাদেশিদের লিবিয়ায় না যেতে সতর্কতা', 'বাংলাদেশিদের লিবিয়ায় না যেতে কঠোরভাবে সতর্ক করেছে পররাষ্ট্র মন্ত্রণালয়। আজ বৃহস্পতিবার মন্ত্রণালয়ের এক সংবাদ বিজ্ঞপ্তিতে এ কথা বলা হয়।\r\nলিবিয়ায় কয়েক বছর ধরে সংঘাত চলছে। সাম্প্রতিক সময়ে পরিস্থিতি আরও খারাপ হওয়ায় মন্ত্রণালয় এই সতর্কতা দিয়েছে। পরবর্তী নির্দেশ না দেওয়া পর্যন্ত এই সতর্কতা বলবৎ​ থাকবে', 'notice_image_upload__1444284216_1444284216.JPG', 'September 10, 2015', '2015-10-08', 1),
(5, 'এক ঝলক', ' কী সুন্দর সাদা শাপলা! গতকাল সকালে খুলনার দিঘলিয়া উপজেলার গোয়ালপাড়া গ্রাম থেকে তোলা। ছবি: সাদ্দাম হোসেন', 'notice_image_upload__1444284356_1444284356.jpg', '০৮ অক্টোবর ২০১৫', '2015-10-08', 1),
(6, 'তিন দিনের রিমান্ডে শাহাদাত', 'ঢাকা: গৃহকর্মী নির্যাতনের মামলায় জাতীয় দলের পেসার শাহাদাত হোসেন রাজীবকে তিন দিনের রিমান্ডে নিতে নির্দেশ দিয়েছেন আদালত। সকালে - See more at: http://www.dhakatimes24.com/2015/10/08/86139/%E0%A6%A4%E0%A6%BF%E0%A6%A8-%E0%A6%A6%E0%A6%BF%E0%A6%A8%E0%A7%87%E0%A6%B0-%E0%A6%B0%E0%A6%BF%E0%A6%AE%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%A1%E0%A7%87-%E0%A6%B6%E0%A6%BE%E0%A6%B9%E0%A6%BE%E0%A6%A6%E0%A6%BE%E0%A6%A4#sthash.jayhPHEK.dpuf', 'notice_image_upload__1444284700_1444284700.jpg', ' ০৮ অক্টোবর, ২০১৫ ১১:৫০:৪৭', '2015-10-08', 1),
(7, 'বদির আবেদন ফেরত দিল হাইকোর্ট', 'ঢাকা: দুর্নীতি দমন কমিশন (দুদকের) করা জ্ঞাত-আয় বহির্ভূত সম্পদ অর্জনের অভিযোগের মামলা বাতিল চেয়ে সংসদ সদস্য আব্দুর রহমান বদির আবেদন ফেরত দিয়েছে হাইকোর্ট।\r\n\r\n\r\nআজ বুধবার বিচারপতি মো. হাবিবুল গনি ও কামরুল কাদেরের সমন্বয়ে গঠিত হাইকোর্ট বেঞ্চ প্রাথমিক শুনানি শেষে এ আদেশ দেন। এর ফলে নিম্ন আদালতে তার বিরুদ্ধে দুর্নীতির মামলা চলতে আর কোনো বাধা নেই বলে জানিয়েছেন আইনজীবীরা।\r\n- See more at: http://www.dhakatimes24.com/2015/10/07/86074/%E0%A6%AC%E0%A6%A6%E0%A6%BF%E0%A6%B0-%E0%A6%86%E0%A6%AC%E0%A7%87%E0%A6%A6%E0%A6%A8-%E0%A6%AB%E0%A7%87%E0%A6%B0%E0%A6%A4-%E0%A6%A6%E0%A6%BF%E0%A6%B2-%E0%A6%B9%E0%A6%BE%E0%A6%87%E0%A6%95%E0%A7%8B%E0%A6%B0%E0%A7%8D%E0%A6%9F#sthash.ZiaCU7K6.dpuf', 'notice_image_upload__1444284881_1444284881.jpg', '০৭ অক্টোবর, ২০১৫', '2015-10-08', 1),
(8, 'ইয়েমেনে বিয়ে বাড়িতে বিমান হামলা, নিহত ১৩', 'ইয়েমেনের সানবান শহরে একটি বিয়ে বাড়িতে বিমান হামলায় ১৩ জন নিহত হয়েছে। বুধবার এই হামলার ঘটনা ঘটে।\r\n\r\n\r\nখবর বিবিসির।\r\n\r\n\r\nজানা গেছে, রাজধানী সানা থেকে ১০০ কিলোমিটার দক্ষিণ-পূর্বে সানবান শহরে এ হামলার ঘটনা ঘটে। গত মাসে রেড সি বন্দরের কাছে অনুরূপ একটি বিমান হামলায় ১৩০ জন মারা যায়। ওই হামলার জন্য কোয়ালিশন বাহিনীকে দায়ী করা হলেও তারা হামলার দায় স্বীকার করেনি।\r\n\r\n\r\nসর্বশেষ সানবানের বিয়ের অনুষ্ঠানের বিমান হামলার দায়িত্ব কেউ স্বীকার করেনি।\r\n\r\n- See more at: http://www.dhakatimes24.com/2015/10/08/86150/%E0%A6%87%E0%A7%9F%E0%A7%87%E0%A6%AE%E0%A7%87%E0%A6%A8%E0%A7%87-%E0%A6%AC%E0%A6%BF%E0%A7%9F%E0%A7%87-%E0%A6%AC%E0%A6%BE%E0%A7%9C%E0%A6%BF%E0%A6%A4%E0%A7%87-%E0%A6%AC%E0%A6%BF%E0%A6%AE%E0%A6%BE%E0%A6%A8-%E0%A6%B9%E0%A6%BE%E0%A6%AE%E0%A6%B2%E0%A6%BE,-%E0%A6%A8%E0%A6%BF%E0%A6%B9%E0%A6%A4-%E0%A7%A7%E0%A7%A9#sthash.LUps7fLR.dpuf', 'notice_image_upload__1444285016_1444285016.jpg', '০৮ অক্টোবর, ২০১৫', '2015-10-08', 1),
(9, 'চালকের লম্বা ঘুম ও ট্রেনের বিলম্ব যাত্রা', 'ঢাকা: একজন চালক যদি সারারাত ট্রেন চালিয়ে আসে, আবার ঘণ্টা দেড়েক বাদে তাকে ফের ট্রেন নিয়ে ছুটতে হয়, তাহলে তো সে ক্লান্ত হয়ে ঘুমিয়ে পড়তেই পারে। যাত্রীরা ট্রেনের কম্পার্টমেন্টে অপেক্ষারত, আর চালক তার আসনে বসে নাক ডেকে ঘুমাচ্ছেন। যাত্রীদের চিৎকার চেচামেচি এবং স্টেশনে হকারদের ডাকাডাকির শব্দও তার ঘুমে ব্যাঘাত ঘটাতে পরেনি বিন্দুমাত্র।   \r\n- See more at: http://www.dhakatimes24.com/2015/10/08/86149/%E0%A6%9A%E0%A6%BE%E0%A6%B2%E0%A6%95%E0%A7%87%E0%A6%B0-%E0%A6%B2%E0%A6%AE%E0%A7%8D%E0%A6%AC%E0%A6%BE-%E0%A6%98%E0%A7%81%E0%A6%AE-%E0%A6%93-%E0%A6%9F%E0%A7%8D%E0%A6%B0%E0%A7%87%E0%A6%A8%E0%A7%87%E0%A6%B0-%E0%A6%AC%E0%A6%BF%E0%A6%B2%E0%A6%AE%E0%A7%8D%E0%A6%AC-%E0%A6%AF%E0%A6%BE%E0%A6%A4%E0%A7%8D%E0%A6%B0%E0%A6%BE#sthash.Nx6E0HMu.dpuf', 'notice_image_upload__1444285076_1444285076.jpg', '০৮ অক্টোবর, ২০১৫ ', '2015-10-08', 1),
(10, 'বাড়ছে শাইনপুকুরের দাম, কারণ জানা নেই ডিএসইর', 'ঢাকা: টানা এক মাস ধরে পুঁজিবাজারে তালিকাভুক্ত শাইনপুকুর সিরামিকসের দর বাড়লেও এর পেছনে অপ্রকাশিত কোনো মূল্য সংবেদনশীল তথ্য নেই। অর্থাৎ দর বাড়ার পেছনে কোনো কারণ কোম্পানিটির জানা নেই।\r\n\r\n\r\nঢাকা স্টক এক্সচেঞ্জ (ডিএসই) সূত্র এ তথ্য জানিয়েছে।\r\n- See more at: http://www.dhakatimes24.com/2015/10/08/86148/%E0%A6%AC%E0%A6%BE%E0%A7%9C%E0%A6%9B%E0%A7%87-%E0%A6%B6%E0%A6%BE%E0%A6%87%E0%A6%A8%E0%A6%AA%E0%A7%81%E0%A6%95%E0%A7%81%E0%A6%B0%E0%A7%87%E0%A6%B0-%E0%A6%A6%E0%A6%BE%E0%A6%AE,-%E0%A6%95%E0%A6%BE%E0%A6%B0%E0%A6%A3-%E0%A6%9C%E0%A6%BE%E0%A6%A8%E0%A6%BE-%E0%A6%A8%E0%A7%87%E0%A6%87-%E0%A6%A1%E0%A6%BF%E0%A6%8F%E0%A6%B8%E0%A6%87%E0%A6%B0#sthash.aERPy3el.dpuf', 'notice_image_upload__1444285169_1444285169.jpg', '০৮ অক্টোবর, ২০১৫', '2015-10-08', 1),
(11, 'লালমনিরহাটে আগুনে বেকারি পুড়ে ছাই', 'লালমনিরহাট: লালমনিরহাটের হাতীবান্ধা উপজেলায় বৈদ্যুতিক শর্টসার্কিট থেকে সৃষ্ট আগুনে একটি বেকারি পুড়ে ছাই হয়ে গেছে।\r\n\r\n\r\nবৃহস্পতিবার ভোরে উপজেলার রেলস্টেশন এলাকায় এ অগ্নিকাণ্ডের ঘটনা ঘটে।\r\n- See more at: http://www.dhakatimes24.com/2015/10/08/86145/%E0%A6%B2%E0%A6%BE%E0%A6%B2%E0%A6%AE%E0%A6%A8%E0%A6%BF%E0%A6%B0%E0%A6%B9%E0%A6%BE%E0%A6%9F%E0%A7%87-%E0%A6%86%E0%A6%97%E0%A7%81%E0%A6%A8%E0%A7%87-%E0%A6%AC%E0%A7%87%E0%A6%95%E0%A6%BE%E0%A6%B0%E0%A6%BF-%E0%A6%AA%E0%A7%81%E0%A7%9C%E0%A7%87-%E0%A6%9B%E0%A6%BE%E0%A6%87#sthash.dwByIADD.dpuf', 'notice_image_upload__1444285258_1444285258.jpg', '০৮ অক্টোবর, ২০১৫', '2015-10-08', 1),
(12, 'লিবিয়ায় বাংলাদেশিদের না যাওয়ার পরামর্শ', 'ঢাকা: লিবিয়ায় বাংলাদেশি নাগরিকদের সফর না করার পরামর্শ দিয়েছে পররাষ্ট্র মন্ত্রণালয়। পরবর্তী ঘোষণা না দেয়া পর্যন্ত সেদেশে বসবাসকারী বাংলাদেশি নাগরিকদের চলাচলের ওপর সতর্কতা জারি করা হয়েছে।\r\n\r\n\r\nআজ বৃহস্পতিবার সকালে বাংলাদেশের পররাষ্ট্র মন্ত্রণালয় এই সতর্কতা জারি করেছে।\r\n- See more at: http://www.dhakatimes24.com/2015/10/08/86140/%E0%A6%B2%E0%A6%BF%E0%A6%AC%E0%A6%BF%E0%A7%9F%E0%A6%BE%E0%A7%9F-%E0%A6%AC%E0%A6%BE%E0%A6%82%E0%A6%B2%E0%A6%BE%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%A8%E0%A6%BE-%E0%A6%AF%E0%A6%BE%E0%A6%93%E0%A7%9F%E0%A6%BE%E0%A6%B0-%E0%A6%AA%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A6%B0%E0%A7%8D%E0%A6%B6#sthash.e7xRi9XG.dpuf\r\nগত কয়েক বছর ধরে লিবিয়ায় সংঘাত চলছে। সাম্প্রতিক সময়ে পরিস্থিতি আরও খারাপ আকার ধারণ করায় মন্ত্রণালয় এই সতর্কতা আরোপ করেছে। - See more at: http://www.dhakatimes24.com/2015/10/08/86140/%E0%A6%B2%E0%A6%BF%E0%A6%AC%E0%A6%BF%E0%A7%9F%E0%A6%BE%E0%A7%9F-%E0%A6%AC%E0%A6%BE%E0%A6%82%E0%A6%B2%E0%A6%BE%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%A8%E0%A6%BE-%E0%A6%AF%E0%A6%BE%E0%A6%93%E0%A7%9F%E0%A6%BE%E0%A6%B0-%E0%A6%AA%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A6%B0%E0%A7%8D%E0%A6%B6#sthash.e7xRi9XG.dpuf', 'notice_image_upload__1444285383_1444285383.jpg', '০৮ অক্টোবর, ২০১৫', '2015-10-08', 1),
(13, 'পেটের চর্বি কমে যে খাবারে', 'পেটের অতিরিক্ত চর্বি শুধু আপনার বাহ্যিক সৌন্দর্য ব্যাহত করে না, শারিরীক অস্বস্তিরও জন্ম দেয়। শরীরকে ফিট রাখতে এসব অবাঞ্ছিত চর্বি থেকে দূরে থাকুন। এক্ষেত্রে ব্যায়ামের পাশাপাশি গুরুত্বপূর্ণ ভূমিকা রাখে খাবার। - See more at: http://www.dhakatimes24.com/2015/10/08/86141/%E0%A6%AA%E0%A7%87%E0%A6%9F%E0%A7%87%E0%A6%B0-%E0%A6%9A%E0%A6%B0%E0%A7%8D%E0%A6%AC%E0%A6%BF-%E0%A6%95%E0%A6%AE%E0%A7%87-%E0%A6%AF%E0%A7%87-%E0%A6%96%E0%A6%BE%E0%A6%AC%E0%A6%BE%E0%A6%B0%E0%A7%87#sthash.SKfmlW45.dpuf', 'notice_image_upload__1444285504_1444285504.jpg', ' ০৮ অক্টোবর, ২০১৫', '2015-10-08', 1),
(14, 'যমুনা ব্যাংকের দুলাখ শেয়ার বিক্রির ঘোষণা', 'ঢাকা: শেয়ারবাজারে তালিকাভুক্ত যমুনা ব্যাংকের উদ্যোক্তা ইসমাইল হোসেন সিরাজী এই কোম্পানির দুই লাখ শেয়ার বিক্রি করার ঘোষণা দিয়েছেন। ২৯ অক্টোবরের মধ্যে বাজার দামে এসব শেয়ার বিক্রি হবে। এই উদ্যোক্তার কাছে কোম্পানিটির মোট ৮০ লাখ চার হাজার ৭২৯টি শেয়ার রয়েছে। - See more at: http://www.dhakatimes24.com/2015/10/08/86146/%E0%A6%AF%E0%A6%AE%E0%A7%81%E0%A6%A8%E0%A6%BE-%E0%A6%AC%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%82%E0%A6%95%E0%A7%87%E0%A6%B0-%E0%A6%A6%E0%A7%81%E0%A6%B2%E0%A6%BE%E0%A6%96-%E0%A6%B6%E0%A7%87%E0%A7%9F%E0%A6%BE%E0%A6%B0-%E0%A6%AC%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B0%E0%A6%BF%E0%A6%B0-%E0%A6%98%E0%A7%8B%E0%A6%B7%E0%A6%A3%E0%A6%BE#sthash.HScllMNb.dpuf', 'notice_image_upload__1444285571_1444285571.png', '০৮ অক্টোবর, ২০১৫', '2015-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_notice_slider`
--

CREATE TABLE IF NOT EXISTS `dostums_notice_slider` (
  `id` int(20) NOT NULL,
  `notice_slider_image` text,
  `notice_slider_date` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_notice_slider`
--

INSERT INTO `dostums_notice_slider` (`id`, `notice_slider_image`, `notice_slider_date`, `date`, `status`) VALUES
(3, 'notice_slider_image_upload__1444285861_1444285861.jpg', '??? ????? ???? ??, ???? ?????? ???????? ?????? ???', '2015-10-08', 1),
(4, 'notice_slider_image_upload__1444285914_1444285914.jpg', '??????????? ????? ???? ???? ??????', '2015-10-08', 1),
(5, 'notice_slider_image_upload__1444285959_1444285959.jpg', '?????? ??????? ?????????? ?????!', '2015-10-08', 1),
(6, 'notice_slider_image_upload__1444286035_1444286035.jpg', '????? ??? ???? ??????? ????? ????? ????', '2015-10-08', 1),
(7, 'notice_slider_image_upload__1444286085_1444286085.jpg', '???????????? ?????? ??? ????? ?????????? ????', '2015-10-08', 1),
(8, 'notice_slider_image_upload__1444286124_1444286124.jpg', '??????? ???? ???????? ????', '2015-10-08', 1),
(9, 'notice_slider_image_upload__1444286198_1444286198.jpg', '?????????? ?? ???????? ??', '2015-10-08', 1),
(10, 'notice_slider_image_upload__1444286399_1444286399.jpg', '????? ????? ?????? ???!', '2015-10-08', 1),
(11, 'notice_slider_image_upload__1444286535_1444286535.jpg', '?????? ????? “????? ?????”!', '2015-10-08', 1),
(12, 'notice_slider_image_upload__1444286686_1444286686.jpg', '????? ????? ?????? ?????????????? ??', '2015-10-08', 1),
(13, 'notice_slider_image_upload__1444286756_1444286756.jpg', '?????? ???? ???? ?????? ?????? ???? ??? ??????', '2015-10-08', 1),
(14, 'notice_slider_image_upload__1444286791_1444286791.jpg', '???? ????? ????? ???? ???? ??????? ?????', '2015-10-08', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_notice_slider_view`
--
CREATE TABLE IF NOT EXISTS `dostums_notice_slider_view` (
`id` int(20)
,`notice_slider_image` text
,`notice_slider_date` varchar(255)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_notice_view`
--
CREATE TABLE IF NOT EXISTS `dostums_notice_view` (
`id` int(20)
,`notice_title` varchar(255)
,`notice_details` text
,`notice_image` text
,`notice_date` varchar(255)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_page_cover_photo`
--

CREATE TABLE IF NOT EXISTS `dostums_page_cover_photo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dostums_page_profile_photo`
--

CREATE TABLE IF NOT EXISTS `dostums_page_profile_photo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dostums_page_type`
--

CREATE TABLE IF NOT EXISTS `dostums_page_type` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `upload_image` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_page_type_view`
--
CREATE TABLE IF NOT EXISTS `dostums_page_type_view` (
`id` int(20)
,`name` varchar(255)
,`upload_image` text
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_photo`
--

CREATE TABLE IF NOT EXISTS `dostums_photo` (
  `id` int(11) NOT NULL,
  `photo` text,
  `photo2` text NOT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_photo`
--

INSERT INTO `dostums_photo` (`id`, `photo`, `photo2`, `datetime`, `date`, `status`) VALUES
(1, 'cover1444811794.jpg', '561e1411e92b8.jpeg', NULL, NULL, 1),
(2, 'profile1444811794.jpg', '561e1412ad5db.jpeg', NULL, NULL, 1),
(3, 'profile1444812043.jpg', '561e150ae7852.jpeg', NULL, NULL, 1),
(4, 'cover1444812052.jpg', '561e151490fc1.jpeg', NULL, NULL, 1),
(5, 'status1444825482.jpg', '561e498a71ecc.jpeg', NULL, NULL, 1),
(6, 'status1444825495.jpg', '561e4996c74d7.jpeg', NULL, NULL, 1),
(7, 'status1444825502.jpg', '561e499e4bdf3.jpeg', NULL, NULL, 1),
(8, 'status1444825514.jpg', '561e49aa418d0.jpeg', NULL, NULL, 1),
(9, 'profile1444825562.jpg', '561e49da46b0b.jpeg', NULL, NULL, 1),
(10, 'cover1444825574.jpg', '561e49e5e49a5.jpeg', NULL, NULL, 1),
(11, 'profile1444894068.jpg', '561f55744ee96.jpeg', NULL, NULL, 1),
(12, 'profile1444898562.jpg', '561f67029b962.jpeg', NULL, NULL, 1),
(13, 'cover1444898567.jpg', '561f6707716af.jpeg', NULL, NULL, 1),
(14, 'cover1444908040.jpg', '561f8c0822065.jpeg', NULL, NULL, 1),
(15, 'profile1444908059.jpg', '561f8c1ba0461.jpeg', NULL, NULL, 1),
(16, 'cover1444908416.jpg', '561f8d80bd2fb.jpeg', NULL, NULL, 1),
(17, 'status1444911772.jpg', '561f9a9c473f8.jpeg', NULL, NULL, 1),
(18, 'status1445167175.jpg', '56238047549fe.jpeg', NULL, NULL, 1),
(19, 'cover1446112227.jpg', '5631ebe2f10e0.jpeg', NULL, NULL, 1),
(20, 'profile1446112238.jpg', '5631ebee6f550.jpeg', NULL, NULL, 1),
(21, 'cover1446112455.jpg', '5631ecc71e5f9.jpeg', NULL, NULL, 1),
(22, 'cover1446112466.jpg', '5631ecd26a758.jpeg', NULL, NULL, 1),
(23, 'cover1446112528.jpg', '5631ed10dcdb5.jpeg', NULL, NULL, 1),
(24, 'profile1446112536.jpg', '5631ed18ca69a.jpeg', NULL, NULL, 1),
(25, 'cover1446112665.jpg', '5631ed99341b2.jpeg', NULL, NULL, 1),
(26, 'cover1446112693.jpg', '5631edb501f4f.jpeg', NULL, NULL, 1),
(27, 'status1446113236.jpg', '5631efd45ccbe.jpeg', NULL, NULL, 1),
(28, 'cover1446443208.png', '5636f8c87c32d.png', NULL, NULL, 1),
(29, 'status1446549518.jpg', '5638980ede002.jpeg', NULL, NULL, 1),
(30, 'status1446549550.jpg', '5638982e36f51.jpeg', NULL, NULL, 1),
(31, 'status1446549586.jpg', '56389852e4525.jpeg', NULL, NULL, 1),
(32, 'cover1446549885.jpg', '5638997dba5a1.jpeg', NULL, NULL, 1),
(33, 'status1446550998.jpg', '56389dd6022d1.jpeg', NULL, NULL, 1),
(34, 'cover1446551011.jpg', '56389de3778d5.jpeg', NULL, NULL, 1),
(35, 'profile1446983709.jpg', '563f381d3ac87.jpeg', NULL, NULL, 1),
(36, 'cover1446983743.jpg', '563f383f7039f.jpeg', NULL, NULL, 1),
(37, 'cover1446983750.jpg', '563f3846b3537.jpeg', NULL, NULL, 1),
(38, 'cover1446983759.jpg', '563f384f74bd2.jpeg', NULL, NULL, 1),
(39, 'cover1446983847.jpg', '563f38a7cf429.jpeg', NULL, NULL, 1),
(40, 'cover1446983857.jpg', '563f38b1423f9.jpeg', NULL, NULL, 1),
(41, 'cover1446983920.jpg', '563f38f0c33ac.jpeg', NULL, NULL, 1),
(42, 'cover1446983929.jpg', '563f38f926b4d.jpeg', NULL, NULL, 1),
(43, 'cover1446983960.jpg', '563f3918305c4.jpeg', NULL, NULL, 1),
(44, 'cover1447051906.png', '564042821eb41.png', NULL, NULL, 1),
(45, 'profile1447051924.png', '56404294d61c2.png', NULL, NULL, 1),
(46, 'profile1447054799.png', '56404dcf24b7d.png', NULL, NULL, 1),
(47, 'cover1447054805.png', '56404dd4f004a.png', NULL, NULL, 1),
(48, 'profile1447054820.jpg', '56404de42038c.jpeg', NULL, NULL, 1),
(49, 'cover1447054861.jpg', '56404e0d3f472.jpeg', NULL, NULL, 1),
(50, 'profile1447055640.jpg', '5640511825fe9.jpeg', NULL, NULL, 1),
(51, 'profile1447055763.jpg', '5640519373b6c.jpeg', NULL, NULL, 1),
(52, 'profile1447060773.jpg', '56406525667bc.jpeg', NULL, NULL, 1),
(53, 'cover1447060783.png', '5640652f901cc.png', NULL, NULL, 1),
(54, 'cover1447060829.jpg', '5640655de938b.jpeg', NULL, NULL, 1),
(55, 'group_profile1447061216.jpg', '564066e0b05c1.jpeg', NULL, NULL, 1),
(56, 'group_profile1447067698.jpg', '5640803273f34.jpeg', NULL, NULL, 1),
(57, 'group_profile1447762503.jpg', '564b1a474017c.jpeg', NULL, NULL, 1),
(58, 'group_cover1447762517.jpg', '564b1a559cf13.jpeg', NULL, NULL, 1),
(59, 'status1447765547.jpg', '564b262b17038.jpeg', NULL, NULL, 1),
(60, 'group_cover1447912801.jpg', '564d6561b24d0.jpeg', NULL, NULL, 1),
(61, 'group_profile1447912815.jpg', '564d656f10966.jpeg', NULL, NULL, 1),
(62, 'cover1447914412.jpg', '564d6bac49a91.jpeg', NULL, NULL, 1),
(63, 'group_profile1448107481.jpg', '56505dd9c4a29.jpeg', NULL, NULL, 1),
(64, 'group_cover1448107490.jpg', '56505de2bd509.jpeg', NULL, NULL, 1),
(65, 'group_profile1448108073.jpg', '5650602933b74.jpeg', NULL, NULL, 1),
(66, 'group_cover1448108611.jpg', '56506243a59b2.jpeg', NULL, NULL, 1),
(67, 'group_cover1448175862.jpg', '565168f6c242e.jpeg', NULL, NULL, 1),
(68, 'group_profile1448359358.jpg', '565435bedfd9b.jpeg', NULL, NULL, 1),
(69, 'group_cover1448359366.jpg', '565435c60b8c3.jpeg', NULL, NULL, 1),
(70, 'group_cover1448968835.jpg', '565d828365f65.jpeg', NULL, NULL, 1),
(71, 'group_profile1448968847.jpg', '565d828f5b216.jpeg', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_post`
--

CREATE TABLE IF NOT EXISTS `dostums_post` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `from_user_id` int(20) DEFAULT NULL,
  `to_user_id` int(20) NOT NULL,
  `post` text,
  `photo_id` int(20) DEFAULT NULL,
  `post_status` int(20) DEFAULT NULL,
  `post_permission` int(2) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_post`
--

INSERT INTO `dostums_post` (`id`, `user_id`, `from_user_id`, `to_user_id`, `post`, `photo_id`, `post_status`, `post_permission`, `post_time`, `date`, `status`) VALUES
(1, 1, 1, 0, 'adsadsa da da d', 2, 2, 1, '2015-10-17 08:00:56', '2015-10-17', 1),
(2, 1, 1, 0, 'asd sadasd', 0, 0, 0, '2015-09-17 07:24:19', '2015-09-17', 1),
(3, 1, 1, 0, 'adfas dasas asd sa ', 0, 0, 0, '2015-09-17 07:36:05', '2015-09-17', 1),
(4, 2, 0, 0, '', 0, 1, 0, '2015-10-01 12:27:12', '2015-09-17', 1),
(8, 1, 1, 0, 'http://192.168.1.23/dostums/#', 0, 0, 0, '2015-10-01 12:27:31', '2015-09-17', 1),
(9, 1, 1, 0, '', 0, 0, 0, '2015-09-17 11:09:42', '2015-09-17', 1),
(10, 1, 0, 0, '', 0, 1, 0, '2015-09-19 05:47:42', '2015-09-19', 1),
(11, 1, 1, 0, '', 0, 0, 0, '2015-09-19 07:47:34', '2015-09-19', 1),
(13, 1, 1, 0, '????''? ????????? ??????? ???? ?????????? ??? ???????? Donnie Yen ? Mike Tyson ?????? Ip Man 3 sunglasses emoticon ????? ??????????????? ?? ???? ???? ??????? ??????? ????? ??? ?????? ?? ?????? ??? ??? ????? ???? ??????? ?????? ?? ????? ????? ???? ????????? ????? ?? ???? ???! ???????? ????? ????? ???? ??? ???? ??? ?????????? ???????? ??? colonthree ', 0, 0, 0, '2015-09-19 13:12:52', '2015-09-19', 1),
(14, 1, 1, 0, '????''? ????????? ??????? ???? ?????????? ??? ???????? Donnie Yen ? Mike Tyson ?????? Ip Man 3 sunglasses emoticon ????? ??????????????? ?? ???? ???? ??????? ??????? ????? ??? ?????? ?? ?????? ??? ??? ????? ???? ??????? ?????? ?? ????? ????? ???? ????????? ????? ?? ???? ???! ???????? ????? ????? ???? ??? ???? ??? ?????????? ???????? ??? colonthree ', 0, 0, 0, '2015-09-19 13:15:14', '2015-09-19', 1),
(15, 1, 1, 0, '২০১৫''র ক্রিসমাসে আসিতেছে বহুল প্রতীক্ষিত এবং আকাঙ্খিত Donnie Yen ও Mike Tyson অভিনীত Ip Man 3 sunglasses emoticon হাইলি অ্যান্টিসিপেটেড এই এপিক একশন ট্রিলজি ফিনালের শুটিং শেষ হয়েছে গত মাসেই। এবং ডনি ইয়েন নিজে কনফার্ম করেছেন এই মাসের শেষেই আসছে ট্রেইলার। তাহলে আর দেরি কেন! অপেক্ষার প্রহর গুনতে শুরু করে দিন। দ্য কাউন্টডাউন স্টার্টস নাউ colonthree ', 0, 0, 0, '2015-09-19 13:16:13', '2015-09-19', 1),
(16, 1, 1, 0, 'Hi , thi is a test status', 0, 0, 0, '2015-09-30 06:02:03', '2015-09-30', 1),
(17, 1, 1, 0, 'dsfkj dsfds fdf sdfkdsfsdf fksfkkfsdjkf ksdf', 0, 0, 0, '2015-10-01 05:20:45', '2015-10-01', 1),
(18, 2, 1, 0, 'hi this is my first status ', 0, 0, 0, '2015-10-01 12:27:27', '2015-10-01', 1),
(19, 1, 1, 0, 'sdf sdfsdfsd fsdfs', 0, 0, 0, '2015-10-03 07:18:14', '2015-10-03', 1),
(20, 1, 1, 0, 'asd asdas as dasd', 0, 0, 0, '2015-10-03 07:19:14', '2015-10-03', 1),
(21, 1, 1, 0, 'gfhfdg dfgdfgdfgf', 0, 0, 0, '2015-10-05 06:01:03', '2015-10-05', 1),
(22, 1, 1, 0, 'Rajon vai buka', 0, 0, 0, '2015-10-08 10:54:00', '2015-10-08', 1),
(23, 1, 1, 0, 'jhlkhjk', 0, 0, 0, '2015-10-08 10:55:55', '2015-10-08', 1),
(24, 8, 8, 0, 'adfdfdf', 0, 0, 0, '2015-10-08 11:00:02', '2015-10-08', 1),
(25, 8, 8, 0, 'dafadsfdsa', 0, 0, 0, '2015-10-08 11:00:19', '2015-10-08', 1),
(26, 8, 8, 0, 'adfadsfsdaf', 0, 0, 0, '2015-10-08 11:00:31', '2015-10-08', 1),
(27, 8, 8, 0, 'ajdhfjkdahfdsf', 0, 0, 0, '2015-10-08 11:04:22', '2015-10-08', 1),
(29, 1, NULL, 0, '  Change Profile Photo ', 1, NULL, 0, '2015-10-09 05:40:17', '2015-10-09', 2),
(30, 1, NULL, 0, '  Change Profile Photo ', 2, NULL, 0, '2015-10-09 06:41:51', '2015-10-09', 2),
(31, 1, NULL, 0, '  Change Profile Photo ', 3, NULL, 0, '2015-10-09 06:46:12', '2015-10-09', 2),
(32, 1, NULL, 0, '  Change Profile Photo ', 4, NULL, 0, '2015-10-09 06:46:32', '2015-10-09', 2),
(33, 1, NULL, 0, '  Change Profile Photo ', 5, NULL, 0, '2015-10-09 06:52:30', '2015-10-09', 2),
(34, 1, NULL, 0, '  Change Profile Photo ', 6, NULL, 0, '2015-10-09 06:53:02', '2015-10-09', 2),
(35, 1, NULL, 0, '  Change Profile Photo ', 7, NULL, 0, '2015-10-09 07:56:52', '2015-10-09', 2),
(36, 1, NULL, 0, '  Change Profile Photo ', 8, NULL, 0, '2015-10-09 07:57:11', '2015-10-09', 2),
(37, 1, NULL, 0, '  Change Profile Photo ', 9, NULL, 0, '2015-10-09 07:57:34', '2015-10-09', 2),
(38, 1, NULL, 0, '  Change Profile Photo ', 10, NULL, 0, '2015-10-09 07:57:39', '2015-10-09', 2),
(39, 1, NULL, 0, '  Change Profile Photo ', 11, NULL, 0, '2015-10-09 07:59:52', '2015-10-09', 2),
(40, 1, NULL, 0, '  Change Profile Photo ', 12, NULL, 0, '2015-10-09 08:00:31', '2015-10-09', 2),
(41, 1, NULL, 0, '  Change Profile Photo ', 13, NULL, 0, '2015-10-09 08:11:08', '2015-10-09', 2),
(42, 1, NULL, 0, '  Change Profile Photo ', 14, NULL, 0, '2015-10-09 08:15:14', '2015-10-09', 2),
(43, 1, NULL, 0, '  Change Profile Photo ', 15, NULL, 0, '2015-10-09 08:33:40', '2015-10-09', 2),
(44, 1, NULL, 0, '  Change Profile Photo ', 16, NULL, 0, '2015-10-09 08:34:18', '2015-10-09', 2),
(45, 1, NULL, 0, '  Change Profile Photo ', 17, NULL, 0, '2015-10-09 08:34:32', '2015-10-09', 2),
(46, 1, NULL, 0, '  Change Profile Photo ', 18, NULL, 0, '2015-10-09 08:36:01', '2015-10-09', 2),
(47, 1, NULL, 0, '  Change Profile Photo ', 19, NULL, 0, '2015-10-09 08:36:10', '2015-10-09', 2),
(48, 1, NULL, 0, '  Change Profile Photo ', 20, NULL, 0, '2015-10-09 08:36:44', '2015-10-09', 2),
(49, 1, NULL, 0, '  Change Profile Photo ', 21, NULL, 0, '2015-10-09 08:37:48', '2015-10-09', 2),
(50, 1, NULL, 0, '  Change Profile Photo ', 22, NULL, 0, '2015-10-09 08:40:41', '2015-10-09', 2),
(51, 1, NULL, 0, '  Change Cover Photo ', 23, NULL, 0, '2015-10-09 08:51:49', '2015-10-09', 2),
(52, 1, NULL, 0, '  Change Profile Photo ', 24, NULL, 0, '2015-10-09 09:23:15', '2015-10-09', 2),
(53, 1, NULL, 0, '  Change Cover Photo ', 25, NULL, 0, '2015-10-09 09:23:21', '2015-10-09', 2),
(54, 1, NULL, 0, '  Change Cover Photo ', 26, NULL, 0, '2015-10-09 09:23:54', '2015-10-09', 2),
(55, 1, NULL, 0, '  Change Cover Photo ', 27, NULL, 0, '2015-10-10 05:11:33', '2015-10-10', 2),
(56, 1, NULL, 0, '  Change Profile Photo ', 28, NULL, 0, '2015-10-10 05:11:41', '2015-10-10', 2),
(57, 1, 1, 0, 'ttrhyrt yrt yrtyrt', 0, 0, 0, '2015-10-10 10:19:28', '2015-10-10', 1),
(58, 2, NULL, 0, '  Change Cover Photo ', 29, NULL, 0, '2015-10-10 06:34:25', '2015-10-10', 2),
(59, 2, NULL, 0, '  Change Profile Photo ', 30, NULL, 0, '2015-10-10 06:34:32', '2015-10-10', 2),
(60, 3, NULL, 0, '  Change Cover Photo ', 31, NULL, 0, '2015-10-10 06:45:21', '2015-10-10', 2),
(61, 3, NULL, 0, '  Change Cover Photo ', 32, NULL, 0, '2015-10-10 06:45:38', '2015-10-10', 2),
(62, 3, NULL, 0, '  Change Cover Photo ', 33, NULL, 0, '2015-10-10 06:45:47', '2015-10-10', 2),
(63, 3, NULL, 0, '  Change Profile Photo ', 34, NULL, 0, '2015-10-10 06:45:57', '2015-10-10', 2),
(64, 3, NULL, 0, '  Change Cover Photo ', 35, NULL, 0, '2015-10-10 06:46:04', '2015-10-10', 2),
(65, 3, NULL, 0, '  Change Cover Photo ', 36, NULL, 0, '2015-10-10 06:46:14', '2015-10-10', 2),
(66, 3, NULL, 0, '  Change Cover Photo ', 37, NULL, 0, '2015-10-10 06:48:12', '2015-10-10', 2),
(67, 3, 3, 0, 'Down to Earth\nKeep on falling when I know it hurts\nGoing faster than a million miles an hour\nTrying to catch my breath some way, somehow\nDown to Earth', 0, 0, 0, '2015-10-10 10:50:19', '2015-10-10', 1),
(68, 4, NULL, 0, '  Change Cover Photo ', 38, NULL, 0, '2015-10-10 06:52:03', '2015-10-10', 2),
(69, 4, NULL, 0, '  Change Profile Photo ', 39, NULL, 0, '2015-10-10 06:52:09', '2015-10-10', 2),
(70, 4, 4, 0, 'It''s like I''m frozen, but the world still turns\nStuck in motion, but the wheels keep spinning ''round\nMoving in reverse with no way out\n\nIt''s like I''m frozen, but the world still turns\nStuck in motion, but the wheels keep spinning ''round\nMoving in reverse with no way out\n\nHow many nights does it take to count the stars?\nThat''s the time it would take to fix my heart\nOh, baby, I was there for you\nAll I ever wanted was the truth, yeah, yeah\nHow many nights have you wished someone would stay?\n\nAnd now I''m one step closer to being\nTwo steps far from you\nWhen everybody wants you\nEverybodIt was almost Christmas time\nThere I stood in another line\nTryin'' to buy that last gift or two\nNot really in the Christmas mood\nStanding right in front of me was\nA little boy waiting anxiously\nPacing ''round like little boys do\nAnd in his hands he held a pair of shoes\nhlw everyone ..\n\n\n\n\n\n', 0, 0, 0, '2015-10-10 10:56:34', '2015-10-10', 1),
(71, 4, 4, 0, 'He counted pennies for what seemed like years\nThen the cashier said, "Son, there''s not enough here"\nHe searched his pockets frantically\nThen he turned and he looked at me\n\n New Song -New life- New smile :)\n', 0, 0, 0, '2015-10-10 10:57:25', '2015-10-10', 1),
(72, 5, NULL, 0, '  Change Cover Photo ', 40, NULL, 0, '2015-10-10 06:58:22', '2015-10-10', 2),
(73, 5, NULL, 0, '  Change Profile Photo ', 41, NULL, 0, '2015-10-10 06:58:33', '2015-10-10', 2),
(74, 5, 5, 0, 'when some one  is happy  smile..........', 0, 0, 0, '2015-10-10 11:00:33', '2015-10-10', 1),
(75, 6, NULL, 0, '  Change Cover Photo ', 42, NULL, 0, '2015-10-10 07:01:15', '2015-10-10', 2),
(76, 6, NULL, 0, '  Change Profile Photo ', 43, NULL, 0, '2015-10-10 07:01:21', '2015-10-10', 2),
(77, 6, 6, 0, 'Life is very enjoyable... enjoy your life.... ', 0, 0, 0, '2015-10-10 11:03:33', '2015-10-10', 1),
(78, 7, NULL, 0, '  Change Cover Photo ', 44, NULL, 0, '2015-10-10 07:04:12', '2015-10-10', 2),
(79, 7, NULL, 0, '  Change Profile Photo ', 45, NULL, 0, '2015-10-10 07:04:27', '2015-10-10', 2),
(80, 7, 7, 0, 'how come look so cool ?', 0, 0, 0, '2015-10-10 11:05:35', '2015-10-10', 1),
(81, 8, NULL, 0, '  Change Cover Photo ', 46, NULL, 0, '2015-10-10 07:06:11', '2015-10-10', 2),
(82, 8, NULL, 0, '  Change Profile Photo ', 47, NULL, 0, '2015-10-10 07:06:23', '2015-10-10', 2),
(83, 8, 8, 0, 'good good and cool cool dayyyyyyy', 0, 0, 0, '2015-10-10 11:07:25', '2015-10-10', 1),
(84, 1, NULL, 0, '  Change Profile Photo ', 48, NULL, 0, '2015-10-10 08:36:25', '2015-10-10', 2),
(85, 1, NULL, 0, '  Change Profile Photo ', 49, NULL, 0, '2015-10-10 08:36:33', '2015-10-10', 2),
(86, 8, 8, 0, 'asd asdadasdasdasdasd', 0, 0, 0, '2015-10-11 06:30:09', '2015-10-11', 1),
(87, 8, 8, 0, 'dfgfd gdfgdfgdfgdf', 0, 0, 0, '2015-10-11 06:30:28', '2015-10-11', 1),
(88, 8, 8, 0, 'demo ', 0, 0, 0, '2015-10-11 06:30:53', '2015-10-11', 1),
(89, 8, NULL, 0, '  Change Profile Photo ', 50, NULL, 0, '2015-10-11 02:39:01', '2015-10-11', 2),
(90, 8, NULL, 0, '  Change Profile Photo ', 51, NULL, 0, '2015-10-11 02:41:07', '2015-10-11', 2),
(91, 1, 1, 0, 'dsfs df fsd fsdf', 0, 0, 0, '2015-10-11 11:46:04', '2015-10-11', 1),
(92, 1, NULL, 0, '  Change Cover Photo ', 52, NULL, 0, '2015-10-13 01:53:18', '2015-10-13', 2),
(93, 1, NULL, 0, '  Change Profile Photo ', 53, NULL, 0, '2015-10-13 01:53:24', '2015-10-13', 2),
(94, 1, 1, 0, '', 0, 0, 0, '2015-10-13 08:34:06', '2015-10-13', 1),
(95, 1, 1, 0, '', 0, 0, 0, '2015-10-13 08:42:39', '2015-10-13', 1),
(96, 1, NULL, 0, 'asd saasdasd asd', 54, NULL, 0, '2015-10-13 06:25:53', '2015-10-13', 3),
(97, 1, NULL, 0, 'fgdsfgsd fds fsd fsd fsdf dsf ds f', 55, NULL, 0, '2015-10-13 07:05:40', '2015-10-13', 3),
(98, 1, 1, 0, 'asd asdasd adasdasdasd asdasd asd asd', 0, 0, 0, '2015-10-13 11:06:54', '2015-10-13', 1),
(99, 1, 1, 0, 'asd asdasd as dsd ', 0, 0, 0, '2015-10-13 11:07:01', '2015-10-13', 1),
(100, 1, 1, 0, 'asdsa asdasdasdasd', 0, 0, 0, '2015-10-13 11:30:57', '2015-10-13', 1),
(101, 1, 1, 0, 'asdsa asdasdasdasd', 0, 0, 0, '2015-10-13 11:32:21', '2015-10-13', 1),
(102, 1, 1, 0, 'sdfds fsdfsdfsdf', 0, 0, 0, '2015-10-13 11:48:26', '2015-10-13', 1),
(103, 1, 1, 0, 'dfsd fdsf sdfds fdsf', 0, 0, 0, '2015-10-13 12:07:12', '2015-10-13', 1),
(104, 1, 1, 0, 'dsfds fds fdsf dsf', 0, 0, 0, '2015-10-13 12:07:49', '2015-10-13', 1),
(105, 1, NULL, 0, '', 56, NULL, 0, '2015-10-13 08:16:21', '2015-10-13', 3),
(106, 1, NULL, 0, '', 57, NULL, 0, '2015-10-13 08:17:03', '2015-10-13', 3),
(107, 1, NULL, 0, '  Change Profile Photo ', 58, NULL, 0, '2015-10-13 08:42:48', '2015-10-13', 2),
(108, 1, NULL, 0, '  Change Cover Photo ', 59, NULL, 0, '2015-10-13 08:43:15', '2015-10-13', 2),
(109, 1, NULL, 0, '  Change Cover Photo ', 1, NULL, 0, '2015-10-14 04:36:34', '2015-10-14', 2),
(110, 1, NULL, 0, '  Change Profile Photo ', 2, NULL, 0, '2015-10-14 04:36:34', '2015-10-14', 2),
(111, 2, NULL, 0, '  Change Profile Photo ', 3, NULL, 0, '2015-10-14 04:40:43', '2015-10-14', 2),
(112, 2, NULL, 0, '  Change Cover Photo ', 4, NULL, 0, '2015-10-14 04:40:53', '2015-10-14', 2),
(113, 1, NULL, 0, 'yiuyiuy  rtyytry', 5, NULL, 0, '2015-10-14 08:24:43', '2015-10-14', 3),
(114, 1, NULL, 0, 'yiuyiuy  rtyytry', 6, NULL, 0, '2015-10-14 08:24:55', '2015-10-14', 3),
(115, 1, NULL, 0, 'yiuyiuy  rtyytry', 7, NULL, 0, '2015-10-14 08:25:02', '2015-10-14', 3),
(116, 1, NULL, 0, 'gfhgfhgfhfghgf cfgbfdgfdg ', 8, NULL, 0, '2015-10-14 08:25:14', '2015-10-14', 3),
(117, 1, NULL, 0, '  Change Profile Photo ', 9, NULL, 0, '2015-10-14 08:26:02', '2015-10-14', 2),
(118, 1, NULL, 0, '  Change Cover Photo ', 10, NULL, 0, '2015-10-14 08:26:14', '2015-10-14', 2),
(119, 1, NULL, 0, '  Change Profile Photo ', 11, NULL, 0, '2015-10-15 03:27:48', '2015-10-15', 2),
(120, 3, NULL, 0, '  Change Profile Photo ', 12, NULL, 0, '2015-10-15 04:42:42', '2015-10-15', 2),
(121, 3, NULL, 0, '  Change Cover Photo ', 13, NULL, 0, '2015-10-15 04:42:47', '2015-10-15', 2),
(124, 9, 9, 0, 'ok ok ok', 0, 0, 0, '2015-10-15 11:17:47', '2015-10-15', 1),
(125, 9, NULL, 0, '  Change Cover Photo ', 14, NULL, 0, '2015-10-15 07:20:40', '2015-10-15', 2),
(126, 9, NULL, 0, '  Change Profile Photo ', 15, NULL, 0, '2015-10-15 07:20:59', '2015-10-15', 2),
(127, 9, 9, 0, '  Change Cover Photo ', 14, 1, 0, '2015-10-15 11:21:55', '2015-10-15', 1),
(128, 9, 1, 0, '  Change Profile Photo ', 11, 1, 0, '2015-10-15 11:22:03', '2015-10-15', 1),
(129, 9, 9, 0, 'adfasdf', 0, 0, 0, '2015-10-15 11:26:16', '2015-10-15', 1),
(130, 9, NULL, 0, '  Change Cover Photo ', 16, NULL, 0, '2015-10-15 07:26:56', '2015-10-15', 2),
(131, 9, NULL, 0, '', 17, NULL, 0, '2015-10-15 08:22:52', '2015-10-15', 3),
(132, 9, 0, 0, '', 0, 1, 0, '2015-10-15 12:23:54', '2015-10-15', 1),
(133, 9, 9, 0, 'good good', 0, 0, 0, '2015-10-15 12:24:56', '2015-10-15', 1),
(135, 12, 12, 0, 'fdgf dgfd gdf gdfgdfg', 0, 0, 0, '2015-10-15 12:41:36', '2015-10-15', 1),
(136, 12, 12, 0, 'dsfgsdf sdfds fdsf', 0, 0, 0, '2015-10-15 12:43:04', '2015-10-15', 1),
(137, 1, 1, 0, 'gkgkljglgl\r\n\r\n;kkjllkhk;kk\r\n\r\n;knlklk;k;kn\r\n\r\n;nlklklkkllkn', 11, 1, 1, '2015-10-17 08:03:02', '2015-10-17', 1),
(138, 1, 1, 0, 'sad asdsadasd', 0, 0, 0, '2015-10-18 06:28:32', '2015-10-18', 1),
(139, 1, 1, 0, ' rasreradasdasd  asd sad asd', 0, 0, 0, '2015-10-18 09:25:20', '2015-10-18', 1),
(140, 1, 1, 0, 'hi', 0, 0, 0, '2015-10-18 09:30:31', '2015-10-18', 1),
(141, 1, NULL, 3, 'sdfdsaf asdsad asdsad ', 18, NULL, 0, '2015-10-18 07:19:35', '2015-10-18', 4),
(142, 1, NULL, 3, 'dfg dfgdf gdf', 0, 0, 0, '2015-10-18 11:33:57', '2015-10-18', 1),
(143, 1, NULL, 3, 'dzf dsfdsfdsf', 0, 0, 0, '2015-10-18 12:46:31', '2015-10-18', 1),
(144, 1, 1, 0, 'Just checking the weather! Awesome!', 0, 0, 0, '2015-10-22 10:01:21', '2015-10-22', 1),
(145, 1, 1, 0, 'sdfds fsd fdsf dsf sdf sdf', 0, 0, 0, '2015-10-26 12:10:10', '2015-10-26', 1),
(146, 2, 2, 0, 'enjoyable Today ', 0, 0, 0, '2015-10-28 11:53:24', '2015-10-28', 1),
(147, 2, 2, 0, 'horror day ', 0, 0, 0, '2015-10-28 11:53:39', '2015-10-28', 1),
(148, 2, 2, 0, 'nothing else ........... ', 0, 0, 0, '2015-10-28 05:54:06', '2015-10-28', 1),
(149, 2, NULL, 0, '  Change Cover Photo ', 19, NULL, 0, '2015-10-29 04:50:27', '2015-10-29', 2),
(150, 2, NULL, 0, '  Change Profile Photo ', 20, NULL, 0, '2015-10-29 04:50:38', '2015-10-29', 2),
(151, 2, NULL, 0, '  Change Cover Photo ', 21, NULL, 0, '2015-10-29 04:54:15', '2015-10-29', 2),
(152, 2, NULL, 0, '  Change Cover Photo ', 22, NULL, 0, '2015-10-29 04:54:26', '2015-10-29', 2),
(153, 2, NULL, 0, '  Change Cover Photo ', 23, NULL, 0, '2015-10-29 04:55:29', '2015-10-29', 2),
(154, 2, NULL, 0, '  Change Profile Photo ', 24, NULL, 0, '2015-10-29 04:55:36', '2015-10-29', 2),
(155, 2, NULL, 0, '  Change Cover Photo ', 25, NULL, 0, '2015-10-29 04:57:45', '2015-10-29', 2),
(156, 2, NULL, 0, '  Change Cover Photo ', 26, NULL, 0, '2015-10-29 04:58:13', '2015-10-29', 2),
(157, 2, 2, 0, 'Google World...', 0, 0, 0, '2015-10-29 10:04:51', '2015-10-29', 1),
(158, 2, NULL, 0, 'win win but off mood..', 27, NULL, 0, '2015-10-29 05:07:16', '2015-10-29', 3),
(159, 1, NULL, 0, '  Change Cover Photo ', 28, NULL, 0, '2015-11-02 00:46:48', '2015-11-02', 2),
(160, 2, NULL, 3, '', 29, NULL, 0, '2015-11-03 06:18:39', '2015-11-03', 4),
(161, 2, NULL, 3, 'winter ', 30, NULL, 0, '2015-11-03 06:19:10', '2015-11-03', 4),
(162, 2, NULL, 3, 'car', 31, NULL, 0, '2015-11-03 06:19:47', '2015-11-03', 4),
(164, 2, NULL, 0, '', 33, NULL, 0, '2015-11-03 06:43:18', '2015-11-03', 3),
(165, 2, NULL, 0, '  Change Cover Photo ', 34, NULL, 0, '2015-11-03 06:43:31', '2015-11-03', 2),
(166, 13, NULL, 0, '  Change Profile Photo ', 35, NULL, 0, '2015-11-08 06:55:09', '2015-11-08', 2),
(167, 13, NULL, 0, '  Change Cover Photo ', 36, NULL, 0, '2015-11-08 06:55:43', '2015-11-08', 2),
(168, 13, NULL, 0, '  Change Cover Photo ', 37, NULL, 0, '2015-11-08 06:55:50', '2015-11-08', 2),
(169, 13, NULL, 0, '  Change Cover Photo ', 38, NULL, 0, '2015-11-08 06:55:59', '2015-11-08', 2),
(170, 13, NULL, 0, '  Change Cover Photo ', 39, NULL, 0, '2015-11-08 06:57:27', '2015-11-08', 2),
(171, 13, NULL, 0, '  Change Cover Photo ', 40, NULL, 0, '2015-11-08 06:57:37', '2015-11-08', 2),
(172, 13, NULL, 0, '  Change Cover Photo ', 41, NULL, 0, '2015-11-08 06:58:40', '2015-11-08', 2),
(173, 13, NULL, 0, '  Change Cover Photo ', 42, NULL, 0, '2015-11-08 06:58:49', '2015-11-08', 2),
(174, 13, NULL, 0, '  Change Cover Photo ', 43, NULL, 0, '2015-11-08 06:59:20', '2015-11-08', 2),
(175, 13, 13, 0, 'Hi buddy what''s UP?', 0, 0, 0, '2015-11-08 12:00:29', '2015-11-08', 1),
(176, 13, NULL, 0, '  Change Cover Photo ', 44, NULL, 0, '2015-11-09 01:51:46', '2015-11-09', 2),
(177, 13, NULL, 0, '  Change Profile Photo ', 45, NULL, 0, '2015-11-09 01:52:04', '2015-11-09', 2),
(178, 13, NULL, 0, '  Change Profile Photo ', 46, NULL, 0, '2015-11-09 02:39:59', '2015-11-09', 2),
(179, 13, NULL, 0, '  Change Cover Photo ', 47, NULL, 0, '2015-11-09 02:40:05', '2015-11-09', 2),
(180, 13, NULL, 0, '  Change Profile Photo ', 48, NULL, 0, '2015-11-09 02:40:20', '2015-11-09', 2),
(181, 13, NULL, 0, '  Change Cover Photo ', 49, NULL, 0, '2015-11-09 02:41:01', '2015-11-09', 2),
(182, 13, NULL, 0, '  Change Profile Photo ', 50, NULL, 0, '2015-11-09 02:54:00', '2015-11-09', 2),
(183, 13, NULL, 0, '  Change Profile Photo ', 51, NULL, 0, '2015-11-09 02:56:03', '2015-11-09', 2),
(184, 13, NULL, 0, '  Change Profile Photo ', 52, NULL, 0, '2015-11-09 04:19:33', '2015-11-09', 60),
(185, 13, NULL, 0, '  Change Cover Photo ', 53, NULL, 0, '2015-11-09 04:19:43', '2015-11-09', 61),
(186, 13, NULL, 0, '  Change Cover Photo ', 54, NULL, 0, '2015-11-09 04:20:30', '2015-11-09', 61),
(187, 13, NULL, 0, '  Change Profile Photo ', 55, NULL, 0, '2015-11-09 04:26:56', '2015-11-09', 60),
(188, 13, NULL, 0, '  Changed Profile Photo ', 56, NULL, 0, '2015-11-09 06:14:58', '2015-11-09', 60),
(189, 13, 0, 0, '', 0, 1, 0, '2015-11-11 12:55:33', '2015-11-11', 1),
(190, 13, NULL, 0, '  Changed Profile Photo ', 57, NULL, 0, '2015-11-17 07:15:03', '2015-11-17', 60),
(191, 13, NULL, 0, '  Changed Cover Photo ', 58, NULL, 0, '2015-11-17 07:15:17', '2015-11-17', 61),
(192, 13, NULL, 0, 'this is cool', 59, NULL, 0, '2015-11-17 08:05:47', '2015-11-17', 3),
(193, 13, NULL, 0, '  Changed Cover Photo ', 60, NULL, 0, '2015-11-19 01:00:01', '2015-11-19', 61),
(194, 13, NULL, 0, '  Changed Profile Photo ', 61, NULL, 0, '2015-11-19 01:00:15', '2015-11-19', 60),
(196, 13, 13, 0, '  Changed Profile Photo ', 61, 1, 0, '2015-11-19 09:29:52', '2015-11-19', 1),
(197, 13, NULL, 0, '  Changed Profile Photo ', 63, NULL, 0, '2015-11-21 07:04:41', '2015-11-21', 60),
(198, 13, NULL, 0, '  Changed Cover Photo ', 64, NULL, 0, '2015-11-21 07:04:50', '2015-11-21', 61),
(199, 13, NULL, 0, '  Changed Profile Photo ', 65, NULL, 0, '2015-11-21 07:14:33', '2015-11-21', 60),
(200, 13, NULL, 0, '  Changed Cover Photo ', 66, NULL, 0, '2015-11-21 07:23:31', '2015-11-21', 61),
(201, 13, NULL, 0, '  Changed Cover Photo ', 67, NULL, 0, '2015-11-22 02:04:22', '2015-11-22', 61),
(202, 13, 13, 0, '  Changed Cover Photo ', 66, 1, 0, '2015-11-22 07:28:33', '2015-11-22', 1),
(203, 13, NULL, 0, '  Changed Profile Photo ', 68, NULL, 0, '2015-11-24 05:02:39', '2015-11-24', 60),
(204, 13, NULL, 0, '  Changed Cover Photo ', 69, NULL, 0, '2015-11-24 05:02:46', '2015-11-24', 61),
(205, 13, NULL, 0, '  Changed Cover Photo ', 70, NULL, 0, '2015-12-01 06:20:35', '2015-12-01', 61),
(206, 13, NULL, 0, '  Changed Profile Photo ', 71, NULL, 0, '2015-12-01 06:20:47', '2015-12-01', 60);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_post_location_record`
--

CREATE TABLE IF NOT EXISTS `dostums_post_location_record` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `post_id` int(20) DEFAULT NULL,
  `country_id` int(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_post_location_record`
--

INSERT INTO `dostums_post_location_record` (`id`, `user_id`, `post_id`, `country_id`, `date`, `status`) VALUES
(1, 1, 0, 1, '2015-09-19', 1),
(2, 1, 0, 1, '2015-09-19', 1),
(3, 1, 0, 1, '2015-09-19', 1),
(4, 1, 0, 1, '2015-09-19', 1),
(5, 1, 0, 1, '2015-09-19', 1),
(6, 1, 0, 1, '2015-09-19', 1),
(7, 1, 0, 1, '2015-09-19', 1),
(8, 3, 0, 1, '2015-09-29', 1),
(9, 1, 0, 2, '2015-09-30', 1),
(10, 1, 0, 2, '2015-10-01', 1),
(11, 1, 0, 2, '2015-10-01', 1),
(12, 1, 0, 20, '2015-10-06', 1),
(13, 1, 0, 20, '2015-10-06', 1),
(14, 8, 0, 20, '2015-10-08', 1),
(15, 8, 0, 20, '2015-10-08', 1),
(16, 1, 0, 20, '2015-10-10', 1),
(17, 1, 0, 20, '2015-10-10', 1),
(18, 1, 0, 20, '2015-10-13', 1),
(19, 1, 0, 20, '2015-10-13', 1),
(20, 1, 0, 20, '2015-10-13', 1),
(21, 1, 0, 20, '2015-10-13', 1),
(22, 1, 101, 20, '2015-10-13', 1),
(23, 1, 102, 20, '2015-10-13', 1),
(24, 1, 0, 20, '2015-10-13', 1),
(25, 1, 103, 20, '2015-10-13', 1),
(26, 1, 0, 20, '2015-10-13', 1),
(27, 1, 104, 20, '2015-10-13', 1),
(28, 1, 107, 20, '2015-10-13', 1),
(29, 1, 108, 20, '2015-10-13', 1),
(30, 1, 109, NULL, '2015-10-14', 1),
(31, 1, 30, NULL, '2015-10-14', 1),
(32, 2, 31, NULL, '2015-10-14', 1),
(33, 2, 112, NULL, '2015-10-14', 1),
(34, 1, 113, NULL, '2015-10-14', 1),
(35, 1, 114, NULL, '2015-10-14', 1),
(36, 1, 0, 20, '2015-10-14', 1),
(37, 1, 115, 20, '2015-10-14', 1),
(38, 1, 116, 20, '2015-10-14', 1),
(39, 1, 37, 20, '2015-10-14', 1),
(40, 1, 118, 20, '2015-10-14', 1),
(41, 1, 39, NULL, '2015-10-15', 1),
(42, 3, 40, NULL, '2015-10-15', 1),
(43, 3, 121, NULL, '2015-10-15', 1),
(44, 9, 122, NULL, '2015-10-15', 1),
(45, 9, 123, NULL, '2015-10-15', 1),
(46, 9, 124, NULL, '2015-10-15', 1),
(47, 9, 125, NULL, '2015-10-15', 1),
(48, 9, 43, NULL, '2015-10-15', 1),
(49, 9, 129, NULL, '2015-10-15', 1),
(50, 9, 130, NULL, '2015-10-15', 1),
(51, 9, 131, NULL, '2015-10-15', 1),
(52, 9, 133, NULL, '2015-10-15', 1),
(53, 9, 0, 20, '2015-10-15', 1),
(54, 9, 134, 20, '2015-10-15', 1),
(55, 12, 135, NULL, '2015-10-15', 1),
(56, 12, 136, NULL, '2015-10-15', 1),
(57, 9, 0, 20, '2015-10-15', 1),
(58, 1, 137, NULL, '2015-10-15', 1),
(59, 9, 0, 20, '2015-10-15', 1),
(60, 1, 138, NULL, '2015-10-18', 1),
(61, 1, 139, NULL, '2015-10-18', 1),
(62, 1, 140, NULL, '2015-10-18', 1),
(63, 1, 144, NULL, '2015-10-22', 1),
(64, 1, 0, 20, '2015-10-26', 1),
(65, 1, 145, 20, '2015-10-26', 1),
(66, 2, 146, NULL, '2015-10-28', 1),
(67, 2, 147, NULL, '2015-10-28', 1),
(68, 2, 148, NULL, '2015-10-28', 1),
(69, 2, 149, NULL, '2015-10-29', 1),
(70, 2, 48, NULL, '2015-10-29', 1),
(71, 2, 151, NULL, '2015-10-29', 1),
(72, 2, 152, NULL, '2015-10-29', 1),
(73, 2, 153, NULL, '2015-10-29', 1),
(74, 2, 52, NULL, '2015-10-29', 1),
(75, 2, 155, NULL, '2015-10-29', 1),
(76, 2, 156, NULL, '2015-10-29', 1),
(77, 2, 157, NULL, '2015-10-29', 1),
(78, 2, 158, NULL, '2015-10-29', 1),
(79, 1, 159, NULL, '2015-11-02', 1),
(80, 2, 163, NULL, '2015-11-03', 1),
(81, 2, 164, NULL, '2015-11-03', 1),
(82, 2, 165, NULL, '2015-11-03', 1),
(83, 13, 0, 20, '2015-11-08', 1),
(84, 13, 0, 20, '2015-11-08', 1),
(85, 13, 0, 20, '2015-11-08', 1),
(86, 13, 64, 20, '2015-11-08', 1),
(87, 13, 167, 20, '2015-11-08', 1),
(88, 13, 168, 20, '2015-11-08', 1),
(89, 13, 169, 20, '2015-11-08', 1),
(90, 13, 170, 20, '2015-11-08', 1),
(91, 13, 171, 20, '2015-11-08', 1),
(92, 13, 172, 20, '2015-11-08', 1),
(93, 13, 173, 20, '2015-11-08', 1),
(94, 13, 174, 20, '2015-11-08', 1),
(95, 13, 175, 20, '2015-11-08', 1),
(96, 13, 176, NULL, '2015-11-09', 1),
(97, 13, 79, NULL, '2015-11-09', 1),
(98, 13, 81, NULL, '2015-11-09', 1),
(99, 13, 179, NULL, '2015-11-09', 1),
(100, 13, 84, NULL, '2015-11-09', 1),
(101, 13, 181, NULL, '2015-11-09', 1),
(102, 13, 89, NULL, '2015-11-09', 1),
(103, 13, 90, NULL, '2015-11-09', 1),
(104, 13, 92, NULL, '2015-11-09', 1),
(105, 13, 185, NULL, '2015-11-09', 1),
(106, 13, 186, NULL, '2015-11-09', 1),
(107, 13, 97, NULL, '2015-11-09', 1),
(108, 13, 105, NULL, '2015-11-09', 1),
(109, 13, 106, NULL, '2015-11-17', 1),
(110, 13, 191, NULL, '2015-11-17', 1),
(111, 13, 192, NULL, '2015-11-17', 1),
(112, 13, 193, NULL, '2015-11-19', 1),
(113, 13, 194, NULL, '2015-11-19', 1),
(114, 13, 195, NULL, '2015-11-19', 1),
(115, 13, 0, 20, '2015-11-19', 1),
(116, 13, 0, 20, '2015-11-19', 1),
(117, 13, 0, 20, '2015-11-19', 1),
(118, 13, 0, 20, '2015-11-19', 1),
(119, 13, 0, 20, '2015-11-19', 1),
(120, 13, 197, NULL, '2015-11-21', 1),
(121, 13, 198, NULL, '2015-11-21', 1),
(122, 13, 199, NULL, '2015-11-21', 1),
(123, 13, 200, NULL, '2015-11-21', 1),
(124, 13, 201, NULL, '2015-11-22', 1),
(125, 13, 203, NULL, '2015-11-24', 1),
(126, 13, 204, NULL, '2015-11-24', 1),
(127, 13, 205, NULL, '2015-12-01', 1),
(128, 13, 206, NULL, '2015-12-01', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_post_location_record_view`
--
CREATE TABLE IF NOT EXISTS `dostums_post_location_record_view` (
`id` int(20)
,`user_id` int(20)
,`post_id` int(20)
,`country_id` int(20)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_post_permission`
--

CREATE TABLE IF NOT EXISTS `dostums_post_permission` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `post_permission` int(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_post_permission`
--

INSERT INTO `dostums_post_permission` (`id`, `user_id`, `post_permission`, `date`, `status`) VALUES
(5, 1, 1, '2015-10-26', 1),
(6, 9, 1, '2015-10-15', 1),
(7, 2, 2, '2015-10-28', 1),
(8, 13, 1, '2015-11-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_post_permission_record`
--

CREATE TABLE IF NOT EXISTS `dostums_post_permission_record` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `post_id` int(20) DEFAULT NULL,
  `permission_id` int(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_post_permission_record`
--

INSERT INTO `dostums_post_permission_record` (`id`, `user_id`, `post_id`, `permission_id`, `date`, `status`) VALUES
(1, 1, 98, 3, '2015-10-13', 1),
(2, 1, 99, 3, '2015-10-13', 1),
(3, 1, 100, 3, '2015-10-13', 1),
(4, 1, 101, 3, '2015-10-13', 1),
(5, 1, 102, 3, '2015-10-13', 1),
(6, 1, 103, 3, '2015-10-13', 1),
(7, 1, 104, 1, '2015-10-13', 1),
(8, 1, 107, 1, '2015-10-13', 1),
(9, 1, 108, 1, '2015-10-13', 1),
(10, 1, 109, 1, '2015-10-14', 1),
(11, 1, 30, 1, '2015-10-14', 1),
(12, 2, 31, 1, '2015-10-14', 1),
(13, 2, 112, 1, '2015-10-14', 1),
(14, 1, 113, 1, '2015-10-14', 1),
(15, 1, 114, 1, '2015-10-14', 1),
(16, 1, 115, 3, '2015-10-14', 1),
(17, 1, 116, 3, '2015-10-14', 1),
(18, 1, 37, 3, '2015-10-14', 1),
(19, 1, 118, 3, '2015-10-14', 1),
(20, 1, 39, 1, '2015-10-15', 1),
(21, 3, 40, 1, '2015-10-15', 1),
(22, 3, 121, 1, '2015-10-15', 1),
(23, 9, 122, 3, '2015-10-15', 1),
(24, 9, 123, 3, '2015-10-15', 1),
(25, 9, 124, 3, '2015-10-15', 1),
(26, 9, 125, 3, '2015-10-15', 1),
(27, 9, 43, 3, '2015-10-15', 1),
(28, 9, 129, 3, '2015-10-15', 1),
(29, 9, 130, 3, '2015-10-15', 1),
(30, 9, 131, 3, '2015-10-15', 1),
(31, 9, 133, 3, '2015-10-15', 1),
(32, 9, 134, 1, '2015-10-15', 1),
(33, 12, 135, 1, '2015-10-15', 1),
(34, 12, 136, 1, '2015-10-15', 1),
(35, 1, 137, 1, '2015-10-15', 1),
(36, 1, 138, 1, '2015-10-18', 1),
(37, 1, 139, 1, '2015-10-18', 1),
(38, 1, 140, 1, '2015-10-18', 1),
(39, 1, 144, 1, '2015-10-22', 1),
(40, 1, 145, 1, '2015-10-26', 1),
(41, 2, 146, 3, '2015-10-28', 1),
(42, 2, 147, 3, '2015-10-28', 1),
(43, 2, 148, 2, '2015-10-28', 1),
(44, 2, 149, 1, '2015-10-29', 1),
(45, 2, 48, 1, '2015-10-29', 1),
(46, 2, 151, 1, '2015-10-29', 1),
(47, 2, 152, 1, '2015-10-29', 1),
(48, 2, 153, 1, '2015-10-29', 1),
(49, 2, 52, 1, '2015-10-29', 1),
(50, 2, 155, 1, '2015-10-29', 1),
(51, 2, 156, 1, '2015-10-29', 1),
(52, 2, 157, 1, '2015-10-29', 1),
(53, 2, 158, 1, '2015-10-29', 1),
(54, 1, 159, 1, '2015-11-02', 1),
(55, 2, 163, 1, '2015-11-03', 1),
(56, 2, 164, 1, '2015-11-03', 1),
(57, 2, 165, 1, '2015-11-03', 1),
(58, 13, 64, 1, '2015-11-08', 1),
(59, 13, 167, 1, '2015-11-08', 1),
(60, 13, 168, 1, '2015-11-08', 1),
(61, 13, 169, 1, '2015-11-08', 1),
(62, 13, 170, 1, '2015-11-08', 1),
(63, 13, 171, 1, '2015-11-08', 1),
(64, 13, 172, 1, '2015-11-08', 1),
(65, 13, 173, 1, '2015-11-08', 1),
(66, 13, 174, 1, '2015-11-08', 1),
(67, 13, 175, 1, '2015-11-08', 1),
(68, 13, 176, 1, '2015-11-09', 1),
(69, 13, 79, 1, '2015-11-09', 1),
(70, 13, 81, 1, '2015-11-09', 1),
(71, 13, 179, 1, '2015-11-09', 1),
(72, 13, 84, 1, '2015-11-09', 1),
(73, 13, 181, 1, '2015-11-09', 1),
(74, 13, 89, 1, '2015-11-09', 1),
(75, 13, 90, 1, '2015-11-09', 1),
(76, 13, 92, 1, '2015-11-09', 1),
(77, 13, 185, 1, '2015-11-09', 1),
(78, 13, 186, 1, '2015-11-09', 1),
(79, 13, 97, 1, '2015-11-09', 1),
(80, 13, 105, 1, '2015-11-09', 1),
(81, 13, 106, 1, '2015-11-17', 1),
(82, 13, 191, 1, '2015-11-17', 1),
(83, 13, 192, 1, '2015-11-17', 1),
(84, 13, 193, 1, '2015-11-19', 1),
(85, 13, 194, 1, '2015-11-19', 1),
(86, 13, 195, 1, '2015-11-19', 1),
(87, 13, 197, 1, '2015-11-21', 1),
(88, 13, 198, 1, '2015-11-21', 1),
(89, 13, 199, 1, '2015-11-21', 1),
(90, 13, 200, 1, '2015-11-21', 1),
(91, 13, 201, 1, '2015-11-22', 1),
(92, 13, 203, 1, '2015-11-24', 1),
(93, 13, 204, 1, '2015-11-24', 1),
(94, 13, 205, 1, '2015-12-01', 1),
(95, 13, 206, 1, '2015-12-01', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_post_permission_record_view`
--
CREATE TABLE IF NOT EXISTS `dostums_post_permission_record_view` (
`id` int(20)
,`user_id` int(20)
,`post_id` int(20)
,`permission_id` int(20)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_post_permission_view`
--
CREATE TABLE IF NOT EXISTS `dostums_post_permission_view` (
`id` int(20)
,`user_id` int(20)
,`post_permission` int(20)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_post_share`
--

CREATE TABLE IF NOT EXISTS `dostums_post_share` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `from_user_id` int(20) DEFAULT NULL,
  `post_id` int(20) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_post_share`
--

INSERT INTO `dostums_post_share` (`id`, `user_id`, `from_user_id`, `post_id`, `post_time`, `date`, `status`) VALUES
(1, 1, 1, 155, '2015-09-17 08:39:38', '2015-09-17', 1),
(2, 1, 1, 155, '2015-09-19 05:47:42', '2015-09-19', 1),
(3, 9, 9, 125, '2015-10-15 11:21:55', '2015-10-15', 1),
(4, 9, 9, 119, '2015-10-15 11:22:03', '2015-10-15', 1),
(5, 9, 9, NULL, '2015-10-15 12:23:54', '2015-10-15', 1),
(6, 13, 13, NULL, '2015-11-11 12:55:33', '2015-11-11', 1),
(7, 13, 13, 194, '2015-11-19 09:29:52', '2015-11-19', 1),
(8, 13, 13, 200, '2015-11-22 07:28:33', '2015-11-22', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_post_share_view`
--
CREATE TABLE IF NOT EXISTS `dostums_post_share_view` (
`id` int(20)
,`user_id` int(20)
,`from_user_id` int(20)
,`post_id` int(20)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_post_status`
--

CREATE TABLE IF NOT EXISTS `dostums_post_status` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_post_status`
--

INSERT INTO `dostums_post_status` (`id`, `name`, `date`, `status`) VALUES
(1, 'Active', '2015-10-17', 1),
(2, 'Suspend', '2015-10-17', 1),
(3, 'Block/Spam', '2015-10-17', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_post_status_view`
--
CREATE TABLE IF NOT EXISTS `dostums_post_status_view` (
`id` int(20)
,`name` varchar(255)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_post_view`
--
CREATE TABLE IF NOT EXISTS `dostums_post_view` (
`id` int(20)
,`user_id` int(20)
,`to_user_id` int(20)
,`from_user_id` int(20)
,`comment` bigint(21)
,`likes` bigint(21)
,`post` text
,`photo_id` int(20)
,`post_status` int(20)
,`post_time` timestamp
,`date` date
,`post_permission` int(2)
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_profile_photo`
--

CREATE TABLE IF NOT EXISTS `dostums_profile_photo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_profile_photo`
--

INSERT INTO `dostums_profile_photo` (`id`, `user_id`, `photo_id`, `date`, `status`) VALUES
(1, 1, 2, '2015-10-14', 1),
(2, 2, 3, '2015-10-14', 1),
(3, 1, 9, '2015-10-14', 1),
(4, 1, 11, '2015-10-15', 2),
(5, 3, 12, '2015-10-15', 2),
(6, 9, 15, '2015-10-15', 2),
(7, 2, 20, '2015-10-29', 1),
(8, 2, 24, '2015-10-29', 2),
(9, 13, 35, '2015-11-08', 1),
(10, 13, 45, '2015-11-09', 1),
(11, 13, 46, '2015-11-09', 1),
(12, 13, 48, '2015-11-09', 1),
(13, 13, 50, '2015-11-09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_religion`
--

CREATE TABLE IF NOT EXISTS `dostums_religion` (
  `id` int(20) NOT NULL,
  `religion_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_religion`
--

INSERT INTO `dostums_religion` (`id`, `religion_name`, `date`, `status`) VALUES
(1, 'Islam', '2015-09-19', 1),
(2, 'Hinduism', '2015-09-19', 1),
(3, 'Buddhism', '2015-09-19', 1),
(4, 'Christianity', '2015-09-19', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_religion_view`
--
CREATE TABLE IF NOT EXISTS `dostums_religion_view` (
`id` int(20)
,`religion_name` varchar(255)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_user`
--

CREATE TABLE IF NOT EXISTS `dostums_user` (
  `id` int(20) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `skype_name` varchar(255) DEFAULT NULL,
  `last_login_ip` text,
  `gender` int(20) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `marital_status` int(20) DEFAULT NULL,
  `blood_group` int(20) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `passion` varchar(255) DEFAULT NULL,
  `auth_code` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `country_id` int(20) DEFAULT NULL,
  `city_id` varchar(200) DEFAULT NULL,
  `state_id` varchar(200) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `signup_ip` text NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `user_permission` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_user`
--

INSERT INTO `dostums_user` (`id`, `first_name`, `last_name`, `skype_name`, `last_login_ip`, `gender`, `dob`, `email`, `password`, `marital_status`, `blood_group`, `interest`, `passion`, `auth_code`, `phone_number`, `present_address`, `permanent_address`, `country_id`, `city_id`, `state_id`, `zip_code`, `login_ip`, `signup_ip`, `date`, `status`, `user_permission`) VALUES
(1, 'Fahad ', 'Bhuyian', NULL, NULL, 1, '2015-08-21', 'f.bhuyian@gmail.com', '7f2789f11c206ed10e0e60d16a5b91d0', NULL, NULL, NULL, NULL, '123456', '', NULL, NULL, 20, 'Dhaka', NULL, NULL, NULL, 'SUL-LABPC-11', '2015-10-18', 1, 1),
(2, 'Sirajum ', 'Munira', NULL, NULL, NULL, '1993-10-04', 'jakia@systechunimax.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '1234', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 'Jakia-PC', '2015-10-29', 1, 0),
(3, 'Md Mahamodur Zaman', 'Bhuyian', NULL, NULL, NULL, '2015-08-21', 'fahadvampare@gmail.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUL-LABPC-11', '2015-09-29', 1, 0),
(4, 'tasnim', 'shadrita', NULL, NULL, NULL, NULL, 'ritashad@gmail.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '6666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'munira-PC', '2015-10-08', 1, 0),
(5, 'Ifshita', 'tasnim', NULL, NULL, NULL, NULL, 'ifshita23@yahoo.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '6541', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'munira-PC', '2015-10-08', 1, 0),
(6, 'nousin', 'arabi', NULL, NULL, NULL, NULL, 'nou23sin@gmail.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '741', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'munira-PC', '2015-10-08', 1, 0),
(7, 'nabil', 'ahmed', NULL, NULL, NULL, NULL, 'nabilbabu@ymail.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'munira-PC', '2015-10-08', 1, 0),
(8, 'Admin', 'Systech', NULL, NULL, NULL, NULL, 'admin@gmail.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '111', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 'SUL-LABPC-11', '2015-10-11', 1, 0),
(9, 'Khairul', 'islam', NULL, NULL, NULL, NULL, 'arkhairul@hotmail.com', 'b133179f92ee7e094a06182b091ab7bf', NULL, NULL, NULL, NULL, '1111', NULL, NULL, NULL, 16, 'sadfsdafsdf', NULL, NULL, NULL, 'Khairul-PC', '2015-10-15', 1, 0),
(10, 'fahad', 'cc', NULL, NULL, NULL, NULL, 'adminss@dd.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUL-LABPC-11', '2015-10-15', 1, 0),
(11, 'dd', 'dd', NULL, NULL, NULL, NULL, 'ss@fd.com', '7e8a32176a113a7ba3d2b1f85834e828', NULL, NULL, NULL, NULL, '234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUL-LABPC-11', '2015-10-15', 1, 0),
(12, 'ds', 'asdasd', NULL, NULL, NULL, NULL, 'sdfds@ddas.com', '7f2789f11c206ed10e0e60d16a5b91d0', NULL, NULL, NULL, NULL, '1221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUL-LABPC-11', '2015-10-15', 1, 0),
(13, 'shanto', '', NULL, NULL, NULL, NULL, 'sk.bd2007@gmail.com', 'c199f5a4e53ff346e22f1183974943c9', NULL, NULL, NULL, NULL, 'asdf1234', NULL, NULL, NULL, 0, '', NULL, NULL, NULL, 'SUL-LABPC-11', '2015-11-11', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_user_about`
--

CREATE TABLE IF NOT EXISTS `dostums_user_about` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `about_short` text,
  `about_long` text NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_user_about`
--

INSERT INTO `dostums_user_about` (`id`, `user_id`, `about_short`, `about_long`, `occupation`, `company`, `website_url`, `date`, `status`) VALUES
(1, 1, 'dsfsdfsd fsd fsdf dsf sdfdsf', 'sdfsdfsd fsd fsdfsdfsdfds f fds', 'dsfdsf', 'dsfsdf df sdf sdf ', 'dsf sdfsdfsdf', '2015-10-06', 1),
(2, 8, NULL, '', '', '', '', '2015-10-11', 1),
(3, 9, 'About', 'adfsdafsdaf', 'adsfsdafdsf', 'sdafsdafsd', 'dsfsdfdsf', '2015-10-15', 1),
(4, 2, NULL, '', '', '', '', '2015-10-29', 1),
(5, 13, 'About', 'default text', '', '', '', '2015-11-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_user_parmission`
--

CREATE TABLE IF NOT EXISTS `dostums_user_parmission` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_user_parmission`
--

INSERT INTO `dostums_user_parmission` (`id`, `name`, `date`, `status`) VALUES
(1, 'Active', '2015-10-17', 1),
(2, 'Suspend', '2015-10-17', 1),
(3, 'Block/Spam', '2015-10-17', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_user_parmission_view`
--
CREATE TABLE IF NOT EXISTS `dostums_user_parmission_view` (
`id` int(20)
,`name` varchar(255)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_user_social_info`
--

CREATE TABLE IF NOT EXISTS `dostums_user_social_info` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `social_id` int(3) DEFAULT NULL,
  `social_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dostums_user_social_info`
--

INSERT INTO `dostums_user_social_info` (`id`, `user_id`, `social_id`, `social_name`, `date`, `status`) VALUES
(2, 1, 1, '@fffff', '2015-10-14', 1),
(3, 1, 2, '@fahadBh', '2015-10-08', 1),
(4, 1, 3, 'Fahad.Bhuyian', '2015-10-07', 1),
(5, 1, 4, 'FahadBh', '2015-10-07', 1),
(6, 1, 5, 'FBB', '2015-10-07', 1),
(7, 1, 6, 'GBB', '2015-10-07', 1),
(8, 9, 1, 'dfsadfsadf', '2015-10-15', 1),
(9, 9, 2, 'sdafsdfsdf', '2015-10-15', 1),
(10, 9, 4, 'dsfsdfsdf323232343', '2015-10-15', 1),
(11, 9, 6, 'dfsdafsdafsd', '2015-10-15', 1),
(12, 9, 5, 'fsadfsadfs', '2015-10-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dostums_user_type`
--

CREATE TABLE IF NOT EXISTS `dostums_user_type` (
  `id` int(20) NOT NULL,
  `user_type_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dostums_user_type`
--

INSERT INTO `dostums_user_type` (`id`, `user_type_name`, `date`, `status`) VALUES
(1, 'Admin', '2015-09-19', 1),
(2, 'General User', '2015-09-19', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_user_type_view`
--
CREATE TABLE IF NOT EXISTS `dostums_user_type_view` (
`id` int(20)
,`user_type_name` varchar(255)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dostums_user_view`
--
CREATE TABLE IF NOT EXISTS `dostums_user_view` (
`id` int(20)
,`name` varchar(511)
,`skype_name` varchar(255)
,`last_login_ip` text
,`gender` int(20)
,`sex` varchar(15)
,`dob` varchar(255)
,`email` varchar(255)
,`password` varchar(255)
,`marital_status` int(20)
,`blood_group` int(20)
,`interest` varchar(255)
,`passion` varchar(255)
,`auth_code` varchar(255)
,`phone_number` varchar(255)
,`present_address` varchar(255)
,`permanent_address` varchar(255)
,`country_id` int(20)
,`city_id` varchar(200)
,`state_id` varchar(200)
,`zip_code` varchar(255)
,`login_ip` varchar(255)
,`date` date
,`user_permission` int(11)
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `contactnumber` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `gender`, `blood_group`, `dob`, `contactnumber`, `address`, `username`, `password`, `date`, `status`) VALUES
(3, 'CMS Admin', '1', '1', '2015-12-09', '01927608261', 'asdS', 'cms', '7e8a32176a113a7ba3d2b1f85834e828', '2015-09-13', 1),
(4, 'SHanto', '1', '1', '1988-08-16', '13231312', 'wesaqweqw', 'shanto', '7e8a32176a113a7ba3d2b1f85834e828', '2015-11-25', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `login`
--
CREATE TABLE IF NOT EXISTS `login` (
`id` int(20)
,`name` varchar(255)
,`username` varchar(255)
,`password` varchar(255)
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `page_info`
--

CREATE TABLE IF NOT EXISTS `page_info` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_name_view` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_info`
--

INSERT INTO `page_info` (`id`, `name`, `page_name`, `page_name_view`, `menu_name`, `date`, `status`) VALUES
(5, 'dostums_post', 'dostums_post.php', '', 'Dostums Post', '2015-09-17', 1),
(6, 'dostums_likes', 'dostums_likes.php', '', 'Dostums Likes', '2015-09-17', 1),
(7, 'dostums_comment', 'dostums_comment.php', '', 'Dostums Comment', '2015-09-17', 1),
(8, 'dostums_post_share', 'dostums_post_share.php', '', 'Dostums Post Share', '2015-09-17', 1),
(9, 'dostums_comment_likes', 'dostums_comment_likes.php', '', 'Dostums Comment Likes', '2015-09-17', 1),
(10, 'dostums_post_permission', 'dostums_post_permission.php', '', 'Dostums Post Permission', '2015-09-17', 1),
(11, 'dostums_post_permission_record', 'dostums_post_permission_record.php', '', 'Dostums Post Permission Record', '2015-09-17', 1),
(12, 'dostums_notice', 'dostums_notice.php', '', 'Dostums Notice', '2015-09-19', 1),
(13, 'dostums_notice_slider', 'dostums_notice_slider.php', '', 'Dostums Notice Slider', '2015-09-19', 1),
(14, 'dostums_ads', 'dostums_ads.php', '', 'Dostums Ads', '2015-09-19', 1),
(15, 'dostums_post_location_record', 'dostums_post_location_record.php', '', 'Dostums Post Location Record', '2015-09-19', 1),
(16, 'dostums_country', 'dostums_country.php', '', 'Dostums Country', '2015-09-19', 1),
(17, 'dostums_user', 'dostums_user.php', '', 'Dostums User', '2015-09-19', 1),
(18, 'dostums_user_type', 'dostums_user_type.php', '', 'Dostums User Type', '2015-09-19', 1),
(19, 'dostums_language', 'dostums_language.php', '', 'Dostums Language', '2015-09-19', 1),
(20, 'dostums_religion', 'dostums_religion.php', '', 'Dostums Religion', '2015-09-19', 1),
(21, 'reset_code', 'reset_code.php', '', 'Reset Code', '2015-09-29', 1),
(22, 'dostums_post_status', 'dostums_post_status.php', '', 'Dostums Post Status', '2015-10-17', 1),
(23, 'dostums_user_parmission', 'dostums_user_parmission.php', '', 'Dostums user parmission', '2015-10-17', 1),
(24, 'dostums_group_icon', 'dostums_group_icon.php', '', 'Dostums Group Icon', '2015-11-11', 1),
(25, 'privacy_setting', 'privacy_setting.php', '', 'Privacy Setting', '2015-11-11', 1),
(26, 'dostums_page_type', 'dostums_page_type.php', '', 'Dostums Page Type', '2015-11-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privacy_setting`
--

CREATE TABLE IF NOT EXISTS `privacy_setting` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `detail` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy_setting`
--

INSERT INTO `privacy_setting` (`id`, `name`, `icon_class`, `detail`, `date`, `status`) VALUES
(1, 'Public', 'fa fa-globe', 'Anyone can see the group, its members and their posts', '2015-11-11', 1),
(2, 'Closed', 'fa fa-lock', 'Anyone can find the group but only members can see posts.', '2015-11-11', 1),
(3, 'Secret', 'fa fa-user-secret', 'Only members can find the group and can see posts.', '2015-11-11', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `privacy_setting_view`
--
CREATE TABLE IF NOT EXISTS `privacy_setting_view` (
`id` int(20)
,`name` varchar(255)
,`icon_class` varchar(255)
,`detail` text
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `reset_code`
--

CREATE TABLE IF NOT EXISTS `reset_code` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `reset_code` varchar(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reset_code`
--

INSERT INTO `reset_code` (`id`, `user_id`, `reset_code`, `date`, `status`) VALUES
(2, 3, '5e3e', '2015-09-29', 1),
(3, 1, 'fede', '2015-09-30', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reset_code_view`
--
CREATE TABLE IF NOT EXISTS `reset_code_view` (
`id` int(20)
,`user_id` int(20)
,`reset_code` varchar(5)
,`date` date
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Structure for view `dostums_ads_view`
--
DROP TABLE IF EXISTS `dostums_ads_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_ads_view` AS select `dostums_ads`.`id` AS `id`,`dostums_ads`.`ads_title` AS `ads_title`,`dostums_ads`.`ads_link` AS `ads_link`,`dostums_ads`.`ads_image` AS `ads_image`,`dostums_ads`.`date` AS `date`,`dostums_ads`.`status` AS `status` from `dostums_ads`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_comment_likes_view`
--
DROP TABLE IF EXISTS `dostums_comment_likes_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_comment_likes_view` AS select `dostums_comment_likes`.`id` AS `id`,`dostums_comment_likes`.`user_id` AS `user_id`,`dostums_comment_likes`.`post_id` AS `post_id`,`dostums_comment_likes`.`comment_id` AS `comment_id`,`dostums_comment_likes`.`date` AS `date`,`dostums_comment_likes`.`status` AS `status` from `dostums_comment_likes`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_comment_view`
--
DROP TABLE IF EXISTS `dostums_comment_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_comment_view` AS select `dostums_comment`.`id` AS `id`,`dostums_comment`.`user_id` AS `user_id`,`dostums_comment`.`post_id` AS `post_id`,(select count(`dostums_comment_likes_view`.`id`) from `dostums_comment_likes_view` where ((`dostums_comment_likes_view`.`comment_id` = `dostums_comment`.`id`) and (`dostums_comment_likes_view`.`post_id` = `dostums_comment`.`post_id`))) AS `likes`,`dostums_comment`.`comment` AS `comment`,`dostums_comment`.`post_time` AS `post_time`,`dostums_comment`.`date` AS `date`,`dostums_comment`.`status` AS `status` from `dostums_comment` order by `dostums_comment`.`id` desc;

-- --------------------------------------------------------

--
-- Structure for view `dostums_country_view`
--
DROP TABLE IF EXISTS `dostums_country_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_country_view` AS select `dostums_country`.`id` AS `id`,`dostums_country`.`country_name` AS `country_name`,`dostums_country`.`country_code` AS `country_code`,`dostums_country`.`date` AS `date`,`dostums_country`.`status` AS `status` from `dostums_country`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_friend_view`
--
DROP TABLE IF EXISTS `dostums_friend_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_friend_view` AS select `dostums_friend`.`id` AS `id`,`dostums_friend`.`uid` AS `uid`,`dostums_friend`.`to_uid` AS `to_uid`,`dostums_friend`.`date` AS `date`,`dostums_friend`.`status` AS `status` from `dostums_friend`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_group_icon_view`
--
DROP TABLE IF EXISTS `dostums_group_icon_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_group_icon_view` AS select `dostums_group_icon`.`id` AS `id`,`dostums_group_icon`.`name` AS `name`,`dostums_group_icon`.`class` AS `class`,`dostums_group_icon`.`date` AS `date`,`dostums_group_icon`.`status` AS `status` from `dostums_group_icon`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_language_view`
--
DROP TABLE IF EXISTS `dostums_language_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_language_view` AS select `dostums_language`.`id` AS `id`,`dostums_language`.`language_name` AS `language_name`,`dostums_language`.`date` AS `date`,`dostums_language`.`status` AS `status` from `dostums_language`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_likes_view`
--
DROP TABLE IF EXISTS `dostums_likes_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_likes_view` AS select `dostums_likes`.`id` AS `id`,`dostums_likes`.`user_id` AS `user_id`,`dostums_likes`.`post_id` AS `post_id`,`dostums_likes`.`date` AS `date`,`dostums_likes`.`status` AS `status` from `dostums_likes`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_notice_slider_view`
--
DROP TABLE IF EXISTS `dostums_notice_slider_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_notice_slider_view` AS select `dostums_notice_slider`.`id` AS `id`,`dostums_notice_slider`.`notice_slider_image` AS `notice_slider_image`,`dostums_notice_slider`.`notice_slider_date` AS `notice_slider_date`,`dostums_notice_slider`.`date` AS `date`,`dostums_notice_slider`.`status` AS `status` from `dostums_notice_slider`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_notice_view`
--
DROP TABLE IF EXISTS `dostums_notice_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_notice_view` AS select `dostums_notice`.`id` AS `id`,`dostums_notice`.`notice_title` AS `notice_title`,`dostums_notice`.`notice_details` AS `notice_details`,`dostums_notice`.`notice_image` AS `notice_image`,`dostums_notice`.`notice_date` AS `notice_date`,`dostums_notice`.`date` AS `date`,`dostums_notice`.`status` AS `status` from `dostums_notice`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_page_type_view`
--
DROP TABLE IF EXISTS `dostums_page_type_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_page_type_view` AS select `dostums_page_type`.`id` AS `id`,`dostums_page_type`.`name` AS `name`,`dostums_page_type`.`upload_image` AS `upload_image`,`dostums_page_type`.`date` AS `date`,`dostums_page_type`.`status` AS `status` from `dostums_page_type`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_post_location_record_view`
--
DROP TABLE IF EXISTS `dostums_post_location_record_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_post_location_record_view` AS select `dostums_post_location_record`.`id` AS `id`,`dostums_post_location_record`.`user_id` AS `user_id`,`dostums_post_location_record`.`post_id` AS `post_id`,`dostums_post_location_record`.`country_id` AS `country_id`,`dostums_post_location_record`.`date` AS `date`,`dostums_post_location_record`.`status` AS `status` from `dostums_post_location_record`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_post_permission_record_view`
--
DROP TABLE IF EXISTS `dostums_post_permission_record_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_post_permission_record_view` AS select `dostums_post_permission_record`.`id` AS `id`,`dostums_post_permission_record`.`user_id` AS `user_id`,`dostums_post_permission_record`.`post_id` AS `post_id`,`dostums_post_permission_record`.`permission_id` AS `permission_id`,`dostums_post_permission_record`.`date` AS `date`,`dostums_post_permission_record`.`status` AS `status` from `dostums_post_permission_record`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_post_permission_view`
--
DROP TABLE IF EXISTS `dostums_post_permission_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_post_permission_view` AS select `dostums_post_permission`.`id` AS `id`,`dostums_post_permission`.`user_id` AS `user_id`,`dostums_post_permission`.`post_permission` AS `post_permission`,`dostums_post_permission`.`date` AS `date`,`dostums_post_permission`.`status` AS `status` from `dostums_post_permission`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_post_share_view`
--
DROP TABLE IF EXISTS `dostums_post_share_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_post_share_view` AS select `dostums_post_share`.`id` AS `id`,`dostums_post_share`.`user_id` AS `user_id`,`dostums_post_share`.`from_user_id` AS `from_user_id`,`dostums_post_share`.`post_id` AS `post_id`,`dostums_post_share`.`date` AS `date`,`dostums_post_share`.`status` AS `status` from `dostums_post_share`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_post_status_view`
--
DROP TABLE IF EXISTS `dostums_post_status_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_post_status_view` AS select `dostums_post_status`.`id` AS `id`,`dostums_post_status`.`name` AS `name`,`dostums_post_status`.`date` AS `date`,`dostums_post_status`.`status` AS `status` from `dostums_post_status`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_post_view`
--
DROP TABLE IF EXISTS `dostums_post_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_post_view` AS select `dostums_post`.`id` AS `id`,`dostums_post`.`user_id` AS `user_id`,`dostums_post`.`to_user_id` AS `to_user_id`,`dostums_post`.`from_user_id` AS `from_user_id`,(select count(`dostums_comment`.`id`) from `dostums_comment` where (`dostums_comment`.`post_id` = `dostums_post`.`id`)) AS `comment`,(select count(`dostums_likes`.`id`) from `dostums_likes` where (`dostums_likes`.`post_id` = `dostums_post`.`id`)) AS `likes`,`dostums_post`.`post` AS `post`,`dostums_post`.`photo_id` AS `photo_id`,`dostums_post`.`post_status` AS `post_status`,`dostums_post`.`post_time` AS `post_time`,`dostums_post`.`date` AS `date`,`dostums_post`.`post_permission` AS `post_permission`,`dostums_post`.`status` AS `status` from `dostums_post`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_religion_view`
--
DROP TABLE IF EXISTS `dostums_religion_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_religion_view` AS select `dostums_religion`.`id` AS `id`,`dostums_religion`.`religion_name` AS `religion_name`,`dostums_religion`.`date` AS `date`,`dostums_religion`.`status` AS `status` from `dostums_religion`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_user_parmission_view`
--
DROP TABLE IF EXISTS `dostums_user_parmission_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_user_parmission_view` AS select `dostums_user_parmission`.`id` AS `id`,`dostums_user_parmission`.`name` AS `name`,`dostums_user_parmission`.`date` AS `date`,`dostums_user_parmission`.`status` AS `status` from `dostums_user_parmission`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_user_type_view`
--
DROP TABLE IF EXISTS `dostums_user_type_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_user_type_view` AS select `dostums_user_type`.`id` AS `id`,`dostums_user_type`.`user_type_name` AS `user_type_name`,`dostums_user_type`.`date` AS `date`,`dostums_user_type`.`status` AS `status` from `dostums_user_type`;

-- --------------------------------------------------------

--
-- Structure for view `dostums_user_view`
--
DROP TABLE IF EXISTS `dostums_user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dostums_user_view` AS select `dostums_user`.`id` AS `id`,concat(`dostums_user`.`first_name`,' ',`dostums_user`.`last_name`) AS `name`,`dostums_user`.`skype_name` AS `skype_name`,`dostums_user`.`last_login_ip` AS `last_login_ip`,`dostums_user`.`gender` AS `gender`,(case when (`dostums_user`.`gender` = 1) then 'Male' when (`dostums_user`.`gender` = 2) then 'Female' else 'Not Mention Yet' end) AS `sex`,`dostums_user`.`dob` AS `dob`,`dostums_user`.`email` AS `email`,`dostums_user`.`password` AS `password`,`dostums_user`.`marital_status` AS `marital_status`,`dostums_user`.`blood_group` AS `blood_group`,`dostums_user`.`interest` AS `interest`,`dostums_user`.`passion` AS `passion`,`dostums_user`.`auth_code` AS `auth_code`,`dostums_user`.`phone_number` AS `phone_number`,`dostums_user`.`present_address` AS `present_address`,`dostums_user`.`permanent_address` AS `permanent_address`,`dostums_user`.`country_id` AS `country_id`,`dostums_user`.`city_id` AS `city_id`,`dostums_user`.`state_id` AS `state_id`,`dostums_user`.`zip_code` AS `zip_code`,`dostums_user`.`login_ip` AS `login_ip`,`dostums_user`.`date` AS `date`,`dostums_user`.`user_permission` AS `user_permission`,`dostums_user`.`status` AS `status` from `dostums_user`;

-- --------------------------------------------------------

--
-- Structure for view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login` AS select `employee`.`id` AS `id`,`employee`.`name` AS `name`,`employee`.`username` AS `username`,`employee`.`password` AS `password`,`employee`.`status` AS `status` from `employee`;

-- --------------------------------------------------------

--
-- Structure for view `privacy_setting_view`
--
DROP TABLE IF EXISTS `privacy_setting_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `privacy_setting_view` AS select `privacy_setting`.`id` AS `id`,`privacy_setting`.`name` AS `name`,`privacy_setting`.`icon_class` AS `icon_class`,`privacy_setting`.`detail` AS `detail`,`privacy_setting`.`date` AS `date`,`privacy_setting`.`status` AS `status` from `privacy_setting`;

-- --------------------------------------------------------

--
-- Structure for view `reset_code_view`
--
DROP TABLE IF EXISTS `reset_code_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reset_code_view` AS select `reset_code`.`id` AS `id`,`reset_code`.`user_id` AS `user_id`,`reset_code`.`reset_code` AS `reset_code`,`reset_code`.`date` AS `date`,`reset_code`.`status` AS `status` from `reset_code`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorize_user`
--
ALTER TABLE `authorize_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_table_field`
--
ALTER TABLE `custom_table_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_ads`
--
ALTER TABLE `dostums_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_comment`
--
ALTER TABLE `dostums_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_comment_likes`
--
ALTER TABLE `dostums_comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_country`
--
ALTER TABLE `dostums_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_friend`
--
ALTER TABLE `dostums_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_group`
--
ALTER TABLE `dostums_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_group_cover_photo`
--
ALTER TABLE `dostums_group_cover_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_group_icon`
--
ALTER TABLE `dostums_group_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_group_members`
--
ALTER TABLE `dostums_group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_group_profile_photo`
--
ALTER TABLE `dostums_group_profile_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_language`
--
ALTER TABLE `dostums_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_likes`
--
ALTER TABLE `dostums_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_messages`
--
ALTER TABLE `dostums_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_notice`
--
ALTER TABLE `dostums_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_notice_slider`
--
ALTER TABLE `dostums_notice_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_page_cover_photo`
--
ALTER TABLE `dostums_page_cover_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_page_profile_photo`
--
ALTER TABLE `dostums_page_profile_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_page_type`
--
ALTER TABLE `dostums_page_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_photo`
--
ALTER TABLE `dostums_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_post`
--
ALTER TABLE `dostums_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_post_location_record`
--
ALTER TABLE `dostums_post_location_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_post_permission`
--
ALTER TABLE `dostums_post_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_post_permission_record`
--
ALTER TABLE `dostums_post_permission_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_post_share`
--
ALTER TABLE `dostums_post_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_post_status`
--
ALTER TABLE `dostums_post_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_profile_photo`
--
ALTER TABLE `dostums_profile_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_religion`
--
ALTER TABLE `dostums_religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_user`
--
ALTER TABLE `dostums_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_user_about`
--
ALTER TABLE `dostums_user_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_user_parmission`
--
ALTER TABLE `dostums_user_parmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_user_social_info`
--
ALTER TABLE `dostums_user_social_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostums_user_type`
--
ALTER TABLE `dostums_user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_info`
--
ALTER TABLE `page_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_setting`
--
ALTER TABLE `privacy_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_code`
--
ALTER TABLE `reset_code`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorize_user`
--
ALTER TABLE `authorize_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `custom_table_field`
--
ALTER TABLE `custom_table_field`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `dostums_ads`
--
ALTER TABLE `dostums_ads`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dostums_comment`
--
ALTER TABLE `dostums_comment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `dostums_comment_likes`
--
ALTER TABLE `dostums_comment_likes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `dostums_country`
--
ALTER TABLE `dostums_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `dostums_friend`
--
ALTER TABLE `dostums_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `dostums_group`
--
ALTER TABLE `dostums_group`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dostums_group_cover_photo`
--
ALTER TABLE `dostums_group_cover_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dostums_group_icon`
--
ALTER TABLE `dostums_group_icon`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `dostums_group_members`
--
ALTER TABLE `dostums_group_members`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dostums_group_profile_photo`
--
ALTER TABLE `dostums_group_profile_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dostums_language`
--
ALTER TABLE `dostums_language`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `dostums_likes`
--
ALTER TABLE `dostums_likes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `dostums_messages`
--
ALTER TABLE `dostums_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=277;
--
-- AUTO_INCREMENT for table `dostums_notice`
--
ALTER TABLE `dostums_notice`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dostums_notice_slider`
--
ALTER TABLE `dostums_notice_slider`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dostums_page_cover_photo`
--
ALTER TABLE `dostums_page_cover_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dostums_page_profile_photo`
--
ALTER TABLE `dostums_page_profile_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dostums_page_type`
--
ALTER TABLE `dostums_page_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dostums_photo`
--
ALTER TABLE `dostums_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `dostums_post`
--
ALTER TABLE `dostums_post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `dostums_post_location_record`
--
ALTER TABLE `dostums_post_location_record`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `dostums_post_permission`
--
ALTER TABLE `dostums_post_permission`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dostums_post_permission_record`
--
ALTER TABLE `dostums_post_permission_record`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `dostums_post_share`
--
ALTER TABLE `dostums_post_share`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dostums_post_status`
--
ALTER TABLE `dostums_post_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dostums_profile_photo`
--
ALTER TABLE `dostums_profile_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dostums_religion`
--
ALTER TABLE `dostums_religion`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dostums_user`
--
ALTER TABLE `dostums_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dostums_user_about`
--
ALTER TABLE `dostums_user_about`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dostums_user_parmission`
--
ALTER TABLE `dostums_user_parmission`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dostums_user_social_info`
--
ALTER TABLE `dostums_user_social_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dostums_user_type`
--
ALTER TABLE `dostums_user_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page_info`
--
ALTER TABLE `page_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `privacy_setting`
--
ALTER TABLE `privacy_setting`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reset_code`
--
ALTER TABLE `reset_code`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
