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
class Address extends AbstractType implements TypeInterface
{
    /**
     * @Field()
     */
    public function getLine1(): ?string
    {
        return $this->get('line_1');
    }

    /**
     * @Field()
     */
    public function getLine2(): ?string
    {
        return $this->get('line_2');
    }

    /**
     * @Field()
     */
    public function getZipCode(): ?string
    {
        return $this->get('zip_code');
    }

    /**
     * @Field()
     */
    public function getCity(): ?string
    {
        return $this->get('city');
    }

    /**
     * @Field()
     */
    public function getState(): ?string
    {
        return $this->get('state');
    }

    /**
     * @Field()
     * @Assert\Country
     */
    public function getCountry(): ?string
    {
        return $this->get('country');
    }

    /**
     * @Field()
     */
    public function getStatus(): ?string
    {
        return $this->get('status');
    }
}
