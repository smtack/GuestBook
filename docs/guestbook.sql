CREATE DATABASE `guestbook`;

USE `guestbook`;

CREATE TABLE `posts` (
  `post_id` INT NOT NULL AUTO_INCREMENT,
  `post_content` VARCHAR(500) NOT NULL,
  `post_by` VARCHAR(64) NOT NULL,
  `post_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(post_id)
)ENGINE=INNODB;