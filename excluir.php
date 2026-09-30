<?php
$arquivo = __DIR__ . "/dados/usuarios.json";
$usuarios = json_decode(file_get_contents($arquivo), true);
?>

<h2>Usuarios cadastrados</h2>

<?php foreach ($usuarios as $usuario) : ?>
    <div>
        <strong><?= htmlspecialchars ($usuario["nome"]) ?></strong>
        - <?=  htmlspecialchars($usuario["tipo"]) ?>
        - <?= htmlspecialchars($usuario["email"]) ?>


        <a href="excluir.php?id=<?=  urlencode($usuario["id"])?>">
              Excluir

        </a>

    </div>
<?php endforeach; ?>