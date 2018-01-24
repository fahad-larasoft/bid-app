<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h4>Your Products</h4>
        <a href="{!! route('products.create') !!}" class="btn btn-primary pull-right"><i
                    class="fa fa-plus"></i> Add Product</a>
    </div>

    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Min Amount</th>
                <th>Sellable Amount</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{!! $product->name !!}</td>
                    <td>{!! $product->start_date !!}</td>
                    <td>{!! $product->end_date !!}</td>
                    <td>${!! $product->min_amount !!}</td>
                    <td>${!! $product->sellable_amount !!}</td>
                    <td>
                        <a href="{!! route('products.bids', $product->id) !!}" class="btn btn-success">
                            <i class="fa fa-eye"></i> Bids
                        </a>
                        <a href="{!! route('products.edit', $product->id) !!}"
                           class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        {{ Form::open(array('route' => ['products.destroy', $product->id], 'method' => 'delete', 'class' => 'inline')) }}
                        <button class="btn btn-danger confirm-btn"><i class="fa fa-trash-o"></i>
                        </button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No products found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {!! $products->links() !!}
    </div>
</div>