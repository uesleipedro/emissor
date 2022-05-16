<?php

require __DIR__ . '/../../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use Slim\Factory\AppFactory;
use App\Model\Dfe;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Hello world!");
  return $response;
});

$app->group('/nfe', function (RouteCollectorProxy $group) {

  $group->get('', function (Request $request, Response $response) {
    $response->getBody()->write(json_encode(Dfe::emitir()));
    return $response;
  });
});

$app->run();
