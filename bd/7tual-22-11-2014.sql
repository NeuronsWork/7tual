-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2014 a las 10:25:08
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `7tual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE IF NOT EXISTS `business` (
`id_business` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `razon_social` varchar(45) NOT NULL,
  `id_country` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `id_category_father` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `id_category_father`, `date_created`, `date_modified`, `status`) VALUES
(1, 'Deporte', NULL, '2014-10-01 03:30:00', '2014-10-15 03:30:00', 1),
(2, 'Música', NULL, '2014-10-07 03:30:00', '2014-10-15 03:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id_city` int(11) NOT NULL,
  `code_country` varchar(2) NOT NULL,
  `name_city` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`id_city`, `code_country`, `name_city`, `date_created`, `date_modified`, `status`) VALUES
(1, 'PE', 'Lima', '2014-10-13 06:51:40', '2014-10-25 06:51:40', 1),
(2, 'PE', 'Callao', '2014-10-13 06:51:40', '2014-10-25 06:51:40', 1),
(3, 'PE', 'Miraflores', '2014-10-13 06:51:40', '2014-10-25 06:51:40', 1),
(4, 'ES', 'Madrid', '2014-10-13 06:51:40', '2014-10-25 06:51:40', 1),
(5, 'ES', 'Barcelona', '2014-10-13 06:51:40', '2014-10-25 06:51:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`id_country` int(11) NOT NULL,
  `code_country` varchar(45) NOT NULL,
  `name_country` varchar(45) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(1) NOT NULL,
  `country_enabled` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id_country`, `code_country`, `name_country`, `date_created`, `date_modified`, `status`, `country_enabled`) VALUES
(1, 'PE', 'Perú', '2014-10-10 06:51:40', '2014-11-21 06:49:01', 1, 1),
(2, 'ES', 'España', '2014-10-10 06:51:40', '2014-11-21 06:46:46', 1, 1),
(4, 'AR', 'Argentina', '2014-11-21 04:29:47', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`id_event` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_country` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `image_video` varchar(500) NOT NULL,
  `like` varchar(25) DEFAULT NULL,
  `date_open` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
`id_manager` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `manager`
--

INSERT INTO `manager` (`id_manager`, `id_profile`, `user`, `password`, `name`, `email`, `date_created`, `date_modified`, `status`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'enjey11@gmail.com', '2014-10-01 00:00:00', '2014-10-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manager_profile`
--

CREATE TABLE IF NOT EXISTS `manager_profile` (
`id_profile` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `manager_profile`
--

INSERT INTO `manager_profile` (`id_profile`, `name`, `date_created`, `status`) VALUES
(1, 'administrador', '2014-10-21 19:24:34', 1),
(2, 'user web', '2014-10-21 19:24:34', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message_contact`
--

CREATE TABLE IF NOT EXISTS `message_contact` (
`id_message` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notion`
--

CREATE TABLE IF NOT EXISTS `notion` (
`id_notion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `code_country` varchar(2) NOT NULL,
  `id_city` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `video` varchar(500) DEFAULT NULL,
  `tags` varchar(500) NOT NULL,
  `like` varchar(25) DEFAULT '0',
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `vip` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notion`
--

INSERT INTO `notion` (`id_notion`, `id_user`, `id_category`, `code_country`, `id_city`, `title`, `slug`, `description`, `video`, `tags`, `like`, `date_created`, `date_modified`, `vip`, `status`) VALUES
(10, 1, 1, 'PE', 3, 'Lorem', '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat', 'http://www.youtube.com/watch?v=8iPcqtHoR3U', ' DSDS', '0', '2014-10-15 12:44:28', '2014-11-15 12:44:28', 1, 1),
(11, 1, 2, 'PE', 2, 'Lorem ipsum dolor', '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat', '', 'SDSDS', '0', '2014-11-19 18:40:24', '2014-11-15 18:47:24', 1, 1),
(12, 1, 1, 'PE', 3, 'consetetur sadipscing elitr', '', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat Lorem ipsum dolor sit amet,', 'https://www.youtube.com/watch?v=9FWgcBfs5A0', 'consetetur, sadipscing, elitr', '0', '2014-10-15 01:48:17', '2014-11-15 01:48:17', 0, 1),
(14, 1, 2, 'PE', 3, 'seven tual inaguracion', NULL, 'El grupo vocal “Siempre Así” nace en Sevilla en la primavera de 1991. ', 'https://www.youtube.com/watch?v=9FWgcBfs5A0', 'seven, tual, 7tual', '0', '2014-11-21 11:10:53', '2014-11-21 11:10:53', 0, 0),
(15, 1, 2, 'PE', 3, 'seven tual inaguracion', NULL, 'El grupo vocal “Siempre Así” nace en Sevilla en la primavera de 1991. ', '', 'seven, tual, 7tual', '0', '2014-11-21 11:10:53', '2014-11-21 11:10:53', 0, 0),
(16, 1, 2, 'PE', 3, 'seven tual inaguracion', NULL, 'El grupo vocal “Siempre Así” nace en Sevilla en la primavera de 1991. ', 'https://www.youtube.com/watch?v=9FWgcBfs5A0', 'seven, tual, 7tual', '0', '2014-11-21 11:10:53', '2014-11-21 11:10:53', 0, 0),
(17, 1, 2, 'PE', 3, 'seven tual inaguracion', NULL, 'El grupo vocal “Siempre Así” nace en Sevilla en la primavera de 1991. ', '', 'seven, tual, 7tual', '0', '2014-11-21 11:10:53', '2014-11-21 11:10:53', 0, 0),
(18, 1, 2, 'PE', 3, 'seven tual inaguracion', NULL, 'El grupo vocal “Siempre Así” nace en Sevilla en la primavera de 1991. ', 'https://www.youtube.com/watch?v=9FWgcBfs5A0', 'seven, tual, 7tual', '0', '2014-11-21 11:10:53', '2014-11-21 11:10:53', 0, 0),
(29, 1, 1, 'PE', 1, 'prueba relation 7tual', NULL, 'prueba relation 7tual prueba relation 7tual prueba relation 7tualprueba relation 7tual prueba relation 7tual', '', '7tual, relation, prueba', '0', '2014-11-21 09:02:45', '2014-11-21 09:02:45', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relation_like_event`
--

CREATE TABLE IF NOT EXISTS `relation_like_event` (
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relation_lincc`
--

CREATE TABLE IF NOT EXISTS `relation_lincc` (
`id_relation` int(11) NOT NULL,
  `id_notion` int(11) NOT NULL,
  `code_country` varchar(2) NOT NULL,
  `id_city` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relation_lincc`
--

INSERT INTO `relation_lincc` (`id_relation`, `id_notion`, `code_country`, `id_city`, `likes`) VALUES
(3, 29, 'PE', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id_slider` int(11) NOT NULL,
  `code_country` varchar(45) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id_slider`, `code_country`, `title`, `image`, `video`, `date_created`, `date_modified`, `status`) VALUES
(1, 'PE', 'En 7tual, trabajamos con empresas de tu ciudad para descubrir y organizar los eventos más solicitados.', 'slider-bg1.jpg', NULL, '2014-11-19 23:09:09', '2014-11-19 23:09:09', 1),
(2, 'PE', 'En 7tual, trabajamos con empresas de tu ciudad para descubrir y organizar los eventos más solicitados.', 'slider-bg1.jpg', 'https://www.youtube.com/watch?v=K8q5boZdKuU', '2014-11-19 23:09:09', '2014-11-19 23:09:09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `id_profile` varchar(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `code_country` varchar(2) NOT NULL,
  `id_city` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_last_access` datetime DEFAULT NULL,
  `activation_key` varchar(45) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `id_profile`, `user`, `pwd`, `name`, `email`, `code_country`, `id_city`, `date_created`, `date_modified`, `date_last_access`, `activation_key`, `status`) VALUES
(1, '2', 'enjey11', 'bcc3af745ad38fb6599d9dac22b5ede3', 'Neyber BZ', 'enjey11@gmail.com', 'PE', 1, '2014-10-25 06:51:40', '2014-10-25 06:51:40', '2014-10-25 06:51:40', '', 1),
(2, '2', 'jlazo', 'bcc3af745ad38fb6599d9dac22b5ede3', 'Javier Lazo', 'jlazo@gmail.com', 'PE', 1, '2014-10-25 06:51:40', '2014-10-25 06:51:40', '2014-10-25 06:51:40', '', 1),
(35, '2', 'neyberbz', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'neyberbz@gmail.com', 'ES', 5, '2014-11-14 11:12:20', '2014-11-14 11:12:20', NULL, '7f2724075f2d84f36bd36fb48a05003a', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `role`, `key`, `active`) VALUES
(1, 'admin', '0c7540eb7e65b553ec1ba6b20de79608', 'Admin2', 'Account', 'email@email.com', 100, '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `business`
--
ALTER TABLE `business`
 ADD PRIMARY KEY (`id_business`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id_city`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`id_country`);

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`id_event`);

--
-- Indices de la tabla `manager`
--
ALTER TABLE `manager`
 ADD PRIMARY KEY (`id_manager`);

--
-- Indices de la tabla `manager_profile`
--
ALTER TABLE `manager_profile`
 ADD PRIMARY KEY (`id_profile`);

--
-- Indices de la tabla `message_contact`
--
ALTER TABLE `message_contact`
 ADD PRIMARY KEY (`id_message`);

--
-- Indices de la tabla `notion`
--
ALTER TABLE `notion`
 ADD PRIMARY KEY (`id_notion`);

--
-- Indices de la tabla `relation_lincc`
--
ALTER TABLE `relation_lincc`
 ADD PRIMARY KEY (`id_relation`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_slider`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
MODIFY `id_business` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `event`
--
ALTER TABLE `event`
MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `manager`
--
ALTER TABLE `manager`
MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `manager_profile`
--
ALTER TABLE `manager_profile`
MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `message_contact`
--
ALTER TABLE `message_contact`
MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notion`
--
ALTER TABLE `notion`
MODIFY `id_notion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `relation_lincc`
--
ALTER TABLE `relation_lincc`
MODIFY `id_relation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
