@extends('layouts.app')
@section('content')
<x-user-profile-navigation></x-user-profile-navigation>
<div class="m-3">
<ul class="list-group">
    @foreach (auth()->user()->vouchers as $voucher)
        <li class="list-group-item">
            {{ $voucher->code }}
        </li>
    @endforeach
</ul>
</div>
@endsection