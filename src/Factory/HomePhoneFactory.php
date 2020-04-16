<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Factory;

use App\Entity\HomePhone;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Factory;

class HomePhoneFactory implements FactoryTypeInterface
{
    /**
     * @Factory()
     */
    public function createHomePhone(string $countryCode, string $areaCode, string $number): HomePhone
    {
        $data = [
            'country_code' => $countryCode,
            'area_code' => $areaCode,
            'number' => $number,
        ];

        return new HomePhone($data);
    }
}
