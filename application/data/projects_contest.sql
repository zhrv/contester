-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 23 2015 г., 21:01
-- Версия сервера: 5.5.25
-- Версия PHP: 5.4.35

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `projects_contest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `checkergroups`
--

DROP TABLE IF EXISTS `checkergroups`;
CREATE TABLE IF NOT EXISTS `checkergroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL,
  `method` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scores` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `checkergroups`
--

INSERT INTO `checkergroups` (`id`, `tid`, `method`, `name`, `scores`) VALUES
(6, 5, 1, '1', NULL),
(7, 5, 0, '2', NULL),
(8, 7, 1, 'Подзадача 1', NULL),
(9, 7, 1, 'Подзадача 2', NULL),
(10, 8, 1, 'Подзадача 1', 50),
(11, 8, 0, 'Подзадача 2', 50),
(12, 9, 1, 'Подзадача 1', 30),
(13, 9, 1, 'Подзадача 2', 30),
(14, 9, 1, 'Подзадача 3', 40),
(15, 10, 1, 'Подзадача 1', 30),
(16, 10, 1, 'Подзадача 2', 30),
(17, 10, 1, 'Подзадача 3', 20),
(18, 10, 1, 'Подзадача 4', 20),
(19, 11, 0, 'Подзадача 1', 27),
(20, 11, 0, 'Подзадача 2', 25),
(21, 11, 0, 'Подзадача 3', 48);

-- --------------------------------------------------------

--
-- Структура таблицы `checkertests`
--

DROP TABLE IF EXISTS `checkertests`;
CREATE TABLE IF NOT EXISTS `checkertests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `scores` int(11) DEFAULT NULL,
  `input` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `output` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=303 ;

--
-- Дамп данных таблицы `checkertests`
--

INSERT INTO `checkertests` (`id`, `gid`, `scores`, `input`, `output`) VALUES
(13, 6, 5, '01', '01.a'),
(14, 6, 5, '02', '02.a'),
(15, 6, 5, '03', '03.a'),
(16, 6, 5, '04', '04.a'),
(17, 6, 5, '05', '05.a'),
(18, 6, 5, '06', '06.a'),
(19, 6, 5, '07', '07.a'),
(20, 6, 5, '08', '08.a'),
(21, 6, 5, '09', '09.a'),
(22, 6, 5, '10', '10.a'),
(23, 7, 10, '11', '11.a'),
(24, 7, 10, '12', '12.a'),
(25, 7, 10, '13', '13.a'),
(26, 7, 10, '14', '14.a'),
(27, 7, 10, '15', '15.a'),
(28, 8, 1, '01', '01.a'),
(29, 8, 1, '02', '02.a'),
(30, 8, 1, '03', '03.a'),
(31, 8, 1, '04', '04.a'),
(32, 8, 1, '05', '05.a'),
(33, 8, 1, '06', '06.a'),
(34, 8, 1, '07', '07.a'),
(35, 8, 1, '08', '08.a'),
(36, 8, 1, '09', '09.a'),
(37, 8, 1, '10', '10.a'),
(38, 9, 1, '11', '11.a'),
(39, 9, 1, '12', '12.a'),
(40, 9, 1, '13', '13.a'),
(41, 9, 1, '14', '14.a'),
(42, 9, 1, '15', '15.a'),
(43, 10, 3, '01', '01.a'),
(44, 10, 3, '02', '02.a'),
(45, 10, 3, '03', '03.a'),
(46, 10, 3, '04', '04.a'),
(47, 10, 3, '05', '05.a'),
(48, 10, 3, '06', '06.a'),
(49, 10, 3, '07', '07.a'),
(50, 10, 3, '08', '08.a'),
(51, 10, 3, '09', '09.a'),
(52, 10, 3, '10', '10.a'),
(53, 10, 3, '11', '11.a'),
(54, 10, 3, '12', '12.a'),
(55, 10, 3, '13', '13.a'),
(56, 10, 3, '14', '14.a'),
(57, 10, 3, '15', '15.a'),
(58, 10, 3, '16', '16.a'),
(59, 10, 3, '17', '17.a'),
(60, 10, 3, '18', '18.a'),
(61, 10, 3, '19', '19.a'),
(62, 10, 3, '20', '20.a'),
(63, 11, 2, '21', '21.a'),
(64, 11, 2, '22', '22.a'),
(65, 11, 2, '23', '23.a'),
(66, 11, 2, '24', '24.a'),
(67, 11, 2, '25', '25.a'),
(68, 11, 2, '26', '26.a'),
(69, 11, 2, '27', '27.a'),
(70, 11, 2, '28', '28.a'),
(71, 11, 2, '29', '29.a'),
(72, 11, 2, '30', '30.a'),
(73, 11, 2, '31', '31.a'),
(74, 11, 2, '32', '32.a'),
(75, 11, 2, '33', '33.a'),
(76, 11, 2, '34', '34.a'),
(77, 11, 2, '35', '35.a'),
(78, 11, 2, '36', '36.a'),
(79, 11, 2, '37', '37.a'),
(80, 11, 2, '38', '38.a'),
(81, 11, 2, '39', '39.a'),
(82, 11, 2, '40', '40.a'),
(83, 11, 2, '41', '41.a'),
(84, 11, 2, '42', '42.a'),
(85, 11, 2, '43', '43.a'),
(86, 11, 2, '44', '44.a'),
(87, 11, 2, '45', '45.a'),
(204, 12, 0, '01', '01.a'),
(205, 12, 0, '02', '02.a'),
(206, 12, 0, '03', '03.a'),
(207, 12, 0, '04', '04.a'),
(208, 12, 0, '05', '05.a'),
(209, 12, 0, '06', '06.a'),
(210, 12, 0, '07', '07.a'),
(211, 12, 0, '08', '08.a'),
(212, 12, 0, '09', '09.a'),
(213, 12, 0, '10', '10.a'),
(214, 12, 0, '11', '11.a'),
(215, 12, 0, '12', '12.a'),
(216, 12, 0, '13', '13.a'),
(217, 13, 0, '14', '14.a'),
(218, 13, 0, '15', '15.a'),
(219, 13, 0, '16', '16.a'),
(220, 13, 0, '17', '17.a'),
(221, 13, 0, '18', '18.a'),
(222, 13, 0, '19', '19.a'),
(223, 13, 0, '20', '20.a'),
(224, 13, 0, '21', '21.a'),
(225, 13, 0, '22', '22.a'),
(226, 13, 0, '23', '23.a'),
(227, 13, 0, '24', '24.a'),
(228, 13, 0, '25', '25.a'),
(229, 13, 0, '26', '26.a'),
(230, 13, 0, '27', '27.a'),
(231, 13, 0, '28', '28.a'),
(232, 13, 0, '29', '29.a'),
(233, 13, 0, '30', '30.a'),
(234, 14, 0, '31', '31.a'),
(235, 14, 0, '32', '32.a'),
(236, 14, 0, '33', '33.a'),
(237, 14, 0, '34', '34.a'),
(238, 14, 0, '35', '35.a'),
(239, 14, 0, '36', '36.a'),
(240, 14, 0, '37', '37.a'),
(241, 14, 0, '38', '38.a'),
(242, 14, 0, '39', '39.a'),
(243, 14, 0, '40', '40.a'),
(244, 14, 0, '41', '41.a'),
(245, 14, 0, '42', '42.a'),
(246, 14, 0, '43', '43.a'),
(247, 14, 0, '44', '44.a'),
(248, 14, 0, '45', '45.a'),
(249, 14, 0, '46', '46.a'),
(250, 14, 0, '47', '47.a'),
(251, 15, 0, '01', '01.a'),
(252, 15, 0, '02', '02.a'),
(253, 15, 0, '03', '03.a'),
(254, 15, 0, '04', '04.a'),
(255, 15, 0, '05', '05.a'),
(256, 15, 0, '06', '06.a'),
(257, 15, 0, '07', '07.a'),
(258, 15, 0, '08', '08.a'),
(259, 15, 0, '09', '09.a'),
(260, 15, 0, '10', '10.a'),
(261, 16, 0, '11', '11.a'),
(262, 16, 0, '12', '12.a'),
(263, 16, 0, '13', '13.a'),
(264, 16, 0, '14', '14.a'),
(265, 16, 0, '15', '15.a'),
(266, 17, 0, '16', '16.a'),
(267, 17, 0, '17', '17.a'),
(268, 17, 0, '18', '18.a'),
(269, 17, 0, '19', '19.a'),
(270, 17, 0, '20', '20.a'),
(271, 18, 0, '21', '21.a'),
(272, 18, 0, '22', '22.a'),
(273, 18, 0, '23', '23.a'),
(274, 18, 0, '24', '24.a'),
(275, 18, 0, '25', '25.a'),
(276, 18, 0, '26', '26.a'),
(277, 19, 3, '01', '01.a'),
(278, 19, 3, '02', '02.a'),
(279, 19, 3, '03', '03.a'),
(280, 19, 3, '04', '04.a'),
(281, 19, 3, '05', '05.a'),
(282, 19, 3, '06', '06.a'),
(283, 19, 3, '07', '07.a'),
(284, 19, 3, '08', '08.a'),
(285, 19, 3, '09', '09.a'),
(286, 20, 5, '10', '10.a'),
(287, 20, 5, '11', '11.a'),
(288, 20, 5, '12', '12.a'),
(289, 20, 5, '13', '13.a'),
(290, 20, 5, '14', '14.a'),
(291, 21, 4, '15', '15.a'),
(292, 21, 4, '16', '16.a'),
(293, 21, 4, '17', '17.a'),
(294, 21, 4, '18', '18.a'),
(295, 21, 4, '19', '19.a'),
(296, 21, 4, '20', '20.a'),
(297, 21, 4, '21', '21.a'),
(298, 21, 4, '22', '22.a'),
(299, 21, 4, '23', '23.a'),
(300, 21, 4, '24', '24.a'),
(301, 21, 4, '25', '25.a'),
(302, 21, 4, '26', '26.a');

