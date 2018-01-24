<div class="row">
    <div class="col-md-6">
        <button class="btn btn-primary pull-right">Save</button>
        <a style="margin-right: 5px" href="{!! route('home') !!}" class="btn btn-default pull-right"><i class="fa fa-backward"></i> Back to listing</a>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('start_date', 'Start Date:') !!}
            {!! Form::text('start_date', null, ['class' => 'form-control datepicker']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('end_date', 'End Date:') !!}
            {!! Form::text('end_date', null, ['class' => 'form-control datepicker']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('min_amount', 'Min Amount:') !!}
            {!! Form::text('min_amount', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('sellable_amount', 'Sellable Amount:') !!}
            {!! Form::text('sellable_amount', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>