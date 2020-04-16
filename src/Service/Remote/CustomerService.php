<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Service\Remote;

use App\Entity\Customer;
use Gpupo\PackSymfonyCommon\Graphql\TypeAnnotatedGeneratorInterface;

class CustomerService extends AbstractService
{
    protected string $domain = 'customers';

    protected function factoryEntity(array $data): TypeAnnotatedGeneratorInterface
    {
        return new Customer($data);
    }
}
