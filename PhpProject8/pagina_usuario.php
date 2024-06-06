<?php
session_start();
require('conecta.php');
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    session_unset();
    echo "<link href='css2/estilos.css' type='text/css' rel='stylesheet'> "
    . "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js'></script>"
    . "<link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css' rel='stylesheet'>"; // Adiciona o link para o CSS customizado
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                // Altera o background da página
                document.body.style.backgroundColor = '#37363d';
                
                Swal.fire({
                    title: 'Erro!',
                    text: 'Esta página só pode ser acessada por usuário logado!',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'custom-swal-popup'
                    },
                    allowOutsideClick: false, // Evita fechar ao clicar fora do alerta
                    timer: 3000,
                    timerProgressBar: true
                }).then((result) => {
                    window.location.href = 'logcad.php';
                });

                // Caso o SweetAlert2 seja fechado pelo temporizador, redirecionar para a página de login
                Swal.getTimerLeft();
                const timerInterval = setInterval(() => {
                    if (Swal.getTimerLeft() <= 0) {
                        clearInterval(timerInterval);
                        window.location.href = 'logcad.php';
                    }
                }, 100);
            });
          </script>";
    exit; // Certifique-se de parar a execução do script após redirecionar
}

$logado = $_SESSION['login'];
if (isset($_SESSION['id_usuario'])) {
    
    $id_usuario = $_SESSION['id_usuario'];
    // Verifica se o ID do usuário existe no banco de dados
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $resultado = $conecta->query($sql);
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            $nome = $linha['nome_usuario'];
            $email = $linha['email_usuario'];
            $horario = $linha['horario_criado'];
            $data_formatada = date('d/m/Y h:i:s', strtotime($horario));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar com Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
    <style>
        /* Estilos para a barra de navegação */
        .navbar {
            border-radius: 0;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 20px;
            color: #fff;
        }

        .navbar-inverse .navbar-nav > li > a {
            color: #fff;
        }

        .navbar-inverse .navbar-nav > li > a:hover {
            background-color: #222;
        }

        /* Estilos para o cartão de informações do usuário */
        .panel-custom {
            border-radius: 10px;
            border: none;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.2);
        }

        .panel-heading-custom {
            background-color: #337ab7;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .panel-heading-custom h3 {
            margin-top: 0;
            padding: 10px 20px;
            font-size: 24px;
        }

        .panel-body-custom {
            padding: 20px;
        }

        .panel-body-custom p {
            margin-bottom: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body style="background-color:#333333;">
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="index.php" class="navbar-brand" style="font-weight:bold;">DevTools</a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php" style="font-weight:bold;">Inicio</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-weight:bold;">Ferramentas <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a style="text-decoration:underline;" href="somar.php">Somar</a></li>
                                    <li><a style="text-decoration:underline;" href="subtracao.php">Subtração</a></li>
                                    <li><a style="text-decoration:underline;" href="divisao.php">Divisão</a></li>
                                    <li><a style="text-decoration:underline;" href="multiplicar.php">Multiplicação</a></li>
                                    <li><a style="text-decoration:underline;" href="potencia.php">Potência</a></li>
                                    <li><a style="text-decoration:underline;" href="raiz_quadrada.php">Raiz quadrada</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search" method="get" action="">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="search" name="pesquisa" style="border-radius:5px" placeholder="Pesquisar..." class="form-control">
                                    <span class="input-group-btn" style="padding-left:5px;">
                                        <button type="submit" class="btn btn-default" style="border-radius:5px"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                            </div>
                        </form>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="pagina_usuario.php"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Trocar Senha / Sair <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="trocar_senha.php">Trocar Senha</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartão de informações do usuário -->
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary panel-custom">
                    <div class="panel-heading panel-heading-custom">
                        <h3 class="panel-title" style="text-decoration:underline;">Informações do Usuário</h3>
                    </div>
                    <div class="panel-body panel-body-custom">
                        <p><strong>Nome:</strong> <?php echo $nome ?></p>
                        <p><strong>Email:</strong> <?php echo $email ?></p>
                        <p><strong>Data de Criação:</strong> <?php echo $data_formatada ?></p>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Deletar Conta</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação para excluir conta -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="confirmDeleteLabel">Confirmar Exclusão de Conta</h4>
            </div>
            <div class="modal-body">
                <p>Olá, <?php echo $nome ?>. Tem certeza de que deseja excluir sua conta?</p>
            </div>
            <div class="modal-footer">
                <form action="deletar_conta.php" method="post" class="form-inline">
                    <input type="hidden" name="deletar" value="true">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger pull-right">Excluir Conta</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>


