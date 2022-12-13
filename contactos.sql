-- crear un loguin de usuario y contraseña
-- crear una tabla de usuarios que guarde los datos de usuario y contraseña
create table usuarios(
id int not null auto_increment,
user varchar(50) not null,
pass varchar(50) not null,
primary key(id)
);
