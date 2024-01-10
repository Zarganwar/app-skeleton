<?php


namespace App\Domain\Parent\ValueObject;


use App\Domain\Parent\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid;

final class Uid
{

	public function __construct(
		private readonly string $value,
	)
	{
		if (Uuid::isValid($value)) {
			throw new InvalidArgumentException('Invalid Uuid value provided for Uid value object');
		}
	}


	public static function create(): self
	{
		return new self(Uuid::uuid4());
	}


	public function value(): string
	{
		return $this->value;
	}


	public function __toString(): string
	{
		return $this->value;
	}

}