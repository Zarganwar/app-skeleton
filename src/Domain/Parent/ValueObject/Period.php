<?php


namespace App\Domain\Parent\ValueObject;


final class Period
{

	private function __construct(
		private readonly DateTime $start,
		private readonly DateTime $end,
	) {}


	public static function create(DateTime $start, DateTime $end): self
	{
		return new self($start, $end);
	}


	public function getStart(): DateTime
	{
		return $this->start;
	}


	public function getEnd(): DateTime
	{
		return $this->end;
	}

}