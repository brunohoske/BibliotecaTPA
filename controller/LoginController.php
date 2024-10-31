<?php
session_start(); 

require_once '../Model/conexao.php';
require_once '../Model/UserModel.php';

class LoginBibliotecaController {
    private $db;
    private $usuario;

    public function __construct() {
        
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new User($this->db);
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            
            if (!empty($login) && !empty($senha)) {
               
                if ($this->usuario->verifyLogin($login, $senha)) {
                    
                    $_SESSION['loggedin'] = true;
                    $_SESSION['login'] = $login;

                    
                    header("Location: ../View/DelUp.php");
                    exit(); 
                } else {
                  
                    echo "Login ou senha incorretos!";
                }
            } else {
                echo "Por favor, preencha todos os campos!";
            }
        }
    }
}

$controller = new LoginBibliotecaController();
$controller->login();
?>
