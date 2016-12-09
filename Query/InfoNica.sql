Create database Infonica;

Use Infonica;



Create table Usuario(

ID_Usuario int key auto_increment unique not null primary key,

Nombre_Usuario nvarchar(50) not null,
Apellido_Usuario nvarchar(50) not null,

Correo_Usuario nvarchar(100) not null,

Contrasena_Usuario nvarchar(100) not null,

Fecha_Registro timestamp default current_timestamp(),

ID_Activacion_Usuario long not null,
Rol nvarchar(10) not null,

Foto_Usuario nvarchar(4000) default "images/gravatar.png" not null,

Estado_Usuario nvarchar(10) not null
);



Create table Seccion(

ID_Seccion int key auto_increment unique not null primary key,

Nombre_Seccion nvarchar(50) not null,

Estado_Seccion nvarchar(10) not null
);



Create table Foto(
ID_Foto int key auto_increment unique not null primary key,

ID_Seccion int not null,
foreign key(ID_Seccion) references Seccion(ID_Seccion),

Nombre_Foto nvarchar(4000) not null,

Titulo_Foto nvarchar(50) not null,

Descripcion_Foto nvarchar(500) not null,

Latitud_Foto nvarchar(400) not null,

Longitud_Foto nvarchar(400) not null,

Estado_Foto nvarchar(10) not null
);



Create table Video(

ID_Video int key auto_increment unique not null primary key,

ID_Seccion int not null,

foreign key(ID_Seccion) references Seccion(ID_Seccion),

Nombre_Video nvarchar(4000) not null,

Titulo_Video nvarchar(50) not null,

Descripcion_Video nvarchar(500) not null,

Estado_Video nvarchar(10) not null
);



Create table Comentario_Foto(

ID_Comentario_Foto int key auto_increment unique not null primary key,

ID_Foto int not null,

foreign key(ID_Foto) references Foto(ID_Foto),

ID_Usuario int not null,

foreign key(ID_Usuario) references Usuario(ID_Usuario),

Fecha_Comentario_Foto timestamp default current_timestamp() not null,

Comentario_Foto nvarchar(500) not null,

Estado_Comentario_Foto nvarchar(10) not null
);




Create table Comentario_Video(

ID_Comentario_Video int key auto_increment unique not null primary key,

ID_Video int not null,
foreign key(ID_Video) references Video(ID_Video),

ID_Usuario int not null,
foreign key(ID_Usuario) references Usuario(ID_Usuario),

Fecha_Comentario_Video timestamp default current_timestamp() not null,

Comentario_Video nvarchar(500) not null,

Estado_Comentario_Video nvarchar(10) not null
);



Create table Registro_Sesion(

ID_Registro_Sesion int key auto_increment unique not null primary key,

ID_Usuario int not null,

foreign key(ID_Usuario) references Usuario(ID_Usuario),

Fecha_Entrada timestamp default current_timestamp() not null,

Estado_Registro_Sesion nvarchar(10) not null
);


Create table Respuesta_Comentario_Foto(

ID_Respuesta_Comentario_Foto int key auto_increment unique not null primary key,

ID_Comentario_Foto int not null,

foreign key(ID_Comentario_Foto) references Comentario_Foto(ID_Comentario_Foto),

ID_Usuario int not null,

foreign key(ID_Usuario) references Usuario(ID_Usuario),

Fecha_Comentario_Foto timestamp default current_timestamp() not null,

Respuesta_Comentario_Foto nvarchar(500) not null,

Estado_Respuesta_Comentario_Foto nvarchar(10) not null
);


Create table Respuesta_Comentario_Video(

ID_Respuesta_Comentario_Video int key auto_increment unique not null primary key,

ID_Comentario_Video int not null,

foreign key(ID_Comentario_Video) references Comentario_Video(ID_Comentario_Video),

ID_Usuario int not null,

foreign key(ID_Usuario) references Usuario(ID_Usuario),

Fecha_Comentario_Video timestamp default current_timestamp() not null,

Respuesta_Comentario_Video nvarchar(500) not null,

Estado_Respuesta_Comentario_Video nvarchar(10) not null
);


/* Usuario */


Insert into Usuario (
Nombre_Usuario,
Apellido_Usuario,
Correo_Usuario, 
Contrasena_Usuario ,
ID_Activacion_Usuario, 
Rol, 
Estado_Usuario)

Values ("Admin","Admin","admin@infonica.tk",TO_BASE64("admin"),"000X000","Admin","Activo" );



/* 
Seccions*/


Insert into Seccion (Nombre_Seccion, Estado_Seccion) values ("ElCastillo","Activo");
Insert into Seccion (Nombre_Seccion, Estado_Seccion) values ("Flora","Activo");
Insert into Seccion (Nombre_Seccion, Estado_Seccion) values ("Fauna","Activo");

