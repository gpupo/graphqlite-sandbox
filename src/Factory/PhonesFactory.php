<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Factory;

use App\Entity\HomePhone;
use App\Entity\MobilePhone;
use App\Entity\Phones;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Factory;

class PhonesFactory implements FactoryTypeInterface
{
    /**
     * @Factory()
     */
    public function createPhones(HomePhone $homePhone, MobilePhone $mobilePhone): Phones
    {
        $data = [
            'home_phone' => $homePhone,
            'mobile_phone' => $mobilePhone,
        ];

        return new Phones($data);
    }
}
