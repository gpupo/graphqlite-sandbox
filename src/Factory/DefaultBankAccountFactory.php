<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Factory;

use App\Entity\DefaultBankAccount;
use Gpupo\PackSymfonyCommon\Graphql\FactoryTypeInterface;
use TheCodingMachine\GraphQLite\Annotations\Factory;

class DefaultBankAccountFactory implements FactoryTypeInterface
{
    /**
     * @Factory()
     */
    public function createDefaultBankAccount(string $holder_name, string $holder_type, string $holder_document, string $bank, string $branch_number, string $branch_check_digit, string $account_number, string $account_check_digit, string $type): DefaultBankAccount
    {
        $data = [
            'holder_name' => $holder_name,
            'holder_type' => $holder_type,
            'holder_document' => $holder_document,
            'bank' => $bank,
            'branch_number' => $branch_number,
            'branch_check_digit' => $branch_check_digit,
            'account_number' => $account_number,
            'account_check_digit' => $account_check_digit,
            'type' => $type,
        ];

        return new DefaultBankAccount($data);
    }
}
