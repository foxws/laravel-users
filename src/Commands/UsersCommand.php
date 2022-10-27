<?php

namespace Foxws\Users\Commands;

use Illuminate\Console\Command;

class UsersCommand extends Command
{
    public $signature = 'laravel-users';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
