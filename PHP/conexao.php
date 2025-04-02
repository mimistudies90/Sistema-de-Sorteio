<?php

$hostname = "localhost";
$usuario = "root";
$senha = "&tec77@info!";
$bancodedados = "sorteio";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($mysqli->connect_errno) {
    throw new Error("Falha ao conectar : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}
