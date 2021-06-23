CREATE DATABASE Elis;

USE Elis;

CREATE TABLE usuario(
cd_usuario int not null auto_increment primary key ,
nm_usuario varchar(80) not null,
ds_email varchar(60) not null,
ds_senha varchar(255) not null
);

CREATE TABLE cliente(
cd_cliente int not null auto_increment primary key,
nm_cliente varchar(80) not null,
nr_telefone varchar(10) not null,
nr_celular varchar(11) not null,
ds_email varchar(60) not null
);

CREATE TABLE imovel(
cd_imovel int not null auto_increment primary key,
ds_endereco varchar(80) not null,
nr_valor double(10,2) not null
);

CREATE TABLE compra_venda(
cd_compravenda int not null auto_increment primary key,
id_imovel int not null,
id_vendedor int not null,
id_comprador int not null,
ds_financiamento varchar(45) not null
);

