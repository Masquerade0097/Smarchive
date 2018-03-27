-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 09:23 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarchive`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `interest` text,
  `approval` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `username`, `course_id`, `interest`, `approval`) VALUES
(14, 'hello', '2', 'ML is my favourite topic.', 'yes'),
(21, 'mohan', 'IC 202', NULL, 'yes'),
(22, 'mohan', 'EE 311', NULL, 'no'),
(23, 'mohan', 'Cs 208', NULL, NULL),
(24, 'prabhakarpd7284', 'A', NULL, 'yes'),
(25, 'prabhakarpd7284', 'IC 202', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `offeredby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `url`, `title`, `description`, `offeredby`) VALUES
('A', 'WIN_20170915_17_18_36_Pro.jpg', 'C', 'B', '2'),
('Cs 208', 'project12.jpg', 'MFOCS', 'dfhgj jgjg                  hghg hj ', 'Arti Kashyap'),
('EE 311', 'Desert.jpg', 'Army upgrades ruggedized vehicle-mounted computers, force tracking software', 'The Army is acquiring and modernizing vehicle-mounted consolidated ruggedized computer systems and force-tracking software designed to help soldiers on the move access combat-relevant information from vehicles and in dismounted operations.\r\n\r\nThe technology, called a Mounted Family of Computer Systems (MFoCS), synthesizes hardware components as well as software, sensors and communications equipment to provide a more seamless soldier computing experience.\r\n\r\nThe new computers are part of an accelerated fielding of a next-generation force tracking software called Joint Battle Command – Platform (JBC-P). The technology uses moving digital maps with colored graphic icons showing friendly and enemy force locations, expedites chat functions and allows access to combat-relevant intelligence information. \r\n\r\nBuilding upon the now-fielded initial version of MFoCS, the Army is now seeking to leverage faster processing speeds and improved touch screen technology for an MFoCS Increment 2 upgrade. \r\n\r\nLeonardo DRS (an Italian-owned defense firm) has previously received at least $53 million in orders for the computers. DRS, the incumbent manufacturer, is now developing initial models of its MFoCS Block Two for delivery to the Army as part of a bid to compete for a new production deal. \r\n\r\nArmy program managers have said that the vision of MFoCS is to use a single tactical computer to run multiple applications. Army statements explain that there are three building blocks to MFoCS; the basic configuration is a tablet using a 12, 15 or 17-inch display.\r\n\r\nThe tablets are ruggedized and operate on a 25-foot cable so soldiers inside a vehicle can pass the display around or even detach it and take it outside. \r\n\r\nDRS’ MFoCS 2 offering incorporates a multi-touch display screen, developers explained.  \r\n\r\n“What the user will experience is an increasingly intuitive user interface which we call multi-touch functionality able to expand or shrink an image,” said Bill Guyan, vice president of business development, Leonardo DRS. “This will be very helpful in the future when you are looking at maps of different scales.”\r\n\r\nGuyan added that their MFoCS 2 bid incorporates faster processing speed along with excess storage and memory.\r\n\r\n“You can pass images between computers or run multiple applications,” Guyan said. \r\n\r\nBy 2024, MFoCS will be synchronized with the same upgraded software called Joint Battle Command-Platform.\r\n\r\nThe combined capabilities of JBC-P and MFoCS deliver the Army\'s next-generation friendly force tracking system, an Army statement said. ', '2'),
('IC 202', 'project13.jpg', 'Data Structures and Algorithms', 'hgdhfiragh riugferighjgduig reg hreug ejhghregnlkjfdghdfkj hgdfkjgh fkdjkjdlf ghdf ughdfkj ghdfj gh dfkj ghdfulgh dfkjghfdukg hrekj ghrekjgh df gh dfkjghfd ghdfkj ghfkjdgh dfjgh fjg.', '2'),
('IC 241', 'WIN_20170915_17_57_45_Pro.jpg', 'Materials Science', 'You will learn learn!', '1');

-- --------------------------------------------------------

--
-- Table structure for table `coursedata`
--

