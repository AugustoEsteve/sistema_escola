<?php
$arquivo = __DIR__ . "/dados/usuarios.json";

$usuarios = json_decode(
    file_get_contents($arquivo),
    true
); 

$novoUsuario = [
    "id" => uniqid(),
    "tipo" => $_POST["tipo"],
    "nome" => $_POST["nome"],
    "email" => $_POST["email"],
    "extra" => $_POST["extra"]
];

$usuarios[] = $novoUsuario;

file_put_contents(
    $arquivo,
    json_encode(
        $usuarios,
        JSON_PRETTY_PRINT |  JSON_UNESCAPED_UNICODE
    )
);

header("Location: index.php");
exit;