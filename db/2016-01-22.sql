ALTER TABLE `inobox_app`.`modelo_campos` 
CHANGE COLUMN `ds_tipo` `ds_tipo` ENUM('texto simples','texto longo','valor decimal','inteiro','moeda','selecao unica','selecao multipla','data') NULL DEFAULT NULL ;