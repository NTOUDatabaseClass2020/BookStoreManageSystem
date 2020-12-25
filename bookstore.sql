-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-25 08:29:09
-- 伺服器版本： 10.4.16-MariaDB
-- PHP 版本： 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bookstore`
--

-- --------------------------------------------------------

--
-- 資料表結構 `books`
--

CREATE TABLE `books` (
  `id` bigint(15) NOT NULL,
  `bookstore_id` bigint(15) NOT NULL,
  `price` int(225) NOT NULL,
  `amount` int(225) NOT NULL,
  `book_name` varchar(225) NOT NULL,
  `description` text DEFAULT NULL,
  `type` int(225) NOT NULL,
  `img_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `books`
--

INSERT INTO `books` (`id`, `bookstore_id`, `price`, `amount`, `book_name`, `description`, `type`, `img_url`) VALUES
(88, 2, 55, 999, '我好了', '', 5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJchPwuz6CVm1Lkwf-THohT0gS0XgS1KvejA&usqp=CAU'),
(111, 1, 666, 666, '我好了', 'asdfghjkl', 2, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAACIlBMVEX///+/v78AAH8AAADe3t7i4uLt7e3CwsI5OTn29vbGxsK8vLzU1NIAAHw+Pot7e6CRkZFkZGQwMDCysrLOzs6hoaFeXl6YmJg+Pj7n5+crKyulpaXIyMjy8vKrq6t+fn52dnaJiYmAgIBRUVEAAEJZWZ1ubm5HR0dYWFhFRUUtLS2AgKROTk4cHBwAAGkQEBDT0+IwMIoAAHJ1dX90dKlpaaQoKIdTU5nAwNaUlKNgYJ+1tc+FhZWQkJ8YGBgiIiJ/fsfNzf///9ejo613d6IAOc8ATZcATbsAQMhkbU0AAKBGZKYYMbQODoIAAIycwXVBSQAAT6fDwFEmRQAAUclDTa6zsVkvLUfd3LiVkwva2Wny8v/p5pOzsXHJyQCMjLdZV67t7bA+O3TLyWwAQ2LNzE85PU3A1CkAABVfXzGtsjy+vqB4eDoAF24AFZyXtzEAAFGZmV4AACqensGIiD0AAEgbG1d5eQC5uYJVVQBAQA3DwwyOoWQAAFyNjXEAADioqNotLZiddZ5+un1QoolFkpbtcmDuTlLciYl9alxkT4Z7j86OrOBgeP7E2fne3sXQo6f/0wD/u7S61tK8vP+zlX17YGJJe3uJi8SNrPGjxvRhbYTs2/equq6rzKZ7e+fQ0oH//0WqOTS82cDIlaxZWYVkh5R6jciYQXB1Rmzm5lM7O2Z1n5qfnu9dXciXOlicmfFUU9b5+bs0NHeSflCdjH4SdTDrAAAcOElEQVR4nO19i2Mkx1lntfpR06qWXT3Vj2l19XPsVksZRdrVeldarVeOx5DwMHCAwzp+bGyDAS+PhD2S+CAmAe6AYMcHlxDD2gkJt5hLcELg+P/4qrrnoRmNNLMrabXK/HbV0139VXXVr7/66vuqumeQbswxHQIPGZo1x1TATWRY3UcFnnl0jkPRZQ0g69GFn/rpT37qZ372k5/8uZ'),
(113, 1, 666, 666, '憶起打Code', 'dfghjk', 4, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAACIlBMVEX///+/v78AAH8AAADe3t7i4uLt7e3CwsI5OTn29vbGxsK8vLzU1NIAAHw+Pot7e6CRkZFkZGQwMDCysrLOzs6hoaFeXl6YmJg+Pj7n5+crKyulpaXIyMjy8vKrq6t+fn52dnaJiYmAgIBRUVEAAEJZWZ1ubm5HR0dYWFhFRUUtLS2AgKROTk4cHBwAAGkQEBDT0+IwMIoAAHJ1dX90dKlpaaQoKIdTU5nAwNaUlKNgYJ+1tc+FhZWQkJ8YGBgiIiJ/fsfNzf///9ejo613d6IAOc8ATZcATbsAQMhkbU0AAKBGZKYYMbQODoIAAIycwXVBSQAAT6fDwFEmRQAAUclDTa6zsVkvLUfd3LiVkwva2Wny8v/p5pOzsXHJyQCMjLdZV67t7bA+O3TLyWwAQ2LNzE85PU3A1CkAABVfXzGtsjy+vqB4eDoAF24AFZyXtzEAAFGZmV4AACqensGIiD0AAEgbG1d5eQC5uYJVVQBAQA3DwwyOoWQAAFyNjXEAADioqNotLZiddZ5+un1QoolFkpbtcmDuTlLciYl9alxkT4Z7j86OrOBgeP7E2fne3sXQo6f/0wD/u7S61tK8vP+zlX17YGJJe3uJi8SNrPGjxvRhbYTs2/equq6rzKZ7e+fQ0oH//0WqOTS82cDIlaxZWYVkh5R6jciYQXB1Rmzm5lM7O2Z1n5qfnu9dXciXOlicmfFUU9b5+bs0NHeSflCdjH4SdTDrAAAcOElEQVR4nO19i2Mkx1lntfpR06qWXT3Vj2l19XPsVksZRdrVeldarVeOx5DwMHCAwzp+bGyDAS+PhD2S+CAmAe6AYMcHlxDD2gkJt5hLcELg+P/4qrrnoRmNNLMrabXK/HbV0139VXXVr7/66vuqumeQbswxHQIPGZo1x1TATWRY3UcFnnl0jkPRZQ0g69GFn/rpT37qZ372k5/8uZ'),
(114, 1, 666, 666, 'tt', 'dfghjk', 2, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAACIlBMVEX///+/v78AAH8AAADe3t7i4uLt7e3CwsI5OTn29vbGxsK8vLzU1NIAAHw+Pot7e6CRkZFkZGQwMDCysrLOzs6hoaFeXl6YmJg+Pj7n5+crKyulpaXIyMjy8vKrq6t+fn52dnaJiYmAgIBRUVEAAEJZWZ1ubm5HR0dYWFhFRUUtLS2AgKROTk4cHBwAAGkQEBDT0+IwMIoAAHJ1dX90dKlpaaQoKIdTU5nAwNaUlKNgYJ+1tc+FhZWQkJ8YGBgiIiJ/fsfNzf///9ejo613d6IAOc8ATZcATbsAQMhkbU0AAKBGZKYYMbQODoIAAIycwXVBSQAAT6fDwFEmRQAAUclDTa6zsVkvLUfd3LiVkwva2Wny8v/p5pOzsXHJyQCMjLdZV67t7bA+O3TLyWwAQ2LNzE85PU3A1CkAABVfXzGtsjy+vqB4eDoAF24AFZyXtzEAAFGZmV4AACqensGIiD0AAEgbG1d5eQC5uYJVVQBAQA3DwwyOoWQAAFyNjXEAADioqNotLZiddZ5+un1QoolFkpbtcmDuTlLciYl9alxkT4Z7j86OrOBgeP7E2fne3sXQo6f/0wD/u7S61tK8vP+zlX17YGJJe3uJi8SNrPGjxvRhbYTs2/equq6rzKZ7e+fQ0oH//0WqOTS82cDIlaxZWYVkh5R6jciYQXB1Rmzm5lM7O2Z1n5qfnu9dXciXOlicmfFUU9b5+bs0NHeSflCdjH4SdTDrAAAcOElEQVR4nO19i2Mkx1lntfpR06qWXT3Vj2l19XPsVksZRdrVeldarVeOx5DwMHCAwzp+bGyDAS+PhD2S+CAmAe6AYMcHlxDD2gkJt5hLcELg+P/4qrrnoRmNNLMrabXK/HbV0139VXXVr7/66vuqumeQbswxHQIPGZo1x1TATWRY3UcFnnl0jkPRZQ0g69GFn/rpT37qZ372k5/8uZ'),
(116, 1, 1, 1, 'ㄐㄐ冒險旅程', '1', 1, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAACIlBMVEX///+/v78AAH8AAADe3t7i4uLt7e3CwsI5OTn29vbGxsK8vLzU1NIAAHw+Pot7e6CRkZFkZGQwMDCysrLOzs6hoaFeXl6YmJg+Pj7n5+crKyulpaXIyMjy8vKrq6t+fn52dnaJiYmAgIBRUVEAAEJZWZ1ubm5HR0dYWFhFRUUtLS2AgKROTk4cHBwAAGkQEBDT0+IwMIoAAHJ1dX90dKlpaaQoKIdTU5nAwNaUlKNgYJ+1tc+FhZWQkJ8YGBgiIiJ/fsfNzf///9ejo613d6IAOc8ATZcATbsAQMhkbU0AAKBGZKYYMbQODoIAAIycwXVBSQAAT6fDwFEmRQAAUclDTa6zsVkvLUfd3LiVkwva2Wny8v/p5pOzsXHJyQCMjLdZV67t7bA+O3TLyWwAQ2LNzE85PU3A1CkAABVfXzGtsjy+vqB4eDoAF24AFZyXtzEAAFGZmV4AACqensGIiD0AAEgbG1d5eQC5uYJVVQBAQA3DwwyOoWQAAFyNjXEAADioqNotLZiddZ5+un1QoolFkpbtcmDuTlLciYl9alxkT4Z7j86OrOBgeP7E2fne3sXQo6f/0wD/u7S61tK8vP+zlX17YGJJe3uJi8SNrPGjxvRhbYTs2/equq6rzKZ7e+fQ0oH//0WqOTS82cDIlaxZWYVkh5R6jciYQXB1Rmzm5lM7O2Z1n5qfnu9dXciXOlicmfFUU9b5+bs0NHeSflCdjH4SdTDrAAAcOElEQVR4nO19i2Mkx1lntfpR06qWXT3Vj2l19XPsVksZRdrVeldarVeOx5DwMHCAwzp+bGyDAS+PhD2S+CAmAe6AYMcHlxDD2gkJt5hLcELg+P/4qrrnoRmNNLMrabXK/HbV0139VXXVr7/66vuqumeQbswxHQIPGZo1x1TATWRY3UcFnnl0jkPRZQ0g69GFn/rpT37qZ372k5/8uZ');

-- --------------------------------------------------------

--
-- 資料表結構 `bookstores`
--

CREATE TABLE `bookstores` (
  `id` bigint(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `business_hour` varchar(255) NOT NULL,
  `img_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `bookstores`
--

INSERT INTO `bookstores` (`id`, `name`, `address`, `phone`, `business_hour`, `img_url`) VALUES
(1, 'ㄐㄐ', '天國', '090000000', '24hr', NULL),
(2, 'ㄑㄑ', '不知道', '7777777777', '24hr', NULL),
(3, '', '', '', '', ''),
(4, 'Jeff', '無', '034811486', '無', ''),
(5, 'fuck', '無', '034811486', '無', ''),
(6, 'Je', '無', '034811486', '無', ''),
(7, '我', '大橋下', '00000000', '24HRS', ''),
(8, 'Jeff', '無', '034811486', '無', ''),
(9, '', '', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `booktype_list`
--

CREATE TABLE `booktype_list` (
  `id` int(11) NOT NULL,
  `type` int(225) NOT NULL,
  `type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `booktype_list`
--

INSERT INTO `booktype_list` (`id`, `type`, `type_name`) VALUES
(1, 1, '驚悚'),
(2, 5, '冒險'),
(3, 2, '愛情'),
(4, 3, '科技'),
(5, 4, '宗教');

-- --------------------------------------------------------

--
-- 資料表結構 `employees`
--

CREATE TABLE `employees` (
  `id` bigint(15) NOT NULL,
  `bookstore_id` bigint(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `role` bigint(20) NOT NULL,
  `img_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`,`bookstore_id`,`book_name`),
  ADD UNIQUE KEY ` tt` (`bookstore_id`,`book_name`),
  ADD KEY `id` (`id`);

--
-- 資料表索引 `bookstores`
--
ALTER TABLE `bookstores`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `booktype_list`
--
ALTER TABLE `booktype_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookstore_id` (`bookstore_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bookstores`
--
ALTER TABLE `bookstores`
  MODIFY `id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `booktype_list`
--
ALTER TABLE `booktype_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(15) NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`bookstore_id`) REFERENCES `bookstores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`bookstore_id`) REFERENCES `bookstores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
