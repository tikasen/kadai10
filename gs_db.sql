-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 10 月 12 日 00:19
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `b_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `b_url` text COLLATE utf8_unicode_ci NOT NULL,
  `b_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `img_url` text COLLATE utf8_unicode_ci NOT NULL,
  `t_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `b_name`, `b_url`, `b_comment`, `img_url`, `t_time`) VALUES
(17, 'いちばんやさしいPHPの教本 第2版 人気講師が教える実践Webプログラミング 「いちばんやさしい教本」シリーズ', 'http://amzn.to/2kzADbO', '柏岡秀男  (著), 池田友子 (著)', 'https://goo.gl/bwYHe3', '2017-10-01 17:27:13'),
(22, 'PHPはじめてのフレームワーク Laravel 5.5~5.3対応 ステップ１', 'http://amzn.to/2hWj2dl', '山崎 大助 (著)', 'https://goo.gl/T7o2ev', '2017-10-01 17:27:13'),
(24, 'インベスターZ(1) Kindle版', 'http://amzn.to/2ySDpvk', '三田紀房 (著)', 'https://goo.gl/rnA1wn', '2017-10-09 19:36:52'),
(25, '賭博黙示録 カイジ　１ Kindle版', 'http://amzn.to/2kxcQtb', '福本 伸行 (著)', 'https://goo.gl/6sCVeQ', '2017-10-09 19:38:11'),
(26, '週刊少年サンデー 2017年44号(2017年9月27日発売) ', 'http://amzn.to/2fYhwD2', '週刊少年サンデー編集部 ', 'https://goo.gl/Nmy9Eq', '2017-10-11 07:09:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(6, 'おそまつさん', 'oso', 'oso', 1, 0),
(7, 'ちび太', 'admin', 'admin', 1, 0),
(8, 'いやみ', 'test1', 'test1', 0, 0),
(12, 'いやみ2', 'test2', 'test2', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
