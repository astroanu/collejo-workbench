<?php

namespace App\Tests;

use Illuminate\Foundation\Testing\TestCase as IlluminateTestCase;
use Collejo\Core\Contracts\Console\Kernel;
use Collejo\Core\Contracts\Http\Kernel as Http;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;

abstract class TestCase extends IlluminateTestCase
{
    use DatabaseMigrations;
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        $kernel = $this->app->make(Http::class);

        $this->currentUri = $this->prepareUrlForRequest($uri);

        $this->resetPageContext();

        $request = Request::create(
            $this->currentUri, $method, $parameters,
            $cookies, $files, array_replace($this->serverVariables, $server), $content
        );

        $response = $kernel->handle($request);

        $kernel->terminate($request, $response);

        return $this->response = $response;
    }

    public function artisan($command, $parameters = [])
    {
        return $this->code = $this->app[Kernel::class]->call($command, $parameters);
    }       
}
