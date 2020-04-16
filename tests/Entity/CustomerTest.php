<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Tests\Entity;

use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;

/**
 * @coversNothing
 */
class CustomerTest extends AbstractTestCase
{
    public function testHasAFactoryService(): FactoryTypeInterface
    {
        return $this->factoryForCustomer();
    }

    /**
     * @depends testHasAFactoryService
     */
    public function testCustomerPayload(FactoryTypeInterface $factory)
    {
        $input = [
            'name' => 'Tony Stark',
            'email' => 'tonystarkk@avengers.com',
            'document' => '34299284003',
            'type' => 'individual',
            'code' => 'MY_CUSTOMER_001',
            'gender' => 'male',
            'birthdate' => '1986-01-01T00:00:00Z',
            'address' => [
                'line_1' => '375, Av. General Justo, Centro',
                'line_2' => '8º andar',
                'zip_code' => '20021130',
                'city' => 'Rio de Janeiro',
                'state' => 'RJ',
                'country' => 'BR',
            ],
            'phones' => [
              'home_phone' => [
                'country_code' => '55',
                'area_code' => '21',
                'number' => '000000000',
              ],
              'mobile_phone' => [
                'country_code' => '55',
                'area_code' => '21',
                'number' => '000000000',
              ],
            ],
        ];

        $expected = array_merge($input, [
            'birthdate' => '01/01/1986',
        ]);

        $customer = $factory->createCustomer($input['name'], $input['email'], $input['document'], $input['type'], $input['code'], $input['gender'], $input['birthdate'], $this->createAddress($input['address']), $this->createPhones($input['phones']));
        $this->validate($customer);
        $payload = $customer->toPayload();

        $this->assertSame('01/01/1986', $payload['birthdate']);
        $this->assertSame($expected, $payload);
    }
}
