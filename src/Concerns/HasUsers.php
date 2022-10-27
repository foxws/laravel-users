<?php

namespace Foxws\Users\Concerns;

use ArrayAccess;
use Foxws\Users\Models\User;
use Foxws\Users\Models\Userable;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;

trait HasUsers
{
    public static function getUserClassName(): string
    {
        return config('users.user_model', User::class);
    }

    public function users(): MorphToMany
    {
        return $this->morphToMany(static::getUserClassName(), 'userable')
            ->using(Userable::class)
            ->withPivot('options');
    }

    public function attachUser(User $model, ?array $options = null): static
    {
        return $this->attachUsers([$model], $options);
    }

    public function attachUsers(array | ArrayAccess | User $users, ?array $options = null): static
    {
        $users = static::convertToUsers($users);

        $this->users()->syncWithPivotValues(
            ids: $users->pluck('id')->toArray(),
            values: ['options' => $options],
            detaching: false
        );

        return $this;
    }

    public function detachUser(User $user): static
    {
        return $this->detachUsers([$user]);
    }

    public function detachUsers(array | ArrayAccess $users): static
    {
        $users = static::convertToUsers($users);

        collect($users)
            ->filter()
            ->each(fn (User $user) => $this->users()->detach($user));

        return $this;
    }

    protected static function convertToUsers(array | ArrayAccess | User $values): Collection
    {
        if ($values instanceof User) {
            $values = [$values];
        }

        return collect($values)->map(function ($value) {
            if ($value instanceof User) {
                return $value;
            }

            $className = static::getUserClassName();

            return $className::find($value);
        });
    }
}
