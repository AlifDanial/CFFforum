-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 08:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cffforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `AnswerID` int(10) NOT NULL,
  `AnswerContent` int(255) NOT NULL,
  `AnswerDate` int(10) NOT NULL,
  `AnswerVoteCount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer_thread`
--

CREATE TABLE `answer_thread` (
  `AnswerThreadID` int(10) NOT NULL,
  `AnswerID` int(10) NOT NULL,
  `ThreadID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE `answer_user` (
  `AnswerUserID` int(10) NOT NULL,
  `AnswerID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `CropID` int(10) NOT NULL,
  `CropName` varchar(255) NOT NULL,
  `CropAddedDate` int(10) NOT NULL,
  `CropEditedDate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cropattribute`
--

CREATE TABLE `cropattribute` (
  `CropAttributeID` int(10) NOT NULL,
  `CropID` int(10) NOT NULL,
  `CropAttributeTagID` int(10) NOT NULL,
  `CropAttributeName` varchar(255) NOT NULL,
  `CropAttributeData` varchar(255) NOT NULL,
  `CropAttributeAddedDate` int(10) NOT NULL,
  `CropAttributeEditedData` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cropattribute_tag`
--

CREATE TABLE `cropattribute_tag` (
  `CropAttributeTagID` int(10) NOT NULL,
  `TagID` int(10) NOT NULL,
  `CropAttributeID` int(10) NOT NULL,
  `CropAttributeCropID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crop_tag`
--

CREATE TABLE `crop_tag` (
  `CropTagID` int(10) NOT NULL,
  `CropID` int(10) NOT NULL,
  `TagID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `ForumID` int(10) NOT NULL,
  `ForumName` varchar(255) NOT NULL,
  `ForumDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `ModeratorID` int(10) NOT NULL,
  `ModeratorForumID` int(10) NOT NULL,
  `ModeratorPassword` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyID` int(10) NOT NULL,
  `ReplyAnswerID` int(10) NOT NULL,
  `ReplyUserID` int(10) NOT NULL,
  `ReplyContent` varchar(255) NOT NULL,
  `ReplyDate` int(10) NOT NULL,
  `ReplyVoteCount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply_user`
--

CREATE TABLE `reply_user` (
  `ReplyUserID` int(10) NOT NULL,
  `ReplyID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribed_thread_user`
--

CREATE TABLE `subscribed_thread_user` (
  `SubscribedThreadID` int(10) NOT NULL,
  `ThreadID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `SubscribedThreadCount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `TagID` int(10) NOT NULL,
  `TagThreadID` int(10) NOT NULL,
  `TagName` varchar(255) NOT NULL,
  `TagDate` int(10) NOT NULL,
  `TagCropID` int(10) NOT NULL,
  `TagCropAttributeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `ThreadID` int(10) NOT NULL,
  `ThreadModeratorID` int(10) NOT NULL,
  `ThreadForumID` int(10) NOT NULL,
  `ThreadUserID` int(10) NOT NULL,
  `ThreadSubject` varchar(255) NOT NULL,
  `ThreadDescription` varchar(500) NOT NULL,
  `ThreadVoteCount` int(10) NOT NULL,
  `ThreadSubscribedUserID` int(10) NOT NULL,
  `ThreadSubscribeduserCount` int(10) NOT NULL,
  `ThreadViewsCount` int(10) NOT NULL,
  `ThreadAnswersCount` int(10) NOT NULL,
  `ThreadDateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ThreadDateEdited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`ThreadID`, `ThreadModeratorID`, `ThreadForumID`, `ThreadUserID`, `ThreadSubject`, `ThreadDescription`, `ThreadVoteCount`, `ThreadSubscribedUserID`, `ThreadSubscribeduserCount`, `ThreadViewsCount`, `ThreadAnswersCount`, `ThreadDateCreated`, `ThreadDateEdited`) VALUES
(1000, 0, 0, 8001, 'Hibisci are the bomb', 'Make sure to eat ur hibisci children', 203, 0, 0, 320, 400, '2018-11-27 12:04:19', '2018-11-27 12:05:00'),
(1001, 0, 0, 0, 'Change my mind : Rafflesia are the bomb not hibisci', 'bruh i think rafflesia are the best flowers', 200, 0, 0, 250, 350, '2018-11-27 12:04:19', '2018-11-27 12:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(10) NOT NULL,
  `UserFirstName` varchar(255) NOT NULL,
  `UserLastName` varchar(255) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `UserOccupation` varchar(255) NOT NULL,
  `UserCountry` varchar(255) NOT NULL,
  `UserDateJoined` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `UserLastLogin` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `UserEditProfileDate` int(10) NOT NULL,
  `UserAnswerCount` int(10) NOT NULL,
  `UserSubscribedThreadsCount` int(10) NOT NULL,
  `UserImage` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserFirstName`, `UserLastName`, `UserEmail`, `UserPassword`, `UserOccupation`, `UserCountry`, `UserDateJoined`, `UserLastLogin`, `UserEditProfileDate`, `UserAnswerCount`, `UserSubscribedThreadsCount`, `UserImage`) VALUES
(8001, 'Alif', 'Danial', 'alifdanial1655@gmail.com', '$2y$10$aBd6bLjYBmxQgpJpw0rR6.AIhboe8yeE/G/wtoHm4646gCHvQMYKe', 'Computer Scientist', '', '2018-11-23 09:43:46.847283', '2018-11-29 15:28:29.000000', 0, 0, 0, ''),
(8002, 'aaron', 'kin kit', 'aaron@email', '$2y$10$W7MKAG6clz9wpNNe5WQ5NeRp.g67bjMZ7y.2K5tOFyj7I9onfYi0G', 'cs', '', '2018-11-27 10:06:47.267199', '2018-11-29 15:28:29.000000', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_thread`
--

CREATE TABLE `user_thread` (
  `UserThreadID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `ThreadID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`AnswerID`);

--
-- Indexes for table `answer_thread`
--
ALTER TABLE `answer_thread`
  ADD PRIMARY KEY (`AnswerThreadID`);

--
-- Indexes for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD PRIMARY KEY (`AnswerUserID`);

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`CropID`);

--
-- Indexes for table `cropattribute`
--
ALTER TABLE `cropattribute`
  ADD PRIMARY KEY (`CropAttributeID`);

--
-- Indexes for table `cropattribute_tag`
--
ALTER TABLE `cropattribute_tag`
  ADD PRIMARY KEY (`CropAttributeTagID`);

--
-- Indexes for table `crop_tag`
--
ALTER TABLE `crop_tag`
  ADD PRIMARY KEY (`CropTagID`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`ForumID`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`ModeratorID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyID`);

--
-- Indexes for table `reply_user`
--
ALTER TABLE `reply_user`
  ADD PRIMARY KEY (`ReplyUserID`);

--
-- Indexes for table `subscribed_thread_user`
--
ALTER TABLE `subscribed_thread_user`
  ADD PRIMARY KEY (`SubscribedThreadID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`ThreadID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user_thread`
--
ALTER TABLE `user_thread`
  ADD PRIMARY KEY (`UserThreadID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `ThreadID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
