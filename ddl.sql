create database kasir;
use kasir;

create table tb_user(
    id int AUTO_INCREMENT not null primary key,
    username varchar(50) not null,
    password varchar(100) not null
);
INSERT INTO tb_user(username, password) values('admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a');

CREATE TABLE tb_paket (
    id int AUTO_INCREMENT NOT NULL primary key,
    nama varchar(50) NOT NULL ,
    harga decimal NOT NULL
);