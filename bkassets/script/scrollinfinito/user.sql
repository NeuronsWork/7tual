-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-12-2012 a las 21:38:31
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `user`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `registro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `password`, `email`, `fecha`, `registro`) VALUES
(1, 'Juan', 'Palomo', 'juan', '12345678', 'juan@mail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Pedro', 'Palomo', 'pedro', '12345678', 'pedro@mail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Andrés', 'Palomo', 'andres', '25d55ad283aa400af464c76d713c07ad', 'andres@mail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Mario', 'Quesada', 'marito', '87b750fdfeb4468f58c3247b303704ab', 'Mario@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'sdfsdf', 'sdfsdf', 'yowinxd', 'f7bb17dc5512b84c1175dab3311e0861', 'dfffffffff@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'carlos', 'alcantara', 'charl2327', '27d1831eb32a579b2bb7c2dbc8b03506', 'jordan-carl@hotmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'lenier', 'perez ahmed', 'lahmed', 'e25f9c2334b00cc5f0f11698b8b002ba', 'lenierp@lajiribilla.cu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Leonaro', 'Daniel', 'danielmns900', '93a32a1fe7eec938f5da181493fdfa70', 'leonardor@hotmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'dfsdfds', 'fdfsfs', 'dsds', '76d66c5a5356104a8fc6784e007d9c33', 'isra.olidasd@sdsd.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'fd', 'wqwwqwqwq', 'qwertt', '9413e403071030958320f9d62cb4b4ac', 'y@ddd.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'asdasdasqw', 'asdasd asd', 'asd', 'b48d3e072234aa73a0eeb3e31e72c4d8', 'das@hotmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Emerson', 'Herrera', 'hola', 'f5427c686cb91b020c69c1ebb8b19cf3', 'emer@has.co', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
