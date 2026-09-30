<?php
require_once "Usuario.php";

class Funcionario extends Usuario
{
    private string $cargo;

    public function __construct(string $id, string $nome, string $email, string $cargo)
    {
        parent::__construct($id, $nome, $email);
        $this->cargo = $cargo;
    }

    public function exibirInfo(): string
    {
        return "Email: {$this->email} | Cargo: {$this->cargo}";
    }
}
?>