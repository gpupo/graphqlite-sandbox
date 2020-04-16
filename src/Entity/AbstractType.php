<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Entity;

use DateTimeInterface;
use Gpupo\Common\Entity\Collection;
use Gpupo\PackSymfonyCommon\Graphql\EntityTypeTrait;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Types\ID;

abstract class AbstractType extends Collection
{
    use EntityTypeTrait;

    /**
     * @Field(outputType="ID")
     */
    public function getId(): ?string
    {
        return $this->get('id');
    }

    /**
     * @Field()
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->dateTimeGetter('created_at');
    }

    /**
     * @Field()
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->dateTimeGetter('updated_at');
    }

    /**
     * @Field()
     */
    public function getMetadata(): ?string
    {
        return $this->jsonEncodedGetter('metadata');
    }

    protected function normalizeToPayload(string $key, $value)
    {
        switch ($key) {
            case 'birthdate':
                return $this->getBirthdate()->format('d/m/Y');

                break;
            default:
        }

        if (method_exists($value, 'toArray')) {
            return $value->toArray();
        }

        return $value;
    }
}
