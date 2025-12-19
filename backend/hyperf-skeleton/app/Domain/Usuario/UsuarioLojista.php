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
     * 
     * @param string $nome
     * @param string $email
     * @param string $cnpj
     * @param string $senha
     * 
     * @return void
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
     * 
     * @return ?string
     */
    public function cpf(): ?string
    {
        return null;
    }

    /**
     * Getter cnpj.
     * 
     * @return ?string
     */
    public function cnpj(): ?string
    {
        return $this->cnpj;
    }

    /**
     * Method to check if user is lojista.
     * 
     * @return bool
     */
    public function isLojista(): bool
    {
        return true;
    }
}
