@if (\Session::has('message'))
    <div class="alert alert-{{\Session::get('type')}}" role="alert">
        {{\Session::get('message')}}
    </div>
@endif
