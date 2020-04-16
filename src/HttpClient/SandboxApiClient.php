<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\HttpClient;

use Gpupo\PackSymfonyCommon\HttpClient\AbstractApiClient;

class SandboxApiClient extends AbstractApiClient
{
    protected function factoryRequestOptions(): array
    {
        return array_merge(
            parent::factoryRequestOptions(),
            [
                'auth_basic' => [$this->getOptions()['secretKey'], ''],
            ]
        );
    }

    protected function factoryRequestUrl(string $url): string
    {
        return sprintf('%s%s', $this->getOptions()['endpoint'], $url);
    }
}
