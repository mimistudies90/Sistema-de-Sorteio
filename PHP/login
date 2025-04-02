<?php
session_start();
require("conexao.php");
$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos!";
    } else {
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $mysqli->query($sql);
        $usuario = $resultado->fetch_assoc();

        if (!isset($usuario)) {
            $erro = 'Usuário não encontrado';
        } else {
            if ($usuario['senha'] !== $senha) {
                $erro = 'Senha incorreta';
            } else {
                $_SESSION['usuario'] = $usuario;
                header("Location: lerSorteio.php");
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/form.css" media="screen" />
    <title>Sistema de sorteio</title>
</head>

<body>

    <form method="post" class="formulario">
        <h2>Entrar na minha conta:</h2>
        <label>E-mail:</label>
        <br>
        <input type="email" name=email>
        <br>
        <br>
        <label>Senha:</label>
        <br>
        <input type="password" name=senha>
        <br>

        <?php
        echo $erro;
        ?>

        <br>
        <br>
        <input type="submit" Value="Entrar" class="botao">
        <a class="botao" href='/SistemaSorteio/index.php'>Criar nova conta</a>
    </form>
</body>

</html>
