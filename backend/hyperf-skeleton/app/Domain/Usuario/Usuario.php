<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Domain\Usuario;

/**
 * class Usuario.
 */
abstract class Usuario
{
    /**
     * Method constructor.
     */
    public function __construct(
        protected string $nome,
        protected string $email,
        protected string $tipoUsuario,
        protected string $senha
    ) {
    }

    /**
     * Getter nome.
     */
    public function nome(): string
    {
        return $this->nome;
    }

    /**
     * Getter email.
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * Getter tipo.
     */
    public function tipo(): string
    {
        return $this->tipoUsuario;
    }

    /**
     * Getter senha.
     */
    public function senha(): string
    {
        return $this->senha;
    }

    /**
     * Getter cpf.
     */
    abstract public function cpf(): ?string;

    /**
     * Getter cnpj.
     */
    abstract public function cnpj(): ?string;

    abstract public function isLojista(): bool;
}
