<?php

$hostname = "127.0.0.1";
$usuario = "root";
$senha = "joao";
$bancodedados = "proj";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$sql = "SELECT * FROM tarefas";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas Diárias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<header class="bg-dark text-white text-center py-4">
    <h1>Gerenciador de Tarefas Diárias</h1>
</header>

<main class="container my-4">
    <section class="buscar-tarefa mb-4">
        <h2 class="mb-3">Buscar Tarefa</h2>
        <form action="buscartarefa.php" method="get">
            <div class="form-row">
                <div class="form-group col-md-9">
                    <input type="text" class="form-control" id="query" name="query" placeholder="Digite uma palavra-chave" required>
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                </div>
            </div>
        </form>
    </section>

    <section class="tarefas">
        <h2 class="mb-3">Tarefas para a semana</h2>
        <ul class="list-group">
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="list-group-item">
                        <strong>Descrição:</strong> <?php echo $row["descricao"]; ?> - 
                        <strong>Dia:</strong> <?php echo $row["dia"]; ?> - 
                        <strong>Quantidade:</strong> <?php echo $row["quantidade"]; ?> vez(es) ao dia
                        <form action="removertarefa.php" method="post" class="float-right">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <button type="submit" class="btn btn-danger">Remover</button>
                        </form>
                    </li>
                <?php }
            } else { ?>
                <li class="list-group-item">Nenhuma tarefa encontrada.</li>
            <?php } ?>
        </ul>
    </section>

    <section class="adicionar-tarefa">
        <h2 class="mb-3">Adicionar Nova Tarefa</h2>
        <form action="adicionartarefa.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" id="dia" name="dia" placeholder="Dia" required>
                </div>
                <div class="form-group col-md-3">
                    <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
        </form>
    </section>
</main>

<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Gerenciador de Tarefas Diárias. Todos os direitos reservados.</p>
</footer>
                
</body>
</html>

<?php
// Fecha a conexão com o banco de dados
$mysqli->close();
?>
