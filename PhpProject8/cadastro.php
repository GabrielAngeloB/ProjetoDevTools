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
                header('location:logcad.php');
                $ok = true;
            } else {
                $ok = false;
            }
        }
    }
}else {
    header('location:logcad.php');
}


