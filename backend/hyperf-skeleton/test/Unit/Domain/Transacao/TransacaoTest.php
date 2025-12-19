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

namespace Test\Unit\Domain\Transacao;

use App\Domain\Transacao\Transacao;
use PHPUnit\Framework\TestCase;

/**
 * class TransacaoTest.
 * @internal
 * @coversNothing
 */
final class TransacaoTest extends TestCase
{
    public function testShouldCreateTransacaoObject()
    {
        $transacao = new Transacao(
            valor: 77.51,
            pagador: 2,
            beneficiario: null,
            tipo: 'D'
        );

        $this->assertInstanceOf(Transacao::class, $transacao);
        $this->assertEquals(77.51, $transacao->valor());
        $this->assertEquals(2, $transacao->pagador());
        $this->assertEquals(null, $transacao->beneficiario());
        $this->assertEquals('D', $transacao->tipo());
    }
}
