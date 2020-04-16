<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\SourceField;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @Type(class=UserInterface::class)
 * @SourceField(name="userName")
 */
class User
{
    /**
     * @Field()
     *
     * @return string[]
     */
    public function getRoles(UserInterface $user): array
    {
        $roles = [];
        foreach ($user->getRoles() as $role) {
            $roles[] = (string) $role;
        }

        return $roles;
    }
}
