@extends('register.layout.master')

@section('content')
    @include('register.shared.progress', ['number'=>3])
    <fieldset>
        
        <form action="/verify/friend" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h2 class="fs-title">INVITE YOUR FRIEND 1</h2>
            <h3 class="fs-subtitle">Step 3</h3>
            <input type="text" name="name[]" placeholder="Name" style="float: left; width: 50%;" />
            <input type="email" name="email[]" placeholder="Email" style="float: left; width: 50%;"/>
            <div id="anotherFriend">

            </div>
            <input type="button" name="add" value="Add Antoher Friend" style="cursor: pointer;" id="btnAddFriend">
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