-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 
-- サーバのバージョン： 10.4.6-MariaDB
-- PHP のバージョン: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacfd04_db21`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `msg`
--

CREATE TABLE `msg` (
  `id` int(12) NOT NULL,
  `name` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `msg`
--

INSERT INTO `msg` (`id`, `name`, `message`, `time`) VALUES
(9, 'みやもん', 'ssssss', '2019-10-19 14:27:40'),
(10, 'さっちゃん', 'asasasasasasasasas', '2019-10-19 15:29:50'),
(11, 'みやもん', 'aaa', '2019-10-24 20:17:40'),
(12, 'ふっちー', 'あｚｓｘｒｄｃｔｆｖｙｇｂｈｊもｋ', '2019-10-26 18:25:55'),
(13, 'みっすー', 'type', '2019-10-26 18:26:40'),
(14, 'CK', 'aaa', '2019-10-29 08:54:51'),
(15, 'みやもん', 'aaa', '2019-10-29 08:56:31'),
(16, 'ふっちー', 'eee', '2019-10-29 09:24:20'),
(17, 'しみー', 'qqq', '2019-10-29 15:40:27'),
(18, 'ふっちー', 'ｑｑｑｑｑｑｑ', '2019-10-29 19:19:37'),
(19, 'ふっちー', 'ee', '2019-10-29 20:20:11'),
(20, 'まなてぃ', 'ｗｗｗｗｗｗｗｗｗｗｗｗｗｗ', '2019-10-29 20:36:27'),
(21, 'ふっちー', 'sss\r\n\r\n', '2019-11-09 01:39:18');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
