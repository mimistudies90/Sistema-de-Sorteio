<?php
require("conexao.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM participantes WHERE sorteios_id = '$id'";
    $resultado = $mysqli->query($sql);

    $sql = "DELETE FROM sorteios WHERE id = '$id'";
    $resultado = $mysqli->query($sql);

    if (!$resultado) {
        echo "Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
}

header("Location: lerSorteio.php");
exit;
