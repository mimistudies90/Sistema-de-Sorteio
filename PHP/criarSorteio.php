<?php
session_start();
require("conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: lerSorteio.php");
    exit();
}

$usuario = $_SESSION['usuario']['id'];

$nome = "";
$descricao = "";
$vazio = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    if (empty($nome)) {
        $vazio = "Preencha o campo nome!";
    } else {
        $sql = "INSERT INTO sorteios (nome, descricao, usuarios_id) VALUES ('$nome', '$descricao', $usuario)";
        $resultado = $mysqli->query($sql);

        if (!$resultado) {
            echo "Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $nome = "";
        $descricao = "";

        header("Location: lerSorteio.php");
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
        <h2>Criar sorteio</h2>
        <label>Nome:</label>
        <input type="text" required name=nome maxlength="255" value="<?php echo $nome; ?>">
        <br>
        <br>
        <label>Descrição:</label>
        <input type="text" name=descricao maxlength="255" value="<?php echo $descricao; ?>">
        <br>

        <?php
        echo $vazio;
        ?>

        <br>
        <br>

        <input type="submit" Value="Criar" class="botao">
        <a class="botao" href='/PHP/lerSorteio.php'>Cancelar</a>
    </form>
</body>

</html>
