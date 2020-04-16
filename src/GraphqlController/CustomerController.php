<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\GraphqlController;

use App\Entity\Customer;
use App\Service\Remote\CustomerService;
use Gpupo\PackSymfonyCommon\Graphql\AbstractController;
use TheCodingMachine\GraphQLite\Annotations\Mutation;
use TheCodingMachine\GraphQLite\Annotations\Query;
use TheCodingMachine\GraphQLite\Types\ID;

class CustomerController extends AbstractController
{
    public function __construct(CustomerService $remoteService)
    {
        $this->setRemoteService($remoteService);
    }

    /**
     * @Query()
     */
    public function customer(ID $id): ?Customer
    {
        return $this->getRemoteService()->findById((string) $id);
    }

    /**
     * @Query()
     *
     * @return Customer[]
     */
    public function customers(): array
    {
        return $this->getRemoteService()->findAll();
    }

    /**
     * @Mutation
     */
    public function addCustomer(Customer $customer): Customer
    {
        return $this->getRemoteService()->add($customer);
    }
}
