<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::all();
        return response()->json($offres,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffreRequest $request)
    {
       $validated = $request->validated();
       if($validated){
          $offre = Offre::create($validated);
          return response()->json($offre,201);
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
        $offre = Offre::find($id);
        return response()->json($offre,200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OffreRequest $request)
    {
        $validated = $request->validated();
        if($validated){
            $offre = Offre::find($request["id"]);
            $offre->update($validated);
            return response()->json($offre,200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offre::destroy($id);
        return response()->json("Offre supprime avec succes",200);
    }
}
