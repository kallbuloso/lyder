<?php

use App\Providers\Blade\DirectivesRepository;
use App\Providers\FormGroupServiceProvider;
use Illuminate\Support\ServiceProvider;
use Psy\Util\Str;
/** https://github.com/googleshokry/laravel-blade-directives */
return [

    /*
    |---------------------------------------------------------------------
    | @truncate
    |---------------------------------------------------------------------
    */
    'truncate' => function ($expression) {
        list($string, $length) = explode(',',str_replace(['(',')',' '], '', $expression));

        $trunc = "<?php echo e(strlen({$string}) > {$length} ? substr({$string},0,{$length}).'...' : {$string}); ?>";
        return $trunc;
    },


    /*
    |---------------------------------------------------------------------
    | @istrue / @isfalse
    |---------------------------------------------------------------------
    */

    'istrue' => function ($expression) {
        if (str_contains($expression, ',')) {
            $expression = DirectivesRepository::parseMultipleArgs($expression);

            return  "<?php if (isset({$expression->get(0)}) && (bool) {$expression->get(0)} === true) : ?>".
                    "<?php echo {$expression->get(1)}; ?>".
                    '<?php endif; ?>';
        }

        return "<?php if (isset({$expression}) && (bool) {$expression} === true) : ?>";
    },

    'endistrue' => function ($expression) {
        return '<?php endif; ?>';
    },

    'isfalse' => function ($expression) {
        if (str_contains($expression, ',')) {
            $expression = DirectivesRepository::parseMultipleArgs($expression);

            return  "<?php if (isset({$expression->get(0)}) && (bool) {$expression->get(0)} === false) : ?>".
                    "<?php echo {$expression->get(1)}; ?>".
                    '<?php endif; ?>';
        }

        return "<?php if (isset({$expression}) && (bool) {$expression} === false) : ?>";
    },

    'endisfalse' => function ($expression) {
        return '<?php endif; ?>';
    },

    /*
    |---------------------------------------------------------------------
    | @isnull / @isnotnull
    |---------------------------------------------------------------------
    */

    'isnull' => function ($expression) {
        return "<?php if (is_null({$expression})) : ?>";
    },

    'endisnull' => function ($expression) {
        return '<?php endif; ?>';
    },

    'isnotnull' => function ($expression) {
        return "<?php if (! is_null({$expression})) : ?>";
    },

    'endisnotnull' => function ($expression) {
        return '<?php endif; ?>';
    },

    /*
    |---------------------------------------------------------------------
    | @mix
    |---------------------------------------------------------------------
    */

    'mix' => function ($expression)
    {
        if (ends_with($expression, ".css'")) {
            return '<link rel="stylesheet" href="<?php echo mix('.$expression.') ?>">';
        }

        if (ends_with($expression, ".js'")) {
            return '<script src="<?php echo mix('.$expression.') ?>"></script>';
        }

        return "<?php echo mix({$expression}); ?>";
    },

    /*
    |---------------------------------------------------------------------
    | @style
    |---------------------------------------------------------------------
    */

    'style' => function ($expression) {
        if (! empty($expression)) {
            return '<link rel="stylesheet" href="{{ asset('.$expression.') }}">';
        }

        return '<style>';
    },

    'endstyle' => function () {
        return '</style>';
    },

    /*
    |---------------------------------------------------------------------
    | @script
    |---------------------------------------------------------------------
    */

    'script' => function ($expression) {
        if (! empty($expression)) {
            return '<script src="{{ asset('.$expression.') }}"></script>';
        }

        return '<script>';
    },

    'endscript' => function () {
        return '</script>';
    },

    /*
    |---------------------------------------------------------------------
    | @js
    |---------------------------------------------------------------------
    */

    'js' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        $variable = DirectivesRepository::stripQuotes($expression->get(0));

        return  "<script>\n".
                "window.{$variable} = <?php echo is_array({$expression->get(1)}) ? json_encode({$expression->get(1)}) : '\''.{$expression->get(1)}.'\''; ?>;\n".
                '</script>';
    },

    /*
    |---------------------------------------------------------------------
    | @inline
    |---------------------------------------------------------------------
    */

    'inline' => function ($expression) {
        $include = "//  {$expression}\n".
            "<?php include public_path({$expression}) ?>\n";

        if (ends_with($expression, ".html'")) {
            return $include;
        }

        if (ends_with($expression, ".css'")) {
            return "<style>\n".$include.'</style>';
        }

        if (ends_with($expression, ".js'")) {
            return "<script>\n".$include.'</script>';
        }
    },

    /*
    |---------------------------------------------------------------------
    | @routeis
    |---------------------------------------------------------------------
    */

    'routeis' => function ($expression) {
        return "<?php if (fnmatch({$expression}, Route::currentRouteName())) : ?>";
    },

    'endrouteis' => function ($expression) {
        return '<?php endif; ?>';
    },

    'routeisnot' => function ($expression) {
        return "<?php if (! fnmatch({$expression}, Route::currentRouteName())) : ?>";
    },

    'endrouteisnot' => function ($expression) {
        return '<?php endif; ?>';
    },

    /*
    |---------------------------------------------------------------------
    | @instanceof
    |---------------------------------------------------------------------
    */

    'instanceof' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return  "<?php if ({$expression->get(0)} instanceof {$expression->get(1)}) : ?>";
    },

    'endinstanceof' => function () {
        return '<?php endif; ?>';
    },

    /*
    |---------------------------------------------------------------------
    | @typeof
    |---------------------------------------------------------------------
    */

    'typeof' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return  "<?php if (gettype({$expression->get(0)}) == {$expression->get(1)}) : ?>";
    },

    'endtypeof' => function () {
        return '<?php endif; ?>';
    },

    /*
    |---------------------------------------------------------------------
    | @dump, @dd
    |---------------------------------------------------------------------
    */

    'dump' => function ($expression) {
        return "<?php dump({$expression}); ?>";
    },

    'dd' => function ($expression) {
        return "<?php dd({$expression}); ?>";
    },

    /*
    |---------------------------------------------------------------------
    | @pushonce
    |---------------------------------------------------------------------
    */

    'pushonce' => function ($expression) {
        list($pushName, $pushSub) = explode(':', trim(substr($expression, 1, -1)));

        $key = '__pushonce_'.str_replace('-', '_', $pushName).'_'.str_replace('-', '_', $pushSub);

        return "<?php if(! isset(\$__env->{$key})): \$__env->{$key} = 1; \$__env->startPush('{$pushName}'); ?>";
    },

    'endpushonce' => function () {
        return '<?php $__env->stopPush(); endif; ?>';
    },

    /*
    |---------------------------------------------------------------------
    | @repeat
    |---------------------------------------------------------------------
    */

    'repeat' => function ($expression) {
        return "<?php for (\$iteration = 0 ; \$iteration < (int) {$expression}; \$iteration++): ?>";
    },

    'endrepeat' => function ($expression) {
        return '<?php endfor; ?>';
    },

    /*
    |---------------------------------------------------------------------
    | @data
    |---------------------------------------------------------------------
    */

    'data' => function ($expression) {
        $output = 'collect((array) '.$expression.')
            ->map(function($value, $key) {
                return "data-{$key}=\"{$value}\"";
            })
            ->implode(" ")';

        return "<?php echo $output; ?>";
    },

    /*
    |---------------------------------------------------------------------
    | @iconsi, @iconfa, @iconfas, @iconfar, @iconfal, @iconfab, @iconmdi, @iconglyph
    |---------------------------------------------------------------------
    */

    'iconsi' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return '<i class="si si-'.DirectivesRepository::stripQuotes($expression->get(0)).' '.DirectivesRepository::stripQuotes($expression->get(1)).'"></i>';
    },

    'iconfa' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return '<i class="fa fa-'.DirectivesRepository::stripQuotes($expression->get(0)).' '.DirectivesRepository::stripQuotes($expression->get(1)).'"></i>';
    },

    'iconfas' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return '<i class="fas fa-'.DirectivesRepository::stripQuotes($expression->get(0)).' '.DirectivesRepository::stripQuotes($expression->get(1)).'"></i>';
    },

    'iconfar' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return '<i class="far fa-'.DirectivesRepository::stripQuotes($expression->get(0)).' '.DirectivesRepository::stripQuotes($expression->get(1)).'"></i>';
    },

    'iconfal' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return '<i class="fal fa-'.DirectivesRepository::stripQuotes($expression->get(0)).' '.DirectivesRepository::stripQuotes($expression->get(1)).'"></i>';
    },

    'iconfab' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return '<i class="fab fa-'.DirectivesRepository::stripQuotes($expression->get(0)).' '.DirectivesRepository::stripQuotes($expression->get(1)).'"></i>';
    },

    'iconmdi' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return '<i class="mdi mdi-'.DirectivesRepository::stripQuotes($expression->get(0)).' '.DirectivesRepository::stripQuotes($expression->get(1)).'"></i>';
    },

    'iconglyph' => function ($expression) {
        $expression = DirectivesRepository::parseMultipleArgs($expression);

        return '<i class="glyphicons glyphicons-'.DirectivesRepository::stripQuotes($expression->get(0)).' '.DirectivesRepository::stripQuotes($expression->get(1)).'"></i>';
    },

    /*
    |---------------------------------------------------------------------
    | @haserror
    |---------------------------------------------------------------------
    */

    'haserror' => function ($expression) {
        return '<?php if (isset($errors) && $errors->has('.$expression.')): ?>';
    },

    'endhaserror' => function () {
        return '<?php endif; ?>';
    },

    /*
    |-----------------------------------------------------------------------
    | Format date
    | @formatdate('2018-05-28','d/m/Y')
    |-----------------------------------------------------------------------
    */
    'formatDate' => function ($expression)
    {
        list($date, $format) = explode(',', $expression);
        return '<?php echo date_format(date_create($date), $format); ?>';
    },

    /*
    |-----------------------------------------------------------------------
    | FormOpen
    | @formopen([Attributes])
    |-----------------------------------------------------------------------
    */
    'formOpen' => function ($expression)
    {
        return '{!! Form::open(['.$expression.']) !!}';
    },

    /*
    |-----------------------------------------------------------------------
    | FormClose
    | @formopen([Attributes])
    |-----------------------------------------------------------------------
    */
    'formClose' => function ()
    {
        return '{!! Form::close() !!}';
    },

    /** k.select
     * @select([
     *  'col' => '',
     *  'label' => '',
     *  'name' => '',
     *  'arrayOptions' => [],
     *  'value' => '',
     *  'attributes' => []
     * ])
     */
    'select' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('select', {$expression}, {$errors}) !!}";
    },

    'selectMonth' => function ($expression) 
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('selectMonth', {$expression}, {$errors}) !!}";
    },

    'selectRange' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('selectRange', {$expression}, {$errors}) !!}";
    },

    'selectYear' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('selectYear', {$expression}, {$errors}) !!}";
    },

    'search' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('search', {$expression}, {$errors}) !!}";
    },

    'range' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('range', {$expression}, {$errors}) !!}";
    },

    'text' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('text', {$expression}, {$errors}) !!}";
    },

    'password' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('password', {$expression}, {$errors}) !!}";
    },

    /** k.textArea
     * @textarea([
     *  'col' => '',
     *  'label' => '',
     *  'name' => '',
     *  'value' => '',
     *  'attributes' => []
     * ])
     */
    'textArea' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('textarea', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | Email
    | @email('4', 'Novo email3', 'email2', , ['placeholder' => 'Seu email'])
    |-----------------------------------------------------------------------
    */
    'email' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('email', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | Tel
    | @tel('4', 'Novo tel', 'tel', , ['placeholder' => 'Seu tel'])
    |-----------------------------------------------------------------------
    */
    'tel' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('tel', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | Number
    | @number('4', 'Título do number', 'number', , ['placeholder' => 'Seu number'])
    |-----------------------------------------------------------------------
    */
    'number' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('number', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | date
    | @date('4', 'Título do date', 'date', , ['placeholder' => 'Seu date'])
    |-----------------------------------------------------------------------
    */
    'dateTimePicker' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('date', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | datetime
    | @datetime('4', 'Título do datetime', 'datetime', , ['placeholder' => 'Seu datetime'])
    |-----------------------------------------------------------------------
    */
    'datetime' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('datetime', {$expression}, {$errors}) !!}";
    },
    // TODO: Resolver DateTime

    /*
    |-----------------------------------------------------------------------
    | datetime-local
    | @datetime('4', 'Título do datetime', 'datetime', , ['placeholder' => 'Seu datetime'])
    |-----------------------------------------------------------------------
    */
    'datetimeLocal' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('datetime-local', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | time
    | @time('4', 'Título do time', 'time', , ['placeholder' => 'Seu time'])
    |-----------------------------------------------------------------------
    */
    'time' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('time', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | url
    | @url('4', 'Título do url', 'url', , ['placeholder' => 'Seu url'])
    |-----------------------------------------------------------------------
    */
    'url' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('url', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | week
    | @week('4', 'Título do week', 'week', , ['placeholder' => 'Seu week'])
    |-----------------------------------------------------------------------
    */
    'week' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('week', {$expression}, {$errors}) !!}";
    },

    /*
    |-----------------------------------------------------------------------
    | file
    | @file('4', 'Título do file', 'file', ['placeholder' => 'Seu file'])
    |-----------------------------------------------------------------------
    */
    'file' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('file', {$expression}, {$errors}) !!}";
    },

    'checkbox' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::elementGroup('checkbox', {$expression}, {$errors}) !!}";
    },

    'radio' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::elementGroup('radio', {$expression}, {$errors}) !!}";
    },

    'reset' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::elementGroup('reset', {$expression}, {$errors}) !!}";
    },

    'image' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::elementGroup('image', {$expression}, {$errors}) !!}";
    },
    
    'hidden' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::inputGroup('hidden', {$expression}, {$errors}) !!}";
    },
    
    'color' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::elementGroup('color', {$expression}, {$errors}) !!}";
    },

    'submit' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::elementGroup('submit', {$expression}, {$errors}) !!}";
    },

    'button' => function ($expression)
    {
        $errors = '$errors';
        return "{!! Form::elementGroup('button', {$expression}, {$errors}) !!}";
    },

];
