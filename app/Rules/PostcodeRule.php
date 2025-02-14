<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PostcodeRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^(GIR ?0AA|[A-PR-UWYZ][A-HK-Y]?[0-9][0-9A-HJKS-UW]?[ ]?[0-9][ABD-HJLNP-UW-Z]{2})$/i', $value)) {
            $fail('The :attribute must be a valid UK postcode.');
        }        
    }
}
