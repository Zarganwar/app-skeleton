<?php


namespace App\Application\Command\Uuid;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;
use Zarganwar\CommandBus\Command;
use Zarganwar\CommandBus\CommandHandler;

final class GetNewUuidCommandHandler implements CommandHandler
{

	public function __construct(private readonly UuidFactoryInterface $factory) {}


	public function handle(Command|GetNewUuidCommand $command): UuidInterface
	{
		return $this->factory->uuid4();
	}

}
