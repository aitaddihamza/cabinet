<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('exclude_weekends', function ($attribute, $value, $parameters, $validator) {
            // Check if the date falls on a weekend (Saturday or Sunday)
            $date = \Carbon\Carbon::parse($value);

            return !($date->isSaturday() || $date->isSunday());
        });

        Validator::replacer('exclude_weekends', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must not fall on a weekend.');
        });
    }
}
