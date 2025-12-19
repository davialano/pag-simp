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

namespace App\Repository\Conta\Criar;

use App\Domain\Conta\Conta;

/**
 * interface CriarContaRepositoryInterface
 */
interface CriarContaRepositoryInterface
{
    /**
     * Method to save account.
     * 
     * @param Conta $conta
     * 
     * @return array
     */
    public function save(Conta $conta): array;
}
