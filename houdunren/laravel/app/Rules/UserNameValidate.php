<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UserNameValidate implements ValidationRule
{
    public function __construct(protected $fields = ['email', 'mobile', 'name']) {}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::whereAny($this->fields, $value)->first();
        if (!$user) {
            $fail('帐号不存在');
        }
    }
}
