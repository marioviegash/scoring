@extends('register.layout.master')

@section('content')
    @include('register.shared.header')
    <fieldset>
        <h2 class="fs-title">COMPLETE YOUR PROFILE</h2>
        <h3 class="fs-subtitle">Step 2</h3>
        <input type="text" name="position" placeholder="Position" />
        <input type="text" name="work_place" placeholder="Work Place" />
        <input type="text" name="c_level" placeholder="C Level" />
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
@endsection