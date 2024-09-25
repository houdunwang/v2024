<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Hash;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class CheckPasswordRule implements ValidationRule
{
    public function __construct(protected User|null $user = null)
    {
        $this->user = $user ?? Auth::user();
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Hash::check($value, $this->user->password)) {
            $fail('密码输入错误');
        }
    }
}
