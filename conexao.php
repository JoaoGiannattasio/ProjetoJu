<?php 
$hostname = "127.0.0.1";
$usuario = "root";
$senha = "joao";
$bancodedados = "proj";


$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados) ;
if ($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql = "SELECT * FROM tarefas";
$result = $mysqli->query($sql);
?>