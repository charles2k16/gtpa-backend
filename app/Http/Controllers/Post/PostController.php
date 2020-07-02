<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::with('category', 'user')->get();
    return ['posts' => $posts, 'total' => $posts->count()];
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
      'title' => 'required',
      'sub_content' => 'required',
      'content' => 'required',
    ];
    $this->validate($request, $rules);

    $data = $request->all();

    $post = Post::create($data);
    return ['post' => $post];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::findOrFail($id);
    return ['post' => $post];
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
    $post = Post::findOrFail($id);
    $this-> validate($request, [
      'title' => 'string',
    ]);
    $post->update($request->all());
    return ['post' => $post];
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Post::findOrFail($id);
    $post->delete();
    return ['status' => 'Post deleted'];
  }
}
