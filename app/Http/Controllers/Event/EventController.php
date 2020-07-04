<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = Event::orderBy('created_at', 'desc')->get();
      return ['total' => $events->count(), 'events' => $events];
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
        'content' => 'required',
      ];
      $this->validate($request, $rules);

      if ($request->image !== null) {
 
          $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
          \Image::make($request->image)->save(public_path('img/event/').$name);
    
          $request->merge(['image' => url('/').'/img/event/'.$name]);
      }
  
      $event = Event::create($request->all());
      return ['event' => $event];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $event = Event::findOrFail($id);
      return ['event' => $event];
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
      $event = Event::findOrFail($id);
      $this-> validate($request, [
        'title' => 'string',
      ]);

      $currentPhoto = $event->image;

      if ($request->image !== $currentPhoto) {
        $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
        \Image::make($request->image)->save(public_path('img/event/').$name);
  
        $request->merge(['image' => url('/').'/img/event/'.$name]);
      }

      $event->update($request->all());
      return ['event' => $event];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $event = Event::findOrFail($id);
      $event->delete();
      return ['status' => 'Event deleted'];
    }
}