CREATE TABLE `coursedata` (
  `id` int(11) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `topic` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedata`
--

INSERT INTO `coursedata` (`id`, `course_id`, `url`, `topic`, `description`, `likes`) VALUES
(1, 'IC 202', 'project12.jpg', 'Asymptotic Analysis', 'rfrwef', 53),
(2, 'Cs 208', 'project13.jpg', 'Asymptotic Analysis', 'rw', 7),
(14, 'IC 202', 'APRL.pdf', 'hello', 'world', 52),
(15, 'IC 202', 'project12.jpg', 'Asymptotic Analysis', 'rfrwefaa', 38),
(16, 'IC 202', 'APRL.pdf', 'AS', 'DOg', 0),
(17, 'IC 202', 'Assignment-5.pdf', 'df', 'dd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `coursetopic`
--

CREATE TABLE `coursetopic` (
  `id` int(11) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetopic`
--

INSERT INTO `coursetopic` (`id`, `course_id`, `topic`) VALUES
(1, 'IC 202', 'Asymptotic Analysis'),
(2, 'Cs 208', 'Asymptotic Analysis'),
(14, 'IC 202', 'hello'),
(15, 'IC 202', 'AS'),
(16, 'IC 202', 'df');

-- --------------------------------------------------------

--
-- Table structure for table `facultyinfo`
--

CREATE TABLE `facultyinfo` (
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `image_url` text NOT NULL,
  `credential` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultyinfo`
--

INSERT INTO `facultyinfo` (`username`, `firstname`, `lastname`, `email`, `image_url`, `credential`, `description`) VALUES
('1', 'Ram', 'Kripal', '', '1.jpg', '', ''),
('2', 'Aditya', 'Nigam', '', '2.jpg', '', ''),
('Arti Kashyap', 'Arti', 'Kashyap', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `image_url` text NOT NULL,
  `credential` varchar(255) DEFAULT NULL,
  `description` text,
  `cgpa` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`username`, `firstname`, `lastname`, `email`, `image_url`, `credential`, `description`, `cgpa`) VALUES
('1', 'Prabhakar', 'Prasad', 'prabhakarpd7284@gmail.com', '', '1', NULL, '0'),
('admin', 'Big', 'Boss', '', 'fb_avatar_male.jpg', '', '', '0'),
('b16069', 'prabhakar', 'prasad', 'b16069@students.iitmandi.ac.in', 'b16069.jpg', 'B.tech IIT Mandi CSE', 'Nothing Special', '9'),
('bigboss', 'Big', 'Boss', 'bigboss7284@gmail.com', 'WIN_20170915_17_18_36_Pro.jpg', 'B.tech IIT Mandi', 'I am Big Boss. No one cross my path.', '9'),
('hello', 'Hello', 'World', '', 'fb_avatar_male.jpg', '', '', '0'),
('mohan', 'Mohan', 'Bhagwat', 'mohan@bhagwat.com', 'mohan.jpg', 'B.tech IIT Mandi', 'Myself coming from village area.', '8'),
('prabhakarpd7284', 'Prabhakar', 'Prasad', 'prabhakarpd7284@gmail.com', 'prabhakarpd7284.jpg', 'B.tech IIT Mandi CSE', 'Nobody crosses me.', '9');

-- --------------------------------------------------------

--
-- Table structure for table `usercourse`
--

CREATE TABLE `usercourse` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercourse`
--

INSERT INTO `usercourse` (`id`, `username`, `course_id`) VALUES
(2, 'mohan', 'Cs 208');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`username`, `password`, `profession`) VALUES
('1', '356a192b7913b04c54574d18c28d46e6395428ab', 'faculty'),
('2', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'faculty'),
('admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'student'),
('Arti Kashyap', 'arti', 'faculty'),
('hello', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', 'student'),
('mohan', 'abee2cb38f12d53e4682bab140e8f4b568816eee', 'student'),
('prabhakarpd7284', '356a192b7913b04c54574d18c28d46e6395428ab', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `offeredby` (`offeredby`);
ALTER TABLE `course` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `course` ADD FULLTEXT KEY `offeredby1` (`offeredby`);

--
-- Indexes for table `coursedata`
--
ALTER TABLE `coursedata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `coursetopic`
--
ALTER TABLE `coursetopic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `facultyinfo`
--
ALTER TABLE `facultyinfo`
  ADD PRIMARY KEY (`username`);
ALTER TABLE `facultyinfo` ADD FULLTEXT KEY `firstname` (`firstname`);
ALTER TABLE `facultyinfo` ADD FULLTEXT KEY `lastname` (`lastname`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`username`);
ALTER TABLE `studentinfo` ADD FULLTEXT KEY `firstname` (`firstname`);
ALTER TABLE `studentinfo` ADD FULLTEXT KEY `lastname` (`lastname`);

--
-- Indexes for table `usercourse`
--
ALTER TABLE `usercourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `coursedata`
--
ALTER TABLE `coursedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `coursetopic`
--
ALTER TABLE `coursetopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usercourse`
--
ALTER TABLE `usercourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`username`) REFERENCES `userlogin` (`username`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`offeredby`) REFERENCES `userlogin` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
