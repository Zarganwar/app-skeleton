<?php


namespace App\UI\Http\Controllers;


use App\Application\Command\Uuid\GetNewUuidCommand;
use App\Application\CommandBus;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class UuidController implements RequestHandlerInterface
{

	public function __construct(
		private readonly ResponseFactoryInterface $responseFactory,
		private readonly CommandBus $commandBus,
	) {}


	public function handle(ServerRequestInterface $request): ResponseInterface
	{
		$uuid = $this->commandBus->handle(new GetNewUuidCommand());

		$response = $this->responseFactory->createResponse(200);
		$response->getBody()->write((string) $uuid);

		return $response;
	}

}