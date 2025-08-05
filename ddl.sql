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

CREATE TABLE tb_customer (
    id int AUTO_INCREMENT NOT NULL primary key,
    nama varchar(50)  NOT NULL ,
    alamat varchar(100)  NOT NULL ,
    no_hp varchar(15)  NOT NULL
);

CREATE TABLE tb_order (
    id int AUTO_INCREMENT NOT NULL primary key,
    no_order varchar(50)  NOT NULL ,
    total_uang decimal  NOT NULL ,
    tanggal_transaksi date  NOT NULL ,
    tanggal_selesai_cuci date  NOT NULL ,
    sudah_selesai boolean  NOT NULL ,
    customer_id int NOT NULL
);

CREATE TABLE tb_order_detail (
    id int AUTO_INCREMENT NOT NULL primary key,
    uang decimal  NOT NULL ,
    jumlah int  NOT NULL ,
    satuan_berat varchar(5)  NOT NULL ,
    order_id int NOT NULL,
	paket_id int not null
);

ALTER TABLE `tb_order` ADD CONSTRAINT `fk_Order_customer_id` FOREIGN KEY(`customer_id`)
REFERENCES `tb_customer` (`id`);

ALTER TABLE `tb_order_detail` ADD CONSTRAINT `fk_Order_paket_id` FOREIGN KEY(`paket_id`)
	REFERENCES `tb_paket` (`id`);

ALTER TABLE `tb_order_detail` ADD CONSTRAINT `fk_OrderDetail_order_id` FOREIGN KEY(`order_id`)
REFERENCES `tb_order` (`id`);
