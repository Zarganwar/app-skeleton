<?php


namespace App\Domain\Parent;


use App\Domain\Parent\Entity\Point;
use App\Domain\Parent\ValueObject\Name;
use App\Domain\Parent\ValueObject\Period;
use App\Domain\Parent\ValueObject\Uid;
use JsonSerializable;
use Ramsey\Uuid\Uuid;

final class Child implements JsonSerializable
{

	public function __construct(
		private readonly Uid $id,
		private readonly Name $name,
	) {}


	public static function create(string $name) : self
	{
		return new self(Uid::create(), Name::create($name));
	}


	public function addPoint(Point $point): void
	{

	}


	public function getPointBalance(Period $period): int
	{
		return ;
	}


	public function jsonSerialize(): array
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
		];
	}

}