<?php

namespace App\Services;
use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyService
{
    public $property;

    public function __construct(Request $request)
    {
        $this->property = Property::create($request->all());
    }

    public function uploadImage(Request $request): void
    {
        if ($request->hasFile("image")) {
            $path = $request->file("image")->store("images/properties");
            $this->property->images()->save(
                Image::create(["path" => $path])
            );
        }
    }
    public function createProperty(): Property
    {
        return $this->property;
    }
}
