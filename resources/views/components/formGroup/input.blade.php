
<div class="col-xs-{{ array_get($params, 'col', '12') }} {{ $errors->has(array_get($params, 'name')) ? 'has-error' : '' }}">
    {!! Form::label(array_get($params, 'name'),array_get($params, 'label')) !!}
    @switch($type)
        @case('select')
                {{ Form::$type(
                    array_get($params, 'name'),
                    array_get($params, 'arrayOptions') ? array_merge(array_get($params, 'arrayOptions')) : [],
                    array_get($params, 'selected') ? array_get($params, 'selected') : null,
                    array_get($params, 'optionsAttributes') ? array_merge(['class' => 'form-control'], array_get($params, 'optionsAttributes')) : ['class' => 'form-control'] )
                }}
            @break
        @case('checkbox')
                {{ Form::$type(
                    array_get($params, 'name'),
                    array_get($params, 'value') ? array_get($params, 'value') : '1',
                    array_get($params, 'checked') ? array_get($params, 'checked') : null,
                    array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'] )
                }}
            @break
        @case('radio')
                {{ Form::$type(
                    array_get($params, 'name'),
                    array_get($params, 'value') ? array_get($params, 'value') : null,
                    array_get($params, 'checked') ? array_get($params, 'checked') : null,
                    array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'] )
                }}
            @break
        @case('date')
                {{ Form::$type(
                    array_get($params, 'name'),
                    array_get($params, 'value') ? array_get($params, 'value') : null,
                    array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'] )
                }}
            @break
                {{ Form::$type(
                    array_get($params, 'url'),
                    array_get($params, 'name'),
                    array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'] )
                }}
            @break
        @case('selectMonth') 
                {!! Form::$type(
                    array_get($params, 'name'), 
                    array_get($params, 'selected'), 
                    array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'] ) !!}
            @break
        @case('selectRange')
                {!! Form::$type(
                    array_get($params, 'name'), 
                    array_get($params, 'begin'),
                    array_get($params, 'end'),
                    array_get($params, 'selected'),
                    array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'] ) !!}
            @break
        @case('selectYear')
                {!! Form::$type(
                    array_get($params, 'name'), 
                    array_get($params, 'begin'),
                    array_get($params, 'end'),
                    array_get($params, 'selected'),
                    array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'] ) !!}
            @break
        @default
            {{ Form::$type(
                array_get($params, 'name'),
                array_get($params, 'value') ? array_get($params, 'value') : null,
                array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'] )
            }}
    @endswitch
    <small class="text-danger">{{ $errors->first(array_get($params, 'name')) }}</small>
</div>