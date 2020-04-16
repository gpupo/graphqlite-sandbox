<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Tests\Entity;

use App\Entity\Address;
use App\Entity\HomePhone;
use App\Entity\MobilePhone;
use App\Entity\Phones;
use App\Factory\AddressFactory;
use App\Factory\CustomerFactory;
use App\Factory\DefaultBankAccountFactory;
use App\Factory\HomePhoneFactory;
use App\Factory\MobilePhoneFactory;
use App\Factory\PhonesFactory;
use App\Factory\RecipientFactory;
use App\Factory\TransferSettingsFactory;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use Gpupo\PackSymfonyCommon\Test\AbstractServiceTestCase;

/**
 * @coversNothing
 */
abstract class AbstractTestCase extends AbstractServiceTestCase
{
    protected function validate($entity): void
    {
        $validator = $this->getSpecialContainer()->get('validator');
        $violations = $validator->validate($entity);
        if (0 !== \count($violations)) {
            $message = 'Invalid Entity.';
            // there are errors, now you can show them
            foreach ($violations as $k => $violation) {
                $message .= sprintf(' #%s $%s: %s | ', $k + 1, $violation->getPropertyPath(), $violation->getMessage());
            }

            throw new \Exception($message);
        }
    }

    protected function getFactoryService(string $className): FactoryTypeInterface
    {
        $factory = $this->getSpecialContainer()->get($className);
        $this->assertInstanceof(FactoryTypeInterface::class, $factory);
        $this->assertInstanceof($className, $factory);

        return $factory;
    }

    protected function factoryForRecipient(): FactoryTypeInterface
    {
        return $this->getFactoryService(RecipientFactory::class);
    }

    protected function factoryForTransferSettings(): FactoryTypeInterface
    {
        return $this->getFactoryService(TransferSettingsFactory::class);
    }

    protected function factoryForDefaultBankAccount(): FactoryTypeInterface
    {
        return $this->getFactoryService(DefaultBankAccountFactory::class);
    }

    protected function factoryForCustomer(): FactoryTypeInterface
    {
        return $this->getFactoryService(CustomerFactory::class);
    }

    protected function factoryForAddress(): FactoryTypeInterface
    {
        return $this->getFactoryService(AddressFactory::class);
    }

    protected function factoryForPhones(): FactoryTypeInterface
    {
        return $this->getFactoryService(PhonesFactory::class);
    }

    protected function factoryForHomePhone(): FactoryTypeInterface
    {
        return $this->getFactoryService(HomePhoneFactory::class);
    }

    protected function factoryForMobilePhone(): FactoryTypeInterface
    {
        return $this->getFactoryService(MobilePhoneFactory::class);
    }

    protected function createAddress(array $data): Address
    {
        $object = $this->factoryForAddress()->createAddress(...array_values($data));
        $this->assertSame($data['line_1'], $object->getLine1());
        $this->assertSame($data['line_2'], $object->getLine2());
        $this->assertSame($data['zip_code'], $object->getZipCode());

        return $object;
    }

    protected function createHomePhone(array $data): HomePhone
    {
        $object = $this->factoryForHomePhone()->createHomePhone(...array_values($data));
        $this->assertSame($data['number'], $object->getNumber());

        return $object;
    }

    protected function createMobilePhone(array $data): MobilePhone
    {
        $object = $this->factoryForMobilePhone()->createMobilePhone(...array_values($data));
        $this->assertSame($data['number'], $object->getNumber());

        return $object;
    }

    protected function createPhones(array $data): Phones
    {
        $object = $this->factoryForPhones()->createPhones($this->createHomePhone($data['home_phone']), $this->createMobilePhone($data['mobile_phone']));
        $this->assertSame($data['home_phone']['number'], $object->getHomePhone()->getNumber());
        $this->assertSame($data['mobile_phone']['number'], $object->getMobilePhone()->getNumber());

        return $object;
    }
}
