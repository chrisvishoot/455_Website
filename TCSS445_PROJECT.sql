-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: vergil.u.washington.edu:64333
-- Generation Time: Mar 13, 2016 at 06:26 PM
-- Server version: 5.5.18
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TCSS445_PROJECT`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(6) NOT NULL,
  `is_submitted` tinyint(1) NOT NULL,
  `job_id` int(6) NOT NULL,
  `notes` varchar(2000) NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(6) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`) VALUES
(29, 'PenguinsRUS'),
(27, 'University of Washington');

-- --------------------------------------------------------

--
-- Table structure for table `company_notes`
--

CREATE TABLE `company_notes` (
  `company_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `notes` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `web_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `reason` varchar(2000) DEFAULT NULL,
  `open_position_id` int(6) DEFAULT NULL,
  `web_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`web_id`, `user_id`, `reason`, `open_position_id`, `web_url`) VALUES
(67, 31, 'I liked this webpage a lot.', NULL, 'http://students.washington.edu/glynng/gabrielle_example_websites/test1.html');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `web_id` int(6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(6) DEFAULT NULL,
  `comment` varchar(2000) DEFAULT NULL,
  `web_url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`web_id`, `timestamp`, `user_id`, `comment`, `web_url`) VALUES
(67, '2016-03-14 01:14:34', 31, 'LOL jk why aren&#39;t you good yo?', 'http://students.washington.edu/glynng/gabrielle_example_websites/test1.html');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `interview_id` int(11) NOT NULL,
  `before_notes` varchar(2000) NOT NULL,
  `after_notes` varchar(2000) NOT NULL,
  `application_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `sent_thank_you_note` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(6) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `created_by` int(6) NOT NULL,
  `is_open` tinyint(1) DEFAULT NULL,
  `closing_date` varchar(20) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `job_name` varchar(50) DEFAULT NULL,
  `how_to_apply` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `company_id` int(6) DEFAULT NULL,
  `company_name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `description`, `created_by`, `is_open`, `closing_date`, `date_added`, `job_name`, `how_to_apply`, `location`, `company_id`, `company_name`) VALUES
(44, 'We need an IT student!', 30, 1, '2016-05-27', '2016-03-13', 'Deskjob 1', 'By being awesome', 'Seattle, WA', 27, 'University of Washington'),
(45, 'Software please', 30, 1, '2016-05-27', '2016-03-13', 'Software Engineer', 'CS', 'Tacoma', 27, 'University of Washington');

-- --------------------------------------------------------

--
-- Table structure for table `resume_website`
--

CREATE TABLE `resume_website` (
  `web_id` int(6) NOT NULL,
  `focus` varchar(2000) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ex_or_in` enum('I','E') NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `user_id` int(6) NOT NULL,
  `html_code` text,
  `css_code` text,
  `notes` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume_website`
--

INSERT INTO `resume_website` (`web_id`, `focus`, `description`, `ex_or_in`, `url`, `user_id`, `html_code`, `css_code`, `notes`) VALUES
(67, 'This is just a test', 'This is just a test. ', 'E', 'http://students.washington.edu/glynng/gabrielle_example_websites/test1.html', 31, NULL, NULL, NULL),
(68, 'This is an internal test', 'Another test', 'I', 'http://students.washington.edu/glynng/resume_tracker/resume/seeker1/test2internal.html', 31, 'LOL', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` enum('R','S') NOT NULL,
  `work_title` varchar(50) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `create_time`, `user_type`, `work_title`, `company_id`, `username`) VALUES
(30, 'recruiter1@gmail.com', 'd2eb98e05f36573ee34ce1ffdc752352', 'Recruiter', 'Recruiter', '2016-03-14 00:55:13', 'R', 'Recruiter', 27, 'recruiter1'),
(31, 'seeker1@gmail.com', 'd2eb98e05f36573ee34ce1ffdc752352', 'Chris', 'Something', '2016-03-14 01:02:38', 'S', 'Awesome', 29, 'seeker1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `company_notes`
--
ALTER TABLE `company_notes`
  ADD PRIMARY KEY (`company_id`,`user_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`web_id`,`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`web_id`,`timestamp`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`interview_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `job_id` (`job_id`);

--
-- Indexes for table `resume_website`
--
ALTER TABLE `resume_website`
  ADD PRIMARY KEY (`web_id`) USING BTREE,
  ADD UNIQUE KEY `web_id` (`web_id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `resume_website`
--
ALTER TABLE `resume_website`
  MODIFY `web_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
