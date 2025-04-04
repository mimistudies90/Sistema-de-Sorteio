<?php
require("conexao.php");

$sorteios_id = $_GET['sorteios_id'];

$sql = "SELECT * FROM participantes WHERE sorteios_id ='$sorteios_id' ORDER BY posicao IS NULL, posicao ASC";
$resultado = $mysqli->query($sql);

if (!$resultado) {
    echo "Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/tabela.css" media="screen" />
    <title>Sistema de sorteio</title>
</head>

<body>
    <h1>Bem-vindo ao Sistema de Sorteio!</h1>

    <h2>Participantes</h2>
    <a href="/PHP/criarParticipante.php?sorteios_id=<?= $sorteios_id ?>">Adicionar novo participante</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Posição</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultado->fetch_assoc()):?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['telefone'] ?></td>
                    <td><?= $row['posicao'] ?></td>
                    <td><?= $row['criado_em'] ?></td>
                    <td><?= $row['atualizado_em'] ?></td>
                    <div class="btn-actions">
                        <td>
                            <a href="/PHP/editarParticipante.php?id=<?= $row['id'] ?>&sorteios_id=<?= $sorteios_id ?>" class="btn btn-edit">Editar</a>

                            <a href="/PHP/deletarParticipante.php?id=<?= $row['id'] ?>&sorteios_id=<?= $sorteios_id ?>" class="btn btn-delete">Excluir</a>
                        </td>
                    </div>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="actions">
        <form method="post" action="/SistemaSorteio/sortear.php">
            <label for="num">Quantidade de Sorteados:</label>
            <input type="number" name="num" min="1" required>
            <input type="hidden" name="sorteios_id" value="<?= $sorteios_id ?>">
            <input type="submit" value="Realizar Sorteio">
        </form>

        <a href="/PHP/lerSorteio.php" class="btn btn-exit">Ver seus sorteios</a>
    </div>


</body>

</html>
