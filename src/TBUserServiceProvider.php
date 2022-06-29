<?php

namespace Thunderbite;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Thunderbite\Commands\TBUserInvite;
use Thunderbite\Commands\TBUserRemove;

class TBUserServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('thunderbite-users')
            ->hasConfigFile()
            ->hasCommand(TBUserInvite::class)
            ->hasCommand(TBUserRemove::class);
    }
}
