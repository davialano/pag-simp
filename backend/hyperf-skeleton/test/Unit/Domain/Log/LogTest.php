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

namespace Test\Unit\Domain\Log;

use App\Domain\Log\Log;
use PHPUnit\Framework\TestCase;

/**
 * class LogTest.
 * @internal
 * @coversNothing
 */
final class LogTest extends TestCase
{
    public function testShouldCreateLogObject()
    {
        $log = new Log(
            transacaoId: 1,
            status: 'S',
            mensagem: 'Conta 1, Valor 50'
        );

        $this->assertInstanceOf(Log::class, $log);
        $this->assertEquals(1, $log->transacaoId());
        $this->assertEquals('S', $log->status());
        $this->assertEquals('Conta 1, Valor 50', $log->mensagem());
    }
}
