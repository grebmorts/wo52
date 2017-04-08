<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use App\User;

class AdminController extends Controller
{
  public function index()
  {

    $users = User::get();

    return view('admin.index', compact('users'));

  }

  public function show(User $user)
  {

    return view('admin.show', compact('user'));

  }

  public function destroy($id){

    // delete
      $user = User::find($id);
      $user->delete();

      // redirect
      session()->flash('message', 'Käyttäjä poistettu!');
      return redirect('/');
  }

  public function makeMod($id){

      $user = User::find($id);

      //$role = \App\Role(['name' => 1]);
      $user->roles()->attach(2);



      // redirect
      session()->flash('message', 'Ylläpito-oikeudet annettu!');
      return redirect()->back();
  }

  public function unmakeMod($id){

      $user = User::find($id);

      //$role = \App\Role(['name' => 1]);
      $user->roles()->detach(2);



      // redirect
      session()->flash('message', 'Ylläpito-oikeudet poistettu!');
      return redirect()->back();
  }




}
