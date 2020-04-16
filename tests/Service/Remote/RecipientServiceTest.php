<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Tests\Service\Remote;

use App\Entity\Recipient;
use App\Entity\TransferSettings;
use App\Service\Remote\RecipientService;
use Gpupo\PackSymfonyCommon\Graphql\Exception;
use Gpupo\PackSymfonyCommon\Graphql\TypeAnnotatedGeneratorInterface;
use Gpupo\PackSymfonyCommon\Service\Remote\RemoteServiceInterface;
use Gpupo\PackSymfonyCommon\Test\AbstractServiceTestCase;

/**
 * @coversNothing
 */
class RecipientServiceTest extends AbstractServiceTestCase
{
    public function testIsAService(): RemoteServiceInterface
    {
        $service = $this->getSpecialContainer()->get(RecipientService::class);
        $this->assertInstanceof(RecipientService::class, $service);
        $this->assertInstanceof(RemoteServiceInterface::class, $service);

        return $service;
    }

    /**
     * @depends testIsAService
     */
    public function testFindRecipient(RemoteServiceInterface $service)
    {
        $id = 'rp_PdDWgeqs0i7gB6Y2';
        $recipient = $service->findById($id);
        $this->assertInstanceof(TypeAnnotatedGeneratorInterface::class, $recipient);
        $this->assertInstanceof(Recipient::class, $recipient);
        $this->assertSame($id, $recipient->getId());
        $this->assertSame('tstark@konoha.net', $recipient->getEmail());
        $this->assertInstanceof(TransferSettings::class, $recipient->getTransferSettings());
    }

    /**
     * @depends testIsAService
     */
    public function testFindRecipientFailWithInvalidId(RemoteServiceInterface $service)
    {
        $this->expectException(Exception::class);
        $recipient = $service->findById('foo');
    }

    /**
     * @depends testIsAService
     */
    public function testFindRecipientNotFound(RemoteServiceInterface $service)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Request (404)');
        $recipient = $service->findById('rp_Pd1Wgeqs0i7gB6Y2');
    }

    /**
     * @depends testIsAService
     */
    public function testFindRecipients(RemoteServiceInterface $service)
    {
        $recipients = $service->findall();
        $this->assertIsArray($recipients);

        foreach ($recipients as $recipient) {
            $this->assertInstanceof(TypeAnnotatedGeneratorInterface::class, $recipient);
        }
    }
}
