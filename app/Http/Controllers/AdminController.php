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

  public function destroy(Request $request){

    // delete
      $id = $request->input('id');
      User::where('id', $id)
      ->delete();

      // redirect
      session()->flash('message', 'Käyttäjä poistettu!');
      return redirect('/users');
  }

  public function makeMod(Request $request){

      $id = $request->input('id');


      $user = User::find($id);


      $user->roles()->attach(2);



      // redirect
      session()->flash('message', 'Ylläpito-oikeudet annettu!');
      return redirect()->back();
  }

  public function unmakeMod(Request $request){

      $id = $request->input('id');


      $user = User::find($id);

      $user->roles()->detach(2);



      // redirect
      session()->flash('message', 'Ylläpito-oikeudet poistettu!');
      return redirect()->back();
  }




}
