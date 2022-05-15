<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use Slim\Factory\AppFactory;
use NFePHP\DA\NFe\DanfeSimples;

//require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Hello world!");
  return $response;
});

$app->group('/nfe', function (RouteCollectorProxy $group) {

  $group->get('', function(Request $request, Response $response) {

    $response->getBody()->write("Hello group");
    return $response;
  });

});

$app->run(); 
