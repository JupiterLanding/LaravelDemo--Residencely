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
                    <p class="lead">Welcome to your dashboard {{ auth()->user()->name }}!</p>
                    @if (auth()->user()->vouchers)
                        @foreach (auth()->user()->vouchers as $voucher)
                            You have a voucher: <span class="text-success">{{ $voucher->code }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
