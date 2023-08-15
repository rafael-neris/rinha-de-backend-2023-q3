<?php

declare(strict_types=1);
/**
 * This file is part of OpenCodeCo.
 *
 * @link     https://github.com/opencodeco/rinha-de-backend-2023-q3
 * @document https://github.com/opencodeco/rinha-de-backend-2023-q3/wiki
 * @contact  https://github.com/opencodeco/rinha-de-backend-2023-q3/discussions
 * @license  https://github.com/opencodeco/rinha-de-backend-2023-q3/blob/dev/LICENSE
 */

namespace Test\Cases;

use Hyperf\HttpMessage\Server\Response;
use Test\HttpTestCase;

use function PHPUnit\Framework\assertSame;

/**
 * @internal
 * @coversNothing
 */
final class CreatePeopleTest extends HttpTestCase
{
    public function testCreatePeopleWithEmptyNickname(): void
    {
        /** @var Response $response */
        $response = $this->request('post', '/pessoas', [
            'json' => [
                'apelido' => '',
                'nome' => 'OpenCodeCo',
                'nascimento' => '2023-07-01',
            ],
        ]);

        assertSame(422, $response->getStatusCode());
    }

    public function testCreatePeopleWithNullNickname(): void
    {
        /** @var Response $response */
        $response = $this->request('post', '/pessoas', [
            'json' => [
                'apelido' => null,
                'nome' => 'OpenCodeCo',
                'nascimento' => '2023-07-01',
            ],
        ]);

        assertSame(422, $response->getStatusCode());
    }

    public function testCreatePeopleWithEmptyName(): void
    {
        /** @var Response $response */
        $response = $this->request('post', '/pessoas', [
            'json' => [
                'apelido' => 'opencodeco',
                'nome' => '',
                'nascimento' => '2023-07-01',
            ],
        ]);

        assertSame(422, $response->getStatusCode());
    }

    public function testCreatePeopleWithNullName(): void
    {
        /** @var Response $response */
        $response = $this->request('post', '/pessoas', [
            'json' => [
                'apelido' => 'opencodeco',
                'nome' => null,
                'nascimento' => '2023-07-01',
            ],
        ]);

        assertSame(422, $response->getStatusCode());
    }

    public function testCreatePeopleWithEmptyBirthDate(): void
    {
        /** @var Response $response */
        $response = $this->request('post', '/pessoas', [
            'json' => [
                'apelido' => 'opencodeco',
                'nome' => 'OpenCodeCo',
                'nascimento' => '',
            ],
        ]);

        assertSame(422, $response->getStatusCode());
    }

    public function testCreatePeopleWithNullBirthDate(): void
    {
        /** @var Response $response */
        $response = $this->request('post', '/pessoas', [
            'json' => [
                'apelido' => 'opencodeco',
                'nome' => 'OpenCodeCo',
                'nascimento' => null,
            ],
        ]);

        assertSame(422, $response->getStatusCode());
    }
}
