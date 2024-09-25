<?php

namespace App\Rules;

use Cache;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckCodeRule implements ValidationRule
{
    public function __construct(protected $accountField) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Cache::get(config('hd.code_prefix') . request($this->accountField)) != $value) {
            $fail('验证码错误');
        }
    }
}
