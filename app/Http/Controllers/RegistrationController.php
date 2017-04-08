<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{

  public function create()
  {

    return view('registration.create');

  }

  public function store(RegistrationForm $form)
  {

    /* -> Requests/RegistrationRequest.php */

    $form->persist();

    session()->flash('message', 'Kiitos kirjautumisesta palveluun!');

    return redirect()->home();

  }

}
