@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('_partials.alerts')

                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4>Products on Auction</h4>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            @forelse($products->chunk(3) as $products_chunk)
                                @foreach($products_chunk as $product)
                                    <div class="col-md-4" id="{!! $product->id !!}">
                                        <div class="social-feed-element">
                                            <div class='content'>
                                                <a class="pull-left" href="" target="_blank">
                                                    <img class="media-object" src="">
                                                </a>
                                                <div class="media-body">
                                                    <span class="author-title">
                                                        {!! $product->name !!}
                                                        @if($product->is_expired)
                                                            | <span class="label label-danger">Ended</span>
                                                        @elseif(!$product->is_started)
                                                            | <span class="label label-warning">Not started</span>
                                                        @endif
                                                    </span>
                                                    <div class="muted pull-right">

                                                    </div>
                                                    <div class='text-wrapper'>
                                                        <br>
                                                        <p class="social-feed-text">Total
                                                            Bids: {!! $product->biddingUsers->count() !!}
                                                        </p>
                                                        <p class="social-feed-text">
                                                            Valid
                                                            from {!! $product->start_date !!}
                                                            to {!! $product->end_date !!}
                                                        </p>
                                                        <p class="social-feed-text">
                                                            Bidding Starts from: ${!! $product->min_amount !!}
                                                        </p>
                                                        <hr>
                                                        @if (auth()->user()->isAlreadyAppliedToProduct($product))
                                                            <button class="disabled btn btn-success pull-right"><i class="fa fa-check"></i>
                                                                Already Applied
                                                            </button>
                                                            Your Bid: {!! auth()->user()->getBiddingAmountOnProduct($product) !!}
                                                        @else
                                                            <button
                                                                    @if ($product->is_started && !$product->is_expired)
                                                                    data-toggle="modal" data-target="#{!! $product->id !!}-modal"
                                                                    @endif
                                                                    class=" pull-right btn btn-primary {!! $product->is_expired || !$product->is_started ? 'disabled' : '' !!}">
                                                                Bid Now
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                                <br>
                            @empty
                                <div class="col-md-12">
                                    No products available on auction.
                                </div>
                            @endforelse

                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @each('_partials.make_bid_modal', $products, 'product')
@endsection
