<?php

namespace Foxws\Users;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UsersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-users')
            ->hasConfigFile('users')
            ->hasMigrations([
                'create_users_table',
                'create_teams_table',
            ]);
    }
}
