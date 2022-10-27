<?php

namespace Foxws\Users\Concerns;

use Illuminate\Database\Eloquent\Model;

trait HasUserId
{
    public static function bootHasUserId()
    {
        static::creating(function (Model $model) {
            if (empty($model->user_id)) {
                $model->user_id = auth()->user()?->getKey();
            }
        });
    }
}
