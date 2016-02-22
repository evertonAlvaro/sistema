<?php 
include "../db/conexao.php";
include "../includes/funcoes_php.php";

require "../vendor/vlucas-valitron/src/Valitron/Validator.php";
require "../vendor/vlucas-valitron/lang/pt-br.php";

use Valitron\Validator;

//banco
$dbh = Conexao::create();

$id_cliente = (int)$_POST['id_cliente'];
$_POST['ativo'] = isset($_POST['ativo']) ? "1" : "0";

//tratando data
$newDate = date("Y-m-d", strtotime((string)str_replace("/", "-", $_POST['data_de_nascimento'])));
$_POST['data_de_nascimento'] = $newDate;

//valitron
validator::lang('pt-br');
$v = new validator($_POST);
$v->rules([
	'required' => [
		['nome'], ['data_de_nascimento'], ['cep'], ['endereco'], ['email'], ['telefone'], ['matricula'], ['login']
	],
	'email' => [
		['email']
	],
	'equals' => [
		['senha', 'confirmar_senha']
	],
	'dateFormat' => [
		['Y-m-d']
	],
	'date' => [
		['data_de_nascimento']
	]
]);

$mensagem = '';
$erro = 0;

//verifica se Login já existe
$stmt = $dbh->prepare('SELECT login FROM clientes WHERE login = :login AND id_cliente <> :id_cliente');
$stmt->execute(['login' => $_POST['login'], 'id_cliente' => $id_cliente]);
if ($stmt->fetch(PDO::FETCH_ASSOC)) {
	$mensagem .= "Este login já existe!\nPor favor escolha outro\n";
	$erro = 1;
}

//senha
if (strlen($_POST['senha']) < 4 && $id_cliente == 0) {
	$mensagem .= "Insira uma Senha\nMínimo 4 caracteres\n";
	$erro = 1;
}
//destruindo o segundo campo de senha
unset($_POST['confirmar_senha']);

//verifica se não houve erros
if ($v->validate() && $erro == 0) {
	//senha
	if (strlen($_POST['senha']) > 0) {
		//criptografando senha
		$_POST['senha'] = md5($_POST['senha']);
		$sql_senha = ", senha = :senha ";
	} else {
		unset($_POST['senha']);
		unset($_POST['confirmar_senha']);
	}
		
	//verifica se é atualização ou novo cliente
	if ($id_cliente > 0) {
		
		$query = 'UPDATE clientes SET nome = :nome, data_de_nascimento = :data_de_nascimento, cep = :cep, endereco = :endereco, email = :email, telefone = :telefone, celular = :celular, matricula = :matricula, login = :login, ativo = :ativo WHERE id_cliente = :id_cliente';
	} else {
		$query = 'INSERT INTO clientes (nome, data_de_nascimento, cep, endereco, email, telefone, celular, matricula, login, senha, ativo, dt_cadastro) VALUES (:nome, :data_de_nascimento, :cep, :endereco, :email, :telefone, :celular, :matricula, :login, :senha, :ativo, CURRENT_TIMESTAMP)';
		unset($_POST['id_cliente']);
	}	
	$stmt = $dbh->prepare($query);
	//retorno ao script
	if ($stmt->execute($_POST)){
		echo $erro;
	}else{
		echo "Houve um Erro";
	}
}else{
	//mensagens do valitron sendo tratadas
	$mensagem .= validationErrorsList($v->errors(), '\n');
	$mensagem = str_replace("'", '"', $mensagem);
	echo $mensagem;
}
?>