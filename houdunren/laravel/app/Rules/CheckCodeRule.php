<?php

namespace App\Rules;

use Cache;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckCodeRule implements DataAwareRule, ValidationRule
{
    public function __construct(public string $field = 'name') {}
    /**
     * 所有数据都在验证中
     *
     * @var array<string, mixed>
     */
    protected $data = [];

    // ...

    /**
     * 设置验证数据
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //send_eamiale:'efef
        if ($value != Cache::get(config('hd.code_prefix') . $this->data[$this->field])) {
            $fail('验证码错误');
        }
    }
}
