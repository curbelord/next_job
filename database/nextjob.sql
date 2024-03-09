-- CREATE DATABASE nextjob;
-- USE nextjob;

DROP TABLE IF EXISTS Usuario;
DROP TABLE IF EXISTS Demandante;
DROP TABLE IF EXISTS Empresa;
DROP TABLE IF EXISTS Seleccionador;
DROP TABLE IF EXISTS CV;
DROP TABLE IF EXISTS Estudios;
DROP TABLE IF EXISTS Experiencia;
DROP TABLE IF EXISTS Oferta;
DROP TABLE IF EXISTS Calendario;
-- DROP TABLE IF EXISTS Alerta;
DROP TABLE IF EXISTS Mensaje;
DROP TABLE IF EXISTS Cuestionario;
DROP TABLE IF EXISTS Pregunta;
DROP TABLE IF EXISTS Inscripcion;

CREATE TABLE Usuario (
    id INT,
    nombre VARCHAR (255) NOT NULL,
    apellidos VARCHAR (255) NOT NULL,
    genero VARCHAR (10),
    fecha_nacimiento DATE NOT NULL,
    -- edad --> propiedad calculada en base a la fecha de nacimiento
    direccion VARCHAR (255),
    correo VARCHAR (255) NOT NULL,
    telefono VARCHAR (255) NOT NULL,
    CONSTRAINT usuario_correo_uq UNIQUE (correo),
    CONSTRAINT usuario_telefono_uq UNIQUE (telefono),
    CONSTRAINT usuario_id_pk PRIMARY KEY (id),
    CONSTRAINT usuario_genero_ck CHECK (genero IN ('Hombre', 'Mujer', 'Otro'))
);

CREATE TABLE Demandante (
    id INT, 
    CONSTRAINT demandante_id_fk FOREIGN KEY (id) REFERENCES Usuario(id) ON DELETE CASCADE,
    CONSTRAINT demandante_id_pk PRIMARY KEY (id)
);

CREATE TABLE Empresa (
    id INT,
    nombre VARCHAR(255),
    -- logo, --> ?
    descripcion VARCHAR (255), -- CAMBIAR VARCHAR POR TEXTO CON MAYOR LONGITUD
    ubicacion VARCHAR (255), -- GESTIONAR PAÍSES, COMUNIDADES, PROVINCIAS, CIUDADES, ETC
    CONSTRAINT empresa_id_pk PRIMARY KEY (id)
);

CREATE TABLE Seleccionador (
    id INT,
    id_empresa INT,
    CONSTRAINT seleccionador_id_fk FOREIGN KEY (id) REFERENCES Usuario(id) ON DELETE CASCADE,
    CONSTRAINT seleccionador_id_pk PRIMARY KEY (id),
    CONSTRAINT seleccionador_id_empresa FOREIGN KEY (id_empresa) REFERENCES Empresa(id) ON DELETE CASCADE
);

CREATE TABLE CV (
    id INT,
    jornada_laboral VARCHAR (255),
    puesto_trabajo VARCHAR (255),
    tipo_trabajo VARCHAR (255),
    id_demandante INT,
    CONSTRAINT cv_id_pk PRIMARY KEY (id),
    CONSTRAINT cv_id_demandante_fk FOREIGN KEY (id) REFERENCES Demandante(id) ON DELETE CASCADE
);

CREATE TABLE Estudios (
    id_cv INT,
    id_estudio INT,
    nombre VARCHAR (255),
    centro_estudios VARCHAR (255),
    fecha_inicio DATE,
    fecha_fin DATE,
    CONSTRAINT estudios_id_cv_fk FOREIGN KEY (id_cv) REFERENCES CV(id) ON DELETE CASCADE,
    CONSTRAINT estudios_id_pk PRIMARY KEY (id_cv, id_estudio),
    CONSTRAINT estudios_fecha_ck CHECK (fecha_inicio < fecha_fin)
);

CREATE TABLE Experiencia (
    id_cv INT,
    id_experiencia INT,
    nombre VARCHAR (255),
    centro_laboral VARCHAR (255),
    fecha_inicio DATE,
    fecha_fin DATE,
    CONSTRAINT experiencia_id_cv_fk FOREIGN KEY (id_cv) REFERENCES CV(id) ON DELETE CASCADE,
    CONSTRAINT experiencia_id_pk PRIMARY KEY (id_cv, id_experiencia),
    CONSTRAINT experiencia_fecha_ck CHECK (fecha_inicio < fecha_fin)
);

