<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Factory;

use App\Entity\DefaultBankAccount;
use App\Entity\Recipient;
use App\Entity\TransferSettings;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Factory;

class RecipientFactory implements FactoryTypeInterface
{
    /**
     * @Factory()
     */
    public function createRecipient(string $name, string $email, string $description, string $document, string $type, DefaultBankAccount $default_bank_account, TransferSettings $transfer_settings): Recipient
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'description' => $description,
            'document' => $document,
            'type' => $type,
            'default_bank_account' => $default_bank_account,
            'transfer_settings' => $transfer_settings,
        ];

        return new Recipient($data);
    }
}
