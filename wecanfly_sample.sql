-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2018 at 09:00 AM
-- Server version: 5.6.38-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wecanfly_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvestock_det`
--

CREATE TABLE `approvestock_det` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `num_units` varchar(200) NOT NULL,
  `govt_id` varchar(200) NOT NULL,
  `manf_id` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quote_id` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `quote_date` datetime NOT NULL,
  `approve_date` datetime NOT NULL,
  `status` enum('0','1','2','3','4') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvestock_det`
--

INSERT INTO `approvestock_det` (`id`, `user_id`, `state`, `district`, `num_units`, `govt_id`, `manf_id`, `price`, `quote_id`, `date`, `quote_date`, `approve_date`, `status`) VALUES
(50, '49', '102', '138', '70', '50', '48', '700', '36', '2018-03-11 19:56:52', '2018-03-11 20:17:09', '2018-03-11 20:34:10', '3'),
(49, '45', '109', '193', '50', '46', '47', '450', '39', '2018-03-11 19:51:49', '2018-03-11 19:54:28', '2018-03-11 20:32:23', '3');

-- --------------------------------------------------------

--
-- Table structure for table `approvestock_det1`
--

CREATE TABLE `approvestock_det1` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `num_units` varchar(200) NOT NULL,
  `quote_price` varchar(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvestock_det1`
--

INSERT INTO `approvestock_det1` (`id`, `user_id`, `num_units`, `quote_price`, `status`) VALUES
(1, '6', '50', '1500', '2');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(20) NOT NULL,
  `tfield` varchar(200) NOT NULL,
  `precatid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `isactive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `tfield`, `precatid`, `name`, `isactive`) VALUES
