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
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Cor de fundo escura */
            color: #e0e0e0; /* Texto claro */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h2 {
            color: #79a7ff; /* Azul claro */
            margin-bottom: 20px;
        }

        .logout-button {
            background-color: #ff4d4d; /* Vermelho para botão de logout */
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            margin-bottom: 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #cc0000; /* Vermelho escuro ao passar o mouse */
        }

        a {
            color: #79a7ff; /* Azul claro */
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
            transition: color 0.3s;
        }

        a:hover {
            color: #568ad4; /* Azul escuro ao passar o mouse */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #333; /* Borda escura */
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #1f1f1f; /* Fundo escuro para cabeçalho */
            color: #e0e0e0; /* Texto claro */
        }

        tr:nth-child(even) {
            background-color: #2a2a2a; /* Fundo escuro alternado */
        }

        tr:hover {
            background-color: #444; /* Efeito ao passar o mouse sobre a linha */
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
                    <td>
                        <a href='Edit.php?id={$biblioteca['id']}'>Editar</a>
                        <a href='DelUp.php?id={$biblioteca['id']}&acao=deletar'>Deletar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum registro encontrado!</td></tr>";
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
