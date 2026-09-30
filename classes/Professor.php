<?php
require_once "Usuario.php";

class Professor extends Usuario
{
    private string $disciplina;

    public function __construct(string $id, string $nome, string $email, string $disciplina)
    {
        parent::__construct($id, $nome, $email);
        $this->disciplina = $disciplina;
    }

    public function exibirInfo(): string
    {
        return "Email: {$this->email} | Disciplina: {$this->disciplina}";
    }
}
