<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Tests\HttpClient;

use App\HttpClient\SandboxApiClient;
use Gpupo\PackSymfonyCommon\HttpClient\ApiClientInterface;
use Gpupo\PackSymfonyCommon\Test\AbstractApiClientTestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @coversNothing
 */
class SandboxApiClientTest extends AbstractApiClientTestCase
{
    public function testGetRequest()
    {
        $SandboxApiClient = $this->factorySandboxApiClientFromFile('recipients');
        $this->assertInstanceOf(MockHttpClient::class, $SandboxApiClient->getHttpCLient());
        $response = $SandboxApiClient->getRequest('/recipients');
        $info = $response->getInfo();
        $this->assertSame('https://foo-bar.com/core/v1/recipients', $info['url']);
        $recipientsArray = $response->toArray()['data'];
        $this->assertSame('tstark@konoha.net', $recipientsArray[0]['email']);
    }

    protected function factorySandboxApiClientFromFile(string $filename): ApiClientInterface
    {
        $mockContent = $this->readMockupContent($filename);
        $mockResponse = $this->factoryMockResponse($mockContent);
        $SandboxApiClient = $this->factoryApiClient([
            'endpoint' => 'https://foo-bar.com/core/v1',
            'secretKey' => '',
        ], $this->factoryMockClient($mockResponse), $this->getLogger());

        return $SandboxApiClient;
    }

    protected function factoryApiClient(array $options, HttpClientInterface $client): ApiClientInterface
    {
        return new SandboxApiClient($options, $client, $this->getLogger());
    }
}
