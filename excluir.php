<?php
$arquivo = __DIR__ . "/dados/usuarios.json";
$id = $_GET['id']??'';

$usuarios = json_decode(
    file_get_contents($arquivo),
    true
);

$usuarios = array_filter(
    $usuarios,
    fn($usuario) => $usuario["id"] !== $id
);

file_put_contents(
    $arquivo,
    json_encode(
        array_values($usuarios),
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    )
);

header("Location: index.php");
exit;