# loginCRUDtwotables
Login and then CRUD of a few records.
To set this site working on a localhost environment, create two databases with one table in each one. Then records will be inserted into the tables. 

In simpler terms, setup your local environment by using XXAMP for Windows, LAMP for Linux, or MAMP for OSX. Once you are in PHPMyAdmin, input this SQL. Copy @ Paste

CRUD database

Step1

CREATE DATABASE IF NOT EXISTS `page_records` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `page_records`; CREATE TABLE `safety` (
  `id` int(11) NOT NULL,
  `ins_n` varchar(4) CHARACTER SET ascii NOT NULL,
  `explanation` text CHARACTER SET ascii NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

Step 2:

INSERT INTO `page_records`.`safety` (`id`, `ins_n`, `explanation`, `date`) VALUES
(1, '001A', 'Employee got injured.. test', '0000-00-00'),
(2, '002B', 'testing', '0000-00-00'),
(3, '003', 'test', '2014-01-28'),
(4, '101', 'Testing', '2016-02-22')


Database for Login/Logout:

Step 3

CREATE DATABASE IF NOT EXISTS `accounts` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `accounts`; CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) CHARACTER SET ascii NOT NULL,
  `password` varchar(100) CHARACTER SET ascii NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

Step 4

INSERT INTO `accounts`.`users` (`id`, `username`, `password`, `active`) VALUES
(1, 'test', 'pw', 1);






From here, move all files to the localhost root folder. Depending on your setup the root folder by default is either www or htdocs. Make sure Apache and MySQL is running. Finally in the browser enter the URL localhost/logincrud/login/index.php. 

Username:test
Password:pw
