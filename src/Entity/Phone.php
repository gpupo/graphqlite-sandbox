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

class Phone extends AbstractType implements TypeInterface
{
    /**
     * @Field()
     */
    public function getCountryCode(): ?string
    {
        return $this->get('country_code');
    }

    /**
     * @Field()
     */
    public function getNumber(): ?string
    {
        return $this->get('number');
    }

    /**
     * @Field()
     */
    public function getAreaCode(): ?string
    {
        return $this->get('area_code');
    }
}
