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

use App\Domain\Usuario\UsuarioFactory;
use App\Domain\Usuario\UsuarioLojista;
use PHPUnit\Framework\TestCase;

/**
 * class UsuarioLojistaTest.
 * @internal
 * @coversNothing
 */
final class UsuarioLojistaTest extends TestCase
{
    public function testShouldCreateUserObject()
    {
        $usuario = UsuarioFactory::create([
            'nome' => 'Fulano de Tal',
            'cpf' => '',
            'cnpj' => '12345678910234',
            'email' => 'fulano@gmail.com',
            'senha' => '12345',
            'tipoUsuario' => 'L',
        ]);

        $this->assertInstanceOf(UsuarioLojista::class, $usuario);
        $this->assertEquals(null, $usuario->cpf());
        $this->assertEquals('12345678910234', $usuario->cnpj());
        $this->assertEquals('fulano@gmail.com', $usuario->email());
        $this->assertEquals('L', $usuario->tipo());
    }

    public function testShouldReturnFalseIfIsLojista()
    {
        $usuario = UsuarioFactory::create([
            'nome' => 'Fulano de Tal',
            'cpf' => '',
            'cnpj' => '12345678910234',
            'email' => 'fulano@gmail.com',
            'senha' => '12345',
            'tipoUsuario' => 'L',
        ]);

        $this->assertTrue($usuario->isLojista());
    }
}
