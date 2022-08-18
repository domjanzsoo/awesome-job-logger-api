<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    protected $model;

    public function __construct(Property $property)
    {
      // Ideally this should be passed to an Elouent entity class which handles
      // the model-controller interaction
      $this->model = $property;
    }

    public function getAll()
    {
      return $this->model->all();
    }
}
