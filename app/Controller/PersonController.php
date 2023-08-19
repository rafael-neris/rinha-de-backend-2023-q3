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

use App\Job\PersonJob;
use App\Model\Person;
use App\Request\PersonRequest;
use Hyperf\AsyncQueue\Driver\DriverFactory;
use Hyperf\AsyncQueue\Driver\DriverInterface;
use Hyperf\Database\Model\Builder;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Redis\Redis;
use Psr\Http\Message\ResponseInterface as MessageResponseInterface;

final class PersonController
{
    private DriverInterface $driver;

    public function __construct(
        private Redis $redis,
        DriverFactory $driverFactory
    ) {
        $this->driver = $driverFactory->get('default');
    }

    /**
     * @throws \Throwable
     */
    public function create(PersonRequest $request, ResponseInterface $response): MessageResponseInterface
    {
        $person = $request->toPerson();

        if ($this->redis->get($person['nick'])) {
            return $response->json(['message' => 'Esse apelido já existe'])->withStatus(422);
        }

        $this->driver->push(new PersonJob($person));

        $this->redis->set($person['nick'], '.');
        $this->redis->set($person['id'], json_encode($person));

        return $response->json($person)->withStatus(201);
    }

    public function show(RequestInterface $request, ResponseInterface $response, string $id): MessageResponseInterface
    {
        $cached = $this->redis->get($id);
        if ($cached) {

            $person = json_decode($cached);

            return $response->json($person);
        }
        $response->raw('Not found')->withStatus(404);
    }

    public function search(RequestInterface $request, ResponseInterface $response): MessageResponseInterface
    {
        $term = $request->getQueryParams()['t'] ?? null;
        if ($term) {
            $list = Person::whereRaw('searchable like ?', [strtolower("%{$term}%")])->limit(50)->get();

            return $response->json($list);
        }

        return $response->json(['message' => 'Precisa de um termo na busca'])->withStatus(400);
    }

    public function count(RequestInterface $request, ResponseInterface $response): MessageResponseInterface
    {
        $count = Person::count();
        return $response->json(['count' => $count]);
    }
}
