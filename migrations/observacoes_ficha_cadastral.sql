CREATE TABLE IF NOT EXISTS `observacoes_ficha_cadastral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `observacao` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` DATE,
  `id_ficha_cadastral` int(10) unsigned NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `observacoes_ficha_cadastral` ADD CONSTRAINT `fk_ficha_cadastral` FOREIGN KEY ( `id_ficha_cadastral` ) REFERENCES `ficha_cadastral` ( `id` ) ;