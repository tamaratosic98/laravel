<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Resources\City as CityResource;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::paginate(15);
        //Return the collection of articles as a resource
        return CityResource::collection($cities);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $city=$request->isMethod('put')? City::findOrFail($request->city_id):new City;
        $city->id=$request->input('city_id');
        $city->name=$request->input('name');
        $city->population=$request->input('population');
        if($city->save()){
         return new CityResource($city);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $city = City::findOrFail($id);
        return new CityResource($city);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $city = City::findOrFail($id);
        //return the single article as a resource
        if($city->delete()){
            return new CityResource($city);
        }
    }
}
