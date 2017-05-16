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


## Configurações

É possivel a troca de algumas configurações em `config/mslackin.php`

```
  php artisan vendor:publish --provider="Mixdinternet\Slackin\Providers\SlackinServiceProvider" --tag="config"`
```
