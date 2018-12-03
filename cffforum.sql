-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 06:06 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
-- Table structure for table `crop_thread`
--

CREATE TABLE `crop_thread` (
  `CropThreadID` int(11) NOT NULL,
  `CropID` int(10) NOT NULL,
  `ThreadID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `ModeratorID` int(10) NOT NULL,
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
  `ThreadUserID` int(10) NOT NULL,
  `ThreadSubject` varchar(255) NOT NULL,
  `ThreadDescription` varchar(500) NOT NULL,
  `ThreadVoteCount` int(10) NOT NULL,
  `ThreadSubscribedUserID` int(10) NOT NULL,
  `ThreadSubscribeduserCount` int(10) NOT NULL,
  `ThreadViewsCount` int(10) NOT NULL,
  `ThreadAnswersCount` int(10) NOT NULL,
  `ThreadUserFlag` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`ThreadID`, `ThreadModeratorID`, `ThreadUserID`, `ThreadSubject`, `ThreadDescription`, `ThreadVoteCount`, `ThreadSubscribedUserID`, `ThreadSubscribeduserCount`, `ThreadViewsCount`, `ThreadAnswersCount`, `ThreadUserFlag`) VALUES
(1, 0, 0, 'What\'s a hibiscus?', 'I\'ve been having problems in understanding flowers, espescialy the hibiscus.', 648, 0, 0, 2000, 345, 1),
(2, 0, 0, 'Rafflesia are cool', 'Change my mind Rafflesia are the OG compared to Hibisci', 613, 0, 0, 345, 265, 1),
(3, 0, 0, 'Rose', 'Bruh, roses are da bomb. rafflesia are prone to extinction and who gives their date a hibisci?', 379, 0, 0, 457, 924, 1),
(4, 0, 0, 'Sed ut perspiciatis unde omnis', ' natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore ma', 204, 0, 0, 457, 400, 1),
(5, 0, 0, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi temp', 257, 0, 0, 12345, 12343565, NULL),
(6, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lorem justo, ornare eu malesuada in, varius nec lorem. Nam sed dictum sapien, a euismod dui. Nam enim felis, vehicula nec magna vel, fermentum euismod magna. Donec non orci dignissim augue cons', 'Ut sollicitudin massa nibh, nec egestas lorem ornare non. Curabitur at nibh imperdiet, maximus lorem ut, viverra justo. Etiam nec aliquet odio, sit amet sodales tortor. Nam efficitur consectetur sem, in interdum enim pulvinar sit amet. Quisque pulvinar mi eget purus molestie, ut luctus augue varius. Praesent eget lacinia tortor. Proin mauris sapien, molestie nec iaculis sit amet, pulvinar rhoncus massa. Curabitur ac ex quis lacus fringilla placerat.\r\n\r\nPhasellus vel odio nec ligula semper vehicu', 378, 0, 0, 204, 350, NULL),
(7, 0, 0, 'Aenean dolor arcu, interdum non consectetur at, fringilla vel sapien. Morbi id velit varius, vulputate tortor in, imperdiet urna. Aliquam posuere tristique lacus, non mattis sapien volutpat in. Fusce ultricies nisi at libero dapibus egestas. Quisque in ni', 'Pellentesque sed metus tincidunt, elementum magna ac, lobortis est. Vestibulum eget eros varius, interdum magna at, tincidunt felis. Vivamus molestie, magna at varius sagittis, mi nisi tempus mauris, vitae tempor lorem nisl vitae lectus. Etiam ac magna ornare, ultricies purus in, feugiat nulla. Sed luctus vel orci ac auctor. Nam ut justo turpis. Morbi nisi leo, ullamcorper euismod accumsan ac, hendrerit et eros.\r\n\r\nAliquam erat volutpat. Maecenas euismod dignissim magna, quis gravida justo tinci', 6722, 0, 0, 1234, 1367, NULL),
(8, 0, 0, 'Curabitur volutpat laoreet eros, elementum luctus ligula semper in. Nullam mollis leo ac magna laoreet, quis interdum eros maximus. Sed ante ante, mattis eget lobortis id, pretium et eros. Vivamus sed iaculis metus, euismod ultricies tortor. In orci lacus', 'Suspendisse non magna ac velit hendrerit blandit at id lectus. Donec scelerisque purus augue, a finibus leo accumsan eu. Nam id lorem odio. Ut malesuada, nisl at scelerisque rhoncus, dolor mi viverra dolor, a pellentesque orci magna ut nibh. Maecenas non nulla fermentum, dapibus felis ac, rutrum dui. Aenean mattis ipsum sed purus ultricies, ac laoreet neque pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut fringilla commodo ornare. Duis et ligula vitae ligula volutpat pos', 4777, 0, 0, 2346, 2136, NULL);

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
  `UserSubscribedThreadsCount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserFirstName`, `UserLastName`, `UserEmail`, `UserPassword`, `UserOccupation`, `UserCountry`, `UserDateJoined`, `UserLastLogin`, `UserEditProfileDate`, `UserAnswerCount`, `UserSubscribedThreadsCount`) VALUES
(2, 'Alif', 'Danial', 'alif@email', '$2y$10$mO1WnccW5hcnEimlJ7ynT.9.EhuYkuLcKFMVNYkQPhryDKnznWPT2', 'Computer Scientist', '', '2018-11-25 18:39:39.409865', '2018-12-03 12:36:33.000000', 0, 0, 0);

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
  ADD PRIMARY KEY (`CropTagID`),
  ADD KEY `CropID` (`CropID`),
  ADD KEY `TagID` (`TagID`);

--
-- Indexes for table `crop_thread`
--
ALTER TABLE `crop_thread`
  ADD PRIMARY KEY (`CropThreadID`),
  ADD KEY `CropID_2` (`CropID`),
  ADD KEY `ThreadID` (`ThreadID`);

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
  ADD PRIMARY KEY (`ReplyUserID`),
  ADD KEY `ReplyID` (`ReplyID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `subscribed_thread_user`
--
ALTER TABLE `subscribed_thread_user`
  ADD PRIMARY KEY (`SubscribedThreadID`),
  ADD KEY `ThreadID` (`ThreadID`),
  ADD KEY `UserID` (`UserID`);

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
  ADD PRIMARY KEY (`UserThreadID`),
  ADD UNIQUE KEY `UserID` (`UserID`) USING BTREE,
  ADD KEY `ThreadID` (`ThreadID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crop_thread`
--
ALTER TABLE `crop_thread`
  MODIFY `CropThreadID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_thread`
--
ALTER TABLE `user_thread`
  MODIFY `UserThreadID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crop_tag`
--
ALTER TABLE `crop_tag`
  ADD CONSTRAINT `crop_tag_ibfk_1` FOREIGN KEY (`CropID`) REFERENCES `crop` (`CropID`),
  ADD CONSTRAINT `crop_tag_ibfk_2` FOREIGN KEY (`TagID`) REFERENCES `tag` (`TagID`);

--
-- Constraints for table `crop_thread`
--
ALTER TABLE `crop_thread`
  ADD CONSTRAINT `crop_thread_ibfk_1` FOREIGN KEY (`CropID`) REFERENCES `crop` (`CropID`),
  ADD CONSTRAINT `crop_thread_ibfk_2` FOREIGN KEY (`ThreadID`) REFERENCES `thread` (`ThreadID`);

--
-- Constraints for table `reply_user`
--
ALTER TABLE `reply_user`
  ADD CONSTRAINT `reply_user_ibfk_1` FOREIGN KEY (`ReplyID`) REFERENCES `reply` (`ReplyID`),
  ADD CONSTRAINT `reply_user_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `subscribed_thread_user`
--
ALTER TABLE `subscribed_thread_user`
  ADD CONSTRAINT `subscribed_thread_user_ibfk_1` FOREIGN KEY (`ThreadID`) REFERENCES `thread` (`ThreadID`),
  ADD CONSTRAINT `subscribed_thread_user_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `user_thread`
--
ALTER TABLE `user_thread`
  ADD CONSTRAINT `user_thread_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `user_thread_ibfk_2` FOREIGN KEY (`ThreadID`) REFERENCES `thread` (`ThreadID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
