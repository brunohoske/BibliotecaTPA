<?php
require_once 'conexao.php';

class Livro {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM livros";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM livros WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($titulo, $autor, $genero, $ano, $quantidade) {
        $query = "INSERT INTO livros (titulo, autor, genero, ano, quantidade) VALUES (:titulo, :autor, :genero, :ano, :quantidade)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':quantidade', $quantidade);
        return $stmt->execute();
    }

    public function update($id, $titulo, $autor, $genero, $ano, $quantidade) {
        $query = "UPDATE livros SET titulo = :titulo, autor = :autor, genero = :genero, ano = :ano, quantidade = :quantidade WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':quantidade', $quantidade);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM livros WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
