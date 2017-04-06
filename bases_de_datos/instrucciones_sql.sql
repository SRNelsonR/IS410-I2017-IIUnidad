Campo
Registro
Tabla

Llave primaria: campo o conjunto de campos que identifican de forma unica a un registro.
Normalizacion: Proceso que permite eliminar anomalias de integridad, reduncia, etc., en las bases de datos. Esto se hace definiendo unidades mas pequeñas y faciles de administrar.

Cardinalidad:

1:1 (Uno a uno)
1:N (Uno a muchos)
N:1 (Muchos a uno)
N:M (Muchos a muchos)



Conexion a Mysql:

Usuario: root
Password: 
IP/Dominio: 127.0.0.1/localhost
Puerto: 3306


SQL

--Insertar un registro
INSERT INTO TABLA(CAMPOS)
VALUES (VALORES);


INSERT INTO tbl_paises (codigo_pais, nombre_pais, longitud, latitud) 
VALUES (NULL, 'Honduras', '1231', '123123');

INSERT INTO tbl_paises (nombre_pais, longitud, latitud) 
VALUES ('Colombia', '111', '1111');

--Actualizar un registro
UPDATE tbl_paises 
SET nombre_pais = 'NicaraguA', 
	longitud = '666', 
	latitud = '777' 
WHERE codigo_pais = 2;


UPDATE NOMBRE_TABLA
SET CAMPO1 = NUEVO_VALOR1,
	CAMPO1 = NUEVO_VALOR1,
	...
	CAMPO_N = NUEVO_VALOR_N
WHERE CONDICION;


--Eliminar un registro
DELETE FROM tbl_paises 
WHERE codigo_pais = 4;

DELETE FROM TABLA
WHERE CONDICION;

--Consultar informacion:
SELECT CAMPOS 
FROM TABLA
WHERE CONDICION;

--En vez de CAMPOS puede utilizar * y retornara todos los campos

SELECT codigo_desarrollador, nombre, apellido, correo 
FROM tbl_desarrolladores;

--Cruce de tablas
SELECT a.codigo_aplicacion,
    a.nombre,
    descripcion,
    fecha_actualizacion,
    fecha_publicacion,
    calificacion,
    url,
    tamanio_archivo,
    url_icono,
    version,
    a.codigo_desarrollador,
    a.codigo_pais,
    a.codigo_empresa,
    b.nombre nombre_desarrollador,
    b.apellido,
    concat(b.nombre,' ', b.apellido) nombre_completo,
    c.nombre_pais,
    d.nombre_empresa
FROM tbl_aplicaciones a
INNER JOIN tbl_desarrolladores b
ON (a.codigo_desarrollador = b.codigo_desarrollador)
INNER JOIN tbl_paises c
ON (a.codigo_pais = c.codigo_pais)
INNER JOIN tbl_empresas d
ON (a.codigo_empresa = d.codigo_empresa);
