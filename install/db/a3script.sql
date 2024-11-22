-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 05:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_a3db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_email` varchar(72) NOT NULL,
  `admin_pass` varchar(72) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'admin',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 - inactive\r\n1 - active',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_date` timestamp NULL DEFAULT NULL,
  `login_token` varchar(32) DEFAULT NULL,
  `login_ip` varchar(64) DEFAULT NULL,
  `login_country` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_key`
--

CREATE TABLE `api_key` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(32) NOT NULL,
  `merchant` varchar(32) DEFAULT NULL,
  `api_key` varchar(350) DEFAULT NULL,
  `pub_key` varchar(72) DEFAULT NULL,
  `pri_key` varchar(72) DEFAULT NULL,
  `dep_action` tinyint(1) NOT NULL DEFAULT 0,
  `wid_action` tinyint(1) NOT NULL DEFAULT 0,
  `instant_action` tinyint(1) NOT NULL DEFAULT 0,
  `min_deposit` float NOT NULL DEFAULT 0,
  `min_withdraw` float NOT NULL DEFAULT 0,
  `max_withdraw` float NOT NULL DEFAULT 0,
  `max_withdraw_instant` float NOT NULL DEFAULT 0,
  `link` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `api_key`
--

INSERT INTO `api_key` (`id`, `type`, `merchant`, `api_key`, `pub_key`, `pri_key`, `dep_action`, `wid_action`, `instant_action`, `min_deposit`, `min_withdraw`, `max_withdraw`, `max_withdraw_instant`, `link`) VALUES
(1, 'faucetpay', '', '', '', '', 1, 1, 1, 0.1, 0.001, 1, 1, 'https://faucetpay.io/?r=184175');

-- --------------------------------------------------------

--
-- Table structure for table `baltopb_history`
--

CREATE TABLE `baltopb_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banned_email`
--

CREATE TABLE `banned_email` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banned_email`
--

INSERT INTO `banned_email` (`id`, `email`, `status`) VALUES
(1, 'example.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(20) NOT NULL,
  `site_key` varchar(300) NOT NULL,
  `secret_key` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`id`, `type`, `site_key`, `secret_key`, `status`) VALUES
(1, 'recap', '', '', 0),
(2, 'turnstile', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coin_type`
--

CREATE TABLE `coin_type` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `coin` varchar(10) NOT NULL,
  `value` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coin_type`
--

INSERT INTO `coin_type` (`id`, `coin`, `value`, `status`) VALUES
(1, 'btc', 67080.9, 1),
(2, 'eth', 3365.27, 0),
(3, 'doge', 0.19227, 0),
(4, 'ltc', 95.46, 0),
(5, 'bch', 613.555, 0),
(6, 'dash', 36.45, 0),
(7, 'dgb', 1, 0),
(8, 'trx', 0.118951, 0),
(9, 'usdt', 1.00085, 0),
(10, 'fey', 0, 0),
(11, 'zec', 27.935, 0),
(12, 'bnb', 561.406, 0),
(13, 'sol', 185.99, 0),
(14, 'xrp', 0.60045, 0),
(15, 'matic', 0.92035, 0),
(16, 'ada', 0.6007, 0),
(17, 'usd', 1, 0),
(18, 'eur', 1.07354, 0),
(19, 'gbp', 1.25473, 0),
(20, 'rub', 0.0108501, 0),
(21, 'lkr', 0.00333133, 0),
(22, 'ton', 0, 0),
(23, 'point', 0, 0),
(24, 'coins', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposit_history`
--

CREATE TABLE `deposit_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `method` varchar(32) DEFAULT 'dep',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - pending\r\n1 - paid\r\n2 - pending admin approval\r\n3 - rejected\r\n4 - cancelled',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tx_id` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faucet_history`
--

CREATE TABLE `faucet_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref_uname` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_tok`
--

CREATE TABLE `log_tok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `log_token` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `country_code` varchar(5) DEFAULT NULL,
  `login_ip` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) UNSIGNED NOT NULL,
  `host` varchar(60) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `sender` varchar(64) NOT NULL,
  `sender_name` varchar(60) NOT NULL,
  `port` smallint(6) NOT NULL,
  `secure` varchar(5) NOT NULL,
  `is_smtp` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `host`, `uname`, `pass`, `sender`, `sender_name`, `port`, `secure`, `is_smtp`, `status`) VALUES
