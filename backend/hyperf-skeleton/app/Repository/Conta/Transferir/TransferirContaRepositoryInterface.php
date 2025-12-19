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

namespace App\Repository\Conta\Transferir;

use App\Domain\Conta\Conta;

/**
 * interface TransferirContaRepositoryInterface
 */
interface TransferirContaRepositoryInterface
{
    /**
     * Method to search for account.
     * 
     * @param int $pagadorId
     * 
     * @return Conta
     */
    public function search(int $pagadorId): Conta;

    /**
     * Method to save transfer.
     * 
     * @param Conta $conta
     * @param int $accountId
     * 
     * @return array
     */
    public function save(Conta $conta, int $accountId): array;
}
