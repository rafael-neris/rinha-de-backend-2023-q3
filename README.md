# Swoole & Hyperf na Rinha de Back-end

Repositório do projeto back-end da equipe OpenCodeCo.

> O *upstream* com a participação deste projeto está na branch `main`.

PR da participação: [github.com/zanfranceschi/rinha-de-backend-2023-q3/pull/79](https://github.com/zanfranceschi/rinha-de-backend-2023-q3/pull/79).

## Contribuindo

### Primeiros passos

#### Copiar o arquivo de variávies de ambiente
```shell
cp .env.example .env
```

#### Subir a aplicação
```shell
docker compose up
```

#### Instalar dependências
```shell
docker compose exec app composer install
```

#### Executar os testes
```shell
docker compose exec app composer test
```
