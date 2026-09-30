<?php
require_once "Usuario.php";

class Professor extends Usuario
{
    private string $disciplina;

    public function __construct(string $nome, string $email, string $disciplina)
    {
        parent::__construct($nome, $email);
        $this->disciplina = $disciplina;
    }

    public function exibirInfo(): string
    {
        return "Professor: {$this->nome} | Email: {$this->email} | Disciplina: {$this->disciplina}";
    }
}