(101, 'country', '0', 'india', 1),
(102, 'state', '101', 'Maharashtra (MH)', 1),
(103, 'state', '101', 'West Bengal (WB)', 1),
(104, 'state', '101', 'Karnataka (KA)', 1),
(105, 'state', '101', 'Gujarat (GJ)', 1),
(106, 'state', '101', 'Rajasthan (RJ)', 1),
(107, 'state', '101', 'Uttar Pradesh (UP)', 1),
(108, 'state', '101', 'Bihar (BR)', 1),
(109, 'state', '101', 'Telangana (TS)', 1),
(110, 'state', '101', 'Andhra Pradesh (AP)', 1),
(111, 'state', '101', 'Tamil Nadu (TN)', 1),
(112, 'state', '101', 'Kerala (KL)', 1),
(113, 'state', '101', 'Chhattisgarh (CG)', 1),
(114, 'state', '101', 'Delhi (DL)', 1),
(115, 'state', '101', 'Odisha (OD)', 1),
(116, 'state', '101', 'Punjab (PB)', 1),
(117, 'state', '101', 'Madhya Pradesh (MP)', 1),
(118, 'state', '101', 'Jharkhand (JH)', 1),
(119, 'state', '101', 'Assam (AS)', 1),
(120, 'state', '101', 'Uttarakhand (UK)', 1),
(121, 'state', '101', 'Haryana (HR)', 1),
(122, 'state', '101', 'Jammu and Kashmir (JK)', 1),
(123, 'state', '101', 'Himachal Pradesh (HP)', 1),
(124, 'state', '101', 'Chandigarh (CH)', 1),
(125, 'state', '101', 'Puducherry (PY)', 1),
(126, 'state', '101', 'Tripura (TR)', 1),
(127, 'state', '101', 'Meghalaya (ML)', 1),
(128, 'state', '101', 'Goa (GA)', 1),
(129, 'state', '101', 'Manipur (MN)', 1),
(130, 'state', '101', 'Mizoram (MZ)', 1),
(131, 'state', '101', 'Dadra and Nagar Haveli (DN)', 1),
(132, 'state', '101', 'Sikkim (SK)', 1),
(133, 'state', '101', 'Andaman and Nicobar (AN)', 1),
(134, 'state', '101', 'Daman and Diu (DD)', 1),
(135, 'state', '101', 'Arunachal Pradesh (AR)', 1),
(136, 'state', '101', 'Lakshadweep (LD)', 1),
(138, 'district', '102', 'Thane', 1),
(139, 'district', '103', 'North 24 Parganas', 1),
(140, 'district', '104', 'Bangalore Urban', 1),
(141, 'district', '102', 'Pune', 1),
(142, 'district', '102', 'Mumbai suburban', 1),
(143, 'district', '103', 'South 24 Parganas', 1),
(144, 'district', '103', 'Bardhaman', 1),
(145, 'district', '105', 'Ahmedabad', 1),
(146, 'district', '103', 'Murshidabad', 1),
(147, 'district', '106', 'Jaipur', 1),
(148, 'district', '102', 'Nashik', 1),
(149, 'district', '107', 'Allahabad', 1),
(150, 'district', '108', 'Patna', 1),
(151, 'district', '103', 'Hooghly', 1),
(152, 'district', '109', 'Ranga Reddy', 1),
(153, 'district', '103', 'Nadia', 1),
(154, 'district', '110', 'East Godavari', 1),
(155, 'district', '103', 'Paschim Medinipur', 1),
(156, 'district', '108', 'East Champaran', 1),
(157, 'district', '105', 'Surat', 1),
(158, 'district', '110', 'Guntur', 1),
(159, 'district', '103', 'Howrah', 1),
(160, 'district', '108', 'Muzaffarpur', 1),
(161, 'district', '104', 'Belgaum', 1),
(162, 'district', '107', 'Moradabad', 1),
(163, 'district', '111', 'Chennai', 1),
(164, 'district', '107', 'Ghaziabad', 1),
(165, 'district', '102', 'Nagpur', 1),
(166, 'district', '107', 'Azamgarh', 1),
(167, 'district', '107', 'Lucknow', 1),
(168, 'district', '107', 'Kanpur Nagar', 1),
(169, 'district', '102', 'Ahmednagar', 1),
(170, 'district', '110', 'Krishna', 1),
(171, 'district', '103', 'Kolkata', 1),
(172, 'district', '107', 'Jaunpur district', 1),
(173, 'district', '108', 'Madhubani', 1),
(174, 'district', '107', 'Sitapur', 1),
(175, 'district', '107', 'Bareilly', 1),
(176, 'district', '107', 'Gorakhpur', 1),
(177, 'district', '103', 'Purba Medinipur', 1),
(178, 'district', '107', 'Agra', 1),
(179, 'district', '108', 'Gaya', 1),
(180, 'district', '102', 'Solapur', 1),
(181, 'district', '110', 'Visakhapatnam', 1),
(182, 'district', '108', 'Samastipur', 1),
(183, 'district', '102', 'Jalgaon', 1),
(184, 'district', '110', 'Chittoor', 1),
(185, 'district', '107', 'Muzaffarnagar', 1),
(186, 'district', '112', 'Malappuram', 1),
(187, 'district', '107', 'Hardoi', 1),
(188, 'district', '110', 'Anantapur', 1),
(189, 'district', '113', 'Raipur', 1),
(190, 'district', '110', 'Kurnool', 1),
(191, 'district', '109', 'Mahbubnagar', 1),
(192, 'district', '107', 'Lakhimpur Kheri', 1),
(193, 'district', '109', 'Hyderabad', 1),
(194, 'district', '103', 'Maldah', 1),
(195, 'district', '111', 'Madurai', 1),
(196, 'district', '111', 'Kanchipuram', 1),
(197, 'district', '108', 'Saran', 1),
(198, 'district', '108', 'West Champaran', 1),
(199, 'district', '110', 'West Godavari', 1),
(200, 'district', '111', 'Vellore', 1),
(201, 'district', '108', 'Darbhanga', 1),
(202, 'district', '102', 'Kolhapur', 1),
(203, 'district', '103', 'Jalpaiguri', 1),
(204, 'district', '109', 'Karimnagar', 1),
(205, 'district', '107', 'Sultanpur', 1),
(206, 'district', '111', 'Tiruvallur', 1),
(207, 'district', '107', 'Budaun', 1),
(208, 'district', '102', 'Aurangabad', 1),
(209, 'district', '106', 'Jodhpur', 1),
(210, 'district', '107', 'Bijnor', 1),
(211, 'district', '107', 'Varanasi', 1),
(212, 'district', '107', 'Aligarh', 1),
(213, 'district', '106', 'Alwar', 1),
(214, 'district', '114', 'North West Delhi', 1),
(215, 'district', '105', 'Vadodara', 1),
(216, 'district', '107', 'Ghazipur', 1),
(217, 'district', '103', 'Bankura', 1),
(218, 'district', '107', 'Kushinagar', 1),
(219, 'district', '109', 'Warangal', 1),
(220, 'district', '115', 'Ganjam', 1),
(221, 'district', '103', 'Birbhum', 1),
(222, 'district', '107', 'Bulandshahr', 1),
(223, 'district', '108', 'Vaishali', 1),
(224, 'district', '116', 'Ludhiana', 1),
(225, 'district', '109', 'Nalgonda', 1),
(226, 'district', '111', 'Salem', 1),
(227, 'district', '111', 'Coimbatore', 1),
(228, 'district', '107', 'Saharanpur', 1),
(229, 'district', '111', 'Viluppuram', 1),
(230, 'district', '107', 'Meerut', 1),
(231, 'district', '107', 'Gonda', 1),
(232, 'district', '108', 'Sitamarhi', 1),
(233, 'district', '107', 'Raebareli', 1),
(234, 'district', '110', 'Prakasam', 1),
(235, 'district', '102', 'Nanded', 1),
(236, 'district', '113', 'Durg', 1),
(237, 'district', '108', 'Siwan', 1),
(238, 'district', '106', 'Nagaur', 1),
(239, 'district', '112', 'Thiruvananthapuram', 1),
(240, 'district', '112', 'Ernakulam', 1),
(241, 'district', '108', 'Purnia', 1),
(242, 'district', '117', 'Indore', 1),
(243, 'district', '107', 'Barabanki', 1),
(244, 'district', '107', 'Ballia', 1),
(245, 'district', '107', 'Pratapgarh', 1),
(246, 'district', '105', 'Rajkot', 1),
(247, 'district', '102', 'Mumbai City', 1),
(248, 'district', '105', 'Banaskantha', 1),
(249, 'district', '107', 'Unnao', 1),
(250, 'district', '112', 'Thrissur', 1),
(251, 'district', '107', 'Deoria', 1),
(252, 'district', '112', 'Kozhikode', 1),
(253, 'district', '111', 'Tirunelveli', 1),
(254, 'district', '108', 'Katihar', 1),
(255, 'district', '106', 'Udaipur', 1),
(256, 'district', '108', 'Bhagalpur', 1),
(257, 'district', '109', 'Medak', 1),
(258, 'district', '102', 'Satara', 1),
(259, 'district', '107', 'Shahjahanpur', 1),
(260, 'district', '103', 'Uttar Dinajpur', 1),
(261, 'district', '104', 'Mysore', 1),
(262, 'district', '110', 'Sri Potti Sriramulu Nellore', 1),
(263, 'district', '108', 'Rohtas', 1),
(264, 'district', '108', 'Begusarai', 1),
(265, 'district', '103', 'Purulia', 1),
(266, 'district', '118', 'Ranchi', 1),
(267, 'district', '116', 'Patiala', 1),
(268, 'district', '102', 'Amravati', 1),
(269, 'district', '110', 'Kadapa', 1),
(270, 'district', '105', 'Bhavnagar', 1),
(271, 'district', '108', 'Nalanda', 1),
(272, 'district', '111', 'Kanyakumari', 1),
(273, 'district', '119', 'Nagaon', 1),
(274, 'district', '103', 'Cooch Behar', 1),
(275, 'district', '102', 'Sangli', 1),
(276, 'district', '112', 'Palakkad', 1),
(277, 'district', '108', 'Araria', 1),
(278, 'district', '109', 'Khammam', 1),
(279, 'district', '102', 'Yavatmal', 1),
(280, 'district', '105', 'Junagadh', 1),
(281, 'district', '109', 'Adilabad', 1),
(282, 'district', '114', 'South Delhi', 1),
(283, 'district', '108', 'Bhojpur', 1),
(284, 'district', '111', 'Tiruchirappalli', 1),
(285, 'district', '110', 'Srikakulam', 1),
(286, 'district', '118', 'Dhanbad', 1),
(287, 'district', '104', 'Tumkur', 1),
(288, 'district', '106', 'Sikar', 1),
(289, 'district', '107', 'Maharajganj', 1),
(290, 'district', '113', 'Bilaspur', 1),
(291, 'district', '102', 'Raigad', 1),
(292, 'district', '107', 'Fatehpur', 1),
(293, 'district', '112', 'Kollam', 1),
(294, 'district', '115', 'Cuttack', 1),
(295, 'district', '106', 'Barmer', 1),
(296, 'district', '111', 'Cuddalore', 1),
(297, 'district', '102', 'Buldhana', 1),
(298, 'district', '102', 'Beed', 1),
(299, 'district', '106', 'Ajmer', 1),
(300, 'district', '104', 'Gulbarga', 1),
(301, 'district', '108', 'Gopalganj', 1),
(302, 'district', '107', 'Siddharthnagar', 1),
(303, 'district', '109', 'Nizamabad', 1),
(304, 'district', '106', 'Bharatpur', 1),
(305, 'district', '107', 'Mathura', 1),
(306, 'district', '104', 'Bellary', 1),
(307, 'district', '114', 'West Delhi', 1),
(308, 'district', '112', 'Kannur', 1),
(309, 'district', '115', 'Mayurbhanj', 1),
(310, 'district', '108', 'Aurangabad', 1),
(311, 'district', '107', 'Firozabad', 1),
(312, 'district', '107', 'Mirzapur', 1),
(313, 'district', '116', 'Amritsar', 1),
(314, 'district', '111', 'Tirupur', 1),
(315, 'district', '111', 'Tiruvannamalai', 1),
(316, 'district', '107', 'Faizabad', 1),
(317, 'district', '107', 'Basti', 1),
(318, 'district', '117', 'Jabalpur', 1),
(319, 'district', '102', 'Latur', 1),
(320, 'district', '118', 'Giridih', 1),
(321, 'district', '105', 'Sabarkantha', 1),
(322, 'district', '106', 'Bhilwara', 1),
(323, 'district', '111', 'Thanjavur', 1),
(324, 'district', '107', 'Ambedkar Nagar', 1),
(325, 'district', '105', 'Panchmahal', 1),
(326, 'district', '107', 'Bahraich', 1),
(327, 'district', '117', 'Sagar', 1),
(328, 'district', '117', 'Bhopal', 1),
(329, 'district', '106', 'Bikaner', 1),
(330, 'district', '117', 'Rewa', 1),
(331, 'district', '110', 'Vizianagaram', 1),
(332, 'district', '107', 'Rampur', 1),
(333, 'district', '115', 'Balasore', 1),
(334, 'district', '116', 'Gurdaspur', 1),
(335, 'district', '105', 'Kheda', 1),
(336, 'district', '114', 'South West Delhi', 1),
(337, 'district', '118', 'East Singhbhum', 1),
(338, 'district', '111', 'Erode', 1),
(339, 'district', '115', 'Khordha', 1),
(340, 'district', '114', 'North East Delhi', 1),
(341, 'district', '117', 'Satna', 1),
(342, 'district', '108', 'Supaul', 1),
(343, 'district', '107', 'Sambhal(Bheem Nagar)', 1),
(344, 'district', '108', 'Nawada', 1),
(345, 'district', '107', 'Mau', 1),
(346, 'district', '102', 'Chandrapur', 1),
(347, 'district', '117', 'Dhar', 1),
(348, 'district', '116', 'Jalandhar', 1),
(349, 'district', '104', 'Vijayapura', 1),
(350, 'district', '111', 'Dindigul', 1),
(351, 'district', '105', 'Jamnagar', 1),
(352, 'district', '107', 'Balrampur', 1),
(353, 'district', '106', 'Jhunjhunu', 1),
(354, 'district', '105', 'Dahod', 1),
(355, 'district', '112', 'Alappuzha', 1),
(356, 'district', '105', 'Kutch', 1),
(357, 'district', '117', 'Chhindwara', 1),
(358, 'district', '105', 'Anand', 1),
(359, 'district', '104', 'Dakshina Kannada', 1),
(360, 'district', '115', 'Sundargarh', 1),
(361, 'district', '118', 'Bokaro', 1),
(362, 'district', '102', 'Dhule', 1),
(363, 'district', '106', 'Churu', 1),
(364, 'district', '106', 'Pali', 1),
(365, 'district', '107', 'Pilibhit', 1),
(366, 'district', '117', 'Gwalior', 1),
(367, 'district', '108', 'Banka', 1),
(368, 'district', '105', 'Mehsana', 1),
(369, 'district', '116', 'Firozpur', 1),
(370, 'district', '107', 'Jhansi', 1),
(371, 'district', '116', 'Pathankot', 1),
(372, 'district', '108', 'Madhepura', 1),
(373, 'district', '117', 'Ujjain', 1),
(374, 'district', '112', 'Kottayam', 1),
(375, 'district', '106', 'Ganganagar', 1),
(376, 'district', '117', 'Morena', 1),
(377, 'district', '102', 'Jalna', 1),
(378, 'district', '107', 'Chandauli', 1),
(379, 'district', '106', 'Kota', 1),
(380, 'district', '119', 'Dhubri', 1),
(381, 'district', '104', 'Davanagere', 1),
(382, 'district', '111', 'Virudhunagar', 1),
(383, 'district', '118', 'Palamu', 1),
(384, 'district', '120', 'Haridwar', 1),
(385, 'district', '119', 'Sonitpur', 1),
(386, 'district', '104', 'Raichur', 1),
(387, 'district', '111', 'Pudukkottai', 1),
(388, 'district', '108', 'Saharsa', 1),
(389, 'district', '104', 'Bagalkot', 1),
(390, 'district', '107', 'Farrukhabad', 1),
(391, 'district', '111', 'Krishnagiri', 1),
(392, 'district', '117', 'Khargone (West Nimar)', 1),
(393, 'district', '107', 'Sonbhadra', 1),
(394, 'district', '107', 'Mainpuri', 1),
(395, 'district', '104', 'Dharwad', 1),
(396, 'district', '103', 'Darjeeling', 1),
(397, 'district', '107', 'Jyotiba Phule Nagar', 1),
(398, 'district', '102', 'Parbhani', 1),
(399, 'district', '106', 'Jalore', 1),
(400, 'district', '115', 'Jajpur', 1),
(401, 'district', '102', 'Akola', 1),
(402, 'district', '104', 'Mandya', 1),
(403, 'district', '115', 'Kendujhar (Keonjhar)', 1),
(404, 'district', '107', 'Banda', 1),
(405, 'district', '121', 'Faridabad', 1),
(406, 'district', '106', 'Banswara', 1),
(407, 'district', '107', 'Kanpur Dehat (Ramabai Nagar)', 1),
(408, 'district', '106', 'Hanumangarh', 1),
(409, 'district', '104', 'Hassan', 1),
(410, 'district', '117', 'Chhatarpur', 1),
(411, 'district', '107', 'Etah', 1),
(412, 'district', '108', 'Jamui', 1),
(413, 'district', '105', 'Surendranagar', 1),
(414, 'district', '104', 'Shimoga', 1),
(415, 'district', '121', 'Hissar', 1),
(416, 'district', '111', 'Thoothukudi', 1),
(417, 'district', '119', 'Cachar', 1),
(418, 'district', '118', 'Hazaribag', 1),
(419, 'district', '117', 'Shivpuri', 1),
(420, 'district', '111', 'Namakkal', 1),
(421, 'district', '107', 'Sant Kabir Nagar', 1),
(422, 'district', '114', 'East Delhi', 1),
(423, 'district', '108', 'Buxar', 1),
(424, 'district', '117', 'Bhind', 1),
(425, 'district', '105', 'Valsad', 1),
(426, 'district', '117', 'Balaghat', 1),
(427, 'district', '104', 'Bidar', 1),
(428, 'district', '103', 'Alipurduar', 1),
(429, 'district', '120', 'Dehradun', 1),
(430, 'district', '115', 'Puri', 1),
(431, 'district', '119', 'Barpeta', 1),
(432, 'district', '108', 'Kishanganj', 1),
(433, 'district', '107', 'Gautam Buddh Nagar', 1),
(434, 'district', '103', 'Dakshin Dinajpur', 1),
(435, 'district', '107', 'Jalaun', 1),
(436, 'district', '104', 'Chitradurga', 1),
(437, 'district', '102', 'Osmanabad', 1),
(438, 'district', '107', 'Kannauj', 1),
(439, 'district', '108', 'Khagaria', 1),
(440, 'district', '116', 'Sangrur', 1),
(441, 'district', '115', 'Balangir', 1),
(442, 'district', '120', 'Udham Singh Nagar', 1),
(443, 'district', '102', 'Nandurbar', 1),
(444, 'district', '106', 'Dausa', 1),
(445, 'district', '121', 'Bhiwani', 1),
(446, 'district', '108', 'Kaimur', 1),
(447, 'district', '113', 'Janjgir-Champa', 1),
(448, 'district', '111', 'Nagapattinam', 1),
(449, 'district', '102', 'Ratnagiri', 1),
(450, 'district', '104', 'Haveri district', 1),
(451, 'district', '107', 'Kaushambi', 1),
(452, 'district', '116', 'Hoshiarpur', 1),
(453, 'district', '107', 'Etawah', 1),
(454, 'district', '117', 'Betul', 1),
(455, 'district', '115', 'Kalahandi', 1),
(456, 'district', '107', 'Hathras (Mahamaya Nagar)', 1),
(457, 'district', '117', 'Dewas', 1),
(458, 'district', '107', 'Sant Ravidas Nagar', 1),
(459, 'district', '105', 'Bharuch', 1),
(460, 'district', '117', 'Rajgarh', 1),
(461, 'district', '106', 'Chittorgarh', 1),
(462, 'district', '104', 'Kolar', 1),
(463, 'district', '113', 'Rajnandgaon', 1),
(464, 'district', '122', 'Jammu', 1),
(465, 'district', '119', 'Kamrup', 1),
(466, 'district', '121', 'Gurgaon', 1),
(467, 'district', '105', 'Amreli district', 1),
(468, 'district', '117', 'Shajapur', 1),
(469, 'district', '123', 'Kangra', 1),
(470, 'district', '115', 'Bhadrak', 1),
(471, 'district', '121', 'Karnal', 1),
(472, 'district', '111', 'Dharmapuri', 1),
(473, 'district', '118', 'West Singhbhum', 1),
(474, 'district', '113', 'Raigarh', 1),
(475, 'district', '118', 'Deoghar', 1),
(476, 'district', '121', 'Sonipat', 1),
(477, 'district', '115', 'Bargarh (Baragarh)', 1),
(478, 'district', '106', 'Karauli', 1),
(479, 'district', '117', 'Vidisha', 1),
(480, 'district', '117', 'Ratlam', 1),
(481, 'district', '107', 'Hapur (Panchsheel Nagar)', 1),
(482, 'district', '117', 'Tikamgarh', 1),
(483, 'district', '115', 'Kendrapara', 1),
(484, 'district', '107', 'Kanshi Ram Nagar', 1),
(485, 'district', '106', 'Tonk', 1),
(486, 'district', '113', 'Bastar', 1),
(487, 'district', '106', 'Jhalawar', 1),
(488, 'district', '104', 'Koppal', 1),
(489, 'district', '106', 'Dungapur', 1),
(490, 'district', '116', 'Bathinda', 1),
(491, 'district', '105', 'Gandhinagar', 1),
(492, 'district', '117', 'Barwani', 1),
(493, 'district', '117', 'Seoni', 1),
(494, 'district', '115', 'Koraput', 1),
(495, 'district', '107', 'Auraiya', 1),
(496, 'district', '108', 'Munger', 1),
(497, 'district', '104', 'Uttara Kannada', 1),
(498, 'district', '105', 'Patan', 1),
(499, 'district', '111', 'Sivaganga', 1),
(500, 'district', '117', 'Mandsaur', 1),
(501, 'district', '106', 'Sawai Madhopur', 1),
(502, 'district', '111', 'Ramanathapuram', 1),
(503, 'district', '121', 'Jind', 1),
(504, 'district', '117', 'Raisen', 1),
(505, 'district', '105', 'Navsari', 1),
(506, 'district', '119', 'Dibrugarh', 1),
(507, 'district', '118', 'Garhwa', 1),
(508, 'district', '102', 'Gondia', 1),
(509, 'district', '118', 'Dumka', 1),
(510, 'district', '119', 'Tinsukia', 1),
(511, 'district', '118', 'Godda', 1),
(512, 'district', '117', 'Sehore', 1),
(513, 'district', '117', 'Khandwa (East Nimar)', 1),
(514, 'district', '112', 'Kasaragod', 1),
(515, 'district', '107', 'Bagpat', 1),
(516, 'district', '102', 'Wardha', 1),
(517, 'district', '121', 'Sirsa', 1),
(518, 'district', '117', 'Katni', 1),
(519, 'district', '115', 'Angul', 1),
(520, 'district', '122', 'Srinagar', 1),
(521, 'district', '111', 'Tiruvarur', 1),
(522, 'district', '117', 'Damoh', 1),
(523, 'district', '119', 'Kamrup Metropolitan', 1),
(524, 'district', '104', 'Chikkaballapur', 1),
(525, 'district', '111', 'Theni', 1),
(526, 'district', '117', 'Hoshangabad', 1),
(527, 'district', '117', 'Guna', 1),
(528, 'district', '106', 'Baran', 1),
(529, 'district', '115', 'Nabarangpur', 1),
(530, 'district', '107', 'Lalitpur', 1),
(531, 'district', '105', 'Gir Somnath', 1),
(532, 'district', '119', 'Karimganj', 1),
(533, 'district', '121', 'Yamuna Nagar', 1),
(534, 'district', '106', 'Dholpur', 1),
(535, 'district', '113', 'Korba', 1),
(536, 'district', '121', 'Panipat', 1),
(537, 'district', '102', 'Bhandara', 1),
(538, 'district', '102', 'Washim', 1),
(539, 'district', '112', 'Pathanamthitta', 1),
(540, 'district', '115', 'Dhenkanal', 1),
(541, 'district', '102', 'Hingoli', 1),
(542, 'district', '117', 'Singrauli', 1),
(543, 'district', '104', 'Udupi', 1),
(544, 'district', '104', 'Yadgir', 1),
(545, 'district', '106', 'Rajsamand', 1),
(546, 'district', '119', 'Sivasagar', 1),
(547, 'district', '118', 'Sahibganj', 1),
(548, 'district', '104', 'Chikkamagaluru', 1),
(549, 'district', '121', 'Ambala', 1),
(550, 'district', '115', 'Jagatsinghpur', 1),
(551, 'district', '117', 'Sidhi', 1),
(552, 'district', '108', 'Jehanabad', 1),
(553, 'district', '116', 'Tarn Taran', 1),
(554, 'district', '107', 'Shravasti', 1),
(555, 'district', '106', 'Bundi', 1),
(556, 'district', '112', 'Idukki', 1),
(557, 'district', '107', 'Hamirpur', 1),
(558, 'district', '117', 'Narsinghpur', 1),
(559, 'district', '119', 'Jorhat', 1),
(560, 'district', '121', 'Mewat', 1),
(561, 'district', '104', 'Ramanagara', 1),
(562, 'district', '111', 'Karur', 1),
(563, 'district', '121', 'Kaithal', 1),
(564, 'district', '105', 'Chhota Udaipur', 1),
(565, 'district', '102', 'Gadchiroli', 1),
(566, 'district', '122', 'Anantnag', 1),
(567, 'district', '104', 'Gadag', 1),
(568, 'district', '117', 'Shahdol', 1),
(569, 'district', '118', 'Seraikela Kharsawan', 1),
(570, 'district', '121', 'Rohtak', 1),
(571, 'district', '119', 'Golaghat', 1),
(572, 'district', '124', 'Chandigarh', 1),
(573, 'district', '117', 'Mandla', 1),
(574, 'district', '105', 'Aravalli', 1),
(575, 'district', '115', 'Sambalpur', 1),
(576, 'district', '118', 'Chatra', 1),
(577, 'district', '119', 'Lakhimpur', 1),
(578, 'district', '121', 'Palwal', 1),
(579, 'district', '106', 'Sirohi', 1),
(580, 'district', '113', 'Mahasamund', 1),
(581, 'district', '118', 'Gumla', 1),
(582, 'district', '117', 'Jhabua', 1),
(583, 'district', '104', 'Chamarajnagar', 1),
(584, 'district', '117', 'Panna', 1),
(585, 'district', '122', 'Baramulla', 1),
(586, 'district', '119', 'Goalpara', 1),
(587, 'district', '108', 'Lakhisarai', 1),
(588, 'district', '123', 'Mandi', 1),
(589, 'district', '105', 'Mahisagar', 1),
(590, 'district', '116', 'Moga', 1),
(591, 'district', '107', 'Chitrakoot', 1),
(592, 'district', '104', 'Bangalore Rural', 1),
(593, 'district', '116', 'Sahibzada Ajit Singh Nagar', 1),
(594, 'district', '119', 'Karbi Anglong', 1),
(595, 'district', '121', 'Kurukshetra', 1),
(596, 'district', '115', 'Nayagarh', 1),
(597, 'district', '115', 'Rayagada', 1),
(598, 'district', '105', 'Morbi', 1),
(599, 'district', '119', 'Morigaon', 1),
(600, 'district', '121', 'Jhajjar', 1),
(601, 'district', '120', 'Nainital', 1),
(602, 'district', '119', 'Baksa', 1),
(603, 'district', '118', 'Ramgarh', 1),
(604, 'district', '125', 'Pondicherry', 1),
(605, 'district', '121', 'Fatehabad', 1),
(606, 'district', '121', 'Mahendragarh', 1),
(607, 'district', '126', 'West Tripura', 1),
(608, 'district', '119', 'Darrang', 1),
(609, 'district', '116', 'Sri Muktsar Sahib', 1),
(610, 'district', '118', 'Pakur', 1),
(611, 'district', '121', 'Rewari', 1),
(612, 'district', '119', 'Kokrajhar', 1),
(613, 'district', '114', 'North Delhi', 1),
(614, 'district', '107', 'Mahoba', 1),
(615, 'district', '122', 'Kupwara', 1),
(616, 'district', '106', 'Pratapgarh', 1),
(617, 'district', '113', 'Jashpur', 1),
(618, 'district', '102', 'Sindhudurg', 1),
(619, 'district', '117', 'Ashok Nagar', 1),
(620, 'district', '119', 'Udalguri', 1),
(621, 'district', '117', 'Neemuch', 1),
(622, 'district', '127', 'East Khasi Hills', 1),
(623, 'district', '128', 'North Goa', 1),
(624, 'district', '116', 'Kapurthala', 1),
(625, 'district', '112', 'Wayanad', 1),
(626, 'district', '123', 'Shimla', 1),
(627, 'district', '105', 'Tapi', 1),
(628, 'district', '113', 'Dhamtari', 1),
(629, 'district', '118', 'Jamtara', 1),
(630, 'district', '117', 'Datia', 1),
(631, 'district', '119', 'Nalbari', 1),
(632, 'district', '116', 'Mansa', 1),
(633, 'district', '117', 'Burhanpur', 1),
(634, 'district', '105', 'Devbhoomi Dwarka', 1),
(635, 'district', '111', 'Ariyalur', 1),
(636, 'district', '117', 'Anuppur', 1),
(637, 'district', '113', 'Kanker', 1),
(638, 'district', '122', 'Badgam', 1),
(639, 'district', '111', 'Nilgiris', 1),
(640, 'district', '119', 'Bongaigaon', 1),
(641, 'district', '115', 'Kandhamal', 1),
(642, 'district', '117', 'Alirajpur', 1),
(643, 'district', '118', 'Latehar', 1),
(644, 'district', '118', 'Koderma', 1),
(645, 'district', '117', 'Dindori', 1),
(646, 'district', '108', 'Arwal', 1),
(647, 'district', '119', 'Dhemaji', 1),
(648, 'district', '117', 'Sheopur', 1),
(649, 'district', '120', 'Pauri Garhwal', 1),
(650, 'district', '116', 'Rupnagar', 1),
(651, 'district', '106', 'Jaisalmer', 1),
(652, 'district', '113', 'Surajpur', 1),
(653, 'district', '119', 'Hailakandi', 1),
(654, 'district', '113', 'Koriya', 1),
(655, 'district', '108', 'Sheohar', 1),
(656, 'district', '105', 'Botad', 1),
(657, 'district', '115', 'Subarnapur (Sonepur)', 1),
(658, 'district', '117', 'Umaria', 1),
(659, 'district', '127', 'West Garo Hills', 1),
(660, 'district', '128', 'South Goa', 1),
(661, 'district', '108', 'Sheikhpura', 1),
(662, 'district', '120', 'Almora', 1),
(663, 'district', '122', 'Rajouri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quote_price`
--

CREATE TABLE `quote_price` (
  `id` int(20) NOT NULL,
  `stock_id` varchar(200) NOT NULL,
  `manf_id` varchar(200) NOT NULL,
  `price` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_price`
--

INSERT INTO `quote_price` (`id`, `stock_id`, `manf_id`, `price`, `date`, `status`) VALUES
(39, '49', '47', '450', '2018-03-11 20:18:53', '2'),
(38, '50', '47', '750', '2018-03-11 20:18:53', '1'),
(37, '49', '48', '500', '2018-03-11 20:18:43', '1'),
(36, '50', '48', '700', '2018-03-11 20:18:43', '2'),
(35, '42', '47', '450', '2018-03-10 20:37:53', '1'),
(34, '42', '48', '300', '2018-03-10 20:37:14', '2'),
(33, '41', '47', '250', '2018-03-10 20:00:51', '2');

-- --------------------------------------------------------

--
-- Table structure for table `sample_govt_officials`
--

CREATE TABLE `sample_govt_officials` (
  `id` int(10) NOT NULL,
  `userdet_id` varchar(200) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `aadhar` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_govt_officials`
--

INSERT INTO `sample_govt_officials` (`id`, `userdet_id`, `student_name`, `age`, `gender`, `school_name`, `city`, `district`, `state`, `address`, `aadhar`) VALUES
(62, '28', 'Kavya', '8', 'Female', 'Mumbai Thane School', 'Mumbai', 'Mumbai City', 'Maharastra (MH)', 'Lonavala', ''),
(61, '28', 'Sruthi', '10', 'Female', 'Mumbai Thane School', 'Mumbai', 'Mumbai City', 'Maharastra (MH)', 'Vorli', ''),
(52, '25', 'Rachana', '8', 'Female', 'SMHS', 'Hyderabad', 'Hyderabad', 'Telangana (TS)', 'Kukatpally', ''),
(51, '25', 'Pavani', '6', 'Female', 'SMHS', 'Hyderabad', 'Hyderabad', 'Telangana (TS)', 'Uppuguda', ''),
(50, '25', 'Vishrutha', '8', 'Female', 'SMHS', 'Hyderabad', 'Hyderabad', 'Telangana (TS)', 'Ameerpet', ''),
(49, '25', 'Reetika', '10', 'Female', 'SMHS', 'Hyderabad', 'Hyderabad', 'Telangana (TS)', 'Habsiguda', ''),
(64, '28', 'Preethi', '8', 'Female', 'Mumbai Thane School', 'Mumbai', 'Mumbai City', 'Maharastra (MH)', 'Thane', ''),
(63, '28', 'Mounica', '6', 'Female', 'Mumbai Thane School', 'Mumbai', 'Mumbai City', 'Maharastra (MH)', 'Vorli', '');

-- --------------------------------------------------------

--
-- Table structure for table `sample_reg`
--

CREATE TABLE `sample_reg` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `psw` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `type_name` varchar(200) NOT NULL,
  `reg_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_reg`
--

INSERT INTO `sample_reg` (`id`, `name`, `age`, `gender`, `state`, `city`, `username`, `password`, `psw`, `district`, `type`, `type_name`, `reg_date`, `status`) VALUES
(50, 'Ramesh', '', '', '102', 'Mumbai', 'rameshj', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '138', '2', 'govt Officials', '2018-03-11 19:44:06', '0'),
(49, 'Mumbai Thane School', '', '', '102', 'Mumbai', 'mthane', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '138', '4', 'school officials', '2018-03-11 19:43:39', '0'),
(48, 'StayFree', '', '', '', '', 'sfree', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '', '3', 'manufacturing companies', '2018-03-10 20:36:55', '0'),
(47, 'Whisper', '', '', '', '', 'wper', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '', '3', 'manufacturing companies', '2018-03-10 19:49:30', '0'),
(46, 'Govt Officer 1', '', '', '109', 'Hyderabad', 'gofficer1', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '193', '2', 'govt Officials', '2018-03-10 19:41:47', '0'),
(45, 'SMHS', '', '', '109', 'Hyderabad', 'school1', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '193', '4', 'school officials', '2018-03-10 19:24:20', '0'),
(44, 'volunteer1', '22', 'Female', '', 'Hyderabad', 'volunteer1', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '', '1', 'volunteers', '2018-03-10 19:21:49', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sample_userdet`
--

CREATE TABLE `sample_userdet` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `createdon` datetime NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_userdet`
--

INSERT INTO `sample_userdet` (`id`, `user_id`, `createdon`, `status`) VALUES
(28, '49', '2018-03-11 20:50:33', '1'),
(27, '49', '2018-03-11 20:48:13', '1'),
(26, '49', '2018-03-11 20:46:02', '1'),
(25, '45', '2018-03-10 19:34:23', '1'),
(24, '45', '2018-03-10 19:26:06', '1');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers_dashboard`
--

CREATE TABLE `volunteers_dashboard` (
  `id` int(10) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `createdon` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteers_dashboard`
--

INSERT INTO `volunteers_dashboard` (`id`, `user_id`, `city`, `school_name`, `date`, `createdon`) VALUES
(13, '44', '62', '62', '2018-03-22', '2018-03-11 00:00:00'),
(12, '44', '52', '52', '2018-03-11', '2018-03-10 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvestock_det`
--
ALTER TABLE `approvestock_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvestock_det1`
--
ALTER TABLE `approvestock_det1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_price`
--
ALTER TABLE `quote_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_govt_officials`
--
ALTER TABLE `sample_govt_officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_reg`
--
ALTER TABLE `sample_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_userdet`
--
ALTER TABLE `sample_userdet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers_dashboard`
--
ALTER TABLE `volunteers_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvestock_det`
--
ALTER TABLE `approvestock_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `approvestock_det1`
--
ALTER TABLE `approvestock_det1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=664;

--
-- AUTO_INCREMENT for table `quote_price`
--
ALTER TABLE `quote_price`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sample_govt_officials`
--
ALTER TABLE `sample_govt_officials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sample_reg`
--
ALTER TABLE `sample_reg`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sample_userdet`
--
ALTER TABLE `sample_userdet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `volunteers_dashboard`
--
ALTER TABLE `volunteers_dashboard`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
