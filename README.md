## Slackin
Pacote invite Slack

## Instalação

Adicione no seu composer.json

```js
  "require": {
    "mixdinternet/slackin": "0.1.*"
  }
```

ou

```js
  composer require mixdinternet/slackin
```

## Service Provider

Abra o arquivo `config/app.php` e adicione

`Mixdinternet\Slackin\Providers\SlackinServiceProvider::class`


## Publicando os arquivos necessários

```
$ php artisan vendor:publish --provider="Mixdinternet\Slackin\Providers\SlackinServiceProvider" --tag=install
```

## Adicionar Slack Token no arquivo `.env`

`SLACK_TOKEN=04DXFkUoacNy42yo0qWIrLpSrJzXQkEYnS9BAiRpgsrNT7TjXj`
