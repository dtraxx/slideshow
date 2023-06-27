<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VideoValidationRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }

    public function passes($attribute, $value)
    {
        return $value->getClientMimeType() === 'video/mp4';
    }

    public function message()
    {
        return 'The :attribute must be a valid video file.';
    }
}
