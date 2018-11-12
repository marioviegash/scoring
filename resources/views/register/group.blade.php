@extends('register.layout.master')

@section('content')
    @include('register.shared.header')
    <fieldset>
        <h2 class="fs-title">CREATE YOUR GROUP</h2>
        <h3 class="fs-subtitle">Step 1</h3>
        <input type="text" name="name" placeholder="Name" />
        <textarea name="description" placeholder="Description" style="resize:none"></textarea>
        <input type="file" name="logo" placeholder="Input Your Logo" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
@endsection