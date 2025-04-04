<?php
require("conexao.php");

$nome = "";
$email = "";
$senha = "";
$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email= '$email'";
    $resultado = $mysqli->query($sql);

    $existeUser = $resultado->fetch_assoc();

    if (!empty($existeUser)) {
        $erro = "Esse usuário já existe!";
    } else {
        if (empty($nome) || empty($email) || empty($senha)) {
            $erro = "Preencha todos os campos!";
        } else {
            if (strlen($senha) < 8) {
                $erro = "A senha deve conter no mínimo 8 caracteres";
            } elseif (!preg_match('/[a-z]/', $senha)) {
                $erro = "A senha deve conter pelo menos uma letra minúscula";
            } elseif (!preg_match('/[A-Z]/', $senha)) {
                $erro = "A senha deve conter pelo menos uma letra maiúscula";
            } elseif (!preg_match('/[0-9]/', $senha)) {
                $erro = "A senha deve conter pelo menos um número";
            } else {
                $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
                $resultado = $mysqli->query($sql);

                if (!$resultado) {
                    echo "Falha ao inserir: (" . $mysqli->errno . ") " . $mysqli->error;
                }

                $erro = "";
                $nome = "";
                $email = "";
                $senha = "";
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
    <link rel="stylesheet" type="text/css" href="CSS/form.css" media="screen" />
    <title>Sistema de sorteio</title>
</head>

<body>

    <form method="post" class="formulario">
        <h2>Cadastrar nova conta</h2>
        <label>Nome:</label>
        <br>
        <input type="text" name=nome required maxlength="255" value="<?php echo $nome; ?>">
        <br>
        <br>
        <label>E-mail:</label>
        <br>
        <input type="email" name=email required maxlength="255" value="<?php echo $email; ?>">
        <br>
        <br>
        <label>Senha (Minímo 8 caracteres)</label>
        <br>
        <input type="password" required minlength="8" name=senha value="<?php echo $senha; ?>">
        <br>

        <?php
        echo $erro;
        ?>

        <br>
        <br>
        <input type="submit" Value="Criar conta" class="botao">
        <a class="botao" href='/PHP/login.php'>Login</a>
    </form>
</body>

</html>
