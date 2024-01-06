<?php


namespace App\Infrastructure;


use App\Infrastructure\Ui\Http\Handlers\HomepageHandler;
use App\Infrastructure\Ui\Http\Handlers\UuidHandler;
use App\Infrastructure\Ui\Http\Middlewares\CorsMiddleware;
use App\Infrastructure\Ui\Http\Middlewares\LoggerMiddleware;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;

final class Application
{

	private App $app;

	private bool $isProduction;


	public function __construct()
	{
		$this->isProduction = getenv('APPLICATION_ENV') !== 'development';
		$this->app = AppFactory::create(container: $this->createContainer());

		$this->addRoutes();
	}


	public function getApp(): App
	{
		return $this->app;
	}


	public function run(): void
	{
		$this->app->run();
	}


	private function createContainer(): ContainerInterface
	{
		$containerBuilder = new ContainerBuilder();

		if ($this->isProduction) {
			$containerBuilder->enableDefinitionCache();
			$containerBuilder->enableCompilation(__DIR__ . '/../../var/cache');
		}

		$containerBuilder->addDefinitions(__DIR__ . '/../../config/common.php');
		$containerBuilder->addDefinitions(__DIR__ . '/../../config/local.php');

		return $containerBuilder->build();
	}


	private function addRoutes(): void
	{
		$this->app->add(CorsMiddleware::class);

		$this->app->get('/', HomepageHandler::class);
		$this->app->get('/uuid', UuidHandler::class)
			->add(LoggerMiddleware::class)
		;
	}

}