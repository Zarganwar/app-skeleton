<?php


namespace App\Domain\Parent\ValueObject;


final class DateTime
{

	private function __construct(
		private readonly \DateTimeImmutable $value,
	) {}


	public static function create(): self
	{
		return new self(new \DateTimeImmutable());
	}


	public function value(): \DateTimeImmutable
	{
		return $this->value;
	}

}