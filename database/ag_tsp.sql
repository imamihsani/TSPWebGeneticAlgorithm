-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2022 pada 11.56
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ag_tsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`) VALUES
('adminantaran', 'poswates55600'),
('adminit', 'poswates_55600');

-- --------------------------------------------------------

-- Struktur dari tabel `tb_kurir`
--

CREATE TABLE `tb_kurir` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kurir`
--

INSERT INTO `tb_kurir` (`user`, `pass`) VALUES
('kurirwates', 'kurir55600'),
('kurirngl', 'kurir55671'),
('kurirgml', 'kurir55674'),
('kurirsmg', 'kurir55673'),
('kurirkbw', 'kurir55672'),
('kurirgalur', 'kurir55661'),
('kurirpgs', 'kurir55652'),
('kurirsentolo', 'kurir55664'),
('kurirtemon', 'kurir55654'),
('kurirlendah', 'kurir55663'),
('kurirpjt', 'kurir55655'),
('kurirkokap', 'kurir55653');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `ID` int(11) NOT NULL,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bobot`
--

INSERT INTO `tb_bobot` (`ID`, `ID1`, `ID2`, `bobot`, `updated_at`) VALUES
(132, 'A', 'A', 0, NULL),
(133, 'A', 'B', 2989, '2022-06-27 16:34:59'),
(134, 'B', 'B', 0, NULL),
(135, 'B', 'A', 3385, '2022-06-27 16:34:59'),
(136, 'A', 'C', 4214, '2022-06-27 16:38:38'),
(137, 'B', 'C', 1457, '2022-06-27 16:39:09'),
(138, 'C', 'C', 0, NULL),
(139, 'C', 'A', 4610, '2022-06-27 16:38:38'),
(140, 'C', 'B', 1457, '2022-06-27 16:39:09'),
(141, 'A', 'C', 4214, '2022-06-27 16:38:38'),
(142, 'B', 'C', 1457, '2022-06-27 16:39:09'),
(143, 'C', 'C', 0, NULL),
(144, 'M', 'C', 5762, '2022-06-27 16:38:13'),
(145, 'C', 'A', 4610, '2022-06-27 16:38:38'),
(146, 'C', 'B', 1457, '2022-06-27 16:39:09'),
(147, 'C', 'M', 5759, '2022-06-27 16:38:13'),
(148, 'A', 'D', 0, NULL),
(149, 'B', 'D', 0, NULL),
(150, 'C', 'D', 3642, '2022-06-27 16:40:15'),
(151, 'D', 'D', 0, NULL),
(152, 'M', 'D', 2415, '2022-06-27 16:39:05'),
(153, 'D', 'A', 0, NULL),
(154, 'D', 'B', 0, NULL),
(155, 'D', 'C', 3642, '2022-06-27 16:40:15'),
(156, 'D', 'M', 2412, '2022-06-27 16:39:05'),
(157, 'A', 'E', 791, '2022-06-27 16:40:10'),
(158, 'B', 'E', 2342, '2022-06-27 16:39:46'),
(159, 'C', 'E', 3567, '2022-06-27 16:40:53'),
(160, 'D', 'E', 0, NULL),
(161, 'E', 'E', 0, NULL),
(162, 'M', 'E', 2195, '2022-06-27 16:39:32'),
(163, 'E', 'A', 1087, '2022-06-27 16:40:10'),
(164, 'E', 'B', 2342, '2022-06-27 16:39:46'),
(165, 'E', 'C', 3567, '2022-06-27 16:40:53'),
(166, 'E', 'D', 0, NULL),
(167, 'E', 'M', 2192, '2022-06-27 16:39:32'),
(168, 'A', 'F', 1879, '2022-06-27 16:40:18'),
(169, 'B', 'F', 3430, '2022-06-27 16:42:09'),
(170, 'C', 'F', 4655, '2022-06-27 16:42:42'),
(171, 'D', 'F', 1308, '2022-06-27 16:43:05'),
(172, 'E', 'F', 1088, '2022-06-27 16:43:26'),
(173, 'F', 'F', 0, NULL),
(174, 'M', 'F', 1107, '2022-06-27 16:43:15'),
(175, 'F', 'A', 2142, '2022-06-27 16:40:18'),
(176, 'F', 'B', 3430, '2022-06-27 16:42:09'),
(177, 'F', 'C', 4655, '2022-06-27 16:42:42'),
(178, 'F', 'D', 1308, '2022-06-27 16:43:05'),
(179, 'F', 'E', 1088, '2022-06-27 16:43:26'),
(180, 'F', 'M', 1104, '2022-06-27 16:43:15'),
(181, 'A', 'G', 1429, '2022-06-27 16:43:54'),
(182, 'B', 'G', 2980, '2022-06-27 16:43:45'),
(183, 'C', 'G', 0, NULL),
(184, 'D', 'G', 0, NULL),
(185, 'E', 'G', 0, NULL),
(186, 'F', 'G', 0, NULL),
(187, 'G', 'G', 0, NULL),
(188, 'M', 'G', 1753, '2022-06-27 16:41:27'),
(189, 'G', 'A', 1691, '2022-06-27 16:43:54'),
(190, 'G', 'B', 2980, '2022-06-27 16:43:45'),
(191, 'G', 'C', 0, NULL),
(192, 'G', 'D', 0, NULL),
(193, 'G', 'E', 0, NULL),
(194, 'G', 'F', 0, NULL),
(195, 'G', 'M', 1750, '2022-06-27 16:41:27'),
(196, 'A', 'H', 1261, '2022-06-27 16:45:59'),
(197, 'B', 'H', 2812, '2022-06-27 16:45:21'),
(198, 'C', 'H', 4036, '2022-06-27 16:46:10'),
(199, 'D', 'H', 689, '2022-06-27 16:44:08'),
(200, 'E', 'H', 0, NULL),
(201, 'F', 'H', 0, NULL),
(202, 'G', 'H', 0, NULL),
(203, 'H', 'H', 0, NULL),
(204, 'M', 'H', 2239, '2022-06-27 16:45:48'),
(205, 'H', 'A', 1260, '2022-06-27 16:45:59'),
(206, 'H', 'B', 2782, '2022-06-27 16:45:21'),
(207, 'H', 'C', 4006, '2022-06-27 16:46:10'),
(208, 'H', 'D', 659, '2022-06-27 16:44:08'),
(209, 'H', 'E', 0, NULL),
(210, 'H', 'F', 0, NULL),
(211, 'H', 'G', 0, NULL),
(212, 'H', 'M', 2235, '2022-06-27 16:45:48'),
(213, 'A', 'I', 0, NULL),
(214, 'B', 'I', 0, NULL),
(215, 'C', 'I', 0, NULL),
(216, 'D', 'I', 1169, '2022-06-27 16:48:28'),
(217, 'E', 'I', 949, '2022-06-27 16:48:15'),
(218, 'F', 'I', 194, '2022-06-27 16:48:04'),
(219, 'G', 'I', 0, NULL),
(220, 'H', 'I', 0, NULL),
(221, 'I', 'I', 0, NULL),
(222, 'M', 'I', 0, NULL),
(223, 'I', 'A', 0, NULL),
(224, 'I', 'B', 0, NULL),
(225, 'I', 'C', 0, NULL),
(226, 'I', 'D', 1169, '2022-06-27 16:48:28'),
(227, 'I', 'E', 949, '2022-06-27 16:48:15'),
(228, 'I', 'F', 194, '2022-06-27 16:48:04'),
(229, 'I', 'G', 0, NULL),
(230, 'I', 'H', 0, NULL),
(231, 'I', 'M', 0, NULL),
(232, 'A', 'J', 0, NULL),
(233, 'B', 'J', 0, NULL),
(234, 'C', 'J', 0, NULL),
(235, 'D', 'J', 0, NULL),
(236, 'E', 'J', 0, NULL),
(237, 'F', 'J', 0, NULL),
(238, 'G', 'J', 0, NULL),
(239, 'H', 'J', 0, NULL),
(240, 'I', 'J', 0, NULL),
(241, 'J', 'J', 0, NULL),
(242, 'M', 'J', 0, NULL),
(243, 'J', 'A', 0, NULL),
(244, 'J', 'B', 0, NULL),
(245, 'J', 'C', 0, NULL),
(246, 'J', 'D', 0, NULL),
(247, 'J', 'E', 0, NULL),
(248, 'J', 'F', 0, NULL),
(249, 'J', 'G', 0, NULL),
(250, 'J', 'H', 0, NULL),
(251, 'J', 'I', 0, NULL),
(252, 'J', 'M', 0, NULL),
(253, 'A', 'K', 0, NULL),
(254, 'B', 'K', 0, NULL),
(255, 'C', 'K', 0, NULL),
(256, 'D', 'K', 0, NULL),
(257, 'E', 'K', 0, NULL),
(258, 'F', 'K', 0, NULL),
(259, 'G', 'K', 0, NULL),
(260, 'H', 'K', 0, NULL),
(261, 'I', 'K', 0, NULL),
(262, 'J', 'K', 2853, '2022-06-27 16:49:20'),
(263, 'K', 'K', 0, NULL),
(264, 'M', 'K', 0, NULL),
(265, 'K', 'A', 0, NULL),
(266, 'K', 'B', 0, NULL),
(267, 'K', 'C', 0, NULL),
(268, 'K', 'D', 0, NULL),
(269, 'K', 'E', 0, NULL),
(270, 'K', 'F', 0, NULL),
(271, 'K', 'G', 0, NULL),
(272, 'K', 'H', 0, NULL),
(273, 'K', 'I', 0, NULL),
(274, 'K', 'J', 700, '2022-06-27 16:49:20'),
(275, 'K', 'M', 0, NULL),
(276, 'A', 'L', 5566, '2022-06-27 16:49:15'),
(277, 'B', 'L', 7117, '2022-06-27 16:48:43'),
(278, 'C', 'L', 0, NULL),
(279, 'D', 'L', 4994, '2022-06-27 16:48:33'),
(280, 'E', 'L', 0, NULL),
(281, 'F', 'L', 0, NULL),
(282, 'G', 'L', 0, NULL),
(283, 'H', 'L', 0, NULL),
(284, 'I', 'L', 0, NULL),
(285, 'J', 'L', 0, NULL),
(286, 'K', 'L', 0, NULL),
(287, 'L', 'L', 0, NULL),
(288, 'M', 'L', 0, NULL),
(289, 'L', 'A', 5828, '2022-06-27 16:49:15'),
(290, 'L', 'B', 7117, '2022-06-27 16:48:43'),
(291, 'L', 'C', 0, NULL),
(292, 'L', 'D', 4994, '2022-06-27 16:48:33'),
(293, 'L', 'E', 0, NULL),
(294, 'L', 'F', 0, NULL),
(295, 'L', 'G', 0, NULL),
(296, 'L', 'H', 0, NULL),
(297, 'L', 'I', 0, NULL),
(298, 'L', 'J', 0, NULL),
(299, 'L', 'K', 0, NULL),
(300, 'L', 'M', 0, NULL),
(301, 'A', 'N', 2640, '2022-06-27 16:50:01'),
(302, 'B', 'N', 0, NULL),
(303, 'C', 'N', 5416, '2022-06-27 16:49:41'),
(304, 'D', 'N', 0, NULL),
(305, 'E', 'N', 0, NULL),
(306, 'F', 'N', 0, NULL),
(307, 'G', 'N', 0, NULL),
(308, 'H', 'N', 0, NULL),
(309, 'I', 'N', 0, NULL),
(310, 'J', 'N', 0, NULL),
(311, 'K', 'N', 0, NULL),
(312, 'L', 'N', 0, NULL),
(313, 'M', 'N', 1268, '2022-06-27 16:50:23'),
(314, 'N', 'N', 0, NULL),
(315, 'N', 'A', 2902, '2022-06-27 16:50:01'),
(316, 'N', 'B', 0, NULL),
(317, 'N', 'C', 5416, '2022-06-27 16:49:41'),
(318, 'N', 'D', 0, NULL),
(319, 'N', 'E', 0, NULL),
(320, 'N', 'F', 0, NULL),
(321, 'N', 'G', 0, NULL),
(322, 'N', 'H', 0, NULL),
(323, 'N', 'I', 0, NULL),
(324, 'N', 'J', 0, NULL),
(325, 'N', 'K', 0, NULL),
(326, 'N', 'L', 0, NULL),
(327, 'N', 'M', 1265, '2022-06-27 16:50:23'),
(328, 'A', 'O', 6231, '2022-06-27 16:50:30'),
(329, 'B', 'O', 0, NULL),
(330, 'C', 'O', 0, NULL),
(331, 'D', 'O', 0, NULL),
(332, 'E', 'O', 0, NULL),
(333, 'F', 'O', 0, NULL),
(334, 'G', 'O', 0, NULL),
(335, 'H', 'O', 0, NULL),
(336, 'I', 'O', 0, NULL),
(337, 'J', 'O', 6410, '2022-06-27 16:50:57'),
(338, 'K', 'O', 4547, '2022-06-27 16:50:45'),
(339, 'L', 'O', 0, NULL),
(340, 'M', 'O', 0, NULL),
(341, 'N', 'O', 0, NULL),
(342, 'O', 'O', 0, NULL),
(343, 'O', 'A', 6493, '2022-06-27 16:50:30'),
(344, 'O', 'B', 0, NULL),
(345, 'O', 'C', 0, NULL),
(346, 'O', 'D', 0, NULL),
(347, 'O', 'E', 0, NULL),
(348, 'O', 'F', 0, NULL),
(349, 'O', 'G', 0, NULL),
(350, 'O', 'H', 0, NULL),
(351, 'O', 'I', 0, NULL),
(352, 'O', 'J', 4257, '2022-06-27 16:50:57'),
(353, 'O', 'K', 4547, '2022-06-27 16:50:45'),
(354, 'O', 'L', 0, NULL),
(355, 'O', 'M', 0, NULL),
(356, 'O', 'N', 0, NULL),
(357, 'A', 'P', 0, NULL),
(358, 'B', 'P', 0, NULL),
(359, 'C', 'P', 0, NULL),
(360, 'D', 'P', 0, NULL),
(361, 'E', 'P', 0, NULL),
(362, 'F', 'P', 0, NULL),
(363, 'G', 'P', 1499, '2022-06-27 16:51:15'),
(364, 'H', 'P', 1984, '2022-06-27 16:51:24'),
(365, 'I', 'P', 0, NULL),
(366, 'J', 'P', 0, NULL),
(367, 'K', 'P', 0, NULL),
(368, 'L', 'P', 0, NULL),
(369, 'M', 'P', 0, NULL),
(370, 'N', 'P', 0, NULL),
(371, 'O', 'P', 3974, '2022-06-27 16:52:09'),
(372, 'P', 'P', 0, NULL),
(373, 'P', 'A', 0, NULL),
(374, 'P', 'B', 0, NULL),
(375, 'P', 'C', 0, NULL),
(376, 'P', 'D', 0, NULL),
(377, 'P', 'E', 0, NULL),
(378, 'P', 'F', 0, NULL),
(379, 'P', 'G', 1499, '2022-06-27 16:51:15'),
(380, 'P', 'H', 1984, '2022-06-27 16:51:24'),
(381, 'P', 'I', 0, NULL),
(382, 'P', 'J', 0, NULL),
(383, 'P', 'K', 0, NULL),
(384, 'P', 'L', 0, NULL),
(385, 'P', 'M', 0, NULL),
(386, 'P', 'N', 0, NULL),
(387, 'P', 'O', 3974, '2022-06-27 16:52:09'),
(388, 'A', 'Q', 3479, '2022-06-27 16:52:16'),
(389, 'B', 'Q', 0, NULL),
(390, 'C', 'Q', 916, '2022-06-27 16:51:48'),
(391, 'D', 'Q', 2907, '2022-06-27 16:51:55'),
(392, 'E', 'Q', 0, NULL),
(393, 'F', 'Q', 3920, '2022-06-27 16:55:37'),
(394, 'G', 'Q', 0, NULL),
(395, 'H', 'Q', 0, NULL),
(396, 'I', 'Q', 3781, '2022-06-27 16:55:06'),
(397, 'J', 'Q', 4163, '2022-06-27 16:55:05'),
(398, 'K', 'Q', 4714, '2022-06-27 16:55:02'),
(399, 'L', 'Q', 7606, '2022-06-27 16:55:03'),
(400, 'M', 'Q', 5027, '2022-06-27 16:52:51'),
(401, 'N', 'Q', 4680, '2022-06-27 16:52:35'),
(402, 'O', 'Q', 8271, '2022-06-27 16:52:51'),
(403, 'P', 'Q', 4772, '2022-06-27 16:52:53'),
(404, 'Q', 'Q', 0, NULL),
(405, 'Q', 'A', 3875, '2022-06-27 16:52:16'),
(406, 'Q', 'B', 0, NULL),
(407, 'Q', 'C', 916, '2022-06-27 16:51:48'),
(408, 'Q', 'D', 2907, '2022-06-27 16:51:55'),
(409, 'Q', 'E', 0, NULL),
(410, 'Q', 'F', 3920, '2022-06-27 16:55:37'),
(411, 'Q', 'G', 0, NULL),
(412, 'Q', 'H', 0, NULL),
(413, 'Q', 'I', 3781, '2022-06-27 16:55:06'),
(414, 'Q', 'J', 4777, '2022-06-27 16:55:05'),
(415, 'Q', 'K', 4714, '2022-06-27 16:55:02'),
(416, 'Q', 'L', 7606, '2022-06-27 16:55:03'),
(417, 'Q', 'M', 5024, '2022-06-27 16:52:51'),
(418, 'Q', 'N', 4680, '2022-06-27 16:52:35'),
(419, 'Q', 'O', 8271, '2022-06-27 16:52:51'),
(420, 'Q', 'P', 4772, '2022-06-27 16:52:53'),
(421, 'A', 'R', 2449, '2022-06-27 16:53:09'),
(422, 'B', 'R', 4000, '2022-06-27 16:55:04'),
(423, 'C', 'R', 5225, '2022-06-27 16:55:27'),
(424, 'D', 'R', 1878, '2022-06-27 16:55:18'),
(425, 'E', 'R', 0, NULL),
(426, 'F', 'R', 0, NULL),
(427, 'G', 'R', 0, NULL),
(428, 'H', 'R', 0, NULL),
(429, 'I', 'R', 0, NULL),
(430, 'J', 'R', 0, NULL),
(431, 'K', 'R', 0, NULL),
(432, 'L', 'R', 0, NULL),
(433, 'M', 'R', 0, NULL),
(434, 'N', 'R', 0, NULL),
(435, 'O', 'R', 0, NULL),
(436, 'P', 'R', 0, NULL),
(437, 'Q', 'R', 0, NULL),
(438, 'R', 'R', 0, NULL),
(439, 'R', 'A', 2329, '2022-06-27 16:53:09'),
(440, 'R', 'B', 3618, '2022-06-27 16:55:04'),
(441, 'R', 'C', 4842, '2022-06-27 16:55:27'),
(442, 'R', 'D', 1495, '2022-06-27 16:55:18'),
(443, 'R', 'E', 0, NULL),
(444, 'R', 'F', 0, NULL),
(445, 'R', 'G', 0, NULL),
(446, 'R', 'H', 0, NULL),
(447, 'R', 'I', 0, NULL),
(448, 'R', 'J', 0, NULL),
(449, 'R', 'K', 0, NULL),
(450, 'R', 'L', 0, NULL),
(451, 'R', 'M', 0, NULL),
(452, 'R', 'N', 0, NULL),
(453, 'R', 'O', 0, NULL),
(454, 'R', 'P', 0, NULL),
(455, 'R', 'Q', 0, NULL),
(456, 'A', 'S', 0, NULL),
(457, 'B', 'S', 0, NULL),
(458, 'C', 'S', 0, NULL),
(459, 'D', 'S', 0, NULL),
(460, 'E', 'S', 0, NULL),
(461, 'F', 'S', 0, NULL),
(462, 'G', 'S', 0, NULL),
(463, 'H', 'S', 0, NULL),
(464, 'I', 'S', 0, NULL),
(465, 'J', 'S', 0, NULL),
(466, 'K', 'S', 0, NULL),
(467, 'L', 'S', 0, NULL),
(468, 'M', 'S', 0, NULL),
(469, 'N', 'S', 0, NULL),
(470, 'O', 'S', 0, NULL),
(471, 'P', 'S', 0, NULL),
(472, 'Q', 'S', 0, NULL),
(473, 'R', 'S', 0, NULL),
(474, 'S', 'S', 0, NULL),
(475, 'S', 'A', 0, NULL),
(476, 'S', 'B', 0, NULL),
(477, 'S', 'C', 0, NULL),
(478, 'S', 'D', 0, NULL),
(479, 'S', 'E', 0, NULL),
(480, 'S', 'F', 0, NULL),
(481, 'S', 'G', 0, NULL),
(482, 'S', 'H', 0, NULL),
(483, 'S', 'I', 0, NULL),
(484, 'S', 'J', 0, NULL),
(485, 'S', 'K', 0, NULL),
(486, 'S', 'L', 0, NULL),
(487, 'S', 'M', 0, NULL),
(488, 'S', 'N', 0, NULL),
(489, 'S', 'O', 0, NULL),
(490, 'S', 'P', 0, NULL),
(491, 'S', 'Q', 0, NULL),
(492, 'S', 'R', 0, NULL),
(493, 'A', 'T', 0, NULL),
(494, 'B', 'T', 0, NULL),
(495, 'C', 'T', 0, NULL),
(496, 'D', 'T', 0, NULL),
(497, 'E', 'T', 0, NULL),
(498, 'F', 'T', 0, NULL),
(499, 'G', 'T', 0, NULL),
(500, 'H', 'T', 0, NULL),
(501, 'I', 'T', 0, NULL),
(502, 'J', 'T', 0, NULL),
(503, 'K', 'T', 0, NULL),
(504, 'L', 'T', 0, NULL),
(505, 'M', 'T', 0, NULL),
(506, 'N', 'T', 0, NULL),
(507, 'O', 'T', 0, NULL),
(508, 'P', 'T', 0, NULL),
(509, 'Q', 'T', 0, NULL),
(510, 'R', 'T', 0, NULL),
(511, 'S', 'T', 0, NULL),
(512, 'T', 'T', 0, NULL),
(513, 'T', 'A', 0, NULL),
(514, 'T', 'B', 0, NULL),
(515, 'T', 'C', 0, NULL),
(516, 'T', 'D', 0, NULL),
(517, 'T', 'E', 0, NULL),
(518, 'T', 'F', 0, NULL),
(519, 'T', 'G', 0, NULL),
(520, 'T', 'H', 0, NULL),
(521, 'T', 'I', 0, NULL),
(522, 'T', 'J', 0, NULL),
(523, 'T', 'K', 0, NULL),
(524, 'T', 'L', 0, NULL),
(525, 'T', 'M', 0, NULL),
(526, 'T', 'N', 0, NULL),
(527, 'T', 'O', 0, NULL),
(528, 'T', 'P', 0, NULL),
(529, 'T', 'Q', 0, NULL),
(530, 'T', 'R', 0, NULL),
(531, 'T', 'S', 0, NULL),
(532, 'A', 'U', 0, NULL),
(533, 'B', 'U', 0, NULL),
(534, 'C', 'U', 0, NULL),
(535, 'D', 'U', 0, NULL),
(536, 'E', 'U', 0, NULL),
(537, 'F', 'U', 0, NULL),
(538, 'G', 'U', 0, NULL),
(539, 'H', 'U', 0, NULL),
(540, 'I', 'U', 0, NULL),
(541, 'J', 'U', 0, NULL),
(542, 'K', 'U', 0, NULL),
(543, 'L', 'U', 0, NULL),
(544, 'M', 'U', 0, NULL),
(545, 'N', 'U', 0, NULL),
(546, 'O', 'U', 0, NULL),
(547, 'P', 'U', 0, NULL),
(548, 'Q', 'U', 0, NULL),
(549, 'R', 'U', 0, NULL),
(550, 'S', 'U', 0, NULL),
(551, 'T', 'U', 0, NULL),
(552, 'U', 'U', 0, NULL),
(553, 'U', 'A', 0, NULL),
(554, 'U', 'B', 0, NULL),
(555, 'U', 'C', 0, NULL),
(556, 'U', 'D', 0, NULL),
(557, 'U', 'E', 0, NULL),
(558, 'U', 'F', 0, NULL),
(559, 'U', 'G', 0, NULL),
(560, 'U', 'H', 0, NULL),
(561, 'U', 'I', 0, NULL),
(562, 'U', 'J', 0, NULL),
(563, 'U', 'K', 0, NULL),
(564, 'U', 'L', 0, NULL),
(565, 'U', 'M', 0, NULL),
(566, 'U', 'N', 0, NULL),
(567, 'U', 'O', 0, NULL),
(568, 'U', 'P', 0, NULL),
(569, 'U', 'Q', 0, NULL),
(570, 'U', 'R', 0, NULL),
(571, 'U', 'S', 0, NULL),
(572, 'U', 'T', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelompok`
--

