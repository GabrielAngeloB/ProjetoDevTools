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
$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

$sql = "SELECT * FROM ferramentas";
if ($pesquisa) {
    $sql .= " WHERE nome_ferramenta LIKE '%$pesquisa%' OR desc_ferramenta LIKE '%$pesquisa%'";
}

$resultado = $conecta->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            .navbar-inverse .navbar-nav > li > a {
                color: #fff;
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
            <h2 style='text-align:center; color:white; font-size:40px;'>Ferramentas Cadastradas</h2>
            <div class="row">
                <hr style='padding-bottom:20px'>
                <?php
                if ($resultado->num_rows > 0) {
                    while ($linha = $resultado->fetch_assoc()) {
                        echo '
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="' . $linha["img_ferramenta"] . '" style="height:170px;" width="100%" alt="Imagem de ' . $linha["nome_ferramenta"] . '" class="img-responsive">
                                <h4 style="font-weight:bold;">' . $linha["nome_ferramenta"] . '</h4>
                                <p style="max-height:140px; overflow:auto;">' . $linha["desc_ferramenta"] . '</p>
                                <a style="display:flex; justify-content:center;" href="' . $linha["link_ferramenta"] . '" class="btn btn-primary">Ver mais</a>
                            </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo '<p style="color:white; font-size:40px; padding-top:30px; text-align:center; text-decoration:underline;">Nenhuma ferramenta encontrada.</p>';
                }
                $conecta->close();
                ?>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
