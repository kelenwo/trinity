-- phpMyAdmin SQL Dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(50) NOT NULL,
  `first_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `email` varchar(70) COLLATE utf8_bin NOT NULL,
  `phone` varchar(15) COLLATE utf8_bin NOT NULL,
  `city` varchar(50) COLLATE utf8_bin NOT NULL,
  `country` varchar(70) COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  `message` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bids`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(50) NOT NULL,
  `title` varchar(70) COLLATE utf8_bin NOT NULL,
  `location` varchar(70) COLLATE utf8_bin NOT NULL,
  `image` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` text COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(50) NOT NULL,
  `title` varchar(250) COLLATE utf8_bin NOT NULL,
  `type` varchar(250) COLLATE utf8_bin NOT NULL,
  `url` varchar(250) COLLATE utf8_bin NOT NULL,
  `status` varchar(70) COLLATE utf8_bin NOT NULL,
  `category` varchar(70) COLLATE utf8_bin NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `end_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `billing_amount` varchar(20) COLLATE utf8_bin NOT NULL,
  `billing_cycle` varchar(70) COLLATE utf8_bin NOT NULL,
  `first_billing_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `last_billing_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `has_renewal` varchar(20) COLLATE utf8_bin NOT NULL,
  `renewal_period` varchar(70) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `owner` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contracts`

-- --------------------------------------------------------

--
-- Table structure for table `contract_bidding`
--

CREATE TABLE `contract_bidding` (
  `id` int(20) NOT NULL,
  `contract_title` varchar(250) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `bid_opening_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `bid_closing_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `category` varchar(70) COLLATE utf8_bin NOT NULL,
  `location` varchar(70) COLLATE utf8_bin NOT NULL,
  `bid_number` varchar(70) COLLATE utf8_bin NOT NULL,
  `owner` varchar(70) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contract_bidding`
--

INSERT INTO `contract_bidding` (`id`, `contract_title`, `description`, `bid_opening_date`, `bid_closing_date`, `category`, `location`, `bid_number`, `owner`, `date`) VALUES
(1, 'Test edited', 'sample description', '2020-09-01', '2020-09-16', 'Civil Works', 'University of  uyo, uyo', 'PCL0001CV', 'uniuyo', '03-Sep-2020'),
(2, 'Test 1 ', 'Sample', '2020-09-02', '2020-09-02', 'civil', 'University of  uyo', 'PCL002CB', 'uniuyo', '04-Sep-2020');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(20) NOT NULL,
  `owner` varchar(250) COLLATE utf8_bin NOT NULL,
  `owner_email` varchar(250) COLLATE utf8_bin NOT NULL,
  `event_title` varchar(70) COLLATE utf8_bin NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `type` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(20) NOT NULL,
  `title` varchar(250) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `status`, `date`) VALUES
(1, 'Call for articles', 'We hereby request you start submitting your aticles. edited', 'Active', '19-Jul-2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `phone` varchar(70) COLLATE utf8_bin NOT NULL,
  `email` varchar(70) COLLATE utf8_bin NOT NULL,
  `marital_status` varchar(20) COLLATE utf8_bin NOT NULL,
  `religion` varchar(70) COLLATE utf8_bin NOT NULL,
  `account_state` varchar(20) COLLATE utf8_bin NOT NULL,
  `rights` varchar(70) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `auth` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_bidding`
--
ALTER TABLE `contract_bidding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contract_bidding`
--
ALTER TABLE `contract_bidding`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
