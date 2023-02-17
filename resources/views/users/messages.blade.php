@extends('layouts.app')
@section('content')
<x-user-profile-navigation></x-user-profile-navigation>
<div class="m-3">
    @foreach (auth()->user()->messages as $message)
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                    {{ $message->title }}
                </h5>
                <small class="text-muted">
                    {{ $message->created_at->diffForHumans() }}
                </small>
            </div>
            <p class="mb-1">
                {{ $message->body }}
            </p>
            <small class="text-muted">And some muted small print.</small>
        </a>
    </div>
    @endforeach
</div>
@endsection