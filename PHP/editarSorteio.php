<?php
require("conexao.php");

$id = "";
$nome = "";
$descricao = "";
$vazio = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("Location: lerSorteio.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM sorteios WHERE id=$id";

    $resultado = $mysqli->query($sql);
    $row = $resultado->fetch_assoc();

    if (!$row) {
        header("Location: lerSorteio.php");
        exit;
    }

    $nome = $row["nome"];
    $descricao = $row["descricao"];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["descricao"])) {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];

        if (empty($nome)) {
            $vazio = "Preencha o campo nome!";
        } else {
            $sql = "UPDATE sorteios SET nome = '$nome', descricao = '$descricao', atualizado_em = NOW() WHERE id = '$id'";
            $resultado = $mysqli->query($sql);

            if (!$resultado) {
                echo "Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            } else {
                header("Location: lerSorteio.php");
                exit;
            }
        }
    } else {
        echo "Dados incompletos.";
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
        <h2>Atualizar sorteio</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Nome:</label>
        <input type=" text" name=nome required maxlength="255" value="<?php echo $nome; ?>">
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
        <input type="submit" value="Atualizar" class="botao">
        <a class="botao" href='/PHP/lerSorteio.php'>Cancelar</a>
    </form>
</body>

</html>