/*Fotos ElCastillo*/

Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo1.jpg", "El Castillo", "Vista a la llegada al muelle", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo2.jpg", "Tour Caimanes", "Tour realizado por Juan Aguilar", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo3.jpg", "Conserva la reserva", "Compromiso con los recursos naturales", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo4.jpg", "Pesca", "Tour de pesca con extrajeros", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo5.jpg", "Hotel Sábalos", "Entrada del río Sábalos-El Castillo", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo6.jpg", "Río San Juan", "Navegando sobre el Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo7.jpg", "Río San Juan", "Navegando sobre el Río san Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo8.jpg", "Río San Juan", "Que bonito es el Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo9.jpg", "Historia El Castillo", "Historia mostrada en el Museo de la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo10.jpg", "La Fortaleza Inmaculada Concepción", "Visita la Fortaleza de El Castillo", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo11.jpg", "Historia - Naruraleza", "La convinación de Historia y Naturaleza hace de un paisaje unico en El Castillo", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo12.jpg", "Paisaje", "Fortaleza - Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo13.jpg", "Convinación perfecta", "Fortaleza Inmaculada Concepción", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo14.jpg", "Fortaleza", "Vista de carceles de la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo15.jpg", "El Castillo", "Naturaleza de Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo16.jpg", "Fortaleza Inmaculada Concepción", "La historia en presente puede hablar", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo17.jpg", "Fortaleza Inmaculada Concepción", "La historia en presente puede hablar", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo18.jpg", "Vista del Rìo San Juan", "Tomada desde la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo19.jpg", "Vista del Río San Juan", "Tomada desde la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo20.jpg", "Vista del Río San Juan", "Tomada desde la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo21.jpg", "Vista del Río San Juan", "Vista desde la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo22.jpg", "Vista del Río San Juan", "Vista desde la Torre El Caballero, Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo23.jpg", "Paisajes", "Vista desde la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo24.jpg", "El Castillo", "Vista de la torre El Caballero", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo25.jpg", "Una vista al pueblo", "Foto del pueblo de El Castillo", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo26.jpg", "Río San Juan", "Paisajes del Río", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo27.jpg", "El Castillo - Río San Juan", "Vista del Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo28.jpg", "La Fortaleza", "Naturaleza en la zona", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo31.jpg", "Fortaleza", "Paredes de la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo24.jpg", "Placa", "Entrada a la Fortaleza Inmaculada Concepción", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo25.jpg", "Museo", "Objetos encontrados", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo26.jpg", "Museo", "Objetos historicos encontrados", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo27.jpg", "Campamentos", "Tours a la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo28.jpg", "Historia", "¿Por qué existe la Fortaleza?", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo29.jpg", "Historia", "Fecha de construcción de la Fortaleza", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (1, "ElCastillo30.jpg", "Tours de Caimanes", "Tour realizado por Juan Aguilar", "0.00000", "-0.0000","Activo");

/* Insertar en fotos Flora*/

Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora1.jpg", "flor", "Esta se encuentra en la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora2.jpg", "Río La Juana", "Personas navegando en canoas de madera", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora3.jpg", "Pescando", "Pescados del Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora4.jpg", "Árbol", "Árboles de la zona", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora5.jpg", "Tours", "Turistas en Tours a la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora6.jpg", "Reserva", "Foto tomada en la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora7.jpg", "Árboles", "Bosques y aves en la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora8.jpg", "palos caídos", "Gallego en Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora9.jpg", "Árboles", " Flora del Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora10.jpg", "Reserva Indio Maíz", "Mono en ramas de los árboles", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora11.jpg", "Personas navegando", "Sobre el Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora12.jpg", "Perros", "Uno perro de agua y el otro un perro domestico", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora13.jpg", "Tours en Kayaks", "Turistas disfrutando del Tour en Kayaks", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora14.jpg", "Reserva", "Fotos tomadas por los turistas en la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora15.jpg", "Árboles", "Foto tomada por jovenes que trabajan con Fundación del Río", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora16.jpg", "La Juana", "Río La Juana", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora17.jpg", "Reserva", "Rana en el bosque de la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora18.jpg", "Garrobo", "Comunidad de La Juana", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora19.jpg", "Río San Juan", "Lagarto fuera del Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora20.jpg", "Información", "Flora y fauna", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora21.jpg", "Información", "¿Qué es una reserva biológica? ", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora22.jpg", "Información", "Atractivo turistico", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora23.jpg", "Información", "Historia de territorios indígenas", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (2, "Flora24.jpg", "Información", "Actividades permitidas en la reserva", "0.00000", "-0.0000","Activo");