(1, 'mail.privateemail.com', 'noreply@yourdomain.com', '12345', 'noreply@yourdomain.com', 'a3script', 587, 'tls', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `offerwall_action`
--

CREATE TABLE `offerwall_action` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `offerwall_name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `api_key` varchar(200) DEFAULT NULL,
  `pub_id` varchar(100) DEFAULT NULL,
  `secret_key` varchar(200) DEFAULT NULL,
  `app_id` varchar(100) DEFAULT NULL,
  `total_tasks` bigint(20) NOT NULL DEFAULT 0,
  `total_earned` float NOT NULL DEFAULT 0,
  `total_earned_ref` float NOT NULL DEFAULT 0,
  `link` varchar(100) DEFAULT NULL,
  `ip_whitelist` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offerwall_history`
--

CREATE TABLE `offerwall_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `offerwall` varchar(50) NOT NULL,
  `offer_name` varchar(50) NOT NULL,
  `reward` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - pending\r\n1 - paid\r\n2 - pending approval\r\n3 - rejected\r\n4 - cancelled',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref_uname` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_currency`
--

CREATE TABLE `payments_currency` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `currency` varchar(10) NOT NULL,
  `method` varchar(32) NOT NULL,
  `rate` float NOT NULL DEFAULT 0,
  `dep_status` tinyint(1) NOT NULL DEFAULT 0,
  `wid_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments_currency`
--

INSERT INTO `payments_currency` (`id`, `currency`, `method`, `rate`, `dep_status`, `wid_status`) VALUES
(1, 'usdt', 'faucetpay', 1.00085, 0, 0),
(2, 'btc', 'faucetpay', 67080.9, 0, 0),
(3, 'eth', 'faucetpay', 3365.27, 0, 0),
(4, 'doge', 'faucetpay', 0.19227, 0, 0),
(5, 'ltc', 'faucetpay', 95.46, 0, 0),
(6, 'bch', 'faucetpay', 613.555, 0, 0),
(7, 'dash', 'faucetpay', 36.45, 0, 0),
(8, 'dgb', 'faucetpay', 0.0177197, 0, 0),
(9, 'trx', 'faucetpay', 0.118951, 0, 0),
(10, 'fey', 'faucetpay', 0, 0, 0),
(11, 'zec', 'faucetpay', 27.935, 0, 0),
(12, 'bnb', 'faucetpay', 561.406, 0, 0),
(13, 'sol', 'faucetpay', 185.99, 0, 0),
(14, 'xrp', 'faucetpay', 0.60045, 0, 0),
(15, 'matic', 'faucetpay', 0.92035, 0, 0),
(16, 'ada', 'faucetpay', 0.6007, 0, 0),
(17, 'ton', 'faucetpay', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `action` tinyint(1) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `action`, `date`) VALUES
(1, 'faucetpay', 1, '2024-04-05 09:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` tinyint(11) UNSIGNED NOT NULL,
  `faucet` float NOT NULL DEFAULT 0,
  `surf` float NOT NULL DEFAULT 0,
  `shortlinks` float NOT NULL DEFAULT 0,
  `offerwall` float NOT NULL DEFAULT 0,
  `ref_buysell` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `faucet`, `surf`, `shortlinks`, `offerwall`, `ref_buysell`) VALUES
(1, 0.0001, 0.0001, 0.0001, 0.0001, 0.0001);

-- --------------------------------------------------------

--
-- Table structure for table `ref`
--

CREATE TABLE `ref` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_uname` varchar(32) NOT NULL,
  `uname` int(11) NOT NULL,
  `faucet_amount` float NOT NULL DEFAULT 0,
  `surf_amount` float NOT NULL DEFAULT 0,
  `shortlinks_amount` float NOT NULL DEFAULT 0,
  `offerwall_amount` float NOT NULL DEFAULT 0,
  `buysell_amount` float NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `buysell_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - no buysell\r\n1 - on buysell\r\n2 - on buying or selling',
  `buysell_price` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_buysell_history`
--

CREATE TABLE `ref_buysell_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref_id` int(11) NOT NULL,
  `seller` varchar(30) NOT NULL,
  `buyer` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - pending payment\r\n1 - approved\r\n2 - pending admin approval\r\n3 - rejected\r\n4 - cancelled',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tx_id` varchar(100) DEFAULT NULL,
  `ref_email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reset_pass`
