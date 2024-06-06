<?php
session_start();
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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar com Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .navbar-inverse .navbar-nav > li > a {
            color: #fff;
        }
        .panel-default {
            border-color: #ddd;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }
        .panel-heading {
            background-color: #337ab7;
            color: #fff;
            border-color: #337ab7;
            border-radius: 5px 5px 0 0;
            font-weight: bold;
        }
        .panel-body {
            background-color: #f7f7f7;
        }
        .form-control {
            border-radius: 0;
        }
        .btn-primary {
            border-radius: 0;
            background-color: #337ab7;
            border-color: #2e6da4;
        }
        .btn-primary:hover {
            background-color: #286090;
            border-color: #204d74;
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
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size:20px; background-color:#337ab7; text-align:center; color:black">Trocar Senha</div>
                    <div class="panel-body">
                        <form action="recebe_trocar_senha.php" method="post">
                            <div class="form-group">
                                <label for="senha_atual">Senha Atual:</label>
                            <input type="password" class="form-control" id="senha_atual" name="senha_atual" >
                        </div>
                            <div class="form-group">
                                <label for="nova_senha">Nova Senha:</label>
                                <input type="password" class="form-control" id="nova_senha" name="nova_senha" >
                            </div>
                            <div class="form-group">
                                <label for="confirmar_senha">Confirmar Nova Senha:</label>
                                <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" >
                            </div>
                            <button type="submit" class="btn btn-primary">Trocar Senha</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#trocarSenhaForm').submit(function(e) {
                var senhaAtual = $('#senha_atual').val();
                var novaSenha = $('#nova_senha').val();
                var confirmarSenha = $('#confirmar_senha').val();
                
                // Verifica se algum campo está vazio
                if (senhaAtual.trim() === '' || novaSenha.trim() === '' || confirmarSenha.trim() === '') {
                    e.preventDefault(); // Evita o envio do formulário
                    
                    // Exibe uma mensagem de erro abaixo do formulário
                    $('#erro').html('<div class="alert alert-danger" role="alert">Todos os campos devem ser preenchidos.</div>');
                } else if (novaSenha !== confirmarSenha) {
                    e.preventDefault(); // Evita o envio do formulário
                    
                    // Exibe uma mensagem de erro abaixo do formulário
                    $('#erro').html('<div class="alert alert-danger" role="alert">A nova senha e a confirmação da senha não coincidem.</div>');
                }
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
