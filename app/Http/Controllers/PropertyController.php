<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Mail\PropertyCreated;
use App\Models\Image;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $properties = Property::orderBy('created_at', 'DESC')->get();

        return view('properties.index', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePropertyRequest  $request
     * @return Response
     */
    public function store(StorePropertyRequest $request, PropertyService $propertyService)
    {
        $propertyService->uploadImage($request);

        $property = $propertyService->getProperty();

        $request->session()->flash('success', 'Property created successfully.');

        return redirect()->route('properties.show', ['property' => $property]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Property  $property
     * @return View
     */
    public function show(Property $property): View
    {
        return view('properties.show', ['property' => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Property  $property
     * @return View
     */
    public function edit(Property $property): View
    {
        return view('properties.edit', ['property' => $property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  Property  $property
     * @return Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->all());

        if ($request->hasFile("image")) {
            $path = $request->file("image")->store("images/properties");
            $property->images()->save(
                Image::create(["path" => $path])
            );
        }

        $property->save();

        $request->session()->flash('success', 'Property updated successfully.');

        return redirect()->route('properties.show', ['property' => $property]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Property  $property
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $property = Property::withTrashed()->where('id', $id)->first();

        if ($property->trashed()) {
            $property->forceDelete();
            $request->session()->flash('success', 'Property deleted successfully');

            return redirect()->route('properties.archived');
        } else {
            $property->delete();
            $request->session()->flash('success', 'Property archived successfully');

            return redirect()->route('properties.index');
        }
    }

    /**
     * View archived items.
     *
     * @param  Property  $property
     * @return View
     */
    public function archived(Property $property): View
    {
        $properties = Property::onlyTrashed()->get();

        return view('properties.archived', ['properties' => $properties]);
    }

    public function restore($id)
    {
        Property::withTrashed()->find($id)->restore();

        request()->session()->flash('success', 'Property restored successfully.');

        return redirect()->route("properties.index");
    }
}
