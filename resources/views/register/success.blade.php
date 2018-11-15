@extends('register.layout.master')

@section('content')
    @include('register.shared.progress', ['number'=>5])
    <fieldset>
        <h2 class="fs-title">Success Register</h2>
        <h3 class="fs-subtitle">Complete Step</h3>
        <p>
            Your Request and Invitation Has Been Sent <br/>
            Waiting Approval Your Group From Admin ...
        </p>
    </fieldset>
@endsection