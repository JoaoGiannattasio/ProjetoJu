<?php

$hostname = "127.0.0.1";
$usuario = "root";
$senha = "joao";
$bancodedados = "proj";


$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados) ;
if ($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $descricao = $_POST["descricao"];
    $dia = $_POST["dia"];
    $quantidade = $_POST["quantidade"];

   
    $sql = "INSERT INTO tarefas (descricao, dia, quantidade) VALUES ('$descricao', '$dia', '$quantidade')";

    if ($mysqli->query($sql) === TRUE) {
       
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao adicionar a tarefa: " . $mysqli->error;
    }
}


$mysqli->close();
?>
