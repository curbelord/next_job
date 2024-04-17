CREATE DATABASE IF NOT EXISTS nextjob;
USE nextjob;

DROP TABLE IF EXISTS Usuario;
DROP TABLE IF EXISTS Demandante;
DROP TABLE IF EXISTS Empresa;
DROP TABLE IF EXISTS Seleccionador;
DROP TABLE IF EXISTS CV;
DROP TABLE IF EXISTS Estudios;
DROP TABLE IF EXISTS Experiencia;
DROP TABLE IF EXISTS Oferta;
DROP TABLE IF EXISTS Calendario;
DROP TABLE IF EXISTS Mensaje;
DROP TABLE IF EXISTS Cuestionario;
DROP TABLE IF EXISTS Pregunta;
DROP TABLE IF EXISTS Inscripcion;

CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    genero ENUM('Hombre', 'Mujer', 'Otro'),
    fecha_nacimiento DATE NOT NULL,
    direccion VARCHAR(255),
    correo VARCHAR(255) NOT NULL,
    telefono VARCHAR(255) NOT NULL,
    UNIQUE (correo),
    UNIQUE (telefono)
);

CREATE TABLE Demandante (
    id INT,
    FOREIGN KEY (id) REFERENCES Usuario(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Empresa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    descripcion TEXT,
    ubicacion VARCHAR(255)
);

CREATE TABLE Seleccionador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_empresa INT,
    FOREIGN KEY (id) REFERENCES Usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (id_empresa) REFERENCES Empresa(id) ON DELETE CASCADE
);

CREATE TABLE CV (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jornada_laboral VARCHAR(255),
    puesto_trabajo VARCHAR(255),
    tipo_trabajo VARCHAR(255),
    id_demandante INT,
    FOREIGN KEY (id_demandante) REFERENCES Demandante(id) ON DELETE CASCADE
);

CREATE TABLE Estudios (
    id_cv INT,
    id_estudio INT,
    nombre VARCHAR(255),
    centro_estudios VARCHAR(255),
    fecha_inicio DATE,
    fecha_fin DATE,
    FOREIGN KEY (id_cv) REFERENCES CV(id) ON DELETE CASCADE,
    PRIMARY KEY (id_cv, id_estudio)
);

CREATE TABLE Experiencia (
    id_cv INT,
    id_experiencia INT,
    nombre VARCHAR(255),
    centro_laboral VARCHAR(255),
    descripcion TEXT,
    fecha_inicio DATE,
    fecha_fin DATE,
    FOREIGN KEY (id_cv) REFERENCES CV(id) ON DELETE CASCADE,
    PRIMARY KEY (id_cv, id_experiencia)
);

CREATE TABLE Oferta (
    referencia INT AUTO_INCREMENT PRIMARY KEY,
    fecha_cierre DATE,
    numero_vacantes INT,
    salario DECIMAL(10,2),
    jornada ENUM('Completa', 'Parcial'),
    sector VARCHAR(255),
    tipo_trabajo VARCHAR(255),
    puesto_trabajo VARCHAR(255),
    descripcion VARCHAR(255),
    estudios_minimos VARCHAR(255),
    experiencia_minima INT,
    ubicacion VARCHAR(255),
    provincia VARCHAR(255),
    turno VARCHAR(255),
    estado ENUM('Publicada', 'Oculta', 'Borrador', 'Autocandidatura'),
    curriculums_ciegos ENUM('SI', 'NO'),
    palabras_clave TEXT,
    id_seleccionador INT,
    FOREIGN KEY (id_seleccionador) REFERENCES Seleccionador(id) ON DELETE CASCADE
);

CREATE TABLE Calendario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    evento VARCHAR(255),
    fecha DATE,
    hora_inicio VARCHAR(255),
    hora_cierre VARCHAR(255),
    descripcion VARCHAR(255),
    id_seleccionador INT,
    FOREIGN KEY (id_seleccionador) REFERENCES Seleccionador(id) ON DELETE CASCADE
);

CREATE TABLE Mensaje (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_emisor INT,
    id_receptor INT,
    mensaje VARCHAR(255),
    FOREIGN KEY (id_emisor) REFERENCES Seleccionador(id) ON DELETE CASCADE,
    FOREIGN KEY (id_receptor) REFERENCES Demandante(id) ON DELETE CASCADE
);

CREATE TABLE Inscripcion (
    id_demandante INT,
    id_oferta INT,
    anotacion VARCHAR(255),
    PRIMARY KEY (id_demandante, id_oferta),
    FOREIGN KEY (id_demandante) REFERENCES Demandante(id) ON DELETE CASCADE,
    FOREIGN KEY (id_oferta) REFERENCES Oferta(referencia) ON DELETE CASCADE
);

CREATE TABLE Cuestionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE,
    tipo VARCHAR(255),
    id_seleccionador INT,
    id_demandante INT,
    id_oferta INT,
    FOREIGN KEY (id_seleccionador) REFERENCES Seleccionador(id) ON DELETE CASCADE,
    FOREIGN KEY (id_demandante, id_oferta) REFERENCES Inscripcion(id_demandante, id_oferta) ON DELETE CASCADE
);

CREATE TABLE Pregunta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pregunta VARCHAR(255),
    respuesta VARCHAR(255),
    id_cuestionario INT,
    FOREIGN KEY (id_cuestionario) REFERENCES Cuestionario(id) ON DELETE CASCADE
);
