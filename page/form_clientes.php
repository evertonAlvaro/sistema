<?php 
include "../db/conexao.php";
include "../includes/funcoes_php.php";

$id_cliente = (int)pega_query('id');

//banco
$dbh = Conexao::create();

//select Usuários
$stmt = $dbh->prepare('SELECT id_cliente, nome, DATE_FORMAT(data_de_nascimento,"%d-%m-%Y") AS data_de_nascimento, cep, endereco, email, telefone, celular, matricula, login, ativo FROM clientes WHERE id_cliente = :id_cliente');
$stmt->execute(['id_cliente' => $id_cliente]);
$select_cliente = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Clientes</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/form-elements.css">
        <link rel="stylesheet" href="../css/style.css">
		<!-- datepicker -->
		<link rel="stylesheet" href="../js/datepicker/css/datepicker.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

		<?php include "_topo.php" ?>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3><?= $id_cliente > 0 ? "Editar":"Cadastrar";?> Cliente</h3>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <form class="form-horizontal" id="form_clientes" method="post">
                                    <input type="hidden" id="id_cliente" name="id_cliente" value="<?=$id_cliente?>">
                                    <fieldset>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="nome">Nome</label>  
                                            <div class="col-md-12">
                                                <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="" value="<?= (isset($select_cliente['nome'])) ? $select_cliente['nome'] : null ?>">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="data_de_nascimento">Data de Nascimento</label>
                                            <div class="col-md-12">
                                                <input id="data_de_nascimento" name="data_de_nascimento" type="text" placeholder="Data de Nascimento" class="form-control input-md" required="" value="<?= (isset($select_cliente['data_de_nascimento'])) ? $select_cliente['data_de_nascimento'] : null ?>">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="cep">CEP</label>  
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <input id="cep" name="cep" type="text" placeholder="CEP" class="form-control input-md" required="" value="<?= (isset($select_cliente['cep'])) ? $select_cliente['cep'] : null ?>">
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <button type="button" id="btn_cep" class="btn col-xs-12 col-sm-12 col-md-12">Buscar CEP</button>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="endereco">Endereço</label>  
                                            <div class="col-md-12">
                                                <input id="endereco" name="endereco" type="text" placeholder="Endereço" class="form-control input-md" required="" value="<?= (isset($select_cliente['endereco'])) ? $select_cliente['endereco'] : null ?>">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Email</label>  
                                            <div class="col-md-12">
                                                <input id="email" name="email" type="email" placeholder="email" class="form-control input-md" required="" value="<?= (isset($select_cliente['email'])) ? $select_cliente['email'] : null ?>">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="telefone">Telefone</label>  
                                            <div class="col-md-12">
                                                <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="form-control input-md mask_telefone" value="<?= (isset($select_cliente['telefone'])) ? $select_cliente['telefone'] : null ?>">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="celular">Celular</label>  
                                            <div class="col-md-12">
                                                <input id="celular" name="celular" type="text" placeholder="Celular" class="form-control input-md mask_telefone" value="<?= (isset($select_cliente['celular'])) ? $select_cliente['celular'] : null ?>">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="matricula">Matrícula</label>  
                                            <div class="col-md-12">
                                                <input id="matricula" name="matricula" type="text" placeholder="Matrícula" class="form-control input-md" required="" value="<?= (isset($select_cliente['matricula'])) ? $select_cliente['matricula'] : null ?>">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="login">Login</label>  
                                            <div class="col-md-12">
                                                <input id="login" name="login" type="text" placeholder="Login" class="form-control input-md" required="" value="<?= (isset($select_cliente['login'])) ? $select_cliente['login'] : null ?>">
                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="senha">Senha</label>
                                            <div class="col-md-12">
                                                <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control input-md">
                                              
                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="form-group">
                                            <label class="sr-only" for="confirmar_senha">Confirmar Senha</label>
                                            <div class="col-md-12">
                                                <input id="confirmar_senha" name="confirmar_senha" type="password" placeholder="Confirmar Senha" class="form-control input-md">
                                              
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="ativo" <?= (isset($select_cliente['ativo']) && $select_cliente['ativo'] == 1) ? "checked" : "" ?>> Ativo
                                                    </label>
                                                </div>
                                            </div>
                                        </div>    

                                        <!-- Button -->
                                        <div class="form-group">
                                            <label class="sr-only" for="envia"></label>
                                            <div class="col-md-12">
                                              <button type="submit" id="envia" name="envia" class="btn col-xs-12 col-sm-12 col-md-12">Enviar</button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery.backstretch.min.js"></script>
        <script src="../js/retina-1.1.0.min.js"></script>
        <script src="../js/scripts.js"></script>
		<!-- datepicker -->
        <script src="../js/datepicker/js/bootstrap-datepicker.js"></script>
        <!-- mascaras -->
		<script src="../js/jquery.maskedinput.js"></script>
        
        <!--[if lt IE 10]>
            <script src="../js/placeholder.js"></script>
        <![endif]-->

        <script src="../js/formulario.js"></script>

    </body>

</html>