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
            background-color: #121212; /* Fundo escuro */
            color: #e0e0e0; /* Texto claro */
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #1E1E1E; /* Fundo do container escuro */
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3); 
            text-align: left;
        }

        h2 {
            color: #BB86FC; /* Cor do título */
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-size: 14px;
            color: #BB86FC; /* Cor das labels */
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #3E3E3E; /* Borda dos inputs */
            border-radius: 6px;
            margin-top: 5px;
            outline: none;
            box-sizing: border-box;
            background-color: #2C2C2C; /* Fundo dos inputs */
            color: #e0e0e0; /* Texto claro nos inputs */
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]::placeholder {
            color: #a5a5a5; /* Cor do placeholder */
        }

        input[type="text"]:focus {
            border-color: #BB86FC; /* Borda dos inputs ao focar */
            box-shadow: 0 0 5px rgba(187, 134, 252, 0.5); 
        }

        button {
            background-color: #BB86FC; /* Cor do botão */
            color: #121212; /* Texto escuro no botão */
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
            background-color: #A675E1; /* Cor do botão ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Livro</h2>
        <?php
        require_once '../Controller/BibliotecaController.php';
        $controller = new bibliotecaController();
        if (isset($_GET['id'])) {
            $biblioteca = $controller->editarbiblioteca($_GET['id']);
        } else {
            echo "Livro não encontrado!";
            exit();
        }
        ?>
        <form action="Edit.php?id=<?php echo $biblioteca['id']; ?>" method="POST">
            <label for="titulo">Título do Livro:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($biblioteca['titulo']); ?>" required>
            <label for="autor">Autor do Livro:</label>
            <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($biblioteca['autor']); ?>" required>
            <label for="genero">Gênero do Livro:</label>
            <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($biblioteca['genero']); ?>" required>

            <button type="submit">Atualizar Livro</button>
        </form>
        <?php
        $controller->atualizarbiblioteca($biblioteca['id']);
        ?>
    </div>
</body>
</html>
