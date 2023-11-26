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
codigo_postal int (8),
provincia varchar(20),
pais varchar(20),
admin boolean,
saldo float
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
estado boolean
);

Create table operaciones(
id_operaciones int primary key auto_increment,
saldo 
);