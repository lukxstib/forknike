SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `forknight_score` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `score` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `forknight_score`
  ADD PRIMARY KEY (`id`);