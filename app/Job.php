<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['summary', 'description', 'status', 'property_id', 'raised_by'];

    public function property()
    {
      return $this->belongsTo(Property::class);
    }
}
