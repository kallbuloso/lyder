<?php

namespace App\Providers\Blade;

use Illuminate\Support\Facades\Blade;
use Form;

class DirectivesRepository
{
    /**
     * Register the directives.
     *
     * @param  array $directives
     * @return void
     */
    public static function register(array $directives)
    {
        collect($directives)->each(function ($item, $key) {
            Blade::directive($key, $item);
        });
    }

    /**
     * Parse expression.
     *
     * @param  string $expression
     * @return \Illuminate\Support\Collection
     */
    public static function parseMultipleArgs($expression)
    {
        return collect(explode(',', $expression))->map(function ($item) {
            return trim($item);
        });
    }

    /**
     * Strip single quotes.
     *
     * @param  string $expression
     * @return string
     */
    public static function stripQuotes($expression)
    {
        return str_replace("'", '', $expression);
    }

    /**
     * Path view Form.
     *
     * @param  string $expression
     * @return string
     */
    public static function viewPathForm($expression)
    {
        $view = 'components.form.';
        return $view . str_replace("'", '', $expression);
    }

    /**
     * Strip single spaces.
     * 
     * @param  string $expression
     * @return string
     */
    public static function stripSpaces($expression)
    {
    	return str_replace(' ', '', $expression);
    }
}