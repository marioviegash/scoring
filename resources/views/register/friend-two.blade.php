@extends('register.layout.master')

@section('content')
    @include('register.shared.progress', ['number'=>4])
    <fieldset>
        
            <form action="/verify/friend_two" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <h2 class="fs-title">INVITE YOUR FRIEND 2</h2>
                <h3 class="fs-subtitle">Step 4</h3>
                <input type="text" name="name" placeholder="Name" />
                <input type="email" name="email" placeholder="Email" />
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="submit" name="next" class=" action-button" value="Next" />
                @if(!empty($errors->first())) 
                    <div class="row col-lg-12">
                        <div class="alert alert-danger">
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif
            </form>
    </fieldset>
@endsection