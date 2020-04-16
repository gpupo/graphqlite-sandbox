<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Tests\Service\Remote;

use App\Entity\Address;
use App\Entity\Customer;
use App\Entity\Phone;
use App\Entity\Phones;
use App\Service\Remote\CustomerService;
use Gpupo\PackSymfonyCommon\Graphql\Exception;
use Gpupo\PackSymfonyCommon\Graphql\TypeAnnotatedGeneratorInterface;
use Gpupo\PackSymfonyCommon\Service\Remote\RemoteServiceInterface;
use Gpupo\PackSymfonyCommon\Test\AbstractServiceTestCase;

/**
 * @coversNothing
 */
class CustomerServiceTest extends AbstractServiceTestCase
{
    public function testIsAService(): RemoteServiceInterface
    {
        $service = $this->getSpecialContainer()->get(CustomerService::class);
        $this->assertInstanceof(CustomerService::class, $service);
        $this->assertInstanceof(RemoteServiceInterface::class, $service);

        return $service;
    }

    /**
     * @depends testIsAService
     */
    public function testFindCustomer(RemoteServiceInterface $service)
    {
        $id = 'cus_BDVXLa0skunMx4Jk';
        $recipient = $service->findById($id);
        $this->assertInstanceof(TypeAnnotatedGeneratorInterface::class, $recipient);
        $this->assertInstanceof(Customer::class, $recipient);
        $this->assertSame($id, $recipient->getId());
        $this->assertSame('tonystarkk@avengers.com', $recipient->getEmail());
        $this->assertInstanceof(Address::class, $recipient->getAddress());
        $this->assertInstanceof(Phones::class, $recipient->getPhones());
        $this->assertInstanceof(Phone::class, $recipient->getPhones()->getHomePhone());
        $this->assertInstanceof(Phone::class, $recipient->getPhones()->getMobilePhone());
    }

    /**
     * @depends testIsAService
     */
    public function testFindCustomerFailWithInvalidId(RemoteServiceInterface $service)
    {
        $this->expectException(Exception::class);
        $recipient = $service->findById('foo');
    }

    /**
     * @depends testIsAService
     */
    public function testFindCustomerNotFound(RemoteServiceInterface $service)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Request (404)');
        $recipient = $service->findById('rp_Pd1Wgeqs0i7gB6Y2');
    }

    /**
     * @depends testIsAService
     */
    public function testFindCustomers(RemoteServiceInterface $service)
    {
        $recipients = $service->findall();
        $this->assertIsArray($recipients);

        foreach ($recipients as $recipient) {
            $this->assertInstanceof(TypeAnnotatedGeneratorInterface::class, $recipient);
        }
    }
}
