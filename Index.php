<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Biblioteca</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #282a36;
            color: #f8f8f2;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        header h1 {
            color: #ff79c6;
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button {
            background: linear-gradient(135deg, #50fa7b, #6272a4);
            color: #f8f8f2;
            padding: 15px 40px;
            border-radius: 30px;
            font-size: 1.2em;
            font-weight: bold;
            text-decoration: none;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .button:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #50fa7b, #8be9fd);
        }

        footer {
            margin-top: 40px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        footer h1 {
            font-size: 1em;
            color: #bd93f9;
        }

        footer a {
            color: #ff79c6;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #50fa7b;
        }
    </style>
</head>
<body>
    <header>
        <h1>📚 Sistema de Gestão de Biblioteca 📚</h1>
    </header>
    
    <div class="button-container">
        <a href="View/Design.html" class="button">Entrar no Sistema</a>
    </div>

    <footer>
        <h1><a href="http://github.com/brunohoske">Bruno Hoske</a></h1>
        <h1><a href="https://github.com/CaioK367">Caio Kfuri</a></h1>
        <h1><a href="https://github.com/Kaiquedsp">Kaique Duque</a></h1>
    </footer>
</body>
</html>
