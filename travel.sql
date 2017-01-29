-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jan-2017 às 14:20
-- Versão do servidor: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlavaliacao`
--

CREATE TABLE `tvlavaliacao` (
  `idTVLAvaliacao` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `idTVLUser` int(11) NOT NULL,
  `idTVLTravel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlcep`
--

CREATE TABLE `tvlcep` (
  `idTVLCEP` int(11) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `idTVLLogradouro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlcidade`
--

CREATE TABLE `tvlcidade` (
  `idTVLCidade` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `idTVLCEP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlcomplemento`
--

CREATE TABLE `tvlcomplemento` (
  `idTVLComplemento` int(11) NOT NULL,
  `complemento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlfoto`
--

CREATE TABLE `tvlfoto` (
  `idTVLFoto` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `nomeFoto` varchar(255) DEFAULT NULL,
  `idTVLUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlfriend`
--

CREATE TABLE `tvlfriend` (
  `idTVLFriend` int(11) NOT NULL,
  `idTVLUser` int(11) NOT NULL,
  `idTVLUser1` int(11) NOT NULL,
  `favorito` tinyint(1) NOT NULL,
  `seguir` tinyint(1) NOT NULL,
  `horaFriend` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tvlfriend`
--

INSERT INTO `tvlfriend` (`idTVLFriend`, `idTVLUser`, `idTVLUser1`, `favorito`, `seguir`, `horaFriend`) VALUES
(1, 1, 1, 0, 1, '2017-01-27 14:45:15'),
(2, 1, 16, 0, 1, '2017-01-27 14:46:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlgrupo`
--

CREATE TABLE `tvlgrupo` (
  `idTVLGrupo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlgrupouser`
--

CREATE TABLE `tvlgrupouser` (
  `idTVLGrupo` int(11) NOT NULL,
  `idTVLUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvllocal`
--

CREATE TABLE `tvllocal` (
  `idTVLLocal` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idTVLPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvllogradouro`
--

CREATE TABLE `tvllogradouro` (
  `idTVLLogradouro` int(11) NOT NULL,
  `rua` varchar(150) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `idTVLComplemento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlpais`
--

CREATE TABLE `tvlpais` (
  `idTVLPais` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `idTVLUF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvlpost`
--

CREATE TABLE `tvlpost` (
  `idTVLPost` int(11) NOT NULL,
  `idTVLGrupo` int(11) DEFAULT NULL,
  `idTVLUser` int(11) DEFAULT NULL,
  `horaPost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titulo` varchar(200) DEFAULT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tvlpost`
--

INSERT INTO `tvlpost` (`idTVLPost`, `idTVLGrupo`, `idTVLUser`, `horaPost`, `titulo`, `texto`) VALUES
(1, NULL, 1, '2017-01-18 19:38:21', '1', '1'),
(2, NULL, 1, '2017-01-19 13:48:28', '1', '1'),
(3, NULL, 1, '2017-01-19 14:23:59', '2', '2'),
(4, NULL, 1, '2017-01-25 13:35:26', 'teste', 'pegando usuário'),
(5, NULL, 16, '2017-01-25 13:36:39', 'bora lá', 'novo teste com session user'),
(6, NULL, 16, '2017-01-25 15:06:04', 'bora lá', 'sem user no construct'),
(7, NULL, 1, '2017-01-26 10:41:23', 'teste', 'posssttttt'),
(8, NULL, 16, '2017-01-26 20:30:41', 'será?', 'Alterou?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvltelefone`
--

CREATE TABLE `tvltelefone` (
  `idTVLTelefone` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `idTVLLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvltelefoneuser`
--

CREATE TABLE `tvltelefoneuser` (
  `idTVLUser` int(11) NOT NULL,
  `idTVLTelefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvltravel`
--

CREATE TABLE `tvltravel` (
  `idTVLTravel` int(11) NOT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `idTVLUser` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dicas` varchar(45) DEFAULT NULL,
  `TVLGrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvltravellocal`
--

CREATE TABLE `tvltravellocal` (
  `idTVLTravel` int(11) NOT NULL,
  `idTVLLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvluf`
--

CREATE TABLE `tvluf` (
  `idTVLUF` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `idTVLCidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tvluser`
--

CREATE TABLE `tvluser` (
  `idTVLUser` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tvluser`
--

INSERT INTO `tvluser` (`idTVLUser`, `nome`, `cpf`, `email`, `senha`, `dataNascimento`, `nivel`) VALUES
(1, 'Neon dotta', '8484848484', 'neondotta@gmail.com.br', '123', '1992-03-14', 1),
(15, 'Neon Dotta 1', '2323232', 'neondotta@gmail.com', '', '1992-03-14', 15),
(16, 'Charmander', '256478', 'n@n.n', '1234', '1990-02-01', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tvlavaliacao`
--
ALTER TABLE `tvlavaliacao`
  ADD PRIMARY KEY (`idTVLAvaliacao`),
  ADD KEY `fk_TVLAvaliacao_TVLUser_idx` (`idTVLUser`),
  ADD KEY `fk_TVLAvaliacao_TVLTravel1_idx` (`idTVLTravel`);

--
-- Indexes for table `tvlcep`
--
ALTER TABLE `tvlcep`
  ADD PRIMARY KEY (`idTVLCEP`),
  ADD KEY `fk_TVLCEP_TVLLogradouro1_idx` (`idTVLLogradouro`);

--
-- Indexes for table `tvlcidade`
--
ALTER TABLE `tvlcidade`
  ADD PRIMARY KEY (`idTVLCidade`),
  ADD KEY `fk_TVLCidade_TVLCEP1_idx` (`idTVLCEP`);

--
-- Indexes for table `tvlcomplemento`
--
ALTER TABLE `tvlcomplemento`
  ADD PRIMARY KEY (`idTVLComplemento`);

--
-- Indexes for table `tvlfoto`
--
ALTER TABLE `tvlfoto`
  ADD PRIMARY KEY (`idTVLFoto`),
  ADD KEY `fk_TVLFoto_TVLUser1_idx` (`idTVLUser`);

--
-- Indexes for table `tvlfriend`
--
ALTER TABLE `tvlfriend`
  ADD PRIMARY KEY (`idTVLFriend`,`idTVLUser`,`idTVLUser1`),
  ADD KEY `fk_TVLUser_has_TVLUser_TVLUser2_idx` (`idTVLUser1`),
  ADD KEY `fk_TVLUser_has_TVLUser_TVLUser1_idx` (`idTVLUser`);

--
-- Indexes for table `tvlgrupo`
--
ALTER TABLE `tvlgrupo`
  ADD PRIMARY KEY (`idTVLGrupo`);

--
-- Indexes for table `tvlgrupouser`
--
ALTER TABLE `tvlgrupouser`
  ADD PRIMARY KEY (`idTVLGrupo`,`idTVLUser`),
  ADD KEY `fk_TVLGrupo_has_TVLUser_TVLUser2_idx` (`idTVLUser`),
  ADD KEY `fk_TVLGrupo_has_TVLUser_TVLGrupo2_idx` (`idTVLGrupo`);

--
-- Indexes for table `tvllocal`
--
ALTER TABLE `tvllocal`
  ADD PRIMARY KEY (`idTVLLocal`),
  ADD KEY `fk_TVLLocal_TVLPais1_idx` (`idTVLPais`);

--
-- Indexes for table `tvllogradouro`
--
ALTER TABLE `tvllogradouro`
  ADD PRIMARY KEY (`idTVLLogradouro`,`idTVLComplemento`),
  ADD KEY `fk_TVLLogradouro_TVLComplemento1_idx` (`idTVLComplemento`);

--
-- Indexes for table `tvlpais`
--
ALTER TABLE `tvlpais`
  ADD PRIMARY KEY (`idTVLPais`,`idTVLUF`),
  ADD KEY `fk_TVLPais_TVLUF1_idx` (`idTVLUF`);

--
-- Indexes for table `tvlpost`
--
ALTER TABLE `tvlpost`
  ADD PRIMARY KEY (`idTVLPost`),
  ADD KEY `fk_TVLPost_TVLGrupo1_idx` (`idTVLGrupo`),
  ADD KEY `fk_TVLPost_TVLUser1_idx` (`idTVLUser`);

--
-- Indexes for table `tvltelefone`
--
ALTER TABLE `tvltelefone`
  ADD PRIMARY KEY (`idTVLTelefone`),
  ADD KEY `fk_TVLTelefone_TVLLocal1_idx` (`idTVLLocal`);

--
-- Indexes for table `tvltelefoneuser`
--
ALTER TABLE `tvltelefoneuser`
  ADD PRIMARY KEY (`idTVLUser`,`idTVLTelefone`),
  ADD KEY `fk_TVLUser_has_TVLTelefone1_TVLTelefone1_idx` (`idTVLTelefone`),
  ADD KEY `fk_TVLUser_has_TVLTelefone1_TVLUser1_idx` (`idTVLUser`);

--
-- Indexes for table `tvltravel`
--
ALTER TABLE `tvltravel`
  ADD PRIMARY KEY (`idTVLTravel`),
  ADD KEY `fk_TVLTravel_TVLUser1_idx` (`idTVLUser`),
  ADD KEY `fk_TVLTravel_TVLGrupo1_idx` (`TVLGrupo`);

--
-- Indexes for table `tvltravellocal`
--
ALTER TABLE `tvltravellocal`
  ADD PRIMARY KEY (`idTVLTravel`,`idTVLLocal`),
  ADD KEY `fk_TVLTravel_has_TVLLocal_TVLLocal1_idx` (`idTVLLocal`),
  ADD KEY `fk_TVLTravel_has_TVLLocal_TVLTravel1_idx` (`idTVLTravel`);

--
-- Indexes for table `tvluf`
--
ALTER TABLE `tvluf`
  ADD PRIMARY KEY (`idTVLUF`),
  ADD KEY `fk_TVLUF_TVLCidade1_idx` (`idTVLCidade`);

--
-- Indexes for table `tvluser`
--
ALTER TABLE `tvluser`
  ADD PRIMARY KEY (`idTVLUser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tvlcep`
--
ALTER TABLE `tvlcep`
  MODIFY `idTVLCEP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tvlcidade`
--
ALTER TABLE `tvlcidade`
  MODIFY `idTVLCidade` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tvlfoto`
--
ALTER TABLE `tvlfoto`
  MODIFY `idTVLFoto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tvlfriend`
--
ALTER TABLE `tvlfriend`
  MODIFY `idTVLFriend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tvlgrupo`
--
ALTER TABLE `tvlgrupo`
  MODIFY `idTVLGrupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tvllocal`
--
ALTER TABLE `tvllocal`
  MODIFY `idTVLLocal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tvlpais`
--
ALTER TABLE `tvlpais`
  MODIFY `idTVLPais` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tvlpost`
--
ALTER TABLE `tvlpost`
  MODIFY `idTVLPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tvltravel`
--
ALTER TABLE `tvltravel`
  MODIFY `idTVLTravel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tvluf`
--
ALTER TABLE `tvluf`
  MODIFY `idTVLUF` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tvluser`
--
ALTER TABLE `tvluser`
  MODIFY `idTVLUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tvlavaliacao`
--
ALTER TABLE `tvlavaliacao`
  ADD CONSTRAINT `fk_TVLAvaliacao_TVLTravel1` FOREIGN KEY (`idTVLTravel`) REFERENCES `tvltravel` (`idTVLTravel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TVLAvaliacao_TVLUser` FOREIGN KEY (`idTVLUser`) REFERENCES `tvluser` (`idTVLUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvlcep`
--
ALTER TABLE `tvlcep`
  ADD CONSTRAINT `fk_TVLCEP_TVLLogradouro1` FOREIGN KEY (`idTVLLogradouro`) REFERENCES `tvllogradouro` (`idTVLLogradouro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvlcidade`
--
ALTER TABLE `tvlcidade`
  ADD CONSTRAINT `fk_TVLCidade_TVLCEP1` FOREIGN KEY (`idTVLCEP`) REFERENCES `tvlcep` (`idTVLCEP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvlfoto`
--
ALTER TABLE `tvlfoto`
  ADD CONSTRAINT `fk_TVLFoto_TVLUser1` FOREIGN KEY (`idTVLUser`) REFERENCES `tvluser` (`idTVLUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvlfriend`
--
ALTER TABLE `tvlfriend`
  ADD CONSTRAINT `fk_TVLUser_has_TVLUser_TVLUser1` FOREIGN KEY (`idTVLUser`) REFERENCES `tvluser` (`idTVLUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TVLUser_has_TVLUser_TVLUser2` FOREIGN KEY (`idTVLUser1`) REFERENCES `tvluser` (`idTVLUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvlgrupouser`
--
ALTER TABLE `tvlgrupouser`
  ADD CONSTRAINT `fk_TVLGrupo_has_TVLUser_TVLGrupo2` FOREIGN KEY (`idTVLGrupo`) REFERENCES `tvlgrupo` (`idTVLGrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TVLGrupo_has_TVLUser_TVLUser2` FOREIGN KEY (`idTVLUser`) REFERENCES `tvluser` (`idTVLUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvllocal`
--
ALTER TABLE `tvllocal`
  ADD CONSTRAINT `fk_TVLLocal_TVLPais1` FOREIGN KEY (`idTVLPais`) REFERENCES `tvlpais` (`idTVLPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvllogradouro`
--
ALTER TABLE `tvllogradouro`
  ADD CONSTRAINT `fk_TVLLogradouro_TVLComplemento1` FOREIGN KEY (`idTVLComplemento`) REFERENCES `tvlcomplemento` (`idTVLComplemento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvlpais`
--
ALTER TABLE `tvlpais`
  ADD CONSTRAINT `fk_TVLPais_TVLUF1` FOREIGN KEY (`idTVLUF`) REFERENCES `tvluf` (`idTVLUF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvlpost`
--
ALTER TABLE `tvlpost`
  ADD CONSTRAINT `fk_TVLPost_TVLGrupo1` FOREIGN KEY (`idTVLGrupo`) REFERENCES `tvlgrupo` (`idTVLGrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TVLPost_TVLUser1` FOREIGN KEY (`idTVLUser`) REFERENCES `tvluser` (`idTVLUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvltelefone`
--
ALTER TABLE `tvltelefone`
  ADD CONSTRAINT `fk_TVLTelefone_TVLLocal1` FOREIGN KEY (`idTVLLocal`) REFERENCES `tvllocal` (`idTVLLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvltelefoneuser`
--
ALTER TABLE `tvltelefoneuser`
  ADD CONSTRAINT `fk_TVLUser_has_TVLTelefone1_TVLTelefone1` FOREIGN KEY (`idTVLTelefone`) REFERENCES `tvltelefone` (`idTVLTelefone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TVLUser_has_TVLTelefone1_TVLUser1` FOREIGN KEY (`idTVLUser`) REFERENCES `tvluser` (`idTVLUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvltravel`
--
ALTER TABLE `tvltravel`
  ADD CONSTRAINT `fk_TVLTravel_TVLGrupo1` FOREIGN KEY (`TVLGrupo`) REFERENCES `tvlgrupo` (`idTVLGrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TVLTravel_TVLUser1` FOREIGN KEY (`idTVLUser`) REFERENCES `tvluser` (`idTVLUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvltravellocal`
--
ALTER TABLE `tvltravellocal`
  ADD CONSTRAINT `fk_TVLTravel_has_TVLLocal_TVLLocal1` FOREIGN KEY (`idTVLLocal`) REFERENCES `tvllocal` (`idTVLLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TVLTravel_has_TVLLocal_TVLTravel1` FOREIGN KEY (`idTVLTravel`) REFERENCES `tvltravel` (`idTVLTravel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tvluf`
--
ALTER TABLE `tvluf`
  ADD CONSTRAINT `fk_TVLUF_TVLCidade1` FOREIGN KEY (`idTVLCidade`) REFERENCES `tvlcidade` (`idTVLCidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
