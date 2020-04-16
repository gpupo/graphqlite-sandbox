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
class GatewayRecipients extends AbstractType implements TypeInterface
{
    /**
     * @Field()
     */
    public function getGateway(): ?string
    {
        return $this->get('gateway');
    }

    /**
     * @Field()
     */
    public function getStatus(): ?string
    {
        return $this->get('status');
    }

    /**
     * @Field()
     */
    public function getPgid(): ?string
    {
        return $this->get('pgid');
    }
}
