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
class Customer extends AbstractPerson implements TypeInterface
{
    /**
     * @Field()
     */
    public function getCode(): ?string
    {
        return $this->get('code');
    }

    /**
     * @Field()
     */
    public function getDelinquent(): ?bool
    {
        return $this->get('delinquent');
    }

    /**
     * @Field()
     */
    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->dateTimeGetter('birthdate');
    }

    /**
     * @Field()
     */
    public function getAddress(): ?Address
    {
        return $this->entityFactoryGetter('address', Address::class);
    }

    /**
     * @Field()
     *
     * @return Phones
     */
    public function getPhones(): ?Phones
    {
        return $this->entityFactoryGetter('phones', Phones::class);
    }
}
