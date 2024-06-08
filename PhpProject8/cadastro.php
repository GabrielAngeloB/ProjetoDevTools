<?php

session_start();
require('conecta.php');
$nome = $_POST['nomecomp'];
$email = $_POST['email2'];
$senha = $_POST['senha2'];
$confsenha = $_POST['confsenha'];

if ($confsenha == $senha) {
    $ok = true;
    $erro1 = false;
    require ('conecta.php');
    $tenta_achar = "SELECT * FROM usuario WHERE email_usuario='$email' OR nome_usuario='$nome'";
    $resultado = $conecta->query($tenta_achar);
    if ($resultado->num_rows > 0) {
        $erro1 = true;
        $_SESSION['erro1'] = true;
        echo "<script>
            alert('Usuario ou Email já existem!');
                window.location.href = 'logcad.php';
            </script>";
        $ok = false;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ok = false;
        }
        if ((!isset($nome) or empty($nome))) {


            echo "<script> 
                window.location.href = 'logcad.php';
            </script>";
            $ok = false;
        }
        if (!isset($email) or empty($email)) {
            $ok = false;
        }
        if (!isset($senha) or empty($senha) or strlen($senha) < 8) {

            echo "<script> 
                window.location.href = 'logcad.php';
            </script>";
            $ok = false;
        }
        if ($ok) {
            date_default_timezone_set('America/Sao_Paulo');
                        $tempo = time();
                        $horarioatual = date("Y-m-d H:i:s", $tempo);
            $sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, horario_criado)
                   VALUES ('$nome', '$email', '" . md5($senha) . "', '$horarioatual')";
            if ($conecta->query($sql) === TRUE) {
                $login = $email;
                $senha = $senha;
                echo " <link href='css2/estilos.css' type='text/css' rel='stylesheet'> <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js'></script>"
        . "<link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css' rel='stylesheet'>"
        . "<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>";
        echo "<script>
                window.onload = function() {
                    document.body.style.backgroundColor = '#37363d';
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Cadastrado com sucesso!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            popup: 'custom-swal-popup'
                        },
                        allowOutsideClick: false,
                        timer: 3000,
                        timerProgressBar: true
                    }).then((result) => {
                        window.location.href = 'logcad.php';
                    });

                    const timerInterval = setInterval(() => {
                        if (Swal.getTimerLeft() <= 0) {
                            clearInterval(timerInterval);
                            window.location.href = 'logcad.php';
                        }
                    }, 100);
                }
              </script>";
        echo "<style>
                .custom-swal-popup {
                    font-family: 'Poppins', sans-serif !important;
               /* Adiciona espaçamento entre as letras */
            }
              </style>";
                $ok = true;
            } else {
                $ok = false;
            }
        }
    }
}else {
    echo "<script> 
                window.location.href = 'logcad.php';
            </script>";
}


