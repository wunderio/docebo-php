# Docebo API PHP client

## Installation

Define an additional repository in your composer.json:

```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/wunderio/docebo-php"
    }
]
```

```sh
composer require wunder/docebo-php
```

## API documentation

Documentation for the API version this is based on is not yet publicly available.

## Usage

Before calling any API that requires an authenticated user, an authentication token
has to be obtained by calling the `oauth2/token` endpoint. The received token is valid
for the duration indicated in the response and should be stored an used for all
subsequent calls until then.

### Scenario 1: Token is not available

Provide a base url, client id, client secret, user name and a password 
to `Docebo` constructor. An authentication attempt is done automatically. On success, 
a new `Docebo` instance is returned. An exception is thrown on failure. The response 
content is included in the exception message.

```php
use Docebo\Docebo;

try {
  $docebo = new Docebo('base_url', 'client_id', 'client_secret', 'username', 'password');
} catch (Exception $e) {
  echo $e->getMessage();
}
```

### Scenario 2: Token is available

After successful authentication the token can be retrieved by calling
`getToken()`. The token validity perion can be retrieven by calling `getTokenExpiration()`
and new one should be acquired only after the current one is not valid anymore. 
Store the token somewhere safe and use it when constructing a new `Docebo` 
instance to avoid unnecessary authentication calls.

```php
use Docebo\Docebo;

$token = get_token_from_your_token_storage();

if (isset($token)) {
  $docebo = new Docebo('base_url', NULL, NULL, NULL, NULL, $token);
}
```

### After successful instantiation

After successfully constructing a new `Docebo` instance, one can call
functions on it. All functions return an instance of
`Symfony\Component\HttpFoundation\JsonResponse`.

```php
/** @var $response Symfony\Component\HttpFoundation\JsonResponse */
$json_response = $docebo->listCourses();

$response_content = $response->getContent();

echo $response_content;
```