--

CREATE TABLE `reset_pass` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `token` varchar(32) NOT NULL,
  `type` varchar(1) NOT NULL DEFAULT 'u' COMMENT 'u - user\r\na -admin',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shortlinks`
--

CREATE TABLE `shortlinks` (
  `id` int(11) UNSIGNED NOT NULL,
  `pay_amount` float NOT NULL DEFAULT 0,
  `usd_amount` float NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `view_limit` smallint(11) NOT NULL DEFAULT 1,
  `link` varchar(100) DEFAULT NULL,
  `shortlinks` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - inactive\r\n1 - active',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref_shortlinks` varchar(250) DEFAULT NULL,
  `site_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shortlinks_history`
--

CREATE TABLE `shortlinks_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `link` varchar(250) NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref_uname` varchar(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `id` int(6) UNSIGNED NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '1',
  `site_name` varchar(32) NOT NULL DEFAULT 'a3script',
  `site_url` varchar(64) NOT NULL DEFAULT 'example.com',
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `author` varchar(32) NOT NULL DEFAULT 'a3script',
  `maintenance_action` tinyint(1) NOT NULL DEFAULT 0,
  `page_limit` smallint(6) NOT NULL DEFAULT 20,
  `logo_action` tinyint(1) NOT NULL DEFAULT 0,
  `truncate_currency` tinyint(4) NOT NULL DEFAULT 8,
  `remember_me_action` tinyint(1) NOT NULL DEFAULT 0,
  `remember_me_period` tinyint(1) NOT NULL DEFAULT 0,
  `rest_pass_token_valid_period` smallint(6) NOT NULL DEFAULT 5,
  `user_auto_ban_action` tinyint(1) NOT NULL DEFAULT 0,
  `captcha_action` tinyint(1) NOT NULL DEFAULT 0,
  `deposit_total` float NOT NULL DEFAULT 0,
  `withdraw_total` float NOT NULL DEFAULT 0,
  `faucet_action` tinyint(1) NOT NULL DEFAULT 0,
  `faucet_amount` float NOT NULL DEFAULT 0,
  `faucet_amount_usd` float NOT NULL DEFAULT 0,
  `faucet_ref_commission` float NOT NULL DEFAULT 0,
  `faucet_timer` mediumint(9) NOT NULL DEFAULT 1,
  `total_tasks_faucet` int(11) NOT NULL DEFAULT 0,
  `total_faucet_amount` float NOT NULL DEFAULT 0,
  `total_faucet_ref_amount` float NOT NULL DEFAULT 0,
  `surf_action` tinyint(1) NOT NULL DEFAULT 0,
  `surf_base_price` float NOT NULL DEFAULT 0,
  `surf_price_per_second` float NOT NULL DEFAULT 0,
  `surf_base_price_usd` float NOT NULL DEFAULT 0,
  `surf_price_per_second_usd` float NOT NULL DEFAULT 0,
  `surf_min_duration` smallint(6) NOT NULL DEFAULT 5,
  `surf_max_duration` smallint(6) NOT NULL DEFAULT 120,
  `surf_min_deposit` float NOT NULL DEFAULT 0,
  `total_tasks_surf` int(11) NOT NULL DEFAULT 0,
  `surf_commission` float NOT NULL DEFAULT 0,
  `surf_ref_commission` float NOT NULL DEFAULT 0,
  `surf_min_bal` float NOT NULL DEFAULT 0,
  `total_surf_amount` float NOT NULL DEFAULT 0,
  `total_surf_ref_amount` float NOT NULL DEFAULT 0,
  `shortlinks_action` tinyint(1) NOT NULL DEFAULT 0,
  `shortlinks_ref_commission` float NOT NULL DEFAULT 0,
  `total_tasks_shortlinks` int(11) NOT NULL DEFAULT 0,
  `total_shortlinks_amount` float NOT NULL DEFAULT 0,
  `total_shortlinks_ref_amount` float NOT NULL DEFAULT 0,
  `offerwall_action` tinyint(1) NOT NULL DEFAULT 0,
  `offerwall_commission` float NOT NULL DEFAULT 0,
  `offerwall_ref_commission` float NOT NULL DEFAULT 0,
  `total_tasks_offerwall` int(11) NOT NULL DEFAULT 0,
  `total_offerwall_amount` float NOT NULL DEFAULT 0,
  `total_offerwall_ref_amount` float NOT NULL DEFAULT 0,
  `ref_market_action` tinyint(1) NOT NULL DEFAULT 0,
  `ref_market_ref_commission_action` tinyint(1) NOT NULL DEFAULT 0,
  `ref_market_commission` float NOT NULL DEFAULT 0,
  `ref_market_ref_commission` float NOT NULL DEFAULT 0,
  `ref_buysell_time_required` int(11) NOT NULL DEFAULT 0 COMMENT 'days',
  `total_buysell_amount` float NOT NULL DEFAULT 0,
  `total_buysell_ref_amount` float NOT NULL DEFAULT 0,
  `baltopb_action` tinyint(1) NOT NULL DEFAULT 0,
  `min_baltopb_deposit` float NOT NULL DEFAULT 0,
  `withdraw_required_payments` smallint(6) NOT NULL DEFAULT 0,
  `cookie_register_detect_action` tinyint(1) NOT NULL DEFAULT 0,
  `country_code_check_action` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`id`, `version`, `site_name`, `site_url`, `description`, `keywords`, `author`, `maintenance_action`, `page_limit`, `logo_action`, `truncate_currency`, `remember_me_action`, `remember_me_period`, `rest_pass_token_valid_period`, `user_auto_ban_action`, `captcha_action`, `deposit_total`, `withdraw_total`, `faucet_action`, `faucet_amount`, `faucet_amount_usd`, `faucet_ref_commission`, `faucet_timer`, `total_tasks_faucet`, `total_faucet_amount`, `total_faucet_ref_amount`, `surf_action`, `surf_base_price`, `surf_price_per_second`, `surf_base_price_usd`, `surf_price_per_second_usd`, `surf_min_duration`, `surf_max_duration`, `surf_min_deposit`, `total_tasks_surf`, `surf_commission`, `surf_ref_commission`, `surf_min_bal`, `total_surf_amount`, `total_surf_ref_amount`, `shortlinks_action`, `shortlinks_ref_commission`, `total_tasks_shortlinks`, `total_shortlinks_amount`, `total_shortlinks_ref_amount`, `offerwall_action`, `offerwall_commission`, `offerwall_ref_commission`, `total_tasks_offerwall`, `total_offerwall_amount`, `total_offerwall_ref_amount`, `ref_market_action`, `ref_market_ref_commission_action`, `ref_market_commission`, `ref_market_ref_commission`, `ref_buysell_time_required`, `total_buysell_amount`, `total_buysell_ref_amount`, `baltopb_action`, `min_baltopb_deposit`, `withdraw_required_payments`, `cookie_register_detect_action`, `country_code_check_action`) VALUES
