@extends('layouts.app')

@section('content')
    @include('_partials.alerts')
    {!! Form::open(['route' => 'products.store']) !!}

        @include('products._form')

    {!! Form::close() !!}
@stop

@section('js')
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true
        });
    </script>
@stop