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

namespace App\Repository\Log;

use App\Domain\Log\Log;

/**
 * interface LogTransacaoRepositoryInterface.
 */
interface LogTransacaoRepositoryInterface
{
    /**
     * Method to save success.
     */
    public function sucesso(Log $log): void;

    /**
     * Method to save fail.
     */
    public function falha(Log $log): void;
}