CREATE TABLE `tb_kelompok` (
  `kode_kelompok` varchar(16) NOT NULL,
  `nama_kelompok` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelompok`
--

INSERT INTO `tb_kelompok` (`kode_kelompok`, `nama_kelompok`) VALUES
('01', 'Wates');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_options`
--

CREATE TABLE `tb_options` (
  `option_name` varchar(16) NOT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_options`
--

INSERT INTO `tb_options` (`option_name`, `option_value`) VALUES
('cost_per_kilo', '1150'),
('default_lat', '-7.863626'),
('default_lng', '110.152638'),
('default_zoom', '13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_titik`
--

CREATE TABLE `tb_titik` (
  `kode_titik` varchar(16) NOT NULL,
  `nama_titik` varchar(255) DEFAULT NULL,
  `kode_kelompok` varchar(16) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `penerima` varchar(16) NOT NULL,
  `notelp` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_titik`
--

INSERT INTO `tb_titik` (`kode_titik`, `nama_titik`, `kode_kelompok`, `lat`, `lng`, `penerima`, `notelp`) VALUES
('Q', 'Yudha Bird', '01', -7.879633999999999, 110.1465892, 'Imam', '81290231840'),
('P', 'HAMAREN EDUCATION CENTER YOGYAKARTA', '01', -7.868614399999998, 110.1716718, 'Imam', '81290231840'),
('O', 'Toko Si Kembar', '01', -7.8595952, 110.1914054, 'Imam', '81290231840'),
('N', 'Perum BSA 2 Njoho', '01', -7.8628761, 110.1689432, 'Imam', '81290231840'),
('L', 'Pemotongan Ayam Kedungsogo', '01', -7.8632367, 110.1869706, 'Imam', '81290231840'),
('K', 'Rumah di Giripeni', '01', -7.862976099999999, 110.1692146, 'Imam', '81290231840'),
('J', 'Balai Besar Veteriner Wates Yogyakarta', '01', -7.867051199999999, 110.1677894, 'Imam', '81290231840'),
('I', 'Sanggar Langit Alang-alang', '01', -7.867534399999999, 110.1654077, 'Imam', '81290231840'),
('H', 'SMA MAARIF WATES', '01', -7.863502199999998, 110.1590624, 'Imam', '81290231840'),
('G', 'Rumah di Durungan', '01', -7.867277258219175, 110.16179405952455, 'Imam', '81290231840'),
('F', 'Yamaha Mataram Sakti Kulon Progo', '01', -7.8671072, 110.1668634, 'Imam', '81290231840'),
('E', 'Bank BRI Cabang Wates', '01', -7.865725899999998, 110.1571866, 'Imam', '81290231840'),
('D', 'BANK BTN SYARIAH WATES', '01', -7.8654683, 110.1552325, 'Imam', '81290231840'),
('C', 'Rumah di Sanggrahan', '01', -7.885994355005337, 110.14392641478463, 'Imam', '81290231840'),
('B', 'Rumah di Cangkring', '01', -7.885051388688848, 110.15314761971283, 'Imam', '81290231840'),
('A', 'Kantor Pos Wates', '01', -7.863655000000001, 110.1526359, 'Imam', '81290231840'),
('M', 'POLRES Kulon Progo', '01', -7.866144099999999, 110.1756634, 'Imam', '81290231840'),
('R', 'cuci mobil DORENEO', '01', -7.866621700000002, 110.1682883, 'Imam', '81290231840'),
('S', 'Ameera Hijab', '01', -7.889092, 110.139592, 'Imam', '81290231840'),
('T', 'RSU Kharisma Paramedika', '01', -7.864988999999999, 110.154415, 'Imam', '81290231840'),
('U', 'Sekretariat RPT Binangun', '01', -7.877407799999999, 110.1592204, 'Imam', '81290231840');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indeks untuk tabel `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD PRIMARY KEY (`kode_kelompok`);

--
-- Indeks untuk tabel `tb_options`
--
ALTER TABLE `tb_options`
  ADD PRIMARY KEY (`option_name`);

--
-- Indeks untuk tabel `tb_titik`
--
ALTER TABLE `tb_titik`
  ADD PRIMARY KEY (`kode_titik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bobot`
--
ALTER TABLE `tb_bobot`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=573;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
