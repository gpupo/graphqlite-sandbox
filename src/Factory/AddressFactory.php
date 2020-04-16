<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Factory;

use App\Entity\Address;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Factory;

class AddressFactory implements FactoryTypeInterface
{
    /**
     * @Factory()
     */
    public function createAddress(string $line1, string $line2, string $zipCode, string $city, string $state, string $country): Address
    {
        $data = [
            'line_1' => $line1,
            'line_2' => $line2,
            'zip_code' => $zipCode,
            'city' => $city,
            'state' => $state,
            'country' => $country,
        ];

        return new Address($data);
    }
}
