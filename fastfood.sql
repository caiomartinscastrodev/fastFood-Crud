CREATE DATABASE FASTFOOD;

USE FASTFOOD;

CREATE TABLE `guilherme_latronico_user` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(122) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(122) COLLATE latin1_general_ci NOT NULL,
  `adm` tinyint(1) DEFAULT '0',
  `nome` varchar(122) COLLATE latin1_general_ci NOT NULL,
  `cep` int(11) NOT NULL,
  `complemento` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'casa',
  `numero_casa` int(4) NOT NULL,
  `telefone` int(11) NOT NULL
);

INSERT INTO `guilherme_latronico_user` (`email`, `senha`, `adm`, `nome`, `cep`, `complemento`, `numero_casa`, `telefone`) VALUES
('adm@adm', 'root', 1, 'adm', 0, 'casa', 0, 0);

CREATE TABLE `guilherme_latronico_cardapio` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(122) COLLATE latin1_general_ci NOT NULL,
  `descricao` text COLLATE latin1_general_ci,
  `preco` float(8,2) NOT NULL
);



INSERT INTO `guilherme_latronico_cardapio` (`nome`, `descricao`, `preco`) VALUES
('Orange Chiken', 'Sobrecoxa empanada com molho de laranja, acompanhado com macarrao chowmein', 35.00),
('Beef com Brocolis', 'Alcatra e Brocolis no molho oriental a base de ostras, acompanhado com arroz yakimeshi (arroz, ovo, presunto e ervilha)', 40.00),
('Honey Shrimp', 'Camarão empanado ao molho de mel e castanhas, acompanhado com macarrao chowmein', 47.00),
('Frango Teriyaki', 'Sobrecoxa desossada ao molho teriyaki, acompanhado com arroz yakimeshi (arroz, ovo, presunto e ervilha)', 38.00);

CREATE TABLE `guilherme_latronico_pedido` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `total_valor` float(8,2) NOT NULL,
  `descricao` text COLLATE latin1_general_ci,
  `cep` int(11) NOT NULL,
  `complemento` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `numero_casa` int(4) NOT NULL,
  `telefone` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(120) COLLATE latin1_general_ci NOT NULL
);


ALTER TABLE `guilherme_latronico_pedido`
  ADD CONSTRAINT `guilherme_latronico_pedido_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `guilherme_latronico_user` (`id`);
COMMIT;


