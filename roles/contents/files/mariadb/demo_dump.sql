SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `quote` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `phrase` varchar(255) NOT NULL,
  `state` int(1) default 1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10;


ALTER TABLE `quote` ADD INDEX (`state`);

DELETE From `quote`;

INSERT INTO `quote` (`id`, `phrase`) VALUES
(1, 'An apple a day keeps the doctor away.' ),
(2, 'A rose by any other name would smell as sweet' ),
(3, 'The more things change, the more they stay the same,' ),
(4, 'The grass is always greener on the other side.' ),
(5, 'There is more than one way to skin a cat.' ),
(6, 'You have to kiss a few frogs before you find a prince.' ),
(7, 'A penny saved is a penny earned.' ),
(8, 'It\'s not the heat, it\'s the humidity.' ),
(9, 'Beware of Greeks bearing gifts.' );