/* Insertar en fotos fauna*/

Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna1.jpg", "Mono", "Foto tomada en la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna2.jpg", "Caiman", "Tours realizado por Juan Aguilar", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna3.jpg", "Lapa Verde", "Fotos tomadas por Fundación del Río", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna4.jpg", "Pescado", "Pescando en el ´Río san Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna5.jpg", "Lapa roja", "Fotos tomadas por Fundación del Río", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna6.jpg", "Mono", "Foto tomada por turistas en la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna7.jpg", "Mariposa", "Foto tomada por Fundación el Río", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna8.jpg", "Luciernaga", "Luciernaga que comparte con los turistas en la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna9.jpg", "Zorro", "En Tours de Campamentos en la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna10.jpg", "Olopendoras", "Aves que hacen sus grandes nidos en árboles altos", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna11.jpg", "Pájaritos", "Nido encontrado durante se realizan tours en la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna12.jpg", "Mono", "Foto tomada por turistas durante Tours en la reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna13.jpg", "Aves", "Encontrada en la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna14.jpg", "´Rana", "Se encuentra en la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna15.jpg", "Rana", "Se encuentra en la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna16.jpg", "Nidos de lapas rojas", "Realizan sus nidos en árboles altos, algunos en la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna17.jpg", "Lapa Roja", "En la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna18.jpg", "Lapa roja", "En la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna19.jpg", "Rana", "Encontrada durante tours en la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna20.jpg", "Lapa verde", "Nidos en los altos árboles de la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna21.jpg", "Garrobo", "Sobre árbol caido sobre el río, esperando le de el sol", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna22.jpg", "Tortuga", "Encontrada en la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna23.jpg", "Araña", "Amigas encontradas durante los Tours a la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna24.jpg", "Animales", "Amigos de los bosques de la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna25.jpg", "Huellas de tigre", "Huellas que se encuentran en lo Tours a la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna26.jpg", "Caiman", "Sobre el Río San Juan", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna27.jpg", "Serpiente", "Tours a la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna28.jpg", "Tucanes", "En la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna29.jpg", "Lapas verdes", "Nidos en los altos árboles de la Reserva", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna30.jpg", "Gallinita guinea", "En la Tours a la Reserva Indio Maíz", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna31.jpg", "Rana", "En Tours con Juan Aguilar", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna32.jpg", "Caimanes", "En tours de caimanes con Juan Aguilar", "0.00000", "-0.0000","Activo");
Insert into Foto (ID_Seccion, Nombre_Foto, Titulo_Foto, Descripcion_Foto, Latitud_Foto, Longitud_Foto, Estado_Foto) 
values (3, "Fauna33.jpg", "Información", "Gran Reserva es vida", "0.00000", "-0.0000","Activo");



/* Videos */

Insert into Video (ID_Seccion, Nombre_Video, Titulo_Video, Descripcion_Video, Estado_Video) 
values (1, "Video1", "Recorrido Castillo 1", "El castillo es naturaleza pura", "Activo");
Insert into Video (ID_Seccion, Nombre_Video, Titulo_Video, Descripcion_Video, Estado_Video) 
values (1, "Video2", "Recorrido Castillo 2", "El castillo es naturaleza pura", "Activo");

Insert into Video (ID_Seccion, Nombre_Video, Titulo_Video, Descripcion_Video, Estado_Video) 
values (1, "Video3", "Recorrido Castillo 3", "El castillo es naturaleza pura", "Activo");





/* Comentario Foto */

Insert into Comentario_Foto (ID_Foto, ID_Usuario, Comentario_Foto, Estado_Comentario_Foto) 
values (1,1,"Perfecto, me encanta", "Activo");

/* Vistas */

Create view Comentario_FotoV as (
Select F.ID_Comentario_Foto, F.ID_Foto, U.ID_Usuario, U.Nombre_Usuario, U.Apellido_Usuario, F.Comentario_Foto, F.Fecha_Comentario_Foto, F.Estado_Comentario_Foto,
U.Foto_Usuario
from Comentario_Foto F
Inner Join Usuario U
On F.ID_Usuario = U.ID_Usuario
);


Create view Comentario_VideoV as (
Select F.ID_Comentario_Video, F.ID_Video, U.ID_Usuario, U.Nombre_Usuario, U.Apellido_Usuario, F.Comentario_Video, F.Fecha_Comentario_Video, F.Estado_Comentario_Video,
U.Foto_Usuario
from Comentario_Video F
Inner Join Usuario U
On F.ID_Usuario = U.ID_Usuario
);



Create view Respuesta_Comentario_FotoV as (
Select F.ID_Respuesta_Comentario_Foto, F.ID_Comentario_Foto, U.ID_Usuario, U.Nombre_Usuario, U.Apellido_Usuario, F.Respuesta_Comentario_Foto, F.Fecha_Comentario_Foto,
 F.Estado_Respuesta_Comentario_Foto, U.Foto_Usuario
from Respuesta_Comentario_Foto F
Inner Join Usuario U
On F.ID_Usuario = U.ID_Usuario
);

Create view Respuesta_Comentario_VideoV as (
Select F.ID_Respuesta_Comentario_Video, F.ID_Comentario_Video, U.ID_Usuario, U.Nombre_Usuario, U.Apellido_Usuario, F.Respuesta_Comentario_Video, F.Fecha_Comentario_Video,
 F.Estado_Respuesta_Comentario_Video, U.Foto_Usuario
from Respuesta_Comentario_Video F
Inner Join Usuario U
On F.ID_Usuario = U.ID_Usuario
);