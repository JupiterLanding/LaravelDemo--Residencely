@extends("layouts.app")
@section("content")
    <x-alert></x-alert>
    <div class="p-5">
        <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <h2>Edit Property</h2>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="title">
                            Title
                        </label>
                        <input name="title" type="text" id="title" class="form-control"
                        value="{{ $property->title }}"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="price">
                            Price
                        </label>
                        <input name="price" type="number" id="price" class="form-control"
                               value="{{ $property->price }}"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="sqft">
                            sqft
                        </label>
                        <input name="sqft" type="number" id="sqft" class="form-control"
                               value="{{ $property->sqft }}"/>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="address">
                    Address
                </label>
                <input name="address" type="text" id="address" class="form-control"
                       value="{{ $property->address }}"/>
            </div>
            
            <div class="form-outline mb-4">
                <label class="form-label" for="image">
                    Image
                </label>
                <input name="image" type="file" id="image" class="form-control" value="{{ old('image') }}"/>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="description">Description</label>
                <textarea name="description" id="description"
                class="form-control">{{ $property->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">
                Update Property
            </button>
        </form>
        <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">
                Delete
            </button>
        </form>
    </div>
@endsection
