<?php
require_once "Usuario.php";

class Coordenador extends Usuario
{
    private string $setor;

    public function __construct(string $id, string $nome, string $email, string $setor)
    {
        parent::__construct($id, $nome, $email);
        $this->setor = $setor;
    }

    public function exibirInfo(): string
    {
        return "Email: {$this->email} | Setor: {$this->setor}";
    }
}
