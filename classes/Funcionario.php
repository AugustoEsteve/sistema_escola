<?php
require_once "Usuario.php";

class Funcionario extends Usuario
{
    private string $cargo;

    public function __construct(string $nome, string $email, string $cargo)
    {
        parent::__construct($nome, $email);
        $this->cargo = $cargo;
    }

    public function exibirInfo(): string
    {
        return "Funcionário: {$this->nome} | Email: {$this->email} | Cargo: {$this->cargo}";
    }
}
?>