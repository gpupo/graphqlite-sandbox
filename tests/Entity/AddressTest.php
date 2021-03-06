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
class AddressTest extends AbstractTestCase
{
    public function testHasAFactoryService(): FactoryTypeInterface
    {
        return $this->factoryForAddress();
    }

    /**
     * @depends testHasAFactoryService
     */
    public function testAddressPayload(FactoryTypeInterface $factory)
    {
        $input = [
                'line_1' => '375, Av. General Justo, Centro',
                'line_2' => '8º andar',
                'zip_code' => '20021130',
                'city' => 'Rio de Janeiro',
                'state' => 'RJ',
                'country' => 'BR',
        ];

        $address = $factory->createAddress(...array_values($input));
        $payload = $address->toPayload();

        $this->assertSame($input['line_1'], $payload['line_1']);
        $this->assertSame($input, $payload);
    }
}
