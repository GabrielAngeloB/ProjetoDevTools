<?php

session_start();
require('conecta.php');

// Verifique se os campos do formulário estão definidos antes de acessá-los
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senhalogin = $_POST['senha'];

        function verificarDados($email, $senhalogin) {
            require('conecta.php');
            $tenta_achar = "SELECT * FROM usuario WHERE email_usuario='$email' AND senha_usuario='" . md5($senhalogin) . "'";
            $resultado = $conecta->query($tenta_achar);
            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    $_SESSION['id_usuario'] = $linha["id_usuario"];
                }
                $_SESSION['login'] = $email;
                $_SESSION['senha'] = $senhalogin;
                header('location:index.php');
                exit;
            } else {
                $_SESSION['erro1'] = true;
                echo "<script>
                alert('Dados não conferem!');
                window.location.href = 'logcad.php';
            </script>";
                
            }
        }
        

        verificarDados($email, $senhalogin);
    } else {
        // Campos do formulário não foram definidos
        $_SESSION['erro2'] = true;
        echo "<script>
            alert('Dados não conferem!');
                window.location.href = 'logcad.php';
            </script>";
        header('location:logcad.php');
        exit;
    }
}else {
    
}
$conecta->close();
?>
