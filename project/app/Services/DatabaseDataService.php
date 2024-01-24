<?php

namespace App\Services;

use App\Models\UserGender;
use App\Models\State;

class DatabaseDataService
{

  public function getGenders()
  {
    return UserGender::all();
  }
  public function getStates()
  {
    return State::orderBy('state_name', 'ASC')->get();
  }
  public function getState($state_id)
  {
    return State::where('state_id', $state_id)->first();
  }
 
}
