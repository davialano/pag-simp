<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * enum TipoTransacao
 * 
 * @author <davi-alano/>
 */
enum TipoTransacao: string
{
    case Transferencia = 'T';
    case Deposito = 'D';
}
