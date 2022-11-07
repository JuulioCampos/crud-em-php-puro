-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para teste_camp
CREATE DATABASE IF NOT EXISTS `teste_camp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `teste_camp`;

-- Copiando estrutura para tabela teste_camp.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `preco` decimal(8,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela teste_camp.produto: ~4 rows (aproximadamente)
DELETE FROM `produto`;
INSERT INTO `produto` (`id`, `nome`, `preco`) VALUES
	(1, 'telefone', 1500.00),
	(2, 'notebook', 2499.99),
	(3, 'mouse', 59.98),
	(9, 'teste up', 2700.00);

-- Copiando estrutura para tabela teste_camp.produtos_usuarios
CREATE TABLE IF NOT EXISTS `produtos_usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) unsigned NOT NULL DEFAULT 0,
  `id_produto` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_produtos_usuarios_usuario` (`id_usuario`),
  KEY `FK_produtos_usuarios_produto` (`id_produto`),
  CONSTRAINT `FK_produtos_usuarios_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_produtos_usuarios_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela teste_camp.produtos_usuarios: ~6 rows (aproximadamente)
DELETE FROM `produtos_usuarios`;
INSERT INTO `produtos_usuarios` (`id`, `id_usuario`, `id_produto`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 1),
	(5, 5, 2),
	(7, 1, 1),
	(8, 2, 1);

-- Copiando estrutura para tabela teste_camp.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela teste_camp.usuario: ~7 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`id`, `nome`, `cpf`, `email`, `senha`, `create_at`, `update_at`) VALUES
	(1, 'julio', '1231231231', 'email', 'senha', '2022-11-04 22:40:31', '2022-11-07 01:43:15'),
	(2, 'Fernando', '1234567891', 'juykas@gmail.com', '1231', '2022-11-05 13:44:51', '2022-11-07 01:39:53'),
	(4, 'Samara', '11122233344', 'samara@samara.com', '12344', '2022-11-05 15:48:26', '2022-11-05 15:48:28'),
	(5, 'julio', '123412342', 'jluio@', '2134234', '2022-11-07 02:01:33', '2022-11-07 02:01:33'),
	(6, 'Julio f', '5635423452345', 'asdte.com', 'senha', '2022-11-07 06:02:46', '2022-11-07 06:02:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
