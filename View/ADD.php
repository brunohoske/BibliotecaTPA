<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh; /* Ocupa toda a altura da tela */
        }

        h2 {
            color: #BB86FC;
            margin-bottom: 20px;
        }

        form {
            background-color: #1E1E1E;
            padding: 25px;
            border-radius: 8px;
            width: 100%; /* Formulário ocupa 100% da largura */
            height: 100%; /* Formulário ocupa 100% da altura */
            display: flex; /* Flexbox para organizar os elementos */
            flex-direction: column; /* Itens em coluna */
            justify-content: center; /* Centraliza verticalmente */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            background-color: #2C2C2C;
            border: 1px solid #3E3E3E;
            color: #e0e0e0;
            border-radius: 5px;
        }

        input[type="text"]::placeholder {
            color: #a5a5a5;
        }

        button {
            background-color: #BB86FC;
            color: #121212;
            border: none;
            padding: 12px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #A675E1;
        }
    </style>
</head>
<body>
    <h2>Adicionar Livro</h2>
    <form action="ADD.php" method="POST">
        <label for="titulo">Título do Livro:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Digite o título" required>

        <label for="autor">Autor do Livro:</label>
        <input type="text" id="autor" name="autor" placeholder="Digite o autor" required>

        <label for="genero">Gênero do Livro:</label>
        <input type="text" id="genero" name="genero" placeholder="Digite o gênero" required>

        <label for="status">Status (Disponível/Indisponível):</label>
        <input type="text" id="status" name="status" placeholder="Digite o status" required>

        <button type="submit">Adicionar Livro</button>
    </form>
    <?php
    require_once '../Controller/BibliotecaController.php';
    $controller = new bibliotecaController();
    $controller->criarbiblioteca();
    ?>
</body>
</html>
