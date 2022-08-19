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
    return $this->model->with('property')->get();
  }

  public function create(Request $request)
  {
    try {
      // As we don't have a user session for now, we just put a hard coded name
      $user = session()->get('user.name') ?? 'Peter Griffin';

      $data = $request->validate([
        'summary' => 'string',
        'description' => 'string | max:500',
        'property_id' => 'numeric',
      ]);

      $data['status'] = 'open';
      // In a real life applicatin this should be a one-to-many relation between the user and the jobs
      //  but for now I just add the name of the user
      $data['raised_by'] = $user;

      $this->model->create($data);

      return response('Job log added successfully', 201);
    } catch(\Exeption $e) {
      error_log('Job logging failed: ' . $e->getMessage());
    }
  }
}
