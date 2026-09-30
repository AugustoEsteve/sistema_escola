<?php

abstract class Usuario
{
    protected string $nome;
    protected string $email;
    protected string $id;

    public function __construct(string $id, string $nome, string $email)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getnome(): string
    {
        return $this->nome;
    }

    public function getid(): string
    {
        return $this->id;
    }

    public function getemail(): string
    {
        return $this->email;
    }

    abstract public function exibirinfo(): string;
}