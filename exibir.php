<?php
$arquivo = __DIR__ . "/dados/usuarios.json";
$usuarios = json_decode(file_get_contents($arquivo), true);
?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Usuarios cadastrados</title>

        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                background-color: #f4f4f9;
                background-image: radial-gradient(
                    circle at center,
                    #f30000 1px,
                    transparent 1px
                );
                background-size: 2rem 2rem;
            }

            main {
                display: flex;
                flex-direction: column;
                gap: 10px;
                background-color: #ffffff;
                padding: 30px;
                border-radius: 10px;
                width: 350px;
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

            a {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <main>
            <h2>Usuarios cadastrados</h2>

            <?php foreach ($usuarios as $usuario): ?>
                <div class="usuario">
                    <strong><?= htmlspecialchars($usuario["nome"]) ?></strong>
                    <span><?= htmlspecialchars($usuario["tipo"]) ?></span>
                    <span><?= htmlspecialchars($usuario["email"]) ?></span>
                    <span><?= htmlspecialchars($usuario["extra"]) ?></span>
                    <a href="excluir.php?id=<?= urlencode($usuario["id"]) ?>">
                        Excluir
                    </a>
                </div>
            <?php endforeach; ?>
            <form action="index.php">
                <button>Voltar para Página Inicial</button>
            </form>
        </main>
    </body>
</html>