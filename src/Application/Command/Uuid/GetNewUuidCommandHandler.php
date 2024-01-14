<?php


namespace App\Application\Command\Uuid;


use App\Application\CommandHandler;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;
use Zarganwar\CommandBus\Command;

final class GetNewUuidCommandHandler extends CommandHandler
{

	public function __construct(private readonly UuidFactoryInterface $factory) {}


	public function handle(Command|GetNewUuidCommand $command): UuidInterface
	{
		return $this->factory->uuid4();
	}

}
