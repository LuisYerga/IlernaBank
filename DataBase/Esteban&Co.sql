Drop database if exists EstebanCo;
Create Database EstebanCo;

use EstebanCo;

Create table perfil(
iban int primary key,
nombre varchar(25),
apellidos varchar(40),
dni varchar(9),
email varchar(35),
fecha_nacimiento date,
direccion varchar(30),
ciudad varchar(25),
codigo_postal int,
provincia varchar(20),
pais varchar(20),
saldo float
);

Create table rol(
id_perfil int primary key,
tipo_rol boolean,
foreign key (id_perfil) references perfil(iban)
);

Create table contacto(
id_contacto int primary key auto_increment,
nombre_agregado varchar(15),
id_usuario int,
id_agregado int,
foreign key (id_usuario) references perfil(iban),
foreign key (id_agregado) references perfil(iban)
);

Create table mensajes(
id_mensajes int primary key auto_increment,
id_destinatario int,
id_remitente int,
mensaje varchar(150),
foreign key (id_destinatario) references contacto(id_agregado),
foreign key (id_remitente) references contacto(id_usuario)
);

Create table prestamos(
id_prestamos int primary key auto_increment,
nombre_prestamo varchar(15),
motivo_prestamo varchar(40),
cantidad_prestamo float,
solicitud_activa boolean,
final_prestamo date,
estado boolean,
id_solicitante int,
foreign key (id_solicitante) references perfil(iban)
);



Create table operaciones(
id_operaciones int primary key auto_increment,
fecha date,
cantidad float,
descripcion varchar(20),
id_realizador int,
foreign key (id_realizador) references perfil(iban)
);



Create table gestion(
id_gestion int primary key auto_increment,
id_operacion_gestion int,
id_realizador_gestion int,
fecha_gestion date,
cantidad_gestion float,
tipo varchar(20),
foreign key (id_operacion_gestion) references operaciones(id_operaciones),
foreign key (id_realizador_gestion) references operaciones(id_realizador)
/*foreign key (fecha_gestion) references operaciones(fecha),
foreign key (cantidad_gestion) references operaciones(cantidad),
foreign key (tipo) references operaciones(descripcion)*/
);

Create table bizum(
id_bizum int primary key auto_increment,
id_operacion_bizum int,
concepto varchar(10),
fecha_bizum date,
cantidad_bizum float,
id_realizador_bizum int,
id_recibidor_bizum int,
foreign key (id_operacion_bizum) references operaciones(id_operaciones),
/*foreign key (concepto) references operaciones(descripcion),
foreign key (fecha_bizum) references operaciones(fecha),
foreign key (cantidad_bizum) references operaciones(cantidad),*/
foreign key (id_realizador_bizum) references operaciones(id_realizador),
foreign key (id_recibidor_bizum) references contacto(id_agregado)
);