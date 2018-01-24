@include('flash::message')

@if(count($errors))
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach($errors->all() as $error)
                <li> {!! $error !!} </li>
            @endforeach
        </ul>
    </div>
    <br>
@endif