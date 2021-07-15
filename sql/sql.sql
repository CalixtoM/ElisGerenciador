CREATE DATABASE Elis2;

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
nr_valor double(10,2) not null,
id_proprietario int not null
);

CREATE TABLE compra_venda(
cd_compravenda int not null auto_increment primary key,
id_imovel int not null,
id_vendedor int not null,
id_comprador int not null,
ds_financiamento varchar(45) not null
);

ALTER TABLE imovel
ADD CONSTRAINT id_proprietario FOREIGN KEY (id_proprietario) REFERENCES cliente (cd_cliente)
ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE compra_venda
ADD CONSTRAINT id_imovel FOREIGN KEY (id_imovel) REFERENCES imovel (cd_imovel)
ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE compra_venda
ADD CONSTRAINT id_vendedor FOREIGN KEY (id_vendedor) REFERENCES imovel (id_proprietario)
ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE compra_venda
ADD CONSTRAINT id_comprador FOREIGN KEY (id_comprador) REFERENCES cliente (cd_cliente)
ON UPDATE CASCADE ON DELETE CASCADE;

