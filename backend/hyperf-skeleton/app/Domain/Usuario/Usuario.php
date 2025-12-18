<?php

declare(strict_types=1);

namespace App\Domain\Usuario;

/**
 * class Usuario
 * 
 * @author <davi-alano/>
 */
abstract class Usuario
{
    public function __construct(
        protected string $nome,
        protected string $email,
        protected string $tipoUsuario,
        protected string $senha
    ) {}

    public function nome(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function tipo(): string
    {
        return $this->tipoUsuario;
    }

    public function senha(): string
    {
        return $this->senha;
    }

    abstract public function cpf(): ?string;

    abstract public function cnpj(): ?string;
}
