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

namespace App\Repository\Conta\Depositar;

use App\Domain\Conta\Conta;

/**
 * interface DepositarContaRepositoryInterface.
 */
interface DepositarContaRepositoryInterface
{
    /**
     * Method to search for account.
     */
    public function search(int $accountId): Conta;

    /**
     * Method to save deposit.
     */
    public function save(Conta $conta, int $accountId): array;
}
