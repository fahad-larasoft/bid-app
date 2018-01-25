@extends('layouts.app')

@section('content')
    @include('_partials.alerts')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h4>{!! $product->name !!} | Bids</h4>
            <a href="{!! route('home') !!}" class="btn btn-default pull-right"><i class="fa fa-backward"></i> Back to
                listing</a>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Bidding User</th>
                    <th>Bid Date</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @forelse($biddingUsers as $biddingUser)
                    <tr>
                        <td>{!! $biddingUser->name !!} </td>
                        <td>{!! $biddingUser->pivot->created_at !!}</td>
                        <td>
                            {!! $biddingUser->pivot->bidding_amount !!}
                            @if ($highest_bid_user->id == $biddingUser->id)
                                @if ($product->is_expired)
                                    | <span class="label label-success">Selected Bid</span>
                                @else
                                    | <span class="label label-warning">Highest Bid</span>
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No bids found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {!! $biddingUsers->links() !!}
        </div>
    </div>

@stop