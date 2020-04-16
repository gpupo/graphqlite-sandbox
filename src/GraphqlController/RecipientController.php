<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\GraphqlController;

use App\Entity\Recipient;
use App\Service\Remote\RecipientService;
use Gpupo\PackSymfonyCommon\Graphql\AbstractController;
use TheCodingMachine\GraphQLite\Annotations\Mutation;
use TheCodingMachine\GraphQLite\Annotations\Query;
use TheCodingMachine\GraphQLite\Types\ID;

class RecipientController extends AbstractController
{
    public function __construct(RecipientService $remoteService)
    {
        $this->setRemoteService($remoteService);
    }

    /**
     * @Query()
     */
    public function recipient(ID $id): ?Recipient
    {
        return $this->getRemoteService()->findById((string) $id);
    }

    /**
     * @Query()
     *
     * @return Recipient[]
     */
    public function recipients(): array
    {
        return $this->getRemoteService()->findAll();
    }

    /**
     * @Mutation
     */
    public function addRecipient(Recipient $recipient): Recipient
    {
        return $this->getRemoteService()->add($recipient);
    }
}
