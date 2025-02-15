SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsctr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdicon`
--

CREATE TABLE `tdicon` (
  `conide` int(3) NOT NULL COMMENT 'Clave única de contenido',
  `connom` varchar(250) DEFAULT NULL COMMENT 'Nombre del texto dinámico',
  `conexp` varchar(250) NOT NULL COMMENT 'Nombre Explicado de Campo',
  `condes` varchar(250) DEFAULT NULL COMMENT 'Descripción del contenido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tdicon`
--

INSERT INTO `tdicon` (`conide`, `connom`, `conexp`, `condes`) VALUES
(1, 'Título 1', 'Título Principal 1', 'Nuevas Actualizaciones al servicio'),
(2, 'Párrafo 1', 'Subtitulo Principal 1', 'Contamos con una nueva página web que permite a los usuarios conocer planes y rutas en el estado Táchira, estamos trabajando para seguir expandiéndonos.'),
(3, 'Título 2', 'Título Principal 1', 'Conoce las alternativas actuales de nuestra web'),
(4, 'Párrafo 2', 'Subtitulo Principal 1', 'Registrate en el sistema para conocer las rutas y movimiento en tiempo real de las unidades, iremos actualizando nuestros sistemas para brindar la mayor experiencia al usuario.'),
(5, 'Título 3', 'Título Principal 3', 'Precios Solidarios'),
(6, 'Párrafo 3', 'Subtitulo Principal 3', 'Contamos con precios actualizados por gaceta oficial y con sus reconverciones a otras monedas internacionales.'),
(7, 'Precio 1 RC', 'Precio De rutas Cortas', 'Bs.S 10'),
(8, 'Precio 2 RL', 'Precio de Rutas Largas', 'Bs.S 20'),
(9, 'Conv. Precio 1', 'Percio moneda extrangera (rutas cortas)', '2.500 COP'),
(10, 'Conv. Precio 2', 'Precio moneda extrangera (rutas largas)', '4.000 COP'),
(11, 'Serv. Num 1', 'Número emergencia 1', 'Número desconocido'),
(12, 'Serv. Num 2', 'Número emergencia 2', 'Número desconocido'),
(13, 'Serv. Num 3', 'Número emergencia 3', 'Número desconocido'),
(14, 'Apy. Num 1', 'Número de apoyo vial 1', 'Número desconocido'),
(15, 'Apy. Num 2', 'Número de apoyo vial 2', 'Número desconocido'),
(16, 'Apy. Num 3', 'Número de apoyo vial 3', 'Número desconocido'),
(17, 'Ins. Num 1', 'Número de institución 1', 'Número desconocido'),
(18, 'Ins. Num 2', 'Número de institución 2', 'Número desconocido'),
(19, 'Ins. Num 3', 'Número de institución 3', 'Número desconocido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdicup`
--

CREATE TABLE `tdicup` (
  `cupide` int(11) NOT NULL COMMENT 'Clave única de cupo',
  `cupest` varchar(10) NOT NULL COMMENT 'estado del pago'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tdicup`
--

INSERT INTO `tdicup` (`cupide`, `cupest`) VALUES
(0, 'pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdilit`
--

CREATE TABLE `tdilit` (
  `litide` int(11) NOT NULL COMMENT 'Identificador único de la línea de transporte',
  `litnom` varchar(45) DEFAULT NULL COMMENT 'Nombre de la línea de transporte',
  `litdir` varchar(250) DEFAULT NULL COMMENT 'Dirección de la línea de transporte',
  `littel` varchar(12) DEFAULT NULL COMMENT 'Número de teléfono de la línea de transporte',
  `littip` varchar(18) DEFAULT NULL COMMENT 'Tipo de ruta que cubre la linea',
  `horpri` int(11) DEFAULT NULL COMMENT 'Código de Horario Asignado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tdilit`
--

INSERT INTO `tdilit` (`litide`, `litnom`, `litdir`, `littel`, `littip`, `horpri`) VALUES
(1, 'Intercomunal', 'Terminal de pasajeros Genaro Mendez, final de la avenida Manuel Felipe Rugeles, San cristóbal, edo. Táchira.', '', 'Ruta Larga', 1),
(2, 'Transporte San Cristóbal', 'Terminal de pasajeros Genaro Mendez, final de la avenida Manuel Felipe Rugeles, San cristóbal, edo. Táchira.', NULL, 'Ruta Corta', 1),
(3, '21 de Mayo', 'Terminal de pasajeros Genaro Mendez, final de la avenida Manuel Felipe Rugeles, San cristóbal, edo. Táchira.', NULL, 'Ruta Corta', 1),
(4, 'Romulo Gallegos', 'Una cuadra de la fachada del Hospital Vargas y Biblioteca Pública Leonardo Ruiz Pineda.', NULL, 'Ruta Corta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teshot`
--

CREATE TABLE `teshot` (
  `horpri` int(2) NOT NULL COMMENT 'Código del horario',
  `hordec` varchar(250) NOT NULL COMMENT 'Descripción del horario',
  `hortun` varchar(50) NOT NULL COMMENT 'Turno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teshot`
--

INSERT INTO `teshot` (`horpri`, `hordec`, `hortun`) VALUES
(1, '07:00AM / 05:30PM', 'Diurno'),
(2, '05:30PM / Indefinido', 'Nocturno'),
(3, '07:00AM / Indefinido', 'Diurno/Nocturno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesmar`
--

CREATE TABLE `tesmar` (
  `maride` int(11) NOT NULL COMMENT 'Clave única de marca',
  `marnom` varchar(50) DEFAULT NULL COMMENT 'Nombre de marca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tesmar`
--

INSERT INTO `tesmar` (`maride`, `marnom`) VALUES
(1, 'Encava'),
(2, 'Chevrolet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesmod`
--

CREATE TABLE `tesmod` (
  `modide` int(11) NOT NULL COMMENT 'Clave única de Modelo',
  `modnom` varchar(50) DEFAULT NULL COMMENT 'Nombre del Modelo',
  `maride` int(2) NOT NULL COMMENT 'Clave única de marca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tesmod`
--

INSERT INTO `tesmod` (`modide`, `modnom`, `maride`) VALUES
(1, 'ENT 610', 1),
(2, 'C70 BLUE BIRD', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tespas`
--

CREATE TABLE `tespas` (
  `paside` int(2) NOT NULL COMMENT 'Código de\r\nRuta',
  `pasdes` varchar(250) NOT NULL COMMENT 'Descripción de ruta',
  `horpri` int(11) DEFAULT NULL,
  `litide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmacho`
--

CREATE TABLE `tmacho` (
  `choced` int(11) NOT NULL COMMENT 'Clave única de Chofer',
  `chonom` varchar(50) DEFAULT NULL COMMENT 'Nombres de chofer',
  `choape` varchar(50) DEFAULT NULL COMMENT 'Apellidos de chofer',
  `chotef` varchar(12) DEFAULT NULL COMMENT 'Teléfono fijo',
  `chotem` varchar(12) DEFAULT NULL COMMENT 'Teléfono Móvil',
  `chodir` varchar(250) DEFAULT NULL COMMENT 'Dirección de vivienda',
  `chocor` varchar(50) DEFAULT NULL COMMENT 'Correo personal',
  `vehcha` varchar(20) DEFAULT NULL COMMENT 'Código único de chachis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmacho`
--

INSERT INTO `tmacho` (`choced`, `chonom`, `choape`, `chotef`, `chotem`, `chodir`, `chocor`, `vehcha`) VALUES
(29699505, 'Jhosmar David', 'Suarez', '02763551284', '04144586687', 'Pueblo Nuevo,  Barrio el Lobo, calle 4', 'Jhosmarprime@gmail.com', 'ah3525vds5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmaevt`
--

CREATE TABLE `tmaevt` (
  `evtide` int(11) NOT NULL COMMENT 'Código de la evaluación técnica',
  `evtfec` date DEFAULT NULL COMMENT 'Fecha de realización',
  `evtest` varchar(10) DEFAULT 'En espera' COMMENT 'Estado de la evaluación',
  `evtdes` varchar(250) DEFAULT NULL COMMENT 'Descripción de la evaluación',
  `vehcha` varchar(20) DEFAULT NULL COMMENT 'Código único de Chásis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmaevt`
--

INSERT INTO `tmaevt` (`evtide`, `evtfec`, `evtest`, `evtdes`, `vehcha`) VALUES
(0, '2024-01-18', 'En Espera', 'prueba1', 'ah3525vds5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmapro`
--

CREATE TABLE `tmapro` (
  `proced` int(11) NOT NULL COMMENT 'Cédula del propietario',
  `pronom` varchar(50) DEFAULT NULL COMMENT 'Nombres',
  `proape` varchar(50) DEFAULT NULL COMMENT 'Apellidos',
  `protef` varchar(12) DEFAULT NULL COMMENT 'Teléfono Fijo',
  `protem` varchar(12) DEFAULT NULL COMMENT 'Teléfono Móvil',
  `prodir` varchar(250) DEFAULT NULL COMMENT 'Dirección de vivienda',
  `procor` varchar(50) DEFAULT NULL COMMENT 'Correo Personal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmapro`
--

INSERT INTO `tmapro` (`proced`, `pronom`, `proape`, `protef`, `protem`, `prodir`, `procor`) VALUES
(30297698, 'Eduards Alexander', 'Zambrano Castellanos', '02763448614', '04141791571', 'Av. PPAL de Madre Juana I-43', 'eduards_Azc@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmarep`
--

CREATE TABLE `tmarep` (
  `repide` int(11) NOT NULL COMMENT 'Clave única de reporte',
  `reptip` varchar(50) DEFAULT NULL COMMENT 'Tipo de reporte',
  `repdes` text DEFAULT NULL COMMENT 'Descripción de evento',
  `repfec` date DEFAULT NULL COMMENT 'Fecha de realizada el reporte',
  `vehcha` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Clave única de chasís de vehículo',
  `proced` int(8) DEFAULT NULL COMMENT 'Cédula de propietario del vehículo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmasaf`
--

CREATE TABLE `tmasaf` (
  `safide` int(2) NOT NULL COMMENT 'Clave única de afiliación',
  `saffec` date DEFAULT NULL COMMENT 'Fecha de Afiliación',
  `safest` varchar(10) NOT NULL COMMENT 'Estado de la afiliación',
  `cupide` int(2) NOT NULL COMMENT 'Clave única de cupo',
  `vehcha` varchar(20) NOT NULL COMMENT 'Clave única de chasis',
  `proced` int(8) NOT NULL COMMENT 'Clave única de propietario',
  `litide` int(2) NOT NULL COMMENT 'Clave única de línea'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmasaf`
--

INSERT INTO `tmasaf` (`safide`, `saffec`, `safest`, `cupide`, `vehcha`, `proced`, `litide`) VALUES
(0, '2003-08-05', 'Aprobado', 0, 'ah3525vds5', 30297698, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmaveh`
--

CREATE TABLE `tmaveh` (
  `vehcha` varchar(20) NOT NULL COMMENT 'Número único de chasis',
  `vehpla` varchar(8) DEFAULT NULL COMMENT 'Número de placa del vehículo',
  `vehano` varchar(8) DEFAULT NULL COMMENT 'Año del vehículo',
  `vehest` varchar(250) DEFAULT NULL COMMENT 'Estado del vehículo',
  `proced` int(8) NOT NULL COMMENT 'Clave única de Propietario',
  `cupide` int(2) NOT NULL COMMENT 'Clave única de cupo',
  `modide` int(2) NOT NULL COMMENT 'Clave única de modelo',
  `maride` int(11) NOT NULL COMMENT 'Clave única de Marca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmaveh`
--

INSERT INTO `tmaveh` (`vehcha`, `vehpla`, `vehano`, `vehest`, `proced`, `cupide`, `modide`, `maride`) VALUES
('ah3525vds5', 'AA218JG', '2009', 'en_operacion', 30297698, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `travec`
--

CREATE TABLE `travec` (
  `vecide` int(2) NOT NULL COMMENT 'Clave única de tabla',
  `choced` int(8) NOT NULL COMMENT 'Clave única chofer',
  `vehcha` varchar(20) NOT NULL COMMENT 'Clave única de chasis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'Nickname de Usuario',
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correos',
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contraseñas',
  `usrest` int(11) NOT NULL DEFAULT 1 COMMENT 'Estatus de Permiso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usrest`) VALUES
(4, 'Anne Chacón', 'annegmail', '$2y$10$Nm1NYiTmwwZA2PiMZ485FeuPVVW5W4P6rvcwExHPyip1YiqjNnPfi', 1),
(1, 'Carlos Suárez', 'CSuarez@gmail.com', '$2y$10$DYF7VGyDzLcYUJHAU80ssuFVsQ16B4yuVuOhU3g5HM7HPCfJyOPiq', 3),
(2, 'Dariana Gelves', 'darianaylc@gmail.com', '$2y$10$8Kzq8RKcpbPpHJTOqohimeo.MU/n9KwFuCc/9fRt9K6A9kUCO/XW6', 1),
(3, 'Ed Zambrano', 'eduardszambrano24@gmail.com', '$2y$10$32udJ4l00q.IddqqrY2w8uGNBgPtmZt9mroiRw7ZN7o1We2MAn5oG', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tdicon`
--
ALTER TABLE `tdicon`
  ADD PRIMARY KEY (`conide`);

--
-- Indices de la tabla `tdicup`
--
ALTER TABLE `tdicup`
  ADD PRIMARY KEY (`cupide`);

--
-- Indices de la tabla `tdilit`
--
ALTER TABLE `tdilit`
  ADD PRIMARY KEY (`litide`),
  ADD KEY `fk_horpri` (`horpri`);

--
-- Indices de la tabla `teshot`
--
ALTER TABLE `teshot`
  ADD PRIMARY KEY (`horpri`);

--
-- Indices de la tabla `tesmar`
--
ALTER TABLE `tesmar`
  ADD PRIMARY KEY (`maride`);

--
-- Indices de la tabla `tesmod`
--
ALTER TABLE `tesmod`
  ADD PRIMARY KEY (`modide`,`maride`),
  ADD KEY `fk_modmar1` (`maride`);

--
-- Indices de la tabla `tespas`
--
ALTER TABLE `tespas`
  ADD PRIMARY KEY (`paside`),
  ADD KEY `fk_horpri2` (`horpri`),
  ADD KEY `fk_litide2` (`litide`);

--
-- Indices de la tabla `tmacho`
--
ALTER TABLE `tmacho`
  ADD PRIMARY KEY (`choced`),
  ADD KEY `fk_chofvehcha` (`vehcha`);

--
-- Indices de la tabla `tmaevt`
--
ALTER TABLE `tmaevt`
  ADD PRIMARY KEY (`evtide`),
  ADD KEY `fk_vehchatmaevt` (`vehcha`);

--
-- Indices de la tabla `tmapro`
--
ALTER TABLE `tmapro`
  ADD PRIMARY KEY (`proced`);

--
-- Indices de la tabla `tmarep`
--
ALTER TABLE `tmarep`
  ADD PRIMARY KEY (`repide`),
  ADD KEY `fk_vehcharep` (`vehcha`),
  ADD KEY `fk_procedrep` (`proced`);

--
-- Indices de la tabla `tmasaf`
--
ALTER TABLE `tmasaf`
  ADD PRIMARY KEY (`safide`,`cupide`,`vehcha`,`proced`,`litide`),
  ADD KEY `fk_safcup1` (`cupide`),
  ADD KEY `fk_safveh1` (`vehcha`,`proced`),
  ADD KEY `fk_saflit1` (`litide`);

--
-- Indices de la tabla `tmaveh`
--
ALTER TABLE `tmaveh`
  ADD PRIMARY KEY (`vehcha`,`proced`,`cupide`,`modide`,`maride`),
  ADD KEY `fk_vehpro1` (`proced`),
  ADD KEY `fk_vehmod1` (`modide`,`maride`);

--
-- Indices de la tabla `travec`
--
ALTER TABLE `travec`
  ADD PRIMARY KEY (`vecide`,`choced`,`vehcha`),
  ADD KEY `fk_vehcho1` (`choced`),
  ADD KEY `fk_vehcho2` (`vehcha`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `users_id_unique` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tdicon`
--
ALTER TABLE `tdicon`
  MODIFY `conide` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Clave única de contenido', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `teshot`
--
ALTER TABLE `teshot`
  MODIFY `horpri` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Código del horario', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tespas`
--
ALTER TABLE `tespas`
  MODIFY `paside` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Código de\r\nRuta';

--
-- AUTO_INCREMENT de la tabla `tmarep`
--
ALTER TABLE `tmarep`
  MODIFY `repide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave única de reporte';

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tdilit`
--
ALTER TABLE `tdilit`
  ADD CONSTRAINT `fk_horpri` FOREIGN KEY (`horpri`) REFERENCES `teshot` (`horpri`);

--
-- Filtros para la tabla `tesmod`
--
ALTER TABLE `tesmod`
  ADD CONSTRAINT `fk_modmar1` FOREIGN KEY (`maride`) REFERENCES `tesmar` (`maride`);

--
-- Filtros para la tabla `tespas`
--
ALTER TABLE `tespas`
  ADD CONSTRAINT `fk_horpri2` FOREIGN KEY (`horpri`) REFERENCES `teshot` (`horpri`),
  ADD CONSTRAINT `fk_litide2` FOREIGN KEY (`litide`) REFERENCES `tdilit` (`litide`);

--
-- Filtros para la tabla `tmacho`
--
ALTER TABLE `tmacho`
  ADD CONSTRAINT `fk_chofvehcha` FOREIGN KEY (`vehcha`) REFERENCES `tmaveh` (`vehcha`);

--
-- Filtros para la tabla `tmaevt`
--
ALTER TABLE `tmaevt`
  ADD CONSTRAINT `fk_vehchatmaevt` FOREIGN KEY (`vehcha`) REFERENCES `tmaveh` (`vehcha`);

--
-- Filtros para la tabla `tmarep`
--
ALTER TABLE `tmarep`
  ADD CONSTRAINT `fk_procedrep` FOREIGN KEY (`proced`) REFERENCES `tmapro` (`proced`),
  ADD CONSTRAINT `fk_vehcharep` FOREIGN KEY (`vehcha`) REFERENCES `tmaveh` (`vehcha`);

--
-- Filtros para la tabla `tmasaf`
--
ALTER TABLE `tmasaf`
  ADD CONSTRAINT `fk_safcup1` FOREIGN KEY (`cupide`) REFERENCES `tdicup` (`cupide`),
  ADD CONSTRAINT `fk_saflit1` FOREIGN KEY (`litide`) REFERENCES `tdilit` (`litide`),
  ADD CONSTRAINT `fk_safveh1` FOREIGN KEY (`vehcha`,`proced`) REFERENCES `tmaveh` (`vehcha`, `proced`);

--
-- Filtros para la tabla `tmaveh`
--
ALTER TABLE `tmaveh`
  ADD CONSTRAINT `fk_vehmod1` FOREIGN KEY (`modide`,`maride`) REFERENCES `tesmod` (`modide`, `maride`),
  ADD CONSTRAINT `fk_vehpro1` FOREIGN KEY (`proced`) REFERENCES `tmapro` (`proced`);

--
-- Filtros para la tabla `travec`
--
ALTER TABLE `travec`
  ADD CONSTRAINT `fk_vehcho1` FOREIGN KEY (`choced`) REFERENCES `tmacho` (`choced`),
  ADD CONSTRAINT `fk_vehcho2` FOREIGN KEY (`vehcha`) REFERENCES `tmaveh` (`vehcha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
