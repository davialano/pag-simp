<?php

declare(strict_types=1);

namespace App\Domain\Usuario;

use InvalidArgumentException;

/**
 * class UsuarioLojista
 * 
 * @author <davi-alano/>
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

    public function isLojista(): bool
    {
        return true;
    }
}
