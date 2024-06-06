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
            echo "<script> 
                window.location.href = 'logcad.php';
            </script>";
        }
        echo "<script> 
                window.location.href = 'logcad.php';
            </script>";
}else {
    echo "teste";
}


