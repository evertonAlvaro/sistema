<?php 
include "../db/conexao.php";
include "../includes/funcoes_php.php";
include "../includes/pagination.php";

$pesquisa = pega_query("p");
$pag = ((int)pega_query("pag")) ? (int)pega_query("pag") : 1;
$paginationMax = 4;
$limit = getLimit($pag,$paginationMax);

//banco
$dbh = Conexao::create();
//condições
$where = " WHERE id_cliente > 0 ";
$array_pesquisa = [];
if ($pesquisa) {
    $where .= " AND ((nome LIKE :pesquisa) OR (email LIKE :pesquisa))";
    $array_pesquisa['pesquisa'] = '%' . str_replace('
         ', '%', $pesquisa) . '%';
}

//select Usuários
$stmt = $dbh->prepare('SELECT id_cliente, nome, data_de_nascimento, cep, endereco, email, telefone, celular, matricula, login FROM clientes '.$where.' ORDER BY id_cliente DESC '.$limit);
$stmt->execute($array_pesquisa);
$select_users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//select dados para paginação
$stmt = $dbh->prepare('SELECT Count(id_cliente) FROM clientes '.$where);
$stmt->execute($array_pesquisa);
$paginationTotal = $stmt->fetchColumn();

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista de Clientes</title>

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
        
        <style type="text/css">
            .table th{
                text-align:center;
            }
        </style>
    </head>

    <body>
        
        <?php include "_topo.php" ?>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="container" style="background-color: rgba(255, 255, 255, 1); padding: 10px 10px 20px 10px; border-radius: 4px; margin-bottom: 10px;">
                        <form action="lista_clientes.php" id="frm_busca">
                            <input type="hidden" id="pag" name="pag" value="<?=$pag?>">
                            <div class="form-group">
                                <label class="sr-only" for="p">Pesquisa</label>  
                                <div class="col-md-10">
                                    <input id="p" name="p" type="text" placeholder="Pesquisar por Nome ou Email" class="form-control input-md" value="<?= (isset($pesquisa)) ? $pesquisa : null ?>">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" id="btn_pesquisa" class="btn"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="container" style="background-color: rgba(255, 255, 255, 1); padding: 20px; border-radius: 4px;">
                                <h1><strong>Lista de Clientes</strong></h1>
                                <!-- <p>The .table-striped class adds zebra-stripes to a table:</p> -->            
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Matrícula</th>
                                            <th>Login</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($select_users as $key => $value): ?>
                                            <tr>
                                                <td><?=$value['nome']?></td>
                                                <td><?=$value['email']?></td>
                                                <td><?=$value['matricula']?></td>
                                                <td><?=$value['login']?></td>
                                                <td><a href="form_clientes.php?id=<?=$value['id_cliente']?>"><i class="fa fa-pencil"></i></a></td>
                                            </tr>
                                            
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <?php pagination($paginationTotal, $paginationMax, $pag) ?>
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

        <script>
            $(function() {
                //função para a paginação
                $(".pagination li a").click(function(event) {
                    var pagina = $(this).attr('data-pag');
                    $("#pag").val(pagina);
                    $("#frm_busca").submit();
                });
            });
        </script>

    </body>

</html>