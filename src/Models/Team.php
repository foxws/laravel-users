<?php

namespace Foxws\Users\Models;

use Foxws\Users\Concerns\HasUserId;
use Foxws\Users\Concerns\HasUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use HasUserId;
    use HasUsers;
    use SoftDeletes;

    /**
     * @var array<int, string>
     */
    protected $guarded = [];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
