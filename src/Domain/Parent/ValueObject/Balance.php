<?php


namespace App\Domain\Parent\ValueObject;


final class Balance
{

	private function __construct(
		private readonly int $point,
		private readonly Period $period,
	) {}



}