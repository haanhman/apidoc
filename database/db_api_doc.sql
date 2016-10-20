-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 192.168.10.10
-- Generation Time: Oct 20, 2016 at 12:30 PM
-- Server version: 5.7.12-0ubuntu1.1
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_api_doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_argument`
--

CREATE TABLE `tbl_argument` (
  `id` int(10) UNSIGNED NOT NULL,
  `function_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `data_type` enum('int','float','double','string','array') NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '1',
  `is_header` tinyint(1) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `weight` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_argument`
--

INSERT INTO `tbl_argument` (`id`, `function_id`, `name`, `data_type`, `is_required`, `is_header`, `description`, `weight`, `created`) VALUES
(227, 14, 'name', 'int', 1, 0, 'tag name', 0, 1476952671),
(228, 14, 'access_token', 'string', 1, 1, 'user access token', 1, 1476952671),
(229, 15, 'name', 'string', 1, 0, 'tag name', 0, 1476952681),
(230, 15, 'access_token', 'string', 1, 1, 'current access token', 1, 1476952681),
(231, 15, 'tag_id', 'int', 1, 0, 'tag id identify', 2, 1476952681),
(233, 16, 'access_token', 'string', 1, 1, 'user access token', 0, 1476952734),
(237, 17, 'access_token', 'string', 1, 1, 'user access token', 0, 1476953052),
(238, 17, 'access_token', 'string', 1, 1, 'user access token', 0, 1476953052),
(239, 18, 'name', 'int', 1, 0, 'task name', 0, 1476953131),
(240, 18, 'project_id', 'int', 1, 0, 'project ID identify', 1, 1476953131),
(241, 18, 'access_token', 'int', 1, 1, 'user access token', 2, 1476953131),
(242, 19, 'name', 'int', 1, 0, 'task name', 0, 1476953140),
(243, 19, 'access_token', 'string', 1, 1, 'user access token', 1, 1476953140),
(244, 19, 'task_id', 'int', 1, 0, 'task id identify', 2, 1476953140),
(245, 22, 'name[]', 'array', 1, 0, 'task name is an array', 0, 1476953161),
(246, 22, 'task_id[]', 'array', 1, 0, 'task id is an array', 1, 1476953161),
(247, 22, 'access_token', 'int', 1, 1, 'access_token', 2, 1476953161),
(248, 23, 'tag_id[]', 'array', 1, 0, 'tag id is an array', 0, 1476953168),
(249, 23, 'access_token', 'string', 1, 1, 'current access token', 1, 1476953168),
(250, 20, 'access_token', 'int', 1, 1, 'current access token', 1, 1476953190),
(251, 21, 'access_token', 'string', 1, 1, 'user access token', 0, 1476953211),
(252, 21, 'project_id', 'int', 0, 0, 'project id identify', 1, 1476953211),
(253, 9, 'name', 'string', 1, 0, 'client name', 0, 1476953334),
(254, 9, 'description', 'string', 0, 0, '', 1, 1476953334),
(255, 9, 'status', 'int', 0, 0, 'client status, 0/1, default = 1', 2, 1476953334),
(256, 9, 'access_token', 'string', 1, 1, 'user access token', 3, 1476953334),
(257, 9, 'user_id', 'int', 1, 1, 'ID identify user', 4, 1476953334),
(258, 10, 'access_token', 'int', 1, 1, 'user access token', 0, 1476953340),
(259, 11, 'name', 'string', 1, 0, 'client name', 0, 1476953346),
(260, 11, 'description', 'string', 0, 0, '', 1, 1476953346),
(261, 11, 'access_token', 'string', 1, 1, 'user access token', 2, 1476953346),
(262, 11, 'client_id', 'int', 1, 0, 'client id identify', 3, 1476953346),
(263, 12, 'access_token', 'string', 1, 1, 'user access token', 1, 1476953363),
(264, 13, 'project_id', 'int', 1, 0, 'project ID identify', 0, 1476953386),
(265, 13, 'project_id', 'int', 1, 0, 'project ID identify', 0, 1476953386),
(266, 13, 'access_token', 'string', 1, 1, 'user access token', 1, 1476953386),
(267, 13, 'access_token', 'string', 1, 1, 'user access token', 1, 1476953386),
(268, 24, 'client_id', 'int', 0, 0, 'client id identify', 0, 1476953462),
(269, 24, 'name', 'string', 1, 0, 'project name', 1, 1476953462),
(270, 24, 'description', 'string', 0, 0, '', 2, 1476953462),
(271, 24, 'access_token', 'int', 1, 0, 'user access token', 3, 1476953462),
(272, 25, 'project_id', 'int', 1, 0, 'project ID identify', 0, 1476953466),
(273, 25, 'client_id', 'int', 0, 0, '', 1, 1476953466),
(274, 25, 'name', 'string', 1, 0, '', 2, 1476953466),
(275, 25, 'description', 'string', 0, 0, '', 3, 1476953466),
(276, 25, 'status', 'int', 1, 0, '0/1', 4, 1476953466),
(277, 25, 'access_token', 'string', 1, 1, '', 5, 1476953466),
(278, 26, 'access_token', 'string', 1, 1, 'current access token', 1, 1476953511),
(279, 27, 'user_id', 'int', 0, 0, '', 0, 1476953520),
(280, 27, 'access_token', 'string', 1, 1, 'user access token', 1, 1476953520),
(281, 28, 'access_token', 'string', 1, 1, 'current access token', 1, 1476953571),
(282, 29, 'access_token', 'string', 1, 1, 'current access token', 1, 1476953595),
(283, 30, 'access_token', 'int', 1, 1, 'current access token', 1, 1476953616),
(292, 31, 'subject', 'string', 1, 0, '', 0, 1476953738),
(293, 31, 'project_id', 'int', 1, 0, 'project ID identify', 1, 1476953738),
(294, 31, 'task_id', 'int', 1, 0, 'task id identify', 2, 1476953738),
(295, 31, 'start_time', 'string', 1, 0, 'Ex: 2016-10-25 12:00 or 12:00', 3, 1476953739),
(296, 31, 'end_time', 'string', 1, 0, 'Ex: 2016-10-25 12:30 or 12:30', 4, 1476953739),
(297, 31, 'note', 'string', 0, 0, '', 5, 1476953739),
(298, 31, 'tag_id[]', 'array', 0, 0, 'list tag id', 6, 1476953739),
(299, 31, 'access_token', 'int', 1, 1, 'user access token', 7, 1476953739),
(300, 32, 'subject', 'int', 1, 0, '', 0, 1476953744),
(301, 32, 'task_id', 'int', 1, 0, 'task id identify', 1, 1476953744),
(302, 32, 'start_time', 'int', 1, 0, 'Ex: 2016-10-25 12:00 or 12:00', 2, 1476953744),
(303, 32, 'end_time', 'int', 1, 0, 'Ex: 2016-10-25 12:30 or 12:30', 3, 1476953744),
(304, 32, 'note', 'int', 0, 0, '', 4, 1476953744),
(305, 32, 'tag_id[]', 'int', 0, 0, 'list tag id', 5, 1476953744),
(306, 32, 'access_token', 'string', 1, 1, 'user access token', 6, 1476953744),
(307, 33, 'access_token', 'int', 1, 1, 'user access token', 0, 1476953765),
(314, 8, 'access_token', 'string', 1, 1, 'access token', 0, 1476953984),
(315, 8, 'group_by', 'string', 0, 0, 'day/week/month', 1, 1476953984),
(316, 8, 'start_date', 'string', 0, 0, '2016-10-01', 2, 1476953984),
(317, 8, 'end_date', 'string', 0, 0, '2016-10-30', 3, 1476953984),
(329, 2, 'access_token', 'string', 1, 1, 'current access token', 0, 1476954396),
(330, 3, 'email', 'string', 1, 0, 'user email', 0, 1476954405),
(331, 3, 'password', 'string', 1, 0, 'user password', 1, 1476954405),
(332, 4, 'email', 'string', 1, 0, 'user email', 0, 1476954415),
(333, 4, 'google_token', 'string', 1, 0, 'google access token', 1, 1476954415),
(334, 5, 'access_token', 'string', 1, 1, 'current access token', 0, 1476954426),
(335, 6, 'access_token', 'int', 1, 1, 'current access token', 0, 1476954431),
(336, 7, 'employee_id', 'int', 0, 0, 'VD: 32', 0, 1476954481),
(337, 7, 'name', 'string', 0, 0, 'VD: Nguyen Van Man', 1, 1476954481),
(338, 7, 'email', 'string', 0, 0, 'VD: man.nv@kayac.vn', 2, 1476954481),
(339, 7, 'password', 'string', 0, 0, 'VD: 123123', 3, 1476954481),
(340, 7, 'department_id', 'int', 0, 0, 'VD: 1', 4, 1476954481),
(341, 7, 'mobile	', 'string', 0, 0, 'VD: 0904.488.xxx', 5, 1476954481),
(342, 7, 'permission_type', 'int', 0, 0, 'VD: 1: admin, 2: leader, 3: member', 6, 1476954481),
(343, 7, 'status', 'int', 0, 0, 'VD: 0/1', 7, 1476954481),
(344, 7, 'access_token', 'string', 1, 1, 'user access token', 8, 1476954481),
(345, 1, 'email', 'string', 1, 0, 'user email', 0, 1476954489),
(346, 1, 'password', 'string', 1, 0, 'user password', 1, 1476954489),
(347, 34, 'access_token', 'string', 1, 1, 'user access token', 0, 1476954646);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_function`
--

