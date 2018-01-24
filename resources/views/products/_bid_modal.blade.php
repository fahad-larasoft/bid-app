<!-- Modal -->
<div id="{!! $product->id !!}-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Make your Bid</h4>
            </div>
            {!! Form::open(['route' => ['products.store.bid', $product->id], 'method' => 'post']) !!}

            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('bidding_amount', 'Bidding Amount:') !!}
                    {!! Form::number('bidding_amount', null, ['class' => 'form-control', 'min' => $product->min_amount]) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Make Bid</button>
            </div>
            {!! Form::close() !!}

        </div>

    </div>
</div>