@extends('layouts.app')
@section('content')
<x-user-profile-navigation></x-user-profile-navigation>
<div class="m-3">
    <form method="POST" action="{{ route('users.update') }}">
        @csrf
        @method("PUT")
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Company</label>
                <input name="company" type="text" class="form-control mb-3" id="company" value="{{ auth()->user()->company }}">
            </div>
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input name="city" type="text" class="form-control mb-3" id="city" value="{{ auth()->user()->city }}">
            </div>
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input name="state" type="text" class="form-control mb-3" id="state" value="{{ auth()->user()->state }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection