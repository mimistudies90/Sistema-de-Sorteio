<?php
require("conexao.php");

$id = "";
$nome = "";
$telefone = "";
$erro = "";
$sorteios_id = $_GET['sorteios_id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("Location: lerParticipante.php?sorteios_id=" . $sorteios_id);
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM participantes WHERE id=$id";

    $resultado = $mysqli->query($sql);
    $row = $resultado->fetch_assoc();

    if (!$row) {
        header("Location: lerParticipante.php?sorteios_id=" . $sorteios_id);
        exit;
    }

    $nome = $row["nome"];
    $telefone = $row["telefone"];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["telefone"])) {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];

        if (empty($nome) || empty($telefone)) {
            $erro = "Preencha todos os campos!";
        } else {
            $telefone_limpo = preg_replace('/[^0-9]/', '', $telefone);

            if (!preg_match('/^[0-9()\- ]+$/', $telefone)) {
                $erro = "Telefone inválido! Use apenas números, parênteses, hífens ou espaços.";
            } elseif (strlen($telefone_limpo) < 10 || strlen($telefone_limpo) > 11) {
                $erro = "Telefone inválido! Deve conter 10 ou 11 dígitos.";
            } else {
                if (strlen($telefone_limpo) == 11) {
                    $telefone_formatado = preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone_limpo);
                } else {
                    $telefone_formatado = preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone_limpo);
                }

                $sql = "UPDATE participantes SET nome = '$nome', telefone = '$telefone_formatado', atualizado_em = NOW() WHERE id = '$id'";
                $resultado = $mysqli->query($sql);

                if (!$resultado) {
                    echo "Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                } else {
                    header("Location: lerParticipante.php?sorteios_id=" . $sorteios_id);
                    exit;
                }
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
        <h2>Atualizar participante</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Nome:</label>
        <input type=" text" name=nome required maxlength="255" value="<?php echo $nome; ?>">
        <br>
        <br>
        <label>Telefone:</label>
        <input type="tel" name=telefone required value="<?php echo $telefone; ?>">
        <br>


        <?php
        echo $erro;
        ?>

        <br>
        <br>
        <input type="submit" value="Atualizar" class="botao">
        <a class="botao" href='/PHP/lerParticipante.php?sorteios_id=<?= $sorteios_id ?>'>Cancelar</a>
    </form>
</body>

</html>
