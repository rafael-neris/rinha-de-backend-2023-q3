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

namespace App\Controller;

use App\Request\PeopleRequest;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as MessageResponseInterface;

final class PeopleController
{
    public function create(PeopleRequest $request, ResponseInterface $response): MessageResponseInterface
    {
        $person = $request->validated();

        return $response->json($person)->withStatus(201);
    }

    public function show(RequestInterface $request, ResponseInterface $response): MessageResponseInterface
    {
        return $response->raw('Hello Hyperf!');
    }

    public function search(RequestInterface $request, ResponseInterface $response): MessageResponseInterface
    {
        return $response->raw('Hello Hyperf!');
    }

    public function count(RequestInterface $request, ResponseInterface $response): MessageResponseInterface
    {
        return $response->raw('Hello Hyperf!');
    }
}
