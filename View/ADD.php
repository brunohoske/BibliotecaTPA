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
            background-color: #fdfdfd;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #5A5AFF;
        }

        form {
            background-color: #E3E3FF;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #5A5AFF;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }

        button:hover {
            background-color: #4949E8;
        }
    </style>
</head>
<body>
    <h2>Adicionar Livro</h2>
    <form action="st.php" method="POST">
        <label for="titulo">Título do Livro:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="autor">Autor do Livro:</label>
        <input type="text" id="autor" name="autor" required>

        <label for="genero">Gênero do Livro:</label>
        <input type="text" id="genero" name="genero" required>

        <label for="status">Status (Disponível/Indisponível):</label>
        <input type="text" id="status" name="status" required>

        <button type="submit">Adicionar Livro</button>
    </form>
    <?php
    require_once '../Controller/BibliotecaController.php';
    $controller = new bibliotecaController();
    $controller->criarbiblioteca();
    ?>
</body>
</html>
