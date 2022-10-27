<?php

namespace Foxws\Users\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Userable extends MorphPivot
{
    protected $casts = [
        'options' => AsArrayObject::class,
    ];
}
