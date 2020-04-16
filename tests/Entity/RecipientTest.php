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
class RecipientTest extends AbstractTestCase
{
    public function testHasAFactoryService(): FactoryTypeInterface
    {
        return $this->factoryForRecipient();
    }

    /**
     * @depends testHasAFactoryService
     */
    public function testRecipientPayload(FactoryTypeInterface $factory)
    {
        $input = [
            'name' => 'Fernanda e Benedita Doces',
            'email' => 'tFiat@konoha.net',
            'description' => 'Recebedor tony Fiat',
            'document' => '29245794000135',
            'type' => 'company',
            'default_bank_account' => [
              'holder_name' => 'Fernanda e Benedita Doces',
              'holder_type' => 'individual',
              'holder_document' => '29245794000135',
              'bank' => '342',
              'branch_number' => '12345',
              'branch_check_digit' => '6',
              'account_number' => '12345',
              'account_check_digit' => '6',
              'type' => 'checking',
            ],
            'transfer_settings' => [
              'transfer_enabled' => false,
              'transfer_interval' => 'Daily',
              'transfer_day' => 10,
            ],
          ];

        $expected = $input;

        $recipient = $factory->createRecipient(...array_values(array_merge($input, [
            'default_bank_account' => $this->factoryForDefaultBankAccount()->createDefaultBankAccount(...array_values($input['default_bank_account'])),
            'transfer_settings' => $this->factoryForTransferSettings()->createTransferSettings(...array_values($input['transfer_settings'])),
        ])));

        $this->validate($recipient);

        $payload = $recipient->toPayload();

        $this->assertSame('29245794000135', $payload['document']);
        $this->assertSame($expected, $payload);
    }
}
