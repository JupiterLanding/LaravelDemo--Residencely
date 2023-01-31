@extends("layouts.app")
@section("content")
    <div class="p-5">
        <form>
            <h2>Edit Property</h2>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="title">
                            Title
                        </label>
                        <input type="text" id="title" class="form-control" value="{{ $property->title }}"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="price">
                            Price
                        </label>
                        <input type="number" id="price" class="form-control" value="{{ $property->price }}"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="sqft">
                            sqft
                        </label>
                        <input type="number" id="sqft" class="form-control" value="{{ $property->sqft }}"/>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="address">
                    Address
                </label>
                <input type="text" id="address" class="form-control" value="{{ $property->address }}"/>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="description">Description</label>
            <textarea id="description" class="form-control">{{ $property->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">
                Update Property
            </button>
        </form>
    </div>
@endsection
