CREATE TABLE `tbusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomecompleto` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


insert  into `tbusuarios`(`id`,`nomecompleto`,`email`,`senha`) values (1,'Mauricio','mauoliveirasilva049@gmail.com','4a91d8905620691bfc8a1454f3e3753f');
insert  into `tbusuarios`(`id`,`nomecompleto`,`email`,`senha`) values (9,'Mariana Oliveira','a@b.c','202cb962ac59075b964b07152d234b70');
insert  into `tbusuarios`(`id`,`nomecompleto`,`email`,`senha`) values (10,'bill','borabill@123.com','202cb962ac59075b964b07152d234b70');
