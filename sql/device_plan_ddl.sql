DROP TABLE IF EXISTS  area;
DROP TABLE IF EXISTS  device;
DROP TABLE IF EXISTS  floor_plan;

CREATE TABLE IF NOT EXISTS `area` (
  `area_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `plan_id` int not null,
  `name` int(100) NOT NULL,
  `description` varchar(2000) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `device` (
  `device_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `code` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `icon64x64_url` varchar(200) NOT NULL,
  `image_url` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `locationX` int(11) NOT NULL,
  `locationY` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
CREATE TABLE IF NOT EXISTS `floor_plan` (
  `plan_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `coordN` double NULL,
  `coordE` double NULL,
  `plan_url` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `area`
ADD PRIMARY KEY (`area_id`),  ADD UNIQUE KEY `name` (`name`) ;

ALTER TABLE `device`
ADD PRIMARY KEY (`device_id`), ADD UNIQUE KEY `code` (`code`), ADD KEY `area_id` (`area_id`), ADD KEY `plan_id` (`plan_id`);

ALTER TABLE `floor_plan`
ADD PRIMARY KEY (`floor_plan_id`);

ALTER TABLE `device`
ADD CONSTRAINT `area_relation` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `floor_plan_relation` FOREIGN KEY (`plan_id`) REFERENCES `floor_plan` (`floor_plan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ADD CONSTRAINT `area_relation_2` FOREIGN KEY (`plan_id`) REFERENCES `floor_plan` (`plan_id`) ON DELETE CASCADE ON UPDATE CASCADE,

