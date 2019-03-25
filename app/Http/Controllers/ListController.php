<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MyList;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['get', 'store', 'update', 'index', 'delete', 'move']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($email)
    {
        return MyList::all()->where('email', $email);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $List = MyList::create([
            'title' =>$request->title,
            'recipe' =>$request->recipe,
            'email' => $request->email

        ]);

        return $List;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */

    public function show(MyList $myList)
    {
        
        return $myList;
    }

    // public function put(Request $request, MyList $myList)
    // {
  
    //     $myList->update($request->all());
    //     return response()->json($myList, 200);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $list = MyList::find($id);
       if ($request['title']) {
   $list->title = $request['title'];
       }
       if ($request['recipeId']) {
           $recipe = $list->recipe;
           $recipe[] = $request['recipeId'];
           $list->recipe = $recipe;
       }
    

        $list->save();
        return response()->json($list, 200);

      

    }
    

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $list = MyList::find($id);
    
        $list->delete();

        
      
        return response()->json('list succesfully deleted');
       
    }


    public function move($id, $recipe)
    {
        $list = MyList::find($id);
        $recArr = $list->recipe;
    
        if (($key = array_search($recipe, $recArr)) !== false) {
            unset($recArr[$key]);
         }
         $list->recipe = $recArr;
         $list->save();
 
        return response()->json($list);
 }

}