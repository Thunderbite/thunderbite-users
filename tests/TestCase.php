<?php

namespace Thunderbite\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Thunderbite\TBUserServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            TBUserServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_thunderbite-users_table.php.stub';
        $migration->up();
        */
    }
}
