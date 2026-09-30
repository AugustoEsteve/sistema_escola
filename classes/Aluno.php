<?php
require_once "Usuario.php";

class Aluno extends Usuario {
    private string $matricula;

    public function __construct(string $id, string $nome, string $email, string $matricula) {
        parent::__construct($id, $nome, $email);
        $this->matricula = $matricula;
    }

    public function exibirInfo(): string {
        return "Email: {$this->email} | Matrícula: {$this->matricula}";
    }
}
?>
