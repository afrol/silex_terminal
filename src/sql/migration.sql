CREATE TABLE `Terminal` (
  `terminalId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `manufacturerId` int(11) DEFAULT '0',
  `branchId` int(11) DEFAULT '0',
  `imgUrl` varchar(255) NOT NULL,
  `status` enum('stock', 'transport', 'installed', 'active', 'deactivated') NOT NULL DEFAULT 'stock',
  `createAt` datetime DEFAULT NULL,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(`autoinrcement_id`),
  KEY `code` (`code`),
  KEY `branchId` (`branchId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Staff` (
  `staffId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `branchId` int(11) DEFAULT '0',
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(128) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(`staffId`),
  KEY `name` (`firstName`, `lastName`),
  KEY `branchId` (`branchId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `StaffTerminal` (
  `staffId` int(11) NOT NULL DEFAULT 0,
  `terminalId` int(11) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(`staffId`, `terminalId`),
  KEY `terminalId` (`terminalId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Branch` (
  `branchId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(`branchId`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Manufacturer` (
  `manufacturerId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(`manufacturerId`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;