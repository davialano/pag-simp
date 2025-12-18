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
    /**
     * Method constructor.
     * 
     * @param string $nome
     * @param string $email
     * @param string $tipoUsuario
     * @param string $senha
     * 
     * @return void
     */
    public function __construct(
        protected string $nome,
        protected string $email,
        protected string $tipoUsuario,
        protected string $senha
    ) {}

    /**
     * Getter nome.
     * 
     * @return string
     */
    public function nome(): string
    {
        return $this->nome;
    }

    /**
     * Getter email.
     * 
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * Getter tipo.
     * 
     * @return string
     */
    public function tipo(): string
    {
        return $this->tipoUsuario;
    }

    /**
     * Getter senha.
     * 
     * @return string
     */
    public function senha(): string
    {
        return $this->senha;
    }

    /**
     * Getter cpf.
     * 
     * @return ?string
     */
    abstract public function cpf(): ?string;

    /**
     * Getter cnpj.
     * 
     * @return ?string
     */
    abstract public function cnpj(): ?string;
}
