
--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `crudtable`
--

CREATE TABLE IF NOT EXISTS `crudtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `favjob` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


