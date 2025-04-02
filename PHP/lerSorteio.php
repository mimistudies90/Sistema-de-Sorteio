<?php
session_start();
require("conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario']['id'];

$sql = "SELECT * FROM sorteios WHERE usuarios_id = '$usuario' ORDER BY id DESC";
$resultado = $mysqli->query($sql);

if (!$resultado) {
    echo "Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/tabela.css" media="screen" />
    <title>Sistema de sorteio</title>
</head>

<body>
    <h1>Bem vindo!</h1>
    <h2>Meus sorteios:</h2>
    <a href="/PHP/criarSorteio.php">Criar novo sorteio</a>
    <br>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php


            while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td>
                        <a href='/PHP/lerParticipante.php?sorteios_id=<?= $row['id'] ?>'>Entrar</a>
                    </td>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['descricao'] ?></td>
                    <td><?= $row['criado_em'] ?></td>
                    <td><?= $row['atualizado_em'] ?></td>
                    <div class="btn-actions">
                        <td>
                            <a href="/PHP/editarSorteio.php?id=<?= $row['id'] ?>" class="btn btn-edit">Editar</a>
                            <a href='/PHP/deletarSorteio.php?id=<?= $row['id'] ?>' class="btn btn-delete">Deletar</a>
                        </td>
                    </div>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
    <div class="actions">
        <a href="logout.php" class="btn btn-exit">Sair</a>
    </div>
</body>

</html>
