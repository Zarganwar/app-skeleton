<?php


namespace App\Domain\Parent\ValueObject;


use App\Domain\Parent\Exception\InvalidArgumentException;
use Stringable;

final class Name implements Stringable
{

	public function __construct(
		private readonly string $name
	)
	{
		if (empty($name)) {
			throw new InvalidArgumentException('Name cannot be empty');
		}
	}


	public static function create(string $name): self
	{
		return new self($name);
	}


	public function getName(): string
	{
		return $this->name;
	}


	public function __toString(): string
	{
		return $this->name;
	}

}