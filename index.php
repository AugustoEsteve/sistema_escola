<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema Escolar</title>
    <style>
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: red;
            color: white;
            text-align: center;
            padding: 15px 10px;
            box-sizing: border-box;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            font-size: 18px;
            z-index: 1000;
        }

        header h1 {
            margin: 0;
            font-size: 80px;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
            background-color: #f4f4f9;
            background-image: radial-gradient(circle at center,
                    #f30000 1px,
                    transparent 1px);
            background-size: 2rem 2rem;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }

        label {
            font-weight: bold;
            font-size: 14px;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: red;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: rgb(127, 2, 2);
        }

        /* Rodapé */
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: red;
            color: white;
            text-align: center;
            padding: 15px 10px;
            box-sizing: border-box;
            box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.2);
            font-size: 14px;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        footer a:hover {
            color: #ffd6d6;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <h1>
            Sistema Escolar
        </h1>
    </header>
    <main>
        <form action="salvar.php" method="post">
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="" disabled selected>Selecione um perfil...</option>
                <option value="Aluno">Aluno</option>
                <option value="Professor">Professor</option>
                <option value="Funcionario">Funcionário</option>
                <option value="Coordenador">Coordenador</option>
            </select>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required />

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required />

            <label for="extra">Informação específica:</label>
            <input type="text" id="extra" name="extra" required />

            <button type="submit">Cadastrar</button>
        </form>

        <form action="exibir.php">
            <button type="submit">Ver tabela</button>
        </form>
    </main>

    <footer>
        <p>
            © 2026 • DEV's Augusto H., Davhcruz, Victor, Augusto C., Rafael A.,
            Mário, Adryan, Guilherme G., Gabriel Pietro, CB, Kauã
        </p>

        <p>
            <a href="https://github.com/AugustoEsteve/sistema_escola">
                Contate-nos no GitHub
            </a>
        </p>
    </footer>

</body>

</html>