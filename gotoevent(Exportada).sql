-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2018 a las 00:44:10
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gotoevent`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `ID_Artist` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Portrait` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`ID_Artist`, `Name`, `Description`, `Gender`, `Status`, `Portrait`) VALUES
(27, 'Queen', 'Rock', 'Rock', 'Activo', 'Sin Imagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendars`
--

CREATE TABLE `calendars` (
  `ID_Calendar` int(11) NOT NULL,
  `CalendarDate` date NOT NULL,
  `ID_Event` int(11) NOT NULL,
  `ID_Place_Event` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendars`
--

INSERT INTO `calendars` (`ID_Calendar`, `CalendarDate`, `ID_Event`, `ID_Place_Event`, `Status`) VALUES
(13, '2021-03-03', 13, 8, ''),
(14, '2020-03-03', 15, 8, ''),
(15, '2015-01-01', 13, 7, ''),
(16, '2021-02-02', 15, 7, ''),
(17, '2018-01-01', 13, 7, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendarxartist`
--

CREATE TABLE `calendarxartist` (
  `ID_Artist` int(11) NOT NULL,
  `ID_Calendar` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendarxartist`
--

INSERT INTO `calendarxartist` (`ID_Artist`, `ID_Calendar`, `Status`) VALUES
(27, 13, ''),
(27, 13, ''),
(27, 14, ''),
(27, 13, ''),
(27, 16, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `ID_Category` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`ID_Category`, `Status`, `Description`) VALUES
(5, '', 'Karaoke'),
(6, '', 'Pachanga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `ID_Client` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `DNI` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`ID_Client`, `Name`, `Surname`, `Status`, `DNI`) VALUES
(2, 'Franco', 'Mischuk', '', 37983714);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `ID_Event` int(11) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `ID_Category` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`ID_Event`, `Title`, `ID_Category`, `Status`, `image`) VALUES
(13, 'Lollapaloza', 6, '', 'Sin Imagen'),
(15, 'Lollapalozaasda', 5, '', 'View/img/events/Lollapalozaasda.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `place_events`
--

CREATE TABLE `place_events` (
  `ID_Place_Event` int(11) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `place_events`
--

INSERT INTO `place_events` (`ID_Place_Event`, `Quantity`, `Status`, `Description`) VALUES
(7, 1, '', 'Corrientes'),
(8, 100000, '', 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `ID_Purchase` int(11) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_lines`
--

CREATE TABLE `purchase_lines` (
  `ID_Purchase_Line` int(11) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `ID_Purchase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `square_events`
--

CREATE TABLE `square_events` (
  `ID_Square_Event` int(11) NOT NULL,
  `Remainder` varchar(30) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `Quantity_available` int(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `ID_Calendar` int(11) NOT NULL,
  `ID_Square_Kind` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `square_events`
--

INSERT INTO `square_events` (`ID_Square_Event`, `Remainder`, `Price`, `Quantity_available`, `Status`, `ID_Calendar`, `ID_Square_Kind`) VALUES
(20, '100', 100.00, 100, '', 13, 11),
(21, '300', 300.00, 300, '', 13, 10),
(22, '4', 3.00, 2, '', 13, 11),
(23, '476', 987.00, 5634, '', 14, 11),
(24, '2', 4.00, 2, '', 14, 10),
(25, '92', 29.00, 2, '', 13, 11),
(26, '2', 2.00, 2, '', 16, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `square_kinds`
--

CREATE TABLE `square_kinds` (
  `ID_Square_Kind` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `square_kinds`
--

INSERT INTO `square_kinds` (`ID_Square_Kind`, `Description`, `Status`) VALUES
(10, 'En el suelo', ''),
(11, 'Silla', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `ID_Ticket` int(11) NOT NULL,
  `TicketNumber` int(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `QR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID_User` int(11) NOT NULL,
  `User` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Privilege` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID_User`, `User`, `Password`, `Privilege`) VALUES
(1, 'Admin@gmail.com', 'admin', 1),
(2, 'User@gmail.com', 'user', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ID_Artist`);

--
-- Indices de la tabla `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`ID_Calendar`),
  ADD KEY `ID_Event` (`ID_Event`);

--
-- Indices de la tabla `calendarxartist`
--
ALTER TABLE `calendarxartist`
  ADD KEY `ID_Artist` (`ID_Artist`),
  ADD KEY `ID_Calendar` (`ID_Calendar`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID_Client`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID_Event`),
  ADD UNIQUE KEY `Title` (`Title`),
  ADD KEY `ID_Category` (`ID_Category`);

--
-- Indices de la tabla `place_events`
--
ALTER TABLE `place_events`
  ADD PRIMARY KEY (`ID_Place_Event`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`ID_Purchase`),
  ADD KEY `ID_Client` (`ID_Client`);

--
-- Indices de la tabla `purchase_lines`
--
ALTER TABLE `purchase_lines`
  ADD PRIMARY KEY (`ID_Purchase_Line`),
  ADD KEY `ID_Purchase` (`ID_Purchase`);

--
-- Indices de la tabla `square_events`
--
ALTER TABLE `square_events`
  ADD PRIMARY KEY (`ID_Square_Event`),
  ADD KEY `ID_Square_Kind` (`ID_Square_Kind`),
  ADD KEY `ID_Calendar` (`ID_Calendar`);

--
-- Indices de la tabla `square_kinds`
--
ALTER TABLE `square_kinds`
  ADD PRIMARY KEY (`ID_Square_Kind`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID_Ticket`),
  ADD UNIQUE KEY `TicketNumber` (`TicketNumber`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `Privilege` (`Privilege`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `ID_Artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `calendars`
--
ALTER TABLE `calendars`
  MODIFY `ID_Calendar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `ID_Event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `place_events`
--
ALTER TABLE `place_events`
  MODIFY `ID_Place_Event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `ID_Purchase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchase_lines`
--
ALTER TABLE `purchase_lines`
  MODIFY `ID_Purchase_Line` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `square_events`
--
ALTER TABLE `square_events`
  MODIFY `ID_Square_Event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `square_kinds`
--
ALTER TABLE `square_kinds`
  MODIFY `ID_Square_Kind` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID_Ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendars`
--
ALTER TABLE `calendars`
  ADD CONSTRAINT `calendars_ibfk_1` FOREIGN KEY (`ID_Event`) REFERENCES `events` (`ID_Event`);

--
-- Filtros para la tabla `calendarxartist`
--
ALTER TABLE `calendarxartist`
  ADD CONSTRAINT `calendarxartist_ibfk_1` FOREIGN KEY (`ID_Artist`) REFERENCES `artists` (`ID_Artist`),
  ADD CONSTRAINT `calendarxartist_ibfk_2` FOREIGN KEY (`ID_Calendar`) REFERENCES `calendars` (`ID_Calendar`);

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`ID_Category`) REFERENCES `categories` (`ID_Category`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `clients` (`ID_Client`);

--
-- Filtros para la tabla `purchase_lines`
--
ALTER TABLE `purchase_lines`
  ADD CONSTRAINT `purchase_lines_ibfk_1` FOREIGN KEY (`ID_Purchase`) REFERENCES `purchases` (`ID_Purchase`);

--
-- Filtros para la tabla `square_events`
--
ALTER TABLE `square_events`
  ADD CONSTRAINT `ID_Calendar` FOREIGN KEY (`ID_Calendar`) REFERENCES `calendars` (`ID_Calendar`),
  ADD CONSTRAINT `square_events_ibfk_1` FOREIGN KEY (`ID_Square_Kind`) REFERENCES `square_kinds` (`ID_Square_Kind`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
