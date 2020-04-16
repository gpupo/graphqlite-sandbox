<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Factory;

use App\Entity\TransferSettings;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Factory;

class TransferSettingsFactory implements FactoryTypeInterface
{
    /**
     * @Factory()
     */
    public function createTransferSettings(bool $transfer_enabled, string $transfer_interval, int $transfer_day): TransferSettings
    {
        $data = [
            'transfer_enabled' => $transfer_enabled,
            'transfer_interval' => $transfer_interval,
            'transfer_day' => $transfer_day,
        ];

        return new TransferSettings($data);
    }
}
