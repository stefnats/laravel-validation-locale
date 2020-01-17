<?php

/*
 * This file is part of https://github.com/stefnats/laravel-validation-locale
 *
 *  (c) Stefan Neuhaus <stefan@n.euha.us>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 */

namespace Stefnats\Locale;

use DateTimeZone;
use Illuminate\Contracts\Validation\Rule;
use ResourceBundle;

class Locale implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
//        dd(ResourceBundle::getLocales(''));
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, ResourceBundle::getLocales(''));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The locale does not exist.';
    }
}
