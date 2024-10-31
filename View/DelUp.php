<?php
session_start(); 

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    
    header('Location: login.html');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy(); 
    header('Location: login.html'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #E3E3FF;
        }

        tr:nth-child(even) {
            background-color: #F8F8F8;
        }

        a {
            color: #5A5AFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .logout-button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .logout-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <h2>Lista de Livros</h2>

    <form method="POST">
        <button type="submit" name="logout" class="logout-button">Deslogar</button>
    </form>

    <a href="ADD.php">Adicionar Novo Livro</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        <?php
        require_once '../Controller/BibliotecaController.php';
        $controller = new BibliotecaController();
        $bibliotecas = $controller->listarbibliotecas();

        if (count($bibliotecas) > 0) {
            foreach ($bibliotecas as $biblioteca) {
                echo "<tr>
                    <td>{$biblioteca['id']}</td>
                    <td>{$biblioteca['titulo']}</td>
                    <td>{$biblioteca['autor']}</td>
                    <td>{$biblioteca['genero']}</td>
                    <td>{$biblioteca['status']}</td>
                    <td>
                        <a href='Edit.php?id={$biblioteca['id']}'>Editar</a>
                        <a href='DelUp.php?id={$biblioteca['id']}&acao=deletar'>Deletar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum registro encontrado!</td></tr>";
        }
        ?>
    </table>

    <?php
    
    if (isset($_GET['acao']) && $_GET['acao'] == 'deletar' && isset($_GET['id'])) {
        $controller->deletarbiblioteca($_GET['id']);
    }
    ?>
</body>
</html>
