<?php


namespace App\Domain\Parent\Entity;


use App\Domain\Parent\ValueObject\DateTime;
use App\Domain\Parent\ValueObject\Uid;

final class Point
{

	private function __construct(
		private readonly Uid $id,
		private readonly int $value,
		private readonly DateTime $createdAt,
	) {}


	public function getId(): Uid
	{
		return $this->id;
	}


	public function getValue(): int
	{
		return $this->value;
	}


	public function getCreatedAt(): DateTime
	{
		return $this->createdAt;
	}

}