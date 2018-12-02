@extends('register.layout.master')

@section('content')
    @include('register.shared.progress', ['number'=>2])
    <fieldset>
        <form action="/verify/profile" method="post" enctype="multipart/form-data">
            <h2 class="fs-title">COMPLETE YOUR PROFILE</h2>
            <h3 class="fs-subtitle">Step 2</h3>
            {{csrf_field()}}
            <input type="text" name="work_place" placeholder="Work Place" />
            <input type="text" name="c_level" placeholder="C Level" />
            <input type="submit" name="next" class="next action-button" value="Next" />
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