CREATE DATABASE controleadmin;
USE controleadmin;

CREATE TABLE `administrador` (
  `cod` int(11) NOT NULL,
  `login` char(20) DEFAULT NULL,
  `senha` char(10) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `ativo` char(32) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `confsenha` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `cod` int(11) NOT NULL,
  `administrador_cod` int(11) NOT NULL,
  `contas` varchar(255) DEFAULT NULL,
  `dinheiro_ano` date DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_categorias`
--

CREATE TABLE `contas_categorias` (
  `cod` int(10) UNSIGNED NOT NULL,
  `nome_contas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_dividas`
--

CREATE TABLE `controle_dividas` (
  `cod` int(10) UNSIGNED NOT NULL,
  `administrador_cod` int(11) NOT NULL,
  `data_dividas` date DEFAULT NULL,
  `entrada` decimal(15,2) DEFAULT NULL,
  `novaentrada` decimal(15,2) DEFAULT NULL,
  `saldo` decimal(15,2) DEFAULT NULL,
  `observacao` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dinheiro`
--

CREATE TABLE `dinheiro` (
  `cod` int(11) NOT NULL,
  `administrador_cod` int(11) NOT NULL,
  `entrada` decimal(15,2) DEFAULT NULL,
  `saida` decimal(15,2) DEFAULT NULL,
  `saldo` decimal(15,2) DEFAULT NULL,
  `relatorio` varchar(255) DEFAULT NULL,
  `novasaida` decimal(15,2) DEFAULT NULL,
  `ano` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `FK_contas_administrador_cod` (`administrador_cod`);

--
-- Indexes for table `contas_categorias`
--
ALTER TABLE `contas_categorias`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `controle_dividas`
--
ALTER TABLE `controle_dividas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `FK_controle_dividas_administrador_cod` (`administrador_cod`);

--
-- Indexes for table `dinheiro`
--
ALTER TABLE `dinheiro`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `FK_dinheiro_administrador_cod` (`administrador_cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contas`
--
ALTER TABLE `contas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contas_categorias`
--
ALTER TABLE `contas_categorias`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `controle_dividas`
--
ALTER TABLE `controle_dividas`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dinheiro`
--
ALTER TABLE `dinheiro`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contas`
--
ALTER TABLE `contas`
  ADD CONSTRAINT `FK_contas_administrador_cod` FOREIGN KEY (`administrador_cod`) REFERENCES `administrador` (`cod`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `controle_dividas`
--
ALTER TABLE `controle_dividas`
  ADD CONSTRAINT `FK_controle_dividas_administrador_cod` FOREIGN KEY (`administrador_cod`) REFERENCES `administrador` (`cod`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `dinheiro`
--
ALTER TABLE `dinheiro`
  ADD CONSTRAINT `FK_dinheiro_administrador_cod` FOREIGN KEY (`administrador_cod`) REFERENCES `administrador` (`cod`) ON UPDATE CASCADE;


