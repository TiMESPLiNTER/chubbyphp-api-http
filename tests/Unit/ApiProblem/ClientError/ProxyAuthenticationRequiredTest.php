<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\ApiHttp\Unit\ApiProblem\ClientError;

use Chubbyphp\ApiHttp\ApiProblem\ClientError\ProxyAuthenticationRequired;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\ApiHttp\ApiProblem\ClientError\ProxyAuthenticationRequired
 *
 * @internal
 */
final class ProxyAuthenticationRequiredTest extends TestCase
{
    public function testMinimal(): void
    {
        $apiProblem = new ProxyAuthenticationRequired();

        self::assertSame(407, $apiProblem->getStatus());
        self::assertSame([], $apiProblem->getHeaders());
        self::assertSame('https://tools.ietf.org/html/rfc2616#section-10.4.8', $apiProblem->getType());
        self::assertSame('Proxy Authentication Required', $apiProblem->getTitle());
        self::assertNull($apiProblem->getDetail());
        self::assertNull($apiProblem->getInstance());
    }

    public function testMaximal(): void
    {
        $apiProblem = new ProxyAuthenticationRequired('detail', '/cccdfd0f-0da3-4070-8e55-61bd832b47c0');

        self::assertSame(407, $apiProblem->getStatus());
        self::assertSame([], $apiProblem->getHeaders());
        self::assertSame('https://tools.ietf.org/html/rfc2616#section-10.4.8', $apiProblem->getType());
        self::assertSame('Proxy Authentication Required', $apiProblem->getTitle());
        self::assertSame('detail', $apiProblem->getDetail());
        self::assertSame('/cccdfd0f-0da3-4070-8e55-61bd832b47c0', $apiProblem->getInstance());
    }
}