CREATE TABLE Oferta (
    referencia INT,
    fecha_publicacion DATE,
    fecha_cierre DATE,
    numero_vacantes INT,
    salario DECIMAL(10,2), -- INT, FLOAT O VARCHAR? --> REVISAR (INGRESAR DE MANERA MENSUAL O ANUAL / EN BRUTO O NETO)
    jornada VARCHAR (255),
    sector VARCHAR (255),
    tipo_trabajo VARCHAR (255),
    puesto_trabajo VARCHAR (255),
    vacante_especial VARCHAR(255),
    descripcion VARCHAR (255), -- REVISAR TMB
    estudios_minimos VARCHAR (255),
    experiencia_minima INT,
    ubicacion VARCHAR (255),
    turno VARCHAR (255), 
    horario VARCHAR (255),
    idioma VARCHAR (255),
    borrador VARCHAR(2),
    id_seleccionador INT,
    CONSTRAINT oferta_referencia_pk PRIMARY KEY (referencia),
    CONSTRAINT oferta_fecha_ck CHECK (fecha_publicacion < fecha_cierre),
    CONSTRAINT oferta_id_seleccionador_fk FOREIGN KEY (id_seleccionador) REFERENCES Seleccionador(id) ON DELETE CASCADE
);

-- CREATE TABLE Plantilla ();

CREATE TABLE Calendario (
    id INT,
    evento VARCHAR (255),
    fecha DATE,
    hora_inicio VARCHAR (255),
    hora_cierre VARCHAR (255),
    descripcion VARCHAR (255),
    id_seleccionador INT,
    CONSTRAINT calendario_id_pk PRIMARY KEY (id),
    CONSTRAINT calendario_id_seleccionador_fk FOREIGN KEY (id_seleccionador) REFERENCES Seleccionador(id) ON DELETE CASCADE
);

-- CREATE TABLE Alerta ();

CREATE TABLE Mensaje (
    id INT,
    id_emisor INT,
    id_receptor INT,
    mensaje VARCHAR (255),
    CONSTRAINT mensaje_id_pk PRIMARY KEY (id),
    CONSTRAINT mensaje_id_emisor FOREIGN KEY (id_emisor) REFERENCES Seleccionador(id) ON DELETE CASCADE,
    CONSTRAINT mensaje_id_receptor FOREIGN KEY (id_receptor) REFERENCES Demandante(id) ON DELETE CASCADE
);

CREATE TABLE Inscripcion (
    id_demandante INT,
    id_oferta INT,
    anotacion VARCHAR (255),
    CONSTRAINT inscripcion_id_demandante_fk FOREIGN KEY (id_demandante) REFERENCES Demandante(id) ON DELETE CASCADE,
    CONSTRAINT inscripcion_id_oferta_fk FOREIGN KEY (id_oferta) REFERENCES Oferta(referencia) ON DELETE CASCADE,
    CONSTRAINT inscripcion_id_pk PRIMARY KEY (id_demandante, id_oferta)
);

CREATE TABLE Cuestionario (
    id INT,
    fecha DATE,
    tipo VARCHAR(255),
    id_seleccionador INT,
    id_demandante INT,
    id_oferta INT,
    CONSTRAINT cuestionario_id_pk PRIMARY KEY (id),
    CONSTRAINT cuestionario_id_seleccionador_fk FOREIGN KEY (id_seleccionador) REFERENCES Seleccionador(id) ON DELETE CASCADE,
    CONSTRAINT cuestionario_id_inscripcion_fk FOREIGN KEY (id_demandante, id_oferta) REFERENCES Inscripcion(id_demandante, id_oferta) ON DELETE CASCADE
);

CREATE TABLE Pregunta (
    id INT,
    pregunta VARCHAR (255),
    respuesta VARCHAR (255),
    id_cuestionario INT,
    CONSTRAINT pregunta_id_cuestionario_fk FOREIGN KEY (id_cuestionario) REFERENCES Cuestionario(id) ON DELETE CASCADE,
    CONSTRAINT pregunta_id_pk PRIMARY KEY (id_cuestionario, id)
);