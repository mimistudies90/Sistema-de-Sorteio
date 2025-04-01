<?php
require("conexao.php");

if (isset($_POST["sorteios_id"]) && isset($_POST["num"])) {
    $sorteios_id = $_POST['sorteios_id'];
    $num = $_POST['num'];
    $letra = "";

    if (str_contains($num, 'e')) {
        header("Location: lerParticipante.php?sorteios_id=$sorteios_id");
    } else {
        $limparSql = "UPDATE participantes SET posicao = NULL WHERE sorteios_id = $sorteios_id";
        $sql = "SELECT id FROM participantes WHERE sorteios_id=$sorteios_id ORDER BY RAND() LIMIT $num";
        $mysqli->query($limparSql);
        $resultado = $mysqli->query($sql);

        $pos = 0;
        while ($participante = $resultado->fetch_assoc()) {
            $pos++;
            $participanteId = $participante['id'];
            $sql_update = "UPDATE participantes SET posicao = $pos, atualizado_em = NOW() WHERE id = $participanteId";
            $result =  $mysqli->query($sql_update);
        }
        header("Location: lerParticipante.php?sorteios_id=$sorteios_id");
    }
}
