-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2021 a las 07:43:18
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsisvacunacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informesvacunacion`
--

CREATE TABLE `informesvacunacion` (
  `FichaVacunacion_ID` int(11) NOT NULL,
  `PexternoID` int(11) DEFAULT NULL,
  `PacienteID` int(11) DEFAULT NULL,
  `SedeID` int(11) DEFAULT NULL,
  `VacunaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informesvacunacion`
--

INSERT INTO `informesvacunacion` (`FichaVacunacion_ID`, `PexternoID`, `PacienteID`, `SedeID`, `VacunaID`) VALUES
(1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `PacienteID` int(11) NOT NULL,
  `Pacientenombre` varchar(50) DEFAULT NULL,
  `Pacienteapellido` varchar(50) DEFAULT NULL,
  `Pacientedireccion` varchar(50) DEFAULT NULL,
  `Pacienteedad` varchar(50) DEFAULT NULL,
  `Pacientetelefono` varchar(50) DEFAULT NULL,
  `Pacientenumdocumento` varchar(50) DEFAULT NULL,
  `Pacientenacionalidad` varchar(50) DEFAULT NULL,
  `Pacientetipodocu` varchar(50) DEFAULT NULL,
  `Pacientecorreo` varchar(50) DEFAULT NULL,
  `Pacientedistrito` varchar(100) DEFAULT NULL,
  `Pacienteprovincia` varchar(100) DEFAULT NULL,
  `Pacientedepartamento` varchar(100) DEFAULT NULL,
  `idvacuna` int(11) DEFAULT NULL,
  `idsede` int(11) DEFAULT NULL,
  `numerodosis` varchar(50) DEFAULT NULL,
  `idROL` int(11) DEFAULT NULL,
  `Pacientedniemision` date DEFAULT NULL,
  `PacienteFechaNac` date DEFAULT NULL,
  `Fechaunodosis` date DEFAULT NULL,
  `fechadosdosis` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`PacienteID`, `Pacientenombre`, `Pacienteapellido`, `Pacientedireccion`, `Pacienteedad`, `Pacientetelefono`, `Pacientenumdocumento`, `Pacientenacionalidad`, `Pacientetipodocu`, `Pacientecorreo`, `Pacientedistrito`, `Pacienteprovincia`, `Pacientedepartamento`, `idvacuna`, `idsede`, `numerodosis`, `idROL`, `Pacientedniemision`, `PacienteFechaNac`, `Fechaunodosis`, `fechadosdosis`) VALUES
(4, 'Alexander Matias', 'Cortez Cantera', 'Av. Esmeralda 2220', '14', '934940454', '81126781', 'Peruano', 'DNI', 'alexma@gmail.com', 'El Agustino', 'Lima', 'Lima', 3, 4, '2', 3, '2021-05-14', '2008-03-11', '2021-10-15', '2021-11-01'),
(6, 'Cristiano', 'Ronaldo', 'Av. la republica 1601', '36', '94013891', '80101381', 'Extranjero', 'Carnet de extranjeria', 'cr7@gmail.com', 'San Juan de Lurigancho', 'LIMA', 'LIMA', 2, 2, '1', 3, '2018-10-15', '1985-02-01', '2021-11-18', '0000-00-00'),
(7, 'Bart', 'Simpson', 'Av grau 1008', '31', '019235897', '12492325', 'Extranjero', 'Carnet de extranjeria', 'bart@gmail.com', 'La Victoria', 'LIMA', 'LIMA', 2, 4, '1', 3, '2017-05-05', '1990-10-20', '2021-10-01', '0000-00-00'),
(8, 'Pedro Daniel', 'Cantera Ramos', 'Psj. Roman Cavero 270', '26', '934940454', '73176187', 'Peruano', 'DNI', 'danielutp95@gmail.com', 'El Agustino', 'LIMA', 'LIMA', 2, 1, '1', 3, '2021-03-01', '1995-05-17', '2021-10-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personalexternos`
--

