<?php

abstract class Usuario
{
    protected string $nome;
    protected string $email;

    public function __construct(string $nome, string $email)
    {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getnome(): string
    {
        return $this->nome;
    }

    public function getemail(): string
    {
        return $this->email;
    }

    abstract public function exibirinfo(): string;
}