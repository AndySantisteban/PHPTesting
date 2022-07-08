DROP DATABASE IF EXISTS gestionDatos;
CREATE DATABASE gestionDatos;

USE gestionDatos;

CREATE TABLE activos
(
    id_activo INT NOT NULL AUTO_INCREMENT,
    name_activo VARCHAR(100) NOT NULL,
    description_activo VARCHAR(100) NOT NULL,
    owner_activo VARCHAR(100) NOT NULL,
    risk_activo INT NOT NULL,
    status_activo VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_activo)
);


INSERT INTO activos VALUES (1, 'Instancia', 'Creado en Amazon Web Services (EC2)', 'Andy Santisteban', 1, 'Activo');
INSERT INTO activos VALUES (2, 'Zona DNS', 'Creado en Amazon Web Services (Elastic Block Store)', 'Codespacio', 2, 'Activo');
INSERT INTO activos VALUES (3, 'Balanceador', 'Creado en Amazon Web Services (Load Balancing)', 'Samuel Sanchez', 3, 'Activo' );
INSERT INTO activos VALUES (4, 'Database', 'Creado en Amazon Web Services (Amazon RDS)', 'Fernando Monja', 2, 'Activo' );
INSERT INTO activos VALUES (5, 'IPs List', 'Creado en Amazon Web Services (Network & Security)', 'Nicolette Pacheco', 1, 'Activo');
