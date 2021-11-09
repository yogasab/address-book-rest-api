<?php

namespace App\Http\Controllers\API\Label;

use App\Label;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Label\LabelRequest;
use App\Http\Resources\Label\LabelResource;

class LabelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return LabelResource::collection(Label::latest()->get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(LabelRequest $request)
  {
    $validatedData = $request->all();
    $label = Label::create($validatedData);
    return new LabelResource($label);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Label  $label
   * @return \Illuminate\Http\Response
   */
  public function show(Label $label)
  {
    return new LabelResource($label);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Label  $label
   * @return \Illuminate\Http\Response
   */
  public function update(LabelRequest $request, Label $label)
  {
    $validatedData = $request->all();
    $validatedData['slug'] = Str::slug($request->name);
    $label->update($validatedData);
    return new LabelResource($label);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Label  $label
   * @return \Illuminate\Http\Response
   */
  public function destroy(Label $label)
  {
    $label->delete();
    return response()->json([
      'message' => 'Label deleted successfully'
    ]);
  }
}
