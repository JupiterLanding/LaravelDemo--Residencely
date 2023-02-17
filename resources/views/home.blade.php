@extends('layouts.app')

@section('content')
    <div class="m-2">
        <div class="">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Welcome to your dashboard {{ auth()->user()->name }}!</p>
                </div>
            </div>
        </div>
    </div>
@endsection
