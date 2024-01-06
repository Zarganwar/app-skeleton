<?php

use App\Application\Command\Uuid\GetNewUuidCommand;
use App\Application\Command\Uuid\GetNewUuidCommandHandler;
use App\Application\CommandBus;
use App\Infrastructure\Domain\Logger\Model\FileLogger;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Log\LoggerInterface;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidFactoryInterface;
use Slim\Psr7\Factory\ResponseFactory;

return [
	LoggerInterface::class => fn(ContainerInterface $container) => new FileLogger(__DIR__ . '/../var/log'),
	ResponseFactoryInterface::class => fn(ContainerInterface $container) => $container->get(ResponseFactory::class),
	CommandBus::class => function (ContainerInterface $container): CommandBus
	{
		$bus = new CommandBus();
		$bus->registerHandler(GetNewUuidCommand::class, $container->get(GetNewUuidCommandHandler::class));

		return $bus;
	},
	UuidFactoryInterface::class => fn(ContainerInterface $container) => new UuidFactory(),
];