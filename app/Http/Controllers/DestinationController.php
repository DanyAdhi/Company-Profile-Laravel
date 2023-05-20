<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;
use File;

class DestinationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $status     = $request->get('status');
    $keyword    = $request->get('keyword') ? $request->get('keyword') : '';
    $category   = $request->get('c') ? $request->get('c') : '';

    if($status){
      $destinations = Destination::where('status', strtoupper($status))
                                    ->where('title', 'LIKE', "%$keyword%")
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(10);

    }else{
      $destinations = Destination::where('title', 'LIKE', "%$keyword%")
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);
    }

    return view('destinations.index', compact('destinations'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('destinations.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      \Validator::make($request->all(),[
          'title'      => 'required|min:2|max:200',
          'image'      => 'required',
      ])->validate();

      $new_Destination               = new \App\Destination;
      $new_Destination->title        = $request->get('title');
      $new_Destination->slug         = \Str::slug($request->get('title'), '-');
      $new_Destination->content      = $request->get('content');
      $new_Destination->create_by    = \Auth::user()->id;
      $new_Destination->status       = $request->get('save_action');

      if($request->file('image')){
          $nama_file = time()."_".$request->file('image')->getClientOriginalName();
          $image_path = $request->file('image')->move('destinations_image', $nama_file);
          $new_Destination->image = $nama_file;
      }

      
      $new_Destination->save();

      return redirect()->route('destinations.index')->with('success', 'Destination successfully created');
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
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $destination = Destination::findOrFail($id);
      return view('destinations.edit', compact('destination'));
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
      $destination = Destination::findOrFail($id);

      $destination->title        = $request->get('title');
      $destination->slug         = \Str::slug($request->get('title'), '-');
      $destination->content      = $request->get('content');
      $destination->status       = $request->get('save_action');
      $destination->update_by    = \Auth::user()->id;

      if($request->file('image')){   
          if($destination->image){
              File::delete('destinations_image/'.$destination->image);
          }
          $nama_file = time()."_".$request->file('image')->getClientOriginalName();
          $new_image = $request->file('image')->move('destinations_image', $nama_file);
          $destination->image = $nama_file;
      }

      $destination->save();
      return redirect()->route('destinations.index')->with('success', 'Destination successfully update.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $destination = Destination::findOrFail($id);
      if($destination->image){
          File::delete('destinations_image/'.$destination->image);
      }
      $destination->forceDelete();

      return redirect()->route('destinations.index')->with('success', 'Destination successfully deleted.');
  }
}