CREATE TABLE `tbl_function` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `end_point` varchar(255) NOT NULL,
  `request_method` enum('GET','POST','PUT','DELETE') NOT NULL,
  `description` text NOT NULL,
  `sample_data` text NOT NULL,
  `created` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_function`
--

INSERT INTO `tbl_function` (`id`, `group_id`, `end_point`, `request_method`, `description`, `sample_data`, `created`, `status`) VALUES
(1, 1, '/user', 'POST', 'sign up new user', '{sample:"data sample"}', 1476937802, 1),
(2, 7, '/auth/refresh-token', 'GET', 'Reset API token', '{sample:"data sample"}', 1476937979, 1),
(3, 7, '/auth/login', 'POST', '- HTTP Base auth with email and password', '{sample:"data sample"}', 1476938068, 1),
(4, 7, '/auth/google-login', 'POST', '- HTTP Base Auth with API token: login with google account', '{sample:"data sample"}', 1476938155, 1),
(5, 7, '/auth/auto-login', 'POST', 'Authentication with a session cookie (auto login)', '{sample:"data sample"}', 1476938459, 1),
(6, 7, '/auth/logout', 'POST', 'Destroy the session, logout account', '{sample:"data sample"}', 1476938590, 1),
(7, 1, '/user', 'PUT', 'Update current user data', '{sample:"data sample"}', 1476938731, 1),
(8, 6, '/entry/user', 'GET', '- get time entries of user, group by day\r\n- get time entries started in a specific time range', '{sample:"data sample"}', 1476938985, 1),
(9, 2, '/client', 'POST', '- create a client', '{data: "sample..."}', 1476943687, 1),
(10, 2, '/client', 'GET', '- get client details', '{"data":"todo..."}', 1476944867, 1),
(11, 2, '/client', 'PUT', '- update client info', '{"status":1,"message":"update client success"}', 1476945041, 1),
(12, 2, '/client/1,2,3', 'DELETE', '- delete multiple client', '{status:1,message:"delete client success"}', 1476945194, 1),
(13, 2, '/client/project', 'GET', '- get clients by project', '{data:"todo..."}', 1476945468, 0),
(14, 3, '/tag', 'POST', '- create tag', '{data:"todo..."}', 1476945734, 1),
(15, 3, '/tag', 'PUT', '- update tag info', '{data:"sample"}', 1476945969, 1),
(16, 3, '/tag/1,2,3', 'DELETE', '- delete multiple tag', '{status:1, message:"delete tag success"}', 1476946121, 1),
(17, 3, '/tag', 'GET', '- get all tag', '{data:"todo..."}', 1476946254, 1),
(18, 4, '/task', 'POST', '- create a task', '{data:"doto...."}', 1476946863, 1),
(19, 4, '/task', 'PUT', '- update task info', '{data:"todo..."}', 1476946889, 1),
(20, 4, '/task/1,2,3', 'DELETE', '- delete multiple task', '{status:1, message:"sucess"}', 1476947099, 1),
(21, 4, '/task', 'GET', '- get all task\r\n- get all task by project', '{data:"todo..."}', 1476947139, 1),
(22, 4, '/task/update-multi', 'PUT', '- update multiple tasks', '{data:"todo..."}', 1476947733, 0),
(23, 4, '/task/delete-multi', 'DELETE', '- delete multiple tag', '{status:1, message:"success"}', 1476948064, 0),
(24, 5, '/project', 'POST', '- create a project', '{data:"todo..."}', 1476948244, 1),
(25, 5, '/project', 'PUT', '- update project info', '{data:"todo..."}', 1476948259, 1),
(26, 5, '/project/1,2,3', 'DELETE', '- delete multiple project', '{"status":0,"message":"success"}', 1476948270, 1),
(27, 5, '/project', 'GET', '- get all project\r\n- get project by user', '{data:"todo..."}', 1476948316, 1),
(28, 5, '/project/1', 'GET', '- get project detail\r\n- return all info, user, task, tag, ...', '{data:"todo..."}', 1476949115, 1),
(29, 5, '/project/user/1,2,3', 'POST', '- add user into project', '{data:"todo"}', 1476949545, 1),
(30, 5, '/project/user/1,2,3', 'DELETE', '- delete user', '{data:"todo"}', 1476949687, 1),
(31, 6, '/entry', 'POST', '- create an entry', '{data:"todo..."}', 1476950959, 1),
(32, 6, '/entry', 'PUT', '- update time entry', '{data:"todo..."}', 1476951538, 1),
(33, 6, '/entry/1,2,3', 'DELETE', '- delete multiple time entry', '{status:1, message:"success"}', 1476951538, 1),
(34, 1, '/user', 'GET', '- get all users with paging', '{data:"todo..."}', 1476954646, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_function`
--

