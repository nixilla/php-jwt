NOTICE
======

This project is forked from firebase/php-jwt with some small changes:

    1) Namespaced
    2) Added composer.json

To use the library, composer autoloader will take care of include_once, so skip
that step below.

```php
<?php
    use JWT\Authentication\JWT;

    // ...

    $jwt = JWT::encode($token, $key);
    $decoded = JWT::decode($jwt, $key);
?>
```


PHP-JWT
=======
A simple library to encode and decode JSON Web Tokens (JWT) in PHP. Should
conform to the [current spec](http://tools.ietf.org/html/draft-ietf-oauth-json-web-token-06)

Example
-------
```php
<?php
  include_once 'Authentication/JWT.php';

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
    $ pear install PHPUnit
    $ phpunit tests/
    PHPUnit 3.7.10 by Sebastian Bergmann.
    .....
    Time: 0 seconds, Memory: 2.50Mb
    OK (5 tests, 5 assertions)
```

License
-------
[3-Clause BSD](http://opensource.org/licenses/BSD-3-Clause).
