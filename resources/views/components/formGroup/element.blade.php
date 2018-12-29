
@switch($type)
    @case('checkbox')
        <div class="col-xs-{{ array_get($params,'col','4') }} {{ $errors->has(array_get($params,'name'))?'has-error':'' }}"> 
            <label class="css-input css-checkbox css-checkbox-{{ array_get($params,'css', 'default') }}">
                <input type="{{ $type }}"
                name="{{ array_get($params,'name') }}"
                {{ array_get($params,'checked', false) ? 'checked' : ''}}
                {{ array_get($params,'require', false) ? 'require' : ''}}>
                <span></span> {{ array_get($params,'value') }}
            </label>
            <small class="text-danger">{{ $errors->first(array_get($params, 'name')) }}</small>
        </div> 
        @break
    @case('radio')
        <div class="col-xs-{{ array_get($params,'col','4') }} {{ $errors->has(array_get($params,'name')) ? 'has-error' : '' }}">
            <label class="css-input css-radio css-radio-{{ array_get($params,'css', 'default') }}">
                <input type="{{ $type }}"
                name="{{ array_get($params,'name') }}"
                {{ array_get($params,'checked', false) ? 'checked' : ''}}
                {{ array_get($params,'require', false) ? 'require' : ''}}>
                <span></span> {{ array_get($params,'value') }}
            </label>
            <small class="text-danger">{{ $errors->first(array_get($params, 'name')) }}</small>
        </div>  
        @break
    @case('reset')
        <div class="col-xs-{{ array_get($params,'col','2') }}">
            {!! Form::$type(
                array_get($params, 'value') ? array_get($params, 'value') : null,
                array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'])
            !!}
        </div>
        @break
    @case('image')
        <div class="col-xs-{{ array_get($params,'col','6') }} animated fadeIn">
            <a class="img-link" href="{{ array_get($params, 'link', 'javascript:void(0)') }} ">
            {!! Form::$type(
                array_get($params, 'url', null),
                array_get($params, 'name', null),
                array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control']) !!}
            </a>
        </div>
        @break
    @case('submit')
        <div class="col-xs-{{ array_get($params,'col','2') }}">
            {!! Form::$type(
                array_get($params, 'value') ? array_get($params, 'value') : null,
                array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'])
            !!}
        </div>
        @break
    @case('color') {{-- Falta resolver color --}}
        <div class="col-xs-{{ array_get($params,'col','4') }}">
            {!! Form::$type(
                array_get($params, 'name', null),
                array_get($params, 'value') ? array_get($params, 'value') : null,
                array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'])
            !!}
        </div>
        @break
    @case('button')
        {{--  <div class="col-lg-{{ array_get($params,'col','4') }} col-xs-4">  --}}
            {!! Form::$type(
                array_get($params, 'value') ? array_get($params, 'value') : null,
                array_get($params, 'attributes') ? array_merge(['class' => 'form-control'], array_get($params, 'attributes')) : ['class' => 'form-control'])
            !!}
        {{--  </div>  --}}
        @break
    @default
        
@endswitch