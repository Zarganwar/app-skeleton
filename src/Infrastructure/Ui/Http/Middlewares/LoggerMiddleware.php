<?php

namespace App\Infrastructure\Ui\Http\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;
use Throwable;

class LoggerMiddleware implements MiddlewareInterface
{

	public function __construct(private readonly LoggerInterface $logger) {}


	/**
	 * Process an incoming server request and it logs request/response.
	 */
	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		try {
			$response = $handler->handle($request);

			$this->logger->debug('Request/Response', [
				'request' => $this->getParsedRequest($request),
				'response' => $this->getParsedResponse($response)
			]);

		} catch (Throwable $e) {
			$this->logger->error('Request', [
				'request' => $this->getParsedRequest($request),
				'error' => $e->getMessage(),
				'exception' => $e
			]);

			throw $e;
		}

		return $response;
	}


	private function getParsedRequest(ServerRequestInterface $request): array
	{
		return [
			'method' => $request->getMethod(),
			'request_target' => $request->getRequestTarget(),
			'uri' => (string) $request->getUri(),
			'protocol_version' => $request->getProtocolVersion(),
			'headers' => $request->getHeaders(),
			'body' => (string) $request->getBody(),
		];
	}


	private function getParsedResponse(ResponseInterface $response): array
	{
		return [
			'status_code' => $response->getStatusCode(),
			'reason_phrase' => $response->getReasonPhrase(),
			'protocol_version' => $response->getProtocolVersion(),
			'headers' => $response->getHeaders(),
			'body' => (string) $response->getBody(),
		];
	}

}
