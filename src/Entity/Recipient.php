<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Entity;

use Gpupo\PackSymfonyCommon\Graphql\TypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @Type()
 */
class Recipient extends AbstractPerson implements TypeInterface
{
    /**
     * @Field()
     */
    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    /**
     * @Field()
     */
    public function getTransferSettings(): ?TransferSettings
    {
        return $this->entityFactoryGetter('transfer_settings', TransferSettings::class);
    }

    /**
     * @Field()
     */
    public function getDefaultBankAccount(): ?DefaultBankAccount
    {
        return $this->entityFactoryGetter('transfer_sedefault_bank_accountttings', TransDefaultBankAccountferSettings::class);
    }

    /**
     * @Field()
     */
    public function getGatewayRecipients(): ?GatewayRecipients
    {
        return $this->entityFactoryGetter('gateway_recipients', GatewayRecipients::class);
    }
}
