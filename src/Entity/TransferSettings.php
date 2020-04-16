<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Entity;

use Gpupo\PackSymfonyCommon\Graphql\TypeInterface;
use Symfony\Component\Validator\Constraints as Assert;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @Type()
 */
class TransferSettings extends AbstractType implements TypeInterface
{
    /**
     * @Field()
     */
    public function getTransferEnabled(): bool
    {
        return $this->get('transfer_enabled');
    }

    /**
     * @Field()
     * @Assert\Choice({"Daily", "Weekly", "Monthly"})
     */
    public function getTransferInterval(): string
    {
        return $this->get('transfer_interval');
    }

    /**
     * @Field()
     * @Assert\Range(min=0, max=31)
     */
    public function getTransferDay(): int
    {
        return (int) $this->get('transfer_day');
    }
}
