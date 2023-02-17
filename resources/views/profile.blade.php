@extends('layouts.app')

@section('content')
<div class="m-5">
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
</div>
<div class="m-5">
    <form method="POST" action="{{ route('users.update') }}">
        @csrf
        @method("PUT")
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Company</label>
                <input name="company" type="text" class="form-control mb-3" id="company" placeholder="Company">
            </div>
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input name="city" type="text" class="form-control mb-3" id="city" placeholder="City">
            </div>
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input name="state" type="text" class="form-control mb-3" id="state" placeholder="State">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection