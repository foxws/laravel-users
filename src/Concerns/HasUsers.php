<?php

namespace Foxws\Users\Concerns;

use Foxws\Users\Models\Userable;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasUsers
{
    public function users(): MorphToMany
    {
        return $this->morphToMany(config('users.user_model'), 'userable')
            ->using(Userable::class)
            ->withPivot('options');
    }
}
