<?php

$nome_servidor = "sql10.freesqldatabase.com";
$nome_usuario = "sql10712214";
$senhabanco = "FlbEkTpNzv";
$banco = "sql10712214";

$conecta = new mysqli($nome_servidor, $nome_usuario, $senhabanco, $banco);
if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error . "<br>");
}
mysqli_set_charset($conecta, "utf8mb4");
?>
        