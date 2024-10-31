<?php
require_once '../Model/BibliotecaModel.php';

class bibliotecaController {
    private $biblioteca;

    public function __construct() {
        $this->biblioteca = new Livro();
    }

    public function listarbibliotecas() {
        return $this->biblioteca->getAll();
    }

    public function criarbiblioteca() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $genero = $_POST['genero'];

            if (!empty($titulo) && !empty($autor) && !empty($genero)) {
                if ($this->biblioteca->create($titulo, $autor, $genero)) {
                    header("Location: ../View/DelUp.php");
                    exit();
                } else {
                    echo "Erro ao criar biblioteca!";
                }
            } else {
                echo "Preencha todos os campos!";
            }
        }
    }

    public function editarbiblioteca($id) {
        return $this->biblioteca->getById($id);
    }

    public function atualizarbiblioteca($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $genero = $_POST['genero'];

            if (!empty($titulo) && !empty($autor) && !empty($genero)) {
                if ($this->biblioteca->update($id, $titulo, $autor, $genero)) {
                    header("Location: ../View/DelUp.php");
                    exit();
                } else {
                    echo "Erro ao atualizar biblioteca!";
                }
            } else {
                echo "Preencha todos os campos!";
            }
        }
    }

    public function deletarbiblioteca($id) {
        if ($this->biblioteca->delete($id)) {
            header("Location: ../View/DelUp.php");
            exit();
        } else {
            echo "Erro ao deletar biblioteca!";
        }
    }
}
?>
