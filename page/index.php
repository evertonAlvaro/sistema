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
                        <div class="col-sm-12 text">
                        	<div style="background-color: rgba(208, 208, 208, 0.3); padding: 20px; border-radius: 4px;">
	                            <h1><strong>Cadastro</strong> de clientes</h1>
	                            <div class="description">
	                            	<p>
		                            	"Ver Clientes Cadastrados" lista todos os clientes cadastrados.
	                            	</p>
                                    <p>
                                        "Cadastrar Cliente Novo" abre o formulário para o cadastro de novos Clientes.
                                    </p>
	                            </div>
	                            <div class="top-big-link">
	                            	<a class="btn btn-link-2" href="lista_clientes.php">Ver Clientes Cadastrados</a>
                                    <a class="btn btn-link-2" href="form_clientes.php">Cadastrar Cliente Novo</a>
	                            </div>
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
        
        <!--[if lt IE 10]>
            <script src="../js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>