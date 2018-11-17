START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`division` (`id_division`, `nombre`) VALUES (1, 'Ciencias Basicas e Ingenieria');
INSERT INTO `encuestas`.`division` (`id_division`, `nombre`) VALUES (2, 'Ciencias Sociales y Humanidades');
INSERT INTO `encuestas`.`division` (`id_division`, `nombre`) VALUES (3, 'Ciencias y Artes para el Diseño');

COMMIT;


-- -----------------------------------------------------
-- Data for table `encuestas`.`carrera`
-- -----------------------------------------------------
START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (1, 'Ingeniería en Computación', 1);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (2, 'Ingeniería Electrónica', 1);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (3, 'Ingeniería Ambiental', 1);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (4, 'Ingeniería Física', 1);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (5, 'Licenciatura en Administración', 2);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (6, 'Licenciatura en Derecho', 2);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (7, 'Licenciatura en Economía', 2);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (8, 'Licenciatura en Diseño de la Comunicación Gráfica', 3);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (9, 'Licenciatura en Diseño Industrial', 3);
INSERT INTO `encuestas`.`carrera` (`id_carrera`, `nombre`, `id_division`) VALUES (10, 'Licanciatura en Arquitectura', 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `encuestas`.`matricula`
-- -----------------------------------------------------
START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('2143032439');
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('2143032438');
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('2143020202');
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('2143030303');
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('123');
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('456');
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('789');
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('2143123456');
INSERT INTO `encuestas`.`matricula` (`matricula`) VALUES ('2143456789');

COMMIT;


-- -----------------------------------------------------
-- Data for table `encuestas`.`alumno`
-- -----------------------------------------------------
START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`alumno` (`matricula`, `nombre`, `paterno`, `materno`, `id_carrera`, `correo`) VALUES ('2143032439', 'Emilio', 'Hernandez', 'Segovia', 1, 'mok.boss@hotmail.com');
INSERT INTO `encuestas`.`alumno` (`matricula`, `nombre`, `paterno`, `materno`, `id_carrera`, `correo`) VALUES ('2143032438', 'Daniel', 'Gomez', 'Perez', 4, 'daniel.gomez@correo.com');
INSERT INTO `encuestas`.`alumno` (`matricula`, `nombre`, `paterno`, `materno`, `id_carrera`, `correo`) VALUES ('2143030303', 'Juan', 'Perez', 'Torres', 5, 'juan.perez@correo.com');
INSERT INTO `encuestas`.`alumno` (`matricula`, `nombre`, `paterno`, `materno`, `id_carrera`, `correo`) VALUES ('2143020202', 'Fernanda', 'Michelena', 'Cabrera', 8, 'fernanda.michelena@correo.com');
INSERT INTO `encuestas`.`alumno` (`matricula`, `nombre`, `paterno`, `materno`, `id_carrera`, `correo`) VALUES ('2143123456', 'Laura', 'Chapoy', 'Sola', 9, 'laura.chapoy@correo.com');
INSERT INTO `encuestas`.`alumno` (`matricula`, `nombre`, `paterno`, `materno`, `id_carrera`, `correo`) VALUES ('2143456789', 'Carlos', 'Martinez', 'Angeles', 7, 'calos.martinez@correo.com');

COMMIT;


-- -----------------------------------------------------
-- Data for table `encuestas`.`rol`
-- -----------------------------------------------------
START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`rol` (`id_rol`, `rol`) VALUES (2, 'alumno');
INSERT INTO `encuestas`.`rol` (`id_rol`, `rol`) VALUES (1, 'admin');

COMMIT;


-- -----------------------------------------------------
-- Data for table `encuestas`.`login`
-- -----------------------------------------------------
START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`login` (`matricula`, `password`, `id_rol`) VALUES ('2143032439', '2143032439', 2);
INSERT INTO `encuestas`.`login` (`matricula`, `password`, `id_rol`) VALUES ('2143032438', '2143032438', 2);
INSERT INTO `encuestas`.`login` (`matricula`, `password`, `id_rol`) VALUES ('123', '123', 1);
INSERT INTO `encuestas`.`login` (`matricula`, `password`, `id_rol`) VALUES ('456', '456', 1);
INSERT INTO `encuestas`.`login` (`matricula`, `password`, `id_rol`) VALUES ('789', '789', 1);
INSERT INTO `encuestas`.`login` (`matricula`, `password`, `id_rol`) VALUES ('2143123456', '2143123456', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `encuestas`.`encuesta`
-- -----------------------------------------------------
START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`encuesta` (`id_encuesta`, `titulo`, `descripcion`, `abre`, `cierra`, `creacion`) VALUES (default, 'Paro', 'Por falta de agua', now(), now() + interval 1 day, default);
INSERT INTO `encuestas`.`encuesta` (`id_encuesta`, `titulo`, `descripcion`, `abre`, `cierra`, `creacion`) VALUES (default, 'Paro', 'Por falta de rector', now(), now() + interval 1 day, default);

COMMIT;


-- -----------------------------------------------------
-- Data for table `encuestas`.`opcion`
-- -----------------------------------------------------
START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`opcion` (`id_opcion`, `id_encuesta`, `opcion`) VALUES (default, 1, 'si');
INSERT INTO `encuestas`.`opcion` (`id_opcion`, `id_encuesta`, `opcion`) VALUES (default, 1, 'no');
INSERT INTO `encuestas`.`opcion` (`id_opcion`, `id_encuesta`, `opcion`) VALUES (default, 2, 'si');
INSERT INTO `encuestas`.`opcion` (`id_opcion`, `id_encuesta`, `opcion`) VALUES (default, 2, 'no');

COMMIT;


-- -----------------------------------------------------
-- Data for table `encuestas`.`administrador`
-- -----------------------------------------------------
START TRANSACTION;
USE `encuestas`;
INSERT INTO `encuestas`.`administrador` (`matricula`, `nombre`) VALUES ('123', 'AdminUno');
INSERT INTO `encuestas`.`administrador` (`matricula`, `nombre`) VALUES ('456', 'AdminDos');
INSERT INTO `encuestas`.`administrador` (`matricula`, `nombre`) VALUES ('789', 'AdminTres');

COMMIT;

