<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
  protected $guarded = ['id'];
  protected $with = ['contacts'];
  protected $hidden = ['pivot'];

  public static function boot()
  {
    parent::boot();
    static::creating(function ($label) {
      $label->slug = Str::slug($label->name);
    });
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function contacts()
  {
    return $this->belongsToMany(Contact::class, 'contact_labels', 'label_id', 'contact_id');
  }

  // public function contacts()
  // {
  //   return $this->belongsTo(Contact::class);
  // }
}
