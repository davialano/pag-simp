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

use InvalidArgumentException;

/**
 * class UsuarioComum.
 */
final class UsuarioComum extends Usuario
{
    /**
     * Method constructor.
     */
    public function __construct(
        string $nome,
        string $email,
        private string $cpf,
        string $senha
    ) {
        if (empty($cpf)) {
            throw new InvalidArgumentException('CPF é obrigatório');
        }

        parent::__construct($nome, $email, 'C', $senha);
    }

    /**
     * Getter cpf.
     */
    public function cpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * Getter cnpj.
     */
    public function cnpj(): ?string
    {
        return null;
    }

    /**
     * Method to check if user is lojista.
     */
    public function isLojista(): bool
    {
        return false;
    }
}
