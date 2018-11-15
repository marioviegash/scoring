@extends('register.layout.master')

@section('content')
    @include('register.shared.progress', ['number'=>1])
    <fieldset>
        <form action="/verify/group" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h2 class="fs-title">CREATE YOUR GROUP</h2>
            <h3 class="fs-subtitle">Step 1</h3>
            <input type="text" name="name" placeholder="Name" />
            <textarea name="description" placeholder="Description" style="resize:none"></textarea>
            <input type="file" name="logo" placeholder="Input Your Logo" />
            <input type="submit" name="next" class="action-button" value="Next" />
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