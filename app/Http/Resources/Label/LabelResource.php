<?php

namespace App\Http\Resources\Label;

use Illuminate\Http\Resources\Json\JsonResource;

class LabelResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'name' => $this->name,
      'slug' => $this->slug,
      'created_at' => $this->created_at->diffForHumans()
    ];
  }
}
