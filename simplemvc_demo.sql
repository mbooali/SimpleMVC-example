-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2010 at 09:32 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simplemvc_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` varchar(36) NOT NULL DEFAULT '',
  `author` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_on_ms` smallint(6) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `author`, `title`, `body`, `created_on`, `created_on_ms`) VALUES
('0922fd82-66e4-c161-6924-f1cbb2b446ae', 'dslsj', 'BKLSDJKBL', 'W;EDKKSDL;BDS;LMBDSLFKB LSD', '2010-04-13 09:23:37', 808),
('2f3b4ae4-d56f-4906-8325-519f6a230978', 'Max Indelicato', 'A Title', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis diam elit, egestas id, ultrices ut, pretium a, lacus. Suspendisse potenti. Nullam tempor dui nec felis interdum viverra. Fusce posuere tortor quis libero. Pellentesque convallis vulputate purus. Duis luctus, nulla non porttitor sodales, dui nisl fermentum augue, placerat vulputate massa orci et urna. Duis gravida tortor rhoncus neque. Nulla ipsum elit, suscipit ut, imperdiet et, consequat ac, tortor. Nullam auctor augue vel mi. Phasellus porta pellentesque dolor. Mauris malesuada, pede a lacinia mattis, mi nibh tempus pede, a imperdiet erat dui nec turpis. Nam fermentum. Donec varius diam id mi. Morbi est libero, iaculis a, elementum ac, pulvinar ut, felis. Vestibulum pharetra molestie arcu. Suspendisse vitae dui. Donec leo leo, molestie nec, volutpat et, tempus eget, risus. Sed gravida augue vel arcu. Curabitur eget velit.', '2008-09-15 00:00:00', 0),
('8e3093fb-5e04-2164-d16d-53a5efdf54f6', 'John Doe', 'Hey Title Two', 'Nullam et massa ut neque vehicula condimentum. Donec pulvinar nibh sed justo. Aenean laoreet volutpat nunc. In ante. Etiam gravida varius justo. Maecenas lorem. Proin convallis, nisl id hendrerit hendrerit, ipsum dui ornare dui, in porta diam felis at magna. Praesent congue felis. Curabitur molestie augue nec sem. Suspendisse in urna. Morbi adipiscing posuere sem. Sed lacinia tortor vel neque dignissim rhoncus. Sed libero. Phasellus molestie. Pellentesque lobortis scelerisque lorem. ', '2008-11-21 01:22:16', 477),
('8fa888e9-2f2c-81e6-f18f-af57ce175c8f', 'mojtaba', 'salam', 'salam hale shoma\r\n', '2010-04-12 17:46:45', 934),
('fa7c3e1f-0a5c-6956-6755-9f3193a2a2f4', 'nam', 'ansam', 'dljsdla lkaj flj fdlj dlf d', '2010-04-13 11:11:14', 432);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentId` varchar(100) NOT NULL,
  `commentBody` varchar(500) NOT NULL,
  `postId` varchar(100) NOT NULL,
  `commentAuthor` varchar(100) NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `commentBody`, `postId`, `commentAuthor`) VALUES
('67d205af-efb8-dfc9-1198-bd0e1e11bdde', 'salam chetori', '0', 'man1'),
('bb3a0bcb-ec11-6395-b728-9cd53bbb2fd6', 'posstttttt', '0', 'man');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postId` varchar(100) NOT NULL,
  `postBody` varchar(600) NOT NULL,
  `postTitle` varchar(100) NOT NULL,
  `postAuthor` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`postId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postBody`, `postTitle`, `postAuthor`, `created_on`) VALUES
('0', 'salam \r\nhale shoma', 'salam', 'mojtab', '2010-04-14 09:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `sendcomment`
--

CREATE TABLE IF NOT EXISTS `sendcomment` (
  `commentId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `commentDate` int(11) NOT NULL,
  PRIMARY KEY (`commentId`,`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sendcomment`
--


-- --------------------------------------------------------

--
-- Table structure for table `sendpost`
--

CREATE TABLE IF NOT EXISTS `sendpost` (
  `postId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `postDate` varchar(100) NOT NULL,
  PRIMARY KEY (`postId`,`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sendpost`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `familyName` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `familyName`, `userName`, `password`, `role`, `state`) VALUES
('3d7dcf57-ac39-1424-48e6-5079b3faf5bd', 'mojjjtaba', '', 'man1', 'man2', '0', 'BLOCKED'),
('cb9e58f5-ea06-a637-143e-d05edab1ea54', 'farhadvaMojtaba', 'fallahnejad', 'man', 'to', '1', 'FREE'),
('06e55f8a-57cf-d69b-ebea-c06ea68712ad', 'farhad', 'fallah', 'fghassrrr', 'fared', '0', 'FREE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
