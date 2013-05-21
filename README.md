JWT Implementation in PHP
=========================

[![Travis](https://travis-ci.org/nixilla/php-jwt.png)](https://travis-ci.org/nixilla/php-jwt)

```php
<?php
require_once './vendor/autoload.php';

$jwt = JWT::encode($token, $key);
$decoded = JWT::decode($jwt, $key);
?>
```

Installation
============

```json
{
    "require": {
        "nixilla/php-jwt": "dev-master"
    }
}
```

PHP-JWT
=======
A simple library to encode and decode JSON Web Tokens (JWT) in PHP. Should
conform to the [current spec](http://tools.ietf.org/html/draft-ietf-oauth-json-web-token-06)

Example
-------
```php
<?php
require_once './vendor/autoload.php';

$key = "example_key";
$token = array(
    "iss" => "http://example.org",
    "aud" => "http://example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000
);

$jwt = JWT::encode($token, $key);
$decoded = JWT::decode($jwt, $key);

print_r($decoded);
?>
```

Tests
-----
Run the tests using phpunit:

```bash
git clone https://github.com/nixilla/php-jwt.git && \
cd php-jwt && \
mkdir bin && \
curl -sS https://getcomposer.org/installer | php -- --install-dir=bin && \
./bin/composer.phar install --dev && \
./bin/phpunit
```

License
-------
[3-Clause BSD](http://opensource.org/licenses/BSD-3-Clause).
