<?php
$arquivo = __DIR__ . "/dados/usuarios.json";
$usuarios = json_decode(file_get_contents($arquivo), true);
$tipos_usuarios = [
    "Aluno" => "Alunos",
    "Coordenador" => "Coordenadores",
    "Professor" => "Professores",
    "Funcionario" => "Funcionários",
];
$tipo_selecionado = $_GET["tipo"] ?? "Todos";
if ($tipo_selecionado !== "Todos" && !array_key_exists($tipo_selecionado, $tipos_usuarios)) {
    $tipo_selecionado = "Todos";
}
$objetos_usuarios = array_fill_keys(array_keys($tipos_usuarios), []);

function criarUsuario(string $tipo, string $id, string $nome, string $email, string $extra) {
    switch ($tipo) {
        case "Aluno":
            require_once "classes/Aluno.php";
            return new Aluno($id, $nome, $email, $extra);
        case "Funcionario":
            require_once "classes/Funcionario.php";
            return new Funcionario($id, $nome, $email, $extra);
        case "Professor":
            require_once "classes/Professor.php";
            return new Professor($id, $nome, $email, $extra);
        case "Coordenador":
            require_once "classes/Coordenador.php";
            return new Coordenador($id, $nome, $email, $extra);
        default:
            throw new Exception("Tipo de usuário desconhecido: {$tipo}");
    }
}

foreach ($usuarios as $usuario) {
    $objetos_usuarios[$usuario["tipo"]][] = criarUsuario(
        $usuario["tipo"],
        $usuario["id"],
        $usuario["nome"],
        $usuario["email"],
        $usuario["extra"]
    );
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Usuarios cadastrados</title>

    <style>
        header {
            width: 100%;
            background: red;
            color: white;
            text-align: center;
            padding: 15px 10px;
            box-sizing: border-box;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            font-size: 18px;
        }

        header h1 {
            margin: 0;
            font-size: 60px;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
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
            gap: 10px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            width: min(350px, calc(100% - 30px));
            box-sizing: border-box;
            margin: 24px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin: 0 0 10px;
        }

        .usuario {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .grupo-usuarios h3 {
            margin: 10px 0;
        }

        a {
            color: red;
            font-weight: bold;
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
        
        footer p {
            margin: 5px 0;
        }

        footer {
            width: 100%;
            margin-top: auto;
            padding: 16px 20px;
            box-sizing: border-box;
            background: red;
            color: white;
            text-align: center;
            overflow-wrap: anywhere;
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

        @media (max-width: 600px) {
            header h1 {
                font-size: 34px;
            }

        }
    </style>
</head>

<body>
    <header>
        <h1>Usuários Cadastrados</h1>
    </header>
    <main>

        <form action="exibir.php" method="get">
            <label for="filtro-tipo">Tipo de usuário:</label>
            <select id="filtro-tipo" name="tipo">
                <option value="Todos" <?= $tipo_selecionado === "Todos" ? "selected" : "" ?>>Todos</option>
                <?php foreach ($tipos_usuarios as $tipo => $titulo): ?>
                    <option value="<?= htmlspecialchars($tipo) ?>" <?= $tipo_selecionado === $tipo ? "selected" : "" ?>><?= htmlspecialchars($titulo) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Filtrar</button>
        </form>

        <?php foreach ($tipos_usuarios as $tipo => $titulo): ?>
            <?php if ($tipo_selecionado !== "Todos" && $tipo_selecionado !== $tipo) continue; ?>
            <section class="grupo-usuarios" data-tipo="<?= htmlspecialchars($tipo) ?>">
                <h3><?= htmlspecialchars($titulo) ?></h3>
                <?php if (empty($objetos_usuarios[$tipo])): ?>
                    <span>Nenhum usuário cadastrado.</span>
                <?php else: ?>
                    <?php foreach ($objetos_usuarios[$tipo] as $usuario): ?>
                        <div class="usuario">
                            <strong><?= htmlspecialchars($usuario->getNome()) ?></strong>
                            <span><?= htmlspecialchars($usuario->exibirInfo()) ?></span>
                            <a href="excluir.php?id=<?= urlencode($usuario->getId()) ?>">
                                Excluir
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>
        <form action="index.php">
            <button>Voltar para Página Inicial</button>
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