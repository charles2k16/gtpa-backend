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
    $posts = Post::with('category', 'user')->orderBy('created_at', 'desc')->get();
    return ['total' => $posts->count(), 'posts' => $posts];
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


    if ($request->media !== null) {
      $name = time().'.' . explode('/', explode(':', substr($request->media, 0, strpos($request->media, ';')))[1])[1];
      \Image::make($request->media)->save(public_path('img/posts/').$name);

      $request->merge(['media' => url('/').'/img/posts/'.$name]);
    }

    $post = Post::create($request->all());
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
    $post = Post::with('user')->findOrFail($id);
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

    $currentPhoto = $post->media;

    if ($request->media !== $currentPhoto) {
      $name = time().'.' . explode('/', explode(':', substr($request->media, 0, strpos($request->media, ';')))[1])[1];
      \Image::make($request->media)->save(public_path('img/posts/').$name);

      $request->merge(['media' => url('/').'/img/posts/'.$name]);

      if(file_exists($currentPhoto)) {
        @unlink($currentPhoto);
      }
    }

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
