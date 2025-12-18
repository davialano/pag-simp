<?php

declare(strict_types=1);

namespace App\Domain\Usuario;

use InvalidArgumentException;

/**
 * class UsuarioComum
 * 
 * @author <davi-alano/>
 */
final class UsuarioComum extends Usuario
{
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

    public function cpf(): ?string
    {
        return $this->cpf;
    }

    public function cnpj(): ?string
    {
        return null;
    }
}
