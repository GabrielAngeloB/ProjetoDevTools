<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='estilos.css' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jsfile.js"></script>
    <style>
        button:hover {
            cursor: pointer;
            background-color: darkblue;
        }
        .error-message {
            color: red;
            font-size: 14px;
            font-weight: bold;
            display: none;
            position: relative;
            bottom: 15px;
            left: 10px;
        }
    </style>
</head>
<body style="background: grey url('https://hermes.dio.me/articles/cover/a9540108-c492-4bdf-a917-2976a8864cc0.png') no-repeat center center; background-size: cover;">
<div class="background-overlay"></div>
<div class="container" style="opacity: 1.0">
    <div class="frame">
        <div class="nav">
            <ul class="links">
                <li class="signin-active"><a class="btn">Entrar</a></li>
                <li class="signup-inactive"><a class="btn">Registrar-se </a></li>
            </ul>
        </div>
        <form class="form-signin" action="login.php" method="post" name="form" style="height:350px;" onsubmit="return validarForm()">
            <label for="email" style="font-weight: bold;">Email</label>
            <input class="form-styling" type="text" name="email" id="email" placeholder="">
            <span class="error-message" id="email-login-error"></span>
            <label for="senha" style="font-weight: bold;">Senha</label>
            <input class="form-styling" type="password" name="senha" id="senha" placeholder="">
            <span class="error-message" id="senha-login-error"></span>
            <button type="submit" class="btn-signup" style="width: 100%; height: 40px;"><span style="position: relative; bottom: 4px;">Entrar</span></button>
        </form>
        <form class="form-signup" action="cadastro.php" method="post" name="form2" style="height:400px;" onsubmit="return validarForm2()">
            <label for="nomecomp" style="font-weight: bold;">Nome Completo</label>
            <input class="form-styling" type="text" name="nomecomp" id="nomecomp" placeholder="">
            <span class="error-message" id="nomecomp-error"></span>
            <label for="email2" style="font-weight: bold;">Email</label>
            <input class="form-styling" type="email" name="email2" id="email2" placeholder="">
            <span class="error-message" id="email2-error"></span>
            <label for="senha2" style="font-weight: bold;">Senha</label>
            <input class="form-styling" type="password" name="senha2" id="senha2" placeholder="">
            <span class="error-message" id="senha2-error"></span>
            <label for="confsenha" style="font-weight: bold;">Confirmar senha</label>
            <input class="form-styling" type="password" name="confsenha" id="confsenha" placeholder="">
            <span class="error-message" id="confsenha-error"></span>
            <button type="submit" class="btn-signup" style="width: 100%; height: 40px;"><span style="position: relative; bottom: 4px;">Registrar</span></button>
        </form>
    </div>
</div>
<script>
    function validarEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function validarForm() {
        const username = document.getElementById("email");
        const password = document.getElementById("senha");
        const emailLoginError = document.getElementById("email-login-error");
        const senhaLoginError = document.getElementById("senha-login-error");

        let isValid = true;

        // Clear previous error messages
        emailLoginError.style.display = "none";
        senhaLoginError.style.display = "none";

        if (username.value.trim() === "" || password.value.trim() === "") {
            emailLoginError.innerText = "Por favor, preencha todos os campos (Email e Senha).";
            emailLoginError.style.display = "block";
            isValid = false;
        }

        if (!validarEmail(username.value.trim())) {
            emailLoginError.innerText = "Por favor, insira um email válido.";
            emailLoginError.style.display = "block";
            isValid = false;
        }

        if (password.value.length < 8) {
            senhaLoginError.innerText = "A senha deve ter no mínimo 8 caracteres.";
            senhaLoginError.style.display = "block";
            isValid = false;
        }

        return isValid;
    }

    function validarForm2() {
        const nomecomp = document.getElementById("nomecomp");
        const email2 = document.getElementById("email2");
        const senha2 = document.getElementById("senha2");
        const confsenha = document.getElementById("confsenha");
        const nomecompError = document.getElementById("nomecomp-error");
        const email2Error = document.getElementById("email2-error");
        const senha2Error = document.getElementById("senha2-error");
        const confsenhaError = document.getElementById("confsenha-error");

        let isValid = true;

        // Clear previous error messages
        nomecompError.style.display = "none";
        email2Error.style.display = "none";
        senha2Error.style.display = "none";
        confsenhaError.style.display = "none";

        if (nomecomp.value.trim() === "" || email2.value.trim() === "" || senha2.value.trim() === "" || confsenha.value.trim() === "") {
            if (nomecomp.value.trim() === "") {
                nomecompError.innerText = "Por favor, preencha o nome completo.";
                nomecompError.style.display = "block";
            }
            if (email2.value.trim() === "") {
                email2Error.innerText = "Por favor, preencha o email.";
                email2Error.style.display = "block";
            }
            if (senha2.value.trim() === "") {
                senha2Error.innerText = "Por favor, preencha a senha.";
                senha2Error.style.display = "block";
            }
            if (confsenha.value.trim() === "") {
                confsenhaError.innerText = "Por favor, confirme a senha.";
                confsenhaError.style.display = "block";
            }
            isValid = false;
        }

        if (!validarEmail(email2.value.trim())) {
            email2Error.innerText = "Por favor, insira um email válido.";
            email2Error.style.display = "block";
            isValid = false;
        }

        if (nomecomp.value.trim().length < 7) {
            nomecompError.innerText = "O nome completo deve ter no mínimo 7 caracteres.";
            nomecompError.style.display = "block";
            isValid = false;
        }

        if (senha2.value.length < 8) {
            senha2Error.innerText = "A senha deve ter no mínimo 8 caracteres.";
            senha2Error.style.display = "block";
            isValid = false;
        }

        if (senha2.value !== confsenha.value) {
            confsenhaError.innerText = "As senhas não coincidem.";
            confsenhaError.style.display = "block";
            isValid = false;
        }

        return isValid;
    }

    document.forms['form'].onsubmit = validarForm;
    document.forms['form2'].onsubmit = validarForm2;
</script>
</body>
</html>
