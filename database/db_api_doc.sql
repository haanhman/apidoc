-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 192.168.10.10
-- Generation Time: Oct 21, 2016 at 06:04 AM
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
(329, 2, 'access_token', 'string', 1, 1, 'current access token', 0, 1476954396),
(330, 3, 'email', 'string', 1, 0, 'user email', 0, 1476954405),
(331, 3, 'password', 'string', 1, 0, 'user password', 1, 1476954405),
(332, 4, 'email', 'string', 1, 0, 'user email', 0, 1476954415),
(333, 4, 'google_token', 'string', 1, 0, 'google access token', 1, 1476954415),
(334, 5, 'access_token', 'string', 1, 1, 'current access token', 0, 1476954426),
(360, 9, 'name', 'string', 1, 0, 'client name', 0, 1477016674),
(361, 9, 'description', 'string', 0, 0, '', 1, 1477016674),
(362, 9, 'status', 'int', 0, 0, 'client status, 0/1, default = 1', 2, 1477016674),
(363, 9, 'access_token', 'string', 1, 1, 'user access token', 3, 1477016674),
(364, 9, 'user_id', 'int', 1, 1, 'ID identify user', 4, 1477016674),
(374, 11, 'name', 'string', 1, 0, 'client name', 0, 1477016758),
(375, 11, 'description', 'string', 0, 0, '', 1, 1477016758),
(376, 11, 'access_token', 'string', 1, 1, 'user access token', 2, 1477016758),
(377, 11, 'client_id', 'int', 1, 0, 'client id identify', 3, 1477016758),
(379, 17, 'access_token', 'string', 1, 1, 'user access token', 0, 1477016774),
(380, 17, 'access_token', 'string', 1, 1, 'user access token', 1, 1477016774),
(382, 15, 'name', 'string', 1, 0, 'tag name', 0, 1477016783),
(383, 15, 'access_token', 'string', 1, 1, 'current access token', 1, 1477016784),
(384, 15, 'tag_id', 'int', 1, 0, 'tag id identify', 2, 1477016784),
(385, 14, 'name', 'int', 1, 0, 'tag name', 0, 1477016787),
(386, 14, 'access_token', 'string', 1, 1, 'user access token', 1, 1477016787),
(390, 19, 'name', 'int', 1, 0, 'task name', 0, 1477016808),
(391, 19, 'access_token', 'string', 1, 1, 'user access token', 1, 1477016808),
(392, 19, 'task_id', 'int', 1, 0, 'task id identify', 2, 1477016808),
(393, 18, 'name', 'int', 1, 0, 'task name', 0, 1477016814),
(394, 18, 'project_id', 'int', 1, 0, 'project ID identify', 1, 1477016814),
(395, 18, 'access_token', 'int', 1, 1, 'user access token', 2, 1477016814),
(402, 25, 'project_id', 'int', 1, 0, 'project ID identify', 0, 1477016852),
(403, 25, 'client_id', 'int', 0, 0, '', 1, 1477016852),
(404, 25, 'name', 'string', 1, 0, '', 2, 1477016852),
(405, 25, 'description', 'string', 0, 0, '', 3, 1477016852),
(406, 25, 'status', 'int', 1, 0, '0/1', 4, 1477016852),
(407, 25, 'access_token', 'string', 1, 1, '', 5, 1477016852),
(408, 24, 'client_id', 'int', 0, 0, 'client id identify', 0, 1477016855),
(409, 24, 'name', 'string', 1, 0, 'project name', 1, 1477016855),
(410, 24, 'description', 'string', 0, 0, '', 2, 1477016855),
(411, 24, 'access_token', 'int', 1, 0, 'user access token', 3, 1477016855),
(416, 31, 'subject', 'string', 1, 0, '', 0, 1477016897),
(417, 31, 'project_id', 'int', 1, 0, 'project ID identify', 1, 1477016897),
(418, 31, 'task_id', 'int', 1, 0, 'task id identify', 2, 1477016897),
(419, 31, 'start_time', 'string', 1, 0, 'Ex: 2016-10-25 12:00 or 12:00', 3, 1477016897),
(420, 31, 'end_time', 'string', 1, 0, 'Ex: 2016-10-25 12:30 or 12:30', 4, 1477016897),
(421, 31, 'note', 'string', 0, 0, '', 5, 1477016897),
(422, 31, 'tag_id[]', 'array', 0, 0, 'list tag id', 6, 1477016897),
(423, 31, 'access_token', 'int', 1, 1, 'user access token', 7, 1477016897),
(432, 6, 'access_token', 'string', 1, 1, 'current access token', 0, 1477016919),
(440, 32, 'subject', 'string', 1, 0, '', 0, 1477017076),
(441, 32, 'task_id', 'int', 1, 0, 'task id identify', 1, 1477017076),
(442, 32, 'start_time', 'string', 1, 0, 'Ex: 2016-10-25 12:00 or 12:00', 2, 1477017076),
(443, 32, 'end_time', 'string', 1, 0, 'Ex: 2016-10-25 12:30 or 12:30', 3, 1477017076),
(444, 32, 'note', 'string', 0, 0, '', 4, 1477017076),
(445, 32, 'tag_id[]', 'array', 0, 0, 'list tag id', 5, 1477017076),
(446, 32, 'access_token', 'string', 1, 1, 'user access token', 6, 1477017076),
(454, 30, 'access_token', 'int', 1, 1, 'current access token', 0, 1477018540),
(457, 21, 'access_token', 'string', 1, 1, 'user access token', 0, 1477018575),
(458, 26, 'access_token', 'string', 1, 1, 'current access token', 0, 1477018597),
(459, 28, 'access_token', 'string', 1, 1, 'current access token', 0, 1477018616),
(460, 33, 'access_token', 'int', 1, 1, 'user access token', 0, 1477018774),
(465, 20, 'access_token', 'int', 1, 1, 'current access token', 0, 1477018809),
(466, 16, 'access_token', 'string', 1, 1, 'user access token', 0, 1477018822),
(467, 12, 'access_token', 'string', 1, 1, 'user access token', 0, 1477018835),
(468, 29, 'access_token', 'string', 1, 1, 'current access token', 0, 1477018982),
(469, 29, 'user_ids', 'string', 1, 0, 'list user into add to project', 1, 1477018982),
(491, 35, 'name', 'string', 0, 0, '', 0, 1477019599),
(492, 35, 'mobile', 'string', 0, 0, '', 1, 1477019599),
(493, 35, 'access_token', 'string', 1, 1, '', 2, 1477019599),
(503, 36, 'old_password', 'string', 1, 0, 'old password', 0, 1477019777),
(504, 36, 'new_password', 'string', 1, 0, 'new password', 1, 1477019777),
(505, 36, 'access_token', 'string', 1, 1, 'user access token', 2, 1477019777),
(506, 34, 'access_token', 'string', 1, 1, 'user access token', 0, 1477019826),
(507, 34, 'limit', 'int', 0, 0, 'default: 10', 1, 1477019826),
(508, 1, 'email', 'string', 1, 0, 'user email', 0, 1477019845),
(509, 1, 'password', 'string', 1, 0, 'user password', 1, 1477019845),
(510, 10, 'access_token', 'int', 1, 1, 'user access token', 0, 1477020564),
(511, 10, 'limit', 'int', 0, 0, 'default 10', 1, 1477020564),
(512, 37, 'access_token', 'string', 1, 1, 'user access token', 0, 1477020619),
(513, 27, 'access_token', 'string', 1, 1, 'user access token', 1, 1477020813),
(514, 27, 'limit', 'int', 0, 0, 'default: 10', 2, 1477020813),
(515, 38, 'access_token', 'string', 1, 1, 'user access token', 0, 1477020944),
(516, 8, 'access_token', 'string', 1, 1, 'access token', 0, 1477021608),
(517, 8, 'group_by', 'string', 0, 0, 'day/week/month', 1, 1477021608),
(518, 8, 'start_date', 'string', 0, 0, '2016-10-01', 2, 1477021608),
(519, 8, 'end_date', 'string', 0, 0, '2016-10-30', 3, 1477021608),
(520, 39, 'access_token', 'string', 1, 1, '', 0, 1477021765),
(521, 40, 'name', 'string', 1, 0, 'department name', 0, 1477022467),
(522, 40, 'access_token', 'string', 1, 1, 'user access token', 1, 1477022467),
(523, 41, 'name', 'string', 1, 0, 'department name', 0, 1477022531),
(524, 41, 'access_token', 'int', 1, 1, 'current access token', 1, 1477022531),
(525, 42, 'access_token', 'string', 1, 1, 'user access token', 0, 1477022589),
(526, 7, 'employee_id', 'int', 0, 0, 'VD: 32', 0, 1477022631),
(527, 7, 'name', 'string', 0, 0, 'VD: Nguyen Van Man', 1, 1477022631),
(528, 7, 'email', 'string', 0, 0, 'VD: man.nv@kayac.vn', 2, 1477022631),
(529, 7, 'password', 'string', 0, 0, 'VD: 123123', 3, 1477022631),
(530, 7, 'department_id', 'int', 0, 0, 'VD: 1', 4, 1477022631),
(531, 7, 'mobile	', 'string', 0, 0, 'VD: 0904.488.xxx', 5, 1477022631),
(532, 7, 'permission_type', 'int', 0, 0, 'VD: 1: admin, 2: leader, 3: member', 6, 1477022631),
(533, 7, 'status', 'int', 0, 0, 'VD: 0/1', 7, 1477022631),
(534, 7, 'access_token', 'string', 1, 1, 'admin access token', 8, 1477022631);

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
(1, 1, '/users', 'POST', '- Sign up new user', '{sample:"data sample"}', 1476937802, 1),
(2, 7, '/auth/refresh-token', 'GET', 'Reset API token', '{sample:"data sample"}', 1476937979, 1),
(3, 7, '/auth/login', 'POST', '- HTTP Base auth with email and password', '{sample:"data sample"}', 1476938068, 1),
(4, 7, '/auth/google-login', 'POST', '- HTTP Base Auth with API token: login with google account', '{sample:"data sample"}', 1476938155, 1),
(5, 7, '/auth/auto-login', 'POST', 'Authentication with a session cookie (auto login)', '{sample:"data sample"}', 1476938459, 1),
(6, 7, '/auth/logout', 'POST', 'Destroy the session, logout account', '{sample:"data sample"}', 1476938590, 1),
(7, 1, '/users/{user_id}', 'PUT', '- Update user specified\r\n- Permission: admin', '{sample:"data sample"}', 1476938731, 1),
(8, 1, '/users/{user_id}/entry', 'GET', '- get time entries of user, group by day\r\n- get time entries started in a specific time range', '{sample:"data sample"}', 1476938985, 1),
(9, 2, '/clients', 'POST', '- create a client', '{data: "sample..."}', 1476943687, 1),
(10, 2, '/clients', 'GET', '- get all clients', '{"data":"todo..."}', 1476944867, 1),
(11, 2, '/clients', 'PUT', '- update client info', '{"status":1,"message":"update client success"}', 1476945041, 1),
(12, 2, '/clients/{client_ids}', 'DELETE', '- delete multiple client', '{status:1,message:"delete client success"}', 1476945194, 1),
(14, 3, '/tags', 'POST', '- create tag', '{data:"todo..."}', 1476945734, 1),
(15, 3, '/tags', 'PUT', '- update tag info', '{data:"sample"}', 1476945969, 1),
(16, 3, '/tags/{tag_ids}', 'DELETE', '- delete multiple tag', '{status:1, message:"delete tag success"}', 1476946121, 1),
(17, 3, '/tags', 'GET', '- get all tag', '{data:"todo..."}', 1476946254, 1),
(18, 4, '/tasks', 'POST', '- create a task', '{data:"doto...."}', 1476946863, 1),
(19, 4, '/tasks', 'PUT', '- update task info', '{data:"todo..."}', 1476946889, 1),
(20, 4, '/tasks/{task_ids}', 'DELETE', '- delete multiple task', '{status:1, message:"sucess"}', 1476947099, 1),
(21, 5, '/projects/{project_id}/task', 'GET', '- get all task by project', '{data:"todo..."}', 1476947139, 1),
(24, 5, '/projects', 'POST', '- create a project', '{data:"todo..."}', 1476948244, 1),
(25, 5, '/projects', 'PUT', '- update project info', '{data:"todo..."}', 1476948259, 1),
(26, 5, '/projects/{project_ids}', 'DELETE', '- delete multiple project', '{"status":0,"message":"success"}', 1476948270, 1),
(27, 5, '/projects', 'GET', '- get all projects', '{data:"todo..."}', 1476948316, 1),
(28, 5, '/projects/{project_id}', 'GET', '- get project detail\r\n- return all info, user, task, tag, ...', '{data:"todo..."}', 1476949115, 1),
(29, 5, '/projects/{project_id}/users', 'POST', '- add user into project', '{data:"todo"}', 1476949545, 1),
(30, 5, '/projects/user/{user_ids}', 'DELETE', '- delete user', '{data:"todo"}', 1476949687, 1),
(31, 6, '/entries', 'POST', '- create an entry', '{data:"todo..."}', 1476950959, 1),
(32, 6, '/entries', 'PUT', '- update time entry', '{data:"todo..."}', 1476951538, 1),
(33, 6, '/entries/{entry_ids}', 'DELETE', '- delete multiple time entry', '{status:1, message:"success"}', 1476951538, 1),
(34, 1, '/users', 'GET', '- get all users with paging', '{data:"todo..."}', 1476954646, 1),
(35, 1, '/users/me', 'PUT', '- Update current user', '{sample:"data sample"}', 1477019558, 1),
(36, 1, '/users/password', 'PUT', '- change password', '{data:"todo..."}', 1477019777, 1),
(37, 2, '/clients/{client_id}', 'GET', '- get one client specified', '{data:"todo..."}', 1477020619, 1),
(38, 5, '/projects/user/{user_id}', 'GET', '- get all project by user', '{data:"todo..."}', 1477020944, 1),
(39, 1, '/users/{user_id}', 'GET', '- get user info with permission admin or leader', '{data:"todo..."}', 1477021765, 1),
(40, 8, '/department', 'POST', '- create new department\r\n- permission: admin', '{data:"todo"}', 1477022467, 1),
(41, 8, '/department', 'PUT', '- change department name\r\n- permission: admin', '{data:"todo..."}', 1477022531, 1),
(42, 8, '/department', 'GET', '- get all department', '{data:"todo..."}', 1477022589, 1);

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
(2, 1, 'Clients', 'list function for clients', 5, 1476943413),
(3, 1, 'Tags', 'tag manage', 3, 1476945593),
(4, 1, 'Tasks', 'task manage', 4, 1476946400),
(5, 1, 'Projects', 'project manage', 6, 1476948170),
(6, 1, 'Entries', '', 7, 1476949941),
(7, 1, 'Authentication', '', 1, 1476954348),
(8, 1, 'Department', 'department manager', 10, 1477022357);

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
(143, 2, 'data', 'int', 'user data detail with access token', 0, 1476954396),
(144, 3, 'data', 'string', 'user data detail with access token', 0, 1476954405),
(145, 4, 'data', 'string', 'user data detail with access token', 0, 1476954415),
(146, 5, 'data', 'array', 'user data detail with access token', 0, 1476954426),
(154, 9, 'data', 'array', 'client detail', 0, 1477016674),
(161, 11, 'status', 'int', '0/1: 0: error, 1: success', 0, 1477016758),
(162, 11, 'message', 'string', 'message for client', 1, 1477016758),
(164, 17, 'data', 'array', 'list client (group by client name)', 0, 1477016774),
(165, 17, 'data', 'array', 'list client (group by client name)', 1, 1477016774),
(168, 15, 'data', 'array', 'tag detail', 0, 1477016784),
(169, 14, 'data', 'array', 'tag detail', 0, 1477016787),
(173, 19, 'data', 'array', 'task detail', 0, 1477016808),
(174, 18, 'data', 'array', 'task detail', 0, 1477016814),
(181, 25, 'data', 'array', 'project detail', 0, 1477016852),
(182, 24, 'data', 'array', 'project detail', 0, 1477016855),
(184, 31, 'data', 'array', 'entry detail', 0, 1477016897),
(188, 6, 'status', 'int', '0: errors, 1: success', 0, 1477016919),
(190, 32, 'data', 'array', 'entry detail', 0, 1477017076),
(197, 30, 'data', 'array', 'todo', 0, 1477018540),
(200, 21, 'data', 'array', 'list task by project', 0, 1477018575),
(201, 26, 'status', 'int', '0:error, 1:success', 0, 1477018597),
(202, 26, 'message', 'string', 'message for client', 1, 1477018597),
(203, 28, 'data', 'array', 'project detail', 0, 1477018616),
(204, 33, 'status', 'int', '0:error, 1:success', 0, 1477018774),
(205, 33, 'message', 'string', 'message for client', 1, 1477018774),
(207, 20, 'status', 'int', '0:error, 1:success', 0, 1477018809),
(208, 20, 'message', 'string', 'message for client', 1, 1477018809),
(209, 16, 'status', 'int', '0: errors, 1: success', 0, 1477018822),
(210, 16, 'message', 'string', 'message for client', 1, 1477018822),
(211, 12, 'status', 'int', '0: errors, 1: success', 0, 1477018835),
(212, 12, 'message', 'string', 'message for client', 1, 1477018835),
(213, 29, 'data', 'array', 'todo', 0, 1477018982),
(217, 35, 'data', 'array', 'user data detail', 0, 1477019599),
(219, 36, 'data', 'array', 'user data detail', 0, 1477019777),
(220, 34, 'data', 'array', 'list users with pagning', 0, 1477019827),
(221, 1, 'data', 'string', 'user data detail with access token', 0, 1477019845),
(222, 10, 'data', 'array', 'all client sort by (Client name)', 0, 1477020564),
(223, 37, 'data', 'array', 'Client detail', 0, 1477020619),
(224, 27, 'data', 'array', 'list project', 0, 1477020813),
(225, 38, 'data', 'array', 'list projects by user', 0, 1477020944),
(226, 8, 'data', 'array', 'all time entries of user, group by day', 0, 1477021608),
(227, 39, 'data', 'array', 'user info', 0, 1477021765),
(228, 40, 'data', 'array', 'department detail', 0, 1477022467),
(229, 41, 'data', 'array', 'department detail', 0, 1477022531),
(230, 42, 'data', 'array', 'list department', 0, 1477022589),
(231, 7, 'data', 'array', 'user data detail', 0, 1477022631);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;
--
-- AUTO_INCREMENT for table `tbl_function`
--
ALTER TABLE `tbl_function`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_group_function`
--
ALTER TABLE `tbl_group_function`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