CREATE TABLE `tbl_group_function` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `weight` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_group_function`
--

INSERT INTO `tbl_group_function` (`id`, `project_id`, `name`, `description`, `weight`, `created`) VALUES
(1, 1, 'Users', 'list function for user', 2, 1476937662),
(2, 1, 'Client', 'list function for clients', 5, 1476943413),
(3, 1, 'Tags', 'tag manage', 3, 1476945593),
(4, 1, 'Task', 'task manage', 4, 1476946400),
(5, 1, 'Project', 'project manage', 6, 1476948170),
(6, 1, 'Entries', '', 7, 1476949941),
(7, 1, 'Authentication', '', 1, 1476954348);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migrations`
--

CREATE TABLE `tbl_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_migrations`
--

INSERT INTO `tbl_migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2016_10_19_161627_tbl_project', 1),
(32, '2016_10_19_161643_tbl_group_function', 1),
(33, '2016_10_19_161657_tbl_function', 1),
(34, '2016_10_19_161703_tbl_arugument', 1),
(35, '2016_10_19_161709_tbl_return_value', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_resets`
--

CREATE TABLE `tbl_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `name`, `description`, `status`, `created`) VALUES
(1, 'Time maganement system', 'Time maganement system api server', 1, 1476937472);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_value`
--

