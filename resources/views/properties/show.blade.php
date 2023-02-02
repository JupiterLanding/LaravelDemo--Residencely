@extends("layouts.app")
@section("content")
    <div class="container m-5">
        <div class="row">
            <div class="col-md-8">
                <div class="pb-3">
                    <a class="btn btn-primary mb-2" href="{{ route('properties.edit', $property->id) }}">Edit</a>
                    <div class="card col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $property->title }}
                            </h5>
                            <p class="card-text">
                                {{ $property->address }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item text-success">
                                Price: ${{ number_format($property->price, 2) }}
                            </li>
                            <li class="list-group-item">
                                sqft: {{ $property->sqft }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        {{ $property->description }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @foreach ($property->images as $image)
                    <img class="img-thumbnail" src="{{ asset("storage/" . $image->path) }}" alt="property image">
                @endforeach
            </div>
        </div>
    </div>
    <div class="m-3">
        <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Archive</button>
        </form>
    </div>
    <div class="m-3">
        <a class="" href="{{ route('properties.index') }}">Go back</a>
    </div>
@endsection