(1, '1.00', 'a3script', 'http://localhost/a3script', 'Site Description', 'Key Words', 'a3script', 0, 10, 0, 8, 0, 0, 5, 0, 0, 0, 0, 1, 0, 0.1, 10, 1, 0, 0, 0, 1, 0.15, 0.005, 0.3, 0.01, 5, 120, 1, 0, 50, 10, 0, 0, 0, 1, 1, 0, 0, 0, 1, 50, 10, 0, 0, 0, 0, 1, 20, 1, 1, 0, 0, 1, 0.2, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `surf`
--

CREATE TABLE `surf` (
  `id` bigint(20) NOT NULL,
  `uname` varchar(32) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `duration` smallint(6) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `view` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - pending\r\n1 - approved\r\n2 - pending admin approval\r\n3 - rejected\r\n4 - cancelled\r\n5 - pending delete',
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - pause\r\n1 - play',
  `balance` float NOT NULL DEFAULT 0,
  `country_code` varchar(5) DEFAULT 'ALL',
  `r_min` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surf_deposit`
--

CREATE TABLE `surf_deposit` (
  `id` int(11) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `surf_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surf_history`
--

CREATE TABLE `surf_history` (
  `id` int(11) NOT NULL,
  `uname` varchar(32) NOT NULL,
  `surf_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref_uname` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxonomy`
--

CREATE TABLE `taxonomy` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `slug` varchar(48) NOT NULL,
  `name` varchar(20) NOT NULL,
  `bunch` varchar(16) DEFAULT NULL,
  `sub_id` mediumint(9) DEFAULT NULL,
  `queue_order` tinyint(4) NOT NULL DEFAULT 0,
  `type` varchar(1) NOT NULL COMMENT 'm - main\r\nn - nav\r\ns - side bar',
  `relation` varchar(2) NOT NULL DEFAULT 'd' COMMENT 'd - default\r\np - parents\r\nc - child\r\ncc - child child',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `icon` varchar(100) DEFAULT NULL,
  `target` varchar(10) DEFAULT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - not removable\r\n1 - removable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taxonomy`
--

INSERT INTO `taxonomy` (`id`, `slug`, `name`, `bunch`, `sub_id`, `queue_order`, `type`, `relation`, `status`, `icon`, `target`, `removable`) VALUES
(1, 'dashboard', 'dashboard', NULL, NULL, 1, 'u', 'd', 0, '', NULL, 0),
(2, 'earn', 'earn', NULL, NULL, 2, 'm', 'p', 0, '', NULL, 0),
(3, 'advertise', 'advertise', NULL, NULL, 4, 'm', 'p', 0, '', NULL, 0),
(4, 'more', 'earn more', 'apps', NULL, 5, 'm', 'p', 0, '', NULL, 0),
(5, 'faq', 'FAQ', NULL, NULL, 6, 'm', 'd', 0, '', NULL, 0),
(6, 'contact', 'contact us', NULL, NULL, 7, 'm', 'd', 0, '', NULL, 0),
(7, 'login', 'login', NULL, NULL, 8, 'm', 'd', 1, '', NULL, 0),
(8, 'register', 'register', NULL, NULL, 9, 'm', 'd', 1, '', NULL, 0),
(9, 'faucet', 'faucet', 'earn', NULL, 10, 's', 'd', 1, 'bi bi-gift', NULL, 0),
(10, 'surf', 'surf', 'earn', NULL, 11, 's', 'd', 1, 'bi bi-box-arrow-up-right', NULL, 0),
(11, 'shortlinks', 'shortlinks', 'earn', NULL, 12, 's', 'd', 1, 'bi bi-link-45deg', NULL, 0),
(13, 'offerwall', 'offerwall', 'earn', NULL, 13, 's', 'd', 1, 'bi bi-file-text', NULL, 0),
(16, 'addsurf', 'create campaign', 'advertise', NULL, 14, 's', 'd', 1, 'bi bi-badge-ad', NULL, 0),
(17, 'withdraw', 'withdraw', 'payments', NULL, 15, 's', 'd', 1, 'bi bi-wallet', NULL, 0),
(18, 'deposit', 'deposit', 'payments', NULL, 16, 's', 'd', 1, 'bi bi-wallet2', NULL, 0),
(19, 'statistics', 'statistics', 'statistics', NULL, 17, 's', 'p', 1, 'bi bi-clipboard2-data', NULL, 0),
(21, 'faucet', 'faucet', NULL, 2, 18, 'u', 'd', 1, '', NULL, 0),
(22, 'surf', 'surf', NULL, 2, 19, 'u', 'd', 1, '', NULL, 0),
(23, 'shortlinks', 'shortlinks', NULL, 2, 20, 'u', 'd', 1, '', NULL, 0),
(24, 'offerwall', 'offerwall', NULL, 2, 21, 'u', 'd', 1, '', NULL, 0),
(33, 'addsurf', 'create campaign', NULL, 3, 30, 'm', 'c', 0, NULL, NULL, 0),
(60, 'surfads', 'campaign', 'advertise', NULL, 35, 's', 'd', 1, 'bi bi-badge-ad', NULL, 0),
(100, 'account', 'profile', 'account', NULL, 36, 's', 'd', 1, NULL, NULL, 0),
(109, 'referrals', 'referrals', 'account', NULL, 37, 's', 'd', 1, NULL, NULL, 0),
(112, 'addsurf', 'create campaign', NULL, NULL, 0, 'u', 'd', 1, NULL, NULL, 0),
(113, 'surfads', 'campaign', NULL, NULL, 0, 'u', 'd', 1, NULL, NULL, 0),
(114, 'withdraw', 'withdraw', NULL, NULL, 0, 'u', 'd', 1, NULL, NULL, 0),
(115, 'deposit', 'deposit', NULL, NULL, 0, 'u', 'd', 1, NULL, NULL, 0),
(116, 'account', ' profile', NULL, NULL, 0, 'u', 'd', 1, NULL, NULL, 0),
(117, 'referrals', 'referrals', NULL, NULL, 0, 'u', 'd', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 - inactive\r\n1 - active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `theme`, `status`) VALUES
(1, 'default', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(72) NOT NULL,
  `bal` float NOT NULL DEFAULT 0,
  `p_bal` float NOT NULL DEFAULT 0,
  `earned_faucet` float NOT NULL DEFAULT 0,
  `earned_faucet_ref` float NOT NULL DEFAULT 0,
  `earned_surf` float NOT NULL DEFAULT 0,
  `earned_surf_ref` float NOT NULL DEFAULT 0,
  `earned_shortlink` float NOT NULL DEFAULT 0,
  `earned_shortlink_ref` float NOT NULL DEFAULT 0,
  `earned_offerwall` float NOT NULL DEFAULT 0,
  `earned_offerwall_ref` float NOT NULL DEFAULT 0,
  `earned_buysell` float NOT NULL DEFAULT 0,
  `earned_buysell_ref` float NOT NULL DEFAULT 0,
  `spend` float NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 - ban\r\n1 - active',
  `rating` float NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `country_code` varchar(5) DEFAULT NULL,
  `login_ip` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_history`
--

CREATE TABLE `withdraw_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(32) NOT NULL,
  `address` varchar(350) NOT NULL,
  `amount` float NOT NULL,
  `coin` varchar(10) NOT NULL,
  `method` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - pending\r\n1 - paid\r\n3 - rejected\r\n4 - cancelled',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `txt_id` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_key`
--
ALTER TABLE `api_key`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FLtype` (`type`);

--
-- Indexes for table `baltopb_history`
--
ALTER TABLE `baltopb_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banned_email`
--
ALTER TABLE `banned_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coin_type`
--
ALTER TABLE `coin_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coin` (`coin`);

--
-- Indexes for table `deposit_history`
--
ALTER TABLE `deposit_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faucet_history`
--
ALTER TABLE `faucet_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_tok`
--
ALTER TABLE `log_tok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offerwall_action`
--
ALTER TABLE `offerwall_action`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FLofferwall_name` (`offerwall_name`);

--
-- Indexes for table `offerwall_history`
--
ALTER TABLE `offerwall_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_currency`
--
ALTER TABLE `payments_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FLname` (`name`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_buysell_history`
--
ALTER TABLE `ref_buysell_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_pass`
--
ALTER TABLE `reset_pass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FLtoken` (`token`);

--
-- Indexes for table `shortlinks`
--
ALTER TABLE `shortlinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortlinks_history`
--
ALTER TABLE `shortlinks_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surf`
--
ALTER TABLE `surf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surf_deposit`
--
ALTER TABLE `surf_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surf_history`
--
ALTER TABLE `surf_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxonomy`
--
ALTER TABLE `taxonomy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FLemail` (`email`),
  ADD UNIQUE KEY `FLuname` (`uname`);

--
-- Indexes for table `withdraw_history`
--
ALTER TABLE `withdraw_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_key`
--
ALTER TABLE `api_key`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `baltopb_history`
--
ALTER TABLE `baltopb_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banned_email`
--
ALTER TABLE `banned_email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coin_type`
--
ALTER TABLE `coin_type`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `deposit_history`
--
ALTER TABLE `deposit_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faucet_history`
--
ALTER TABLE `faucet_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_tok`
--
ALTER TABLE `log_tok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offerwall_action`
--
ALTER TABLE `offerwall_action`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offerwall_history`
--
ALTER TABLE `offerwall_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_currency`
--
ALTER TABLE `payments_currency`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` tinyint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_buysell_history`
--
ALTER TABLE `ref_buysell_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_pass`
--
ALTER TABLE `reset_pass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortlinks`
--
ALTER TABLE `shortlinks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortlinks_history`
--
ALTER TABLE `shortlinks_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surf`
--
ALTER TABLE `surf`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surf_deposit`
--
ALTER TABLE `surf_deposit`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surf_history`
--
ALTER TABLE `surf_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxonomy`
--
ALTER TABLE `taxonomy`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_history`
--
ALTER TABLE `withdraw_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
