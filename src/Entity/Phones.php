<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Entity;

use Gpupo\Common\Entity\Collection;
use Gpupo\PackSymfonyCommon\Graphql\EntityTypeTrait;
use Gpupo\PackSymfonyCommon\Graphql\TypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @Type()
 */
class Phones extends Collection implements TypeInterface
{
    use EntityTypeTrait;

    /**
     * @Field()
     */
    public function getHomePhone(): ?HomePhone
    {
        return $this->entityFactoryGetter('home_phone', HomePhone::class);
    }

    /**
     * @Field()
     */
    public function getMobilePhone(): ?MobilePhone
    {
        return $this->entityFactoryGetter('mobile_phone', MobilePhone::class);
    }

    protected function normalizeToPayload(string $key, $value)
    {
    }
}
