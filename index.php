<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Escola</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            /* Empilha todos os elementos verticalmente */
            align-items: center;
            /* Centraliza na vertical */
            min-height: 100vh;
            /* Ocupa toda a altura da tela */
            margin: 0;
            overflow: hidden;
            /* Evita barras de rolagem enquanto a página gira */
            background-color: #f4f4f9;
            /* Fundo leve para destacar o cartão */
            background-image: radial-gradient(circle at center,
                    #f30000 1px,
                    transparent 1px);
            background-size: 2rem 2rem;
            /* Tamanho do fundo radial */
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
            /* Sombra para dar destaque */
        }

        form {
            display: flex;
            flex-direction: column;
            /* Empilha todos os elementos verticalmente */
            gap: 10px;
            /* Espaço uniforme entre cada campo */
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
            /* Garante que todos fiquem com a mesma largura */
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
    </style>
</head>

<body>
    <main>
        <form action="salvar.php" method="post">
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="" disabled selected>Selecione um perfil...</option>
                <option value="Aluno">Aluno</option>
                <option value="Professor">Professor</option>
                <option value="Funcionario">Funcionário</option>
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
</body>

</html>