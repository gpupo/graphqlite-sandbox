<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Factory;

use App\Entity\MobilePhone;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Factory;

class MobilePhoneFactory implements FactoryTypeInterface
{
    /**
     * @Factory()
     */
    public function createMobilePhone(string $countryCode, string $areaCode, string $number): MobilePhone
    {
        $data = [
            'country_code' => $countryCode,
            'area_code' => $areaCode,
            'number' => $number,
        ];

        return new MobilePhone($data);
    }
}
