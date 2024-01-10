<?php

namespace App\Domain\Parent;

interface ChildRepository
{

	public function save(Child $child): void;


	public function get(string $id): Child;


	/**
	 * @return iterable<Child>
	 */
	public function all(): iterable;


	public function remove(string $id): void;


	public function createChildQueryBuilder(): ChildQueryBuilder;
}