<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

   
    public function create($login, $senha) {
        $query = "INSERT INTO usuario (login, senha) VALUES (:login, :senha)";
        $stmt = $this->conn->prepare($query);

        
        $login = htmlspecialchars(strip_tags($login));
        $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $hashed_senha);

        return $stmt->execute();
    }

  
    public function verifyLogin($login, $senha) {
        $query = "SELECT senha FROM usuario WHERE login = :login";
        $stmt = $this->conn->prepare($query);

        
        $login = htmlspecialchars(strip_tags($login));

        
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_senha = $row['senha'];

            if (password_verify($senha, $hashed_senha)) {
                return true; 
            }
        }

        return false; 
}}

?>
