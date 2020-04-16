<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Service\Remote;

use Gpupo\PackSymfonyCommon\Service\Remote\AbstractRemoteService;
use Gpupo\PackSymfonyCommon\Service\Remote\RemoteServiceInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractService extends AbstractRemoteService implements RemoteServiceInterface
{
    protected function responseColletionToData(ResponseInterface $response): array
    {
        return current($response->toArray());
    }
}
