<?php


namespace App\Domain\Parent;


interface ChildQueryBuilder
{

	public function withId(string $id): self;


	public function withName(string $name): self;

}