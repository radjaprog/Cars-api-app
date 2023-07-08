<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCarsRequest;
use App\Http\Requests\UpdateCarsRequest;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $perPage = $request->query('per_page', 5);

        //return Cars::paginate($perPage);

        $brandTerm = $request->query('brand');
        $model = $request->query('model');

        return Cars::query()->searchByBrand($brandTerm)->searchByModel($model)->paginate($perPage);

        // if ($brandTerm) {
        //     $cars = Cars::scopeSearchByBrand($brandTerm)->paginate($perPage);
        // }

        // if ($model) {
        //     $cars = Cars::scopeSearchByModel($model)->paginate($perPage);
        // }

        // ako se radi zajedno, jedan na drugi onda ide ovo, znaci povezani search jedan sa drudim: (SAMO JEDAN RETURN MOZE BITI):
        // return Cars::query()->scopeSearchByBrand($brandTerm)->scopeSearchByModel($model)->paginate($perPage);
        // 
        // Ako cemo raditi jedan search:
        // return Cars::scopeSearchByBrand($brandTerm)->paginate($perPage);
        // 

        // $cars = Cars::all();
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
    public function store(CreateCarsRequest $request)
    {
        $validated = $request->validated();

        $car = Cars::create([
            'brand' => request('brand'),
            'model' => request('model'),
            'year' => request('year'),
            'is_automatic' => request('is_automatic'),
            'engine' => request('engine'),
            'number_of_doors' => request('number_of_doors'),
            'max_speed' => request('max_speed')
        ]);

        return $car;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Cars::findOrFail($id);

        // return view('cars.show', compact('car'));
        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarsRequest $request, $id)
    {
        $validated = $request->validated();

        $car = Cars::find($id);
        if ($car === null) {
            return response("id is not valid. Please enter valid id, id{$id} does not exist, Response::HTTP_NOT_FOUND");
        } else {
            $car->update([
                'brand' => request('brand'),
                'model' => request('model'),
                'year' => request('year'),
                'is_automatic' => request('is_automatic'),
                'engine' => request('engine'),
                'number_of_doors' => request('number_of_doors'),
                'max_speed' => request('max_speed')
            ]);
        };

        $car->save();

        return $car;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    // moze ovako:
    {
        //     $car = Cars::findOrFail($id)->delete();

        //     return $car;
        // }

        // a ovako je jednostavnije:
        return Cars::findOrFail($id)->delete();
    }
}

// if ($car === null) {
//     return response("upisi dobar id, id{$id} ne postoji, Response::HTTP_NOT_FOUND");
// } else {
//     $car-
