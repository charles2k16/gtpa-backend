<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all();
    return ['categories' => $categories];
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $rules = [
      'name' => 'required',
      'description' => 'required'
    ];
    $this->validate($request, $rules);

    $category = Category::create($request->all()); 
    return ['category' => $category];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $category = Category::with('posts')->findOrFail($id);
    return ['category' => $category];
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $category = Category::findOrFail($id);
    $this->validate($request, [
      'name' => 'string',
      'description' => 'string',
    ]);

    $category->update($request->all());
    return ['category' => $category];
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $category = Category::findOrFail($id);
    $category->delete();
    return ['status' => 'Category deleted'];
  }
}
