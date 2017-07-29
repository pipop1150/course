CREATE TABLE `answer` (
  `answerId` int(10) NOT NULL AUTO_INCREMENT,
  `questionId` int(10) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`answerId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE `answerstatus` (
  `answerStatusId` int(10) NOT NULL AUTO_INCREMENT,
  `answerStatusDetail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`answerStatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `branch` (
  `branchId` int(10) NOT NULL AUTO_INCREMENT,
  `branchNameTH` varchar(100) DEFAULT NULL,
  `branchNameEN` varchar(100) DEFAULT NULL,
  `facultyId` int(10) DEFAULT NULL,
  `courseDetail` longtext,
  PRIMARY KEY (`branchId`),
  KEY `FK_FACULTYID` (`facultyId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

CREATE TABLE `degree` (
  `degreeId` int(10) NOT NULL AUTO_INCREMENT,
  `degreeNameTH` varchar(100) DEFAULT NULL,
  `degreeNameEN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`degreeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE `faculty` (
  `facultyId` int(10) NOT NULL AUTO_INCREMENT,
  `facultyNameTH` varchar(100) DEFAULT NULL,
  `facultyNameEN` varchar(100) DEFAULT NULL,
  `degreeId` int(10) DEFAULT NULL,
  PRIMARY KEY (`facultyId`),
  KEY `FK_DEGREEID` (`degreeId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

CREATE TABLE `question` (
  `questionId` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`questionId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `register` (
  `registerId` int(10) NOT NULL AUTO_INCREMENT,
  `idCard` varchar(100) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `titleTH` varchar(100) DEFAULT NULL,
  `firstNameTH` varchar(100) DEFAULT NULL,
  `lastNameTH` varchar(100) DEFAULT NULL,
  `titleEN` varchar(100) DEFAULT NULL,
  `firstNameEN` varchar(100) DEFAULT NULL,
  `lastNameEN` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `eduIns` varchar(100) DEFAULT NULL,
  `rankEdu` varchar(100) DEFAULT NULL,
  `gradeAverage` varchar(100) DEFAULT NULL,
  `registerDate` datetime DEFAULT NULL,
  PRIMARY KEY (`registerId`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;