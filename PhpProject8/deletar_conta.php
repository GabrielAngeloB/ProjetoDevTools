<?php
session_start();
require('conecta.php');
if (isset($_SESSION['id_usuario'])) {
    
    $id_usuario = $_SESSION['id_usuario'];
}
if (isset($_POST['deletar'])) {
    $sql = "DELETE FROM usuario WHERE id_usuario=$id_usuario";
    if (!$conecta->query($sql)) {
            echo "Erro ao atualizar ao excluir o usuario: " . $conecta->error . "<br>";
        }else {
            echo " <link href='css2/estilos.css' type='text/css' rel='stylesheet'> <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js'></script>"
        . "<link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css' rel='stylesheet'>"
        . "<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>";
        echo "<script>
                window.onload = function() {
                    document.body.style.backgroundColor = '#37363d';
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Conta deletada com sucesso!',
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
            
        }
        echo " <link href='css2/estilos.css' type='text/css' rel='stylesheet'> <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js'></script>"
        . "<link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css' rel='stylesheet'>"
        . "<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>";
        echo "<script>
                window.onload = function() {
                    document.body.style.backgroundColor = '#37363d';
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Conta deletada com sucesso!',
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
}else {
    echo "teste";
}


