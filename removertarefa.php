<?php

$hostname = "127.0.0.1";
$usuario = "root";
$senha = "joao";
$bancodedados = "proj";


$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados) ;
if ($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$id = $_POST["id"];


$sql = "DELETE FROM tarefas WHERE id=$id";

if ($mysqli->query($sql) === TRUE) {
  
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao remover a tarefa: " . $mysqli->error;
}


$mysqli->close();


header("Location: index.php");
exit();

?>