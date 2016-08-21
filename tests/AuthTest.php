<?php

namespace App\Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Collejo\Core\Contracts\Console\Kernel;

class RouteTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testRoutes()
    {
        $this->assertResponseStatus(200, $this->call('GET', route('auth.login')));
    }
}
