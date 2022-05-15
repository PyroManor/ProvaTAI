<?php

class BD
{

    private $host = "localhost";
    private $dbname = "db_aula_tai";
    private $port = 3306;
    private $usuario = "root";
    private $senha = "";
    private $db_charset = "utf8";

    public function conn()
    {
        $conn = "mysql:host=$this->host;
            dbname=$this->dbname;port=$this->port";

        return new PDO(
            $conn,
            $this->usuario,
            $this->senha,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->db_charset]
        );
    }
    //CRUD Contato

    public function select()
    {
        $conn = $this->conn();
        $st = $conn->prepare("SELECT * FROM contato");
        $st->execute();

        return $st;
    }

    public function inserir($dados)
    {
        $conn = $this->conn();
        $sql = "INSERT INTO contato (nome, sobrenome, telefone1, tipo_telefone1, telefone2, tipo_telefone2, email) value (?, ?, ?, ?, ?, ?, ?)";

        $st = $conn->prepare($sql);
        $arrayDados = [$dados['nome'], $dados['sobrenome'], $dados['telefone1'], $dados['tipo_telefone1'], $dados['telefone2'], $dados['tipo_telefone2'], $dados['email']];
        $st->execute($arrayDados);

        return $st;
    }

    public function update($dados)
    {
        $conn = $this->conn();
        $sql = "UPDATE contato SET nome = ?, sobrenome= ?, telefone1= ?, tipo_telefone1 = ?, telefone2= ?, tipo_telefone2= ?, email = ? WHERE id = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [
            $dados['nome'], $dados['sobrenome'], $dados['telefone1'], $dados['tipo_telefone1'], $dados['telefone2'], $dados['tipo_telefone2'], $dados['email'], $dados['id']
        ];
        $st->execute($arrayDados);

        return $st;
    }

    public function remover($id)
    {
        $conn = $this->conn();
        $sql = "DELETE FROM contato WHERE id = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st;
    }

    public function buscar($id)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM contato WHERE id = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st->fetchObject();
    }

    public function pesquisar($dados)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM contato WHERE nome LIKE ?;";

        $st = $conn->prepare($sql);
        $arrayDados = ["%" . $dados["nome"] . "%"];
        $st->execute($arrayDados);

        return $st;
    }
    //CRUD Agenda
    
    public function selectAgenda()
    {
        $conn = $this->conn();
        $st = $conn->prepare("SELECT * FROM agenda");
        $st->execute();

        return $st;
    }

    public function inserirAgenda($dados)
    {
        $conn = $this->conn();
        $sql = "INSERT INTO agenda (titulo, data_inicio, hora_inicio, data_fim, hora_fim, localidade, descricao) value (?, ?, ?, ?, ?, ?, ?)";

        $st = $conn->prepare($sql);
        $arrayDados = [$dados['titulo'], $dados['data_inicio'], $dados['hora_inicio'], $dados['data_fim'], $dados['hora_fim'], $dados['localidade'], $dados['descricao']];
        $st->execute($arrayDados);

        return $st;
    }

    public function updateAgenda($dados)
    {
        $conn = $this->conn();
        $sql = "UPDATE agenda SET titulo = ?, data_inicio= ?, hora_inicio= ?, data_fim = ?, hora_fim= ?, localidade= ?, descricao = ? WHERE id = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [
            $dados['titulo'], $dados['data_inicio'], $dados['hora_inicio'], $dados['data_fim'], $dados['hora_fim'], $dados['localidade'], $dados['descricao'], $dados['id']
        ];
        $st->execute($arrayDados);

        return $st;
    }

    public function removerAgenda($id)
    {
        $conn = $this->conn();
        $sql = "DELETE FROM agenda WHERE id = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st;
    }

    public function buscarAgenda($id)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM agenda WHERE id = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st->fetchObject();
    }

    public function pesquisarAgenda($dados)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM agenda WHERE titulo LIKE ?;";

        $st = $conn->prepare($sql);
        $arrayDados = ["%" . $dados["titulo"] . "%"];
        $st->execute($arrayDados);

        return $st;
    }
}
