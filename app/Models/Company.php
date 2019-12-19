<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'logo', 'website'];
     
    public function employee()
      {
          return $this->hasMany('App\Models\Employee');
      }
}
