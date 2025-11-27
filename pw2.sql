create database PW2;
use PW2;

CREATE TABLE `midia`(
  `codigo` INT PRIMARY KEY AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `sinopse` VARCHAR(150) NOT NULL,
  `genero` Enum('Romance','Ação','Comédia','Animação','Terror','Ficção') NOT NULL,
  `anoLanc` int NOT NULL,
  `tipo` ENUM('Filme','Serie')  NOT NULL,
  `clasInd` ENUM('Livre','10','12','14','16','18') NOT NULL,
  `episodio` INT,
CONSTRAINT chk_ano_4dig CHECK (`anoLanc` BETWEEN 0 AND 9999)
);