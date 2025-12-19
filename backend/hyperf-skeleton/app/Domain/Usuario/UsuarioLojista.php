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
 * class UsuarioLojista.
 */
final class UsuarioLojista extends Usuario
{
    /**
     * Method constructor.
     */
    public function __construct(
        string $nome,
        string $email,
        private string $cnpj,
        string $senha
    ) {
        if (empty($cnpj)) {
            throw new InvalidArgumentException('CNPJ é obrigatório');
        }

        parent::__construct($nome, $email, 'L', $senha);
    }

    /**
     * Getter cpf.
     */
    public function cpf(): ?string
    {
        return null;
    }

    /**
     * Getter cnpj.
     */
    public function cnpj(): ?string
    {
        return $this->cnpj;
    }

    public function isLojista(): bool
    {
        return true;
    }
}
