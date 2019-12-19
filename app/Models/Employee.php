<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = ['name', 'lastName', 'company', 'email', 'phone'];

  public function company()
 {
     return $this->belongsTo('App\Models\Company');
 }
}
