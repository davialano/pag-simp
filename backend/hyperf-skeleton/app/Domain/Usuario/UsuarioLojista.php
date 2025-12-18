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

    public function cpf(): ?string
    {
        return null;
    }

    public function cnpj(): ?string
    {
        return $this->cnpj;
    }
}
