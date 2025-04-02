<?php
require("conexao.php");

$sorteios_id = $_GET['sorteios_id'];
$nome = "";
$telefone = "";
$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

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
            $sql = "INSERT INTO participantes (nome, telefone, sorteios_id) VALUES ('$nome', '$telefone_formatado', $sorteios_id)";
            $resultado = $mysqli->query($sql);

            if (!$resultado) {
                echo "Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $nome = "";
            $telefone = "";

            header("Location: lerParticipante.php?sorteios_id=" . $sorteios_id);
            exit;
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
        <h2>Adicionar participante</h2>
        <label>Nome:</label>
        <input type="text" name=nome required maxlength="255" value="<?php echo $nome; ?>">
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

        <input type="submit" Value="Adicionar" class="botao">
        <a class="botao" href='/SistemaSorteio/lerParticipante.php?sorteios_id=<?= $sorteios_id ?>'>Cancelar</a>
    </form>
</body>

</html>
