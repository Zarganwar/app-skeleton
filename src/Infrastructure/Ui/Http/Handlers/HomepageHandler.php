<?php


namespace App\Infrastructure\Ui\Http\Handlers;


use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class HomepageHandler implements RequestHandlerInterface
{

	public function __construct(
		private readonly ResponseFactoryInterface $responseFactory,
	) {}


	public function handle(ServerRequestInterface $request): ResponseInterface
	{
		$response = $this->responseFactory->createResponse(200);
		$response->getBody()->write('');

		return $response;
	}
}