<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Services\PropertyService;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $properties = Property::orderBy("created_at", "DESC")->get();

        return view("properties.index", ["properties" => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("properties.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return Response
     */
    public function store(StorePropertyRequest $request, PropertyService $propertyService)
    {
        $propertyService->uploadImage($request);

        $property = $propertyService->createProperty();

        $request->session()->flash("success", "Property created successfully.");

        return redirect()->route("properties.show", ["property" => $property]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return View
     */
    public function show(Property $property): View
    {
        return view("properties.show", ["property" => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return View
     */
    public function edit(Property $property): View
    {
        return view("properties.edit", ["property" => $property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->all());

        $property->save();

        return redirect()->route("properties.show", ["property" => $property]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
