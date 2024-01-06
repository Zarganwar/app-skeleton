<?php


namespace App\Infrastructure\Domain\Logger\Model;


use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Stringable;
use function date;
use function file_put_contents;
use function json_encode;
use function sprintf;

final class FileLogger implements LoggerInterface
{

	use LoggerTrait;

	public function __construct(
		private readonly string $logPath,
	) {}


	public function log($level, Stringable|string $message, array $context = []): void
	{
		$log = sprintf(
			'[%s] %s: %s %s',
			date('Y-m-d H:i:s'),
			$level,
			$message,
			!empty($context) ? json_encode($context) : ''
		);

		$filename = "{$this->logPath}/{$level}.log";

		file_put_contents($filename, $log . PHP_EOL, FILE_APPEND);
	}

}