@extends('schematic::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('schematic.name') !!}
    </p>
@stop
