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
    <?php
    $objBD = new BD();
    $objBD->conn();

    if (!empty($_GET['id'])) {
        $result = $objBD->buscar($_GET['id']);
        //select * from contato where id = ?
    }
    if (!empty($_POST)) {

        if (empty($_POST['id'])) {
            $objBD->inserir($_POST);
        } else {
            $objBD->update($_POST);
        }
        header("Location: ./contatoList.php");
    }
    ?>
    <h2>Formulário Cliente</h2>
    <form action="./contatoForm.php" method="post">
        <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : "" ?>" /><br>

        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo !empty($result->nome) ? $result->nome : "" ?>" /><br>

        <label>Sobrenome</label>
        <input type="text" name="sobrenome" value="<?php echo !empty($result->sobrenome) ? $result->sobrenome : "" ?>" /><br>

        <label>Telefone 1</label>
        <input type="text" name="telefone1" value="<?php echo !empty($result->telefone1) ? $result->telefone1 : "" ?>" /><br>

        <select class="form-control" name="tipo_telefone1" id="tipo_telefone1" placeholder="Tipo telefone 1">
            <option value="casa">Casa</option>
            <option value="celular">Celular</option>
            <option value="comercial">Comercial</option>
            <option value="principal">Principal</option>
        </select>

        <label>Telefone 2</label>
        <input type="text" name="telefone2" value="<?php echo !empty($result->telefone2) ? $result->telefone2 : "" ?>" /><br>

        <select class="form-control" name="tipo_telefone2" id="tipo_telefone2" placeholder="Tipo telefone 2">
            <option value="casa">Casa</option>
            <option value="celular">Celular</option>
            <option value="comercial">Comercial</option>
            <option value="principal">Principal</option>
        </select>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo !empty($result->email) ? $result->email : "" ?>" /><br>

        <input type="submit" value="Salvar" />
    </form>
    <a href="./contatoList.php">Voltar</a> <br>
</body>

</html>