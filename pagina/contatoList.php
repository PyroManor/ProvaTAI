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
    <h2>Listagem De Contatos</h2>
    <form action="./contatoList.php" method="post">
        <input type="search" name="nome" placeholder="Pesquisar nome">
        <input type="submit" value="Pesquisar">
    </form>
    <a href="./contatoForm.php">Cadastrar</a> <br>
    <?php
    $objBD = new BD();
    $objBD->conn();

    if (!empty($_POST['nome'])) {
        $result = $objBD->pesquisar($_POST);
    } else {
        $result = $objBD->select();
    }

    if (!empty($_GET['id'])) {
        $objBD->remover($_GET['id']);
        header("location: contatoList.php");
    }

    echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Telefone 1</th>
                    <th>Tipo Telefone 1</th>
                    <th>Telefone 2</th>
                    <th>Tipo Telefone 2</th>
                    <th>Email</th>
                    <th>Ação</th>
                    <th>Ação</th>
                </tr>
            ";
    foreach ($result as $item) {
        echo "
        <tr>
            <td>" . $item['id'] . "</td>
            <td>" . $item['nome'] . "</td>
            <td>" . $item['sobrenome'] . "</td>
            <td>" . $item['telefone1'] . "</td>
            <td>" . $item['tipo_telefone1'] . "</td>
            <td>" . $item['telefone2'] . "</td>
            <td>" . $item['tipo_telefone2'] . "</td>
            <td>" . $item['email'] . "</td>
            <td><a href='./contatoForm.php?id=" . $item['id'] . "'>Editar</a></td>
            <td><a href='./contatoList.php?id=" . $item['id'] . "'
                   onclick=\"return confirm('Deseja realmente remover o registro?') \" >Deletar</a></td>
        </tr>";
    }
    echo "</table>";
    ?>

    <a href="../index.php">Voltar</a>
</body>

</html>