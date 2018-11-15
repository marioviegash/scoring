@extends('register.layout.master')

@section('content')
    @include('register.shared.header')
    <fieldset>
        <h2 class="fs-title">INVITE YOUR FRIEND 2</h2>
        <h3 class="fs-subtitle">Step 4</h3>
        <input type="text" name="name" placeholder="Name" />
        <input type="email" name="email" placeholder="Email" />
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
@endsection