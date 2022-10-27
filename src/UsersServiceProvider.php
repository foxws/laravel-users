<?php

namespace Foxws\Users;

use Foxws\Users\Commands\UsersCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UsersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-users')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-users_table')
            ->hasCommand(UsersCommand::class);
    }
}
