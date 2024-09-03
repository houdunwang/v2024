<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Middlewares;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LocalizationByModel extends Middleware
{
    public function __construct(
        protected ?string $guard = null,
    ) {}

    protected function detect(Request $request): bool|float|int|string|null
    {
        if ($this->has($user = $this->user($request))) {
            return $user->getAttribute($this->attribute());
        }

        return null;
    }

    protected function has(?Model $user): bool
    {
        return $user && $this->hasAttribute($user);
    }

    protected function user(Request $request): ?Model
    {
        return $request->user($this->guard);
    }

    protected function attribute(): string
    {
        return $this->names()->column;
    }

    protected function hasAttribute(Model $user): bool
    {
        if (method_exists($user, 'hasAttribute')) {
            return $user->hasAttribute($this->attribute());
        }

        return array_key_exists($this->attribute(), $user->getAttributes());
    }
}
