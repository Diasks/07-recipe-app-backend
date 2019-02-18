<?php

namespace App\Http\Controllers;

use App\RecipeList;
use Illuminate\Http\Request;

class RecipeListController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return RecipeList::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $recipeList = RecipeList::create($request->all());
        return response()->json($recipeList, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function show(RecipeList $recipeList)
    {
        //
        return $recipeList;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function edit(RecipeList $recipeList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeList $recipeList)
    {
        //
        $recipeList->update($request->all());
        return response()->json($recipeList, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function delete(RecipeList $recipeList)
    {
        //
        $recipeList->delete();
        return respons()->json(null, 204);
    }
}
