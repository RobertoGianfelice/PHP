CREATE TABLE `db2021`.`utenti`
    ( `nome` VARCHAR(256) NOT NULL ,
      `cognome` VARCHAR(256) NOT NULL ,
      `nick_name` VARCHAR(256) NOT NULL ,
      `email` VARCHAR(256) NOT NULL ,
      `password` VARCHAR(256) NOT NULL ,
      PRIMARY KEY (`email`)) ENGINE = InnoDB;
