<?php
require("conexao.php");

$sorteios_id = $_GET['sorteios_id'];

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM participantes WHERE id = '$id'";
    $resultado = $mysqli->query($sql);

    if (!$resultado) {
        echo "Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
}

header("Location: lerParticipante.php?sorteios_id=" . $sorteios_id);
exit;
