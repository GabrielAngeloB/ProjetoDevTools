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


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_ferramenta = $_POST['nome_ferramenta'];
    $desc_ferramenta = $_POST['desc_ferramenta'];
    $img_ferramenta = $_POST['img_ferramenta'];
    $link_ferramenta = $_POST['link_ferramenta'];

    if (!isset($nome_ferramenta) || empty($nome_ferramenta) || !isset($desc_ferramenta) || empty($desc_ferramenta) || !isset($img_ferramenta) || empty($img_ferramenta) || !isset($link_ferramenta) || empty($link_ferramenta)) {
        echo "<script>
            alert('Todos os campos são obrigatórios!');
            window.location.href = 'index.php';
        </script>";
        exit;
    }

    // Verifica se o nome da ferramenta já existe
    $sql = "SELECT * FROM ferramentas WHERE nome_ferramenta='$nome_ferramenta'";
    $resultado = $conecta->query($sql);
    if ($resultado->num_rows > 0) {
        $_SESSION['erro'] = true;
        echo "<script>
            alert('Essa ferramenta já existe!');
            window.location.href = 'index.php';
        </script>";
    } else {
        // Insere os dados na tabela ferramentas
        $sql1 = "INSERT INTO ferramentas (nome_ferramenta, desc_ferramenta, img_ferramenta, link_ferramenta)
                VALUES ('$nome_ferramenta', '$desc_ferramenta', '$img_ferramenta', '$link_ferramenta')";
        if ($conecta->query($sql1) === TRUE) {
            echo "<script>
                alert('Ferramenta cadastrada com sucesso!');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "Erro: " . $sql1 . "<br>" . $conecta->error;
        }
    }

    $conecta->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ferramentas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Cadastro de Ferramentas</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="nome_ferramenta" class="form-label">Nome da Ferramenta:</label>
                                <input type="text" id="nome_ferramenta" name="nome_ferramenta" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="desc_ferramenta" class="form-label">Descrição da Ferramenta:</label>
                                <textarea id="desc_ferramenta" name="desc_ferramenta" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="img_ferramenta" class="form-label">Link da Imagem da Ferramenta:</label>
                                <input type="text" id="img_ferramenta" name="img_ferramenta" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="link_ferramenta" class="form-label">Link do Arquivo PHP da Ferramenta:</label>
                                <input type="text" id="link_ferramenta" name="link_ferramenta" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


