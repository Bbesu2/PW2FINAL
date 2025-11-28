<?php
class Database {
   private $host = "localhost";
    private $db_name = "pw2";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            if ($this->conn) {
                die("Erro na conexao com o banco de dados: ". mysqli_connect_error());
        }}
        return $$this->conn;;
    }
}