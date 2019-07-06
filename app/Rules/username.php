<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class username implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return  1==preg_match('/^[A-Za-z]{1}[A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/',$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The username should be alphanumeric only.';
    }
}
