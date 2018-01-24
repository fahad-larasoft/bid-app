@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('_partials.alerts')

                @if (auth()->user()->role == 'seller')

                    @include('_partials.seller')

                @elseif (auth()->user()->role == 'buyer')

                    @include('_partials.buyer')

                @endif
            </div>
        </div>
    </div>

    @each('products._bid_modal', $products, 'product')
@endsection
