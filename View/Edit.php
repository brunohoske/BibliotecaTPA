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
    <title>Editar Livro</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e8f5e9; 
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); 
            text-align: left;
        }

        h2 {
            color: #2e7d32; 
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-size: 14px;
            color: #388e3c; 
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #c8e6c9; 
            border-radius: 6px;
            margin-top: 5px;
            outline: none;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus {
            border-color: #66bb6a; 
            box-shadow: 0 0 5px rgba(102, 187, 106, 0.5); 
        }

        button {
            background-color: #2e7d32; 
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1b5e20; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Livro</h2>
        <?php
        require_once '../Controller/ bibliotecaController.php';
        $controller = new bibliotecaController();


        if (isset($_GET['id'])) {
            $biblioteca = $controller->editarLivro($_GET['id']);
        } else {
            echo "Livro não encontrado!";
            exit();
        }
        ?>
        <form action="edit.php?id=<?php echo $livro['id']; ?>" method="POST">
            <label for="titulo">Título do Livro:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($iblioteca['titulo']); ?>" required>

            <label for="autor">Autor do Livro:</label>
            <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($biblioteca['autor']); ?>" required>

            <label for="genero">Gênero do Livro:</label>
            <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($biblioteca['genero']); ?>" required>

            <button type="submit">Atualizar Livro</button>
        </form>

        <?php
        $controller->atualizarLivro($biblioteca['id']);
        ?>
    </div>
</body>
</html>