CREATE TABLE `personalexternos` (
  `PexternoID` int(11) NOT NULL,
  `Pexternonombre` varchar(50) DEFAULT NULL,
  `Pexternoapellido` varchar(50) DEFAULT NULL,
  `Pexternousuario` varchar(100) DEFAULT NULL,
  `Pexternodireccion` varchar(50) DEFAULT NULL,
  `Pexternotelefono` varchar(50) DEFAULT NULL,
  `Pexternodni` varchar(50) DEFAULT NULL,
  `Pexternocorreo` varchar(50) DEFAULT NULL,
  `Pexternocontraseña` varchar(50) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personalexternos`
--

INSERT INTO `personalexternos` (`PexternoID`, `Pexternonombre`, `Pexternoapellido`, `Pexternousuario`, `Pexternodireccion`, `Pexternotelefono`, `Pexternodni`, `Pexternocorreo`, `Pexternocontraseña`, `idrol`) VALUES
(1, 'Luis Carlos', 'Ramos Bailon', 'opluis', 'Av. sucre 871', '90000000', '45127681', 'luisc@gmail.com', 'luis', 1),
(2, 'Jose Daniel', 'Cantera Ramos', 'opjose', 'Av. Santa Rosa 2455', '3275986', '73176178', 'jose@gmail.com', 'jose1', 2),
(3, 'Leonardo', 'Cortez Cantera', 'opleo', 'Av. Esmeralda 260', '3271081', '80138910', 'leonardocp@gmail.com', 'leo1', 0),
(5, 'Mia Alexandra', 'Cristobal Ramos', 'opmia', 'Av. rivaguero 1080', '903765120', '81057182', 'miaalexa@gmail.com', 'mia1', 1),
(6, 'Carlos Alberto', 'Rodríguez Corzo', 'opcarlos', 'Av. 2 de mayo 178', '940457832', '80195412', 'carlosgg@gmail.com', 'dc599a9972fde3045dab59dbd1ae170b', 1),
(7, 'Daniel', 'Cantera Ramos', 'opdaniel', 'Av. independencia 2279', '934940454', '73176189', 'daniel14@gmail.com', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IDrol` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IDrol`, `rol`) VALUES
(1, 'Registrador'),
(2, 'Administrador'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `SedeID` int(11) NOT NULL,
  `nombreSede` varchar(50) DEFAULT NULL,
  `direccionsede` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`SedeID`, `nombreSede`, `direccionsede`, `telefono`) VALUES
(1, 'Parque de la Exposición', 'Av. 28 de Julio 600', '3275986'),
(2, '(SJL) Parque Zonal Huaricocha', 'Av. Próceres de la Independencia 1568', '4575590'),
(3, '(Ate) Estadio Municipal Ollantaytambo', 'Av. Alfonso Ugarte 1549', '4106781'),
(4, '(Breña) Colegio Emblemático Rosa de Santa María', 'Jr Carhuaz 400', '4201918');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `VacunaID` int(11) NOT NULL,
  `Vacunanombre` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`VacunaID`, `Vacunanombre`, `codigo`) VALUES
(2, 'Sinopharm', 'SH001'),
(3, 'Astrazeneca', 'AS001'),
(4, 'Pfizer', 'Pf0001'),
(5, 'Sputnik V', 'SP00V');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informesvacunacion`
--
ALTER TABLE `informesvacunacion`
  ADD PRIMARY KEY (`FichaVacunacion_ID`),
  ADD KEY `PexternoID` (`PexternoID`),
  ADD KEY `SedeID` (`SedeID`),
  ADD KEY `VacunaID` (`VacunaID`),
  ADD KEY `PacienteID` (`PacienteID`) USING BTREE;

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`PacienteID`),
  ADD KEY `idROL` (`idROL`),
  ADD KEY `idsede` (`idsede`),
  ADD KEY `idvacuna` (`idvacuna`);

--
-- Indices de la tabla `personalexternos`
--
ALTER TABLE `personalexternos`
  ADD PRIMARY KEY (`PexternoID`),
  ADD KEY `idrol` (`idrol`) USING BTREE;

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IDrol`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`SedeID`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`VacunaID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informesvacunacion`
--
ALTER TABLE `informesvacunacion`
  MODIFY `FichaVacunacion_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `PacienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personalexternos`
--
ALTER TABLE `personalexternos`
  MODIFY `PexternoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IDrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `SedeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `VacunaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
