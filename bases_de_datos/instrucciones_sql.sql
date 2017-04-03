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