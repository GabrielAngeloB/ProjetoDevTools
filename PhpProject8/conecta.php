<?php

$nome_servidor = "sql10.freemysqlhosting.net";
$nome_usuario = "sql10712210";
$senhabanco = "1DDLGEZ7Ba";
$banco = "sql10712210";

$conecta = new mysqli($nome_servidor, $nome_usuario, $senhabanco, $banco);
if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error . "<br>");
}
mysqli_set_charset($conecta, "utf8mb4");
?>
        