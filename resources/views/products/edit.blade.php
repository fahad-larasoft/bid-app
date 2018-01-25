@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Edit Product</h4>
        </div>

        <div class="panel-body">
            @include('_partials.alerts')

            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}

            @include('products._form')

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true
        });
    </script>
@stop