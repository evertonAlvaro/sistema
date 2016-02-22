Não esquecer de trocar os dados de conexão com o banco no arquivo "db/conexao.php"

sql para criação da tabela



CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` int(1) NOT NULL DEFAULT '0',
  `dt_cadastro` datetime NOT NULL
)
ou usar o arquivo clientes.sql na pasta "sql" para gerar a tabela