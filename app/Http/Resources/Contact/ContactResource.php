<?php

namespace App\Http\Resources\Contact;

use App\Http\Resources\Label\LabelResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
      'id' => $this->id,
      'name' => $this->name,
      'email' => $this->email,
      'phone' => $this->phone,
      'notes' => $this->notes,
      'created_at' => $this->created_at->diffForHumans(),
      'labels' => LabelResource::collection($this->labels)
    ];
  }
}
