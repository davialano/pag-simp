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

namespace Test\Unit\Domain\Usuario;

use App\Domain\Usuario\UsuarioComum;
use App\Domain\Usuario\UsuarioFactory;
use PHPUnit\Framework\TestCase;

/**
 * class UsuarioComumTest.
 * @internal
 * @coversNothing
 */
final class UsuarioComumTest extends TestCase
{
    public function testShouldCreateUserObject()
    {
        $usuario = UsuarioFactory::create([
            'nome' => 'Fulano de Tal',
            'cpf' => '09677745820',
            'cnpj' => '',
            'email' => 'fulano@gmail.com',
            'senha' => '12345',
            'tipoUsuario' => 'C',
        ]);

        $this->assertInstanceOf(UsuarioComum::class, $usuario);
        $this->assertEquals('09677745820', $usuario->cpf());
        $this->assertEquals(null, $usuario->cnpj());
        $this->assertEquals('fulano@gmail.com', $usuario->email());
        $this->assertEquals('C', $usuario->tipo());
    }

    public function testShouldReturnFalseIfIsLojista()
    {
        $usuario = UsuarioFactory::create([
            'nome' => 'Fulano de Tal',
            'cpf' => '09677745820',
            'cnpj' => '',
            'email' => 'fulano@gmail.com',
            'senha' => '12345',
            'tipoUsuario' => 'C',
        ]);

        $this->assertFalse($usuario->isLojista());
    }
}
