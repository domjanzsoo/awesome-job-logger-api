<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
  protected $model;

  public function __construct(Job $job)
  {
    // Ideally this should be passed to an Elouent entity class which handles
    // the model-controller interaction
    $this->model = $job;
  }

  // In real world situation I would possibly assign this endpoint logic to a user
  //  but as we don't have an authentication scaffold implemented, now it will be done
  //  by the JobController
  public function getAll()
  {
    return $this->model->all();
  }

  public function create(Request $request)
  {
    try {
      $data = $request->validate([
        'summary' => 'string',
        'description' => 'string | max:500',
        'status'  => 'string| in:open,in progress,completed,cancelled',
        'property_id' => 'numeric'
      ]);

      $this->model->create($data);

      return respone('Job log added successfully', 201);
    } catch(\Exeption $e) {
      error_log('Job logging failed: ' . $e->getMessage());
    }
  }
}
