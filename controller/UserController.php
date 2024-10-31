<?php
require_once '../Model/conexao.php';
require_once '../Model/UserModel.php';

class UserController {
    private $db;
    private $usuario;

    public function __construct() {
        
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new User($this->db);
    }

    
    public function criarUsuario() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $login = $_POST['login'];
            $senha = $_POST['senha'];

           
            if (!empty($login) && !empty($senha)) {
               
                if ($this->usuario->create($login, $senha)) {
                    
                    header("Location: ../View/login.html");
                    exit(); 
                } else {
                    echo "Erro ao criar usuário!";
                }
            } else {
                echo "Preencha todos os campos!";
            }
        }
    }
}


$controller = new UserController();
$controller->criarUsuario();
?>
