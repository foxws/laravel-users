<?php

namespace Foxws\Users\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasTeams
{
    public function teams(): MorphMany
    {
        return $this->morphMany(
            config('users.team_model'),
            'model'
        );
    }
}
