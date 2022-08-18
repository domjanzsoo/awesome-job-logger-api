<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name'];

    public function jobs()
    {
      return $this->hasMany(Job::class);
    }
}
