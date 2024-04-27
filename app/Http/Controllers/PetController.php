<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Filters\PetFilter;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\PetCollection;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Requests\BulkStorePetRequest;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = new PetFilter();
        $queryItems = $filter->transform($request);
        if (count($queryItems) == 0) {
            return new PetCollection(Pet::paginate());
        } else {
            $pets = Pet::where($queryItems)->paginate();
            return new PetCollection($pets->appends($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetRequest $request)
    {
        //
    }

    public function bulkStore(BulkStorePetRequest $request)
    {
        $bulk = collect($request->all())->map(function ($arr, $key) {
            return Arr::except($arr, ['customerId', 'isBreed']);
        });
        Pet::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
