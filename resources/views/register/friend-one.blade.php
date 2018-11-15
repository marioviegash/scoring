@extends('register.layout.master')

@section('content')
    @include('register.shared.progress', ['number'=>3])
    <fieldset>
        
        <form action="/verify/friend_one" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h2 class="fs-title">INVITE YOUR FRIEND 1</h2>
            <h3 class="fs-subtitle">Step 3</h3>
            <input type="text" name="name" placeholder="Name" />
            <input type="email" name="email" placeholder="Email" />
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="next" class="action-button" value="Next" />
        </form>
    </fieldset>
@endsection