<?php

namespace Foxws\Users\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Foxws\Users\Users
 */
class Users extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Foxws\Users\Users::class;
    }
}