-- --------------------------------------------------------

--
-- Структура таблицы `contests`
--

DROP TABLE IF EXISTS `contests`;
CREATE TABLE IF NOT EXISTS `contests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_at` int(11) DEFAULT NULL,
  `finish_at` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `contests`
--

INSERT INTO `contests` (`id`, `name`, `start_at`, `finish_at`, `status`) VALUES
(1, 'Пробный тур', 0, 1, 1),
(2, 'Региональный этап всероссийской олимпиады школьников по информатике (ПЕРВЫЙ ТУР)', 0, 2147483647, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1421858385),
('m141213_185845_init', 1421858388),
('m150119_172014_checkertests', 1421858388),
('m150121_131006_checkergroups', 1421858388),
('m150122_100830_tests_chid', 1421922580),
('m150123_172601_dec_score', 1422038731);

-- --------------------------------------------------------

--
-- Структура таблицы `solutions`
--

DROP TABLE IF EXISTS `solutions`;
CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `code` text COLLATE utf8_unicode_ci,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `result` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `tid` (`tid`),
  KEY `lid` (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `solutions`
--

INSERT INTO `solutions` (`id`, `uid`, `tid`, `lid`, `code`, `file`, `created_at`, `hash`, `score`, `status`, `result`) VALUES
(3, 1, 5, 2, '{$apptype console} \r\n\r\nvar\r\n	f: TextFile;\r\n	a,b:longint;\r\nbegin\r\n	Assign(f, ''sum.in'');\r\n	Reset(f);\r\n	ReadLn(f,a,b);\r\n	Close(f);\r\n	Assign(f, ''sum.out'');\r\n	Rewrite(f);\r\nif (a+b = 2) then begin Writeln(f,3); end else\r\n	WriteLn(f,a+b);\r\n	Close(f);\r\nend.', NULL, 1421995766, '3d8e340c6e430833657fab73db65dc92', 50, 0, '{"status":"ok","error_msg":"","report":[{"id":13,"result":"bad","time":0,"memory":2854912,"score":0},{"id":14,"result":"ok","time":15,"memory":2867200,"score":5},{"id":15,"result":"ok","time":15,"memory":2850816,"score":5},{"id":16,"result":"ok","time":0,"memory":2859008,"score":5},{"id":17,"result":"ok","time":0,"memory":2846720,"score":5},{"id":18,"result":"ok","time":15,"memory":2863104,"score":5},{"id":19,"result":"ok","time":15,"memory":2863104,"score":5},{"id":20,"result":"ok","time":15,"memory":2850816,"score":5},{"id":21,"result":"ok","time":0,"memory":2854912,"score":5},{"id":22,"result":"ok","time":0,"memory":2859008,"score":5},{"id":23,"result":"ok","time":15,"memory":2863104,"score":10},{"id":24,"result":"ok","time":0,"memory":2859008,"score":10},{"id":25,"result":"ok","time":15,"memory":2863104,"score":10},{"id":26,"result":"ok","time":0,"memory":2867200,"score":10},{"id":27,"result":"ok","time":0,"memory":2854912,"score":10}]}'),
(4, 2, 5, 1, '#include <fstream>\r\n#include <iostream>\r\nusing namespace std;\r\n\r\nint main() {\r\n    int a, b;\r\n\r\n    ifstream fin("sum.in");\r\n    ofstream fou("sum.out");\r\n\r\n    fin >> a >> b;\r\n\r\n    fou << a + b << endl;\r\n\r\n    return 0;\r\n}\r\n', NULL, 1421943972, '321159ebf36192fa3b9324ae51b4ff04', 100, 0, '{"status":"ok","error_msg":"","report":[{"id":13,"result":"ok","time":0,"memory":2486272,"score":5},{"id":14,"result":"ok","time":0,"memory":2060288,"score":5},{"id":15,"result":"ok","time":15,"memory":2056192,"score":5},{"id":16,"result":"ok","time":0,"memory":2060288,"score":5},{"id":17,"result":"ok","time":0,"memory":2060288,"score":5},{"id":18,"result":"ok","time":15,"memory":2060288,"score":5},{"id":19,"result":"ok","time":0,"memory":2060288,"score":5},{"id":20,"result":"ok","time":15,"memory":2060288,"score":5},{"id":21,"result":"ok","time":15,"memory":2060288,"score":5},{"id":22,"result":"ok","time":15,"memory":2060288,"score":5},{"id":23,"result":"ok","time":15,"memory":2060288,"score":10},{"id":24,"result":"ok","time":0,"memory":2056192,"score":10},{"id":25,"result":"ok","time":15,"memory":2060288,"score":10},{"id":26,"result":"ok","time":15,"memory":2060288,"score":10},{"id":27,"result":"ok","time":0,"memory":2060288,"score":10}]}'),
(5, 1, 7, 1, '#include <fstream>\r\n#include <iostream>\r\nusing namespace std;\r\n\r\nint main() {\r\n    long long a, b;\r\n\r\n    ifstream fin("sumsqr.in");\r\n    ofstream fou("sumsqr.out");\r\n\r\n    fin >> a >> b;\r\n\r\n    fou << a * a + b * b << endl;\r\n\r\n    return 0;\r\n}\r\n', NULL, 1421999370, '66b0266e76d73f52b666a464040e4c8e', 15, 0, '{"status":"ok","error_msg":"","report":[{"id":28,"result":"ok","time":0,"memory":2486272,"score":1},{"id":29,"result":"ok","time":15,"memory":2056192,"score":1},{"id":30,"result":"ok","time":0,"memory":2056192,"score":1},{"id":31,"result":"ok","time":15,"memory":2056192,"score":1},{"id":32,"result":"ok","time":15,"memory":2056192,"score":1},{"id":33,"result":"ok","time":15,"memory":2052096,"score":1},{"id":34,"result":"ok","time":15,"memory":2056192,"score":1},{"id":35,"result":"ok","time":0,"memory":2056192,"score":1},{"id":36,"result":"ok","time":0,"memory":2056192,"score":1},{"id":37,"result":"ok","time":15,"memory":2056192,"score":1},{"id":38,"result":"ok","time":0,"memory":2056192,"score":1},{"id":39,"result":"ok","time":0,"memory":2056192,"score":1},{"id":40,"result":"ok","time":0,"memory":2056192,"score":1},{"id":41,"result":"ok","time":0,"memory":2056192,"score":1},{"id":42,"result":"ok","time":0,"memory":2052096,"score":1}]}'),
(6, 1, 8, 4, '#include <fstream>\r\n#include <iostream>\r\nusing namespace std;\r\n\r\nint main() {\r\n    int a, b, c, d;\r\n\r\n    ifstream fin("hall.in");\r\n    ofstream fou("hall.out");\r\n\r\n    fin >> a >> b >> c >> d;\r\n\r\n    long long ans = 0;\r\n    for (int x = 1; x <= d / 2 && x * x <= b; x++) {\r\n        int miny = x;\r\n        if ((c + 1) / 2 - x > miny) {\r\n            miny = (c + 1) / 2 - x;\r\n        }\r\n        if ((a + x - 1) / x > miny) {\r\n            miny = (a + x - 1) / x;\r\n        }\r\n        int maxy = d / 2 - x;\r\n        if (b / x < maxy) {\r\n            maxy = b / x;\r\n        }\r\n        if (maxy >= miny) {\r\n            ans += maxy - miny + 1;\r\n        }\r\n    }\r\n    fou << ans << endl;\r\n\r\n    return 0;\r\n}\r\n', NULL, 1422045599, '40330bd984a719eeba791072e4c2e590', 100, 0, '{"status":"ok","error_msg":"","report":[{"id":43,"result":"ok","time":0,"memory":1851392,"score":3},{"id":44,"result":"ok","time":15,"memory":1851392,"score":3},{"id":45,"result":"ok","time":15,"memory":1851392,"score":3},{"id":46,"result":"ok","time":0,"memory":1851392,"score":3},{"id":47,"result":"ok","time":0,"memory":1851392,"score":3},{"id":48,"result":"ok","time":0,"memory":1851392,"score":3},{"id":49,"result":"ok","time":0,"memory":1851392,"score":3},{"id":50,"result":"ok","time":0,"memory":1855488,"score":3},{"id":51,"result":"ok","time":0,"memory":1851392,"score":3},{"id":52,"result":"ok","time":0,"memory":1851392,"score":3},{"id":53,"result":"ok","time":15,"memory":1851392,"score":3},{"id":54,"result":"ok","time":0,"memory":1851392,"score":3},{"id":55,"result":"ok","time":0,"memory":1855488,"score":3},{"id":56,"result":"ok","time":0,"memory":1851392,"score":3},{"id":57,"result":"ok","time":0,"memory":1855488,"score":3},{"id":58,"result":"ok","time":0,"memory":1851392,"score":3},{"id":59,"result":"ok","time":0,"memory":1851392,"score":3},{"id":60,"result":"ok","time":0,"memory":1851392,"score":3},{"id":61,"result":"ok","time":0,"memory":1851392,"score":3},{"id":62,"result":"ok","time":0,"memory":1851392,"score":3},{"id":63,"result":"ok","time":15,"memory":1851392,"score":2},{"id":64,"result":"ok","time":15,"memory":1851392,"score":2},{"id":65,"result":"ok","time":15,"memory":1851392,"score":2},{"id":66,"result":"ok","time":0,"memory":1851392,"score":2},{"id":67,"result":"ok","time":0,"memory":1855488,"score":2},{"id":68,"result":"ok","time":15,"memory":1851392,"score":2},{"id":69,"result":"ok","time":0,"memory":1851392,"score":2},{"id":70,"result":"ok","time":15,"memory":1851392,"score":2},{"id":71,"result":"ok","time":0,"memory":1855488,"score":2},{"id":72,"result":"ok","time":0,"memory":1851392,"score":2},{"id":73,"result":"ok","time":0,"memory":1851392,"score":2},{"id":74,"result":"ok","time":0,"memory":1851392,"score":2},{"id":75,"result":"ok","time":0,"memory":1851392,"score":2},{"id":76,"result":"ok","time":0,"memory":1851392,"score":2},{"id":77,"result":"ok","time":0,"memory":1851392,"score":2},{"id":78,"result":"ok","time":0,"memory":1851392,"score":2},{"id":79,"result":"ok","time":15,"memory":1851392,"score":2},{"id":80,"result":"ok","time":15,"memory":1851392,"score":2},{"id":81,"result":"ok","time":0,"memory":1851392,"score":2},{"id":82,"result":"ok","time":15,"memory":1851392,"score":2},{"id":83,"result":"ok","time":0,"memory":1855488,"score":2},{"id":84,"result":"ok","time":0,"memory":1851392,"score":2},{"id":85,"result":"ok","time":15,"memory":1851392,"score":2},{"id":86,"result":"ok","time":15,"memory":1851392,"score":2},{"id":87,"result":"ok","time":0,"memory":1851392,"score":2}]}'),
(7, 1, 9, 4, '#include <stdio.h>\r\n#include <fstream>\r\n#include <iostream>\r\n#include <cmath>\r\n\r\n#ifdef WIN32\r\n#define I64 "%I64d"\r\n#else\r\n#define I64 "%lld"\r\n#endif\r\n\r\nusing namespace std;\r\n\r\n#define MAXN 1000002\r\n\r\nint a[MAXN];\r\nlong long s[MAXN], pref[MAXN], suff[MAXN];\r\n\r\nint main(void) {\r\n    freopen("prizes.in", "r", stdin);\r\n    freopen("prizes.out", "w", stdout);\r\n\r\n    int n, k;\r\n    scanf("%d %d", &n, &k);\r\n\r\n    for (int i = 0; i < n; i++) {\r\n        scanf("%d", &a[i]);\r\n        s[i + 1] = s[i] + a[i];\r\n    }\r\n\r\n    for (int i = k - 1; i < n; i++) {\r\n        pref[i + 1] = max(pref[i], s[i + 1] - s[i - k + 1]);\r\n    }\r\n\r\n    for (int i = n - k; i > 0; i--) {\r\n        suff[i] = max(suff[i + 1], s[i + k]  - s[i]);\r\n    }\r\n\r\n    long long best = 2e18;\r\n    for (int i = 0; i < n - k + 1; i++) {\r\n        best = min(best, max(pref[i], suff[i + k]));\r\n    }\r\n\r\n    printf(I64"\\n", best);\r\n\r\n    return 0;\r\n}\r\n', NULL, 1422045628, '93b5110d9970389e0160e578e5c0f35c', 100, 0, '{"status":"ok","error_msg":"","report":[{"id":204,"result":"ok","time":15,"memory":1835008,"score":0},{"id":205,"result":"ok","time":0,"memory":1835008,"score":0},{"id":206,"result":"ok","time":0,"memory":1835008,"score":0},{"id":207,"result":"ok","time":0,"memory":1835008,"score":0},{"id":208,"result":"ok","time":0,"memory":1835008,"score":0},{"id":209,"result":"ok","time":0,"memory":1835008,"score":0},{"id":210,"result":"ok","time":0,"memory":1835008,"score":0},{"id":211,"result":"ok","time":15,"memory":1835008,"score":0},{"id":212,"result":"ok","time":0,"memory":1835008,"score":0},{"id":213,"result":"ok","time":0,"memory":1835008,"score":0},{"id":214,"result":"ok","time":0,"memory":1835008,"score":0},{"id":215,"result":"ok","time":0,"memory":1835008,"score":0},{"id":216,"result":"ok","time":0,"memory":1835008,"score":0},{"id":217,"result":"ok","time":0,"memory":1970176,"score":0},{"id":218,"result":"ok","time":0,"memory":1970176,"score":0},{"id":219,"result":"ok","time":0,"memory":1970176,"score":0},{"id":220,"result":"ok","time":0,"memory":1970176,"score":0},{"id":221,"result":"ok","time":15,"memory":1970176,"score":0},{"id":222,"result":"ok","time":15,"memory":1970176,"score":0},{"id":223,"result":"ok","time":15,"memory":1970176,"score":0},{"id":224,"result":"ok","time":15,"memory":1970176,"score":0},{"id":225,"result":"ok","time":15,"memory":1970176,"score":0},{"id":226,"result":"ok","time":0,"memory":1974272,"score":0},{"id":227,"result":"ok","time":0,"memory":1970176,"score":0},{"id":228,"result":"ok","time":15,"memory":1970176,"score":0},{"id":229,"result":"ok","time":0,"memory":1970176,"score":0},{"id":230,"result":"ok","time":15,"memory":1970176,"score":0},{"id":231,"result":"ok","time":15,"memory":1970176,"score":0},{"id":232,"result":"ok","time":0,"memory":1970176,"score":0},{"id":233,"result":"ok","time":0,"memory":1970176,"score":0},{"id":234,"result":"ok","time":31,"memory":4632576,"score":0},{"id":235,"result":"ok","time":30,"memory":4632576,"score":0},{"id":236,"result":"ok","time":31,"memory":4632576,"score":0},{"id":237,"result":"ok","time":30,"memory":4632576,"score":0},{"id":238,"result":"ok","time":31,"memory":4632576,"score":0},{"id":239,"result":"ok","time":31,"memory":4632576,"score":0},{"id":240,"result":"ok","time":31,"memory":4632576,"score":0},{"id":241,"result":"ok","time":15,"memory":4632576,"score":0},{"id":242,"result":"ok","time":31,"memory":4632576,"score":0},{"id":243,"result":"ok","time":46,"memory":4632576,"score":0},{"id":244,"result":"ok","time":31,"memory":2998272,"score":0},{"id":245,"result":"ok","time":31,"memory":4632576,"score":0},{"id":246,"result":"ok","time":15,"memory":4632576,"score":0},{"id":247,"result":"ok","time":31,"memory":4632576,"score":0},{"id":248,"result":"ok","time":31,"memory":4632576,"score":0},{"id":249,"result":"ok","time":46,"memory":4632576,"score":0},{"id":250,"result":"ok","time":31,"memory":4632576,"score":0}]}'),
(8, 1, 10, 4, '#include <iostream>\r\n#include <climits>\r\n#include <algorithm>\r\n#include <vector>\r\n#include <cstdio>\r\nusing namespace std;\r\n\r\n#ifdef WIN32\r\n#define I64 "%I64d"\r\n#else\r\n#define I64 "%lld"\r\n#endif\r\n\r\nconst int MAXN = 300031;\r\n\r\n\r\nconst int NEUTRAL_VALUE = INT_MIN;\r\nconst int NEUTRAL_DELTA = 0;\r\n\r\nint joinValues(int leftValue, int rightValue) {\r\n  return max(leftValue, rightValue);\r\n}\r\n\r\nint joinDeltas(int oldDelta, int newDelta) {\r\n  return oldDelta + newDelta;\r\n}\r\n\r\nint joinValueWithDelta(int value, int delta, int length) {\r\n  return value + delta;\r\n}\r\n\r\nstruct treap {\r\n  int nodeValue;\r\n  int subTreeValue;\r\n  int delta;\r\n  int count;\r\n  int prio;\r\n  treap *l;\r\n  treap *r;\r\n};\r\n\r\ntreap nodes[MAXN];\r\nint nodes_cnt;\r\nvector<int> rnd;\r\n\r\nstatic int getCount(treap* root) {\r\n  return root ? root->count : 0;\r\n}\r\n\r\nstatic int getSubTreeValue(treap* root) {\r\n  return root ? root->subTreeValue : NEUTRAL_VALUE;\r\n}\r\n\r\nvoid update(treap *root) {\r\n  if (!root) return;\r\n  root->subTreeValue = joinValues(joinValues(getSubTreeValue(root->l), root->nodeValue), getSubTreeValue(root->r));\r\n  root->count = 1 + getCount(root->l) + getCount(root->r);\r\n}\r\n\r\nvoid applyDelta(treap *root, int delta) {\r\n  if (!root) return;\r\n  root->delta = joinDeltas(root->delta, delta);\r\n  root->nodeValue = joinValueWithDelta(root->nodeValue, delta, 1);\r\n  root->subTreeValue = joinValueWithDelta(root->subTreeValue, delta, root->count);\r\n}\r\n\r\nvoid pushDelta(treap* root) {\r\n  if (!root) return;\r\n  applyDelta(root->l, root->delta);\r\n  applyDelta(root->r, root->delta);\r\n  root->delta = NEUTRAL_DELTA;\r\n}\r\n\r\nvoid merge(treap* &t, treap* l, treap* r) {\r\n  pushDelta(l);\r\n  pushDelta(r);\r\n  if (!l)\r\n    t = r;\r\n  else if (!r)\r\n    t = l;\r\n  else if (l->prio < r->prio)\r\n    merge(l->r, l->r, r), t = l;\r\n  else\r\n    merge(r->l, l, r->l), t = r;\r\n  update(t);\r\n}\r\n\r\nvoid split(treap* t, treap* &l, treap* &r, int key) {\r\n  pushDelta(t);\r\n  if (!t)\r\n    l = r = NULL;\r\n  else if (key <= getCount(t->l))\r\n    split(t->l, l, t->l, key), r = t;\r\n  else\r\n    split(t->r, t->r, r, key - getCount(t->l) - 1), l = t;\r\n  update(t);\r\n}\r\n\r\nint get(treap* t, int index) {\r\n  pushDelta(t);\r\n  if (index < getCount(t->l))\r\n    return get(t->l, index);\r\n  else if (index > getCount(t->l))\r\n    return get(t->r, index - getCount(t->l) - 1);\r\n  return t->nodeValue;\r\n}\r\n\r\nvoid insert(treap* &t, treap* item, int index) {\r\n  pushDelta(t);\r\n  if (!t)\r\n    t = item;\r\n  else if (item->prio < t->prio)\r\n    split(t, item->l, item->r, index), t = item;\r\n  else if (index <= getCount(t->l))\r\n    insert(t->l, item, index);\r\n  else\r\n    insert(t->r, item, index - getCount(t->l) - 1);\r\n  update(t);\r\n}\r\n\r\nvoid insert(treap* &root, int index, int value) {\r\n  treap *item = &nodes[nodes_cnt];\r\n  item->nodeValue = value;\r\n  item->subTreeValue = value;\r\n  item->delta = NEUTRAL_DELTA;\r\n  item->count = 1;\r\n  item->prio = rnd[nodes_cnt];\r\n  ++nodes_cnt;\r\n  insert(root, item, index);\r\n}\r\n\r\nvoid remove(treap* &t, int index) {\r\n  pushDelta(t);\r\n  if (index == getCount(t->l))\r\n    merge(t, t->l, t->r);\r\n  else\r\n    if (index < getCount(t->l))\r\n      remove(t->l, index);\r\n    else\r\n      remove(t->r, index - getCount(t->l) - 1);\r\n  update(t);\r\n}\r\n\r\nint query(treap* &root, int a, int b) {\r\n  treap *l1, *r1;\r\n  split(root, l1, r1, b + 1);\r\n  treap *l2, *r2;\r\n  split(l1, l2, r2, a);\r\n  int res = getSubTreeValue(r2);\r\n  treap *t;\r\n  merge(t, l2, r2);\r\n  merge(root, t, r1);\r\n  return res;\r\n}\r\n\r\nvoid modify(treap* &root, int a, int b, int delta) {\r\n  treap *l1, *r1;\r\n  split(root, l1, r1, b + 1);\r\n  treap *l2, *r2;\r\n  split(l1, l2, r2, a);\r\n  applyDelta(r2, delta);\r\n  treap *t;\r\n  merge(t, l2, r2);\r\n  merge(root, t, r1);\r\n}\r\n\r\nvoid print(treap* t) {\r\n  if (!t) return;\r\n  pushDelta(t);\r\n  print(t->l);\r\n  cout << t->nodeValue << " ";\r\n  print(t->r);\r\n}\r\n\r\nlong long arr[MAXN];\r\nint main() {\r\n  freopen("river.in", "r", stdin);\r\n  freopen("river.out", "w", stdout);\r\n  for (int i = 0; i < MAXN; i++)\r\n    rnd.push_back(i);\r\n  random_shuffle(rnd.begin(), rnd.end());\r\n  int n, subtask;\r\n  cin >> n >> subtask;\r\n  treap* t = NULL;\r\n  long long ans = 0;\r\n  long long xx;\r\n  for (int i = 0; i < n; i++) {\r\n    scanf(I64, &xx);\r\n    ans += xx * xx;\r\n    arr[i] = xx;\r\n    insert(t, i, i);\r\n  }\r\n          \r\n  int m;\r\n  cin >> m;\r\n  int e, v;\r\n  long long x; \r\n  int l, r; \r\n  int j;\r\n  printf(I64"\\n", ans); \r\n  int cnt = n; \r\n  for (int i = 0; i < m; i++) {\r\n    scanf("%d%d", &e, &v);\r\n    v--;\r\n    j = get(t, v);\r\n    x = arr[j];\r\n    ans -= x * x;\r\n    \r\n    if (e == 1) remove(t, v);\r\n           \r\n    if (e == 1) {\r\n      if (v == 0) {\r\n        r = get(t, 0);\r\n    ans -= arr[r] * arr[r];\r\n    arr[r] += x;\r\n    ans += (arr[r]) * (arr[r]);\r\n      } else {\r\n    //cerr << v << " " << getCount(t    );\r\n        if (v == getCount(t)) {\r\n          l = get(t, v - 1);\r\n          ans -= arr[l] * arr[l];\r\n      arr[l] += x;\r\n      ans += (arr[l]) * (arr[l]);\r\n        } else {\r\n          r = get(t, v);\r\n\r\n      ans -= arr[r] * arr[r];\r\n      arr[r] += x / 2 + x % 2;\r\n      ans += (arr[r]) * (arr[r]);\r\n                                                            \r\n          l = get(t, v - 1);\r\n          ans -= arr[l] * arr[l];\r\n      arr[l] += x / 2;\r\n      ans += (arr[l]) * (arr[l]);\r\n        }\r\n      }\r\n    } else {\r\n      arr[j] = (x / 2);\r\n      arr[cnt++] = (x / 2 + x % 2); \r\n      ans += (x / 2 + x % 2) * (x / 2 + x % 2);\r\n      ans += (x / 2) * (x / 2);\r\n      insert(t, v + 1, cnt - 1);\r\n      //insert(t, v, j);\r\n    }                 \r\n    printf(I64"\\n", ans);  \r\n  }\r\n}', NULL, 1422044080, 'e6806b03554c881d680ca374f3f549bf', 100, 0, '{"status":"ok","error_msg":"","report":[{"id":251,"result":"ok","time":15,"memory":4931584,"score":0},{"id":252,"result":"ok","time":15,"memory":4931584,"score":0},{"id":253,"result":"ok","time":15,"memory":4931584,"score":0},{"id":254,"result":"ok","time":15,"memory":4927488,"score":0},{"id":255,"result":"ok","time":31,"memory":4931584,"score":0},{"id":256,"result":"ok","time":15,"memory":4931584,"score":0},{"id":257,"result":"ok","time":15,"memory":4927488,"score":0},{"id":258,"result":"ok","time":31,"memory":4927488,"score":0},{"id":259,"result":"ok","time":15,"memory":4927488,"score":0},{"id":260,"result":"ok","time":15,"memory":4931584,"score":0},{"id":261,"result":"ok","time":843,"memory":13725696,"score":0},{"id":262,"result":"ok","time":921,"memory":11321344,"score":0},{"id":263,"result":"ok","time":999,"memory":11317248,"score":0},{"id":264,"result":"ok","time":890,"memory":11321344,"score":0},{"id":265,"result":"ok","time":890,"memory":11321344,"score":0},{"id":266,"result":"ok","time":812,"memory":8925184,"score":0},{"id":267,"result":"ok","time":858,"memory":8925184,"score":0},{"id":268,"result":"ok","time":750,"memory":8925184,"score":0},{"id":269,"result":"ok","time":843,"memory":8925184,"score":0},{"id":270,"result":"ok","time":952,"memory":8925184,"score":0},{"id":271,"result":"ok","time":968,"memory":13725696,"score":0},{"id":272,"result":"ok","time":843,"memory":11321344,"score":0},{"id":273,"result":"ok","time":858,"memory":11321344,"score":0},{"id":274,"result":"ok","time":905,"memory":11329536,"score":0},{"id":275,"result":"ok","time":921,"memory":11329536,"score":0},{"id":276,"result":"ok","time":812,"memory":13406208,"score":0}]}'),
(9, 1, 11, 4, '#include <fstream>\r\n#include <iostream>\r\n#include <string>\r\n#include <cstdio>\r\n#include <vector>\r\n#include <algorithm>\r\n#include <map>\r\n#include <cassert>\r\n\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    ifstream cin("search.in");\r\n    ofstream cout("search.out");\r\n    int n, k, subtask;\r\n\r\n    cin >> n >> subtask;\r\n    if (n == 2) {\r\n        cout << "0\\n1\\n0\\n0\\n";\r\n        return 0;\r\n    }\r\n    if (n == 4) {\r\n        cout << "0\\n4\\n3\\n0\\n2\\n1\\n";\r\n        return 0;\r\n    }\r\n    assert(1 <= n && n <= 100000);\r\n\r\n    map<string, int> filter;\r\n    for (int i = 0; i < n; i++)\r\n    {\r\n        string s;\r\n        cin >> s;\r\n        assert(s[0] != ''*'' && s[s.length() - 1] != ''*'');\r\n        if (filter.count(s)) filter[s]++;\r\n        else filter[s] = 1;\r\n    }\r\n\r\n    cin >> k;\r\n    assert(1 <= k && k <= 100000);\r\n\r\n    for (int i = 0; i < k; i++)\r\n    {\r\n        string s;\r\n        cin >> s;\r\n        cout << filter[s] << "\\n";\r\n    }\r\n}\r\n', NULL, 1422045960, '80fbf854a4bb5a6ba0b0b86ae66af7c8', 25, 0, '{"status":"ok","error_msg":"","report":[{"id":277,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":278,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":279,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":280,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":281,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":282,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":283,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":284,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":285,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":286,"result":"ok","time":186,"memory":13709312,"score":5},{"id":287,"result":"ok","time":46,"memory":2293760,"score":5},{"id":288,"result":"ok","time":62,"memory":2256896,"score":5},{"id":289,"result":"ok","time":93,"memory":6250496,"score":5},{"id":290,"result":"ok","time":62,"memory":2256896,"score":5},{"id":291,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":292,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":293,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":294,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":295,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":296,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":297,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":298,"result":"tle","time":4294967295,"memory":2490368,"score":0},{"id":299,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":300,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":301,"result":"crash","time":4294967295,"memory":4294967295,"score":0},{"id":302,"result":"crash","time":4294967295,"memory":4294967295,"score":0}]}');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `input` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `output` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `checker` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_limit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memory_limit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `cid`, `title`, `content`, `input`, `output`, `checker`, `time_limit`, `memory_limit`) VALUES
(5, 1, 'W', 'Задача W', 'sum.in', 'sum.out', 'check.exe', '999999', '3145728000'),
(7, 1, 'X', 'Task X', 'sumsqr.in', 'sumsqr.out', 'check.exe', '999999', '3145728000'),
(8, 2, 'Задача 1 "Выбор зала"', '-', 'hall.in', 'hall.out', 'check.exe', '2000', '268435456'),
(9, 2, 'Задача 2 "Призы"', '-', 'prizes.in', 'prizes.out', 'check.exe', '2000', '268435456'),
(10, 2, 'Задача 3 "Река"', '-', 'river.in', 'river.out', 'check.exe', '2000', '268435456'),
(11, 2, 'Задача 4 "Чемпионат по поиску в сети Меганет"', '-', 'search.in', 'search.out', 'check.exe', '2000', '268435456');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `res` int(1) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1909 ;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `sid`, `num`, `res`, `cid`) VALUES
(554, 4, 1, 0, 13),
(555, 4, 2, 0, 14),
(556, 4, 3, 0, 15),
(557, 4, 4, 0, 16),
(558, 4, 5, 0, 17),
(559, 4, 6, 0, 18),
(560, 4, 7, 0, 19),
(561, 4, 8, 0, 20),
(562, 4, 9, 0, 21),
(563, 4, 10, 0, 22),
(564, 4, 11, 0, 23),
(565, 4, 12, 0, 24),
(566, 4, 13, 0, 25),
(567, 4, 14, 0, 26),
(568, 4, 15, 0, 27),
(779, 3, 1, 4, 13),
(780, 3, 2, 0, 14),
(781, 3, 3, 0, 15),
(782, 3, 4, 0, 16),
(783, 3, 5, 0, 17),
(784, 3, 6, 0, 18),
(785, 3, 7, 0, 19),
(786, 3, 8, 0, 20),
(787, 3, 9, 0, 21),
(788, 3, 10, 0, 22),
(789, 3, 11, 0, 23),
(790, 3, 12, 0, 24),
(791, 3, 13, 0, 25),
(792, 3, 14, 0, 26),
(793, 3, 15, 0, 27),
(794, 5, 1, 0, 28),
(795, 5, 2, 0, 29),
(796, 5, 3, 0, 30),
(797, 5, 4, 0, 31),
(798, 5, 5, 0, 32),
(799, 5, 6, 0, 33),
(800, 5, 7, 0, 34),
(801, 5, 8, 0, 35),
(802, 5, 9, 0, 36),
(803, 5, 10, 0, 37),
(804, 5, 11, 0, 38),
(805, 5, 12, 0, 39),
(806, 5, 13, 0, 40),
(807, 5, 14, 0, 41),
(808, 5, 15, 0, 42),
(1488, 8, 1, 0, 251),
(1489, 8, 2, 0, 252),
(1490, 8, 3, 0, 253),
(1491, 8, 4, 0, 254),
(1492, 8, 5, 0, 255),
(1493, 8, 6, 0, 256),
(1494, 8, 7, 0, 257),
(1495, 8, 8, 0, 258),
(1496, 8, 9, 0, 259),
(1497, 8, 10, 0, 260),
(1498, 8, 11, 0, 261),
(1499, 8, 12, 0, 262),
(1500, 8, 13, 0, 263),
(1501, 8, 14, 0, 264),
(1502, 8, 15, 0, 265),
(1503, 8, 16, 0, 266),
(1504, 8, 17, 0, 267),
(1505, 8, 18, 0, 268),
(1506, 8, 19, 0, 269),
(1507, 8, 20, 0, 270),
(1508, 8, 21, 0, 271),
(1509, 8, 22, 0, 272),
(1510, 8, 23, 0, 273),
(1511, 8, 24, 0, 274),
(1512, 8, 25, 0, 275),
(1513, 8, 26, 0, 276),
(1791, 6, 1, 0, 43),
(1792, 6, 2, 0, 44),
(1793, 6, 3, 0, 45),
(1794, 6, 4, 0, 46),
(1795, 6, 5, 0, 47),
(1796, 6, 6, 0, 48),
(1797, 6, 7, 0, 49),
(1798, 6, 8, 0, 50),
(1799, 6, 9, 0, 51),
(1800, 6, 10, 0, 52),
(1801, 6, 11, 0, 53),
(1802, 6, 12, 0, 54),
(1803, 6, 13, 0, 55),
(1804, 6, 14, 0, 56),
(1805, 6, 15, 0, 57),
(1806, 6, 16, 0, 58),
(1807, 6, 17, 0, 59),
(1808, 6, 18, 0, 60),
(1809, 6, 19, 0, 61),
(1810, 6, 20, 0, 62),
(1811, 6, 21, 0, 63),
(1812, 6, 22, 0, 64),
(1813, 6, 23, 0, 65),
(1814, 6, 24, 0, 66),
(1815, 6, 25, 0, 67),
(1816, 6, 26, 0, 68),
(1817, 6, 27, 0, 69),
(1818, 6, 28, 0, 70),
(1819, 6, 29, 0, 71),
(1820, 6, 30, 0, 72),
(1821, 6, 31, 0, 73),
(1822, 6, 32, 0, 74),
(1823, 6, 33, 0, 75),
(1824, 6, 34, 0, 76),
(1825, 6, 35, 0, 77),
(1826, 6, 36, 0, 78),
(1827, 6, 37, 0, 79),
(1828, 6, 38, 0, 80),
(1829, 6, 39, 0, 81),
(1830, 6, 40, 0, 82),
(1831, 6, 41, 0, 83),
(1832, 6, 42, 0, 84),
(1833, 6, 43, 0, 85),
(1834, 6, 44, 0, 86),
(1835, 6, 45, 0, 87),
(1836, 7, 1, 0, 204),
(1837, 7, 2, 0, 205),
(1838, 7, 3, 0, 206),
(1839, 7, 4, 0, 207),
(1840, 7, 5, 0, 208),
(1841, 7, 6, 0, 209),
(1842, 7, 7, 0, 210),
(1843, 7, 8, 0, 211),
(1844, 7, 9, 0, 212),
(1845, 7, 10, 0, 213),
(1846, 7, 11, 0, 214),
(1847, 7, 12, 0, 215),
(1848, 7, 13, 0, 216),
(1849, 7, 14, 0, 217),
(1850, 7, 15, 0, 218),
(1851, 7, 16, 0, 219),
(1852, 7, 17, 0, 220),
(1853, 7, 18, 0, 221),
(1854, 7, 19, 0, 222),
(1855, 7, 20, 0, 223),
(1856, 7, 21, 0, 224),
(1857, 7, 22, 0, 225),
(1858, 7, 23, 0, 226),
(1859, 7, 24, 0, 227),
(1860, 7, 25, 0, 228),
(1861, 7, 26, 0, 229),
(1862, 7, 27, 0, 230),
(1863, 7, 28, 0, 231),
(1864, 7, 29, 0, 232),
(1865, 7, 30, 0, 233),
(1866, 7, 31, 0, 234),
(1867, 7, 32, 0, 235),
(1868, 7, 33, 0, 236),
(1869, 7, 34, 0, 237),
(1870, 7, 35, 0, 238),
(1871, 7, 36, 0, 239),
(1872, 7, 37, 0, 240),
(1873, 7, 38, 0, 241),
(1874, 7, 39, 0, 242),
(1875, 7, 40, 0, 243),
(1876, 7, 41, 0, 244),
(1877, 7, 42, 0, 245),
(1878, 7, 43, 0, 246),
(1879, 7, 44, 0, 247),
(1880, 7, 45, 0, 248),
(1881, 7, 46, 0, 249),
(1882, 7, 47, 0, 250),
(1883, 9, 1, 3, 277),
(1884, 9, 2, 3, 278),
(1885, 9, 3, 3, 279),
(1886, 9, 4, 3, 280),
(1887, 9, 5, 3, 281),
(1888, 9, 6, 3, 282),
(1889, 9, 7, 3, 283),
(1890, 9, 8, 3, 284),
(1891, 9, 9, 3, 285),
(1892, 9, 10, 0, 286),
(1893, 9, 11, 0, 287),
(1894, 9, 12, 0, 288),
(1895, 9, 13, 0, 289),
(1896, 9, 14, 0, 290),
(1897, 9, 15, 3, 291),
(1898, 9, 16, 3, 292),
(1899, 9, 17, 3, 293),
(1900, 9, 18, 3, 294),
(1901, 9, 19, 3, 295),
(1902, 9, 20, 3, 296),
(1903, 9, 21, 3, 297),
(1904, 9, 22, 1, 298),
(1905, 9, 23, 3, 299),
(1906, 9, 24, 3, 300),
(1907, 9, 25, 3, 301),
(1908, 9, 26, 3, 302);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=150 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `auth_key`, `access_token`) VALUES
(1, 'admin', 'admin', 'Admin', '1', '1'),
(2, 'user1', 'user1', 'User 1', '2', '2'),
(3, 'user_9_1', 'bdefa7', 'user_9_1', '254633', '796a19847bd78eff1416e357a726fcdc'),
(4, 'user_9_2', '2c08bb', 'user_9_2', '526db2', '28aefc06f32635448e888beaad5e3a1f'),
(5, 'user_9_3', 'a8623b', 'user_9_3', 'ce4aa5', '6a439b10e41387c904abd6e3636baed1'),
(6, 'user_9_4', 'f05a2b', 'user_9_4', '9e15bd', 'f595d0793112026fa662751bc58e3657'),
(7, 'user_9_5', '3cd0f0', 'user_9_5', '60d6eb', 'b8368d163adf49204c90cb9c2eb54172'),
(8, 'user_9_6', '0be020', 'user_9_6', '3a8471', '65489415716989a83bf6cb738cbf59d1'),
(9, 'user_9_7', '690e11', 'user_9_7', 'eb97a5', '9497d5eb9710f7cb93762e5f04269079'),
(10, 'user_9_8', '24f9c0', 'user_9_8', 'd17f0c', '0d5515865219ae6e25dec99cb03f6179'),
(11, 'user_9_9', 'd58505', 'user_9_9', '2f7d11', '6ad7f0141b388deb1fe85f9d05af17c8'),
(12, 'user_9_10', 'b09489', 'user_9_10', '536d30', 'bc4e438b6c8230396237d63478c7b36d'),
(13, 'user_9_11', 'd97caf', 'user_9_11', '2fe728', '78194d89d1fb7d6f4001d7759788e3c4'),
(14, 'user_9_12', 'b71083', 'user_9_12', '7da192', '8fac32ed8459f8ab476fe50a295b1ecd'),
(15, 'user_9_13', '86994b', 'user_9_13', 'cbcf7f', '5e7182f9865521a25cf1fe00dab9166d'),
(16, 'user_9_14', '0f49d0', 'user_9_14', '6a350a', '650adfc5c679ab991c9336d0e7003aa8'),
(17, 'user_9_15', '91968b', 'user_9_15', 'c2ab3a', 'a3b0931b4e64b4ab41eb7d4cc044e7fb'),
(18, 'user_9_16', '11dee6', 'user_9_16', '21120a', 'f27d2945549a51e5398776ed37a91874'),
(19, 'user_9_17', 'ffbb84', 'user_9_17', '522227', '20a071352c0f3e452f36624a98b521a3'),
(20, 'user_9_18', '65d2f3', 'user_9_18', '2a4baf', '6b023d0b53ab751d2fc655c1cb6e7e7b'),
(21, 'user_9_19', 'e482b9', 'user_9_19', '2765c1', 'f8922ac2c7ca729d3a4bafdb21921329'),
(22, 'user_9_20', '868f28', 'user_9_20', '7a6705', 'f37004584c7dfddcf0105c39b7a62b0d'),
(23, 'user_9_21', '4bdfc9', 'user_9_21', '04e6c7', '1fda964648fdf55b9e26093fb7c11e15'),
(24, 'user_9_22', 'b286af', 'user_9_22', '347f60', 'e61f220e3d40350efded7999090bd5f2'),
(25, 'user_9_23', 'c23483', 'user_9_23', 'bca2fe', 'ac33aa6b4b68ec6f25e992ac33a348b4'),
(26, 'user_9_24', 'd41b94', 'user_9_24', '3fc086', '1e16f7f488ab4c40d0e5ae3f824622da'),
(27, 'user_9_25', 'ed339a', 'user_9_25', '11b203', '11a4823bcc3f999e67106d5e12ab8cea'),
(28, 'user_9_26', '598868', 'user_9_26', 'f73bb6', '8ab9ade11e6102d100963640ad8b3998'),
(29, 'user_9_27', '9de5b7', 'user_9_27', '86ca46', '7ff01533a79b1e76ae4beec92e80bcfd'),
(30, 'user_9_28', 'bb0a4c', 'user_9_28', '59055a', '510fb2320f7101c9debdab76c43d30d9'),
(31, 'user_9_29', '4f5505', 'user_9_29', '6fa93c', 'd7da85b008f5a694ef9eb9a9a0e66633'),
(32, 'user_9_30', 'ae839c', 'user_9_30', 'aec333', '9564c6f849a08db858bc74bbb3c10dfb'),
(33, 'user_9_31', 'fdcdf6', 'user_9_31', 'a70831', 'f676568226eecb2b328b3e4f6f22e16c'),
(34, 'user_9_32', '68085c', 'user_9_32', '3984a4', '4a29d84906659d820446dc7265472531'),
(35, 'user_9_33', '95bccd', 'user_9_33', '904556', '24304a6934c7a5aba23c785da1b5df10'),
(36, 'user_9_34', 'dad23c', 'user_9_34', '3e82f3', '699416fc4a7bb18724f5383dbaed84c3'),
(37, 'user_9_35', '1c6c3e', 'user_9_35', '93576f', '420246e306c897ab21c4135f8a118498'),
(38, 'user_9_36', '4f0481', 'user_9_36', '08b22d', 'b7eaaba02f5797e540957ad2d0d48490'),
(39, 'user_9_37', '6b018b', 'user_9_37', '4c5f33', '64ee6a721af4b4c4fae7de46a4ff4a48'),
(40, 'user_9_38', '35b23f', 'user_9_38', '14bd84', '5ba314cd93952e0bccd9f9f5360d1c04'),
(41, 'user_9_39', 'd28183', 'user_9_39', 'f333ec', '7147739eb9d53078383f4d7ceec4a655'),
(42, 'user_9_40', '2727e3', 'user_9_40', 'f577f0', '8cd1b2d6b8f327318d165c3c59980d56'),
(43, 'user_9_41', 'cea88b', 'user_9_41', '793f39', 'd29da0526df0d6850bd4d1329a75a767'),
(44, 'user_9_42', 'a2276d', 'user_9_42', '59be5b', '76be837ee6b854adbeec19823daed70f'),
(45, 'user_9_43', '57b54b', 'user_9_43', '99bdf2', '97c5d1925295c3594f33e20a08841fb5'),
(46, 'user_9_44', 'd75807', 'user_9_44', '7fd9e8', '9b327ab7529002ee9a517bcda070729f'),
(47, 'user_9_45', '03a804', 'user_9_45', '595e79', '14ae3892d1f8bbe89ddcddb6b2fc5fb7'),
(48, 'user_9_46', '37b311', 'user_9_46', 'c45ab3', 'f4d344757df78c97416e5b7b0fb8f610'),
(49, 'user_9_47', 'df9175', 'user_9_47', '569865', 'f09d38b76a097df91c052f1ec5cdba34'),
(50, 'user_9_48', '7b2425', 'user_9_48', 'fd9eba', '150964f5e3aaebb4f1cdaf58b99970c3'),
(51, 'user_9_49', '9d4f65', 'user_9_49', 'ec9828', '51494f0798ea6e6df70ccd9a2c3e2844'),
(52, 'user_10_1', '054388', 'user_10_1', '2ec5dd', '0083575819c4a2e6498cb534fd15cdda'),
(53, 'user_10_2', 'a02cb0', 'user_10_2', '4d8268', '92075320e40a301c5358810b9152a077'),
(54, 'user_10_3', '57a8b7', 'user_10_3', '5349cc', '58d36e81617e92c62dc17dcb5e2bbe7d'),
(55, 'user_10_4', '5440cc', 'user_10_4', 'd8fbe2', 'bbd87b7a46e6aeebab85c5743b851a72'),
(56, 'user_10_5', '9b773f', 'user_10_5', 'e33db5', 'ab5491ef6ae3a5def42b8c060a54f907'),
(57, 'user_10_6', '635b12', 'user_10_6', 'ecf11a', '5149437310dd082a811628d5f5e82967'),
(58, 'user_10_7', '842474', 'user_10_7', 'bd62c0', '38f63c2f5bb3165ef507ce961743bd2b'),
(59, 'user_10_8', 'c85ead', 'user_10_8', '25d278', '0d88425d499428df9b7c0a27cb203feb'),
(60, 'user_10_9', '42d4bd', 'user_10_9', '38b53c', '6cae0e7974fcd910bc57e89688b5a8a9'),
(61, 'user_10_10', 'db4a59', 'user_10_10', 'e57554', 'ce81b63487734b9581d8a5e5341d06a6'),
(62, 'user_10_11', 'cb86fe', 'user_10_11', '648fa5', '70184470b3ceae300ed426aaee52d7d6'),
(63, 'user_10_12', '359647', 'user_10_12', '33a0e5', '1cdd007343c9378bdc25d506d99ddbaf'),
(64, 'user_10_13', 'f81c74', 'user_10_13', 'cbab48', '84ec96099931237045f4f1a5d743e4a1'),
(65, 'user_10_14', 'bae9dc', 'user_10_14', 'edcc03', '547fc8e42cac7cc98ee96a34f6139914'),
(66, 'user_10_15', '420b92', 'user_10_15', 'dd48e5', 'f6ae3f9a4e882f03eb179647d72d4493'),
(67, 'user_10_16', '2f43f6', 'user_10_16', 'ed61c4', 'eac42a0bc8143c3bfa3c8698118686af'),
(68, 'user_10_17', '9ec031', 'user_10_17', '503c7e', 'f1119505c186af0eff57d96bbc23b86e'),
(69, 'user_10_18', 'e1119e', 'user_10_18', '88db92', '6480ab5db37df23693b6a308cabb7b21'),
(70, 'user_10_19', 'f6ca7e', 'user_10_19', 'c1a06a', 'a4ba24e3abcd6b5fd861fee818841fcd'),
(71, 'user_10_20', 'dc76cb', 'user_10_20', '122f72', '72cafdb564efc2195aa24b596c9c14f6'),
(72, 'user_10_21', 'f1bebf', 'user_10_21', '330771', '8718e533ee6e5d907d9e4500fd71ccb8'),
(73, 'user_10_22', '4374cf', 'user_10_22', '86f948', '552742e818c2ca7b9c19e7e629b55986'),
(74, 'user_10_23', '9ffd50', 'user_10_23', 'e88be4', '81a2d5ca2dce613d8109bfa5134966b5'),
(75, 'user_10_24', '01b008', 'user_10_24', 'daa9a7', 'dbe8afe87770a936c954be31dd7e01f7'),
(76, 'user_10_25', '79fda8', 'user_10_25', 'be3eaa', 'f51b9a2635af3cfbe89ece2fe7a1cb0e'),
(77, 'user_10_26', '55a7f0', 'user_10_26', '872d0b', '256846172f8a1c670d110b281b15d021'),
(78, 'user_10_27', '145b8e', 'user_10_27', 'b72107', '6d4e1c4ad5892fb192b87e50e48da0e2'),
(79, 'user_10_28', '805519', 'user_10_28', '58598b', '4773db360a775adea8f77e6142b1dce7'),
(80, 'user_10_29', '71b431', 'user_10_29', '43d6fd', 'f7f19f3d3a86406ce09352ad344a7d21'),
(81, 'user_10_30', 'b8041a', 'user_10_30', 'b832b4', 'cd2532eddb9f5b4b0192eecc3f443433'),
(82, 'user_10_31', '0232f0', 'user_10_31', '82c856', 'da99ccdf9f2a4cbb62d89862dc38d60c'),
(83, 'user_10_32', '47c31e', 'user_10_32', 'b88f1b', 'b959bc2f88359aa69c4b03ecfb4f7c23'),
(84, 'user_10_33', '05c5eb', 'user_10_33', 'c456d7', '2027aa55c8fcf7f3b78f4da82106a4c7'),
(85, 'user_10_34', 'ccebf2', 'user_10_34', 'fbddeb', 'fc2fc5344e959a30f097659de3480044'),
(86, 'user_10_35', '5ce2bb', 'user_10_35', 'c5576d', 'beebc14bc13d741fa67c9ae32fe6375b'),
(87, 'user_10_36', '963170', 'user_10_36', '7eb0b2', '659982a422266041fa3aeae8fce43d8e'),
(88, 'user_10_37', '5cfab2', 'user_10_37', 'b6e171', 'fb36409fd666a89c87de76403e536f12'),
(89, 'user_10_38', 'bdffc7', 'user_10_38', '4dbc61', '3542acd592b4cbeccdd9e2cdb028bfe5'),
(90, 'user_10_39', '63cbf0', 'user_10_39', '410a8b', '556ef58a4ceba89aeffd4e6e7cd4213c'),
(91, 'user_10_40', '68097e', 'user_10_40', '3c725d', 'b172940c150decc236909e4c267dee0a'),
(92, 'user_10_41', 'e10720', 'user_10_41', '564bc8', '9a95ce29ccf0034a613f79d5f1cf6bea'),
(93, 'user_10_42', '685861', 'user_10_42', '24a5c3', '2fb6646d8629413223f499d01a88ef23'),
(94, 'user_10_43', '186223', 'user_10_43', '84b965', '0b9e782ad1ec3d0bf8d98685efa6bfbe'),
(95, 'user_10_44', '28219c', 'user_10_44', '7b798b', '75abc07d8fdcf45537eaa3c8857f48e2'),
(96, 'user_10_45', '08007e', 'user_10_45', '56c3fe', '4384797d64f218883510899a23235f37'),
(97, 'user_10_46', '7fa38b', 'user_10_46', 'e36ef6', 'd47d94ae6c68d951bdcafca5cf9f383b'),
(98, 'user_10_47', '991c90', 'user_10_47', 'a56d02', '71af585772f493a4c4fcd1a68bb4f9c5'),
(99, 'user_10_48', 'c2ffa4', 'user_10_48', '21e8b5', '962adb9552b99487b8ec5b014c7394dc'),
(100, 'user_10_49', 'b8f6dc', 'user_10_49', 'c18b5e', '4ff5e72d05c8bfa6e17900eb6aa4d1c5'),
(101, 'user_11_1', '2e4287', 'user_11_1', '6fc711', '6f1d75ba9072f876c9088e702c4771b4'),
(102, 'user_11_2', '914179', 'user_11_2', 'd418b2', '52f3b91ccaad9f0a2fd78dd4860f9d0d'),
(103, 'user_11_3', 'cff6d3', 'user_11_3', '5b3fc1', '8d52e09c9d90ae200c496c40a76ab08b'),
(104, 'user_11_4', '53817a', 'user_11_4', 'fc7dbd', '265886d0fd87d93e8597f3bc71fb7488'),
(105, 'user_11_5', '1d9cf7', 'user_11_5', '70f28b', '7e78c41ee52876ef019daed8a3815c17'),
(106, 'user_11_6', '5f34c0', 'user_11_6', '2f11f4', '35a90b0f8fcb9e49651eae4b952ed7c8'),
(107, 'user_11_7', '77b8c1', 'user_11_7', '98ee65', 'ee56822b1ffad273068b453519f8932c'),
(108, 'user_11_8', '4c9b94', 'user_11_8', '417cfc', '638a60d9da3a67f3fe9322efe30e00a4'),
(109, 'user_11_9', '891aac', 'user_11_9', '451045', '707f1d383fd1f580bb71e33284220f5b'),
(110, 'user_11_10', '32c0a0', 'user_11_10', '30009c', '5f993a642e18e8dd4e359e4b10044112'),
(111, 'user_11_11', '7f0d64', 'user_11_11', '4ce8aa', 'f410c001bd4d0fe04155db4cb96a3535'),
(112, 'user_11_12', 'cdf7eb', 'user_11_12', 'beb520', 'ecbaefebb8372ec912686539dd897bb4'),
(113, 'user_11_13', '3314fb', 'user_11_13', '22ec08', 'a4618227037f159d7bdf62127d4301d6'),
(114, 'user_11_14', '7bd3c5', 'user_11_14', 'd1d361', '0773f5aad10ca6d3b0a7d378eebfc6b2'),
(115, 'user_11_15', '289a07', 'user_11_15', '8c607d', 'd6d940e58f5da7ff695a690937e882d7'),
(116, 'user_11_16', '9f1102', 'user_11_16', '538242', 'a8897e75883801d7f37ba534f2af0592'),
(117, 'user_11_17', 'e5185c', 'user_11_17', '76b066', 'd1b0bb46e61fcc396c7bb03c8477e742'),
(118, 'user_11_18', 'bf27f2', 'user_11_18', 'a23b95', '6ccecc153515994395e8984cfdfd2b37'),
(119, 'user_11_19', 'af9381', 'user_11_19', 'd4e8a3', 'd32b69350d72ca7598b3fbeab7a038cf'),
(120, 'user_11_20', '706df7', 'user_11_20', 'fe39be', '99e5e5f3baa322abdb613c495a662006'),
(121, 'user_11_21', '3262e0', 'user_11_21', '8016ac', '5fa1751eb1f5e7f4ba8f889f7be0b7e6'),
(122, 'user_11_22', '924a44', 'user_11_22', '7cafb3', 'cb87bc662c570476189facc4b1be23f5'),
(123, 'user_11_23', 'f47f26', 'user_11_23', '8347e5', 'bb7fa830a861766a745dc0adef1462cc'),
(124, 'user_11_24', 'fbf247', 'user_11_24', '385428', '599d32475191e11eb5c7245ba5e0c762'),
(125, 'user_11_25', 'af668a', 'user_11_25', '5efdb9', '0d3f4981d5c1ecf649d54b4244b19e74'),
(126, 'user_11_26', 'f25e4d', 'user_11_26', '184772', '62f23a902b2682bd90f0520e8460c9fc'),
(127, 'user_11_27', 'a26541', 'user_11_27', 'ec3180', '5b78b13521b0d37d7248b7bb5c6d0c88'),
(128, 'user_11_28', '8f445a', 'user_11_28', 'b8f975', '07cc18748a185364a3a7e12de0948337'),
(129, 'user_11_29', 'b0414b', 'user_11_29', '28bb41', '374ae699bd50065edc16b7471f618993'),
(130, 'user_11_30', 'b8339a', 'user_11_30', 'b66d1f', '6b65695ef6ac8ce94cc922eec13fdbcc'),
(131, 'user_11_31', '79ae3b', 'user_11_31', '827c6f', 'd367ef156db51200dd4c761cdff40783'),
(132, 'user_11_32', 'f93347', 'user_11_32', 'cdafb7', 'd46e114f54fb5949cf748def3b67f1a1'),
(133, 'user_11_33', 'f70aee', 'user_11_33', 'd40909', '41a1ac176d179ab17d8a3236bab216e0'),
(134, 'user_11_34', '321f5b', 'user_11_34', '57a160', 'b9799addf2b72370d0c3feb52ecf43e6'),
(135, 'user_11_35', '93a386', 'user_11_35', '8a1a04', 'f2dcc21181347520bd139246a5e71dda'),
(136, 'user_11_36', 'a87011', 'user_11_36', 'f5674d', '69a768b3491ff997303800f9a1ad7de8'),
(137, 'user_11_37', 'de48a3', 'user_11_37', 'fc074b', '5870b3498198eae4b2a08d65f0cdfb39'),
(138, 'user_11_38', '402dee', 'user_11_38', '5b4272', '529ac435e22bf5d7dd7329b289e2eb7e'),
(139, 'user_11_39', '5da2f3', 'user_11_39', 'c62336', '12841efc2689ae1e0e365bcf6b0d63d7'),
(140, 'user_11_40', '1cb52b', 'user_11_40', 'a72525', '4d4d4817c2d76323d05b75f6182a570d'),
(141, 'user_11_41', '3323c5', 'user_11_41', '281671', '5f0a6406aa3b7beb744d7600f764c4fd'),
(142, 'user_11_42', '7c3a37', 'user_11_42', 'b44a99', '990aa360aef93b17a815ae2dce9730d9'),
(143, 'user_11_43', '85f144', 'user_11_43', '8f1ca2', '9b03bc55146cd3267d399ff4a87ecf2e'),
(144, 'user_11_44', 'd41b46', 'user_11_44', '01a900', '4c56dd3368b53a626a722fc37762c75f'),
(145, 'user_11_45', 'b3cbd3', 'user_11_45', 'f1d74f', 'd18763b79141ec10d8ea7c933c3f73d2'),
(146, 'user_11_46', 'b4a96b', 'user_11_46', 'f1a8f1', 'faaafe42af8a93eebdf63b91ddc67060'),
(147, 'user_11_47', 'e7884a', 'user_11_47', 'a90ba0', '2bf7902d368d29894b8cff76389c4ba3'),
(148, 'user_11_48', 'b4aac5', 'user_11_48', '7916c4', '8a2ccc0cb7cc19c32645425d5ee19432'),
(149, 'user_11_49', '7ac492', 'user_11_49', '71f1bf', '5f4eecfd5aac80554c2d08d8cd001286');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `checkergroups`
--
ALTER TABLE `checkergroups`
  ADD CONSTRAINT `checkergroups_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `checkertests`
--
ALTER TABLE `checkertests`
  ADD CONSTRAINT `checkertests_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `checkergroups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `solutions`
--
ALTER TABLE `solutions`
  ADD CONSTRAINT `lid` FOREIGN KEY (`lid`) REFERENCES `langs` (`id`),
  ADD CONSTRAINT `solutions_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solutions_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `contests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `cid` FOREIGN KEY (`cid`) REFERENCES `checkertests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `solutions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
