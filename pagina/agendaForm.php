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
        $result = $objBD->buscarAgenda($_GET['id']);
        //select * from agenda where id = ?
    }
    if (!empty($_POST)) {

        if (empty($_POST['id'])) {
            $objBD->inserirAgenda($_POST);
        } else {
            $objBD->updateAgenda($_POST);
        }
        header("Location: ./agendaList.php");
    }
    ?>
    <h2>Formulário Agenda</h2>
    <form action="./agendaForm.php" method="post">
        <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : "" ?>" /><br>

        <label>Titulo</label>
        <input type="text" name="titulo" value="<?php echo !empty($result->titulo) ? $result->titulo : "" ?>" /><br>

        <label>Data Inicio</label>
        <input type="date" name="data_inicio" value="<?php echo !empty($result->data_inicio) ? $result->data_inicio : "" ?>" /><br>

        <label>Hora Inicio</label>
        <input type="text" name="hora_inicio" value="<?php echo !empty($result->hora_inicio) ? $result->hora_inicio : "" ?>" /><br>

        <label>Data Fim</label>
        <input type="date" name="data_fim" value="<?php echo !empty($result->data_fim) ? $result->data_fim : "" ?>" /><br>

        <label>Hora Fim</label>
        <input type="text" name="hora_fim" value="<?php echo !empty($result->hora_fim) ? $result->hora_fim : "" ?>" /><br>

        <label>Localidade</label>
        <input type="text" name="localidade" value="<?php echo !empty($result->localidade) ? $result->localidade : "" ?>" /><br>

        <label>Descrição</label>
        <input type="text" name="descricao" value="<?php echo !empty($result->descricao) ? $result->descricao : "" ?>" /><br>

        <input type="submit" value="Salvar" />
    </form>
    <a href="./agendaList.php">Voltar</a> <br>
</body>

</html>