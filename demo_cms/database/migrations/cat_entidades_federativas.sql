drop table cat_entidades_federativas;

create table cat_entidades_federativas
(
    cve_entidad       int                                 not null,
    descripcion_larga varchar(45)                         null
)
    collate = utf8_spanish_ci;


INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (1, 'AGUASCALIENTES');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (2, 'BAJA CALIFORNIA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (3, 'BAJA CALIFORNIA SUR');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (4, 'CAMPECHE');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (5, 'COAHUILA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (6, 'COLIMA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (7, 'CHIAPAS');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (8, 'CHIHUAHUA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (9, 'CIUDAD DE MÉXICO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (10, 'DURANGO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (11, 'GUANAJUATO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (12, 'GUERRERO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (13, 'HIDALGO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (14, 'JALISCO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (15, 'ESTADO DE MÉXICO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (16, 'MICHOACÁN');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (17, 'MORELOS');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (18, 'NAYARIT');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (19, 'NUEVO LEÓN');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (20, 'OAXACA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (21, 'PUEBLA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (22, 'QUERÉTARO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (23, 'QUINTANA ROO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (24, 'SAN LUIS POTOSÍ');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (25, 'SINALOA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (26, 'SONORA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (27, 'TABASCO');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (28, 'TAMAULIPAS');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (29, 'TLAXCALA');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (30, 'VERACRUZ');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (31, 'YUCATÁN');
INSERT INTO cat_entidades_federativas (cve_entidad, descripcion_larga) VALUES (32, 'ZACATECAS');