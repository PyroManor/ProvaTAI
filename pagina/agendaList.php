<?php
include "../database/bd.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Listagem De Agenda</h2>
    <form action="./agendaList.php" method="post">
        <input type="search" name="titulo" placeholder="Pesquisar titulo">
        <input type="submit" value="Pesquisar">
    </form>
    <a href="./agendaForm.php">Cadastrar</a> <br>
    <?php
    $objBD = new BD();
    $objBD->conn();

    if (!empty($_POST['titulo'])) {
        $result = $objBD->pesquisarAgenda($_POST);
    } else {
        $result = $objBD->selectAgenda();
    }

    if (!empty($_GET['id'])) {
        $objBD->removerAgenda($_GET['id']);
        header("location: agendaList.php");
    }

    echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Data Início</th>
                    <th>Hora Início</th>
                    <th>Data Fim</th>
                    <th>Hora Fim 2</th>
                    <th>Localidade</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                    <th>Ação</th>
                </tr>
            ";
    foreach ($result as $item) {
        echo "
        <tr>
            <td>" . $item['id'] . "</td>
            <td>" . $item['titulo'] . "</td>
            <td>" . $item['data_inicio'] . "</td>
            <td>" . $item['hora_inicio'] . "</td>
            <td>" . $item['data_fim'] . "</td>
            <td>" . $item['hora_fim'] . "</td>
            <td>" . $item['localidade'] . "</td>
            <td>" . $item['descricao'] . "</td>
            <td><a href='./agendaForm.php?id=" . $item['id'] . "'>Editar</a></td>
            <td><a href='./agendaList.php?id=" . $item['id'] . "'
                   onclick=\"return confirm('Deseja realmente remover o registro?') \" >Deletar</a></td>
        </tr>";
    }
    echo "</table>";
    ?>

    <a href="../index.php">Voltar</a>
</body>

</html>