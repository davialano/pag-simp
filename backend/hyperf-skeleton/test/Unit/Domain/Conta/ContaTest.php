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

namespace Test\Unit\Domain\Conta;

use App\Domain\Conta\Conta;
use App\Domain\Usuario\UsuarioComum;
use App\Domain\Usuario\UsuarioFactory;
use App\Domain\Usuario\UsuarioLojista;
use DomainException;
use InvalidArgumentException;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * class ContaTest.
 * @internal
 * @coversNothing
 */
final class ContaTest extends TestCase
{
    private $usuarioComum;

    private $usuarioLojista;

    protected function setUp(): void
    {
        $this->usuarioComum = UsuarioFactory::create([
            'nome' => 'Fulano de Tal',
            'cpf' => '09677745820',
            'cnpj' => '',
            'email' => 'fulano@gmail.com',
            'senha' => '12345',
            'tipoUsuario' => 'C',
        ]);

        $this->usuarioLojista = UsuarioFactory::create([
            'nome' => 'Fulano de Tal',
            'cpf' => '',
            'cnpj' => '12345678910234',
            'email' => 'fulano@gmail.com',
            'senha' => '12345',
            'tipoUsuario' => 'L',
        ]);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        unset(
            $this->usuarioComum,
            $this->usuarioLojista
        );
    }

    public function testShouldCreateAccountForComumnUserObject()
    {
        $conta = new Conta(
            numero: 5,
            usuarioId: 3,
            usuario: $this->usuarioComum,
            saldo: 456.7
        );

        $this->assertInstanceOf(Conta::class, $conta);
        $this->assertEquals(5, $conta->numero());
        $this->assertEquals(3, $conta->usuarioId());
        $this->assertInstanceOf(UsuarioComum::class, $this->usuarioComum);
        $this->assertEquals(456.7, $conta->saldo());
    }

    public function testShouldCreateAccountForLojistaUserObject()
    {
        $conta = new Conta(
            numero: 10,
            usuarioId: 6,
            usuario: $this->usuarioLojista,
            saldo: 1000.7
        );

        $this->assertInstanceOf(Conta::class, $conta);
        $this->assertEquals(10, $conta->numero());
        $this->assertEquals(6, $conta->usuarioId());
        $this->assertInstanceOf(UsuarioLojista::class, $this->usuarioLojista);
        $this->assertEquals(1000.7, $conta->saldo());
    }

    public function testComumnUserCanDepositSuccess()
    {
        $conta = new Conta(
            numero: 5,
            usuarioId: 3,
            usuario: $this->usuarioComum,
            saldo: 456.7
        );

        $this->assertTrue($conta->podeEfetuarDeposito());
    }

    public function testLojistaUserCanDepositDomainException()
    {
        $conta = new Conta(
            numero: 10,
            usuarioId: 6,
            usuario: $this->usuarioLojista,
            saldo: 1000.7
        );

        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Lojistas não podem efetuar depósitos');

        $conta->podeEfetuarDeposito();
    }

    public function testComumnUserCanTransferSuccess()
    {
        $conta = new Conta(
            numero: 5,
            usuarioId: 3,
            usuario: $this->usuarioComum,
            saldo: 456.7
        );

        $this->assertTrue($conta->podeEfetuarTransferencia());
    }

    public function testLojistaUserCanTransferDomainException()
    {
        $conta = new Conta(
            numero: 10,
            usuarioId: 6,
            usuario: $this->usuarioLojista,
            saldo: 1000.7
        );

        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Lojistas não podem efetuar transferências');

        $this->assertTrue($conta->podeEfetuarTransferencia());
    }

    public function testComumnUserDepositAccountSuccess()
    {
        $conta = new Conta(
            numero: 5,
            usuarioId: 3,
            usuario: $this->usuarioComum,
            saldo: 456.7
        );

        $conta->depositar(654.3);

        $this->assertEquals(1111, $conta->saldo());
    }

    public function testComumnUserDepositAccountThrowInvalidArgumentException()
    {
        $conta = new Conta(
            numero: 5,
            usuarioId: 3,
            usuario: $this->usuarioComum,
            saldo: 456.7
        );

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Valor inválido');

        $conta->depositar(0);
    }

    public function testComumnUserTransferAccountSuccess()
    {
        $pagador = new Conta(
            numero: 5,
            usuarioId: 3,
            usuario: $this->usuarioComum,
            saldo: 456.7
        );

        $beneficiario = new Conta(
            numero: 10,
            usuarioId: 6,
            usuario: $this->usuarioLojista,
            saldo: 1000.7
        );

        $pagador->podeEfetuarTransferencia();
        $pagador->transferir(50);

        $beneficiario->depositar(50);

        $this->assertEquals(406.7, $pagador->saldo());
        $this->assertEquals(1050.7, $beneficiario->saldo());
    }

    public function testComumnUserTransferAccountThrowInvalidArgumentException()
    {
        $pagador = new Conta(
            numero: 5,
            usuarioId: 3,
            usuario: $this->usuarioComum,
            saldo: 456.7
        );

        $pagador->podeEfetuarTransferencia();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Valor inválido');

        $pagador->transferir(0);
    }

    public function testComumnUserTransferAccountThrowDomainException()
    {
        $pagador = new Conta(
            numero: 5,
            usuarioId: 3,
            usuario: $this->usuarioComum,
            saldo: 456.7
        );

        $pagador->podeEfetuarTransferencia();

        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('O saldo é insuficiente para completar a transação');

        $pagador->transferir(500);
    }
}
