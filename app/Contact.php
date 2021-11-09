<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $guarded = ['id'];
  protected $hidden = ['pivot'];
  // protected $with = ['labels'];
  public function labels()
  {
    return $this->belongsToMany(Label::class, 'contact_labels', 'contact_id', 'label_id');
  }
  // public function labels()
  // {
  //   return $this->hasMany(Label::class);
  // }
}
