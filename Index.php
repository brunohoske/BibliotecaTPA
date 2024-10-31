<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdfdfd; 
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: space-between;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #5A5AFF; 
        }

        #botao {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        a {
            background-color: #5A5AFF;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #4949E8;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }

        footer h1 {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bem Vindo ao Sistema de Gestão de Biblioteca</h1>
    </header>
    <section id="botao">
        <a href="View/Design.html">Ingressar</a>
    </section>
    <footer>
        <h1><a href="http://github.com/brunohoske">Bruno Hoske</a></h1>
        <h1><a href="https://github.com/CaioK367">Caio Kfuri</a></h1>
        <h1><a href="https://github.com/Kaiquedsp">Kaique Duque</a></h1>
    </footer>
</body>
</html>
