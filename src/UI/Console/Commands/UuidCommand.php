<?php


namespace App\UI\Console\Commands;


use App\Application\Command\Uuid\GetNewUuidCommand;
use App\Application\CommandBus;

final class UuidCommand
{
	public function __construct(
		private readonly CommandBus $commandBus,
	) {}


	public function execute(): void
	{
		$uuid = $this->commandBus->handle(new GetNewUuidCommand());

		print $uuid;
	}

}