CREATE TABLE `tbl_return_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `function_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `data_type` enum('int','float','double','string','array') NOT NULL,
  `description` text NOT NULL,
  `weight` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_return_value`
--

INSERT INTO `tbl_return_value` (`id`, `function_id`, `name`, `data_type`, `description`, `weight`, `created`) VALUES
(91, 14, 'data', 'array', 'tag detail', 0, 1476952671),
(92, 15, 'data', 'array', 'tag detail', 0, 1476952681),
(95, 16, 'status', 'int', '0: errors, 1: success', 0, 1476952734),
(96, 16, 'message', 'string', 'message for client', 1, 1476952734),
(99, 17, 'data', 'array', 'list client (group by client name)', 0, 1476953052),
(100, 17, 'data', 'array', 'list client (group by client name)', 0, 1476953052),
(101, 18, 'data', 'array', 'task detail', 0, 1476953131),
(102, 19, 'data', 'array', 'task detail', 0, 1476953140),
(103, 22, 'data', 'array', 'list task detail', 0, 1476953161),
(104, 23, 'status', 'int', '0: errors, 1: success', 0, 1476953168),
(105, 23, 'message', 'string', 'message for client', 1, 1476953168),
(106, 20, 'status', 'int', '0:error, 1:success', 0, 1476953190),
(107, 20, 'message', 'string', 'message for client', 1, 1476953190),
(108, 21, 'data', 'array', 'list task of user', 0, 1476953211),
(109, 9, 'data', 'array', 'client detail', 0, 1476953334),
(110, 10, 'data', 'array', 'all client sort by (Client name)', 0, 1476953340),
(111, 11, 'status', 'int', '0/1: 0: error, 1: success', 0, 1476953346),
(112, 11, 'message', 'string', 'message for client', 1, 1476953346),
(113, 12, 'status', 'int', '0: errors, 1: success', 0, 1476953363),
(114, 12, 'message', 'string', 'message for client', 1, 1476953363),
(115, 13, 'data', 'array', 'list client (group by client name)', 0, 1476953386),
(116, 13, 'data', 'array', 'list client (group by client name)', 0, 1476953386),
(117, 24, 'data', 'array', 'project detail', 0, 1476953462),
(118, 25, 'data', 'array', 'project detail', 0, 1476953466),
(119, 26, 'status', 'int', '0:error, 1:success', 0, 1476953511),
(120, 26, 'message', 'string', 'message for client', 1, 1476953511),
(121, 27, 'data', 'array', 'list project', 0, 1476953520),
(122, 28, 'data', 'array', 'project detail', 0, 1476953571),
(123, 29, 'data', 'array', 'todo', 0, 1476953595),
(124, 30, 'data', 'array', 'todo', 0, 1476953616),
(126, 31, 'data', 'array', 'entry detail', 0, 1476953739),
(127, 32, 'data', 'array', 'entry detail', 0, 1476953744),
(130, 33, 'status', 'int', '0:error, 1:success', 0, 1476953765),
(131, 33, 'message', 'string', 'message for client', 1, 1476953765),
(134, 8, 'data', 'array', 'all time entries of user, group by day', 0, 1476953984),
(143, 2, 'data', 'int', 'user data detail with access token', 0, 1476954396),
(144, 3, 'data', 'string', 'user data detail with access token', 0, 1476954405),
(145, 4, 'data', 'string', 'user data detail with access token', 0, 1476954415),
(146, 5, 'data', 'array', 'user data detail with access token', 0, 1476954426),
(147, 6, 'status', 'int', '0: errors, 1: success', 0, 1476954431),
(148, 7, 'data', 'array', 'user data detail with access token', 0, 1476954481),
(149, 1, 'data', 'string', 'user data detail with access token', 0, 1476954489),
(150, 34, 'data', 'array', 'list users with pagning', 0, 1476954646);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_argument`
--
ALTER TABLE `tbl_argument`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_function`
--
ALTER TABLE `tbl_function`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group_function`
--
ALTER TABLE `tbl_group_function`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_password_resets`
--
ALTER TABLE `tbl_password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_return_value`
--
ALTER TABLE `tbl_return_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_argument`
--
ALTER TABLE `tbl_argument`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;
--
-- AUTO_INCREMENT for table `tbl_function`
--
ALTER TABLE `tbl_function`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_group_function`
--
ALTER TABLE `tbl_group_function`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_return_value`
--
ALTER TABLE `tbl_return_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
