<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Factory;

use App\Entity\Address;
use App\Entity\Customer;
use App\Entity\Phones;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Factory;

class CustomerFactory implements FactoryTypeInterface
{
    /**
     * @Factory()
     */
    public function createCustomer(string $name, string $email, string $document, string $type, string $code, string $gender, string $birthdate, Address $address, Phones $phones): Customer
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'document' => $document,
            'type' => $type,
            'code' => $code,
            'gender' => $gender,
            'birthdate' => $birthdate,
            'address' => $address,
            'phones' => $phones,
        ];

        return new Customer($data);
    }
}
