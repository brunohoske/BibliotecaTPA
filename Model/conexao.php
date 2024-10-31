<?php
class Database {
    private $host = "localhost";
    private $db_name = "Biblioteca"; 
    private $username = "brunohoske";
    private $password = "123";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            
            error_log("Erro de conexão: " . $exception->getMessage(), 0);
            echo "Erro ao conectar ao banco de dados.";
        }

        return $this->conn;
    }
}
?>
