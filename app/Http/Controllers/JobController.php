<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    protected $job;

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
}
